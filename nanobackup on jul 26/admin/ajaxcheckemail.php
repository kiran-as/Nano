<?php
 include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php');  
	//include_once('../classes/recruiter.class.php');  
	   
	$input=new inputFields();	
	$ch=new checkInputFields();	
	$db=new dataBase();
	$rec = new recruiter();
	$db->connectDB(); 
     $email=$_GET['email'];
     $idrecruiter=$_GET['idrecruiter'];
	 $selectquery = mysql_query("Select * from rv_recruiters where r_email ='$email' and r_id !='$idrecruiter'");
	 
	 $resultofemail = mysql_fetch_assoc($selectquery);
	 

	if(count($resultofemail)<8)
	{
	  echo "2";
	 }
	 else
	 {
	   echo "1";
	 }
	 
?>
