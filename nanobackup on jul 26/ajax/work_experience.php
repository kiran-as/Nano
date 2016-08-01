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
      $work_exp=$db->getResults("SELECT * FROM $work_experience_table where m_id='".$_SESSION[m_id]."' order by we_id desc"); 
 foreach($work_exp as $work){}
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
	 document.getElementById("OtherVLSITypes").style.display='none';	
	}
	 else if(typeID =='VLSI')
	 {
	  
	 document.getElementById("OtherVLSITypes").style.display='block';
	 document.getElementById("OtherCelebTypes").style.display='none';
		
	 }
	  else 
	 {
	  document.getElementById("OtherVLSITypes").style.display='none';
	 document.getElementById("OtherCelebTypes").style.display='none';
		
	 }
	
	
} function showCelebType1(typeID,di_id)
{

	if(typeID == -1)
   {
	
	document.getElementById("OtherCelebTypes"+di_id).style.display='block';
	document.getElementById("OtherVLSITypes"+di_id).style.display='none';	
	}
	 else if(typeID =='VLSI')
	 {
	  
	 document.getElementById("OtherVLSITypes"+di_id).style.display='block';
	 document.getElementById("OtherCelebTypes"+di_id).style.display='none';
		
	 }
	  else 
	 {
	  document.getElementById("OtherVLSITypes"+di_id).style.display='none';
	 document.getElementById("OtherCelebTypes"+di_id).style.display='none';
		
	 }
	
	
}
</script>

<script>

function validate(id)
{	

	    //  alert("Naren");
			
			if($("#txtTitle"+id).val()=='')
			{
					alert("Please enter Title");
					$("#txtTitle"+id).focus();
					return false;
			}		
			
						
			if($("#Role"+id).val()=='')
			{
					alert("Please enter Role");
					$("#Role"+id).focus();
					return false;	
			}		
			if($("#TeamSize"+id).val()=='')
			{
					alert("Please enter Teamsize");
					$("#TeamSize"+id).focus();
					return false;	
			}
			
			if($("#areaChallenges"+id).val()=='')
			{
					alert("Please enter Challenges");
					$("#areaChallenges"+id).focus();
					return false;			
			}	
}		

	</script>	
	
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
			
			 if($("#selYear"+id).val()>$("#selYear1"+id).val())
			 {
					alert("From Year should less than To Year");
					$("#selYear"+id).focus();
					return false;	
			 } 
			
			 } 
			 
			if(!document.getElementById("txtType1"+id).checked && !document.getElementById("txtType2"+id).checked && !document.getElementById("txtType3"+id).checked)
			{
					alert("Please select Experience Type");
					document.getElementById("txtType1"+id).focus();
					return false;	
			}   
			
			
			
			 var j =0;
			
/*
for (i=0; i<document.getElementsByName("txtType").length; i++) 
{

if (document.infoForm.txtType[i].checked)
   {
j++ ;

   }
 
}
							    if(j==0)
								
                             {
							alert("Please enter experience type");
	                            return false;
								
				             }*/
                         	        
                           
							   
							  
			}
			
		
		 




</script>
<!--Validation for javascript Form-->
<script>
	function js_Validation(id)
			{
			//	alert("123");
			
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
			
workExpInsertInUpdate(document.getElementById('work1').value,document.getElementById('txtTitle10').value,document.getElementById('areaDescription1').value,document.getElementById('selProjMonth0').value,document.getElementById('selProjYear0').value,document.getElementById('selProjMonth10').value,document.getElementById('selProjYear10').value,document.getElementById('txtRole10').value,document.getElementById('txtTeam10').value,document.getElementById('areaTools1').value,document.getElementById('areaChallenges1').value);
									
			}
			<!--Validation for javascript Form -->
