<?php
if ( ! defined( 'ABSPATH' ) ) exit;
	// Get Strings
	include( plugin_dir_path( __FILE__ ) . '/backend_strings.php');

	// Get Site URL´s
	$wpnerd_home = get_home_url();
	$wpnerd_new_url = 'https://' . preg_replace('#^https?://#', '', rtrim($wpnerd_home,'/'));

	echo '
		<div class="wpnerd_mainwrap">
			<div class="wp_nerd_inner">
				<a href="https://wpnerd.de" target="_blank">
					<img class="wpnerd_logo" src="' . plugin_dir_url( __FILE__ ) . 'img/wp-nerd.png' . '" />
				</a>
				<h2>' . esc_html($ssl_headline) . '</h2>
			</div>
		</div>
		<div class="wpnerd_content">
	';
	echo '<div id="hilfe_text" style="display: none;">123</div>';
	echo '
		<div class="wpnerd_inner_row">
			<div class="wpnerd_warnung">
				<p><b>' . esc_html($erste_warnung) . '</b></p>
				<a href="#" onclick="wpnerd_hilfe1();">' . esc_html($ssl1) . '</a>
				<div id="wpnerd_hilfe1">' . esc_html($was_ist_ssl) . '</div>
				<br><a href="#" onclick="wpnerd_hilfe2();">' . esc_html($ssl2) . '</a>
				<div id="wpnerd_hilfe2">' . esc_html($brauche_ich_ssl) . '</div>
				<br><a href="#" onclick="wpnerd_hilfe3();">' . esc_html($ssl3) . '</a>
				<div id="wpnerd_hilfe3">' . esc_html($vor_der_umstellung) . '</div><br>
			</div>
		</div>
		<h2>' . esc_html($konsole_string) . '</h2>
		<div class="wpnerd_inner_row">
			<div class="wpnerd_console">
				$WPNERD: ' . esc_html($home_url_string) . ' ' . esc_html($wpnerd_home) . ' <br> ';
				echo '
				$WPNERD: ' . esc_html($new_url_string) . ' ' . esc_html($wpnerd_new_url) . '<br>';

				if ($wpnerd_home == $wpnerd_new_url){
					echo '$WPNERD: ' . esc_html($site_is_ssl) . '<br> ';
				}

				if (isset($_POST['senden']) AND isset($_POST['backup']) AND wp_verify_nonce($_REQUEST['submit_ssl'], 'ssl_update')) {
					include( plugin_dir_path( __FILE__ ) . '/scripts/ssl_queries.php');
					include( plugin_dir_path( __FILE__ ) . '/scripts/edit_htaccess.php');
					echo esc_html($ssl_finished) . '<br>';

				}
				elseif (isset($_POST['senden']) AND !isset($_POST['backup'])) {
					echo '$WPNERD: ' . esc_html($no_backup) . ' <br>';
				}
	echo '
			</div>
		</div>
		';
	if ($wpnerd_home !== $wpnerd_new_url){
	echo '
		<form method="post">
			' . wp_nonce_field('ssl_update', 'submit_ssl') . '
			<input type="checkbox" name="extern"> ' . esc_html($externe_bilder) . '<br><br>
			<input type="checkbox" name="backup"> ' . esc_html($backup_check) . '<br>
			<button type="submit" name="senden" class="button button-primary">' . esc_html($go_for_it) . '</button>
		</form>
		</div>
	';
	}
	else {
		echo '
		<h2>' . esc_html($not_possible) . '</h2>
		<div class="wpnerd_inner_row">
			<div class="wpnerd_warnung">
				<p><b>' . esc_html($second_warning) . '<br>
				<a href="https://wpnerd.de/wordpress-in-5-min-auf-https-umstellen/" target="_blank">' . esc_html($tutorial) . '</a></p>
			</div>
		</div>
		';
	}	
?>