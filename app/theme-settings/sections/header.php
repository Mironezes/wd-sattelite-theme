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
                    'field_options' => [
                      ['wdst-header-logo-type-text', 'Text'], 
                      ['wdst-header-logo-type-image', 'Image']]
                    ]
                );              
              ?>    
            </label>
        </div>

        <div id="wdst-header-logo-type-text" class="wdst-setting-group hidden">   
          <div id="wdst-header-logo-text" class="wdst-setting-item">
              <label>
                <span>Logo Text</span>
                <?php 
                  wdst_text_handler_html(['class' => 'long', 'field_name' => 'wdst_header_logo_text']); 
                  if( get_option('wdst_header_logo_text') == '' ) update_option( 'wdst_header_logo_text', '' );        
                ?>    
              </label>
          </div>            
        </div>

        <div id="wdst-header-logo-type-image" class="wdst-setting-group hidden">   
          <div id="wdst-header-logo-image" class="wdst-setting-item image-chooser">
              <label>
                <span>Logo Image</span>
                <?php 
                  wdst_image_to_url_handler_html(['field_name' => 'wdst_header_logo_image', 'class' => 'long']); 
                  if( get_option('wdst_header_logo_image') == '' ) update_option( 'wdst_header_logo_image', '' );        
                ?>  
                <button type="button" id="wdst-author-preview-image__choose" class="wdst-button choose">Choose</button>
                <button type="button" class="wdst-button reset"><i class="trash"></i></button>       
              </label>
          </div>            
        </div>
      </div>

      <div class="wdst-section-group">
        <strong class="wdst-section-group__title">Background Image on Inner Pages</strong>
        <div id="wdst-use-top-bg-img" class="wdst-setting-item">
            <label>
              <span>Use background image</span>
              <?php 
                wdst_checkbox_handler_html(['field_name' => 'wdst_top_bg_img']); 
                if( get_option('wdst_top_bg_img') == '' ) update_option( 'wdst_top_bg_img', '' );        
              ?>  
            </label>
        </div>

        <div id="wdst-top-bg-img" class="wdst-setting-group hidden">  
          <div id="wdst-top-bg-img-lg-webp" class="wdst-setting-item image-chooser">
            <label>
              <span>Desktop WEBP</span>
              <?php 
                wdst_image_to_url_handler_html(['field_name' => 'wdst_top_bg_img_lg_webp']);       
              ?>  
              <button type="button" id="wdst-top-bg-img-lg-webp__choose" class="wdst-button choose">Choose</button>
              <button type="button" class="wdst-button reset"><i class="trash"></i></button>   
            </label>
          </div>
          <div id="wdst-top-bg-img-lg-jpeg" class="wdst-setting-item image-chooser">
            <label>
              <span>Desktop JPEG</span>
              <?php 
                wdst_image_to_url_handler_html(['field_name' => 'wdst_top_bg_img_lg_jpeg']);        
              ?>  
              <button type="button" id="wdst-top-bg-img-lg-jpeg__choose" class="wdst-button choose">Choose</button>
              <button type="button" class="wdst-button reset"><i class="trash"></i></button>   
            </label>
          </div>
          <div id="wdst-top-bg-img-xs-webp" class="wdst-setting-item image-chooser">
            <label>
              <span>Mobile WEBP</span>
              <?php 
                wdst_image_to_url_handler_html(['field_name' => 'wdst_top_bg_img_xs_webp']);       
              ?>  
              <button type="button" id="wdst-top-bg-img-xs-webp__choose" class="wdst-button choose">Choose</button>
              <button type="button" class="wdst-button reset"><i class="trash"></i></button>   
            </label>
          </div>
          <div id="wdst-top-bg-img-xs-jpeg" class="wdst-setting-item image-chooser">
            <label>
              <span>Mobile JPEG</span>
              <?php 
                wdst_image_to_url_handler_html(['field_name' => 'wdst_top_bg_img_xs_jpeg']);       
              ?>  
              <button type="button" id="wdst-top-bg-img-xs-jpeg__choose" class="wdst-button choose">Choose</button>
              <button type="button" class="wdst-button reset"><i class="trash"></i></button>   
            </label>
          </div>
        </div>
      </div>
    </div>
</section>