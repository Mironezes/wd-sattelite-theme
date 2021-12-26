<?php 

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
}
add_action('init', 'wdst_pll_translation_strings');