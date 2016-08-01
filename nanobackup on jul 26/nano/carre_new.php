<?
   include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
   include_once('../classes/messages.php');  
   include_once('../db/dbconfig.php');
	
 //include_once('config/header.php');
  $check=new checkingAuth();
   $check->loginCheck();   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
 ?>
 

 
 <?php
$query="select * from $career_objective_table where m_id='".$_SESSION[m_id]."'";
$career_obj=$db->getResults($query);
  foreach($career_obj as $career){}
 $query_edu = "SELECT * FROM $core_competecny_table where m_id='".$_SESSION[m_id]."' order by cc_id desc"; 
      $core_obj_result=$db->getResults($query_edu); 
	  $core_obj_count=count($core_obj_result);
  
   $query_achv = "SELECT * FROM $achievements_table where m_id='".$_SESSION[m_id]."' order by ac_id desc"; 
      $achv_result=$db->getResults($query_achv);
	  $achv_count=count($achv_result);
	  
	  
	  			

  $members_result=$db->getResults("SELECT * FROM $members_table where m_id='".$_SESSION[m_id]."'");
     $total_query=$db->getResults("SELECT * FROM rv_educational_details1 where m_id='".$_SESSION[m_id]."' order by e_id asc");
   
   $edu_toal_count=count($total_query);
   
     if($_REQUEST[menu]=='eduDel' && is_numeric($_REQUEST[e_id])!='')
  for($i=0;$i<$count;$i++){
$del_id = $checkbox[$i];
$delete_query = "DELETE FROM $education_table1 WHERE e_id='$del_id'";
$result=$db->deleteRecord($delete_query);
echo '<script>document.location="job_seeker_menu.php?tab=1&msg=3";</script>';
}
 
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
   <script type="text/javascript">
   
   	function toDelete(){
								var ok;
							ok = window.confirm('Do you really want to Delete ?');
							if(ok){
								return true;
							}
							else{
								return false;
							}
							
							
							}
	  	
			function CarrerValidation(id)
			{
			
			
			
			if($("#Career"+id).val()=='')
			{
					alert("Please enter Career");
					$("#Career"+id).focus();
					return false;
			}		
			
								
				
			}
			
			
    </script>
		<script type="text/javascript">
function performdelete(DestURL) {
var ok = confirm("Are you sure you want to delete?");
if (ok) {location.href = deletefile.php;}
return ok;
} 
</script>
	
     <script type="text/javascript">
  

	  	
			function core_Validation(id)
			{
			
			if($("#txtTitle"+id).val()=='')
			{
					alert("Please enter Title");
					$("#txtTitle"+id).focus();
					return false;
			}		
			
		
			}
    </script>
	

  

	  	   <script type="text/javascript">
			function Achievements_Validation(id)
			{
			
			if($("#txtAchiveTitle"+id).val()=='')
			{
					alert("Please enter Title");
					$("#txtAchiveTitle"+id).focus();
					return false;
			}	
			
			}	
			
			function checkingRoll(){


			if(document.getElementById('chkRoll').checked==true){
			document.getElementById('addSubscriptionHidden').style.display='block';
			}else{
			document.getElementById('addSubscriptionHidden').style.display='none';
			rvupdate();
			
		//	alert("d,ljghkj");
			 <? 						
//$db->insertRecord("update  $members_table set m_student ='' where m_id='".$_SESSION[m_id]."'");
			?>
			
			}
			
			
			
			}
			
			function carCheckBox(){
			if(document.getElementById('chkCareer').checked==true)
{

document.getElementById('carDiv').style.display='Block';
}else{
document.getElementById('carDiv').style.display='none';
}			
			
			}
			
			
function Dis(val){
//alert("testing");
if(val=='RV-Vlsi'){
document.getElementById('rvShow').style.display='block';
document.getElementById('schoolDiv').style.display='none';
document.getElementById('skl').style.display='none';

}
else if(val=='10th' || val=='12th'){
document.getElementById('skl').style.display='block';
document.getElementById('schoolDiv').style.display='none';
document.getElementById('rvShow').style.display='none';
}else{
document.getElementById('rvShow').style.display='none';
document.getElementById('schoolDiv').style.display='block';
 }

}			
			
			</script>	
			<link rel="stylesheet" href="jquery-tooltip/jquery.tooltip.css" />
