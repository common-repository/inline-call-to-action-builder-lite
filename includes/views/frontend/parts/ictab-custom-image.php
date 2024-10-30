<?php defined('ABSPATH') or die("No script kiddies please!");
$rt_image_type  = (isset($ictab_settings['rt_image_type']) && $ictab_settings['rt_image_type'] == 'custom')?'custom':'default';
$right_image  = (isset($ictab_settings['right_image']['url']) && $ictab_settings['right_image']['url'] != '')?esc_url($ictab_settings['right_image']['url']):'';
$right_image_animation  = (isset($ictab_settings['right_image']['animation']) && $ictab_settings['right_image']['animation'] != 'none' && $ictab_settings['right_image']['animation'] != '')?esc_attr('wow '.$ictab_settings['right_image']['animation']):'';
?>
<div class="ictab-image-wrap ictab-right-image-wrap <?php echo $right_image_animation;?>">
	<?php if($rt_image_type == "default"){ ?>
      <img src="<?php echo esc_url($availablearray['available_text'][$template_num]['image1']);?>"/>
	<?php }else{
		if($right_image != ''){?>
      <img src="<?php echo $right_image;?>"/>
	<?php }
	 }?>
</div>