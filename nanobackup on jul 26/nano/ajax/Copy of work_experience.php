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
   
   $all_works_experince=$db->getResults("SELECT * FROM $work_experience_table where m_id='".$_SESSION[m_id]."' order by we_id desc"); 
   $all_count=count($all_works_experince);
 ?>
	
<script>
	function work_Validation(id)
			{
			
				if($("#txtCompany"+id).val()=='')
			{
					alert("Please enter Company name");
					$("#txtCompany"+id).focus();
					return false;
			}
			if($("#txtDesignation"+id).val()=='')
			{
					alert("Please enter Designation");
					$("#txtDesignation"+id).focus();
					return false;	
			}		
			
			if($("#selMonth"+id).val()=='-1')
			{
					alert("Please select month in 'From Date'");
					$("#selMonth"+id).focus();
					return false;
			}		
			
			if($("#selYear"+id).val()=='0')
			{
					alert("Please select year in 'From Date'");
					$("#selYear"+id).focus();
					return false;	
			}
				if($("#selMonth1"+id).val()=='-1')
			{
					alert("Please select month in 'To Date''");
					$("#selMonth1"+id).focus();
					return false;
			}		
			
			if($("#selYear1"+id).val()=='0')
			{
					alert("Please select year in 'To Date'");
					$("#selYear1"+id).focus();
					return false;	
			}
			
		     
		 
		    if($("#selYear"+id).val()!='0' && $("#selYear1"+id).val()!='0')
			{
			
			 if($("#selYear"+id).val()>=$("#selYear1"+id).val()){
					alert("From Year should more than To Year");
					$("#selYear"+id).focus();
					return false;	
			}     }     
		 
		 

chosen = ""
len = document.infoForm.txtType.length

for (i=0; i <len; i++) 
{

if (document.infoForm.txtType[i].checked)
   {
chosen = document.infoForm.txtType[i].value
   }
 
}

if (chosen == "" &&  chosen == "0" && chosen == "1" &&chosen == "2" &&chosen == "2" &&chosen == "3" ) 
{
alert("please select Experience type")
return false;
}


									
			}
</script>
<!--Validation for javascript Form-->
<script>
	function js_Validation(id)
			{
		//		alert("123");
			
				if($("#txtTitle1"+id).val()=='')
			{
					alert("Please enter Company name");
					$("#txtTitle1"+id).focus();
					return false;
			}
					
			if($("#selProjMonth"+id).val()=='0')
			{
					alert("Please select month in 'From Date'");
					$("#selProjMonth"+id).focus();
					return false;
			}		
			
			if($("#selProjYear"+id).val()=='0')
			{
					alert("Please select year in 'From Date'");
					$("#selProjYear"+id).focus();
					return false;	
			}
				if($("#selProjMonth1"+id).val()=='0')
			{
					alert("Please select month in 'To Date''");
					$("#selProjMonth1"+id).focus();
					return false;
			}		
			
			if($("#selProjYear1"+id).val()=='0')
			{
					alert("Please select year in 'To Date'");
					$("#selProjYear1"+id).focus();
					return false;	
			}
			
		   if($("#selProjYear"+id).val()!='0' && $("#selProjYear1"+id).val()!='0')
			{
			
			 if($("#selProjYear"+id).val()>=$("#selProjYear1"+id).val()){
					alert("From Year should more than To Year");
					$("#selProjYear"+id).focus();
					return false;	
			}     }     
		  
	if($("#txtRole1"+id).val()=='')
			{
					alert("Please enter Company name");
					$("#txtRole1"+id).focus();
					return false;
			}
			
				if($("#txtTeam1"+id).val()=='')
			{
					alert("Please enter Company name");
					$("#txtTeam1"+id).focus();
					return false;
			}
			

									
			}
			<!--Validation for javascript Form -->
