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

$archive_layout = get_field('archive_blog_posts_layout', 'option');
$show_categories_list = get_field('homepage_blog_categories_list', 'option');
$show_categories_list = !empty($show_categories_list) ? $show_categories_list[0] : 0;

if( (is_home() && !$show_categories_list) || (is_archive() && $archive_layout === 'fullwidth') ) : ?>

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

<?php elseif( (is_home() && !$show_categories_list) || (is_archive() && $archive_layout === 'cards') ) : ?>

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