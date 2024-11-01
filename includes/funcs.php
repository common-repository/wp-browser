<?php
global $wp_query, $modcoder_ap_serial, $modcoder_ap_registered, $modcoder_plugin_root;

function modcoder_hex2rgb($hex, $key) {
	$hex = trim(str_replace('#', '', $hex));
	for ($i = 0; $i < 6; $i = $i+2) $rgb[] = hexdec($hex[$i].$hex[$i+1]);
	switch($key) {
		case 'r' : return $rgb[0]; 
		case 'g' : return $rgb[1]; 
		case 'b' : return $rgb[2]; 
		default  : return $rgb; 
	}
}

function modcoder_clear_str($str) {
	return trim(str_replace(array("\r\n","\n\r","\r","\n"),array('','','',''), $str));
}

function modcoder_get_block($block_text, $block_label) {
	$temp = explode('mcl'.$block_label, $block_text);
	return $temp[1];
}

function modcoder_wpb_curcat() {
	global $wp_query;
	if (is_tag()) {
		return 'tag'.intval($wp_query->query_vars['tag_id']);
	} elseif (is_home()) {
		return 'home';
	} elseif (is_category()) {
		return intval($wp_query->query_vars['cat']);
	} elseif (is_archive()) {
		return 'a'.get_the_time('Y').get_the_time('m');
	}
}

function extract_domen_from_url($url) {
	$url = trim(strtolower($url));
	$temp = explode('//', $url);
	if (sizeof($temp)>1) $url = $temp[1];
	$temp = explode('www.', $url);
	if (sizeof($temp) == 2 && $temp[0] == '') {
		$url = $temp[1];
	}
	$temp = explode('/', $url);
	$url = $temp[0];
	$temp = explode('?', $url);
	$temp = explode(':',$temp[0]);
	$temp = explode('.',$temp[0]);
	$temp = $temp[sizeof($temp)-2].'.'.$temp[sizeof($temp)-1];
	return $temp;
}

function modcoder_getapi() {
	$s = md5(extract_domen_from_url(get_bloginfo('siteurl')).'zs73kl0j', false);
	return $s[0].$s[5].$s[10].$s[15].$s[21].$s[26].$s[31];
}
$modcoder_aps_registered = $modcoder_ap_registered = (modcoder_getapi() == $modcoder_ap_serial);

add_action('wp_ajax_modcoder_ap_esn', 'modcoder_ap_esn');

function modcoder_ap_esn() {
	global $modcoder_ap_serial;
	if ($_POST['sn'] == modcoder_getapi()) {
		delete_option('modcoder_wpbrowser_serial');
		add_option('modcoder_wpbrowser_serial', $_POST['sn']);
		echo '369';
	} else echo '839';
	exit;
}

