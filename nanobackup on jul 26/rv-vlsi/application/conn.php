<?php
/*
$dbuser="root";
$dbpass="";
$dbname="labmanager";  //the name of the database
$chandle = mysql_connect("localhost", $dbuser, $dbpass) 
    or die("Connection Failure to Database");
mysql_select_db($dbname, $chandle) or die ($dbname . " Database not found. " . $dbuser);

*/
$dbuser="rvvlsi_user";
$dbpass="Rvvlsi$";
$dbname="rvvlsi_rvvlsi";  //the name of the database
$chandle = mysql_connect("localhost", $dbuser, $dbpass) 
    or die("Connection Failure to Database");
mysql_select_db($dbname, $chandle) or die ($dbname . " Database not found. " . $dbuser);
?>
