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
</div><!--end of rightimg_top-->
<div class="recruiterinner_content">

<div class="recruittopcurve">
 <div class="registration_top"></div>
 <div class="registration_mid"><h1 class="h1class_reg">Job Seeker Registration</h1></div>
 <div class="registration_bottom"></div>
 </div>
 	<div style="float:left; width:600px; border:none; background-color:#ffffff; border-left:1px solid #736f6f; border-right:1px solid #736f6f;">
   
   	   <table width="100%" align="center" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; padding-left:10px;">     
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
  <tr>
<td width="214" height="25"  class="text">Type verification image:</td>
<td  height="23" colspan="2">
<input name="vercode" type="text" id="vercode" style="width:145px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"/>
<img src="Captcha.php" width="50" height="24" align="absbottom" /><br /></td>
</tr>

  <tr>
    
    <td  height="19" width="275">&nbsp;</td>
    
    <td  height="19" colspan="2">
    
      <?=$input->submitButton('regSubmit','','text', 'style="background-image:url(images/registerbg_new.png); background-repeat:no-repeat; width:73px; height:23px; border:none; margin:10px 20px 0px 10px;"');?>

            <?=$input->ResetButton('Reset','','text','style="background-image:url(images/resetbg_new.png); background-repeat:no-repeat; width:73px; height:23px; border:none; margin:10px 20px 0px 10px;"');?>

    </td></tr>
    
     </table>
     </div>
     
  <div class="recruittopcurve">
 <div class="reg_leftbtbg"></div>
 <div class="reg_midbtbg"></div>
 <div class="reg_rightbtbg"></div>
 </div>
  </div>

  
</div><!--end of right_maincontent-->
<?php include "stmenuleft_content.php" ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>