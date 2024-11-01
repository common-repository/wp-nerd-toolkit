<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
  
// drop a custom database table
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}wpner_toolkit");
// clear wp_cron
wp_clear_scheduled_hook( 'wpnerd_backup_daily' );
?>