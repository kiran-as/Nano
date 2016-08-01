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
			echo "<script>document.location.href='statistics.php'</script>";
		 //   header("Location: student_menu.php");
		    }
	
	        else 
	          {
	             echo "<script>document.location.href='recruiter_login.php?msg=4'</script>";
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
<script language = "Javascript">
/**
 * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */

function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}

function ValidateForm(){
	var emailID=document.frmSample.FrgtEmail
	
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please Enter your Email ID")
		emailID.focus()
		return false
	}
	if (echeck(emailID.value)==false){
		emailID.value=""
		emailID.focus()
		return false
	}
	return true
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

<div class="rightimg_top" style="width:980px;">
<!--<div class="rightimg_left">
</div>
<div class="rightimg_mid" style="width:960px;">
<h3 class="h3class">Recruiter Login</h3>
</div>
<div class="rightimg_right">
</div>-->
</div><!--end of rightimg_top-->
<div class="recruiterinner_content">

 <div style="float:left; width:450px; margin:0px 20px;">
 <div class="recruiter_login_bg">
 <div class="recruitleftbg_n"></div>
 <div class="recruiter_loginmidbg_n"></div>
 <div class="recruitrightbg_n"></div>
 </div>
 
 <div style="float:left; width:450px; background-color:#dfeffb; border-left:1px solid #cfcfcf; border-right:1px solid #cfcfcf;">
   	  <div style="float:left; width:450px;">
	<?=$input->formStart('LoginForm','','onSubmit="return loginValidations();"');?>
	<table width="100%" border="0">
    <h3 align="left" style="color:#114981;font-size:16px;font-weight:bold;margin:0px;padding-left:10px;">Recruiter Login</h3>    
	<!--<tr>
	  <td height="34" colspan="4" class="login_hdinner"><strong>Already Member? Login here.. </strong></td>
	  </tr>-->
      <tr>
	  <td height="20" colspan="4" class="login_hdinner"></td>
	  </tr>
	  <? if($_REQUEST[msg]!=''){?>
	  <tr>
      <td height="25" class="error" align="center">&nbsp;</td>
	  <td colspan="2"><span class="error">
	    <?=messaging($_REQUEST[msg])?>
	  </span></td>
	  <td width="94" align="right" style="padding-right:20px;">&nbsp;</td>
	  </tr>
	  <? }?>
	<tr>  
<td width="66" height="27"  class="text">&nbsp;</td>
<td width="68"><span class="text">Email IDs : </span></td>
<td width="202"  height="27">
<input type="text" name="txtEmailId" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/textbgnew.png); background-repeat:repeat-x;"/>
<!--<?=$input->textBox('txtEmailId','','text','style=width:200px;','');?>--></td>
<td><span class="error">*</span></td>
</tr>
 
 <tr>
 <td width="66" height="25"  class="text">&nbsp;</td>
 <td width="68"><span class="text">Passwords :</span></td>
 <td  height="25">
 <input type="password" name="txtPassword" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/textbgnew.png); background-repeat:repeat-x;"/>
 <!--<?=$input->password('txtPassword','','text','style=width:200px;','');?>--></td>
  
  <td><span class="error">*</span></td>
  </tr>    
  
   <tr>
    
    <td  height="19" width="66">&nbsp;</td>
    
    <td width="68">&nbsp;</td>
    <td  height="19" colspan="2" align="left">
    <input  type="submit" value="" name="loginSubmit" width="75px" height="25px" style="background-image:url(images/loginbg_new.png); background-repeat:no-repeat; width:73px; height:23px; border:none; margin:10px 20px 0px 10px;" />
   
   <input type="Reset" value="" name="Reset" width="75px" height="25px" style="background-image:url(images/resetbg_new.png); background-repeat:no-repeat; width:73px; height:23px; border:none; margin:10px 20px 0px 10px;" />

		</td>
    </tr>
  <tr>    
    <td colspan="4" align="center" colspan="3" style="padding-left:60px;">
   <a href="recruiters_registration.php" class="mail_text">RegistrationS</a>&nbsp;&nbsp;
    <a href="recruiter_forgot_password.php" class="mail_text">Forgot_Password</a></td>

    </tr>
    <!--
      <tr>
    
    <td  height="19" width="228">&nbsp;</td>
    
    <td width="185">&nbsp;</td>
    <td  height="19" colspan="2" style="padding-left:10px;"><a href="recruiters_registration.php" class="text10red" style="text-decoration:underline;">Registration</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="recruiter_forgot_password.php" class="text10red" style="text-decoration:underline;">Forgot Password</a></td>
   </tr>
   </tr>-->
</table>
  </form></div>  </div>
  <div class="recruiter_login_bg">
 <div class="recruitleftbtbg_n"></div>
 <div class="recruiter_loginmidbtbg_n"></div>
 <div class="recruitrightbtbg_n"></div>
 </div>
  </div>
  
  <div style="float:left; width:450px; margin:0px 10px;">
 <div class="recruiter_login_bg">
 <div class="recruitleftbg_n"></div>
 <div class="recruiter_loginmidbg_n"></div>
 <div class="recruitrightbg_n"></div>
 </div>
 
  <div style="float:left; width:450px; background-color:#dfeffb; border-left:1px solid #cfcfcf; border-right:1px solid #cfcfcf;">
   	  <div style="float:left; width:450px; height:160px;">
 
  


  </div>  </div>
  <div class="recruiter_login_bg">
 <div class="recruitleftbtbg_n"></div>
 <div class="recruiter_loginmidbtbg_n"></div>
 <div class="recruitrightbtbg_n"></div>
 </div>
  </div>
  
</div>
 
</div><!--end of right_maincontent-->
<?php //include "stmenuleft_content.php" ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>