<?php
if ( ! defined( 'ABSPATH' ) ) exit;


// connect and login to FTP server
//$ftp_server = "ftp.w0137aee.kasserver.com";
//$ftp_username = $ftp_user;
//$ftp_userpass = 'UKu9e9efBcoQtzCz';

$conf = ABSPATH.'/wp-content/uploads/wp-nerd-toolkit/wpnerd_ftp_conf.php';
if (file_exists($conf)) {include( $conf ); $ftp_userpass = $ftp_password;}


$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

$ftp_dir = $ftp_verzeichnis;

if (!empty($ftp_dir) OR !isset($ftp_dir)) {
	ftp_chdir($ftp_conn, $ftp_dir);
}

//make dir
$dir = 'wpnerd_backup_'. $date;
ftp_mkdir($ftp_conn, $dir);

// upload sql backup
$file = ABSPATH .'wp-content/uploads/wpnerd_backup_' . $date . '/db_backup.sql';
$ftp_remote = $dir .'/db_backup.sql';

ftp_put($ftp_conn, $ftp_remote, $file, FTP_ASCII);

// upload file backup
$file = ABSPATH .'wp-content/uploads/wpnerd_backup_' . $date . '/file_backup.zip';
$ftp_remote = $dir .'/filebackup.zip';

ftp_put($ftp_conn, $ftp_remote, $file, FTP_ASCII);

// close connection
ftp_close($ftp_conn);
?>