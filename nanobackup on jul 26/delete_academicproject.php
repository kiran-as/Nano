<?php
include('application/conn.php');
$idacademicproject = $_POST['idacademicproject'];
mysql_query("Delete from tbl_academicproject where idacademicproject='$idacademicproject'");

?>