<link rel="stylesheet" href="../screen.css" />
<script src="../lib/jquery.js" type="text/javascript"></script>
<script src="../lib/jquery.bgiframe.js" type="text/javascript"></script>
<script src="../lib/jquery.dimensions.js" type="text/javascript"></script>
<script src="jquery-tooltip/jquery.tooltip.js" type="text/javascript"></script>

<script src="jquery-tooltip/chili-1.7.pack.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=$server_url?>ajax/ajax_data.js"></script>

<script type="text/javascript">
$(function() {
$('#set1 *').tooltip();

$("#foottip a").tooltip({
	bodyHandler: function() {
		return $($(this).attr("href")).html();
	},
	showURL: false
});

$('#tonus').tooltip({
	delay: 0,
	showURL: false,
	bodyHandler: function() {
		return $("<img/>").attr("src", this.src);
	}
});

$('#yahoo a').tooltip({
	track: true,
	delay: 0,
	showURL: false,
	showBody: " - ",
	fade: 250
});

$("select").tooltip({
	left: 25
});

$("map > area").tooltip({ positionLeft: true });

$("#fancy, #fancy2").tooltip({
	track: true,
	delay: 0,
	showURL: false,
	fixPNG: true,
	showBody: " - ",
	extraClass: "pretty fancy",
	top: -15,
	left: 5
});

$('#pretty').tooltip({
	track: true,
	delay: 0,
	showURL: false,
	showBody: " - ",
	extraClass: "pretty",
	fixPNG: true,
	left: -120
});

$('#right a').tooltip({
	track: true,
	delay: 0,
	showURL: false,
	extraClass: "right"
});
$('#right2 a').tooltip({ showURL: false, positionLeft: true });

$("#block").click($.tooltip.block);

});
</script>

	
<?=$input->formStart('txtForm1','');

$core_array=explode(",",$core_obj_result[0]->cc_array);
?>
<table width="100%" class="recruit_table" style="margin-top:10px;"  align="left" >
	<tr>
	  	<td width="196" height="1"  style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" colspan="2"><b>Resume Bulider:Step - 2/6 </b></td>
    </tr>

	 <tr>
   <td ><input type="checkbox" name="chkRoll" id="chkRoll" onClick="checkingRoll();" value="1"  <? if($members_result[0]->m_student!='' &&$members_result[0]->m_student!='NULL') echo 'checked="checked"'; ?> > <strong>Are you RV-VLSI Student </strong></td>
   </tr>
  <tr>
   <td><div id="addSubscriptionHidden" <? if($members_result[0]->m_student!='' &&$members_result[0]->m_student!='NULL') echo 'style="display:block"'; else echo 'style="display:none"'; ?>>
 <table >
 <tr><td><INPUT TYPE="text"   BORDER="0" onclick="if(this.value=='Student Id'){this.value='';}" value="<? if($members_result[0]->m_student!='' && $members_result[0]->m_student!='NULL') echo stripcslashes($members_result[0]->m_student); else echo 'Student Id'?>" name="Rvstudent"></td></tr>
 
<tr><td></td></tr>
</table>
</div>
<table width="100%" class="recruit_table" style="margin-top:10px;" style="align:center;" > 

 
 <!--Carrer Objective code  -->
 <input type="hidden" name="objectiveUpdate" value="objectiveUpdate" />
    <tr>
     <td height="25"   class="heading1" ><span id="Career" title="carrer">Career Objective</span></td>
<td>
<a HREF="javascript:self.close()" onclick="window.open('ex.php','welcome','width=400,height=300')">Example for Carrer Objective</a>
</td>

   </tr>
   
<tr>
<td  height="23" colspan="2"><div id="main"><fieldset id="set1">
	
	

	<textarea  rows="1" cols="70"  name="Career" id="Career"  title="To work in a core industry relevant to my academics and hone my skills in a advanced field such as VLSI and Embedded Systems"><?=stripslashes($career->co_objective);?></textarea></fieldset></div>
  <span class="error" style="float:center">*</span></td>
