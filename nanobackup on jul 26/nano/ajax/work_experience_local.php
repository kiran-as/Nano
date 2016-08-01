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
   
   $all_works_experince=$db->getResults("SELECT * FROM $work_experience_table where m_id='".$_SESSION[m_id]."'"); 
   $all_count=count($all_works_experince);
 ?>
	
<script>
	function work_Validation()
			{
			alert("working");				
			var txtForm=document.infoForm;
			var j=0;
			
			 for(var i=0;i<document.getElementsByName("txtType").length;i++)
                             {
	                           if(txtForm.txtType[i].checked)
	                             {

                             j++;		
	                         }
            }      
			
				 if(txtForm.txtCompany.value=='')
					{
					alert(" Please enter company");
					txtForm.txtCompany.focus();
					return false;
					}
					else if(txtForm.txtDesignation.value=='')
					{
					alert(" Please enter Designation");
					txtForm.txtDesignation.focus();
					return false;
					}
					
				else  if (txtForm.selDay.value=='')
					{
					alert(" Please enter day for 'From date '");
					txtForm.selDay.focus();
					return false;
					}
					
	else 	 if(txtForm.selMonth.value=='')
					{
					alert(" Please enter month for 'From date '");
					txtForm.selMonth.focus();
					return false;
					}
					
		else 	 if(txtForm.selYear.value=='')
					{
					alert(" Please enter Year for 'From date '");
					txtForm.selYear.focus();
					return false;
					}
					
					
					
					else  if(txtForm.txtDay.value=='')
					{
					alert(" Please enter day for 'TO date '");
					txtForm.selDay.focus();
					return false;
					}
					
					else if(txtForm.txtMonth.value=='')
					{
					alert(" Please enter month 'To date'");
					txtForm.selMonth.focus();
					return false;
					}
					
					else if(txtForm.txtYear.value=='')
					{
					alert(" Please enter year 'To date'");
					txtForm.selYear.focus();
					return false;
					}
					
					
					
							
				else if(j==0)
                             {
	                            alert("Please Select Experience Type"); 
	
	                               return false;
                                    }
							else {
							return true ;
							}		
			   
									
			}
</script>

<script type="text/javascript">
	function showOtherPlace(val){
	//alert("hai");
	if(val == "-2"){
		document.getElementById("OtherPlaces").style.display='block';
	} else {
		document.getElementById("OtherPlaces").style.display='none';
	/*	document.getElementById("txtTOTAL_PLACE").value=0;
		var total=document.frm1.txtTOTAL_PLACE.value;
			for(var i=0;i <= total;i++){
				document.getElementById('attach1_' + i).innerHTML ="";
			}
		*/
	}
}
	</script>
		
		
    <!--end code highlighter-->
    <SCRIPT language="javascript">
function add(id) {
 
    //Create an input type dynamically.
    var element = document.createElement("textarea");

    //Assign different attributes to the element.

    element.setAttribute("value", 'areaDescription');
    element.setAttribute("name", 'areaDescription[]');
	element.setAttribute("id", 'areaDescription');
 element.setAttribute("cols", '60');
    element.setAttribute("rows", '5');
    var foo = document.getElementById("mallifooBar"+id);
 
    //Append the element in page (in span).
    foo.appendChild(element);
 
}
</SCRIPT>
    <SCRIPT language="javascript">
