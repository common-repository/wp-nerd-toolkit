<?php
/*
Plugin Name: WP-Nerd Toolkit
Plugin URI: https://wpnerd.de/toolkit-plugin
Description: WP-Nerd WordPress Toolkit
Version: 1.1
Author: WPNERD
Author URI: https://wpnerd.de
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wpnerd_multilanguage
Domain Path: /languages
*/
?>
<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); 
load_plugin_textdomain('wpnerd_multilanguage', false, basename( dirname( __FILE__ ) ) . '/languages' );

// Cronjobs
function my_add_intervals($schedules) {
  // add a 'weekly' interval
  $schedules['weekly'] = array(
    'interval' => 604800,
    'display' => __('Once Weekly')
  );
  $schedules['monthly'] = array(
    'interval' => 2635200,
    'display' => __('Once a month')
  );
  return $schedules;
}
add_filter( 'cron_schedules', 'my_add_intervals'); 

//=================== Plugin De-/Aktivierung =================

global $jal_db_version;
$jal_db_version = '1.1';
// Plugin Aktivierungs-Funktion
function wpnerd_activation(){
	include( plugin_dir_path( __FILE__ ) . 'maintenance/activation.php');
}
register_activation_hook(__FILE__, 'wpnerd_activation');

// If Upgrade we must upgrade db
function wpnerd_upgrade_db_check() {
    global $jal_db_version;
    if ( get_site_option( 'jal_db_version' ) != $jal_db_version ) {
        include( plugin_dir_path( __FILE__ ) . 'maintenance/upgrade.php');
    }
}
add_action( 'plugins_loaded', 'wpnerd_upgrade_db_check' );


//=================== Plugin Funktionen =================

// Main Backend Funktion
function wpnerd_backend(){
	include( plugin_dir_path( __FILE__ ) . 'inc/backend_main.php');

	// CSS-Files
	wp_register_style( 'wpnerd_css', plugin_dir_url( __FILE__ ) . 'css/backend.css', false, '1.0.0' );
    wp_enqueue_style( 'wpnerd_css' );

 	// JS-Files
    wp_register_script('wpnerd_ajax', plugin_dir_url( __FILE__ ) . 'js/wpnerd_ajax.js', false, '1.0.0');    	
    wp_enqueue_script('wpnerd_ajax');
}

// Ein-Klick SSL Funktion
function wpnerd_ein_klick_ssl(){
	include( plugin_dir_path( __FILE__ ) . 'inc/ssl_page.php');
	
	//CSS-Files
	wp_register_style( 'wpnerd_css', plugin_dir_url( __FILE__ ) . 'css/backend.css', false, '1.0.0' );
    wp_enqueue_style( 'wpnerd_css' );

 	// JS-Files
    wp_register_script('wpnerd_ajax', plugin_dir_url( __FILE__ ) . 'js/wpnerd_ajax.js', false, '1.0.0');    	
    wp_enqueue_script('wpnerd_ajax');
}

// Head Hooks
add_action('wp_head', 'wpnerd_headhooks');
function wpnerd_headhooks(){
	include( plugin_dir_path( __FILE__ ) . 'inc/head_includes.php');
}

// functions - can´t find a gut hook for this
if ( !is_admin() ) {
include( plugin_dir_path( __FILE__ ) . 'inc/main_functions.php');
}

add_action('wpnerd_backup_daily', 'wpnerd_backup_cron');

function wpnerd_backup_cron()
{
// BAckup Cronjob
include( plugin_dir_path( __FILE__ ) . 'inc/backup_cronjob.php');
}

// Feed Widget
include ( plugin_dir_path( __FILE__ ) . 'inc/scripts/feed_widget.php');

function wpnerd_backups(){
	include ( plugin_dir_path( __FILE__ ) . 'inc/backups.php');

	//CSS-Files
	wp_register_style( 'wpnerd_css', plugin_dir_url( __FILE__ ) . 'css/backend.css', false, '1.0.0' );
    wp_enqueue_style( 'wpnerd_css' );

 	// JS-Files
    wp_register_script('wpnerd_ajax', plugin_dir_url( __FILE__ ) . 'js/wpnerd_ajax.js', false, '1.0.0');    	
    wp_enqueue_script('wpnerd_ajax');
    wp_localize_script( 'wpnerd_ajax', 'wpnerd', array(
    'ajax_url' => admin_url( 'admin.php?page=wpnerd_backups' ),
    'pluginsUrl' => plugins_url()
  ));
}
//=================== Plugin Registrierung =================

// Backend Menü-Eintrag
add_action('admin_menu', 'wpnerd_AddMenu');
function wpnerd_AddMenu() {
  add_menu_page('WP-NERD Toolkit', 'WP-NERD Toolkit', 'edit_pages', __FILE__, 'wpnerd_backend', plugin_dir_url( __FILE__ ) . 'inc/img/wp-nerd-icon.png', 2);
  add_submenu_page(__FILE__, 'Ein-Klick SSL', 'Ein-Klick SSL', 'edit_pages', 'wpnerd_ein_klick_ssl', 'wpnerd_ein_klick_ssl');
  add_submenu_page(__FILE__, 'Backups', 'Backups', 'edit_pages', 'wpnerd_backups', 'wpnerd_backups');
}
?>