function modcoder_pager_html() {
	global $modcoder_pager_cache_ver, $wp_query, $modcoder_ap_serial, $modcoder_plugin_root;
	if (!is_user_logged_in()) {
		$category = modcoder_wpb_curcat();
		$cache_pgr_path = $modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'pagers'.DIRECTORY_SEPARATOR;
		$cache_pgr_file = $modcoder_pager_cache_ver.'_'.$category.'.pgr';
		if (file_exists($cache_pgr_path.$cache_pgr_file)) {
			return file_get_contents($cache_pgr_path.$cache_pgr_file);
		}
	}
	if ($_POST['modcoder'] == 'AJAX_REQUEST') return '';
	global $posts_per_page, $paged, $wp_query, $modcoder_ap_options, $modcoder_admin_on_site;
	if ($modcoder_ap_options['show_page_title'] == '1') {
		$first_ttip = trim($modcoder_ap_options['arrow_first_title']);
		$last_ttip = trim($modcoder_ap_options['arrow_last_title']);
		$left_ttip = trim($modcoder_ap_options['arrow_left_title']);
		$right_ttip = trim($modcoder_ap_options['arrow_right_title']);
	} else {
		$right_ttip = $left_ttip = $last_ttip = $first_ttip = '';
	}
	$modcoder_page_count = ceil($wp_query->found_posts/$posts_per_page);
	if ($modcoder_page_count < 2) return false; 
	$pad = 100 - intval($modcoder_ap_options['pager_width']);
	switch ($modcoder_ap_options['pager_align']) {
		case '0' :
			$lpad = '0%';
			$rpad = $pad.'%'; 
		break;
		case '1' :
			$lpad = floor($pad/2);
			$rpad = $pad-$lpad;
			$lpad .= '%';
			$rpad .= '%';
		break;
		case '2' :
			$rpad = '0%';
			$lpad = $pad.'%'; 
		break;
	}
	if ($modcoder_ap_options['show_left_right_arrows'] == '1' || $modcoder_ap_options['show_first_last_arrows'] == '1') {
		switch ($modcoder_ap_options['arrows_as']) {
			case '0' :
				$left_c = '<a title="'.$left_ttip.'" class="modcoder_arrow_button"'.modcoder_but($modcoder_ap_options['arrow_left_text'], '');
				$right_c = '<a title="'.$right_ttip.'" class="modcoder_arrow_button"'.modcoder_but($modcoder_ap_options['arrow_right_text'], '');
				$first_c = '<a title="'.$first_ttip.'" class="modcoder_arrow_button"'.modcoder_but($modcoder_ap_options['arrow_first_text'], '');
				$last_c = '<a title="'.$last_ttip.'" class="modcoder_arrow_button"'.modcoder_but($modcoder_ap_options['arrow_last_text'], '');
			break;
			case '1' :
				$left_c = '<a title="'.$left_ttip.'" class="modcoder_arrow_button"'.modcoder_but('', $modcoder_ap_options['arrow_left_img_uri']);
				$right_c = '<a title="'.$right_ttip.'" class="modcoder_arrow_button"'.modcoder_but('', $modcoder_ap_options['arrow_right_img_uri']);
				$first_c = '<a title="'.$first_ttip.'" class="modcoder_arrow_button"'.modcoder_but('', $modcoder_ap_options['arrow_first_img_uri']);
				$last_c = '<a title="'.$last_ttip.'" class="modcoder_arrow_button"'.modcoder_but('', $modcoder_ap_options['arrow_last_img_uri']);
			break;
		}
		$left = '<div class="modcoder_left" style="padding-right:'.$modcoder_ap_options['pagers_dist'].'px">'.$left_c.'</div>';
		$right = '<div class="modcoder_right" style="padding-left:'.$modcoder_ap_options['pagers_dist'].'px">'.$right_c.'</div>';
		$first = '<div class="modcoder_first" style="padding-right:'.$modcoder_ap_options['pagers_dist'].'px">'.$first_c.'</div>';
		$last = '<div class="modcoder_last" style="padding-left:'.$modcoder_ap_options['pagers_dist'].'px">'.$last_c.'</div>';
		if ($modcoder_ap_options['show_left_right_arrows'] == '0') {
			$left = '';
			$right = '';
		}
		if ($modcoder_ap_options['show_first_last_arrows'] == '0') {
			$first = '';
			$last = '';
		}
	}
	$admin_alert = '';
	$admin_style = ' style="display:none;"';
	$scrollbar = '<div class="modcoder_scrl_wrapper" style="width:100%;"><div style="width:0px;" class="modcoder_scrl_bar"><div class="modcoder_scrl_ghost" style="width:0px;"></div><div class="modcoder_scrl_slider"></div></div></div>';
	if ($modcoder_ap_options['scrl_switcher'] == '0') $scrollbar = '';
	$modcoder_pager = '<div class="modcoder_pager_wrapper" style="visibility:hidden;width:100%;padding-top:'.$modcoder_ap_options['top_indent'].'px;padding-bottom:'.$modcoder_ap_options['bottom_indent'].'px;padding-left:0;padding-right:0;margin:0;"><div class="modcoder_admin_on_site"'.$admin_style.'>'.$admin_alert.'</div>
	<div class="modcoder_pagerlayer">'.$first.$left.'<div style="width:1px;" class="modcoder_pager_buttons">
	<div class="modcoder_pager_slider_pl" style="width:0px;"></div>
	<div style="width:100%;float:left;overflow:hidden;" class="modcoder_pager_slidewrap"><table class="modcoder_button_container" cellpadding="0" cellspacing="0" style="margin-left:0;margin-top:0;margin-right:0;margin-bottom:0;padding:0;border:none;"><tr>';
	$paged = intval($wp_query->query_vars['paged']);
	if ($paged == 0) $paged = 1;
	$paged--;
	for ($i=0;$i<$wp_query->max_num_pages;$i++) {
		if ($i == $paged) {
			$this_current = 'modcoder_current_page ';
		} else {
			$this_current = '';
		}
		if ($modcoder_ap_options['show_page_title'] == '1') {
			$ttip = trim($modcoder_ap_options['page_title']).' '.($i+1);
		} else {
			$ttip = '';
		}
		if ($i > 0) $dist = ' style="padding:0 0 0 '.$modcoder_ap_options['pagers_dist'].'px;"'; else $dist = ' style="padding:0;"';
		$modcoder_pager .= '<td class="modcoder_button"'.$dist.'><a title="'.$ttip.'" class="modcoder_butno_'.($i+1).' '.$this_current.'modcoder_bw" href="'.get_pagenum_link($i+1).'">'.($i+1).'</a></td>';
	}
	$modcoder_pager .= '</tr></table></div></div>'.$right.$last.'</div>'.$scrollbar.'</div>';
	if (!is_user_logged_in()) {
		file_put_contents($cache_pgr_path.$cache_pgr_file, $modcoder_pager);
		$remove = glob($cache_pgr_path.'*_'.$category.'.pgr');
		foreach ($remove as $remfile) {
			if (file_exists($remfile) && end(explode(DIRECTORY_SEPARATOR, $remfile)) != $cache_pgr_file) unlink($remfile);
		}
	}
	return $modcoder_pager;
}
?>