<?php 
 include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
 $saveddetails = 0;
		  $rid = $_SESSION['r_id'];
		  $companyname = $_SESSION["r_company"];
     ////function for displaying all hte coursess//////	
		$resultcourse= "SELECT *  FROM  `rv_course` WHERE  `cor_status` =1";
		$resultcourses= mysql_query($resultcourse);
		$c=0;
		   while ($row = mysql_fetch_assoc($resultcourses)) {
	    			  $arrcourse[$c]["cor_id"]	= $row["cor_id"];
			          $arrcourse[$c]["cor_name"]	= $row["cor_name"];
			 
			$c++;
		 }
		 
		 
		 		$queryrecruiter = "SELECT * FROM rv_recruiters where r_id=".$idrecruiter;

	$resultrecruiter = mysql_query($queryrecruiter);
	while ($rows = mysql_fetch_assoc($resultrecruiter)) {
		$recruitername	= $rows["r_user_name"];
		$compname= $rows["r_company"];
 
		}

		/////////end of the function///////////////////////
		
		 		////function for displaying all the branches//////	
		$resultbranch= "SELECT * 
FROM  `rv_branch` 
WHERE cor_id
IN ( 1,2, 21 ) 
AND  `branch_status` =1
GROUP BY branch_name";
		$resultbranches= mysql_query($resultbranch);
		$c=0;
		   while ($row = mysql_fetch_assoc($resultbranches)) {
	    			  $arrbranch[$c]["branch_id"]	= $row["branch_id"];
			          $arrbranch[$c]["branch_name"]	= $row["branch_name"];
			 
			$c++;
		 }
	
		 
		 if($_POST)
		 {
   /* echo "<pre/>";
	print_R($_POST);
	die();*/
		    $course = 0;
			for($crs=0;$crs<count($_POST['selectcourse']);$crs++)
					{
						$course = $course.','.$_POST['selectcourse'][$crs];
					}
					
			$branch=0;	
			for($brn=0;$brn<count($_POST['selectbranch']);$brn++)
					{
						$branch = $branch.','.$_POST['selectbranch'][$brn];
					}
			$fresher=0;	$exp=0;	
			if($_POST['select3'][0]=='1')
			{
			$fresher=1;	
			}
			 if($_POST['select3'][0]=='2')
			{
			 $exp=2;
			}
			 if($_POST['select3'][1]=='2')
			{
			 $exp=2;
			}
			
			
			
			
						//$fresher = $freshers.','.$exp;
					

			$domainknowledge=0;	
			for($d=0;$d<count($_POST['select4']);$d++)
					{
						$domainknowledge = $domainknowledge.','.$_POST['select4'][$d];
					}					
			
			$embedded=0;	
			for($e=0;$e<count($_POST['selectembedded']);$e++)
					{
						$embedded = $embedded.','.$_POST['selectembedded'][$e];
					}	
					
					
			$duration=$_POST['select5'];
			/*for($i=0;$i<count($_POST['select5']);$i++)
					{
						$duration = $duration.','.$_POST['select5'][$i];
					}
					*/
			
			  $checkbox6=$_POST['checkbox6'];
			
			
			  $checkbox7=$_POST['checkbox7'];
			
			$checkbox8=0;
			if($_POST['checkbox8']=='on')
			{
			  $checkbox8=1;
			}
			
			
		
			  $checkbox10=$_POST['checkbox10'];
			
			
			
			  $checkbox11=$_POST['checkbox11'];
			
			
			
			  $checkbox12=$_POST['checkbox12'];
			$checkbox9=$_POST['checkbox9'];
			
			$contactperson = $_POST['textfield'];
			$designation = $_POST['textfield2'];
			$phone = $_POST['textfield3'];
			$mobile = $_POST['textfield4'];
			$email = $_POST['textfield5'];
			$jobtitle = $_POST['textfield6'];
			$jobdescription = $_POST['textfield7'];
			$sslc = $_POST['textfield8'];
			$puc = $_POST['textfield9'];
			$degree = $_POST['textfield10'];
			$postgraduation = $_POST['textfield11'];
			$quaterly = $_POST['textfield12'];
			$annualy = $_POST['textfield13'];
			$specifyother = $_POST['textfield14'];
			$skill = $_POST['textfield15'];
			$jp_suggested_read = $_POST['textfield16'];
			$venue = $_POST['textfield17'];
			$textfieldcurrently = $_POST['textfieldcurrently'];
			$bonddetails = $_POST['aggrementbondyear'];
			$otherembedded = $_POST['textfieldembother'];
			$writtenapptitude = $_POST['writtenapptitude'];
			$writtentechnical = $_POST['writtentechnical'];
			$technicalinterview = $_POST['technicalinterview'];
			$generalhrinterview = $_POST['generalhrinterview'];
			$probationperiod = $_POST['probationperiod'];
			$regularemp = $_POST['regularemp'];
			
			$jp_created_date = mktime();
			$Insert	=	mysql_query('INSERT INTO rv_job_posting(r_id,
															jp_company,
															jp_address,
															jp_name,
															jp_designation,
															jp_telephone,
															jp_mobile,
															jp_email,
															jp_description,
															jp_job_title,
															jp_be,
															jp_me,
															jp_branch,
															jp_sslc,
															jp_sslc_cutoff,
															jp_puc,
															jp_puc_cutoff,
															jp_degree,
															jp_degree_cutoff,
															jp_pg,
															jp_pg_cutoff,
															jp_backlogs,
															jp_backlogs_year,
															jp_hire_freshers,
															jp_hire_experienc,
															jp_candidates_quarterly,
															jp_candidates_annualy,
															jp_domain,
															jp_other_domain,
															jp_written_apptitude,
															jp_written_technical,
															jp_technical,
															jp_hr,
															jp_written_general,
															jp_written_apptitude_marks,
															jp_written_technical_marks,
															jp_technical_marks,
															jp_hr_marks,															
															jp_written_contents_marks,
															jp_skills,
															jp_suggested_read,
															jp_venue,
															jp_our_campus,
															jp_intership,
															jp_intership_duration,
															jp_intership_placement,
															jp_regular_positions,
															jp_agreement,
															jp_created_date,
															jp_modified_date,
															st_ids,
															jp_expdate,
															jp_alert_mail,
															textfieldcurrently,
															embedded,
															otherembedded,
															jp_bonddetails,
															writtenapptitude,
															writtentechnical,
															technicalinterview,
															generalhrinterview,
															probationperiod,
															regularemp,jp_course)
VALUES ("'.$rid.'",
		"'.$companyname.'",
		"'.$address.'",
		"'.$contactperson.'",
		"'.$designation.'",
		"'.$phone.'",
		"'.$mobile.'",
		"'.$email.'",
		"'.$jobdescription.'",
		"'.$jobtitle.'",
		"'.$jp_be.'",
		"'.$jp_me.'",
		"'.$branch.'",
		"'.$sslcm.'",
		"'.$sslc.'",
		"'.$pucm.'",
		"'.$puc.'",
		"'.$degreem.'",
		"'.$degree.'",
		"'.$postgraduationm.'",
		"'.$postgraduation.'",
		"'.$checkbox6.'",
		"'.$checkbox7.'",
		"'.$fresher.'",
		"'.$exp.'",
		"'.$quaterly.'",
		"'.$annualy.'",
		"'.$domainknowledge.'",
		"'.$specifyother.'",
		"'.$jp_written_apptitude.'",
		"'.$jp_written_technical.'",
		"'.$jp_technical.'",
		"'.$jp_hr.'",
		"'.$jp_written_general.'",
		"'.$jp_written_apptitude_marks.'",
		"'.$jp_written_technical_marks.'",
		"'.$jp_technical_marks.'",
		"'.$jp_hr_marks.'",
"'.$jp_written_contents_marks.'",
		"'.$skill.'",
"'.$jp_suggested_read.'",
		"'.$venue.'",
		"'.$checkbox8.'",
		"'.$checkbox9.'",
		"'.$duration.'",
		"'.$checkbox12.'",
		"'.$checkbox11.'",
		"'.$checkbox10.'",
		"'.$jp_created_date.'",
		"'.$jp_modified_date.'",
		"'.$st_ids.'",
		"'.$jp_expdate.'",
		"'.$jp_alert_mail.'",
		"'.$textfieldcurrently.'",
		"'.$embedded.'",
		"'.$otherembedded.'",
		"'.$bonddetails.'",
			"'.$writtenapptitude.'",
		"'.$writtentechnical.'",
		"'.$technicalinterview.'",
		"'.$generalhrinterview.'",
		"'.$probationperiod.'",
		"'.$regularemp.'",
		"'.$course.'")')or die(mysql_error()); 
		
		
				 
				 $html='
				 <table  width="100%" cellpadding="3" cellspacing="3" border="0">
				   <tr>
				     <td>Dear '.$contactperson.'</td>
					</tr>
					<tr>
				     <td>Thanks for posting a new job opening on the Nanochip Solutions Job Portal. Your job description is being processed by the admin to shortlist the resumes as per your request. We will intimate you at the earliest, over an email once the resumes are tagged and made available on your login account.</td>
					</tr>
					<tr>
				     <td>Best Regards,<br>
					 Nanochip Solutions Team</td>
					</tr>					';
     			 $from='info@nanochipsolutions.com';
				 $to      =$email;//$email;
				 $subject = 'Nanochip Solution: New Job Posting';
				 $message = $html;
				 $headers = "Content-type: text/html\r\n"; 
				    'Reply-To: info@nanochipsolutions.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				 $headers.= "From:" . $from;
				 mail($to, $subject, $message, $headers); 
				 
				 
				 $htmladmin = '<table width="100%" cellpadding="3" cellspacing="3" border="0">
								<tr>
									<td>Dear Admin,</td>
								 </tr>
								 <tr>
									<td>New Job has been created by:</td>
								 </tr>
								 <tr>
									<td>Name:'.$contactperson.'</td>
								 </tr>
								 <tr>
									<td>Designation:'.$designation.'</td>
								 </tr>
								 <tr>
									<td>Company:'.$companyname.'</td>
								 </tr>
								 <tr>
									<td>Login to the Admin account to view job description and tag the relevant resumes as per job description.</td>
								 </tr>
								 <tr>
									<td>Nanochip Solutions	</td>
								 </tr></table>';
				 $from='Nanochip Solutions';
				 $to      ='info@nanochipsolutions.com';//$email;
				 $subject = 'Nanochip Solution:Recruiter Created New Job';
				 $message = $htmladmin	;
				 $headers = "Content-type: text/html\r\n"; 
				    'Reply-To: info@nanochipsolutions.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				 $headers.= "From:" . $from;
				 mail($to, $subject, $message, $headers); 
				 
				 
				 $saveddetails = 1;
		 }
 	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard</title>
