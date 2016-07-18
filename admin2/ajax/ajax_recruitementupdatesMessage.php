<?php

include('../../application/conn.php');

include("../library/mpdf60/mpdf.php"); /* MPDF library ); */
require '../../../email/PHPMailer-master/PHPMailerAutoload.php';

function departmentname ($idDepartment)
{
    $departmentSql = mysql_query("Select * from tbl_department where iddepartment=$idDepartment");
    while ($row = mysql_fetch_assoc($departmentSql)) {
	$departmentName = $row['department'];
    }
    return $departmentName;
}

function pgDipCourse ($idpgdipcourses)
{
    $departmentSql = mysql_query("Select * from tbl_pgdipcourses where idpgdipcourses=$idpgdipcourses");
    while ($row = mysql_fetch_assoc($departmentSql)) {
	$pgdip_coursename = $row['pgdip_coursename'];
    }
    return $pgdip_coursename;
}

$idrecruitement = $_POST['idrecruitement'];
$rejectreason = $_POST['rejectreason'];
$cnt = 0;
$companySql = mysql_query("Select a.*,b.excelfilename,b.recruitementposition,b.jobcode from tbl_recruiter as a, tbl_recruitement as b
                           where a.idrecruiter=b.idrecruiter and b.idrecruitement=$idrecruitement");
    while ($row = mysql_fetch_assoc($companySql)) {
  $companyname = $row['company'];
  $recruiterName = $row['usename'];
  $jobcode = $row['jobcode'];
  $recruiterEmail = $row['email'];
  $recruitementposition = $row['recruitementposition'];
  $jobcode = $row['jobcode'];
  $excelfilename = $row['excelfilename'];

}


if($_POST['type'] == 'Approve') {

    $companySql = mysql_query("Select a.*,b.excelfilename,b.recruitementposition,b.jobcode from tbl_recruiter as a, tbl_recruitement as b
		                       where a.idrecruiter=b.idrecruiter and b.idrecruitement=$idrecruitement");
    while ($row = mysql_fetch_assoc($companySql)) {
	$companyname = $row['company'];
	$recruiterEmail = $row['email'];
	$recruiterName = $row['usename'];
	$jobcode = $row['jobcode'];
  $excelfilename = $row['excelfilename'];
    }
$cn=0;
    if ($_POST['Status'] == 'Review') {

       if(empty($excelfilename)) {
            echo 'empty';
      } else {
      sendReviewEmail($companyname,$recruitementposition,$jobcode,$recruiterName);
    	mysql_query("Update tbl_recruitement set status='Review' where idrecruitement='$idrecruitement'");
    }
    }

    if ($_POST['Status'] == 'Generate') {
        $studentSql = mysql_query("Select * from tbl_student as a, tbl_recruitementresumes as b
                                   where a.idstudent=b.idstudent and b.idrecruitement=$idrecruitement");
        while ($row = mysql_fetch_assoc($studentSql)) {
        $cn++;
        $studentphone = $row['mobile'];
        $firstname = $row['firstname'];
        $email = $row['email'];
        $idstudent = $row['idstudent'];
        $rvvlsiid = $row['rvvlsiid'];
        $mpdf = new mPDF();
       
        generate_resume(
          $idstudent,
          $jobcode,
          $mpdf);
        }
       mysql_query("Update tbl_recruitement set status='Generate' where idrecruitement='$idrecruitement'");
    }
    
    if($_POST['Status'] == 'Reject') {
      mysql_query("Update tbl_recruitement set status='Open' where idrecruitement='$idrecruitement'");
      sendrejectEmail($companyname,$jobcode,$recruiterName,$rejectreason);
    }
    if($_POST['Status'] == 'Close') {
      

       $studentSql = mysql_query("Select * from tbl_student as a, tbl_recruitementresumes as b
                                   where a.idstudent=b.idstudent and b.idrecruitement=$idrecruitement");
        while ($row = mysql_fetch_assoc($studentSql)) {
        $studentphone = $row['mobile'];
        $firstname = $row['firstname'];
        $email = $row['email'];
        $idstudent = $row['idstudent'];
        $rvvlsiid = $row['rvvlsiid'];
      
        sendmail($email,$firstname,$studentphone,$companyname);
      }
     mysql_query("Update tbl_recruitement set status='Close' where idrecruitement='$idrecruitement'");
     sendApprovedEmailForRecruiter($recruiterEmail,$recruitementposition,$recruiterName,$jobcode);
    }
}

function sendReviewEmail($companyname,$recruitementposition,$jobcode,$recruiterName){
$subject = "Review the Resumes attached for the job position: $recruitementposition";
        $message = "
        <html>
        <body>
        <table>
        <tr>
        <td>Dear Sir,</td>
        </tr>
        <tr>
        <td>Resumes has been tagged for the jobcode :$jobcode, Please login to the portal (<a href='nanochipsolutions.com/college/admin/index.php' target='_blank'>Click Here to login)</a>. Once you login please click on the menu 'Review - Job Opening' and approve/reject the 
            Job position: $recruitementposition, of company: $companyname</td>
        </tr>
        <tr>
        <td>Thank you <br/>
             Recruitement Advisor <br/>
             Nanochip Solutions</td>
        </tr>
        </table>
        </body>
        </html>
        ";

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
   //$to = $recruiterEmail;
  //$to = 'vprasad@nanochipsolutions.com';
  $to = 'askiran123@gmail.com';
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

}


function sendApprovedEmailForRecruiter($recruiterEmail,$recruitementposition,$recruiterName,$jobcode){

   $subject = "Resumes has been attached for the position: $recruitementposition";
        $message = "
        <html>
        <body>
        <table>
        <tr>
        <td>Dear $recruiterName,</td>
        </tr>
        <tr>
        <td>Resumes has been tagged for the jobcode :$jobcode, Please login to the portal (<a href='nanochipsolutions.com/college/recruiter/index.php' target='_blank'>Click Here to login</a>).</td>
        </tr>
        <tr>
        <td>Thank you <br/>
             Recruitement Advisor <br/>
             Nanochip Solutions</td>
        </tr>
        </table>
        </body>
        </html>
        ";

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
$to = $recruiterEmail;
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
}

function sendApprovedEmail($recruitementposition,$recruiterName,$jobcode){

   $subject = "Resumes has been attached for the position: $recruitementposition";
        $message = "
        <html>
        <body>
        <table>
        <tr>
        <td>Dear $recruiterName,</td>
        </tr>
        <tr>
        <td>Resumes has been tagged for the jobcode :$jobcode, Please login to the portal (<a href='nanochipsolutions.com/college/admin/index.php' target='_blank'>Click Here to login</a>.</td>
        </tr>
        <tr>
        <td>Thank you <br/>
             Recruitement Advisor <br/>
             Nanochip Solutions</td>
        </tr>
        </table>
        </body>
        </html>
        ";

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
$to = $recruiterEmail;
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
}

function sendrejectEmail($companyname,$jobcode,$recruiterName,$rejectreason){
    $subject = "Job Position has been rejected for the company : $companyname";
        $message = "
        <html>
        <body>
        <table>
        <tr>
        <td>Dear Archana,</td>
        </tr>
        <tr>
        <td> A job with the jobcode :$jobcode, has been rejected by Admin. Please check the Reject Reason and Submit for the Review.</td>
        </tr>
        <tr>
            <td>Reject Reason: $rejectreason</td>
        </tr>
        <tr>
        <td>Thank you <br/>
             Recruitement Advisor <br/>
             Nanochip Solutions</td>
        </tr>
        </table>
        </body>
        </html>
        ";

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
$to = 'vprasad@nanochipsolutions.com';
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
}
function sendmail($to,$firstname,$studentphone,$companyname) {

$subject = "Your Resume has been tagged for a job opening at  $companyname";
      $message = "
      <html>
      <body>
      <table>
      <tr>
      <td>Dear $firstname,</td>
      </tr>
      <tr>
      <td>Ph:$studentphone, Congragulations, your resume has been tagged for a job opening in ($companyname) stay tuned for more updates from ($companyname).</td>
      </tr>
      <tr>
      <td>Thank you <br/>
           Recruitement Advisor <br/>
           Nanochip Solutions</td>
      </tr>
      </table>
      </body>
      </html>
      ";

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
//$to = 'askiran123@gmail.com';
//Set who the message is to be sent to
$to = 'askiran123@gmail.com';
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
      
$companyname = urlencode($companyname);
    //  $time = urlencode("Congragulations, your resume has been tagged for a job opening in ($companyname) stay tuned for more updates from ($companyname)");
      $ch = curl_init();
      $studentphone = '9538130954';
    //  $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&message=$time&response=Y";
      $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$studentphone&tempid=34761&F1=$companyname&F2=$companyname&response=Y";
      echo $url;
      //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
    curl_exec($ch);

      $Mobile = '9945298598';
    //  $time = urlencode("Congragulations, your resume has been tagged for a job opening in ($companyname) stay tuned for more updates from ($companyname)");
      $ch = curl_init();
    //  $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&message=$time&response=Y";
      $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&tempid=34761&F1=$companyname&F2=$companyname&response=Y";
      //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
    curl_exec($ch);
}
function generate_resume ($idstudent,
	$jobcode,
	$mpdf)
{

    //echo "Select * from tbl_resumekeywords where idresumetype=$idresumeTypes";
    $resumeKeywordsSql = mysql_query("Select * from tbl_resumekeywords ");
    while ($row = mysql_fetch_assoc($resumeKeywordsSql)) {
	$resumeKeyWordsArray[] = $row['keywords'];
    }

//echo "Select * from tbl_student where idstudent='$idstudent'";
    $profileInformationSql = mysql_query("Select * from tbl_student where idstudent='$idstudent'");
    while ($row = mysql_fetch_assoc($profileInformationSql)) {

	$firstName = $row['firstname'];
	$lastName = $row['lastname'];
	$mobileNumber = $row['mobile'];
	$city = $row['city'];
	$country = $row['country'];
	$pincode = $row['pincode'];
	$fatherName = $row['fathername'];
	$datepicker = $row['dob'];
	$gender = $row['gender'];
	$nationality = $row['nationality'];
	$languages = $row['languages'];
	$address = $row['address'];
	$email = $row['email'];
	$career_objective = $row['career_objective'];
	$addressdoorno = $row['addressdoorno'];
	$addresslineone = $row['addresslineone'];
	$addresslinetwo = $row['addresslinetwo'];
	$state = $row['state'];
	$rvvlsiid = $row['rvvlsiid'];
    }


////Academic deeatils//
    $profileInformationSql = mysql_query("Select * from tbl_student where idstudent=$idstudent");
    while ($row = mysql_fetch_assoc($profileInformationSql)) {
	$sslcpassoutyear = $row['sslc_passoutyear'];
	$sslcpercentagetype = $row['sslc_percentagetype'];
	$sslcpercentage = $row['sslc_percentage'];
	$sslcschoolname = $row['sslc_schoolname'];

	$pucpassoutyear = $row['puc_passoutyear'];
	$pucpercentagetype = $row['puc_percentagetype'];
	$pucpercentage = $row['puc_percentage'];
	$pucschoolname = $row['puc_schoolname'];

	$degpassoutyear = $row['deg_passoutyear'];
	$degpercentagetype = $row['deg_percentagetype'];
	$degpercentage = $row['deg_percentage'];
	$degschoolname = $row['deg_schoolname'];
	$degboard = $row['deg_university'];
	$degdepartment = departmentname($row['deg_department']);

	$pgpassoutyear = $row['pg_passoutyear'];
	$pgpercentagetype = $row['pg_percentagetype'];
	$pgpercentage = $row['pg_percentage'];
	$pgschoolname = $row['pg_schoolname'];
	$pgboard = $row['pg_university'];
	$pgdepartment = departmentname($row['pg_department']);


	$pgdippassoutyear = $row['pgdip_passoutyear'];
	$pgdippercentagetype = $row['pgdip_percentagetype'];
	$pgdippercentage = $row['pgdip_percentage'];
	$pgdipschoolname = $row['pgdip_schoolname'];
	$pgdipboard = $row['pgdip_university'];
	$pgdipcourse = pgDipCourse($row['pgdip_coursename']);
	$deg_othercoursename = $row['deg_othercoursename'];
	$pgdip_othercoursename = $row['pgdip_othercoursename'];
	$pg_othercoursename = $row['pg_othercoursename'];
	if ($degdepartment == 'Others') {
	    $degdepartment = $deg_othercoursename;
	}

	if ($pgdepartment == 'Others') {
	    $pgdepartment = $pg_othercoursename;
	}

	if ($pgdipcourse == 'Others') {
	    $pgdipcourse = $pgdip_othercoursename;
	}


	if ($pgdipschoolname == '1') {
	    $pgdipschoolname = 'RV-VLSI Design Center';
	}
	else {
	    $pgdipschoolname = $row['pgdip_otherschools'];
	}

	$deg_projectname = $row['deg_projectname'];
	$deg_projectdescription = $row['deg_projectdescription'];
	$deg_projecttools = $row['deg_projecttools'];
	$deg_projectchallenges = $row['deg_projectchallenges'];

	$pg_projectname = $row['pg_projectname'];
	$pg_projectdescription = $row['pg_projectdescription'];
	$pg_projecttools = $row['pg_projecttools'];
	$pg_projectchallenges = $row['pg_projectchallenges'];
    }


/////////////////$achievementSql = mysql_query("Select * from tbl_achievements where idstudent=$idstudent");
////academic profiles///
    $achievementSql = mysql_query("Select * from tbl_corecompetancy where idstudent=$idstudent");
    $achievementsArray = array();
    $i = 0;
    while ($row = mysql_fetch_assoc($achievementSql)) {
	$achievementsArray[$i]['achievements'] = $row['corecompetancy'];
	$i++;
    }
///////
////academic profiles///
//echo "Select * from tbl_academicproject where idstudent=$idstudent";
    $academicSql = mysql_query("Select * from tbl_academicproject where idstudent=$idstudent");
    $i = 0;
    $academicArray = array();
    while ($row = mysql_fetch_assoc($academicSql)) {
	$academicArray[$i]['project_title'] = $row['project_title'];
	$academicArray[$i]['college_name'] = $row['college_name'];
	$academicArray[$i]['time_duration'] = $row['time_duration'];
	$academicArray[$i]['project_description'] = $row['project_description'];
	$academicArray[$i]['tools_used'] = $row['tools_used'];
	$academicArray[$i]['challenges'] = $row['challenges'];
	$i++;
    }
///////
////academic profiles///
    $companyArraySql = mysql_query("Select * from tbl_companyproject where idstudent=$idstudent");
    $companyArray = array();
    $i = 0;
    while ($row = mysql_fetch_assoc($companyArraySql)) {
	$companyArray[$i]['project_title'] = $row['project_title'];
	$companyArray[$i]['company_name'] = $row['company_name'];
	$companyArray[$i]['time_duration'] = $row['time_duration'];
	$companyArray[$i]['project_description'] = $row['project_description'];
	$companyArray[$i]['tools_used'] = $row['tools_used'];
	$companyArray[$i]['challenges'] = $row['challenges'];
	$i++;
    }
///////
    $address = "";
    if ($addressdoorno != '') {
	$address.= '#' . $addressdoorno . "<br/>";
    }
    if ($addresslineone != '') {
	$address.= $addresslineone . "<br/>";
    }
    if ($addresslinetwo != '') {
	$address.= $addresslinetwo . "<br/>";
    }
    if ($city != '') {
	$address.=$city . "<br/>";
    }
    if ($state != '') {
	if ($pincode != '') {
	    $address.= $state . "-" . $pincode . "<br/>";
	}
	else {
	    $address.=$state . "<br/>";
	}
    }
$table="";
    /**/
    $table = "<table width='100%'>

          <tr>
              <th align='left'>Profile Information</th>
          </tr>
          <tr>
              <td width='40%'><span style='font-weight:bold'>RV-VLSI ID:</span> $rvvlsiid</td>

          </tr>

        </table>";
    $table.="<br/>  <table>
          <tr>
              <th align='left'>Career Objective</th>
          </tr>
          </table>
          <ul style='list-style-type:disc'>
              <li>$career_objective</li>
          </ul>
        ";


    if (count($achievementsArray) > 0) {

	$table.="<br/><table>
          <tr>
              <th align='left'>Core Competancy</th>
          </tr>
          </table>
         <ul style='list-style-type:disc'>";
	for ($i = 0; $i < count($achievementsArray); $i++) {

	    if (!empty($achievementsArray[$i]['achievements'])) {
		$achievementstitle = $achievementsArray[$i]['achievements'];

		$table.="<li>$achievementstitle</li>";
	    }
	}
	$table.="</ul>";
    }
    $table.="<br/>  <table width='100%' border='1'>
          <tr>
              <th colspan='5'>Education Details</th>
          </tr>
          <tr>
               <th width='10%'>Degree</th>
               <th width='35%'>Discipline</th>
               <th width='30%'>School/College</th>
               <th width='10%'>Year of passing</th>
               <th width='15%'>Aggregate</th>
          </tr>";
    if ($pgdipschoolname != '') {
	$table.="<tr>
              <td>PG Diploma</td>
              <td>$pgdipcourse</td>
              <td>$pgdipschoolname</td>
              <td>$pgdippassoutyear</td>
              <td>-</td>
          </tr>";
    }
    if ($pgboard != '') {
	$table.="<tr>
              <td>Master Degree</td>
              <td>$pgdepartment</td>
              <td>$pgschoolname</td>
              <td>$pgpassoutyear</td>
              <td>$pgpercentage</td>
          </tr>";
    }
    if ($degschoolname != '') {
	$table.="<tr>
              <td>Degree</td>
              <td>$degdepartment</td>
              <td>$degschoolname</td>
              <td>$degpassoutyear</td>
              <td>$degpercentage</td>
          </tr>";
    }
    if ($pucschoolname != '') {
	$table.="<tr>
              <td>PUC</td>
              <td> - </td>
              <td>$pucschoolname</td>
              <td>$pucpassoutyear</td>
              <td>$pucpercentage</td>
          </tr>";
    }
    $table.="<tr>
              <td>SSLC</td>
              <td> - </td>
              <td>$sslcschoolname</td>
              <td>$sslcpassoutyear</td>
              <td>$sslcpercentage</td>
          </tr>



         </table>";
    $table.=" <br/> <table width='100%' border='0'>";
    $table.="<tr>
                 <td style='font-weight:bold' align='Center'>Project Details</td>
            </tr></table>";
    for ($i = 0; $i < count($academicArray); $i++) {
	$project_title = $academicArray[$i]['project_title'];
	$college_name = $academicArray[$i]['college_name'];
	$time_duration = $academicArray[$i]['time_duration'];
	$project_description = $academicArray[$i]['project_description'];
	$tools_used = $academicArray[$i]['tools_used'];
	$challenges = $academicArray[$i]['challenges'];

	if (!empty($project_title)) {
	    $table.=" <br/> <table width='100%' border='1'>";
	    $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Project Title</td>
                 <td width='80%'>$project_title</td>
            </tr>";
	}
	if (!empty($college_name)) {
	    $table.="<tr>
                 <td width='20%'  style='font-weight:bold'>Institue Name</td>
                 <td width='80%'>$college_name</td>
            </tr>";
	}
	if (!empty($project_description)) {
	    $table.="<tr>
                 <td width='20%'  style='font-weight:bold'>Project Description</td>
                 <td width='80%'>$project_description</td>
            </tr>";
	}
	if (!empty($tools_used)) {
	    $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Tools Used</td>
                 <td width='80%'>$tools_used</td>
            </tr>";
	}
	if (!empty($challenges)) {
	    $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Challenges</td>
                 <td width='80%'>$challenges</td>
            </tr>";
	}
	$table.="</table>";
    }

    if ($deg_projectname != '') {
	$table.=" <br/> <table width='100%' border='1'>";
	$table.="<tr>
                 <td width='20%' style='font-weight:bold'>Project Name</td>
                 <td width='80%'>$deg_projectname</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Institute Name</td>
                 <td width='80%'>$degschoolname</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Project Description</td>
                 <td width='80%'>$deg_projectdescription</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Challenges</td>
                 <td width='80%'>$deg_projectchallenges</td>
            </tr>
             <tr>
                 <td width='20%' style='font-weight:bold'>Tools</td>
                 <td width='80%'>$deg_projecttools</td>
            </tr>";
	$table.="</table>";
    }

    if ($pg_projectname != '') {
	$table.=" <br/> <table width='100%' border='1'>";
	$table.="<tr>
                 <td width='20%' style='font-weight:bold'>Project Name</td>
                 <td width='80%'>$pg_projectname</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Institute Name</td>
                 <td width='80%'>$pgschoolname</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Project Description</td>
                 <td width='80%'>$pg_projectdescription</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Challenges</td>
                 <td width='80%'>$pg_projectchallenges</td>
            </tr>
             <tr>
                 <td width='20%' style='font-weight:bold'>Tools</td>
                 <td width='80%'>$pg_projecttools</td>
            </tr>";
	$table.="</table>";
    }


    $filename = $rvvlsiid;
    $mpdf->WriteHTML($table); /* the above php variable is passed as the output parameter */
     $mpdf->Output("/home/nanoscom/public_html/college/recruiter/$jobcode/" . $filename . '.pdf',
      'F');
    chmod("/home/nanoscom/public_html/college/recruiter/$jobcode/" . $filename . '.pdf',
      0777);
}
?>

