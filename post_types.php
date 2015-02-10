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
      // Posts without hierarchy are ordered only by post date, and have no parent/child/sibling relationships.
      'hierarchical' => false,
      // The description isn't used anywhere by default, but I have added a meta box the edit screens that contain the description.
      'description' => 'These are simple posts that behave like default posts.<br><br>They have categories and tags, and look just like a normal blog post.',
      // Determines what built in features will appear on the edit screen.
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
      // Determines which taxonomies can be selected for this post type. Only the two default types are here, but you can add custom taxonomies as well.
      'taxonomies' => array( 'category', 'post_tag' ),

      // Public covers a lot of different pieces, so here goes:
      // Public doesn't really do anything on its own. Rather, it implies multiple other options if their values are not set.
      'public' => true,

      // Options that affect readers:
      // If set to false, this post type will be visible in wordpress search results. (Defaults to opposite of 'public')
      'exclude_from_search' => false,

      // Can queries for this post type be performed from the front end?
      /** Examples are: 
       * ?post_type={post_type_key}
       * ?{post_type_key}={single_post_slug}
       * ?{post_type_query_var}={single_post_slug}
       *
       * Includes handling for url rewrites. (permalink structure)
       */
      // If this is set to false, you cannot view your post unless it is called directly from page template code.
      'publicly_queryable' => true,

      // Options that affect admin users
      // If set to false, no UI will be generated for managing this post type in the admin panel.
      'show_ui' => true,
      // If set to false, posts of this type will not be selectable in wordpress menus.
      'show_in_nav_menus' => false,
      // If set to false, this will prevent the post type from showing in the admin side bar.
      'show_in_menu' => true,
      // End options implied by 'public'

      // Enables post type archives. Available at '/{$post_type}' by default.
      'has_archive' => true,
      // Allows you to change the query var for this post type. If set to true, the quoery var will default to the post type slug.
      // Setting this to a string, will make the post types visible at '/{string}/{single_post_slug}', rather than '/{$post_type}/{single_post_slug}/'
      // If set to false, the post type cannot be accessed at /?{query_var}={single_post_slug}
      'query_var' => true,

      // The url to be used for the admin icon, or the name of the icon from Dashicons: https://developer.wordpress.org/resource/dashicons/
      'menu_icon' => 'dashicons-admin-post',
      // Allows this post type to be expoerted with the Wordpress Export/Import tool
      'can_export' => true,
      // Allows url rewrites to be used for this post type. (Permalinks)
      'rewrite' => true,

      // Capabilities are quite complicated, and could necessitate their own talk. The default of 'post' is good enough for just about anything.
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