</script>
<script type="text/javascript">
	function showOtherPlace(val){
	//alert("hai");
	if(val == "3"){
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


	function showOtherPlaceEdit(val,id){
	//alert("hai");
	if(val == "3"){
		document.getElementById("OtherPlacesEdit"+id).style.display='block';
	} else {
		document.getElementById("OtherPlacesEdit"+id).style.display='none';
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

	 		<script type="text/javascript">
function performdelete(DestURL) {
var ok = confirm("Are you sure you want to delete?");
if (ok) {location.href = deletefile.php;}
return ok;
} 
</script>


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
	//alert(url);
	xmlhttp.onreadystatechange=workExpInsertResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function workExpInsertResult()
{
	
		if(xmlhttp.readyState==0 || xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3 )
	{
	document.getElementById('company_id'+div_id1).innerHTML='<img src="../images/loading.gif" border="0" />';
		}
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
		document.getElementById('projDIv_new').style.display='none';
		document.getElementById('work_exp_update').innerHTML=xmlhttp.responseText;
		
	}
}
var div_id='';
function workExpInsertInUpdate(we_id,title,desc,fmon,fyear,tmon,tyear,role,team,tool,chal)
{
alert("dkhfgkdgkfg");
div_id=we_id;
	
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="ajax/projects_insert.php";
	url=url+"?we_id="+we_id+"&title="+title+"&desc="+desc+"&role="+role+"&size="+team+"&tool="+tool+"&chal="+chal+"&fmon="+fmon+"&fyear="+fyear+"&tmon="+tmon+"&tyear="+tyear;
	//alert(url);
	xmlhttp.onreadystatechange=workExpInsertInUpdateResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function workExpInsertInUpdateResult()
{
	
		if(xmlhttp.readyState==0 || xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3 )
	{
	document.getElementById('company_id'+div_id1).innerHTML='<img src="../images/loading.gif" border="0" />';
		}
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
		//document.getElementById('projDIv_Edit').style.display='none';
		document.getElementById('company_id'+div_id).innerHTML=xmlhttp.responseText;
		
	}
}	
var div_id1='';
function workExpUpdate(wp_id,we_id,title,fmon,fyear,tmon,tyear,role,team,desc,tool,chal)
{
div_id1=we_id;
	//alert(tyear);
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="ajax/projects_update.php";
	url=url+"?wp_id="+wp_id+"&we_id="+we_id+"&title="+title+"&desc="+desc+"&role="+role+"&size="+team+"&tool="+tool+"&chal="+chal+"&fmon="+fmon+"&fyear="+fyear+"&tmon="+tmon+"&tyear="+tyear;;
	//alert(url);
	xmlhttp.onreadystatechange=workExpUpdateResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function workExpUpdateResult()
{
	
		if(xmlhttp.readyState==0 || xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3 )
	{
	document.getElementById('company_id'+div_id1).innerHTML='<img src="../images/loading.gif" border="0" />';
		}
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
//	alert(xmlhttp.responseText);
		//document.getElementById('projDIv_Edit').style.display='none';
		document.getElementById('company_id'+div_id1).innerHTML=xmlhttp.responseText;
		
	}
}	

var div_del='';
function workProjectDelete(wp_id,we_id)
{
div_del=we_id;
	//alert("dfjlhkb");
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="ajax/project_delete.php";
	url=url+"?wp_id="+wp_id+"&we_id="+we_id;
	//alert(url);
	xmlhttp.onreadystatechange=workProjectDeleteResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function workProjectDeleteResult()
{
	
		if(xmlhttp.readyState==0 || xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3 )
	{
	//document.getElementById("imagePreview").src="../images/loading.gif";	
	document.getElementById('company_id'+div_del).innerHTML='<img src="../images/loading.gif" border="0" />';
		}
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
//	alert(xmlhttp.responseText);
		//document.getElementById('projDIv_Edit').style.display='none';
		document.getElementById('company_id'+div_del).innerHTML=xmlhttp.responseText;
		
	}
}	
function closeDIvID(id){

document.getElementById(id).style.display='none';
//alert(id);

}
function new_project_vik(work,div_id)
			{
			//alert(div_id);
	
var new_pr='<input type="hidden" name="work1" value="'+work+'" id="work1"><table width="100%"><tr><td  colspan="3">&nbsp;</td></tr><tr><td colspan="3">Add Project Details</td></tr><tr><td height="25" colspan="3"></td></tr><tr><td height="1" align="left"  class="text">Title :</td><td colspan="2">Duration:</tr><tr><td width="327"><input type="text" name="txtTitle1" id="txtTitle10" value=""  style="width:250px;" /><span class="error">*</span></td><td  height="15" colspan="2">From :&nbsp;<select name="selProjMonth" id="selProjMonth0"><? for($dp=0;$dp<count($month_array);$dp++){?><option value="<?=$dp?>"><?=$month_array[$dp]?></option><? }?></select>&nbsp;&nbsp;<select name="selProjYear" id="selProjYear0"><option value="0">Year</option><? for($yp=date(Y);$yp>1970;$yp--){?><option value="<?=$yp?>"><?=$yp?></option><? }?></select>To :&nbsp;<select name="selProjMonth1" id="selProjMonth10"><? for($dm=0;$dm<count($month_array);$dm++){?><option value="<?=$dm?>" ><?=$month_array[$dm]?></option><? }?>    </select>&nbsp;<select name="selProjYear1" id="selProjYear10"><option value="0">Year</option><? for($yy=date(Y);$yy>1970;$yy--){?><option value="<?=$yy?>" ><?=$yy?></option><? }?> </select></td></tr><tr><td><span class="text">Role :</span></td><td  height="1"><span class="text">Team Size :</span></td></tr><tr><td width="327" height="1" align="left" valign="top"  class="text"><input type="text" name="txtRole1" id="txtRole10" value="" style="width:250px;" /><span class="error">*</span></td><td height="1" colspan="2"><input type="text" valign="top" name="txtTeam1" id="txtTeam10" value=""  style="width:320px;" /><span class="error">*</span></td></tr><tr><td width="327" height="1" align="left"  class="text">Project Description :</td><td height="1" colspan="2"><span class="text">Tools Used : </span></td></tr><tr><td align="left" valign="top"   class="text"><textarea rows="2" cols="30"  style="width:250px;"name="areaDescription1" id="areaDescription1"></textarea></td><td height="" colspan="2"><textarea rows="2" cols="30" style="width:320px;" name="areaTools1" id="areaTools1"></textarea></td></tr><tr><td width="327" height="1" align="left" valign="top" class="text">Challenges : </td><td width="539">&nbsp;</td><td  height="1" width="112"><p></p></td></tr><tr><td width="327" height="1" align="left" valign="top"  class="text"><textarea  name="areaChallenges1" style="width:250px;" rows="2" id="areaChallenges1"></textarea></td><td height="1" colspan="2">&nbsp;</td></tr><tr><td width="327"  height="19">&nbsp;</td><td height="19" colspan="2"><input type="image" name="projNew" value="Save" src="images/save.png" border="0" onClick=" return js_Validation(0);workExpInsertInUpdate(document.getElementById(\'work1\').value,document.getElementById(\'txtTitle10\').value,document.getElementById(\'areaDescription1\').value,document.getElementById(\'selProjMonth0\').value,document.getElementById(\'selProjYear0\').value,document.getElementById(\'selProjMonth10\').value,document.getElementById(\'selProjYear10\').value,document.getElementById(\'txtRole10\').value,document.getElementById(\'txtTeam10\').value,document.getElementById(\'areaTools1\').value,document.getElementById(\'areaChallenges1\').value)" /> &nbsp; &nbsp;<img name="Close" value="Save" src="images/close.png" border="0" style="cursor:pointer;" onclick="closeDIvID(\''+div_id+'\');"/></td></tr><tr><td colspan="3"><hr /></td></tr></table>';
  //  alert($("#"+div_id).html())
  //alert(totaldat);
		var content=$("#"+div_id).html();
			content=new_pr+content;
			//alert(content)
			$("#"+div_id).html(content);
			}
			
			
				function toDelete()
				{
							var ok;
							ok = window.confirm('Do you really want to Delete ?');
							if(ok){
								return true;
							      }
							else
							{
								return false;
							}
				}	
	</script>
    
  
<table width="100%"  class="recruit_table" > 
<tr>
  <td  align="right"><a href="job_seeker_menu.php?tab=4" ><img src="images/skip.png" border="0"  /></a></td>
</tr>
<tr>
  <td class="heading1">Work Experience</td>
</tr>
<tr>
  <td><span class="error"><?=messaging($_REQUEST[msg])?></span></td>
</tr>
<tr><td>
<?=$input->formStart('infoForm','','onSubmit="return work_Validation(\'\');"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="adddiv_work" <?=($all_count==0 || $_REQUEST[action]=='new')?'style="display:block;"':'style="display:none;"'; ?>><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
  </tr>
    <tr>
    <td class="">&nbsp;</td>
    <td><table width="99%"> 
  
  <tr>
     <td height="25" colspan="2"><strong>Add Work Experience Details </strong> </td>
</tr>

<tr>
     <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>

    
	<tr>
	  <td height="1"  class="text" align="left">Company:<span class="error">*</span></td>
	  <td  height=""><span class="text">Designation:<span class="error">*</span></span></td>
	  </tr>
	<tr>
    <td width="299" height="1"  class="text" align="left"><input type="text" name="txtCompany" id="txtCompany" style="width:250px;" /></td>
    <td  height="" width="304"><input type="text" name="txtDesignation" id="txtDesignation" style="width:250px;" /></td>
</tr>  
   
	<tr>
    <td width="299" height="1"  class="text" align="left">From Date: <span class="error">*</span></td>
    <td  height="" width="304" class="text">To Date: <span class="error">*</span></td>
</tr>  
	  <tr>
                  <td align="left" ><select name="selMonth" id="selMonth">
                    <option value="-1">Month</option>
                    <? for($d=0;$d<count($month_array1);$d++){?>
                    <option value="<?=$d?>" > <?=$month_array1[$d]?>   </option>
                     
                   
                    <? }?>
                  </select>
                    <select name="selYear" id="selYear">
                      <option value="0">Year</option>
                      <? for($y=date(Y);$y>1970;$y--){?>
                      <option value="<?=$y?>" <?=$y==$fromdate[1]?'selected':''?>>
                        <?=$y?>
                      </option>
                      <? }?>
                    </select></td>
                  <td align="left"><select name="selMonth1" id="selMonth1">
                    <option value="-1">Month</option>
                    <? for($d1=0;$d1<count($month_array1);$d1++){?>
                    <option value="<?=$d1?>" >
                      <?=$month_array1[$d1]?>
                      </option>
                    <? }?>
                  </select>
                    <select name="selYear1" id="selYear1">
                      <option value="0">Year</option>
                      <? for($y1=date(Y);$y1>1970;$y1--){?>
                      <option value="<?=$y1?>" >
                        <?=$y1?>
                      </option>
                      <? }?>
                    </select></td>
                </tr>
					  <tr>
                  <td align="left"  ><span class="text">Experience Type:</span></td>
                  <td align="left" >&nbsp;</td>
                </tr>
				
				
	<tr>
    <td align="left"><input type="radio" name="txtType"   value="1" onclick="showOtherPlace(this.value)" />
      <label>VLSI</label>
      <?php /*?><?=$input->radio('txtType','VLSI','text','');?><?php */?>
      <input type="radio" name="txtType"   value="2" onclick="showOtherPlace(this.value)" />
      <label>Embedded</label>
      <?php /*?>	<?=$input->radio('txtType','Embedded','text','');?><?php */?>
      <input type="radio" name="txtType" value="3"    onclick="showOtherPlace(this.value)" />
      <label>Other</label>
      <?php /*?> <?=$input->radio('txtType','-2','text','');?><span class="error">*</span><?php */?>
      <span class="error"> *</span></td>
    <td  height="24" colspan="3"><div id="OtherPlaces" style="display:none;"> Add other Experience &nbsp;
              <input type="text" name="txtExp" id="txtExp" value="<?=$edit->we_other?>" /></div></td>
</tr>
 <tr>
          <td></td>
          <td></td>
        </tr>

<tr>
          <td></td>
          <td>&nbsp;</td>
</tr><tr>   
    <td  height="19" colspan="2">
     
<input type="image" name="workInsert" value="Save" src ="images/save.png" border="0"   /> 

<input type="image" name="workInsert" value="Save and Add Next" src ="images/save_n_next.png" border="0"   /> 

 <input type="image" name="close" value="Close"  src ="images/close.png" onclick="document.getElementById('adddiv_work').style.display='none';return false;" /> 

</td>
        
     
          
		             
     
    
    </tr> 
    <tr>
          <td colspan="2"></td>
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
   <div align="right"><a href="#" onclick="document.getElementById('adddiv_work').style.display='block';document.getElementById('id_display').style.display='none';return false;" ><img src="images/add_more.png" border="0" /></a></div></td></tr>
 <tr><td>
 <?     
 
  
    $m=1;  
    foreach($all_works_experince as $works){?> 
<?=$input->formStart('infoForm','','onSubmit="return work_Validation('.$works->we_id.');"');?>
    <input type="hidden" name="we_id" value="<?=$works->we_id;?>" />
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
  </tr>
    <tr>
    <td  class="">&nbsp;</td>
    <td><table width="100%" class="recruit_table"> 
  
 
<tr>
     <td width="255">&nbsp;</td>
     <td width="354" ><div align="center"><span class="error">&nbsp;</span></div></td>
</tr>

    
	
   
	
	
<tr>
  <td align="left"><span class="text">Company:<span class="error">*</span></span></td>
  <td  height="24" colspan="2"><span class="text">Designation:<span class="error">*</span></span></td>
</tr>
<tr>
  <td align="left"><input type="text" name="txtCompany" id="txtCompany<?=$works->we_id;?>"  value="<?=$works->we_company;?>" style="width:250px;"/></td>
  <td  height="24" colspan="2"><input type="text" name="txtDesignation" id="txtDesignation<?=$works->we_id;?>" style="width:250px;" value="<?=$works->we_designation?>" /></td>
</tr>
<tr>

   <td align="left" class="text">From Date: <span class="error">*</span></td>
    <td  height="24" colspan="2" class="text">To Date: <span class="error">*</span></td>
</tr>
 
<tr>
 <td align="left"><?  $fromdate=explode('-',$works->From_date); ?>
   <select name="selMonth" id="selMonth<?=$works->we_id;?>">
     <option value="-1">Month</option>
     <? for($d=0;$d<count($month_array1);$d++){?>
     <option value="<?=$d?>" <?=$d==$fromdate[0]?'selected':''?>>
       <?=$month_array1[$d]?>
       </option>
     <? }?>
   </select>
   <select name="selYear" id="selYear<?=$works->we_id;?>">
     <option value="0">Year</option>
     <? for($y=date(Y);$y>1970;$y--){?>
     <option value="<?=$y?>" <?=$y==$fromdate[1]?'selected':''?>>
       <?=$y?>
       </option>
     <? }?>
   </select></td> <?  $todate=explode('-',$works->To_date);?>
    <td  height="24" colspan="2"><select name="selMonth1" id="selMonth1<?=$works->we_id;?>">
	 <option value="-1">Month</option>
      <? for($d1=0;$d1<count($month_array1);$d1++){?>
      <option value="<?=$d1?>" <?=$d1==$todate[0]?'selected':''?>>
        <?=$month_array1[$d1]?>
        </option>
      <? }?>
    </select>
      <select name="selYear1" id="selYear1<?=$works->we_id;?>">
        <option value="0">Year</option>
        <? for($y1=date(Y);$y1>1970;$y1--){?>
        <option value="<?=$y1?>" <?=$y1==$todate[1]?'selected':''?>>
          <?=$y1?>
          </option>
        <? }?>
      </select></td>
    </tr>
	
	  <tr>
                  <td align="left"   ><span class="text">Experience Type:</span></td>
                  <td align="left">&nbsp;</td>
              </tr>   
					  <tr>
                  <td align="left"   ><input type="radio" name="txtType" <?=$works->we_type=='1'?'checked':''?>  value="1" onclick="showOtherPlaceEdit(this.value,'<?=$works->we_id?>')" />
                    <label>VLSI</label>
                    <input type="radio" name="txtType" <?=$works->we_type=='2'?'checked':''?>  value="2" onclick="showOtherPlaceEdit(this.value,'<?=$works->we_id?>')" />
                    <label>Embedded</label>
                    <input type="radio" name="txtType" <?=$works->we_type=='3'?'checked':''?> value="3"    onclick="showOtherPlaceEdit(this.value,'<?=$works->we_id?>')" />
                    <label>Other</label>
                    <span class="error"> *</span></td>
                  <td align="left" ><div id="OtherPlacesEdit<?=$works->we_id?>" <? 
if($_POST[txtType] == 3 || $works->we_type=='3') echo 'style="display:block;"'; 

else

echo 'style="display:none;"';  ?>
> Add other Experience &nbsp;
              <input type="text" name="txtExp" id="txtExp" value="<?=$works->we_other?>" /></div></td>
                  </tr>
	
 <tr>
          <td></td>
          <td></td>
        </tr>
 <tr>
    
    <td  height="19" colspan="2"><div align="left">
  <input type="image" name="updateWork" value="Save" src="images/update.png" border="0" />
  &nbsp;&nbsp;
      <a href="job_seeker_menu.php?menu=workDel&we_id=<?=$works->we_id;?>" onclick="performdelete('job_seeker_menu.php?confirmed=true'); return false;">
		<img src="images/delete.png" alt="cancel" title="Delete File" border="0"/></a>
      
    </div></td>
    </tr>

 <tr>
   <td  height="19">&nbsp;</td>
   <td><div align="right">
 <img src="images/add_project.png"  id='addButton'  onclick="new_project_vik(<?=$works->we_id?>,'company_id<?=$works->we_id;?>');return false;" style="cursor:pointer;" value='Add Project'; />
   </div></td>
 </tr>
 <tr>
   <td  height="19" colspan="2">
   <div id="company_id<?=$works->we_id;?>">
 <? 
  
   $output='';
   $work_exp_result=$db->getResults("select * from $work_projects_table where we_id='".$works->we_id."'"); 
 foreach($work_exp_result as $workExp){
 
  $output.='<table width="100%" border="0" cellspacing="3" cellpadding="3">
       <tr>
         <td width="32%">Title : </td><td width="48%">Duration : </td>
         
         
       </tr>
       <tr>
         <td width="32%"><input type="text" name="txtTitle" id="txtTitle"  class="text" style="width:250px;" value="'.stripslashes($workExp->wp_title).'" /></td>
         <td>From :&nbsp;
           <select name="selProjYearU1" id="selProjYearU1">
           <option value="0">Year</option>
           ';
		 for($yp=date(Y);$yp>1970;$yp--){ 
		 if($yp==$from_date[1]){
		 $sel2='selected';
		 }else{
		  $sel2='';
		 }
		 
		 $output.='
           <option value="'.$yp.'" '.$sel2.'>'.$yp.'</option>
           ';}
		 $output.=' 
         </select>
		 &nbsp;
           <select name="selProjMonthU1" id="selProjMonthU1">
             ';
		 $from_date=explode('-',$workExp->wp_from_date);
		 for($dp=0;$dp<count($month_array);$dp++){ 
		  if($dp==$from_date[0]){
		 $sel1='selected';
		 }else{
		  $sel1='';
		 }
		 $output.='
             <option value="'.$dp.'" '.$sel1.'>'.$month_array[$dp].'</option>
             ';}
		 $output.='
           </select>
           To :&nbsp;
           <select name="selProjMonthU" id="selProjMonthU">
             ';
		  $to_date=explode('-',$workExp->wp_to_date);
		 for($dm=0;$dm<count($month_array);$dm++){ 
		  if($dm==$to_date[0]){
		 $sel3='selected';
		 }else{
		  $sel3='';
		 }
		 $output.='
             <option value="'.$dm.'" '.$sel3.'>'.$month_array[$dm].'</option>
              ';
		 }
		    $output.='
           </select>
           &nbsp;
           <select name="selProjYearU123" id="selProjYearU123">
             <option value="0">Year</option>
             ';
			for($yy=date(Y);$yy>1970;$yy--){ 
			  if($yy==$to_date[1]){
		 $sel4='selected';
		 }else{
		  $sel4='';
		 }
			$output.='
             <option value="'.$yy.'" '.$sel4.'>'.$yy.'</option>
             '; 
			} 
			$output.='
           </select></td>
         <td width="19%">&nbsp;&nbsp;</td>
         <td width="1%">&nbsp;</td>
       </tr>
       
       <tr>
         <td class="text">Role : </td>
         <td class="text">Team SIze : </td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td><input type="text" name="txtRole" id="txtRole" style="width:250px;"  value="'.stripslashes($workExp->wp_role).'" /></td>
         <td><input type="text"  name="txtSize" id="txtSize" style="width:350px;" value="'.stripslashes($workExp->wp_team_size).'"  /></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td valign="top" class="text">Project Description : </td>
         <td class="text">Tools Used : </td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td valign="top"><textarea name="areaDescription" rows="2" id="areaDescription" style="width:250px;">'.stripslashes($workExp->wp_description).'</textarea></td>
         <td><textarea name="areaUsed" id="areaUsed" rows="2" style="width:350px; ">'.stripslashes($workExp->wp_tools).'</textarea></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td valign="top">Challenges : </td> <td>&nbsp;</td></tr>
         <tr>
         <td colspan="2"><textarea name="areaChallenges" rows="2" id="areaChallenges" style="width:250px;">"'.stripslashes($workExp->wp_challenges).'"</textarea> 
                </tr>
       <tr>
         <td>&nbsp;</td>
         <td>  <input type="image" name="saveAjax" value="Update" src="images/update.png" border="0" onclick="workExpUpdate(\''.$workExp->wp_id.'\',\''.$workExp->we_id.'\',document.getElementById(\'txtTitle\').value,
document.getElementById(\'selProjMonthU1\').value,document.getElementById(\'selProjYearU1\').value,document.getElementById(\'selProjMonthU\').value,document.getElementById(\'selProjYearU123\').value,document.getElementById(\'txtRole\').value,
document.getElementById(\'txtSize\').value,document.getElementById(\'areaDescription\').value,document.getElementById(\'areaUsed\').value,
document.getElementById(\'areaChallenges\').value);" />&nbsp;&nbsp;<input type="image" onclick="toDelete();workProjectDelete(\''.$workExp->wp_id.'\',\''.$workExp->we_id.'\');return false;" value="Delete" src="images/delete.png" border="0"  />         </td>
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
 
 echo $output;?>
 </div> </td>
   </tr>
</table></td>
    <td class="">&nbsp;</td>
  </tr>

</table>
<?=$input->formEnd()?> 
  <? $m++; }?>   
      
 
 
 </td></tr>
  <tr><td align="right"><a href="job_seeker_menu.php?tab=4"  ><img src="images/continue.png" border="0" /></a></td></tr>
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
    
    <td  height="19" width="420"><?=$input->submitButton('wepInsert','Save','button');?>&nbsp;&nbsp;&nbsp;<input type="button" name="SaveAddNext" value="Save and Add Next" class="button" onclick="document.getElementById('hdNext').value=1;" style="width:200px" /></td></tr>

	
</table>
 </div>
<?=$input->formEnd()?>
 </td></tr>
 <!--
 <tr><td><div id="wp_display"><a href="#" onclick="document.getElementById('addwork_exp_proj').style.display='block';document.getElementById('wp_display').style.display='none';" class="morelinkbtm">Add New Project</a></td></tr>
 <tr><td>-->


  <? //$input->formEnd()?>
