<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
 function wpnerd_dashboard_widgets() {  
     global $wp_meta_boxes;  
     // remove unnecessary widgets  
     // var_dump( $wp_meta_boxes['dashboard'] ); // use to get all the widget IDs  
     unset(  
          $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],  
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],  
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']  
     );  
     // add a custom dashboard widget  
     wp_add_dashboard_widget( 'dashboard_custom_feed', '[WP]:NERD News', 'wpnerd_dashboard_custom_feed_output' ); 
}  
function wpnerd_dashboard_custom_feed_output() {  
     echo '<div class="rss-widget">';  
     wp_widget_rss_output(array(  
          'url' => 'https://wpnerd.de/feed/',  
          'title' => '[WP]:NERD News',  
          'items' => 4,  
          'show_summary' => 1,  
          'show_author' => 0,  
          'show_date' => 1   
     ));  
     echo "</div>";  
}
add_action('wp_dashboard_setup', 'wpnerd_dashboard_widgets');    
?>