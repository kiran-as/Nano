<?php include_once('../db/dbconfig.php');
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
   $total_query=$db->getResults("SELECT * FROM $education_table where m_id='".$_SESSION[m_id]."' order by e_id desc");
   
   $edu_toal_count=count($total_query);
   
 ?>
 <script type="text/javascript">
function performdelete(DestURL) {
var ok = confirm("Are you sure you want to delete?");
if (ok) {location.href = deletefile.php;}
return ok;
} 
</script>
 <script type="text/javascript" src="js/ajax.js"></script> 
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

function Selectcourse(str)
{
	//alert("123");

	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="ajax_course.php";
	url=url+"?qua_id="+str;
	//alert(url);
	xmlhttp.onreadystatechange=SelectcourseResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function SelectcourseResult()
{
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
		
	//alert(xmlhttp.responseText);
		document.getElementById('CourseDataNew').innerHTML=xmlhttp.responseText;
	
	}
}

function selectQulification(val){
//alert("testing");
if(val==4 || val==5){
document.getElementById('schoolDiv').style.display='block';
document.getElementById('clgDiv').style.display='none';
 Selectcourse(val);
}else{
document.getElementById('schoolDiv').style.display='none';
document.getElementById('clgDiv').style.display='block';
  //alert("123");
  Selectcourse(val);

}
}

</script>
 
  <script src="prograss_bar/jquery.min.js"></script>
  <script src="prograss_bar/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#progressbar").progressbar({ value: 50 });
  });
  </script>
<script type="text/javascript">
 function changeState(typeID,noId)
{
//alert(noId);
	if(typeID!=99)
   {	
	document.getElementById("selDiv"+noId).style.display='none';
	 
	document.getElementById("textDiv"+noId).style.display='block';
	
	} else 
	 {		
		document.getElementById("selDiv"+noId).style.display='block';
	 
		document.getElementById("textDiv"+noId).style.display='none';
		 
	 }
	
	
}
</script>
	

<script>
function isNumericc(str)
	{
 	var re = /[^0-9]/g
 	if (re.test(str)) return false;
 	return true;
	}
function isalpha(str)
	{
 	var re = /[^a-zA-Z' ']/g
  	if (re.test(str)) return false;
 	return true;
	
	}


