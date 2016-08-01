<?php include_once('db/dbconfig.php');
include_once('admin_login_check.php');
session_start();

$dates = $_SESSION['dates'];

if($_GET['idprograms'] == 500)
{
$Title = 'Altera Training Programs';
   $html='Dear '.$_SESSION['name'];
   $html.='<div>
	&nbsp;</div>
<div>
	Congratulations for registering to "'.$Title.'" !</div>
<div>
	&nbsp;</div>
<div>
	An RV-VLSI counselor will call you shortly to complete the admission process and</div>
<div>
	enroll you into your chosen batch"'.$dates.'".</div>
<div>
	&nbsp;</div>
<div>
	<strong>Thanks and Regards,</strong></div>
<div>
	<strong>RV-VLSI Team</strong></div>
   ';
 $from='RV-VLSI';
 	$to      = $_SESSION['email'];
$subject = 'Congratulations for Registering to ALTERA Course' ;
$message = $html;
 $headers = "Content-type: text/html\r\n"; 
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers.= "From:" . $from;
mail($to, $subject, $message, $headers);  
   
}
else
{
$resultccc	="SELECT * FROM tbl_programs WHERE idprograms=".$_GET['idprograms'];
$result = mysql_query($resultccc);
while ($row = mysql_fetch_assoc($result)) {
   $Description = $row['Description'];
   $Title = $row['Title'];
   
   $html='Dear '.$_SESSION['name'];
   $html.='
<div>
	&nbsp;</div>
<div>
	Congratulation for registering to "'.$Title.'" !</div>
<div>
	&nbsp;</div>
<div>
	An RV-VLSI counselor will call you shortly to complete the admission process and</div>
<div>
	enroll you into your chosen batch"'.$dates.'".</div>
<div>
	&nbsp;</div>
<div>
	Kindly download and print the <a href="http://www.rv-vlsi.com/RV_VLSI_Application_Form_PDF.pdf">Application Form</a>, and submit the duly filled out</div>
<div>
	application form when you visit our center.</div>
<div>
	&nbsp;</div>
<div>
	&nbsp;</div>
<div>
	<strong>Thanks and Regards,</strong></div>
<div>
	<strong>RV-VLSI Team</strong></div>
   ';
  // $html=' Thanks for applying for the'.$Title.'.The admin of the RV-VLSI will contact you personally';
  }
 $from='RV-VLSI';
  		$to      = $_SESSION['email'];
$subject = 'Congratulations for Registering to RV-VLSI Course' ;
$message = $html;
 $headers = "Content-type: text/html\r\n"; 
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
 $headers.= "From:" . $from;

mail($to, $subject, $message, $headers);
  
 }
 


		


?>


<html>
<head>
<script language="javascript" type="text/javascript" src="javascript/validation.js"></script>
<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />

<link rel="stylesheet" href="css/lytebox.css" type="text/css" media="screen" />
</head>

<script type="text/javascript">
function validatedoctors()
{
  var flag = true;
  if(document.getElementById('doctorname').value=='')
  {
     alert("Enter the Doctor Name");
    flag = false;
  }
  if(document.getElementById('designation').value=='')
  {
     alert("Enter the Specialisation");
    flag = false;
  } 
  if(document.getElementById('phone').value=='')
  {
     alert("Enter the Contact Number");
    flag = false;
  }
  return flag;
}

function fnclose()
{
  parent.location="checkingdisplaycourses.php";
}
</script>


<body>
 <form action="" method="POST" id="myForm" name="myform" onSubmit="return validatedoctors();">
 <table width="100%"  cellpadding="4" cellspacing="10" border="0" class="resuemviewtableborder">
 
 <tr>
        <td colspan="2" class="popupheader">
		 <table width="100%" border="0" cellspacing="0" cellpadding="1">
         <tr>
          <td nowrap="nowrap">Information</td>
         <td width="100%" align="right"><img src="images/close.gif" align="absmiddle" onClick="fnclose();" style="cursor:pointer"></td>
      </tr>
  </table>
  </td>
  </tr>
  
		<tr><td>
		<table cellpadding="0" cellspacing="0" border="0" class="resumeviewinfo"><tr>
			<td><img src="images/iocn_information.png"></td>
			<td>Dear "<?php echo $_SESSION['name']?>",<br/>
Congratulation for registering to "<?php echo $Title;?>"! <br/>
An RV-VLSI counselor will call you shortly to complete the admission process and
enroll you into your chosen batch. Check your email.</td>
			
		</tr></table>
		
		
		</td></tr>
      <tr> <td align="right">
	  <input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td></tr>
					
  </table>
  </form>
</body>
</html>