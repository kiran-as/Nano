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
   
 $query = "SELECT * FROM $members_table where m_id='".$_SESSION[m_id]."'"; 
  $edu_toal_count=count($query);
 
  $members_result=$db->getResults($query);
  foreach($members_result as $members){}	
  

  
  if(isset($_POST[submit10])){
	  $db->insertRecord("insert into  $education_table  set m_id			='".$ch->checkFields($_SESSION[m_id]) ."',
															qua_id			='".$ch->checkFields(5) ."',
															e_institute		='".$ch->checkFields($_POST[txtSchool10]) ."',
															e_university	='".$ch->checkFields($_POST[txtBoard10]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYear10]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonth10]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPer10]) ."',
															e_address		='".$ch->checkFields($_POST[areaAddress]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPer10]) ."'");
	    header("Location:educations_info.php?msg=2&tb=1#tabs-1");
	  }
	  
	    if(isset($_POST[update10])){
	  $db->insertRecord("update  $education_table  set 
															qua_id			='".$ch->checkFields(5) ."',
															e_institute		='".$ch->checkFields($_POST[txtSchool10]) ."',
															e_university	='".$ch->checkFields($_POST[txtBoard10]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYear10]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonth10]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPer10]) ."',
															e_address		='".$ch->checkFields($_POST[areaAddress]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPer10]) ."' where m_id='".$ch->checkFields($_SESSION[m_id]) ."' and e_id='".$ch->checkFields($_REQUEST[hidId10]) ."'");
	  
	     header("Location:educations_info.php?msg=2&tb=1#tabs-1");
	  }
	  
// for 12th class

if(isset($_POST[submit12])){
	  $db->insertRecord("insert into  $education_table  set m_id			='".$ch->checkFields($_SESSION[m_id]) ."',
															qua_id			='".$ch->checkFields(4) ."',
															e_institute		='".$ch->checkFields($_POST[txtSchool12]) ."',
															e_university	='".$ch->checkFields($_POST[txtBoard12]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYear12]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonth12]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPer12]) ."',
															e_address		='".$ch->checkFields($_POST[areaAddress]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPer12]) ."'");
	    header("Location:educations_info.php?msg=2&tb=2#tabs-2");
	  }
	  
	    if(isset($_POST[update12])){
	  $db->insertRecord("update  $education_table  set 
															qua_id			='".$ch->checkFields(4) ."',
															e_institute		='".$ch->checkFields($_POST[txtSchool12]) ."',
															e_university	='".$ch->checkFields($_POST[txtBoard12]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYear12]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonth12]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPer12]) ."',
															e_address		='".$ch->checkFields($_POST[areaAddress12]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPer12]) ."' where m_id='".$ch->checkFields($_SESSION[m_id]) ."' and e_id='".$ch->checkFields($_REQUEST[hidId12]) ."'");
	  
	     header("Location:educations_info.php?msg=2&tb=2#tabs-2");
	  }
	  
	  
if(isset($_POST[GradSubmit])){
	
	if($ch->checkFields($_POST[selCountryGrad])=='-1')
	{
		 $grad=$ch->checkFields($_POST[sel_CountryGrad]);
	} 
	else
	{
		$grad=$ch->checkFields($_POST[selCountryGrad]);
	}

	 $db->insertRecord("insert into  $education_table  set m_id			='".$ch->checkFields($_SESSION[m_id]) ."',
															qua_id			='".$ch->checkFields(2) ."',
															e_course		='".$ch->checkFields($_POST[selCourseGrad]) ."',
															e_branch		='".$ch->checkFields($_POST[selBranchGrad]) ."',
															e_country		='".$grad."',
															e_state			='".$ch->checkFields($_POST[selStateGrad]) ."',
															e_institute		='".$ch->checkFields($_POST[selInstGrad]) ."',
															e_other_institute 	='".$ch->checkFields($_POST[txtotherGradInst]) ."',
															e_other_university	='".$ch->checkFields($_POST[txtotherGradUniv]) ."',
															e_university	='".$ch->checkFields($_POST[selUniversityGrad]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYearGrad]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonthGrad]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPerGrad]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPerGrad]) ."'");
	   header("Location:educations_info.php?msg=2&tb=3#tabs-3");
	  }
	  
if(isset($_POST[updateGrad])){
	
		if($ch->checkFields($_POST[selCountryGrad])=='-1')
	{
		 $grad=$ch->checkFields($_POST[sel_CountryGrad]);
	} 
	else
	{
		$grad=$ch->checkFields($_POST[selCountryGrad]);
	}


	 $db->insertRecord("update  $education_table  set 
															qua_id			='".$ch->checkFields(2) ."',
															e_course		='".$ch->checkFields($_POST[selCourseGrad]) ."',
															e_branch		='".$ch->checkFields($_POST[selBranchGrad]) ."',
															e_country		='".$grad."',
															e_state			='".$ch->checkFields($_POST[selStateGrad]) ."',
															e_institute		='".$ch->checkFields($_POST[selInstGrad]) ."',
															e_university	='".$ch->checkFields($_POST[selUniversityGrad]) ."',
															e_other_university	='".$ch->checkFields($_POST[txtotherGradUniv]) ."',
															e_other_institute 	='".$ch->checkFields($_POST[txtotherGradInst]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYearGrad]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonthGrad]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPerGrad]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPerGrad]) ."' where m_id='".$ch->checkFields($_SESSION[m_id]) ."' and e_id='".$ch->checkFields($_REQUEST[hidIdGrad]) ."'");
	  
	     header("Location:educations_info.php?msg=2&tb=3#tabs-3");
	  }
	  
	  
	  
if(isset($_POST[PGSubmit])){
	
		if($ch->checkFields($_POST[selCountryPG])=='-1')
	{
		 $grad=$ch->checkFields($_POST[sel_CountryPG]);
	} 
	else
	{
		$grad=$ch->checkFields($_POST[selCountryPG]);
	}

	

	  $db->insertRecord("insert into  $education_table  set m_id			='".$ch->checkFields($_SESSION[m_id]) ."',
															qua_id			='".$ch->checkFields(1) ."',
															e_course		='".$ch->checkFields($_POST[selCoursePG]) ."',
															e_branch		='".$ch->checkFields($_POST[selBranchPG]) ."',
															e_country		='".$grad."',
															e_state			='".$ch->checkFields($_POST[selStatePG]) ."',
															e_institute		='".$ch->checkFields($_POST[selInstPG]) ."',
															e_other_institute ='".$ch->checkFields($_POST[txtotherPGInst]) ."',
															e_university	='".$ch->checkFields($_POST[selUniversityPG]) ."',
															e_other_university	='".$ch->checkFields($_POST[txtotherPGUniv]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYearPG]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonthPG]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPerPG]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPerPG]) ."'");
	    header("Location:educations_info.php?msg=2&tb=4#tabs-4");
	  }
	  
if(isset($_POST[updatePG])){
	
		
		if($ch->checkFields($_POST[selCountryPG])=='-1')
	{
		 $grad=$ch->checkFields($_POST[sel_CountryPG]);
	} 
	else
	{
		$grad=$ch->checkFields($_POST[selCountryPG]);
	}
	  $db->insertRecord("update  $education_table  set 
															qua_id			='".$ch->checkFields(1) ."',
															e_course		='".$ch->checkFields($_POST[selCoursePG]) ."',
															e_branch		='".$ch->checkFields($_POST[selBranchPG]) ."',
															e_country		='".$grad."',
															e_state			='".$ch->checkFields($_POST[selStatePG]) ."',
															e_institute		='".$ch->checkFields($_POST[selInstPG]) ."',
															e_other_institute 	='".$ch->checkFields($_POST[txtotherPGInst]) ."',
															e_university	='".$ch->checkFields($_POST[selUniversityPG]) ."',
															e_other_university	='".$ch->checkFields($_POST[txtotherPGUniv]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYearPG]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonthPG]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPerPG]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPerPG]) ."' where m_id='".$ch->checkFields($_SESSION[m_id]) ."' and e_id='".$ch->checkFields($_REQUEST[hidIdPG]) ."'");
	  
	     header("Location:educations_info.php?msg=2&tb=4#tabs-4");
	  }	  
if(isset($_POST[PGDipSubmit])){
	
		
		if($ch->checkFields($_POST[selCountryPGDip])=='-1')
	{
		 $grad=$ch->checkFields($_POST[sel_CountryPGDip]);
	} 
	else
	{
		$grad=$ch->checkFields($_POST[selCountryPGDip]);
	}
		
		if($ch->checkFields($_POST[selInstPGDip])=='-1')
	{
		 $PGDipOth=$ch->checkFields($_POST[txtotherPGDipInst]);
	} 
	else
	{
		$PGDipOth=$ch->checkFields($_POST[selInstPGDip]);
	}
	

	  $db->insertRecord("insert into  $education_table  set m_id			='".$ch->checkFields($_SESSION[m_id]) ."',
															qua_id			='".$ch->checkFields(21) ."',
															e_course		='".$ch->checkFields($_POST[selCoursePGDip]) ."',
															e_branch		='".$ch->checkFields($_POST[selBranchPGDip]) ."',
															e_country		='".$grad."',
															e_state			='".$ch->checkFields($_POST[selStatePGDip]) ."',
															e_institute		='".$PGDipOth ."',
															e_other_institute 	='".$ch->checkFields($_POST[txtotherPGDipInst]) ."',
															e_university	='".$ch->checkFields($_POST[selUniversityPGDip]) ."',
															e_other_university	='".$ch->checkFields($_POST[txtotherPGDipUniv]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYearPGDip]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonthPGDip]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPerPGDip]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPerPGDip]) ."'");
	    header("Location:educations_info.php?msg=2&tb=5#tabs-5");
	  }
	  
if(isset($_POST[updatePGDip])){
	
		
		if($ch->checkFields($_POST[selCountryPGDip])=='-1')
	{
		 $grad=$ch->checkFields($_POST[sel_CountryPGDip]);
	} 
	else
	{
		$grad=$ch->checkFields($_POST[selCountryPGDip]);
	}
	
		if($ch->checkFields($_POST[selInstPGDip])=='-1')
	{
		 $PGDipOth=$ch->checkFields($_POST[txtotherPGDipInst]);
	} 
	else
	{
		$PGDipOth=$ch->checkFields($_POST[selInstPGDip]);
	}
	  $db->insertRecord("update  $education_table  set 
															qua_id			='".$ch->checkFields(21) ."',
															e_course		='".$ch->checkFields($_POST[selCoursePGDip]) ."',
															e_branch		='".$ch->checkFields($_POST[selBranchPGDip]) ."',
															e_country		='".$grad."',
															e_state			='".$ch->checkFields($_POST[selStatePGDip]) ."',
																e_institute		='".$PGDipOth ."',
									        				e_other_institute 	='".$ch->checkFields($_POST[txtotherPGDipInst]) ."',
															e_university	='".$ch->checkFields($_POST[selUniversityPGDip]) ."',
															e_other_university	='".$ch->checkFields($_POST[txtotherPGDipUniv]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYearPGDip]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonthPGDip]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPerPGDip]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPerPGDip]) ."' where m_id='".$ch->checkFields($_SESSION[m_id]) ."' and e_id='".$ch->checkFields($_REQUEST[hidIdPGDip]) ."'");
	  
	     header("Location:educations_info.php?msg=2&tb=5#tabs-5");
	  }	  

	  
if(isset($_POST[OtherSubmit])){
	

	  $db->insertRecord("insert into  $education_table  set m_id			='".$ch->checkFields($_SESSION[m_id]) ."',
															qua_id			='".$ch->checkFields(6) ."',
															e_course		='".$ch->checkFields($_POST[selCourseOther]) ."',
															e_branch		='".$ch->checkFields($_POST[selBranchOther]) ."',
															e_country		='".$ch->checkFields($_POST[selCountryOther]) ."',
															e_state			='".$ch->checkFields($_POST[selStateOther]) ."',
															e_institute		='".$ch->checkFields($_POST[selInstOther]) ."',
																e_other_institute 	='".$ch->checkFields($_POST[txtotherInst]) ."',
															e_university	='".$ch->checkFields($_POST[selUniversityOther]) ."',
															e_other_university	='".$ch->checkFields($_POST[txtotherUniv]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYearOther]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonthOther]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPerOther]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPerOther]) ."'");
	    header("Location:educations_info.php?msg=2&tb=6#tabs-6");
	  }
	  
if(isset($_POST[updateOther])){
	  $db->insertRecord("update  $education_table  set 
															qua_id			='".$ch->checkFields(6) ."',
															e_course		='".$ch->checkFields($_POST[selCourseOther]) ."',
															e_branch		='".$ch->checkFields($_POST[selBranchOther]) ."',
															e_country		='".$ch->checkFields($_POST[selCountryOther]) ."',
															e_state			='".$ch->checkFields($_POST[selStateOther]) ."',
															e_institute		='".$ch->checkFields($_POST[selInstOther]) ."',
																e_other_institute 	='".$ch->checkFields($_POST[txtotherInst]) ."',
															e_university	='".$ch->checkFields($_POST[selUniversityOther]) ."',
															e_other_university	='".$ch->checkFields($_POST[txtotherUniv]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYearOther]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonthOther]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPerOther]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPerOther]) ."' where m_id='".$ch->checkFields($_SESSION[m_id]) ."' and e_id='".$ch->checkFields($_REQUEST[hidIdOther]) ."'");
	  
	     header("Location:educations_info.php?msg=2&tb=6#tabs-6");
	  }	
if(isset($_POST[OthermoreSubmit])){
	

	  $db->insertRecord("insert into  $education_table  set m_id			='".$ch->checkFields($_SESSION[m_id]) ."',
															qua_id			='".$ch->checkFields(6) ."',
															e_course		='".$ch->checkFields($_POST[selCourseOthermore]) ."',
															e_branch		='".$ch->checkFields($_POST[selBranchOthermore]) ."',
															e_country		='".$ch->checkFields($_POST[selCountryOthermore]) ."',
															e_state			='".$ch->checkFields($_POST[selStateOthermore]) ."',
															e_institute		='".$ch->checkFields($_POST[selInstOthermore]) ."',
															e_university	='".$ch->checkFields($_POST[selUniversityOthermore]) ."',
															e_other_institute 	='".$ch->checkFields($_POST[txtothermoreInst]) ."',
															e_passout_year	='".$ch->checkFields($_POST[selYearOthermore]) ."',
														
															e_other_university	='".$ch->checkFields($_POST[txtothermoreUniv]) ."',
															e_passout_month	='".$ch->checkFields($_POST[selMonthOthermore]) ."',
															e_percentage_type='".$ch->checkFields($_POST[radPerOthermore]) ."',
															e_percentage	='".$ch->checkFields($_POST[txtPerOthermore]) ."'");
	    header("Location:educations_info.php?msg=2#tabs-6");
	  }
	


if($_REQUEST[action]=='deleteOne' && is_numeric($_REQUEST[e_id])!=''){
 $db->insertRecord("delete from $education_table where e_id='".$ch->checkFields($_REQUEST[e_id]) ."'");
 header("Location:educations_info.php?msg=3&tb=6#tabs-6");
}

$states_query=$db->getResults("select * FROM $states where country_id ='99'");
$inst_query=$db->getResults("select * FROM $institutes order by insti_name asc");
$uni_query=$db->getResults("select * FROM $universities_table order by uni_name asc"); 



 
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
<!--<script src="js/ajax.js" type="text/javascript"></script>-->
	 
	<link type="text/css" href="jquery_tabs/css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" />	
			<script type="text/javascript" src="jquery_tabs/js/jquery-1.5.1.min.js"></script>
	<script type="text/javascript" src="jquery_tabs/js/jquery-ui-1.8.11.custom.min.js"></script>
   
<style>
.textareaBox{

width:550px;
 height:20px;
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
.notice{
color:#1C94C4;
font-weight:bold;
font-size:13px;
}
</style>
  
<?php /*?><script type="text/javascript">
	
function class10thvalidation()
{
		var selYear10=document.forms['form10']['selYear10'].value;
		if(selYear10=='0')
			{
					alert("Please select year ");
					
					return false;	
			}
	}
	</script><?php */?>
</head>

<body>
<div class="main_div">
<? include("includes/header.php"); ?>
<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0"/>
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

 <div class="rightinner_content_inner" >
<div class="step-main-Div">
<div class="recruit_inner">
       <ul>
       
      <a href="personal_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Personal Information</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
       <li>
       <div class="nanohdleft"></div>
       <div class="nanohdmid"><img src="images/academic_qalification.png" width="127" height="32" align="absmiddle" border="0" style=" margin-top:8px;" /></div>
       <div class="nanohdright"></div>
       </li>
       <a href="academic_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Academic Projects </div>
       <div class="nanohdrightdefault"></div>
       </li></a>
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
<div style="float:left; ">
<div class="step-inner-Div" style="float:left; height:700px; width:723px; background-image:url(images/innertab_bg.png); background-position:bottom; background-repeat:repeat-x;" >

<div class="step-sub-tabs" style="margin-top:30px;" >
<div class="innertab1_mid">Educational Profile</div>
<div class="innertab1_right"></div>
</div>

<div class="step-sub-tabs" style="float:right;margin-top:30px;">
<div class="innertab1_left"></div>
<div class="innertab1_mid">Resume Builder:Steps -2/5</div>
</div>

<!--<div style="width:600px; float:left; margin:15px 0px;">
<div class="step-sub-tabs">
<div class="innertab1_mid">Employability Factor :<?=emplFactorEducation($_SESSION[m_id])?> </div>
<div class="innertab1_right"></div>
</div>
</div>-->








<div style="float:left; width:690px;">
<div class="step-sub-tabs" style="margin-top:20px;margin-bottom:5px;">

</div>
</div>


  <div class="demo" style="float:left; top:20px; height:500px;">
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1">10th</a></li>
        <li><a href="#tabs-2">10+2</a></li>
        <li><a href="#tabs-3">Graduation</a></li>
        <li><a href="#tabs-4">Post Graduation</a></li>
        <li><a href="#tabs-5">PG Diploma &amp; Certificate courses</a></li>
        <!-- <li><a href="#tabs-6">Others</a></li>-->
      </ul>
      <div id="tabs-1">
        <?  $results10=$db->getResults("select * FROM $education_table where m_id='".$_SESSION[m_id]."' and qua_id='5' limit 1"); ?>
        <p><strong>Class 10th Details</strong> </p>
        <form name="form10" id="form10" method="post" action="" onsubmit="return class10thvalidation();">
          <table width="100%" cellpadding="3" cellspacing="0" border="0">
            <tr>
              <td>&nbsp;</td>
              <td class="notice"><? if($_REQUEST[tb]==1) echo messaging($_REQUEST[msg]);?></td>
            </tr>
            <tr>
              <td width="21%">Passed Out </td>
              <td width="79%"><?php /*?><select name="selMonth10" id="selMonth10" style="width:80px;">
                  <? for($m=0;$m<count($month_array);$m++){?>
                  <option value="<?=$m?>"  <?=$results10[0]->e_passout_month==$m?'selected':''?>>
                    <?=$month_array[$m]?>
                    </option>
                  <? }?>
              </select>
                &nbsp;&nbsp;&nbsp;&nbsp;<?php */?>
                <select name="selYear10" id="selYear10" style="width:80px;">
                  <option value="0">Year</option>
                  <? for($y=1975;$y<=date(Y);$y++){?>
                  <option value="<?=$y?>"  <?=$results10[0]->e_passout_year==$y?'selected':''?>>
                    <?=$y?>
                    </option>
                  <? }?>
                </select>
                <span><font color="#FF0000" style="margin:125px;">*</font></span></td>
            </tr>
            <input type="hidden" name="hidId10" value="<?=$results10[0]->e_id?>" />
            <tr>
              <td>Aggregate  Marks </td>
              <td><input type="radio" name="radPer10" id="radPer10" value="1"  <?=$results10[0]->e_percentage_type==1?'checked':''?>/>
                Percentage&nbsp;&nbsp;
                <input type="radio" name="radPer10" id="radPer102" value="2" <?=$results10[0]->e_percentage_type==2?'checked':''?>/>
                CGPA(out of 10 points) <span><font color="#FF0000" style="margin:26px;">*</font></span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="text" name="txtPer10" maxlength="5" style="height:15px; width:100px;" value="<?=stripslashes($results10[0]->e_percentage)?>" />
                  <span><font color="#FF0000" style=" margin-left:199px;">*</font></span></td>
            </tr>
            <tr>
              <td>School/College </td>
              <td><input type="text" name="txtSchool10" id="txtSchool10"   style="width:300px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=stripslashes($results10[0]->e_institute)?>"/>
                  <span><font color="#FF0000">*</font></span></td>
            </tr>
            <tr>
              <td>Board </td>
              <td><input type="text" name="txtBoard10" id="txtBoard10"  style="width:300px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=stripslashes($results10[0]->e_university)?>"/>
                  <span><font color="#FF0000">*</font></span></td>
            </tr>
            <!--<tr>
		    <td valign="top">Address </td>
		    <td><textarea  name="areaAddress"   style="width:300px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;resize:none;"><?=stripslashes($results10[0]->
            e_address);?>
            -->
                      <tr>
                        <td>&nbsp;</td>
                        <td><? if(count($results10)==0){?>
                            <input type="submit" name="submit10" value="" class="button_new" />
                          &nbsp;&nbsp;&nbsp;
                          <input type="reset" name="reset2" value=""  class="resetbutton" />
                          <? }else{?>
                          <input type="submit" name="update10" value=""  class="button_new" />
                          <? }?>
                          <span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;">Save this section before filling up next.</span></td>
                      </tr>
          </table>
        </form>
        <p></p>
      </div>
      <div id="tabs-2">
        <?  $results12=$db->getResults("select * FROM $education_table where m_id='".$_SESSION[m_id]."' and qua_id='4' limit 1"); ?>
        <p><strong>10+2 Details</strong> </p>
        <form name="form12" id="form12" method="post" action="" onsubmit="return class12thvalidation();">
          <table width="100%" cellpadding="3" cellspacing="0" border="0">
            <tr>
              <td>&nbsp;</td>
              <td class="notice"<? if($_REQUEST[tb]==2) echo messaging($_REQUEST[msg]);?>></td>
            </tr>
            <tr>
              <td width="21%">Passed Out </td>
              <td width="79%"><?php /*?><select name="selMonth12" id="selMonth12" style="width:80px;">
                  <? for($m=0;$m<count($month_array);$m++){?>
                  <option value="<?=$m?>"  <?=$results12[0]->e_passout_month==$m?'selected':''?>>
                    <?=$month_array[$m]?>
                    </option>
                  <? }?>
              </select>
                &nbsp;&nbsp;&nbsp;&nbsp;<?php */?>
                <select name="selYear12" id="selYear12" style="width:80px;">
                  <option value="0">Year</option>
                  <? for($y=1990;$y<=date(Y);$y++){?>
                  <option value="<?=$y?>"  <?=$results12[0]->e_passout_year==$y?'selected':''?>>
                    <?=$y?>
                    </option>
                  <? }?>
                </select>
                <span><font color="#FF0000" style="margin:125px;">*</font></span></td>
            </tr>
            <input type="hidden" name="hidId12" value="<?=$results12[0]->e_id?>" />
            <tr>
              <td>Aggregate  Marks </td>
              <td><input type="radio" name="radPer12" id="radPer12" value="1"  <?=$results12[0]->e_percentage_type==1?'checked':''?>/>
                Percentage&nbsp;&nbsp;
                <input type="radio" name="radPer12" id="radPer122" value="2" <?=$results12[0]->e_percentage_type==2?'checked':''?>/>
                CGPA(out of 10)<span><font color="#FF0000" style="margin:76px;">*</font></span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="text" name="txtPer12" maxlength="5" style="height:15px; width:100px;" value="<?=stripslashes($results12[0]->e_percentage)?>" />
                  <span><font color="#FF0000" style=" margin-left:201px;">*</font></span></td>
            </tr>
            <tr>
              <td>School/College </td>
              <td><input type="text" name="txtSchool12" id="txtSchool12"  style="width:300px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=stripslashes($results12[0]->e_institute)?>"/>
                  <span><font color="#FF0000">&nbsp;*</font></span></td>
            </tr>
            <tr>
              <td>Board </td>
              <td><input type="text" name="txtBoard12" id="txtBoard12" style="width:300px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=stripslashes($results12[0]->e_university)?>"/>
                  <span><font color="#FF0000">&nbsp;*</font></span></td>
            </tr>
            <!--<tr>
		    <td valign="top">Address </td>
		    <td><textarea name="areaAddress12"  style="width:300px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;resize:none;"><?=stripslashes($results12[0]->
            e_address);?>
            -->
                      <tr>
                        <td>&nbsp;</td>
                        <td><? if(count($results12)==0){?>
                            <input type="submit" name="submit12" value=""  class="button_new" />
                          &nbsp;&nbsp;&nbsp;
                          <input type="reset" name="reset2" value=""  class="resetbutton" />
                          <? }else{?>
                          <input type="submit" name="update12" value=""  class="button_new" />
                          <? }?>
                          <span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;">Save this section before filling up next.</span></td>
                      </tr>
          </table>
        </form>
        <p></p>
      </div>
      <div id="tabs-3">
        <p><strong>Graduation / Diploma Certificate Course Details</strong> </p>
        <form name="formGrad" id="formGrad" method="post" action="" onsubmit="return Graduationvalidation();">
          <?  $resultsGrad=$db->getResults("select * FROM $education_table where m_id='".$_SESSION[m_id]."' and qua_id='2' limit 1"); ?>
          <table width="100%" cellpadding="3" cellspacing="0" border="0">
            <tr>
              <td valign="top">&nbsp;</td>
              <td class="notice"><? if($_REQUEST[tb]==3) echo messaging($_REQUEST[msg]);?></td>
              <td class="error">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top">Select Your Degree </td>
              <td valign="top"><select name="selCourseGrad" id="selCourseGrad"  style="width:150px;" onchange="loadGradBranch(this.value);return false;">
                  <option value="0">Select Course</option>
                  <? $course_query=$db->getResults("select * FROM $course_table where qua_id=2 and cor_status!=0  order by cor_name asc");
			   foreach($course_query as $courseGrad){
			   ?>
                  <option value="<?=$courseGrad->cor_id?>" <?=$resultsGrad[0]->e_course==$courseGrad->cor_id?'selected':''?>>
                  <?=$courseGrad->cor_name;?>
                  </option>
                  <? }?>
                </select>
              </td>
              <td valign="top"><span  style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Branch of Study </td>
              <td valign="top"><div id="divGradBranch">
                  <select name="selBranchGrad" id="selBranchGrad"  style="width:150px;">
                    <option value="0">Select Branch</option>
                    <? if(count($resultsGrad)!=0){
				  $branch_query=$db->getResults("select * from $branch_table where cor_id='".$resultsGrad[0]->e_course."' and branch_status!=0 order by branch_name asc");
			   foreach($branch_query as $branchGrad){
			   ?>
                    <option value="<?=$branchGrad->branch_id?>" <?=$resultsGrad[0]->e_branch==$branchGrad->branch_id?'selected':''?>>
                    <?=$branchGrad->branch_name;?>
                    </option>
                    <? }}?>
                  </select>
              </div></td>
                   <td valign="top"><span  style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Country </td>
              <? $value=$resultsGrad[0]->e_country;
           // echo $value;
			if(is_numeric($value))
			{
?>
              <td valign="top"><select name="selCountryGrad" id="selCountryGrad"  style="width:150px;" onchange="return instGrad(this.value);" >
             <option value="99"  <?=$resultsGrad[0]->e_country==99?'selected':'';?>>India</option>
                  <option value="100" <?=$resultsGrad[0]->e_country==100?'selected':'';?>> USA</option>
                  <option value="101" <?=$resultsGrad[0]->e_country==101?'selected':'';?>>UK</option>
                  <option value="102" <?=$resultsGrad[0]->e_country==102?'selected':'';?>>Australia</option>
                  <option value="103" <?=$resultsGrad[0]->e_country==103?'selected':'';?>>Singapore</option> 
				     <option value="104" <?=$resultsGrad[0]->e_country==104?'selected':'';?>>Canada</option>
					     <option value="105" <?=$resultsGrad[0]->e_country==105?'selected':'';?>>Germany</option> 
                            <option value="106" <?=$resultsGrad[0]->e_country==106?'selected':'';?>>Italy</option>
				     <option value="107" <?=$resultsGrad[0]->e_country==107?'selected':'';?>>France</option> 
					  <option value="108" <?=$resultsGrad[0]->e_country==108?'selected':'';?>>Malaysia</option> 
                  <option value="-1"<?php if ($value == '-1') { echo ' selected="selected"'; } ?>>Other</option>
                </select>
                  <input type="text" name="sel_CountryGrad" maxlength="150"  value="" id="divGradtext"  style="height:15px; margin-top:5px; width:147px;display:<?=$value=='-1'?'block':'none'?>;"/>
              </td>
              <?	}else
			{?>
              <td valign="top"><select name="selCountryGrad" id="selCountryGrad"  style="width:150px;" onchange="return instGrad(this.value);" >
                  <option value="99"  >India</option>
                  <option value="100"> USA</option>
                  <option value="101">UK</option>
                  <option value="102">Australia</option>
                  <option value="103">Singapore</option> 
				     <option value="104">Canada</option>
					     <option value="105">Germany</option> 
                         <option value="106">Italy</option> 
				     <option value="107">France</option> 
					  <option value="108">Malaysia</option> 
				  
                  <option value="-1" selected="selected">Other</option>
                </select>
                  <input type="text" name="sel_CountryGrad" maxlength="150"  value="<?=$value?>" id="divGradtext"  
            style="height:15px; margin-top:5px; width:147px;"/></td>
              <? }
			?>
              <td width="2%" valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">State </td>
              <td valign="top"><select name="selStateGrad" id="selStateGrad"   style="width:150px;"  <?=$resultsGrad[0]->e_country!=99?'disabled':'';?>>
                  <option value="0">Select State</option>
                  <? 
			foreach($states_query as $states_grad){
			?>
                  <option value="<?=stripslashes($states_grad->state_id)?>" <?=$resultsGrad[0]->e_state==$states_grad->state_id?'selected':''?>>
                  <?=stripslashes($states_grad->name);?>
                  </option>
                  <? }?>
                </select>
              </td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Institute  /College </td>
              <td valign="top"><textarea name="selInstGrad" value=""  id="selInstGrad" style="width:147px; height:40px;" > <?=stripslashes(trim($resultsGrad[0]->e_institute));?>
  </textarea>
                  <?php /*?><select name="selInstGrad" id="selInstGrad"  style="width:150px;" onChange="return instGrad(this.value);">
              <option value="0">Select Institute</option>
              <? 
			foreach($inst_query as $inst_grad){
			?>
              <option value="<?=stripslashes($inst_grad->insti_id)?>" <?=$resultsGrad[0]->e_institute==$inst_grad->insti_id?'selected':''?>>
              <?=stripslashes($inst_grad->insti_name);?>
              </option>
              <? }?>
              <option value="-1" <?=$resultsGrad[0]->e_institute=='-1'?'selected':''?>>Other</option>
            </select>
		      <input type="text" name="txtotherGradInst" maxlength="150"  value="<?=$resultsGrad[0]->e_other_institute?>" id="divGradtext"  style="height:15px; margin-top:5px; width:147px;display:<?=$resultsGrad[0]->e_institute=='-1'?'block':'none'?>;"/></td>
	<?php */?></td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">University </td>
              <td valign="top"><select name="selUniversityGrad" id="selUniversityGrad" style="width:150px;" onchange="return univGrad(this.value);">
                  <option value="0">Select University</option>
                  <? 
			foreach($uni_query as $uni_grad){
			?>
                  <option value="<?=stripslashes($uni_grad->uni_id)?>" <?=$resultsGrad[0]->e_university==$uni_grad->uni_id?'selected':''?>>
                  <?=stripslashes($uni_grad->uni_name);?>
                  </option>
                  <? }?>
                  <option value="-1" <?=$resultsGrad[0]->e_university=='-1'?'selected':''?>>Other</option>
                </select>
                  <input type="text" name="txtotherGradUniv" maxlength="250"  value="<?=$resultsGrad[0]->e_other_university?>" id="divUnivtext"  style="height:15px; margin-top:5px; width:147px;display:<?=$resultsGrad[0]->e_university=='-1'?'block':'none'?>;"/></td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td width="25%">Passed Out:</td>
              <td width="44%"><?php /*?><select name="selMonthGrad" id="selMonthGrad" style="width:80px;">
                  <? for($m=0;$m<count($month_array);$m++){?>
                  <option value="<?=$m?>" <?=$resultsGrad[0]->e_passout_month==$m?'selected':''?>>
                  <?=$month_array[$m]?>
                  </option>
                  <? }?>
                </select><?php */?>
                  <select name="selYearGrad" id="selYearGrad" style="width:80px;">
                    <option value="0">Year</option>
                    <? for($y=1990;$y<=date(Y);$y++){?>
                    <option value="<?=$y?>" <?=$resultsGrad[0]->e_passout_year==$y?'selected':''?>>
                    <?=$y?>
                    </option>
                    <? }?>
                </select></td>
              <td width="29%"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Aggregate  Marks</td>
              <td valign="top"><input type="radio" name="radPerGrad" id="radPerGrad" value="1"   <?=$resultsGrad[0]->e_percentage_type==1?'checked':''?> />
                Percentage&nbsp;&nbsp;
                <input type="radio" name="radPerGrad" id="radPerGrad2" value="2"  <?=$resultsGrad[0]->e_percentage_type==2?'checked':''?> />
                CGPA(out of 10)</td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <input type="hidden" name="hidIdGrad" value="<?=$resultsGrad[0]->e_id?>" />
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><input type="text" name="txtPerGrad" maxlength="5" style="height:15px; width:100px;" value="<?=$resultsGrad[0]->e_percentage?>" /></td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">&nbsp;</td>
              <td colspan="2" valign="top"><? if(count($resultsGrad)==0){?>
                  <input type="submit" name="GradSubmit" value="" class="button_new"  />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" name="reset2" value="" class="resetbutton"  />
                <? }else{?>
                <input type="submit" name="updateGrad" value=""  class="button_new" />
                <? }?>
                <span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;">Save this section before filling up next.</span></td>
            </tr>
          </table>
        </form>
        <p></p>
      </div>
      <div id="tabs-4">
        <p><strong>PG / PG Diploma Details</strong> </p>
        <form name="formPG" id="formPG" method="post" action="" onsubmit="return PGvalidation();">
          <?  $resultsPG=$db->getResults("select * FROM $education_table where m_id='".$_SESSION[m_id]."' and qua_id='1' limit 1"); ?>
          <table width="100%" cellpadding="3" cellspacing="0" border="0">
            <tr>
              <td valign="top">&nbsp;</td>
              <td class="notice"><? if($_REQUEST[tb]==4) echo messaging($_REQUEST[msg]);?></td>
              <td class="error">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top">Select Your Degree </td>
              <td valign="top"><select name="selCoursePG" id="selCoursePG"  style="width:150px;" onchange="loadPGBranch(this.value);return false;">
                  <option value="0">Select Course</option>
                  <? $course_query=$db->getResults("select * FROM $course_table where qua_id=1  and cor_status=1 order by cor_name asc");
			   foreach($course_query as $coursePG){
			   ?>
                  <option value="<?=$coursePG->cor_id?>" <?=$resultsPG[0]->e_course==$coursePG->cor_id?'selected':''?>>
                  <?=$coursePG->cor_name;?>
                  </option>
                  <? }?>
                </select>
              </td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Branch of Study </td>
              <td valign="top"><div id="divPGBranch">
                <select name="selBranchPG" id="selBranchPG"  style="width:150px;">
                  <option value="0">Select Branch</option>
                    <? if(count($resultsPG)!=0){
				  $branch_query=$db->getResults("select * from $branch_table where cor_id='".$resultsPG[0]->e_course."' and branch_status=1 order by branch_name asc");
			   foreach($branch_query as $branchPG){
			   ?>
                    <option value="<?=$branchPG->branch_id?>" <?=$resultsPG[0]->e_branch==$branchPG->branch_id?'selected':''?>>
                      <?=$branchPG->branch_name;?>
                      </option>
                    <? }}?>
                  </select>
              </div></td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Country </td>
              <? 
			 if(is_numeric($resultsPG[0]->e_country))
			{?>
              <td valign="top"><select name="selCountryPG" id="selCountryPG"  style="width:150px;" onchange="return instPG(this.value);" >
                
				  
				    <option value="99"  <?=$resultsPG[0]->e_country==99?'selected':'';?>>India</option>
                  <option value="100" <?=$resultsPG[0]->e_country==100?'selected':'';?>> USA</option>
                  <option value="101" <?=$resultsPG[0]->e_country==101?'selected':'';?>>UK</option>
                  <option value="102" <?=$resultsPG[0]->e_country==102?'selected':'';?>>Australia</option>
                  <option value="103" <?=$resultsPG[0]->e_country==103?'selected':'';?>>Singapore</option> 
				     <option value="104" <?=$resultsPG[0]->e_country==104?'selected':'';?>>Canada</option>
					     <option value="105" <?=$resultsPG[0]->e_country==105?'selected':'';?>>Germany</option> 
						 <option value="106" <?=$resultsGrad[0]->e_country==106?'selected':'';?>>Italy</option>
				     <option value="107" <?=$resultsPG[0]->e_country==107?'selected':'';?>>France</option> 
					  <option value="108" <?=$resultsPG[0]->e_country==108?'selected':'';?>>Malaysia</option> 
				  
				  
				  
                  <option value="-1"<?php if ($value == '-1') { echo ' selected="selected"'; } ?>>Other</option>
                </select>
                  <input type="text" name="sel_CountryPG" maxlength="150"  value="" id="divPGtext"   style="height:15px; margin-top:5px; width:147px;display:<?=$value=='-1'?'block':'none'?>;"/>
              </td>
              <? } else 
			{?>
              <td valign="top"><select name="selCountryPG" id="selCountryPG"  style="width:150px;" onchange="return instPG(this.value);" >
                  <option value="99"  >India</option>
                  <option value="100"> USA</option>
                  <option value="101">UK</option>
                  <option value="102">Australia</option>
                  <option value="103">Singapore</option> 
				     <option value="104">Canada</option>
					     <option value="105">Germany</option> 
						 <option value="106" >Italy</option>
				     <option value="107">France</option> 
					  <option value="108">Malaysia</option> 
                  <option value="-1" selected="selected">Other</option>
                </select>
                  <input type="text" name="sel_CountryPG" maxlength="150"  value="<?=$value?>" id="divPGtext"   style="height:15px; margin-top:5px; width:147px;"/>
              </td>
              <? }?>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">State </td>
              <td valign="top"><select name="selStatePG" id="selStatePG"  style="width:150px;"   <?=$resultsPG[0]->e_country!=99?'disabled':'';?>>
                  <option value="0">Select State</option>
                  <? 
			foreach($states_query as $states_PG){
			?>
                  <option value="<?=stripslashes($states_PG->state_id)?>" <?=$resultsPG[0]->e_state==$states_PG->state_id?'selected':''?>>
                  <?=stripslashes($states_PG->name);?>
                  </option>
                  <? }?>
                </select>
              </td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Institute /College </td>
              <td valign="top"><textarea name="selInstPG" value=""  id="selInstPG" style="width:147px; height:40px;" > <?=stripslashes($resultsPG[0]->e_institute);?>
  </textarea>
                  <?php /*?><select name="selInstPG" id="selInstPG"  style="width:150px;" onChange="return instPG(this.value)">
		      <option value="0">Select Institute</option>
              <? 
			foreach($inst_query as $inst_PG){
			?>
              <option value="<?=stripslashes($inst_PG->insti_id)?>" <?=$resultsPG[0]->e_institute==$inst_PG->insti_id?'selected':''?>>
                <?=stripslashes($inst_PG->insti_name);?>
              </option>
              <? }?>
              <option value="-1" <?=$resultsPG[0]->e_institute=='-1'?'selected':''?>>Other</option>
            </select>
		      <input type="text" name="txtotherPGInst" maxlength="250"  value="<?=$resultsPG[0]->e_other_institute?>" id="divPGtext"  style="height:15px; margin-top:5px; width:147px;display:<?=$resultsPG[0]->e_institute=='-1'?'block':'none'?>;"/></td>
		     <?php */?></td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">University </td>
              <td valign="top"><select name="selUniversityPG" id="selUniversityPG" style="width:150px;" onchange="return univPG(this.value)">
                  <option value="0">Select University</option>
                  <? 
			foreach($uni_query as $uni_PG){
			?>
                  <option value="<?=stripslashes($uni_PG->uni_id)?>" <?=$resultsPG[0]->e_university==$uni_PG->uni_id?'selected':''?>>
                  <?=stripslashes($uni_PG->uni_name);?>
                  </option>
                  <? }?>
                  <option value="-1" <?=$resultsPG[0]->e_university=='-1'?'selected':''?>>Other</option>
                </select>
                  <input type="text" name="txtotherPGUniv" maxlength="250"  value="<?=$resultsPG[0]->e_other_university?>" id="divPGUnivtext"  style="height:15px; margin-top:5px; width:147px;display:<?=$resultsPG[0]->e_university=='-1'?'block':'none'?>;"/>
              </td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td width="31%">Passed Out:</td>
              <td width="46%"><?php /*?><select name="selMonthPG" id="selMonthPG" style="width:80px;">
                  <? for($m=0;$m<count($month_array);$m++){?>
                  <option value="<?=$m?>" <?=$resultsPG[0]->e_passout_month==$m?'selected':''?>>
                  <?=$month_array[$m]?>
                  </option>
                  <? }?>
                </select><?php */?>
                  <select name="selYearPG" id="selYearPG" style="width:80px;">
                    <option value="0">Year</option>
                    <? for($y=1990;$y<=date(Y);$y++){?>
                    <option value="<?=$y?>" <?=$resultsPG[0]->e_passout_year==$y?'selected':''?>>
                    <?=$y?>
                    </option>
                    <? }?>
                </select></td>
              <td width="23%"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Aggregate  Marks</td>
              <td valign="top"><input type="radio" name="radPerPG" id="radPerPG" value="1"   <?=$resultsPG[0]->e_percentage_type==1?'checked':''?> />
                Percentage&nbsp;&nbsp;
                <input type="radio" name="radPerPG" id="radPerPG2" value="2"  <?=$resultsPG[0]->e_percentage_type==2?'checked':''?> />
                CGPA(out of 10)</td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <input type="hidden" name="hidIdPG" value="<?=$resultsPG[0]->e_id?>" />
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><input type="text" name="txtPerPG" maxlength="5" style="height:15px; width:100px;" value="<?=$resultsPG[0]->e_percentage?>" /></td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">&nbsp;</td>
              <td colspan="2" valign="top"><? if(count($resultsPG)==0){?>
                  <input type="submit" name="PGSubmit" value=""  class="button_new" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" name="reset2" value="" class="resetbutton" />
                <? }else{?>
                <input type="submit" name="updatePG" value=""  class="button_new" />
                <? }?>
                <span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;">Save this section before filling up next.</span></td>
            </tr>
          </table>
        </form>
        <p></p>
      </div>
      <div id="tabs-5">
        <p><strong>PG Diploma and Certificate courses</strong> </p>
        <form name="formPGDip" id="formPGDip" method="post" action="" onsubmit="return PGDipvalidation();">
          <?  $resultsPGDip=$db->getResults("select * FROM $education_table where m_id='".$_SESSION[m_id]."' and qua_id='21' limit 1"); ?>
          <table width="100%" cellpadding="3" cellspacing="0" border="0">
            <tr>
              <td valign="top">&nbsp;</td>
              <td class="notice"><? if($_REQUEST[tb]==5) echo messaging($_REQUEST[msg]);?></td>
              <td class="error">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top">Select Your Course </td>
              <td valign="top"><select name="selCoursePGDip" id="selCoursePGDip"  style="width:150px;" >
                  <option value="0">Select Course</option>
                  <? $course_query=$db->getResults("select * FROM $course_table where cor_id>='48' and cor_id<='49'  order by cor_name asc");
			   foreach($course_query as $coursePGDip){
			   ?>
                  <option value="<?=$coursePGDip->cor_id?>" <?=$resultsPGDip[0]->e_course==$coursePGDip->cor_id?'selected':''?>>
                  <?=$coursePGDip->cor_name;?>
                  </option>
                  <? }?>
                </select>
              </td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Branch of Study </td>
              <td valign="top"><div id="loadPGDipBranch">
                <select name="selBranchPGDip" id="selBranchPGDip"  style="width:150px;">
                  <option value="0">Select Branch</option>
                    <? 
				  $branch_dip_query=$db->getResults("select * from $branch_table where branch_id>='385' and branch_id<='386'  order by branch_name asc");
			   foreach($branch_dip_query as $branchPGDip){
			   ?>
                    <option value="<?=$branchPGDip->branch_id?>" <?=$resultsPGDip[0]->e_branch==$branchPGDip->branch_id?'selected':''?>>
                      <?=$branchPGDip->branch_name;?>
                      </option>
                    <? }?>
                  </select>
              </div></td>
              <td valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top">Country </td>
              <? $value=$resultsPGDip[0]->e_country;
		  ?>
              <td valign="top"><select name="selCountryPGDip" id="selCountryPGDip"  style="width:150px;" onchange="return instPGDip(this.value);" >
			   
                    <option value="99"  <?=$resultsPGDip[0]->e_country==99?'selected':'';?>>India</option>
                  <option value="100" <?=$resultsPGDip[0]->e_country==100?'selected':'';?>> USA</option>
                  <option value="101" <?=$resultsPGDip[0]->e_country==101?'selected':'';?>>UK</option>
                  <option value="102" <?=$resultsPGDip[0]->e_country==102?'selected':'';?>>Australia</option>
                  <option value="103" <?=$resultsPGDip[0]->e_country==103?'selected':'';?>>Singapore</option> 
				     <option value="104" <?=$resultsPGDip[0]->e_country==104?'selected':'';?>>Canada</option>
					     <option value="105" <?=$resultsPGDip[0]->e_country==105?'selected':'';?>>Germany</option> 
						 <option value="106" <?=$resultsGrad[0]->e_country==106?'selected':'';?>>Italy</option>
				     <option value="107" <?=$resultsPGDip[0]->e_country==107?'selected':'';?>>France</option> 
					  <option value="108" <?=$resultsPGDip[0]->e_country==108?'selected':'';?>>Malaysia</option> 
				  <option value="-1" >Other</option>
                </select>
                  <input type="text" name="divPGtext" maxlength="150"  value="" id="divPGDiptext"   style="height:15px; margin-top:5px; width:147px;display:<?=$value=='-1'?'block':'none'?>;"/>
              </td>
          
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">State </td>
              <td valign="top"><select name="selStatePGDip" id="selStatePGDip"  style="width:150px;"  <?=$resultsPGDip[0]->e_country!=99 && $resultsPGDip[0]->e_country!=''?'disabled':'';?>>
                  <option value="0">Select State</option>
                  
                  <? 
			foreach($states_query as $states_PGDip){
			?>
                  <option value="<?=stripslashes($states_PGDip->state_id)?>" <?=$resultsPGDip[0]->e_state==$states_PGDip->state_id?'selected':''?>>
                  <?=stripslashes($states_PGDip->name);?>
                  </option>
                  <? }?>
                </select>
              </td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Institute / College </td>
              <td valign="top">
             <select name="selInstPGDip" id="selInstPGDip"  style="width:150px;" onChange="return instPGDip1(this.value)">
		      <option value="0">Select Institute</option>
            
              <option value="RV-VLSI Design Center"<?=stripslashes(trim($resultsPGDip[0]->e_institute))=="RV-VLSI Design Center"?'selected':'';?>> RV-VLSI Design Center</option>
             
              <option value="-1" <?=$resultsPGDip[0]->e_institute=='-1'?'selected':''?>>Other</option>
            </select>
		      <input type="text" name="txtotherPGDipInst" maxlength="250" value="<?=$resultsPGDip[0]->e_other_institute?>" id="divPGDiptext1"   style="height:15px; margin-top:5px; width:147px;display:<?=$resultsPGDip[0]->e_institute=='-1'?'block':'none'?>;"/>
		   
			  
			  <?php /*?><textarea name="selInstPGDip" value=""  id="selInstPGDip" style="width:147px; height:40px;" > <?=stripslashes(trim($resultsPGDip[0]->e_institute));?>
  </textarea><?php */?>
                  <?php /*?><select name="selInstPGDip" id="selInstPGDip"  style="width:150px;" onChange="return instPGDip(this.value)">
		      <option value="0">Select Institute</option>
              <?  $inst_dip_query=$db->getResults("select * FROM $institutes where insti_id='670' order by insti_name asc");
			foreach($inst_dip_query as $inst_PGDip){
			?>
              <option value="<?=stripslashes($inst_PGDip->insti_id)?>" <?=$resultsPGDip[0]->e_institute==$inst_PGDip->insti_id?'selected':''?>>
                <?=stripslashes($inst_PGDip->insti_name);?>
              </option>
              <? }?>
              <option value="-1" <?=$resultsPGDip[0]->e_institute=='-1'?'selected':''?>>Other</option>
            </select>
		      <input type="text" name="txtotherPGDipInst" maxlength="250"  value="<?=$resultsPGDip[0]->e_other_institute?>" id="divPGDiptext"   style="height:15px; margin-top:5px; width:147px;display:<?=$resultsPGDip[0]->e_institute=='-1'?'block':'none'?>;"/></td>
		    <?php */?></td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <?php /*?><tr>
		    <td valign="top">University   </td>
		    <td valign="top"><select name="selUniversityPGDip" id="selUniversityPGDip" style="width:150px;" onChange="return univPGDip(this.value)">
		      <option value="0">Select University</option>
              <? 
			foreach($uni_query as $uni_PGDip){
			?>
              <option value="<?=stripslashes($uni_PGDip->uni_id)?>" <?=$resultsPGDip[0]->e_university==$uni_PGDip->uni_id?'selected':''?>>
                <?=stripslashes($uni_PGDip->uni_name);?>
              </option>
              <? }?>
              <option value="-1" <?=$resultsPGDip[0]->e_university=='-1'?'selected':''?>>Other</option>
            <option value="-1" <?=$resultsPGDip[0]->e_university=='-1'?'selected':''?>>Other</option>
            </select>		<input type="text" name="txtotherPGDipUniv" maxlength="250"  value="<?=$resultsPGDip[0]->e_other_university?>" id="divPGDipUnivtext"  style="height:15px; margin-top:5px; width:147px;display:<?=$resultsPGDip[0]->e_university=='-1'?'block':'none'?>;"/>  		    </td>
		    <td valign="top"><span style="color:#FF0000;">*</font></span></td>
		    </tr><?php */?>
            <tr>
              <td width="35%">Passed Out:</td>
              <td width="42%"><select name="selMonthPGDip" id="selMonthPGDip" style="width:80px;">
                  <? for($m=0;$m<count($month_array);$m++){?>
                  <option value="<?=$m?>" <?=$resultsPGDip[0]->e_passout_month==$m?'selected':''?>>
                  <?=$month_array[$m]?>
                  </option>
                  <? }?>
                </select>
                  <select name="selYearPGDip" id="selYearPGDip" style="width:80px;">
                    <option value="0">Year</option>
                    <? for($y=1990;$y<=date(Y);$y++){?>
                    <option value="<?=$y?>" <?=$resultsPGDip[0]->e_passout_year==$y?'selected':''?>>
                    <?=$y?>
                    </option>
                    <? }?>
                </select></td>
              <td width="23%"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Aggregate  Marks</td>
              <td valign="top"><input type="radio" name="radPerPGDip" id="radPerPGDip" value="1"   <?=$resultsPGDip[0]->e_percentage_type==1?'checked':''?> />
                Percentage&nbsp;&nbsp;
                <input type="radio" name="radPerPGDip" id="radPerPGDip2" value="2"  <?=$resultsPGDip[0]->e_percentage_type==2?'checked':''?> />
                CGPA(out of 10)</td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <input type="hidden" name="hidIdPGDip" value="<?=$resultsPGDip[0]->e_id?>" />
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><input type="text" name="txtPerPGDip" maxlength="5" style="height:15px; width:100px;" value="<?=$resultsPGDip[0]->e_percentage?>" /></td>
              <td valign="top"><span style="color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">&nbsp;</td>
              <td colspan="2" valign="top"><? if(count($resultsPGDip)==0){?>
                  <input type="submit" name="PGDipSubmit" value=""  class="button_new" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" name="reset2" value="" class="resetbutton" />
                <? }else{?>
                <input type="submit" name="updatePGDip" value=""  class="button_new" />
                <? }?>
                <span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;">Save this section before filling up next.</span></td>
            </tr>
          </table>
        </form>
        <p></p>
      </div>
      <?php /*?><div id="tabs-6" style="overflow:scroll; height:400px; display:none;">
        <p><strong>Other Course Details</strong></p>
        <?  $resultsOther_query=$db->getResults("select * FROM $education_table where m_id='".$_SESSION[m_id]."' and qua_id='6' ");
		foreach($resultsOther_query as $resultsOther) {?>
        <form name="formOther" id="formOther" method="post" action="" onsubmit="return Othervalidation();">
          <table width="100%" cellpadding="3" cellspacing="0" border="0">
            <tr>
              <td valign="top">&nbsp;</td>
              <td width="47%" class="error"><? if($_REQUEST[tb]==6) echo messaging($_REQUEST[msg]);?></td>
              <td width="20%" class="error" align="right"><a href="educations_info.php?action=deleteOne&e_id=<?=$resultsOther->e_id?>" onclick="return toDelete();" style=" text-decoration:none;"><span style=" color:#FF0000; font-size:14px; font-family:Trebuchet MS;">Remove</span><img src="images/Delett_small.png" border="0" alt="Delete"  /></a></td>
            </tr>
            <tr>
              <td valign="top">Select Your Course</td>
              <td valign="top"><select name="selCourseOther" id="selCourseOther"  style="width:150px;" onchange="loadOtherBranch(this.value,<?=$resultsOther->e_id?>);return false;">
                  <option value="0">Select Course</option>
                  <? $course_query=$db->getResults("select * FROM $course_table order by cor_name asc");
			   foreach($course_query as $courseOther){
			   ?>
                  <option value="<?=$courseOther->cor_id?>" <?=$resultsOther->e_course==$courseOther->cor_id?'selected':''?>>
                  <?=$courseOther->cor_name;?>
                  </option>
                  <? }?>
                </select>
              </td>
              <td valign="top"><span style=" color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Branch of Study </td>
              <td valign="top"><div id="divOtherBranch<?=$resultsOther->e_id?>">
                <select name="selBranchOther" id="selBranchOther"  style="width:150px;">
                  <option value="0">Select Branch</option>
                    <? if(count($resultsOther)!=0){
				  $branch_other_query=$db->getResults("select * from $branch_table where cor_id='".$resultsOther->e_course."' order by branch_name asc");
			   foreach($branch_other_query as $branchOther){
			   ?>
                    <option value="<?=$branchOther->branch_id?>" <?=$resultsOther->e_branch==$branchOther->branch_id?'selected':''?>>
                      <?=$branchOther->branch_name;?>
                      </option>
                    <? }}?>
                  </select>
              </div></td>
              <td valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top">Country </td>
              <td valign="top"><select name="selCountryOther" id="selCountryOther"  style="width:150px;">
                  <option value="99">INDIA</option>
                </select>
              </td>
              <td valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top">State </td>
              <td valign="top"><select name="selStateOther" id="selStateOther"  style="width:150px;"  <?=$resultsOther[0]->e_country!=99?'disabled':'';?>>
                  <option value="0">Select State</option>
                  <? 
			foreach($states_query as $states_Other){
			?>
                  <option value="<?=stripslashes($states_Other->state_id)?>" <?=$resultsOther->e_state==$states_Other->state_id?'selected':''?>>
                  <?=stripslashes($states_Other->name);?>
                  </option>
                  <? }?>
                </select>
              </td>
              <td valign="top"><span style=" color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Institute </td>
              <td valign="top"><select name="selInstOther" id="selInstOther"  style="width:150px;" onchange="return instOther(this.value,<?=$resultsOther->e_id?>)">
                  <option value="0">Select Institute</option>
                  <? 
			foreach($inst_query as $inst_Other){
			?>
                  <option value="<?=stripslashes($inst_Other->insti_id)?>" <?=$resultsOther->e_institute==$inst_Other->insti_id?'selected':''?>>
                  <?=stripslashes($inst_Other->insti_name);?>
                  </option>
                  <? }?>
                  <option value="-1" <?=$resultsOther->e_institute=='-1'?'selected':''?>>Other</option>
                </select>
                  <input type="text" name="txtotherInst" maxlength="250"  value="<?=$resultsOther->e_other_institute?>" id="divOthertext<?=$resultsOther->e_id?>"  style="height:15px; margin-top:5px; width:147px;display:<?=$resultsOther->e_institute=='-1'?'block':'none'?>;"/></td>
              <td valign="top"><span style=" color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">University </td>
              <td valign="top"><select name="selUniversityOther" id="selUniversityOther" style="width:150px;" onchange="return univOther(this.value,<?=$resultsOther->e_id?>)">
                  <option value="0">Select University</option>
                  <? 
			foreach($uni_query as $uni_Other){
			?>
                  <option value="<?=stripslashes($uni_Other->uni_id)?>" <?=$resultsOther->e_university==$uni_Other->uni_id?'selected':''?>>
                  <?=stripslashes($uni_Other->uni_name);?>
                  </option>
                  <? }?>
                  <option value="-1" <?=$resultsOther->e_university=='-1'?'selected':''?>>Other</option>
                </select>
                  <input type="text" name="txtotherUniv" maxlength="250"  value="<?=$resultsOther->e_other_university?>" id="divOtherUnivtext<?=$resultsOther->e_id?>"  style="height:15px; margin-top:5px; width:147px;display:<?=$resultsOther->e_university=='-1'?'block':'none'?>;"/>
              </td>
              <td valign="top"><span style=" color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td width="33%">Passed Out:</td>
              <td valign="top"><select name="selMonthOther" id="selMonthOther" style="width:80px;">
                  <? for($m=0;$m<count($month_array);$m++){?>
                  <option value="<?=$m?>" <?=$resultsOther->e_passout_month==$m?'selected':''?>>
                  <?=$month_array[$m]?>
                  </option>
                  <? }?>
                </select>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <select name="selYearOther" id="selYearOther" style="width:80px;">
                  <option value="0">Year</option>
                  <? for($y=1990;$y<=date(Y);$y++){?>
                  <option value="<?=$y?>" <?=$resultsOther->e_passout_year==$y?'selected':''?>>
                    <?=$y?>
                    </option>
                  <? }?>
                </select></td>
              <td valign="top"><span style=" color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">Aggregate  Marks</td>
              <td valign="top"><input type="radio" name="radPerOther" id="radPerOther" value="1"   <?=$resultsOther->e_percentage_type==1?'checked':''?> />
                Percentage&nbsp;&nbsp;
                <input type="radio" name="radPerOther" id="radPerOther2" value="2"  <?=$resultsOther->e_percentage_type==2?'checked':''?> />
                CGPA(out of 10)</td>
              <td valign="top"><span style=" color:#FF0000;">*</span></td>
            </tr>
            <input type="hidden" name="hidIdOther" value="<?=$resultsOther->e_id?>" />
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><input type="text" name="txtPerOther" maxlength="5" style="height:15px; width:100px;" value="<?=$resultsOther->e_percentage?>" /></td>
              <td valign="top"><span style=" color:#FF0000;">*</span></td>
            </tr>
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><? if(count($resultsOther_query)==0){?>
                  <input type="submit" name="OtherSubmit" value=""  class="button_new" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" name="reset2" value=""  class="resetbutton" />
                <? }else{?>
                <input type="submit" name="updateOther" value=""  class="button_new" />
                <? }?></td>
              <td valign="top">&nbsp;</td>
            </tr>
          </table>
        </form>
        <? }?>
        <table width="100%">
          <tr>
            <td>&nbsp;</td>
            <td width="49%" class="error">&nbsp;</td>
            <td width="30%" class=""><a href="#?w=500" rel="popup_name" class="poplight"><img src="images/addnewbg.png" width="83" height="22" border="0" /></a></td>
          </tr>
        </table>
        <p></p>
      </div><?php */?>
    </div>
   <!-- <div style="text-align:right;"><a href="academic_info.php" ><img src="images/continue.png" border="0" /></a> </div>-->
 <div style="float:left; width:690px;">
<div class="step-sub-tabs" style="margin:10px 10px 10px 230px; text-align:center;" align="center"><input type="button" name="firstTimeSubmit" class="button_sc" />

</div>
</div>
 
  </div>
  
  
</div>
</div>
</div>




<div id="popup_name" class="popup_block" style="float:left;">
 <p><strong>Other Course Details</strong>
        <form name="formOthermore" id="formOthermore" method="post" action="" onsubmit="return Othermorevalidation();">
    
        <table width="100%" cellpadding="3" cellspacing="0" border="0" style="float:left;">
		 <tr>
		    <td valign="top">Select Your Course </td>
		    <td width="39%"><select name="selCourseOthermore" id="selCourseOthermore"  style="width:150px;" onChange="loadOthermoreBranch(this.value);return false;">
		      <option value="0">Select Course</option>
              <? $course_query=$db->getResults("select * FROM $course_table order by cor_name asc");
			   foreach($course_query as $courseOthermore){
			   ?>
              <option value="<?=$courseOthermore->cor_id?>">
                <?=$courseOthermore->cor_name;?>
              </option>
              <? }?>
            </select>		    </td>
	       <td width="26%" colspan="2"><span style="color:#FF0000;">*</span></td>
  </tr>
		  <tr>
		    <td valign="top">Branch of Study </td>
		    <td valign="top"><div id="divOthermoreBranch"><select name="selBranchOthermore" id="selBranchOthermore"  style="width:150px;"><option value="0">Select Branch</option>
           
              <? if(count($resultsOthermore)!=0){
				  $branch_Othermore_query=$db->getResults("select * from $branch_table where cor_id='".$resultsOthermore[0]->e_course."' order by branch_name asc");
			   foreach($branch_Othermore_query as $branchOthermore){
			   ?>
            <option value="<?=$branchOthermore->branch_id?>" ><?=$branchOthermore->branch_name;?></option>
            <? }}?> 
            </select></div></td>
		    <td colspan="2">&nbsp;</td>
		    </tr>
		  <tr>
		    <td valign="top">Country </td>
		    <td valign="top"><select name="selCountryOthermore" id="selCountryOthermore"  style="width:150px;">
		      <option value="99">INDIA</option>
		      </select>		    </td>
		    <td colspan="2">&nbsp;</td>
		    </tr>
		  <tr>
		    <td valign="top">State </td>
		    <td valign="top"><select name="selStateOthermore" id="selStateOthermore"  style="width:150px;" >
		      <option value="0">Select State</option>
              <? 
			foreach($states_query as $states_Othermore){
			?>
              <option value="<?=stripslashes($states_Othermore->state_id)?>" >
                <?=stripslashes($states_Othermore->name);?>
              </option>
              <? }?>
            </select>		    </td>
		    <td colspan="2"><span style="color:#FF0000;">*</span></td>
		    </tr> <tr>
		    <td valign="top">Institute  </td>
		    <td valign="top"><select name="selInstOthermore" id="selInstOthermore"  style="width:150px;" onChange="return instotherMore(this.value)">
		      <option value="0">Select Institute</option>
              <? 
			foreach($inst_query as $inst_Othermore){
			?>
              <option value="<?=stripslashes($inst_Othermore->insti_id)?>" >
                <?=stripslashes($inst_Othermore->insti_name);?>
              </option>
              <? }?>
			   <option value="-1">Other</option>
            </select>	<input type="text" name="txtothermoreInst" maxlength="250"  value="" id="divothermoreInsttext"   style="height:15px; margin-top:5px; width:147px;display:none;"/>	    </td>
		    <td colspan="2"><span style="color:#FF0000;">*</span></td>
		    </tr><tr>
		    <td valign="top">University   </td> 
		    <td valign="top"><select name="selUniversityOthermore" id="selUniversityOthermore" style="width:150px;"  onChange="return univotherMore(this.value)">
		      <option value="0">Select University</option>
              <? 
			foreach($uni_query as $uni_Othermore){
			?>
              <option value="<?=stripslashes($uni_Othermore->uni_id)?>" >
                <?=stripslashes($uni_Othermore->uni_name);?>
              </option>
              <? }?>
			     <option value="-1">Other</option>
            </select>	<input type="text" name="txtothermoreUniv" maxlength="250"  value="" id="divothermoreUnivtext"   style="height:15px; margin-top:5px; width:147px;display:none;"/>	    </td>
		    <td colspan="2"><span style="color:#FF0000;">*</span></td>
		    </tr>
		  <tr>
		    <td width="35%">Passed Out:</td>
		    <td valign="top"><select name="selMonthOthermore" id="selMonthOthermore" style="width:80px;">
              <? for($m=0;$m<count($month_array);$m++){?>
              <option value="<?=$m?>" >
                <?=$month_array[$m]?>
              </option>
              <? }?>
		      </select>
&nbsp;&nbsp;&nbsp;&nbsp;
<select name="selYearOthermore" id="selYearOthermore" style="width:80px;">
  <option value="0">Year</option>
  <? for($y=1990;$y<=date(Y);$y++){?>
  <option value="<?=$y?>">
  <?=$y?>
  </option>
  <? }?>
</select></td>
		    <td colspan="2"><span style="color:#FF0000;">*</span></td>
  </tr>
		  <tr>
		    <td valign="top">Aggregate Marks</td>
		    <td valign="top" width="50%"><input type="radio" name="radPerOthermore" id="radPerOthermore" value="1"   <?=$resultsOthermore[0]->e_percentage_type==1?'checked':''?> />
		      Percentage&nbsp;&nbsp;
              <input type="radio" name="radPerOthermore" id="radPerOthermore2" value="2"  <?=$resultsOthermore[0]->e_percentage_type==2?'checked':''?> />
            CGPA(out of 10)</td>
		    <td colspan="2"><span style="color:#FF0000;">*</span></td>
  </tr>
            <input type="hidden" name="hidIdOthermore" value="<?=$resultsOthermore[0]->e_id?>" />
		  <tr>

		    <td valign="top">&nbsp;</td>
		    <td valign="top"><input type="text" name="txtPerOthermore" maxlength="5" style="height:15px; width:100px;" value="<?=$resultsOthermore[0]->e_percentage?>" /></td>
		    <td colspan="2"><span style="color:#FF0000;">*</span></td>
		    </tr>
		  
		  
		  
		  <tr><td valign="top">&nbsp;</td>
		    <td valign="top"><input type="submit" name="OthermoreSubmit" value=""  class="button_new" />
&nbsp;&nbsp;&nbsp;
<input type="reset" name="reset" value="" class="resetbutton" /></td>
		    <td colspan="2">&nbsp;</td></tr></table>


        </form></p>
        
</div>
</div>
</div>


<script>
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
});
</script>

<?php include "stmenuleft_content.php"; ?>
</div>

<? include "includes/footer.php" ?>
</div>

</body>
</html>