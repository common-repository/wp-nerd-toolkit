<?php
if ( ! defined( 'ABSPATH' ) ) exit;

echo "\n <!-- ====== This Site use the [WP]:NERD Toolkit Plugin ====== --> \n \n";

// Get Settings
include( plugin_dir_path( __FILE__ ) . '/get_settings.php');

// Google Analytics include
if ( $google_analytics == '1' AND !empty( $analytics_id ) ) { // und id variable nicht leer
	include( plugin_dir_path( __FILE__ ) . '/scripts/google_analytics.php');
}

// Facebook Pixel
if ( $facebook_pixel == '1' AND !empty( $facebook_id ) ) { // und id variable nicht leer
	include( plugin_dir_path( __FILE__ ) . '/scripts/facebook_pixel.php');
}
?>