<section id="layout-settings" class="wdst-section">
  <div class="wdst-section-header">
    <h2 class="section-toggler">Layout</h2>
    <div class="wdst-section-header-togglers">
      <i class=" chevron-down section-toggler"></i>
    </div>
  </div>
  <div class="wdst-row hidden">
    <div class="wdst-section-content">
    <div id="dmca-settings" class="wdst-section-group">
        <strong class="wdst-section-group__title">Homepage blog</strong>
        <div id="wdst-homepage-categories-list" class="wdst-setting-item">
            <label>
              <div class="wdst-setting-item-desc">
                <strong>Categories list</strong>
                <span>List of all categories with 3 post per row, overrides Latest Post layout</span>         
              </div>
              <?php 
                wdst_checkbox_handler_html(['field_name' => 'wdst_homepage_categories_list']); 
                if( get_option('wdst_homepage_sidebar') == '' ) update_option( 'wdst_homepage_sidebar', '0' );           
              ?>  
            </label>
        </div>
        <div id="wdst-homepage-sidebar" class="wdst-setting-item">
            <label>
              <div class="wdst-setting-item-desc">          
                <strong>Sidebar</strong>
                <span>Display registered sidebar</span>
              </div>
              <?php 
                wdst_checkbox_handler_html(['field_name' => 'wdst_homepage_sidebar']); 
                if( get_option('wdst_homepage_sidebar') == '' ) update_option( 'wdst_homepage_sidebar', '0' );            
              ?>  
            </label>
        </div>
      </div>
      
      <div id="dmca-settings" class="wdst-section-group">
        <strong class="wdst-section-group__title">Archive pages</strong>
        <div id="wdst-dmca-badge-image" class="wdst-setting-item">
            <label>
              <span>Posts layout</span>
              <?php 
                wdst_select_handler_html(
                  [
                    'field_name' => 'wdst_archive_posts_layout',
                    'field_options' => ['Full-width', 'Cards']
                    ]
                );              
              ?>   
            </label>
        </div>
      </div>

    </div>
</section>