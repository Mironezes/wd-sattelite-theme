<section id="general-settings" class="wdst-section">
  <div class="wdst-section-header">
    <h2 class="section-toggler">General</h2>
    <div class="wdst-section-header-togglers">
      <i class=" chevron-down section-toggler"></i>
    </div>
  </div>
  <div class="wdst-row hidden">
    <div class="wdst-section-content">

      <div id="welcome-screen" class="wdst-section-group">
        <strong class="wdst-section-group__title">Welcome Screen</strong>
        <div id="wdst-welcome-screen" class="wdst-setting-item">
            <label>
              <span>Use Welcome screen</span>
              <?php 
                wdst_checkbox_handler_html(['field_name' => 'wdst_welcome_screen']); 
                if( get_option('wdst_welcome_screen') == '' ) update_option( 'wdst_welcome_screen', '' );        
              ?>  
            </label>
        </div>

        <div id="welcome-screen-title" class="wdst-setting-group hidden">   
            <?php if(function_exists('pll_languages_list')) : ?>
              <?php $polylang_lang_list = pll_languages_list(['fields' => []]);
                  foreach($polylang_lang_list as $lang) : ?>
                  <div id="welcome-screen-title__text" class="wdst-setting-item">
                      <label>
                        <span>Homepage Heading (H1) - <?= strtoupper($lang->slug); ?></span>
                        <?php 
                          wdst_text_handler_html([
                            'class' => 'long',
                            'field_name' => 'wdst_welcome_screen_title_text_' . $lang->slug . '',
                          ]);        
                          if( get_option('wdst_welcome_screen_title_text_' . $lang->slug . '') == '' ) update_option( 'wdst_welcome_screen_title_text_' . $lang->slug . '', '' );    
                        ?>
                      </label>
                    </div>
                  <?php endforeach;  ?>
            <?php else: ?>

              <div id="welcome-screen-title__text" class="wdst-setting-item">
                <label>
                  <span>Homepage Heading (H1)</span>
                  <?php 
                    wdst_text_handler_html(['class' => 'long', 'field_name' => 'wdst_welcome_screen_title_text']); 
                    if( get_option('wdst_welcome_screen_title_text') == '' ) update_option( 'wdst_welcome_screen_title_text', '' );        
                  ?>  
               </label>
             </div>

            <?php endif; ?>
        </div>
      </div>

      
      <div id="author-settings" class="wdst-section-group">
        <strong class="wdst-section-group__title">Author</strong>
        <div id="wdst-author-image" class="wdst-setting-item image-chooser">
            <label>
              <span>Author image <small>(140x140)</small></span>
              <?php 
                wdst_image_to_url_handler_html(['field_name' => 'wdst_author_image']);         
              ?>  
              <button type="button" id="wdst-author-image__choose" class="wdst-button choose">Choose</button>
              <button type="button" class="wdst-button reset"><i class="trash"></i></button>   
            </label>
        </div>
        <div id="wdst-author-preview-image" class="wdst-setting-item image-chooser">
            <label>
              <span>Author preview image <small>(50x50)</small></span>
              <?php 
                wdst_image_to_url_handler_html(['field_name' => 'wdst_author_preview_image']);      
              ?>  
                <button type="button" id="wdst-author-preview-image__choose" class="wdst-button choose">Choose</button>
                <button type="button" class="wdst-button reset"><i class="trash"></i></button>                 
            </label>
        </div>
      </div>

    </div>
</section>