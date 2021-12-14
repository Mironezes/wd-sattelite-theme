<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WD_Sattelite_Theme
 */

get_header();
?>
	<section class="site-title">
		<div class="container">
			<?php the_title( '<h1 class="title">', '</h1>' ); ?>
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<div id="site-breadcrumbs">','</div>' );
				}
			?>
		</div>
	</section>

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
										'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous post:', 'wds-theme' ) . '</span> <span class="nav-title">%title</span>',
										'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next post:', 'wds-theme' ) . '</span> <span class="nav-title">%title</span>',
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
