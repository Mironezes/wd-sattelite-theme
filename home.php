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

$show_categories_list = strval(get_option('wdst_homepage_categories_list', ''));

$show_sidebar = get_option('wdst_homepage_sidebar', '');
$show_sidebar = $show_sidebar ? 1 : 0;
$has_sidebar = $show_sidebar ? 'has-sidebar' : '';
?> 


	<?php if(get_option('wdst_welcome_screen', '')) : ?>
		<section id="welcome-screen" class="site-title">
			<div class="container">
					<?php if($current_lang) : ?>
						<h1><?= get_option('wdst_welcome_screen_title_text_' . $current_lang . '', '');?></h1>
					<?php 
					else : ?>
						<h1><?= get_option('wdst_welcome_screen_title_text', '');?></h1>	
					<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<main id="home" class="site-content <?= $has_sidebar;?>">
		<div class="container">
			<section class="site-content-main">
				<?php if(!$show_categories_list) : ?>
					<?php if($current_lang) : ?>
						<h1><?= get_option('wdst_homepage_heading_' . $current_lang . '', '');?></h1>
						<?php 
							else : ?>
							<h1><?= get_option('wdst_homepage_heading', '');?></h1>	
						<?php endif; 
							if(is_paged() && function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb( '<div id="site-breadcrumbs">','</div>' );
							}
						?>
					<?php endif; ?>
				<?php if($show_categories_list) : ?>
					<?php include_once(__DIR__ . '/inc/all-categories-tiles.php'); ?>
				<?php else: ?>
					<?php include_once(__DIR__ . '/inc/latest-posts-list.php'); ?>
				<?php endif; ?>
		</section>
			<?php 
			if($show_sidebar) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div>
	</main>
<?php
get_footer();
