<?php 
//print_r($_REQUEST);die;
include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   //include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
 //include_once('config/header.php');
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 




/******************* ACTIVATION BY FORM**************************/
if (isset($_POST['doActivate']))
{
$err = array();
$msg = array();

$user_email = mysql_real_escape_string($_POST['user_email']);
$activ = mysql_real_escape_string($_POST['activ_code']);
//check if activ code and user is valid as precaution
$rs_check = mysql_query("select m_id,m_fname,m_lname from $members_table where m_emailid='$user_email' and m_actcode='$activ'") or die (mysql_error()); 
$num = mysql_num_rows($rs_check);
$login_result=mysql_fetch_array($rs_check);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num <= 0 ) 
	{ 
	$err[] = "<div style='color:red'>Sorry no such account exists or activation code invalid.</div>";
	
	//exit();
	}
//set approved field to 1 to activate the user
if(empty($err)) 
{
	$rs_activ = mysql_query("update $members_table set m_approve='1' WHERE 
						 m_emailid='$user_email' AND m_actcode= '$activ' ") or die(mysql_error());
	//$msg[] = "Thank you. Your account has been activated.";
		
					$_SESSION['user'] = $login_result[m_fname];
					$_SESSION['username'] = $login_result[m_fname].'&nbsp;'.$login_result[m_lname];		
					$_SESSION['m_id'] = $login_result[m_id];	
					echo "<script>document.location.href='student_menu.php'</script>";
	/*echo "<script>document.location.href='activation.php'</script>";*/
 }
//header("Location: activate.php?msg=$msg");						 
//exit();
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
<script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
  <script>
  $(document).ready(function(){
    $("#actForm").validate();
  });
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

<!--<div class="rightimg_top">
<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Job Seeker Activation </h3>
</div>
<div class="rightimg_right">
</div>
</div>--><!--end of rightimg_top-->
 <div class="registrationinner_content_inner">
 <div class="recruittopcurve">
 <div class="registration_top"></div>
 <div class="registration_mid"><h1 class="h1class_reg">Account Activation</h1></div>
 <div class="registration_bottom"></div>
 </div>

  <p class="right_content_style">
	<div style="float:left; width:600px; border:none; background-color:#ffffff; border-left:1px solid #736f6f; border-right:1px solid #736f6f;">
   	    <table width="100%"  align="center" style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">   
  <tr>
    <Td> <form action="activate_student.php" method="post" name="actForm" id="actForm"  >
  <table width="100%" align="center">   
    <!--<tr>
	<td height="25" colspan="3" class="heading" style="padding-right:0px;"><b>Account Activation</b></td>
    </tr>  -->

 <tr><td colspan="3" >
      <p> 
        <?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo " $e <br>";
	    }
	  echo "</div>";	
	   }
	   if(!empty($msg))  {
	    echo "<div class=\"msg\">" . $msg[0] . "</div>";

	   }	
	  /******************************* END ********************************/	  
	  ?>
      </p><p>Please enter the Activation Code provided to your email id  to activate your account. Check  Inbox/spam of email account to read Nanochip Solutions member activation mail.</p></td></tr>
       
    
    <tr>
	
      <td height="25" colspan="3"  class="error" align="right"> * Indicates essential field</td>
      
    </tr>
    
<tr>  	
<td width="20%">&nbsp;</td>
<td width="18%"  align="left" class="text"> Email Id : </td>
<td width="62%">
  <input name="user_email" type="text" class="required " id="txtboxn" size="25">
  <span class="error">*</span></td>
</tr>  
    
  
      
  


 
 <tr>
 <td>&nbsp;</td>
 <td class="text" align="left">Activation Code :&nbsp;</td><td><input name="activ_code" type="password" class="required" id="txtboxn1" size="25">
   <span class="error">*</span></td>
 
 </tr>

  
  
     
  
   <tr>
    
    
    
   
    <td  height="19" colspan="3" align="center" style="padding:10px 0px;">
    
   <input name="doActivate" type="submit" id="doLogin3" value="" border="0" style="background-image:url(images/activate_img.png); background-repeat:no-repeat; width:82px; height:22px; border:none;">
      <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>-->
            <? /*$input->ForgotPassword('txtForgotPassword','forgot password','text' ,'');*/ ?>
			<!--<input type="button" onClick="javascript:location.href='forgot_password.php'" value="forgot password">-->
  
     <!-- <input value="Reset" name="txtReset" style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="reset" />-->      </td>
   </tr>
      <tr>
    
    
    
    
    <td  height="19" colspan="3" align="center"><a href="student_registration.php" class="mail_text">Registration</a>&nbsp;&nbsp;<a href="forgot_password.php" class="mail_text">Forgot Password</a></td>
   </tr>
</table>
  </form></Td></tr>
  </table>      
</p>

</div>
<div class="recruittopcurve">
 <div class="reg_leftbtbg"></div>
 <div class="reg_midbtbg"></div>
 <div class="reg_rightbtbg"></div>
 </div>
</div><!--end of right_maincontent-->

</div><!--end of main_content-->
<?php include "stmenuleft_content.php" ?>
<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>