<?php defined('ABSPATH') or die('No script kiddies please!!');
$rt_image_type  = (isset($ictab_settings['rt_image_type']) && $ictab_settings['rt_image_type'] == 'custom')?'custom':'default';
$right_image_url  = (isset($ictab_settings['right_image']['url']) && $ictab_settings['right_image']['url'] != '')?esc_url($ictab_settings['right_image']['url']):'';
$right_image_animation  = (isset($ictab_settings['right_image']['animation']) && $ictab_settings['right_image']['animation'] != 'none' && $ictab_settings['right_image']['animation'] != '')?esc_attr($ictab_settings['right_image']['animation']):'';
?>
<div class="ictab-option-wrapper" id="ictab-right-image">
   <div class="ictab-item-inner-body">
        
        <div class="ictab-field-options-wrap">
               <div class="ictab-label-field"><label><?php echo __('Choose Image Type', ICTABL_TD) ?></label></div>
               <div class="ictab-input-field"> 
                  <label><input class="ictab-input-option ictab-rtimage-option" type="radio" 
              name="ictab_settings[rt_image_type]" value="default" <?php if($rt_image_type == 'default') echo 'checked';?>/>Default</label>
            <label><input class="ictab-input-option ictab-rtimage-option" type="radio" 
              name="ictab_settings[rt_image_type]" value="custom" <?php if($rt_image_type == 'custom') echo 'checked';?>/>Custom</label>              
               </div>
        </div>
   
  <div class="ictab-cimage-options" <?php if($rt_image_type == 'default') echo 'style="display:none;"';?>> 
        <div class="ictab-field-options-wrap">
             <div class="ictab-label-field"><label><?php echo __('Custom Image', ICTABL_TD) ?></label></div>
             <div class="ictab-input-field"> 
                <input type="text" name='ictab_settings[right_image][url]' class='ictab-right-image' value='<?php echo $right_image_url;?>' />
                <input type="button" class='ictab-button ictab-default-button ictab-upload-img-btn' value='<?php _e('Upload Image', ICTABL_TD); ?>' />
             </div>
        </div>
           <div class="ictab-field-options-wrap">
             <div class="ictab-label-field"><label><?php echo __('Animation', ICTABL_TD) ?></label></div>
             <div class="ictab-input-field"> 
               <select class="ictab-select-field" name="ictab_settings[right_image][animation]">
                       <option value="none" <?php if($right_image_animation == 'none') echo 'selected="selected"';?>><?php echo __('None', ICTABL_TD); ?></option>
                        <?php 
                        if(isset($ictab_animation) && !empty($ictab_animation)){
                        foreach ($ictab_animation as $key => $kvalue){
                           ?>
                        <optgroup label="<?php echo ucwords(str_replace("_", " ", $key));?>">
                         <?php 
                           if(is_array($kvalue)){
                               foreach ($kvalue as $k => $v){ ?>
                               <option value="<?php echo esc_attr($v);?>" <?php if($right_image_animation == $v) echo 'selected="selected"';?>><?php echo esc_attr(ucwords($v));?></option>
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
</div>
