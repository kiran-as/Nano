<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
	    include_once('classes/checkingAuth.php');
   $check=new checkingAuth();
   $check->loginCheck();   

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   
    
  
 ?>
 
 <?php

 if(isset($_POST['infoUpdate']))
 {
$password_query = "SELECT * FROM $members_table where m_id='".$_SESSION[m_id]."'"; 
 
 $password_result=$db->getResults($password_query);
  foreach($password_result as $password){}
   $oldpwd=$password->m_password;
  if($oldpwd==md5($_POST[txtOldPwd]))
  {
 	$info_query="update $members_table  set m_password	='".$ch->checkFields(md5($_POST['txtNewPwd']))."' where m_id='".$_SESSION[m_id]."'";
									
									
 $result=$db->insertRecord($info_query);
 echo  "<script>document.location.href='change_password.php?msg=2'</script>";
  }
  else{
   echo  "<script>document.location.href='change_password.php?msg=5'</script>";
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
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />

  <link type="text/css" rel="stylesheet" href="calender/dhtmlgoodies_calendar.css" media="screen"/></link>
<script src="calender/dhtmlgoodies_calendar.js" type="text/javascript"></script>

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
<!--<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Change Password</h3>
</div>
<div class="rightimg_right">
</div>-->
</div><!--end of rightimg_top-->

<div class="rightinner_content_inner" align="center">

 <div style="float:left; width:560px; margin:0px 160px;">
 <div class="login_bg">
 <div class="recruitleftbg"></div>
 <div class="changemidbg"></div>
 <div class="recruitrightbg"></div>
 </div>
 
 <div style="float:left; width:425px; background-color:#f3e1e1; border-left:1px solid #736f6f; border-right:1px solid #736f6f;">
 <table width="100%">
 <h3 align="left" style="color:#114981; font-size:18px; font-weight:bold;margin:0px; padding-left:10px;">Change Password</h3>
   	  <tr><td><table width="100%">

    <tr>
      <td  colspan="2" valign="top"> <?=$input->formStart('infoForm','','onSubmit="return Password_Change_Validation();"');?>
  <table width="100%"  align="center" > 

    <tr><td  height="18" class="error" colspan="2" ><?=messaging($_REQUEST[msg])?> <div align="right"><span class="error">&nbsp;&nbsp;&nbsp;&nbsp; *Indicates required field</span></div></td></tr>

    <tr>
      <td height="1"  class="text" ></td>
      <td  height=""></td>   
    </tr>   
    <tr>
    <td width="109" height="1"  class="text" align="left">Old Password : </td>
    <td  height="" width="288">
     <input type="password" name="txtOldPwd" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/textbgnew.png); background-repeat:repeat-x;"/>
	<?php /*?><?=$input->password('txtOldPwd','','text','style=width:200px;','');?><?php */?><span class="error"> *</span>
    </tr>
  
    <tr>
      <td height="1"  class="text" align="left">New Password : </td>
      <td  height="">
	  <input type="password" name="txtNewPwd" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/textbgnew.png); background-repeat:repeat-x;"/>
	 <?php /*?> <?=$input->password('txtNewPwd','','text','style=width:200px;','');?><?php */?> <span class="error">*</span>
    </tr>
    <tr>
 <td width="109" height="1"  class="text" align="left">Confirm Password : </td>
 <td  height="" width="288">
 <input type="password" name="txtCNewPwd" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/textbgnew.png); background-repeat:repeat-x;"/>
<?php /*?><?=$input->password('txtCNewPwd','','text','style=width:200px;','');?><?php */?> <span class="error">*</span>
    </tr>
<tr>
    
    <td  height="19" width="109">&nbsp;</td>
    
    <td  height="19" width="288">
    
      <?=$input->submitButton('infoUpdate','','text','style="background-image:url(images/updatebg_new.png); margin-top:10px; background-repeat:no-repeat; width:73px; height:23px; border:none; margin-left:60px;"');?></td>
   </tr>
</table>
  <?=$input->formEnd?></td>
	</tr>
</table>
    </Td></tr> </table> </div>
  <div class="login_bg">
 <div class="recruitleftbtbg"></div>
 <div class="chnangemidbtbg"></div>
 <div class="recruitrightbtbg"></div>
 </div>
  </div>
  
</div>

<!-- <div class="rightinner_content_inner">
   <p class="right_content_style">
 
 
</div>-->
</div><!--end of right_maincontent-->
<?php include "stmenuleft_content.php"; ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>