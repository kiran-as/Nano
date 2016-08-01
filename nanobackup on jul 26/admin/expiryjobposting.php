<?php  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php');  
	//include_once('../classes/recruiter.class.php');  
	   
	$input=new inputFields();	
	$ch=new checkInputFields();	
	$db=new dataBase();
	$rec = new recruiter();
	$db->connectDB(); 
	
	$today  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
	
	$fiveday  = mktime(0, 0, 0, date("m")  , date("d")+5, date("Y"));
	
	$selectquery = mysql_query("Select a.*,b.* from rv_job_posting as a,rv_recruiters as b where a.r_id=b.r_id and a.jp_expdate>=$today and a.jp_expdate<=$fiveday group by a.jp_id");
	$i=0;
	while($row = mysql_fetch_assoc($selectquery))
	{
	  $arryjobposted[$i]['jp_company'] = $row['jp_company'];
	  $arryjobposted[$i]['jp_name'] = $row['jp_name'];
	  $arryjobposted[$i]['r_user_name'] = $row['r_user_name'];
	  $arryjobposted[$i]['jp_telephone'] = $row['jp_telephone'];
	  $arryjobposted[$i]['jp_mobile'] = $row['jp_mobile'];
	  $arryjobposted[$i]['jp_email'] = $row['jp_email'];
	  	  $arryjobposted[$i]['jp_id'] = $row['jp_id'];
		  $i++;
	}
	$countofarrayjobposted = $i;
	
	if($_POST)
	{
	   $totalcount = count($_POST['jobpostedid']);
	   for($i=0;$i<$totalcount;$i++)
	   {
	   
	   
	     $jpid = $_POST['jobpostedid'][$i];

				$searchresultss = "Select a.*,b.*
						       from rv_job_posting as a,rv_recruiters as b where a.r_id=b.r_id and 
						      a.jp_id =$jpid";
			$resultcemail = mysql_query($searchresultss);
			while ($row = mysql_fetch_assoc($resultcemail)) {
				  $emailid	= $row["jp_email"];
				  $name	= $row["r_user_name"];
				}
				
				 $html='<table width="100%" cellpadding="3" cellspacing="3" border="0">
				         <tr>
						    <td>Dear '.$name.'</td>
						 </tr>
						 <tr>
						    <td>The admin has tagged the relevant resumes to the job posting for which you have created. The job posting will expire in the next 2 days; kindly view it to download resumes and to take the necessary actions</td>
						 </tr>
						 <tr>
						    <td>Regards,<br>Nanochip Solutions Team</td>
						 </tr></table>';
				   
				 $from='RV-VLSI';
				 $to      = 'askiran123@gmail.com';//$emailid;
				 $subject = 'Notification of Job posting' ;
				 $message = $html;
				 $headers = "Content-type: text/html\r\n"; 
				    'Reply-To: webmaster@example.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				 $headers.= "From:" . $from;
				 mail($to, $subject, $message, $headers);  
				
				
				
	   }
	   
	   echo "<script>parent.location = 'admin_mangae_recruiters.php';</script>";
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../css/styleupdated1.css" type="text/css" media="screen" />

<script type="text/javascript">
function fnclose()
{
  parent.location = "admin_mangae_recruiters.php";
}
</script>
</head>

<body>
<?php if($countofarrayjobposted>0) {?>
 <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
<form action="" method="POST">
  <tr class="gridheader">
   <th></th>
  <th width="20%">Company</th>
  <th width="20%">Recruiter</th>
  <th width="20%">Job Posted Name</th>
  <th width="20%">Mobile</th>
  <th width="20%">Email</th>
 </tr>
 <?php for($var=0;$var<$countofarrayjobposted;$var++) {
 $row_color = ($var % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
 ?>
   <tr class="<?php echo $row_color?>">
   <td><input type="checkbox"  name="jobpostedid[]" value="<?php  echo $arryjobposted[$var]['jp_id']?>" id="jp_id<?php echo $var;?>"</td>
     <td ><?php echo $arryjobposted[$var]['jp_company'];?></td>
	 <td><?php echo $arryjobposted[$var]['r_user_name'];?></td>
	 <td ><?php echo $arryjobposted[$var]['jp_name'];?></td>
	 <td><?php echo $arryjobposted[$var]['jp_mobile'];?></td>
	 <td ><?php echo $arryjobposted[$var]['jp_email'];?></td>
	 
	</tr>
 
 <?php }?>
<tr>
<td colspan="6" align="right">
   <input type="button" name="close" id="close" value="close" class="grayButton"  onclick="fnclose()">
   <input type="submit" name="Save" id="Save" value="Save" class="blueButton">
   </td>
</tr> 

</form>
</table>
<?php } else {?>
<table>
<tr>
<td>There is no such job which is going to expire within 5 days</td>
<tr>
<tr>
<td align="right">
   <input type="button" name="close" id="close" value="close" class="grayButton"  onclick="fnclose()">
   
   </td>
</tr>
</table>
<?php }?>
</div>
</body>
</html>
