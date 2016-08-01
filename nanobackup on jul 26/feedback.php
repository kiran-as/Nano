<?php 
 include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
$mainpage = $_SERVER['HTTP_REFERER'];
	 $saveddetails = 0;
 if($_POST)
		 {
		    $feedback = $_POST['textfield7'];
			$html='
				 <table  width="100%" cellpadding="3" cellspacing="3" border="0">
				   <tr>
				     <td>Dear Admin, the recruiter has send the follwing feedback</td>
					</tr>
					<tr>
				     <td>URL'.$mainpage.'</td>
					</tr>
					<tr>
				     <td>'.$feedback.'</td>
					</tr>
										';
     			 $from='RV-VLSI';
				 $to      ='askiran123@gmail.com';//'admin@nanochipsolutions.com';//$email;
				 $subject = 'FeedBack';
				 $message = $html;
				 $headers = "Content-type: text/html\r\n"; 
				    'Reply-To: webmaster@example.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				 $headers.= "From:" . $from;
				 mail($to, $subject, $message, $headers); 
				 	 $saveddetails = 1;
		 }
		 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard</title>
<link rel="stylesheet" href="css/styleupdated1.css" type="text/css" media="screen" />
<link href="css/recruiter-styles.css" rel="stylesheet">
<script type="text/javascript">
	function fnclose()
{
  parent.location="dashboard.php";
}	
</script>
<body>




<form action="" method="post" name="">
<?php if($saveddetails==0){?>
<table width="100%" border="0" cellspacing="4" cellpadding="2">
  <tr>
   			<td class="heading_new">Feedback </td><td><img src="../images/close.gif" align="right" onClick="fnclose();"></td>
   </tr>
   <tr><td colspan="2"><span class="small">you may encounter errors in beta version, we request you to enter the comments below, We will validate and make neccessary changes.</span></td></tr>
   <tr><td colspan="2"><hr></td></tr>
<tr>
  
    <td align="right">URL</td><td><?php echo $mainpage;?></td>
  </tr>
  <tr>
  
    <td valign="top" align="right">Comments</td><td><textarea name="textfield7" cols="40" rows="12" id="textfield7"></textarea></td>
  </tr>
  
    <tr>
    <td colspan="2" align="right"> <input type="submit"  value="Send" name="Save" id="Save" class="blueButton"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="close" id="close" name="close" class="grayButton" value="Close" onclick="fnclose();"></input></td>
  </tr>
  
 
</table>
<?php }else if($saveddetails==1){?>
<table width="400" cellpadding="2" cellspacing="4" border="0" class="resuemviewtableborder">
 <tr>
			
			<td><img src="/images/icon_info_new.png" align="absmiddle"></td><td>Thanks for submitting the  your feedback.Admin will look over it</td>
			
		</tr>
		
		
      <tr> <td align="right" colspan="2">
	  <input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td></tr>
					
  </table>
<?php }?>
</form>

</body>
</html>
