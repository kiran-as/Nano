<?php include_once('db/dbconfig.php');
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

	

		
	$resultsss = "SELECT * FROM $projects_table where m_id='".$_SESSION[m_id]."'";
	$resultc = mysql_query($resultsss);
	
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$s]['p_company']	= $row["p_company"];
		  $arraStudent[$s]['p_description']	= $row["p_description"];
		   $arraStudent[$s]['p_id']	= $row["p_id"];
		  $arraStudent[$s]['p_role']	= $row["p_role"];
		   $arraStudent[$s]['p_title']	= $row["p_title"];

		  $s++;  
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

<link href="rv_main.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />

  <link type="text/css" rel="stylesheet" href="calender/dhtmlgoodies_calendar.css" media="screen"/></link>
<script src="calender/dhtmlgoodies_calendar.js" type="text/javascript"></script>

<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
	<script type="text/javascript" src="jquery_tabs/js/jquery-1.5.1.min.js"></script>
<script src="js/ajax.js" type="text/javascript"></script>
	 
	 <script language="javascript" type="text/javascript" src="js/lytebox.js"></script>
	<link rel="stylesheet" href="css/lytebox.css" type="text/css" media="screen" />
	
 <script type="text/javascript">	

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
<?php include "includes/header.php" ?>
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
       
        <a href="1_educations_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Academic Qualification</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
	   
	   <li>
       <div class="nanohdleft"></div>
       <div class="nanohdmid"><img src="images/acdemic_projects.png" width="127" height="32" align="absmiddle" border="0" style=" margin-top:8px;" /></div>
       <div class="nanohdright"></div>
       </li>
	   
       <a href="1_work_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Work Experience</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
	    <a href="1_career_info.php" style="text-decoration:none;"><li>
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
<a href="add_academic_info.php" rel="lyteframe" 
   				rev="width: 850px; height:450px; scrolling:no">Add Project</a>

<table width="100%" border="2" cellspacing="0" cellpadding="0">
<tr>
        <th width="25%">Company/Institute/College</th>
		<th>Title&nbsp;&nbsp;</th>
		<th>Role</th>
		<th>Description</th>
		<th width="10px">Delete</th>
</tr>
<?php
for($s=0;$s<count($arraStudent);$s++){
?>

<tr>
<td align="left"><a href="edit_academic_info.php?idStud=<?php echo $arraStudent[$s]['p_id']?>" rel="lyteframe" 
   				rev="width: 850px; height: 450px; scrolling:no"><?php echo $arraStudent[$s]['p_company'];?></a></td>
<td><?php echo $arraStudent[$s]['p_title']?></td>
<td><?php echo $arraStudent[$s]['p_role']?></td>
<td><?php echo $arraStudent[$s]['p_description']?></td>
<td width="10px"><a href="delete_academic_info.php?p_id=<?php echo $arraStudent[$s]['p_id']?>" style=" text-decoration:none;"><img src="images/Delett_small.png" border="0" alt="Delete"/></a></td>

</tr>
<?php
}
?>
</table>
</div><!--end of main_content-->


<?php include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>