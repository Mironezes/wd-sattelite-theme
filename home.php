<?php
/**
 * The template file for Homepage
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
?>

	<?php if(get_field('general_options_use_welcome_screen', 'option')) : ?>
	<section id="welcome-screen" class="site-title">
		<div class="container">

			<?php
				$current_lang = null;

				if(function_exists('pll_current_language')) :
					$current_lang = pll_current_language();
				?>
					<h1><?= get_field('general_welcome_screen_text_' . $current_lang . '', 'option');?></h1>
				<?php 
				else : ?>
					<h1><?= get_field('general_welcome_screen_text', 'option');?></h1>	
				<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<main id="home" class="site-content">
		<div class="container">
			<section class="site-content-main">

				

				<section class="recent-posts">
					<?php 
					
						$cat_args=array('orderby' => 'name','order' => 'ASC');
						$categories=get_categories($cat_args);

						foreach($categories as $category) : 

							$args=array(
								'showposts' => 4,
								'category__in' => array($category->term_id),
								'ignore_sticky_posts' => 1
							);

							$posts = get_posts($args);
							if ($posts) : ?>

								<div id="<?= $category->slug;?>" class="home recent-posts-block">
									<div class="recent-post-header">
										<h2><?= $category->name; ?></h2>
										<a href="/<?= $category->slug;?>/">See all posts ></a>
									</div>

									<div class="recent-post-tiles">
										<?php
											foreach($posts as $post) {
												setup_postdata($post); ?>
												<div class="recent-post-tile">
													<div class="recentpost-tile-image">
														<a href="<?php the_permalink() ?>">
															<?php the_post_thumbnail('medium'); ?>
														</a>
													</div>
													<div class="recent-post-tile-content">
														<?php
															$title = wp_trim_words(get_the_title(), 8, '...'); 
															$excerpt = wp_trim_words(get_the_excerpt(), 16, '...');
														?>
														<h3><a href="<?php the_permalink() ?>"><?= $title; ?></a></h3>
														<p><?= $excerpt ?></p>
														<a href="<?php the_permalink() ?>" class="read-more">Read more</a>
													</div>
												</div>
												<?php 
											}; ?>
									</div>
								</div>
						<?php endif;  
						endforeach;
						?>
				</section>
			</div>
		</section>
		</div>
	</main>
<?php
get_footer();
