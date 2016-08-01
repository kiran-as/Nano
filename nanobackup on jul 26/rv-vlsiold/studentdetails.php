<?php include_once('db/dbconfig.php');
session_start();

$idprograms = $_GET['idprograms'];


$select = "select * from tbl_programs where idprograms=$idprograms";
$resultprograms = mysql_query($select);
	while ($row = mysql_fetch_assoc($resultprograms)) {
		  $Title	= $row["Title"];
		}
if($_POST)
{
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$upddate = date('Y-m-d H:i:s');
$Insert	=	mysql_query("INSERT INTO tbl_registerstudents (StudentName, Email,Title,Phoneno,Upddate)
VALUES ('".$name."','".$email."','".$Title."','".$phone."','".$upddate."')")or die(mysql_error());

	/*print_R($_POST);
	die();*/
 $html ='Dear '.$_POST['name'];
  $html.='<br/>Email '.$_POST['email'];
   $html.='<br/>Phone '.$_POST['phone'];
   $html.='<html><body>
<div>
	&nbsp;</div>
<div>
	Congratulation for registering to "'.$Title.'" !</div>
<div>
	&nbsp;</div>
<div>
	An RV-VLSI counselor will call you shortly to complete the admission process and</div>
<div>
	enroll you into your chosen batch</div>
<div>
	&nbsp;</div>
<div>
	Kindly download and print the <a href="http://www.rv-vlsi.com/RV_VLSI_Application_Form_PDF.pdf">Application Form</a>, and submit the duly filled out</div>
<div>
	application form when you visit our center.</div>
<div>
	&nbsp;</div>
	<div>
	<span style="font-family:arial, helvetica; font-size:18px; font-weight:bold;">Please contact 080-40788574 or email:info@rv-vlsi.com if you do not hear from us in 24hrs.</span>
	</div>
<div>
	&nbsp;</div>
<div>
	<strong>Thanks and Regards,</strong></div>
<div>
	<strong>RV-VLSI Team</strong></div>
</body>	</html>
   ';
   
  // $html=' Thanks for applying for the'.$Title.'.The admin of the RV-VLSI will contact you personally';
/*
 $from='RV-VLSI';
  		$to      = $_POST['email'];
$subject = 'Congratulations for Registering to RV-VLSI Course';
$message = $html;
 $headers = "Content-type: text/html\r\n"; 
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
 $headers.= "From:" . $from;
mail($to, $subject, $message, $headers);*/
  $name = $_POST['name'];
$table=2;
/*echo $_POST['email'];
die();*/
	$_SESSION['email'] = $_POST['email'];
	$to      = $_POST['email'];
$subject = 'Welcome to RV-VLSI. Pioneers in Imparting Experience Based Education';
$message=$html;
$from='RV-VLSI';
$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers.= 'From: RV-VlSI <info@rv-vlsi.com>';
	// $headers.= "Content-Type: text/html; charset=ISO-8859-1\n";

mail($to, $subject, $message, $headers);
$torvvlsi = 'info@rv-vlsi.com';
mail($torvvlsi, $subject, $message, $headers);


 }
?>


<html>
<head>
<script language="javascript" type="text/javascript" src="javascript/validation.js"></script>
<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />

<link rel="stylesheet" href="css/lytebox.css" type="text/css" media="screen" />
</head>

<script type="text/javascript">
function numbersonly(e){
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
	if (unicode<48||unicode>57) //if not a number
	return false //disable key press
	}
}
function validate()
{
  var flag = true;
  if(document.getElementById('name').value=='')
  {
     alert("Enter the  Name");
    flag = false;

    return flag;
  }
  if(document.getElementById('email').value=='')
  {
     alert("Enter the email");
    flag = false;

    return flag;
  } 
  if(document.getElementById('phone').value=='')
  {
     alert("Enter the Contact Number");
    flag = false;

    return flag;
  }
  return flag;
}

function fnclose()
{
  parent.location="program_offerings.php";
}
</script>


<body>
 <form action="" method="POST" id="myForm" name="myform" >
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
		<?php if($table!=2){?>
		<table id="student details" width="100%" border="0" cellspacing="2" cellpadding="2">
					 <tr> 
					   <td align="left" colspan="2">&nbsp;</td>
					   </tr>
					 <tr>
					     <td class="label" nowrap="nowrap">Name:<span>*</span><?php echo $table;?></td>
						 <td width="100%"><input type="text" name='name' id='name' value="" /></td>
					 </tr>
					 <tr>
				    <td class="label" nowrap="nowrap">E-Mail:<span>*</span></td><td><input type="text" name='email' id='email' value="" /></td>
				</tr>
				
				<tr>
				    <td class="label" nowrap="nowrap" >Phone No:<span>*</span></td><td><input type="text" name='phone' id='phone'  maxlength="15" value="" onKeyPress='return numbersonly(event);'/></td>
				</tr>
				<tr>
				    <td colspan="2" align="right"><input type="submit" name='Submit' id='Submit' value="Submit" onClick="return validate();" class="blueButton"/>
					<input type="button" name='Cancel' id='Cancel' value="Cancel" onClick="fnclose();" class="grayButton"/>
					</td>
				</tr>
					</table>
				<?php } else {?>	
					
						<table id="thanksinformation"  cellpadding="0" cellspacing="0" border="0" class="resumeviewinfo">
						<tr>
			<td><img src="images/iocn_information.png"></td>
			<td>Dear "<?php echo $name?>",<br/>
Congratulation for registering to "<?php echo $Title;?>"! <br/>
An RV-VLSI counselor will call you shortly to complete the admission process and
enroll you into your chosen batch. Check your email. <br/>
<span style="font-family:arial, helvetica; font-size:18px; font-weight:bold;">Please contact 080-40788574 or email:info@rv-vlsi.com if you do not hear from us in 24hrs.</span></td>

			
		</tr></table>
		<!--<table>
		<tr><td align="right"><input type="button" name='Cancel' id='Cancel' value="Cancel" onclick="return Cancel();" class="grayButton"/></td></tr>
		</table>
		--><?php }?>
  </form>
</body>
</html>