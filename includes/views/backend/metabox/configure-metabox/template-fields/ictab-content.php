<?php defined('ABSPATH') or die('No script kiddies please!!');?>
<div class="ictab-option-wrapper" id="ictab-cta-descrition">
   <div class="ictab-item-inner-body">
      <div class="ictab-field-options-wrap">
           <div class="ictab-label-field"><label for="disable_desc"><?php echo __('Hide Description', ICTABL_TD) ?></label></div>
           <div class="ictab-input-field"> 
             <label class="ictab-switch">
             <input type="checkbox" id="disable_desc" name="ictab_settings[description][disable_desc]" 
             value="1" <?php echo checked($disable_desc,1, 0 ); ?>/>   
             <div class="ictab-slider round"></div>
             </label>
             <p class="description"><?php echo __('Enable this option to hide description.',ICTABL_TD);?></p>
            </div>
       </div>
        <div class="ictab-field-options-wrap">
             <div class="ictab-label-field"><label><?php echo __('Description', ICTABL_TD) ?></label></div>
             <div class="ictab-input-field"> 
                <?php wp_editor(isset($ictab_settings[ 'description' ]['html_text']) ? $ictab_settings[ 'description' ]['html_text'] : '', 'ictab-cta-description', array( 'textarea_name' => 'ictab_settings[description][html_text]', 'media_buttons' => false, 'textarea_rows' => 5, 'editor_class' => 'ictab-settings-field' )); ?>
                 <p class="description"><?php echo __('Note: If left empty, default description will be displayed as per available template is chosen.',ICTABL_TD);?>
                  </p>
             </div>
        </div>
       <div class="ictab-field-options-wrap">
             <div class="ictab-label-field"><label><?php echo __('Animation', ICTABL_TD) ?></label></div>
             <div class="ictab-input-field"> 
               <select class="ictab-select-field" name="ictab_settings[description][animation]">
                       <option value="none" <?php if($description_animation == 'none') echo 'selected="selected"';?>><?php echo __('No Animation', ICTABL_TD); ?></option>
                        <?php 
                        if(isset($ictab_animation) && !empty($ictab_animation)){
                        foreach ($ictab_animation as $key => $kvalue){
                           ?>
                        <optgroup label="<?php echo ucwords(str_replace("_", " ", $key));?>">
                         <?php 
                           if(is_array($kvalue)){
                               foreach ($kvalue as $k => $v){ ?>
                               <option value="<?php echo esc_attr($v);?>" <?php if($description_animation == $v) echo 'selected="selected"';?>><?php echo esc_attr(ucwords($v));?></option>
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
</div>