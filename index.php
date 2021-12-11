<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WD_Sattelite_Theme
 */
get_header();

if( is_author() ) {
	$author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
	$author_desc = get_the_author_meta('user_description');
}
?>

	<section class="site-title">
		<div class="container">
			<?php if( is_author() ) : ?>
			<h1>Archives: <?= $author_name; ?></h1>
			<?php else : ?>
				<h1><?= single_term_title(); ?></h1>
			<?php endif;
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<div id="site-breadcrumbs">','</div>' );
				}
			?>
		</div>
	</section>

	<main class="site-content">
		<div class="container">
			<section class="site-content-main">

			<?php if( is_author() ): ?>
					<?php 
						$author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
					?>

				<div class="site-author-info">
					<div class="site-author-info-image">
						<img src="<?= get_template_directory_uri();?>/images/author.jpg" alt="author">
					</div>
					<div class="site-author-info-desc">
						<h2><?= $author_name;?></h2>
						<p><?= $author_desc; ?></p>
					</div>

				</div>
			<?php endif;?>


					<?php if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content' );

						endwhile;

						$args = array(
							'show_all'     => false, 
							'end_size'     => 1,     
							'mid_size'     => 2,     
							'prev_next'    => true,  
							'prev_text'    => __('« Previous'),
							'next_text'    => __('Next »'),
							'add_args'     => false, 
							'add_fragment' => '',     
							'screen_reader_text' => __( 'Posts navigation' ),
						);
						the_posts_pagination($args);

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
			</section>	
			<?php get_sidebar(); ?>
		</div>
	</main>
<?php
get_footer();
