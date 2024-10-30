<?php defined('ABSPATH') or die('No script kiddies please!!');?>
<div class="ictab-header">
	<div class="ictab-header-section">
	     <img src='<?php echo esc_attr(ICTABL_IMG_DIR); ?>backend-logo.png' alt="plugin-logo" />
	</div>
	<div class="ictab-title-section">
	     <div class="et-settings-title">
		       <h2><?php _e(' Import/Export Settings', ICTABL_TD); ?></h2>
		</div>
	</div>
</div>
<div class="ictab-container">
<div class="ictab-import-export-wrapper">
	<?php
		$msgid = (isset($_GET['message']) && $_GET['message'] != '')?intval($_GET['message']):'';
		switch ($msgid) {
			case '1':
			?>
			 <div id="message" class='updated notice notice-success is-dismissible'>
				 <p><?php _e("File Imported Successfully.", ICTABL_TD); ?></p>
			</div>
			<?php
			break;

			case '2':
			?>
			<div id="message" class='updated notice notice-success is-dismissible'>
				 <p><?php _e("No any inline cta builder post type's post data lists found.", ICTABL_TD); ?></p>
			</div>
			<?php
			break;

			case '3':
			?>
			<div id="message" class='updated notice notice-success is-dismissible'>
				 <p><?php _e("Something went wrong. Please try again later.", ICTABL_TD); ?></p>
			</div>
			<?php
			break;

			case '4':
			?>
			<div id="message" class='updated notice notice-success is-dismissible'>
				 <p><?php _e("Something went wrong. Please check the write permission of tmp folder inside the plugin\'s folder", ICTABL_TD); ?></p>
			</div>
			<?php
			break;

			case '5':
			?>
			<div id="message" class='updated notice notice-success is-dismissible'>
				 <p><?php _e("Invalid File Extension.", ICTABL_TD); ?></p>
			</div>
			<?php
			break;

			case '6':
			?>
			<div id="message" class='updated notice notice-success is-dismissible'>
				 <p><?php _e("Choose File type option to import json file.", ICTABL_TD); ?></p>
			</div>
			<?php
			break;
			case '7':
			?>
			<div id="message" class='updated notice notice-success is-dismissible'>
				 <p><?php _e("No any file uploaded to import. Please upload json custom file of our plugin.", ICTABL_TD); ?></p>
			</div>
			<?php
			break;
			default:
			?>

			<?php
			break;
		}
		?>

 <div class="ictab-holder">
  <form method="post" action="<?php echo admin_url( 'admin-post.php' ); ?>" enctype="multipart/form-data">
  	<input type="hidden" name="action" value="ictab_import_form_action"/>
		<?php wp_nonce_field( 'ictab-import-nonce', 'ictab_import_nonce_field' ); ?>
	<div class="ictab-field-wrapper ictab-import-wrapper">
      <h3><i class="fa fa-download"></i> <?php _e("Import Settings", ICTABL_TD); ?> </h3>
      <div class="ictab-column-full-width">
	        <div class="ictab-field ictab-clearfix">
	           <div class="ictab-field-label">
	              <label class="ictab-label-inline">
	                 <?php _e("Choose Import File Type", ICTABL_TD); ?>
	                 <p class="description"><?php _e('Choose import file type using json file.',ICTABL_TD);?></p>
	              </label>

	           </div>
	          <div class="ictab-field-input">
	             <select name="ictab_import_file_type" class="ictab-impfiletype">
	                <option value="">Choose File</option>
	                <option value="demo_json"><?php _e("Upload Our Demo File", ICTABL_TD); ?></option>
	                <option value="custom_json"><?php _e("Upload Custom File", ICTABL_TD); ?></option>
	             </select>
	           </div>
	        </div>
	  </div>
	  <div class="ictab-column-full-width ictab-demo-upload-wrapper" style="display:none;">
	        <div class="ictab-field ictab-clearfix">
	           <div class="ictab-field-label">
	              <label class="ictab-label-inline">
	                 <?php _e("Upload Demo File", ICTABL_TD); ?>
	                 <p class="description"><?php _e('Choose inline cta builder demo file.',ICTABL_TD);?></p>
	              </label>
	           </div>
	          <div class="ictab-field-input">
	          	 <?php
                  $directory_file  = ICTABL_PATH.'/demo';
                  $files = scandir($directory_file, 1);
                  ?>
	              <select id="ictab-demo-choice" name="demo_import_file">
                    <?php for ($i = 0; $i < count($files) - 2; $i++) {
                    	$fn = str_replace('-',' ', $files[$i]);
                        $filename = ucwords(str_replace('.json', '', $fn));
                       ?>
                        <option value="<?php echo $files[$i];?>"><?php echo $filename;?></option>
                       <?php } ?>
                  </select>
	           </div>
	        </div>
	  </div>
	  <div class="ictab-column-full-width ictab-custom-upload-wrapper" style="display:none;">
	        <div class="ictab-field ictab-clearfix">
	           <div class="ictab-field-label">
	              <label class="ictab-label-inline">
	                 <?php _e("Upload Custom File", ICTABL_TD); ?>
	                 <p class="description"><?php _e('Import Custom CTA of our plugin using json file.',ICTABL_TD);?></p>
	              </label>
	           </div>
	          <div class="ictab-field-input">
                     <input id="ictab_uploadFile" placeholder="Choose File" disabled="disabled" />
                     <div class="fileUpload btn btn-primary">
                         <label><i class="dashicons dashicons-upload"></i>Upload File</label>
                         <input id="ictab_uploadimport_Btn" type="file" class="upload" name="import_cta_file" />
                     </div>
	          </div>
	        </div>
	  </div>
 <input type="submit" name="import_cta_submit" value="<?php _e('Import',ICTABL_TD);?>" class="ictab-btn ictab-default-button"/>
</div>
</form>
<!-- export settings-->
<form method="post" action="<?php echo admin_url( 'admin-post.php' ); ?>" id="ictab-export-form">
		<input type="hidden" name="action" value="ictab_export_form_action"/>
		<?php wp_nonce_field( 'ictab-export-nonce', 'ictab_export_nonce_field' ); ?>
			<div class="ictab-field-wrapper ictab-import-wrapper">
			      <h3><i class="fa fa-upload"></i> <?php _e("Export Settings", ICTABL_TD); ?> </h3>
			      <div class="ictab-column-full-width">
				        <div class="ictab-field ictab-clearfix">
				           <div class="ictab-field-label">
				              <label class="ictab-label-inline">
				                 <?php _e("Export File", ICTABL_TD); ?>
				          	  </label>
				           </div>
				          <div class="ictab-field-input">
				            <?php
							 $args = array(
				                'post_type' => 'inline-cta-builder',
				                'post_status' => 'publish',
				                'posts_per_page' => -1
				            );
				            $ictab_posts = new WP_Query($args);
				           // $this->displayArr($ictab_posts);
							?>
							<select name="ictab_export_id" id="ictab_file_export_post">
								<option value="">--Choose CTA File</option>
				                <?php if ($ictab_posts->have_posts()) { while ($ictab_posts->have_posts()) : $ictab_posts->the_post(); ?>
				                    <option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>
				                <?php endwhile;  } ?>
				            </select>
				            <input type="submit" name="ictab-export-file" value="<?php _e('Export',ICTABL_TD);?>" class="ictab-btn ictab-default-button" id="ictab_export_file"/>
				           </div>
				        </div>
				  </div>
			</div>
     </form>
    </div>
</div>
<?php include_once(ICTABL_PATH.'/includes/views/backend/metabox/ictab-upgrade-right.php');?>
<div>
