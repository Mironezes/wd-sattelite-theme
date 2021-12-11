<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WD_Sattelite_Theme
 */
?>

<aside class="site-content-aside">
	<?= do_shortcode('[yop_poll id="1"]'); ?>

	<?php dynamic_sidebar( 'sidebar' ); ?>

	<?php 
	if(is_single() || is_archive() ) {
		wdst_related_post(); 
	}
	?>
	
</aside><!-- #secondary -->
