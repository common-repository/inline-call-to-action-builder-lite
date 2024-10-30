<?php defined('ABSPATH') or die("No script kiddies please!");?>
<div class="ictab-ctabbutton-wrap">
<?php
$cta_option  = (isset($ictab_settings['cta_option']) && !empty($ictab_settings['cta_option']))?$ictab_settings['cta_option']:'';
$button_num1 = array('template3','template6','template7','template8','template13','template15','template16','template17','template18','template19','template21','template23','template35','template40');
$button_num2 = array('template1','template2','template4','template5','template9','template10','template11','template12','template14','template22','template24','template25','template26','template27','template28','template29','template30','template31','template32','template33','template34','template36','template38','template41','template42','template43','template44','template45','template46','template47','template48','template49','template50');
$button_num3 = array('template20');
$nobutton = array('template37','template39');
if (in_array($template_num, $button_num1)) {
   $count = 1;
}else if(in_array($template_num, $button_num2)){
   $count = 2;
}else if(in_array($template_num, $button_num3)){
   $count = 3;
}else{   
   $count = 0;
}
 $hide_on_mobile_class = '';
 $hide_on_desktop_class = '';
if( $count != 0){
if(isset($cta_option) && !empty($cta_option)):
$i = 1;

foreach ($cta_option as $key => $value) {
  # code...
if( $i <= $count) {
$btn_text = (isset($value['btn_text']) && $value['btn_text'] != '')?esc_attr($value['btn_text']):$availablearray['available_text'][$template_num]['button'.$i];
$hide_on_mobile = (isset($value['hide_on_mobile']) && $value['hide_on_mobile'] == 1)?1:0;
$hide_on_desktop = (isset($value['hide_on_desktop']) && $value['hide_on_desktop'] == 1)?1:0;
if($hide_on_mobile){
    $hide_on_mobile_class = " ictab-hide-btn-onmobile ";
}
if($hide_on_desktop){
    $hide_on_desktop_class = " ictab-hide-btn-ondesktop ";
}
$btn_animation  = (isset($value['animation']) && $value['animation'] != '' && $value['animation'] != 'none')?'wow animated '.esc_attr($value['animation']):'';
$randomkey  = (isset($value['randomkey']) && $value['randomkey'] != '')?esc_attr($value['randomkey']):'';
$button_link_type  = (isset($value['button_link_type']) && $value['button_link_type'] != '')?esc_attr($value['button_link_type']):'external';
$display_btn_type  = (isset($value['display_btn_type']) && $value['display_btn_type'] != '')?esc_attr($value['display_btn_type']):'show_both';

//icon display show
$btn_icon_type  = (isset($value['icon_type']) && $value['icon_type'] != '')?esc_attr($value['icon_type']):'';
  
   $rel_type = '';
   $btnid = '';
   $btnlink_class_type  = "";
   $btn_link_target = "target='_self'";
   $btn_link = "#";
  if($button_link_type == "internal"){
    $btn_link  = (isset($value['internal']['link']) && $value['internal']['link'] != '')?esc_url($value['internal']['link']):'#';
    $btnlinktarget  = (isset($value['internal']['link_target']) && $value['internal']['link_target'] == 'same_window')?'_self':'_blank';
    $btn_link_target = "target='".$btnlinktarget."'";
    $btnlink_class_type = "ictab-internal-btn-type";
   }else if($button_link_type == "external"){
    $btn_link  = (isset($value['external']['link']) && $value['external']['link'] != '')?esc_url($value['external']['link']):'#';
    $btnlinktarget  = (isset($value['external']['link_target']) && $value['external']['link_target'] == 'same_window')?'_self':'_blank';
    $btn_link_target = "target='".$btnlinktarget."'";
    $btnlink_class_type = "ictab-external-btn-type";
   }

$btn_enable_styles  = (isset($value['enable_styles']) && $value['enable_styles'] == 1)?1:0;
$btn_bgcolor = (isset($value['btn_bgcolor']) && $value['btn_bgcolor'] != '')?esc_attr($value['btn_bgcolor']):'';
$btn_bghcolor = (isset($value['btn_bghcolor']) && $value['btn_bghcolor'] != '')?esc_attr($value['btn_bghcolor']):'';
$btn_fcolor = (isset($value['btn_fcolor']) && $value['btn_fcolor'] != '')?esc_attr($value['btn_fcolor']):'';
$btn_fhcolor = (isset($value['btn_fhcolor']) && $value['btn_fhcolor'] != '')?esc_attr($value['btn_fhcolor']):'';
$btn_bordercolor = (isset($value['btn_bordercolor']) && $value['btn_bordercolor'] != '')?esc_attr($value['btn_bordercolor']):'';
$btn_borderhcolor = (isset($value['btn_borderhcolor']) && $value['btn_borderhcolor'] != '')?esc_attr($value['btn_borderhcolor']):'';

$dynamic_css = array();
if($btn_enable_styles == 1){
  if($btn_bgcolor != ''){
    $dynamic_css[] = "background-color: $btn_bgcolor;";
  }
  if($btn_fcolor != ''){
    $dynamic_css[] = "color: $btn_fcolor;";
  }
}

$btn_icon_animation  = $availablearray['available_text'][$template_num]['default_animation'.$i];

if($btn_icon_animation != '' && $btn_icon_animation != "none"){
if($btn_icon_animation == 'button-flicker' || $btn_icon_animation == 'button-transparent-border' || 
$btn_icon_animation == 'button-reveal-icon-hide-text' || $btn_icon_animation == 'button-zoom-focus'
|| $btn_icon_animation == 'button-reveal-icon-hide-text' 
|| $btn_icon_animation == 'button-border-highlight'  || $btn_icon_animation == 'button-criss-cross'){
     $btn_icon_animation_class = $btn_icon_animation;
}else{
    $btn_icon_animation_class = '';
}
}else{
    $btn_icon_animation_class = '';
}
?>
 <div class="ictab-btn-wrap ictab-button-wrap <?php echo $hide_on_mobile_class;?><?php echo $hide_on_desktop_class;?> <?php echo $btn_animation;?>" id="ictab-btn<?php echo $key;?>-<?php echo $randomkey;?>">
   <div class="ictab-button-main-wrap <?php echo $btn_icon_animation_class;?>">
    <a href="<?php echo $btn_link;?>" <?php echo $rel_type;?> <?php echo $btnid;?> 
      class="ictab-btn-tag ictab_<?php echo $display_btn_type;?> <?php echo $btnlink_class_type;?> 
      <?php if($btn_icon_animation != '' && $btn_icon_animation != "none") echo $btn_icon_animation;?>" <?php echo $btn_link_target;?> data-text="<?php echo $btn_text;?>">
        <?php 
         echo "<span data-text='".$btn_text."'>".$btn_text."</span>";
         ?>
    </a>
   </div>
</div>
<style>
<?php if($btn_enable_styles == 1){ ?>
    <?php if($btn_bgcolor != ''){?> 
      .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a.button-3d-flip::before{
          background-color: <?php echo $btn_bgcolor;?>
       }
     <?php  } ?> 
     <?php  if($btn_bghcolor != '' && $btn_icon_animation == 'button-3d-flip'){?> 
      .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a.button-3d-flip::after{
          background-color: <?php echo $btn_bghcolor;?>
       }
      <?php }?>
       <?php  if($btn_bghcolor != '' && $btn_icon_animation == 'button-collision'){?> 
      .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?>  a.button-collision:before,
      .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?>  a.button-collision:after{
          background-color: <?php echo $btn_bghcolor;?>
       }
      <?php }?>
     <?php  if($btn_bghcolor != '' && $btn_icon_animation != 'button-3d-flip' && $btn_icon_animation != "button-collision" && $btn_icon_animation != "button-eclipse-shado"){?> 
      .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a:hover,
      .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a::before,
      .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a:hover::before{
          background-color: <?php echo $btn_bghcolor;?>
       }
       .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a.button-zoom-focus:hover::before{
       box-shadow: inset 0 0 0 2px <?php echo $btn_bghcolor;?>;
      }
     <?php  } ?> 

      /* border color */
     <?php  if($btn_bordercolor != ''){?> 
     .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a.button-border-highlight::before{
       border:  2px solid  <?php echo $btn_bordercolor;?>;
        }
      .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a.button-underline-text:after{
             border-bottom: 1px solid <?php echo $btn_bordercolor;?>;
        }
       <?php  } ?> 
        /* border hover color */
        <?php  if($btn_borderhcolor != ''){
          if($btn_icon_animation != 'button-border-hightlight' || $btn_icon_animation != 'button-criss-cross'){?> 
        .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a:hover{
          border-color: <?php echo $btn_borderhcolor;?>;
        }
      <?php } ?> 
        .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> div.button-border-highlight::before{
            border: 2px solid <?php echo $btn_borderhcolor;?>;
        }
       .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a.button-border-hightlight:hover::after{
         border-bottom-color: <?php echo $btn_borderhcolor;?>;
          border-left-color: <?php echo $btn_borderhcolor;?>;
              }
        .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a.button-border-hightlight:hover::before{
         border-top-color: <?php echo $btn_borderhcolor;?>;
          border-right-color: <?php echo $btn_borderhcolor;?>;  
        }
        .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a.button-criss-cross::before{
              border-bottom: 2px solid  <?php echo $btn_borderhcolor;?>;
              border-left: 2px solid  <?php echo $btn_borderhcolor;?>;
        }
        .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a.button-criss-cross::after{
              border-top: 2px solid <?php echo $btn_borderhcolor;?>;
              border-right: 2px solid <?php echo $btn_borderhcolor;?>;
        }
       <?php  } ?> 
       /* font color */
      <?php  if($btn_fcolor != ''){?> 
        .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a i, 
        .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a span{
          color: <?php echo $btn_fcolor;?>;
        }  
         <?php  } ?> 
               /* font hover color */
    <?php  if($btn_fhcolor != ''){?> 
       .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a:hover,
      .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a:hover i, 
      .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a:hover span{
       color: <?php echo $btn_fhcolor;?>
       }
     <?php  } ?> 
<?php }?>
</style>
<?php
    if(!empty($dynamic_css)){
        $dynamic_css = implode(' ', $dynamic_css);
      }else{
        $dynamic_css ='';
      }
      ob_start();
    if(!empty($dynamic_css)){ ?>
    .ictab-main-container-wrap#ictab-random-<?php echo $random_num; ?> #ictab-btn<?php echo $key;?>-<?php echo $randomkey;?> a {
     <?php echo $dynamic_css; ?> 
     }
     <?php 
     } ?>


    <?php
    $ictab_dynamic_css_at_end[] = ob_get_contents();
    ob_end_clean();
      $i++;
  }
 }
endif;
}?>
</div>