<?php
include('../../application/conn.php');
error_reporting(-1);

$idrecruitementresumes = $_POST['idrecruitementresumes'];


    mysql_query("Delete from tbl_recruitementresumes where idrecruitementresumes='$idrecruitementresumes'");
  
?>
    
