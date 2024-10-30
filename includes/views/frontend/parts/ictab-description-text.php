<?php defined('ABSPATH') or die("No script kiddies please!");
$disable_desc  = (isset($ictab_settings['description']['disable_desc']) && $ictab_settings['description']['disable_desc'] == 1)?1:0;
$description  = (isset($ictab_settings['description']['html_text']) && $ictab_settings['description']['html_text'] != '')?stripcslashes($ictab_settings['description']['html_text']):$availablearray['available_text'][$template_num]['descripion'];
$desc_animation  = (isset($ictab_settings['description']['animation']) && $ictab_settings['description']['animation'] != '' && $ictab_settings['description']['animation'] != 'none')?esc_attr('wow animated '.$ictab_settings['description']['animation']):'';
if($desc_animation == "none"){
	$desc_animation = "";
}
if($disable_desc  != 1){
?>
<div class="ictab-description-content-wrap <?php echo $desc_animation;?>">
  <?php echo $description;?>
</div>
<?php 
}