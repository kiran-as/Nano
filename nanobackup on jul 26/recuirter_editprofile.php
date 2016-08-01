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
   $loginauth=new checkingAuth();
   $loginauth->loginCheckrec();
   
   $rid=$_SESSION['r_id'];
   $sql=mysql_query("select * from $rec_table where r_id='$rid'");
   $fetch=mysql_fetch_array($sql);
  
  
  if(isset($_POST['regSubmit']))
  {
	  if(empty($_POST['txtPassword']))
	  {
		  $update_query="UPDATE $rec_table  set r_user_name	='".$ch->checkFields($_POST['txtUserName'])."',
	                                                  r_email ='".$ch->checkFields($_POST['txtEmail'])."',
													  r_company ='".$ch->checkFields($_POST['txtCompany'])."',
									                r_address ='".$ch->checkFields($_POST['txtAddress'])."',
													    r_pin  ='".$ch->checkFields($_POST['txtPinCode'])."',
														   r_city  ='".$ch->checkFields($_POST['txtCity'])."',
														      r_state  ='".$ch->checkFields($_POST['txtState'])."',
															     r_country  ='".$ch->checkFields($_POST['txtCountry'])."',
														r_web_url ='".$ch->checkFields($_POST['txtUrl'])."',
													  r_std ='".$ch->checkFields($_POST['txtSTDCode'])."',
														   r_contact ='".$ch->checkFields($_POST['txtContactNo'])."',
														   r_designation ='".$ch->checkFields($_POST['txtDesignation'])."',
														    r_mobile ='".$ch->checkFields($_POST['txtMobileNumber'])."',
															 r_comp_desc ='".$ch->checkFields($_POST['txtCompDesc'])."',
															  r_industry ='".$ch->checkFields($_POST['txtIndustry'])."',
														r_no_employes	='".$ch->checkFields($_POST['txtEmp'])."' WHERE r_id='$rid'"; 
					
		  
		 $result=$db->updateRecord($update_query);
		  
		  echo  "<script>document.location.href='recuirter_editprofile.php?success=2'</script>";
	  }
	  else
	  {
		  $update_query="UPDATE $rec_table  set r_password ='".$ch->checkFields(md5($_POST['txtPassword']))."' WHERE r_id='$rid'"; 
					
		  
		 $result=$db->updateRecord($update_query);
		 echo  "<script>document.location.href='recuirter_editprofile.php?success=2'</script>";
		          
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
<script type="text/javascript" src="<?=$server_url?>js/recruiter_validation.js"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="rv_main.css" rel="stylesheet" type="text/css" />
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
<div class="main_content">

  <div class="candidate_inner" >
    <ul>
    <a href="statistics.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Dash Board</div>
    <div class="nanohdrightdefault"></div></li></a>
    <a href="jobposting_form.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Manage Job Posting</div>
    <div class="nanohdrightdefault"></div></li></a>
   <!-- <a href="recruiter_menu.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Search</div>
    <div class="nanohdrightdefault"></div> </li></a>-->
    <a href="recuirter_editprofile.php" style="text-decoration:none;"><li style="border-bottom:1px solid #333; margin-bottom:-1px;">
    <div class="candidate_nanohdleft"></div>
    <div class="candidate_nanohdmid">Edit Profile</div>
    <div class="candidate_nanohdright"></div> </li></a>
    <a href="recruiter_logout.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Logout</div>
    <div class="nanohdrightdefault"></div> </li></a>
    </ul>
    
    </div>
<!--<div class="rightimg_left">
</div>
<div style="background-image:url(images/rightcontent_mid.jpg); width:960px; background-repeat:repeat-x; height:25px; line-height:20px; float:left;">
<table width="960px" style="line-height:15px;">
<tr>
<td width="134"><a href="candidate_details.php" class="dash_boardmenu"><strong style="color:#114981;font-size:16px;font-weight:bold;">Dash Board</strong></a></td>
<td width="103"><a href="recuirter_editprofile.php" class="dash_boardmenu" ><strong>Edit Profile</strong></a></td>
<td width="158"><a href="jobposting_form.php" class="dash_boardmenu" ><strong>Manage Job Posting</strong></a></td>-->
<!--<td width="92"><a href="statistics.php" class="dash_boardmenu" ><strong>Statistics</strong></a></td>
<td width="77"><a href="recruiter_menu.php" class="dash_boardmenu" ><strong>Search</strong></a></td>-->
<!--<td width="150"><a href="#" class="dash_boardmenu" ><strong>Change Password</strong></a></td>-->
<!--<td width="58" ><a href="recruiter_logout.php" class="dash_boardmenu" ><strong>Logout</strong></a></td>
<td width="152"><h3 class="h3class" style="float:right; text-align:right">Welcome <?=ucfirst($_SESSION['username']);?></h3></td>
</tr>
</table>
</div>
<div class="rightimg_right"></div>-->
</div>
<div style="float:left; width:980px; margin:0px; padding:0px; margin:10px 0px">

 <!--<div class="recruittopcurve">
 <div class="registration_top"></div>
 <div class="registration_mid"><h1 class="h1class_reg">Edit Profile</h1></div>
 <div class="registration_bottom"></div>
 </div>-->
 <div class="dashboardtop_bg">
 <div class="recruitleftbg"></div>
 <div class="dashboardmidbg"></div>
 <div class="recruitrightbg"></div>
 </div>
   <?=$input->formStart('txteditForm_rec','','onsubmit="return RecruitereditValidation();"');?>
   		<div style="float:left; width:725px; border:none; background-color:#ffffff; ">
   	    <table width="100%"  align="center" style="border-left:1px solid #736f6f; border-right:1px solid #736f6f; float:left; background-color:#f3e1e1;">    
  
	<tr>
    <td width="15">&nbsp;</td>
         <td  class="strong" style="padding:0px;"><h3 align="left" style="color:#114981;font-size:18px;font-weight:bold;margin:0px;padding-left:0px;">Edit Profile</h3>
    <td width="233">&nbsp;</td>
    <td width="224">&nbsp;</td>
    </tr>
    <tr>
       <td width="15" height="34" align="center"><span class="error">&nbsp;</span></td>
      <td width="233" height="34" align="left" class="error">
        <? $msg=new messages();
		  echo $msg->success($_REQUEST[success]); ?></td>
           <td width="233">&nbsp;</td>
      <td width="224"><span class="error"> * Indicates required field</span></td>
    </tr>
  
    <tr>  
  <td>&nbsp;</td>
<td width="233" height="25"  class="text"> Name: </td>
<td><input type="text" name="txtUserName" id="txtUserName" value="<? echo $fetch['r_user_name'];?>"  style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/><? //=$input->textBox('txtEmail',$_REQUEST[txtEmail],'','style=width:200px;','');?></td>
<td><span class="error">*</span></td>
</tr>
  


 
 <tr>  
  <td>&nbsp;</td>
<td width="233" height="25"  class="text"> Email ID: </td>
<td><input type="text" name="txtEmail" value="<? echo $fetch['r_email'];?>" readonly="readonly" onBlur="return validEmail(this.value)" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;""/><? //=$input->textBox('txtEmail',$_REQUEST[txtEmail],'','style=width:200px;','');?></td>
<td><span class="error">*</span></td>
</tr>




<tr>  
  <td>&nbsp;</td>
<td width="233" height="25"  class="text"> Password: </td>
<td><input type="password" name="txtPassword" value="" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/><? //=$input->textBox('txtEmail',$_REQUEST[txtEmail],'','style=width:200px;','');?></td>
</tr>          

<tr>  
  <td>&nbsp;</td>
<td width="233" height="25"  class="text">Confirm Password: </td>
<td><input type="password" name="txtConfirmPassword" value="" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/><? //=$input->textBox('txtEmail',$_REQUEST[txtEmail],'','style=width:200px;','');?></td>
</tr>

<tr>  
  <td>&nbsp;</td>
<td width="233" height="25"  class="text"> Company Name: </td>
<td><input type="text" name="txtCompany" value="<? echo $fetch['r_company'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/><? //=$input->textBox('txtEmail',$_REQUEST[txtEmail],'','style=width:200px;','');?></td>
<td><span class="error">*</span></td>
</tr>
  


<tr>  
  <td>&nbsp;</td>
<td width="233" height="25"  class="text"> Company Address: </td>
<td><input type="text" name="txtAddress" value="<? echo $fetch['r_address'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/><? //=$input->textBox('txtEmail',$_REQUEST[txtEmail],'','style=width:200px;','');?></td>
<td><span class="error">*</span></td>
</tr>   


<tr>  
  <td>&nbsp;</td>
<td width="233" height="25"  class="text"> Country: </td>
<td><input type="text" name="txtCountry" value="<? echo $fetch['r_country'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/><? //=$input->textBox('txtEmail',$_REQUEST[txtEmail],'','style=width:200px;','');?></td>
<td><span class="error">*</span></td>
</tr> 

<tr>  
  <td>&nbsp;</td>
<td width="233" height="25"  class="text"> State: </td>
<td><input type="text" name="txtState" value="<? echo $fetch['r_state'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;""/><? //=$input->textBox('txtEmail',$_REQUEST[txtEmail],'','style=width:200px;','');?></td>
<td><span class="error">*</span></td>
</tr> 


 
<tr>
 <td>&nbsp;</td>
<td width="233" height="25"  class="text">City:</td>
<td><input type="text" name="txtCity"  id="suggest0" value="<? echo $fetch['r_city'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/></td>
 <td><span class="error1">*</span></td>
</tr>

<tr>
 <td>&nbsp;</td>
<td width="233" height="25"  class="text">Pin Code:</td>
<td><input type="text" name="txtPinCode"  id="suggest0" value="<? echo $fetch['r_pin'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" /></td>
 <td><span class="error1">*</span></td>
</tr>

<tr>
 <td>&nbsp;</td>
<td width="233" height="25"  class="text">Designation:</td>
<td><input type="text" name="txtDesignation"  id="suggest0" value="<? echo $fetch['r_designation'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/></td>
 <td><span class="error1">*</span></td>
</tr>

<tr>
 <td>&nbsp;</td>
<td width="233" height="25"  class="text">STD Code/Contact No:</td>
<td><input type="text" name="txtSTDCode"  id="suggest0" value="<? echo $fetch['r_std'];?>" style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" /> <input type="text" name="txtContactNo"  id="suggest0" value="<? echo $fetch['r_contact'];?>" style="width:146px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/></td>
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
<td width="233" height="25"  class="text">Mobile Number:</td>
<td><input type="text" name="txtMobileNumber"  id="suggest0" value="<? echo $fetch['r_mobile'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/></td>
 <td><span class="error1">*</span></td>
</tr>  
       
 <tr>
 <td>&nbsp;</td>
<td width="233" height="25"  class="text">Web Site Url:</td>
<td><input type="text" name="txtUrl"  id="suggest0" value="<? echo $fetch['r_web_url'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" /></td>
 <td><span class="error1">*</span></td>
</tr> 
 
<tr>
 <td>&nbsp;</td>
<td width="233" height="25"  class="text">Company Description:</td>
<td><input type="text" name="txtCompDesc"  id="suggest0" value="<? echo $fetch['r_comp_desc'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" /></td>
 <td><span class="error1">*</span></td>
</tr> 

<tr>
 <td>&nbsp;</td>
<td width="233" height="25"  class="text">Type of Industry:</td>
<td><input type="text" name="txtIndustry"  id="suggest0" value="<? echo $fetch['r_industry'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/></td>
 <td><span class="error1">*</span></td>
</tr>

<tr>
 <td>&nbsp;</td>
<td width="233" height="25"  class="text">Number of Employees: </td><? $value=$fetch['r_no_employes'];?>
<td><?php /*?><input type="text" name="txtEmp"  id="suggest0" value="<? echo $fetch['r_no_employes'];?>" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/<?php */?>
<select name="txtEmp" id="txtEmp"  style="width:150px;" >  
 				<option value="< 10" <?php if ($value == '< 10') { echo ' selected="selected"'; } ?> >< 10</option>
              <option value="10-50" <?php if ($value == '10-50') { echo ' selected="selected"'; } ?> >10-50</option>
              <option value="50-100" <?php if ($value == '50-100') { echo ' selected="selected"'; } ?>>50-100</option>
              <option value="> 100"<?php if ($value == '> 100') { echo ' selected="selected"'; } ?>>> 100</option>
         
            </select></td>
 <td><span class="error1">*</span></td>
</tr>
     

  <tr>
    
    <td  height="19" width="15">&nbsp;</td>
     <td>&nbsp;</td>
    <td  height="19" colspan="2" >
    <input  type="submit" value="" name="regSubmit" style="background-image:url(images/updatebg_new.png); background-repeat:no-repeat; width:73px; height:23px; border:none; margin:10px 10px 0px 10px;" />&nbsp;<input type="button" value="" name="Reset"  onclick="window.location='statistics.php'" style="background-image:url(images/cancelbg_new.png); background-repeat:no-repeat; width:73px; height:23px; border:none; margin:10px 10px 0px 10px;"/>
      <? //=$input->submitButton('regSubmit','Register','button');?>
      <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="regSubmit"  value="Register"/>-->
            <? //=$input->ResetButton('Reset','Reset','button');?>
     <!-- <input value="Reset" name="txtReset" style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="reset" />-->      </td>
   </tr>
</table>
    </form>
</div>
<div class="dashboardtop_bg">
 <div class="recruitleftbtbg"></div>
 <div class="dashboardmidbtbg"></div>
 <div class="recruitrightbtbg"></div>
 </div>
</div><!--end of right_maincontent-->

<?php //include "stmenuleft_content.php"; ?>
</div><!--end of main_content-->

</div>
<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>