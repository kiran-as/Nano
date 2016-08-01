<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
	    include_once('classes/checkingAuth.php');
   $check=new checkingAuth();
   $check->loginCheck();   

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   

  $acadimic_result=$db->getResults("SELECT * FROM $projects_table where m_id='".$_SESSION[m_id]."'");

 
if(isset($_POST['acadeSubmit']))
 {
 
   // $period = $_REQUEST[selFrom]."-".$_REQUEST[selTo];
 //   $from=$_POST['selFrom'].'-'.$_POST['selFromYear'];
 //  $to=$_POST['selMonth1'].'-'.$_POST['selYear1'];

if($_POST['selVLSIType']=='')
$vlsityp=0;
else
$vlsityp=$_POST['selVLSIType'];

 	$info_query="insert into $projects_table  set p_title = '".$ch->checkFields($_POST['txtTitle'])."',
								                  p_company	='".$ch->checkFields($_POST['txtCompany'])."',
			                                      p_period = '$period',
												  p_role = '".$ch->checkFields($_POST['txtRole'])."',
												  p_teamsize = '".$ch->checkFields($_POST['selSize'])."', 
												  p_duration = '".$ch->checkFields($_POST['txtDuration'])."', 
												  p_other_tech = '".$ch->checkFields($_POST['txtOtherproject'])."',
			                                      p_end ='".$ch->checkFields($_POST['selEnd'])."',
		                                          p_description = '".$ch->checkFields($_POST['areaDescription'])."',
		                                          p_tools = '".$ch->checkFields($_POST['areaTools'])."',
		                                          p_challenges ='".$ch->checkFields($_POST['areaChallenges'])."',
												  p_vlsitype ='".$ch->checkFields($vlsityp)."',
									              m_id='".$_SESSION[m_id]."'";
												  
			
 $result=$db->insertRecord($info_query);
header("Location:academic_info.php?msg=2");					
		}		
		
		
 if(isset($_POST['acadeUpdate']))
 {
 
   // $period = $_REQUEST[selFrom]."-".$_REQUEST[selTo];
    $from=$_POST['selFrom'].'-'.$_POST['selFromYear'];
   $to=$_POST['selMonth1'].'-'.$_POST['selYear1'];

if($_POST['selVLSIType']=='')
$vlsityp=0;
else
$vlsityp=$_POST['selVLSIType'];

 	$info_query="update  $projects_table  set p_title = '".$ch->checkFields($_POST['txtTitle'])."',
								                  p_company	='".$ch->checkFields($_POST['txtCompany'])."',
			                                      p_period = '$period',
												  p_role = '".$ch->checkFields($_POST['txtRole'])."',
												  p_teamsize = '".$ch->checkFields($_POST['selSize'])."', 
												  p_duration = '".$ch->checkFields($_POST['txtDuration'])."', 
												  p_other_tech = '".$ch->checkFields($_POST['txtOtherproject'])."',
			                                      p_end ='".$ch->checkFields($_POST['selEnd'])."',
		                                          p_description = '".$ch->checkFields($_POST['areaDescription'])."',
		                                          p_tools = '".$ch->checkFields($_POST['areaTools'])."',
		                                          p_challenges ='".$ch->checkFields($_POST['areaChallenges'])."',
												  p_vlsitype ='".$ch->checkFields($vlsityp)."' 
									            where p_id ='".$ch->checkFields($_REQUEST['hidAcaID'])."' and  m_id='".$_SESSION[m_id]."'";
												  
			
 $result=$db->insertRecord($info_query);
header("Location:academic_info.php?msg=2");					
		}	
if($_REQUEST[action]=='deleteOne' && is_numeric($_REQUEST[p_id])!=''){

$db->insertRecord("delete from  $projects_table where p_id='".$ch->checkFields($_REQUEST[p_id])."'");
header("Location:academic_info.php?msg=3");	

}
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<meta name="keywords" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<title>ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
 <script type="text/javascript" src="lib/jquery.js"></script>
<script type='text/javascript' src='lib/jquery.autocomplete.js'></script>
<script type='text/javascript' src='lib/localdata.js'></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
--><link href="rv_main.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />

  <link type="text/css" rel="stylesheet" href="calender/dhtmlgoodies_calendar.css" media="screen"/></link>
