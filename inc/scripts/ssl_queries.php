<?php
if ( ! defined( 'ABSPATH' ) ) exit;
				global $wpdb;

				// Set Table Variables
				$table_name1 = $wpdb->prefix . "options";
				$table_name2 = $wpdb->prefix . "posts";
				$table_name3 = $wpdb->prefix . "postmeta";

				// Escabe URL´s
				$wpnerd_home_esc = esc_url($wpnerd_home);
				$wpnerd_new_url_esc = esc_url($wpnerd_new_url);
				
				//Make Querys
				$wpdb->query($wpdb->prepare("UPDATE $table_name2 SET guid = replace(guid, '%s', '%s')", $wpnerd_home_esc, $wpnerd_new_url_esc));
				$wpdb->query($wpdb->prepare("UPDATE $table_name2 SET post_content = replace(post_content, '%s', '%s')", $wpnerd_home_esc, $wpnerd_new_url_esc));
				echo esc_html($query_posts) . '<br>';
				$wpdb->query($wpdb->prepare("UPDATE $table_name3 SET meta_value = replace(meta_value, '%s', '%s')", $wpnerd_home_esc, $wpnerd_new_url_esc));
				echo esc_html($query_postmeta) . '<br>';
				$wpdb->query($wpdb->prepare("UPDATE $table_name1 SET option_value = replace(option_value, '%s', '%s') WHERE option_name = 'home' OR option_name = 'siteurl'", $wpnerd_home_esc, $wpnerd_new_url_esc));
				echo esc_html($query_options) . '<br>';

				if (isset($_POST['extern'])) {
					$wpdb->query($wpdb->prepare("UPDATE $table_name2 SET post_content = replace(post_content, '%s', '%s')", 'img src="http://', 'img src="https://'));
					echo esc_html($query_extern) . '<br>';
				}
?>