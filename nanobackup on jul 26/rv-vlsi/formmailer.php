<?php

	include("application/conn.php");
include('detect.php');	
                        $name=$_POST['scont_name'];
						$mobile=$_POST['scont_mobile'];
                        $email=$_POST['scont_email'];
                      	$city=$_POST['scont_city'];
						$state=$_POST['scont_state'];
						$country=$_POST['scont_country']; 
						$msg=$_POST['scont_msg']; 
						$be=$_POST['be']; 
						$me=$_POST['me']; 
					    $others=$_POST['others']; 
						$ind=$_POST['ind']; 
						if($be=='')
						{
						  $be = 'Not Specified';
						}
						if($me=='')
						{
						  $me = 'Not Specified';
						}
						if($others=='')
						{
						  $others = 'Not Specified';
						}
						if($ind=='')
						{
						  $ind = 'Not Specified';
						}
						$time=mktime();
						$ip=$_SERVER['REMOTE_ADDR'];
mysql_query("insert into tbl_registermoreinfostudents(name,mobile,email,be,
me,others,ind,msg,updatetime,ip,city,state,country) values(
'".addslashes($name)."','".addslashes($mobile)."','".addslashes($email)."','".addslashes($be)."','".addslashes($me)."','".addslashes($others)."','".addslashes($ind)."','".$msg."','".$time."','".$ip."','".$city."','".$state."','".$country."')") or die(mysql_error());						
    $to =$email; 
    $subject = 'Thanks for Registering with RV-VLSI';
	$message = "<table><tr><td colspan='2'>Thank you for registering with RV-VLSI, We will get back to you soon</td></tr><tr><td>Studentname</td><td>$name</td></tr>
	<tr><td>Mobile</td><td>$mobile</td></tr>
	<tr><td>Email</td><td>$email</td></tr>
	<tr><td>B.E</td><td>$be</td></tr>
	<tr><td>M.E</td><td>$me</td></tr>
	<tr><td>Others</td><td>$others</td></tr>
	<tr><td>Industry exp</td><td>$ind</td></tr>
	<tr><td>Message</td><td>$msg</td></tr>
	<tr><td><br/></td></tr>
	<tr><td colspan='2'><b>We thank you for your interest in RV-VLSI. Our person will contact you shortly.<br>
In case you don’t hear from us with-in next 24 hours, it might be Due to unusually high call volume and emails to RV-VLSI, please do contact us at 080-40788574 or email us to info@rv-vlsi.com.</b></td></tr></table>";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
	$headers .= 'From: RV-VLSI <info@rv-vlsi.com>';
	$time=mktime();
	$ip=$_SERVER['REMOTE_ADDR'];
    mail($to,$subject,$message,$headers);
   mail('info@rv-vlsi',$subject,$message,$headers);
	

                             echo "<script>							
										history.go(-1);	
														
                            		  alert('Thanks For Contacting us,We will get back to you soon!!');
									   
									    </script>"													;
																			
                  
					 
                      ?>
