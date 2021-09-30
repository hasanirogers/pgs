<?php
  // variables
  // ----------

  $pgs_meta_box_page_subtitle = array(
    'name' => 'meta_box_page_options_subtitle',
    'label' => __('Subtitle: Appears below the main title.'),
    'id' => 'meta_box_page_options_subtitle',
    'type' => 'text',
  );

  $pgs_meta_box_page = array(
    'id'        => 'meta_box_page_options',
    'title'     =>  __('Page Options'),
    'page'      => 'slider',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
      $pgs_meta_box_page_subtitle
    )
  );


  // register box
  // ------------

  function pgs_add_meta_box_page_options() {
    global $pgs_meta_box_page;
    $post_types = array('page');

    foreach ($post_types as $post_type) {
      add_meta_box(
        $pgs_meta_box_page['id'],
        $pgs_meta_box_page['title'],
        'display_meta_box_page_options',
        $post_type
      );
    }
  }
  add_action('add_meta_boxes', 'pgs_add_meta_box_page_options');


  // display box
  // -----------

  function display_meta_box_page_options($post) {
    global $pgs_meta_box_page;

    wp_nonce_field(basename(__FILE__), 'meta_box_nonce_page_options');

    echo '
      <style>
        .meta_box_slider_page_content input {
          width: 80%;
          margin: 0.5rem 0;
        }
      </style>
      <section class="'. $pgs_meta_box_page['id'] .'_content">
        <p>Please fill out additional fields for this page.</p>
        <hr />
    ';

    foreach ($pgs_meta_box_page['fields'] as $field) {
      $meta = get_post_meta($post->ID, $field['id'], true);

      switch($field['type']) {
        case 'text' :
          echo '
            <p>
              <label>
                <div>'. $field['label'] .'</div>
                <input type="'. $field['type'] .'" id="'. $field['id'] .'" name="'. $field['name'] .'" value="'. $meta .'">
              </label>
            </p>
          ';
      }
    }

    echo '</section>';
  }


  // save box
  // --------

  function save_meta_box_page_options($post_id) {
    global $pgs_meta_box_page;

    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = false;

    if (isset($_POST['meta_box_nonce_page_options'])) {
      if (wp_verify_nonce($_POST['meta_box_nonce_page_options'], basename(__FILE__))) {
        $is_valid_nonce = true;
      }
    }

    if ($is_autosave || $is_revision || !$is_valid_nonce) return;

    foreach ($pgs_meta_box_page['fields'] as $field) {
      if (array_key_exists($field['id'], $_POST)) {
        update_post_meta($post_id, $field['id'], sanitize_text_field($_POST[$field['id']]));
      }
    }
  }
  add_action('save_post', 'save_meta_box_page_options', 10, 1);
