<?php 

if(function_exists('pll_register_string')) {
  function wdst_pll_translation_strings() {
    pll_register_string('wdst-previous', 'Previous', 'WD Theme');
    pll_register_string('wdst-next', 'Next', 'WD Theme');
    pll_register_string('wdst-previous-post', 'Previous post', 'WD Theme');
    pll_register_string('wdst-next-post', 'Next post', 'WD Theme');
    pll_register_string('wdst-published-by', 'Published by', 'WD Theme');
    pll_register_string('wdst-by', 'by', 'WD Theme');
    pll_register_string('wdst-on', 'on', 'WD Theme');
    pll_register_string('wdst-see-all-posts', 'See all posts', 'WD Theme');
    pll_register_string('wdst-see-all-author-posts', 'See all author posts', 'WD Theme');
    pll_register_string('wdst-popular-posts', 'Popular posts', 'WD Theme');
    pll_register_string('wdst-readmore', 'Read more', 'WD Theme');
    pll_register_string('wdst-menu', 'Menu', 'WD Theme');
    pll_register_string('wdst-close', 'Close', 'WD Theme');
  
    pll_register_string('wdst-e404-title', 'Oops! That page can&rsquo;t be found', 'WD Theme');
    pll_register_string('wdst-e404-desc', 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'WD Theme');
    pll_register_string('wdst-return-homepage', 'Return to homepage', 'WD Theme'); 

    pll_register_string('wdst-comments-list', 'Comments List', 'WD Theme'); 
    pll_register_string('wdst-comments-closed', 'Comments are closed', 'WD Theme'); 

    pll_register_string('wdst-search-results-for', 'Search Results for', 'WD Theme'); 
    
    pll_register_string('wdst-post-comment', 'Post Comment', 'WD Theme'); 
    pll_register_string('wdst-leave-reply', 'Leave a Reply', 'WD Theme'); 
    pll_register_string('wdst-comment', 'Comment', 'WD Theme'); 
  }
  add_action('init', 'wdst_pll_translation_strings');
}
// If there`s no Polylang on site then use fallback functions
else {
  function pll_e($str) {
    return esc_html_e($str, 'wdst');
  }
  function pll__($str) {
    return esc_html($str, 'wdst');
  }
}