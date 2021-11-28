<?php
/**
 * Template part for displaying page content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WD_Sattelite_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="single-post-content">
		<?php
		  the_content();
		?>
	</section><!-- .single-post-content -->

  
  <section class="single-post-author-block">
  <?php 
    $author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
    $author_slug = "/author/" . get_the_author() . "/";
  ?>
    <div class="author-image">
      <img src="<?= get_template_directory_uri();?>/images/author-preview.jpg" alt="author" width="48" height="48">
    </div>
    <div class="publication-info">
		  <span class="author-name">Published by <?= $author_name ?> </span>
      <span class="publication-date"> on <?= get_the_date();?></span>
      <a class="all-author-posts-link" href="<?= $author_slug;?>">See all author posts</a>
    </div>
	</section>

</article><!-- #post-<?php the_ID(); ?> -->
