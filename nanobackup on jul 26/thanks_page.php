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
  
     <p  class="text">Dear <?=ucfirst($_SESSION['act_name']);?>,<br />
       <br />Thank you for registering on Nanochip Solutions. You are 1 Step away from building your Industry Standard Resume.<br /><br />
    <a href="activate_student.php" class="mail_text"> Click here to proceed</a></p></td></tr>
       
    
    
    
  
    
  
      
  


 
 

  
  
     
  
   
      
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