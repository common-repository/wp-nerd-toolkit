<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if (isset($_POST['backupen']) && !empty($_POST['backupen']) ) {


  mkdir(ABSPATH .'wp-content/uploads/wpnerd_backup_'. $date, 0777);
  $new_ordner = ABSPATH .'wp-content/uploads/wpnerd_backup_'. $date;

// Datenbank exportieren
  require_once( ABSPATH . '/wp-config.php' );
   global $wpdb;

  $dbhost     = DB_HOST;
  $dbuser     = DB_USER;
  $dbpwd      = DB_PASSWORD;
  $dbname     = $wpdb->dbname;
  $dbbackup   = $new_ordner. '/db_backup.sql';
 
  error_reporting(0);
  set_time_limit(0);
 
  // mysqli connection
  $conn = mysqli_connect($dbhost, $dbuser, $dbpwd) or die(mysql_error());
  mysqli_select_db( $conn,$dbname);
  $f = fopen($dbbackup, "w");
 
  //$tables = mysqli_list_tables($dbname);
  $sql = "SHOW TABLES FROM $dbname";
  $tables = mysqli_query($conn,$sql);


  while ($cells = mysqli_fetch_array($tables))
  {
      $table = $cells[0];
      //fwrite($f,"DROP TABLE `".$table."`;\n"); 
      $res = mysqli_query($conn, "SHOW CREATE TABLE `".$table."`");
      if ($res)
      {
         $create = mysqli_fetch_array($res);
         $create[1] .= ";";
         $line = str_replace("\n", "", $create[1]);
          fwrite($f, $line."\n");
          $data = mysqli_query($conn,"SELECT * FROM `".$table."`");
          $num = mysqli_num_fields($data);
         while ($row = mysqli_fetch_array($data))
          {
              $line = "INSERT INTO `".$table."` VALUES(";
              for ($i=1;$i<=$num;$i++)
              {
                  $line .= "'".mysqli_real_escape_string($conn,$row[$i-1])."', ";
              }
              $line = substr($line,0,-2);
              fwrite($f, $line.");\n");
          }
      }
  }
  fclose($f);

// ============= Files zippen

// zu zippender ordner
$folder = ABSPATH;

// Filename
$filename = $new_ordner. '/file_backup.zip';


// file und dir counter
$fc = 0;
$dc = 0;
 
// die maximale Ausführzeit erhöhen
ini_set("max_execution_time", 300);
 
// Objekt erstellen und schauen, ob der Server zippen kann
$zip = new ZipArchive();
if ($zip->open($filename, ZIPARCHIVE::CREATE) !== TRUE) {
    die ("Das Archiv konnte nicht erstellt werden!");
}
 
echo "<pre>";
// Gehe durch die Ordner und füge alles dem Archiv hinzu
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder));
foreach ($iterator as $key=>$value) {
 
  if(!is_dir($key) AND strpos($key, 'wpnerd_backup') === false) { // wenn es kein ordner sondern eine datei ist
    // echo $key . " _ _ _ _Datei wurde übernommen</br>";
    $zip->addFile(realpath($key), $key) or die ("FEHLER: Kann Datei nicht anfuegen: $key");
    $fc++;
 
  } elseif (count(scandir($key)) <= 2 AND strpos($key, 'wpnerd_backup') === false) { // der ordner ist bis auf . und .. leer
    // echo $key . " _ _ _ _Leerer Ordner wurde übernommen</br>";
    $zip->addEmptyDir(substr($key, -1*strlen($key),strlen($key)-1));
    $dc++;
 
  } elseif (substr($key, -2)=="/." AND strpos($key, 'wpnerd_backup') === false) { // ordner .
    $dc++; // nur für den bericht am ende
   
  } elseif (substr($key, -3)=="/.." AND strpos($key, 'wpnerd_backup') === false){ // ordner ..
    // tue nichts
   
  } else { // zeige andere ausgelassene Ordner (sollte eigentlich nicht vorkommen)
    echo $key . "WARNUNG: Der Ordner wurde nicht ins Archiv übernommen.</br>";
  }
}
echo "</pre>";
 
// speichert die Zip-Datei
$zip->close();

/*// bericht
$result2 = "<h4>Das Archiv wurde erfolgreich erstellt.</h4>";
$result2 .= "<p>Ordner: " . $dc . "</br>";
$result2 .= "Dateien: " . $fc . "</p>";
$result2 .= '<a href="https://tutorial.wpnerd.de/wp-content/uploads/backup'.$date.'.zip" class="button button-primary">Download Backup</a>';
echo $result2;
*/

// Dropbox Upload
//include( plugin_dir_path( __FILE__ ) . '/scripts/dropbox_upload.php');
// FTP Upload
}
?>