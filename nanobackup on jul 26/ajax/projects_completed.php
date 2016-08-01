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
      $projects_result=$db->getResults("SELECT * FROM $projects_table where m_id='".$_SESSION[m_id]."' order by p_id desc");
	  $project_count=count($projects_result);
  
 ?>
  		<script type="text/javascript">
function performdelete(DestURL) {
var ok = confirm("Are you sure you want to delete?");
if (ok) {location.href = deletefile.php;}
return ok;
} 
</script>

 
  <script type="text/javascript">
 function showCelebType(typeID)
{

	if(typeID == -1)
   {
	
	document.getElementById("OtherCelebTypes").style.display='block';
		
	}
	 else 
	 {
	  
	 document.getElementById("OtherCelebTypes").style.display='none';
		
	 }
	
	
} function showCelebType1(typeID,di_id)
{

	if(typeID == -1)
   {
	
	document.getElementById("OtherCelebTypes"+di_id).style.display='block';
		
	}
	 else 
	 {
	  
	 document.getElementById("OtherCelebTypes"+di_id).style.display='none';
		
	 }
	
	
}
</script>

<script>

function validate(id)
{	

	      
			
			if($("#txtTitle"+id).val()=='')
			{
					alert("Please enter Title");
					$("#txtTitle"+id).focus();
					return false;
			}		
			
			
			
			if($("#selFrom"+id).val()=='0')
			{
				alert("Please select from month");
					$("#selFrom"+id).focus();
					return false;
			}		
			if($("#selFromYear"+id).val()=='0')
			{
				alert("Please select from year");
					$("#selFromYear"+id).focus();
					return false;
			}
			
			if($("#selMonth1"+id).val()=='0')
			{
				alert("Please select to month");
					$("#selMonth1"+id).focus();
					return false;
			}
			if($("#selYear1"+id).val()=='0')
			{
				alert("Please select to year");
					$("#selYear1"+id).focus();
					return false;
			}
				if($("#txtCompany"+id).val()=='')
			{
					alert("Please enter Company");
					$("#txtCompany"+id).focus();
					return false;	
			}	
			
			if($("#selEnd"+id).val()=='0')
			{
				alert("Please enter Worked on  ");
					$("#selEnd"+id).focus();
					return false;
			}
			
			if($("#Role"+id).val()=='')
			{
					alert("Please enter Role");
					$("#Role"+id).focus();
					return false;	
			}		
			/*if($("#TeamSize"+id).val()=='')
			{
					alert("Please enter Teamsize");
					$("#TeamSize"+id).focus();
					return false;	
			}
			if($("#areaDescription"+id).val()=='')
			{
					alert("Please enter Project Description");
					$("#areaDescription"+id).focus();
					return false;	
			}
			
			if($("#areaTools"+id).val()=='')
			{
					alert("Please enter Tools used");
					$("#areaTools"+id).focus();
					return false;			
			}		
			if($("#areaChallenges"+id).val()=='')
			{
					alert("Please enter Challenges");
					$("#areaChallenges"+id).focus();
					return false;			
			}	*/
}		

	</script>				
 
	 
<table width="100%"   class="recruit_table"> 

<tr>
<td width="196" height="1"  style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" colspan="2"><b>Resume Bulider:Step - 5/6 </b></td>
   
</tr>
<tr>
  <td style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" colspan="4" >Employability Factor</td>

</tr> 
<td align="right">
<a HREF="javascript:self.close()" onclick="window.open('emp.php','welcome','width=400,height=300')">Example for Employability Factor</a>
</td>

 <!--
<tr>
  <td><div style="float:left" class="error"><?=messaging($_REQUEST[msg])?></div><div style="float:right" class="error">* Indicates Required field</div></td>
</tr> 
 <tr> 

