<?php
$username = "root";
$password = "password";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

mysql_select_db("college",$dbhandle) 
  or die("Could not select College");
session_start();
?>