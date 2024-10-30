<?php defined('ABSPATH') or die('No script kiddies please!!');
//Sub Title Content
$disable_subtitle  = (isset($ictab_settings['subtext']['disable_subtitle']) && $ictab_settings['subtext']['disable_subtitle'] == 1)?1:0;
$subtext_title  = (isset($ictab_settings['subtext']['title']) && $ictab_settings['subtext']['title'] != '')?esc_attr($ictab_settings['subtext']['title']):'';
$subtext_animation  = (isset($ictab_settings['subtext']['subtext_animation']) && $ictab_settings['subtext']['subtext_animation'] != '' && $ictab_settings['subtext']['subtext_animation'] != 'none')?esc_attr($ictab_settings['subtext']['subtext_animation']):'none';
$subtext_enable_styles  = (isset($ictab_settings['subtext']['enable_styles']) && $ictab_settings['subtext']['enable_styles'] == 1)?1:0;
$subtext_font_family  = (isset($ictab_settings['subtext']['font_family']) && $ictab_settings['subtext']['font_family'] != '')?esc_attr($ictab_settings['subtext']['font_family']):'';
$subtext_fcolor  = (isset($ictab_settings['subtext']['fcolor']) && $ictab_settings['subtext']['fcolor'] != '')?esc_attr($ictab_settings['subtext']['fcolor']):'';
$underline_fcolor  = (isset($ictab_settings['subtext']['underline_fcolor']) && $ictab_settings['subtext']['underline_fcolor'] != '')?esc_attr($ictab_settings['subtext']['underline_fcolor']):'';
//header title content
$disable_htext  = (isset($ictab_settings['header_text']['disable_htext']) && $ictab_settings['header_text']['disable_htext'] == 1)?1:0;
$htext_title  = (isset($ictab_settings['header_text']['title']) && $ictab_settings['header_text']['title'] != '')?esc_attr($ictab_settings['header_text']['title']):'';
$htext_animation  = (isset($ictab_settings['header_text']['animation']) && $ictab_settings['header_text']['animation'] != '' && $ictab_settings['header_text']['animation'] != 'none')?esc_attr($ictab_settings['header_text']['animation']):'none';
$htext_enable_styles  = (isset($ictab_settings['header_text']['enable_styles']) && $ictab_settings['header_text']['enable_styles'] == 1)?1:0;
$htext_font_family  = (isset($ictab_settings['header_text']['font_family']) && $ictab_settings['header_text']['font_family'] != '')?esc_attr($ictab_settings['header_text']['font_family']):'';
$htext_fcolor  = (isset($ictab_settings['header_text']['fcolor']) && $ictab_settings['header_text']['fcolor'] != '')?esc_attr($ictab_settings['header_text']['fcolor']):'';

//header second title content
$disable_hstext  = (isset($ictab_settings['header_second_text']['disable_hstext']) && $ictab_settings['header_second_text']['disable_hstext'] == 1)?1:0;
$hstext_title  = (isset($ictab_settings['header_second_text']['title']) && $ictab_settings['header_second_text']['title'] != '')?esc_attr($ictab_settings['header_second_text']['title']):'';
$hstext_animation  = (isset($ictab_settings['header_second_text']['animation']) && $ictab_settings['header_second_text']['animation'] != '' && $ictab_settings['header_second_text']['animation'] != 'none')?esc_attr($ictab_settings['header_second_text']['animation']):'none';
$hstext_enable_styles  = (isset($ictab_settings['header_second_text']['enable_styles']) && $ictab_settings['header_second_text']['enable_styles'] == 1)?1:0;
$hstext_font_family  = (isset($ictab_settings['header_second_text']['font_family']) && $ictab_settings['header_second_text']['font_family'] != '')?esc_attr($ictab_settings['header_second_text']['font_family']):'';
//$hstext_fsize  = (isset($ictab_settings['header_second_text']['fsize']) && $ictab_settings['header_second_text']['fsize'] != '')?esc_attr($ictab_settings['header_second_text']['fsize']):'';
$hstext_fcolor  = (isset($ictab_settings['header_second_text']['fcolor']) && $ictab_settings['header_second_text']['fcolor'] != '')?esc_attr($ictab_settings['header_second_text']['fcolor']):'';
//$sheader_line_height  = (isset($ictab_settings['header_second_text']['line_height']) && $ictab_settings['header_second_text']['line_height'] != '')?esc_attr($ictab_settings['header_second_text']['line_height']):'';

