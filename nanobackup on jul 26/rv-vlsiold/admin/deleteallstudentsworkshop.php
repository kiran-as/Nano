<?php
  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
	session_start();
$result	=	mysql_query("delete from tbl_registerfreeworkshop where idregisterfreeworkshop>0");

header("Location:admin_manage_workshop.php");exit;
 ?>
  