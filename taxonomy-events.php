<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php 

			$args = [
				'category' => 'events',
			];

      $eventsArchiveQuery = new WP_Query($args); 
    
    
      if ( $eventsArchiveQuery->have_posts() ) : ?>

			<header class="page-header">
				<h1><?php single_term_title(); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'event' );

			endwhile;
			wp_reset_postdata();
			
			the_posts_pagination();

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