$disable_desc  = (isset($ictab_settings['description']['disable_desc']) && $ictab_settings['description']['disable_desc'] == 1)?1:0;
$description_animation  = (isset($ictab_settings['description']['animation']) && $ictab_settings['description']['animation'] != '' && $ictab_settings['description']['animation'] != 'none')?esc_attr($ictab_settings['description']['animation']):'none';
//$desc_line_height  = (isset($ictab_settings['description']['line_height']) && $ictab_settings['description']['line_height'] != '')?esc_attr($ictab_settings['description']['line_height']):'';

$section_bg_color_type  = (isset($ictab_settings['section_bg_color_type']) && $ictab_settings['section_bg_color_type'] == 'custom')?'custom':'default';
$bg_section_color = (isset($ictab_settings['bg_section_color']) && $ictab_settings['bg_section_color'] != '')?esc_attr($ictab_settings['bg_section_color']):'';
?>
<div class="ictab-main-content-wrapper ictab-clearfix" id="ictab-header-settings">
<div class="ictab-item-inner-body">
    <div class="ictab-vertical-tab-wrapper ictab_btn_toggle_content ictab-clearfix">
         <ul class="ictab-vtab-wrapper">
              <li class="ictab-vtab ictab-vactive" data-type="header_type" data-id="ictab-cta-header-text" data-tabid="ictab-header1-settings">
                <i class="fa fa-pencil-square-o"></i><?php _e('Header Title Settings',ICTABL_TD);?>
              </li>
              <li class="ictab-vtab" data-type="header_type" data-id="ictab-cta-descrition" data-tabid="ictab-desc-settings">
                <i class="fa fa-paragraph"></i><?php _e('Description Settings',ICTABL_TD);?>
              </li>
              <li class="ictab-vtab" data-type="header_type" data-id="ictab-right-image" data-tabid="ictab-image-settings">
                 <i class="fa fa-image"></i><?php _e('Primary Image Settings',ICTABL_TD);?>
              </li>
              <li class="ictab-vtab" data-type="header_type" data-id="ictab-half-background-color" data-tabid="ictab-half-bgsettings">
                 <i class="fa fa-image"></i><?php _e('Background Settings',ICTABL_TD);?>
              </li>
          </ul>
     <div class="ictab-vtab-content-wrapper">
       <div class="ictab-vtab-content ictab-vactive-content" id="ictab-header1-settings">
         <?php include(ICTABL_PATH . '/includes/views/backend/metabox/configure-metabox/template-fields/ictab-header.php');?>
       </div>
       <div class="ictab-vtab-content" id="ictab-desc-settings" style="display:none;">
         <?php include(ICTABL_PATH . '/includes/views/backend/metabox/configure-metabox/template-fields/ictab-content.php');?>
       </div>
        <div class="ictab-vtab-content" id="ictab-image-settings" style="display:none;">
        <?php include(ICTABL_PATH . '/includes/views/backend/metabox/configure-metabox/template-fields/ictab-image.php');?>
       </div>

      <div class="ictab-vtab-content" id="ictab-half-bgsettings" style="display:none;">
            <div class="ictab-option-wrapper" id="ictab-half-background-color">
                <div class="ictab-field-options-wrap">
                       <div class="ictab-label-field"><label><?php echo __('Section Background Color', ICTABL_TD) ?></label></div>
                       <div class="ictab-input-field"> 
                          <label><input class="ictab-input-option ictab-sectionbgtype-option" type="radio" 
                      name="ictab_settings[section_bg_color_type]" value="default" <?php if($section_bg_color_type == 'default') echo 'checked';?>/>Default</label>
                    <label><input class="ictab-input-option ictab-sectionbgtype-option" type="radio" 
                      name="ictab_settings[section_bg_color_type]" value="custom" <?php if($section_bg_color_type == 'custom') echo 'checked';?>/>Custom</label>              
                       </div>
                </div>
              <div class="ictab-section-sc-options" <?php if($section_bg_color_type == 'default') echo 'style="display:none;"';?>>
                <div class="ictab-field-options-wrap">
                       <div class="ictab-label-field"><label><?php echo __('Background Section Color', ICTABL_TD) ?></label></div>
                       <div class="ictab-input-field"> 
                          <input type="text" class="ictab-custom-color-picker" data-alpha="true"
                           name='ictab_settings[bg_section_color]' value='<?php echo $bg_section_color;?>' />
                       </div>
                </div>
              </div>

            </div>
       </div>

     </div>
  </div> 
</div> 
</div>