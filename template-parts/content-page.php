<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WD_Sattelite_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="page-header">
			<?php 
				the_title( '<h1>', '</h1>' );
				if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
					yoast_breadcrumb( '<div id="site-breadcrumbs">','</div>' );
				}
			?>
			
		</header><!-- .page-header -->

		<div class="page-content">
			<?php
				the_content();
			?>
		</div><!-- .page-content -->
</article><!-- #post-<?php the_ID(); ?> -->
