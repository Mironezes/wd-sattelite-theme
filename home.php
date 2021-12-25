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

$current_lang = null;
if(function_exists('pll_current_language')) $current_lang = pll_current_language();

$show_categories_list = get_field('homepage_blog_layout_categories_list', 'option');
$show_categories_list = !empty($show_categories_list) ? $show_categories_list[0] : 0;

$show_sidebar = get_field('homepage_blog_layout_sidebar', 'option');
$show_sidebar = !empty($show_sidebar) ? $show_sidebar[0] : 0;
$has_sidebar = $show_sidebar ? 'has-sidebar' : '';
?> 


	<?php if(get_field('general_options_use_welcome_screen', 'option')) : ?>
		<section id="welcome-screen" class="site-title">
			<div class="container">
					<?php if($current_lang) : ?>
						<h1><?= get_field('general_welcome_screen_text_' . $current_lang . '', 'option');?></h1>
					<?php 
					else : ?>
						<h1><?= get_field('general_welcome_screen_text', 'option');?></h1>	
					<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<main id="home" class="site-content <?= $has_sidebar;?>">
		<div class="container">
			<section class="site-content-main">
				<?php if(!$show_categories_list) : ?>
					<?php if($current_lang) : ?>
						<h1><?= get_field('homepage_h1_' . $current_lang . '', 'option');?></h1>
						<?php 
							else : ?>
							<h1><?= get_field('homepage_h1_default', 'option');?></h1>	
						<?php endif; 
							if(is_paged() && function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb( '<div id="site-breadcrumbs">','</div>' );
							}
						?>
					<?php endif; ?>
				<?php if($show_categories_list == 1) : ?>
					<?php include_once(__DIR__ . '/inc/all-categories-tiles.php'); ?>
				<?php else: ?>
					<?php include_once(__DIR__ . '/inc/latest-posts-list.php'); ?>
				<?php endif; ?>
		</section>
			<?php if($show_sidebar == 1) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div>
	</main>
<?php
get_footer();
