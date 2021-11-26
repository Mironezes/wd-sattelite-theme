<?php 
    $today = date('Ymd');
    $args = [
      'posts_per_page' => -1,
      'post_type' => 'event',
      'meta_key' => 'event_date',
      'orderby' => 'meta_value_num',
      'order' => 'ASC',
      'meta_query' => [
        [
          'key' => 'event_date', 
          'compare' => '>=',
          'value' => $today,
          'type' => 'numeric'
        ]
      ]
    ];

    $eventsQuery = new WP_Query($args);

    while($eventsQuery->have_posts()) :
      $eventsQuery->the_post();
    ?>
      <div class="event-tile">
      <h3><?php the_title(); ?></h3>

      <?php 
        $isEventDate = get_field('event_date');
        $eventDateRaw = new DateTime(get_field('event_date'));
        $eventDate = $eventDateRaw->format('F d');

        $eventImage = get_field('event_image');

        if( $eventImage ):
          
          $alt = $eventImage['alt'];

          $size = 'small_square';
          $thumb = $eventImage['sizes'][ $size ];
          $width = $eventImage['sizes'][ $size . '-width' ];
          $height = $eventImage['sizes'][ $size . '-height' ];
      ?>

        <img src="<?= esc_url($thumb); ?>"  width="<?= $width ?>" height="<?= $height ?>" alt="<?= esc_html($alt); ?>">

      <?php endif; ?>

      <time><?php $isEventDate ? print($eventDate) : print('No data'); ?></time>
      <a href="<?php the_permalink()?>">Read more</a>
      </div>

<?php    
  endwhile;  
  wp_reset_postdata();
?>