<?php defined('ABSPATH') or die('No script kiddies please!!');
global $post;
$postid = $post->ID;
$ictab_settings = get_post_meta($postid, 'ictab_settings', true);
$ictab_display_settings = get_post_meta($postid, 'ictab_display_settings', true);
$temptype  = (isset($ictab_display_settings['display_options']['template_type']) && $ictab_display_settings['display_options']['template_type'] != '')?esc_attr($ictab_display_settings['display_options']['template_type']):'available';
$template_type  = (isset($ictab_display_settings['display_options']['template_type']) && $ictab_display_settings['display_options']['template_type'] != '')?esc_attr($ictab_display_settings['display_options']['template_type']):'available';
$template       = (isset($ictab_display_settings['display_options']['template_number']) && $ictab_display_settings['display_options']['template_number'] != '')?esc_attr($ictab_display_settings['display_options']['template_number']):'template1';
$ictab_typo_fonts = get_option('ictab_typo_fonts');
if(empty($ictab_typo_fonts)){
  $ictab_typo_fonts =  $this->ictab_get_font_family();
}
$ictab_animation = get_option('ictabl_animation_options');
if(empty($ictab_animation)){
  $ictab_animation =  $this->ictab_animation_options();
}
?>
<div class="ictab-wrapper ictab-template-settings">
   <div class="ictab-template-options ictab-clearfix">
      <div class="ictab-tab-header  <?php if($temptype == "custom") echo 'ictab-custom-open';?>">
          <ul class="ictab-nav-tabs">
              <li class="ictab-tab <?php if($template_type == "available") echo 'ictab-active';?>" data-id="ictab-content-settings" data-type="available" <?php if($template_type == "custom") echo 'style="display:none;"';?>>
                <i class="fa fa-header"></i><?php _e('Content Settings',ICTABL_TD);?>
              </li>
              <li class="ictab-tab" data-id="ictab-cta-settings" data-type="available" <?php if($template_type == "custom") echo 'style="display:none;"';?>>
                <i class="fa fa-external-link"></i><?php _e('Button Settings',ICTABL_TD);?>
              </li>
              <li class="ictab-tab <?php if($template_type == "custom") echo 'ictab-active';?>" data-id="ictab-bg-settings" data-type="both">
                <i class="fa fa-eyedropper"></i><?php _e('Background Settings',ICTABL_TD);?>
              </li>
              <li class="ictab-tab" data-id="ictab-custom-settings" data-type="both">
                 <i class="fa fa-cog"></i><?php _e('Custom Settings',ICTABL_TD);?>
              </li>
          </ul>
     </div>
     <div class="ictab-tabs-content-wrap">
          <div class="ictab-tab-content <?php if($template_type == "available") echo 'ictab-content-active';?>" id="ictab-content-settings" data-type="available" <?php if($template_type == "custom") echo 'style="display:none;"';?>>
             <?php include(ICTABL_PATH . '/includes/views/backend/metabox/configure-metabox/ictab-header-settings.php');?>
          </div>
           <div class="ictab-tab-content" id="ictab-cta-settings" style="display:none;" data-type="available" <?php if($template_type == "custom") echo 'style="display:none;"';?>>
              <?php include(ICTABL_PATH . '/includes/views/backend/metabox/configure-metabox/ictab-cta-settings.php');?>
          </div>
          <div class="ictab-tab-content <?php if($template_type == "custom") echo 'ictab-content-active';?>" id="ictab-bg-settings" <?php if($template_type == "available") echo 'style="display:none;"';?> data-type="both">
              <?php include(ICTABL_PATH . '/includes/views/backend/metabox/configure-metabox/ictab-bgsettings.php');?>
          </div>
          <div class="ictab-tab-content" id="ictab-custom-settings" style="display:none;" data-type="both">
             <?php include(ICTABL_PATH . '/includes/views/backend/metabox/configure-metabox/ictab-custom-settings.php');?>
          </div>
     </div>
   </div>
</div>
<?php if ( isset($_GET['action'])  && $_GET['action'] === 'edit' ){ ?>
<input type="hidden" name="ictab_settings[icatb_action_type]" value="edited_post"/>
 <?php }else{ ?>
<input type="hidden" name="ictab_settings[icatb_action_type]" value="new_post"/>
<?php }?>
<input type="hidden" name="ictab_post_id" value="<?php echo $postid;?>" id="ictab-postid"/>