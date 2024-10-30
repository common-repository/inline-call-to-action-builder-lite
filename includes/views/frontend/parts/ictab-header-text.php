<?php defined('ABSPATH') or die("No script kiddies please!");
$disable_htext  = (isset($ictab_settings['header_text']['disable_htext']) && $ictab_settings['header_text']['disable_htext'] == 1)?1:0;
$header_title  = (isset($ictab_settings['header_text']['title']) && $ictab_settings['header_text']['title'] != '')?esc_attr($ictab_settings['header_text']['title']):$availablearray['available_text'][$template_num]['header_text'];
$header_animation  = (isset($ictab_settings['header_text']['animation']) && $ictab_settings['header_text']['animation'] != '' && $ictab_settings['header_text']['animation'] != 'none')?esc_attr('wow animated '.$ictab_settings['header_text']['animation']):'';
$header_font_family = (isset($ictab_settings['header_text']['font_family']) && $ictab_settings['header_text']['font_family'] != '')?esc_attr($ictab_settings['header_text']['font_family']):'';
$header_fcolor = (isset($ictab_settings['header_text']['fcolor']) && $ictab_settings['header_text']['fcolor'] != '')?esc_attr($ictab_settings['header_text']['fcolor']):'';
$header_enable_styles = (isset($ictab_settings['header_text']['enable_styles']) && $ictab_settings['header_text']['enable_styles'] == 1)?1:0;
$dynamic_css = array();
if($disable_htext != 1){
if($header_enable_styles == 1){
	if($header_font_family != ''){
		$dynamic_css[] = "font-family: $header_font_family;";
	}
	if($header_fcolor != ''){
		$dynamic_css[] = "color: $header_fcolor";
	}
}

?>
<div class="ictab-header-text-wrap <?php echo $header_animation;?>">
 <h3><?php echo esc_attr($header_title);?></h3>
</div>

<?php
if(!empty($dynamic_css)){
    $dynamic_css = implode(' ', $dynamic_css);
}else{
	$dynamic_css ='';
}
ob_start(); ?>
.ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> .ictab-header-text-wrap h3 { <?php echo $dynamic_css; ?> }
<?php 
   	$ictab_dynamic_css_at_end[] = ob_get_contents();
	ob_end_clean();
}

