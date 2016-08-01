<?php  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php');  


	$db=new dataBase();
   $db->connectDB(); 
   $jpid = $_GET['jpid'];
     $recruiter = $_GET['recruiter'];

 $result	=	mysql_query("Delete from rv_job_posting where jp_id=".$jpid);
echo "<script>parent.location = 'admin_manage_jobposting.php?idrecruiter=$recruiter';</script>";	
exit;
 ?>
  