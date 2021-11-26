<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php wp_theme_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_excerpt();?>
		<a href="<?php the_permalink();?>">Read more</a>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
