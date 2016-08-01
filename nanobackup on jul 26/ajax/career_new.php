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
			
			if($("#txtTitle"+id).val()=='')
			{
					alert("Please enter Title");
					$("#txtTitle"+id).focus();
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
			
			
function Dis(val,id){
//alert("testing");

if(val=='RV-Vlsi'){
document.getElementById('rvShow'+id).style.display='block';
document.getElementById('schoolDiv'+id).style.display='none';
document.getElementById('skl'+id).style.display='none';

}
else if(val=='10th' || val=='12th'){
document.getElementById('skl'+id).style.display='block';
document.getElementById('schoolDiv'+id).style.display='none';
document.getElementById('rvShow'+id).style.display='none';
}else{
document.getElementById('rvShow'+id).style.display='none';
document.getElementById('schoolDiv'+id).style.display='block';
document.getElementById('skl'+id).style.display='none';
 }

}			
		
function onDelete()
	{
		if(confirm('Do you want to delete ?')==true)
		{
			return true;
		}
		else
		{
			return false;
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

	
<? echo $input->formStart('txtForm1','','');
$core_array=explode(",",$core_obj_result[0]->cc_array);
?>
	  <form name="frmMain" method="post" action="#">

<table width="100%" class="recruit_table" style="margin-top:10px;"  align="left" >
	<tr>
	  	<td colspan="3" width="196" height="1"  style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px;" colspan="2"><b>Resume Bulider:Steps - 2/5 </b></td>
    </tr>

	 <tr>
   <td  colspan="3"><input type="checkbox" name="chkRoll" id="chkRoll" onClick="checkingRoll();" value="1"  <? if($members_result[0]->m_student!='' &&$members_result[0]->m_student!='NULL') echo 'checked="checked"'; ?> > <strong>Are you RV-VLSI Student </strong></td>
   </tr>
  <tr>
   <td colspan="3"><div id="addSubscriptionHidden" <? if($members_result[0]->m_student!='' &&$members_result[0]->m_student!='NULL') echo 'style="display:block"'; else echo 'style="display:none"'; ?>>
 <table>
 <tr><td colspan="3"><INPUT TYPE="text"   BORDER="0" onclick="if(this.value=='Student Id'){this.value='';}" onblur="return checkID(this.value); " value="<? if($members_result[0]->m_student!='' && $members_result[0]->m_student!='NULL') echo stripcslashes($members_result[0]->m_student); else echo 'Student ID'?>" name="Rvstudent" id="Rvstudent"></td></tr>
 
<tr><td></td></tr>
</table>
</div>
<table width="100%" class="recruit_table" style="margin-top:10px;" style="align:center;" > 

 
 <!--Carrer Objective code  -->
 <input type="hidden" name="objectiveUpdate" value="objectiveUpdate" />
    <tr style="margin:10px 0px;"><td  width="100%" colspan="3"  >
    <table width="100%" border="0"><tr style="margin:5px;">
    <td colspan="2" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px"><span id="Career" title="carrer">Career Objective</span></td>
    <td width="25%">
<a HREF="javascript:self.close()" onclick="window.open('ex.php','welcome','width=400,height=300')">Example for Career Objective</a></td>
    </tr>
    <tr>
<td  height="23" colspan="3"><div id="main"><fieldset id="set1">


	<textarea  rows="1" cols="70"  name="Career" id="Career"  title="To work in a core industry relevant to my academics and hone my skills in a advanced field such as VLSI and Embedded Systems"><?=stripslashes($career->co_objective);?></textarea></fieldset></div>
  <span class="error" style="float:center">*</span></td>
</tr> 
    </table>
    </td></tr>
     
        </tr>
        
        <tr>
        <td>&nbsp;</td>
        </tr>
   
<!--  Core Competancy-->

  <tr>
<td width="100%" style="">
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  
     <tr>
      <td  style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" colspan="2">Core Competancy Details </td>
   
	 	</tr>   
  
  <tr>
      <td align="left" colspan="3"  class="error1">&nbsp;</td>
	  <td width="1" align="left"  class="heading1">&nbsp; </td>
   </tr>
   	
   <tr>
      <td width="27" ><input type="checkbox"  name="chkCareer[]" value="1" <?=in_array('1',$core_array)?'checked':'';?> /></td>
    <td  height="" width="1091"><span>Good understanding of fundamentals of Transistors and circuit theory</span> </td>
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
</table>
</td>
</tr>

	<!-- Educational Details Code-->
    
    <tr>
    <td>&nbsp;</td>
    </tr>
		
	<tr>
    <td style="">
    <table>
    <tr>
    <td height="1" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" colspan="4">Educational Details </td>
    </tr>
		<input type="hidden" name="hdNext" id="hdNext" value="" />

<?php if($edu_toal_count > 0 || $edu_toal_count != '0'  )  { ?>
<input type="hidden" name="hdnID<?php echo $i;?>" size="5" value="<?php echo $alleducation->e_id;?>">
    <tr>
    <td>
    <table width="100%" align="left" class="recruit_table"  style="margin-top:5px;">
<tr>
<td>
<table  width="100%" border="1" cellpadding="0" cellspacing="0">
<tr>
<td width="10%" class="padding_td" style="padding:2px;" ></td>
<td width="10%" class="padding_td" style="padding:2px;" ><b>Qualification  </b></td>
<td width="13%"  class="padding_td" style="padding:2px;"><b>Discipline</b> </td>
<td width="25%" class="padding_td" style="padding:2px;"><b>Year of start - End</b></td>
<td width="22%" class="padding_td" style="padding:2px;"><b>Name of the institute <br />& university & Location</b></td>
<td width="13%" class="padding_td" style="padding:2px;"><b>Year of Passing</b></td>
<td width="14%" class="padding_td" style="padding:2px;"><b>Percentage</b></td>
<!--
<td width="5%" class="padding_td" style="padding:2px;"><b>Delete</b></td>-->
</tr>

<? 
$i=0;
    //display the details
foreach($total_query as $alleducation){ 
	$i = $i + 1;
if($alleducation->qua_id != '0' && $alleducation->qua_id != '' &&  $alleducation->m_id ==$_SESSION[m_id] )  //if($alleducation->qua_id != '0' && $alleducation->qua_id != '' && $alleducation->branch_name != '0' )
{
	?>
 <tr>
<input type="hidden" name="hdnID<?php echo $i;?>" size="5" value="<?php echo $alleducation->e_id;?>">
	<input type="hidden" name="hdnCustomerID<?php echo $i;?>" size="5" value="<?php echo $alleducation->e_id;?>">
     
 <td class="padding_td" style="padding-left:2px;padding-right:2px;">
<input type="checkbox" name="chkDelete[]" value="<?php echo $alleducation->e_id;?>"></td>
<td class="padding_td" style="padding-left:2px;padding-right:2px;"><?php //echo $alleducation->e_id;?>
<? //print_r ($e_id);?>
<input type="text" name="txtQua<?php echo $i;?>" style="width:65px;"  value="<?=stripslashes($alleducation->qua_id)?>" maxlength="5" disabled /></td> 
<td class="padding_td" style="padding-left:10px;">
<? if($alleducation->qua_id=='Rv-Vlsi') {
	 ?> <select name="selBranch<?php echo $i;?>" id="selBranch<?php echo $i;?>" style="width:100px;" >
					 <option value="0">select</option>
		     <option value="ADAD"<?=$alleducation->branch_name== 'ADAD' ? ' selected="selected"' : '';?> >ADAD</option>
		     <option value="DABD"<?=$alleducation->branch_name== 'DABD' ? ' selected="selected"' : '';?>  >DABD</option>
			 <option value="DAPD"<?=$alleducation->branch_name== 'DAPD' ? ' selected="selected"' : '';?>>DAPD</option>
             <option value="ADEMS"<?=$alleducation->branch_name== 'ADEMS' ? ' selected="selected"' : '';?>>ADEMS</option>
             <option value="ACME"<?=$alleducation->branch_name== 'ACME' ? ' selected="selected"' : '';?>>ACME</option>
             <option value="CME"<?=$alleducation->branch_name== 'CME' ? ' selected="selected"' : '';?>>CME</option>
             <option value="Boot Campus"<?=$alleducation->branch_name== 'Boot Campus' ? ' selected="selected"' : '';?>>Boot Campus</option>
             <option value="Star Case Program"<?=$alleducation->branch_name== 'Star Case Program' ? ' selected="selected"' : '';?>>Star Case Program</option>
             <option value="Mtech Project"<?=$alleducation->branch_name== 'Mtech Project' ? ' selected="selected"' : '';?>>Mtech Project</option>
             <option value="Btech Project"<?=$alleducation->branch_name== 'Btech Project' ? ' selected="selected"' : '';?>>Btech Project</option>
             </option></select>
          
	
             <? }  else  ?>
               <? if($alleducation->qua_id=='Phd') {
	 ?> <select name="selBranch<?php echo $i;?>" id="selBranch<?php echo $i;?>" style="width:100px;">
			<option value="0">select</option>
		     <option value="E&C"<?=$alleducation->branch_name== 'E&C' ? ' selected="selected"' : '';?>  >E& C</option>
		     <option value="E&E"<?=$alleducation->branch_name== 'E&E' ? ' selected="selected"' : '';?> >E&E</option>
			 <option value="CSC"<?=$alleducation->branch_name== 'CSC' ? ' selected="selected"' : '';?>>CSC</option>
             <option value="IT"<?=$alleducation->branch_name== 'IT' ? ' selected="selected"' : '';?>>IT</option>
             <option value="IS"<?=$alleducation->branch_name== 'IS' ? ' selected="selected"' : '';?>>IS</option>
             <option value="Telecomm"<?=$alleducation->branch_name== 'Telecomm' ? ' selected="selected"' : '';?>>Telecomm</option>
                         </option></select>
         
                 <? } else ?>
                  <? if($alleducation->qua_id=='ME/MTech') {
	 ?> <select name="selBranch<?php echo $i;?>" id="selBranch<?php echo $i;?>" style="width:100px;">
			<option value="0">select</option>
		     <option value="VLSI"<?=$alleducation->branch_name== 'VLSI' ? ' selected="selected"' : '';?>  >VLSI</option>
		     <option value="VLSI& Embedded System"<?=$alleducation->branch_name== 'VLSI& Embedded System' ? ' selected="selected"' : '';?> >VLSI& Embedded System</option>
			 <option value="Digital Electronics"<?=$alleducation->branch_name== 'Digital Electronics' ? ' selected="selected"' : '';?> >Digital Electronics</option>
             <option value="Medical Electronics"<?=$alleducation->branch_name== 'Medical Electronics' ? ' selected="selected"' : '';?> >Medical Electronics</option>
             <option value="DSP"<?=$alleducation->branch_name== 'DSP' ? ' selected="selected"' : '';?> >DSP</option>
             <option value="Test& Measurements"<?=$alleducation->branch_name== 'Test& Measurements' ? ' selected="selected"' : '';?> >Test& Measurements</option>
            		
   </option>
  </select>
        
                  <? } else  ?>
             <? if($alleducation->qua_id=='BE/BTech') {
	 ?> <select name="selBranch<?php echo $i;?>" id="selBranch<?php echo $i;?>" style="width:100px;">
			<option value="0">select</option>
		     <option value="E&C"<?=$alleducation->branch_name== 'E&C' ? ' selected="selected"' : '';?> >E& C</option>
		     <option value="E&E"<?=$alleducation->branch_name== 'E&E' ? ' selected="selected"' : '';?>>E&E</option>
			 <option value="CSC"<?=$alleducation->branch_name== 'CSC' ? ' selected="selected"' : '';?>>CSC</option>
             <option value="IT"<?=$alleducation->branch_name== 'IT' ? ' selected="selected"' : '';?>>IT</option>
             <option value="IS"<?=$alleducation->branch_name== 'IS' ? ' selected="selected"' : '';?>>IS</option>
             <option value="Telecomm"<?=$alleducation->branch_name== 'Telecomm' ? ' selected="selected"' : '';?>>Telecomm</option>
                        </select>
        
                    <? } else  ?>
             <? if($alleducation->qua_id=='Msc') {
	 ?> <select name="selBranch<?php echo $i;?>" id="selBranch<?php echo $i;?>" style="width:100px;">
			 <option value="0">select</option>
		     <option value="Electrical Engineer"<?=$alleducation->branch_name== 'Electrical Engineer' ? ' selected="selected"' : '';?> >Electrical Engineer</option>
		     <option value="others"<?=$alleducation->branch_name== 'others' ? ' selected="selected"' : '';?>>Others</option>            		
   </option>
  </select>
          
              <? } else  ?>
             <? if($alleducation->qua_id=='Bsc') {
	 ?> <select name="selBranch<?php echo $i;?>" id="selBranch<?php echo $i;?>" style="width:100px;">
			  <option value="0">select</option>
		     <option value="Bsc Electronics"<?=$alleducation->branch_name== 'Bsc Electronics' ? ' selected="selected"' : '';?>  >Bsc Electronics</option>
		     <option value="others"<?=$alleducation->branch_name== 'others' ? ' selected="selected"' : '';?> >Others</option>            		
   </option>
      </select>
          
                <? } else  ?>
             <? if($alleducation->qua_id=='Diploma') {
	 ?><select name="selBranch<?php echo $i;?>" id="selBranch<?php echo $i;?>" style="width:100px;">
			 <option value="0">select</option>
			 <option value="CSC"<?=$alleducation->branch_name== 'CSC' ? ' selected="selected"' : '';?> >CSC</option>
			 <option value="Others"<?=$alleducation->branch_name== 'Others' ? ' selected="selected"' : '';?> >Others</option>
			
   </option>
  </select>
             <? } ?>

      
		<!--<input type="text" name="selBranch<?php  //  echo $i;?>" style="width:55px;"  value="<? //=stripslashes($alleducation->branch_name)?>" <? //if($alleducation->qua_id == '10th' || $alleducation->qua_id=='12th' ){ echo "disabled"; }?>  />-->
			      	
		</td>

<td class="padding_td" style="padding-left:5px;"><select name="selMonth<?php echo $i;?>" id="selMonth" style="width:80px;">
	<? for($m=0;$m<count($month_array);$m++){?>
	<option value="<?=$m?>" <?=$alleducation->e_start==$m?'selected':''?>><?=$month_array[$m]?></option>
	<? }?>
	
	 </select><select name="selPassedyear<?php echo $i;?>" id="selPassedyear" style="width:77px;">
	   <option value="0">Select</option>
	<? for($y1=date(Y);$y1>1970;$y1--){?>
	 
	<option value="<?=$y1?>" <?=$alleducation->e_end==$y1?'selected':''?>><?=$y1?></option>
	<? }?>
	
	 </select>
	 <select name="selMonth1<?php echo $i;?>" id="selMonth1" style="width:80px;">
	<? for($m=0;$m<count($month_array);$m++){?>
	<option value="<?=$m?>" <?=$alleducation->e_start1==$m?'selected':''?>><?=$month_array[$m]?></option>
	<? }?>
	
	 </select><select name="selPassedyear1<?php echo $i;?>" id="selPassedyear1" style="width:77px;">
	   <option value="0">Select</option>
	<? for($y1=date(Y);$y1>1970;$y1--){?>
	 
	<option value="<?=$y1?>" <?=$alleducation->e_end1==$y1?'selected':''?>><?=$y1?></option>
	<? }?>
	
	 </select></td>

<td class="padding_td" style="padding:3px 3px 3px 3px;">
<input type="text" name="selInst<?php echo $i;?>"  id="selInst[]" value="<?=stripslashes($alleducation->insti_name)?>" 
 maxlength="20" style="width:145px;" />
<input type="text" name="selUniv<?php echo $i;?>" id="selUniv[]"   value="<?=stripslashes($alleducation->e_university)?>" 
 maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity<?php echo $i;?>"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>" 
 maxlength="20" style="width:100px;" />
 </td>
 <td class="padding_td" style="padding:3px 3px 3px 3px;">

 <input   type="text" name="txtPassedyear1<?php echo $i;?>"  id="txtPassedyear1[]" value="<?=stripslashes($alleducation->e_end1)?>" 
 maxlength="20" style="width:50px; text-align:center" disabled/>
 </td>
 
<td class="padding_td" style="padding-left:5px;"><input type="text" name="percentage<?php echo $i;?>" style="width:40px;" id="percentage" value="<?=stripslashes($alleducation->e_percentage)?>" maxlength="5" /></td>

  <!--<td class="padding_td" style="padding-left:5px;"><input type="checkbox" name="chkDel[]" value="<?php //echo $alleducation->e_id;?>"></td>-->
</tr>
<? }?>

<? }?>




</td>
</tr>
<tr>
<td>
  <input type="submit" name="del" value="Delete"></td>
<td>
  <input type="submit" name="Submit" value="Save">
  <input type="hidden" name="hdnLine" value="<?php echo $i;?>"></td>
  <td align="right" colspan="4" ><a href="job_seeker_menu.php?tab=2" ><img src="images/continue.png" border="0" /></a></td>
  <!--
  <td colspan="5" align="left" bgcolor="#FFFFFF"><input name="delete" type="submit" id="delete" value="Delete" Onclick="return onDelete();"></td>-->
</tr>
</table>
</form>

</table>
    </td>
    </tr>
    </table></td>

  </tr>


</table>

		<? }else if($edu_toal_count == '0'  ) { ?>
		
		<table  width="100%" border="1" cellpadding="0" cellspacing="0">
<tr>
<td width="12%" class="padding_td" style="padding:2px;" ><b>Qualification </b></td>
<td width="11%"  class="padding_td" style="padding:2px;"><b>Discipline</b> </td>
<td width="27%" class="padding_td" style="padding:2px;"><b>Year of start - End</b></td>
<td width="18%" class="padding_td" style="padding:2px;"><b>Name of the institute <br />& university & Location</b></td>
<td width="13%" class="padding_td" style="padding:2px;"><b>Percentage</b></td>
</tr>
<tr>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="txtQua[]"  id="txtQua[]"     value ="Rv-Vlsi" style="width:55px;" /></td>
<td class="padding_td" style="padding-left:10px;">
		<select name="selBranch[]" id="selBranch[]" style="width:100px;" >
					 <option value="0">select</option>
		     <option value="ADAD" >ADAD</option>
		     <option value="DABD">DABD</option>
			 <option value="DAPD">DAPD</option>
             <option value="ADEMS">ADEMS</option>
             <option value="ACME">ACME</option>
             <option value="CME">CME</option>
             <option value="Boot Campus">Boot Campus</option>
             <option value="Star Case Program">Star Case Program</option>
             <option value="Mtech Project">Mtech Project</option>
             <option value="Btech Project">Btech Project</option>
             </option></select>
			
   </td>
<td class="padding_td" style="padding-left:10px;"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;" style="padding-left:10px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td" style="padding-left:10px;padding-right:5px;">
 <input type="text" name="selInst[]"  id="selInst[]" value="RV-Vlsi"  maxlength="20" style="width:100px;" /> 
 <input type="text" name="selUniv[]"  id="selUniv[]" value="RV-Vlsi"  maxlength="20" style="width:100px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="Bangalore"  maxlength="20" style="width:100px;" /> </td>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>

<tr>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="txtQua[]"  id="txtQua[]"     value ="Phd" style="width:55px;" /></td>
<td class="padding_td" style="padding-left:10px;">
<select name="selBranch[]" id="selBranch[]" style="width:100px;">
			<option value="0">select</option>
		     <option value="E&C" >E& C</option>
		     <option value="E&E">E&E</option>
			 <option value="CSC">CSC</option>
             <option value="IT">IT</option>
             <option value="IS">IS</option>
             <option value="Telecomm">Telecomm</option>
                         </option></select>
  </td>
<td class="padding_td" style="padding-left:10px;"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;" style="padding-left:10px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td" style="padding:5px 5px 5px 5px;"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /> </td>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="txtQua[]"  id="txtQua[]"     value ="ME/MTech" style="width:75px;" /></td>
<td class="padding_td" style="padding-left:10px;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			<option value="0">select</option>
		     <option value="VLSI" >VLSI</option>
		     <option value="VLSI& Embedded System">VLSI& Embedded System</option>
			 <option value="Digital Electronics">Digital Electronics</option>
             <option value="Medical Electronics">Medical Electronics</option>
             <option value="DSP">DSP</option>
             <option value="Test& Measurements">Test& Measurements</option>
            		
   </option>
  </select></div>
   </td>
<td class="padding_td" style="padding-left:10px;"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;" style="padding-left:10px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td" style="padding:5px 5px 5px 5px;"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td" style="padding-left:10px;">
<input type="text" name="txtQua[]"  id="txtQua[]"     value ="BE/BTech" style="width:75px;" /></td>
<td class="padding_td" style="padding-left:10px;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			<option value="0">select</option>
		     <option value="E&C" >E& C</option>
		     <option value="E&E">E&E</option>
			 <option value="CSC">CSC</option>
             <option value="IT">IT</option>
             <option value="IS">IS</option>
             <option value="Telecomm">Telecomm</option>
                        </select>
  </td>
<td class="padding_td" style="padding-left:10px;"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;" style="padding-left:10px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td" style="padding: 5px 5px 5px 5px;"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="txtQua[]"  id="txtQua[]"     value ="Msc" style="width:75px;" /></td>
<td class="padding_td"  style="padding-left:10px;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			 <option value="0">select</option>
		     <option value="Electrical Engineer" >Electrical Engineer</option>
		     <option value="others">Others</option>            		
   </option>
  </select>
  </td>
<td class="padding_td" style="padding-left:10px;"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;" style="padding-left:10px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td" style="padding:5px 5px  5px 5px;"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="txtQua[]"  id="txtQua[]"     value ="Bsc" style="width:75px;" /></td>
<td class="padding_td" style="padding-left:10px;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			  <option value="0">select</option>
		     <option value="Bsc Electronics" >Bsc Electronics</option>
		     <option value="others">Others</option>            		
   </option>
      </select>
   </td>
<td class="padding_td" style="padding-left:10px;"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;" style="padding-left:10px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td" style="padding:5px 5px 5px 5px;"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="txtQua[]"  id="txtQua[]"     value ="Diploma" style="width:75px;" /></td>
<td class="padding_td" style="padding-left:10px;"><select name="selBranch[]" id="selBranch[]" style="width:100px;">
			 <option value="0">select</option>
			 <option value="CSC">CSC</option>
			 <option value="Others">Others</option>
			
   </option>
  </select>
   </td>
<td class="padding_td" style="padding-left:10px;"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;" style="padding-left:10px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td" style="padding:5px 5px 5px 5px;"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="txtQua[]"  id="txtQua[]"     value ="12th" style="width:75px;" /></td>
<td class="padding_td" style="padding-left:10px;" >
  </td>
<td class="padding_td" style="padding-left:10px;" ><select name="selMonth[]" id="selMonth[]" style="width:80px;" style="padding-left:10px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;" style="padding-left:10px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td" style="padding:5px 5px 5px 5px;"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>
<tr>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="txtQua[]"  id="txtQua[]"     value ="10th" style="width:75px;" /></td>
<td class="padding_td"></td>
<td class="padding_td" style="padding-left:10px;"><select name="selMonth[]" id="selMonth[]" style="width:80px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select> 
    <select name="selPassedyear[]" id="selPassedyear[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select>
	  
	<select name="selMonth1[]" id="selMonth1[]" style="width:80px;" style="padding-left:10px;">
    <? for($m=0;$m<count($month_array);$m++){?>
      <option value="<?=$m?>" > <?=$month_array[$m]?>   </option>
    <? }?>
  </select>  
    <select name="selPassedyear1[]" id="selPassedyear1[]" style="width:77px;">
      <option value="0">Year</option>
      <? for($y=date(Y);$y>1970;$y--){?>
      
      <option value="<?=$y?>" <?=$alleducation->e_year==$y?'selected':''?>><?=$y?></option>
      <? }?>  </select></td>
<td class="padding_td" style="padding:5px 5px 5px 5px;"><input type="text" name="selInst[]"  id="selInst[]"   maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" style="width:145px;" />
 <input type="text" name="txtCity[]"  id="txtCity[]" value="<?=stripslashes($alleducation->e_city)?>"  maxlength="20" style="width:100px;" /></td>
<td class="padding_td" style="padding-left:10px;"><input type="text" name="percentage[]"  id="percentage[]"   style="width:50px;"  maxlength="5"/></td>
</tr>


<tr><td> 
	<input name="insert" type="submit" class="button" value="Send" /></td>
     <td align="right" colspan="4" ><a href="job_seeker_menu.php?tab=2" ><img src="images/continue.png" border="0" /></a></td>
</tr>

  </div>
	</table></table><? }?>
<?=$input->formEnd()?>
</td></tr>

		