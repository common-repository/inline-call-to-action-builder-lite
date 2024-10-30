<?php defined('ABSPATH') or die('No script kiddies please!!');?>
<?php 
if(isset($atts['alias'])){
    $post_id =  $this->ictab_get_ID_by_slug($atts['alias']);
}else{
	if(isset($atts['id'])){
		$post_id = $atts['id']; // for visual composer compatible
	}
}
$ictab_settings   = get_post_meta($post_id, 'ictab_settings', true);
$display_settings = get_post_meta($post_id, 'ictab_display_settings', true);
// $this->displayArr($ictab_settings);
$random_num = rand(111111111, 999999999);

$template_type  = (isset($display_settings['display_options']['template_type']) && $display_settings['display_options']['template_type'] != '')?esc_attr($display_settings['display_options']['template_type']):'available';
$template_number   = (isset($display_settings['display_options']['template_number']) && $display_settings['display_options']['template_number'] != '')?esc_attr($display_settings['display_options']['template_number']):'template1';
if(isset($atts['template']) && $atts['template'] != ''){
    $template_num = $atts['template'];
}else{
	$template_num =  $template_number;
}
//overlay check
$enable_check_bg = (isset($ictab_settings['background']['enable_overlay']) && $ictab_settings['background']['enable_overlay'] == 1)?1:0;
$overlay_color = (isset($ictab_settings['background']['overlay_color']) && $ictab_settings['background']['overlay_color'] != '')?esc_attr($ictab_settings['background']['overlay_color']):'';

$bgwidth = (isset($ictab_settings['background']['width']) && $ictab_settings['background']['width'] != '')?esc_attr($ictab_settings['background']['width'].'px'):'';
$bgheight = (isset($ictab_settings['background']['height']) && $ictab_settings['background']['height'] != '')?esc_attr($ictab_settings['background']['height'].'px'):'';
$section_bg_color_class  = (isset($ictab_settings['section_bg_color_type']) && $ictab_settings['section_bg_color_type'] == 'custom')?'ictab-bgsection-custom':'ictab-bgsection-default';

$ictab_dynamic_css_at_end = array();
$availablearray = $this->ictab_available_content();
$slider_html_wrap = '';
include( ICTABL_PATH . '/includes/views/frontend/ictab-background-setup.php' ); 
?>
<div class="ictab-main-container-wrap ictab-clearfix <?php echo $section_bg_color_class;?>" id="ictab-random-<?php echo $random_num;?>" style="width:<?php echo $bgwidth;?>;height:<?php echo $bgheight;?>;">
    <div class="ictab-available-template-wrap ictab-<?php echo $template_num;?>">
          <div class="ictab-inner-wrapper<?php echo $bgtype_class;?><?php echo $dynamic_parallax_classes;?>" <?php if($template_num != 'template12') { echo $outer_wrap_attributes;  } ?> <?php if($template_num != 'template12') { echo $bgstyle_wrap;  } ?>>   
            <?php  if($template_num != 'template12') { 
            if($enable_check_bg == 1){ ?>
                <div class="ictab-common-overlay" style="background-color:<?php echo $overlay_color;?>"></div>
             <?php }else{
               ?>
                <div class="ictab-common-overlay"></div>
             <?php
                } 
              }?>
             <?php 
            echo $slider_html_wrap;
            ?>
          <?php include( ICTABL_PATH . '/includes/views/frontend/ictab-available-templates.php' ); ?>
         </div>
    </div>
<?php
$ictab_dynamic_css_at_end_print = implode('', $ictab_dynamic_css_at_end);
$bg_section_color  = (isset($ictab_settings['bg_section_color']) && $ictab_settings['bg_section_color'] != '')?esc_attr($ictab_settings['bg_section_color']):'';

if(!empty($ictab_dynamic_css_at_end_print)){ ?>
<style type='text/css' media='all'>
<?php echo esc_attr($ictab_dynamic_css_at_end_print); ?>
</style>
<?php } ?>
<style type='text/css' media='all'>
<?php if($bg_section_color != ''){?>
#ictab-random-<?php echo $random_num;?> .ictab-template3 .ictab-content-wrap-section:before{
background-color:<?php echo $bg_section_color;?>;
}
#ictab-random-<?php echo $random_num;?> .ictab-template4 .ictab-inner-wrapper .ictab-content-wrap-section{
background:<?php echo $bg_section_color;?>;
}

#ictab-random-<?php echo $random_num;?> .ictab-template36 .ictab-double-content-wrapper .ictab-content-wrap-section .ictab-left-content-wrap{
   background:<?php echo $bg_section_color;?>; 
}
<?php } ?>
</style>
<?php 
$header_enable_styles = (isset($ictab_settings['header_text']['enable_styles']) && $ictab_settings['header_text']['enable_styles'] == 1)?1:0;
$header_font_family = (isset($ictab_settings['header_text']['font_family']) && $ictab_settings['header_text']['font_family'] != '')?esc_attr($ictab_settings['header_text']['font_family']):'';
if($header_enable_styles == 1){
if($header_font_family != '' && $header_font_family != 'default'){?>
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=<?php echo $header_font_family;?>' type='text/css' media='all' />
<?php }
} ?>
</div>