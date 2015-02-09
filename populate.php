<?php
  // Check to see if the posts have been created before. This will be determined by a wp option.
  // If the option is not yet set, create the example posts and set the option.
  // This option will be unset and the posts will be removed when the plugin is uninstalled.


  if ( ! get_option( 'demo_post_types_created' ) ) {

    // Create sample data for demo_simple post type.
    $simple_post = array(
      'post_content' => 'This is a simple post type, with most settings left as default. It will behave much like a default blog post. Comments will be allowed, if enabled by your theme.',
      'post_title' => 'Simple Post Example',
      'post_name' => 'simple-post-example',
      'post_status' => 'publish',
      'post_type' => 'demo_simple',
      'ping_status' => 'closed',
      'comment_status' => 'open'
    );

    wp_insert_post( $simple_post );


    // Create sample data for hidden post type.
    $hidden_post = array(
      'post_content' => 'This post is hidden, so it will not be visible from the front end, through either searches or queries in the address bar.<br>It can only be accessed when called directly from a template file.<br>Navigation menus are an example of hidden posts.',
      'post_title' => 'Hidden Post Example',
      'post_name' => 'hidden-post-example',
      'post_status' => 'publish',
      'post_type' => 'demo_hidden',
      'ping_status' => 'closed',
      'comment_status' => 'closed'
    );

    wp_insert_post( $hidden_post );


    // Create sample data for hierarchal post type.
    // Will need to capture IDs on creation so a post_parent can be set.
    $hierarchal_post_1_args = array(
      'post_content' => 'This is a parent-level hierarchal post. It will be able to have siblings and children, but no parent, unless you change that.',
      'post_title' => 'Top Level Page',
      'post_name' => 'top-level-page',
      'post_status' => 'publish',
      'post_type' => 'demo_hierarchal',
      'post_parent' => 0, // setting this to 0 will make the post a top-level post
      'ping_staus' => 'closed',
      'comment_status' => 'closed'
    );

    // wp_insert_post() will return an ID, so we can use this for later, when we create the child page
    $hierarchal_post_1 = wp_insert_post( $hierarchal_post_1_args );

    $hierarchal_post_2_args = array(
      'post_content' => 'This is a child-level hierarchal post. It will be able to have siblings and children, as well as a parent.',
      'post_title' => 'Second Level Page',
      'post_name' => 'second-level-page',
      'post_status' => 'publish',
      'post_type' => 'demo_hierarchal',
      'post_parent' => $hierarchal_post_1,
      'ping_staus' => 'closed',
      'comment_status' => 'closed'
    );

    $hierarchal_post_2 = wp_insert_post( $hierarchal_post_2_args );


    update_option( 'demo_post_types_created', 'yes' );

  }