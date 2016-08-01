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
	     $ch=new checkInputFields();
		 $result=$db->getResults("select * from $members_table where m_emailid='".$ch->checkFields($_REQUEST[txtEmail])."'");
		if(count($result)!=0)
		{
		echo  "<script>document.location.href='student_registration.php?success=6'</script>";
		}
		 else
		 {
				if ($_POST['vercode'] != $_SESSION['vercode'] || $_SESSION['vercode']=='') 
				{ 
				$error = 'Incorrect verification code'; 
				}
				else
				{
					$activ_code = rand(1000,9999);
					$insert_query="INSERT INTO $members_table  set m_fname = '".$ch->checkFields($_POST['txtFirstName'])."',
									m_lname	 = '".$ch->checkFields($_POST['txtLastName'])."',
									m_emailid = '".$ch->checkFields($_POST['txtEmail'])."',
									m_password	 = '".$ch->checkFields(md5($_POST['txtPassword']))."',
									m_dob ='".$ch->checkFields($_POST['txtDate'])."',
									m_gender ='".$ch->checkFields($_POST['txtGender'])."',
									m_address ='".$ch->checkFields($_POST['txtAddress'])."',
									m_pincode ='".$ch->checkFields($_POST['txtPinCode'])."',
									m_actcode='".$ch->checkFields($activ_code)."',
									m_father_name='".$ch->checkFields($_POST['txtFathername'])."',
									m_city ='".$ch->checkFields($_POST['txtCity'])."',
									m_state ='".$ch->checkFields($_POST['selState'])."',
									m_martial_status ='".$ch->checkFields($_POST['txtMartialStatus'])."',
									m_other_state ='".$ch->checkFields($_POST['txtState'])."',
									m_country ='".$ch->checkFields($_POST['selCountry'])."',
									m_std_code ='".$ch->checkFields($_POST['txtStdCode'])."',
									m_contact_number ='".$ch->checkFields($_POST['txtContactNo'])."',
									m_nationality='".$ch->checkFields($_POST['txtNationality'])."',
									m_languages ='".$ch->checkFields($_POST['txtLanguages'])."',
									m_hobbies='".$ch->checkFields($_POST['txtHobbies'])."',
									m_day ='".$ch->checkFields($_POST['txtDay'])."',
									m_month ='".$ch->checkFields($_POST['txtMonth'])."',
									m_year ='".$ch->checkFields($_POST['txtYear'])."',
									m_phone	 ='".$ch->checkFields($_POST['txtPhoneNumber'])."'";
									
								$result=$db->insertRecord($insert_query);
								$pwd=$_REQUEST[txtPassword];
								$usr_email=$_REQUEST[txtEmail];	
								$user_name=$_REQUEST[txtFirstName];
								$user_id = mysql_insert_id();  
								$resume_id=date('m').date('y').$user_id;
								$md5_id = md5($user_id);
								$info_query="update $members_table set md5_id='$md5_id',m_resume_id='".$resume_id."' where m_id='$user_id'";
								$result=$db->insertRecord($info_query);
								$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers.=    "From: \"Nanochip Solutions - Registration\" <inf@$nanochipsolutions..com>\r\n" ;
				
		        $to='puneeth@rv-vlsi.com';
				$subject='New Registration';
				
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
	font-weight:normal;">'.$_REQUEST[txtFirstName].'</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;"><div align="right">Last Name</div></td>
    <td>:</td>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;">'.$_REQUEST[txtLastName].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;"><div align="right">Email Id/ User Id</div></td>
    <td>:</td>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;">'.$_REQUEST[txtEmail].'</td>
    <td>&nbsp;</td>
  </tr> <tr>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;"><div align="right">Password</div></td>
    <td>:</td>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;">'.$_REQUEST[txtPassword].'</td>
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
	
	$a_link = "
*****ACTIVATION LINK*****\n
$server_url/activate_student.php
"; 

	$message1 = 
"Dear $user_name \n
Congratulations on your successful registration as a job seeker! \n
This is your first step in reaching out to VLSI and Embedded Companies.\n
Here are your login details.\n

User ID: $user_name\n
Email: $usr_email \n 
Passwd: $pwd \n
Activation Code:$activ_code \n

$a_link

Thank You

Administrator
Nanochip Solutions Team
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";
$headers1 =    "From: \"Nanochip Solutions Member Activation\" <auto-reply@$host>\r\n" ;
    

	mail($usr_email, "Login Details", $message1, $headers1);
   
								?>
                                <SCRIPT language="JavaScript">

                               document.location.href='activate_student.php';

                            </SCRIPT>
                                <?

				}
		 }
	
		/*if ($_POST['vercode'] != $_SESSION['vercode'] || $_SESSION['vercode']=='') 
		{ 
		$error = 'Incorrect verification code'; 
		}*/
	
	     /* $activ_code = rand(1000,9999);
          $ch=new checkInputFields();
		 $result=$db->getResults("select * from $members_table where m_emailid='".$ch->checkFields($_REQUEST[txtEmail])."'");
		 
		if(count($result)!=0)
		{
		echo  "<script>document.location.href='student_registration.php?success=6'</script>";
		}
		
		if ($_POST['vercode'] != $_SESSION['vercode'] || $_SESSION['vercode']=='')  { 
		$error = 'Incorrect verification code'; 
		}
		
		else
		{
			 
			 
			 $insert_query="INSERT INTO $members_table  set m_fname = '".$ch->checkFields($_POST['txtFirstName'])."',
									m_lname	 = '".$ch->checkFields($_POST['txtLastName'])."',
									m_emailid = '".$ch->checkFields($_POST['txtEmail'])."',
									m_password	 = '".$ch->checkFields(md5($_POST['txtPassword']))."',
									m_dob ='".$ch->checkFields($_POST['txtDate'])."',
									m_gender ='".$ch->checkFields($_POST['txtGender'])."',
									m_address ='".$ch->checkFields($_POST['txtAddress'])."',
									m_pincode ='".$ch->checkFields($_POST['txtPinCode'])."',
									m_actcode='".$ch->checkFields($activ_code)."',
									m_father_name='".$ch->checkFields($_POST['txtFathername'])."',
									m_city ='".$ch->checkFields($_POST['txtCity'])."',
									m_state ='".$ch->checkFields($_POST['selState'])."',
									m_martial_status ='".$ch->checkFields($_POST['txtMartialStatus'])."',
									m_other_state ='".$ch->checkFields($_POST['txtState'])."',
									m_country ='".$ch->checkFields($_POST['selCountry'])."',
									m_std_code ='".$ch->checkFields($_POST['txtStdCode'])."',
									m_contact_number ='".$ch->checkFields($_POST['txtContactNo'])."',
									m_nationality='".$ch->checkFields($_POST['txtNationality'])."',
									m_languages ='".$ch->checkFields($_POST['txtLanguages'])."',
									m_hobbies='".$ch->checkFields($_POST['txtHobbies'])."',
									m_day ='".$ch->checkFields($_POST['txtDay'])."',
									m_month ='".$ch->checkFields($_POST['txtMonth'])."',
									m_year ='".$ch->checkFields($_POST['txtYear'])."',
									m_phone	 ='".$ch->checkFields($_POST['txtPhoneNumber'])."'";
									
								
				 $result=$db->insertRecord($insert_query);
				 	$pwd=$_REQUEST[txtPassword];
	$usr_email=$_REQUEST[txtEmail];	
	$user_name=$_REQUEST[txtFirstName];
	$user_id = mysql_insert_id();  
	$resume_id=date('m').date('y').$user_id;
$md5_id = md5($user_id);
//echo $user_id;die;
//echo "update $members_table set md5_id='$md5_id' where m_id='$user_id'";die;
$info_query="update $members_table set md5_id='$md5_id',m_resume_id='".$resume_id."' where m_id='$user_id'";
$result=$db->insertRecord($info_query);


$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers.= 'From: Nanochip Solutions - Registration' . "\r\n";
				
		        $to='puneeth@rv-vlsi.com';
				$subject='New Registration';
				
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
	font-weight:normal;">'.$_REQUEST[txtFirstName].'</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;"><div align="right">Last Name</div></td>
    <td>:</td>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;">'.$_REQUEST[txtLastName].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;"><div align="right">Email Id/ User Id</div></td>
    <td>:</td>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;">'.$_REQUEST[txtEmail].'</td>
    <td>&nbsp;</td>
  </tr> <tr>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;"><div align="right">Password</div></td>
    <td>:</td>
    <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
	font-weight:normal;">'.$_REQUEST[txtPassword].'</td>
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
	
	$a_link = "
*****ACTIVATION LINK*****\n
$server_url/activate_student.php
"; 

	$message1 = 
"Dear $user_name \n
Congratulations on your successful registration as a job seeker! \n
This is your first step in reaching out to VLSI and Embedded Companies.\n
Here are your login details.\n

User ID: $user_name\n
Email: $usr_email \n 
Passwd: $pwd \n
Activation Code:$activ_code \n

$a_link

Thank You

Administrator
Nanochip Solutions Team
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";
$headers1 =    "From: \"Nanochip Solutions Member Activation\" <auto-reply@$host>\r\n" ;
    

	mail($usr_email, "Login Details", $message1, $headers1);
   
								?>
                                <SCRIPT language="JavaScript">

                               document.location.href='activate_student.php';

                            </SCRIPT>
                                <?
		}*/

 }
  