</tr> 
<!--  Core Competancy-->

  
   <tr>
      <td  class="heading1" colspan="2">Core Competancy Details </td>
   
	 	</tr>   
  
  <tr>
      <td width="81" align="left"  class="error1">&nbsp;</td>
	  <td width="1207" align="left"  class="heading1">&nbsp; </td>
   </tr> 
   
    <tr>
      <td ><input type="checkbox"  name="chkCareer[]" value="1" <?=in_array('1',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Good understanding of fundamentals of Transistors and circuit theory</span> </td>
	</tr>   
	
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" value="2" <?=in_array('2',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Good knowledge of Verilog RTL coding</span> </td>  
	</tr>   
	<tr>
	  <td><input type="checkbox" name="chkCareer[]" value="3" <?=in_array('3',$core_array)?'checked':'';?> /></td>
    <td  height=""><span>Good knowledge of Digitial Design Concepts</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" value="4" <?=in_array('4',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Good exposure to technology by undergoing additional training in VLSI and/or Embedded</span>  </td>  
	</tr>   
	<tr>  <td><input type="checkbox" name="chkCareer[]" value="5" <?=in_array('5',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Implemented a VLSI and/or embedded project during my undergrad/post grad</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" value="6" <?=in_array('6',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Attended technology intensive courses conducted by industry experts on VLSI and Embedded domains</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" value="7" <?=in_array('7',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Excellent knowledge of IC Fabrication process</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" value="8" <?=in_array('8',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Good working knowledge of Linux, and C programming</span>  </td>  
	</tr>   
    <tr>
      <td><input type="checkbox" name="chkCareer[]" id="chkCareer" value="-1" onclick="carCheckBox()" <?=in_array('-1',$core_array)?'checked':'';?> /></td>
    <td  height=""><span>Others</span>  </td>  
	</tr>   
 <tr>
      <td></td>
    <td ><div id="carDiv" <?=in_array('-1',$core_array)?'style="display:block;"':'style="display:none;"';?> ><textarea name="carrerArae" id="carrerArae" cols="60" rows="2" maxlength="250"><?=stripslashes($core_obj_result[0]->cc_other);?></textarea></div></td>  
	</tr> 

	<!-- Educational Details Code-->
	
	<tr>
<td height="1" class="heading1" colspan="4">Educational Details </td>
  </tr>
	<input type="hidden" name="hdNext" id="hdNext" value="" />
	<div id="addDiv_edu" <?=($edu_toal_count==0 || $_REQUEST[action]=='new')?'style="display:block;"':'style="display:none;"'; ?> >
	<table  width="100%" border="1" cellpadding="0" cellspacing="0">

<tr>
<td width="12%" class="padding_td" ><b>Qualification</b></td>
<td width="11%" align="center" class="padding_td"><b>Discipline</b> </td>
<td width="46%" class="padding_td"><b>Year of start - End</b></td>
<td width="18%" class="padding_td"><b>Name of the institute <br />& university & Location</b></td>
<td width="13%" class="padding_td"><b>Percentage</b></td>
</tr>
<tr>
<td class="padding_td" ><select name="txtQua[]" id="txtQua[]" style="width:100px;" onchange="Dis(this.value)">
			 <option value="0">select</option>
		     <option value="RV-Vlsi" >RV-Vlsi</option>
		     <option value="Phd">Phd</option>
  <option value="ME/Mtech">ME/Mtech</option>
  <option value="BE/Btech">BE/Btech</option>
  <option value="MSc">MSc</option>
  <option value="BSc">BSc</option>
  <option value="Diploma">Diploma</option>
  <option value="12th">12th</option>
    <option value="10th">10th</option>


   </option>
   </select></td>
<td class="padding_td">
			<div id="skl" style="display:none;">dfgdfg</div>
			<div id="schoolDiv" ><select name="selBranch[]" id="selBranch[]" style="width:100px;">
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
   <? } ?></select></div>
   <div id="rvShow" style="display:none;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from rv_discipline");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->dis_id==$alleducation->branch_name)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->dis_id;?>" <?=$sel?> >
   <?=$branchs->Discipline_name;?>
   </option>
   <? } ?></select></div></td>
