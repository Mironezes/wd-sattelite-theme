<section id="homepage-settings" class="wdst-section">
  <div class="wdst-section-header">
    <h2 class="section-toggler">Homepage</h2>
    <div class="wdst-section-header-togglers">
      <i class=" chevron-down section-toggler"></i>
    </div>
  </div>
  <div class="wdst-row hidden">
    <div class="wdst-section-content">
      <div id="wdst-homepage-headings" class="wdst-section-group">
        <strong class="wdst-section-group__title">Heading <small>(if Top Screen is disabled)</small></strong>
            <?php if(function_exists('pll_languages_list')) : ?>
              <?php $polylang_lang_list = pll_languages_list(['fields' => []]);
                  foreach($polylang_lang_list as $lang) : ?>
                  <div id="wdst-homepage-heading" class="wdst-setting-item">
                      <label>
                        <span>Heading (H1) - <?= strtoupper($lang->slug); ?></span>
                        <?php 
                          wdst_text_handler_html([
                            'class' => 'long',
                            'field_name' => 'wdst_homepage_heading_' . $lang->slug . '',
                          ]);        
                          if( get_option('wdst_homepage_heading_' . $lang->slug . '') == '' ) update_option( 'wdst_homepage_heading_' . $lang->slug . '', '' );    
                        ?>
                      </label>
                    </div>
                  <?php endforeach;  ?>
            <?php else: ?>

              <div id="wdst-homepage-heading" class="wdst-setting-item">
                <label>
                  <span>Heading (H1)</span>
                  <?php 
                    wdst_text_handler_html(['class' => 'long', 'field_name' => 'wdst_homepage_heading']); 
                    if( get_option('wdst_homepage_heading') == '' ) update_option( 'wdst_homepage_heading', '' );        
                  ?>  
               </label>
             </div>
            <?php endif; ?>
        </div>
        </div>
    </div>    
</section>