<link rel="stylesheet" href="css/styleupdated1.css" type="text/css" media="screen" />
<link href="css/recruiter-styles.css" rel="stylesheet">
	 <script language="javascript" type="text/javascript" src="js/lytebox.js"></script>
	<link rel="stylesheet" href="css/lytebox.css" type="text/css" media="screen" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
 
		// When the DOM is ready, initialize the scripts.
		jQuery(function( $ ){
 
			// Get a reference to the container.
			var container = $( "#graphcontainer" );
 
 
			// Bind the link to toggle the slide.
			$( "#pullup" ).click(
				function( event ){
					// Prevent the default event.
					event.preventDefault();
 
					// Toggle the slide based on its current
					// visibility.
					if (container.is( ":visible" )){
 
						// Hide - slide up.
						container.slideUp( 2000 );
						$("#divabc").show();
						
 
					} else {
 
						// Show - slide down.
						
 container.slideDown( 2000 );
					}
				}
			);
 	$( "#divabc" ).click(
				function( event ){
					// Prevent the default event.
					event.preventDefault();
 
					// Toggle the slide based on its current
					// visibility.
					
 
						// Hide - slide up.
											
						container.slideDown( 2000 );
						$("#divabc").hide();
						
 
					
				}
			);
		});

		function numbersonly(e){
			var unicode=e.charCode? e.charCode : e.keyCode
			if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
			if (unicode<48||unicode>57) //if not a number
			return false //disable key press
			}
		}
		
		 function validationsjobposting()
		 {
			 if(document.getElementById('textfield').value=='')
			 {
				  alert('Enter the Contact Person');
				  document.getElementById('textfield').focus();
				  return false;
			 }

			 if(document.getElementById('textfield2').value=='')
			 {
				  alert('Enter the Designation');
				  document.getElementById('textfield2').focus();
				  return false;
			 }

			 if(document.getElementById('textfield3').value=='')
			 {
				  alert('Enter the Phone No.');
				  document.getElementById('textfield3').focus();
				  return false;
			 }

			 if(document.getElementById('textfield4').value=='')
			 {
				  alert('Enter the Mobile No.');
				  document.getElementById('textfield4').focus();
				  return false;
			 }

			 if(document.getElementById('textfield5').value=='')
			 {
				  alert('Enter the E-Mail');
				  document.getElementById('textfield5').focus();
				  return false;
			 }

			 if(document.getElementById('textfield6').value=='')
			 {
				  alert('Enter the Job-Title');
				  document.getElementById('textfield6').focus();
				  return false;
			 }

			 if(document.getElementById('textfield7').value=='')
			 {
				  alert('Enter the Description');
				  document.getElementById('textfield7').focus();
				  return false;
			 }
		 }
		 
		 	function fnclose()
{
  window.location="dashboard.php";
}	

