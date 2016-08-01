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

		  $rid = $_SESSION['r_id'];
		  $companyname = $_SESSION["r_company"];
     ////function for displaying all the coursess//////	
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
		 
		 $jpid=$_GET['jpid'];
		 	$queryjobposting = "SELECT * FROM rv_job_posting where jp_id=".$jpid;
		 	//echo $queryjobposting;
		 	
$cltbranch =array();
	$resultjobposting = mysql_query($queryjobposting);
	while ($rows = mysql_fetch_assoc($resultjobposting)) {
		$textfieldcurrently = $rows['textfieldcurrently'];
		$name	= $rows["jp_name"];
		$cltdesignation= $rows["jp_designation"];
 		$clttelephone	= $rows["jp_telephone"];
		$cltmobile= $rows["jp_mobile"];
		$cltemail	= $rows["jp_email"];
		$cltdescription= $rows["jp_description"];
		$cltjobtitle	= $rows["jp_job_title"];	
		$cltcheckbox6	= $rows["jp_backlogs"];	
		$cltcheckbox7	= $rows["jp_backlogs_year"];	
		$cltcheckbox8	= $rows["jp_our_campus"];		
		$cltcheckbox9	= $rows["jp_intership"];	
		$cltcheckbox10	= $rows["jp_agreement"];	
		$cltcheckbox11	= $rows["jp_regular_positions"];
		$cltcheckbox12	= $rows["jp_intership_placement"];	
		$cltbranchs	= $rows["jp_branch"];			
		$cltdomains	= $rows["jp_domain"];
		$cltdurations	= $rows["jp_intership_duration"];		
		$cltfreshers	= $rows["jp_hire_freshers"];
		$cltexperience	= $rows["jp_hire_experienc"];	
		$cltqualifications	= $rows["jp_qualifications"];
		$suggestedread	= $rows["jp_suggested_read"];	
		$cltvenue	= $rows["jp_venue"];
		$cltskills	= $rows["jp_skills"];
		$cltsslc	= $rows["jp_sslc_cutoff"];		
		$cltpuc	= $rows["jp_puc_cutoff"];
		$cltdegree	= $rows["jp_degree_cutoff"];	
		$cltpg	= $rows["jp_pg_cutoff"];
		$cltquarterly	= $rows["jp_candidates_quarterly"];	
		$cltannualy	= $rows["jp_candidates_annualy"];	
		$others = $rows["jp_other_domain"];	
		$embedded = $rows["embedded"];	
		$course = $rows["jp_course"];	
		$jp_bonddetails = $rows["jp_bonddetails"];	
		$otherembedded = $rows["otherembedded"];
		$agrement = $rows['jp_agreement'];
			$writtenapptitude = $rows['writtenapptitude'];
			$writtentechnical = $rows['writtentechnical'];
			$technicalinterview = $rows['technicalinterview'];
			$generalhrinterview = $rows['generalhrinterview'];
			$probationperiod = $rows['probationperiod'];
			$regularemp = $rows['regularemp'];
		
$sessionexpdate= $_SESSION['expdate']=$expdate = $rows["jp_expdate"];	
$sessioncreateddate = $_SESSION['createddate']=$createddate = $rows["jp_created_date"];			
		}	 
		$cltarrbranch =explode(',',$cltbranchs);
		$cltarrdomains =explode(',',$cltdomains);
		$cltarrdurations = explode(',',$cltdurations);
		$cltarrcourse = explode(',',$cltqualifications);
		$cltembedded =explode(',',$embedded);
			$cltcourse =explode(',',$course);
		 if($_POST)
		 {
		   /*print_R($_POST);
		   die();*/
		    $result	=	mysql_query("Delete from rv_job_posting where jp_id=".$jpid);
			
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
			
			/*for($f=0;$f<count($_POST['select3']);$f++)
					{
						$fresher = $fresher.','.$_POST['select3'][$f];
					*/

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
			
			$duration=0;
			for($i=0;$i<count($_POST['select5']);$i++)
					{
						$duration = $duration.','.$_POST['select5'][$i];
					}
					
			  $checkbox6=$_POST['checkbox6'];
			
			
			  $checkbox7=$_POST['checkbox7'];
			$checkbox8=0;
			if($_POST['checkbox8']=='on')
			{
			  $checkbox8=1;
			}
			
			  $checkbox9=$_POST['checkbox9'];
			 $checkbox12=$_POST['checkbox12'];
			
			/*$checkbox10=0;
			if($_POST['checkbox10']=='on')
			{
			  $checkbox10=1;
			}*/
			$checkbox10=$_POST['checkbox10'];
		
			  $checkbox11=$_POST['checkbox11'];
			
			
			
			
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
			$reading = $_POST['textfield16'];
			$venue = $_POST['textfield17'];
			$jp_expdate = $_POST['expirydate'];
			$createddate = $_POST['createddate'];
			$otherembedded = $_POST['textfieldembother'];
			$bonddetails = $_POST['aggrementbondyear'];
						$writtenapptitude = $_POST['writtenapptitude'];
			$writtentechnical = $_POST['writtentechnical'];
			$technicalinterview = $_POST['technicalinterview'];
			$generalhrinterview = $_POST['generalhrinterview'];
			$probationperiod = $_POST['probationperiod'];
			$regularemp = $_POST['regularemp'];
				$textfieldcurrently = $_POST['textfieldcurrently'];
			$jp_created_date = mktime();
	
			$Insert	=	mysql_query("INSERT INTO rv_job_posting(jp_id,r_id,
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
															jp_qualifications,
															embedded,
															otherembedded,
															jp_bonddetails,
															writtenapptitude,
															writtentechnical,
															technicalinterview,
															generalhrinterview,
															probationperiod,
															regularemp,jp_course,textfieldcurrently)
VALUES ('".$jpid."','".$rid."',
		'".$companyname."',
		'".$address."',
		'".$contactperson."',
		'".$designation."',
		'".$phone."',
		'".$mobile."',
		'".$email."',
		'".$jobdescription."',
		'".$jobtitle."',
		'".$jp_be."',
		'".$jp_me."',
		'".$branch."',
		'".$sslcm."',
		'".$sslc."',
		'".$pucm."',
		'".$puc."',
		'".$degreem."',
		'".$degree."',
		'".$postgraduationm."',
		'".$postgraduation."',
		'".$checkbox6."',
		'".$checkbox7."',
		'".$fresher."',
		'".$exp."',
		'".$quaterly."',
		'".$annualy."',
		'".$domainknowledge."',
		'".$specifyother."',
		'".$jp_written_apptitude."',
		'".$jp_written_technical."',
		'".$jp_technical."',
		'".$jp_hr."',
		'".$jp_written_general."',
		'".$jp_written_apptitude_marks."',
		'".$jp_written_technical_marks."',
		'".$jp_technical_marks."',
		'".$jp_hr_marks."',
'".$jp_written_contents_marks."',
		'".$skill."',
'".$jp_suggested_read."',
		'".$venue."',
		'".$checkbox8."',
		'".$checkbox9."',
		'".$duration."',
		'".$checkbox12."',
		'".$checkbox11."',
		'".$checkbox10."',
		'".$sessioncreateddate."',
		'".$jp_modified_date."',
		'".$st_ids."',
		'".$sessionexpdate."',
		'".$jp_alert_mail."',
		'".$course."','".$embedded."',
		'".$otherembedded."',
		'".$bonddetails."',
		'".$writtenapptitude."',
		'".$writtentechnical."',
		'".$technicalinterview."',
		'".$generalhrinterview."',
		'".$probationperiod."',
		'".$regularemp."',
		'".$course."','".$textfieldcurrently."')")or die(mysql_error()); 
		
		 $html='
				 <table  width="100%" cellpadding="3" cellspacing="3" border="0">
				   <tr>
				     <td>Dear '.$contactperson.'</td>
					</tr>
					<tr>
				     <td>Thanks for creating a new job on the Nanochip Solutions Job Portal. Your job description is being processed by the admin to shortlist the resumes as per your request. We will intimate you at the earliest, over an email once the resumes are tagged and made available on your login account.</td>
					</tr>
					<tr>
				     <td>Best Regards,<br>
					 Nanochip Solutions Team</td>
					</tr>					';
     			 $from='info@nanochipsolutions.com';
				 $to      =$email;//$email;
				 $subject = 'Nanochip Solution:Created New Job';
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
				// mail($to, $subject, $message, $headers); 
				 
				 
		 	header("Location:dashboard.php");exit;
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
         // alert(abc);
	 
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
	
<body onload="showaggrementbond('<?php echo $agrement;?>')">
<div class="container">
<div class="dashboard">
<div id="table">
<div id="row" class="header">
<div id="globalfirstcell"><a href="index.php"><img src="images/logonanao.jpg"></a></div>
<div class="floatright"> Welcome <?php echo $_SESSION["r_user_name"];?> | <a href="javascript">Logout</a> 
<br><br>
<a href="dashboard.php">Dashboard</a> | <a href="recruiteredit.php">Edit Profile</a>
</div>
</div>
</div>
<div class="dashboard">

<div id="row">

	
		
	</div>
	</div>
	</div>
<div id="row" class="dashboard">
<div class="row">
<form action="" method="post" name="">
<table width="900" border="0" cellspacing="4" cellpadding="2">
  <tr><td colspan="2"><h2>Basic Information</h2></td></tr>
  <input type="hidden" name="expirydate" value="<?php echo $expdat;?>" id="expirydate">
  <input type="hidden" name="createddate" value="<?php echo $createddate;?>" id="createddate">
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Contact Person*</td>
    <td width="100%"><input name="textfield" type="text" id="textfield" size="50" value="<?php echo $name;?>"/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Designation*</td>
    <td><input name="textfield2" type="text" id="textfield2" size="50"  value="<?php echo $cltdesignation;?>"/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Phone*</td>
    <td><input name="textfield3" type="text" id="textfield3" size="50" onKeyPress='return numbersonly(event);'  value="<?php echo $clttelephone;?>"/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Mobile*</td>
    <td><input name="textfield4" type="text" id="textfield4" size="50" onKeyPress='return numbersonly(event);'  value="<?php echo $cltmobile;?>"/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Email*</td>
    <td><input name="textfield5" type="text" id="textfield5" size="50"  value="<?php echo $cltemail;?>"/></td>
  </tr>

  <tr><td colspan="2" valign="top" nowrap="nowrap"><h2>Job Details</h2></td></tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Job Title/Designation*</td>
    <td><input name="textfield6" type="text" id="textfield6" size="50"  value="<?php echo $cltjobtitle;?>"/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Job Description*</td>
    <td><textarea name="textfield7" cols="44" rows="5" id="textfield7"><?php echo $cltdescription;?></textarea></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top" nowrap="nowrap"><h2>Education Information</h2></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Minimum Qualification</td>
    <td>

	<select name="selectcourse[]" size="15"  multiple="multiple" id="selectcourse" style="width:380px;">
							  
 <option value="1" <?php if(in_array('1',$cltcourse)){echo "Selected";}?>>BE/B.Tech + PG Diploma/Certification in VLSI</option>
      <option value="2" <?php if(in_array('2',$cltcourse)){echo "Selected";}?>>BE/B.Tech + PG Diploma/Certification in Embedded Systems</option>
      <option value="3" <?php if(in_array('3',$cltcourse)){echo "Selected";}?>>M.Tech/M.S + PG Diploma/Certification in VLSI</option>
      <option value="4" <?php if(in_array('4',$cltcourse)){echo "Selected";}?>>M.Tech/M.S + PG Diploma/Certification in Embedded Systems</option>
      <option value="5" <?php if(in_array('5',$cltcourse)){echo "Selected";}?>>BE/B.Tech</option>
      <option value="6" <?php if(in_array('6',$cltcourse)){echo "Selected";}?>>M.Tech/MS</option>
      <option value="7" <?php if(in_array('7',$cltcourse)){echo "Selected";}?>>B.Sc</option>
      <option value="8" <?php if(in_array('8',$cltcourse)){echo "Selected";}?>>M.Sc</option>
      <option value="9" <?php if(in_array('9',$cltcourse)){echo "Selected";}?>>Diploma in Electronics</option>
							  </select></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Select Discipline</td>
    <td><select name="selectbranch[]" size="15"  multiple="multiple" id="selectbranch" style="width:250px;"
							  
 <?php for($i=0;$i<count($arrbranch);$i++){?>
							  <option value="<?php echo $arrbranch[$i]['branch_id'];?>" <?php if(in_array($arrbranch[$i]['branch_id'],$cltarrbranch)){echo "Selected";}?>> 


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
       
        <td nowrap="nowrap">SSLC</td>
        <td><form id="form1" name="form1" method="post" action="">
          <input name="textfield8" type="text" id="textfield8" size="10" value="<?php echo $cltsslc;?>" maxlength="3" onKeyPress='return numbersonly(event);'/>
        </form></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">PUC</td>
        <td><input name="textfield9" type="text" id="textfield9" size="10" value="<?php echo $cltpuc;?>" maxlength="3" onKeyPress='return numbersonly(event);'/></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
        
        <td nowrap="nowrap">DEGREE</td>
        <td><input name="textfield10" type="text" id="textfield10" size="10" value="<?php echo $cltdegree;?>" maxlength="3" onKeyPress='return numbersonly(event);'/></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">POST GRADUATION</td>
        <td><input name="textfield11" type="text" id="textfield11" size="10" value="<?php echo $cltpg;?>" maxlength="3" onKeyPress='return numbersonly(event);'/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top" nowrap="nowrap"><h2>Other Information</h2></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Do you Hire</td>
    <td><select name="select3[]"  multiple="multiple" id="select3[]" style="width:250px;">
      <option value="1" <?php if($cltfreshers=='1'){echo "Selected";}?>>Fresher</option>
      <option value="2" <?php if($cltexperience=='2'){echo "Selected";}?>>Experienced</option>
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
          <input name="textfieldcurrently" type="text" id="textfieldcurrently" style="width:80px;" value="<?php echo $textfieldcurrently;?>"size="10" maxlength="6" onKeyPress='return numbersonly(event);'/>
        </td>
      </tr>
      <tr style="background-color:#FFFFFF;">
        <td nowrap="nowrap">Quarterly</td>
        <td>
          <input name="textfield12" type="text" id="textfield12" size="10" style="width:80px;" value="<?php echo $cltquarterly;?>" maxlength="6" onKeyPress='return numbersonly(event);'/>
        </form></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
        <td nowrap="nowrap">Annualy</td>
        <td><input name="textfield13" type="text" id="textfield13" size="10" style="width:80px;" value="<?php echo $cltannualy;?>" maxlength="6" onKeyPress='return numbersonly(event);'/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>
    Is Subject Carry Forward Allowed  ? <input type="radio" name="checkbox6" value="yes" <?php if($cltcheckbox6=='yes'){
    ?>checked="checked"<?php 
    }?>>Yes
<input type="radio" name="checkbox6" value="no" <?php if($cltcheckbox6=='no'){?>checked="checked"<?php }?>>No</td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>
    Is Loss Of 1 Year/ Semester Allowed ? <input type="radio" name="checkbox7" value="yes" <?php if($cltcheckbox7=='yes'){
    ?>checked="checked"<?php 
    }?>>Yes
<input type="radio" name="checkbox7" value="no" <?php if($cltcheckbox7=='no'){?>checked="checked"<?php }?>>No</td>
  </tr>
  
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Domain Knowledge</td>
	 <td>
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr> 
    <td>
	<span class="small">For multiple selection hold Control and select</span><br>
    <span class="small">If recruiting for RV-VLSI Systems</span><br>
    <select name="select4[]" size="15"  multiple="multiple" id="select4" style="width:250px;">
      <option value="1" <?php if(in_array('1',$cltarrdomains)){echo "Selected";}?>>Digital Design Concepts</option>
      <option value="2" <?php if(in_array('2',$cltarrdomains)){echo "Selected";}?>>FPGA Architecture</option>
      <option value="3" <?php if(in_array('3',$cltarrdomains)){echo "Selected";}?>>FPGA Design Flow</option>
      <option value="4" <?php if(in_array('4',$cltarrdomains)){echo "Selected";}?>>Verification using SV</option>
      <option value="5" <?php if(in_array('5',$cltarrdomains)){echo "Selected";}?>>Static timing analysis</option>
      <option value="6" <?php if(in_array('6',$cltarrdomains)){echo "Selected";}?>>Design Synthesis</option>
      <option value="7" <?php if(in_array('7',$cltarrdomains)){echo "Selected";}?>>Physical Design</option>
      <option value="8" <?php if(in_array('8',$cltarrdomains)){echo "Selected";}?>>Physical Verification &amp; Parasitic Extraction</option>
      <option value="9" <?php if(in_array('9',$cltarrdomains)){echo "Selected";}?>>Tape out &amp; MASKCAD</option>
      <option value="10" <?php if(in_array('10',$cltarrdomains)){echo "Selected";}?>>ASIC Design Flow</option>
      <option value="11" <?php if(in_array('11',$cltarrdomains)){echo "Selected";}?>>Scripting using Perl</option>
      <option value="12" <?php if(in_array('12',$cltarrdomains)){echo "Selected";}?>>Fundamentals of Linux</option>
</select>
      <br />
      <br /><input name="textfield14" type="text" id="textfield14" value="<?php echo $others;?>" size="50" /></input>
    </td>
     <td>
	 <span class="small">For multiple selection hold Control and select</span><br>
    <span class="small">If recruiting for Embedded Systems</span><br>
     <select name="selectembedded[]" size="15"  multiple="multiple" id="selectembedded" style="width:250px;">
      <option value="1" <?php if(in_array('1',$cltembedded)){echo "Selected";}?>>Digital Design Concepts</option>
      <option value="2" <?php if(in_array('2',$cltembedded)){echo "Selected";}?>>FPGA Architecture</option>
      <option value="3" <?php if(in_array('3',$cltembedded)){echo "Selected";}?>>FPGA Design Flow</option>
      <option value="4" <?php if(in_array('4',$cltembedded)){echo "Selected";}?>>Verification using SV</option>
      <option value="5" <?php if(in_array('5',$cltembedded)){echo "Selected";}?>>Static timing analysis</option>
      <option value="6" <?php if(in_array('6',$cltembedded)){echo "Selected";}?>>Design Synthesis</option>
      <option value="7" <?php if(in_array('7',$cltembedded)){echo "Selected";}?>>Physical Design</option>
      <option value="8" <?php if(in_array('8',$cltembedded)){echo "Selected";}?>>Physical Verification &amp; Parasitic Extraction</option>
      <option value="9" <?php if(in_array('9',$cltembedded)){echo "Selected";}?>>Tape out &amp; MASKCAD</option>
      <option value="10" <?php if(in_array('10',$cltembedded)){echo "Selected";}?>>ASIC Design Flow</option>
      <option value="11" <?php if(in_array('11',$cltembedded)){echo "Selected";}?>>Scripting using Perl</option>
      <option value="12" <?php if(in_array('12',$cltembedded)){echo "Selected";}?>>Fundamentals of Linux</option>
</select>
      <br />
      <br /><input name="textfieldembother" type="text" id="textfieldembother" value="<?php echo $otherembedded;?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" size="50" /></input>
    </td>
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
          <input name="writtenapptitude" type="text" id="writtenapptitude" size="10"  style="width:80px;" value="<?php echo $writtenapptitude;?>"/>
        </td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">WRITTEN TEST (APTITUDE):</td>
        <td><input name="writtentechnical" type="text" id="writtentechnical" size="10" style="width:80px;" value="<?php echo $writtentechnical;?>"/></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
        
        <td nowrap="nowrap">TECHNICAL INTERVIEW</td>
        <td><input name="technicalinterview" type="text" id="technicalinterview" size="10" style="width:80px;" value="<?php echo $technicalinterview;?>"/></td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">GENERAL HR INTERVIEW</td>
        <td><input name="generalhrinterview" type="text" id="generalhrinterview" size="10" style="width:80px;" value="<?php echo $generalhrinterview;?>"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Any Specified Skill Area Of Test </td>
    <td><textarea name="textfield15" cols="44" rows="5" id="textfield15"><?php echo $cltskills;?></textarea></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Suggested Reading if Any</td>
    <td><textarea name="textfield16" cols="44" rows="5" id="textfield16"><?php echo $suggestedread;?></textarea></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Venue/Location For Test</td>
    <td><textarea name="textfield17" cols="44" rows="5" id="textfield17"><?php echo $cltvenue;?></textarea></td>
  </tr>
  
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td> Is The Hiring For Internship Positions ? 
<input type="radio" name="checkbox9" value="yes" <?php if($cltcheckbox9=='yes'){
    ?>checked="checked"<?php 
    }?>>Yes
<input type="radio" name="checkbox9" value="no" <?php if($cltcheckbox9=='no'){?>checked="checked"<?php }?>>No

   </td>
    
   
  </tr>
   <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Duration of Internship</td>
    <td><select name="select5"  multiple="multiple" id="select5" style="width:250px;">
      <option value="1" <?php if(in_array('1',$cltarrdurations)){echo "Selected";}?>>3 Months</option>
      <option value="2" <?php if(in_array('2',$cltarrdurations)){echo "Selected";}?>>6 Months</option>
      <option value="3" <?php if(in_array('3',$cltarrdurations)){echo "Selected";}?>>1 Year</option>
    </select></td>
  </tr>
   <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>
    Are Placement Assured After Internship? 
    <input type="radio" name="checkbox12" value="yes" <?php if($cltcheckbox12=='yes'){
    ?>checked="checked"<?php 
    }?>>Yes
<input type="radio" name="checkbox12" value="no" <?php if($cltcheckbox12=='no'){?>checked="checked"<?php }?>>No
    </td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>
    Is The Hiring For Regular Positions?  <input type="radio" name="checkbox11" value="yes" <?php if($cltcheckbox11=='yes'){
    ?>checked="checked"<?php 
    }?>>Yes
<input type="radio" name="checkbox11" value="no" <?php if($cltcheckbox11=='no'){?>checked="checked"<?php }?>>No</td>
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
          <input name="probationperiod" type="text" id="probationperiod" size="10"  style="width:80px;" value="<?php echo $probationperiod;?>"/>
        </td>
      </tr>
      <tr style="background-color:#FFFFFF;">
       
        <td nowrap="nowrap">ON REGULAR EMPLOYMENT:</td>
        <td><input name="regularemp" type="text" id="regularemp" size="10" style="width:80px;" value="<?php echo $regularemp;?>"/></td>
      </tr>
     
    </table></td>
  </tr>
 
 
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">&nbsp;</td>
    <td>
    Is There Any Service Agreement Bond? <input type="radio" name="checkbox10" value="yes"  onclick="showaggrementbond(this.value);"<?php if($cltcheckbox10=='yes'){
    ?>checked="checked"<?php 
    }?>>Yes
<input type="radio" name="checkbox10" value="no" onclick="showaggrementbond(this.value);" <?php if($cltcheckbox10=='no'){?>checked="checked"<?php }?>>No</td>
  </tr>
  <tr id="mentionbonddetails">
    <td nowrap="nowrap" class="alignright">Mention Details of Bond</td>
        <td><input name="aggrementbondyear" type="text" id="aggrementbondyear" name="aggrementbondyear" style="width:80px;" value="<?php echo $jp_bonddetails;?>"/>&nbsp;<span class="small">Months</span></td>
      </tr>
    <tr>
   <td colspan="2" align="right"> <input type="submit"  value="Save" name="Save" id="Save" class="blueButton" onclick="return validationsjobposting();"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="close" id="close" name="close" class="grayButton" value="Close" onclick="fnclose();"></input></td>
  </tr>
  
 
</table>
</form>
</div>
</div>
<div class="footer">Copyrights © 2012 Nanochipsolutions</div>
</div>
</body>
</html>