<script src="calender/dhtmlgoodies_calendar.js" type="text/javascript"></script>

<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
	<script type="text/javascript" src="jquery_tabs/js/jquery-1.5.1.min.js"></script>
<script src="js/ajax.js" type="text/javascript"></script>
	 
 <script type="text/javascript">	
		

function academicinfovalidation()
{
	var frm=document.formAcademic;

	
	if(frm.txtTitle.value==null || frm.txtTitle.value=="")
	{
		alert("Please enter title");
		frm.txtTitle.focus();
		return false;
	}
	 if(frm.txtCompany.value==null || frm.txtCompany.value=="")
	{
		alert("Please enter company");
		frm.txtCompany.focus();
		return false;
	} 
	if(frm.txtDuration.value==null || frm.txtDuration.value=="")
	{
		alert("Please enter duration in months");
		frm.txtDuration.focus();
		return false;
	}
	

		if(frm.txtRole.value==null || frm.txtRole.value=="")
	{
		alert("Please enter role");
		frm.txtRole.focus();
		return false;
	}
	
	/*else if(selFrom=='0')
			{
					alert("Please select month in 'From Date'");
					
					return false;
			}		
			else
			if(selFromYear=='0')
			{
					alert("Please select year in 'From Date'");
					
					return false;	
			}
			
			else
				if(selMonth1=='0')
			{
					alert("Please select month in 'To Date''");
					
					return false;
			}	
			else
			
			if(selYear1=='0')
			{
					alert("Please select year in 'To Date'");
					
					return false;	
			}
			else
		   if(selFromYear!='0' && selYear1!='0')
			{
			
			 if(selFromYear>selYear1){
					alert("From Year should less than To Year");
					
					return false;	
			}     } */
		
}
function general_Validation()
{
	var frm=document.formAcademicedit;

	
	if(frm.txtTitle.value==null || frm.txtTitle.value=="")
	{
		alert("Please enter title");
		frm.txtTitle.focus();
		return false;
	}
	 if(frm.txtCompany.value==null || frm.txtCompany.value=="")
	{
		alert("Please enter company");
		frm.txtCompany.focus();
		return false;
	} 
	if(frm.txtDuration.value==null || frm.txtDuration.value=="")
	{
		alert("Please enter duration in months");
		frm.txtDuration.focus();
		return false;
	}
		if(frm.txtRole.value==null || frm.txtRole.value=="")
	{
		alert("Please enter role");
		frm.txtRole.focus();
		return false;
	}
	
}
function academicinfovalidation_pop()
{
	var frm=document.formAcademic2;

	
	if(frm.txtTitle.value==null || frm.txtTitle.value=="")
	{
		alert("Please enter title");
		frm.txtTitle.focus();
		return false;
	}
	 if(frm.txtCompany.value==null || frm.txtCompany.value=="")
	{
		alert("Please enter company");
		frm.txtCompany.focus();
		return false;
	} 
	if(frm.txtDuration.value==null || frm.txtDuration.value=="")
	{
		alert("Please enter duration in months");
		frm.txtDuration.focus();
		return false;
	}
		if(frm.txtRole.value==null || frm.txtRole.value=="")
	{
		alert("Please enter role");
		frm.txtRole.focus();
		return false;
	}
		if(frm.txtDuration.value!="")
	{
		if(isNaN(frm.txtDuration.value)){
		
		alert("Please enter numerics");
		frm.txtDuration.focus();
		return false;
		}
	}
}
function showCelebType1(typeID,di_id)
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


function showCelebType2(typeID)
{

	if(typeID == -1)
   {
	
	document.getElementById("OtherCelebTypes2").style.display='block';
	document.getElementById("OtherVLSITypes2").style.display='none';	
	}
	 else if(typeID =='VLSI')
	 {
	  
	 document.getElementById("OtherVLSITypes2").style.display='block';
	 document.getElementById("OtherCelebTypes2").style.display='none';
		
	 }
	  else 
	 {
	  document.getElementById("OtherVLSITypes2").style.display='none';
	 document.getElementById("OtherCelebTypes2").style.display='none';
		
	 }
	
	
}


