<?php 
 include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

		 

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
<table width="100%" border="0" cellspacing="4" cellpadding="2">
  <tr>
   			<td class="heading_new">5 easy steps to hire the best talent</td>
   			<td><img src="../images/close.gif" align="right" onClick="fnclose();"></td>
   </tr>
   
   <tr><td colspan="2"><hr></td></tr>
   
   <tr>
  
    <td td colspan="2">1. To request Admin for relevant resumes click on 'Post new job opening'</td>
  </tr>
  <tr>
  
    <td td colspan="2">2. Provide details of the job opening for the Admin to help you accurately</td>
  </tr>
   <tr>
  
    <td td colspan="2">3. Click Save to send job description to Admin for further processing.</td>
  </tr>
   <tr>
  
    <td td colspan="2">4. Once the resumes are available to be viewed, receive reminder email from Admin.</td>
  </tr>
   <tr>
  
    <td td colspan="2">5. Log back in to Review and Download resumes that are most accurate to your description</td>
  </tr>
  
    <tr>
    <td colspan="2" align="right"><input type="button" name="close" id="close" name="close" class="grayButton" value="Close" onclick="fnclose();"></input></td>
  </tr>
  
 
</table>

</form>

</body>
</html>
