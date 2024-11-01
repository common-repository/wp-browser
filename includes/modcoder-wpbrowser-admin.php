<?php
global $modcoder_ap_plugin_folder, $modcoder_ap_options, $modcoder_plugin_root, $modcoder_ap_ver, $modcoder_ap_serial, $modcoder_ap_registered, $modcoder_domain;
if (isset($_POST['mc_current_tab'])) $modcoder_curtab = intval($_POST['mc_current_tab']); else $modcoder_curtab = 1;
?>
<script type="text/javascript">
//<![CDATA[
	var modcoder_base='<?=plugins_url().'/'.$modcoder_ap_plugin_folder;?>';
	var modcoder_ipvg = new Image();
	modcoder_ipvg.src = modcoder_base+'/images/ajax-reg.gif';
	var modcoder_current_tab = <?=$modcoder_curtab;?>;
	var modcoder_saved = '<?=$_POST['modcoder_save'];?>';
	var modcoder_defaults_message = '<?=modcoder_escape_string_for_js(__('Set default values?',$modcoder_domain));?>';
	var modcoder_data = Array();
	modcoder_data['pager_enable'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pager_enable']);?>';
	modcoder_data['pager_position'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pager_position']);?>';
	modcoder_data['pager_at_home'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pager_at_home']);?>';
	modcoder_data['page_title'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['page_title']);?>';
	modcoder_data['arrow_left_title'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_left_title']);?>';
	modcoder_data['arrow_right_title'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_right_title']);?>';
	modcoder_data['arrow_first_title'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_first_title']);?>';
	modcoder_data['arrow_last_title'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_last_title']);?>';
	modcoder_data['show_page_title'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['show_page_title']);?>';
	modcoder_data['show_left_right_arrows'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['show_left_right_arrows']);?>';
	modcoder_data['show_first_last_arrows'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['show_first_last_arrows']);?>';
	modcoder_data['enable_scroll_pager'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['enable_scroll_pager']);?>';
	modcoder_data['pager_scroll_count'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pager_scroll_count']);?>';
	modcoder_data['pager_scroll_animation'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pager_scroll_animation']);?>';
	modcoder_data['pager_anim_speed'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pager_anim_speed']);?>';
	modcoder_data['draging_pager'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['draging_pager']);?>';
	modcoder_data['scroll_by_wheel'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['scroll_by_wheel']);?>';
	modcoder_data['enable_ajax_navigation'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['enable_ajax_navigation']);?>';
	modcoder_data['load_jquery_from_google'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['load_jquery_from_google']);?>';
	modcoder_data['disable_jquery'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['disable_jquery']);?>';
	modcoder_data['enable_jquery_noconflict'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['enable_jquery_noconflict']);?>';
	modcoder_data['boundary_of_the_pager'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['boundary_of_the_pager']);?>';
	modcoder_data['blurred_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['blurred_color']);?>';
	modcoder_data['enable_ajax_animation'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['enable_ajax_animation']);?>';
	modcoder_data['enable_ajax_sonic'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['enable_ajax_sonic']);?>';
	modcoder_data['ajax_sonic_title'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_sonic_title']);?>';
	modcoder_data['ajax_sonic_title_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_sonic_title_color']);?>';
	modcoder_data['ajax_sonic_gif_uri'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_sonic_gif_uri']);?>';
	modcoder_data['ajax_over_layer'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_over_layer']);?>';
	modcoder_data['ajax_over_layer_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_over_layer_color']);?>';
	modcoder_data['ajax_over_layer_alfa'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_over_layer_alfa']);?>';
	modcoder_data['ajax_over_layer_effect'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_over_layer_effect']);?>';
	modcoder_data['arrows_as'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrows_as']);?>';
	modcoder_data['arrow_left_text'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_left_text']);?>';
	modcoder_data['arrow_right_text'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_right_text']);?>';
	modcoder_data['arrow_first_text'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_first_text']);?>';
	modcoder_data['arrow_last_text'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_last_text']);?>';
	modcoder_data['arrow_left_img_uri'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_left_img_uri']);?>';
	modcoder_data['arrow_right_img_uri'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_right_img_uri']);?>';
	modcoder_data['arrow_first_img_uri'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_first_img_uri']);?>';
	modcoder_data['arrow_last_img_uri'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrow_last_img_uri']);?>';
	modcoder_data['pagers_dist'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pagers_dist']);?>';
	modcoder_data['pagers_padding'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pagers_padding']);?>';
	modcoder_data['pagers_hpadding'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pagers_hpadding']);?>';
	modcoder_data['mono_width_buttons'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['mono_width_buttons']);?>';
	modcoder_data['pager_align'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pager_align']);?>';
	modcoder_data['top_indent'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['top_indent']);?>';
	modcoder_data['bottom_indent'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['bottom_indent']);?>';
	modcoder_data['pager_width'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pager_width']);?>';
	modcoder_data['font_family'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['font_family']);?>';
	modcoder_data['other_font'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['other_font']);?>';
	modcoder_data['font_size'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['font_size']);?>';
	modcoder_data['over_underline'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['over_underline']);?>';
	modcoder_data['over_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['over_color']);?>';
	modcoder_data['font_weight'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['font_weight']);?>';
	modcoder_data['pager_links_font_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['pager_links_font_color']);?>';
	modcoder_data['current_page_font_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['current_page_font_color']);?>';
	modcoder_data['arrows_font_weight'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrows_font_weight']);?>';
	modcoder_data['type_rect'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['type_rect']);?>';
	modcoder_data['round_rect_radius'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['round_rect_radius']);?>';
	modcoder_data['border_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['border_color']);?>';
	modcoder_data['border_width'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['border_width']);?>';
	modcoder_data['background_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['background_color']);?>';
	modcoder_data['background_transp'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['background_transp']);?>';
	modcoder_data['background_arrows_transp'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['background_arrows_transp']);?>';
	modcoder_data['over_background_arrows_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['over_background_arrows_color']);?>';
	modcoder_data['background_arrows_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['background_arrows_color']);?>';
	modcoder_data['over_border_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['over_border_color']);?>';
	modcoder_data['over_background_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['over_background_color']);?>';
	modcoder_data['current_page_border_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['current_page_border_color']);?>';
	modcoder_data['border_color_ar'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['border_color_ar']);?>';
	modcoder_data['over_border_color_ar'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['over_border_color_ar']);?>';
	modcoder_data['current_page_background_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['current_page_background_color']);?>';
	modcoder_data['border_style'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['border_style']);?>';
	modcoder_data['ajax_sonic_title_fsize'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_sonic_title_fsize']);?>';
	modcoder_data['ajax_status_bg_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_status_bg_color']);?>';
	modcoder_data['ajax_status_border_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_status_border_color']);?>';
	modcoder_data['ajax_status_border_width'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_status_border_width']);?>';
	modcoder_data['ajax_status_indents'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ajax_status_indents']);?>';
	modcoder_data['ba_enable'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_enable']);?>';
	modcoder_data['ba_width'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_width']);?>';
	modcoder_data['ba_indents'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_indents']);?>';
	modcoder_data['ba_indent_from_pager'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_indent_from_pager']);?>';
	modcoder_data['ba_arrow_height'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_arrow_height']);?>';
	modcoder_data['ba_border_color'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_border_color']);?>';
	modcoder_data['ba_round_corners'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_round_corners']);?>';
	modcoder_data['ba_bg'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_bg']);?>';
	modcoder_data['ba_ajax_uri'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_ajax_uri']);?>';
	modcoder_data['ba_tfcolor'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_tfcolor']);?>';
	modcoder_data['ba_tfsize'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_tfsize']);?>';
	modcoder_data['ba_fcolor'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_fcolor']);?>';
	modcoder_data['ba_fsize'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_fsize']);?>';
	modcoder_data['ba_hover'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_hover']);?>';
	modcoder_data['ba_hover_bgcolor'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_hover_bgcolor']);?>';
	modcoder_data['ba_hover_bordercolor'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_hover_bordercolor']);?>';
	modcoder_data['ba_thumb_show'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_thumb_show']);?>';
	modcoder_data['ba_thumb_width'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_thumb_width']);?>';
	modcoder_data['ba_thumb_indents'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_thumb_indents']);?>';
	modcoder_data['ba_thumb_pos'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_thumb_pos']);?>';
	modcoder_data['ba_dist'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_dist']);?>';
	modcoder_data['ba_length'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_length']);?>';
	modcoder_data['ba_aslink'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_aslink']);?>';
	modcoder_data['ba_onlyregistered'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_onlyregistered']);?>';
	modcoder_data['ba_hover_radius'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['ba_hover_radius']);?>';
	
	modcoder_data['scrl_switcher'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['scrl_switcher']);?>';
	modcoder_data['scrl_indent'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['scrl_indent']);?>';
	modcoder_data['scrl_barcol'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['scrl_barcol']);?>';
	modcoder_data['scrl_barcol_asgrid'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['scrl_barcol_asgrid']);?>'; 
	modcoder_data['scrl_slidercol'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['scrl_slidercol']);?>';
	modcoder_data['scrl_barbordercol'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['scrl_barbordercol']);?>';
	modcoder_data['scrl_sliderbordercol'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['scrl_sliderbordercol']);?>';
	modcoder_data['scrl_height'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['scrl_height']);?>';
	modcoder_data['scrl_radius'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['scrl_radius']);?>';
	modcoder_data['arrows_hide_fade'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrows_hide_fade']);?>';
	modcoder_data['arrows_hide_method'] = '<?=modcoder_escape_string_for_js($modcoder_ap_options['arrows_hide_method']);?>';
//]]>
</script>
<div class="wrap" style="padding-top:10px;">
<div id="modcoder_logo" style="width:500px;">
	<div id="modcoder_messages">
	<div>
	<?php if (!$modcoder_ap_registered) { ?>
	<?=__('Please help the project,',$modcoder_domain);?> <a href="http://modcoder.org/?page=register#wordpress_wpbrowser" target="_blank"><?=__('register',$modcoder_domain);?></a> <?=__('this plugin.',$modcoder_domain);?><br />
	<?=__('Serial number',$modcoder_domain);?>:&nbsp;&nbsp;&nbsp;<span style="background-position:-42px -10px;" id="modcoder_pager_serial_wrap"><input class="modcoder_pager_serial" id="modcoder_pager_serial_field" type="text" maxlength="7" size="15" style="text-align:center;" /> <input class="modcoder_pager_serial" id="modcoder_pager_serial_but" type="button" value="Send" /></span>
	<?php } ?>
	</div>
	</div>
	<div id="modcoder_pname"><b>WP-Browser <?=$modcoder_ap_ver; ?></b> <?php if (!$modcoder_ap_registered) { ?><font style="font-size:12px;" color="red"><?=__('unregistered',$modcoder_domain);?></font><?php } else { ?><font style="font-size:12px;" color="green"><?=__('registered',$modcoder_domain);?></font><?php } ?></div>
</div>

<div>
	<?php
	$modcoder_chmod_error = '';
	if (!is_writable($modcoder_plugin_root.DIRECTORY_SEPARATOR.'images')) {
		$modcoder_chmod_error .= '<li>'.$modcoder_plugin_root.DIRECTORY_SEPARATOR.'<b>images</b></li>';
	}	
	if (!is_writable($modcoder_plugin_root.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'user_images')) {
		$modcoder_chmod_error .= '<li>'.$modcoder_plugin_root.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'<b>user_images</b></li>';
	}	
	if (!is_writable($modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache')) {
		$modcoder_chmod_error .= '<li>'.$modcoder_plugin_root.DIRECTORY_SEPARATOR.'<b>cache</b></li>';
	}	
	if (!is_writable($modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'baloons')) {
		$modcoder_chmod_error .= '<li>'.$modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'<b>baloons</b></li>';
	}	
	if (!is_writable($modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'baloons'.DIRECTORY_SEPARATOR.'all')) {
		$modcoder_chmod_error .= '<li>'.$modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'baloons'.DIRECTORY_SEPARATOR.'<b>all</b></li>';
	}	
	if (!is_writable($modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'baloons'.DIRECTORY_SEPARATOR.'registered')) {
		$modcoder_chmod_error .= '<li>'.$modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'baloons'.DIRECTORY_SEPARATOR.'<b>registered</b></li>';
	}	
	if (!is_writable($modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'thumbs')) {
		$modcoder_chmod_error .= '<li>'.$modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'<b>thumbs</b></li>';
	}	
	if (!is_writable($modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'pagers')) {
		$modcoder_chmod_error .= '<li>'.$modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'<b>pagers</b></li>';
	}	
	if (!is_writable($modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'pages')) {
		$modcoder_chmod_error .= '<li>'.$modcoder_plugin_root.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'<b>pages</b></li>';
	}
	if ($modcoder_chmod_error != '') {
		echo '<div class="modcoder_apepan"><b style="color:red;">'.__('Attention!',$modcoder_domain).'</b> <span style="color:maroon;">'.__('Folders below are write-protected. Please setup them permissions as writeable.<br />For example: 777 or 775 or 755. These folders are needed for user preferences and cache.',$modcoder_domain).'</span><br /><ul id="modcoder_set_asw">'.$modcoder_chmod_error.'</ul></div>';
	}

?>
</div>

<form name="modcoder_ajaxpager_editor" method="post" enctype="multipart/form-data" id="modcoder_form"><input type="hidden" name="mc_current_tab" />
<table width="600" class="modcoder_tabs" cellpadding="0" cellspacing="0">
<tr>
	<td num="1" class="modcoder_tab">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="modcoder_tab1">&nbsp;</td>
				<td class="modcoder_tab2"><img src="<?=get_bloginfo('siteurl').'/wp-content/plugins/'.$modcoder_ap_plugin_folder.'/images/cog.png';?>" /> <span><?=__('Options',$modcoder_domain);?></span></td>
				<td class="modcoder_tab3">&nbsp;</td>
			</tr>
		</table>
	</td>
	<td num="2" class="modcoder_tab">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="modcoder_tab1">&nbsp;</td>
				<td class="modcoder_tab2"><img src="<?=get_bloginfo('siteurl').'/wp-content/plugins/'.$modcoder_ap_plugin_folder.'/images/palette.png';?>" /> <span><?=__('Design',$modcoder_domain);?></span></td>
				<td class="modcoder_tab3">&nbsp;</td>
			</tr>
		</table>
	</td>
	<td num="3" class="modcoder_tab">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="modcoder_tab1">&nbsp;</td>
				<td class="modcoder_tab2"><img src="<?=get_bloginfo('siteurl').'/wp-content/plugins/'.$modcoder_ap_plugin_folder.'/images/star.png';?>" /> <span><?=__('Additionally',$modcoder_domain);?></span></td>
				<td class="modcoder_tab3">&nbsp;</td>
			</tr>
		</table>
	</td>
	<td class="modcoder_tab_last">&nbsp;</td>
</tr>
<tr id="modcoder_tab_sets">
	<td class="modcoder_tabcontent" colspan="4">
		<div id="modcoder_savealert" style="display:none;"><?=__('Changes saved !',$modcoder_domain);?></div>
		<div num="1" class="modcoder_tabcontent_panel" style="display:none;">
			<div class="modcoder_optgroup"><?=__('plugin switch',$modcoder_domain);?></div>
			<?=__('State of plugin',$modcoder_domain);?>&nbsp;
			<select name="pager_enable" size="1">
				<option value="1"><?=__('Enabled',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disabled',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<div class="modcoder_optgroup"><?=__('configuration',$modcoder_domain);?></div>
			<?=__('Using at the home page',$modcoder_domain);?>&nbsp;
			<select name="pager_at_home" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<?=__('Position',$modcoder_domain);?>&nbsp;
			<select name="pager_position" size="1">
				<option value="1"><?=__('Above posts',$modcoder_domain);?>&nbsp;</option>
				<option value="2"><?=__('Under the posts',$modcoder_domain);?>&nbsp;</option>
				<option value="3"><?=__('Both positions',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<?=__('AJAX navigation (this option is not supported in IE6)',$modcoder_domain);?>&nbsp;
			<select name="enable_ajax_navigation" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<?=__('Baloon of Announcements',$modcoder_domain);?>&nbsp;
			<select name="ba_enable" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<?=__('Scrollbar',$modcoder_domain);?>&nbsp;
			<select name="scrl_switcher" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<?=__('Show Tooltips',$modcoder_domain);?>&nbsp;
			<select name="show_page_title" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<div class="modcoder_hide_wrapper modcoder_hide_1">
			<?=__('Tooltip text on the buttons',$modcoder_domain);?>&nbsp;
			<input name="page_title" type="text" size="20" maxlength="100" /><br />
			<?=__('Tooltip on arrow',$modcoder_domain);?> &laquo;<?=__('PREV',$modcoder_domain);?>&raquo;&nbsp;
			<input name="arrow_left_title" type="text" size="20" maxlength="100" /><br />
			<?=__('Tooltip on arrow',$modcoder_domain);?> &laquo;<?=__('NEXT',$modcoder_domain);?>&raquo;&nbsp;
			<input name="arrow_right_title" type="text" size="20" maxlength="100" /><br />
			<?=__('Tooltip on arrow',$modcoder_domain);?> &laquo;<?=__('FIRST',$modcoder_domain);?>&raquo;&nbsp;
			<input name="arrow_first_title" type="text" size="20" maxlength="100" /><br />
			<?=__('Tooltip on arrow',$modcoder_domain);?> &laquo;<?=__('LAST',$modcoder_domain);?>&raquo;&nbsp;
			<input name="arrow_last_title" type="text" size="20" maxlength="100" /><br />
			</div>
			<?=__('Arrows',$modcoder_domain);?> &laquo;<?=__('PREV',$modcoder_domain);?>&raquo; <?=__('and',$modcoder_domain);?> &laquo;<?=__('NEXT',$modcoder_domain);?>&raquo; &nbsp;
			<select name="show_left_right_arrows" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<?=__('Arrows',$modcoder_domain);?> &laquo;<?=__('FIRST',$modcoder_domain);?>&raquo; <?=__('and',$modcoder_domain);?> &laquo;<?=__('LAST',$modcoder_domain);?>&raquo; &nbsp;
			<select name="show_first_last_arrows" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
	
			<div class="modcoder_optgroup"><?=__('scrolling',$modcoder_domain);?></div>
			<input name="enable_scroll_pager" type="hidden" />
			<!--
			<?=__('Dynamic scrolling pager',$modcoder_domain);?>&nbsp;
			<select name="enable_scroll_pager" size="1">
				<option value="1"><?=__('Enabled',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disabled',$modcoder_domain);?>&nbsp;</option>
			</select><br /> -->
			
			<div class="modcoder_hide_wrapper modcoder_hide_2">
			<?=__('Number of buttons for scrolling',$modcoder_domain);?>&nbsp;
			<select name="pager_scroll_count" size="1">
				<option value="auto">auto&nbsp;</option><?php for ($i=1;$i<101;$i++) echo '<option value="'.$i.'">'.$i.'&nbsp;</option>'; ?>
			</select><br />
			<?=__('Type of scroll',$modcoder_domain);?>&nbsp;
			<select name="pager_scroll_animation" size="1">
				<option value="0"><?=__('Smooth scrolling',$modcoder_domain);?>&nbsp;</option>
				<option value="1"><?=__('Fast scroll',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<?=__('Scroll speed (1 - fastest)',$modcoder_domain);?>&nbsp;
			<select name="pager_anim_speed" size="1">
				<?php for ($i=1;$i<101;$i++) echo '<option value="'.($i*0.1).'">'.$i.'&nbsp;</option>'; ?>
			</select><br />
			<?=__('Scrolling by dragging the mouse',$modcoder_domain);?>&nbsp;
			<select name="draging_pager" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<?=__('Scrolling by mouse wheel',$modcoder_domain);?>&nbsp;
			<select name="scroll_by_wheel" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			</div>
			<div class="modcoder_optgroup">JQuery</div>
			<?=__('JQuery',$modcoder_domain);?>&nbsp;
			<select name="disable_jquery" size="1">
				<option value="1"><?=__('Enabled',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disabled (if JQuery is already connected from the other plugins or in your theme)',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<div class="modcoder_hide_wrapper modcoder_hide_13">
			<?=__('Load JQuery from...',$modcoder_domain);?>&nbsp;
			<select name="load_jquery_from_google" size="1">
				<option value="0"><?=__('Your site',$modcoder_domain);?>&nbsp;</option>
				<option value="1">Google&nbsp;</option>
				<option value="2">Microsoft&nbsp;</option>
				<option value="3">JQuery&nbsp;</option>
			</select><br />
			<?=__('Compatibility with other JS frameworks',$modcoder_domain);?>&nbsp;
			<select name="enable_jquery_noconflict" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			</div>
		</div>
		<div num="2" class="modcoder_tabcontent_panel" style="display:none;">
			<div class="modcoder_optgroup"><?=__('the boundaries',$modcoder_domain);?></div>
			<div class="modcoder_bounders">
				<span><?=__('Type of boundaries',$modcoder_domain);?>:</span><div title="<?=__('Strong',$modcoder_domain);?>" num="0" class="modcoder_bstrong modcoder_bselected"></div><div title="<?=__('Auto',$modcoder_domain);?>" num="1" class="modcoder_bintelect"></div><div title="<?=__('Smooth',$modcoder_domain);?>" num="2" class="modcoder_bfade"></div><input name="boundary_of_the_pager" type="hidden" />
			</div>
			<div class="modcoder_bgcolf modcoder_bgcolf1">
			<div>
			<?=__('The background color under the WP-BROWSER',$modcoder_domain);?>&nbsp;
			<input name="blurred_color" class="needexample_4_blurred_color" type="text" size="12" maxlength="7" />
			</div>
			<div class="mcbgft"><div id="mcbgft_sbg"></div></div>
			</div>
			<div class="modcoder_optgroup"><?=__('animation of the AJAX navigation',$modcoder_domain);?></div>
			<b><?=__('AJAX Status',$modcoder_domain);?></b><br />
			<?=__('Use image on AJAX status',$modcoder_domain);?>&nbsp;
			<select name="enable_ajax_sonic" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<div class="modcoder_hide_wrapper modcoder_hide_4">
			<?=__('AJAX status image',$modcoder_domain);?>&nbsp;
			<input name="modcoder_file[]" type="file" size="20" />&nbsp;<?=__('Now',$modcoder_domain);?>: <img src="<?=$modcoder_ap_options['ajax_sonic_gif_uri'];?>" />
			</div>
			<?=__('Text on AJAX status',$modcoder_domain);?>&nbsp;
			<input name="ajax_sonic_title" type="text" size="20" maxlength="128" /><br />
			<?=__('Font color',$modcoder_domain);?>&nbsp;
			<input name="ajax_sonic_title_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Font size',$modcoder_domain);?>&nbsp;
			<select name="ajax_sonic_title_fsize" size="1">
				<?php for ($i=5;$i<31;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Background color of the status',$modcoder_domain);?>&nbsp;
			<input name="ajax_status_bg_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Border color of the status',$modcoder_domain);?>&nbsp;
			<input name="ajax_status_border_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Border width of the status',$modcoder_domain);?>&nbsp;
			<select name="ajax_status_border_width" size="1">
				<?php for ($i=0;$i<101;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Indents',$modcoder_domain);?>&nbsp;
			<select name="ajax_status_indents" size="1">
				<?php for ($i=0;$i<101;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<b><?=__('AJAX Overlay',$modcoder_domain);?></b><br />
			<?=__('Overlay',$modcoder_domain);?>&nbsp;
			<select name="ajax_over_layer" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<div class="modcoder_hide_wrapper modcoder_hide_5">
			<?=__('Background color',$modcoder_domain);?>&nbsp;
			<input name="ajax_over_layer_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Background transparency',$modcoder_domain);?>&nbsp;
			<select name="ajax_over_layer_alfa" size="1">
				<?php for ($i=0;$i<101;$i++) echo '<option value="'.$i.'">'.$i.' %&nbsp;</option>'; ?>
			</select><br />
			<?=__('Effect',$modcoder_domain);?>&nbsp;
			<select name="ajax_over_layer_effect" size="1">
				<option value="0"><?=__('without effect',$modcoder_domain);?>&nbsp;</option>
				<option value="1"><?=__('fade',$modcoder_domain);?>&nbsp;</option>
				<option value="2"><?=__('zoom',$modcoder_domain);?>&nbsp;</option>
				<option value="3"><?=__('lift down',$modcoder_domain);?>&nbsp;</option>
				<option value="4"><?=__('lift up',$modcoder_domain);?>&nbsp;</option>
				<option value="5"><?=__('smart lift',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			</div>
			
			<div class="modcoder_optgroup"><?=__('scroll arrows',$modcoder_domain);?></div>
			<?=__('Arrows as',$modcoder_domain);?>...&nbsp;
			<select name="arrows_as" size="1">
				<option value="0"><?=__('Text',$modcoder_domain);?>&nbsp;</option>
				<option value="1"><?=__('Images',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<div class="modcoder_hide_wrapper modcoder_hide_6">
			<?=__('Text an arrow',$modcoder_domain);?> &laquo;<?=__('PREV',$modcoder_domain);?>&raquo;&nbsp;
			<input name="arrow_left_text" type="text" size="20" maxlength="100" /><br />
			<?=__('Text an arrow',$modcoder_domain);?> &laquo;<?=__('NEXT',$modcoder_domain);?>&raquo;&nbsp;
			<input name="arrow_right_text" type="text" size="20" maxlength="100" /><br />
			<?=__('Text an arrow',$modcoder_domain);?> &laquo;<?=__('FIRST',$modcoder_domain);?>&raquo;&nbsp;
			<input name="arrow_first_text" type="text" size="20" maxlength="100" /><br />
			<?=__('Text an arrow',$modcoder_domain);?> &laquo;<?=__('LAST',$modcoder_domain);?>&raquo;&nbsp;
			<input name="arrow_last_text" type="text" size="20" maxlength="100" /><br />
			</div>
			<div class="modcoder_hide_wrapper modcoder_hide_7">
			<?=__('Image an arrow',$modcoder_domain);?> &laquo;<?=__('PREV',$modcoder_domain);?>&raquo;&nbsp;
			<input name="modcoder_file[]" type="file" size="20" />&nbsp;<?=__('Now',$modcoder_domain);?>: <img src="<?=$modcoder_ap_options['arrow_left_img_uri'];?>" /><br />
			<?=__('Image an arrow',$modcoder_domain);?> &laquo;<?=__('NEXT',$modcoder_domain);?>&raquo;&nbsp;
			<input name="modcoder_file[]" type="file" size="20" />&nbsp;<?=__('Now',$modcoder_domain);?>: <img src="<?=$modcoder_ap_options['arrow_right_img_uri'];?>" /><br />
			<?=__('Image an arrow',$modcoder_domain);?> &laquo;<?=__('FIRST',$modcoder_domain);?>&raquo;&nbsp;
			<input name="modcoder_file[]" type="file" size="20" />&nbsp;<?=__('Now',$modcoder_domain);?>: <img src="<?=$modcoder_ap_options['arrow_first_img_uri'];?>" /><br />
			<?=__('Image an arrow',$modcoder_domain);?> &laquo;<?=__('LAST',$modcoder_domain);?>&raquo;&nbsp;
			<input name="modcoder_file[]" type="file" size="20" />&nbsp;<?=__('Now',$modcoder_domain);?>: <img src="<?=$modcoder_ap_options['arrow_last_img_uri'];?>" /><br />
			</div>
			<?=__('Hiding arrows method',$modcoder_domain); ?>&nbsp;
			<select name="arrows_hide_method" size="1">
				<option value="0"><?=__('Disappearance',$modcoder_domain);?>&nbsp;</option>
				<option value="1"><?=__('Transparency',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<div class="modcoder_hide_wrapper modcoder_hide_14">
				<?=__('Transparency percentage',$modcoder_domain);?>&nbsp;
				<select name="arrows_hide_fade" size="1">
					<?php for ($i=1;$i<100;$i++) echo '<option value="'.(0.01*(100-$i)).'">'.$i.' %&nbsp;</option>'; ?>
				</select>
			</div>
			
			<div class="modcoder_optgroup"><?=__('buttons',$modcoder_domain);?></div>
			<?=__('The distance between the buttons',$modcoder_domain);?>&nbsp;
			<select name="pagers_dist" size="1">
				<?php for ($i=0;$i<101;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Vertical Indents inside the button',$modcoder_domain);?>&nbsp;
			<select name="pagers_padding" size="1">
				<?php for ($i=0;$i<31;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Horizontal Indents inside the button',$modcoder_domain);?>&nbsp;
			<select name="pagers_hpadding" size="1">
				<?php for ($i=0;$i<31;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<div class="modcoder_bgcolf">
			<div>
			<?=__('Fit width',$modcoder_domain);?>&nbsp;
			<select name="mono_width_buttons" size="1">
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			</div>
			<div class="mcbgmw"></div>
			</div>
			<div class="modcoder_optgroup"><?=__('area setting',$modcoder_domain);?></div>
			<?=__('Pager align',$modcoder_domain);?>&nbsp;
			<select name="pager_align" size="1">
				<option value="0"><?=__('on the left',$modcoder_domain);?>&nbsp;</option>
				<option value="1"><?=__('on the center',$modcoder_domain);?>&nbsp;</option>
				<option value="2"><?=__('on the right',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<?=__('Top indent',$modcoder_domain);?>&nbsp;
			<select name="top_indent" size="1">
				<?php for ($i=0;$i<201;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Bottom indent ',$modcoder_domain);?>&nbsp;
			<select name="bottom_indent" size="1">
				<?php for ($i=0;$i<201;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('The width of the pager as a percentage',$modcoder_domain);?>&nbsp;
			<select name="pager_width" size="1">
				<?php for ($i=40;$i<101;$i++) echo '<option value="'.$i.'">'.$i.' %&nbsp;</option>'; ?>
			</select><br />
			<div class="modcoder_optgroup"><?=__('fonts',$modcoder_domain);?></div>
			<?=__('Font',$modcoder_domain);?>&nbsp;
			<select name="font_family" size="1">
				<option value="Arial, Helvetica, Sans-serif">Arial&nbsp;</option>
				<option value="Verdana, Arial, Helvetica, Sans-serif">Verdana&nbsp;</option>
				<option value="Times New Roman, Times, Serif">Times New Roman&nbsp;</option>
				<option value="Geneva, Arial, Helvetica, Sans-serif">Geneva&nbsp;</option>
				<option value="Courier New, Courier, Monospace">Courier New&nbsp;</option>
				<option value="MS Sans Serif, Geneva, Sans-serif">MS Sans Serif&nbsp;</option>
				<option value="System, Sans-serif">System&nbsp;</option>
				<option value="Georgia, Times New Roman Times, Serif">Georgia&nbsp;</option>
				<option value="0" style="font-weight:bold;"><?=__('Other font...',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<div class="modcoder_hide_wrapper modcoder_hide_8">
			<?=__('Enter a other font',$modcoder_domain);?>&nbsp;
			<input name="other_font" type="text" style="width:554px;" /><br />
			</div>
			<?=__('Font size',$modcoder_domain);?>&nbsp;
			<select name="font_size" size="1">
				<?php for ($i=1;$i<31;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Underline hover',$modcoder_domain);?>&nbsp;
			<select name="over_underline" size="1">
				<option value="underline"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
				<option value="none"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<?=__('Color hover',$modcoder_domain);?>&nbsp;
			<input name="over_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Font-weight',$modcoder_domain);?>&nbsp;
			<select name="font_weight" size="1">
				<option value="normal">Normal&nbsp;</option>
				<option value="bold">Bold&nbsp;</option>
				<option value="bolder">Bolder&nbsp;</option>
				<option value="lighter">Lighter&nbsp;</option>
			</select><br />
			<?=__('Font color',$modcoder_domain);?>&nbsp;
			<input name="pager_links_font_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Font color of the current button',$modcoder_domain);?>&nbsp;
			<input name="current_page_font_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Font-weight on arrows',$modcoder_domain);?>&nbsp;
			<select name="arrows_font_weight" size="1">
				<option value="normal">Normal&nbsp;</option>
				<option value="bold">Bold&nbsp;</option>
				<option value="bolder">Bolder&nbsp;</option>
				<option value="lighter">Lighter&nbsp;</option>
			</select><br />
			<div class="modcoder_optgroup"><?=__('borders of buttons and arrows',$modcoder_domain);?></div>
			<?=__('Border',$modcoder_domain);?>&nbsp;
			<select name="type_rect" size="1">
				<option value="0"><?=__('no border',$modcoder_domain);?>&nbsp;</option>
				<option value="1"><?=__('border with round corners',$modcoder_domain);?>&nbsp;</option>
				<option value="2"><?=__('simple border',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<div class="modcoder_hide_wrapper modcoder_hide_9">
			<div class="modcoder_hide_wrapper modcoder_hide_10">
			<?=__('Border-radius',$modcoder_domain);?>&nbsp;
			<select name="round_rect_radius" size="1">
				<?php for ($i=1;$i<11;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select> <i>FireFox 3+, Opera 10+, Chrome, Safari, IE9</i><br />
			</div>
			<input type="hidden" name="border_style" />
			<div id="modcoder_bstyle">
				<div id="modcoder_bstyle_cap"><?=__('Border style',$modcoder_domain);?></div>
				<div id="modcoder_bsolid" bs="solid"><div></div></div>
				<div id="modcoder_bdotted" bs="dotted"><div></div></div>
				<div id="modcoder_bdashed" bs="dashed"><div></div></div>
			</div>
			
			<?=__('Border width',$modcoder_domain);?>&nbsp;
			<select name="border_width" size="1">
				<?php for ($i=1;$i<6;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<b><?=__('Buttons',$modcoder_domain);?></b><br />
			<?=__('Border color',$modcoder_domain);?>&nbsp;
			<input name="border_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Border color on hover',$modcoder_domain);?>&nbsp;
			<input name="over_border_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Border color on current',$modcoder_domain);?>&nbsp;
			<input name="current_page_border_color" type="text" size="12" maxlength="7" /><br />
			<b><?=__('Arrows',$modcoder_domain);?></b><br />
			<?=__('Border color',$modcoder_domain);?>&nbsp;
			<input name="border_color_ar" type="text" size="12" maxlength="7" /><br />
			<?=__('Border color on hover',$modcoder_domain);?>&nbsp;
			<input name="over_border_color_ar" type="text" size="12" maxlength="7" /><br />

			</div>
			<div class="modcoder_optgroup"><?=__('background of buttons and arrows',$modcoder_domain);?></div>
			<b><?=__('Buttons',$modcoder_domain);?></b><br />
			<input name="background_transp" type="hidden" />
			<?=__('Background color',$modcoder_domain);?>&nbsp;
			<input name="background_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Background color on hover',$modcoder_domain);?>&nbsp;
			<input name="over_background_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Background color on current',$modcoder_domain);?>&nbsp;
			<input name="current_page_background_color" type="text" size="12" maxlength="7" /><br />
			<b><?=__('Arrows',$modcoder_domain);?></b><br />
			<input type="hidden" name="background_arrows_transp" />
			<?=__('Background color',$modcoder_domain);?>&nbsp;
			<input name="background_arrows_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Background color on hover',$modcoder_domain);?>&nbsp;
			<input name="over_background_arrows_color" type="text" size="12" maxlength="7" /><br />
			<div class="modcoder_optgroup"><?=__('scrollbar',$modcoder_domain);?></div>
			<?=__('Indent from pager',$modcoder_domain);?>&nbsp;
			<select name="scrl_indent" size="1">
				<?php for ($i=0;$i<51;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Scrollbar height',$modcoder_domain);?>&nbsp;
			<select name="scrl_height" size="1">
				<?php for ($i=5;$i<51;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Scrollbar border radius',$modcoder_domain);?>&nbsp;
			<select name="scrl_radius" size="1">
				<option value="0">none&nbsp;</option>
				<?php for ($i=1;$i<21;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			
			<b><?=__('Scrollbar options',$modcoder_domain);?></b><br />
			<?=__('The background of the Scrollbar as',$modcoder_domain);?>&nbsp;
			<select name="scrl_barcol_asgrid" size="1">
				<option value="0"><?=__('color',$modcoder_domain);?>&nbsp;</option>
				<option value="1"><?=__('grid',$modcoder_domain);?>&nbsp;</option>
				<option value="2"><?=__('line',$modcoder_domain);?> 1px&nbsp;</option>
				<option value="3"><?=__('line',$modcoder_domain);?> 2px&nbsp;</option>
				<option value="4"><?=__('line',$modcoder_domain);?> 3px&nbsp;</option>
				<option value="5"><?=__('line',$modcoder_domain);?> 4px&nbsp;</option>
				<option value="6"><?=__('line',$modcoder_domain);?> 5px&nbsp;</option>
			</select><br />
			<?=__('Scrollbar background color',$modcoder_domain);?>&nbsp;
			<input name="scrl_barcol" type="text" size="12" maxlength="7" /><br />
			<?=__('Scrollbar border color',$modcoder_domain);?>&nbsp;
			<input name="scrl_barbordercol" type="text" size="12" maxlength="7" /><br />
			<b><?=__('Slider options',$modcoder_domain);?></b><br />
			<?=__('Slider background',$modcoder_domain);?>&nbsp;
			<input name="scrl_slidercol" type="text" size="12" maxlength="7" /><br />
			<?=__('Slider border color',$modcoder_domain);?>&nbsp;
			<input name="scrl_sliderbordercol" type="text" size="12" maxlength="7" /><br />
			
			
			
			
			<div class="modcoder_optgroup"><?=__('announcements bar',$modcoder_domain);?></div>
			<input name="ba_onlyregistered" type="hidden" />
			<!--
			<?=__('Show for',$modcoder_domain);?>&nbsp;
			<select name="ba_onlyregistered" size="1">
				<option value="0">all&nbsp;</option>
				<option value="1">registered&nbsp;</option>
			</select><br /> -->
			<b><?=__('Bar settings',$modcoder_domain);?></b><br />
			<?=__('Width',$modcoder_domain);?>&nbsp;
			<input name="ba_width" type="text" size="10" maxlength="4" /> px<br />
			<?=__('Inner indents',$modcoder_domain);?>&nbsp;
			<select name="ba_indents" size="1">
				<?php for ($i=0;$i<31;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Indent from pager',$modcoder_domain);?>&nbsp;
			<select name="ba_indent_from_pager" size="1">
				<?php for ($i=0;$i<31;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Background color',$modcoder_domain);?>&nbsp;
			<input name="ba_bg" type="text" size="12" maxlength="7" /><br />
			<?=__('Border color',$modcoder_domain);?>&nbsp;
			<input name="ba_border_color" type="text" size="12" maxlength="7" /><br />
			<?=__('Border radius',$modcoder_domain);?>&nbsp;
			<select name="ba_round_corners" size="1">
				<option value="0">none&nbsp;</option>
				<?php for ($i=1;$i<21;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('AJAX image',$modcoder_domain);?>&nbsp;
			<input name="modcoder_file[]" type="file" size="20" />&nbsp;<?=__('Now',$modcoder_domain);?>: <img src="<?=$modcoder_ap_options['ba_ajax_uri'];?>" /><br />
			<?=__('Arrow height',$modcoder_domain);?>&nbsp;
			<select name="ba_arrow_height" size="1">
				<?php for ($i=0;$i<31;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<b><?=__('Announcement title',$modcoder_domain);?></b><br />
			<?=__('Font size',$modcoder_domain);?>&nbsp;
			<select name="ba_tfsize" size="1">
				<?php for ($i=6;$i<31;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Font color',$modcoder_domain);?>&nbsp;
			<input name="ba_tfcolor" type="text" size="12" maxlength="7" /><br />
			<b><?=__('Announcement text',$modcoder_domain);?></b><br />
			<?=__('Font size',$modcoder_domain);?>&nbsp;
			<select name="ba_fsize" size="1">
				<?php for ($i=6;$i<31;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Font color',$modcoder_domain);?>&nbsp;
			<input name="ba_fcolor" type="text" size="12" maxlength="7" /><br />
			<b><?=__('On hover',$modcoder_domain);?></b><br />
			<?=__('Action',$modcoder_domain);?>&nbsp;
			<select name="ba_hover" size="1">
				<option value="0"><?=__('underline',$modcoder_domain);?>&nbsp;</option>
				<option value="1"><?=__('toggle background',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<div class="modcoder_hide_wrapper modcoder_hide_11">
			<?=__('Background color on hover',$modcoder_domain);?>&nbsp;
			<input name="ba_hover_bgcolor" type="text" size="12" maxlength="7" /><br />
			<?=__('Border color on hover',$modcoder_domain);?>&nbsp;
			<input name="ba_hover_bordercolor" type="text" size="12" maxlength="7" /><br />
			<?=__('Border radius',$modcoder_domain);?>&nbsp;
			<select name="ba_hover_radius" size="1">
				<option value="0">none&nbsp;</option>
				<?php for ($i=1;$i<21;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			</div>
			<b><?=__('Announcement settings',$modcoder_domain);?></b><br />
			<?=__('Show thumbnail',$modcoder_domain);?>&nbsp;
			<select name="ba_thumb_show" size="1">
				<option value="0"><?=__('Disable',$modcoder_domain);?>&nbsp;</option>
				<option value="1"><?=__('Enable',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			<div class="modcoder_hide_wrapper modcoder_hide_12">
			<?=__('Thumbnail width',$modcoder_domain);?>&nbsp;
			<select name="ba_thumb_width" size="1">
				<?php for ($i=10;$i<101;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Thumbnail indent',$modcoder_domain);?>&nbsp;
			<select name="ba_thumb_indents" size="1">
				<?php for ($i=0;$i<31;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Thumbnail position',$modcoder_domain);?>&nbsp;
			<select name="ba_thumb_pos" size="1">
				<option value="0"><?=__('left',$modcoder_domain);?>&nbsp;</option>
				<option value="1"><?=__('right',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			</div>
			<?=__('The distance between the announcements',$modcoder_domain);?>&nbsp;
			<select name="ba_dist" size="1">
				<?php for ($i=0;$i<31;$i++) echo '<option value="'.$i.'">'.$i.' px&nbsp;</option>'; ?>
			</select><br />
			<?=__('Length of the announcement',$modcoder_domain);?>&nbsp;
			<input name="ba_length" type="text" size="10" maxlength="5" /> <?=__('words',$modcoder_domain);?><br />
			<?=__('Announcement as',$modcoder_domain);?>&nbsp;
			<select name="ba_aslink" size="1">
				<option value="0"><?=__('text',$modcoder_domain);?>&nbsp;</option>
				<option value="1"><?=__('link',$modcoder_domain);?>&nbsp;</option>
			</select><br />
			
		</div>
		<div num="3" class="modcoder_tabcontent_panel" style="display:none;">
			<?php require_once 'information.php'; ?>
		</div>
	
<center id="modcoder_buttons"><input id="modcoder_button_submit" type="button" value="<?=__('Save Changes',$modcoder_domain);?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="modcoder_button_defaults" type="button" value="<?=__('Load Defaults',$modcoder_domain);?>" /></center>	
	</td>
</tr>
<tr><td colspan="4" style="text-align:center;"><br />&copy; 2011 <a href="http://modcoder.org/" target="_blank">ModCoder</a> <a href="http://modcoder.org/?ptab=wordpress&item=wpbrowser" target="_blank">WP-Browser</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Our news: <a style="text-decoration:none;" target="_blank" href="http://feeds.feedburner.com/modcoder_en"><img src="<?=get_bloginfo('siteurl').'/wp-content/plugins/'.$modcoder_ap_plugin_folder.'/images/sfen.png';?>" border="0" /> EN</a> <a style="text-decoration:none;" target="_blank" href="http://feeds.feedburner.com/modcoder_ru"><img src="<?=get_bloginfo('siteurl').'/wp-content/plugins/'.$modcoder_ap_plugin_folder.'/images/sfru.png';?>" border="0" /> RU</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Subscribe to News: <a style="text-decoration:none;" target="_blank" href="http://feedburner.google.com/fb/a/mailverify?uri=modcoder_en&loc=en_US"><img src="<?=get_bloginfo('siteurl').'/wp-content/plugins/'.$modcoder_ap_plugin_folder.'/images/sfen.png';?>" border="0" /> EN</a> <a style="text-decoration:none;" target="_blank" href="http://feedburner.google.com/fb/a/mailverify?uri=modcoder_ru&loc=ru_RU"><img src="<?=get_bloginfo('siteurl').'/wp-content/plugins/'.$modcoder_ap_plugin_folder.'/images/sfru.png';?>" border="0" /> RU</a></td></tr>
</table>
<input type="hidden" name="modcoder_save" value="save" />
</form>
</div>
