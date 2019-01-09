<?php
//Trimmar strings för att användaren skall kunna använda sig av svenska tecken. 
function trim_string($str) {
  $str = str_replace("å", "&aring;", $str);
  $str = str_replace("ä", "&auml;", $str);
  $str = str_replace("ö", "&ouml;", $str);
  $str = str_replace("Å", "&Aring;", $str);
  $str = str_replace("Ä", "&Auml;", $str);
  $str = str_replace("Ö", "&Ouml;", $str);
  $str = strip_tags($str);
  $str = nl2br($str);
  return $str;
}	

//Kopplar upp och loggar in på server. 
$servername = "localhost";
$username = "s153594";
$password = "amemSmSN";
$dbname = "s153594";

$dbcon = mysqli_connect($servername, $username, $password, $dbname);
if (!$dbcon) {
die("Connection failed: " . mysqli_connect_error());
					}
					


					

?>