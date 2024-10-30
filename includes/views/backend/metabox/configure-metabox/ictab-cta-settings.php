<?php defined('ABSPATH') or die('No script kiddies please!!');?>
<div class="ictab-btn-lists-wrapper ictab-clearfix">
<?php for($i = 1; $i <= 3; $i++){
$rnumber = rand(111111111, 999999999);
$btn_text  = (isset($ictab_settings['cta_option'][$i]['btn_text']) && $ictab_settings['cta_option'][$i]['btn_text'] != '')?esc_attr($ictab_settings['cta_option'][$i]['btn_text']):'';
$btn_animation  = (isset($ictab_settings['cta_option'][$i]['animation']) && $ictab_settings['cta_option'][$i]['animation'] != '')?esc_attr($ictab_settings['cta_option'][$i]['animation']):'none';
$button_link_type  = (isset($ictab_settings['cta_option'][$i]['button_link_type']) && $ictab_settings['cta_option'][$i]['button_link_type'] != '')?esc_attr($ictab_settings['cta_option'][$i]['button_link_type']):'';
$cta_enable_styles = (isset($ictab_settings['cta_option'][$i]['enable_styles']) && $ictab_settings['cta_option'][$i]['enable_styles'] == 1)?1:0;
$cta_hide_on_mobile = (isset($ictab_settings['cta_option'][$i]['hide_on_mobile']) && $ictab_settings['cta_option'][$i]['hide_on_mobile'] == 1)?1:0;
$cta_hide_on_desktop = (isset($ictab_settings['cta_option'][$i]['hide_on_desktop']) && $ictab_settings['cta_option'][$i]['hide_on_desktop'] == 1)?1:0;
$btn_bgcolor = (isset($ictab_settings['cta_option'][$i]['btn_bgcolor']) && $ictab_settings['cta_option'][$i]['btn_bgcolor'] != '')?esc_attr($ictab_settings['cta_option'][$i]['btn_bgcolor']):'';
$btn_bghcolor = (isset($ictab_settings['cta_option'][$i]['btn_bghcolor']) && $ictab_settings['cta_option'][$i]['btn_bghcolor'] != '')?esc_attr($ictab_settings['cta_option'][$i]['btn_bghcolor']):'';
$btn_fcolor = (isset($ictab_settings['cta_option'][$i]['btn_fcolor']) && $ictab_settings['cta_option'][$i]['btn_fcolor'] != '')?esc_attr($ictab_settings['cta_option'][$i]['btn_fcolor']):'';
$btn_fhcolor = (isset($ictab_settings['cta_option'][$i]['btn_fhcolor']) && $ictab_settings['cta_option'][$i]['btn_fhcolor'] != '')?esc_attr($ictab_settings['cta_option'][$i]['btn_fhcolor']):'';
?>
<div class="ictab-option-wrapper">
<div class="ictab-cta-btn-row" data-btnnum="ictab-cta-btn<?php echo $i;?>" data-id="<?php echo $i;?>">
<div class="ictab-item-header-wrap">
 <span class='ictab-item-title'><?php echo __('CTA Button ', ICTABL_TD) ?> <?php echo $i;?> <?php echo __(' Settings', ICTABL_TD) ?></span>
 <span class='ictab-tab-toggle'><i class="fa fa-caret-up"></i></span>
</div> 

<div class="ictab-item-inner-body">

<div class="ictab-vertical-tab-wrapper ictab_btn_toggle_content ictab-clearfix">
     <ul class="ictab-vtab-wrapper">
          <li class="ictab-vtab ictab-vactive" data-type="button_type" data-id="ictab-btn-display-<?php echo $rnumber;?>">
            <i class="fa fa-pencil-square"></i><?php _e('Text Settings',ICTABL_TD);?>
          </li>
          <li class="ictab-vtab" data-type="button_type" data-id="ictab-btn-trigger-<?php echo $rnumber;?>">
            <i class="fa fa-link"></i><?php _e('Link Settings',ICTABL_TD);?>
          </li>
          <li class="ictab-vtab" data-type="button_type" data-id="ictab-btn-animation-<?php echo $rnumber;?>">
            <i class="fa fa-magic"></i><?php _e('Animation Settings',ICTABL_TD);?>
          </li>
          <li class="ictab-vtab" data-type="button_type" data-id="ictab-btn-customization-<?php echo $rnumber;?>">
             <i class="fa fa-adjust"></i><?php _e('Customization Settings',ICTABL_TD);?>
          </li>
      </ul>
<div class="ictab-vtab-content-wrapper">
  <div class="ictab-vtab-content ictab-vactive-content" id="ictab-btn-display-<?php echo $rnumber;?>">
         
        <div class="ictab-field-options-wrap">
             <div class="ictab-label-field"><label for="ictab-hideonmobile-<?php echo $i;?>"><?php echo __('Hide On Mobile', ICTABL_TD) ?></label></div>
             <div class="ictab-input-field"> 
               <label class="ictab-switch" for="ictab-hideonmobile-<?php echo $i;?>">
               <input type="checkbox" id="ictab-hideonmobile-<?php echo $i;?>" name="ictab_settings[cta_option][<?php echo $i;?>][hide_on_mobile]" 
               value="1" <?php echo checked($cta_hide_on_mobile,1, 0 ); ?>/>   
               <div class="ictab-slider round"></div>
               </label>
               <p class="description">
               <?php _e('Please enable to hide this button in mobile.',ICTABL_TD);?></p>
              </div>
        </div>
         <div class="ictab-field-options-wrap">
             <div class="ictab-label-field">
              <label for="ictab-hideondesktop-<?php echo $i;?>">
                <?php echo __('Hide On Desktop', ICTABL_TD) ?>
              </label>
             </div>
             <div class="ictab-input-field"> 
               <label class="ictab-switch" for="ictab-hideondesktop-<?php echo $i;?>">
               <input type="checkbox" id="ictab-hideondesktop-<?php echo $i;?>" name="ictab_settings[cta_option][<?php echo $i;?>][hide_on_desktop]" 
               value="1" <?php echo checked($cta_hide_on_desktop,1, 0 ); ?>/>   
               <div class="ictab-slider round"></div>
               </label>
               <p class="description">
               <?php _e('Please enable to hide this button in desktop.',ICTABL_TD);?></p>
              </div>
        </div>
        
        <div class="ictab-field-options-wrap">
         <div class="ictab-label-field"><label><?php echo __('Button Text '.$i, ICTABL_TD) ?></label></div>
         <div class="ictab-input-field"> 
                <input type="text" name="ictab_settings[cta_option][<?php echo $i;?>][btn_text]" value="<?php echo $btn_text;?>"/>    
                <input type="hidden" name="ictab_settings[cta_option][<?php echo $i;?>][randomkey]" value="<?php echo $rnumber;?>"/>    
         </div>
        </div>

  </div>

 <div class="ictab-vtab-content" id="ictab-btn-trigger-<?php echo $rnumber;?>" style="display:none;">
          <div class="ictab-field-options-wrap">
         <div class="ictab-label-field"><label><?php echo __('Button Link Type', ICTABL_TD) ?></label></div>
         <div class="ictab-input-field"> 
            <select name="ictab_settings[cta_option][<?php echo $i;?>][button_link_type]" class="ictab-button-linktype ictab-select-field">
                 <option value=""><?php _e('- Select Button Link Type -',ICTABL_TD);?></option>
                 <option value="external" <?php if($button_link_type == 'external') echo 'selected="selected"';?>><?php _e('External Link',ICTABL_TD);?></option>
                 <option value="internal" <?php if($button_link_type == 'internal') echo 'selected="selected"';?>><?php _e('Internal Link',ICTABL_TD);?></option>
            </select>
         </div>
    </div>
    <?php include(ICTABL_PATH. '/includes/views/backend/metabox/configure-metabox/button-links/ictab-cta-button-type.php'); ?>
</div>

<div class="ictab-vtab-content" id="ictab-btn-animation-<?php echo $rnumber;?>" style="display:none;">
    <div class="ictab-field-options-wrap">
         <div class="ictab-label-field"><label><?php echo __('Button Animation', ICTABL_TD) ?></label></div>
         <div class="ictab-input-field"> 
           <select class="ictab-select-field" name="ictab_settings[cta_option][<?php echo $i;?>][animation]">
                   <option value="none" <?php if($btn_animation == 'none') echo 'selected="selected"';?>><?php echo __('None', ICTABL_TD); ?></option>
                    <?php 
                    if(isset($ictab_animation) && !empty($ictab_animation)){
                    foreach ($ictab_animation as $key => $kvalue){
                       ?>
                    <optgroup label="<?php echo ucwords(str_replace("_", " ", $key));?>">
                     <?php 
                       if(is_array($kvalue)){
                           foreach ($kvalue as $k => $v1){ ?>
                           <option value="<?php echo esc_attr($v1);?>" <?php if($btn_animation == $v1) echo 'selected="selected"';?>><?php echo esc_attr(ucwords($v1));?></option>
                         <?php
                           }
                       } 
                      ?>
                    </optgroup>
                <?php } } ?>
                </select>
         </div>
    </div>
</div>

<div class="ictab-vtab-content" id="ictab-btn-customization-<?php echo $rnumber;?>" style="display:none;">
    <div class="ictab-style-custom-wrapper">
        <div class="ictab-style-label">Custom Styles </div>
        <div class="ictab-field-options-wrap">
             <div class="ictab-label-field"><label for="ictab-open-cstyles-<?php echo $i;?>"><?php echo __('Enable Styles', ICTABL_TD) ?></label></div>
             <div class="ictab-input-field"> 
               <label class="ictab-switch">
               <input type="checkbox" id="ictab-open-cstyles-<?php echo $i;?>" class="ictab-open-cstyles" name="ictab_settings[cta_option][<?php echo $i;?>][enable_styles]" value="1" <?php echo checked($cta_enable_styles,1, 0 ); ?>/>   
               <div class="ictab-slider round"></div>
               </label>
              </div>
        </div>
        <div class="ictab-custom-styles-showhide" <?php if($cta_enable_styles != 1) echo 'style="display:none;"';?>>
          <div class="ictab-field-options-wrap ictab-hide-for-t8">
               <div class="ictab-label-field"><label><?php echo __('Background Color', ICTABL_TD) ?></label></div>
               <div class="ictab-input-field"> 
                 <input type="text" class="ictab-custom-color-picker" data-alpha="true" name="ictab_settings[cta_option][<?php echo $i;?>][btn_bgcolor]" value="<?php echo $btn_bgcolor;?>"/>   
                </div>
          </div>
           <div class="ictab-field-options-wrap ictab-hide-for-t8" data->
               <div class="ictab-label-field"><label><?php echo __('Background Hover Color', ICTABL_TD) ?></label></div>
               <div class="ictab-input-field"> 
                 <input type="text" class="ictab-custom-color-picker" data-alpha="true" name="ictab_settings[cta_option][<?php echo $i;?>][btn_bghcolor]" value="<?php echo $btn_bghcolor;?>"/>   
                </div>
          </div>
          <div class="ictab-field-options-wrap">
               <div class="ictab-label-field"><label><?php echo __('Font Color', ICTABL_TD) ?></label></div>
               <div class="ictab-input-field"> 
                 <input type="text" class="ictab-custom-color-picker" name="ictab_settings[cta_option][<?php echo $i;?>][btn_fcolor]" value="<?php echo $btn_fcolor;?>"/>   
                </div>
          </div>
           <div class="ictab-field-options-wrap">
               <div class="ictab-label-field"><label><?php echo __('Font Hover Color', ICTABL_TD) ?></label></div>
               <div class="ictab-input-field"> 
                 <input type="text" class="ictab-custom-color-picker" name="ictab_settings[cta_option][<?php echo $i;?>][btn_fhcolor]" value="<?php echo $btn_fhcolor;?>"/>   
                </div>
          </div>
        </div>
    </div>
  </div>
  </div>
 </div>
</div><!-- item inner body close -->
</div>
</div>
<?php } ?>
</div>