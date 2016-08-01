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
    
   

	 if(isset($_POST[loginSubmit]))
	 {
	 $pwd=$_POST['txtPassword'];
   $login_query = "SELECT * FROM $rec_table where r_email='".$_POST[txtEmailId]."'";
  // echo $login_query;die;
  
			$login_result=$db->getResults($login_query);
			
			
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
			echo "<script>document.location.href='recruiter_menu.php'</script>";
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

<div class="rightimg_top">
<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Recruiter Login</h3>
</div>
<div class="rightimg_right">
</div>
</div><!--end of rightimg_top-->
 <div class="rightinner_content_inner">
 <table width="100%"> <tr><td><p class="right_content_style">Page Under Construction</p></td></tr></table>
<?php /*?>  <table width="100%">

  <p class="right_content_style">
   
	<?=$input->formStart('LoginForm','','onSubmit="return loginValidations();"');?>
 	
	<tr>
      <td height="25" class="error" align="center">&nbsp;</td>
	  <td colspan="2"><span class="error">
	    <?=messaging($_REQUEST[msg])?>
	  </span></td>
	  <td width="300" align="right" style="padding-right:20px;"> <span class="error">* Indicates essential field</span></td>
    </tr>
    
	<tr>  
<td width="228" height="25"  class="text">&nbsp;</td>
<td width="185"><span class="text">Email ID : </span></td>
<td width="195"  height="23"><?=$input->textBox('txtEmailId','','text','style=width:200px;','');?></td>
<td><span class="error">*</span></td>
</tr>
 
 <tr>
 <td width="228" height="25"  class="text">&nbsp;</td>
 <td width="185"><span class="text">Password :</span></td>
 <td  height="23"><?=$input->password('txtPassword','','text','style=width:200px;','');?></td>
  
  <td><span class="error">*</span></td>
  </tr>    
  
   <tr>
    
    <td  height="19" width="228">&nbsp;</td>
    
    <td width="185">&nbsp;</td>
    <td  height="19" colspan="2" align="justify" style="padding-left:60px;">
	    <input  type="submit" class="button" value="login" name="loginSubmit" />

   </td>
   </tr><!--
      <tr>
    
    <td  height="19" width="228">&nbsp;</td>
    
    <td width="185">&nbsp;</td>
    <td  height="19" colspan="2" style="padding-left:10px;"><a href="recruiters_registration.php" class="text10red" style="text-decoration:underline;">Registration</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="recruiter_forgot_password.php" class="text10red" style="text-decoration:underline;">Forgot Password</a></td>
   </tr>
   </tr>-->
</table>
  </form></Td></tr> </table><?php */?></p>
</div>
</div><!--end of right_maincontent-->
<?php include "stmenuleft_content.php" ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>