function showaggrementbond(abc)
{

 
  if(abc=='yes')
  {
     document.getElementById('mentionbonddetails').style.display='';
  }
  else
  {
   document.getElementById('mentionbonddetails').style.display='none';
  }
} 
	
	</script>
<body>
<div class="container">
<div class="dashboard">
<?php include_once('recruiterheader.php');  ?>

<div id="row">
<div class="row">
<form action="" method="post" name="">
<?php if($saveddetails==0){?>
<table width="900" border="0" cellspacing="4" cellpadding="2">
  <tr><td colspan="2" class="sectionheader">Basic Information</td></tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Contact Person*</td>
    <td width="100%"><input name="textfield" type="text" id="textfield" size="50" /></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Designation*</td>
    <td><input name="textfield2" type="text" id="textfield2" size="50" /></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Phone*</td>
    <td><input name="textfield3" type="text" id="textfield3" size="50" onKeyPress='return numbersonly(event);'/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Mobile*</td>
    <td><input name="textfield4" type="text" id="textfield4" size="50" onKeyPress='return numbersonly(event);'/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Email*</td>
    <td><input name="textfield5" type="text" id="textfield5" size="50" /></td>
  </tr>
  <tr><td colspan="2" class="sectionheader">Job Details</td></tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Job Title/Designation*</td>
    <td><input name="textfield6" type="text" id="textfield6" size="50" />&nbsp; <span class="small">(for present position hired)</span> </td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Job Description*</td>
    <td><textarea name="textfield7" cols="80" rows="5" id="textfield7"></textarea></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="sectionheader">Education Information</td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Minimum Qualification</td>
    <td><span class="small">For multiple selection hold Control and select</span><br>
	
	<select name="selectcourse[]" size="15"  multiple="multiple" id="selectcourse" style="width:380px;">
							  
 <option value="1">PG Diploma</option>
      <option value="2">BE/B.Tech</option>
      <option value="3">ME/M.Tech</option>
      <option value="4">M.S</option>
      <option value="5">BE after B.Sc</option>
      <option value="6">B.Sc</option>
      <option value="7">M.Sc</option>
      <option value="8">Certification Courses</option>
      </select></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Select Discipline</td>
    <td><span class="small">For multiple selection hold Control and select</span><br>
	<select name="selectbranch[]" size="15"  multiple="multiple" id="selectbranch" style="width:250px;"
							  
 <?php for($i=-1;$i<count($arrbranch);$i++){?>
							  <option value="<?php echo $arrbranch[$i]['branch_id'];?>">
								<?php echo $arrbranch[$i]['branch_name'];?>
								</option>
							  <?php }?>
							  </select></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Marks Required</td>
    <td><table width="150" border="0" cellspacing="1" cellpadding="3" style="background-color:#CCCCCC;">
      <tr style="background-color:#FFFFFF;">
 
        <td nowrap="nowrap"><strong>Education</strong></td>
        <td nowrap="nowrap"><strong>Cut-off (%)</strong></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">10th</td>
        <td><form id="form1" name="form1" method="post" action="">
          <input name="textfield8" type="text" id="textfield8" size="10"  style="width:80px;" maxlength="3" onKeyPress='return numbersonly(event);' value="60"/>
        </form></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">10+2/Diploma</td>
        <td><input name="textfield9" type="text" id="textfield9" size="10" style="width:80px;" maxlength="3" onKeyPress='return numbersonly(event);' value="60"/></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
        
        <td nowrap="nowrap">Under-Graduation</td>
        <td><input name="textfield10" type="text" id="textfield10" size="10" style="width:80px;" maxlength="3" onKeyPress='return numbersonly(event);' value="60"/></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">POST-Graduation</td>
        <td><input name="textfield11" type="text" id="textfield11" size="10" style="width:80px;" maxlength="3" onKeyPress='return numbersonly(event);' value="60"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"  class="sectionheader">Other Information</td>
  </tr>
   <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Do you Hire</td>
    <td><select name="select3[]"  multiple="multiple" id="select3[]" style="width:250px;">
      <option value="1">Fresher</option>
      <option value="2">Experienced</option>
    </select></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Number of Candidates Required </td>
    <td><table width="150" border="0" cellspacing="1" cellpadding="3" style="background-color:#CCCCCC;">
      <tr style="background-color:#FFFFFF;">
        <td nowrap="nowrap"><strong>Period</strong></td>
        <td nowrap="nowrap"><strong>Number</strong></td>
      </tr>
       <tr style="background-color:#FFFFFF;">
        <td nowrap="nowrap">Currently</td>
        <td>
          <input name="textfieldcurrently" type="text" id="textfieldcurrently" style="width:80px;" size="10" maxlength="6" onKeyPress='return numbersonly(event);'/>
        </td>
      </tr>
      <tr style="background-color:#FFFFFF;">
        <td nowrap="nowrap">Quarterly</td>
        <td>
          <input name="textfield12" type="text" id="textfield12" style="width:80px;" size="10" maxlength="6" onKeyPress='return numbersonly(event);'/>
        </td>
      </tr>
      <tr style="background-color:#FFFFFF;">
        <td nowrap="nowrap">Annualy</td>
        <td><input name="textfield13" type="text" id="textfield13" style="width:80px;" size="10" maxlength="6" onKeyPress='return numbersonly(event);'/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>
    Is Subject Carry Forward Allowed  ? <input type="radio" name="checkbox6" value="yes" checked="checked">Yes
<input type="radio" name="checkbox6" value="no" >No</td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>
    Is Loss Of 1 Year/ Semester Allowed ?  <input type="radio" name="checkbox7" value="yes" checked="checked">Yes
<input type="radio" name="checkbox7" value="no" >No</td>
  </tr>
 
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Domain Knowledge</td>
    <td>
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr> 
	<td>
    <span class="minorheaders">If recruiting for VLSI</span><br>
	<span class="small">For multiple selection hold Control and select</span><br>
	<select name="select4[]" size="15"  multiple="multiple" id="select4" style="width:260px;">
      <option value="1">Digital Design Concepts</option>
      <option value="2">FPGA Architecture</option>
      <option value="3">FPGA Design Flow</option>
      <option value="4">Verification using SV</option>
      <option value="5">Static timing analysis</option>
      <option value="6">Design Synthesis</option>
      <option value="7">Physical Design</option>
      <option value="8">Physical Verification &amp; Parasitic Extraction</option>
      <option value="9">Tape out &amp; MASKCAD</option>
      <option value="10">ASIC Design Flow</option>
      <option value="11">Scripting using Perl</option>
      <option value="12">Fundamentals of Linux</option>
</select> <br />
      <br />
    <input name="textfield14" type="text" id="textfield14" value="Please specify other keywords here" size="50" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
	</td>
	<td>
    <span class="minorheaders">If recruiting for Embedded Systems</span><br>
	<span class="small">For multiple selection hold Control and select</span><br>
	<select name="selectembedded[]" size="15"  multiple="multiple" id="selectembedded" style="width:300px;">
      <option value="1">Overview of Embedded Systems Development</option>
      <option value="2">Hardware Fundamentals</option>
      <option value="3">In depth C Programming Skills</option>
      <option value="4">C++ Programming Skills</option>
      <option value="5">Data Structures</option>
      <option value="6">Scripting Using PERL</option>
      <option value="7">Microcontroller Programming</option>
      <option value="8">OS Basics</option>
      <option value="9">EOS Basics</option>
      <option value="10">RTOS Basics</option>
      <option value="11">IP Networking</option>
</select>
      <br />
      <br />
    <input name="textfieldembother" type="text" id="textfieldembother" value="Please specify other keywords here" size="50" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/></td>
	</tr>
	</table>
	
	
	
	
	
	
     </td>

 
  </tr>
    <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Please specify selection procedure</td>
    <td><table width="150" border="0" cellspacing="1" cellpadding="3" style="background-color:#CCCCCC;">
      <tr style="background-color:#FFFFFF;">
 
        <td nowrap="nowrap"><strong>TEST PATTERN</strong></td>
        <td nowrap="nowrap"><strong>DURATION (HRS)</strong></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">WRITTEN TEST (APTITUDE):</td>
        <td>
          <input name="writtenapptitude" type="text" id="writtenapptitude" size="10"  style="width:80px;" />
        </td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">WRITTEN TEST (APTITUDE):</td>
        <td><input name="writtentechnical" type="text" id="writtentechnical" size="10" style="width:80px;" /></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
        
        <td nowrap="nowrap">TECHNICAL INTERVIEW</td>
        <td><input name="technicalinterview" type="text" id="technicalinterview" size="10" style="width:80px;" /></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">GENERAL HR INTERVIEW</td>
        <td><input name="generalhrinterview" type="text" id="generalhrinterview" size="10" style="width:80px;"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Any Specified Skill Area Of Test </td>
    <td><textarea name="textfield15" cols="80" rows="5" id="textfield15"></textarea></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Suggested Reading if Any</td>
    <td><textarea name="textfield16" cols="80" rows="5" id="textfield16"></textarea></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Venue/Location For Test</td>
    <td><textarea name="textfield17" cols="80" rows="5" id="textfield17"></textarea></td>
  </tr>
 <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>
    Is The Hiring For Regular Positions? <input type="radio" name="checkbox11" value="yes" checked="checked">Yes
<input type="radio" name="checkbox11" value="no" >No </td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>Is The Hiring For Internship Positions ? 
<input type="radio" name="checkbox9" value="yes">Yes
<input type="radio" name="checkbox9" value="no" checked="checked">No

     </td>
  </tr>
  <!--<tr>
    <td valign="top" nowrap="nowrap" class="alignright">Duration of Internship</td>
    <td><span class="small">For multiple selection hold Control and select</span><br>
	<select name="select5"  multiple="multiple" id="select5" style="width:250px;">
      <option value="1">3 Months</option>
      <option value="2">6 Months</option>
      <option value="3">1 Year</option>
    </select></td>
  </tr>-->
   <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>Duration of Internship ?  
<input type="radio" name="select5" value="0"> 3 Months
<input type="radio" name="select5" value="1"> 6 Months
<input type="radio" name="select5" value="2"> 1 Year

     </td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>
    Are Placement Assured After Internship?
    <input type="radio" name="checkbox12" value="yes">Yes
<input type="radio" name="checkbox12" value="no" >No </td>
  </tr>
  
  
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright"></td>
    <td><table width="150" border="0" cellspacing="1" cellpadding="3" style="background-color:#CCCCCC;">
      <tr style="background-color:#FFFFFF;">
 
        <td nowrap="nowrap" colspan="2"><strong>COMPENSATION/COST TO COMPANY (CTC): (Information will be treated as confidential)</strong></td>
      
      </tr>
      <tr>
      <td></td>
      <td>In Lakhs/annum</td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">DURING PROBATION/INTERNSHIP:</td>
        <td>
          <input name="probationperiod" type="text" id="probationperiod" size="10"  style="width:80px;" />
        </td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">ON REGULAR EMPLOYMENT:</td>
        <td><input name="regularemp" type="text" id="regularemp" size="10" style="width:80px;" /></td>
      </tr>
     
    </table></td>
  </tr>
  
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>
    Is There Any Service Agreement Bond? <input type="radio" name="checkbox10" value="yes" onclick="showaggrementbond(this.value);">Yes
<input type="radio" name="checkbox10" value="no" checked="checked"  onclick="showaggrementbond(this.value);">No</td>
  </tr>
   <tr id="mentionbonddetails" style="display:none">
    <td nowrap="nowrap" class="alignright">Mention Details of Bond</td>
        <td><input name="aggrementbondyear" type="text" id="aggrementbondyear" name="aggrementbondyear" style="width:80px;" size=""/>&nbsp;<span class="small">Months</span></td>
      </tr>
    <tr>
    <td colspan="2" align="right"> <input type="submit"  value="Save" name="Save" id="Save" class="blueButton" onclick="return validationsjobposting();"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="close" id="close" name="close" class="grayButton" value="Close" onclick="fnclose();"></input></td>
  </tr>
  
 
</table>
<?php } else if($saveddetails==1){?>
<table width="99%"  cellpadding="4" cellspacing="10" border="0" class="resuemviewtableborder">
 <tr>
			
			<td><img src="/images/icon_info_new.png" align="absmiddle"></td><td>Thanks for submitting the Job Description.Your request is being proceed by the admin. We will mail you shortly once the resumes are scanned and tagged to your account</td>
			
		</tr>
		
		
      <tr> <td align="right" colspan="2">
	  <input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td></tr>
					
  </table>
<?php }?>
</form>
</div>
</div>
<div class="footer">Copyrights © 2012 Nanochipsolutions</div>
</div>
</body>
</html>
