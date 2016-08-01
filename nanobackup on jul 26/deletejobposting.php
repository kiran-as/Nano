<?php
include_once('db/dbconfig.php');
include_once('classes/dataBase.php');
include_once('classes/checkInputFields.php');
include_once('classes/checkingAuth.php');
include_once('classes/inputFields.php');
include_once('classes/messages.php');  

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   $jpid = $_GET['jpid'];
 $result	=	mysql_query("Delete from rv_job_posting where jp_id=".$jpid);

header("Location:dashboard.php");exit;
 ?>
  