function edu_Validation(id)
{
				
		//alert("Naren");
		
		//		alert(document.getElementById('selQulification'+id).value);
				if($("#selQulification"+id).val()=='0')
			{
					alert("Please enter qualification");
					$("#selQulification"+id).focus();
					return false;
			}		
				
 	
	          if(document.getElementById('selQulification'+id).value==4 || document.getElementById('selQulification'+id).value==5){
			  			 // alert("malli"+id);
			  var percent=/(^100([.]0{1,2})?)$|(^\d{1,2}([.]\d{1,2})?)$/;
			 
			 	if($("#selsylbus"+id).val()=='0')
			{
					alert("Please select syllabus");
					$("#selsylbus"+id).focus();
					return false;
			}	
			 
			 	if($("#txtotherinst"+id).val()=='')
			{
					alert("Please enter School/Institute name");
					$("#txtotherinst"+id).focus();
					return false;
			}	 
			 	if($("#percentage"+id).val()=='')
			{
					alert("Please enter Percentage");
					$("#percentage"+id).focus();
					return false;
			}
			 else if($("#percentage"+id).val().search(percent) == -1)
						{
				
							alert("Please enter Percentage  from 1-100 ");		
							$("#percentage"+id).focus();				
							return false;
						}
					
					  
			  }else{

				if($("#selCourse"+id).val()=='0')
			{
					alert("Please select Course");
					$("#selCourse"+id).focus();
					return false;
			}		
				
				 	if($("#selBranch"+id).val()=='0')
			{
					alert("Please select Branch");
					$("#selBranch"+id).focus();
					return false;
			}		
								
				   	if($("#selInst"+id).val()=='0')
			{
					alert("Please select Institute");
					$("#selInst"+id).focus();
					return false;
			}		
							
				   	if($("#selUniv"+id).val()=='0')
			{
					alert("Please select University");
					$("#selUniv"+id).focus();
					return false;
			}	
			if($("input[name='mark_type']:checked").val() == 'Percentage'){
			
								    var percent = /(^100([.]0{1,2})?)$|(^\d{1,2}([.]\d{1,2})?)$/;
									var obj=document.getElementById("agg_marks");
									var object=document.getElementById("mark_type");
									// alert("obj");
							
					 if($("#agg_marks"+id).val()==" ")
						{
							alert("Please fill up Percentage");
							$("#agg_marks"+id).focus();
							return false;
						}
				
					else if($("#agg_marks"+id).val().search(percent) == -1)
						{
				
							alert("Please enter Percentage  from 1-100 ");		
							$("#agg_marks"+id).focus();				
							return false;
						}
		
					

			}
			
			
			 if($("input[name='mark_type']:checked").val() == 'CGPA'){
			
									var cgpa = /^[123456789]$/
									var obj=document.getElementById("agg_marks");
									var object=document.getElementById("mark_type");
									 //alert("obj1");
								
					 if($("#agg_marks"+id).val()=="")
						{
							alert("Please fill up CGPA");
							$("#agg_marks"+id).focus();
							return false;
						}
				
					else if($("#agg_marks"+id).val().search(cgpa) == -1)
						{
				
							alert("Please enter value from 1 - 10");						
							$("#agg_marks"+id).focus();
							return false;
						}
		
					

			}
			
				}		
					  	if($("#selMonth"+id).val()=='0')
			{
					alert("Please select Passout Month");
					$("#selMonth"+id).focus();
					return false;
			}		
			
			  	if($("#selPassedyear"+id).val()=='0')
			{
					alert("Please select Passout Year");
					$("#selPassedyear"+id).focus();
					return false;
			}
				
			
			
 if(document.getElementById('selCountry'+id).value==99)
			  
			  
{							
					if($("#selState"+id).val()=='')
			{
					alert("Please select state");
					$("#selState"+id).focus();
					return false;
			}
			
}		
			
			
			
 if(document.getElementById('selCountry'+id).value!=99)
			  
			  
{							
					if($("#txtState"+id).val()=='')
			{
					alert("Please select state");
					$("#txtState"+id).focus();
					return false;
			}
			
}		
						
			
			
							
					if($("#txtCity"+id).val()=='')
			{
					alert("Please Enter City");
					$("#txtCity"+id).focus();
					return false;
			}
			if (isalpha($('#txtCity'+id).val())==false) {
                        alert('Please enter City with alphabets');
                        $('#txtCity'+id).focus();
                        return false;
                    }
					
			
				}
					
 
  </script>

 
	 
<table width="100%"  class="recruit_table"  > 
<tr>
   <td colspan="2" valign="bttom"   align="right"><a href=job_seeker_menu.php?tab=5 style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" >Step - 3/5 &nbsp;&nbsp;<img src="images/preview.png" border="0" align="absmiddle"/></a></td>
</tr>

<tr>
  <td align="right"><div class="heading1" style="float:left; padding:0px;  ">Educational Details</div><a href="job_seeker_menu.php?tab=3" ><img src="images/skip.png" border="0" /></a></td>
</tr>
<tr>
  <td ><div style="float:left" class="error"><?=messaging($_REQUEST[msg])?></div><div style="float:right" class="error">* Indicates Required field</div></td>
</tr><tr>
  <td ><div id="" style="float:left;color:#880011; text-decoration:none; "><BLINK><strong>Employability Factor&nbsp;:&nbsp;<?=employabilityFactor($_SESSION[m_id])?></strong></BLINK><a HREF="javascript:self.close()" onclick="window.open('emp.php','welcome','width=400,height=300')" style="text-decoration:none; color:#880011; ">&nbsp;&nbsp;Click here for Details</a></div><div id="id_display"  <?=$edu_toal_count==0?'style="display:none;"':'style="display:block;"'; ?>>
   <div align="right"><a href="#" onclick="document.getElementById('addDiv_edu').style.display='block';document.getElementById('id_display').style.display='none';return false;"><img src="images/add_more.png" border="0" /> </a></div></div></td>
</tr>
<tr>
  <td>