<td class="padding_td"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /> </td>
<td class="padding_td"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td"><select name="txtQua[]" id="txtQua[]" style="width:100px;">
			<option value="0">select</option>
		     <option value="RV-Vlsi">RV-Vlsi</option>
		     <option value="Phd">Phd</option>
  <option value="ME/Mtech">ME/Mtech</option>
  <option value="BE/Btech">BE/Btech</option>
  <option value="MSc">MSc</option>
  <option value="BSc">BSc</option>
  <option value="Diploma">Diploma</option>
  <option value="12th">12th</option>
    <option value="10th">10th</option>



   </option>
   </select></td>
<td class="padding_td"><div id="skl" style="display:none;">dfgdfg</div>
<div id="schoolDiv" ><select name="selBranch[]" id="selBranch[]" style="width:100px;">
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
   <? } ?></select></div>
   <div id="rvShow" style="display:none;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from rv_discipline");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->id==$alleducation->branch_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->id;?>" <?=$sel?> >
   <?=$branchs->Discipline_name;?>
   </option>
   <? } ?></select></div></td>
<td class="padding_td"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /> </td>
<td class="padding_td"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td"><select name="txtQua[]" id="txtQua[]" style="width:100px;">
			<option value="0">select</option>
		     <option value="RV-Vlsi">RV-Vlsi</option>
		     <option value="Phd">Phd</option>
  <option value="ME/Mtech">ME/Mtech</option>
  <option value="BE/Btech">BE/Btech</option>
  <option value="MSc">MSc</option>
  <option value="BSc">BSc</option>
  <option value="Diploma">Diploma</option>
  <option value="12th">12th</option>
    <option value="10th">10th</option>



   </option>
   </select></td>
<td class="padding_td"><div id="skl" style="display:none;"></div><div id="schoolDiv" ><select name="selBranch[]" id="selBranch[]" style="width:100px;">
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
   <? } ?></select></div>
   <div id="rvShow" style="display:none;"><div id="skl" style="display:none;"></div><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from rv_discipline");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->id==$alleducation->branch_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->id;?>" <?=$sel?> >
   <?=$branchs->Discipline_name;?>
   </option>
   <? } ?></select></div></td>
<td class="padding_td"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td"><select name="txtQua[]" id="txtQua[]" style="width:100px;">
			 <option value="0">select</option>
		     <option value="RV-Vlsi">RV-Vlsi</option>
		     <option value="Phd">Phd</option>
  <option value="ME/Mtech">ME/Mtech</option>
  <option value="BE/Btech">BE/Btech</option>
  <option value="MSc">MSc</option>
  <option value="BSc">BSc</option>
  <option value="Diploma">Diploma</option>
  <option value="12th">12th</option>
    <option value="10th">10th</option>



   </option>
   </select></td>
<td class="padding_td"><div id="skl" style="display:none;"></div><div id="schoolDiv" ><select name="selBranch[]" id="selBranch[]" style="width:100px;">
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
   <? } ?></select></div>
   <div id="rvShow" style="display:none;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from rv_discipline");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->id==$alleducation->branch_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->id;?>" <?=$sel?> >
   <?=$branchs->Discipline_name;?>
   </option>
   <? } ?></select></div></td>
<td class="padding_td"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td"><select name="txtQua[]" id="txtQua[]" style="width:100px;">
			 <option value="0">select</option>
		     <option value="RV-Vlsi">RV-Vlsi</option>
		     <option value="Phd">Phd</option>
  <option value="ME/Mtech">ME/Mtech</option>
  <option value="BE/Btech">BE/Btech</option>
  <option value="MSc">MSc</option>
  <option value="BSc">BSc</option>
  <option value="Diploma">Diploma</option>
  <option value="12th">12th</option>
    <option value="10th">10th</option>



   </option>
   </select></td>
<td class="padding_td"><div id="skl" style="display:none;"></div><div id="schoolDiv" ><select name="selBranch[]" id="selBranch[]" style="width:100px;">
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
   <? } ?></select></div>
   <div id="rvShow" style="display:none;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from rv_discipline");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->id==$alleducation->branch_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->id;?>" <?=$sel?> >
   <?=$branchs->Discipline_name;?>
   </option>
   <? } ?></select></div></td>
