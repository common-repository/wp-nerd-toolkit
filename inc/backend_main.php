<?php
if ( ! defined( 'ABSPATH' ) ) exit;
	// Save Plugin Settings
	include( plugin_dir_path( __FILE__ ) . '/save_settings.php');
	// Get Plugin Settings
	include( plugin_dir_path( __FILE__ ) . '/get_settings.php');
	// Get Strings
	include( plugin_dir_path( __FILE__ ) . '/backend_strings.php');

   	if ($facebook_pixel == '1') { 
   		$facebook_pixel = 'checked';
   	}
   	if ($google_analytics == '1') { $google_analytics = 'checked';}
   	if ($query_strings == '1') { $query_strings = 'checked';}
   	if ($wp_generator == '1') { $wp_generator = 'checked';}
   	if ($wp_emojis == '1') { $wp_emojis = 'checked';}
   	if ($wp_minify == '1') { $wp_minify = 'checked';}

	// Options Output
	echo '
		<div class="wpnerd_mainwrap">
			<div class="wp_nerd_inner">
				<a href="https://wpnerd.de" target="_blank">
					<img class="wpnerd_logo" src="' . plugin_dir_url( __FILE__ ) . 'img/wp-nerd.png' . '" />
				</a>
				<h2>Toolkit Dashboard</h2>
			</div>
		</div>
		<div class="wpnerd_content">

			<div class="wpnerd_left">
				<div class="wpnerd_inner_row">
					<h3>Ein-Klick SSL</h3>
					<div class="wpnerd_switch">
						<a href="' . admin_url() . 'admin.php?page=wpnerd_ein_klick_ssl">
							<button style="margin-left: -30px;" class="button button-primary">Umstellen!</button>
						</a>
					</div>
				</div>
				<div class="wpnerd_description">
						<p>' . esc_html($ssl_beschreibung) . '</p>
				</div>
				<div class="wpnerd_inner_row">
					<h3>WP Emojis deaktivieren</h3>
					<div class="wpnerd_switch">
						<label class="switch">
  							<input onclick="wpnerd_smile();" type="checkbox" name="wp_emojis" ' . $wp_emojis . '>
  								<div class="slider round"></div>
						</label>
					</div>
				</div>
				<div class="wpnerd_optionen" id="emoji_options">
					<form method="post" name="emojis">
						' . wp_nonce_field('emoji_update', 'submit_emojis') . '
						<input type="checkbox" value="1" name="option1" ' . @esc_html($wp_emojis) . '>' . esc_html($emoji_string) . '</input>
						<input class="button button-primary button-float" name="emoji_update" type="submit" value="Speichern" />
					</form>
				</div>
				<div class="wpnerd_description">
						<p>' . esc_html($emojis_beschreibung) . '</p>
				</div>

				<div class="wpnerd_inner_row">
					<h3>WP Version entfernen</h3>
					<div class="wpnerd_switch">
						<label class="switch">
  							<input onclick="wpnerd_unnoetig();" type="checkbox" name="wp_generator" ' . $wp_generator . '>
  								<div class="slider round"></div>
						</label>
					</div>
				</div>
				<div class="wpnerd_optionen" id="version_options">
					<form method="post" name="version">
					' . wp_nonce_field('version_update', 'submit_generator') . '
						<input type="checkbox" value="1" name="option1" ' . @esc_html($wp_generator) . '>' . esc_html($version_string) . '</input>
						<input class="button button-primary button-float" name="version_update" type="submit" value="Speichern" />
					</form>
				</div>
				<div class="wpnerd_description">
						<p>' . esc_html($wp_version_beschreibung) . '</p>
				</div>



				<div class="wpnerd_inner_row">
					<h3>Query Strings entfernen</h3>
					<div class="wpnerd_switch">
						<label class="switch">
  							<input onclick="wpnerd_querie();" type="checkbox" name="query_strings" ' . $query_strings . '>
  								<div class="slider round"></div>
						</label>
					</div>
				</div>
				<div class="wpnerd_optionen" id="querie_options">
					<form method="post" name="querie_strings">
						' . wp_nonce_field('querie_update', 'submit_querys') . '
						<input type="checkbox" value="1" name="option1" ' . @esc_html($query_strings) . '>' . esc_html($query_besch) . '</input>
						<input class="button button-primary button-float" name="querie_update" type="submit" value="Speichern" />
					</form>
				</div>
				<div class="wpnerd_description">
						<p>' . esc_html($query_strings_beschreibung) . '</p>
					</div>
			</div>






			<div class="wpnerd_right">
				<div class="wpnerd_inner_row">
					<h3>Backups</h3>
					<div class="wpnerd_switch">
						<a href="' . admin_url() . 'admin.php?page=wpnerd_backups">
							<button style="margin-left: -45px;" class="button button-primary">Einstellungen</button>
						</a>
					</div>
				</div>
				<div class="wpnerd_description">
						<p>' . esc_html($backup_beschreibung2) . '</p>
				</div>

				<div class="wpnerd_inner_row">
					<h3>Minify</h3>
					<div class="wpnerd_switch">
						<label class="switch">
  							<input type="checkbox" id="minify_check" name="wp_minify" onclick="wpnerd_minify();" ' . $wp_minify .'>
  								<div class="slider round"></div>
						</label>
					</div>
				</div>
				<div class="wpnerd_optionen" id="minify_options">
					<form method="post" name="minfiy">
						' . wp_nonce_field('minify_update', 'submit_minify') . '
						<input type="checkbox" value="1" name="option1" ' . @esc_html($wp_minify) . '>HTML Reduzieren</input>
						<input class="button button-primary button-float" name="minify_update" type="submit" value="Speichern" />
					</form>
				</div>
				<div class="wpnerd_description">
						<p>' . esc_html($minify_beschreibung) . '</p>
				</div>





				<div class="wpnerd_inner_row">
					<h3>Facebook Pixel</h3>
					<div class="wpnerd_switch">
						<label class="switch">
  							<input onclick="wpnerd_save_checkbox();" type="checkbox" id="facebook_pixel" name="facebook_pixel" ' . $facebook_pixel .'>
  								<div class="slider round"></div>
						</label>
					</div>
				</div>

				<div class="wpnerd_optionen" id="facebook_options">
					<form method="post" name="facebook">
						' . wp_nonce_field('facebook_update', 'submit_facebook') . '
						<input type="checkbox" value="1" name="fb_status" ' . @esc_html($facebook_pixel) . '> ' . esc_html($pixel_check) . '</input><br>
						<label>' . esc_html($pixel_string) . '<br>
						<input type="text" name="facebook_id" value="' . esc_html($facebook_id) . '" /></label>
						<input class="button button-primary button-float" name="facebook_update" type="submit" value="Speichern" />
					</form><br>
				</div>
				<div class="wpnerd_description">
						<p>' . esc_html($facebook_pixel_beschreibung) . '</p>
				</div>

				<div class="wpnerd_inner_row">
					<h3>Google Analytics</h3>
					<div class="wpnerd_switch">
						<label class="switch">
  							<input onclick="wpnerd_google();" type="checkbox" name="google analytics" ' . $google_analytics . '>
  								<div class="slider round"></div>
						</label>
					</div>
				</div>
				<div class="wpnerd_optionen" id="analytics_options">
					<form method="post" name="analytics">
						' . wp_nonce_field('google_update', 'submit_google') . '
						<input type="checkbox" value="1" name="analytics_status" ' . @esc_html($google_analytics) . '> ' . esc_html($google_check) . '</input><br>
						<label>' . esc_html($google_string) . '<br>
						<input type="text" name="analytics_id" value="' . esc_html($analytics_id) . '" /></label>
						<input class="button button-primary button-float" name="analytics_update" type="submit" value="Speichern" />
					</form>
				</div>
				<div class="wpnerd_description">
						<p>' . esc_html($google_analytics_beschreibung) . '</p>
				</div>

			</div>
	';

?>