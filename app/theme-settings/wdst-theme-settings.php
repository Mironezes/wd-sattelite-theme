<?php
/**
 * Creates Theme Settings Page
 */
add_action('admin_menu', 'add_plugin_page');
function add_plugin_page(){
	add_menu_page( 'Theme Settings', 'Theme Settings', 'manage_options', 'wdst-settings', 'wdst_settings_template', '', 60 );
}

require_once('includes/input-handler.php');
require_once('includes/form-handler.php');



/**
 * Enqueue admin styles and scripts.
 */
add_action( 'admin_enqueue_scripts', 'wdst_enqueue_admin_scripts' );
function wdst_enqueue_admin_scripts() {

	if( get_current_screen()->id == 'toplevel_page_wdst-settings' ) {
		wp_enqueue_media();

		wp_register_style('wdst-styles',  get_template_directory_uri() . '/app/theme-settings/assets/styles.css',  array(), _S_VERSION);
		wp_register_script('wdst-scripts',  get_template_directory_uri() . '/app/theme-settings/assets/scripts.js',  array(), _S_VERSION, true);
	
		$wdst_localize_script = array(
			'is_polylang_exists' => function_exists( 'pll_languages_list' ),
			'is_polylang_setup' => function_exists( 'pll_languages_list' ) && count(pll_languages_list()) > 0,
	
			'wp_rand' => wp_rand(),
			'url' => admin_url( 'admin-ajax.php' ),
		);
		wp_localize_script( 'wdst-scripts', 'wdst_localize', $wdst_localize_script);
	
		wp_enqueue_style('wdst-styles');
		wp_enqueue_script('wdst-scripts');
	}

}


/**
 * Sets max image size limit.
 */
function wdst_max_image_size_limit( $file ) {
		$size = $file['size'];
		$size = $size / 1024;
		$type = $file['type'];
		$is_image = strpos( $type, 'image' ) !== false;
		$limit = 150;
		$limit_output = '150kb';

		if ( $is_image && $size > $limit ) {
			$file['error'] = 'Image files must be smaller than ' . $limit_output;
		}

		return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'wdst_max_image_size_limit' );


/**
 * Sets Theme Settings Template.
 */
function wdst_settings_template() { ?>
	<div id="wdst-settings-page">
		<div class="container">

			<h1>WD Satellite Theme  <small>ver <?= _S_VERSION ?></small></h1>
			<a href="#" target="_blank">Documentation</a>

			<?php 
				if(!empty($_POST['wdst_form_submitted'])) {
					$_POST['wdst_form_submitted'] === 'true' ? wdst_form_handler() : null; 
				} 
			?>

			<form method="POST">

				<input type="hidden" name="wdst_form_submitted" value='true'>
				<?php wp_nonce_field('wdst_save_settings', 'wfp_nonce'); ?>

				<?php 
					include_once('sections/general.php');
					include_once('sections/header.php'); 
					include_once('sections/homepage.php'); 
					include_once('sections/layout.php'); 
					include_once('sections/footer.php');
				?>

				<input type="submit" name="submit" id="wdst-submit" class="wdst-button submit" value="Save changes">
			</form>
		</div>
	</div>
<?php }