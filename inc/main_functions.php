<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Get Settings
include( plugin_dir_path( __FILE__ ) . '/get_settings.php');

	// WP-Emojis Deaktivieren
	if ($wp_emojis == '1') {
		include( plugin_dir_path( __FILE__ ) . '/scripts/wpnerd_emojis.php');
	}

	// Remove WP_Generator
	if ($wp_generator == '1') {
		include( plugin_dir_path( __FILE__ ) . '/scripts/wp_generator.php');
	}

	// Remove Query Strings
	if ($query_strings == '1') {
		include( plugin_dir_path( __FILE__ ) . '/scripts/remove_query_strings.php');
	}

	// Minify Output
	if ($wp_minify == '1') {
		include( plugin_dir_path( __FILE__ ) . '/scripts/wpnerd_minify.php');
	}
?>