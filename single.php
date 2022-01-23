<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WD_Sattelite_Theme
 */

get_header();

$show_background_image = intval(get_option('wdst_top_bg_img', ''));
?>

	<?php 
		if($show_background_image) {
			include_once(__DIR__ . '/inc/site-title.php'); 
		}
	?>

	<main class="site-content">
		<div class="container">
			<section class="site-content-main">
					<?php
					while ( have_posts() ) :
						the_post(); 
						get_template_part( 'template-parts/content', 'single' );
						?>
					<?php
					endwhile; // End of the loop.
					?>

					<?php

					if(get_previous_post() || get_next_post()) : ?>
						<section class="single-post-navigation-block">
							<?php 
								the_post_navigation(
									array(
										'prev_text' => '<span class="nav-subtitle">' . pll__('Previous post') . ':' . '</span> <span class="nav-title">%title</span>',
										'next_text' => '<span class="nav-subtitle">' . pll__('Next post') . ':' . '</span> <span class="nav-title">%title</span>',
									)
								);
								?>
						</section>
					<?php endif; ?>
					
					<?php comments_template();?>

			</section>	
			<?php get_sidebar(); ?>
		</div>
	</main>
<?php
get_footer();
