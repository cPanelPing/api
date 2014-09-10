<?php

/* @name: cPanelPing_API
 * @file: theRemoteFile.php
 * @date: Sept, 09, 2014
 * @auth: Jason Jersey
 * @vers: v 1.0.0
 */
 
/* THERE IS NO WARRANTY FOR THIS SOFTWARE, TO THE EXTENT PERMITTED BY APPLICABLE LAW. EXCEPT 
 * WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE 
 * SOFTWARE "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, 
 * BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A 
 * PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE SOFTWARE IS 
 * WITH YOU. SHOULD THE SOFTWARE PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY 
 * SERVICING, REPAIR OR CORRECTION.
 */

function cPanelPing_API() {

/* authentication */
$key = 'YOUR_API_KEY_GOES_HERE';
$secret = 'YOUR_API_SECRET_GOES_HERE';

/* checks if authorized */
if (stripos($_SERVER['REQUEST_URI'], "?key=$key?secret=$secret")){

/* check if we can do */
$check_mysql = exec('/etc/init.d/mysql restart');
$check_apache = exec('/sbin/service apache2 restart');

/* check mysql */
if ($check_mysql !== false) {
   /* run mysql command */
   exec('/etc/init.d/mysql restart');
   echo "Ran exec() mysql restart command.<br>";
} else {
   /* run alt mysql command */
   system('net stop "MySQL"');
   system('net start "MySQL"');
   echo "Ran system() mysql restart command.";
}

/* check apache */
if ($check_apache !== false) {
   /* run apache command */
   exec('/sbin/service apache2 restart');
   echo "Ran exec() apache restart command.";
}

}else{

   /* the current page */
   $current_page = $_SERVER['REQUEST_URI'];

   /* send 403 error to browser */
   header('HTTP/1.0 403 Forbidden');
   
   /* 403 page content */
   echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">';
   echo '<html><head>';
   echo '<title>403 Forbidden</title>';
   echo '</head><body>';
   echo '<h1>403 Forbidden</h1>';
   echo "<p>You don't have permission to access $current_page on this server.</p>";
   echo '<p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p>';
   echo '</body></html>';
	 
}
exit();
}

/* load function */
cPanelPing_API();

?>
