<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	// Get Strings
	include( plugin_dir_path( __FILE__ ) . '/backend_strings.php');
	// Save Plugin Settings
	include( plugin_dir_path( __FILE__ ) . '/save_settings.php');
	// Get Plugin Settings
	include( plugin_dir_path( __FILE__ ) . '/get_settings.php');

	if ($daily_backup == '1') { $set_backup = 'checked';}
	if ($backup_delete == '1') { $back_delete_status = 'checked';}
	if ($ftp_backup == '1') { $backup_ftp = 'checked';}

	if ($daily_backup == '1'){
		$wpnerd_crontime = wp_next_scheduled( 'wpnerd_backup_daily' );
		$wpnerd_crontime = '<b>Nächstes Backup: ' .get_date_from_gmt( date('d-m-Y H:i:s', $wpnerd_crontime) ) . '</b><br>';
	}

	// Check write_permissions
	$filename = ABSPATH . '/wp-content/uploads/';
	if (is_writable($filename)) {
    	$permission_check = $upload_write;
	} else {
    	$permission_check = $upload_not_write;
	}

	echo '<div class="wpnerd_mainwrap">
			<div class="wp_nerd_inner">
				<a href="https://wpnerd.de" target="_blank">
					<img class="wpnerd_logo" src="' . plugin_dir_url( __FILE__ ) . 'img/wp-nerd.png' . '" />
				</a>
				<h2>Toolkit Backups</h2>
			</div>
		</div>
		<div class="wpnerd_content">';

	echo '
		<div class="wpnerd_left">
			<div class="wpnerd_inner_row">
					<h3>' . esc_html($jetzt_backup) .'</h3>
					<div class="wpnerd_switch">
						<button class="button button-primary" name="backupen" value="Jetzt Backup erstellen" onclick="foo()">' . esc_html($jetzt_backup_button) . '</button>
					</div>
			</div>
			<div class="wpnerd_inner_row">
				<div id="log">';
				$date = date("Ymd-hi");
				include( plugin_dir_path( __FILE__ ) . 'scripts/backup/backup_action.php');

				if (isset($_POST['backupen']) && !empty($_POST['backupen']) AND $ftp_backup == '1' ) {
					include( plugin_dir_path( __FILE__ ) . 'scripts/backup/ftp_upload.php');
				}

				if ( isset($_POST['backupen']) AND $backup_delete == '1' AND $ftp_backup == '1' ){
					include( plugin_dir_path( __FILE__ ) . 'scripts/backup/delete_backup.php');
				}
		echo '	</div>
			</div>
			<div class="wpnerd_description">
						<p>' . esc_html($backup_beschreibung) . '</p>
				</div>

			<div class="wpnerd_inner_row">
				<h3>' . esc_html($backup_auto) .'</h3>
			</div>
			<div class="wpnerd_optionen" style="display: flex;">
					<form method="post" name="backup">
						' . wp_nonce_field('ftp_weekly', 'submit_weekly_ftp') . '
						<input type="checkbox" value="1" name="option1" ' . @esc_html($set_backup) . ' style="margin: 0px 4px 0 0 !important;">' . esc_html($a_backups_aktivieren) . '</input>
						<input class="button button-primary button-float" name="backup_update" type="submit" value="' . esc_html($backup_auto_button) . '" />
					</form>
			</div>
			<div class="wpnerd_description">
						<p>' . @$wpnerd_crontime . '' . esc_html($backup_beschreibung_string) . '</p>
				</div>

			<div class="wpnerd_inner_row">
				<h3>' . esc_html($file_permissin) . '</h3>
			</div>
			<div class="wpnerd_description" style="display:block !important; padding-bottom: 5px;">
				<b>' . esc_html($root_ordner) . ':</b><br> ' . ABSPATH . '<br><br>
				<b>' . esc_html($upload_permission) . '</b><br>
				' . esc_html($permission_check) . '
			</div>
		</div>
	';
	$conf = ABSPATH.'/wp-content/uploads/wp-nerd-toolkit/wpnerd_ftp_conf.php';
	if (file_exists($conf)) {
		include( $conf );
	}
	// Right Site
	echo '
		<div class="wpnerd_right">
			<div class="wpnerd_inner_row">
				<h3>' . esc_html($wpnerd_backup_options) . '</h3>
			</div>
			<div class="wpnerd_optionen" style="display: flex;">
				<b>' . esc_html($uebertragung_aktivieren) . '</b>
			</div>
			<div class="wpnerd_optionen" style="display: flex;">
				<form method="post">
					' . wp_nonce_field('ftp_data', 'submit_ftp') . '
					<input type="text" name="server" placeholder="Servername" value="' . esc_html($ftp_server) . '" /><br>
					<input type="text" name="user" placeholder="Username" value="' . esc_html($ftp_username) . '" /><br>
					<input type="password" name="pass" placeholder="Passwort" value="' . @esc_html($ftp_password) . '" /><br>
					<input type="text" name="folder" placeholder="' . esc_html($Verzeichnispfad) . '" value="' . esc_html($ftp_verzeichnis) . '" /<br><br>

				<i>' . esc_html($vbeispiel) . '</i>
			</div>
			<div class="wpnerd_optionen"  style="display: flex;">
					<input type="checkbox" value="1" name="option1" ' . @esc_html($backup_ftp) . ' style="margin: 0px 4px 0 0 !important;">' . esc_html($uebertragung_aktivieren) . '</input>
			</div>
			<div class="wpnerd_optionen"  style="display: flex;">
					<input type="checkbox" value="1" name="option2" ' . @esc_html($back_delete_status) . ' style="margin: 0px 4px 0 0 !important;">' . esc_html($backups_loeschen) . '</input>
			</div>
			<div class="wpnerd_optionen" style="display: flex;">
				<input class="button button-primary button-float" name="backup_option_update" type="submit" value="' . esc_html($backup_auto_button) . '" />
				</form>
			</div>
			<div class="wpnerd_description">
			<i>' . esc_html($uebertragung_info) . '<br><br>
			' . esc_html($option_warning) . '</i>
			</div>

		</div>
	';
	// Main Container end
	echo '</div>';
?>