function showCelebType3(typeID)
{

	if(typeID == -1)
   {
	
	document.getElementById("OtherCelebTypes3").style.display='block';
	document.getElementById("OtherVLSITypes3").style.display='none';	
	}
	 else if(typeID =='VLSI')
	 {
	  
	 document.getElementById("OtherVLSITypes3").style.display='block';
	 document.getElementById("OtherCelebTypes3").style.display='none';
		
	 }
	  else 
	 {
	  document.getElementById("OtherVLSITypes3").style.display='none';
	 document.getElementById("OtherCelebTypes3").style.display='none';
		
	 }
	
	
}
</script>
 <style>
.textareaBox{

width:550px;
 height:30px;
 margin:5px;
}


#fade { /*--Transparent background layer--*/
	display: none; /*--hidden by default--*/
	background: #000;
	position: fixed; left: 0; top: 0;
	width: 100%; height: 100%;
	opacity: .80;
	z-index: 9999;
}
.popup_block{
	display: none; /*--hidden by default--*/
	background: #fff;
	padding: 20px;
	border: 20px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	/*--CSS3 Box Shadows--*/
	-webkit-box-shadow: 0px 0px 20px #000;
	-moz-box-shadow: 0px 0px 20px #000;
	box-shadow: 0px 0px 20px #000;
	/*--CSS3 Rounded Corners--*/
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}
img.btn_close {
	float: right;
	margin: -55px -55px 0 0;
}
/*--Making IE6 Understand Fixed Positioning--*/
*html #fade {
	position: absolute;
}
*html .popup_block {
	position: absolute;
}
</style>

</head>

<body>
<div class="main_div">
<? include "includes/header.php" ?>
<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />
</div><!--end of main_banner-->
<div class="main_content">


<div class="stmenuright_maincontent">

<!--<div class="rightimg_top">
<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Resume Builder</h3>
</div>
<div class="rightimg_right">
</div>
</div>--><!--end of rightimg_top-->
 <div class="rightinner_content_inner">
<div class="step-main-Div" >

        <div class="recruit_inner">
       <ul>
       
      <a href="personal_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Personal Information</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
       
        <a href="educations_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Academic Qualification</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
	   
	   <li>
       <div class="nanohdleft"></div>
       <div class="nanohdmid"><img src="images/acdemic_projects.png" width="127" height="32" align="absmiddle" border="0" style=" margin-top:8px;" /></div>
       <div class="nanohdright"></div>
       </li>
	   
       <a href="work_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Work Experience</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
	    <a href="career_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Career Details</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
       </ul>
      
     
       

</div>

<div class="step-inner-Div" >
<br/>
<div class="step-sub-tabs">
<div class="innertab1_mid">Academic Projects </div>
<div class="innertab1_right"></div>
</div>

<div class="step-sub-tabs" style="float:right;">
<div class="innertab1_left"></div>
<div class="innertab1_mid">Resume Builder:Steps - 3/5</div>
</div>
<?php /*?><div style="width:600px; float:left; margin:15px 0px;">
<div class="step-sub-tabs">
<div class="innertab1_mid">Employability Factor :<?=emplFactorEducation($_SESSION[m_id])?> </div>
<div class="innertab1_right"></div>
</div>
</div><?php */?>

