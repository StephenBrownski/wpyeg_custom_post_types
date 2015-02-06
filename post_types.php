<?php

  function register_cpt_simple() {
    // Labels are the strings you will see in the admin section
    // This $labels var will be used later.
    $labels = array( 
      'name' => _x( 'Simple Posts', 'demo_simple' ),
      'singular_name' => _x( 'Simple Post', 'demo_simple' ),
      'add_new' => _x( 'Add New', 'demo_simple' ),
      'add_new_item' => _x( 'Add New Simple Post', 'demo_simple' ),
      'edit_item' => _x( 'Edit Simple Post', 'demo_simple' ),
      'new_item' => _x( 'New Simple Post', 'demo_simple' ),
      'view_item' => _x( 'View Simple Post', 'demo_simple' ),
      'search_items' => _x( 'Search Simple Post', 'demo_simple' ),
      'not_found' => _x( 'No Simple Post found', 'demo_simple' ),
      'not_found_in_trash' => _x( 'No Simple Posts found in Trash', 'demo_simple' ),
      'parent_item_colon' => _x( 'Parent Simple Post:', 'demo_simple' ),
      'menu_name' => _x( 'Simple Posts', 'demo_simple' ),
    );

    $args = array( 
      'labels' => $labels,
      'hierarchical' => false,
      'description' => 'These are simple posts that behave like default posts.<br><br>They have categories and tags, and look just like a normal blog post.',
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
      'taxonomies' => array( 'category', 'post_tag' ),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      
      'menu_icon' => 'dashicons-admin-post',
      'show_in_nav_menus' => false,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => true,
      'capability_type' => 'post'
    );

    register_post_type( 'demo_simple', $args );

  }



  function register_cpt_hidden() {
    // Labels are the strings you will see in the admin section
    // This $labels var will be used later.
    $labels = array( 
      'name' => _x( 'Hidden Posts', 'demo_hidden' ),
      'singular_name' => _x( 'Hidden post', 'demo_hidden' ),
      'add_new' => _x( 'Add New', 'demo_hidden' ),
      'add_new_item' => _x( 'Add New Hidden Post', 'demo_hidden' ),
      'edit_item' => _x( 'Edit Hidden Post', 'demo_hidden' ),
      'new_item' => _x( 'New Hidden Post', 'demo_hidden' ),
      'view_item' => _x( 'View Hidden Post', 'demo_hidden' ),
      'search_items' => _x( 'Search Hidden Posts', 'demo_hidden' ),
      'not_found' => _x( 'No Hidden Posts found', 'demo_hidden' ),
      'not_found_in_trash' => _x( 'No Hidden Posts found in Trash', 'demo_hidden' ),
      'parent_item_colon' => _x( 'Parent Hidden Post:', 'demo_hidden' ),
      'menu_name' => _x( 'Hidden Posts', 'demo_hidden' ),
    );

    $args = array( 
      'labels' => $labels,
      'hierarchical' => false,
      'description' => 'These are hidden posts. They will only be visible if queried from a template.<br><br>Eg: Clicking \'View Post\' will return a 404 error.',
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      
      'menu_icon' => 'dashicons-lock',
      'show_in_nav_menus' => false,
      'publicly_queryable' => false,
      'exclude_from_search' => true,
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => true,
      'capability_type' => 'post'
    );

    register_post_type( 'demo_hidden', $args );

  }


  function register_cpt_hierarchal() {
    // Labels are the strings you will see in the admin section
    // This $labels var will be used later.
    $labels = array( 
      'name' => _x( 'Hierarchal Posts', 'demo_hierarchal' ),
      'singular_name' => _x( 'Hierarchal post', 'demo_hierarchal' ),
      'add_new' => _x( 'Add New', 'demo_hierarchal' ),
      'add_new_item' => _x( 'Add New Hierarchal Post', 'demo_hierarchal' ),
      'edit_item' => _x( 'Edit Hierarchal Post', 'demo_hierarchal' ),
      'new_item' => _x( 'New Hierarchal Post', 'demo_hierarchal' ),
      'view_item' => _x( 'View Hierarchal Post', 'demo_hierarchal' ),
      'search_items' => _x( 'Search Hierarchal Posts', 'demo_hierarchal' ),
      'not_found' => _x( 'No Hierarchal Posts found', 'demo_hierarchal' ),
      'not_found_in_trash' => _x( 'No Hierarchal Posts found in Trash', 'demo_hierarchal' ),
      'parent_item_colon' => _x( 'Parent Hierarchal Post:', 'demo_hierarchal' ),
      'menu_name' => _x( 'Hierarchal', 'demo_hierarchal' ),
    );

    $args = array( 
      'labels' => $labels,
      'hierarchical' => true,
      'description' => 'These are hierarchal post types. They can have anscestors/parents, siblings, and children. They will behave similar to pages.',
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      
      'menu_icon' => 'dashicons-editor-ol',
      'show_in_nav_menus' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'has_archive' => false,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => true,
      'capability_type' => 'post'
    );

    register_post_type( 'demo_hierarchal', $args );

  }


  add_action( 'init', 'register_cpt_simple' );
  add_action( 'init', 'register_cpt_hidden' );
  add_action( 'init', 'register_cpt_hierarchal' );


  function register_help_boxes() {
    $demo_post_types = array(
      'demo_simple',
      'demo_hidden',
      'demo_hierarchal'
    );

    foreach ( $demo_post_types as $post_type ) {
      add_meta_box( 'after-title-help', 'Info about this Post Type', 'demo_custom_post_meta_helper', $post_type, 'side', 'high' );
    }
  }

  function demo_custom_post_meta_helper( $post ) {
    $post_type = get_post_type( $post );
    $post_obj = get_post_type_object( $post_type );
    echo $post_obj->description;
  }

  add_action( 'add_meta_boxes', 'register_help_boxes' );
