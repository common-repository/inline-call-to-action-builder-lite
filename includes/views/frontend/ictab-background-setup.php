<?php defined('ABSPATH') or die('No script kiddies please!!');
$backgroundtype  = (isset($ictab_settings['background']['bg_type']) && $ictab_settings['background']['bg_type'] != '')?esc_attr($ictab_settings['background']['bg_type']):'default';
$bgselectiontype  = (isset($ictab_settings['background']['bg_selection_type']) && $ictab_settings['background']['bg_selection_type'] != '')?esc_attr($ictab_settings['background']['bg_selection_type']):'bgcolor';
$bgcolor  = (isset($ictab_settings['background']['bg_color']) && $ictab_settings['background']['bg_color'] != '')?esc_attr($ictab_settings['background']['bg_color']):'';
$bg_img_url = (isset($ictab_settings['background']['img_url']) && $ictab_settings['background']['img_url'] != '')?esc_url($ictab_settings['background']['img_url']):'';
$bg_video_type = (isset($ictab_settings['background']['bg_video_type']) && $ictab_settings['background']['bg_video_type'] != '')?esc_attr($ictab_settings['background']['bg_video_type']):'youtube';
$bgtype_class      = '';
$bgstyle_wrap      = '';
$outer_wrap_attributes = 'data-parallax-source="' . esc_attr($bgselectiontype) . '"';
if($backgroundtype == "default"){
  if($template_type == "custom"){
       $bgstyle_wrap = '';
  }else{
      $bg_img_url  = esc_url($availablearray['available_text'][$template_num]['bgimage']);
      $bgstyle_wrap .= 'style="background-image:url(\'' . esc_url($bg_img_url) . '\');background-size: cover;background-position: center;"';   
  }
   $bgtype_class  .= " ictab-bgdefault-wrap";
   $outer_wrap_attributes = '';
   
}else{

	if($bgselectiontype == "bgcolor"){
		$bgtype_class  .= " ictab-bgcolor-wrap";
		$outer_wrap_attributes = '';
		if($bgcolor !=''){
          $bgstyle_wrap .= 'style="background-color:'.esc_attr($bgcolor).'"';   
	 	}else{
          $bgstyle_wrap .=  "";
	 	}
    }

    if($bgselectiontype == "image"){
    	$imgWidth = '880';
        $imgHeight = '400';
        $bgtype_class  .= " ictab-bgimage-wrap";
        if($bg_img_url !=''){
          $bgstyle_wrap .= 'style="background-image:url(\'' . esc_url($bg_img_url) . '\');background-size: cover;background-position: center;"';   
    	 	}else{
              $bgstyle_wrap .=  "";
    	 	}

         $outer_wrap_attributes .= ' data-parallax-image="' . esc_url($bg_img_url) . '"';
         $outer_wrap_attributes .= ' data-parallax-image-width="' . esc_attr($imgWidth) . '"';
         $outer_wrap_attributes .= ' data-parallax-image-height="' . esc_attr($imgHeight) . '"';

    }
}

$enable_parallax = (isset($ictab_settings['background']['enable_parallax']) && $ictab_settings['background']['enable_parallax'] == 1)?1:0;
$parallax_type = (isset($ictab_settings['background']['parallax_type']) && $ictab_settings['background']['parallax_type'] != '')?esc_attr($ictab_settings['background']['parallax_type']):'opacity';
$parallax_speed = (isset($ictab_settings['background']['parallax_speed']) && $ictab_settings['background']['parallax_speed'] != '')?esc_attr($ictab_settings['background']['parallax_speed']):'0.5';
$parallax_onmobile = (isset($ictab_settings['background']['parallax_onmobile']) && $ictab_settings['background']['parallax_onmobile'] == 1)?true :false;

$dynamic_parallax_classes = '';

// parallax
if($enable_parallax){
	$dynamic_parallax_classes .=' ictab-parallax-enabled';
	if ($parallax_type == 'scroll' || $parallax_type == 'scale' || $parallax_type == 'opacity') {
	    $outer_wrap_attributes .= ' data-parallax-type="' . esc_attr($parallax_type) . '"';
	    $outer_wrap_attributes .= ' data-parallax-speed="' . esc_attr($parallax_speed) . '"';
	    $outer_wrap_attributes .= ' data-parallax-mobile="' . esc_attr($parallax_onmobile) . '"';
	}
}else{
	$dynamic_parallax_classes .=' ictab-parallax-enabled ictab-parallax-for-videos-fixes';
}