?>							
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
<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
<script type="text/javascript">
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","validate.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>

<body>

<div class="main_div">	
<? include "includes/header.php" ?>

<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />
</div><!--end of main_banner-->
<div style="float:left; width:980px; margin:0px; padding:0px;">

<div class="main_content">

<div class="rightimg_top">
<!--<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Job Seeker Registration</h3>
</div>
<div class="rightimg_right">
</div>-->
</div><!--end of rightimg_top-->
 <div class="registrationinner_content_inner" style="padding-left:0px;">
 <div class="recruittopcurve">
 <div class="registration_top"></div>
 <div class="registration_mid"><h1 class="h1class_reg">Job Seeker Registration</h1></div>
 <div class="registration_bottom"></div>
 </div>
    <!--<tr><Td>-->
    <?=$input->formStart('txtForm1','','onSubmit="return  RegisterValidation();"');?>
	
 	<div style="float:left; width:600px; border:none; background-color:#ffffff; border-left:1px solid #736f6f; border-right:1px solid #736f6f;">
   
   	   <table width="100%" align="center" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; padding-left:10px; float:left;">     
	 <tr>
      <td height="25" ></td>
      <td width="239" class="error">
	  <? $msg=new messages();echo $msg->success($_REQUEST[success]); ?></td>
	  <td width="248"><div align="left"><span class="error">* Indicates Required field</span></div>
	  </td>
     </tr>
   
  	<tr><td align="right"><? if($error != '') {  ?>
		<b style="font-size:18px; color:#F00"><? echo $error; } ?> </b> </td></tr>
        
    <tr>
     <td width="275" height="1">First Name : </td>
     <td><?=$input->textBox('txtFirstName',$_REQUEST[txtFirstName],'','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
	 <td><span class="error1">*</span></td> 
	</tr>
	
    
  
<tr>
 <td width="275" height="1"  class="text">Last Name : </td>
 <td><?=$input->textBox('txtLastName',$_REQUEST[txtLastName],'','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?> </td> 
 <td><span class="error">*</span></td> 
</tr>


  
<tr>  
<td width="275" height="25"  class="text"> Email Address : </td>
<td width="275" height="25"><input type="text" name="txtEmail" id="txtEmail" value="<?=$_REQUEST[txtEmail];?>" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;" onBlur="showUser(this.value);" /></td> 
<td><span class="error">*</span><div id="txtHint"></div></td>
</tr>

<tr>  
<td width="275" height="25"  class="text">Confirm Email Address : </td>
<td><?=$input->textBox('txtEmailConfirm',$_REQUEST[txtEmailConfirm],'','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
<td><span class="error">*</span></td>
</tr>
 
<tr>
 <td width="275" height="25"  class="text">Password :</td>
 <td><?=$input->password('txtPassword','','text','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
 <td><span class="error">*</span></td>
  </tr>          
 
  
<tr>
    <td width="275" height="15"  class="text">Confirm Password :</td>
    <td><?=$input->password('txtConfirmPassword','','text','style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"','');?></td>
	<td><span class="error">*</span></td>
</tr>	

 
<?php /*?><tr>
  <td width="144" height="15"  class="text">Date of Birth:</td>
  <td  height="24" colspan="2">
	<input type="text" name="txtDate" id="txtDate" value='<?=date('d/m/Y')?>'/>&nbsp;&nbsp;<img src=   "images/claendaricon.gif" width="20" onclick="displayCalendar(document.txtForm.txtDate,'dd/mm/yyyy',this)"/>
<span class="error">*</span></td>
</tr><?php */?>
<tr>
    <td width="275" height="15"  class="text">Date of Birth :</td>
    <td>
	<?=$input->DayBox('txtDay',$day_array,'style=width:235px;',$_REQUEST[txtDay],'');?>
	<?=$input->MonthBox('txtMonth',$month_array,'style=width:235px;',$_REQUEST[txtMonth],'');?>
	<?=$input->YearBox('txtYear',$year_array,'style=width:235px;',$_REQUEST[txtYear],'');?></td>
	  <td><span class="error">*</span></td>
</tr>

<tr>
    <td width="275" height="15"  class="text">Gender :</td>
    <td class = "text">
    <? if(($_REQUEST[txtGender])=='male')
	{	?>
		Male:<input type="radio" name="txtGender" value="male" checked="checked" />
        <?	} else{ ?>Male:<input type="radio" name="txtGender" value="male"  /> <? }?>
        
        <? if(($_REQUEST[txtGender])=='female')
	{	?>
		Female:<input type="radio" name="txtGender" value="female" checked="checked" />
        <?	} else{ ?>Female:<input type="radio" name="txtGender" value="female"  /> <? }?>
 </td>
	  <td><span class="error">*</span></td>
</tr> 

<tr>
    <td width="275" height="15" valign="top" class="text">Address For Communication :</td>
    <td><?=$input->textArea('txtAddress',$_REQUEST[txtAddress],'text','style="width:200px; height:64px; background-color:#f5f3f4; border:1px solid #bebebe; background-image:url(images/textareabgshade.png); background-repeat:repeat-x; background-position:bottom;resize:none;"','');?></td>
	<td><span class="error">*</span></td>
</tr> 

  
   <tr>
    <td width="185" height="25"  class="text" align="left">Mobile Number :</td>
    <td width="199"><input type="text" name="txtPhoneNumber" id="txtPhoneNumber"  value="<?=$_REQUEST[txtPhoneNumber]?>" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"  maxlength="10" /><td class="error">*</td></td>
</tr> 

 
 <tr>
    <td width="185" height="25"  class="text" align="left">STD Code/Contact No :</td>
    <td ><input type="text" name="txtStdCode" id="txtStdCode" value="<?=$_REQUEST[txtStdCode]?>" style="width:50px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"  maxlength="4" />
	<input type="text" name="txtContactNo" id="txtContactNo"  value="<?=$_REQUEST[txtContactNo]?>" style="width:146px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"  maxlength="8" /><td class="error">*</td></td>
</tr> 

<tr>
<td width="275" height="25"  class="text">Country :</td>
 <td  height="19">
 <select name="selCountry"  id="selCountry" style="width:200px;" onChange="changeState(this.value)">
   <option value="">Select country </option>
    <? $country_results=$db->getResults("select * from $countries");
	foreach($country_results as $countries123){
	?>
	<option value="<?=$countries123->country_id;?>" <?=$countries123->country_id==99?'selected':'';?>><?=$countries123->name?></option>
	
	<?
	
	}?>
 </select></td>
<td>&nbsp;</td>
</tr>

<tr>
<td width="275" height="25"  class="text">State :</td>
 <td  height="19"><div id="selDiv"><select name="selState" id="selState"  style="width:200px;">
   <option value="">Select State </option>
    <? $states_results=$db->getResults("select * from $states where country_id=99 order by name asc");
	foreach($states_results as $states123){
		if(($_REQUEST['selState'])==$states123->state_id)
		{?>
            <option value="<?=$states123->state_id;?>" selected="selected" ><?=$states123->name?></option>
        <? }
		else
		{
		?>
		<option value="<?=$states123->state_id;?>" <?=$states123->state_id=$alleducation->state_id?'selected':''?>><?=$states123->name?></option>
		<?
		}
	}?>
 </select> </div><div id="textDiv" style="display:none;"><input type="text" name="txtState"   value="" style="width:235px;" /></div></td>
 
 <td><span class="error">*</span></td>
 </tr>	
 
<tr>
<td width="275" height="25"  class="text">City :</td>
<td><input type="text" name="txtCity"   value="<?=$_REQUEST[txtCity]?>" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;" maxlength="20"/></td>
 <td><span class="error">*</span></td>
</tr>

<tr>
    <td width="185" height="25"  class="text" align="left">Pin Code :</td>
    <td width="199"><input type="text" name="txtPinCode" value="<?=$_REQUEST[txtPinCode]?>"  id="txtPinCode" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"  maxlength="6" />
    
    <td class="error">*</td></td>
</tr>  
 
  
<?php /*?><tr>
    <td width="185" height="25"  class="text" align="left">Father Name:</td>
    <td width="199"><input type="text" name="txtFathername" id="txtFathername"  value="<?=$_REQUEST[txtFathername]?>" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"/></td>
</tr>
	 <tr>
    <td width="185" height="25"  class="text" align="left">Marital Status:</td>
    <td width="199"><input type="text" name="txtMartialStatus" id="txtMartialStatus" value="<?=$_REQUEST[txtMartialStatus]?>" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;" maxlength="10"  /></td>
</tr>
 <tr>
    <td width="185" height="25"  class="text" align="left">Nationality:</td>
    <td width="199"><input type="text" name="txtNationality" id="txtNationality"  value="<?=$_REQUEST[txtNationality]?>" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"  maxlength="10" /></td>
</tr>
 <tr>
    <td width="185" height="25"  class="text" align="left">Languages Known:</td>
    <td width="199"><input type="text" name="txtLanguages" id="txtLanguages"  value="<?=$_REQUEST[txtLanguages]?>" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"  maxlength="30" /></td>
</tr>
<?php */?>

<?php /*?> <tr>
<td width="275" height="25"  class="text">Hobbies :</td>
<td><input type="text" name="txtHobbies"   value="<?=$_REQUEST[txtHobbies]?>" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;" /></td>
 <td><span class="error1">*</span></td>
</tr>
<?php */?>
 <tr>
<td width="214" height="25"  class="text">Type verification image:</td>
<td  height="23" colspan="2">
<input name="vercode" type="text" id="vercode" style="width:145px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"/>
<img src="Captcha.php" width="50" height="24" align="absbottom" /><br />
</tr>

  <tr>
    
    <td  height="10" width="275">&nbsp;</td>
    
    <td  height="10" colspan="2"></td></tr>
    
    <tr>
        <td  height="19" width="275">&nbsp;</td>
      <td  colspan="2"><?=$input->submitButton('regSubmit','','text', 'style="background-image:url(images/registerbg_new.png); background-repeat:no-repeat; width:73px; height:23px; border:none; margin:10px 20px 0px 10px;"');?>
       <?=$input->ResetButton('Reset','','text','style="background-image:url(images/resetbg_new.png); background-repeat:no-repeat; width:73px; height:23px; border:none; margin:10px 20px 0px 10px;');?>
       <?=$input->formEnd()?>
<!-- <input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="regSubmit"  value="Register"/>-->
           
<!--<input value="Reset" name="txtReset" style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;"/>-->
</td></tr>
 </td></tr>
   
</table>

</div>

<div class="recruittopcurve">
 <div class="reg_leftbtbg"></div>
 <div class="reg_midbtbg"></div>
 <div class="reg_rightbtbg"></div>
 </div>
</div>
<?php include "stmenuleft_content.php"; ?>
</div><!--end of right_maincontent-->

</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div> <!--end of main_div-->

</body>
</html><!--end of main_content-->

