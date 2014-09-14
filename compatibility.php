<?php

/* @name: Compatibility_PHP
 * @file: compatibility.php
 * @date: Sept, 14, 2014
 * @auth: Jason Jersey
 * @vers: v 1.0
 */
 
/* THERE IS NO WARRANTY FOR THIS SOFTWARE, TO THE EXTENT PERMITTED BY APPLICABLE LAW. EXCEPT 
 * WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE 
 * SOFTWARE "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, 
 * BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A 
 * PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE SOFTWARE IS 
 * WITH YOU. SHOULD THE SOFTWARE PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY 
 * SERVICING, REPAIR OR CORRECTION.
 */

function Compatibility_PHP() {
   /* checks if exec is enabled */
   if(function_exists('exec')) {
      echo "php exec is enabled";
   }else{
      echo "php exec is disabled";
   }//end: if function_exists 
exit();
}

/* load function */
Compatibility_PHP();

?>
