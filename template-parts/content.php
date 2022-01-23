<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WD_Sattelite_Theme
 */

?>

<?php 

$archive_layout = get_option('wdst_archive_posts_layout', '');
$show_categories_list = strval(get_option('wdst_homepage_categories_list', ''));

if( (is_home() && !$show_categories_list) || (is_archive() && strpos($archive_layout, 'full-width') !== false) ) : ?>

	<article id="post-<?php the_ID(); ?>" class="archive-post-tile">
		<div class="post-thumbnail">
			<?= wd_sattelite_theme_post_thumbnail(); ?>
		</div>
		<div class="post-content">
			<?php the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );?>
			<span class="post-info"><?= get_the_date('j.n.Y');  wd_sattelite_theme_posted_by();?></span>
				<p class="post-excerpt"><?= wd_sattelite_theme_excerpt();?> <a href="<?php the_permalink();?>"><?= pll_e('Read more');?></a></p>
		</div>
	</article> <!-- .archive-post-tile -->

<?php elseif( (is_home() && !$show_categories_list) || (is_archive() && strpos($archive_layout, 'cards') !== false) ) : ?>

	<article id="post-<?php the_ID(); ?>" class="recent-post-tile">
		<div class="recentpost-tile-image">
			<a href="<?php the_permalink() ?>">
			<?php the_post_thumbnail('full'); ?>
			</a>
		</div>
		<div class="recent-post-tile-content">
			<h3><a href="<?php the_permalink() ?>"><?= get_the_title(); ?></a></h3>
			<span class="publication-date"> <?= pll_e('on');?> <?= get_the_date('j.n.Y');?></span>
			<p><?= wd_sattelite_theme_excerpt();?></p>
			<a href="<?php the_permalink() ?>" class="read-more"><?= pll_e('Read more');?></a>
		</div>
	</article> <!-- .recent-post-tile -->

<?php endif; ?>