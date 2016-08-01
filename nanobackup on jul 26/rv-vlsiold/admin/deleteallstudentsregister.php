<?php
  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
	session_start();
$result	=	mysql_query("delete from tbl_registerstudents where idregisterstudents>0");

header("Location:admin_manage_registers.php");exit;
 ?>
  