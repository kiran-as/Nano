<?php
include('../../application/conn.php');
error_reporting(-1);

$idrecruiter = $_POST['idrecruiter'];
if($_POST['type']=='Approve')
{

	$companySql = mysql_query("Select * from tbl_recruiter as a where  a.idrecruiter=$idrecruiter");
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
  	
  	 $to = "$email";
$subject = "Account in Nanochip Solutions has been Activated";

$message = "
<html>
<body>
<table>
<tr>
<td>Dear $firstname,</td>
</tr>
<tr>
<td>Your account has been activated please login with your registered email($email) and password ($password).
Click <a href='http://nanochipsolutions.com/college/recruiter/index.php' target='_blank'>here on this link</a></td>
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

    mysql_query("Update tbl_recruiter set status='Active' where idrecruiter='$idrecruiter'");
  }
  if($_POST['Status']=='Inactive')
  {
  
    mysql_query("Update tbl_recruiter set status='Inactive' where idrecruiter='$idrecruiter'");
  }
}
?>
	