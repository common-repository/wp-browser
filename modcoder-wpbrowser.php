<?php
/*
Plugin Name: ModCoder WP-Browser
Plugin URI: http://modcoder.org/?ptab=wordpress&item=wpbrowser
Description: Multifunction navigation system for WordPress.
Author: ModCoder
Version: 1.1.6 for WP 2.8+
Author URI: http://www.modcoder.org/
*/

function modcoder_wpbrowser_activate($mode=false) {
	if ($mode) {
		if (file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'cache.dat')) return false;
	}
	$modcoder_pcachever = 'modcoder_pager_cachever';
	$modcoder_pager_cache_ver = get_option($modcoder_pcachever, 'NULL');
	if ($modcoder_pager_cache_ver != 'NULL') {
		$modcoder_pager_cache_ver = intval($modcoder_pager_cache_ver);
		if (!$mode) $modcoder_pager_cache_ver++;
		update_option($modcoder_pcachever, $modcoder_pager_cache_ver);
	} else {
		$modcoder_pager_cache_ver = 1;
		add_option($modcoder_pcachever, $modcoder_pager_cache_ver);
	}
	file_put_contents(dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'cache.dat', serialize(array('charset'=>get_option('blog_charset', 'UTF-8'), 'cache_version'=>$modcoder_pager_cache_ver)));
}
modcoder_wpbrowser_activate(true);
register_activation_hook(__FILE__, 'modcoder_wpbrowser_activate');

