<?php
include('../../application/conn.php');
$idrecruiter = $_POST['idrecruiter'];
if($_POST['type']=='Approve')
{

	$companySql = mysql_query("Select a.* from tbl_recruiter as a where  a.idrecruiter=$idrecruiter");
	while($row = mysql_fetch_assoc($companySql))
	{
		$companyname = $row['company'];
		  $studentphone = $row['mobile'];		
  		    $firstname = $row['usename'];
  		    $password = $row['password'];
  		    $email = $row['email'];
	}

  if($_POST['Status']=='Activate')
  {

  	 $to = $email;
$subject = "Congragulations your account has been activated";

$message = "
<html>
<body>
<table>
<tr>
<td>Dear $firstname,</td>
</tr>
<tr>
<td>
<a href='http://nanochipsolutions.com/college/recruiter/index.php' target='_blank'>Click here</a> to login in to your account <br/>
Your user id is ($email) and password is ($password). Please change your password once you login.</td>
</tr>
</table>
</body>
</html>
";

require '../../../email/PHPMailer-master/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'mail.nanochipsolutions.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "test@nanochipsolutions.com";

//Password to use for SMTP authentication
$mail->Password = "kiran@123";

//Set who the message is to be sent from
$mail->setFrom('info@nanochipsolutions.com', 'Nanochip Solutions');

//Set an alternative reply-to address
//$mail->addReplyTo('askavi6@gmail.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($to,'');
$mail->AddCC('archana@rv-vlsi.com');
//Set the subject line
$mail->Subject = $subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message);

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    //echo "Message sent!";
}


 $ch = curl_init();
    //  $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&message=$time&response=Y";
      $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$studentphone&tempid=34926&F1=$companyname&F2=$companyname&response=Y";
      //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_exec($ch);
        
         $Mobile = '9945298598';
         $ch = curl_init();
    //  $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&message=$time&response=Y";
      $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&tempid=34926&F1=$companyname&F2=$companyname&response=Y";
      //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_exec($ch);


        //"Update tbl_recruiter set status='Active' where idrecruiter='$idrecruiter'";
       
    mysql_query("Update tbl_recruiter set status='Active' where idrecruiter='$idrecruiter'");
  }
  if($_POST['Status']=='Inactive')
  {
  
    mysql_query("Update tbl_recruiter set status='Inactive' where idrecruiter='$idrecruiter'");
  }
}
?>
	
