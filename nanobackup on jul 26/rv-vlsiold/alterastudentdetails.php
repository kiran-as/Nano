<?php include_once('db/dbconfig.php');
error_reporting(E_ALL ^ E_NOTICE); 
include_once('admin_login_check.php');
session_start();


if($_POST)
{
 $html ='Dear '.$_POST['name'];
  $html.='<br/>Email '.$_POST['email'];
   $html.='<br/>Phone '.$_POST['phone'];
   $Title = 'Altera Training Programs';
   $html.='<div>
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
	<strong>Thanks and Regards,</strong></div>
<div>
	<strong>RV-VLSI Team</strong></div>
   ';
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
function validate()
{
  var flag = true;
  if(document.getElementById('name').value=='')
  {
     alert("Enter the  Name");
    flag = false;
  }
  if(document.getElementById('email').value=='')
  {
     alert("Enter the email");
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
  parent.location="program_offerings.php";
}
</script>


<body>
 <form action="" method="POST" id="myForm" name="myform" onSubmit="return validate();">
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
					<input type="button" name='Cancel' id='Cancel' value="Cancel" onClick="return Cancel();" class="grayButton"/>
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
enroll you into your chosen batch. Check your email.</td>

			
		</tr></table>
		<!--<table>
		<tr><td align="right"><input type="button" name='Cancel' id='Cancel' value="Cancel" onclick="return Cancel();" class="grayButton"/></td></tr>
		</table>
		--><?php }?>
  </form>
</body>
</html>