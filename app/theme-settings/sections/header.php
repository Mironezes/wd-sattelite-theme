<section id="header-settings" class="wdst-section">
  <div class="wdst-section-header">
    <h2 class="section-toggler">Header</h2>
    <div class="wdst-section-header-togglers">
      <i class=" chevron-down section-toggler"></i>
    </div>
  </div>
  <div class="wdst-row hidden">
    <div class="wdst-section-content">

      <div class="wdst-section-group">
        <strong class="wdst-section-group__title">Logo</strong>
        <div id="wdst-header-logo-type" class="wdst-setting-item">
            <label>
              <span>Logo Format</span>
              <?php 
                wdst_select_handler_html(
                  [
                    'field_name' => 'wdst_header_logo_type',
                    'field_options' => ['Text', 'Image']
                    ]
                );              
              ?>    
            </label>
        </div>
 
      </div>
    </div>
</section>