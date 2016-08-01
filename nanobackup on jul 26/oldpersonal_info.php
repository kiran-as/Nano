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
   
 $query = "SELECT * FROM $members_table where m_id='".$_SESSION[m_id]."'"; 
  $edu_toal_count=count($query);
 
  $members_result=$db->getResults($query);
  foreach($members_result as $members){}	
 
 if(isset($_POST['infoUpdate']))
 {
$info_query="update $members_table  set m_father_name='".$ch->checkFields($_POST['txtFatherName'])."',
								      m_address='".$ch->checkFields($_POST['txtAddress'])."',
								      m_fname='".$ch->checkFields($_POST['txtFirstName'])."',
								      m_lname='".$ch->checkFields($_POST['txtLastName'])."',
								    m_martial_status ='".$ch->checkFields($_POST['txtMartialStatus'])."',
									m_hobbies='".$ch->checkFields($_POST['txtHobbies'])."',
									m_city='".$ch->checkFields($_POST['txtCity'])."', 
									m_state='".$ch->checkFields($_POST['selState'])."', 
									m_other_state='".$ch->checkFields($_POST['txtState'])."', 
									m_country='".$ch->checkFields($_POST['selCountry'])."', 
									m_phone='".$ch->checkFields($_POST['txtPhoneNumber'])."', 
									m_objective='".$ch->checkFields($_POST['areaObjective'])."', 
									m_skills='".$ch->checkFields($_POST['areaSkills'])."', 
									m_std_code ='".$ch->checkFields($_POST['txtStdCode'])."',
									m_nationality='".$ch->checkFields($_POST['txtNationality'])."',
									m_languages ='".$ch->checkFields($_POST['txtLanguages'])."',
									m_pincode ='".$ch->checkFields($_POST['txtPinCode'])."',
									m_gender ='".$ch->checkFields($_POST['txtGender'])."',
									m_day ='".$ch->checkFields($_POST['txtDay'])."',
									m_month ='".$ch->checkFields($_POST['txtMonth'])."',
									m_year ='".$ch->checkFields($_POST['txtYear'])."',
									m_contact_number ='".$ch->checkFields($_POST['txtContactNo'])."',
									m_dob='".$ch->checkFields($txtDat)."' where m_id='".$_SESSION[m_id]."'";
									
						
 $result=$db->insertRecord($info_query);
			
//header("Location:personal_info.php?msg=2");
header("Location:educations_info.php");

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
	 
 <script type="text/javascript">
  
			function isalpha(str)
	{
 	var re = /[^a-zA-Z' ']/g
  	if (re.test(str)) return false;
 	return true;
	
	}			
		
	  	
			function general_Validation()
			{
				//alert("sfgfd");
						
			var txtForm=document.formPersonal;	
                    var j=0;
 
                           for(var i=0;i<document.getElementsByName("txtGender").length;i++)
                             {
	                           if(txtForm.txtGender[i].checked)
	                             {

                             j++;		
	                         }

	
                                }
 
 
 

				var emailExp = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
		//		var phoneExp  =/^([0-9]{10})/;
				var officephoneExp =/^([0-9])/;
			
			
				if(txtForm.txtFirstName.value=='')
					{
					alert(" Please enter first name");
					txtForm.txtFirstName.focus();
					return false;
					}
					 else if(txtForm.txtLastName.value=='')
					{
					alert(" Please enter last name");
					txtForm.txtLastName.focus();
					return false;
					}
					else if(txtForm.txtEmail.value=='')
					{
					alert(" Please enter email address");
					txtForm.txtEmail.focus();
					return false;
					}
					else if(txtForm.txtEmail.value.search(emailExp) == -1)
					{
					alert("Please enter valid email address");
					txtForm.txtEmail.focus();
					return false;
					}
					  else if (txtForm.txtPhoneNumber.value=='')
					 {
                  alert(" Please enter mobile number ");
		         txtForm.txtPhoneNumber.focus();
				  return false;
                     }
					 
					 
					 else if(txtForm.txtPhoneNumber.value.search(officephoneExp) == -1)
					{
					alert("Please enter  mobile number with numerics" );
					txtForm.txtPhoneNumber.focus();
					return false;
					}
					
				
					
							else if (txtForm.txtCity.value =='')
					 {
						  alert(" Please enter city ");
		        		 txtForm.txtCity.focus();
				  return false;
					 }
                 else if (isalpha(txtForm.txtCity.value)==false)
							{
							alert("Please enter city with alphabets");	
							txtForm.txtCity.focus();
							return false;
							}
                    else if (txtForm.txtPinCode.value=='')
					 {
                  alert(" Please enter pin code");
		         txtForm.txtPinCode.focus();
				  return false;
                     }
					 
					 else if (txtForm.txtPinCode.value.search(officephoneExp) == -1)
					 {
                  alert(" Please enter pin code with numerics ");
		         txtForm.txtPinCode.focus();
				  return false;
                     }
					   
					   				
					
				 else if (txtForm.selState.value=='' && txtForm.txtOtherState.value=='')
					 {
                  alert(" Please enter State ");
		         txtForm.selState.focus();
				  return false;
                     }
					 else if (txtForm.selCountry.value=='')
					 {
                  alert(" Please enter country ");
		         txtForm.selCountry.focus();
				  return false;
                     }
					
					
					
					
					
					 else if(txtForm.txtDay.value=='')
					 {
                  alert(" Please  select day for date Of birth");
		         txtForm.txtDay.focus();
				  return false;
                     }
					  else if (txtForm.txtMonth.value=='Month')
					 {
                  alert(" Please  select month for date Of birth");
		         txtForm.txtMonth.focus();
				  return false;
                     }
					  else if (txtForm.txtYear.value==0)
					 {
                  alert(" Please  select year for date Of birth");
		         txtForm.txtYear.focus();
				  return false;
                     }
					 
			        	
								else if(j==0)
                             {
	                            alert("Please select gender"); 
	
	                               return false;
                                    }
 
 
					
					 
					
					
							   
                
					
		
		}
		
    </script>
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
<h3 class="h3class">Resume Builder</h3>
</div>
<div class="rightimg_right">
</div>
</div>--><!--end of rightimg_top-->
 <div class="rightinner_content_inner">
<div class="step-main-Div" >

        <div class="recruit_inner">
       <ul>
       <li>
       <div class="nanohdleft"></div>
       <div class="nanohdmid"><img src="images/personal_info.png" width="127" height="32" align="absmiddle" border="0" style=" margin-top:8px;" /></div>
       <div class="nanohdright"></div>
       </li>
      
       <a href="educations_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Academic Qualification</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
       <a href="academic_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Academic Projects </div>
       <div class="nanohdrightdefault"></div>
       </li></a>
       <a href="work_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Work Experience</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
	    <a href="career_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Career Details</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
       </ul>
      
     
       
<!--<div class="step-inner-Div">
<table width="100%"  align="center" cellpadding="4" border="0"  cellspacing="0"style="font-size:12px; text-align:center; color:#ffffff; font-family:Arial, Helvetica, sans-serif;">   
  <tr class="loginheaderclass">
  <td class="stepclass"><a href="personal_info.php">Step 1</a></td>
  <td class="stepstyle"><a href="educations_info.php">Step 2</a></td>
  <td class="stepstyle"><a href="inner_design3.php">Step 3</a></td>
  <td class="stepstyle"><a href="inner_design4.php">Step 4</a></td>
   <td class="stepstyle"><a href="inner_design5.php">Resume</a></td>
  </tr>
</table>
</div>-->
</div>

<div class="step-inner-Div" >
<br/>
<div class="step-sub-tabs">
<div class="innertab1_mid">Personal Information</div>
<div class="innertab1_right"></div>
</div>

<div class="step-sub-tabs" style="float:right;">
<div class="innertab1_left"></div>
<div class="innertab1_mid">Resume Builder:Steps - 1/5 </div>
</div>

<div style="float:left; width:723px; background-image:url(images/innertab_bg.png); background-position:bottom; background-repeat:repeat-x;">
<form name="formPersonal" id="formPersonal"  action="" method="post" onsubmit="return general_Validation();">
<table width="100%"  cellpadding="4" cellspacing="0">
   
	
     <tr>
	 
	 <td colspan="5" class="error" align="center" style="padding-left:100px;"><?=messaging($_REQUEST[msg]);?></td>
    </tr> 

    <tr>
    <td>&nbsp;</td>
    <td width="196" height="1"  class="text">First Name : </td>
    <td width="203" ><?=$input->textBox('txtFirstName',$members->m_fname,'text','style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
	<td width="236" class="error1">*</td>
	</tr>  
<tr>
 <td>&nbsp;</td>
 <td width="196" height="1"  class="text">Last Name : </td>
 <td width="203"><?=$input->textBox('txtLastName',$members->m_lname,'text','style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
 <td class="error1">*</td>
 </tr>

<tr>
<td>&nbsp;</td>
 <td width="196" height="1"  class="text">Email : </td>
 <td><input type="text" name="txtEmail" value="<?=$members->m_emailid;?>" readonly="readonly"  style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"/></td>
 <td class="error1">*</td>
</tr>
 <tr>
   <td>&nbsp;</td>
    <td width="196" height="25"  class="text" align="left">Mobile Number :</td>
    <td width="203"><input type="text" name="txtPhoneNumber" id="txtPhoneNumber" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  maxlength="10" value="<?=$members->m_phone; ?>"  /></td><td class="error">*</td>
</tr> 


 <?php /*?><tr>
 <td>&nbsp;</td>
    <td width="196" height="25"  class="text" align="left">STD Code/Contact No :</td>
    <td  width="203"><input type="text" name="txtStdCode" id="txtStdCode" style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" maxlength="4" value="<?=$members->m_std_code; ?>" />
	<input type="text" name="txtContactNo" id="txtContactNo" style="width:145px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" maxlength="8" value="<?=$members->m_contact_number; ?>" /></td><td class="error">*</td>
</tr><?php */?> 

<?php /*?>
<tr>
 <td width="144" height="1"  class="text">Father Name :</td>
 <td  height="">
<?=$input->textBox('txtFatherName',$members->m_father_name,'text','style=width:200px;','');?></tr>
*/?>
<tr>
<td>&nbsp;</td>
 <td width="196" height="1" valign="top"  class="text">Address for Communication :</td>
 <td  width="203"><?=$input->textArea('txtAddress',$members->m_address,'text','style="width:200px; height:80px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x; background-position:top;resize:none;"','');?></td>
 <td class="error1">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td width="196" height="25"  class="text">City :</td>
<td  width="203"><?=$input->textBox('txtCity',$members->m_city,'','style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
<td class="error1">*</td>
</tr>         
<tr>
 <td>&nbsp;</td>
    <td width="196" height="25"  class="text" align="left">Pin Code :</td>
    <td width="203"><input type="text" name="txtPinCode" id="txtPinCode" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=$members->m_pincode; ?>" maxlength="6" /><td class="error">*</td>
</tr>



<tr>
<td>&nbsp;</td>
<td width="196" height="25"  class="text">State :</td>
<td  height="19"><div id="selDiv" <?=$members->m_country==99?'style="display:block;"':'style="display:none;"'?>> 
	<select name="selState" id="selState" style="width:150px;">
	
 <!--  <option value="">Select State </option>-->
    <? $states_results=$db->getResults("select * from $states where country_id=99 order by name asc");
	foreach($states_results as $states123){
	?>
	<option value="<?=$states123->state_id;?>" <?=$states123->state_id==$members->m_state?'selected':''?>><?=$states123->name?></option>
	
	<?
	
	}?>
 </select></div><div id="textDiv" <?=$members->m_country==99?'style="display:none;"':'style="display:block;"'?>><input type="text" name="txtState"   value="<?=stripslashes($members->m_other_state);?>" style="width:200px;" /></div></td>
 <td class="error1">*</td>
 </tr>


<tr>
<td>&nbsp;</td>
<td width="196" height="25"  class="text">Country :</td>
 <td  height="19"><select name="selCountry" id="selCountry" style="width:150px;" onChange="changeState(this.value)">
 
   <!--<option value="">Select country </option>-->
    <? $country_results=$db->getResults("select * from $countries");
	foreach($country_results as $countries123){
	?>
	
	<option value="<?=$countries123->country_id;?>" <?=$countries123->country_id==$members->m_country?'selected':''?>><?=$countries123->name?></option>
	
	<?
	
	}?>
 </select></td>
 <td class="error1">&nbsp;</td>
</tr> 

  <tr>
<td>&nbsp;</td>
 <td width="196" height="1"  class="text">DOB : </td>
 <td width="203">
 	<?=$input->DayBox('txtDay',$day_array,'style=width:235px;',$members->m_day,'');?>
	<?php /*?><select name="txtMonth" id="txtMonth"><option value="0">Month</option>
    <? for($m=1;$m<count($month_array);$m++){?>
    <option value="<?=$m?>" <?=$members->m_month==$m?'selected':''?>><?=$month_array[$m]?></option>
    <? }?>
    </select><?php */?>
	<?=$input->MonthBox('txtMonth',$month_array,'style=width:235px;',$members->m_month,'');?>
	<select name="txtYear" id="txtYear"><option value="0">Year</option>
    <? for($y=1970;$y<=date(Y);$y++){?>
    <option value="<?=$y?>" <?=$members->m_year==$y?'selected':''?>><?=$y?></option>
    <? }?>
    </select></td>
<td class="error1">*</td>
</tr>



<tr>
<td>&nbsp;</td>
 <td width="196" height="1"  class="text">Gender : </td>
 <td width="203">
 
 <?
 if($members->m_gender=='male')
 		$male='checked="checked"';
		else
		$female='checked="checked"';
		
 ?>
	<?=$input->radio_checked('txtGender','male','text',$male);?> Male&nbsp;&nbsp;&nbsp;
  
	<?=$input->radio_checked('txtGender','female','text',$female);?>&nbsp;Female </td>
	<td class="error1">*</td>
</tr>
 

 

<tr>
<td>&nbsp;</td>
    <td width="196" height="25"  class="text" align="left">Father Name:</td>
    <td width="203"><input type="text" name="txtFatherName" id="txtFatherName" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  value="<?=$members->m_father_name; ?>" /></td>
</tr>
<?php /*?><tr>
<td>&nbsp;</td>
    <td width="196" height="25"  class="text" align="left">Marital Status:</td>
    <td width="203"><input type="text" name="txtMartialStatus" id="txtMartialStatus" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  value="<?=$members->m_martial_status; ?>" /></td>
</tr><?php */?>
 <tr>
 <td>&nbsp;</td>
    <td width="196" height="25"  class="text" align="left">Nationality:</td>
    <td width="203"><input type="text" name="txtNationality" id="txtNationality" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  value="<?=$members->m_nationality; ?>" maxlength="10" /></td>
</tr>
 <tr>
 <td>&nbsp;</td>
    <td width="196" height="25"  class="text" align="left">Languages Known:</td>
    <td width="203"><input type="text" name="txtLanguages" id="txtLanguages" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=$members->m_languages; ?>" maxlength="30" /></td><td  >“eg. English, Kannada, Hind.. etc”</td>
</tr>
<?php /*?>
<tr>
<td>&nbsp;</td>
 <td width="196" height="1" valign="top" class="text">Hobbies :</td>
 <td  width="203"><? //=$input->textArea('txtHobbies',$members->m_hobbies,'text','style="width:200px; height:80px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x; background-position:top;resize:none;"','');?></td>
</tr>

   
  
   <tr>
   <td>&nbsp;</td>
    <td width="196" height="25"  class="text" align="left">Mobile Number :</td>
    <td width="203"><input type="text" name="txtPhoneNumber" id="txtPhoneNumber" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  maxlength="10" value="<? //=$members->m_phone; ?>"  /></td><td class="error">*</td>
</tr> 


 <tr>
 <td>&nbsp;</td>
    <td width="196" height="25"  class="text" align="left">STD Code/Contact No :</td>
    <td  width="203"><input type="text" name="txtStdCode" id="txtStdCode" style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" maxlength="4" value="<? //=$members->m_std_code; ?>" />
	<input type="text" name="txtContactNo" id="txtContactNo" style="width:145px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" maxlength="8" value="<? //=$members->m_contact_number; ?>" /></td><td class="error">*</td>
</tr> 

<tr>
 <td width="144" height="1"  class="text">State : </td>
 <td  height="">
<?//=$input->textBox('txtCity',$members->m_city,'text','style=width:200px;','');?>&nbsp;&nbsp;&nbsp;<span class="error1">*</span>

 
	

<?php */?>



 <tr>
 <td>&nbsp;</td>
   <td  height="19">&nbsp;</td>
    <td >&nbsp;</td>
 </tr>
 
 <tr>
 <td>&nbsp;</td>
   <td  height="19">&nbsp;</td>
   <td>
  	 <!-- <input type="submit" name="infoUpdate" id="infoUpdate" value="" class="button_new">-->
	  <input type="submit" name="infoUpdate" id="infoUpdate" value="" class="button_sc">
	 </td>
  <td >&nbsp;</td>
 </tr>
 <tr> 
 <td>&nbsp;</td>  
    <td  height="19" width="196">&nbsp;</td>
    
    <td  height="19"> <td  align="right" ><?php /*?><a href="educations_info.php" ><img src="images/continue.png" border="0" /></a><?php */?></td> 
   </tr>


        </td>
        </tr>
        </table></form>
		</div>
</div>
</div>
</div>
</div><!--end of right_maincontent-->
<?php include "stmenuleft_content.php"; ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>