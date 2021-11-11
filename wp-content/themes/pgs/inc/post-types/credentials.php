<?php
  function pgs_post_type_credentials() {
    $labels = array(
      'name'          => 'Credentials', // Plural name
      'singular_name' => 'Credential'   // Singular name
    );

    $supports = array(
      'title',        // Post title
      'thumbnail',    // Allows feature images
      'excerpt'
    );

    $rewrite = array(
      'slug' => 'credentials',
      'with_front' => FALSE,
    );

    $taxonomies = array(
      'category'
    );

    $args = array(
      'labels'              => $labels,
      'description'         => 'Credentials for the Credentials page.', // Description
      'supports'            => $supports,
      'hierarchical'        => false, // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
      'public'              => true,  // Makes the post type public
      'show_ui'             => true,  // Displays an interface for this post type
      'show_in_menu'        => true,  // Displays in the Admin Menu (the left panel)
      'show_in_nav_menus'   => false,  // Displays in Appearance -> Menus
      'show_in_admin_bar'   => true,  // Displays in the black admin bar
      'show_in_rest'        => true,  // Enable REST API
      'menu_position'       => 5,     // The position number in the left menu
      'menu_icon'           => get_template_directory_uri() . '/images/icons/portfolio.png',  // The URL for the icon used for this post type
      'can_export'          => true,  // Allows content export using Tools -> Export
      'has_archive'         => true,  // Enables post type archive (by month, date, or year)
      'exclude_from_search' => true, // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
      'publicly_queryable'  => false,  // Allows queries to be performed on the front-end part if set to true
      'capability_type'     => 'page', // Allows read, edit, delete like “Post”
      'rewrite'             => $rewrite,
      'taxonomies'          => $taxonomies, // Allows supports for the given taxonomies
    );

    register_post_type( 'credentials', $args);
  }

  add_action('init', 'pgs_post_type_credentials');


  function pgs_add_category_slug() {
    $args = array(
      'get_callback' => function($post) {
        $catID = $post[categories][0];
        $catInfo = get_category($catID);
        return $catInfo->slug;
      },
      'update_callback' => function() {
        return false;
      },
      'schema' => array(
        'description' => __('hmmm'),
        'type'        => 'array'
      )
    );

    register_rest_field('credentials', 'category', $args);
  }

  add_action('rest_api_init', 'pgs_add_category_slug');
