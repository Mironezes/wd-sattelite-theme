<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WD_Sattelite_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" class="archive-post-tile">
	<?php wd_sattelite_theme_post_thumbnail(); ?>
	<div class="post-content">
		<?php the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );?>
		<span class="post-info"><?= get_the_date();  wd_sattelite_theme_posted_by();?></span>
		<?php
			$raw = get_the_content();
			$filtered_content = strip_tags(preg_replace('#<div[^>]*id="toc"[^>]*>.*?</div>#is', '', $raw));
			$excerpt = trim(substr($filtered_content, 0, 300)); ?>
			<p class="post-excerpt"><?= $excerpt;?>... <a href="<?php the_permalink();?>">Read more</a></p>
	</div><!-- .post-content -->
</article>
