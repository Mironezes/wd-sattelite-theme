<?php 

function wdst_isset_option($option) {
  if( isset($_POST[$option])) {
    return update_option($option, $_POST[$option]);   
  }
  else {
    return update_option($option, '');    
  }
}


function wdst_form_handler() {
    if(wp_verify_nonce($_POST['wfp_nonce'], 'wdst_save_settings') && current_user_can('manage_options')) { 

      wdst_isset_option('wdst_welcome_screen');   
 
      if( function_exists('pll_languages_list') ) {
        $polylang_lang_list = pll_languages_list(['fields' => []]); 
        foreach($polylang_lang_list as $lang) {
          wdst_isset_option('wdst_welcome_screen_title_text_' . $lang->slug . '');  
        }
      }
      else {
        wdst_isset_option('wdst_welcome_screen_title_text');  
      }
      
      wdst_isset_option('wdst_author_image');
      wdst_isset_option('wdst_author_preview_image');

      wdst_isset_option('wdst_header_logo_type');

      wdst_isset_option('wdst_header_logo_text');
      wdst_isset_option('wdst_header_logo_image');
      
      wdst_isset_option('wdst_top_bg_img');
      wdst_isset_option('wdst_top_bg_img_lg_webp');
      wdst_isset_option('wdst_top_bg_img_lg_jpeg');
      wdst_isset_option('wdst_top_bg_img_xs_webp');
      wdst_isset_option('wdst_top_bg_img_xs_jpeg');

      if( function_exists('pll_languages_list') ) {
        $polylang_lang_list = pll_languages_list(['fields' => []]); 
        foreach($polylang_lang_list as $lang) {
          wdst_isset_option('wdst_homepage_heading_' . $lang->slug . '');  
        }
      }
      else {
        wdst_isset_option('wdst_homepage_heading');  
      }

      wdst_isset_option('wdst_homepage_categories_list');
      wdst_isset_option('wdst_homepage_sidebar');
      wdst_isset_option('wdst_archive_posts_layout');

      wdst_isset_option('wdst_dmca_badge_image');
      wdst_isset_option('wdst_dmca_badge_url');
      wdst_isset_option('wdst_copyright');
    ?>

      <div class="notice updated">
        <p><?= __('Settings are updated', 'wdst_domain') ?></p>
      </div>
    <?php }
      else { ?>
      <div class="notice error">
        <p><?= __('You don`t have permissions to do this', 'wdst_domain') ?></p>
      </div>
    <?php  }
  }