if (!function_exists('has_post_thumbnail')) {
	add_theme_support('post-thumbnails');	
}
clearstatcache();
$modcoder_locale = get_locale();
$modcoder_domain = 'modcoder_wpbrowser_1_1';
if (!empty($modcoder_locale)) {
	$modcoder_lfile = dirname(__FILE__).DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.$modcoder_locale.".mo";
	if (@file_exists($modcoder_lfile) && is_readable($modcoder_lfile)) load_textdomain($modcoder_domain, $modcoder_lfile);
}
$modcoder_ap_serial = get_option('modcoder_wpbrowser_serial', '');
$modcoder_ap_registered = false;
$modcoder_ap_plugin_folder = end(explode(DIRECTORY_SEPARATOR,dirname(__FILE__)));
$modcoder_ap_option_name = 'modcoder_wpbrowser';
$modcoder_ap_option_arg = 'modcoder_wpbrowser_genstat';
$modcoder_pcachever = 'modcoder_pager_cachever';
$modcoder_ap_ver = '1.1.6';
$modcoder_plugin_root = dirname(__FILE__);
$modcoder_pager_cache_ver = get_option($modcoder_pcachever, 'NULL');
if ($modcoder_pager_cache_ver == 'NULL') {
	$modcoder_pager_cache_ver = 1;
	add_option($modcoder_pcachever, 1);
} else {
	$modcoder_pager_cache_ver = intval($modcoder_pager_cache_ver);
}
$modcoder_admin_on_site = __('We are working with content. <u>Temporarily disabled</u> the function:<br />', $modcoder_domain);
$modcoder_wpb_fs = chr($modcoder_wpb_fs[0]).chr($modcoder_wpb_fs[1]).chr($modcoder_wpb_fs[2]).chr($modcoder_wpb_fs[3]);
if ($_POST['modcoder_save'] == 'set_defaults' && is_admin()) {
	$modcoder_temp = scandir(dirname(__FILE__).DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'user_images');
	foreach ($modcoder_temp as $modcoder_delfile) {
		if ($modcoder_delfile != '.' && $modcoder_delfile != '..')
		unlink(dirname(__FILE__).DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'user_images'.DIRECTORY_SEPARATOR.$modcoder_delfile);
	}
	unset($modcoder_temp, $modcoder_delfile);
	delete_option($modcoder_ap_option_name);
}
if ($_POST['modcoder_save'] == 'save' && is_admin()) {
	$modcoder_ap_options = unserialize(get_option($modcoder_ap_option_name));
	if ($modcoder_ap_options['ba_thumb_width'] != $_POST['ba_thumb_width']) {
		$modcoder_mask = dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'thumbs'.DIRECTORY_SEPARATOR.'*.jpg';
		$modcoder_mask = glob($modcoder_mask);
		if (sizeof($modcoder_mask) > 0) {
			foreach($modcoder_mask as $modcoder_del) {
				if (file_exists($modcoder_del)) {
					unlink($modcoder_del);
				}
			}
			unset($modcoder_del);
		}
		unset($modcoder_mask);
	}
	if (isset($_FILES)) {
		$modcoder_p2if_url = get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/user_images/';
		$modcoder_p2if = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'wp-content'.DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR.$modcoder_ap_plugin_folder.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'user_images'.DIRECTORY_SEPARATOR;
		$modcoder_counter = -1;
		$modcoder_file_field = '';
		foreach	($_FILES['modcoder_file']['error'] as $modcoder_ferror) {
			$modcoder_counter++;
			switch($modcoder_counter) {
				case 0 : $modcoder_file_field = 'ajax_sonic_gif_uri'; break;
				case 1 : $modcoder_file_field = 'arrow_left_img_uri'; break;
				case 2 : $modcoder_file_field = 'arrow_right_img_uri'; break;
				case 3 : $modcoder_file_field = 'arrow_first_img_uri'; break;
				case 4 : $modcoder_file_field = 'arrow_last_img_uri'; break;
				case 5 : $modcoder_file_field = 'ba_ajax_uri'; break;
			}
			if ($modcoder_ferror == 0) {
				if (file_exists($modcoder_p2if.end(explode('/',$modcoder_ap_options[$modcoder_file_field]))) && trim($modcoder_ap_options[$modcoder_file_field] != '')) {
					unlink($modcoder_p2if.end(explode('/',$modcoder_ap_options[$modcoder_file_field])));
				}
				$modcoder_tfilename = uniqid().'.'.end(explode('.',$_FILES['modcoder_file']['name'][$modcoder_counter]));
				move_uploaded_file($_FILES['modcoder_file']['tmp_name'][$modcoder_counter], $modcoder_p2if.$modcoder_tfilename);
				$modcoder_ap_options[$modcoder_file_field] = $modcoder_p2if_url.$modcoder_tfilename;
			}
		}
	}
	$modcoder_ap_options = array(
		'pager_enable' => trim($_POST['pager_enable']),
		'pager_position' => trim($_POST['pager_position']),
		'pager_at_home' => trim($_POST['pager_at_home']),
		'page_title' => trim($_POST['page_title']),
		'arrow_left_title' => trim($_POST['arrow_left_title']),
		'arrow_right_title' => trim($_POST['arrow_right_title']),
		'arrow_first_title' => trim($_POST['arrow_first_title']),
		'arrow_last_title' => trim($_POST['arrow_last_title']),
		'show_page_title' => trim($_POST['show_page_title']),
		'generate_page_num_from_png' => trim($_POST['generate_page_num_from_png']),
		'show_left_right_arrows' => trim($_POST['show_left_right_arrows']),
		'show_first_last_arrows' => trim($_POST['show_first_last_arrows']),
		'generate_link_titles_posts_on_page_as_links' => trim($_POST['generate_link_titles_posts_on_page_as_links']),
		'enable_scroll_pager' => trim($_POST['enable_scroll_pager']),
		'pager_scroll_count' => trim($_POST['pager_scroll_count']),
		'pager_scroll_animation' => trim($_POST['pager_scroll_animation']),
		'pager_anim_speed' => trim($_POST['pager_anim_speed']),
		'draging_pager' => trim($_POST['draging_pager']),
		'scroll_by_wheel' => trim($_POST['scroll_by_wheel']),
		'enable_ajax_navigation' => trim($_POST['enable_ajax_navigation']),
		'load_jquery_from_google' => trim($_POST['load_jquery_from_google']),
		'disable_jquery' => trim($_POST['disable_jquery']),
		'enable_jquery_noconflict' => trim($_POST['enable_jquery_noconflict']),
		'boundary_of_the_pager' => trim($_POST['boundary_of_the_pager']),
		'blurred_color' => trim($_POST['blurred_color']),
		'enable_ajax_animation' => trim($_POST['enable_ajax_animation']),
		'enable_ajax_sonic' => trim($_POST['enable_ajax_sonic']),
		'ajax_sonic_title' => trim($_POST['ajax_sonic_title']),
		'ajax_sonic_title_color' => trim($_POST['ajax_sonic_title_color']),
		'ajax_sonic_gif_uri' => $modcoder_ap_options['ajax_sonic_gif_uri'],
		'ajax_over_layer' => trim($_POST['ajax_over_layer']),
		'ajax_over_layer_color' => trim($_POST['ajax_over_layer_color']),
		'ajax_over_layer_alfa' => trim($_POST['ajax_over_layer_alfa']),
		'ajax_over_layer_effect' => trim($_POST['ajax_over_layer_effect']),
		'arrows_as' => trim($_POST['arrows_as']),
		'arrow_left_text' => trim($_POST['arrow_left_text']),
		'arrow_right_text' => trim($_POST['arrow_right_text']),
		'arrow_first_text' => trim($_POST['arrow_first_text']),
		'arrow_last_text' => trim($_POST['arrow_last_text']),
		'arrow_left_img_uri' => $modcoder_ap_options['arrow_left_img_uri'],
		'arrow_right_img_uri' => $modcoder_ap_options['arrow_right_img_uri'],
		'arrow_first_img_uri' => $modcoder_ap_options['arrow_first_img_uri'],
		'arrow_last_img_uri' => $modcoder_ap_options['arrow_last_img_uri'],
		'pagers_dist' => trim($_POST['pagers_dist']),
		'pagers_padding' => trim($_POST['pagers_padding']),
		'pagers_hpadding' => trim($_POST['pagers_hpadding']),
		'mono_width_buttons' => trim($_POST['mono_width_buttons']),
		'pager_align' => trim($_POST['pager_align']),
		'top_indent' => trim($_POST['top_indent']),
		'bottom_indent' => trim($_POST['bottom_indent']),
		'pager_width' => trim($_POST['pager_width']),
		'font_family' => trim($_POST['font_family']),
		'other_font' => trim($_POST['other_font']),
		'font_size' => trim($_POST['font_size']),
		'over_underline' => trim($_POST['over_underline']),
		'over_color' => trim($_POST['over_color']),
		'font_weight' => trim($_POST['font_weight']),
		'pager_links_font_color' => trim($_POST['pager_links_font_color']),
		'current_page_font_color' => trim($_POST['current_page_font_color']),
		'arrows_font_weight' => trim($_POST['arrows_font_weight']),
		'type_rect' => trim($_POST['type_rect']),
		'round_rect_radius' => trim($_POST['round_rect_radius']),
		'border_color' => trim($_POST['border_color']),
		'border_width' => trim($_POST['border_width']),
		'background_color' => trim($_POST['background_color']),
		'background_transp' => trim($_POST['background_transp']),
		'background_arrows_transp' => trim($_POST['background_arrows_transp']),
		'over_background_arrows_color' => trim($_POST['over_background_arrows_color']),
		'background_arrows_color' => trim($_POST['background_arrows_color']),
		'over_border_color' => trim($_POST['over_border_color']),
		'over_background_color' => trim($_POST['over_background_color']),
		'current_page_border_color' => trim($_POST['current_page_border_color']),
		'current_page_background_color' => trim($_POST['current_page_background_color']),
		'border_color_ar' => trim($_POST['border_color_ar']),
		'over_border_color_ar' => trim($_POST['over_border_color_ar']),
		'border_style' => trim($_POST['border_style']),
		'ajax_sonic_title_fsize' => trim($_POST['ajax_sonic_title_fsize']),
		'ajax_status_bg_color' => trim($_POST['ajax_status_bg_color']),
		'ajax_status_border_color' => trim($_POST['ajax_status_border_color']),
		'ajax_status_border_width' => trim($_POST['ajax_status_border_width']),
		'ajax_status_indents' => trim($_POST['ajax_status_indents']),
		'ba_enable' => trim($_POST['ba_enable']),
		'ba_width' => trim($_POST['ba_width']),
		'ba_indents' => trim($_POST['ba_indents']),
		'ba_indent_from_pager' => trim($_POST['ba_indent_from_pager']),
		'ba_arrow_height' => trim($_POST['ba_arrow_height']),
		'ba_border_color' => trim($_POST['ba_border_color']),
		'ba_round_corners' => trim($_POST['ba_round_corners']),
		'ba_bg' => trim($_POST['ba_bg']),
		'ba_ajax_uri' => $modcoder_ap_options['ba_ajax_uri'],
		'ba_tfcolor' => trim($_POST['ba_tfcolor']),
		'ba_tfsize' => trim($_POST['ba_tfsize']),
		'ba_fcolor' => trim($_POST['ba_fcolor']),
		'ba_fsize' => trim($_POST['ba_fsize']),
		'ba_hover' => trim($_POST['ba_hover']),
		'ba_hover_radius' => trim($_POST['ba_hover_radius']),
		'ba_hover_bgcolor' => trim($_POST['ba_hover_bgcolor']),
		'ba_hover_bordercolor' => trim($_POST['ba_hover_bordercolor']),
		'ba_thumb_show' => trim($_POST['ba_thumb_show']),
		'ba_thumb_width' => trim($_POST['ba_thumb_width']),
		'ba_thumb_indents' => trim($_POST['ba_thumb_indents']),
		'ba_thumb_pos' => trim($_POST['ba_thumb_pos']),
		'ba_dist' => trim($_POST['ba_dist']),
		'ba_length' => trim($_POST['ba_length']),
		'ba_aslink' => trim($_POST['ba_aslink']),
		'ba_onlyregistered' => trim($_POST['ba_onlyregistered']),
		'scrl_switcher' => trim($_POST['scrl_switcher']),
		'scrl_indent' => trim($_POST['scrl_indent']),
		'scrl_barcol' => trim($_POST['scrl_barcol']),
		'scrl_barcol_asgrid' => trim($_POST['scrl_barcol_asgrid']),
		'scrl_slidercol' => trim($_POST['scrl_slidercol']),
		'scrl_barbordercol' => trim($_POST['scrl_barbordercol']),
		'scrl_sliderbordercol' => trim($_POST['scrl_sliderbordercol']),
		'scrl_height' => trim($_POST['scrl_height']),
		'scrl_radius' => trim($_POST['scrl_radius']),
		'arrows_hide_method' => trim($_POST['arrows_hide_method']),
		'arrows_hide_fade' => trim($_POST['arrows_hide_fade'])
	);
	update_option($modcoder_ap_option_name, serialize($modcoder_ap_options));
} else {
	$modcoder_ap_options = trim(get_option($modcoder_ap_option_name, ''));
	if ($modcoder_ap_options == '' && is_admin()) {
		$modcoder_ap_options = array(
			'pager_enable' => '1', 
			'pager_position' => '2', 
			'pager_at_home' => '0',
			'page_title' => __('Page №', $modcoder_domain),
			'arrow_left_title' => __('Scroll back', $modcoder_domain),
			'arrow_right_title' => __('Scroll next', $modcoder_domain),
			'arrow_first_title' => __('First', $modcoder_domain),
			'arrow_last_title' => __('Last', $modcoder_domain),
			'show_page_title' => '0', 
			'generate_page_num_from_png' => '1', 
			'show_left_right_arrows' => '1',
			'show_first_last_arrows' => '1',
			'generate_link_titles_posts_on_page_as_links' => '0', 
			'enable_scroll_pager' => '1', 
			'pager_scroll_count' => 'auto',
			'pager_scroll_animation' => '0', 
			'pager_anim_speed' => '1', 
			'draging_pager' => '1', 
			'scroll_by_wheel' => '1',
			'enable_ajax_navigation' => '1',
			'load_jquery_from_google' => '0',
			'disable_jquery' => '1', 
			'enable_jquery_noconflict' => '0', 
			'boundary_of_the_pager' => '2', 
			'blurred_color' => '#ffffff',
			'enable_ajax_animation' => '1',
			'enable_ajax_sonic' => '1',
			'ajax_sonic_title' => __('Loading...', $modcoder_domain),
			'ajax_sonic_title_color' => '#000000',
			'ajax_sonic_gif_uri' => get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/defaults/ajax-loader.gif',
			'ajax_over_layer' => '1',
			'ajax_over_layer_color' => '#000000',
			'ajax_over_layer_alfa' => '30',
			'ajax_over_layer_effect' => '1', 
			'arrows_as' => '1', 
			'arrow_left_text' => '&lt;',
			'arrow_right_text' => '&gt;',
			'arrow_first_text' => '&lt;&lt;',
			'arrow_last_text' => '&gt;&gt;',
			'arrow_left_img_uri' => get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/defaults/a_left.gif',
			'arrow_right_img_uri' => get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/defaults/a_right.gif',
			'arrow_first_img_uri' => get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/defaults/a_first.gif',
			'arrow_last_img_uri' => get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/defaults/a_last.gif',
			'pagers_dist' => '5',
			'pagers_padding' => '6',
			'pagers_hpadding' => '3',
			'mono_width_buttons' => '0',
			'pager_align' => '1', 
			'top_indent' => '20', 
			'bottom_indent' => '20', 
			'pager_width' => '70', 
			'font_family' => 'Arial',
			'other_font' => '',
			'font_size' => '20',
			'over_underline' => 'none',
			'over_color' => '#000000',
			'font_weight' => 'bold',
			'pager_links_font_color' => '#000000',
			'current_page_font_color' => '#8a0007',
			'arrows_font_weight' => 'normal',
			'type_rect' => '1', 
			'round_rect_radius' => '5',
			'border_color' => '#360a0a',
			'border_width' => '2',
			'background_color' => '#e0e0e0',
			'background_transp' => '0',
			'background_arrows_transp' => '0',
			'over_background_arrows_color' => '#ffffff',
			'background_arrows_color' => '#ffffff',
			'over_border_color' => '#000000',
			'over_background_color' => '#cce3d9',
			'current_page_border_color' => '#000000',
			'current_page_background_color' => '#ffffff',
			'border_color_ar' => '#ffffff',
			'over_border_color_ar' => '#ffffff',
			'border_style' => 'solid',
			'ajax_sonic_title_fsize' => '10',
			'ajax_status_bg_color' => '#ffffff',
			'ajax_status_border_color' => '#000000',
			'ajax_status_border_width' => '1',
			'ajax_status_indents' => '5',
			'ba_enable' => '1',
			'ba_width' => '250',
			'ba_indents' => '10',
			'ba_indent_from_pager' => '10',
			'ba_arrow_height' => '10',
			'ba_border_color' => '#000000',
			'ba_round_corners' => '5',
			'ba_bg' => '#ffffff',
			'ba_ajax_uri' => get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/defaults/ajax-baloon.gif',
			'ba_tfcolor' => '#000000',
			'ba_tfsize' => '12',
			'ba_fcolor' => '#404040',
			'ba_fsize' => '10',
			'ba_hover' => '1', 
			'ba_hover_radius' => '0',
			'ba_hover_bgcolor' => '#ebebeb',
			'ba_hover_bordercolor' => '#d0d0d0',
			'ba_thumb_show' => '1',
			'ba_thumb_width' => '30',
			'ba_thumb_indents' => '7',
			'ba_thumb_pos' => '0',
			'ba_dist' => '0', 
			'ba_length' => '10',
			'ba_aslink' => '1',
			'ba_onlyregistered' => '0',
			'scrl_switcher' => '1',
			'scrl_indent' => '10',
			'scrl_barcol' => '#737373',
			'scrl_barcol_asgrid' => '1', 
			'scrl_slidercol' => '#000000',
			'scrl_barbordercol' => '',
			'scrl_sliderbordercol' => '',
			'scrl_height' => '10',
			'scrl_radius' => '5',
			'arrows_hide_fade' => '0.7',
			'arrows_hide_method' => '1'
		);
		add_option($modcoder_ap_option_name, serialize($modcoder_ap_options));
		$_POST['modcoder_save'] = 'set_defaults';
	} else {
		$modcoder_ap_options = unserialize($modcoder_ap_options);
	}
}