<div style="float:left; width:723px; background-image:url(images/innertab_bg.png); background-position:bottom; background-repeat:repeat-x;">
<?   if(count($acadimic_result)!=0){

foreach($acadimic_result as $projects){	?>
<div>
<form name="formAcademic" id="formAcademic<?=$projects->p_id?>"  action="" method="post" onsubmit="return academicinfovalidation();">
<table width="100%" style="float:left;"> 
<tr>
   <td  colspan="4" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" align="right"><a href="academic_info.php?action=deleteOne&p_id=<?=$projects->p_id?>" onclick="return toDelete();" style=" text-decoration:none;"><span style=" color:#FF0000; font-size:14px; font-family:Trebuchet MS;">Remove</span><img src="images/Delett_small.png" border="0" alt="Delete"  /></a></td>
 </tr>
	
    
	<tr>
    
	  <td width="55"  class="text" align="left">&nbsp;</td>
    <td width="302" height="1"  class="text" align="left">Title :<span class="error">&nbsp;*</span></td>
   
	<td colspan="2"><span class="text">College / Institute / Company :<span class="error">&nbsp;*</span></span></td>
</tr> 
 <tr>
   <td>&nbsp;</td>
    
    <td  height=""><input type="text" name="txtTitle" id="txtTitle" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=stripslashes($projects->p_title);?>" /></td>
	
	<td  height="" colspan="2"><input type="text" name="txtCompany" id="txtCompany" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  value="<?=stripslashes($projects->p_company);?>" /></td>
 </tr>
   
		<tr>
		  <td width="55"  class="text" align="left">&nbsp;</td>
    <td width="302" height="1"  class="text" align="left">Duration of Project in Months:<span class="error">&nbsp;*</span></td>
    <td height="15" colspan="2" align="left"  class="text">Worked On :<span class="error">&nbsp;*</span></td>
</tr>  
<tr>
  <td width="55">&nbsp;</td>
    <td  height="" width="302"> <input type="text" name="txtDuration"         id="txtDuration" value="<?=$projects->p_duration?>" maxlength="3"  style="width:35px;" />
<?php /*?>	<? $from=explode('-',$projects->p_from_date);
	?>
	  <select name="selFrom" id="selFrom">
	 
        <? for($d=0;$d<count($month_array);$d++){?>
        <option value="<?=$d?>" <?=$from[0]==$d?'selected':'';?> >
          <?=$month_array[$d]?>
          </option>
        <? }?>
      </select>
      <select name="selFromYear" id="selFromYear">
        <option value="0">Year</option>
        <? for($f=date(Y);$f>=1940;$f--){?>
        <option value="<?=$f?>" <?=$from[1]==$f?'selected':'';?> >
          <?=$f?>
          </option>
        <? }?>
      </select>
&nbsp;to &nbsp;
<? $to=explode('-',$projects->p_to_date); 	
	?>
<select name="selMonth1" id="selMonth1">

  <? for($dt=0;$dt<count($month_array);$dt++){?>
  <option value="<?=$dt?>"  <?=$dt==$to[0]?'selected':''?>>
  <?=$month_array[$dt]?>
  </option>
  <? }?>
</select>
<select name="selYear1" id="selYear1">
  <option value="0">Year</option>
  <? for($t=date(Y);$t>=1940;$t--){?>
  <option value="<?=$t?>" <?=$t==$to[1]?'selected':''?> >
  <?=$t?>
  </option>
  <? }?>
</select><?php */?>  </td>
    <td width="135"><select id="selEnd" name="selEnd" class="textbox" onchange="showCelebType1(this.value,<?=$projects->p_id?>)">
    <!--<option value="0">Select</option>
    -->  <option  value="VLSI" <?=$projects->p_end=='VLSI'?'selected':''?>>VLSI Project</option>
      <option value="EMBEDED" <?=$projects->p_end=='EMBEDED'?'selected':''?>>Embeded Project</option>
      <option value="-1" <?=$projects->p_end=='-1'?'selected':''?>>Other</option>
    </select>      </td>
    <td width="211"><div id="OtherCelebTypes<?=$projects->p_id?>" <? if($projects->p_end=='-1') echo 'style="display:block;"'; else echo 'style="display:none;"'; ?>><input type="text" name="txtOtherproject"         id="txtOtherproject" value="<?=$projects->p_other_tech?>" maxlength="200" /></div> 
	<div id="OtherVLSITypes<?=$projects->p_id?>" <? if($projects->p_end!='VLSI') echo 'style="display:none;"'; else echo 'style="display:block;"'; ?>><select name="selVLSIType" id="selVLSIType" style="width:100px;"><option value="1" <?=$projects->p_vlsitype=='1'?'selected':''?>>Front End</option><option value="2" <?=$projects->p_vlsitype=='2'?'selected':''?>>Back End</option></select></div>	</td>
</tr>	
 
 
 
	<tr>
	  <td width="55"  class="text" align="left">&nbsp;</td>
    <td width="302" height="1"  class="text" align="left">Role :<span class="error">&nbsp;*</span></td>
    <td height="1" colspan="2" align="left"  class="text">Team Size :</td>
</tr> 
    <tr>
      <td width="55">&nbsp;</td>
    <td  height="" width="302"><input type="text" name="txtRole" id="txtRole" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  value="<?=$projects->p_role?>" /></td>
    <td  height="" colspan="2"><select name="selSize" id="selSize">
	<? for($t=1;$t<=10;$t++){?><option value="<?=$t?>"  <?=$projects->p_teamsize==$t?'selected':''?>><?=$t?></option><? }?>
	
	
	<option value="10+"  <?=$projects->p_teamsize=='10+'?'selected':''?>>10+</option></select><span class="error">&nbsp;*</span></td>
</tr>      
 <tr>
   <td width="55"  class="text" align="left" valign="top">&nbsp;</td>
    <td width="302" height="1"  class="text" align="left" valign="top">Project Description :</td>
     <td height="1" colspan="2" align="left" valign="top"  class="text">Tools Used : </td>
</tr>    
 <tr>
   <td >&nbsp;</td>
   <td  height="23" >
<textarea rows="2" style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x; resize:none;" cols="48" name="areaDescription" id="areaDescription"><?=stripslashes($projects->p_description);?></textarea></td>
    <td  height="23" colspan="2" >
<textarea  rows="2" style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x; resize:none;" cols="48" name="areaTools" id="areaTools"><?=stripslashes($projects->p_tools);?></textarea></td> 
</tr>
 <tr>
   <td width="55"  class="text" align="left" valign="top">&nbsp;</td>
    <td width="302" height="1"  class="text" align="left" valign="top">Deliverable/Challenges Faced:</td>
	<td colspan="2">&nbsp;</td>
	</tr>
     <tr>
       <td >&nbsp;</td>
    <td  height="23" ><input type="hidden" name="hidAcaID" value="<?=stripslashes($projects->p_id);?>" />
<textarea name="areaChallenges" rows="2" style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x; resize:none;"  id="areaChallenges"><?=stripslashes($projects->p_challenges);?></textarea> </td> <td colspan="2">&nbsp;</td>
</tr>

<tr>
    
    <td  height="19">&nbsp;</td>
    <td  height="19" colspan="3" valign="middle"><input type="submit" name="acadeUpdate" value="" class="button_new" /><span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;">Save this section before filling up next.</span></td>
    </tr>
</table>
</form>

</div>
<? }}else{?>
<form name="formAcademicedit" id="formAcademic"  action="" method="post" onsubmit="return general_Validation();">
<table width="100%"> 
<tr>
   <td  colspan="4" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px">&nbsp;</td>
 </tr>	
  <tr>
 <td colspan="4" align="right">&nbsp;<span  class="error">&nbsp;* indicates required field</span></td> 
 </tr>   
	<tr>
	  <td width="60"  class="text" align="left">&nbsp;</td>
    <td width="293" height="1"  class="text" align="left">Title :<span class="error">&nbsp;*</span></td>
   
	<td colspan="2"><span class="text">College / Institute / Company :<span class="error">&nbsp;*</span></span></td>
</tr> 
 <tr>
   <td>&nbsp;</td>
    
    <td  height=""><input type="text" name="txtTitle" id="txtTitle" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=stripslashes($projects->p_title);?>" /></td>
	
	<td  height="" colspan="2"><input type="text" name="txtCompany" id="txtCompany" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=stripslashes($projects->p_company);?>" /></td>
 </tr>
   
		<tr>
		  <td width="60"  class="text" align="left">&nbsp;</td>
    <td width="293" height="1"  class="text" align="left">Duration of Project in Months :</td>
    <td height="15" colspan="2" align="left"  class="text">Worked On : <span class="error">&nbsp;*</span></td>
</tr>  
<tr>
  <td width="60">&nbsp;</td>
    <td  height="" width="293"> <input type="text" name="txtDuration"         id="txtDuration" value="<?=$projects->p_duration?>" maxlength="3" style="width:35px;" />
	<?php /*?><? $from=explode('-',$projects->p_from_date);
	?>
	  <select name="selFrom" id="selFrom">
	
        <? for($d=0;$d<count($month_array);$d++){?>
        <option value="<?=$d?>" <?=$from[0]==$d?'selected':'';?> >
          <?=$month_array[$d]?>
          </option>
        <? }?>
      </select>
      <select name="selFromYear" id="selFromYear">
        <option value="0">Year</option>
        <? for($f=date(Y);$f>=1940;$f--){?>
        <option value="<?=$f?>" <?=$from[1]==$f?'selected':'';?> >
          <?=$f?>
          </option>
        <? }?>
      </select>
&nbsp;
<? $to=explode('-',$projects->p_to_date); 	
	?>
<select name="selMonth1" id="selMonth1">

  <? for($dt=0;$dt<count($month_array);$dt++){?>
  <option value="<?=$dt?>"  <?=$d==$to[0]?'selected':''?>>
  <?=$month_array[$dt]?>
  </option>
  <? }?>
</select>
<select name="selYear1" id="selYear1">
  <option value="0">Year</option>
  <? for($t=date(Y);$t>=1940;$t--){?>
  <option value="<?=$t?>" <?=$t==$to[1]?'selected':''?> >
  <?=$t?>
  </option>
  <? }?>
</select><?php */?></td>
    <td width="135"><select id="selEnd" name="selEnd" class="textbox" onchange="showCelebType3(this.value)">
    <!--  <option value="0">---Select--- </option>-->
      <option  value="VLSI" <?=$projects->p_end=='VLSI'?'selected':''?>>VLSI Project</option>
      <option value="EMBEDED" <?=$projects->p_end=='EMBEDED'?'selected':''?>>Embeded Project</option>
      <option value="-1" <?=$editprojects>p_end=='-1'?'selected':''?>>Other</option>
    </select>      </td>
    <td width="215"><div id="OtherCelebTypes3" <? if($projects->p_end=='-1') echo 'style="display:block;"'; else echo 'style="display:none;"'; ?>><input type="text" name="txtOtherproject"         id="txtOtherproject" value="<?=$projects->p_other_tech?>" maxlength="200" /></div> 
	<div id="OtherVLSITypes3" <? if($projects->p_vlsitype=='0') echo 'style="display:none;"'; else echo 'style="display:block;"'; ?>><select name="selVLSIType" id="selVLSIType" style="width:100px;"><option value="1" <?=$projects->p_vlsitype=='1'?'selected':''?>>Front End</option><option value="2" <?=$projects->p_vlsitype=='2'?'selected':''?>>Back End</option></select></div>	</td>
</tr>	
 
 
 
	<tr>
	  <td width="60"  class="text" align="left">&nbsp;</td>
    <td width="293" height="1"  class="text" align="left">Role :<span class="error">&nbsp;*</span></td>
    <td height="1" colspan="2" align="left"  class="text">Team Size :</td>
</tr> 
    <tr>
      <td width="60">&nbsp;</td>
    <td  height="" width="293"><input type="text" name="txtRole" id="txtRole" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=$projects->p_role?>" /></td>
    <td  height="" colspan="2"><select name="selSize" id="selSize"><? for($t=1;$t<=10;$t++){?><option value="<?=$t?>"  <?=$projects->p_teamsize==$t?'selected':''?>><?=$t?></option><? }?>
	<option value="10+"  <?=$projects->p_teamsize=='10+'?'selected':''?>>10+</option></select></td>
</tr>      
 <tr>
   <td width="60"  class="text" align="left" valign="top">&nbsp;</td>
    <td width="293" height="1"  class="text" align="left" valign="top">Project Description :</td>
     <td height="1" colspan="2" align="left" valign="top"  class="text">Tools Used : </td>
</tr>    
 <tr>
   <td >&nbsp;</td>
   <td  height="23" >
<textarea rows="2" style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" cols="48" name="areaDescription" id="areaDescription"><?=stripslashes($projects->p_description);?></textarea></td>
    <td  height="23" colspan="2" >
<textarea  rows="2" style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  cols="48" name="areaTools" id="areaTools"><?=stripslashes($projects->p_tools);?></textarea></td> 
</tr>
 <tr>
   <td width="60"  class="text" align="left" valign="top">&nbsp;</td>
    <td width="293" height="1"  class="text" align="left" valign="top">Deliverable/Challenges Faced:</td>
	<td colspan="2">&nbsp;</td>
	</tr>
     <tr>
       <td >&nbsp;</td>
    <td  height="23" >
<textarea name="areaChallenges" rows="2" style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  id="areaChallenges"><?=stripslashes($projects->p_challenges 	);?></textarea> </td> <td colspan="2">&nbsp;</td>
</tr>

<tr>
    
    <td  height="19">&nbsp;</td>
    <td  height="19" colspan="3"><input type="submit" name="acadeSubmit" value="" class="button_new"/><input type="Reset" name="Reset" value="" class="resetbutton" /><span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;">Save this section before filling up next.</span></td>
    </tr>
</table>
</form>

<? }?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td align="right"  class="addnewbg"><a href="#?w=700" rel="popup_name" class="poplight"><img src="images/addnewbg.png" width="83" height="22" border="0"/></a></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
   <tr> 
 <td>&nbsp;</td>  
    
    
    <td  height="19"> <td align="right"  ><?php /*?><a href="work_info.php" ><img src="images/continue.png" border="0" /></a><?php */?></td> 
     <td>&nbsp;</td> 
   </tr>
   </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        
