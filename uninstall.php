<?php

//If uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();

//Clear posts with the custom post type
global $wpdb;