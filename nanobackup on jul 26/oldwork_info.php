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
   
  
  $work_result_query=$db->getResults("SELECT * FROM $work_experience_table where m_id='".$_SESSION[m_id]."'");

 
if(isset($_POST['workSubmit']))
 {

 

  $from=$_POST['selFromMonth1'].'-'.$_POST['selFromYear1'];
   $to=$_POST['seltoMonth1'].'-'.$_POST['seltoYear1'];
 	$info_query="insert into $work_experience_table  set we_company='".$ch->checkFields($_POST['txtCompany'])."',m_id='".$_SESSION[m_id]."', we_designation='".$ch->checkFields($_POST['txtDesignation'])."',we_from_date='".$ch->checkFields($from)."',we_to_date='".$ch->checkFields($to)."'";
	//die($info_query);											  
			
 $result=$db->insertRecord($info_query);
header("Location:work_info.php?msg=2");					
		}		
 
if(isset($_POST['workSubmitmore']))
 {
	// die("sdfljhskjdfkjsdhgk");
 

  $from=$_POST['selFromMonth1more'].'-'.$_POST['selFromYear1more'];
   $to=$_POST['seltoMonth1more'].'-'.$_POST['seltoYear1more'];
 	$info_query="insert into $work_experience_table  set we_company='".$ch->checkFields($_POST['txtCompanymore'])."',m_id='".$_SESSION[m_id]."', we_designation='".$ch->checkFields($_POST['txtDesignationmore'])."',we_from_date='".$ch->checkFields($from)."',we_to_date='".$ch->checkFields($to)."'";
	//die($info_query);											  
			
 $result=$db->insertRecord($info_query);
header("Location:work_info.php?msg=2");					
		}		
		
 if(isset($_POST['workUpdate']))
 {
 
   $from1=$_POST['selFromMonth'].'-'.$_POST['selFromYear'];
   $to1=$_POST['seltoMonth'].'-'.$_POST['seltoYear'];

//$info_query="update $work_experience_table  set we_company='".$ch->checkFields($_POST['txtCompany'])."', we_designation='".$ch->checkFields($_POST['txtDesignation'])."',we_from_date='".$ch->checkFields($from1)."',we_to_date='".$ch->checkFields($to1)."' where we_id ='".$ch->checkFields($_REQUEST['hidAcaID'])."' and  m_id='".$_SESSION[m_id]."'";
												  
	//ie($info_query);
   $db->insertRecord("update $work_experience_table  set we_company='".$ch->checkFields($_POST['txtCompany'])."', we_designation='".$ch->checkFields($_POST['txtDesignation'])."',we_from_date='".$ch->checkFields($from1)."',we_to_date='".$ch->checkFields($to1)."' where we_id ='".$ch->checkFields($_REQUEST['hidWorkID'])."' and  m_id='".$_SESSION[m_id]."'");
     header("Location:work_info.php?msg=2");					
		}	


