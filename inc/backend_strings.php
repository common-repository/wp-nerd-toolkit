<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Dashboard Strings
$pixel_string = __('Deine Facebook-Pixel-ID:','wpnerd_multilanguage');
$google_string = __('Deine Tracking-ID:', 'wpnerd_multilanguage');
$emoji_string = __('Emojis deaktivieren', 'wpnerd_multilanguage');
$version_string = __('WP-Version deaktivieren', 'wpnerd_multilanguage');
$query_besch = __('Query Strings entfernen', 'wpnerd_multilanguage');

$ssl_beschreibung = __('Du hast ein SSL-Zertifikat? Dann stelle hiermit deine Seite mit nur einem Klick auf SSL um.', 'wpnerd_multilanguage');
$emojis_beschreibung = __('Nutzt du die Emojis in deinen Beiträgen? Wenn nicht deaktiviere den unnötigen Balast.', 'wpnerd_multilanguage');
$wp_version_beschreibung = __('Entferne deine WordPress Version aus dem Quellcode. (generator-tag)', 'wpnerd_multilanguage');
$query_strings_beschreibung = __('Viele Optimierungs-Tools(z.B. Pingdom) zeigen Query-Strings (?version=1.0 / Versionsangaben) als Fehler an. Behebe dies mit diesem Tool.', 'wpnerd_multilanguage');
$minify_beschreibung = __('Durch das Reduzieren von Ressourcen werden unnötige Byte entfernt, die z. B. aus zusätzlichen Leerzeichen, Zeilenumbrüchen und Einzügen resultieren.', 'wpnerd_multilanguage');
$facebook_pixel_beschreibung = __('Füge ganz einfach den Facebook-Pixel mit deiner ID in deine Seite ein.', 'wpnerd_multilanguage');
$google_analytics_beschreibung = __('Fügt deinen Google Analytics Tracking Code in die Seite ein.', 'wpnerd_multilanguage');
$pixel_check = __('Facebook Pixel aktivieren', 'wpnerd_multilanguage');
$google_check = __('Google Analytics aktivieren', 'wpnerd_multilanguage');
//SSL-Page Strings
$ssl_headline = __('Ein-Klick SSL-Umstellung', 'wpnerd_multilanguage');
$erste_warnung = __('Achtung! Mache vor der Umstellung auf HTTPS unbedingt ein Backup!', 'wpnerd_multilanguage');
$konsole_string = __('Konsole', 'wpnerd_multilanguage');
$home_url_string = __('Aktuelle URL:', 'wpnerd_multilanguage');
$new_url_string = __('Neue URL:', 'wpnerd_multilanguage');
$htaccess_work = __('.htaccess bearbeiten...', 'wpnerd_multilanguage');
$htaccess_finished = __('.htaccess bearbeitet', 'wpnerd_multilanguage');
$no_backup = __('Bitte bestätige das du ein Backup gemacht hast. Der [WP]:NERD übernimmt keine Haftung', 'wpnerd_multilanguage');
$site_is_ssl = __('Deine Seite ist bereits auf SSL umgestellt.', 'wpnerd_multilanguage');
$backup_check = __('Ja, ich habe ein Backup gemacht.', 'wpnerd_multilanguage');
$go_for_it = __('Jetzt auf HTTPS umstellen!', 'wpnerd_multilanguage');
$not_possible = __('Umstellung nicht möglich!', 'wpnerd_multilanguage');
$second_warning = __('Deine Seite ist bereits auf HTTPS umgestellt.
				Dir wird kein grünes Schloss angezeigt, oder es gibt andere Probleme mit deinem Zertifikat?
				Hier findest du ein Tutorial um deine Seite manuell auf HTTPS umzustellen.', 'wpnerd_multilanguage');
$tutorial = __('Zum Tutorial', 'wpnerd_multilanguage');

$query_posts = __('$WPNERD: Posts Tabelle bearbeitet.', 'wpnerd_multilanguage');
$query_postmeta = __('$WPNERD: Post_Meta Tabelle bearbeitet.', 'wpnerd_multilanguage');
$query_options = __('$WPNERD: Options Tabelle bearbeitet.', 'wpnerd_multilanguage');
$query_extern = __('$WPNERD: Externe Bilder bearbeitet.', 'wpnerd_multilanguage');
$externe_bilder = __('Externe Bilder ebenfalls auf https ändern. *Achtung, wenn externe Bilder nicht unter https erreichbar sind, werden sie nicht angezeigt.', 'wpnerd_multilanguage');

$ssl1 = __('Was ist eigentlich SSL?', 'wpnerd_multilanguage');
$ssl2 = __('Brauche ich SSL?', 'wpnerd_multilanguage');
$ssl3 = __('Muss ich vor der Umstellung etwas beachten?', 'wpnerd_multilanguage');
$was_ist_ssl = __('SSL ist ein Verschlüsselungsprotokoll, mit dem ein sicherer Übertragungskanal für verschiedene Anwendungen zur Verfügung gestellt werden kann. Benutzt wird dies zum Beispiel für HTTPS (Webbrowser), SMTPS (Mail-Versand), POP3S (Mail-Empfang) und vieles weitere.', 'wpnerd_multilanguage');
$brauche_ich_ssl = __('Kurz und Knapp brauchst du SSL immer wenn du Daten von Usern überträgst. Sei es die Mail-Adresse in Blog-Kommentaren, ein Kontaktformular oder in einem Bestellvorgang. Google registriert dies beim Ranking auch.', 'wpnerd_multilanguage');
$vor_der_umstellung = __('Du solltest vor der Umstellung bereits ein Zertifikat angelegt haben, dies machst du bei deinem Hoster.');
$ssl_finished =__('$WPNERD: Umstellung erledigt.', 'wpnerd_multilanguage');

// Backup Page
$backup_beschreibung = __('Erstelle mit einem Klick ein Backup deiner kompletten Seite . Das Backup findest du in deinem /wp-content/uploads/ Ordner, oder auf deinem FTP-Server, wenn die Funktion aktiviert ist.', 'wpnerd_multilanguage');
$upload_write = __('Uploads-Verzeichnis ist beschreibbar!', 'wpnerd_multilanguage');
$upload_not_write = __('Uploads-Verzeichnis ist nicht beschreibbar!', 'wpnerd_multilanguage');
$backup_beschreibung_string = __('Aktiviere das wöchentliche Backup deiner Seite.', 'wpnerd_multilanguage');
$a_backups_aktivieren = __('Wöchentliche Backups aktivieren', 'wpnerd_multilanguage');
$backup_beschreibung2 = __('Erstelle sofort ein Backup oder plane regelmäßige Backups.', 'wpnerd_multilanguage');
$jetzt_backup = __('Jetzt Backup erstellen', 'wpnerd_multilanguage');
$jetzt_backup_button = __('Los!', 'wpnerd_multilanguage');
$backup_auto = __('Backup automatisieren', 'wpnerd_multilanguage');
$backup_auto_button = __('Speichern', 'wpnerd_multilanguage');
$file_permissin = __('Verzeichnis Überprüfung', 'wpnerd_multilanguage');
$root_ordner = __('Root-Ordner', 'wpnerd_multilanguage');
$upload_permission = __('Backup-Verzeichnis beschreibbar?', 'wpnerd_multilanguage');
$wpnerd_backup_options = __('Backup Optionen', 'wpnerd_multilanguage');
$Verzeichnispfad = __('Verzeichnispfad', 'wpnerd_multilanguage');
$vbeispiel = __('Verzeichnispfad Beispiel: "backup/meine-Seite/". Das Verzeichnis muss auf dem Sever vorhanden sein.', 'wpnerd_multilanguage');
$uebertragung_aktivieren = __('FTP-Übertragung aktivieren', 'wpnerd_multilanguage');
$backups_loeschen = __('Backup aus "/uploads" löschen*', 'wpnerd_multilanguage');
$uebertragung_info = __('Übertrage dein Backup auf einen anderen FTP-Server, oder erstelle einen FTP-User auf deinem Server, der nur Zugriff auf ein Verzeichnis ohne Domainzugriff hat.', 'wpnerd_multilanguage');
$option_warning = __('* Du solltest diese Option nur wählen, wenn du dein Backup via FTP zu einem anderen Ort transferierst.', 'wpnerd_multilanguage');
?>