require 'includes/funcs.php';

function create_scrl_bg_lines() {
	global $modcoder_ap_options, $modcoder_plugin_root;
	for ($i = 0; $i < 5; $i++) {
		$modcoder_image = imagecreatetruecolor(1, $i+1);
		$modcoder_image_uri = dirname(__FILE__).DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'scrl_bg_line_'.($i+1).'.gif';
		for ($j = 0; $j < ($i+1); $j++) {
			imagesetpixel($modcoder_image, 0, $j, imagecolorallocate($modcoder_image, modcoder_hex2rgb($modcoder_ap_options['scrl_barcol'], 'r'), modcoder_hex2rgb($modcoder_ap_options['scrl_barcol'], 'g'), modcoder_hex2rgb($modcoder_ap_options['scrl_barcol'], 'b')));
		}
		if (file_exists($modcoder_image_uri)) unlink($modcoder_image_uri);
		imagegif($modcoder_image, $modcoder_image_uri);
		imagedestroy($modcoder_image);
	}
}

if (($_POST['modcoder_save'] == 'save' || $_POST['modcoder_save'] == 'set_defaults') && is_admin()) {
	modcoder_update_cache_cat();
	$modcoder_bar_uri = dirname(__FILE__).DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'b_arrow.png';
	$modcoder_image = imagecreatefromgif(dirname(__FILE__).DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'b_arrow_base.gif');
	$polygon = array(0,0,29,29,58,0);
	imagefilledpolygon($modcoder_image, $polygon, 3, imagecolorallocate($modcoder_image, modcoder_hex2rgb($modcoder_ap_options['ba_bg'], 'r'), modcoder_hex2rgb($modcoder_ap_options['ba_bg'], 'g'), modcoder_hex2rgb($modcoder_ap_options['ba_bg'], 'b')));
	imageline($modcoder_image,0,0,29,29,imagecolorallocate($modcoder_image, modcoder_hex2rgb($modcoder_ap_options['ba_border_color'], 'r'), modcoder_hex2rgb($modcoder_ap_options['ba_border_color'], 'g'), modcoder_hex2rgb($modcoder_ap_options['ba_border_color'], 'b')));
	imageline($modcoder_image,29,29,58,0,imagecolorallocate($modcoder_image, modcoder_hex2rgb($modcoder_ap_options['ba_border_color'], 'r'), modcoder_hex2rgb($modcoder_ap_options['ba_border_color'], 'g'), modcoder_hex2rgb($modcoder_ap_options['ba_border_color'], 'b')));
	if (file_exists($modcoder_bar_uri)) unlink($modcoder_bar_uri);
	imagepng($modcoder_image, $modcoder_bar_uri);
	imagedestroy($modcoder_image);
	$modcoder_image = imagecreatefromgif(dirname(__FILE__).DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'scrl_bg_template.gif');
	$modcoder_image_uri = dirname(__FILE__).DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'scrl_bg.gif';
	imagesetpixel($modcoder_image, 0, 0, imagecolorallocate($modcoder_image, modcoder_hex2rgb($modcoder_ap_options['scrl_barcol'], 'r'), modcoder_hex2rgb($modcoder_ap_options['scrl_barcol'], 'g'), modcoder_hex2rgb($modcoder_ap_options['scrl_barcol'], 'b')));
	imagesetpixel($modcoder_image, 1, 1, imagecolorallocate($modcoder_image, modcoder_hex2rgb($modcoder_ap_options['scrl_barcol'], 'r'), modcoder_hex2rgb($modcoder_ap_options['scrl_barcol'], 'g'), modcoder_hex2rgb($modcoder_ap_options['scrl_barcol'], 'b')));
	if (file_exists($modcoder_image_uri)) unlink($modcoder_image_uri);
	imagegif($modcoder_image, $modcoder_image_uri);
	imagedestroy($modcoder_image);
	create_scrl_bg_lines();
}

add_action('admin_init', 'modcoder_adminpanel_init');
add_action('wp', 'modcoder_ap_start_catching',0);
add_action('admin_menu', 'modcoder_ap_panel');
add_action('admin_head', 'modcoder_ap_admin_header');

add_action('delete_category', 'modcoder_update_cache_cat');
add_action('edit_category', 'modcoder_update_cache_cat');
add_action('trashed_post', 'modcoder_update_cache');
add_action('deleted_post', 'modcoder_update_cache');
add_action('publish_phone', 'modcoder_update_cache');
add_action('save_post', 'modcoder_update_cache');
add_action('wp_insert_post', 'modcoder_update_cache');
add_action('xmlrpc_publish_post', 'modcoder_update_thumb_cache');


