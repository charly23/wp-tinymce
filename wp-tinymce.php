<?php

/*
Plugin Name: WP Tiny MCE
Description: Wordpress Tiny MCE function and shortcode for Ajax, Php use.
Version: 1.0
Author: Charly Capillanes
Author URI: https://charlycapillanes.wordpress.com/
*/

// wp tinymce : define variable includes, config
define( 'WP_Tinymce_Includes', 'includes' );
define( 'WP_Tinymce_Config', 'config' );

// wp tinymce : define directory url

define( 'WP_Tinymce_URL', plugins_url( 'wp-tinymce', dirname( __FILE__ ) )  );
define( 'WP_Tinymce_Config_URL', WP_Tinymce_URL . '/wp-tinymce/config' );
define( 'WP_Tinymce_Includes_URL', WP_Tinymce_URL . '/wp-tinymce/includes' );

// includes : tinymce library
require_once ( WP_Tinymce_Includes . '/tinymce.php' );

// includes : code sources
require_once ( WP_Tinymce_Includes . '/code.php' );

// config : loader
require_once ( WP_Tinymce_Config . '/loader.php' );

?>