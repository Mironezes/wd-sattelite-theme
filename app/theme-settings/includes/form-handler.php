<?php 

function wdst_isset_option($option) {
  if( isset($_POST[$option])) {
    return update_option($option, sanitize_text_field($_POST[$option]));   
  }
  else {
    return update_option($option, '');    
  }
}

function wdst_isset_editor_content($option) {
  if( isset($_POST[$option])) {
    return update_option($option, stripslashes($_POST[$option]));   
  }
  else {
    return update_option($option, '');    
  }  
}

function wdst_form_handler() {
    if(wp_verify_nonce($_POST['wfp_nonce'], 'wdst_save_settings') && current_user_can('manage_options')) { 



    ?>

      <div class="notice updated">
        <p><?= __('Settings are updated', 'wdst_domain') ?></p>
      </div>
    <?php }
      else { ?>
      <div class="notice error">
        <p><?= __('You don`t have permissions to do this', 'wdst_domain') ?></p>
      </div>
    <?php  }
  }