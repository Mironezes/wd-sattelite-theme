<section id="footer-settings" class="wdst-section">
  <div class="wdst-section-header">
    <h2 class="section-toggler">Footer</h2>
    <div class="wdst-section-header-togglers">
      <i class=" chevron-down section-toggler"></i>
    </div>
  </div>
  <div class="wdst-row hidden">
    <div class="wdst-section-content">
      <div id="dmca-settings" class="wdst-section-group">
        <strong class="wdst-section-group__title">DMCA Settings</strong>
        <div id="wdst-dmca-badge-image" class="wdst-setting-item">
            <label>
              <span>Badge Image</span>
              <?php 
                wdst_text_handler_html(['class' => 'long', 'field_name' => 'wdst_dmca_badge_image']); 
                if( get_option('wdst_dmca_badge_image') == '' ) update_option( 'wdst_dmca_badge_image', '' );        
              ?>  
            </label>
        </div>
        <div id="wdst-dmca-badge-url" class="wdst-setting-item">
            <label>
              <span>URL</span>
              <?php 
                wdst_text_handler_html(['class' => 'long', 'field_name' => 'wdst_dmca_badge_url']); 
                if( get_option('wdst_dmca_badge_url') == '' ) update_option( 'wdst_dmca_badge_url', '' );        
              ?>  
            </label>
        </div>
      </div>
        
      <div id="dmca-settings" class="wdst-section-group">
        <strong class="wdst-section-group__title">Other</strong>

        <div id="wdst-copyright-text" class="wdst-setting-item">
          <label>
            <span>Copyright text</span>
            <?php 
              wdst_text_handler_html(['class' => 'long', 'field_name' => 'wdst_copyright']); 
              if( get_option('wdst_copyright') == '' ) update_option( 'wdst_copyright', '' );        
            ?>  
          </label>
        </div>
      </div>
    </div>
</section>