$modcoder_admin_on_site_temp = '';
if ($modcoder_ap_options['enable_ajax_navigation'] == '1') $modcoder_admin_on_site_temp .= '<b>'.__('AJAX Navigation', $modcoder_domain).'</b>';
if ($modcoder_ap_options['ba_enable'] == '1') {
	if ($modcoder_admin_on_site_temp != '') $modcoder_admin_on_site_temp .= __(' and ', $modcoder_domain);
	$modcoder_admin_on_site_temp .= '<b>'.__('Baloon of Announcements', $modcoder_domain).'</b>';
}
if ($modcoder_admin_on_site_temp != '') {
	$modcoder_admin_on_site .= $modcoder_admin_on_site_temp;
} else {
	$modcoder_admin_on_site = '';
}
unset($modcoder_admin_on_site_temp);

function modcoder_cache_add_age() {
	global $modcoder_pager_cache_ver, $modcoder_pcachever, $wp_query;
	if (($modcoder_pager_cache_ver-floor($modcoder_pager_cache_ver/10)*10) == 0) {
		$del_base = dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR;
		$del_files = glob($del_base.'baloons'.DIRECTORY_SEPARATOR.'all'.DIRECTORY_SEPARATOR.'*.bal');
		foreach($del_files as $del_file) {
			if (file_exists($del_file)) unlink($del_file);
		}
		$del_files = glob($del_base.'baloons'.DIRECTORY_SEPARATOR.'registered'.DIRECTORY_SEPARATOR.'*.bal');
		foreach($del_files as $del_file) {
			if (file_exists($del_file)) unlink($del_file);
		}
		$del_files = glob($del_base.'pages'.DIRECTORY_SEPARATOR.'*.pag');
		foreach($del_files as $del_file) {
			if (file_exists($del_file)) unlink($del_file);
		}
		$del_files = glob($del_base.'pagers'.DIRECTORY_SEPARATOR.'*.pgr');
		foreach($del_files as $del_file) {
			if (file_exists($del_file)) unlink($del_file);
		}
	}
	$modcoder_pager_cache_ver++;
	if ($modcoder_pager_cache_ver > 1000000) $modcoder_pager_cache_ver=0;
	update_option($modcoder_pcachever, $modcoder_pager_cache_ver);
	$cache_data = dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'cache.dat';
	file_put_contents($cache_data, serialize(array('charset'=>get_option('blog_charset', 'UTF-8'), 'cache_version'=>$modcoder_pager_cache_ver)));
}

function modcoder_update_cache_cat() {
	modcoder_cache_add_age();
}

function modcoder_update_cache($postid) {
	modcoder_cache_add_age();
	$thumb = dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'thumbs'.DIRECTORY_SEPARATOR.$postid.'.jpg';
	if (file_exists($thumb)) {
		unlink($thumb);
	}
}

if (is_admin()) {
	if ($_POST['option_page'] == 'reading' || isset($_POST['_wpnonce'])) {
		$modcoder_aopage = end(explode('/', $_POST['_wp_http_referer']));
		if ($modcoder_aopage == 'options-reading.php' || $modcoder_aopage == 'options-permalink.php') {
			modcoder_cache_add_age();
		}
	}
}

