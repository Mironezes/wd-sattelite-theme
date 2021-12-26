<?php
/**
 * Template part for displaying page content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WD_Sattelite_Theme
 */

?>

<?php 
  $show_background_image = get_field('main_background_image_enabled', 'option');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="single-post-content">
    <?php if(!$show_background_image) : ?>
      <h1><?= get_the_title();?></h1>
      <?php 				
        if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<div id="site-breadcrumbs">','</div>' );
				}
      ?>
    <?php endif; ?>

		<?php
		  the_content();
		?>
	</section><!-- .single-post-content -->

  
  <section class="single-post-author-block">
  <?php 
    $aurhor_id = get_the_author_meta('ID');
    $author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
    $author_slug =  get_author_posts_url($aurhor_id); 
  ?>
    <div class="author-image">

    <?php $author_img = get_field('general_author_image_preview', 'option');?>
			<img 
				src="<?= $author_img['url'];?>" 
				width="<?= $author_img['width'];?>" 
				height="<?= $author_img['height'];?>"
				alt="<?= $author_img['alt'];?>"
      >
    </div>
    <div class="publication-info">
		  <span class="author-name"><?= pll_e('Published by');?> <?= $author_name ?> </span>
      <span class="publication-date"> <?= pll_e('on');?> <?= get_the_date();?></span>
      <a class="all-author-posts-link" href="<?= $author_slug;?>"><?= pll_e('See all author posts');?></a>
    </div>
	</section>

</article><!-- #post-<?php the_ID(); ?> -->