<?=$input->formStart('infoForm','','onSubmit="return edu_Validation(\'\');"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="addDiv_edu" <?=($edu_toal_count==0 || $_REQUEST[action]=='new')?'style="display:block;"':'style="display:none;"'; ?> >

<table width="100%" align="left" class="recruit_table" style="margin-top:5px;">
<tr>
     <td height="25" colspan="2"><strong>Add Educational Details </strong></td>
</tr>

<tr>
    <td  height="1"  class="text" align="left" colspan="1"><span class="text" style="padding-right:53px;">Qualification : </span></td>
    <td  height="" width="974"><? $qualifications_table_qry = "select * from $qualifications_table";
		$qualifications_table_qry = mysql_query($qualifications_table_qry) or die('error at countries'.mysql_error());?>
			
		
		
		<select name="selQulification" id="selQulification" style="width:150px;" onchange="selectQulification(this.value)">;
		<option value="0"> Select Qualification</option>
		<? 
		$i=1;
		while($titels_result=mysql_fetch_array($qualifications_table_qry))
		 {
		 if($titels_result[qua_id]==$alleducation->qua_id)
		 $sel='selected="selected"';
		 else
		 $sel='';
		?>
		<option <?=$sel?> value="<?=$titels_result[qua_id]?>"><?=$titels_result[qua_title]?></option>
        <?
		$i++;
		}
       	?>
		</select> 
        
        <span class="error">*</span>		</td>
</tr>
<tr><td colspan="2"><div id="clgDiv"><table width="103%">
 <tr>
    <td width="290" height="1"  class="text1" align="left" valign="top">Course :</td>
    <td width="892"  height="23" ><div id="CourseDataNew"><select name="selCourse" id="selCourse" style="width:150px;" ><option value="0">Select Qualification</option></select>
      <span class="error">*</span></div></td> 
</tr>
 
<tr>
  <td  height="19" class="text">Branch  : </td>
  <td  height="19"><select name="selBranch" id="selBranch" style="width:150px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from $branch_table");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->branch_id==$alleducation->branch_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->branch_id;?>" <?=$sel?> >
   <?=$branchs->branch_name;?>
   </option>
   <? } ?></select>
    <span class="error">*</span></td>