function addNew() {
 
    //Create an input type dynamically.
    var element = document.createElement("textarea");

    //Assign different attributes to the element.

    element.setAttribute("value", 'areaDescription');
    element.setAttribute("name", 'areaDescription[]');
	element.setAttribute("id", 'areaDescription');
 element.setAttribute("cols", '60');
    element.setAttribute("rows", '5');
    var foo = document.getElementById("newDiv");
 
    //Append the element in page (in span).
    foo.appendChild(element);
 
}
</SCRIPT>
	<script>
	function getxmlhttpobject()
{
	var xmlhttp=null;
	try
	{
		// for opera, safari, firefox
		xmlhttp=new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlhttp;
}

var xmlhttp;

function workExpInsert(we_id,title,desc,dur,role,team,tool,chal)
{

	//alert("dfjlhkb");
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="ajax/projects_insert.php";
	url=url+"?we_id="+we_id+"&title="+title+"&desc="+desc+"&role="+role+"&size="+team+"&tool="+tool+"&chal="+chal+"&duration="+dur;
	alert(url);
	xmlhttp.onreadystatechange=workExpInsertResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function workExpInsertResult()
{
	
		if(xmlhttp.readyState==0 || xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3 )
	{
	//document.getElementById("imagePreview").src="../images/loading.gif";	
	document.getElementById('work_exp_update').innerHTML="../images/loading.gif";
		}
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
		document.getElementById('projDIv_new').style.display='none';
		document.getElementById('work_exp_update').innerHTML=xmlhttp.responseText;
		
	}
}
function workExpInsertInUpdate(we_id,title,desc,dur,role,team,tool,chal)
{

	//alert("dfjlhkb");
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="ajax/projects_insert.php";
	url=url+"?we_id="+we_id+"&title="+title+"&desc="+desc+"&role="+role+"&size="+team+"&tool="+tool+"&chal="+chal+"&duration="+dur;
	alert(url);
	xmlhttp.onreadystatechange=workExpInsertInUpdateResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function workExpInsertInUpdateResult()
{
	
		if(xmlhttp.readyState==0 || xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3 )
	{
	//document.getElementById("imagePreview").src="../images/loading.gif";	
	document.getElementById('divPorj_update').innerHTML="../images/loading.gif";
		}
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
		document.getElementById('projDIv_Edit').style.display='none';
		document.getElementById('divPorj_update').innerHTML=xmlhttp.responseText;
		
	}
}	
	</script>
    
  
<table width="643"  > 
<tr>
  <td>&nbsp;</td>
</tr>
<tr><td>
<?=$input->formStart('infoForm','','onSubmit="return work_Validation();"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="adddiv_work" <?=($all_count==0 || $_REQUEST[action]=='new')?'style="display:block;"':'style="display:none;"'; ?>><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
  </tr>
    <tr>
    <td class="">&nbsp;</td>
    <td><table width="96%"> 
  
  <tr>
     <td height="25" colspan="2"><span  >Add Work Experience Details </span> <? //=messaging($_REQUEST[msg])?> </td>
</tr> 
<tr>
     <td>&nbsp;</td>
     <td ><div align="center"><span class="error">&nbsp;</span></div></td>
</tr>

<tr>
     <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>

    
	
   
	
	
<tr>

   <td align="left"><span class="text">Company:</span></td>
    <td  height="24" colspan="2">
	<?=$input->textBox('txtCompany',$edit->we_company,'text','style=width:200px;','');?><span class="error"> *</span></td>
</tr>
 
<tr>
 <td align="left"><span class="text">Designation:</span></td>
    <td  height="24" colspan="2">
	<?=$input->textBox('txtDesignation',$edit->we_designation,'text','style=width:200px;','');?><span class="error"> *</span></td>
    </tr>
		
	
	  <tr>
                  <td align="left" > From Date: </td>
                  <td align="left">
				 <?=$input->DayBox('selDay',$day_array,'style=width:235px;','','');?>
	<?=$input->MonthBox('selMonth',$month_array,'style=width:235px;','','');?>
	<?=$input->YearBox('selYear',$year_array,'style=width:235px;','','');?>			  </td>
                </tr>
					  <tr>
                  <td align="left"  > To Date: </td>
                  <td align="left" ><?=$input->DayBox('txtDay',$day_array,'style=width:235px;','','');?>
	<?=$input->MonthBox('txtMonth',$month_array,'style=width:235px;','','');?>
	<?=$input->YearBox('txtYear',$year_array,'style=width:235px;','','');?></td>
                </tr>
				
				
	<tr>
    <td align="left"><span class="text">Experience Type:</span></td>
    <td  height="24" colspan="2">
    
	<input type="radio" name="txtType"  <?=$edit->we_type=='VLSI'?'checked':''?> value="VLSI" onclick="showOtherPlace(this.value)"/><label>VLSI</label>
	<?php /*?><?=$input->radio('txtType','VLSI','text','');?><?php */?>
  
	<input type="radio" name="txtType"  <?=$edit->we_type=='Embedded'?'checked':''?>  value="Embedded" onclick="showOtherPlace(this.value)"/><label>Embedded</label>
<?php /*?>	<?=$input->radio('txtType','Embedded','text','');?><?php */?>
    <input type="radio" name="txtType" value="-2"  <?=$edit->we_type=='-2'?'checked':''?>  onclick="showOtherPlace(this.value)" /> <label>Other</label>
	<?php /*?> <?=$input->radio('txtType','-2','text','');?><span class="error">*</span><?php */?>
	<span class="error"> *</span></td>
</tr>
 <tr>
          <td></td>
          <td>
	  
<div id="OtherPlaces" style="display:none;"> Add other Experience &nbsp;
              <input type="text" name="txtExp" id="txtExp" value="<?=$edit->we_other?>" /></div></td>
        </tr>

<tr>
          <td></td>
          <td>&nbsp;</td>
</tr>
<tr>

<tr>   
    <td  height="19" width="127">&nbsp;</td>
    
    <td  height="19" width="489">
  <?=$input->submitButton('workInsert','Save','button');?>&nbsp;&nbsp;&nbsp;<input type="submit" name="workInsert" value="Save and Add Next" class="button" onclick="document.getElementById('hdNext').value=1;" style="width:200px" />
  </td>
   </tr> 
   <tr>   
    <td colspan="2"><div align="right">
      <input name="button" type='button' class="button" id='button'  onclick="document.getElementById('projDIv_new').style.display='block'" value='Add Project'; />
    </div></td>
    
   
   </tr> <tr>
          <td colspan="2"><div id="projDIv_new" style="display:none" ><table width="100%"> 
 <tr>
   <td  colspan="3">&nbsp;</td>
 </tr>
 <tr><td  colspan="3">Add Project Details</td></tr>	   
  <tr>
     <td height="25" colspan="3"> <? //=messaging($_REQUEST[msg])?> </td>
</tr> 

<tr>
    <td width="192" height="1"  class="text" align="left">Title :</td>
    <td width="197"><input type="text" name="txtTitle" id="txtTitle" value=""  style="width:200px;" /></td>
    <td  height="" width="209"><span class="error"> *</span></td>
</tr>

<tr>
    <td width="192" height="15"  class="text" align="left">Duration :</td>
    <td>
	<input type="text" name="txtDuration" id="txtDuration" value="" style="width:200px;" /></td><td width="209"><span class="error"> *</span></td>
</tr>	        
 
 
<tr>
    <td width="192" height="1"  class="text" align="left">Role :</td>
    <td width="197"><input type="text" name="txtRole" id="txtRole" value=""  style="width:200px;" /></td>
    <td  height="" width="209"><span class="error"> *</span></td>
</tr>          
 
 <tr>
    <td width="192" height="1"  class="text" align="left">Team Size :</td>
    <td width="197"><input type="text" name="txtTeam" id="txtTeam" value=""  style="width:200px;" /></td>
    <td  height="" width="209"><span class="error"> *</span></td>
</tr>        
<tr>
<td   class="text" align="left" valign="top">Project Description :</td>
<td width="197"><textarea rows="4" cols="30" name="areaDescription" id="areaDescription"></textarea></td>
<td  height="" width="209"><span class="error"> *</span></td>  
</tr>



<tr>
<td width="192" height="1" class="text" align="left" valign="top">Tools Used : </td>
<td width="197"><textarea rows="4" cols="30" name="areaTools" id="areaTools"></textarea></td>
<td  height="" width="209"><p><span class="error">*</span></p></td>
</tr>
  


<tr>
 <td width="192" height="1"  class="text" align="left" valign="top">Challenges :  </td>
 <td width="197"><textarea rows="4" cols="30" name="areaChallenges" id="areaChallenges" ></textarea></td>
 <td  height="" width="209"><span class="error">*</span></td>
</tr>     


<tr>
    
    <td  height="19" width="192">&nbsp;</td>
    
    <td height="19" colspan="2"><input type="button" name="projNew" value="Save" class="button" onclick="workExpInsert(0,document.getElementById('txtTitle').value,document.getElementById('areaDescription').value,document.getElementById('txtDuration').value,document.getElementById('txtRole').value,document.getElementById('txtTeam').value,document.getElementById('areaTools').value,document.getElementById('areaChallenges').value)" /> &nbsp; &nbsp; <input type="button" name="" value="Delete" class="button" onclick="" />    <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>--></td>
    </tr>
     <tr><td colspan="3"><hr /></td></tr>
</table>
   </div></td>
        </tr>
</table></td>
    <td class="">&nbsp;</td>
  </tr>
   <tr><td colspan="3"><div id="work_exp_update"></div></td></tr>
</table>
 </div>
<?=$input->formEnd()?> 
 </td></tr>
 <tr><td><div id="id_display" <?=($all_count==0 || $_REQUEST[action]=='new')?'style="display:none;"':'style="display:block;"'; ?>>
   <div align="right"><a href="#" onclick="document.getElementById('adddiv_work').style.display='block';document.getElementById('id_display').style.display='none';" class="morelinkbtm">Add more </a></div></td></tr>
 <tr><td>
 <?     
 
  
    $m=1;  
    foreach($all_works_experince as $works){?> 
    <?=$input->formStart('infoForm','','onSubmit="return work_Validation();"');?>
    <input type="hidden" name="we_id" value="<?=$works->we_id;?>" />
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
  </tr>
    <tr>
    <td class="">&nbsp;</td>
    <td><table width="100%"> 
  
 
<tr>
     <td>&nbsp;</td>
     <td colspan="2" ><div align="center"><span class="error">&nbsp;</span></div></td>
</tr>

<tr>
     <td>&nbsp;</td>
     <td colspan="2" ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>

    
	
   
	
	
<tr>

   <td align="left"><span class="text">Company:</span></td>
    <td  height="24" colspan="3">
	<?=$input->textBox('txtCompany',$works->we_company,'text','style=width:200px;','');?><span class="error"> *</span></td>
</tr>
 
<tr>
 <td align="left"><span class="text">Designation:</span></td>
    <td  height="24" colspan="3">
	<?=$input->textBox('txtDesignation',$works->we_designation,'text','style=width:200px;','');?><span class="error"> *</span></td>
    </tr>
	
	  <tr>
                  <td align="left"   > From Date: </td>
                  <td width="315" align="left">
                  <?=$input->DayBox('selDay',$day_array,'style=width:235px;','','');?>
	<?=$input->MonthBox('selMonth',$month_array,'style=width:235px;','','');?>
	<?=$input->YearBox('selYear',$year_array,'style=width:235px;','','');?>
			    <span class="error">*</span></td>
                  <td width="149">&nbsp;</td>
	  </tr>
					  <tr>
                  <td align="left"   > To Date: </td>
                  <td align="left" ><?=$input->DayBox('txtDay',$day_array,'style=width:235px;','','');?>
	<?=$input->MonthBox('txtMonth',$month_array,'style=width:235px;','','');?>
	<?=$input->YearBox('txtYear',$year_array,'style=width:235px;','','');?>
						<span class="error">*</span></td>
                  <td align="left" valign="top">&nbsp;</td>
					  </tr>
	<tr>
    <td align="left"><span class="text">Experience Type:</span></td>
    <td  height="24" colspan="3">
    
	<input type="radio" name="txtType"  <?=$works->we_type=='VLSI'?'checked':''?> value="VLSI" onclick="showOtherPlace(this.value)" /><label>VLSI</label>
	<?php /*?><?=$input->radio('txtType','VLSI','text','');?><?php */?>
  
	<input type="radio" name="txtType"  <?=$works->we_type=='Embedded'?'checked':''?>  value="Embedded" onclick="showOtherPlace(this.value)" /><label>Embedded</label>
<?php /*?>	<?=$input->radio('txtType','Embedded','text','');?><?php */?>
    <input type="radio" name="txtType" value="-2"  <?=$works->we_type=='-2'?'checked':''?>  onclick="showOtherPlace(this.value)" /> <label>Other</label>
	<?php /*?> <?=$input->radio('txtType','-2','text','');?><span class="error">*</span><?php */?>
	<span class="error"> *</span></td>
</tr>
 <tr>
          <td></td>
          <td colspan="2">
	  
<div id="OtherPlaces" <? 
if($_POST[txtType] == -2 || $works->we_type=='-2') echo 'style="display:block;"'; 

else

echo 'style="display:none;"';  ?>
> Add other Experience &nbsp;
              <input type="text" name="txtExp" id="txtExp" value="<?=$works->we_other?>" /></div></td>
        </tr>
 <tr>
    
    <td  height="19" width="127">&nbsp;</td>
    
    <td colspan="2"><input type="submit" name="updateWork" value="Save" class="button" />&nbsp;&nbsp;
	<input type="button" onclick="document.location.href='job_seeker_menu.php?menu=workDel&we_id=<?=$works->we_id;?>'" value="Delete" class="button" /></td>
   </tr>

 <tr>
   <td  height="19">&nbsp;</td>
   <td colspan="2"><div align="right">
     <input name="button2" type='button' id='addButton' class="button" onclick="javascript:document.getElementById('projDIv_Edit').style.display='block'" value='Add Project'; />
   </div></td>
 </tr>
 <tr>
   <td  height="19">&nbsp;</td>
   <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
   <td  height="19" colspan="3"><div id="projDIv_Edit" style="display:none" ><table width="100%"> 
 <tr>
   <td  colspan="3">&nbsp;</td>
 </tr>
 <tr><td  colspan="3">Add Project Details</td></tr>	   
  <tr>
     <td height="25" colspan="3"> <? //=messaging($_REQUEST[msg])?> </td>
</tr> 

<tr>
    <td width="192" height="1"  class="text" align="left">Title :</td>
    <td width="197"><input type="text" name="txtTitle1" id="txtTitle1" value=""  style="width:200px;" /></td>
    <td  height="" width="209"><span class="error"> *</span></td>
</tr>

<tr>
    <td width="192" height="15"  class="text" align="left">Duration :</td>
    <td>
	<input type="text" name="txtDuration1" id="txtDuration1" value="" style="width:200px;" /></td><td width="209"><span class="error"> *</span></td>
</tr>	        
 
 
<tr>
    <td width="192" height="1"  class="text" align="left">Role :</td>
    <td width="197"><input type="text" name="txtRole1" id="txtRole1" value=""  style="width:200px;" /></td>
    <td  height="" width="209"><span class="error"> *</span></td>
</tr>          
 
 <tr>
    <td width="192" height="1"  class="text" align="left">Team Size :</td>
    <td width="197"><input type="text" name="txtTeam1" id="txtTeam1" value=""  style="width:200px;" /></td>
    <td  height="" width="209"><span class="error"> *</span></td>
</tr>        
<tr>
<td   class="text" align="left" valign="top">Project Description :</td>
<td width="197"><textarea rows="4" cols="30" name="areaDescription1" id="areaDescription1"></textarea></td>
<td  height="" width="209"><span class="error"> *</span></td>  
</tr>



<tr>
<td width="192" height="1" class="text" align="left" valign="top">Tools Used : </td>
<td width="197"><textarea rows="4" cols="30" name="areaTools1" id="areaTools1"></textarea></td>
<td  height="" width="209"><p><span class="error">*</span></p></td>
</tr>
  


<tr>
 <td width="192" height="1"  class="text" align="left" valign="top">Challenges :  </td>
 <td width="197"><textarea rows="4" cols="30" name="areaChallenges1" id="areaChallenges1" ></textarea></td>
 <td  height="" width="209"><span class="error">*</span></td>
</tr>     


<tr>
    
    <td  height="19" width="192">&nbsp;</td>
    
    <td height="19" colspan="2"><input type="button" name="projNew" value="Save" class="button" onclick="workExpInsertInUpdate(<?=$works->we_id?>,document.getElementById('txtTitle1').value,document.getElementById('areaDescription1').value,document.getElementById('txtDuration1').value,document.getElementById('txtRole1').value,document.getElementById('txtTeam1').value,document.getElementById('areaTools1').value,document.getElementById('areaChallenges1').value)" /> &nbsp; &nbsp; <input type="button" name="" value="Delete" class="button" onclick="" />    <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>--></td>
    </tr>
     <tr><td colspan="3"><hr /></td></tr>
</table>
   </div></td>
   </tr>
 <tr>
   <td  height="19">&nbsp;</td>
   <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
   <td  height="19" colspan="3"><div id="divPorj_update<?=$K?>"><? $work_exp_result=$db->getResults("select * from $work_projects_table where we_id='".$works->we_id."'"); 
 foreach($work_exp_result as $workExp){
 
  $output.='<table width="100%" border="0" cellspacing="3" cellpadding="3">
       <tr>
         <td width="27%">Title : </td>
         <td width="57%"><input type="text" name="txtTitle" id="txtTitle"  style="width:200px;" value="'.stripslashes($workExp->wp_title).'" /></td>
         <td width="16%">&nbsp;</td>
       </tr>
       <tr>
         <td>Duration : </td>
         <td><input type="text" name="txtDuration" id="txtDuration" style="width:200px;" value="'.stripslashes($workExp->wp_duration).'" /></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>Role : </td>
         <td><input type="text" name="txtRole" id="txtRole" style="width:200px;"  value="'.stripslashes($workExp->we_role).'" /></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>Team SIze : </td>
         <td><input type="text"  name="txtSize" id="txtSize" style="width:200px;" value="'.stripslashes($workExp->wp_team_size).'"  /></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td valign="top">Project Description : </td>
         <td><textarea name="areaDescription" id="areaDescription" style="width:250px; height:80px;">'.stripslashes($workExp->wp_description).'</textarea></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td valign="top">Tools Used : </td>
         <td><textarea name="areaUsed" id="areaUsed" style="width:250px; height:80px;">'.stripslashes($workExp->wp_tools).'</textarea></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td valign="top">Challenges : </td>
         <td><textarea  name="areaChallenges" id="areaChallenges" style="width:250px; height:80px;">'.stripslashes($workExp->wp_challenges).'</textarea></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>  <input type="button" name="saveAjax" value="Update" class="button" onclick="workExpUpdate(\''.$workExp->wp_id.'\',\''.$workExp->we_id.'\',document.getElementById("txtTitle").value,
document.getElementById("txtDuration").value,document.getElementById("txtRole").value,
document.getElementById("txtSize").value,document.getElementById("areaDescription").value,document.getElementById("areaUsed").value,
document.getElementById("areaChallenges").value);" />
          
         </td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
     </table>';
 
 }
 
 echo $output;?></div></td>
   </tr>
 <tr>
    
    <td  height="19" width="127">&nbsp;</td>
    
    <td colspan="2">&nbsp;</td>
 </tr>
</table></td>
    <td class="">&nbsp;</td>
  </tr>
 <tr><td colspan="3"><hr /></td></tr>
</table>
<?=$input->formEnd()?> 
  <? $m++; }?>   
      
 
 
 </td></tr>
<td><tr><div id="wep_div"> </div> </td></tr>
 </table>	
<?php ?> <tr><td>
 <?=$input->formStart('wepForm','','onSubmit="return wep_Validation();"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="addwork_exp_proj" style="display:none;">
<table width="643">
<tr><td  colspan="2">Add Work Experience</td></tr>	  
<tr>
     <td>&nbsp;</td>
     <td ><div align="center"><span class="error">&nbsp;</span></div></td>
</tr>

<tr>
     <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>

<tr>
    <td width="159" height="1"  class="text" align="left">Company :</td>
    <td  height="" width="472"><?=$input->textBox('txtTitle','','text','style=width:320px;','');?><span class="error">*</span></td>
</tr>          
 <tr>
    <td width="159" height="1"  class="text" align="left" valign="top">Description:</td>
    <td  height="23" colspan="2">
<textarea rows="4" cols="48" name="Qualification"></textarea><span class="error">*</span>
</td> 
</tr>
 
 
<tr>
    
    <td  height="19" width="159">&nbsp;</td>
    
    <td  height="19" width="472"><?=$input->submitButton('wepInsert','Save','button');?>&nbsp;&nbsp;&nbsp;<input type="button" name="SaveAddNext" value="Save and Add Next" class="button" onclick="document.getElementById('hdNext').value=1;" style="width:200px" /></td></tr>

	
</table>
 </div>
<?=$input->formEnd()?>
 </td></tr>
 <!--
 <tr><td><div id="wp_display"><a href="#" onclick="document.getElementById('addwork_exp_proj').style.display='block';document.getElementById('wp_display').style.display='none';" class="morelinkbtm">Add New Project</a></td></tr>
 <tr><td>-->


  <? //$input->formEnd()?>
