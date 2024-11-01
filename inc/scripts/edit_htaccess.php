<?php
if ( ! defined( 'ABSPATH' ) ) exit;
echo '$WPNERD: ' . $htaccess_work . ' <br>';

$file = '../.htaccess';

$new_stuff = "
RewriteEngine On
RewriteCond %{HTTPS} !=on
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\n\n";
					
$new_stuff .= file_get_contents($file);
file_put_contents($file, $new_stuff);

echo '$WPNERD: ' . $htaccess_finished . '<br>';
?>