<?php 

 if ( have_posts() ) :
  /* Start the Loop */
  while ( have_posts() ) :
    the_post();

    /*
    * Include the Post-Type-specific template for the content.
    * If you want to override this in a child theme, then include a file
    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
    */
    get_template_part( 'template-parts/content' );

  endwhile;

  $args = array(
    'show_all'     => false, 
    'end_size'     => 1,     
    'mid_size'     => 2,     
    'prev_next'    => true,  
    'prev_text'    => '« ' . pll__('Previous'),
    'next_text'    => pll__('Next') . ' »',
    'add_args'     => false, 
    'add_fragment' => '',     
    'screen_reader_text' => __( 'Posts navigation' ),
  );
  the_posts_pagination($args);

else :

  get_template_part( 'template-parts/content', 'none' );

endif;
?>