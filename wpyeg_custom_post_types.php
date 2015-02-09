<?php
defined( 'ABSPATH' ) OR exit;
/**
 * Plugin Name: Custom Post Types Demo
 * Description: A plugin to demonstrate custom post types.
 * Version: 0.1
 * Author: Stephen Brown
 * Author URI: https://github.com/StephenBrownski
 * License: GPL2
 */


  function cpt_demo_activate() {
    // Activation code here...
    if ( ! current_user_can( 'activate_plugins' ) )
      return;

    $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
    check_admin_referer( "activate-plugin_{$plugin}" );

  }
  register_activation_hook( __FILE__, 'cpt_demo_activate' );



  function cpt_demo_deactivate() {
    // Deactivation code here...
    if ( ! current_user_can( 'activate_plugins' ) )
      return;

    $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
    check_admin_referer( "deactivate-plugin_{$plugin}" );

    if ( ! function_exists( 'unregister_post_type' ) ) :
    function unregister_post_type( $post_type ) {
      global $wp_post_types;
      if ( isset( $wp_post_types[ $post_type ] ) ) {
        unset( $wp_post_types[ $post_type ] );
        return true;
      }
      return false;
    }
    endif;

    unregister_post_type( 'demo_products' );
  }
  register_deactivation_hook( __FILE__, 'cpt_demo_deactivate' );


  require_once('post_types.php');
  require_once('populate.php');
?>