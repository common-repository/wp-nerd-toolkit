<?php
if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb;
$table_name = $wpdb->prefix . "wpner_toolkit";
$query = "SELECT * FROM " . $table_name . " WHERE id = 1";
$results = $wpdb->get_results($query);

foreach ($results as $result){ 
   		$facebook_pixel = $result->facebook_pixel;
   		$facebook_id = $result->facebook_id;
   		$google_analytics = $result->google_analytics;
   		$analytics_id = $result->analytics_id;
   		$query_strings = $result->query_strings;
   		$wp_generator = $result->wp_generator;
   		$wp_emojis = $result->wp_emojis;
   		$wp_minify = $result->wp_minify;
   		$daily_backup = $result->daily_backup;
         $backup_delete = $result->back_delete;
         $ftp_backup = $result->back_ftp;
         $ftp_username = $result->ftp_user;
         $ftp_server = $result->server;
         $ftp_verzeichnis = $result->verzeichnis;
   	}
?>