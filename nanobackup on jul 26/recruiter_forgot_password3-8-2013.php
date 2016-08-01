<?  include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
 //include_once('config/header.php');
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   
 if(isset($_POST['FrgtEmail']))
   {
		$email = $_POST['FrgtEmail'];
		if(isset($_POST['FrgtEmail']))
		{
			$query = "SELECT r_user_name FROM $rec_table WHERE r_email  = '$email'";
			$pass = mysql_query($query) or die(mysql_error());
			$count = mysql_num_rows($pass);
			if($count == 0) 
			{ 
			$reset ="Your email does not exist in our database";
			}
			else
			{
				function makeRandomPassword() 
					{           
					$word = "abchefghjkmnpqrstuvwxyz0123456789";           
					srand((double)microtime()*1000000);            
					$i = 0;           
					while ($i <= 7) {                 
					$num = rand() % 33;                 
					$tmp = substr($word, $num, 1);                 
					$pass = $pass . $tmp;                 
					$i++;           
					}           
					return $pass;     
					}
					$random_password = makeRandomPassword();     
					$db_password = md5($random_password);          
					$sql = "UPDATE $rec_table SET r_password= '$db_password' WHERE r_email= '$email'";
					mysql_query($sql);
					$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers =  "From: \"Nanochipsolutions.com\" <auto-reply@$host>\r\n" ;               
					$subject = "Your password for Nanochipsolutions.com";     
					$message = "Your Password has been changed.          
					
					New Password: $random_password          
					
					$server_url/recruiter_login.php
					Once logged in you can change your password          
					
					Thank you
					
					Nanochipsolutions.com Team          
					
					This is an automated response, please do not reply!";
									  
					mail($email, $subject, $message, $headers);
					mysql_free_result($pass);
					$reset="Sent new Password to your EmailId";
			}
		}
	}
   
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<meta name="keywords" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<title>ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
 <script type="text/javascript" src="lib/jquery.js"></script>
<script type='text/javascript' src='lib/jquery.autocomplete.js'></script>
<script type='text/javascript' src='lib/localdata.js'></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
  <link type="text/css" rel="stylesheet" href="calender/dhtmlgoodies_calendar.css" media="screen"/></link>
<script src="calender/dhtmlgoodies_calendar.js" type="text/javascript"></script>
<link href="css/ajaxtabs.css" rel="stylesheet" type="text/css" />
<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
<script type="text/javascript">
function checkError(form){
        var error = '<?php echo $error; ?>';
        switch (error){
                case '1':
                        document.getElementById("Error1").style.display = "";
                        break;
                case '2':
                        document.getElementById("Error2").style.display = "";
                        break;
                case '3':
                        document.getElementById("Error3").style.display = "";
                        break;
                case '4':
                        document.getElementById("Error4").style.display = "";
                        break;
        }
}
</script>
</head>

<body>
<div class="main_div">
<? include "includes/header.php" ?>

<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />
</div><!--end of main_banner-->
<div class="main_content">


<div class="stmenuright_maincontent">




</div><!--end of right_maincontent-->
<div class="rightinner_content_inner" align="center" style="padding-left:60px;">

 <div style="float:left; width:560px; margin:0px 80px;">
 <div class="login_bg">
 <div class="recruitleftbg_n"></div>
 <div class="loginmidbg-n"></div>
 <div class="recruitrightbg_n"></div>
 </div>
 
 <div style="float:left; width:410px; background-color:#dfeffb; border-left:1px solid #cfcfcf; border-right:1px solid #cfcfcf;">
   	  <table>

<h3 align="left" style="color:#114981;font-size:16px;font-weight:bold;margin:0px;padding-left:10px;">Forgotten your Password ?</h3>  
<form  name="frmSample" method="post" action="#" onSubmit="return ValidateForm()">
	
	<tr>
      <td colspan="3" align="right" style="padding-right:20px;"><div align="right"><span class="error">* Indicates essential field</span></div></td>
    </tr>
    
	<!--<tr>
    <td width="13">&nbsp;</td>
	  <td height="25" colspan="2" class="login_hdinnerline"><strong>New User <a href="recruiters_registration.php" style="color:#000000;">Register</a> here </strong></td>
	  </tr>-->
	<!--<tr>
     <td>&nbsp;</td>  
<td height="25" colspan="2" class="login_hdinnerline"><strong>Forgotten your Password ? </strong></td>
</tr>-->
  <tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
 </tr>
 
 <tr>
  <td>&nbsp;</td>
 <td height="25" colspan="2"><span style="color:#000; font-size:12px;">Please enter your Email ID below than we will reset your password and will mail you.</span> </td>
  </tr>    
  
   <tr>
     <td>&nbsp;</td>
    <td width="225"  height="19" align="left">
    <input type="text" name="FrgtEmail" id="FrgtEmail" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/textbgnew.png); background-repeat:repeat-x;"/>&nbsp;<span class="error">*</span></td>
    <td width="196" align="left">
    <input type="submit" name="FrgtSubmit" value="" style="background-image:url(images/submitbg_new.png); margin-top:0px; background-repeat:no-repeat; width:73px; height:23px; border:none;" />
   </td>
   </tr>
   <tr>
 <td height="15" colspan="2" style="color:#F00;"><strong><? if(isset($reset)) echo $reset; ?></strong> </td>
  </tr><!--
      <tr>
    
    <td  height="19" width="228">&nbsp;</td>
    
    <td width="185">&nbsp;</td>
    <td  height="19" colspan="2" style="padding-left:10px;"><a href="recruiters_registration.php" class="text10red" style="text-decoration:underline;">Registration</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="recruiter_forgot_password.php" class="text10red" style="text-decoration:underline;">Forgot Password</a></td>
   </tr>
   </tr>-->
   </form>
</table>  </div>
  <div class="login_bg">
 <div class="recruitleftbtbg_n"></div>
 <div class="loginmidbtbg-n"></div>
 <div class="recruitrightbtbg_n"></div>
 </div>
  </div>
  
</div>

<?php /*?><?php include "stmenuleft_content.php" ?><?php */?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>