<td class="padding_td"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td"><select name="txtQua[]" id="txtQua[]" style="width:100px;">
			 <option value="0">select</option>
		     <option value="RV-Vlsi">RV-Vlsi</option>
		     <option value="Phd">Phd</option>
  <option value="ME/Mtech">ME/Mtech</option>
  <option value="BE/Btech">BE/Btech</option>
  <option value="MSc">MSc</option>
  <option value="BSc">BSc</option>
  <option value="Diploma">Diploma</option>
  <option value="12th">12th</option>
    <option value="10th">10th</option>



   </option>
   </select></td>
<td class="padding_td"><div id="skl" style="display:none;"></div><div id="schoolDiv" ><select name="selBranch[]" id="selBranch[]" style="width:100px;">
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
   <? } ?></select></div>
   <div id="rvShow" style="display:none;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from rv_discipline");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->id==$alleducation->branch_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->id;?>" <?=$sel?> >
   <?=$branchs->Discipline_name;?>
   </option>
   <? } ?></select></div></td>
<td class="padding_td"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td"><select name="txtQua[]" id="txtQua[]" style="width:100px;">
			 <option value="0">select</option>
		     <option value="RV-Vlsi">RV-Vlsi</option>
		     <option value="Phd">Phd</option>
  <option value="ME/Mtech">ME/Mtech</option>
  <option value="BE/Btech">BE/Btech</option>
  <option value="MSc">MSc</option>
  <option value="BSc">BSc</option>
  <option value="Diploma">Diploma</option>
  <option value="12th">12th</option>
    <option value="10th">10th</option>



   </option>
   </select></td>
<td class="padding_td"><div id="skl" style="display:none;"></div><div id="schoolDiv" ><select name="selBranch[]" id="selBranch[]" style="width:100px;">
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
   <? } ?></select></div>
   <div id="rvShow" style="display:none;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from rv_discipline");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->id==$alleducation->branch_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->id;?>" <?=$sel?> >
   <?=$branchs->Discipline_name;?>
   </option>
   <? } ?></select></div></td>
<td class="padding_td"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td"><select name="txtQua[]" id="txtQua[]" style="width:100px;">
			 <option value="0">select</option>
		     <option value="RV-Vlsi">RV-Vlsi</option>
		     <option value="Phd">Phd</option>
  <option value="ME/Mtech">ME/Mtech</option>
  <option value="BE/Btech">BE/Btech</option>
  <option value="MSc">MSc</option>
  <option value="BSc">BSc</option>
  <option value="Diploma">Diploma</option>
  <option value="12th">12th</option>
    <option value="10th">10th</option>



   </option>
   </select></td>
<td class="padding_td"><div id="skl" style="display:none;"></div><div id="schoolDiv" ><select name="selBranch[]" id="selBranch[]" style="width:100px;">
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
   <? } ?></select></div>
   <div id="rvShow" style="display:none;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from rv_discipline");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->id==$alleducation->branch_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->id;?>" <?=$sel?> >
   <?=$branchs->Discipline_name;?>
   </option>
   <? } ?></select></div></td>
<td class="padding_td"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td"><select name="txtQua[]" id="txtQua[]" style="width:100px;">
			 <option value="0">select</option>
		     <option value="RV-Vlsi">RV-Vlsi</option>
		     <option value="Phd">Phd</option>
  <option value="ME/Mtech">ME/Mtech</option>
  <option value="BE/Btech">BE/Btech</option>
  <option value="MSc">MSc</option>
  <option value="BSc">BSc</option>
  <option value="Diploma">Diploma</option>
  <option value="12th">12th</option>
    <option value="10th">10th</option>



   </option>
   </select></td>
<td class="padding_td"><div id="skl" style="display:none;"></div><div id="schoolDiv" ><select name="selBranch[]" id="selBranch[]" style="width:100px;">
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
   <? } ?></select></div>
   <div id="rvShow" style="display:none;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from rv_discipline");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->id==$alleducation->branch_id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->id;?>" <?=$sel?> >
   <?=$branchs->Discipline_name;?>
   </option>
   <? } ?></select></div></td>
<td class="padding_td"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>

  </div>
	</table>
</table>

		
<tr><td> 
<input name="insert" type="submit" class="button" value="Send Now" /></td></tr>
</table>
<?=$input->formEnd()?>
</td></tr>
		</table>
		
		
		