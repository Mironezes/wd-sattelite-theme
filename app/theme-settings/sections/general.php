<section id="general-settings" class="wdst-section">
  <div class="wdst-section-header">
    <h2 class="section-toggler">General</h2>
    <div class="wdst-section-header-togglers">
      <i class=" chevron-down section-toggler"></i>
    </div>
  </div>
  <div class="wdst-row hidden">
    <div class="wdst-section-content">
      <div id="wdsr-welcome-screen" class="wdst-setting-item">
          <label>
            <span>Use Welcome screen</span>
            <?php 
              wdst_checkbox_handler_html(['field_name' => 'wdst_welcome_screen']); 
              if( get_option('wdst_welcome_screen') == '' ) update_option( 'wdst_welcome_screen', '' );               
            ?>    
          </label>
      </div> 
      
      

    </div>
</section>