<td>
 <div id="" style="float:left; color:#880011;">
 <BLINK><strong>Employability Factor&nbsp;:&nbsp;<?=employabilityFactor($_SESSION[m_id])?></strong></BLINK>
 <a HREF="javascript:self.close()" onclick="window.open('emp.php','welcome','width=400,height=300')" style="text-decoration:none; color:#880011;>Click here for Details</a>
 </div>
 
      <div id="id_display" <?=$project_count==0?'style="display:none;"':'style="display:block;"'; ?>>
     <div align="right"><a href="#" onclick="document.getElementById('addProjDiv').style.display='block';document.getElementById('id_display').style.display='none';return false;">     <img src="images/add_more.png" border="0" /> </a></div>
     </div>
</td>
 
   
 </tr>
<tr><td >
<?=$input->formStart('infoForm','','onSubmit="return validate(\'\');"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="addProjDiv"<?=($project_count==0 || $_REQUEST[action]=='new')?'style="display:block;"':'style="display:none;"'; ?> >
<table width="100%"> 
<tr>
   <td  colspan="3"><strong>Add Academic Project Details</strong></td>
 </tr>	   

	<tr>
    <td width="342" height="1"  class="text" align="left">Title :<span class="error">*</span></td>
   
	<td colspan="2"><span class="text">Company / Institute:<span class="error">*</span></span></td>
</tr> 
 <tr>
    
    <td  height=""><input type="text" name="txtTitle" id="txtTitle" style="width:250px;" /></td>
	
	<td  height="" colspan="2"><input type="text" name="txtCompany" id="txtCompany"style="width:250px;" /></td>
 </tr>
   
		<tr>
    <td width="342" height="1"  class="text" align="left">Duration :<span class="error">*</span></td>
    <td height="15" colspan="2" align="left"  class="text">Worked On : <span class="error">*</span></td>
</tr>  
<tr>
    <td  height="" width="342">   <select name="selFrom" id="selFrom">
	  <option value="0">Month</option>
        <? for($d=1;$d<count($month_array);$d++){?>
        <option value="<?=$d?>" >
          <?=$month_array[$d]?>
          </option>
        <? }?>
      </select>
      <select name="selFromYear" id="selFromYear">
        <option value="0">Year</option>
        <? for($f=date(Y);$f>=1940;$f--){?>
        <option value="<?=$f?>"<?=$f==$fromdate[1]?'selected':''?> >
          <?=$f?>
          </option>
        <? }?>
      </select>
&nbsp;

<select name="selMonth1" id="selMonth1">
<option value="0">Month</option>
  <? for($dt=1;$dt<count($month_array);$dt++){?>
  <option value="<?=$dt?>"  >
  <?=$month_array[$dt]?>
  </option>
  <? }?>
</select>
<select name="selYear1" id="selYear1">
  <option value="0">Year</option>
  <? for($t=date(Y);$t>=1940;$t--){?>
  <option value="<?=$t?>" <?=$t==$fromdate[1]?'selected':''?> >
  <?=$t?>
  </option>
  <? }?>
</select></td>
    <td width="176"><select id="selEnd" name="selEnd" class="textbox" onchange="showCelebType(this.value)">
      <option value="0">---Select--- </option>
      <option  value="VLSI" <?=$edit->p_end=='VLSI'?'selected':''?>>Vlsi Project</option>
      <option value="EMBEDED" <?=$edit->p_end=='EMBEDED'?'selected':''?>>Embeded Project</option>
      <option value="-1" <?=$edit->p_end=='-1'?'selected':''?>>Other</option>
    </select>      </td>
    <td width="429"><div id="OtherCelebTypes" <? if($projects->p_end=='-1') echo 'style="display:block;"'; else echo 'style="display:none;"'; ?>><input type="text" name="txtOtherproject"         id="txtOtherproject" value="<?=$projects->p_other_tech?>" maxlength="200" /></div></td>
</tr>	
 
 
 
	<tr>
    <td width="342" height="1"  class="text" align="left">Role :<span class="error">*</span></td>
    <td height="1" colspan="2" align="left"  class="text">Team Size :</td>
</tr> 
    <tr>
    <td  height="" width="342"><input type="text" name="Role" id="Role"style="width:250px;" /></td>
    <td  height="" colspan="2"><input type="text" name="TeamSize" id="TeamSize"style="width:250px;" /></td>
</tr>      
 <tr>
    <td width="342" height="1"  class="text" align="left" valign="top">Project Description:</td>
     <td height="1" colspan="2" align="left" valign="top"  class="text">Tools Used : </td>
</tr>    
 <tr>
   <td  height="23" >
<textarea rows="2" style="width:250px;" cols="48" name="areaDescription" id="areaDescription"></textarea></td>
    <td  height="23" colspan="2" >
<textarea  rows="2" style="width:250px;"  cols="48" name="areaTools" id="areaTools"></textarea></td> 
</tr>
 <tr>
    <td width="342" height="1"  class="text" align="left" valign="top">Challenges :</td>
	<td colspan="2">&nbsp;</td>
	</tr>
     <tr>
    <td  height="23" >
<textarea name="areaChallenges" rows="2"   style="width:250px;"  id="areaChallenges"></textarea> </td> <td colspan="2">&nbsp;</td>
</tr>

<tr>
    
    <td  height="19" colspan="4"><div align="center">
    <input type="image" src="images/save.png" border="0" name="projectInsert" value="Save">
      &nbsp; &nbsp; 
          <input type="image" name="projectInsert" value="Save and Add Next" src="images/save_n_next.png" border="0" onclick="document.getElementById('hdNext').value=1;"  />-->
      <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>-->
	   &nbsp; &nbsp; <!--
          <input type="image" name="close" value="Close" src="images/close.png" border="0"  onclick="document.getElementById('addProjDiv').style.display='none';return false;" />
    </div></td>
    </tr>
    
</table>
 </div>
<?=$input->formEnd()?> 
 </td></tr>
 <tr><td valign="top" >
 <?   
  
    foreach($projects_result as $projects){?> 
    <?=$input->formStart('infoForm1','','onSubmit="return validate('.$projects->p_id.');"');?>
    <input type="hidden" name="p_id" value="<?=$projects->p_id;?>" />
	
    <table width="100%" class="recruit_table" style="margin-top:10px"; >
	

<tr>
    
     <td colspan="5" align="right" ></td>
</tr>

<tr>
    <td width="391" height="1"  class="text" align="left">Title :<span class="error">*</span></td>
    <td colspan="2"><span class="text">Company / Institute:<span class="error">*</span></span></td>
</tr><tr>
  <td  height="" width="391">
	<input type="text" name="txtTitle" id="txtTitle<?=$projects->p_id;?>" style="width:250px;" value="<?=$projects->p_title;?>" /></td>
  <td colspan="2"><input type="text" name="txtCompany" id="txtCompany<?=$projects->p_id;?>" style="width:250px;" value="<?=$projects->p_company;?>" /></td>
</tr>
<tr>
    <td width="391" height="1"  class="text" align="left">Duration :<span class="error">*</span></td>
    <td height="15" colspan="2"align="left"  class="text">Worked On : <span class="error">*</span>&nbsp;</td>
</tr> 

<tr><td  height="" width="391">
	<?  $from_edit=explode('-',$projects->p_from_date); ?>
	<select name="selFrom" id="selFrom<?=$projects->p_id; ?>">
    <option value="0">Month</option>
    <? for($d=0;$d<count($month_array1);$d++){?>
    <option value="<?=$d?>" <?=$from_edit[0]==$d?'selected':''?> >
      <?=$month_array1[$d]?>
      </option>
    <? }?>
  </select>&nbsp;<select name="selFromYear" id="selFromYear<?=$projects->p_id;?>">
    <option value="0">Year</option>
    <? for($f=date(Y);$f>=1940;$f--){?>
    <option value="<?=$f?>" <?=$from_edit[1]==$f?'selected':''?>>
      <?=$f?>
      </option>
    <? }?>
  </select>&nbsp;&nbsp;
 
  <?  $to_edit=explode('-',$projects->p_to_date); 
?>
  
  <select name="selMonth1" id="selMonth1<?=$projects->p_id; ?>">
    <option value="0">Month</option>
    <? for($dt=0;$dt<count($month_array1);$dt++){?>
    <option value="<?=$dt?>" <?=$to_edit[0]==$dt?'selected':''?> >
      <?=$month_array1[$dt]?>
      </option>
    <? }?>
  </select>&nbsp;<select name="selYear1" id="selYear1<?=$projects->p_id; ?>">
    <option value="0">Year</option>
    <? for($t=date(Y);$t>=1940;$t--){?>
    <option value="<?=$t?>" <?=$to_edit[1]==$t?'selected':''?>>
      <?=$t?>
      </option>
    <? }?>
  </select></td>
    
    <td width="135"  height="24" ><select name="selProject"  id="selEnd<?=$projects->p_id; ?>" class="textbox" onchange="showCelebType1(this.value,<?=$projects->p_id; ?>)">
      <option value="0">Select</option>
      <option  value="VLSI" <?=$projects->p_end=='VLSI'?'selected':''?>>Vlsi Project</option>
      <option value="EMBEDED" <?=$projects->p_end=='EMBEDED'?'selected':''?>>Embeded Project</option>
      <option value="-1" <?=$projects->p_end=='-1'?'selected':''?>>Other</option>
    </select>  </td> 

    <td width="324" ><div id="OtherCelebTypes<?=$projects->p_id; ?>" <? if($projects->p_end=='-1') echo 'style="display:block;"'; else echo 'style="display:none;"'; ?>><input type="text" name="txtOtherproject"         id="txtOtherproject" value="<?=$projects->p_other_tech?>" maxlength="200" /></div></td>
</tr>


<tr>

   <td width="391" height="1"  class="text" align="left">Role :<span class="error">*</span></td>
   <td colspan="2"><span class="text">Team Size :</span></td>
   </tr>
   <tr>
   <td width="391"><input type="text" name="txtRole" id="Role<?=$projects->p_id;?>" style="width:250px;" value="<?=stripslashes($projects->p_role);?>"/></td>
   <td colspan="2"><input type="text" name="TeamSize" id="TeamSize<?=$projects->p_id;?>" style="width:250px;" value="<?=$projects->p_teamsize;?>" /></td>
</tr>	
		 
		
 
<tr>
    <td width="391" height="1"  class="text" align="left" valign="top">Project Description :</td>
      <td height="1" colspan="2" align="left"  class="text">Tools Used :</td>
</tr>

<tr><td  height="23"><textarea rows="2" cols="48" style="width:250px;" name="areaDescription" id="areaDescription<?=$projects->p_id;?>"><?=stripslashes($projects->p_description);?>
</textarea></td>
  <td  height="23" colspan="2" ><textarea rows="2" cols="48" style="width:250px;" name="areaTools" id="areaTools<?=$projects->p_id;?>"><?=stripslashes($projects->p_tools);?>
  </textarea></td> 
</tr> 
     	
 <tr>
    <td width="391" height="1"  class="text" align="left" valign="top">Challenges : </td>
    <td height="1" colspan="2" align="left" valign="top"  class="text">&nbsp;</td>
</tr>
 <tr><td  height="23" colspan="3"><textarea name="areaChallenges" rows="2"  style="width:250px;"  id="areaChallenges<?=$projects->p_id;?>"> <?=stripslashes($projects->p_tools);?></textarea></td>
   </tr>
 
    <tr> 
    <td  height="23" colspan="3"><div align="center">
  <input type="image" name="projectUpdate" value="Save" src="images/update.png" border="0" />
  &nbsp;&nbsp;
<a href="job_seeker_menu.php?menu=projectDel&p_id=<?=$projects->p_id;?>" onclick="performdelete('job_seeker_menu.php?confirmed=true'); return false;">
		<img src="images/delete.png" alt="cancel" title="Delete File" border="0"/></a>
      
    </div></td> 
</tr>
</table>
   <?=$input->formEnd()?>  <? }?>   
      

 
 </td></tr>
 <tr><td align="right"><a href="job_seeker_menu.php?tab=5"  ><img src="images/continue.png" border="0" /></a></td></tr>-->
</table>
