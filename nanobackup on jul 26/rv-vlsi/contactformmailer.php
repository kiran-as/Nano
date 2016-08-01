<?php
		include("application/conn.php");
include('detect.php');			  
                      
					  
                      
                $name=$_POST['scont_name'];
				$mobile=$_POST['scont_mobile'];
                $email=$_POST['scont_email'];
                $msg=$_POST['scont_msg']; 
   			    $subject='Contact Information for :'.$name;
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
				$headers .= 'From: RV-VLSI <info@rv-vlsi.com>';
	$time=mktime();
						$ip=$_SERVER['REMOTE_ADDR'];
$strOccupation='';
$strOrg='';
$strAddress='';
$strComments=$msg;
mysql_query("insert into rv_contact_enq(ce_name,ce_phone,ce_email,ce_occupation,
ce_institution,ce_address,ce_comments,ce_date,ce_ip) values(
'".addslashes($name)."','".addslashes($mobile)."','".addslashes($email)."','".addslashes($strOccupation)."','".addslashes($strOrg)."','".addslashes($strAddress)."','".addslashes($strComments)."','".$time."','".$ip."')") or die(mysql_error());

$body ="<table width='100%'><tr><td>Name:</td><td>$name</td>
<tr><td>Mobile:</td><td>$mobile</td></tr>
<tr><td>Email:</td><td>$email</td></tr>
<tr><td colspan='2'><br><br>We have recieved your <b>Comments/Questions.</b><br><br>Thank you for your interest in RV-VLSI.<br>Due to unusually high call volume and emails to RV-VLSI, our reply to your email might be delayed.<br> Kindly bear with us<br>
In the mean time you may also contact us at 080-40788574 or email us to info@rv-vlsi.com.</td></tr></table>";	
mail($email,$subject,$body,$headers); 
mail('info@rv-vlsi.com',$subject,$body,$headers);
echo "<script>alert('Thanks for contacting RV-VLSI');</script>";
echo "<script>parent.location='contact-us.php'</script>";
exit;                           
																			
    
					 
                      ?>
