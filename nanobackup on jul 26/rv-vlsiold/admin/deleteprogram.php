<?php
  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
	session_start();
$result	=	mysql_query("delete from tbl_programs where idprograms=".$_GET['idprograms']);

header("Location:admin_manage_programs.php");exit;
 ?>
  