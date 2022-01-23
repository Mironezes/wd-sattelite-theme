<?php 

  $show_background_image = intval(get_option('wdst_top_bg_img', ''));

  if($show_background_image) {
    $desktop_webp_id = get_option('wdst_top_bg_img_lg_webp', '');
    $main_bg_image_desktop_webp = wp_get_attachment_image_src($desktop_webp_id)[0];

    $desktop_jpg_id = get_option('wdst_top_bg_img_lg_jpeg', ''); 
    $main_bg_image_desktop_jpg = wp_get_attachment_image_src($desktop_jpg_id)[0];

    $mobile_webp_id = get_option('wdst_top_bg_img_xs_webp', ''); 
    $main_bg_image_mobile_webp = wp_get_attachment_image_src($mobile_webp_id)[0];

    $mobile_jpg_id = get_option('wdst_top_bg_img_xs_jpeg', '');
    $main_bg_image_mobile_jpg = wp_get_attachment_image_src($mobile_jpg_id)[0];
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