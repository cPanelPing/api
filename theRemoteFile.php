<?php

/* @name: cPanelPing_API
 * @file: theRemoteFile.php
 * @date: Sept, 09, 2014
 * @auth: Jason Jersey
 * @vers: v 1.1.2
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
	
   /* send 200 ok to browser */
   header('HTTP/1.0 200 OK');	

   /* Ignore user aborts and allow the script to run forever */
   if(function_exists('ignore_user_abort')) {
      ignore_user_abort(true);
      set_time_limit(60);
   }

   /* checks if exec is enabled */
   if(function_exists('exec')) {

   /* set variables */
   $check_mysql = exec('/etc/init.d/mysql restart');
   $check_postgresql = exec('/etc/init.d/postgresql restart');
   $check_apached = exec('/etc/init.d/apache2 restart');
   $check_apache = exec('/sbin/service apache2 restart');
   $check_httpd = exec('/etc/init.d/httpd restart');
   $check_sshd = exec('/etc/init.d/sshd restart');
   $check_ssh = exec('/etc/init.d/ssh restart');
   $check_ssh_rcd = exec('/etc/rc.d/sshd restart');

   /* check mysql */
   if ($check_mysql !== false) {
      exec('/etc/init.d/mysql restart');
      echo "/etc/init.d/mysql restart<br>";
   }

   /* check postgresql  */
   if ($check_postgresql !== false) {
      exec('/etc/init.d/postgresql restart');
      echo "/etc/init.d/postgresql restart<br>";
   }

   /* check apache */
   if ($check_apached !== false) {
      exec('/etc/init.d/apache2 restart');
      echo "/etc/init.d/apache2 restart<br>";
   }

   /* check apache alt */
   if ($check_apache !== false) {
      exec('/sbin/service apache2 restart');
      echo "/sbin/service apache2 restart<br>";
   }

   /* check httpd */
   if ($check_httpd !== false) {
      exec('/etc/init.d/httpd restart');
      echo "/etc/init.d/httpd restart<br>";
   }

   /* check sshd */
   if ($check_sshd !== false) {
      exec('/etc/init.d/sshd restart');
      echo "/etc/init.d/sshd restart<br>";
   }

   /* check ssh */
   if ($check_ssh !== false) {
      exec('/etc/init.d/ssh restart');
      echo "/etc/init.d/ssh restart<br>";
   }

   /* check ssh rc.d */
   if ($check_ssh_rcd !== false) {
      exec('/etc/rc.d/sshd restart');
      echo "/etc/rc.d/sshd restart<br>";
   }

   }else{
      echo "php exec is disabled";
   }//end: if function_exists

}else{

   /* the current page */
   $current_page = $_SERVER['REQUEST_URI'];

   /* send 403 error to browser */
   header('HTTP/1.0 401 Unauthorized');
   
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
