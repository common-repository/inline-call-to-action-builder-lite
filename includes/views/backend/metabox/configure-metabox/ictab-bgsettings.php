<?php defined('ABSPATH') or die('No script kiddies please!!');
$background_type  = (isset($ictab_settings['background']['bg_type']) && $ictab_settings['background']['bg_type'] != '')?esc_attr($ictab_settings['background']['bg_type']):'default';
$bg_selection_type  = (isset($ictab_settings['background']['bg_selection_type']) && $ictab_settings['background']['bg_selection_type'] != '')?esc_attr($ictab_settings['background']['bg_selection_type']):'bgcolor';
$background_color  = (isset($ictab_settings['background']['bg_color']) && $ictab_settings['background']['bg_color'] != '')?esc_attr($ictab_settings['background']['bg_color']):'';
$background_img_url =(isset($ictab_settings['background']['img_url']) && $ictab_settings['background']['img_url'] != '')?esc_url($ictab_settings['background']['img_url']):'';
$enable_parallax = (isset($ictab_settings['background']['enable_parallax']) && $ictab_settings['background']['enable_parallax'] == 1)?1:0;
$bg_parallax_type  = (isset($ictab_settings['background']['parallax_type']) && $ictab_settings['background']['parallax_type'] != '')?esc_attr($ictab_settings['background']['parallax_type']):'';
$bg_parallax_speed  = (isset($ictab_settings['background']['speed']) && $ictab_settings['background']['speed'] != '')?esc_attr($ictab_settings['background']['speed']):'';
$parallax_onmobile = (isset($ictab_settings['background']['parallax_onmobile']) && $ictab_settings['background']['parallax_onmobile'] == 1)?1:0;
?>
<div class="ictab-main-content-wrapper  ictab-clearfix" id="ictab-background-settings">
   <p class="description"><?php _e('Default background option will display default background color or image as per pre available template
   	choosen from above Display Settings. If you want to change background then you can choose custom option with
   	feature to change background color or image.',ICTABL_TD);?></p>
	 <div class="ictab-field-options-wrap">
			<div class="ictab-label-field">
				<label class="ictab-setting-label"><?php _e('Background Type',ICTABL_TD);?></label>
			</div>
		     <div class="ictab-input-field"> 
				<label class="ictab-customhide" data-type="available" <?php if($template_type == "custom") echo 'style="display:none;"';?>><input class="ictab-input-option ictab-bgtype-option" type="radio" 
					name="ictab_settings[background][bg_type]" value="default" <?php if($background_type == 'default') echo 'checked';?>/>Default</label>
				<label><input class="ictab-input-option ictab-bgtype-option" type="radio" 
					name="ictab_settings[background][bg_type]" value="custom" <?php if($background_type == 'custom') echo 'checked';?>/>Custom</label>							
		     </div>
	 </div>

  <div class="ictab-showhide-options" <?php if($background_type == 'default' || $background_type == '') echo 'style="display:none;"';?>>
	  <div class="ictab-field-options-wrap">
			<div class="ictab-label-field">
				<label class="ictab-setting-label"><?php _e('Background Selection',ICTABL_TD);?></label>
			</div>
		     <div class="ictab-input-field"> 
		     	<select id="ictab-background-option" name="ictab_settings[background][bg_selection_type]" class="ictab-select-field ictab-select-options ictab-background-selector">
		     		    <option value="bgcolor" <?php if($bg_selection_type == 'bgcolor') echo 'selected="selected"';?>><?php _e('Background Color',ICTABL_TD);?></option>
						<option value="image" <?php if($bg_selection_type == 'image') echo 'selected="selected"';?>><?php _e('Image',ICTABL_TD);?></option>
				</select>						
		     </div>
	 </div>

	 <div class="ictab-field-options-wrap ictab-allbgtype-options" id="ictab-background-bgcolor" <?php if($bg_selection_type == 'bgcolor') echo ''; else echo 'style="display:none;"';?>>
			<div class="ictab-label-field">
				<label class="ictab-setting-label"><?php _e('Background Color',ICTABL_TD);?></label>
			</div>
		     <div class="ictab-input-field"> 
	        <input type="text" name="ictab_settings[background][bg_color]" class="ictab-custom-picker ictab-custom-color-picker" data-alpha="true" 
	        id="ictab-custom-bgpicker" value="<?php echo $background_color;?>"/>				
		     </div>
	 </div>

	 <div class="ictab-field-options-wrap ictab-allbgtype-options" id="ictab-background-image" <?php if($bg_selection_type == 'image') echo ''; else echo 'style="display:none;"';?>>
			<div class="ictab-label-field">
				<label class="ictab-setting-label"><?php _e('Upload Image',ICTABL_TD);?></label>
			</div>
		     <div class="ictab-input-field"> 
	        <input type="text" class="ictab-bg-upload-img-url" name="ictab_settings[background][img_url]" value="<?php echo $background_img_url;?>"/>
             <input type="button" class="ictab-default-button ictab-upload-img-button" value="<?php _e('Upload Background Image',ICTABL_TD);?>"/>                                       						
		     </div>
	 </div>
  </div>

  <div class="ictab-parallax-options" <?php if($background_type == 'default' || $bg_selection_type == 'image') echo ''; else echo 'style="display:none;"';?>>
    <div class="ictab-field-options-wrap">
			<div class="ictab-label-field">
				<label class="ictab-setting-label" for="enable_parallax"><?php _e('Enable Parallax Effect?',ICTABL_TD);?></label>
			</div>
		     <div class="ictab-input-field"> 
		     	<label class="ictab-switch">
	              <input type="checkbox" id="enable_parallax" name="ictab_settings[background][enable_parallax]" 
	              value="1" <?php echo checked($enable_parallax,1, 0 ); ?>/>
                <div class="ictab-slider round"></div>
                </label>
            </div>
	  </div>
 <div class="ictab-parallax-option-wrapper" <?php if($enable_parallax == 1) echo ''; else echo 'style="display:none;"';?>>
	   <div class="ictab-field-options-wrap">
			<div class="ictab-label-field">
				<label class="ictab-setting-label" for="enable_parallax"><?php _e('Parallax Type',ICTABL_TD);?></label>
			</div>
		     <div class="ictab-input-field"> 
	          <select id="ictab-parallax-type-select-option" name="ictab_settings[background][parallax_type]" class="ictab-parallax-type-select-option ictab-select-field">
					<option value="scroll" <?php if($bg_parallax_type == 'scroll') echo 'selected="selected"';?>>Scroll</option>
					<option value="scale" <?php if($bg_parallax_type == 'scale') echo 'selected="selected"';?>>Scale</option>
					<option value="opacity" <?php if($bg_parallax_type == 'opacity') echo 'selected="selected"';?>>Opacity</option>
				</select>
            </div>
	  </div>
	   <div class="ictab-field-options-wrap">
			<div class="ictab-label-field">
				<label class="ictab-setting-label" for="enable_parallax"><?php _e('Parallax Speed',ICTABL_TD);?></label>
			</div>
		     <div class="ictab-input-field"> 
	          <input type="number" step="0.01" min="0" max="2" id="ec-background-video-overlay-color" 
	          class="min-max-value" name="ictab_settings[background][speed]" value="<?php echo $bg_parallax_speed;?>" placeholder="0.5">
            </div>
	  </div>
	   <div class="ictab-field-options-wrap">
			<div class="ictab-label-field">
				<label class="ictab-setting-label" for="parallax_onmobile"><?php _e('Enable on Mobile devices?',ICTABL_TD);?></label>
			</div>
		     <div class="ictab-input-field"> 
		     	<label class="ictab-switch">
	              <input type="checkbox" id="parallax_onmobile" name="ictab_settings[background][parallax_onmobile]" 
	              value="1" <?php echo checked($parallax_onmobile,1, 0 ); ?>/>
                <div class="ictab-slider round"></div>
                </label>
            </div>
	  </div>
	  
	 </div>
  </div>
</div>