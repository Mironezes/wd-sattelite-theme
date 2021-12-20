<?php
/**
 * Template Name: Full-width
 * 
 * The template for displaying page in Full Width
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WD_Sattelite_Theme
 */

get_header();
?>


<main class="fullwidth site-content">
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
		</div>
	</main>

<?php
get_footer();
