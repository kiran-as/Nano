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
	

/* Function to retrive all the company details*/		
	$resultsss = "SELECT * FROM rv_work_experience where m_id='".$_SESSION[m_id]."'";
	//print_r($resultsss);
	$resultc = mysql_query($resultsss);
	
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$s]['we_designation']	= $row["we_designation"];
		  $arraStudent[$s]['we_id']	= $row["we_id"];
		   $arraStudent[$s]['we_from_date']	= $row["we_from_date"];
		  $arraStudent[$s]['we_to_date']	= $row["we_to_date"];
		   $arraStudent[$s]['we_company']	= $row["we_company"];

		  $s++;  
		}
	/*end of function*/	
	
/* Function to retrive all the company details*/		
	$resultworkprojects = "SELECT * FROM rv_work_projects where m_id='".$_SESSION[m_id]."'";
	$resultprojects = mysql_query($resultworkprojects);
	
	$k=0;
	while ($row = mysql_fetch_assoc($resultprojects)) {
	      
		  $workproject[$k]['we_id']	= $row["we_id"];
		  $workproject[$k]['wp_id']	= $row["wp_id"];
		   $workproject[$k]['wp_title']	= $row["wp_title"];
		  $workproject[$k]['wp_tools']	= $row["wp_tools"];
		   $workproject[$k]['wp_role']	= $row["wp_role"];
		   $workproject[$k]['wp_duration']	= $row["wp_duration"];
		   $workproject[$k]['wp_team_size']	= $row["wp_team_size"];
		   
		   
		  
		  $k++;  
		}
	/*end of function*/	
	
	
		
		

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
	<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />
		
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


function deletecompanyinfo(idcompany)
{
   var deletess = confirm("Do you really want to delete");
   if(deletess == true)
   {
        
	 window.location = "http://nanochipsolutions.com/delete_company_info.php?p_id="+idcompany;
   }
 
}

function deletecompanyprojects(idprojects)
{
   var deletess = confirm("Do you really want to delete");
   if(deletess == true)
   {
        
	 window.location = "http://nanochipsolutions.com/delete_companyprojects_info.php?p_id="+idprojects;
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
<?php include("includes/2_jobseekerheader.php"); ?>
<!--end of main_banner-->

<div class="main_content">
<ul id="menu">
   <li><a href="1_personal_info.php" title="Personal Information">Personal Information</a></li>
   <li><a href="1_educations_info.php" title="Academic Qualification">Academic Qualification</a></li>

      <li><a href="1_academic_info.php" title="Academic Projects">Academic Projects</a></li>
	     <li><a href="2_work_info.php" title="Work Experience"      class="current">Work Experience</a></li>
		    <li><a href="1_career_info.php" title="Career Details">Career Details</a></li>
   
</ul>

<div class="ContentDiv" >
<div class="navContainer"></div>

<table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding:10px;">
                <tr><td>
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                <td width="100%"></td>
                <td align="right" nowrap="nowrap" style="padding-right:10px;">
<a href="add_company_info.php" rel="lyteframe" 
   				rev="width: 850px; height:400px; scrolling:no" class="blueButton">Add Company</a>
   				<a href="1_career_info.php" class="blueButton">Continue</a>
   				</td></tr></table> 
                
     </td></tr>
     <tr><td><img src="images/pixel_transparent.gif" width="1" height="10" /></td></tr>
     <tr><td>           
                
<table border="0" cellspacing="1" cellpadding="2" class="gridborder" width="100%">
  
<?php
for($s=0;$s<count($arraStudent);$s++){
?>

<tr class="gridheader">

<td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td align="left" width="100%"><a href="edit_company_info.php?idStud=<?php echo $arraStudent[$s]['we_id']?>" rel="lyteframe" 
   				rev="width: 850px; height: 400px; scrolling:no"><?php echo $arraStudent[$s]['we_company'];?></a></td><td align="right" nowrap="nowrap"><a href="add_workprojects.php?wpid=<?php echo $arraStudent[$s]['we_id']?>" rel="lyteframe" 
   				rev="width: 850px; height: 500px; scrolling:no" class="addprojects">Add Project</a>
   				<!--<a href="delete_company_info.php?p_id=<?php //echo $arraStudent[$s]['we_id']?>" style=" text-decoration:none;"><img src="images/icon_delete.png" border="0" alt="Delete" align="absmiddle"/></a>-->
				<a onclick='deletecompanyinfo(<?php echo $arraStudent[$s]['we_id']?>)' style=" text-decoration:none;"><img src="images/icon_delete.png" border="0" alt="Delete" align="absmiddle"/></a>
				</td></tr></table></td>



				





</tr>

<tr>
<td class="workdetails" valign="top" width="20%"><b>Designation</b> <br/><?php echo $arraStudent[$s]['we_designation']?></td>

<td  style="padding:5px;" width="80%">

<table  width="100%" border="0" cellpadding="1" cellspacing="1">
				<tr class="gridheader">
						<th width="50%" align="left">Title</th>
						<th width="50%" align="left">Role</th>
						<th nowrap="nowrap">Duration</th>
						<th nowrap="nowrap">Team Size</th>
						<th nowrap="nowrap"></th>
				</tr>	


<?php 








				for($k=0;$k<count($workproject);$k++){
			  if($arraStudent[$s]['we_id'] == $workproject[$k]['we_id'])
				  {	
			$row_color = ($k % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
				?>
	
			
				
				

				<tr class="<?php echo $row_color?>">
				   
					<td><a href="edit_workprojects_info.php?idStud=<?php echo $workproject[$k]['wp_id']?>" rel="lyteframe" 
									rev="width: 850px; height: 500px; scrolling:no"><?php echo $workproject[$k]['wp_title'];?></a></td>
									<td><?php echo $workproject[$k]['wp_role']?></td>
									<td><?php echo $workproject[$k]['wp_duration']?></td>
									<td><?php echo $workproject[$k]['wp_team_size']?></td>
									<td width="5px">
									
									<!--<a href="delete_companyprojects_info.php?p_id=<?php //echo $workproject[$k]['wp_id']?>" style=" text-decoration:none;"><img src="images/icon_delete.png" border="0" alt="Delete"/></a>-->
									<a onclick='deletecompanyprojects(<?php echo $workproject[$k]['wp_id']?>);' style=" text-decoration:none;"><img src="images/icon_delete.png" border="0" alt="Delete"/>
									</td>	</tr>
									
			
				
				<?php
				}
				}
				?>
	
				</table>
 </td>
</tr>

<?php
}
?>
</table>
<div align="right">

</div>
</td></tr>
     <tr><td><img src="images/pixel_transparent.gif" width="1" height="10" /></td></tr>


</table>
</div><!--end of main_content-->

<?php include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>