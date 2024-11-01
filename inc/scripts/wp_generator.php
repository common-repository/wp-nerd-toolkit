<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// WordPress Version entfernen
remove_action( 'wp_head', 'wp_generator' );
?>