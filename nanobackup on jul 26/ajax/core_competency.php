<? include_once('../db/dbconfig.php');
   include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
   include_once('../classes/messages.php');  
   $check=new checkingAuth();
   $check->loginCheck();   
   $input=new inputFields();	
   $ch=new checkInputFields();	
   $db=new dataBase();
   $db->connectDB(); 
 ?>
  

 
  <script type="text/javascript">
  

	  	
			function core_Validation(id)
			{
			
			if($("#txtTitle"+id).val()=='')
			{
					alert("Please enter title");
					$("#txtTitle"+id).focus();
					return false;
			}		
			
			if($("#Qualification"+id).val()=='')
			{
					alert("Please enter Qualification");
					$("#Qualification"+id).focus();
					return false;	
			}		
			
			if($("#Professional"+id).val()=='')
			{
					alert("Please enter Professional skills");
					$("#Professional"+id).focus();
					return false;
			}		
			
			if($("#Technical"+id).val()=='')
			{
					alert("Please enter Technical skills");
					$("#Technical"+id).focus();
					return false;	
			}		
			
			
			
			if($("#Tools"+id).val()=='')
			{
					alert("Please enter Tools skills");
					$("#Tools"+id).focus();
					return false;			
			}		
			

			}
    </script>
 
	 
<table width="643"  > 
<tr><td   align="left"  class="error1"><?=messaging($_REQUEST[msg])?></td></tr>
<tr><td>
<?=$input->formStart('infoForm','','onSubmit="return core_Validation(\'\');"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="addDiv" <?=$_REQUEST[action]=='new'?'style="display:block;"':'style="display:none;"'?>><table width="643">
<tr><td  colspan="2">Add Competency Details</td></tr>	  
<tr>
     <td>&nbsp;</td>
     <td ><div align="center"><span class="error">&nbsp;</span></div></td>
</tr>

<tr>
     <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>

<tr>
    <td width="159" height="1"  class="text" align="left">Title :</td>
    <td  height="" width="472"><input type="text" name="txtTitle" id="txtTitle" style="width:320px;" /><span class="error">*</span></td>
</tr>          
 <tr>
    <td width="159" height="1"  class="text" align="left" valign="top">Qualification Summary:</td>
    <td  height="23" colspan="2">
<textarea rows="4" cols="48" name="Qualification" id="Qualification"></textarea><span class="error">*</span>
</td> 
</tr>

<tr>
    <td width="159" height="1"  class="text" align="left" valign="top">Professional Skills:</td>
    <td  height="20" colspan="2">
<textarea rows="2" cols="48" name="Professional" id="Professional"></textarea><span class="error">*</span>
</td> 
</tr>
<tr>
             <td width="159" height="1"  class="text" align="left" valign="top">Technical Skills: </td>
    <td  height="23" colspan="2">
<textarea rows="2" cols="48" name="Technical" id="Technical"></textarea><span class="error">*</span>
</td>
</tr>

<tr>
 <td width="159" height="1"  class="text" align="left" valign="top">Tools Used : </td>
 <td  height="23" colspan="2">
<textarea rows="2" cols="48" name="Tools" id="Tools"></textarea><span class="error">*</span>
</td>
</tr>  
<tr>
    
    <td  height="19" width="159">&nbsp;</td>
    
    <td  height="19" width="472"><?=$input->submitButton('coreInsert','Save','button');?>&nbsp;&nbsp;&nbsp;<input type="submit" name="coreInsert" value="Save and Add Next" class="button" onclick="document.getElementById('hdNext').value=1;" style="width:200px" /></td></tr>

	
</table>
 </div>
<?=$input->formEnd()?> 
 </td></tr>
 <tr><td align="right"><div id="id_display"><a href="#" onclick="document.getElementById('addDiv').style.display='block';document.getElementById('id_display').style.display='none';return false;" ><img src="images/add_more.png" border="0" /></a></div></td></tr>
 <tr><td>
 <?   $query_edu = "SELECT * FROM $core_competecny_table where m_id='".$_SESSION[m_id]."' order by cc_id desc"; 
      $projects_result=$db->getResults($query_edu);
      
      
    foreach($projects_result as $projects){?> 
    <?=$input->formStart('infoForm','','onSubmit="return core_Validation('.$projects->cc_id.');"');?>
    <input type="hidden" name="cc_id" value="<?=$projects->cc_id;?>" />
   <table width="643">
<tr>
     <td>&nbsp;</td>
     <td ><div align="center"><span class="error">&nbsp;</span></div></td>
</tr>

<tr>
     <td>&nbsp;<? //=$_REQUEST[msg]?></td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>

<tr>
    <td width="159" height="1"  class="text" align="left">Title :</td>
    <td  height="" width="472">
	<input type="text" name="txtTitle" id="txtTitle<?=$projects->cc_id;?>" style="width:320px;" value="<?=$projects->cc_title;?>" />
<span class="error">*</span></td>

</tr>          
 <tr>
    <td width="159" height="1"  class="text" align="left" valign="top">Qualification Summary:</td>
    <td  height="23" colspan="2">
<textarea rows="4" cols="48" name="Qualification" id="Qualification<?=$projects->cc_id;?>"><?=stripslashes($projects->cc_qsummery);?></textarea><span class="error">*</span></td> 
</tr>
 
<tr>
    <td width="159" height="1"  class="text" align="left" valign="top">Professional Skills:</td>
    <td  height="20" colspan="2">
<textarea rows="2" cols="48" name="Professional" id="Professional<?=$projects->cc_id;?>"><?=stripslashes($projects->cc_professional_skills);?></textarea><span class="error">*</span></td> 
</tr>
<tr>
             <td width="159" height="1"  class="text" align="left" valign="top">Technical Skills: </td>
    <td  height="23" colspan="2">
<textarea rows="2" cols="48" name="Technical" id="Technical<?=$projects->cc_id;?>"><?=stripslashes($projects->cc_techenical_skills);?></textarea><span class="error">*</span></td>
</tr>

<tr>
 <td width="159" height="1"  class="text" align="left" valign="top">Tools Used : </td>
 <td  height="23" colspan="2">
<textarea rows="2" cols="48" name="Tools" id="Tools<?=$projects->cc_id;?>"><?=stripslashes($projects->cc_tools_used);?></textarea><span class="error">*</span></td>
</tr>   

<tr>
    
    <td  height="19" width="159">&nbsp;</td>
    
    <td  height="19" width="472">
  <input type="submit" name="saveCore" value="Save" class="button" />&nbsp;&nbsp;<input type="button" onclick="document.location.href='job_seeker_menu.php?menu=core&cr_id=<?=$projects->cc_id;?>'" value="Delete" class="button" />
    <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>--></td>
  </tr>
  
  </table>
<?=$input->formEnd()?> 
  <? }?>   
      
 
 
 </td></tr>
</table>
  <?=$input->formEnd()?>
