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


if($_SESSION['check']==1)
{
	$_SESSION['check'] = 0;
	header("Location:1_academic_info.php?flag=1");exit;  
//echo "<meta http-equiv='refresh' content='0';URL='http://nanochipsolutions.com/1_academic_info.php'>"; 

   
}
		
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

function deleteacademicinfo(iddelete)
{
  var deletess = confirm("Do you really want to delete");
  if(deletess == true)
  {
        
	 window.location = "http://nanochipsolutions.com/delete_academic_info.php?p_id="+iddelete;
   }
  
}
</script>

</head>

<body>
<div class="main_div">
<?php include("includes/2_jobseekerheader.php"); ?>
<!--end of main_banner-->
<div class="main_content">
<ul id="menu">
   <li><a href="1_personal_info.php" title="Personal Information">Personal Information</a></li>
   <li><a href="1_educations_info.php" title="Academic Qualification">Academic Qualification</a></li>

      <li><a href="1_academic_info.php" title="Academic Projects"      class="current">Academic Projects</a></li>
	     <li><a href="2_work_info.php" title="Work Experience">Work Experience</a></li>
		    <li><a href="1_career_info.php" title="Career Details">Career Details</a></li>
   
</ul>


<div class="ContentDiv" >
<div class="navContainer"></div>
<!--<a href="add_academic_info.php" rel="lyteframe" 
   				rev="width: 850px; height:450px; scrolling:no">Add Project</a> -->
                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding:10px;">
                <tr><td>
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                <td width="100%"></td><td align="right" nowrap="nowrap" style="padding-right:10px;">

                
                <a href="2_add_academic_info.php" rel="lyteframe" 
   				rev="width: 850px; height:600px; scrolling:no" class="blueButton">Add Projects</a>
                
<a href="2_work_info.php" class="blueButton">Continue</a>

                </td></tr></table> 
                
     </td></tr>
     <tr><td><img src="images/pixel_transparent.gif" width="1" height="10" /></td></tr>
     <tr><td>           
                
<?php
  if(count($arraStudent) ==0){
	 echo '<tr  class="text10"><td colspan="5" align="right"><strong>Please include your projects by clicking Add Projects button above </strong></td></tr>';
	 
	 }
	 else
	 {
	 
 echo '<table border="0" cellspacing="1" cellpadding="2" class="gridborder" width="100%" id="gridtable"><tr class="gridheader"><td width="25%" nowrap="nowrap">Company/Institute/College</td><td width="25%">Title</td><td width="25%">Role</td><td width="25%">Description</td><td>&nbsp;</td></tr>';
		
}

for($s=0;$s<count($arraStudent);$s++){
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
?>

<tr class="<?php echo $row_color?>">
<td align="left"><a href="1_edit_academic_info.php?idStud=<?php echo $arraStudent[$s]['p_id']?>" rel="lyteframe" 
   				rev="width: 850px; height: 600px; scrolling:no"><?php echo $arraStudent[$s]['p_company'];?></a></td>
<td><?php echo $arraStudent[$s]['p_title']?></td>
<td><?php echo $arraStudent[$s]['p_role']?></td>
<td><?php echo $arraStudent[$s]['p_description']?></td>
<!--<td width="10px"><a href="delete_academic_info.php?p_id=<?php echo $arraStudent[$s]['p_id']?>" onclick="deleteacademicinfo(<?php echo $arraStudent[$s]['p_id']?>)"><img src="images/icon_delete.png" border="0" alt="Delete"/></a></td>-->
<td width="10px"><a  onclick="deleteacademicinfo(<?php echo $arraStudent[$s]['p_id']?>)"><img src="images/icon_delete.png" border="0" alt="Delete"/></a></td>

</tr>
<?php
}
?>
</table>

</td></tr>
     <tr><td><img src="images/pixel_transparent.gif" width="1" height="10" /></td></tr>


</table>
</div><!--end of main_content-->


<?php include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>