if(isset($_POST['projUpdateEdit']))
 {
 
   // $period = $_REQUEST[selFrom]."-".$_REQUEST[selTo];
/*    $from=$_POST['selFromEdit'].'-'.$_POST['selFromYearEdit'];
   $to=$_POST['selMonth1Edit'].'-'.$_POST['selYear1Edit'];*/

if($_POST['selVLSIType']=='')
$vlsityp=0;
else
$vlsityp=$_POST['selVLSIType'];

 	$info_query="update $work_projects_table  set wp_title = '".$ch->checkFields($_POST['txtTitleEdit'])."',
								                  wp_company	='".$ch->checkFields($_REQUEST['hidCompnyID'])."',
			                                      wp_role = '".$ch->checkFields($_POST['txtRoleEdit'])."',
												  wp_team_size = '".$ch->checkFields($_POST['selSizeEdit'])."', 
												 wp_duration= '".$ch->checkFields($_POST['txtDuration'])."', 
												  wp_other_tech = '".$ch->checkFields($_POST['txtOtherprojectEdit'])."',
			                                      wp_project_type ='".$ch->checkFields($_POST['selEndEdit'])."',
		                                          wp_description = '".$ch->checkFields($_POST['areaDescriptionEdit'])."',
		                                          wp_tools = '".$ch->checkFields($_POST['areaToolsEdit'])."',
		                                          wp_challenges ='".$ch->checkFields($_POST['areaChallengesEdit'])."',
												  wp_vlsitype ='".$ch->checkFields($vlsityp)."' where wp_id='$_REQUEST[hidProjID]' and 									              m_id='".$_SESSION[m_id]."'";
					//die($info_query);						  
			
 $result=$db->insertRecord($info_query);
header("Location:work_info.php?msg=2");					
		}		
		
	if(isset($_POST['workProjectSubmit']))
 {
/*	 $from=$_POST['selFrom'].'-'.$_POST['selFromYear'];
   $to=$_POST['selMonth1'].'-'.$_POST['selYear1'];
*/
if($_POST['selVLSIType']=='')
 $vlsityp=0;
else
$vlsityp=$_POST['selVLSIType'];

$info_query="insert into $work_projects_table  set wp_title = '".$ch->checkFields($_POST['txtTitle'])."',
								                  wp_company	='".$ch->checkFields($_POST['CompanyId'])."',
			                                      wp_role = '".$ch->checkFields($_POST['txtRole'])."',
												  wp_team_size = '".$ch->checkFields($_POST['selSize'])."', 
												 wp_duration= '".$ch->checkFields($_POST['txtDuration'])."', 
												  wp_other_tech = '".$ch->checkFields($_POST['txtOtherproject'])."',
			                                      wp_project_type ='".$ch->checkFields($_POST['selEnd'])."',
		                                          wp_description = '".$ch->checkFields($_POST['areaDescription'])."',
		                                          wp_tools = '".$ch->checkFields($_POST['areaTools'])."',
		                                          wp_challenges ='".$ch->checkFields($_POST['areaChallenges'])."',
												  wp_vlsitype ='".$ch->checkFields($vlsityp)."',
												  m_id='".$_SESSION[m_id]."',we_id ='".$ch->checkFields($_REQUEST['hidWeID'])."'";
				
$result=$db->insertRecord($info_query);
header("Location:work_info.php?msg=2");
												  
												  
   // $period = $_REQUEST[selFrom]."-".$_REQUEST[selTo];
  /*  $from=$_POST['selFromEdit'].'-'.$_POST['selFromYearEdit'];
   $to=$_POST['selMonth1Edit'].'-'.$_POST['selYear1Edit'];

if($_POST['selVLSIType']=='')
$vlsityp=0;
else
$vlsityp=$_POST['selVLSIType'];

 echo 	$info_query="insert into $work_projects_table   wp_title = '".$ch->checkFields($_POST['txtTitle'])."',
								                  wp_company	='".$ch->checkFields($_POST['txtCompany'])."',
			                                      wp_role = '".$ch->checkFields($_POST['txtRole'])."',
												  wp_team_size = '".$ch->checkFields($_POST['selSize'])."', 
												  wp_from_date = '".$ch->checkFields($from)."', 
												  wp_to_date = '".$ch->checkFields($to)."',
												  wp_other_tech = '".$ch->checkFields($_POST['txtOtherproject'])."',
			                                      wp_project_type ='".$ch->checkFields($_POST['selEnd'])."',
		                                          wp_description = '".$ch->checkFields($_POST['areaDescriptiont'])."',
		                                          wp_tools = '".$ch->checkFields($_POST['areaTools'])."',
		                                          wp_challenges ='".$ch->checkFields($_POST['areaChallenges'])."',
												  wp_vlsitype ='".$ch->checkFields($vlsityp)."'";
												  
			
 $result=$db->insertRecord($info_query);
header("Location:work_info.php?msg=2");		*/			
		}
		
		if($_REQUEST[action]=='deleteOne' && is_numeric($_REQUEST[we_id])!=''){

$db->insertRecord("delete from  $work_experience_table where we_id='".$ch->checkFields($_REQUEST[we_id])."' and m_id='".$_SESSION[m_id]."'");
header("Location:work_info.php?msg=3");	

}	
		if($_REQUEST[action]=='deleteProjectOne' && is_numeric($_REQUEST[wp_id])!=''){

$db->insertRecord("delete from  $work_projects_table where wp_id='".$ch->checkFields($_REQUEST[wp_id])."' and m_id='".$_SESSION[m_id]."'");
header("Location:work_info.php?msg=3");	

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
  /*
			function isalpha(str)
	{
 	var re = /[^a-zA-Z' ']/g
  	if (re.test(str)) return false;
 	return true;
	
	}			
		*/
	  	
			function formworkValidation()
			{
				
			
			var frm=document.formwork;
			
				if(frm.txtCompany.value=='')
					{
					alert(" Please  Enter Company nam");
					frm.txtCompany.focus();
					return false;
					}
					else if(frm.txtDesignation.value=='')
					{
					alert(" Please enter Designation");
					frm.txtDesignation.focus();
					return false;
					} 
					else if(frm.selFromMonth.value==0)
					{
					alert(" Please Select From Month");
					frm.selFromMonth.focus();
					return false;
					}
					else if(frm.selFromYear.value==0 )
					{
					alert("Please select From Year");
					frm.selFromYear.focus();
					return false;
					}
					else if(frm.seltoMonth.value==0)
					{
					alert(" Please Select To Month");
					frm.seltoMonth.focus();
					return false;
					}
					else if(frm.seltoYear.value==0 )
					{
					alert("Please select To Year");
					frm.seltoYear.focus();
					return false;
					}
					
					
		   if(frm.selFromYear.value!=0 && frm.seltoYear.value!=0 &&  frm.seltoYear.value!=13)
			{
			
			 if(frm.selFromYear.value>frm.seltoYear.value){
					alert("From Year should less than To Year");
					
					return false;	
			}     } 
			
			/*var m =new Array('Jan','Feb','Mar','April','May','June','July','Aug','Sep','Oct','Nov','Dec');
						
					
					
			 if(m[frm.selFromMonth.value]==m[frm.seltoMonth.value])
			 {
					alert("Wrong input");
					
					return false;	
			}  */  
		
		}
		function formProjectValidation()
			{
				
			
			var frm=document.formProject;
			
				if(frm.txtCompany.value=='')
					{
					alert(" Please Enter Company Name");
					frm.txtCompany.focus();
					return false;
					}
					 else if(frm.txtDesignation.value=='')
					{
					alert(" Please Enter Designation");
					frm.txtDesignation.focus();
					return false;
					}
					else if(frm.selFromMonth1.value==0)
					{
					alert(" Please Select From Month");
					frm.selFromMonth1.focus();
					return false;
					}
					else if(frm.selFromYear1.value==0 )
					{
					alert("Please Select From Year");
					frm.selFromYear1.focus();
					return false;
					}
					else if(frm.seltoMonth1.value==0)
					{
					alert(" Please Select To Month");
					frm.seltoMonth1.focus();
					return false;
					}
					else if(frm.seltoYear1.value==0 )
					{
					alert("Please select To Year");
					frm.seltoYear1.focus();
					return false;
					}
					
		   if(frm.selFromYear1.value!='0' && frm.seltoYear1.value!='0')
			{
			
			 if(frm.selFromYear1.value>frm.seltoYear1.value){
					alert("From Year should less than To Year");
					
					return false;	
			}     } 
			/*var m =new Array('Jan','Feb','Mar','April','May','June','July','Aug','Sep','Oct','Nov','Dec');
			var y =new Array('1970','1971','1972','1973','1974','1975','1976','1977','1978','1979','1980','1981','1982','1983','1984','1985','1986','1987','1988','1989','1990','1991','1992','1993','1994','1995','1996','1997','1998','1999','1999','2000','2001','2002','2003','2004','2005');
						
					
					
			 if(y[frm.selFromYear1.value]==y[frm.seltoYear1.value])
			 {
				 if(m[frm.selFromMonth1.value]>m[frm.seltoMonth1.value] )
				 {
					alert("Wrong month input");
					
					return false;	
				 }
				 
					 
				
			}
			if(y[frm.selFromYear1.value]==y[frm.seltoYear1.value] ||  m[frm.selFromMonth1.value]==m[frm.seltoMonth1.value])
				 {
					 alert("Wrong ");
					
					return false;	
				 }
			
					*/
					
		
		}
		function workinfomoreValidation()
			{
		
			
			var frm=document.formProjectmore;
			
				if(frm.txtCompanymore.value=='')
					{
					alert(" Please Enter Company name");
					frm.txtCompanymore.focus();
					return false;
					}
					 else if(frm.txtDesignationmore.value=='')
					{
					alert(" Please Enter Designation");
					frm.txtDesignationmore.focus();
					return false;
					}
					else if(frm.selFromMonth1more.value==0)
					{
					alert(" Please Select From Month");
					frm.selFromMonth1more.focus();
					return false;
					}
					else if(frm.selFromYear1more.value==0 )
					{
					alert("Please Select From Year");
					frm.selFromYear1more.focus();
					return false;
					}
					else if(frm.seltoMonth1more.value==0)
					{
					alert(" Please Select To Month");
					frm.seltoMonth1more.focus();
					return false;
					}
					else if(frm.seltoYear1more.value==0 )
					{
					alert("Please Select To Year");
					frm.seltoYear1more.focus();
					return false;
					}
					
		   		if(frm.selFromYear1more.value!='0' && frm.seltoYear1more.value!='0')
					{
					if(frm.seltoYear1more.value!=13){
			
					 if(frm.selFromYear1more.value>frm.seltoYear1more.value){
					alert("From Year Should Less Than To Year");
					
					return false;	
				}     } }
			}
		
		function formAcademicValidation()
			{
				
			
			var frm=document.formAcademic;
			
				if(frm.txtTitle.value=='')
					{
					alert(" Please Enter Title");
					frm.txtTitle.focus();
					return false;
					}
					  if(frm.txtCompany.value==0)
					{
					alert(" Please Select Company");
					frm.txtCompany.focus();
					return false;
					}
						  if(frm.txtDuration.value==0)
					{
					alert(" Please enter duration in Months");
					frm.txtDuration.focus();
					return false;
					}
				/*	 if(frm.selFrom.value==0)
					{
					alert(" Please Select From Month");
					frm.selFrom.focus();
					return false;
					}
					 if(frm.selFromYear.value==0 )
					{
					alert("Please Select From Year");
					frm.selFromYear.focus();
					return false;
					}
					 if(frm.selMonth1.value==0)
					{
					alert(" Please Select To Month");
					frm.selMonth1.focus();
					return false;
					}
					 if(frm.selYear1.value==0 )
					{
					alert("Please Select To Year");
					frm.selYear1.focus();
					return false;
					}
					
		   if(frm.selFromYear.value!='0' && frm.selYear1.value!='0' )
			{
			
			 if(frm.selFromYear.value>frm.selYear1.value){
					alert("From Year Should Less Than To Year");
					
					return false;	
			}     } */
if(frm.txtRole.value==0 )
					{
					alert("Please Enter Role");
					frm.txtRole.focus();
					return false;
					}

					
					
		
		}
		function formAcademicUpdate()
			{
				
			
			var frm=document.formAcademic1;
			
				if(frm.txtTitleEdit.value=='')
					{
					alert(" Please Enter Title");
					frm.txtTitleEdit.focus();
					return false;
					}
				 else if(frm.txtCompanyEdit.value==0)
					{
					alert(" Please Select Company");
					frm.txtCompanyEdit.focus();
					return false;
					}
					else if(frm.selFromEdit.value==0)
					{
					alert(" Please Select From Month");
					frm.selFromEdit.focus();
					return false;
					}
					else if(frm.selFromYearEdit.value==0 )
					{
					alert("Please Select From Year");
					frm.selFromYearEdit.focus();
					return false;
					}
					else if(frm.selMonth1Edit.value==0)
					{
					alert(" Please Select To Month");
					frm.selMonth1Edit.focus();
					return false;
					}
					else if(frm.selYear1Edit.value==0 )
					{
					alert("Please Select To Year");
					frm.selYear1Edit.focus();
					return false;
					}
					
		   if(frm.selFromYearEdit.value!='0' && frm.selYear1Edit.value!='0' )
			{
			
			 if(frm.selFromYearEdit.value>frm.selYear1Edit.value){
					alert("From Year Should Less Than To Year");
					
					return false;	
			}     } 
if(frm.txtRoleEdit.value==0 )
					{
					alert("Please Enter Role");
					frm.txtRoleEdit.focus();
					return false;
					}

					
					
		
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
/*.empbg_left
{
	float:left;
	background-image:url(images/resume_buttondleft.png);
	background-repeat:no-repeat;
	width:8px;
	height:30px;
}*/
.empbg_mid
{
	float:left;
	background-image:url(images/resume_buttondmid.png);
	background-repeat:repeat-x;
	width:190px;
	height:30px;
	line-height:30px;
	border-left:1px solid #181818;
	border-right:1px solid #181818;
}
/*.empbg_right
{
	float:left;
	background-image:url(images/resume_buttondright.png);
	background-repeat:no-repeat;
	width:8px;
	height:30px;
}*/
/*.empbg_left:hover
{
	float:left;
	background-image:url(images/resume_buttonoleft.png);
	background-repeat:no-repeat;
	width:8px;
	height:30px;
}*/
.empbg_mid:hover
{
	float:left;
	background-image:url(images/resume_buttonomid.png);
	background-repeat:repeat-x;
	width:190px;
	height:30px;
	line-height:30px;
	border-left:1px solid #181818;
	border-right:1px solid #181818;
}
/*.empbg_right:hover
{
	float:left;
	background-image:url(images/resume_buttonoright.png);
	background-repeat:no-repeat;
	width:8px;
	height:30px;
}*/
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
	    <a href="academic_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Academic Projects </div>
       <div class="nanohdrightdefault"></div>
       </li></a>
	   <li>
       <div class="nanohdleft"></div>
       <div class="nanohdmid"><img src="images/work_experience.png" width="127" height="32" align="absmiddle" border="0" style=" margin-top:8px;" /></div>
       <div class="nanohdright"></div>
       </li>
	   
      
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
<div class="innertab1_mid">Work Experience If Applicable</div>
<div class="innertab1_right"></div>
</div>
<div class="step-sub-tabs" style="float:right;">
<div class="innertab1_left"></div>
<div class="innertab1_mid">Resume Builder:Steps - 4/5 </div>
</div>
<div style="float:left; width:723px; background-image:url(images/innertab_bg.png); background-position:bottom; background-repeat:repeat-x; margin-top:15px;">
<?php /*?><div class="step-sub-tabs">
<div class="innertab1_mid">Employability Factor :<?=emplFactorWork($_SESSION[m_id])?> </div>
<div class="innertab1_right"></div>
</div>
<?php */?>
<!--<div class="step-sub-tabs" style="float:right; padding-right:10px;">
<a href="#?w=700" rel="Empfactor_name" class="poplight"  style="color:#ffffff; font-size:12px; font-weight:normal; text-decoration:none;"><div class="empbg_mid">Total Employability Factor : <?=employabilityFactor($_SESSION[m_id])?></div></a>
</div>-->
<table width="100%"><tr>
     <td width="95">&nbsp;</td>
      <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr></table>
<?   if(count($work_result_query)!=0){

foreach($work_result_query as $work){	?>
<div style=" margin:10px; padding:10px;">
<form name="formwork" id="formwork<?=$work->we_id?>"  action="" method="post" onsubmit="return formworkValidation();">

<table width="99%"  > 
  <input type="hidden" name="hidWorkID" value="<?=$work->we_id?>" />
  

	<tr>
	  <td width="56">&nbsp;</td>
	  <td   class="text" align="left">&nbsp;</td>
	  <td colspan="2"  align="right" style="font-weight:bold;"><a href="work_info.php?action=deleteOne&we_id=<?=$work->we_id?>" onclick="return toDelete();" style=" text-decoration:none;"><span style=" color:#FF0000; font-size:14px; font-family:Trebuchet MS;">Remove</span><img src="images/Delett_small.png" border="0" alt="Delete"  /></a></td>
	  </tr>
	  
	<tr>
    <td>&nbsp;</td>
	  <td height="1"  class="text" align="left">Company:</td>
	   <td  height="" colspan="2"><span class="text">
	     <input type="text" name="txtCompany" id="txtCompany" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=stripslashes($work->we_company);?>" />
	   </span><span style="margin-left:5px" class="error">*</span></td>
	  </tr>  
    <tr>
     <td>&nbsp;</td>
      <td height="1"  class="text" align="left">Designation:</td>
      <td  height="" colspan="2" class="text"><input type="text" name="txtDesignation" id="txtDesignation" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=stripslashes($work->we_designation);?>"/><span style="margin-left:6px" class="error">*</span></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
    <td width="127" height="1"  class="text" align="left">From Date: </td>
    <td  height="" colspan="2" class="text"><span class="error">
	<? $from=explode("-",$work->we_from_date);?>  
      <select name="selFromMonth" id="selFromMonth" style="width:100px;">
        <? for($d=0;$d<count($month_array);$d++){?>
        <option value="<?=$d?>"  <?=$from[0]==$d?'selected':'';?>>
        <?=$month_array[$d]?>
        </option>
        <? }?>
      </select>
      <select name="selFromYear" id="selFromYear" style="width:100px;">
        <option value="0">Year</option>
        <? for($y=date(Y);$y>1970;$y--){?>
        <option value="<?=$y?>" <?=$y==$from[1]?'selected':''?> >
        <?=$y?>
        </option>
		
        <? }?>
      </select>
    </span><span style="margin-left:51px" class="error">*</span></td>
</tr> 
<tr>
 <td>&nbsp;</td>
<? $to1=explode("-",$work->we_to_date);?>
                  <td align="left" width="127"><span class="text">To Date: </td>
                  <td colspan="2" align="left"><select name="seltoMonth" id="seltoMonth" style="width:100px;">
                 	 <option value="13" <?=$to1[0]=='13'?'selected':'';?>>Till date</option>
                    <? for($d1=0;$d1<count($month_array);$d1++){?>
                    <option value="<?=$d1?>"  <?=$to1[0]==$d1?'selected':'';?>>
                      <?=$month_array[$d1]?>
                      </option>
                    <? }?>   
                  </select>
                    <select name="seltoYear" id="seltoYear" style="width:100px;">
                      <option value="0">Year</option>
					  <option value="13" <?=$to1[1]=='13'?'selected':'';?>>Till date</option>
                      <? for($y1=date(Y);$y1>1970;$y1--){?>
                      <option value="<?=$y1?>"   <?=$to1[1]==$y1?'selected':'';?>>
                        <?=$y1?>
                      </option>
                      <? }?>   
                    </select><span style="margin-left:53px" class="error">*</span></td>
                </tr>


<tr>
       <td>&nbsp;</td>
          <td>&nbsp;</td>
           <td width="176"><input type="submit" name="workUpdate" value="" class="button_new" /></td>
           <td width="297"><a href="#?w=700" rel="popup_name" class="poplight" onclick="document.getElementById('CompanyId').value='<?=$work->we_id;?>'"><img src="images/addproject.png" width="107" height="22" border="0" style="margin-right:8px;" /></a></td>
</tr> 





    <tr>
          <td colspan="2"></td>
        </tr>
</table>
</form>




<? 

$acadimic_result=$db->getResults("SELECT * FROM $work_projects_table where m_id='".$_SESSION[m_id]."' and wp_company='".$work->we_id."' ");
  if(count($acadimic_result)!=0){

foreach($acadimic_result as $projects){	?>
<div style="border-bottom:1px #ccc solid; padding:10px 0px; margin-bottom:10px;">
<form name="formAcademic1" id="formAcademic1<?=$projects->wp_id?>"  action="" method="post" onsubmit="return formAcademicUpdate();">
<table width="100%"> 
<tr>
   <td  colspan="4" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px" align="right"><a href="work_info.php?action=deleteProjectOne&wp_id=<?=$projects->wp_id?>" onclick="return toDelete();" style=" text-decoration:none;"><span style=" color:#FF0000; font-size:14px; font-family:Trebuchet MS;">Remove</span><img src="images/Delett_small.png" border="0" alt="Delete"  /></a></td>
 </tr>	   
	<tr>
	  <td width="55"  class="text" align="left">&nbsp;</td>
    <td width="302" height="1"  class="text" align="left">Title :<span class="error">*</span></td>
     <td width="302" height="1"  class="text" align="left">Duration of project in months  :<span class="error">*</span></td>
   
	<!--<td colspan="2"><span class="text"> Company :<span class="error">*</span></span></td>-->
</tr> 
 <tr>
   <td>&nbsp;</td>
    
    <td  height=""><input type="text" name="txtTitleEdit" id="txtTitleEdit" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" value="<?=stripslashes($projects->wp_title);?>" /></td>
     <td  height="" width="302"> <input type="text" name="txtDuration"  id="txtDuration" value="<?=$projects->wp_duration?>" maxlength="3"  style="width:35px;" />
	<?php /*?><? $from=explode('-',$projects->wp_from_date);
	?>
	  <select name="selFromEdit" id="selFromEdit">
	  <option value="0">Month</option> wp_duration= '".$ch->checkFields($_POST['txtDuration'])."', 
        <? for($d=1;$d<count($month_array);$d++){?>
        <option value="<?=$d?>" <?=$from[0]==$d?'selected':'';?> >
          <?=$month_array[$d]?>
          </option>
        <? }?>
      </select>
      <select name="selFromYearEdit" id="selFromYearEdit">
        <option value="0">Year</option>
        <? for($f=date(Y);$f>=1940;$f--){?>
        <option value="<?=$f?>" <?=$from[1]==$f?'selected':'';?> >
          <?=$f?>
          </option>
        <? }?>
      </select>
&nbsp;to
<? $to=explode('-',$projects->wp_to_date); 	
	?>
<select name="selMonth1Edit" id="selMonth1Edit">
<option value="0">Month</option>
  <? for($dt=1;$dt<count($month_array);$dt++){?>
  <option value="<?=$dt?>"  <?=$dt==$to[0]?'selected':''?>>
  <?=$month_array[$dt]?>
  </option>
  <? }?>
</select>
<select name="selYear1Edit" id="selYear1Edit">
  <option value="0">Year</option>
  <? for($t=date(Y);$t>=1940;$t--){?>
  <option value="<?=$t?>" <?=$t==$to[1]?'selected':''?> >
  <?=$t?>
  </option>
  <? }?>
</select><?php */?></td>
	
<?php /*?>	<td  height="" colspan="2">
	<select name="txtCompanyEdit" style="width:200px;"><option value="0">Select</option><? foreach($work_result_query as $work_result_more1){?><option value="<?=$work_result_more1->we_id?>" <?=$work_result_more1->we_id==$projects->wp_company?'selected':'';?>><?=$work_result_more1->we_company?><td width="18"></option><? }?><td width="10"><td width="12">
	<input type="text" name="txtCompanyEdit" id="txtCompanyEdit" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  /><?php */?>
 </tr>
   
<?php /*?><tr>
  <td width="55">&nbsp;</td>
    <td  height="" width="302"> 
	<? $from=explode('-',$projects->wp_from_date);
	?>
	  <select name="selFromEdit" id="selFromEdit">
	  <option value="0">Month</option>
        <? for($d=1;$d<count($month_array);$d++){?>
        <option value="<?=$d?>" <?=$from[0]==$d?'selected':'';?> >
          <?=$month_array[$d]?>
          </option>
        <? }?>
      </select>
      <select name="selFromYearEdit" id="selFromYearEdit">
        <option value="0">Year</option>
        <? for($f=date(Y);$f>=1940;$f--){?>
        <option value="<?=$f?>" <?=$from[1]==$f?'selected':'';?> >
          <?=$f?>
          </option>
        <? }?>
      </select>
&nbsp;
<? $to=explode('-',$projects->wp_to_date); 	
	?>
<select name="selMonth1Edit" id="selMonth1Edit">
<option value="0">Month</option>
  <? for($dt=1;$dt<count($month_array);$dt++){?>
  <option value="<?=$dt?>"  <?=$dt==$to[0]?'selected':''?>>
  <?=$month_array[$dt]?>
  </option>
  <? }?>
</select>
<select name="selYear1Edit" id="selYear1Edit">
  <option value="0">Year</option>
  <? for($t=date(Y);$t>=1940;$t--){?>
  <option value="<?=$t?>" <?=$t==$to[1]?'selected':''?> >
  <?=$t?>
  </option>
  <? }?>
</select></td>
    <td width="135"><select id="selEndEdit" name="selEndEdit" class="textbox" onchange="showCelebType1(this.value,<?=$projects->wp_id?>)">
   
      <option  value="VLSI" <?=$projects->wp_project_type=='VLSI'?'selected':''?>>VLSI Project</option>
      <option value="EMBEDED" <?=$projects->wp_project_type=='EMBEDED'?'selected':''?>>Embeded Project</option>
      <option value="-1" <?=$projects->wp_project_type=='-1'?'selected':''?>>Other</option>
    </select>      </td>
    <td width="211"><div id="OtherCelebTypes<?=$projects->wp_id?>" <? if($projects->wp_project_type=='-1') echo 'style="display:block;"'; else echo 'style="display:none;"'; ?>><input type="text" name="txtOtherproject"         id="txtOtherproject" value="<?=$projects->wp_other_tech?>" maxlength="200" /></div> 
	<div id="OtherVLSITypes<?=$projects->wp_id?>" <? 
	if($projects->wp_project_type!='VLSI') 
	echo 'style="display:none;"';
	else echo 'style="display:block;"'; ?>>
    <select name="selVLSIType" id="selVLSIType" style="width:100px;">
    <option value="1" <?=$projects->wp_vlsitype=='1'?'selected':''?>>Front End</option>
    <option value="2" <?=$projects->wp_vlsitype=='2'?'selected':''?>>Back End</option>
    </select></div>	</td>
</tr><?php */?>	
 
 
 
	<tr>
	  <td width="55"  class="text" align="left">&nbsp;</td>
    <td width="302" height="1"  class="text" align="left">Role :<span class="error">*</span></td>
    <td height="1" colspan="2" align="left"  class="text">Team Size :</td>
</tr> 
    <tr>
      <td width="55">&nbsp;</td>
    <td  height="" width="302"><input type="text" name="txtRoleEdit" id="txtRoleEdit" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  value="<?=$projects->wp_role?>" /></td>
    <td  height="" colspan="2">
	<select name="selSizeEdit" id="selSizeEdit">
	<? for($t=1;$t<=10;$t++){?><option value="<?=$t?>"  <?=$projects->wp_team_size==$t?'selected':''?>><?=$t?></option><? }?>
	<option value="10+" >10+</option></select>	</td>
</tr>      
 <tr>
   <td width="55"  class="text" align="left" valign="top">&nbsp;</td>
    <td width="302" height="1"  class="text" align="left" valign="top">Project Description :</td>
     <td height="1" colspan="2" align="left" valign="top"  class="text">Tools Used : </td>
</tr>    
 <tr>
   <td >&nbsp;</td>
   <td  height="23" >
<textarea rows="2" style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" cols="48" name="areaDescriptionEdit" id="areaDescription"><?=stripslashes($projects->wp_description);?></textarea></td>
    <td  height="23" colspan="2" >
<textarea  rows="2" style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" cols="48" name="areaToolsEdit" id="areaTools"><?=stripslashes($projects->wp_tools);?></textarea></td> 
</tr>
 <tr>
   <td width="55"  class="text" align="left" valign="top">&nbsp;</td>
    <td width="302" height="1"  class="text" align="left" valign="top">Deliverable/Challenges Faced:</td>
	<td colspan="2">&nbsp;</td>
	</tr>
     <tr>
       <td >&nbsp;</td>
    <td  height="23" ><input type="hidden" name="hidProjID" value="<?=stripslashes($projects->wp_id);?>" />
<textarea name="areaChallengesEdit" rows="2" style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"  id="areaChallenges"><?=stripslashes($projects->wp_challenges);?></textarea> </td> <td colspan="2">&nbsp;</td>
</tr>
<input type="hidden" name="hidProjID" value="<?=stripslashes($projects->wp_id);?>" />
<input type="hidden" name="hidCompnyID" value="<?=stripslashes($projects->wp_company);?>" />
<tr>
    
    <td  height="19">&nbsp;</td>
    <td  height="19" colspan="2"><input type="submit" name="projUpdateEdit" value="" class="button_new" /><span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;">Save this section before filling up next.</span></td>
    </tr>
</table>
</form>
</div>

<? }}?>




</div>
<? }?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"  class="addnewbg"><a href="#?w=600" rel="work_info" class="poplight"><img src="images/addnewbg.png" width="83" height="22" border="0" /></a></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
</table>
  <? }else{?>

<form name="formProject" id="formProject"  action="" method="post" onsubmit="return formProjectValidation();">
<table width="99%"> 
  
  

	<tr>
    <td>&nbsp;</td>
	  <td height="1"  class="text" align="left">Company:</td>
	   <td  height=""><span class="text">
	     <input type="text" name="txtCompany" id="txtCompany" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" />
	   </span><span style="margin-left:5px" class="error">*</span></td>
	  </tr>  
    <tr>
    <td>&nbsp;</td>
      <td height="1"  class="text" align="left">Designation:</td>
      <td  height="" class="text"><input type="text" name="txtDesignation" id="txtDesignation" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" /><span style="margin-left:5px" class="error">*</span></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td width="110" height="1"  class="text" align="left">From Date:</td>
    <td  height="" width="452" class="text"><span class="error">
      <select name="selFromMonth1" id="selFromMonth1" style="width:100px;">
    
        <? for($d=0;$d<count($month_array);$d++){?>
        <option value="<?=$d?>" >
        <?=$month_array[$d]?>
        </option>
        <? }?>
      </select>
      <select name="selFromYear1" id="selFromYear1" style="width:100px;">
        <option value="0">Year</option>
        <? for($y=date(Y);$y>1970;$y--){?>
        <option value="<?=$y?>" <?=$y==$fromdate[1]?'selected':''?>>
        <?=$y?>
        </option>

		
        <? }?>
		
      </select>
    </span><span style="margin-left:51px" class="error">*</span></td>
</tr> 
<tr>
<td>&nbsp;</td>
                  <td align="left" width="110"><span class="text">To Date:</td>
                  <td align="left"><select name="seltoMonth1" id="seltoMonth1" style="width:100px;">
                   
					<option value="13">Till date</option>
                    <? for($d1=0;$d1<count($month_array);$d1++){?>
                    <option value="<?=$d1?>" >
                      <?=$month_array[$d1]?>
                      </option>
                    <? }?> 
                  </select>
                    <select name="seltoYear1" id="seltoYear1" style="width:100px;">
                      <option value="0">Year</option>
					  <option value="13">Till date</option>
                      <? for($y1=date(Y);$y1>1970;$y1--){?>
                      <option value="<?=$y1?>" >
                        <?=$y1?>
                      </option>
                      <? }?> 
                    </select><span style="margin-left:51px" class="error">*</span></td>
                </tr>


<tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="workSubmit" value="" class="button_new" /><input type="reset" name="reset" value="" class="resetbutton" /></td>
</tr> 
    <tr>
          <td colspan="2"></td>
        </tr>
</table>
</form>

<? }?>

<table width="98%" style="float:left;">
<tr align="right"> 

 
    
   
    <td  align="right" ><?php /*?><a href="career_info.php" ><img src="images/continue.png" border="0" /></a><?php */?></td> 
   </tr>
   </table>


		</div>
</div>
</div>
</div>
</div><!--end of right_maincontent-->
<!--Start of Emp factor content-->
<div id="Empfactor_name" class="popup_block">
<span style="font-size:16px; font-weight:bold;">Employability Factor</span>
 <p><strong>Employability Factor </strong> refers to a person’s capability of gaining initial employment or finding new employment in the industry of his interests. It’s a good reflection of a job seeker’s educational background, and is enhanced by his domain experience and hands on skills acquired in the relevant Industry. </p><p>
The Nanochip resume builder has been integrated with an intelligent calculator of Employability Factor that best reflects your changes of being selected by Semiconductor companies for interviews and eventually being absorbed by them. An employability factor above 70 gives you a high probability of being absorbed into the VLSI and Embedded Industry. 

        </p>
</div>
<!--End of Emp factor content-->
<div id="popup_name" class="popup_block">
 <form name="formAcademic" id="formAcademic"  action="" method="post" onSubmit="return formAcademicValidation();">
 <?   if(count($work_result_query)!=0){

foreach($work_result_query as $work){	?>
<input type="hidden" name="hidWeID" value="<?=$work->we_id?>" />
<? } }?>


<table width="100%"> 
<tr>
   <td  colspan="2" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px">Projects</td> 
   <td  colspan="2" ><span class="error">* Indicates Required field</span></td>
  </tr>	   
	<tr>
	  <td width="5"  class="text" align="left">&nbsp;</td>
    <td width="345" height="1"  class="text" align="left">Project Title :<span class="error">*</span></td>
   <td width="345" height="1"  class="text" align="left">Duration of project in months :<span class="error">*</span></td>
	<!--<td colspan="2"><span class="text">Company :<span class="error">*</span></span></td>-->
</tr> 
 <tr>
   <td>&nbsp;</td>
    
    <td  height="">
    <input type="hidden" name="CompanyId" id="CompanyId" value="<?=$_REQUEST[wid]?>" />
    <input type="text" name="txtTitle" id="txtTitle"  style="width:250px;" /></td>
    
	<td  height="" width="500">  <input type="text" name="txtDuration"  id="txtDuration" value="" maxlength="3"  style="width:35px;" />
	<?php /*?>  <select name="selFrom" id="selFrom">
	  <option value="0">Month</option>
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
&nbsp;to
<select name="selMonth1" id="selMonth1">
<option value="0">Month</option>
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
<?php /*?>	<td  height="" colspan="2"><select name="txtCompany" style="width:200px;"><option value="0">Select</option><? foreach($work_result_query as $work_result_more){?><option value="<?=$work_result_more->we_id?>"><?=$work_result_more->we_company?></option><? }?></select></td><input type="text" name="txtCompany" id="txtCompany"style="width:250px;" /><?php */?>
 </tr>
   
	<?php /*?>	<tr>
		  <td width="5"  class="text" align="left">&nbsp;</td>
    <td width="345" height="1"  class="text" align="left">Duration :</td>
    
    <td height="15" colspan="2" align="left"  class="text">Worked On : <span class="error">*</span></td><?php */?>
<?php /*?></tr>  
<tr>
  <td width="5">&nbsp;</td>
    <td  height="" width="345"> 
	  <select name="selFrom" id="selFrom">
	  <option value="0">Month</option>
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
<option value="0">Month</option>
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
</select></td>
    <td width="135"><select id="selEnd" name="selEnd" class="textbox" onChange="showCelebType2(this.value)">
    
      <option  value="VLSI" >VLSI Project</option>
      <option value="EMBEDED" >Embeded Project</option>
      <option value="-1" >Other</option>
    </select>      </td>
    <td width="101"><div id="OtherCelebTypes2" style="display:none;" ><input type="text" name="txtOtherproject"  id="txtOtherproject" value="<?=$projects->p_other_tech?>" maxlength="200" /></div> 
	<div id="OtherVLSITypes2"><select name="selVLSIType" id="selVLSIType" style="width:100px;"><option value="1" <?=$projects->p_vlsitype=='1'?'selected':''?>>Front End</option><option value="2" >Back End</option></select></div>	</td>
</tr>	
 
  <?php */?>
 
	<tr>
	  <td width="5"  class="text" align="left">&nbsp;</td>
    <td width="345" height="1"  class="text" align="left">Role :<span class="error">*</span></td>
    <td height="1" colspan="2" align="left"  class="text">Team Size :</td>
</tr> 
    <tr>
      <td width="5">&nbsp;</td>
    <td  height="" width="345"><input type="text" name="txtRole" id="txtRole" style="width:250px;"  /></td>
    <td  height="" colspan="2"><select name="selSize" id="selSize">
	<? for($t=1;$t<=10;$t++){?><option value="<?=$t?>"  <?=$projects->p_teamsize==$t?'selected':''?>><?=$t?></option><? }?>
	<option value="10+" >10+</option></select></td>
</tr>     
 <tr>
   <td width="5"  class="text" align="left" valign="top">&nbsp;</td>
    <td width="345" height="1"  class="text" align="left" valign="top">Project Description :</td>
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
   <td width="5"  class="text" align="left" valign="top">&nbsp;</td>
    <td width="345" height="1"  class="text" align="left" valign="top">Deliverable/Challenges Faced:</td>
	<td colspan="2">&nbsp;</td>
	</tr>
     <tr>
       <td >&nbsp;</td>
    <td  height="23" >
<textarea name="areaChallenges" rows="2"   style="width:250px;"  id="areaChallenges"></textarea> </td> <td colspan="2">&nbsp;</td>
</tr>

<tr>
    
    <td  height="19">&nbsp;</td>
    <td  height="19"><input type="submit" name="workProjectSubmit" value="" class="button_new" /><input type="Reset" name="Reset" value="" class="resetbutton" /></td>
    <td  height="19">&nbsp;</td>
    <td  height="19">&nbsp;</td>
    <td width="621"  height="19">&nbsp;</td>
</tr>
</table>



</form>
</div>
<div id="work_info" class="popup_block">
 <form name="formProjectmore" id="formProjectmore"  action="" method="post" onsubmit="return workinfomoreValidation();">
<table width="99%"> 
  
  
<tr>
     <td width="95">&nbsp;</td>
     <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>
	<tr>
    <td>&nbsp;</td>
	  <td height="1"  class="text" align="left">Company:</td>
	   <td  height=""> <span class="text">
	     <input type="text" name="txtCompanymore" id="txtCompanymore" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" />
	   </span><span style="margin-left:4px" class="error">*</span></td>
	  </tr>  
    <tr>
    <td>&nbsp;</td>
      <td height="1"  class="text" align="left">Designation:</td>
      <td  height="" class="text"><input type="text" name="txtDesignationmore" id="txtDesignation" style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;" /><span style="margin-left:7px" class="error">*</span></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td width="110" height="1"  class="text" align="left">From Date:</td>
    <td  height="" width="452" class="text"><span class="error">
      <select name="selFromMonth1more" id="selFromMonth1more" style="width:100px;">
        <? for($d=0;$d<count($month_array);$d++){?>
        <option value="<?=$d?>" >
        <?=$month_array[$d]?>
        </option>
        <? }?>
      </select>
      <select name="selFromYear1more" id="selFromYear1more" style="width:100px;">
        <option value="0">Year</option>
        <? for($y=date(Y);$y>1970;$y--){?>
        <option value="<?=$y?>" <?=$y==$fromdate[1]?'selected':''?>>
        <?=$y?>
        </option>

		
        <? }?>
		
      </select>
    </span><span style="margin-left:51px" class="error">*</span></td>
</tr> 
<tr>
<td>&nbsp;</td>
                  <td align="left" width="110"><span class="text">To Date: </span></td>
                  <td align="left"><select name="seltoMonth1more" id="seltoMonth1more" style="width:100px;">
					<option value="13">Till date</option>
                    <? for($d1=0;$d1<count($month_array);$d1++){?>
                    <option value="<?=$d1?>" >
                      <?=$month_array[$d1]?>
                      </option>
                    <? }?> 
                  </select>
                    <select name="seltoYear1more" id="seltoYear1more" style="width:100px;">
                      <option value="0">Year</option>
					  <option value="13">Till date</option>
                      <? for($y1=date(Y);$y1>1970;$y1--){?>
                      <option value="<?=$y1?>" >
                        <?=$y1?>
                      </option>
                      <? }?> 
                    </select><span style="margin-left:54px" class="error">*</span></td>
                </tr>


<tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="workSubmitmore" value="" class="button_new" /><input type="reset" name="reset" value="" class="resetbutton" /></td>
</tr> 
    <tr>
          <td colspan="2"></td>
        </tr>
</table>
</form>
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
});</script>
<?php include "stmenuleft_content.php"; ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>