<?php

 $name=$_POST['cont_name'];
						$mobile=$_POST['cont_mobile'];
                        $email=$_POST['cont_email'];
    $to =$email; 
    $subject = 'Requesting for Prospectus';
	$message = "<table><tr><td colspan='2'>Thank you for registering with RV-VLSI, </td></tr><tr><td>Dear</td><td>$name</td></tr>
	
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