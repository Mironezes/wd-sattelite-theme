<section id="footer-settings" class="wdst-section">
  <div class="wdst-section-header">
    <h2 class="section-toggler">Footer</h2>
    <div class="wdst-section-header-togglers">
      <i class=" chevron-down section-toggler"></i>
    </div>
  </div>
  <div class="wdst-row hidden">
    <div class="wdst-section-content">
      <div id="gtm-identifier" class="wdst-setting-item">
          <label>
            <span title="e.g. GTM-WT1234">GTM Identifier for lazyload <sup>?</sup></span>
            <?php 
              wdst_text_handler_html(['field_name' => 'wdst_gtm_id']); 
              if( get_option('wdst_gtm_id') == '' ) update_option( 'wdst_gtm_id', '' );               
            ?>    
          </label>
      </div> 
      
      <div id="wdst-yoast-posts-exclude" class="wdst-setting-item">
          <label>
            <span title="By category`s id, coma-separated">Exclude posts of categories from Yoast Sitemap <sup>?</sup></span>
            <?php 
              wdst_text_handler_html(['field_name' => 'wdst_yoast_posts_exclude']); 
              if( get_option('wdst_yoast_posts_exclude') == '' ) update_option( 'wdst_yoast_posts_exclude', '' );               
            ?>    
          </label>
      </div> 

    </div>
</section>