</tr>
<tr>
  <td  height="19" class="text">Institute : </td>
  <td  height="19"><select name="selInst"  id="selInst" style="width:150px;">
   <option value="0">Select Institute</option>
   <?  $insttions=$db->getResults("select * from $institutes");
						   foreach($insttions as $inst)
						   {
						   if($inst->insti_id==$alleducation->insti_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$inst->insti_id;?>" <?=$sel?> >
   <?=$inst->insti_name;?>
   </option>
   <? }?>
 </select>
    <span class="error">*</span></td>
</tr>

<tr>
  <td  height="19" class="text">University : </td>
  <td  height="19"><select name="selUniv" id="selUniv" style="width:150px;">
   <option value="0">Select University</option>
   <?  $insttions=$db->getResults("select * from $universities_table");
						   foreach($insttions as $inst){
						   if($inst->uni_id==$alleducation->uni_id){
						   $sel="selected";
						   }else{
						   $sel="";
						   }?>
   <option value="<?=$inst->uni_id;?>" <?=$sel?>>
   <?=$inst->uni_name;?>
   </option>
   <? }?>
 </select>
    <span class="error">*</span></td>
</tr>
<tr>
    <td  height="19" class="text" width="290">Aggregate Marks :</td>
    <td height="19" class="text">
	Percentage : <input type="radio" name="mark_type" id="mark_type" value="Percentage" />

  
	CGPA(out of 10) : <input type="radio" name="mark_type" id="mark_type" value="CGPA" />

	  <input type="text" name="agg_marks"  id="agg_marks"   style="width:30px;"  maxlength="5"/>
	  <span class="error1"> *</span></td>
</tr>
</table>
</div>



<div id="schoolDiv" style="display:none;"><table width="87%">

<tr>
  <td class="text"   > <span>Syllabus :</span> </td>
  <td  height="19"><select  name="selsylbus" id="selsylbus" style="width:150px;">
			 <option value="0">select</option>
			 <option value="state" <?=$alleducation->e_sylbus=='state'?'selected':''?>>State Sylabus</option>
			 <option value="cbsc" <?=$alleducation->e_sylbus=='cbsc'?'selected':''?>>CBSC</option>
			  <option value="icsc" <?=$alleducation->e_sylbus=='icsc'?'selected':''?>>ICSC</option>
    </select></td>
</tr>
<tr>
  <td  height="19" class="text">Institute : </td>
  <td  height="19"><input type="text" name="txtotherinst" style="width:146px;" id="txtotherinst" value="<?=stripslashes($alleducation->e_other_institute)?>" /></td>
</tr>
<tr>
  <td  height="19" class="text">Percentage</td>
  <td  height="19"><input type="text" name="percentage"  id="percentage"   style="width:30px;"  maxlength="5"/></td>
</tr>
</table></div></td></tr>

<tr>
  <td  height="19" class="text">Passout :</td>
  <td  height="19"><select name="selMonth" id="selMonth">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>    &nbsp;&nbsp;
    <select name="selPassedyear" id="selPassedyear">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>
      </select>
    <span class="error">*</span></td></tr>

				
<tr>

  <td  height="19" class="text">Country :</td>
  <td  height="19"><select name="selCountry" id="selCountry" style="width:150px;" onChange="changeState(this.value,'A')">
 
   <!--<option value="">Select country </option>-->
    <? $country_results=$db->getResults("select * from $countries");
	foreach($country_results as $countries123){
	?>
	
	<option value="<?=$countries123->country_id;?>" <?=$countries123->country_id==99?'selected':''?>><?=$countries123->name?></option>
	
	<?
	
	}?>
 </select>
    <span class="error">*</span></td>
</tr>
<tr>
  <td  height="19" class="text">State :</td>
  <td  height="19"><div id="selDivA" > 
	<select name="selState" id="selState" style="width:150px;">
	
   <option value="">Select State </option>
    <? $states_results=$db->getResults("select * from $states where country_id=99 order by name asc");
	foreach($states_results as $states123){
	?>
	<option value="<?=$states123->state_id;?>" <?=$states123->state_id==$alleducation->state_id?'selected':''?>><?=$states123->name?></option>
	
	<?
	
	}?>
 </select>
	<span class="error">*</span></div>
  <div id="textDivA" style="display:none;"><input type="text" name="txtState"   value="" style="width:150px;" /></div></td>
</tr>
<tr>
  <td  height="19" class="text">City :</td>
  <td  height="19"><input type="text" name="txtCity"  id="txtCity" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:145px;" />
    <span class="error">*</span></td>
</tr>
<tr>
  <td  height="19">&nbsp;</td>
  <td  height="19">&nbsp;</td>
</tr>
<tr>
    
    <td  height="19" width="302">&nbsp;</td>
    
    <td  height="19" width="974">
	
  <input type="image" name="eduInsert" value="Save"  SRC="images/save.png"  BORDER="0" />&nbsp;&nbsp;
  <input type="image" name="eduInsert" value="Save and Add Next" src="images/save_n_next.png" border="0" onclick="document.getElementById('hdNext').value=1;"  />
  
    &nbsp; &nbsp; 
          <input type="image" name="close" value="Close" src = "images/close.png" border="0" onclick="document.getElementById('addDiv_edu').style.display='none';document.getElementById('id_display').style.display='block';return false;" />    </td>
  </tr>
  </table>
 </div>
<?=$input->formEnd()?> </td></tr>


 <tr><td>
 <? 
    
	$k=0;
	foreach($total_query as $alleducation){?>
      
   
    <?=$input->formStart('infoForm','','onSubmit="return edu_Validation('.$alleducation->e_id.');"');?>
    <input type="hidden" name="e_id" value="<?=$alleducation->e_id;?>" />
   <table width="571" class="recruit_table" style="margin-top:10px" >

<tr>
     <td>&nbsp;</td>
	 <td><div align="right"></div></td>
     <td width="199"  align="left"  class="error">&nbsp;</td>
</tr>

<tr>
    <td width="144" height="1"  class="text" align="left"><span class="text" style="padding-right:53px;">Qualification : </span></td><td  height="" width="212">
	<? $qualifications_table_qry = "select * from $qualifications_table";
		$qualifications_table_qry = mysql_query($qualifications_table_qry) or die('error at countries'.mysql_error());?>
    
			
		
	
		
		
      <select name="selQulification" id="selQulification<?=$alleducation->e_id;?>" style="width:150px;" disabled="disabled" >
		<option value="0"> Select Qualification</option>
		<? 
		$i=1;
		while($titels_result=mysql_fetch_array($qualifications_table_qry))
		 {
		 if($titels_result[qua_id]==$alleducation->qua_id)
		 $sel='selected="selected"';
		 else
		 $sel='';
		?><option <?=$sel?> value="<?=$titels_result[qua_id]?>"><?=$titels_result[qua_title]?></option>
        <?
		$i++;
		}
       	?></select></td>
		<td class="error">*</td>	
</tr>
<? if($alleducation->qua_id!='4' && $alleducation->qua_id!='5'){?>          
 <tr>
    <td width="144" height="1"  class="text" align="left" valign="top">Course :</td>
    <td  height="23" ><div id="CourseData"><select name="selCourse" id="selCourse" style="width:150px;" >
	<? $courses_query=$db->getResults("select * from $course_table where qua_id='".$alleducation->qua_id."'");
	foreach($courses_query as $course_edu){
	?>
			 <option value="<?=$course_edu->cor_id?>" <?=$course_edu->cor_id==$alleducation->cor_id?'selected':''?>><?=stripslashes($course_edu->cor_name);?></option>
			 
			 <? }?>
			 
			 </select></div>
	<?php /*?><select name="selCourse" id="selCourse" style="width:150px;" >
	<? $courses_query=$db->getResults("select * from $course_table where qua_id='".$alleducation->qua_id."'");
	foreach($courses_query as $course_edu){
	?>
			 <option value="<?=$course_edu->cor_id?>" <?=$course_edu->cor_id==$alleducation->cor_id?'selected':''?>><?=stripslashes($course_edu->cor_name);?></option>
			 
			 <? }?>
			 
			 </select><?php */?></td>
			 <td class="error">*</td> 
</tr>
 
<tr>
  <td  height="19" class="text">Branch : </td>
  <td  height="19"><select name="selBranch" id="selBranch<?=$alleducation->e_id;?>" style="width:150px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from $branch_table");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->branch_id==$alleducation->branch_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->branch_id;?>" <?=$sel?> >
   <?=$branchs->branch_name;?>
   </option>
   <? }?></select></td><td><span class="error">*</span></td>
</tr>
<tr>
  <td  height="19" class="text">Institute : </td>
  <td  height="19"><select name="selInst" style="width:150px;" id="selInst<?=$alleducation->e_id;?>" >
   <option value="0">Select Institute</option>
   <?  $insttions=$db->getResults("select * from $institutes");
						   foreach($insttions as $inst)
						   {
						   if($inst->insti_id==$alleducation->insti_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$inst->insti_id;?>" <?=$sel?> >
   <?=$inst->insti_name;?>
   </option>
   <? }?>
 </select></td><td><span class="error">*</span></td>
</tr>
<tr>
  <td  height="19" class="text">University : </td>
  <td  height="19"><select name="selUniv" id ="selUniv<?=$alleducation->e_id; ?>" style="width:150px;">
   <option value="0">Select University</option>
   <?  $insttions=$db->getResults("select * from $universities_table");
						   foreach($insttions as $inst){
						   if($inst->uni_id==$alleducation->uni_id){
						   $sel="selected";
						   }else{
						   $sel="";
						   }?>
   <option value="<?=$inst->uni_id;?>" <?=$sel?>>
   <?=$inst->uni_name;?>
   </option>
   <? }?>
 </select></td><td><span class="error">*</span></td>
</tr>
<tr>
 <td width="167" height="1"  class="text">Aggregate Marks : </td>
 <td width="344">
 
<input type="radio" name="mark_type" id="mark_type<?=$alleducation->e_id;?>" value="Percentage"  <?=$alleducation->e_percentage=='Percentage'?'checked="checked"':''?> />
	<? //=$input->radio_checked('mark_type','Percentage','text',$Per);?>Percentage&nbsp;<input type="radio" name="mark_type" id="mark_type<?=$alleducation->e_id;?>" value="CGPA"   <?=$alleducation->e_percentage=='CGPA'?'checked="checked"':''?>  />
	<? //=$input->radio_checked('mark_type','CGPA','text',$Per);?>CGPA(out of 10) : <input type="text" name="agg_marks"  id="agg_marks<?=$alleducation->e_id;?>"   value="<?=$alleducation->e_agg_marks; ?>"  style="width:40px;" /></td> <td><span class="error">*</span></td></tr>
<? }else {?>
<tr>
  <td  height="19" class="text">Syllabus : </td>
  <td  height="19"><select  name="selsylbus" id="selsylbus<?=$alleducation->e_id;?>" style="width:150px;">
			 <option value="0">select</option>
			 <option value="state" <?=$alleducation->e_sylbus=='state'?'selected':''?>>State Sylabus</option>
			 <option value="cbsc" <?=$alleducation->e_sylbus=='cbsc'?'selected':''?>>CBSC</option>
			  <option value="icsc" <?=$alleducation->e_sylbus=='icsc'?'selected':''?>>ICSC</option>
			 </select></td><td><span class="error">*</span></td>
</tr>
<tr>
  <td  height="19" class="text">Institute : </td>
  <td  height="19"><input type="text" name="txtotherinst" style="width:150px;" id="txtotherinst<?=$alleducation->e_id;?>" value="<?=stripslashes($alleducation->e_other_institute)?>" /></td><td><span class="error">*</span></td>
</tr>
<tr>
  <td  height="19" class="text">Percentage : </td>
  <td  height="19"><input type="text" name="percentage" style="width:40px;" id="percentage<?=$alleducation->e_id;?>" value="<?=stripslashes($alleducation->e_school_percentage)?>" maxlength="5" /></td><td><span class="error">*</span></td>
</tr>
<? }?>
<tr>
  <td  height="19" class="text">Passout : </td>
  <td  height="19"><select name="selMonth" id="selMonth<?=$alleducation->e_id;?>">
	<? for($m=0;$m<count($month_array);$m++){?>
	<option value="<?=$m?>" <?=$alleducation->e_month==$m?'selected':''?>><?=$month_array[$m]?></option>
	<? }?>
	
	 </select>&nbsp;&nbsp;<select name="selPassedyear" id="selPassedyear<?=$alleducation->e_id;?>">
	   <option value="0">Select</option>
	<? for($y1=date(Y);$y1>1970;$y1--){?>
	 
	<option value="<?=$y1?>" <?=$alleducation->e_year==$y1?'selected':''?>><?=$y1?></option>
	<? }?>
	
	 </select></td><td><span class="error">*</span></td>
</tr>

	  <!--
<tr>
  <td  height="19">Aggregate Marks : </td>
  <td  height="19"><input type="text" name="txtPercentage"  id="txtPercentage<?=$alleducation->e_id;?>" maxlength="5"  value="<?//=stripslashes($alleducation->e_percentage)?>" style="width:113px;"  /></td><td><span class="error">*</span></td>
</tr>-->
<tr>
  <td  height="19" class="text">Country : </td>
  <td  height="19"><select name="selCountry" id="selCountry" style="width:150px;" onChange="changeState(this.value,<?=$k?>)">
 
   <!--<option value="">Select country </option>-->
    <? $country_results=$db->getResults("select * from $countries");
	foreach($country_results as $countries123){
	?>
	
	<option value="<?=$countries123->country_id;?>" <?=$countries123->country_id==$alleducation->e_country?'selected':''?>><?=$countries123->name?></option>
	
	<?
	
	}?>
 </select></td><td><span class="error">*</span></td>
</tr>
<tr>
  <td  height="19" class="text">State : </td>
  <td  height="19"><div id="selDiv<?=$k?>" <?=$alleducation->e_country==99?'style="display:block;"':'style="display:none;"'?>> 
	<select name="selState" id="selState" style="width:150px;">
	
 <!--  <option value="">Select State </option>-->
    <? $states_results=$db->getResults("select * from $states where country_id=99 order by name asc");
	foreach($states_results as $states123){
	?>
	<option value="<?=$states123->state_id;?>" <?=$states123->state_id==$alleducation->state_id?'selected':''?>><?=$states123->name?></option>
	
	<?
	
	}?>
 </select></div><div id="textDiv<?=$k?>" <?=$alleducation->e_country==99?'style="display:none;"':'style="display:block;"'?>><input type="text" name="txtState"   value="<?=stripslashes($alleducation->e_state);?>" style="width:150px;" /></div></td><td><span class="error">*</span></td>
</tr>
<tr>
  <td  height="19" class="text">City : </td>
  <td  height="19"><input type="text" name="txtCity"  id="txtCity<?=$alleducation->e_id;?>"  maxlength="20" value="<?=stripslashes($alleducation->e_city)?>"  style="width:150px;"/></td>
<td><span class="error">*</span></td>
</tr>
<tr>
    
    <td  height="19" width="144">&nbsp;</td>
    
    <td  height="19" width="212">

  <input type="image" name="eduSave" value="Save" src="images/update.png" border="0" />&nbsp;&nbsp;
	    <a href="job_seeker_menu.php?menu=eduDel&e_id=<?=$alleducation->e_id;?>" onclick="performdelete('job_seeker_menu.php?confirmed=true'); return false;">
		<img src="images/delete.png" alt="cancel" border="0" title="Delete File"/></a>
    <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>--></td>
    <td>&nbsp;</td>
  </tr>
  <tr><td colspan="3" align="right"></td></tr>
  </table>
<?=$input->formEnd()?> 
  <? $k++;}?>   
      
 
 
 
 
 
 </td></tr>
 <tr><td align="right"><a href="job_seeker_menu.php?tab=3" ><img src="images/continue.png" border="0" /></a></td></tr>
</table>

  <?=$input->formEnd()?>
