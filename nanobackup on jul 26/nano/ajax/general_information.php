<? include_once('../db/dbconfig.php');
   include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  

  $input=new inputFields();	
  $ch=new checkInputFields();	
  $db=new dataBase();
  $db->connectDB(); 				
				
 $query = "SELECT * FROM $members_table where m_id='".$_SESSION[m_id]."'"; 
  $edu_toal_count=count($query);
 
  $members_result=$db->getResults($query);
  foreach($members_result as $members){}				
 ?>

	 
 <script type="text/javascript">
  
			function isalpha(str)
	{
 	var re = /[^a-zA-Z' ']/g
  	if (re.test(str)) return false;
 	return true;
	
	}			
		
	  	
			function general_Validation(id)
			{
				//alert("sfgfd");
						
			var txtForm=document.txtForm1;	
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
					
					 else if(txtForm.txtDay.value=='')
					 {
                  alert(" Please  select day for date Of birth");
		         txtForm.txtDay.focus();
				  return false;
                     }
					  else if (txtForm.txtMonth.value=='')
					 {
                  alert(" Please  select month for date Of birth");
		         txtForm.txtMonth.focus();
				  return false;
                     }
					  else if (txtForm.txtYear.value=='')
					 {
                  alert(" please  select year for date Of birth");
		         txtForm.txtYear.focus();
				  return false;
                     }
					 
			        	
								else if(j==0)
                             {
	                            alert("Please select gender"); 
	
	                               return false;
                                    }
 
 
					  else if (txtForm.txtAddress.value=='')
					 {
                  alert(" Please enter address for communication");
		         txtForm.txtAddress.focus();
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
					 else if (txtForm.selCountry.value=='')
					 {
                  alert(" Please enter country ");
		         txtForm.selCountry.focus();
				  return false;
                     }
				 else if (txtForm.selState.value=='' && txtForm.txtOtherState.value=='')
					 {
                  alert(" Please enter State ");
		         txtForm.selState.focus();
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
 


   <?=$input->formStart('txtForm1','','onSubmit="return general_Validation(\'\');"');?>

        <table  style="float:left;"> 
		  <tr>
	<td width="196" height="1"  style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" colspan="2"><b>Resume Bulider:Steps - 1/5 </b></td> <!--
      <td colspan="2" valign="bttom"   align="right"><a href=job_seeker_menu.php?tab=5 style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" >&nbsp;&nbsp;<img src="images/preview.png" border="0" align="absmiddle"/></a></td>
    </tr> -->
 
    <tr>
	<td style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" colspan="2">Personal Information</td>
	  <td width="236" align="right"  class="error">* Indicates required field</td>
    </tr>
    <tr>
      <td colspan="3"  class=""><span class="error"></span><a href="job_seeker_menu.php?tab=1" ></a></td>
      </tr>
	
     <tr>
	 
	 <td colspan="5" class="error" align="center" style="padding-left:100px;"><?=messaging($_REQUEST[msg]);?></td>
	     
    </tr> 
	<tr>
	 <td colspan = "3"><div id="" style="float:left; "></div>
	 <div id="id_display"  <?=$edu_toal_count==0?'style="display:none;"':'style="display:block;"'; ?>/></td> 
    <tr>
 
    <tr>
    <td width="196" height="1"  class="text">First Name : </td>
    <td width="203" ><?=$input->textBox('txtFirstName',$members->m_fname,'text','style=width:200px;','');?></td>
	<td class="error1">*</td>
	</tr>  
<tr>
 <td width="196" height="1"  class="text">Last Name : </td>
 <td width="203"><?=$input->textBox('txtLastName',$members->m_lname,'text','style=width:200px;','');?></td>
 <td class="error1">*</td>
 </tr>

<tr>
 <td width="196" height="1"  class="text">Email : </td>
 <td><input type="text" name="txtEmail" value="<?=$members->m_emailid;?>" readonly="readonly"  style="width:200px;"/></td>
 <td class="error1">*</td>
</tr>

<tr>
 <td width="196" height="1"  class="text">DOB : </td>
 <td width="203">
 	<?=$input->DayBox('txtDay',$day_array,'style=width:235px;',$members->m_day,'');?><?=$input->MonthBox('txtMonth',$month_array,'style=width:235px;',$members->m_month,'');?><?=$input->YearBox('txtYear',$year_array,'style=width:235px;',$members->m_year,'');?></td>
<td class="error1">*</td>
</tr>



<tr>
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
<?php /*?>
<tr>
 <td width="144" height="1"  class="text">Father Name :</td>
 <td  height="">
<?=$input->textBox('txtFatherName',$members->m_father_name,'text','style=width:200px;','');?></tr>
*/?>
<tr>
 <td width="196" height="1"  class="text">Address for Communication :</td>
 <td  width="203"><?=$input->textArea('txtAddress',$members->m_address,'text','style=width:200px;','');?></td>
 <td class="error1">*</td>
</tr>
<tr>
    <td width="196" height="25"  class="text" align="left">Father Name:</td>
    <td width="203"><input type="text" name="txtFatherName" id="txtFatherName" style="width:200px;"  value="<?=$members->m_father_name; ?>" /></td>
</tr>
<tr>
    <td width="196" height="25"  class="text" align="left">Marital Status:</td>
    <td width="203"><input type="text" name="txtMartialStatus" id="txtMartialStatus" style="width:200px;"  value="<?=$members->m_martial_status; ?>" /></td>
</tr>
 <tr>
    <td width="196" height="25"  class="text" align="left">Nationality:</td>
    <td width="203"><input type="text" name="txtNationality" id="txtNationality" style="width:200px;"  value="<?=$members->m_nationality; ?>" maxlength="10" /></td>
</tr>
 <tr>
    <td width="196" height="25"  class="text" align="left">Languages :</td>
    <td width="203"><input type="text" name="txtLanguages" id="txtLanguages" style="width:200px;" value="<?=$members->m_languages; ?>" maxlength="30" /></td>
</tr>

<tr>
 <td width="196" height="1"  class="text">Hobbies :</td>
 <td  width="203"><?=$input->textArea('txtHobbies',$members->m_hobbies,'text','style=width:200px;','');?></td>
 
</tr>

 <tr>
    <td width="196" height="25"  class="text" align="left">Pin Code :</td>
    <td width="203"><input type="text" name="txtPinCode" id="txtPinCode" style="width:200px;" value="<?=$members->m_pincode; ?>" maxlength="6" /><td class="error">*</td>
</tr>  
  
   <tr>
    <td width="196" height="25"  class="text" align="left">Mobile Number :</td>
    <td width="203"><input type="text" name="txtPhoneNumber" id="txtPhoneNumber" style="width:200px;"  maxlength="10" value="<?=$members->m_phone; ?>"  /></td><td class="error">*</td>
</tr> 


 <tr>
    <td width="196" height="25"  class="text" align="left">STD Code/Contact No :</td>
    <td  width="203"><input type="text" name="txtStdCode" id="txtStdCode" style="width:35px;"  maxlength="4" value="<?=$members->m_std_code; ?>" />
	<input type="text" name="txtContactNo" id="txtContactNo" style="width:155px;" maxlength="8" value="<?=$members->m_contact_number; ?>" /></td><td class="error">*</td>
</tr> 
<!--
<tr>
 <td width="144" height="1"  class="text">State : </td>
 <td  height="">
<?//=$input->textBox('txtCity',$members->m_city,'text','style=width:200px;','');?>&nbsp;&nbsp;&nbsp;<span class="error1">*</span>

 
	-->


<tr>
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
<td width="196" height="25"  class="text">City :</td>
<td  width="203"><?=$input->textBox('txtCity',$members->m_city,'','style=width:200px;','');?></td>
<td class="error1">*</td>
</tr>         

 <tr>
   <td  height="19">&nbsp;</td>
    <td >&nbsp;</td>
 </tr>
 
 <tr>
   <td  height="19">&nbsp;</td>
   <td  width="203">
  	  <input type="submit" name="infoUpdate" id="infoUpdate" value="Update"></td>

  <td >&nbsp;</td>
 </tr>
 <tr>   
    <td  height="19" width="196">&nbsp;</td>
    
    <td  height="19"> <td  align="right" ><a href="job_seeker_menu.php?tab=1" ><img src="images/continue.png" border="0" /></a></td> 
   </tr>


        </td>
        </tr>
        
        </table>

   <?=$input->formEnd?>
   
