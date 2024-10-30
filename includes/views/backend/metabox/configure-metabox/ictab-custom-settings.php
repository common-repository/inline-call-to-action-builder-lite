<?php defined('ABSPATH') or die('No script kiddies please!!');
$bg_width = (isset($ictab_settings['background']['width']) && $ictab_settings['background']['width'] != '')?esc_attr($ictab_settings['background']['width']):'';
$bg_height = (isset($ictab_settings['background']['height']) && $ictab_settings['background']['height'] != '')?esc_attr($ictab_settings['background']['height']):'';
$bgenable_overlay = (isset($ictab_settings['background']['enable_overlay']) && $ictab_settings['background']['enable_overlay'] == 1)?1:0;
$bg_overlay_color = (isset($ictab_settings['background']['overlay_color']) && $ictab_settings['background']['overlay_color'] != '')?esc_attr($ictab_settings['background']['overlay_color']):'';
?>
<div class="ictab-main-content-wrapper ictab-clearfix" id="ictab-custom-settings">
<div class="ictab-option-wrapper">
   <div class="ictab-field-options-wrap">
	<div class="ictab-label-field">
		<label class="ictab-setting-label"><?php _e('Background Size (px)',ICTABL_TD);?></label>
	</div>
	 <div class="ictab-input-field"> 
		<input class="ictab-input-option ictab-small-width" type="number" name="ictab_settings[background][width]" 
		value="<?php echo esc_attr($bg_width);?>"/>
		 <label>Width</label>
		 <input class="ictab-input-option ictab-small-width" type="number" name="ictab_settings[background][height]" 
		 value="<?php echo esc_attr($bg_height);?>"/>
		 <label>Height</label>							
	 </div>
   </div>
   <div class="ictab-option-wrapper">
   <div class="ictab-field-options-wrap">
	<div class="ictab-label-field">
		<label class="ictab-setting-label" for="ictab-enable-overlay-check"><?php _e('Enable Background Overlay',ICTABL_TD);?></label>
	</div>
	 <div class="ictab-input-field"> 
	 	<label class="ictab-switch">
		<input type="checkbox" class="ictab-enable-overlay-check" id="ictab-enable-overlay-check" name="ictab_settings[background][enable_overlay]" value="1" <?php echo checked($bgenable_overlay, 1 , 0 ); ?>/>				
	     <div class="ictab-slider round"></div>
	    </label>
	 </div>
   </div>
</div>

<div class="ictab-option-wrapper ictab-overlay-option-wrapper <?php if($bgenable_overlay != 1) echo 'ictab-hide-options';?>" <?php if($bgenable_overlay == 1) echo ''; else echo 'style="display:none;"';?>>
   <div class="ictab-field-options-wrap">
	<div class="ictab-label-field">
		<label class="ictab-setting-label"><?php _e('Background Overlay Color',ICTABL_TD);?></label>
	</div>
	 <div class="ictab-input-field"> 
		<input type="text" class="ictab-custom-color-picker" data-alpha="true" name="ictab_settings[background][overlay_color]" value="<?php echo $bg_overlay_color;?>"/>				
	 </div>
   </div>
</div>
</div>
</div>