</table>

		</div>
</div>
</div>
</div>
</div><!--end of right_maincontent-->

<div id="popup_name" class="popup_block">
 <form name="formAcademic2" id="formAcademic2"  action="" method="post" onsubmit="return academicinfovalidation_pop();">
<table width="100%"> 
<tr>
   <td  colspan="2" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px">Academic Projects</td>
   <td  colspan="2" ><div align="right"><span class="error">* Indicates Required field</span></div></td>
  </tr>	   
	<tr>
	  <td width="4"  class="text" align="left">&nbsp;</td>
    <td width="338" height="1"  class="text" align="left">Title :<span class="error">&nbsp;*</span></td>
   
	<td colspan="2"><span class="text">College / Institute / Company :<span class="error">&nbsp;*</span></span></td>
</tr> 
 <tr>
   <td>&nbsp;</td>
    
    <td  height=""><input type="text" name="txtTitle" id="txtTitle" style="width:250px;" /></td>
	
	<td  height="" colspan="2"><input type="text" name="txtCompany" id="txtCompany"style="width:250px;" /></td>
 </tr>
   
		<tr>
		  <td width="4"  class="text" align="left">&nbsp;</td>
    <td width="338" height="1"  class="text" align="left">Duration of Project in Months :<span class="error">&nbsp;*</span></td>
    <td height="15" colspan="2" align="left"  class="text">Worked On : <span class="error">&nbsp;*</span></td>