</script>
<!--Validation for javascript Form-->
<script>
	function ajax_update_Validation(id)
			{
				//alert("Calling");
			
				if($("#txtTitle"+id).val()=='')
			{
					alert("Please enter Company name");
					$("#txtTitle"+id).focus();
					return false;
			}//alert("Calling");
					
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
//alert("dkhfgkdgkfg");
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
	
var new_pr='<input type="hidden" name="work1" value="'+work+'" id="work1"><table width="100%"><tr><td  colspan="3">&nbsp;</td></tr><tr><td colspan="3"  style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px">Add Project Details</td></tr><tr><td height="25" colspan="3"></td></tr><tr><td height="1" align="left"  class="text">Title :</td><td colspan="2"><span class="text">Role :<span class="error">*</span></span></tr><tr><td width="377"><input type="text" name="txtTitle1" id="txtTitle10" value=""  style="width:250px;" /></td><td  height="15" colspan="2"><input type="text" name="txtRole1" id="txtRole10" value="" style="width:250px;" /></td></tr><tr><td><span class="text">Duration:<span class="error">*</span></span></td><td  height="1"><span class="text">Team Size :<span class="error">*</span></span></td></tr><tr><td width="377" height="1" align="left" valign="top"  class="text"><select name="selProjMonth" id="selProjMonth0"><? for($dp=0;$dp<count($month_array);$dp++){?><option value="<?=$dp?>"><?=$month_array[$dp]?></option><? }?></select>&nbsp;&nbsp;<select name="selProjYear" id="selProjYear0"><option value="0">Year</option><? for($yp=date(Y);$yp>1970;$yp--){?><option value="<?=$yp?>"><?=$yp?></option><? }?></select>&nbsp;<select name="selProjMonth1" id="selProjMonth10"><? for($dm=0;$dm<count($month_array);$dm++){?><option value="<?=$dm?>" ><?=$month_array[$dm]?></option><? }?>    </select>&nbsp;<select name="selProjYear1" id="selProjYear10"><option value="0">Year</option><? for($yy=date(Y);$yy>1970;$yy--){?><option value="<?=$yy?>" ><?=$yy?></option><? }?> </select></td><td height="1" colspan="2"><input type="text" valign="top" name="txtTeam1" id="txtTeam10" value=""  style="width:250px;" /></td></tr><tr><td width="377" height="1" align="left"  class="text">Project Name :</td><td height="1" colspan="2"><span class="text">Tools Used : </span></td></tr><tr><td align="left" valign="top"   class="text"><textarea rows="2" cols="30"  style="width:250px;"name="areaDescription1" id="areaDescription1"></textarea></td><td height="" colspan="2"><textarea rows="2" cols="30" style="width:250px;" name="areaTools1" id="areaTools1"></textarea></td></tr><tr><td width="377" height="1" align="left" valign="top" class="text">Deliverable/Challenges Faced: </td><td width="697">&nbsp;</td><td  height="1" width="141"><p></p></td></tr><tr><td width="377" height="1" align="left" valign="top"  class="text"><textarea  name="areaChallenges1" style="width:250px;" rows="2" id="areaChallenges1"></textarea></td><td height="1" colspan="2">&nbsp;</td></tr><tr><td width="377"  height="19">&nbsp;</td><td height="19" colspan="2"><img name="projNew" value="Save" src="images/save.png" border="0" onClick="return js_Validation(0);" /> &nbsp; &nbsp;<img name="Close" value="Save" src="images/close.png" border="0" style="cursor:pointer;" onclick="closeDIvID(\''+div_id+'\');"/></td></tr></table>';
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
	<td width="196" height="1"  style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" colspan="2"><b>Resume Bulider:Steps - 3/5 </b></td></tr>
	<tr>
   <td colspan="" valign="bttom"   align="left" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" >Work Experience </td>
</tr><tr>
   <td colspan="2" valign="top"   align="right" style="margin-top:-10px;float:right;" ><b>If U Are A FRESHER U Can Skip This Step</b> </td>
</tr>

<tr></tr>
<tr>
 <td><div id="id_display" <?=($all_count==0 || $_REQUEST[action]=='new')?'style="display:none;"':'style="display:block;"'; ?>>
   <div align="right" colspan="4" style="margin-right:7px;">
   <a href="#"   onclick="document.getElementById('adddiv_work').style.display='block';document.getElementById('id_display').style.display='none';return false;" ><img src="images/add_company.png" border="0" /></a></div></td>
 
 
</tr>
<tr>
  
</tr>
<tr><td >
<?=$input->formStart('infoForm','','onSubmit="return work_Validation(\'\');"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />

<div id="adddiv_work" <?=($all_count==0 || $_REQUEST[action]=='new')?'style="display:block;"':'style="display:none;"'; ?>><table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr>
    <td><table width="99%"> 
  
  <tr></tr>
   <td style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px;padding:0px">Add Work Experience    </td>
<tr>
     <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>
	<tr>
	  <td height="1"  class="text" align="left">Company:<span class="error">*</span></td>
	   <td  height=""><span class="text">Designation:<span class="error">*          </span></span></td>
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
                  <td align="left" width="304"><select name="selMonth" id="selMonth" width="25%">
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
                </tr><!--
					  <tr>
                  <td align="left"  ><span class="text">Experience Type:</span></td>
                  <td align="left" >&nbsp;</td>
                </tr>
					<tr>
    <td align="left"><input type="radio" name="txtType"  id="txtType1"  value="1" onclick="showOtherPlace(this.value)" />
      <label>VLSI</label>
      <?php /*?><?=$input->radio('txtType','VLSI','text','');?><?php */?>
      <input type="radio" name="txtType"   value="2" id="txtType2"  onclick="showOtherPlace(this.value)" />
      <label>Embedded</label>
      <?php /*?>	<?=$input->radio('txtType','Embedded','text','');?><?php */?>
      <input type="radio" name="txtType" value="3"    id="txtType3"  onclick="showOtherPlace(this.value)" />
      <label>Other</label>
      <?php /*?> <?=$input->radio('txtType','-2','text','');?><span class="error">*</span><?php */?>
      <span class="error"> *</span></td>
    <td  height="24" colspan="3"><div id="OtherPlaces" style="display:none;"> Add other Experience &nbsp;
              <input type="text" name="txtExp" id="txtExp" value="<?=$edit->we_other?>" /></div></td>
</tr>-->


<tr>
          <td></td>
          <td>&nbsp;</td>
</tr><tr>   
    <td  height="19" colspan="2">
     
<input type="image" name="workInsert" value="Save" src ="images/save.png" border="0"   /> 
            <?//=$input->submitButton('workInsert','save','','style=background-color:#424843;color:#ffffff');?>

<!--
<input type="image" name="workInsert" value="Save and Add Next" src ="images/save_n_next.png" border="0"   /> 

 <input type="image" name="close" value="Close"  src ="images/close.png" onclick="document.getElementById('adddiv_work').style.display='none';return false;" /> -->

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
 
 
 
 <tr><td>
 <?     
 
  
    $m=1;  
    foreach($all_works_experince as $works){?> 
<?=$input->formStart('infoForm','','');?>
    <input type="hidden" name="we_id" value="<?=$works->we_id;?>" />
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td>
	<td colspan="2" class="error" align="center"><?=messaging($_REQUEST[msg]);?></td>
    <table width="100%" class="recruit_table"> 
 <!--<tr>
     <td width="255">&nbsp;</td>
     <td width="354" ><div align="center"><span class="error">&nbsp;</span></div></td>
</tr>-->

	
<tr>
  <td align="left"><span class="text">Company:<span class="error">*</span></span></td>
    <td  height="24"><span class="text">Designation:<span class="error">*</span></span></td>

</tr>
<tr>
  <td align="left"><input type="text" name="txtCompany" id="txtCompany<?=$works->we_id;?>"  value="<?=$works->we_company;?>" style="width:250px;"/></td>
  <td  height="24" ><input type="text" name="txtDesignation" id="txtDesignation<?=$works->we_id;?>" style="width:250px;" value="<?=$works->we_designation?>" /></td>
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
	<tr> <td>&nbsp;</td></tr>
	<tr><td>
    	  <input type="submit" name="updateWork" id="updateWork" value="Update"></td></tr>

<!--
	  <tr>
                  <td align="left"   ><span class="text">Experience Type:</span></td>
                  <td align="left">&nbsp;</td>
              </tr>   

 	  <tr>
                  <td align="left"   ><input type="radio" name="txtType" id="txtType1<?=$works->we_id;?>"   <?=$works->we_type=='1'?'checked':''?>  value="1" onclick="showOtherPlaceEdit(this.value,'<?=$works->we_id?>')" />
                    <label>VLSI</label>
                    <input type="radio" name="txtType" id="txtType2<?=$works->we_id;?>"  <?=$works->we_type=='2'?'checked':''?>  value="2" onclick="showOtherPlaceEdit(this.value,'<?=$works->we_id?>')" />
                    <label>Embedded</label>
                    <input type="radio" name="txtType" id="txtType3<?=$works->we_id;?>"  <?=$works->we_type=='3'?'checked':''?> value="3"    onclick="showOtherPlaceEdit(this.value,'<?=$works->we_id?>')" />
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
    
    <td  height="19" colspan="2"><div align="left">-->
  
   <!--   <a href="job_seeker_menu.php?menu=workDel&we_id=<?=$works->we_id;?>" onclick="performdelete('job_seeker_menu.php?confirmed=true'); return false;">
		<img src="images/delete.png" alt="cancel" title="Delete File" border="0"/></a>
      
    </div></td>
    </tr>-->

 <tr>
   <td align="right" colspan="2"><div >
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
 
  $output.='<table width="100%" border="0" cellspacing="3" cellpadding="3" style="border-bottom:1px solid;">
       <tr>
         <td width="47%">Title : </td><td width="53%"><span class="text">Role : </span></td>
       </tr>
       <tr>
         <td width="47%">
		<input type="text" name="txtTitle" id="txtTitle"  class="text" style="width:250px;" value="'.stripslashes($workExp->wp_title).'" /></td>
         <td><input type="text" name="txtRole" id="txtRole" style="width:250px;"  value="'.stripslashes($workExp->wp_role).'" /></td>
         
       </tr>
       
       <tr>
         <td class="text">Duration : </td>
         <td class="text">Team SIze : </td>
       
       </tr>
       <tr>
         <td> <select name="selProjMonthU1" id="selProjMonthU1">
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
           </select>&nbsp;<select name="selProjYearU1" id="selProjYearU1">
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
         </select>&nbsp;&nbsp;<select name="selProjMonthU" id="selProjMonthU">
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
         <td><input type="text"  name="txtSize" id="txtSize" style="width:250px;" value="'.stripslashes($workExp->wp_team_size).'"  /></td>
        
       </tr>
       <tr>
         <td valign="top" class="text">Project Name : </td>
         <td class="text">Tools Used : </td>
       
       </tr>
       <tr>
         <td valign="top"><textarea name="areaDescription" rows="2" id="areaDescription" style="width:250px;">'.stripslashes($workExp->wp_description).'</textarea></td>
         <td><textarea name="areaUsed" id="areaUsed" rows="2" style="width:250px; ">'.stripslashes($workExp->wp_tools).'</textarea></td>
        
       </tr>
       <tr>
         <td valign="top">Deliverable/Challenges Faced: </td> <td>&nbsp;</td></tr>
         <tr>
         <td colspan="2"><textarea name="areaChallenges" rows="2" id="areaChallenges" style="width:250px;">'.stripslashes($workExp->wp_challenges).'</textarea>                </tr>
       <tr>
       <td align="left">  <input type="button" name="saveAjax" value="Update"  border="0" onclick="ajax_update_Validation(0);workExpUpdate(\''.$workExp->wp_id.'\',\''.$workExp->we_id.'\',document.getElementById(\'txtTitle\').value,
document.getElementById(\'selProjMonthU1\').value,document.getElementById(\'selProjYearU1\').value,document.getElementById(\'selProjMonthU\').value,document.getElementById(\'selProjYearU123\').value,document.getElementById(\'txtRole\').value,
document.getElementById(\'txtSize\').value,document.getElementById(\'areaDescription\').value,document.getElementById(\'areaUsed\').value,
document.getElementById(\'areaChallenges\').value);" />&nbsp;&nbsp;        </td>
       
       </tr>
       <tr>
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
  <tr></tr>
 </table>	
<?php ?> <tr><td>
 <?=$input->formStart('wepForm','','onSubmit="return wep_Validation();"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="addwork_exp_proj" style="display:none;">
<table width="643">
<tr><td  colspan="2" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px">Add Work Experience</td></tr>	  
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
  <table width="100%"   class="recruit_table"> 

<tr>
  <td><div style="float:left" class="error"><?=messaging($_REQUEST[msg])?></div><div style="float:right" class="error">* Indicates Required field</div></td>
</tr> 
 <tr> 
  
<td><!--
 <div id="" style="float:left; color:#880011;">
 <BLINK><strong>Employability Factor&nbsp;:&nbsp;<?=employabilityFactor($_SESSION[m_id])?></strong></BLINK>
 <a HREF="javascript:self.close()" onclick="window.open('emp.php','welcome','width=400,height=300')" style="text-decoration:none; color:#880011;>Click here for Details</a>
 </div>-->
 
      <div id="id_display" <?=$project_count==0?'style="display:none;"':'style="display:block;"'; ?>>
     <div align="right"><a href="#" onclick="document.getElementById('addProjDiv').style.display='block';document.getElementById('id_display').style.display='none';return false;"> <img src="images/add_more.png" border="0" /> </a></div>
     </div>
</td>
 
   
 </tr>
<tr><td >
<?=$input->formStart('infoForm','','onSubmit="return validate(\'\');"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="addProjDiv"<?=($project_count==0 || $_REQUEST[action]=='new')?'style="display:block;"':'style="display:none;"'; ?> >
<table width="100%"> 
<tr>
   <td  colspan="3" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px">Academic Project Details</td>
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
    <td width="342" height="1"  class="text" align="left">Duration :</td>
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
    <!--  <option value="0">---Select--- </option>-->
      <option  value="VLSI" <?=$edit->p_end=='VLSI'?'selected':''?>>VLSI Project</option>
      <option value="EMBEDED" <?=$edit->p_end=='EMBEDED'?'selected':''?>>Embeded Project</option>
      <option value="-1" <?=$edit->p_end=='-1'?'selected':''?>>Other</option>
    </select>      </td>
    <td width="429"><div id="OtherCelebTypes" <? if($projects->p_end=='-1') echo 'style="display:block;"'; else echo 'style="display:none;"'; ?>><input type="text" name="txtOtherproject"         id="txtOtherproject" value="<?=$projects->p_other_tech?>" maxlength="200" /></div> 
	<div id="OtherVLSITypes" <? if($projects->p_vlsitype=='0') echo 'style="display:none;"'; else echo 'style="display:block;"'; ?>><select name="selVLSIType" id="selVLSIType" style="width:100px;"><option value="1" <?=$projects->p_vlsitype=='1'?'selected':''?>>Front End</option><option value="2" <?=$projects->p_vlsitype=='2'?'selected':''?>>Back End</option></select></div>
	
	</td>
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
    <td width="342" height="1"  class="text" align="left" valign="top">Project Description :</td>
     <td height="1" colspan="2" align="left" valign="top"  class="text">Tools Used : </td>
</tr>    
 <tr>
   <td  height="23" >
<textarea rows="2" style="width:250px;" cols="48" name="areaDescription" id="areaDescription"></textarea></td>
    <td  height="23" colspan="2" >
<textarea  rows="2" style="width:250px;"  cols="48" name="areaTools" id="areaTools"></textarea></td> 
</tr>
 <tr>
    <td width="342" height="1"  class="text" align="left" valign="top">Deliverable/Challenges Faced:</td>
	<td colspan="2">&nbsp;</td>
	</tr>
     <tr>
    <td  height="23" >
<textarea name="areaChallenges" rows="2"   style="width:250px;"  id="areaChallenges"></textarea> </td> <td colspan="2">&nbsp;</td>
</tr>

<tr>
    
    <td  height="19" colspan="4"><div align="left">
    <input type="image" src="images/save.png" border="0" name="projectInsert" value="Save">
	            <?=$input->submitButton('projectInsert','save','','style=background-color:#424843;color:#ffffff');?>

      &nbsp; &nbsp; <!--
          <input type="image" name="projectInsert" value="Save and Add Next" src="images/save_n_next.png" border="0" onclick="document.getElementById('hdNext').value=1;"  />-->
      <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>-->
	   &nbsp; &nbsp; 
        <!--  <input type="image" name="close" value="Close" src="images/close.png" border="0"  onclick="document.getElementById('addProjDiv').style.display='none';return false;" />-->
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
	
    <table width="100%" class="recruit_table" style="margin-top:10px;" >
	<tr>
   <td  colspan="3" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px"><strong>Academic Project Details</strong></td>
 </tr>	
	<tr>
		 <td colspan="5" class="error" align="center" style="padding-left:100px;"><?=messaging($_REQUEST[msg]);?></td>
	</tr> 
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
      <option  value="VLSI" <?=$projects->p_end=='VLSI'?'selected':''?>>VLSI Project</option>
      <option value="EMBEDED" <?=$projects->p_end=='EMBEDED'?'selected':''?>>Embeded Project</option>
      <option value="-1" <?=$projects->p_end=='-1'?'selected':''?>>Other</option>
    </select>  </td> 

    <td width="324" ><div id="OtherCelebTypes<?=$projects->p_id; ?>" <? if($projects->p_end=='-1') echo 'style="display:block;"'; else echo 'style="display:none;"'; ?>><input type="text" name="txtOtherproject"         id="txtOtherproject" value="<?=$projects->p_other_tech?>" maxlength="200" /></div>
	
	<div id="OtherVLSITypes<?=$projects->p_id; ?>" <? if($projects->p_vlsitype=='0' || $projects->p_end!='VLSI') echo 'style="display:none;"'; else echo 'style="display:block;"'; ?>><select name="selVLSIType" id="selVLSIType" style="width:100px;"><option value="1" <?=$projects->p_vlsitype=='1'?'selected':''?>>Front End</option><option value="2" <?=$projects->p_vlsitype=='2'?'selected':''?>>Back End</option></select></div>
	</td>
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
    <td width="391" height="1"  class="text" align="left" valign="top">Project Name :</td>
      <td height="1" colspan="2" align="left"  class="text">Tools Used :</td>
</tr>

<tr><td  height="23"><textarea rows="2" cols="48" style="width:250px;" maxlength="250" name="areaDescription" id="areaDescription<?=$projects->p_id;?>"><?=stripslashes($projects->p_description); ?>
</textarea></td>
  <td  height="23" colspan="2" ><textarea rows="2" cols="48" style="width:250px;" name="areaTools" id="areaTools<?=$projects->p_id;?>"><?=stripslashes($projects->p_tools);?>
  </textarea></td> 
</tr> 
     	
 <tr>
    <td width="391" height="1"  class="text" align="left" valign="top">Deliverable/Challenges Faced: </td>
    <td height="1" colspan="2" align="left" valign="top"  class="text">&nbsp;</td>
</tr>
 <tr><td  height="23" colspan="3"><textarea name="areaChallenges" maxlength="250" rows="2"  style="width:250px;"  id="areaChallenges<?=$projects->p_id;?>"> <?=stripslashes($projects->p_challenges);?></textarea></td>
   </tr>
   <tr><td>  	  <input type="submit" name="projectUpdate" id="projectUpdate" value="Update"></td>
</td></tr>
 <!--
    <tr> 
    <td  height="23" colspan="3"><div align="center">
  <input type="image" name="projectUpdate" value="Save" src="images/save.png" border="0" />
  &nbsp;&nbsp;
<a href="job_seeker_menu.php?menu=projectDel&p_id=<?=$projects->p_id;?>" onclick="performdelete('job_seeker_menu.php?confirmed=true'); return false;">
		<img src="images/delete.png" alt="cancel" title="Delete File" border="0"/></a>
      
    </div></td> 
</tr>-->
</table>
   <?=$input->formEnd()?>  <? }?>   
      

 
 </td></tr>
 <tr><td align="right"><a href="job_seeker_menu.php?tab=3"  ><img src="images/continue.png" border="0" /></a></td></tr>
</table>