function modcoder_adminpanel_init() {
	global $modcoder_ap_plugin_folder;
	wp_register_script('modcoder_colorpicker', get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/js/modcoder_excolor/jquery.modcoder.excolor.js');
	wp_enqueue_script('modcoder_colorpicker');
	wp_register_script('modcoder_wpbrowser_admin', get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/js/modcoder-wpbrowser-admin.js');
	wp_enqueue_script('modcoder_wpbrowser_admin');
}

function modcoder_but($intxt = '', $bg_img = '', $link = '', $arrow = '') {
	global $modcoder_ap_options, $modcoder_plugin_root;
	if ($bg_img != '') {
		$temp = $modcoder_plugin_root.DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, array_reverse(array_slice(array_reverse(explode('/',$bg_img)),0,3)));
		$size = getimagesize($temp);
		$style = ' style="width:'.(intval($modcoder_ap_options['pagers_dist'])*2+$size[0]).'px;background-image:url('.$bg_img.');background-position:center;background-repeat:no-repeat;"';
	} else {
		$style = '';
	}
	return $style.'>'.$intxt.'</a>';
}

function modcoder_escape_string_for_js($s) {
	//$s = str_replace(strval(chr(92)), strval(chr(92)).strval(chr(92)), $s);
	//$s = str_replace(strval(chr(39)), strval(chr(92)).strval(chr(39)), $s);
	return $s;
}

function modcoder_ap_admin_header() {
	global $modcoder_ap_plugin_folder;
	echo "\n".'<link rel="stylesheet" type="text/css" href="'.get_bloginfo('siteurl').'/wp-content/plugins/'.$modcoder_ap_plugin_folder.'/css/panel_style.css" />'."\n";
}
 
$modcoder_ap_catch_labels = array();
function modcoder_ap_panel() {
	add_submenu_page('options-general.php', 'ModCoder WP-Browser', 'WP Browser', 8, __FILE__, 'modcoder_wpbrowser_menu');
}

function modcoder_wpbrowser_menu() {
	require 'includes/modcoder-wpbrowser-admin.php';
}

function modcoder_ap_begin_loop() {
	global $modcoder_ap_catch_labels, $modcoder_ap_options;
	$modcoder_ap_catch_labels[] = uniqid();
	echo 'top-mcl'.end($modcoder_ap_catch_labels);
}

function modcoder_ap_end_loop() {
	global $modcoder_ap_catch_labels, $modcoder_ap_options;
	echo 'mcl'.end($modcoder_ap_catch_labels).'-bot';
}

function modcoder_ap_start_catching() {
	global $posts_per_page, $paged, $wp_query, $modcoder_ap_options, $current_user, $modcoder_ap_plugin_folder, $modcoder_pager_cache_ver, $modcoder_domain;
	if ($_POST['modcoder'] == 'modcoder_cat_page_request' && $modcoder_ap_options['pager_enable'] == '1' && is_404()) {
		die('<table width="100%" cellpadding="0" cellspacing="0"><tr><td height="400" align="center" valign="middle" style="text-align:center;vertical-align:middle;"><span style="font-size:50px;">404</span><br /><br /><span style="font-size:30px;text-transform:uppercase;">'.__('Sorry, but this <u>page is not found</u>. Please refresh this page and try again. Thank you!', $modcoder_domain).'</span></td></tr></table>');
	}
	get_currentuserinfo();
	if ($_POST['modcoder'] == 'get_baloon') {
		if (is_404()) {
			die('<center style="font-size:16px;"><b>404</b><br />'.__('Sorry, but this <u>page is not found</u>. Please refresh this page and try again. Thank you!', $modcoder_domain).'</center>');
		} else {
			$category = modcoder_wpb_curcat();
		}
		$paged = intval($wp_query->query_vars['paged']);
		if ($paged == 0) $paged = 1;
		if (is_user_logged_in()) {
			$user = intval($current_user->ID);
		} else {
			$user = 0;
		}
		if (intval($modcoder_ap_options['ba_hover'])==0) {
			$s1 = '<span>';
			$s2 = '</span>';
		} else {
			$s1 = $s2 = '';
		}
		$esize = intval($modcoder_ap_options['ba_length']);
		$ans = '';
		$i = 0;
		foreach ($wp_query->posts as $post) {
			$i++;
			if ($i > 1 && intval($modcoder_ap_options['ba_dist']) > 0) $ans .= '<div class="modcoder_announcement_spacer"></div>';
			$excerpt = '';
			if (trim($post->post_password) != '') {
				$excerpt = '<i>'.__('This post is password protected.', $modcoder_domain).'</i>';
			} else {
				$image = '';
				if ($modcoder_ap_options['ba_thumb_show'] == '1') {
					if (has_post_thumbnail($post->ID)) {
						$image = explode('src="', get_the_post_thumbnail($post->ID));
						$image = explode('"', $image[1]);
						$image = $image[0];
					}
					if ($image == '') {
						$image = explode('<img', $post->post_content);
						if (sizeof($image) > 1) {
							$image = explode('>', $image[1]);
							$image = explode('src="', $image[0]);
							$image = explode('"', $image[1]);
							$image = $image[0];
						} else {
							$image = '';
						}
					}
					$image_fpath = '';
					if ($image != '') {
						$image_fpath = explode('wp-content/', '_'.$image);
						$image_fpath = ABSPATH.'wp-content/'.$image_fpath[1];
						if (!file_exists($image_fpath)) $image = '';
					}
					if ($image != '') {
						$image = str_replace(get_bloginfo('wpurl').'/', ABSPATH, $image);
						$fimage = dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'thumbs'.DIRECTORY_SEPARATOR.$post->ID.'.jpg';
						if (!file_exists($fimage)) {
							$width = intval($modcoder_ap_options['ba_thumb_width']);
							list($old_width, $old_height, $old_type) = getimagesize($image);
							switch($old_type) {
								case 1  : $source = imagecreatefromgif($image); break; // gif
								case 2  : $source = imagecreatefromjpeg($image); break; // jpg
								case 3  : $source = imagecreatefrompng($image); break; // png
								case 6  : $source = imagecreatefromwbmp($image); break; // bmp
							}
							if ($old_width == $old_height) {
								$height = $width;
							} else {
								$height = round($width/($old_width/$old_height));
							}
							$thumb = imagecreatetruecolor($width, $height);
							imagefill($thumb, 0, 0, imagecolorexact($thumb, 255, 255, 255));
							imagecopyresized($thumb, $source, 0, 0, 0, 0, $width, $height, $old_width, $old_height);
							imagejpeg($thumb, $fimage);
							imagedestroy($source);
							imagedestroy($thumb);
						} else {
							$width = getimagesize($fimage);
							$height = intval($width[1]);
							$width = intval($width[0]);
						}
						$image = get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/cache/thumbs/'.$post->ID.'.jpg';
						if ($esize > 0) {
							$attrs = 'width="'.$width.'" height="'.$height.'" border="0"';
							$image = '<img src="'.$image.'" '.$attrs.' />';
						}
					}
				}
				if ($esize > 0) {
					$excerpt = explode(' ', modcoder_clear_str(strip_tags($post->post_content)), $esize+1);
					if (sizeof($excerpt) > intval($modcoder_ap_options['ba_length'])) array_pop($excerpt);
					$excerpt = $image.$s1.implode(' ', $excerpt).'...'.$s2;
				}
			}
			
			if ($modcoder_ap_options['ba_aslink'] == '1') {
				$a_begin = '<a href="'.get_permalink($post->ID).'"';
				$a_end = '</a>';
			} else {
				$a_begin = '<div';
				$a_end = '</div>';
			}
			
			if ($esize > 0) {
				$ans .= $a_begin.' class="modcoder_announcement"><b>'.$post->post_title.'</b><br />'.$excerpt.$a_end;
			} else {
				if ($image == '') {
					$ans .= $a_begin.' class="modcoder_announcement"><b>'.$s1.$post->post_title.$s2.'</b>'.$a_end;
				} else {
					if ($width == $height || $width > $height) {
						$tpos = 'center';
					} elseif ($width < $height) {
						$tpos = 'left top';
					}
					$thumb_w = intval($modcoder_ap_options['ba_thumb_indents']) + $width;
					$ans .= $a_begin.' class="modcoder_announcement"><div class="modcoder_atitle"><table><tr><td><b>'.$s1.$post->post_title.$s2.'</b></td></tr></table></div><div class="modcoder_athumb" style="background:url('.$image.') '.$tpos.' no-repeat;"></div>'.$a_end;
				}
			}
		}
		$fcache = dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'baloons'.DIRECTORY_SEPARATOR;
		switch($user) {
			case 0  :
				$mask = $fcache.'all'.DIRECTORY_SEPARATOR.'*_'.$category.'_'.$paged.'.bal';
				$fcache .= 'all'.DIRECTORY_SEPARATOR.$modcoder_pager_cache_ver.'_'.$category.'_'.$paged.'.bal';
				if (!file_exists($fcache)) {
					$remove = glob($mask);
					if (is_array($remove)) {
						if (sizeof($remove) > 0) {
							foreach ($remove as $remfile) {
								if (file_exists($remfile)) unlink($remfile);
							}
						}
					}
					file_put_contents($fcache, $ans);
				}
			break;
			default :
				$mask = $fcache.'registered'.DIRECTORY_SEPARATOR.'*_'.$user.'.bal';
				$fcache .= 'registered'.DIRECTORY_SEPARATOR.$modcoder_pager_cache_ver.'_'.$user.'.bal';
				if (file_exists($fcache)) {
					$cache = unserialize(file_get_contents($fcache));
				} else {
					$cache = array();
				}
				$cache[$category][$paged] = $ans;
				file_put_contents($fcache, serialize($cache));
				$remove = glob($mask);
				foreach ($remove as $remfile) {
					if (end(explode(DIRECTORY_SEPARATOR, $remfile)) != $modcoder_pager_cache_ver.'_'.$user.'.bal') {
						if (file_exists($remfile)) unlink($remfile);
					}
				}
			break;
		}
		die($ans);
	}
	
	if ($modcoder_ap_options['pager_enable'] == '1' && $wp_query->max_num_pages > 1 && (is_category() || is_tag() || is_archive() || (is_home() && $modcoder_ap_options['pager_at_home']=='1'))) {
		add_action('loop_start', 'modcoder_ap_begin_loop');
		add_action('loop_end', 'modcoder_ap_end_loop');
		add_action('shutdown', 'modcoder_ap_processing_catching',0);
		add_action('wp_head', 'modcoder_ap_header');
		add_action('wp', 'modcoder_wpbrowser_init');
		ob_start(); 
	}
}

function modcoder_wpbrowser_init() {
	global $modcoder_ap_options, $modcoder_ap_plugin_folder;
	if ($modcoder_ap_options['disable_jquery'] == '1' && !is_admin()) {
		switch ($modcoder_ap_options['load_jquery_from_google']) {
			case '0' :
				$jquery = get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/js/jquery-1.6.2.min.js';
			break;
			case '1' :
				$jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js';
			break;
			case '2' :
				$jquery = 'http://ajax.microsoft.com/ajax/jquery/jquery-1.6.2.min.js';
			break;
			case '3' :
				$jquery = 'http://code.jquery.com/jquery-1.6.2.min.js';
			break;
		}
        wp_deregister_script('jquery');
        wp_register_script('jquery', $jquery);
        wp_enqueue_script('jquery');
		if ($modcoder_ap_options['enable_jquery_noconflict'] == '1') {
	        wp_register_script('jquery_noconflict', get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/js/nc.js');
	        wp_enqueue_script('jquery_noconflict');
		}
	}
}    

function modcoder_ap_header() {
	global $modcoder_ap_options, $modcoder_ap_ver, $modcoder_ap_plugin_folder, $wp_query, $current_user, $modcoder_pager_cache_ver, $modcoder_admin_on_site, $modcoder_domain;
	$cache_vars = dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.$modcoder_pager_cache_ver.'_head.var';
	$head_vars = '';
	$ajax_gif_uri = dirname(__FILE__).DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, array_reverse(array_slice(array_reverse(explode('/',$modcoder_ap_options['ajax_sonic_gif_uri'])),0,3)));
	$ajax_gif_size = getimagesize($ajax_gif_uri);
	$head_vars .= "\n\n<!-- ModCoder WP-Browser V. $modcoder_ap_ver BEGIN -->";
	if ($modcoder_ap_options['pager_scroll_count'] == 'auto') {
		$modcoder_ap_options['pager_scroll_count'] = '"'.$modcoder_ap_options['pager_scroll_count'].'"';
	}
	get_currentuserinfo();
	$category = modcoder_wpb_curcat();

	$paged = intval($wp_query->query_vars['paged']);
	if ($paged == 0) $paged = 1;
	$current = $paged;
	if (is_user_logged_in()) {
		$user = intval($current_user->ID);
	} else {
		$user = 0;
	}
	$jscache = array();
	$fcache = dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'baloons'.DIRECTORY_SEPARATOR;
	switch($user) {
		case 0  :
			for($i=0;$i<intval($wp_query->max_num_pages);$i++) {
				$fcache1 = $fcache.'all'.DIRECTORY_SEPARATOR.$modcoder_pager_cache_ver.'_'.$category.'_'.($i+1).'.bal';
				if (file_exists($fcache1)) {
					$cache_temp = str_replace('|',' ', file_get_contents($fcache1));
					$cache_temp = str_replace("\r\n",'', $cache_temp);
					$cache_temp = str_replace("\n",'', $cache_temp);
					$jscache[] = $cache_temp;
				} else $jscache[] = '0';
			}
		break;
		default :
			$fcache .= 'registered'.DIRECTORY_SEPARATOR.$modcoder_pager_cache_ver.'_'.$user.'.bal';
			if (file_exists($fcache)) {
				$cache = unserialize(file_get_contents($fcache));
				for($i=0;$i<intval($wp_query->max_num_pages);$i++) {
					if (isset($cache[$category][$i+1])) {
						$cache_temp = str_replace('|',' ', $cache[$category][$i+1]);
						$cache_temp = str_replace("\r\n",'', $cache_temp);
						$cache_temp = str_replace("\n",'', $cache_temp);
						$jscache[] = $cache_temp;
					} else $jscache[] = '0';
				}
			} else {
				for($i=0;$i<intval($wp_query->max_num_pages);$i++) $jscache[] = '0';
			}
		break;
	}
	$jscache = implode('|', $jscache);
	$js = "\n".'<script type="text/javascript">'."//<![CDATA[\n";
	$js .= "var modcoder_adminonserver='$modcoder_admin_on_site',";
	$js .= "modcoder_wpbrowser_cpnum=".((intval($wp_query->query_vars['paged'])==0)?(1):(intval($wp_query->query_vars['paged']))).",";
	$js .= "modcoder_ham=".$modcoder_ap_options['arrows_hide_method'].",";
	$js .= "modcoder_hamt=".$modcoder_ap_options['arrows_hide_fade'].",";
	$js .= "modcoder_cur_cat='$category',";
	$js .= "modcoder_cur_user=$user,";
	$js .= "modcoder_cur_page=$paged,";
	$js .= "modcoder_cache_version=$modcoder_pager_cache_ver,";
	$js .= 'modcoder_baloon='.$modcoder_ap_options['ba_enable'].',';
	$js .= "modcoder_baloon_cache='$jscache',";
	$js .= 'modcoder_userstatus="'.((is_user_logged_in())?('1'):('0')).'",';
	$js .= 'modcoder_userstatus_confirm="'.((!is_user_logged_in())?(__('\\n\\nYou are logged into your account.\\n\\n\\nWhen the page is loaded you have\\nbeen not logged in and likely to\\ndisplay properly content is recommended\\nto upgrade current page.\\n\\n\\nDo you want refresh the page automatically?\\n\\n\\n', $modcoder_domain)):(__('\\n\\nYou came out of the your account.\\n\\n\\nThis page was loaded at a time when\\nyou have logged in and likely to display\\nproperly content is recommended to upgrade\\ncurrent page.\\n\\n\\nDo you want refresh the page automatically?\\n\\n\\n', $modcoder_domain))).'",';
	$js .= 'modcoder_dist='.$modcoder_ap_options['pagers_dist'].',';
	$js .= 'modcoder_speed='.$modcoder_ap_options['pager_anim_speed'].',';
	$js .= 'modcoder_scroll_type='.$modcoder_ap_options['pager_scroll_animation'].',';
	$js .= 'modcoder_scroll_count='.$modcoder_ap_options['pager_scroll_count'].',';
	$js .= 'modcoder_scroll_count_flag='.$modcoder_ap_options['pager_scroll_count'].',';
	$js .= 'modcoder_fitbut='.$modcoder_ap_options['mono_width_buttons'].',';
	$js .= 'modcoder_bind='.$modcoder_ap_options['pagers_padding'].',';
	$js .= 'modcoder_hbind='.$modcoder_ap_options['pagers_hpadding'].',';
	$js .= 'modcoder_boundary='.$modcoder_ap_options['boundary_of_the_pager'].',';
	$js .= "modcoder_pbgcolor='".$modcoder_ap_options['blurred_color']."',";
	$js .= "modcoder_mousedrag=".$modcoder_ap_options['draging_pager'].",";
	$js .= "modcoder_mousewheel=".$modcoder_ap_options['scroll_by_wheel'].",";
	$js .= "modcoder_ajaxnavi=".$modcoder_ap_options['enable_ajax_navigation'].",";
	$js .= "modcoder_overlay=".$modcoder_ap_options['ajax_over_layer'].",";
	$js .= "modcoder_overlay_effect=".$modcoder_ap_options['ajax_over_layer_effect'].",";
	$js .= "modcoder_overlay_color='".$modcoder_ap_options['ajax_over_layer_color']."',";
	$js .= "modcoder_overlay_transp=1-".$modcoder_ap_options['ajax_over_layer_alfa']."*0.01,";
	$js .= "modcoder_ajax_gif_width=".$ajax_gif_size[0].",";
	$js .= "modcoder_ajax_gif_height=".$ajax_gif_size[1].",";
	$js .= "modcoder_ba_ajax_gif_uri='".$modcoder_ap_options['ba_ajax_uri']."',";
	$js .= "modcoder_ajax_gif_uri='".$modcoder_ap_options['ajax_sonic_gif_uri']."',";
	$js .= "modcoder_ajax_statusbar_indents=".$modcoder_ap_options['ajax_status_indents'].",";
	$js .= "modcoder_ajax_text='".$modcoder_ap_options['ajax_sonic_title']."',";
	$js .= "modcoder_base='".get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder."',";
	$js .= "modcoder_home='".str_replace('http://','www.',get_bloginfo('wpurl'))."',";
	$js .= "modcoder_ieb=false,";
	$js .= "modcoder_ieb_6=false,";
	$js .= "modcoder_pagerw1=".$modcoder_ap_options['pager_width'].",";
	$js .= "modcoder_pagera1=".$modcoder_ap_options['pager_align'].",";
	$js .= "modcoder_current=$current,";
	$js .= "modcoder_scrollbar=".$modcoder_ap_options['scrl_switcher']."; ";
	$js .= "modcoder_baloon_cache=modcoder_baloon_cache.split('|');";
	$js .= "/*@cc_on @if (@_jscript) modcoder_ieb=true; modcoder_ieb_6 = @_jscript_version*1; @end @*/";
	$js .= "\n//]]></script>\n";
	$head_vars .= $js;
	$head_vars .= '<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/js/modcoder-wpbrowser.js"></script>'."\n";
	$head_vars .= '<link rel="stylesheet" type="text/css" media="all" href="'.get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/css/modcoder-wpbrowser.css" />'."\n";
	$style = "<style type=\"text/css\">";

	$modcoder_bw = $modcoder_current_page = $modcoder_arrow_button = $modcoder_bw_radius = '';
	$modcoder_arrow_h = $modcoder_bw_hover = 'color:'.$modcoder_ap_options['over_color'].';text-decoration:'.$modcoder_ap_options['over_underline'].';';
	if ($modcoder_ap_options['type_rect'] != '0') {
			if ($modcoder_ap_options['border_color'] == '') $modcoder_ap_options['border_color'] = '#ffffff';
			if ($modcoder_ap_options['over_border_color'] == '') $modcoder_ap_options['over_border_color'] = '#ffffff';
			if ($modcoder_ap_options['current_page_border_color'] == '') $modcoder_ap_options['current_page_border_color'] = '#ffffff';
			if ($modcoder_ap_options['border_color_ar'] == '') $modcoder_ap_options['border_color_ar'] = '#ffffff';
			if ($modcoder_ap_options['over_border_color_ar'] == '') $modcoder_ap_options['over_border_color_ar'] = '#ffffff';
			$modcoder_bw = 'border:'.$modcoder_ap_options['border_width'].'px '.$modcoder_ap_options['border_style'].' '.$modcoder_ap_options['border_color'].';';
			$modcoder_bw_hover .= 'border:'.$modcoder_ap_options['border_width'].'px '.$modcoder_ap_options['border_style'].' '.$modcoder_ap_options['over_border_color'].';';
			$modcoder_current_page = 'border:'.$modcoder_ap_options['border_width'].'px '.$modcoder_ap_options['border_style'].' '.$modcoder_ap_options['current_page_border_color'].' !important;';
			$modcoder_arrow_button = 'border:'.$modcoder_ap_options['border_width'].'px '.$modcoder_ap_options['border_style'].' '.$modcoder_ap_options['border_color_ar'].';';
			$modcoder_arrow_h .= 'border:'.$modcoder_ap_options['border_width'].'px '.$modcoder_ap_options['border_style'].' '.$modcoder_ap_options['over_border_color_ar'].';';
		if ($modcoder_ap_options['type_rect'] == '1') {
			$modcoder_bw_radius = '-khtml-border-radius:'.$modcoder_ap_options['round_rect_radius'].'px;-moz-border-radius:'.$modcoder_ap_options['round_rect_radius'].'px;-webkit-border-radius:'.$modcoder_ap_options['round_rect_radius'].'px;border-radius:'.$modcoder_ap_options['round_rect_radius'].'px;';
		}
	}
	if ($modcoder_ap_options['background_color'] != '')
		$modcoder_bw .= 'background-color:'.$modcoder_ap_options['background_color'].';';
			else
		$modcoder_bw .= 'background-color:transparent;';
		
	if ($modcoder_ap_options['over_background_color'] != '')
		$modcoder_bw_hover .= 'background-color:'.$modcoder_ap_options['over_background_color'].';';
			else
		$modcoder_bw_hover .= 'background-color:transparent;';
	if ($modcoder_ap_options['current_page_background_color'] != '')
		$modcoder_current_page .= 'background-color:'.$modcoder_ap_options['current_page_background_color'].' !important;';
			else
		$modcoder_current_page .= 'background-color:transparent !important;';
	if ($modcoder_ap_options['background_arrows_color'] != '')
		$modcoder_arrow_button .= 'background-color:'.$modcoder_ap_options['background_arrows_color'].';';
			else
		$modcoder_arrow_button .= 'background-color:transparent;';
	if ($modcoder_ap_options['over_background_arrows_color'] != '')
		$modcoder_arrow_h .= 'background-color:'.$modcoder_ap_options['over_background_arrows_color'].';';
			else
		$modcoder_arrow_h .= 'background-color:transparent;';
	if ($modcoder_ap_options['arrows_as'] == '0')
		$modcoder_arrow_button .= 'padding:0 '.$modcoder_ap_options['pagers_dist'].'px;';
	$mc_fontname = $modcoder_ap_options['font_family'];
	if ($mc_fontname == '0') $mc_fontname = trim($modcoder_ap_options['other_font']);
	if ($mc_fontname == '') $mc_fontname = 'Arial, Helvetica, Sans-serif'; 
	$style .= 'body .modcoder_pager_wrapper a {font-family:'.$mc_fontname.';font-size:'.$modcoder_ap_options['font_size'].'px;font-weight:'.$modcoder_ap_options['font_weight'].';color:'.$modcoder_ap_options['pager_links_font_color'].';line-height:normal;text-decoration:none;'.$modcoder_bw_radius.'}';
	$style .= ' body .modcoder_pager_wrapper a.modcoder_current_page, a.modcoder_current_page:hover {color:'.$modcoder_ap_options['current_page_font_color'].';'.$modcoder_current_page.'}';
	$style .= ' body .modcoder_pager_wrapper a.modcoder_bw {'.$modcoder_bw.'}';
	$style .= ' body .modcoder_pager_wrapper a.modcoder_arrow_button {'.$modcoder_arrow_button.'}';
	$style .= ' body .modcoder_pager_wrapper a.modcoder_bw_hover {'.$modcoder_bw_hover.'}';
	$style .= ' body .modcoder_pager_wrapper a.modcoder_arrow_button_hover {'.$modcoder_arrow_h.'}';
	$ajax_status_ptop = intval($modcoder_ap_options['ajax_status_indents']);
	if ($modcoder_ap_options['enable_ajax_sonic'] == '1') {
		$ajax_status_ptop = $ajax_gif_size[1]+$ajax_status_ptop*2;
		$ajax_status_image = 'background-image:url('.$modcoder_ap_options['ajax_sonic_gif_uri'].');min-width:'.$ajax_gif_size[0].'px;';
	} else {
		$ajax_status_image = '';
	}
	$style .= ' #modcoder_ajax_status_ghost, #modcoder_ajax_status {font-size:'.$modcoder_ap_options['ajax_sonic_title_fsize'].'px;background-color:'.$modcoder_ap_options['ajax_status_bg_color'].';border:'.$modcoder_ap_options['ajax_status_border_width'].'px solid '.$modcoder_ap_options['ajax_status_border_color'].';font-family:'.$mc_fontname.';color:'.$modcoder_ap_options['ajax_sonic_title_color'].';'.$ajax_status_image.'padding: '.$ajax_status_ptop.'px '.$modcoder_ap_options['ajax_status_indents'].'px '.$modcoder_ap_options['ajax_status_indents'].'px '.$modcoder_ap_options['ajax_status_indents'].'px;}';
	if (intval($modcoder_ap_options['ba_round_corners']) > 0)
		$radius = '-khtml-border-radius:'.$modcoder_ap_options['ba_round_corners'].'px;-moz-border-radius:'.$modcoder_ap_options['ba_round_corners'].'px;-webkit-border-radius:'.$modcoder_ap_options['ba_round_corners'].'px;border-radius:'.$modcoder_ap_options['ba_round_corners'].'px;';
			else $radius = '';
	$width = intval($modcoder_ap_options['ba_width'])-2*intval($modcoder_ap_options['ba_indents'])-2;			
	$style .= ' .modcoder_a_baloon {'.$radius.'width:'.$width.'px;padding:'.$modcoder_ap_options['ba_indents'].'px;border:1px solid '.$modcoder_ap_options['ba_border_color'].';background-color:'.$modcoder_ap_options['ba_bg'].';}';
	$style .= ' .modcoder_a_cbaloon, .modcoder_ghost_cbaloon {width:'.$width.'px;}';
	

	if (intval($modcoder_ap_options['ba_hover_radius']) > 0)
		$radius = '-khtml-border-radius:'.$modcoder_ap_options['ba_hover_radius'].'px;-moz-border-radius:'.$modcoder_ap_options['ba_hover_radius'].'px;-webkit-border-radius:'.$modcoder_ap_options['ba_hover_radius'].'px;border-radius:'.$modcoder_ap_options['ba_hover_radius'].'px;';
			else $radius = '';
	if (intval($modcoder_ap_options['ba_hover'])==1) {
		$hover = 'background-color:'.$modcoder_ap_options['ba_hover_bgcolor'].';text-decoration:none;border:1px solid '.$modcoder_ap_options['ba_hover_bordercolor'].';padding:4px;color:'.$modcoder_ap_options['ba_fcolor'].';';
		$css = $radius.'width:'.($width-10).'px;padding:5px;';
	} else {
		$hover = 'text-decoration:none;';
		$css = $radius.'width:'.$width.'px;padding:0;';
	}
	$style .= ' .modcoder_announcement, a.modcoder_announcement {'.$css.'font-family:'.$mc_fontname.';font-size:'.$modcoder_ap_options['ba_fsize'].'px;color:'.$modcoder_ap_options['ba_fcolor'].';}';
	$style .= ' .modcoder_announcement b, a.modcoder_announcement b {font-size:'.$modcoder_ap_options['ba_tfsize'].'px;color:'.$modcoder_ap_options['ba_tfcolor'].';}';
	$style .= ' a.modcoder_announcement:hover {'.$hover.'}';
	switch($modcoder_ap_options['ba_thumb_pos']) {
		case '0' : 
			$image_style = 'float:left;margin: 0 '.$modcoder_ap_options['ba_thumb_indents'].'px 0 0;';
			$image_float = 'left';
			$title_align = 'right';
			$thumb_align = 'left';
		break;
		case '1' : 
			$image_style = 'float:right;margin: 0 0 0 '.$modcoder_ap_options['ba_thumb_indents'].'px;';
			$image_float = 'right'; 
			$title_align = 'left';
			$thumb_align = 'right'; 
		break;
	}
	$style .= ' .modcoder_announcement img {'.$image_style.'}';
	$style .= ' .modcoder_announcement div.modcoder_athumb {width:'.$modcoder_ap_options['ba_thumb_width'].'px;height:'.$modcoder_ap_options['ba_thumb_width'].'px;float:'.$thumb_align.';}';	
	$style .= ' .modcoder_announcement div.modcoder_atitle {width:'.($width-10-intval($modcoder_ap_options['ba_thumb_width'])-intval($modcoder_ap_options['ba_thumb_indents'])).'px;float:'.$title_align.';}';
	$style .= ' .modcoder_announcement td {height:'.$modcoder_ap_options['ba_thumb_width'].'px;}';	
	$style .= ' .modcoder_announcement_spacer {height:'.$modcoder_ap_options['ba_dist'].'px;}';
	$ajax_baloon_size = getimagesize(dirname(__FILE__).DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, array_reverse(array_slice(array_reverse(explode('/',$modcoder_ap_options['ba_ajax_uri'])),0,3))));
	$style .= ' .modcoder_a_baloon_ajax {height:'.$ajax_baloon_size[1].'px;background:url('.$modcoder_ap_options['ba_ajax_uri'].') center no-repeat;}';
	$style .= ' .modcoder_baloon {width:'.$modcoder_ap_options['ba_width'].'px;}';
	$style .= ' .modcoder_baloon_arrow {height:'.$modcoder_ap_options['ba_arrow_height'].'px;padding:0 0 '.$modcoder_ap_options['ba_indent_from_pager'].'px 0;background:url('.get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/b_arrow.png) '.round((intval($modcoder_ap_options['ba_width'])-59)/2).'px '.(intval($modcoder_ap_options['ba_arrow_height'])-30).'px no-repeat;}';

	switch($modcoder_ap_options['scrl_barcol_asgrid']) {
		case '0' : 
			if (trim($modcoder_ap_options['scrl_barcol']) == '') {
				$bg = 'transparent';
			} else {
				$bg = $modcoder_ap_options['scrl_barcol'];
			}
			$bg_hover = $modcoder_ap_options['scrl_barhovercol'];
		break;
		case '1' : 
			$bg = 'url('.get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/scrl_bg.gif) repeat';
			$bg_hover = 'url('.get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/scrl_bg_hover.gif) repeat';
		break;
		case '2' : 
			$bg = 'url('.get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/scrl_bg_line_1.gif) center repeat-x';
			$modcoder_ap_options['scrl_barbordercol'] = '';
		break;
		case '3' : 
			$bg = 'url('.get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/scrl_bg_line_2.gif) center repeat-x';
			$modcoder_ap_options['scrl_barbordercol'] = '';
		break;
		case '4' : 
			$bg = 'url('.get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/scrl_bg_line_3.gif) center repeat-x';
			$modcoder_ap_options['scrl_barbordercol'] = '';
		break;
		case '5' : 
			$bg = 'url('.get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/scrl_bg_line_4.gif) center repeat-x';
			$modcoder_ap_options['scrl_barbordercol'] = '';
		break;
		case '6' : 
			$bg = 'url('.get_bloginfo('wpurl').'/wp-content/plugins'.'/'.$modcoder_ap_plugin_folder.'/images/scrl_bg_line_5.gif) center repeat-x';
			$modcoder_ap_options['scrl_barbordercol'] = '';
		break;
	}
	if (intval($modcoder_ap_options['scrl_radius']) > 0)
		$radius = '-khtml-border-radius:'.$modcoder_ap_options['scrl_radius'].'px;-moz-border-radius:'.$modcoder_ap_options['scrl_radius'].'px;-webkit-border-radius:'.$modcoder_ap_options['scrl_radius'].'px;border-radius:'.$modcoder_ap_options['scrl_radius'].'px;';
			else $radius = '';
	if (trim($modcoder_ap_options['scrl_barbordercol']) == '') {
		$bp = 'border:none;padding:1px;';
	} else {
		$bp = 'border: 1px solid '.trim($modcoder_ap_options['scrl_barbordercol']).';padding:0;';
	}		
	
	$style .= ' .modcoder_scrl_ghost {height:'.(intval($modcoder_ap_options['scrl_height'])-2).'px;}';
	$style .= ' .modcoder_scrl_wrapper {padding-top:'.$modcoder_ap_options['scrl_indent'].'px;}';
	$style .= ' .modcoder_scrl_bar {'.$bp.'background:'.$bg.';height:'.(intval($modcoder_ap_options['scrl_height'])-2).'px;'.$radius.'}';
	
	if (trim($modcoder_ap_options['scrl_sliderbordercol']) == '') {
		$bp = 'border:none;padding:1px;';
	} else {
		$bp = 'border: 1px solid '.trim($modcoder_ap_options['scrl_sliderbordercol']).';padding:0;';
	}
	if (trim($modcoder_ap_options['scrl_slidercol']) == '') {
		$sbsbg = 'transparent';
	} else {
		$sbsbg = trim($modcoder_ap_options['scrl_slidercol']);
	}	
	$style .= ' .modcoder_scrl_slider {'.$bp.'background-color:'.$sbsbg.';height:'.(intval($modcoder_ap_options['scrl_height'])-4).'px;'.$radius.'}';

	
	$style .= " </style>";
	$head_vars .= $style; 
	$head_vars .= "\n<!-- ModCoder WP-Browser V. $modcoder_ap_ver END --> \n\n";
	echo $head_vars;
}

