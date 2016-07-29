<?php 
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

foreach($_GET as $key => $value) {
	$get[$key] = filter($value);
}

/******** EMAIL ACTIVATION LINK**********************/
if(isset($get['user']) && !empty($get['activ_code']) && !empty($get['user']) && is_numeric($get['activ_code']) ) {

$err = array();
$msg = array();

$user = mysql_real_escape_string($get['user']);
$activ = mysql_real_escape_string($get['activ_code']);

//check if activ code and user is valid
$rs_check = mysql_query("select r_id from $rec_table where md5_id='$user' and r_actcode='$activ'") or die (mysql_error()); 
$num = mysql_nur_rows($rs_check);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num <= 0 ) { 
	$err[] = "Sorry no such account exists or activation code invalid.";
	header("Location: activate_recruiter.php?msg=$msg");
	//exit();
	}

if(empty($err)) {
// set the approved field to 1 to activate the account
$rs_activ = mysql_query("update $rec_table set r_approve='1' WHERE 
						 md5_id='$user' AND r_actcode = '$activ' ") or die(mysql_error());
$msg[] = "Thank you. Your account has been activated.";
 "<script>document.location.href='activation_rec.php?msg=1'</script>";
//header("Location: activate.php?done=1&msg=$msg");						 
//exit();
 }
}

/******************* ACTIVATION BY FORM**************************/
if ($_POST['doActivate']=='Activate')
{
$err = array();
$msg = array();

$user_email = mysql_real_escape_string($_POST['user_email']);
$activ = mysql_real_escape_string($_POST['activ_code']);
//check if activ code and user is valid as precaution
$rs_check = mysql_query("select r_id from $rec_table where r_email='$user_email' and r_actcode='$activ'") or die (mysql_error()); 
$num = mysql_nur_rows($rs_check);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num <= 0 ) { 
	$err[] = "Sorry no such account exists or activation code invalid.";
	//header("Location: activate.php?msg=$msg");
	//exit();
	}
//set approved field to 1 to activate the user
if(empty($err)) {
	$rs_activ = mysql_query("update $rec_table set r_approve='1' WHERE 
						 r_email='$user_email' AND r_actcode= '$activ' ") or die(mysql_error());
	$msg[] = "Thank you. Your account has been activated.";
 }
//header("Location: activate.php?msg=$msg");						 
//exit();
}

	

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
   <script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
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
<h3 class="h3class">Recuiter Login  Activation </h3>
</div>
<div class="rightimg_right">
</div>
</div>--><!--end of rightimg_top-->
  <div class="registrationinner_content_inner" style="margin-bottom:5px; padding-left:130px;">
  <div class="recruiter_login_bg">
 <div class="recruitleftbg"></div>
 <div class="recruiter_loginmidbg"></div>
 <div class="recruitrightbg"></div>
 </div>
 <div style="float:left; width:450px; background-color:#f3e1e1; border-left:1px solid #736f6f; border-right:1px solid #736f6f;">
   	  <div style="float:left; width:450px;">
      <table width="100%" border="0">
    <h3 align="left" style="color:#114981;font-size:16px;font-weight:bold;margin:0px;padding-left:10px;">Recuiter Login  Activation</h3>  
  <tr><Td>
	<form action="activate_recruiter.php" method="post" name="actForm" id="actForm" >
  <table width="100%">   
    <tr>
	<td width="100%" height="25" colspan="2"  align="center">&nbsp;</td>
    </tr>  

 <tr><td colspan="2" align="center">
      <p> 
        <?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "* $e <br>";
	    }
	  echo "</div>";	
	   }
	   if(!empty($msg))  {
	    echo "<div class=\"msg\">" . $msg[0] . "</div>";

	   }	
	  /******************************* END ********************************/	  
	  ?>
      </p>
     <p style= "font-size:12px; font-weight:bold;  text-align:center;" >
	 Your account has been activated  
	 <a href="recruiter_login.php"  class="mail_text">click here</a> to login  </p></td></tr>
       
    

     
  
   <tr>
    
    
    
   
    <td  height="19" colspan="2" align="center"><!--<input type="button" onClick="javascript:location.href='forgot_password.php'" value="forgot password">-->
  
     <!-- <input value="Reset" name="txtReset" style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="reset" />-->      </td>
   </tr>

</table>
  </form></Td></tr>     </table></div> 

</p>
</div>
 <div class="recruiter_login_bg">
 <div class="recruitleftbtbg"></div>
 <div class="recruiter_loginmidbtbg"></div>
 <div class="recruitrightbtbg"></div>
 </div>
</div>
</div><!--end of right_maincontent-->
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>