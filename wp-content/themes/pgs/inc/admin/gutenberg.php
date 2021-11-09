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
          'name' => 'Pink',
          'slug' => 'pink',
          'color' => '#ff4444'
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
  }
  add_action( 'init', 'pgs_gutenberg_blocks' );
