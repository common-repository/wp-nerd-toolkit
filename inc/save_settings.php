<?php
if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb;
$update_table_name = $wpdb->prefix . "wpner_toolkit";

// Save Minify Options
if (isset($_POST['minify_update']) AND wp_verify_nonce($_REQUEST['submit_minify'], 'minify_update') ) {

	if (isset($_POST['option1']) AND is_numeric($_POST['option1']) ){ 
			$minify_aktiv = $_POST['option1']; 
	}
	else { $minify_aktiv = '0'; }

	$wpdb->update( 
	$update_table_name, 
	array( 
		'wp_minify' => $minify_aktiv
	), 
	array( 'id' => '1' ), 
	array( 
		'%d'
	), 
	array( '%d' ) 
);
}

// Safe Facebook
if (isset($_POST['facebook_update']) AND wp_verify_nonce($_REQUEST['submit_facebook'], 'facebook_update') ) {
	if (isset($_POST['fb_status']) AND is_numeric($_POST['fb_status']) ) {
		$facebook_aktiv = $_POST['fb_status']; 
	}
	else { $facebook_aktiv = '0';}

	if (isset($_POST['facebook_id']) AND is_numeric($_POST['facebook_id'])) { $facebook_id = sanitize_text_field($_POST['facebook_id']);}
	else { $facebook_id = '000'; }

	$wpdb->update( 
	$update_table_name, 
	array( 
		'facebook_pixel' => $facebook_aktiv,
		'facebook_id' => $facebook_id
	), 
	array( 'id' => '1' ), 
	array( 
		'%d',
		'%s'
	), 
	array( '%d' ) 
	);
}

// Save Google Analytics
if (isset($_POST['analytics_update']) AND wp_verify_nonce($_REQUEST['submit_google'], 'google_update')) {
	if (isset($_POST['analytics_status']) AND is_numeric($_POST['analytics_status']) ){ $google_aktiv = $_POST['analytics_status']; }
	else { $google_aktiv = '0';}

	if (isset($_POST['analytics_id'])) { $google_id = sanitize_text_field($_POST['analytics_id']);}
	else { $google_id = '000';}

	$wpdb->update( 
	$update_table_name, 
	array( 
		'google_analytics' => $google_aktiv,
		'analytics_id' => $google_id
	), 
	array( 'id' => '1' ), 
	array( 
		'%d',
		'%s'
	), 
	array( '%d' ) 
	);
}

// Save Emoji
if (isset($_POST['emoji_update']) AND wp_verify_nonce($_REQUEST['submit_emojis'], 'emoji_update') ){
		if (isset($_POST['option1']) AND is_numeric($_POST['option1'])) { $emoji_aktiv = $_POST['option1']; }
		else { $emoji_aktiv = '0'; }

		$wpdb->update( 
		$update_table_name, 
		array( 
			'wp_emojis' => $emoji_aktiv
		), 
		array( 'id' => '1' ), 
		array( 
			'%d'
		), 
		array( '%d' ) 
		);
}

// Save WP Generator
if (isset($_POST['version_update']) AND wp_verify_nonce($_REQUEST['submit_generator'], 'version_update')) {
	if (isset($_POST['option1']) AND is_numeric($_POST['option1']) ) { $generator_aktiv = $_POST['option1']; }
	else { $generator_aktiv = '0'; }

	$wpdb->update( 
	$update_table_name, 
	array( 
		'wp_generator' => $generator_aktiv
	), 
	array( 'id' => '1' ), 
	array( 
		'%d'
	), 
	array( '%d' ) 
	);	
}

// Query Strings
if (isset($_POST['querie_update']) AND wp_verify_nonce($_REQUEST['submit_querys'], 'querie_update') ) { 
	if (isset($_POST['option1']) AND is_numeric($_POST['option1']) ){ $query_strings_aktiv = $_POST['option1']; }
	else { $query_strings_aktiv = '0'; }

	$wpdb->update( 
	$update_table_name, 
	array( 
		'query_strings' => $query_strings_aktiv
	), 
	array( 'id' => '1' ), 
	array( 
		'%d'
	), 
	array( '%d' ) 
	);	
}

// Weekly Backups
if (isset($_POST['backup_update']) AND wp_verify_nonce($_REQUEST['submit_weekly_ftp'], 'ftp_weekly') ) { 
	if (isset($_POST['option1']) AND is_numeric($_POST['option1']) ){ $backup_aktiv = $_POST['option1']; }
	else { $backup_aktiv = '0'; }

	$wpdb->update( 
	$update_table_name, 
	array( 
		'daily_backup' => $backup_aktiv
	), 
	array( 'id' => '1' ), 
	array( 
		'%d'
	), 
	array( '%d' ) 
	);	
}


if (isset($_POST['backup_option_update']) AND wp_verify_nonce($_REQUEST['submit_ftp'], 'ftp_data') ) { 
	if (isset($_POST['option1']) AND is_numeric($_POST['option1']) ){ $ftp_aktiv = $_POST['option1']; }
	else { $ftp_aktiv = '0'; }

	if (isset($_POST['option2']) AND is_numeric($_POST['option2']) ){ $delete_aktiv = $_POST['option2']; }
	else { $delete_aktiv = '0'; }

	$ftp_server = sanitize_text_field($_POST['server']); 
	$ftp_user = sanitize_text_field($_POST['user']); 
	$ftp_folder = sanitize_text_field($_POST['folder']);

	if (substr($ftp_folder, -1, 1) !== '/'){
		$ftp_folder = $ftp_folder . '/';
	}

	$wpdb->update( 
	$update_table_name, 
	array( 
		'back_ftp' => $ftp_aktiv,
		'back_delete' => $delete_aktiv,
		'ftp_user' => $ftp_user,
		'server' => $ftp_server,
		'verzeichnis' => $ftp_folder
	), 
	array( 'id' => '1' ), 
	array( 
		'%d',
		'%d',
		'%s',
		'%s',
		'%s'
	), 
	array( '%d' ) 
	);	
}

// FTP Passwort
if (isset($_POST['backup_option_update']) AND isset($_POST['pass']) AND wp_verify_nonce($_REQUEST['submit_ftp'], 'ftp_data') ){

	$ftp_passwort = sanitize_text_field($_POST['pass']);
	$config_folder = ABSPATH.'/wp-content/uploads/wp-nerd-toolkit';
	$config_file = $config_folder .'/wpnerd_ftp_conf.php';

	//check folder
	if (!file_exists($config_folder)) {
    	mkdir($config_folder, 0755, true);
	}

	//check file
	if (file_exists($config_file)) {
        $fh = fopen($config_file, 'w');

        // write to file
		$html = file_get_contents($config_file);
		$html .= '<?php if ( ! defined( "ABSPATH" ) ) exit; $ftp_password = "'. $ftp_passwort . '";?>';
		$file = $config_file;
		file_put_contents($file,$html);
      }
      else {
      	$content = '<?php if ( ! defined( "ABSPATH" ) ) exit; $ftp_password = "'. $ftp_passwort . '";?>';
		$fp = fopen($config_file,"wb");
		fwrite($fp,$content);
		fclose($fp);
      }
}
?>