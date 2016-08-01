
<?php
					  
                    

                        $name=$_POST['cont_name'];
						$mobile=$_POST['cont_mobile'];
                        $email=$_POST['cont_email'];
                      	$ip = $_SERVER["REMOTE_ADDR"];
                        $message = "Message sent from IP : $ip\n\n" . $message;
                        
                         require("class.phpmailer.php");
						
						
						if($name== '')   
                        {
					  echo "Please enter your name.<br>";
                        return false;
                        }
					
               $string_exp = "/^[a-z][a-z ]*$/i";
            if(!preg_match($string_exp,$name)) {
               echo 'The Name you entered does not appear to be valid.<br>';
                 return false;
				    } 


 	if($mobile=='')   
                        {
					  echo "Please enter your Mobile Number.<br>";
                        return false;
                        }
					
               $mobile_exp = "/^[7-9][0-9]{9}$/";
              if(!preg_match($mobile_exp,$mobile)) {
               echo 'The Mobile Number you entered does not appear to be valid.<br>';
                   return false;
				    } 
					
   
   if($email=='')   
                        {
					  echo "Please enter your email.<br>";
                        return false;
                        }
					
               $email_exp = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";
              if(!preg_match($email_exp,$email)) {
               echo 'The Email you entered does not appear to be valid.<br>';
                return false;
				    } 



		
						
                        //Third Party
                            $to=$email;
                            $mailer = new PHPMailer();
                            $mailer->IsSMTP();
                            //$mailer->SMTPSecure ='ssl';
                            $mailer->Host ='mail.mahahost.in';
                            $mailer->SMTPAuth =TRUE;
                            $mailer->Username ='test@mahahost.in';  
                            $mailer->Password ='test!345';  
                            $mailer->From ='test@mahahost.in';
							$mailer->FromName ="admin"; 
							$mailer->IsHTML(true); 
							$mailer->AddAttachment("8-pages-booklet-brochure.pdf"); 
                            $email_subject="Thanks for downloading brochure from RV-VLSI !!";     
                            $email_body="
                            <p>Thanks for downloading brochure from RV-VLSI!!</p>
							<p>Phone : 080-43534444/080-26322271</p>
							<p>Regards</p>						
							";

							 
                           
                            
                            $mailer->Body =$email_body;
                            $mailer->Subject =$email_subject;
                            $mailer->AddAddress($email);
                            $mailer->Send();
                            
                            //Admin
                            
                            $mailer1 = new PHPMailer();
                            $mailer1->IsSMTP();
                            //$mailer->SMTPSecure ='ssl';
                            $mailer1->Host ='mail.mahahost.in';
                            $mailer1->SMTPAuth =TRUE;
                            $mailer1->Username ='test@mahahost.in';  
                            $mailer1->Password ='test!345';  
                            $mailer1->From ='test@mahahost.in';
                            $mailer1->FromName =$name; 
                            $mailer1->IsHTML(true); 
                            
                               $email_subject=" New Enquiry for downloading brochure";     
                               $email_body="
                              Dear Admin,
							  $name  has  downloaded the brochure,
							  Details are as follows
							  Email:$email
							  Mobile No.:$mobile
                              Regards,
                           	  Webmaster,
                              $message
                              ";
                            $mailer1->Body =nl2br($email_body);
                            $mailer1->Subject =$email_subject;
                            
                             //TO
                           $to_admin="menaka.hn@radical.co.in";
                            $recipients_to1=explode(",",$to_admin);
                             foreach($recipients_to1 as $email1)
                            {
                              $mailer1->AddAddress($email1);
                            }
                            
                            //Cc
                         // $cc_address="bookings@amanvanaspa.com";
							//$cc_address="pn.bala@radical.co.in";
							//$cc_address="sunil@radical.co.in";
							
							//$bcc_address="priyadharsini.n@radical.co.in";
                           
                         
						  
						//   $mailer1->AddCC($cc_address);
                            
                        //    $mailer1->AddBCC($bcc_address);
                            
                            if(!$mailer1->Send())
                            {
                               echo "Message was not sent<br/ >";
                               echo "Mailer Error: " . $mailer1->ErrorInfo;
                            }
                            else
                            { 
                             echo "<script>	
								  alert('Prospectus is mailed to your Email-Id!!');
									history.go(-1);	
										
		   						    </script>";
										
									                   }
					 
                      ?>
