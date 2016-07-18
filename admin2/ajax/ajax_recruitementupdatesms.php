<?php

include('../../application/conn.php');

$idrecruitement = $_POST['idrecruitement'];
$cnt = 0;
if ($_POST['type'] == 'Approve') {

    $companySql = mysql_query("Select * from tbl_recruiter as a, tbl_recruitement as b
		                       where a.idrecruiter=b.idrecruiter and b.idrecruitement=$idrecruitement");
    while ($row = mysql_fetch_assoc($companySql)) {
	$companyname = $row['company'];
	$recruiterEmail = $row['email'];
	$recruiterName = $row['usename'];
	$jobcode = $row['jobcode'];
    }

    if ($_POST['Status'] == 'UnApprove') {
	$studentSql = mysql_query("Select * from tbl_student as a, tbl_recruitementresumes as b
  		                       where a.idstudent=b.idstudent and b.idrecruitement=$idrecruitement");
	while ($row = mysql_fetch_assoc($studentSql)) {

	    $cnt++;
	    $studentphone = $row['mobile'];
	    $firstname = $row['firstname'];
	    $email = $row['email'];
	    $idstudent = $row['idstudent'];
	    $rvvlsiid = $row['rvvlsiid'];

	    $to = $email;
	    //$to = "askiran123@gmail.com";
	    $subject = "Your Resume has been tagged for a job opening at  $companyname";
	    $message = "
			<html>
			<body>
			<table>
			<tr>
			<td>Dear $firstname,</td>
			</tr>
			<tr>
			<td>Congragulations, your resume has been tagged for a job opening in ($companyname) stay tuned for more updates from ($companyname).</td>
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


	    // Always set content-type when sending HTML email
	    $headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	    // More headers
	    $headers .= 'From: Nanochip Solutions <info@nanochipsolutions.com>' . "\r\n";
	    $headers .= 'Cc: askiran123@gmail.com' . "\r\n";

	  //  mail($to, $subject, $message, $headers);


	    //$Mobile = '9900580442';
$Mobile = $studentphone;
	  //  $time = urlencode("Congragulations, your resume has been tagged for a job opening in ($companyname) stay tuned for more updates from ($companyname)");
	    $ch = curl_init();
	  //  $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&message=$time&response=Y";
	    $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&tempid=34761&F1=$companyname&F2=$companyname&response=Y";
	    //set the url, number of POST vars, POST data
	      curl_setopt($ch, CURLOPT_URL, $url);
 //curl_exec($ch);

 $Mobile = '9538130954';
	  //  $time = urlencode("Congragulations, your resume has been tagged for a job opening in ($companyname) stay tuned for more updates from ($companyname)");
	    $ch = curl_init();
	  //  $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&message=$time&response=Y";
	    $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&tempid=34761&F1=$companyname&F2=$companyname&response=Y";
	    //set the url, number of POST vars, POST data
	      curl_setopt($ch, CURLOPT_URL, $url);
 //curl_exec($ch);

	    
	}

	$to = "$recruiterEmail";
	$subject = "Resumes for ($jobcode)";
	$message = "
					<html>
					<body>
					<table>
					<tr>
					<td>Dear $recruiterName,</td>
					</tr>
					<tr>
					<td>We are happy to inform you that based on your search criteria ($cnt) resumes, have been shortlisted from the Database.<br/> <a href='http://nanochipsolutions.com/college/recruiter/index.php' target='_blank'>Click here to login and download the resumes.</a> Do not hesitate to contact us for any clarification.</td>
					</tr>
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

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: Nanochip Solutions <info@nanochipsolutions.com>' . "\r\n";
	$headers .= 'Cc: askiran123@gmail.com' . "\r\n";

	mail($to,
		$subject,
		$message,
		$headers);

	mysql_query("Update tbl_recruitement set status='Close' where idrecruitement='$idrecruitement'");
    }
   
}

?>

