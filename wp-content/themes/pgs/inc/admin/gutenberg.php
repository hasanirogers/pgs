<?php
  function pgs_gutenberg_default_colors() {
    add_theme_support(
      'editor-color-palette',
      array(
        array(
          'name' => 'White',
          'slug' => 'white',
          'color' => '#ffffff'
        ),
        array(
          'name' => 'Black',
          'slug' => 'black',
          'color' => '#000000'
        ),
        array(
          'name' => 'Red',
          'slug' => 'red',
          'color' => '#b70c28'
        ),
        array(
          'name' => 'Green',
          'slug' => 'green',
          'color' => '#003300'
        ),
        array(
          'name' => 'Gray',
          'slug' => 'gray',
          'color' => '#7a7a79'
        ),
        array(
          'name' => 'Dark Gray',
          'slug' => 'dark-gray',
          'color' => '#363839'
        )
      )
    );

    add_theme_support(
      'editor-font-sizes',
      array(
        array(
          'name' => 'Normal',
          'slug' => 'normal',
          'size' => 16
        ),
        array(
          'name' => 'Large',
          'slug' => 'large',
          'size' => 24
        )
      )
    );
  }
  add_action( 'init', 'pgs_gutenberg_default_colors' );

  function pgs_gutenberg_blocks() {
      $args = array(
        'editor_script' => 'page-cta-js'
      );

      register_block_type('pgs/page-cta', $args);
      register_block_type('pgs/google-maps');
      register_block_type('pgs/page-panel');
      register_block_type('pgs/page-callout');
  }
  add_action( 'init', 'pgs_gutenberg_blocks' );
