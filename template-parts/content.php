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

if($archive_layout === 'fullwidth') : ?>
	<article id="post-<?php the_ID(); ?>" class="archive-post-tile">
		<?php wd_sattelite_theme_post_thumbnail(); ?>
		<div class="post-content">
			<?php the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );?>
			<span class="post-info"><?= get_the_date();  wd_sattelite_theme_posted_by();?></span>
			<?php
				$raw = get_the_content();
				$filtered_content = strip_tags(preg_replace('#<div[^>]*id="toc"[^>]*>.*?</div>#is', '', $raw));
				$excerpt = trim(mb_substr($filtered_content, 0, 250)); ?>
				<p class="post-excerpt"><?= $excerpt;?>... <a href="<?php the_permalink();?>">Read more</a></p>
		</div><!-- .post-content -->
	</article>
<?php elseif($archive_layout === 'cards') : ?>
	<article id="post-<?php the_ID(); ?>" class="recent-post-tile">
		<div class="recentpost-tile-image">
			<a href="<?php the_permalink() ?>">
			<?php the_post_thumbnail('full'); ?>
			</a>
		</div>
		<div class="recent-post-tile-content">
			<?php
			$excerpt = wp_trim_words(get_the_excerpt(), 16, '...');
			?>
			<h3><a href="<?php the_permalink() ?>"><?= get_the_title(); ?></a></h3>
			<p><?= $excerpt ?></p>
			<a href="<?php the_permalink() ?>" class="read-more">Read more</a>
		</div>
	</article>
<?php endif; ?>