function modcoder_ap_processing_catching() { 
	global $modcoder_ap_options, $modcoder_ap_catch_labels, $wp_query, $modcoder_pager_cache_ver;
	$html = ob_get_clean();
	$temp = $modcoder_ap_catch_labels;
	$modcoder_ap_catch_labels = array();
	foreach($temp as $temp1) {
		if (sizeof(explode($temp1,$html))==3) {
			$modcoder_ap_catch_labels[] = $temp1;
		} else {
			$html = str_replace(array('top-mcl'.$temp1,'mcl'.$temp1.'-bot'),'',$html);
		}
	}
	if (sizeof($modcoder_ap_catch_labels) > 0) {
		
		$temp = 0;
		$txt = $plab = '';
		foreach ($modcoder_ap_catch_labels as $lab) {
			$temp_s = modcoder_get_block($html, $lab);
			if (strlen($temp_s) > $temp) {
				$temp = strlen($temp_s);
				$txt = $temp_s;
				$plab = $lab;
			}
		}
		if ($_POST['modcoder'] == 'modcoder_cat_page_request') { 
			$html = $txt;
			if (!is_user_logged_in()) {
				$category = modcoder_wpb_curcat();
				$paged = intval($wp_query->query_vars['paged']);
				if ($paged == 0) $paged = 1;
				$cache_page_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR;
				$cache_page_file = $modcoder_pager_cache_ver.'_'.$category.'_'.$paged.'.pag';
				file_put_contents($cache_page_path.$cache_page_file, modcoder_clear_str($html));
				$remove = glob($cache_page_path.'*_'.$category.'_'.$paged.'.pag');
				foreach ($remove as $remfile) {
					if (file_exists($remfile) && end(explode(DIRECTORY_SEPARATOR, $remfile)) != $cache_page_file) unlink($remfile);
				}
			}
		} else {
			if (strlen($txt) > 1000) {
				$pager_temp = modcoder_pager_html();
				switch ($modcoder_ap_options['pager_position']) {
					case '1' :
						$html = str_replace('top-mcl'.$plab, $pager_temp.'<div id="mod_coder_content_wrapper">', $html);
						$html = str_replace('mcl'.$plab.'-bot', '</div>', $html);
					break;
					case '2' :
						$html = str_replace('top-mcl'.$plab, '<div id="mod_coder_content_wrapper">', $html);
						$html = str_replace('mcl'.$plab.'-bot', '</div>'.$pager_temp, $html);
					break;
	
					case '3' :
						$html = str_replace('top-mcl'.$plab, $pager_temp.'<div id="mod_coder_content_wrapper">', $html);
						$html = str_replace('mcl'.$plab.'-bot', '</div>'.$pager_temp, $html);
					break;
				}
				unset($pager_temp);
			}
			foreach ($modcoder_ap_catch_labels as $lab) {
				$html = str_replace('top-mcl'.$lab, '', $html);
				$html = str_replace('mcl'.$lab.'-bot', '', $html);
			}
		}
	}
	echo $html;
}

?>