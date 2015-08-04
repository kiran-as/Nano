<?php
include('../../application/conn.php');
error_reporting(-1);

$idrecruiter = $_POST['idrecruiter'];
if($_POST['type']=='Approve')
{

	$companySql = mysql_query("Select * from tbl_recruiter as a where  a.idrecruiter=$idrecruiter");
	while($row = mysql_fetch_assoc($companySql))
	{
		$companyname = $row['company'];
		  $studentphone = $row['mobile'];		
  		    $firstname = $row['usename'];
	}

  if($_POST['Status']=='Activate')
  {
  	

		/*	$xml_data ='<?xml version="1.0"?><smslist><sms><user>ashokks</user><password>123456</password>
			<message>Dear '.$firstname.', your portal has been activated in Nanochipsolutions</message>
			<mobiles>9538130954</mobiles>
			<senderid>HLCabs</senderid>
			</sms></smslist>';  
			//echo $xml_data;
			$URL = "http://sms.jootoor.com/sendsms.jsp?"; 

			$ch = curl_init($URL);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			print_r($output);
			curl_close($ch); */

    mysql_query("Update tbl_recruiter set status='Active' where idrecruiter='$idrecruiter'");
  }
  if($_POST['Status']=='Inactive')
  {
  
    mysql_query("Update tbl_recruiter set status='Inactive' where idrecruiter='$idrecruiter'");
  }
}
?>
	