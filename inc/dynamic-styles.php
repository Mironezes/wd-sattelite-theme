<?php 

  $show_background_image = get_field('main_background_image_enabled', 'option');

  if($show_background_image) {
    $main_bg_image_desktop_webp = get_field('main_background_image_desktop_webp', 'option');
    $main_bg_image_desktop_jpg = get_field('main_background_image_desktop_jpeg', 'option'); 
    $main_bg_image_mobile_webp = get_field('main_background_image_mobile_webp', 'option'); 
    $main_bg_image_mobile_jpg = get_field('main_background_image_mobile_jpeg', 'option');
  
  }

  $body_classes = '';
  if(function_exists('pll_current_language')) {
    $body_classes .= ' has-polylang ';
  }
  if($show_background_image) {
    $body_classes .= ' background-img ';
  }


  if($show_background_image) : ?>
    <style>
      .site-title {
        background-image: url('<?= $main_bg_image_desktop_jpg;?>');
        background-image: -webkit-image-set(url('<?= $main_bg_image_desktop_webp;?>')1x );
      }
      @media screen and (max-width:500px) {
        .site-title {
          background-image: url(<?= $main_bg_image_mobile_jpg;?>);
          background-image: -webkit-image-set(url(<?= $main_bg_image_mobile_webp;?>)1x );
        }
      }
    </style>
  <?php endif; ?>