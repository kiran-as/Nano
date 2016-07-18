<?php
include("../application/conn.php");
include('../include/department.php');
include('../include/domainlist.php');
include('../include/documentlist.php');
include('../include/year.php');
include('../include/domain_type.php');
$thankyouMessage = 0;

$fresherResumeCount = 0;
$fresherResume = mysql_query("Select * from tbl_student where
    deg_percentage !=''  and pg_percentage='0' and pgdip_percentage!='0' and phd_percentage='0'");
while ($row = mysql_fetch_assoc($fresherResume)) {
    $fresherResumeCount++;
}

$idrecruiter = $_SESSION['idrecruiter'];
$requiterSql = mysql_query("Select * from tbl_recruiter where idrecruiter=$idrecruiter");
while ($row = mysql_fetch_assoc($requiterSql)) {
    $requiterName = $row['usename'];
    $email = $row['email'];
    $company = $row['company'];
    $mobile = $row['mobile'];
    $designation = $row['designation'];
}

if ($_POST) {

    $experience_type = $_POST['experience_type'];
    if ($experience_type == 'Graduate Intern') {
	$thankyouMessage = '1';
    }
    else if ($experience_type == 'Skilled Graduate Intern') {
	$thankyouMessage = '2';
    }
    else if ($experience_type == 'Experienced Professionals') {
	$thankyouMessage = '3';
    }
    $job_description = $_POST['jobDescription'];
    $job_title = $_POST['jobTitle'];
    $minqualification = $_POST['minqualification'];
    $discipline = 0;
    for ($i = 0; $i < count($_POST['discipline']); $i++) {
	$discipline.= ',' . $_POST['discipline'][$i];
    }

    $resumetype = 0;
    for ($i = 0; $i < count($_POST['resumetype']); $i++) {
	$resumetype.= ',' . $_POST['resumetype'][$i];
    }

    $recruitementdate = date('Y-m-d');
    if (empty($_POST['datepicker'])) {
	$interviewdate = date('Y-m-d',
		strtotime("+30 days"));
    }
    else {
	$interviewdate = date('Y-m-d',
		strtotime($_POST['datepicker']));
    }
    $noofopenings = $_POST['noofopenings'];


    $sslccutoff = $_POST['sslccutoff'];
    $sslcpassoutyear = $_POST['sslcpassoutyear'];
    $puccutoff = $_POST['puccutoff'];
    $pucpassoutyear = $_POST['pucpassoutyear'];
    $degcutoff = $_POST['degcutoff'];
    $degpassoutyearFrom = $_POST['degpassoutyearFrom'];
    $degpassoutyearTo = $_POST['degpassoutyearTo'];

    $pgcutoff = $_POST['pgcutoff'];
    $pgpassoutyearFrom = $_POST['pgpassoutyearFrom'];
    $pgpassoutyearTo = $_POST['pgpassoutyearTo'];

    $carryforward = $_POST['carryforward'];
    $lossofoneyear = $_POST['lossofoneyear'];
    $suggestedreading = $_POST['suggestedreading'];
    $venue = $_POST['venue'];
    $writtentest = $_POST['writtentest'];
    $internshipposition = $_POST['internshipposition'];
    $internshipduration = $_POST['internshipduration'];
    $regularposition = $_POST['regularposition'];
    $agreementbond = $_POST['agreementbond'];
    $writtentestaptitude = $_POST['writtentestaptitude'];
    $writtentesttechnical = $_POST['writtentesttechnical'];
    $technicalinterview = $_POST['technicalinterview'];
    $generalhrinterview = $_POST['generalhrinterview'];
    $specificskill = $_POST['specificskill'];
    $documentsrequired = $_POST['documentsrequired'];
    $duringinternship = $_POST['duringinternship'];
    $domain_type = $_POST['domain_type'];
    $rvranking = $_POST['rvranking'];
    $jobcode = $_POST['internaljobcode'];
    $years_of_Exp = $_POST['years_of_Exp'];
    $exp_no_of_openings = $_POST['exp_no_of_openings'];
    /* echo "Insert into tbl_recruitement(exp_no_of_openings,years_of_Exp,resume_type,recruitementposition,job_description ,"
      . "job_title,min_qualification,discipline,idrecruiter,recruitementdate,
      noofopening,interviewdate,
      sslccutoff,sslcpassoutyear,puccutoff,pucpassoutyear,degcutoff,degpassoutyearFrom,
      pgcutoff,pgpassoutyearFrom,carryforward,lossofoneyear,
      suggestedreading,venue,writtentest,internshipposition,
      internshipduration,regularposition,agreementbond,
      writtentestaptitude,writtentesttechnical,technicalinterview,
      generalhrinterview,specificskill,documentsrequired,
      duringinternship,regularemployment,degpassoutyearTo,pgpassoutyearTo,experience_type,domain_type,rvranking,jobcode)

      Values ('$exp_no_of_openings','$years_of_Exp','$resumetype','$job_title','$job_description',"
      . "'$job_title','$minqualification','$discipline','$idrecruiter','$recruitementdate'
      ,'$noofopenings','$interviewdate',
      '$sslccutoff','$sslcpassoutyear','$puccutoff','$pucpassoutyear','$degcutoff','$degpassoutyearFrom',
      '$pgcutoff','$pgpassoutyearFrom','$carryforward','$lossofoneyear',
      '$suggestedreading','$venue','$writtentest','$internshipposition',
      '$internshipduration','$regularposition','$agreementbond',
      '$writtentestaptitude','$writtentesttechnical','$technicalinterview',
      '$generalhrinterview','$specificskill','$documentsrequired',
      '$duringinternship','$regularemployment','$degpassoutyearTo','$pgpassoutyearTo','$experience_type','$domain_type','$rvranking','$jobcode')";
      exit;
     */
    mysql_query("Insert into tbl_recruitement(exp_no_of_openings,years_of_Exp,resume_type,recruitementposition,job_description ,"
	    . "job_title,min_qualification,discipline,idrecruiter,recruitementdate,
                noofopening,interviewdate,
                sslccutoff,sslcpassoutyear,puccutoff,pucpassoutyear,degcutoff,degpassoutyearFrom,
                pgcutoff,pgpassoutyearFrom,carryforward,lossofoneyear,
                suggestedreading,venue,writtentest,internshipposition,
                internshipduration,regularposition,agreementbond,
                writtentestaptitude,writtentesttechnical,technicalinterview,
                generalhrinterview,specificskill,documentsrequired,
                duringinternship,regularemployment,degpassoutyearTo,pgpassoutyearTo,experience_type,domain_type,rvranking,jobcode)

             Values ('$exp_no_of_openings','$years_of_Exp','$resumetype','$job_title','$job_description',"
	    . "'$job_title','$minqualification','$discipline','$idrecruiter','$recruitementdate'
            ,'$noofopenings','$interviewdate',
            '$sslccutoff','$sslcpassoutyear','$puccutoff','$pucpassoutyear','$degcutoff','$degpassoutyearFrom',
            '$pgcutoff','$pgpassoutyearFrom','$carryforward','$lossofoneyear',
            '$suggestedreading','$venue','$writtentest','$internshipposition',
            '$internshipduration','$regularposition','$agreementbond',
            '$writtentestaptitude','$writtentesttechnical','$technicalinterview',
            '$generalhrinterview','$specificskill','$documentsrequired',
            '$duringinternship','$regularemployment','$degpassoutyearTo','$pgpassoutyearTo','$experience_type','$domain_type','$rvranking','$jobcode')");


    $to = "vprasad@nanochipsolutions.com";
    $subject = "New Job Profile has been created";
    $message = "
          <html>
          <body>
          <table>
          <tr>
          <td>Dear Admin,</td>
          </tr>
          <tr>
          <td>The recruiter from ($requiterName) from ($company) has created a job profile,
please tag the resumes to this profile ASAP</td>
          </tr>
<tr>
          <td>Thank you <br/>
             Recruitement Advisor <br/>
             Nanochip Solutions</td>
          </tr>
          </table>
          </body>
          </html>
          ";



    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: Nanochip Solutions <info@nanochipsolutions.com>' . "\r\n";
    $headers .= 'Cc: askiran123@gmail.com' . "\r\n";

    mail($to,
	    $subject,
	    $message,
	    $headers);


    $to = $email;
    $subject = "New Job Profile has been created";
    $message = "
          <html>
          <body>
          <table>
          <tr>
          <td>Dear $requiterName,</td>
          </tr>
          <tr>
          <td>
Your job description has been successfully created and your job id is ($jobcode). <br/>
Kindly wait for updates on this. Updates will be sent to registered email id. <br/>
In all future communication please mention the job id for quick response.</td>
          </tr>
<tr>
          <td>Thank you <br/>
             Recruitement Advisor <br/>
             Nanochip Solutions</td>
          </tr>
          </table>
          </body>
          </html>
          ";



    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: Nanochip Solutions <info@nanochipsolutions.com>' . "\r\n";
    $headers .= 'Cc: askiran123@gmail.com' . "\r\n";

    mail($to,
	    $subject,
	    $message,
	    $headers);

    mkdir($jobcode,
	    0777);
    chmod($jobcode,
	    0777);
}
echo $thankyouMessage;

$internaljobcode = 'NANOCH' . rand(11111111,
		99999999);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nanochip Solutions</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/main.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="css/jquery-ui.css">
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/jquery-ui.js"></script>

	<script>
	    $(function () {
		$("#datepicker").datepicker({minDate: -00, maxDate: "+1M +10D"});
		$('#datepicker').datepicker({dateFormat: 'dd-mm-yy'});
	    });

	    function showInternshipDisplay(id)
	    {
		if (id == 'Yes')
		{
		    $('#internshipIdOptions').show();
		}
		else
		{
		    $('#internshipIdOptions').hide();
		}
	    }
	    function agreementbonds(id)
	    {

		if (id == 'Yes')
		{
		    $('#agreementId').show();
		}
		else
		{
		    $('#agreementId').hide();
		}
	    }

	    function fnshowfreshertab(id)
	    {

		$('#experiencetab').hide();
		$('#freshertab').show();
		$('#fresherResumeTab').hide();
		$('#ExperienceDiv2').hide();
		$('#jodCode').val('');
		$('#jobTitle').val('');
		$('#SkillRequiredDiv').show();
		if (id == '1')
		{

		    $('#experiencetab').show();
		    $('#freshertab').hide();
		    $('#fresherResumeTab').hide();
		    $('#ExperienceDiv2').show();

		}

		if (id == '0')
		{
		    $('#jodCode').val('Freshers');
		    $('#jobTitle').val('Freshers');
		    $('#experiencetab').hide();
		    $('#freshertab').hide();
		    $('#fresherResumeTab').show();
		    $('#ExperienceDiv2').hide();
		    $('#SkillRequiredDiv').hide();
		}


		if (id == 2)
		{
		    //$("#job_title").attr('readonly', false);
		    $("#job_title").attr('disabled', 'disabled');
		}
		else
		{
		    $('#job_title').attr('readonly', true);

		}
	    }

	    function fnMinimumQualification(mecutoff)
	    {
		$('#MECutOffDiv').show();
		if (mecutoff == 'BE')
		{
		    $('#MECutOffDiv').hide();
		}
	    }
	    function IsNumeric(e) {
		var keyCode = e.which ? e.which : e.keyCode
		var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
		document.getElementById("error").style.display = ret ? "none" : "inline";
		return ret;
	    }
	</script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

	<script type="text/javascript">

	    $(document).ready(function () {

		$("#recruitementList").validate({
		    // Specify the validation rules
		    rules: {
			jobTitle: "required",
			exp_no_of_openings: "required",
			years_of_Exp: "required",
			noofopenings: "required",
			venue: "required"
		    },
		    // Specify the validation error messages
		    messages: {
			jobTitle: "<p class='error-text'>Please enter Job Title</p>",
			exp_no_of_openings: "<p class='error'>No of Openings</p>",
			years_of_Exp: "<p class='error'>Years of experience</p>",
			noofopenings: "<p class='error'>Enter no of Openings</p>",
			venue: "<p class='error'>Enter the Venue</p>"

		    }
		});

	    });

	</script>

    </head>

    <body>
	<form action="" method="POST" name="recruitementList" id="recruitementList">
	    <?php include('include/header.php'); ?>
	    <?php include('include/nav.php'); ?>

	    <?php if ($thankyouMessage == 2) { ?>
    	    <div id="experiencetab" class="container mar-t20">
    		<div class="alert alert-success" role="alert">

    		    Thank you for submitting the request it is in process. Based on the inputs provided by you the search engine will screen the database for the best fit. This might take a moment please check your registered mailid for more updates on this.
    		    <br/>
    		    <a href="addnewRecruitment.php">Click here to add one more Job description</a>
    		    <br/>
    		    <a href='recruitementList.php'>Click to return to main page</a>





    		</div>
    	    </div>
		<?php
	    }
	    else if ($thankyouMessage == 1) {
		?>
    	    <div id="fresherResumeTab" class="container mar-t20">
    		<div class="alert alert-info" role="alert">There are " <?php echo $fresherResumeCount; ?>" resumes in our database that meet your criteria. Please click on Download Resumes tab to download."
    		    <br/>
    		    <a href="addnewRecruitment.php">Click here to add one more Job description</a>
    		    <br/>
    		    <a href='recruitementList.php'>Click to return to main page</a>
    		</div>
    	    </div>
		<?php
	    }
	    else if ($thankyouMessage == 3) {
		?>
    	    <div id="fresherResumeTab" class="container mar-t20">
    		<div class="alert alert-danger" role="alert">
    		    Sorry, you have not subscribed to our service, Please contact us (+91-80-4078 8574) or email us : info@nanochipsolutions.com
    		    <br/>
    		    <a href="addnewRecruitment.php">Click here to add one more Job description</a>
    		    <br/>
    		    <a href='recruitementList.php'>Click to return to main page</a>
    		</div>
    	    </div>
		<?php
	    }
	    else {
		?>

    	    <div class="container mar-t30">
    		<div class="row">
    		    <div class="form-horizontal">

    			<div class="form-group">
    			    <label class="col-sm-2 control-label"> Name</label>
    			    <div class="col-sm-3">
    				<input  class="form-control" type="text"  readonly="readonly" value='<?php echo $requiterName; ?>'>
    			    </div>

    			    <label class="col-sm-2 control-label"> Company</label>
    			    <div class="col-sm-3">
    				<input type='text' class="form-control" readonly="readonly" value="<?php echo $company; ?>">
    			    </div>
    			</div>
    			<div class="form-group">
    			    <label class="col-sm-2 control-label"> Email</label>
    			    <div class="col-sm-3">
    				<input  class="form-control" type="text"  readonly="readonly" value='<?php echo $email; ?>'>
    			    </div>

    			    <label class="col-sm-2 control-label"> Mobile</label>
    			    <div class="col-sm-3">
    				<input type='text' class="form-control" readonly="readonly" value="<?php echo $mobile; ?>">
    			    </div>
    			</div>
    			<div class="form-group">
    			    <label class="col-sm-2 control-label">Designation</label>
    			    <div class="col-sm-3">
    				<input  class="form-control" type="text"  readonly="readonly" value='<?php echo $designation; ?>'>
    			    </div>
    			</div>

    			<div class="form-group" >
    			    <label class="col-sm-4 control-label">Recruitement is for </label>
    			    <div class="col-sm-8">
    				<label class="radio-inline">
    				    <input type="radio" name="experience_type" id="experience_type" value="Graduate Intern" onclick="fnshowfreshertab(0)">Graduate Intern
    				</label>
    				<label class="radio-inline">
    				    <input type="radio" name="experience_type" id="experience_type" value="Skilled Graduate Intern"  checked="checked" onclick="fnshowfreshertab(2)">Skilled Graduate Intern
    				</label>
    				<label class="radio-inline">
    				    <input type="radio" name="experience_type" id="experience_type" value="Experience" onclick="fnshowfreshertab(1)">Experienced Professionals
    				</label>
    			    </div>
    			</div>
    			<div id="ExperienceDiv2" style='display:none'>
    			    <div class="form-group">
    				<label class="col-sm-2 control-label">Years of Experience<span class="error-text">*</span></label>
    				<div class="col-sm-2">
    				    <input  class="form-control" type="text" class="form-control"  id="years_of_Exp" placeholder="Years of Experience" name="years_of_Exp" />
    				</div>
    			    </div>

    			    <div class="form-group">
    				<label class="col-sm-2 control-label">No of Openings<span class="error-text">*</span></label>
    				<div class="col-sm-2">
    				    <input  class="form-control" type="text" class="form-control" id="exp_no_of_openings" onkeypress="return IsNumeric(event);" maxlength="2"  placeholder="No of Openings" value="10" name="exp_no_of_openings" />
    				</div>
    			    </div>
    			</div>


    			<div class="form-group">
    			    <label class="col-sm-2 control-label">Job Code</label>
    			    <div class="col-sm-10">
    				<input type='text' class="form-control" id="" value="<?php echo $internaljobcode; ?>" name="" readonly="readonly">

    				<input type='hidden' class="form-control" id="internaljobcode" value="<?php echo $internaljobcode; ?>" name="internaljobcode" >
    			    </div>
    			</div>



    			<div class="form-group">
    			    <label class="col-sm-2 control-label">Job Title<span class="error-text">*</span></label>
    			    <div class="col-sm-10">
    				<textarea class="form-control"  rows="1" id="jobTitle" placeholder="Enter Job Title like RTL Verification Engg" name="jobTitle"></textarea>
    			    </div>
    			</div>
    			<div class="form-group" id='SkillRequiredDiv'>
    			    <label class="col-sm-2 control-label">Skills Required</label>
    			    <div class="col-sm-10">
    				<textarea class="form-control" rows="2"  id="jobDescription" placeholder="Enter Skills Required like Perl Scripting, SV Test Bench Creation....," name="jobDescription"></textarea>
    			    </div>
    			</div>
    			<div id="freshertab">
    			    <div class="form-group">
    				<label class="col-sm-2 control-label">Domain Specialisation</label>

    				<div class="col-sm-4">
    				    <select class="form-control" id="domain_type" name="domain_type">
    					<option value='0'>Not Applicable</option>
					    <?php for ($i = 0; $i < count($domain_typeArray); $i++) { ?>
						<option value="<?php echo $domain_typeArray[$i]['idresumetype']; ?>">
						    <?php echo $domain_typeArray[$i]['resumetypename']; ?></option>
					    <?php } ?>

    				    </select>
    				</div>

    			    </div>

    			    <div class="form-group">

    				<label class="col-sm-2 control-label">No of Openings<span class="error-text">*</span></label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" onkeypress="return IsNumeric(event);" maxlength="2" id="noofopenings" name="noofopenings" value="10"
    					   value="">
    				</div>
    			    </div>
    			    <div class="form-group">
    				<label class="col-sm-2 control-label">Rv-Cutoff (%)</label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" id="rvranking" name="rvranking"
    					   value="60">
    				</div>
    				<label class="col-sm-2 control-label">Min Qualification</label>
    				<div class="col-sm-4">
    				    <label class="radio-inline">
    					<input type="radio" name="minqualification" id="minqualification" value="BE"  onclick="fnMinimumQualification('BE')"> BE
    				    </label>
    				    <label class="radio-inline">
    					<input type="radio" name="minqualification" id="minqualification" value="ME" onclick="fnMinimumQualification('ME')">ME
    				    </label>
    				    <label class="radio-inline">
    					<input type="radio" name="minqualification" id="minqualification" value="BE/ME" onclick="fnMinimumQualification('BE/ME')" checked="checked">BE or ME
    				    </label>
    				</div>
    			    </div>


    			    <div class="form-group" id="MECutOffDiv">
    				<label class="col-sm-2 control-label">ME Cut-off (%)</label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" id="pgcutoff" name="pgcutoff"
    					   value="55">
    				</div>
    				<label class="col-sm-2 control-label">ME Year of passing Between -</label>
    				<div class="col-sm-2">
    				    <select class="form-control" id="pgpassoutyearFrom" name="pgpassoutyearFrom">
    					<option value=''>Not Applicable</option>
					    <?php for ($i = 0; $i < count($yeararray); $i++) { ?>
						<option value="<?php echo $yeararray[$i]['years']; ?>"><?php echo $yeararray[$i]['years']; ?></option>
					    <?php } ?>

    				    </select>
    				</div>
    				<label class="col-sm-2 control-label">ME To Year</label>
    				<div class="col-sm-2">
    				    <select class="form-control" id="pgpassoutyearTo" name="pgpassoutyearTo">
    					<option value=''>Not Applicable</option>
					    <?php for ($i = 0; $i < count($yeararray); $i++) { ?>
						<option value="<?php echo $yeararray[$i]['years']; ?>"><?php echo $yeararray[$i]['years']; ?></option>
					    <?php } ?>

    				    </select>
    				</div>
    			    </div>
    			    <div class="form-group">
    				<label class="col-sm-2 control-label">BE Cut-off (%)</label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" id="degcutoff" name="degcutoff"
    					   value="55">
    				</div>
    				<label class="col-sm-2 control-label">BE Year of passing Between -</label>

    				<div class="col-sm-2">
    				    <select class="form-control" id="degpassoutyearFrom" name="degpassoutyearFrom">
    					<option value=''>Not Applicable</option>
					    <?php for ($i = 0; $i < count($yeararray); $i++) { ?>
						<option value="<?php echo $yeararray[$i]['years']; ?>"><?php echo $yeararray[$i]['years']; ?></option>
					    <?php } ?>

    				    </select>
    				</div>
    				<label class="col-sm-2 control-label">BE Year To</label>

    				<div class="col-sm-2">
    				    <select class="form-control" id="degpassoutyearTo" name="degpassoutyearTo">
    					<option value=''>Not Applicable</option>
					    <?php for ($i = 0; $i < count($yeararray); $i++) { ?>
						<option value="<?php echo $yeararray[$i]['years']; ?>"><?php echo $yeararray[$i]['years']; ?></option>
					    <?php } ?>

    				    </select>
    				</div>

    			    </div>
    			    <div class="form-group">
    				<label class="col-sm-2 control-label">PUC Cut-off (%)</label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" id="puccutoff" name="puccutoff"
    					   value="55">
    				</div>

    				<label class="col-sm-2 control-label">PUC Passout Year</label>
    				<div class="col-sm-2">
    				    <select class="form-control" id="pucpassoutyear" name="pucpassoutyear">
    					<option value=''>Not Applicable</option>
					    <?php for ($i = 0; $i < count($yeararray); $i++) { ?>
						<option value="<?php echo $yeararray[$i]['years']; ?>"><?php echo $yeararray[$i]['years']; ?></option>
					    <?php } ?>

    				    </select>
    				</div>

    			    </div>
    			    <div class="form-group">
    				<label class="col-sm-2 control-label">SSLC Cut-off (%)</label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" id="sslccutoff" name="sslccutoff"
    					   value="55">
    				</div>
    				<label class="col-sm-2 control-label">SSLC Passout Year</label>

    				<div class="col-sm-2">
    				    <select class="form-control" id="sslcpassoutyear" name="sslcpassoutyear">
    					<option value='0'>Not Applicable</option>
					    <?php for ($i = 0; $i < count($yeararray); $i++) { ?>
						<option value="<?php echo $yeararray[$i]['years']; ?>"><?php echo $yeararray[$i]['years']; ?></option>
					    <?php } ?>

    				    </select>
    				</div>
    			    </div>


    			    <div class="form-group">
    				<label class="col-sm-2 control-label">Suggested Reading for written test/Interview (If any Specify)</label>
    				<div class="col-sm-10">
    				    <textarea class="form-control" rows="2" id="suggestedreading" Placeholder="Enter Name of Text books to refer,.." name="suggestedreading"></textarea>
    				</div>
    			    </div>

    			    <div class="form-group">
    				<label class="col-sm-2 control-label">Google link to the test location or Type Address<span class="error-text">*</span></label>
    				<div class="col-sm-10">
    				    <textarea class="form-control" rows="1" id="venue" name="venue" Placeholder="Enter Google link to the test location / Address"></textarea>
    				</div>
    			    </div>

    			    <div class="form-group" style='display:none'>
    				<label class="col-sm-4 control-label">Can hold written test at our campus?</label>
    				<div class="col-sm-2">
    				    <label class="radio-inline">
    					<input type="radio" name="writtentest" id="writtentest" value="Yes"> Yes
    				    </label>
    				    <label class="radio-inline">
    					<input type="radio" name="writtentest" id="writtentest" value="No" >No
    				    </label>
    				</div>
    			    </div>
    			    <div class="form-group" style='display:none'>
    				<label class="col-sm-4 control-label">Is hiring for internship position?</label>
    				<div class="col-sm-2">
    				    <label class="radio-inline">
    					<input type="radio" name="internshipposition" id="internshipposition" value="Yes" onclick='showInternshipDisplay(this.value);'> Yes
    				    </label>
    				    <label class="radio-inline">
    					<input type="radio" name="internshipposition" id="internshipposition" value="No" onclick='showInternshipDisplay(this.value);' checked="checked">No
    				    </label>
    				</div>

    			    </div>
    			    <div id='internshipIdOptions' style='display:none'>
    				<div class="form-group">
    				    <label class="col-sm-4 control-label">what is the duration of internship?</label>
    				    <div class="col-sm-3">
    					<input type='text' class="form-control" id="internshipduration" name="internshipduration"
    					       value="" Placeholder="[0-9 Months]">

    				    </div>
    				</div>

    				<div class="form-group">
    				    <label class="col-sm-4 control-label">Are placement assured after internship?</label>
    				    <div class="col-sm-2">
    					<label class="radio-inline">
    					    <input type="radio" name="placementassured" id="placementassured" value="Yes" checked="checked"> Yes
    					</label>
    					<label class="radio-inline">
    					    <input type="radio" name="placementassured" id="placementassured" value="No" >No
    					</label>
    				    </div>
    				</div>
    			    </div>
    			    <div class="form-group">
    				<label class="col-sm-3 control-label">Is hiring for Permanent Position?</label>
    				<div class="col-sm-2">
    				    <label class="radio-inline">
    					<input type="radio" name="regularposition" id="regularposition" value="Yes" checked=checked> Yes
    				    </label>
    				    <label class="radio-inline">
    					<input type="radio" name="regularposition" id="regularposition" value="No" >No
    				    </label>
    				</div>
    			    </div>

    			    <div class="form-group">
    				<label class="col-sm-3 control-label">Is there any service agreement bond?</label>
    				<div class="col-sm-2">
    				    <label class="radio-inline">
    					<input type="radio" name="agreementbond" id="agreementbond" value="Yes" onclick='agreementbonds(this.value);'> Yes
    				    </label>
    				    <label class="radio-inline">
    					<input type="radio" name="agreementbond" id="agreementbond" value="No" checked="checked" onclick='agreementbonds(this.value);'>No
    				    </label>
    				</div>
    				<div id='agreementId' style='display:none'>
    				    <label class="col-sm-1 control-label">No of Years</label>

    				    <div class="col-sm-2">
    					<input type='text' class="form-control" id="agreementbondyears" name="agreementbondyears"
    					       value="">
    				    </div>
    				    <label class="col-sm-2 control-label">Bond Breakage Amount</label>

    				    <div class="col-sm-2">
    					<input type='text' class="form-control" id="bondBreakageAmount" name="bondBreakageAmount"
    					       value="">
    				    </div>
    				</div>
    			    </div>




    			    <div class="form-group">
    				<label class="col-sm-3 control-label">Written test (Apptitude):</label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" id="writtentestaptitude" name="writtentestaptitude"
    					   value="30 Min">
    				</div>
    			    </div>
    			    <div class="form-group">
    				<label class="col-sm-3 control-label">Written test (Technical):</label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" id="writtentesttechnical" name="writtentesttechnical"
    					   value="30 Min">

    				</div>
    			    </div>
    			    <div class="form-group">
    				<label class="col-sm-3 control-label">Technical interview</label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" id="technicalinterview" name="technicalinterview"
    					   value="30 Min">
    				</div>
    			    </div>
    			    <div class="form-group">
    				<label class="col-sm-3 control-label">General HR interview:</label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" id="generalhrinterview" name="generalhrinterview"
    					   value="30 Min">
    				</div>
    			    </div>
    			    <div style='background-color:Gainsboro;' onmouseover="" style="display:none">
    				<div class="form-group" style="display:none">
    				    <label class="col-sm-2 control-label">Select Discipline</label>
    				    <div class="col-sm-10">
					    <?php for ($i = 0; $i < count($resumetypearray); $i++) {
						?>
						<label class="checkbox-inline">
						    <input type="checkbox" name="resumetype[]" value="<?php echo $resumetypearray[$i]['idresumetype']; ?>"> <?php echo $resumetypearray[$i]['resumetypename']; ?>
						</label>
					    <?php } ?>

    				    </div>
    				</div>
    				<div class="form-group" style="display:none">
    				    <label class="col-sm-2 control-label">Branch of Enggineering</label>
    				    <div class="col-sm-10">
					    <?php
					    for ($i = 0; $i < count($departmentarray); $i++) {
						if ($departmentarray[$i]['iddepartment'] != '999') {
						    ?>
	    					<label class="checkbox-inline">
	    					    <input type="checkbox" name="discipline[]" checked="checked" value="<?php echo $departmentarray[$i]['iddepartment']; ?>"> <?php echo $departmentarray[$i]['department']; ?>
	    					</label>
						    <?php
						}
					    }
					    ?>

    				    </div>
    				</div>
    			    </div>
    			    <div class="form-group" style="display:none">
    				<label class="col-sm-2 control-label">DOCUMENTS REQUIRED TO BE SUBMITTED</label>
    				<div class="col-sm-10">
					<?php for ($i = 0; $i < count($documentarray); $i++) {
					    ?>
					    <label class="checkbox-inline">
						<input type="checkbox" name="documentsrequired[]" value="documentsrequired[<?php echo $documentarray[$i]['iddocuments']; ?>]"> <?php echo $documentarray[$i]['documentname']; ?>
					    </label>
					<?php } ?>

    				</div>
    			    </div>



    			    <div class="form-group">
    				<h3 class="brd-btm mar-b20" style="font-size:16px;font-style:bold;">COMPENSATION/COST TO COMPANY (CTC)(INFORMATION WILL BE TREATED AS CONFIDENTIAL)</h3>
    				<label class="col-sm-2 control-label">Monthly stipened during probation /Internship</label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" id="duringinternship" name="duringinternship"
    					   value="">
    				</div>

    				<label class="col-sm-2 control-label">Monthly salary after confirmation of service</label>
    				<div class="col-sm-2">
    				    <input type='text' class="form-control" id="regularexmployment" name="regularemployment"
    					   value="">
    				</div>
    			    </div>

    			</div>

    		    </div>
    		</div>

    		<div class="clearfix brd-top pad-t20">
    		    <button type="submit" class="btn btn-primary pull-right">SAVE</button>
    		    <button type="submit" class="btn btn-default pull-right mar-r20">RESET</button>
    		</div>

    	    </div>
	    <?php } ?>
	</form>


	<footer class="home-footer">
	    <div class="container">
		<p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>
	    </div>
	</footer>
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<script src="js/bootstrap.min.js"></script>

    </body>
</html>
