<?php

  // If uninstall not called from WordPress, exit
  if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
      exit();

  // Clear posts with the custom post type
  global $wpdb;

  $posts_table = $wpdb->posts;

  $query = "
    DELETE FROM {$posts_table}
    WHERE post_type IN ( 'demo_simple', 'demo_hidden', 'demo_hierarchal' )
  ";

  $wpdb->query($query);

  delete_option( 'demo_post_types_created' );