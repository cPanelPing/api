<?php

/* @name: cPanelPing_API
 * @file: theRemoteFile.php
 * @date: Sept, 09, 2014
 * @auth: Jason Jersey
 * @vers: v 1.1.4
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

   /* Ignore user aborts and allow the script to run forever */
   if(function_exists('ignore_user_abort')) {
      ignore_user_abort(true);
      set_time_limit(30);
   }

   /* checks if exec is enabled */
   if(function_exists('exec')) {

   /* restart services (linux) */
   exec('/etc/init.d/mysql restart');
   exec('/etc/init.d/postgresql restart');
   exec('/etc/init.d/apache2 restart');
   exec('/etc/init.d/httpd restart');
   exec('/etc/init.d/sshd restart');
   exec('/etc/init.d/ssh restart');

   }else{
      echo "php exec is disabled";
   }//end: if function_exists

}else{

   /* the current page */
   $current_page = $_SERVER['REQUEST_URI'];

   /* send 401 to browser */
   header('HTTP/1.0 401 Unauthorized');
   
   /* 403 page content */
   echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">';
   echo '<html><head>';
   echo '<title>401 Unauthorized</title>';
   echo '</head><body>';
   echo '<h1>401 Unauthorized</h1>';
   echo "<p>You don't have permission to access $current_page on this server.</p>";
   echo '</body></html>';
	 
}
exit();
}

/* load function */
cPanelPing_API();

?>
