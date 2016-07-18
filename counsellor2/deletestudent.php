<?php
include('../application/conn.php');
$idstudent = $_POST['idstudent'];
mysql_query("Delete from tbl_rvstudent where idrvstudent='$idstudent'");

?>