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
					alert("Please enter Company");
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
			
				if ($("input[name='txtType']:checked").val() != 'VLSI' && $("input[name='txtType']:checked").val() != 'Embedded'  && $("input[name='txtType']:checked").val() != '-2') {
                        alert('Please select your Experience Type');
                        return false;
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


	function showOtherPlaceEdit(val,id){
	//alert("hai");
	if(val == "-2"){
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
div_id=we_id;
//	alert(dur);
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
	
var new_pr='<input type="hidden" name="work1" value="'+work+'" id="work1"><table width="100%"><tr><td  colspan="3">&nbsp;</td></tr><tr><td colspan="3">Add Project Details</td></tr><tr><td height="25" colspan="3"></td></tr><tr><td height="1" align="left"  class="text">Title :</td><td colspan="2">Duration:</tr><tr><td width="327"><input type="text" name="txtTitle1" id="txtTitle1" value=""  style="width:300px;" /><span class="error">*</span></td><td  height="15" colspan="2">From :&nbsp;<select name="selProjMonth" id="selProjMonth"><option value="0">month</option><? for($dp=0;$dp<count($month_array);$dp++){?><option value="<?=$dp?>"><?=$month_array[$dp]?></option><? }?></select>&nbsp;&nbsp;<select name="selProjYear" id="selProjYear"><option value="0">Year</option><? for($yp=date(Y);$yp>1970;$yp--){?><option value="<?=$yp?>"><?=$yp?></option><? }?></select>To :&nbsp;<select name="selProjMonth1" id="selProjMonth1"><option value="0">month</option><? for($dm=0;$dm<count($month_array);$dm++){?><option value="<?=$dm?>" ><?=$month_array[$dm]?></option><? }?>    </select>&nbsp;<select name="selProjYear1" id="selProjYear1<?=$works->we_id;?>"><option value="0">Year</option><? for($yy=date(Y);$yy>1970;$yy--){?><option value="<?=$yy?>" ><?=$yy?></option><? }?> </select></td></tr><tr><td><span class="text">Role :</span></td><td  height="1"><span class="text">Team Size :</span></td></tr><tr><td width="327" height="1" align="left"  class="text"><input type="text" name="txtRole1" id="txtRole1" value=""  style="width:300px;" /><span class="error">*</span></td><td height="1" colspan="2"><input type="text" name="txtTeam1" id="txtTeam1" value=""  style="width:320px;" /><span class="error">*</span></td></tr><tr><td width="327" height="1" align="left"  class="text">Project Description :</td><td height="1" colspan="2"><span class="text">Tools Used : </span></td></tr><tr><td align="left" valign="top"   class="text"><textarea rows="3" cols="30"  style="width:300px;"name="areaDescription1" id="areaDescription1"></textarea></td><td height="" colspan="2"><textarea rows="3" cols="30" style="width:320px;" name="areaTools1" id="areaTools1"></textarea></td></tr><tr><td width="327" height="1" align="left" valign="top" class="text">Challenges : </td><td width="539">&nbsp;</td><td  height="1" width="112"><p></p></td></tr><tr><td width="327" height="1" align="left" valign="top"  class="text"><input type="text" name="areaChallenges1" style="width:300px;" id="areaChallenges1" /> </td><td height="1" colspan="2">&nbsp;</td></tr><tr><td width="327"  height="19">&nbsp;</td><td height="19" colspan="2"><input type="button" name="projNew" value="Save" class="button" onclick="workExpInsertInUpdate(document.getElementById(\'work1\').value,document.getElementById(\'txtTitle1\').value,document.getElementById(\'areaDescription1\').value,document.getElementById(\'selProjMonth\').value,document.getElementById(\'selProjYear\').value,document.getElementById(\'selProjMonth1\').value,document.getElementById(\'selProjYear\').value,document.getElementById(\'txtRole1\').value,document.getElementById(\'txtTeam1\').value,document.getElementById(\'areaTools1\').value,document.getElementById(\'areaChallenges1\').value)" /> &nbsp; &nbsp; <input type="button" name="" value="Close" class="button" onclick="closeDIvID(\''+div_id+'\')" /></td></tr><tr><td colspan="3"><hr /></td></tr></table>';
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
    <td><table width="96%"> 
  
  <tr>
     <td height="25" colspan="2"><strong>Add Work Experience Details </strong> </td>
</tr>

<tr>
     <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>

    
	<tr>
    <td width="159" height="1"  class="text" align="left">Company:</td>
    <td  height="" width="489"><input type="text" name="txtCompany" id="txtCompany" style="width:200px;" /><span class="error">*</span></td>
</tr>  
   
	<tr>
    <td width="159" height="1"  class="text" align="left">Designation:</td>
    <td  height="" width="489"><input type="text" name="txtDesignation" id="txtDesignation" style="width:200px;" /><span class="error">*</span></td>
</tr>  
	  <tr>
                  <td align="left" > From Date: </td>
                  <td align="left">
				 <select name="selMonth" id="selMonth">
				<option value="-1">Month</option>
				 <? for($d=0;$d<count($month_array);$d++){?> 
				  <option value="<?=$d?>" ><?=$month_array[$d]?></option>
				  <? }?></select>
	
	
		  <select name="selYear" id="selYear">
				 <option value="0">Year</option>
				 <? for($y=date(Y);$y>1970;$y--){?> 
				  <option value="<?=$y?>" <?=$y==$fromdate[1]?'selected':''?>><?=$y?></option>
				  <? }?></select>	<span class="error">*</span>  </td>
                </tr>
					  <tr>
                  <td align="left"  > To Date: </td>
                  <td align="left" >  <select name="selMonth1" id="selMonth1">
				  <option value="-1">Month</option>
				 <? for($d1=0;$d1<count($month_array);$d1++){?> 
				  <option value="<?=$d1?>" ><?=$month_array[$d1]?></option>
				  <? }?></select>
	
	
		  <select name="selYear1" id="selYear1">
				 
				 <option value="0">Year</option>
				 <? for($y1=date(Y);$y1>1970;$y1--){?> 
				  <option value="<?=$y1?>" ><?=$y1?></option>
				  <? }?></select><span class="error">*</span> </td>
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
          <td>
	  
<div id="OtherPlaces" style="display:none;"> Add other Experience &nbsp;
              <input type="text" name="txtExp" id="txtExp" value="<?=$edit->we_other?>" /></div></td>
        </tr>

<tr>
          <td></td>
          <td>&nbsp;</td>
</tr><tr>   
    <td  height="19" width="159">&nbsp;</td>
    
    <td  height="19" width="489">
  <?=$input->submitButton('workInsert','Save','button');?>&nbsp;&nbsp;&nbsp;<input type="submit" name="workInsert" value="Save and Add Next" class="button" onclick="document.getElementById('hdNext').value=1;" style="width:200px" />  </td>
   </tr> 
   <tr>   
    <td colspan="2"><div align="right">
      <!--<input name="button" type='button' class="button" id='button'  onclick="new_project(<?=$works->we_id?>,'company_id<?=$works->we_id;?>')" value='Add Project'; />-->
    </div></td>
   </tr> <tr>
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
   <div align="right"><a href="#" onclick="document.getElementById('adddiv_work').style.display='block';document.getElementById('id_display').style.display='none';" class="button" style="padding:3px; color:#FFF; text-decoration:none">Add more </a></div></td></tr>
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
	<input type="text" name="txtCompany" id="txtCompany<?=$works->we_id;?>" style="width:200px;" value="<?=$works->we_company;?>" /><span class="error"> *</span></td>
</tr>
 
<tr>
 <td align="left"><span class="text">Designation:</span></td>
    <td  height="24" colspan="3">
	<input type="text" name="txtDesignation" id="txtDesignation<?=$works->we_id;?>" style="width:200px;" value="<?=$works->we_designation?>" />
	<span class="error"> *</span></td>
    </tr>
	
	  <tr>
                  <td align="left"   > From Date: </td>
                  <td width="315" align="left">
                 <?  $fromdate=explode('-',$works->From_date); ?>
				 
				
				  <select name="selMonth" id="selMonth<?=$works->we_id;?>">
				 <? for($d=0;$d<count($month_array);$d++){?> 
				  <option value="<?=$d?>" <?=$d==$fromdate[0]?'selected':''?>><?=$month_array[$d]?></option>
				  <? }?></select>
	
	
		  <select name="selYear" id="selYear<?=$works->we_id;?>">
				 <option value="0">Year</option>
				 <? for($y=date(Y);$y>1970;$y--){?> 
				  <option value="<?=$y?>" <?=$y==$fromdate[1]?'selected':''?>><?=$y?></option>
				  <? }?></select>

			    <span class="error">*</span></td>
                  <td width="149">&nbsp;</td>
	  </tr>    <?  $todate=explode('-',$works->To_date);?>
					  <tr>
                  <td align="left"   > To Date: </td>
                  <td align="left" >  <select name="selMonth1" id="selMonth1<?=$works->we_id;?>">
				  
				 <? for($d1=0;$d1<count($month_array);$d1++){?> 
				  <option value="<?=$d1?>" <?=$d1==$todate[0]?'selected':''?>><?=$month_array[$d1]?></option>
				  <? }?></select>
	
	
		  <select name="selYear1" id="selYear1<?=$works->we_id;?>">
				 
				 <option value="0">Year</option>
				 <? for($y1=date(Y);$y1>1970;$y1--){?> 
				  <option value="<?=$y1?>" <?=$y1==$todate[1]?'selected':''?>><?=$y1?></option>
				  <? }?></select>
						<span class="error">*</span></td>
                  <td align="left" valign="top">&nbsp;</td>
					  </tr>
	<tr>
    <td align="left"><span class="text">Experience Type:</span></td>
    <td  height="24" colspan="3">
    
	<input type="radio" name="txtType" <?=$works->we_type=='VLSI'?'checked':''?>  value="VLSI" onclick="showOtherPlaceEdit(this.value,'<?=$works->we_id?>')" /><label>VLSI</label>  
	<input type="radio" name="txtType" <?=$works->we_type=='Embedded'?'checked':''?>  value="Embedded" onclick="showOtherPlaceEdit(this.value,'<?=$works->we_id?>')" /><label>Embedded</label>
    <input type="radio" name="txtType" <?=$works->we_type=='-2'?'checked':''?> value="-2"    onclick="showOtherPlaceEdit(this.value,'<?=$works->we_id?>')" /> <label>Other</label>
	<span class="error"> *</span></td>
</tr>
 <tr>
          <td></td>
          <td colspan="2">
	  
<div id="OtherPlacesEdit<?=$works->we_id?>" <? 
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
     <input name="button2" type='button' id='addButton' class="button" onclick="new_project_vik(<?=$works->we_id?>,'company_id<?=$works->we_id;?>');return false;" value='Add Project'; />
   </div></td>
 </tr>
 <tr>
   <td  height="19">&nbsp;</td>
   <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
   <td  height="19" colspan="3"></td>
   </tr>
 <tr>
   <td  height="19">&nbsp;</td>
   <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
   <td  height="19" colspan="3">
   <div id="company_id<?=$works->we_id;?>">
 <? 
  
   $output='';
   $work_exp_result=$db->getResults("select * from $work_projects_table where we_id='".$works->we_id."'"); 
 foreach($work_exp_result as $workExp){
 
  $output.='<table width="100%" border="0" cellspacing="3" cellpadding="3">
       <tr>
         <td width="27%">Title : </td>
         <td width="57%"><input type="text" name="txtTitle" id="txtTitle"  style="width:200px;" value="'.stripslashes($workExp->wp_title).'" /></td>
         <td width="16%">&nbsp;</td>
       </tr>
       <tr>
         <td rowspan="2">Duration : </td>
         <td>From :&nbsp;<select name="selProjMonthU1" id="selProjMonthU1"><option value="0">month</option>';
		 $from_date=explode('-',$workExp->wp_from_date);
		 for($dp=0;$dp<count($month_array);$dp++){ 
		  if($dp==$from_date[0]){
		 $sel1='selected';
		 }else{
		  $sel1='';
		 }
		 $output.='<option value="'.$dp.'" '.$sel1.'>'.$month_array[$dp].'</option>';}
		 $output.='</select>&nbsp;<select name="selProjYearU1" id="selProjYearU1"><option value="0">Year</option>';
		 for($yp=date(Y);$yp>1970;$yp--){ 
		 if($yp==$from_date[1]){
		 $sel2='selected';
		 }else{
		  $sel2='';
		 }
		 
		 $output.='<option value="'.$yp.'" '.$sel2.'>'.$yp.'</option>';}
		 $output.=' </select></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>To :&nbsp;&nbsp;&nbsp; &nbsp;<select name="selProjMonthU" id="selProjMonthU"><option value="0">month</option>';
		  $to_date=explode('-',$workExp->wp_to_date);
		 for($dm=0;$dm<count($month_array);$dm++){ 
		  if($dm==$to_date[0]){
		 $sel3='selected';
		 }else{
		  $sel3='';
		 }
		 $output.='<option value="'.$dm.'" '.$sel3.'>'.$month_array[$dm].'</option> ';
		 }
		    $output.='</select>&nbsp;&nbsp;<select name="selProjYearU123" id="selProjYearU123"><option value="0">Year</option>';
			for($yy=date(Y);$yy>1970;$yy--){ 
			  if($yy==$to_date[1]){
		 $sel4='selected';
		 }else{
		  $sel4='';
		 }
			$output.='<option value="'.$yy.'" '.$sel4.'>'.$yy.'</option>'; 
			} 
			$output.='</select></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>Role : </td>
         <td><input type="text" name="txtRole" id="txtRole" style="width:200px;"  value="'.stripslashes($workExp->wp_role).'" /></td>
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
         <td>  <input type="button" name="saveAjax" value="Update" class="button" onclick="workExpUpdate(\''.$workExp->wp_id.'\',\''.$workExp->we_id.'\',document.getElementById(\'txtTitle\').value,
document.getElementById(\'selProjMonthU1\').value,document.getElementById(\'selProjYearU1\').value,document.getElementById(\'selProjMonthU\').value,document.getElementById(\'selProjYearU123\').value,document.getElementById(\'txtRole\').value,
document.getElementById(\'txtSize\').value,document.getElementById(\'areaDescription\').value,document.getElementById(\'areaUsed\').value,
document.getElementById(\'areaChallenges\').value);" />&nbsp;&nbsp;<input type="button" onclick="toDelete();workProjectDelete(\''.$workExp->wp_id.'\',\''.$workExp->we_id.'\');return false;" value="Delete" class="button" />         </td>
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