</tr>  
<tr>
  <td width="4">&nbsp;</td>
    <td  height="" width="338"> <input type="text" name="txtDuration"         id="txtDuration" value="" maxlength="3" style="width:35px;" />
	<?php /*?>  <select name="selFrom" id="selFrom">
	 
        <? for($d=1;$d<count($month_array);$d++){?>
        <option value="<?=$d?>"  >
          <?=$month_array[$d]?>
        </option>
        <? }?>
      </select>
      <select name="selFromYear" id="selFromYear">
        <option value="0">Year</option>
        <? for($f=date(Y);$f>=1940;$f--){?>
        <option value="<?=$f?>"  >
          <?=$f?>
        </option>
        <? }?>
      </select>
&nbsp;
<select name="selMonth1" id="selMonth1">

  <? for($dt=1;$dt<count($month_array);$dt++){?>
  <option value="<?=$dt?>" >
  <?=$month_array[$dt]?>
  </option>
  <? }?>
</select>
<select name="selYear1" id="selYear1">
  <option value="0">Year</option>
  <? for($t=date(Y);$t>=1940;$t--){?>
  <option value="<?=$t?>"  >
  <?=$t?>
  </option>
  <? }?>
</select><?php */?></td>
    <td width="135"><select id="selEnd" name="selEnd" class="textbox" onChange="showCelebType2(this.value)">
    <!--  <option value="0">---Select--- </option>-->
      <option  value="VLSI" >VLSI Project</option>
      <option value="EMBEDED" >Embeded Project</option>
      <option value="-1" >Other</option>
    </select>      </td>
    <td width="100"><div id="OtherCelebTypes2" style="display:none;" ><input type="text" name="txtOtherproject"         id="txtOtherproject" value="" maxlength="200" /></div> 
	<div id="OtherVLSITypes2"><select name="selVLSIType" id="selVLSIType" style="width:100px;"><option value="1" <?=$projects->p_vlsitype=='1'?'selected':''?>>Front End</option><option value="2" >Back End</option></select></div>	</td>
