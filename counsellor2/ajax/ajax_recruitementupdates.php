<?php
include('../../application/conn.php');
error_reporting(-1);

$idrecruitement = $_POST['idrecruitement'];
if($_POST['type']=='Approve')
{

	$companySql = mysql_query("Select * from tbl_recruiter as a, tbl_recruitement as b
		                       where a.idrecruiter=b.idrecruiter and b.idrecruitement=$idrecruitement");
	while($row = mysql_fetch_assoc($companySql))
	{
		$companyname = $row['company'];
	}
  if($_POST['Status']=='UnApprove')
  {
  	$studentSql = mysql_query("Select * from tbl_student as a, tbl_recruitementresumes as b
  		                       where a.idstudent=b.idstudent and b.idrecruitement=$idrecruitement");
  	while($row = mysql_fetch_assoc($studentSql))
  	{
  		    $studentphone = $row['mobile'];		
  		    $firstname = $row['firstname'];
  		   
			$xml_data ='<?xml version="1.0"?><smslist><sms><user>ashokks</user><password>123456</password>
			<message>Dear '.$firstname.', your resume has been shortlisted in '.$companyname.', All the best RV-VLSI</message>
			<mobiles>'.$studentphone.'</mobiles>
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
			curl_close($ch); 
  	}
    mysql_query("Update tbl_recruitement set status='Close' where idrecruitement='$idrecruitement'");
  }
  if($_POST['Status']=='Approve')
  {
    mysql_query("Update tbl_recruitement set status='Open' where idrecruitement='$idrecruitement'");
  }
}
?>
	