<?php ?>
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
          <a href="/<?= $category->slug;?>/"><?= pll_e('See all posts');?></a>
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
                  ?>
                  <h3><a href="<?php the_permalink(); ?>"><?= $title; ?></a></h3>
                  <p><?= wd_sattelite_theme_excerpt(); ?></p>
                  <a href="<?php the_permalink(); ?>" class="read-more"><?= pll_e('Read more');?></a>
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