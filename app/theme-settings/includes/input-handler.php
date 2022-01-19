<?php 
  function wdst_checkbox_handler_html($args) { ?>
    <input type="checkbox" name="<?= $args['field_name']; ?>" value="1" <?php checked(esc_attr(get_option($args['field_name']))) ?>>  
  <? }

  function wdst_text_handler_html($args) { ?>
    <input type="text" 
      <?php if(isset($args['id'])) : ?> id="<?= $args['id']; ?>" <?php endif ?>
      <?php if(isset($args['class'])) : ?> class="<?= $args['class']; ?>" <?php endif ?>
      name="<?= $args['field_name']; ?>" 
      value="<?= esc_attr(get_option($args['field_name']));?>" >  
  <? }

  function wdst_select_handler_html($args) { ?>
    <select name="<?= $args['field_name']; ?>" <?php if(isset($args['id'])) : ?> id="<?= $args['id']; ?>" <?php endif ?>>
      <?php 
        $selected = get_option($args['field_name']);
        foreach ($args['field_options'] as $option) { ?>
          <option   
            <?php if($selected == esc_attr($option)):?> selected <?php endif; ?>
            value="<?= esc_attr($option);?>">
            <?= esc_attr($option);?>
          </option>
      <?php } ?>
   </select>
  <? }

  function wdst_image_to_url_handler_html($args) { 
    if(get_option($args['field_name'])) {
      $attachment_url = esc_attr(get_option($args['field_name']));
    }
    else {
      $attachment_id = esc_attr(get_option($args['field_name']));
      $attachment_url = wp_get_attachment_url($attachment_id);
    }
  ?>
    <input type="text" 
      <?php if(isset($args['id'])) : ?> id="<?= $args['id']; ?>" <?php endif ?>
      <?php if(isset($args['class'])) : ?> class="<?= $args['class']; ?>" <?php endif ?>
      name="<?= $args['field_name']; ?>" 
      value="<?= $attachment_url; ?>" 
      >  
  <? }


  function wdst_textarea_handler_html($args) { 
    $textarea_rows = isset($args['rows_count']) ? $args['rows_count'] : 10;
  ?>
    <textarea name="<?= $args['field_name']; ?>" cols="30" rows="<?= $textarea_rows; ?>"><?= esc_attr(get_option($args['field_name']));?></textarea>
  <?php }


  function wdst_date_handler_html($args) { ?>
    <input type="date" name="<?= $args['field_name']; ?>" value="<?= esc_attr(get_option($args['field_name']));?>" >  
  <? }


  function wdst_number_handler_html($args) { ?>
    <input type="number" name="<?= $args['field_name']; ?>" min="<?= $args['min']; ?>" max="<?= $args['max']; ?>" value="<?= esc_attr(get_option($args['field_name']));?>" >  
  <? }