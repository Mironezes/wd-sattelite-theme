<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WD_Sattelite_Theme
 */

get_header();

$show_background_image = get_field('main_background_image_enabled', 'option');

if( is_author() ) {
	$author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
	$author_desc = get_the_author_meta('user_description');
}
?>

	<?php 
		if($show_background_image) {
			include_once(__DIR__ . '/inc/site-title.php'); 
		}
	?>

	<main class="site-content">
		<div class="container">
			<section class="site-content-main">

			<?php if( is_author() ): ?>
					<?php 
						$author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
					?>

				<div class="site-author-info">
					<div class="site-author-info-image">
						<?php $author_img = get_field('general_author_image', 'option');?>
						<img 
							src="<?= $author_img['url'];?>" 
							width="<?= $author_img['width'];?>" 
							height="<?= $author_img['height'];?>"
							alt="<?= $author_img['alt'];?>"
						>
					</div>
					<div class="site-author-info-desc">
						<h2><?= $author_name;?></h2>
						<p><?= $author_desc; ?></p>
					</div>

				</div>
			<?php else: ?>
				<?php if(!$show_background_image) : ?>
					<div class="archive-heading">
						<h1><?= single_term_title();?></h1>
						<?php 				
							if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb( '<div id="site-breadcrumbs">','</div>' );
							}
						?>
					</div>
				<?php endif; ?>
			<?php endif;?>

				
			<div class="archive-posts">
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
			</div>
			</section>	
			<?php get_sidebar(); ?>
		</div>
	</main>
<?php
get_footer();
