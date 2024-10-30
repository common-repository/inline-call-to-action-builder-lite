<?php defined('ABSPATH') or die('No script kiddies please!!');?>
<div class="ictab-option-wrapper"  id="ictab-cta-header-text">
   <div class="ictab-item-inner-body">
      <div class="ictab-field-options-wrap">
           <div class="ictab-label-field"><label for="disable_htext"><?php echo __('Hide Header Text', ICTABL_TD) ?></label></div>
           <div class="ictab-input-field"> 
             <label class="ictab-switch">
             <input type="checkbox" id="disable_htext" name="ictab_settings[header_text][disable_htext]" 
             value="1" <?php echo checked($disable_htext,1, 0 ); ?>/>   
             <div class="ictab-slider round"></div>
             </label>
             <p class="description"><?php echo __('Enable this option to hide header text.', ICTABL_TD) ?></p>
            </div>
       </div>
      <div class="ictab-field-options-wrap">
         <div class="ictab-label-field"><label><?php echo __('Header Title', ICTABL_TD) ?></label></div>
         <div class="ictab-input-field"> 
          <input type="text" name="ictab_settings[header_text][title]" value="<?php echo esc_attr($htext_title);?>"/>    
          <p class="description">
            <?php echo __('Note: If left empty, default text will be displayed as per available template is chosen.', ICTABL_TD) ?>
            </p>
         </div>
      </div>
      <div class="ictab-field-options-wrap">
             <div class="ictab-label-field"><label><?php echo __('Animation', ICTABL_TD) ?></label></div>
             <div class="ictab-input-field"> 
               <select class="ictab-select-field" name="ictab_settings[header_text][animation]">
                       <option value="none" <?php if($htext_animation == 'none') echo 'selected="selected"';?>><?php echo __('No Animation', ICTABL_TD); ?></option>
                        <?php 
                        if(isset($ictab_animation) && !empty($ictab_animation)){
                        foreach ($ictab_animation as $key => $kvalue){
                           ?>
                        <optgroup label="<?php echo ucwords(str_replace("_", " ", $key));?>">
                         <?php 
                           if(is_array($kvalue)){
                               foreach ($kvalue as $k => $v){ ?>
                               <option value="<?php echo esc_attr($v);?>" <?php if($htext_animation == $v) echo 'selected="selected"';?>><?php echo esc_attr(ucwords($v));?></option>
                             <?php
                               }
                           } 
                          ?>
                        </optgroup>
                    <?php } } ?>
                    </select>
             </div>
        </div>
        <div class="ictab-style-custom-wrapper">
            <div class="ictab-style-label"><?php echo __('Custom Styles ',ICTABL_TD);?></div>
            <div class="ictab-field-options-wrap">
                 <div class="ictab-label-field"><label for="ictab-h1-styles"><?php echo __('Enable Styles', ICTABL_TD) ?></label></div>
                 <div class="ictab-input-field"> 
                   <label class="ictab-switch">
                   <input type="checkbox" id="ictab-h1-styles" class="ictab-open-cstyles" name="ictab_settings[header_text][enable_styles]" 
                   value="1" <?php echo checked($htext_enable_styles,1, 0 ); ?>/>   
                   <div class="ictab-slider round"></div>
                   </label>
                  </div>
            </div>
          <div class="ictab-custom-styles-showhide" <?php if($htext_enable_styles != 1) echo 'style="display:none;"';?>>
             <div class="ictab-field-options-wrap">
                 <div class="ictab-label-field"><label><?php echo __('Font Family', ICTABL_TD) ?></label></div>
                 <div class="ictab-input-field"> 
                   <select class="ictab-select-field" name="ictab_settings[header_text][font_family]">
                            <option value="default" <?php if($htext_font_family == 'default') echo 'selected="selected"';?>><?php echo __('Default', ICTABL_TD); ?></option>
                            <?php 
                            if(isset($ictab_typo_fonts) && !empty($ictab_typo_fonts)){
                            foreach ($ictab_typo_fonts as $ictab_font) { ?>
                             <option value="<?php echo $ictab_font; ?>" <?php if($htext_font_family == $ictab_font) echo 'selected="selected"';?>><?php echo $ictab_font; ?></option>
                            <?php } 
                            }?> 
                      </select>  
                  </div>
            </div>
            <div class="ictab-field-options-wrap">
                 <div class="ictab-label-field"><label><?php echo __('Font Color', ICTABL_TD) ?></label></div>
                 <div class="ictab-input-field"> 
                   <input type="text" class="ictab-custom-color-picker" name="ictab_settings[header_text][fcolor]" value="<?php echo esc_attr($htext_fcolor);?>"/>   
                  </div>
            </div>
         </div>
        </div>
  </div>
</div>