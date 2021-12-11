<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WD_Sattelite_Theme
 */

get_header();
?>


<main class="single site-content">
		<div class="container">
			<section class="site-content-main">
					<?php
					while ( have_posts() ) :
						the_post(); 
						get_template_part( 'template-parts/content', 'page' );
						?>
					<?php
					endwhile; // End of the loop.
					?>
			</section>	
			<?php get_sidebar(); ?>
		</div>
	</main>

<?php
get_footer();