</tr>	
 
 
 
	<tr>
	  <td width="4"  class="text" align="left">&nbsp;</td>
    <td width="338" height="1"  class="text" align="left">Role :<span class="error">&nbsp;*</span></td>
    <td height="1" colspan="2" align="left"  class="text">Team Size :<span class="error">&nbsp;*</span></td>
</tr> 
    <tr>
      <td width="4">&nbsp;</td>
    <td  height="" width="338"><input type="text" name="txtRole" id="txtRole" style="width:250px;"  /></td>
    <td  height="" colspan="2"><select name="selSize" id="selSize"><? for($t=1;$t<=10;$t++){?><option value="<?=$t?>"  <?=$projects->p_teamsize==$t?'selected':''?>><?=$t?></option><? }?>
	<option value="10+" >10+</option></select></td>
</tr>      
 <tr>
   <td width="4"  class="text" align="left" valign="top">&nbsp;</td>
    <td width="338" height="1"  class="text" align="left" valign="top">Project Description :</td>
     <td height="1" colspan="2" align="left" valign="top"  class="text">Tools Used : </td>
</tr>    
 <tr>
   <td >&nbsp;</td>
   <td  height="23" >
<textarea rows="2" style="width:250px;" cols="48" name="areaDescription" id="areaDescription"></textarea></td>
    <td  height="23" colspan="2" >
