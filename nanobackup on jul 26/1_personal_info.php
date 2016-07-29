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
			
header("Location:1_educations_info.php");


 				}	 
  
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<meta name="keywords" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<title>ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company</title>
<!--
  <link type="text/css" rel="stylesheet" href="calender/dhtmlgoodies_calendar.css" media="screen"/></link>
<script src="calender/dhtmlgoodies_calendar.js" type="text/javascript"></script>
<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
 <script type="text/javascript" src="lib/jquery.js"></script>
<script type='text/javascript' src='lib/jquery.autocomplete.js'></script>
<script type='text/javascript' src='lib/localdata.js'></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>

<link rel="stylesheet" href="style2012.css" type="text/css" />
<link rel="stylesheet" href="style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
-->

<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />
<script src="jsassets/jsassets.js" type="text/javascript"></script>
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
					
					 else if (txtForm.txtStdCode.value=='')
					 {
                  alert(" Please enter std code ");
		         txtForm.txtStdCode.focus();
				  return false;
                     }
					 
					else if(txtForm.txtStdCode.value.search(officephoneExp) == -1)
					{
					alert("Please enter std code with numerics");
					txtForm.txtStdCode.focus();
					return false;
					}
					
					  else if (txtForm.txtContactNo.value=='')
					 {
                  alert(" Please enter office contact number ");
		         txtForm.txtContactNo.focus();
				  return false;
                     }
					 
					  else if(txtForm.txtContactNo.value.search(officephoneExp) == -1)
					{
					alert("Please enter office contact number with numerics");
					txtForm.txtContactNo.focus();
					return false;
					}
					
					  else if (txtForm.txtAddress.value=='')
					 {
                  alert(" Please enter address for communication");
		         txtForm.txtAddress.focus();
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
		
		
		function updatepersonalinfo()
		{
		    //alert('asdf');
		   document.forms['formPersonal'].submit();
		}
		
    </script>

 

</head>

<body>
<div class="main_div">
<?php include("includes/2_jobseekerheader.php"); ?>
<div class="main_banner">
<!--<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />-->
</div><!--end of main_banner-->
<div class="main_content">



  <ul id="menu">
   <li><a href="1_personal_info.php" title="Personal Information"    class="current">Personal Information</a></li>
   <li><a href="1_educations_info.php" title="Academic Qualification">Academic Qualification</a></li>

      <li><a href="1_academic_info.php" title="Academic Projects">Academic Projects</a></li>
	     <li><a href="2_work_info.php" title="Work Experience">Work Experience</a></li>
		    <li><a href="1_career_info.php" title="Career Details">Career Details</a></li>
   
</ul>

<div class="ContentDiv">
<div style="float:left;">
<form name="formPersonal" id="formPersonal" value="formPersonal" action="1_personal_info.php" method="post" onsubmit="return general_Validation();">
<table width="100%"  cellpadding="4" cellspacing="0" border="0" style="padding:10px;" id="resumebuildercontent">
<tr><td colspan="2"><?=messaging($_REQUEST[msg]);?></td></tr>
<tr><td class="label" nowrap="nowrap" >First Name&nbsp;<span>*</span></td><td>
<input type="text" style="width:250px;" name="txtFirstName" id="txtFirstName" value="<?=$members->m_fname; ?>" /></td></tr>

<tr><td class="label" nowrap="nowrap">Last Name&nbsp;<span>*</span></td><td>
<input type="text" style="width:250px;" name="txtLastName" id="txtLastName" value="<?=$members->m_lname; ?>" /></td></tr>

<tr><td class="label" nowrap="nowrap">Email&nbsp;<span>*</span></td><td><?=$members->m_emailid;?><input type="hidden" name="txtEmail" style="width:250px;" value="<?=$members->m_emailid;?>" readonly="readonly" /></td></tr>
<tr><td class="label" nowrap="nowrap">Mobile Number&nbsp;<span>*</span></td><td><input type="text" name="txtPhoneNumber" style="width:250px;" id="txtPhoneNumber"   maxlength="10" value="<?=$members->m_phone; ?>" onKeyPress='return numbersonly(event);'  /></td></tr>
<tr><td class="label" nowrap="nowrap">STD Code/Contact Number&nbsp;<span>*</span></td><td><input type="text" name="txtStdCode" id="txtStdCode" style="width:120px;"  maxlength="4" value="<?=$members->m_std_code; ?>" onKeyPress='return numbersonly(event);' /><input type="text" name="txtContactNo" id="txtContactNo" style="width:126px;" maxlength="8" value="<?=$members->m_contact_number; ?>" onKeyPress='return numbersonly(event);' /></td></tr>
<tr><td class="label" nowrap="nowrap" valign="top">Address for Communication&nbsp;<span>*</span></td><td>

 <textarea name="txtAddress" id="txtAddress" rows="3" cols="34" ><?=$members->m_address?></textarea>
</td></tr>
<tr><td class="label" nowrap="nowrap">City&nbsp;<span>*</span></td><td>
<input type="text" style="width:250px;" name="txtCity" id="txtCity" value="<?=$members->m_city; ?>" />
</td></tr>
<tr><td class="label" nowrap="nowrap">Pin Code&nbsp;<span>*</span></td><td><input type="text" name="txtPinCode" id="txtPinCode"  style="width:250px;" value="<?=$members->m_pincode; ?>" maxlength="6" onKeyPress='return numbersonly(event);' /></td></tr>
<tr><td class="label" nowrap="nowrap">Country&nbsp;</td><td><select name="selCountry" id="selCountry" style="width:258px;"  onChange="changeState(this.value)">
 
   <!--<option value="">Select country </option>-->
    <? $country_results=$db->getResults("select * from $countries");
	foreach($country_results as $countries123){
	?>
	
	<option value="<?=$countries123->country_id;?>" <?=$countries123->country_id==$members->m_country?'selected':''?>><?=$countries123->name?></option>
	
	<?
	
	}?>
 </select></td></tr>
 <tr><td class="label" nowrap="nowrap">State&nbsp;<span>*</span></td><td><div id="selDiv" <?=$members->m_country==99?'style="display:block;"':'style="display:none;"'?>> 
	<select name="selState" id="selState" style="width:258px;">
	
 <!--  <option value="">Select State </option>-->
    <? $states_results=$db->getResults("select * from $states where country_id=99 order by name asc");
	foreach($states_results as $states123){
	?>
	<option value="<?=$states123->state_id;?>" <?=$states123->state_id==$members->m_state?'selected':''?>><?=$states123->name?></option>
	
	<?
	
	}?>
 </select></div><div id="textDiv" <?=$members->m_country==99?'style="display:none;"':'style="display:block;"'?>><input type="text" name="txtState"   value="<?=stripslashes($members->m_other_state);?>" style="width:250px;" /></div></td></tr>
<tr><td class="label" nowrap="nowrap">DOB&nbsp;<span>*</span></td><td><?=$input->DayBox('txtDay',$day_array,'style=width:235px;',$members->m_day,'');?>
	<?php /*?><select name="txtMonth" id="txtMonth"><option value="0">Month</option>
    <? for($m=1;$m<count($month_array);$m++){?>
    <option value="<?=$m?>" <?=$members->m_month==$m?'selected':''?>><?=$month_array[$m]?></option>
    <? }?>
    </select><?php */?>
	<?=$input->MonthBox('txtMonth',$month_array,'style=width:235px;',$members->m_month,'');?>
	<select name="txtYear" style="width:135px;" id="txtYear"><option value="0">Year</option>
    <? for($y=1970;$y<=date(Y);$y++){?>
    <option value="<?=$y?>" <?=$members->m_year==$y?'selected':''?>><?=$y?></option>
    <? }?>
    </select></td></tr>
<tr><td class="label" nowrap="nowrap">Gender&nbsp;<span>*</span></td><td>
 <?
 if($members->m_gender=='male')
 		$male='checked="checked"';
		else
		$female='checked="checked"';
		
 ?>
	<?=$input->radio_checked('txtGender','male','text',$male);?> Male&nbsp;&nbsp;&nbsp;
  
	<?=$input->radio_checked('txtGender','female','text',$female);?>&nbsp;Female </td></tr>
<tr><td class="label" nowrap="nowrap">Father Name&nbsp;</td><td><input type="text" style="width:250px;"  name="txtFatherName" id="txtFatherName"   value="<?=$members->m_father_name; ?>" /></td></tr> 
<tr><td class="label" nowrap="nowrap">Nationality&nbsp;</td><td><input type="text" name="txtNationality" style="width:250px;" id="txtNationality"  value="<?=$members->m_nationality; ?>" maxlength="10" /></td></tr>  
<tr><td class="label" nowrap="nowrap">Languages Known&nbsp;</td><td><input type="text" name="txtLanguages" style="width:250px;" id="txtLanguages"  value="<?=$members->m_languages; ?>" maxlength="30" />“eg. English, Kannada, Hind.. etc”</td></tr>  
<tr><td colspan="2" align="right"><input type="submit" name="infoUpdate" id="infoUpdate" value="Save and Continue"  class="blueButton">&nbsp;&nbsp;<input type="image" src="images/btn_reset.png" alt="Reset" align="absmiddle" /> </td></tr>
 </table>


</form>
		</div>
</div>

</div>
<!--end of right_maincontent-->
<? include "includes/footer.php" ?>
</div><!--end of main_content-->



</div><!--end of main_div-->
</body>
</html>