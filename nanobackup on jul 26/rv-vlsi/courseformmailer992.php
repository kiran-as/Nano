<?php
		include("application/conn.php");
                      
					  
                      
                        $name=$_POST['cont_name992'];
						$mobile=$_POST['cont_mobile992'];
                        $email=$_POST['cont_email992'];
						$course = $_POST['course_name992'];
						$upddatetime=mktime();
						$ip=$_SERVER['REMOTE_ADDR'];
						$subject='Register for '.$course;
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
				$headers .= 'From: RV-VLSI <info@rv-vlsi.com>';
				
  mysql_query("insert into tbl_courseenquiries(coursename,name,mobile,email,upddatetime,ip) values('".addslashes($course)."',
'".addslashes($name)."','".addslashes($mobile)."','".addslashes($email)."','".$upddatetime."','".$ip."')") or die(mysql_error());      


$body ="<table width='100%'><tr><td>Dear $name</td>
<tr><td colspan='2'>
Congratulation for registering to '$course' !<br>
 
An RV-VLSI counselor will call you shortly to complete the admission process and
enroll you into your chosen batch</td></tr></table>";	
mail($email,$subject,$body,$headers); 
mail('info@rv-vlsi.com',$subject,$body,$headers);
              
echo "<script>alert('Thanks for Registering for the course');</script>";
echo "<script>parent.location='courses.php'</script>";
exit; 													;
																			

                      ?>
