<?php
include('../../application/conn.php');
error_reporting(-1);

$idrecruitement = $_POST['idrecruitement'];
$cnt = 0;
if($_POST['type']=='Approve')
{

	$companySql = mysql_query("Select * from tbl_recruiter as a, tbl_recruitement as b
		                       where a.idrecruiter=b.idrecruiter and b.idrecruitement=$idrecruitement");
	while($row = mysql_fetch_assoc($companySql))
	{
		$companyname = $row['company'];
		$recruiterEmail = $row['email'];
		$recruiterName = $row['usename'];
	}
  if($_POST['Status']=='UnApprove')
  {
  	$studentSql = mysql_query("Select * from tbl_student as a, tbl_recruitementresumes as b
  		                       where a.idstudent=b.idstudent and b.idrecruitement=$idrecruitement");
  	while($row = mysql_fetch_assoc($studentSql))
  	{

            $cnt++;
  		    $studentphone = $row['mobile'];		
  		    $firstname = $row['firstname'];
  		    $email = $row['email'];
  		   
			  	    //$to = "$email";
  		    $to = "askiran123@gmail.com";
					$subject = "Resume has been shortlisted in $companyname";
$message = "
					<html>
					<body>
					<table>
					<tr>
					<td>Dear $firstname,</td>
					</tr>
					<tr>
					<td>Congragulations, your resume got shortlisted for a job opening in ($companyname) stay tuned for more updates from ($companyname).</td>
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

					mail($to,$subject,$message,$headers);
  	}

  	 $to = "$recruiterEmail";
					$subject = "Resumes has been assigned";
	$message = "
					<html>
					<body>
					<table>
					<tr>
					<td>Dear $recruiterName,</td>
					</tr>
					<tr>
					<td>We are happy to inform you that based on your requirement ($cnt) number of resumes, were shortlisted from the Database, <a href='http://nanochipsolutions.com/college/recruiter/index.php' target='_blank'>Click here to login</a> and download the resumes. Please email us the resume ids that you would like to consider for the subsequent rounds.</td>
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

					mail($to,$subject,$message,$headers);

    mysql_query("Update tbl_recruitement set status='Close' where idrecruitement='$idrecruitement'");
  }
  if($_POST['Status']=='Approve')
  {
    mysql_query("Update tbl_recruitement set status='Open' where idrecruitement='$idrecruitement'");
  }
}
?>
	