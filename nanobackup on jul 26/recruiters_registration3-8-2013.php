<? include_once('db/dbconfig.php');
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
  


 if(isset($_POST['regSubmit']))
 {
 $activ_code = rand(1000,9999);
		 $ch=new checkInputFields();
		 $result=$db->getResults("select * from $rec_table where r_email='".$ch->checkFields($_REQUEST[txtEmail])."'");


if(count($result)!=0)
{
echo  "<script>document.location.href='recruiters_registration.php?success=6'</script>";
//header("Location: recruiters_registration.php?msg=6");

}
else
{

 	$insert_query="INSERT INTO $rec_table  set r_user_name	='".$ch->checkFields($_POST['txtUserName'])."',
	                                                  r_email ='".$ch->checkFields($_POST['txtEmail'])."',
	                                                  r_password ='".$ch->checkFields(md5($_POST['txtPassword']))."',
													  r_company ='".$ch->checkFields($_POST['txtCompany'])."',
									                r_address ='".$ch->checkFields($_POST['txtAddress'])."',
													    r_pin  ='".$ch->checkFields($_POST['txtPinCode'])."',
														   r_city  ='".$ch->checkFields($_POST['txtCity'])."',
														      r_state  ='".$ch->checkFields($_POST['txtState'])."',
															     r_country  ='".$ch->checkFields($_POST['txtCountry'])."',
														r_web_url ='".$ch->checkFields($_POST['txtWebUrl'])."',
														r_actcode='".$ch->checkFields($activ_code)."',
													  r_std ='".$ch->checkFields($_POST['txtStdCode'])."',
														   r_contact ='".$ch->checkFields($_POST['txtContactNo'])."',
														   r_designation ='".$ch->checkFields($_POST['txtDesignation'])."',
														    r_mobile ='".$ch->checkFields($_POST['txtPhoneNumber'])."',
															 r_comp_desc ='".$ch->checkFields($_POST['txtComDescriptn'])."',
															  r_industry ='".$ch->checkFields($_POST['txtIndustry'])."',
														r_no_employes	='".$ch->checkFields($_POST['selNofEmployes'])."'"; 
									
									
									
									
				 $result=$db->insertRecord($insert_query);
				 
				 /*srihar added code*/	
	$pwd=$_REQUEST[txtPassword];
	$usr_email=$_REQUEST[txtEmail];	
	$user_name=$_REQUEST[txtUserName];
	$user_id = mysql_insert_id();  
	$md5_id = md5($user_id);
	

//echo $user_id;die;
//echo "update$rec_table set md5_id='$md5_id' where r_id='$user_id'";die;
$info_query="update $rec_table set md5_id='$md5_id' where r_id='$user_id'";
$result=$db->insertRecord($info_query);
				/*srihar added code*/	
				
									
	 $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: Nanochipsolutions Recruiter - Registration' . "\r\n";
				
		        $to='puneeth@rv-vlsi.com';
				$subject='New Registration @ Recruiter';
				 
 $message='<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="36%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="24%">&nbsp;</td>
    <td width="37%">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;"><div align="right">First Name</div></td>
    <td>:</td>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;">'.$_REQUEST[txtUserName].'</td>
    <td >&nbsp;</td>
  </tr>
 
  <tr>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;"><div align="right">Designatiion</div></td>
    <td>:</td>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;">'.$_REQUEST[txtDesignation].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;"><div align="right">Company</div></td>
    <td>:</td>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;">'.$_REQUEST[txtCompany].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;"><div align="right">Email Id/ User Id</div></td>
    <td>:</td>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;">'.$_REQUEST[txtEmail].'</td>
    <td>&nbsp;</td>
  </tr>
  
  
  
  <tr>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;"><div align="right">phone</div></td>
    <td>:</td>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;">'.$_REQUEST[txtPhoneNumber].'</td>
    <td>&nbsp;</td>
  </tr>
  
    
</table>';

	mail($to, $subject, $message, $headers);
	
		/*srihar added code*/	
$a_link ="
*****ACTIVATION LINK*****\n
".$server_url."activate_recruiter.php"; 


 

	$message1 = 
"Hello \n
Thank you for registering with us. Here are your login details...\n

User ID: ".$user_name."\n
Email: ".$usr_email ."\n 
Passwd: ".$pwd. "\n
Activation Code:".$activ_code." \n".

$a_link."
Thank You

Administrator
Nanochip Solutions Team
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";
$headers1 =    "From: \"Nanochipsolutions Recruiter Activation\" <auto-reply@$host>\r\n" ;

	mail($usr_email,"Login Details", $message1, $headers1);
    
	/*srihar added code*/	
									// header("Location: Thankyou.php");
									?>
							
							<SCRIPT language="JavaScript">

                       document.location.href='activate_recruiter.php';

                         </SCRIPT>
<?
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
<link rel="stylesheet" href="lib/jquery.autocomplete.css" type="text/css" />
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
<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
<script type="text/javascript">
 function changeState(typeID)
{

	if(typeID!=99)
   {
	
	
	
	document.getElementById("selDiv").style.display='none';
	 
	document.getElementById("textDiv").style.display='block';
	
	} else 
	 {
		
	document.getElementById("selDiv").style.display='block';
	 
	document.getElementById("textDiv").style.display='none';
	
	 
	 }
	
	
}
</script>
<script type="text/javascript">
$().ready(function() {
	$("#suggest0").autocomplete(cities);

	$("#suggest1").autocomplete(states);
	
	$("#suggest2").autocomplete(countries);	

	$("#clear").click(function() {
		$(":input").unautocomplete();
	});
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

<div class="rightimg_top">
<!--<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Recruiter Registration</h3>
</div>
<div class="rightimg_right">
</div>-->
</div><!--end of rightimg_top-->
 <div class="registrationinner_content_inner" style="margin-bottom:5px; padding-left:0px;">
 <div class="recruittopcurve">
 <div class="registration_top"></div>
 <div class="registration_mid"><h1 class="h1class_reg">Recruiter Registration</h1></div>
 <div class="registration_bottom"></div>
 </div>
   <?=$input->formStart('txtForm_rec','','onsubmit="return RecruitersValidation();"');?>
   	<div style="float:left; width:600px; border:none; background-color:#dfeffb; border-left:1px solid #cfcfcf; border-right:1px solid #cfcfcf;">
   	    <table width="100%"  align="center" style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">   
  
	<!--<h3 align="left" style="color:#114981;font-size:16px;font-weight:bold;margin:0px;padding-left:10px;">Recruiter Registration</h3>-->
    <tr>
       <td width="10" height="34" align="center"><span class="error">&nbsp;</span></td>
      <td width="289" height="34" align="center" class="error">
        <? $msg=new messages();
		  echo $msg->success($_REQUEST[success]); ?></td>
          <td>&nbsp;</td>
      <td><span class="error"> * Indicates required field</span></td>
    </tr>
  
    <tr>
    <td>&nbsp;</td>
     <td width="289" height="1"  class="text"> Full Name : </td>
     <td width="225"><?=$input->textBox('txtUserName',$_REQUEST[txtUserName],'','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
	 <td width="177"><span class="error">*</span></td>
    </tr>
  


 
 <tr>  
 <td>&nbsp;</td>
<td width="289" height="25"  class="text"> Official Email ID : </td>
<td><input type="text" name="txtEmail" value="<?=$_REQUEST[txtEmail]?>" onBlur="return validEmail(this.value)" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"/><? //=$input->textBox('txtEmail',$_REQUEST[txtEmail],'','style=width:200px;','');?></td>
<td><span class="error">*</span></td>
</tr>




<tr>
<td>&nbsp;</td>
 <td width="289" height="25"  class="text">Password:</td>
 <td><?=$input->password('txtPassword','','text','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
  <td><span class="error">*</span></td>
  </tr>          

<tr>
<td>&nbsp;</td>
    <td width="289" height="15"  class="text">Confirm Password:</td>
    <td><?=$input->password('txtConfirmPassword','','text','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
    <td><span class="error">*</span></td>	
 </tr>
  <tr><td>&nbsp;</td>
 <td width="289" height="1"  class="text">Designation: </td>
 <td><?=$input->textBox('txtDesignation',$_REQUEST[txtDesignation],'','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
  <td><span class="error">*</span></td>
</tr>
<tr>
<td>&nbsp;</td>
 <td width="289" height="15"  class="text">Company Name :</td>
 <td><?=$input->textBox('txtCompany ',$_REQUEST[txtCompany ],'','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
 <td><span class="error">*</span></td>
</tr>
  


<tr>
<td>&nbsp;</td>
    <td width="289" height="15" valign="top"  class="text">Company Address:</td>
    <td><?=$input->textArea('txtAddress','','text','style="width:200px; height:64px; background-color:#f5f3f4; border:1px solid #bebebe; background-image:url(images/textareabgshade.png); background-repeat:repeat-x; background-position:bottom;resize:none;"','');?></td>
	<td><span class="error">*</span></td>
</tr>   
<tr>
<td>&nbsp;</td>
<td width="289" height="25"  class="text">City :</td>
<td><input type="text" name="txtCity"  id="suggest0" value="" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;" /></td>
 <td><span class="error1">*</span></td>
</tr>

<tr>
<td>&nbsp;</td>
 <td width="289" height="15"  class="text">Pin Code :</td>
 <td><?=$input->textBox('txtPinCode',$_REQUEST[txtPinCode],'','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
 <td> <span class="error">*</span>
</tr>.
<tr>
<td>&nbsp;</td>
<td width="289" height="25"  class="text">State :</td>
<td><input type="text" name="txtState"  id="suggest1" value="" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;" /></td>
 <td><span class="error1">*</span></td>
</tr>

<tr>
<td>&nbsp;</td>
<td width="289" height="25"  class="text">Country :</td>
<td><input type="text" name="txtCountry"  id="suggest2" value="" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;" /></td>
<td><span class="error1">*</span></td>
</tr> 

 


 




<tr>
<td>&nbsp;</td>
<td width="289" height="25"  class="text">STD Code/Contact No :</td>
<td><?=$input->textBox('txtStdCode','','','style="width:50px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?>&nbsp;&nbsp;<?=$input->textBox('txtContactNo','','','style="width:144px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
<td><span class="error1">*</span></td>
</tr> 

<?php /*?><tr>
 <td width="161" height="1"  class="text">Office Telephone: </td>
 <td  height="" colspan="2">
<?=$input->textBox('txtofficeTel',$_REQUEST[txtofficeTel],'','style=width:200px;','');?>
  <span class="error">*</span></td>
</tr>
<?php */?>
  <tr>
  <td>&nbsp;</td>
<td width="289" height="25"  class="text">Mobile Number:</td>
<td><?=$input->textBox('txtPhoneNumber',$_REQUEST[txtPhoneNumber],'','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
<td><span class="error">*</span></td>
</tr>  
       
 <tr>
 <td>&nbsp;</td>
<td width="289" height="25"  class="text">Web Site Url:</td>
<td><?=$input->textBox('txtWebUrl',$_REQUEST[txtWebUrl],'','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
<td><span class="error">*</span></td>
</tr>
 
<tr>
<td>&nbsp;</td>
    <td width="289" height="15" valign="top" class="text">Company Description:</td>
    <td><?=$input->textArea('txtComDescriptn','','text','style="width:200px; height:64px; background-color:#f5f3f4; border:1px solid #bebebe; background-image:url(images/textareabgshade.png); background-repeat:repeat-x; background-position:bottom;resize:none;"','');?></td>
    <td><span class="error">*</span></td>
</tr> 

<tr>  
<td>&nbsp;</td>
<td width="289" height="25"  class="text">Type of Industry : </td>
<td><?=$input->textBox('txtIndustry',$_REQUEST[txtIndustry],'','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
<td><span class="error">*</span></td>
</tr>

<tr>  
<td>&nbsp;</td>
<td width="289" height="25"  class="text">Number of Employees : </td>
<td><div id="selDiv"><select name="selNofEmployes" id="selNofEmployes"  style="width:70px;">
   <option value="< 10" selected="selected"> < 10 </option>
    
            <option value="10-50"  > 10-50</option>
       
		<option value="50-100" >50-100</option>
        
        <option value="> 100" > > 100</option>
		
	
 </select> </div>

<?php /*?><?=$input->textBox('txtNofEmployes',$_REQUEST[txtNofEmployes],'','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?><?php */?></td>
<td><span class="error">*</span></td>
</tr>
     

  <tr>
    
    <td  height="19" width="10">&nbsp;</td>
    <td  height="19" width="10">&nbsp;</td>
    <td  height="19" colspan="2" >
    <input  type="submit" value="" name="regSubmit" style="background-image:url(images/registerbg_new.png); background-repeat:no-repeat; width:73px; height:23px; border:none; margin:10px 20px 0px 10px;" />&nbsp;<input  type="Reset" value="" name="Reset" style="background-image:url(images/resetbg_new.png); background-repeat:no-repeat; width:73px; height:23px; border:none; margin:10px 20px 0px 10px;"/>
      <? //=$input->submitButton('regSubmit','Register','button');?>
      <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="regSubmit"  value="Register"/>-->
            <? //=$input->ResetButton('Reset','Reset','button');?>
     <!-- <input value="Reset" name="txtReset" style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="reset" />-->      </td>
   </tr>
</table>
    </form>
</div>
<div class="recruittopcurve">
 <div class="reg_leftbtbg-n"></div>
 <div class="reg_midbtbg-n"></div>
 <div class="reg_rightbtbg-n"></div>
 </div>
</div><!--end of right_maincontent-->

<?php //include "stmenuleft_content.php"; ?>
</div><!--end of main_content-->
<div class="stmenuleft_maincontent">
<div class="news_events">
<div class="news_top">
<div class="lefttopleft">
</div>
<div class="lefttopmiddle">
<h1 class="h1class">Notifications</h1>
</div>
<div class="lefttopright">
</div>
</div><!--end of news_top-->

<div class="leftmiddle_content" >

<p class="left_para" style="margin:0px;padding:10px; color:#FF0000; font-weight:bold;"><span id="notice"></span>
 </p> 
<p class="dot_style"></p>

<p  class="left_para" style="margin:0px;padding:0px;"><?  if(!empty($_SESSION[m_id])){}?>
</p> 
<!--
<p  class="left_para"><img class="arrow_img" src="images/arrow_img.jpg" width="9" height="9" /><span class="date_style">25.02.2011</span></p>
<h2 class="h2class">News & Events Heading</h2>
<p class="content_style">Directly or through channel 
distributors, we have 
developed.</p> 
<p class="dot_style">...............................................</p>-->
</div>

<div class="news_bottom">
<div class="leftbottom_left">
</div>
<div class="leftbottom_center">
</div>
<div class="leftbottom_right">
</div>
</div>

</div><!--end of news_events-->
</div>
</div>
<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>