<?php
   include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
	session_start();
$result	=	mysql_query("delete from tbl_programcalendar where idprogramcalendar=".$_GET['idprograms']);


header("Location:admin_programe_calendar.php");exit;
 ?>
  