<textarea  rows="2" style="width:250px;"  cols="48" name="areaTools" id="areaTools"></textarea></td> 
</tr>
 <tr>
   <td width="4"  class="text" align="left" valign="top">&nbsp;</td>
    <td width="338" height="1"  class="text" align="left" valign="top">Deliverable/Challenges Faced:</td>
	<td colspan="2">&nbsp;</td>
  </tr>
     <tr>
       <td >&nbsp;</td>
    <td  height="23" >
<textarea name="areaChallenges" rows="2"   style="width:250px;"  id="areaChallenges"></textarea> </td> <td colspan="2">&nbsp;</td>
</tr>

<tr>
    
    <td  height="19">&nbsp;</td>
    <td  height="19"><input type="submit" name="acadeSubmit" value="" class="button_new" /><input type="Reset" name="Reset" value="" class="resetbutton"  /></td>
    <td  height="19">&nbsp;</td>
    <td  height="19">&nbsp;</td>
    <td width="613"  height="19">&nbsp;</td>
</tr>
</table>


</form>
</div><script>
$('a.poplight[href^=#]').click(function() {
    var popID = $(this).attr('rel'); //Get Popup Name
    var popURL = $(this).attr('href'); //Get Popup href to define size

    //Pull Query & Variables from href URL
    var query= popURL.split('?');
    var dim= query[1].split('&');
    var popWidth = dim[0].split('=')[1]; //Gets the first query string value

    //Fade in the Popup and add close button
    $('#' + popID).fadeIn().css({ 'width': Number( popWidth ) }).prepend('<a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>');

    //Define margin for center alignment (vertical   horizontal) - we add 80px to the height/width to accomodate for the padding  and border width defined in the css
    var popMargTop = ($('#' + popID).height() + 80) / 2;
    var popMargLeft = ($('#' + popID).width() + 80) / 2;

    //Apply Margin to Popup
    $('#' + popID).css({
        'margin-top' : -popMargTop,
        'margin-left' : -popMargLeft
    });

    //Fade in Background
    $('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
    $('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) is used to fix the IE Bug on fading transparencies 

    return false;
});

//Close Popups and Fade Layer
$('a.close, #fade').live('click', function() { //When clicking on the close or fade layer...
    $('#fade , .popup_block').fadeOut(function() {
        $('#fade, a.close').remove();  //fade them both out
    });
    return false;
});</script>
<?php include "stmenuleft_content.php"; ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>