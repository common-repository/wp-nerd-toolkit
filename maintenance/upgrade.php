<?php
global $wpdb;
global $jal_db_version;

$installed_ver = get_option( "jal_db_version" );

if ( $installed_ver != $jal_db_version ) {

  $table_name = $wpdb->prefix . "wpner_toolkit";
  $charset_collate = $wpdb->get_charset_collate();
  
  $sql = "CREATE TABLE $table_name (
  id mediumint(1) NOT NULL AUTO_INCREMENT,
  facebook_pixel tinyint(4) NOT NULL,
  google_analytics tinyint(4) NOT NULL,
  facebook_id varchar(20),
  analytics_id varchar(20),
  query_strings tinyint(4) NOT NULL,
  wp_generator tinyint(4) NOT NULL,
  wp_emojis tinyint(4) NOT NULL,
  wp_minify tinyint(4) NOT NULL,
  daily_backup tinyint(4) NOT NULL,
  back_delete tinyint(4) NOT NULL,
  back_ftp tinyint(4) NOT NULL,
  ftp_user varchar(100) NOT NULL,
  server varchar(255) NOT NULL,
  verzeichnis varchar(255) NOT NULL,
  PRIMARY KEY  (id)
) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

  update_option( "jal_db_version", $jal_db_version );
}

if (! wp_next_scheduled ( 'wpnerd_backup_daily' )) {
  wp_schedule_event(time(), 'weekly', 'wpnerd_backup_daily');
}
else {
  wp_clear_scheduled_hook( 'wpnerd_backup_daily' );
  wp_schedule_event(time(), 'weekly', 'wpnerd_backup_daily');
}
  ?>