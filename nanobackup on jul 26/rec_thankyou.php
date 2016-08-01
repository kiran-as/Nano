<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
    
   if(!empty($_SESSION['r_id']))
   header("Location:candidate_details.php");

	 if(isset($_POST[loginSubmit]))
	 {
	 $pwd=$_POST['txtPassword'];
    $login_query = "SELECT * FROM $rec_table where r_email='".$_POST[txtEmailId]."'";
  // echo $login_query;die;
  
			$login_result=$db->getResults($login_query);
			//echo count($login_result);die;
			
			//echo $login_result[0]->r_password;
		//echo md5($_POST[txtPassword]);die;
 if($login_result[0]->r_password==md5($pwd))
			{
			if($login_result[0]->r_approve=='1')
			
			{ 
			
			$userId = $login_result[0]->r_id;	
			$username=$login_result[0]->r_user_name;			
			$_SESSION['username'] = $username;
			$_SESSION['r_id'] = $userId; 
			echo "<script>document.location.href='candidate_details.php'</script>";
		 //   header("Location: student_menu.php");
		    }
	
	        else 
	          {
	             echo "<script>document.location.href='recruiter_login.php?msg=7'</script>";
		           //header("Location: recruiter_login.php?msg=4");
	          }
	   
	}
	  
 else
 {
 echo "<script>document.location.href='recruiter_login.php?msg=4'</script>";
 //header("Location: login.php?msg=4");
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
</head>

<body>
<div class="main_div">
<? include "includes/header.php" ?>

<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />
</div><!--end of main_banner-->
<div class="main_content">


<div class="stmenuright_maincontent">

<div class="rightimg_top" style="width:980px;">
<div class="rightimg_left">
</div>
<div class="rightimg_mid" style="width:960px;">
<h3 class="h3class">Thank You</h3>
</div>
<div class="rightimg_right">
</div>
</div><!--end of rightimg_top-->
 <div class="rightinner_content_inner" style="width:980px; padding:10px;">
   <form action="activate_student.php" method="post" name="actForm" id="actForm"  >
  <table width="100%" align="center" class="recruit_menu_bg">   
    <tr>
	<td height="25" colspan="3" class="heading" style="padding-right:0px;"><b>Account Activation</b></td>
    </tr>  

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
      </p>
     <p  class="text"> Thanks for registering with us , <br /><br />Please enter the Activation Code provided to your email id  to activate your account.</p></td></tr>
       
    
    <tr>
	
      <td height="25" colspan="3"  class="error" align="right"> * Indicates essential field</td>
      
    </tr>
    
<tr>  	
<td width="23%">&nbsp;</td>
<td width="15%"  align="left" class="text"> Email Id : </td>
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
    
   <input name="doActivate" type="submit" id="doLogin3" value="Activate" style=background-color:#424843;color:#ffffff>
      <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>-->
            <? /*$input->ForgotPassword('txtForgotPassword','forgot password','text' ,'');*/ ?>
			<!--<input type="button" onClick="javascript:location.href='forgot_password.php'" value="forgot password">-->
  
     <!-- <input value="Reset" name="txtReset" style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="reset" />-->      </td>
   </tr>
      <tr>
    
    
    
    
    <td  height="19" colspan="3" align="center"><a href="student_registration.php" class="text10red" style="text-decoration:underline;">Registration</a>&nbsp;&nbsp;<a href="forgot_password.php" class="text10red" style="text-decoration:underline;">Forgot Password</a></td>
   </tr>
</table>
  </form>
</div>
</div><!--end of right_maincontent-->
<?php //include "stmenuleft_content.php" ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>