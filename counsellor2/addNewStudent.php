<?php

include('../application/conn.php');
include('../include/year.php');
include('../include/department.php');
include('../include/pgcourses.php');
include('../include/reviewstatus.php');
include('../include/councellor.php');
$councellorId = $_SESSION['idcouncellor'];
if ($_POST) {
    //$name = str_replace("'","&#39;",$_POST['name']);
    $name = $_POST['name'];
    $twelth_details = $_POST['twelth_details'];
    $phone = str_replace("'","&#39;",$_POST['phone']);
    $came_through = str_replace("'","&#39;",$_POST['came_through']);
    $sslc_passoutyear = str_replace("'","&#39;",$_POST['sslc_passoutyear']);
    $tenth_percentage = str_replace("'","&#39;",$_POST['tenth_percentage']);
    $deg_passoutyear = str_replace("'","&#39;",$_POST['deg_passoutyear']);
    $deg_department = str_replace("'","&#39;",$_POST['deg_department']);
    $deg_othercoursename = str_replace("'","&#39;",$_POST['deg_othercoursename']);
    $email = str_replace("'","&#39;",$_POST['email']);
    $hometown = str_replace("'","&#39;",$_POST['hometown']);
    $pgdip_coursename = str_replace("'","&#39;",$_POST['pgdip_coursename']);
    $puc_passoutyear = str_replace("'","&#39;",$_POST['puc_passoutyear']);
    $puc_percentage = str_replace("'","&#39;",$_POST['puc_percentage']);
    $pg_passoutyear = str_replace("'","&#39;",$_POST['pg_passoutyear']);
    $pg_department = str_replace("'","&#39;",$_POST['pg_department']);
    $pg_othercoursename = str_replace("'","&#39;",$_POST['pg_othercoursename']);
    $councellor = str_replace("'","&#39;",$_POST['councellor']);
    $review_status = str_replace("'","&#39;",$_POST['review_status']);
    $review_reason = str_replace("'","&#39;",$_POST['reason']);

    $othercourses = str_replace("'","&#39;",$_POST['othercourses']);
    $other_coursename = str_replace("'","&#39;",$_POST['other_coursename']);
    $other_institutename = str_replace("'","&#39;",$_POST['other_institutename']);
    $other_courseduration = str_replace("'","&#39;",$_POST['other_courseduration']);
    $primary_reason = str_replace("'","&#39;",$_POST['primary_reason']);
    $vlsi_rate = str_replace("'","&#39;",$_POST['vlsi_rate']);
    $joboffer = str_replace("'","&#39;",$_POST['joboffer']);
    $timeduration = str_replace("'","&#39;",$_POST['timeduration']);
    $embedded_rate = str_replace("'","&#39;",$_POST['embedded_rate']);
    $income = str_replace("'","&#39;",$_POST['income']);
    $assignCouncellor = str_replace("'","&#39;",$_POST['idcouncellor']);
    $created_date = date('Y-m-d H:i:s');

    $deg_percentagetype = str_replace("'","&#39;",$_POST['deg_percentagetype']);
    $deg_percentage = str_replace("'","&#39;",$_POST['deg_percentage']);
    $pg_percentagetype = str_replace("'","&#39;",$_POST['pg_percentagetype']);
    $pg_percentage = str_replace("'","&#39;",$_POST['pg_percentage']);
    $be_seatquota = str_replace("'","&#39;",$_POST['be_seatquota']);
    $be_attempt = str_replace("'","&#39;",$_POST['be_attempt']);
    $be_subject = str_replace("'","&#39;",$_POST['be_subject']);
    $me_seatquota = str_replace("'","&#39;",$_POST['me_seatquota']);
    $me_attempt = str_replace("'","&#39;",$_POST['me_attempt']);
    $me_subject = str_replace("'","&#39;",$_POST['me_subject']);
    $interested_in = str_replace("'","&#39;",$_POST['interested_in']);
    $vlsi_logic_design = str_replace("'","&#39;",$_POST['vlsi_logic_design']);
    $vlsi_transistor_theory = str_replace("'","&#39;",$_POST['vlsi_transistor_theory']);
    $vlsi_network_analysis = str_replace("'","&#39;",$_POST['vlsi_network_analysis']);

    $vlsi_hdl = str_replace("'","&#39;",$_POST['vlsi_hdl']);
    $embedded_C = str_replace("'","&#39;",$_POST['embedded_C']);
    $embedded_Linux = str_replace("'","&#39;",$_POST['embedded_Linux']);
    $embedded_RTOS = str_replace("'","&#39;",$_POST['embedded_RTOS']);

    $embedded_Microcontroller = str_replace("'","&#39;",$_POST['embedded_Microcontroller']);
    $education_gap = str_replace("'","&#39;",$_POST['education_gap']);
    $education_gap_reason = str_replace("'","&#39;",$_POST['education_gap_reason']);

    $joboffer_company_name = str_replace("'","&#39;",$_POST['joboffer_company_name']);
    $joboffer_joining_date = str_replace("'","&#39;",$_POST['joboffer_joining_date']);
    $joboffer_ctc = str_replace("'","&#39;",$_POST['joboffer_ctc']);

    $expectingjob = str_replace("'","&#39;",$_POST['expectingjob']);
    $expecting_joboffer_company_name = str_replace("'","&#39;",$_POST['expecting_joboffer_company_name']);
    $me_college_name = str_replace("'","&#39;",$_POST['me_college_name']);
    $me_university_name = str_replace("'","&#39;",$_POST['me_university_name']);

    $be_college_name = str_replace("'","&#39;",$_POST['be_college_name']);
    $be_university_name = str_replace("'","&#39;",$_POST['be_university_name']);

    $friendsname = str_replace("'","&#39;",$_POST['friendsname']);
    $professor_name = str_replace("'","&#39;",$_POST['professor_name']);
    $keywords = str_replace("'","&#39;",$_POST['keywords']);
    $weeks_spare = str_replace("'","&#39;",$_POST['weeks_spare']);
    $studenttype = str_replace("'","&#39;",$_POST['studenttype']);
    $enquiry_from = $_POST['enquiry_from'];
    $course_by_counsellor = $_POST['course_by_counsellor'];
$firstQuery = "Insert into tbl_rvstudent
    (studenttype,weeks_spare,friendsname, professor_name, keywords,name,phone,came_through,sslc_passoutyear,tenth_percentage,
      deg_passoutyear,deg_department,deg_othercoursename,
      email,hometown,pgdip_coursename,
      puc_passoutyear,puc_percentage,pg_passoutyear,
      pg_department,pg_othercoursename,othercourses,
      other_coursename,other_institutename,other_courseduration,
      primary_reason,vlsi_rate,joboffer,
      timeduration,embedded_rate,income,created_date,idcouncellor,
      deg_percentage,pg_percentage,deg_percentagetype,pg_percentagetype,
      be_seatquota,be_attempt,be_subject,me_seatquota,me_attempt,
      me_subject,interested_in,vlsi_logic_design,vlsi_transistor_theory,
      vlsi_network_analysis,vlsi_hdl,embedded_C,embedded_Linux,
      embedded_RTOS,embedded_Microcontroller,education_gap,
      education_gap_reason,joboffer_company_name,joboffer_joining_date,
      joboffer_ctc,expectingjob,expecting_joboffer_company_name,me_college_name,
      me_university_name,be_college_name,be_university_name,twelth_details,enquiry_from,step)

    Values ('$studenttype','$weeks_spare','$friendsname', '$professor_name', '$keywords','$name','$phone','$came_through','$sslc_passoutyear','$tenth_percentage',
      '$deg_passoutyear','$deg_department','$deg_othercoursename',
      '$email','$hometown','$pgdip_coursename',
      '$puc_passoutyear','$puc_percentage','$pg_passoutyear',
      '$pg_department','$pg_othercoursename','$othercourses',
      '$other_coursename','$other_institutename','$other_courseduration',
      '$primary_reason','$vlsi_rate','$joboffer',
      '$timeduration','$embedded_rate','$income','$created_date','$assignCouncellor',
      '$deg_percentage','$pg_percentage','$deg_percentagetype','$pg_percentagetype',
          '$be_seatquota','$be_attempt','$be_subject','$me_seatquota','$me_attempt',
      '$me_subject','$interested_in','$vlsi_logic_design','$vlsi_transistor_theory',
      '$vlsi_network_analysis','$vlsi_hdl','$embedded_C','$embedded_Linux',
      '$embedded_RTOS','$embedded_Microcontroller','$education_gap',
      '$education_gap_reason','$joboffer_company_name','$joboffer_joining_date',
      '$joboffer_ctc','$expectingjob','$expecting_joboffer_company_name','$me_college_name',
      '$me_university_name','$be_college_name','$be_university_name','$twelth_details','$enquiry_from','2')";

    mysql_query("Insert into tbl_rvstudent
    (studenttype,weeks_spare,friendsname, professor_name, keywords,name,phone,came_through,sslc_passoutyear,tenth_percentage,
      deg_passoutyear,deg_department,deg_othercoursename,
      email,hometown,pgdip_coursename,
      puc_passoutyear,puc_percentage,pg_passoutyear,
      pg_department,pg_othercoursename,othercourses,
      other_coursename,other_institutename,other_courseduration,
      primary_reason,vlsi_rate,joboffer,
      timeduration,embedded_rate,income,created_date,idcouncellor,
      deg_percentage,pg_percentage,deg_percentagetype,pg_percentagetype,
      be_seatquota,be_attempt,be_subject,me_seatquota,me_attempt,
      me_subject,interested_in,vlsi_logic_design,vlsi_transistor_theory,
      vlsi_network_analysis,vlsi_hdl,embedded_C,embedded_Linux,
      embedded_RTOS,embedded_Microcontroller,education_gap,
      education_gap_reason,joboffer_company_name,joboffer_joining_date,
      joboffer_ctc,expectingjob,expecting_joboffer_company_name,me_college_name,
      me_university_name,be_college_name,be_university_name,twelth_details,enquiry_from,step,course_by_counsellor)

    Values ('$studenttype','$weeks_spare','$friendsname', '$professor_name', '$keywords','$name','$phone','$came_through','$sslc_passoutyear','$tenth_percentage',
      '$deg_passoutyear','$deg_department','$deg_othercoursename',
      '$email','$hometown','$pgdip_coursename',
      '$puc_passoutyear','$puc_percentage','$pg_passoutyear',
      '$pg_department','$pg_othercoursename','$othercourses',
      '$other_coursename','$other_institutename','$other_courseduration',
      '$primary_reason','$vlsi_rate','$joboffer',
      '$timeduration','$embedded_rate','$income','$created_date','$assignCouncellor',
      '$deg_percentage','$pg_percentage','$deg_percentagetype','$pg_percentagetype',
          '$be_seatquota','$be_attempt','$be_subject','$me_seatquota','$me_attempt',
      '$me_subject','$interested_in','$vlsi_logic_design','$vlsi_transistor_theory',
      '$vlsi_network_analysis','$vlsi_hdl','$embedded_C','$embedded_Linux',
      '$embedded_RTOS','$embedded_Microcontroller','$education_gap',
      '$education_gap_reason','$joboffer_company_name','$joboffer_joining_date',
      '$joboffer_ctc','$expectingjob','$expecting_joboffer_company_name','$me_college_name',
      '$me_university_name','$be_college_name','$be_university_name','$twelth_details','$enquiry_from','2','$course_by_counsellor')");

    $student_id = mysql_insert_id();


    $created_date = date('Y-m-d H:i:s');
    $councellor = $_POST['councellor'];
    if ($_POST['datepicker'] == '') {
	$_POST['datepicker'] = date('Y-m-d');
    }
    $councelling_date = date('Y-m-d',
	    strtotime($_POST['datepicker']));
    mysql_query("Insert into tbl_rvstudentcouncellor (idstudent,
    councellor_review,councellor_id,created_date,review_status,review_reason,councelling_date) values
    ('$student_id','$councellor','$councellorId','$created_date','$review_status','$review_reason','$councelling_date')");

$secondQuery = "Insert into tbl_rvstudentcouncellor (idstudent,
    councellor_review,councellor_id,created_date,review_status,review_reason,councelling_date) values
    ('$student_id','$councellor','$councellorId','$created_date','$review_status','$review_reason','$councelling_date')";
// Here we define the file path and name 
$target_file = "addStudent.txt"; 
// Here we define the string data that is to be placed into the file
if(!empty($student_id))
{
	$target_file = "successFulladdStudent.txt"; 
$target_file_data = ''.$firstQuery.'---'.$secondQuery;
}
else
{
$target_file = "FailureaddStudent.txt"; 
$target_file_data = ''.$firstQuery.'---'.$secondQuery;
}
// Here we are creating a file(since it does not yet exist) and adding data to it
// Here we are opening and appending to the file 
$handle = fopen($target_file, "a"); 
// Here we define the string data that is to be appended to the data already in file
fwrite($handle, $target_file_data); // write it 
fclose($handle);

if(!empty($student_id))
{
	echo "<script>alert('Data has been saved Successfully');</script>";
}
else
{
	echo "<script>alert('Data has been Failed, Please contact Archana Mam');</script>";
}
    echo "<script>parent.location='studentDetails.php'</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nanochip Solutions</title>

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../css/main.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Bootstrap core JavaScript
	   ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="../js/jquery-1.11.0.min.js"></script>
	<script src="../js/jquery.validation.js"></script>
	<script src="../js/customised_validation.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

	<script>
	    $(function () {
		$("#datepicker").datepicker({minDate: -00, maxDate: "+1M +10D"});
		$('#datepicker').datepicker({dateFormat: 'dd-mm-yy'});
	    });

	    function otherdegcoureseshideshow(id)
	    {
		if (id == '999')
		{
		    $('#degotherschoolcoursename').show();
		}
		else
		{
		    $('#degotherschoolcoursename').hide();
		}
	    }

	    function otherpgcoureseshideshow(id)
	    {
		if (id == '999')
		{
		    $('#pgotherschoolcoursename').show();
		}
		else
		{
		    $('#pgotherschoolcoursename').hide();
		}
	    }

	    function fnothercourses(id)
	    {
		if (id == 'Yes')
		{
		    $('#othercoursesoptions').show();
		    $("#othercoursesQuestion").css("color", "red");
		}
		else
		{
		    $('#othercoursesoptions').hide();
		    $("#othercoursesQuestion").css("color", "black");
		}
	    }

	    function onReviewStatus(id)
	    {
		if (id == 3)
		{
		    $('#reviewreason').show();
		}
		else
		{
		    $('#reviewreason').hide();
		}
	    }

	    function beAttempt(attempt)
	    {
		if (attempt == 'Single')
		{
		    $('#backlogAttempDiv').hide();
		}
		else
		{
		    $('#backlogAttempDiv').show();
		}
	    }

	    function meAttempt(attempt)
	    {
		if (attempt == 'Single')
		{
		    $('#backlogAttempDivME').hide();
		}
		else
		{
		    $('#backlogAttempDivME').show();
		}
	    }

	    function rvdropdown(names)
	    {
		$('#ProfessorNameDiv').hide();
		$('#keywordsDiv').hide();
		$('#friendDiv').hide();
		if (names == 'Professor')
		{
		    $('#ProfessorNameDiv').show();
		} else if (names == 'Website')
		{
		    $('#keywordsDiv').show();
		} else if (names == 'Friends')
		{
		    $('#friendDiv').show();
		}

	    }

	    function fnJobOffer(value)
	    {
		if (value == 'Yes')
		{
		    $('#jobOfferInHand').css("color", "red");
		    $('#jobofferDivYES').show();
		    $('#jobofferDivNO').hide();
		}
		else
		{
		    $('#jobOfferInHand').css("color", "black");

		    $('#jobofferDivYES').hide();
		    $('#jobofferDivNO').show();
		}
	    }

	    function fnExpectingJobOffer(value)
	    {
		if (value == 'Yes')
		{
		    $('#expectingJobLabel').css("color", "red");
		    $('#expectingJobOfferDivYes').show();
		}
		else
		{
		    $('#expectingJobLabel').css("color", "black");

		    $('#expectingJobOfferDivYes').hide();

		}
	    }

	    function fnEducationGap(id)
	    {
		if (id == 'Yes')
		{
		    $('#educationGapDiv').show();
		}
		else
		{
		    $('#educationGapDiv').hide();
		}
	    }
	    function courses(course)
	    {
		if (course == 'vlsi')
		{
		    $('#vlsidiv').show();
		    $('#embeddeddiv').hide();
		} else if (course == 'embedded')
		{
		    $('#vlsidiv').hide();
		    $('#embeddeddiv').show();
		} else
		{
		    $('#vlsidiv').show();
		    $('#embeddeddiv').show();
		}
	    }

	    function fnPrimaryReason(id)
	    {
		if (id == 'other Technical services exams')
		{
		    $("#primaryReasonLable").css("color", "red");
		}
		else
		{
		    $("#primaryReasonLable").css("color", "black");
		}
	    }

	    function fnIncomeOfFamily(id)
	    {

		if (id == 'less than 3 Lack')
		{
		    $("#incomeFamilyLabel").css("color", "red");
		}
		else
		{
		    $("#incomeFamilyLabel").css("color", "black");
		}
	    }
	</script>
    </head>

    <body>
	<form action="" method="POST" id="academicProject">
<?php include('include/header.php'); ?>
	    <?php include('include/nav.php'); ?>
	    <div class="container mar-t30">

		<div class="container mar-t10">
		    <h3 class="brd-btm mar-b20">Student Details</h3>
		    <div class="row">
			<div class="form-horizontal col-sm-6">
			    <div class="form-group">
				<label class="col-sm-5 control-label">First Name </label>
				<div class="col-sm-7">
				    <input type="text" class="form-control" placeholder="First Name" id="name" name="name" value="<?php echo $firstName; ?>">
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-sm-5 control-label">Mobile</label>
				<div class="col-sm-7">
				    <input type="text" class="form-control" placeholder="Mobile No" id="phone" name="phone" value="<?php echo $firstName; ?>">
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-sm-5 control-label">how did you come to know about RV-VLSI</label>
				<div class="col-sm-7">
				    <select class="form-control" id="came_through" name="came_through" onchange="rvdropdown(this.value)">
					<option value="select">Please select</option>
					<option value="Friends">Friends</option>
					<option value="Website">Website</option>
					<option value="RV-VLSI-Alumini">RV-VLSI-Alumini</option>
					<option value="Professor">College Professor</option>
					<option value="Friend of Friend">Friend of Friend</option>
					<option value="Industry Reference">Industry Reference</option>
					<option value="Govt Reference">Govt Reference</option>


				    </select>
				</div>
			    </div>
			    <div class="clearfix"></div>
			    <div class="form-group" id="friendDiv" style="display:none">
				<label class="col-sm-5 control-label">Friends Name</label>
				<div class="col-sm-7">
				    <input type="text" class="form-control" placeholder="Friends Name" id="friendsname" name="friendsname">
				</div>
			    </div>
			    <div class="form-group" id="keywordsDiv" style="display:none">
				<label class="col-sm-5 control-label">Key Words used to search</label>
				<div class="col-sm-7">
				    <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="keywords">
				</div>
			    </div>
			    <div class="form-group" id="ProfessorNameDiv" style='display:none'>
				<label class="col-sm-5 control-label">Professor Name</label>
				<div class="col-sm-7">
				    <input type="text" class="form-control" placeholder="Professor Name" id="professor_name" name="professor_name">
				</div>
			    </div>
			    <h3 class="brd-btm mar-b20">10th Details</h3>
			    <div class="form-group">
				<label class="col-sm-5 control-label">Passed Out </label>
				<div class="col-sm-7">
				    <select class="form-control" id="sslc_passoutyear" name="sslc_passoutyear">
					<option value=''>Select</option>
<?php for ($i = 0; $i < count($yeararray); $i++) { ?>
    					<option value="<?php echo $yeararray[$i]['years']; ?>" <?php if ($sslcpassoutyear == $yeararray[$i]['years']) {
	echo "selected=selected";
    } ?>><?php echo $yeararray[$i]['years']; ?></option>
					<?php } ?>

				    </select>
				</div>
			    </div>

			    <div class="form-group">
				<label class="col-sm-5 control-label">Percentage</label>
				<div class="col-sm-7">
				    <input type="text" class="form-control" placeholder="Percentage" id="tenth_percentage" name="tenth_percentage" value="<?php echo $firstName; ?>">
				</div>
			    </div>

			    <h3 class="brd-btm mar-b20">B.E / Degree Details</h3>
			    <div class="form-group">
				<label class="col-sm-5 control-label">Passed Out </label>
				<div class="col-sm-7">
				    <select class="form-control" id="deg_passoutyear" name="deg_passoutyear">
					<?php for ($i = 0; $i < count($yeararray); $i++) { ?>
    					<option value="<?php echo $yeararray[$i]['years']; ?>" <?php if ($degpassoutyear == $yeararray[$i]['years']) {
					    echo "selected=selected";
					} ?>><?php echo $yeararray[$i]['years']; ?></option>
<?php } ?>

				    </select>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-sm-5 control-label">Branch</label>
				<div class="col-sm-7">
				    <select class="form-control" id="deg_department" name="deg_department" onchange="otherdegcoureseshideshow(this.value)">
						<?php for ($i = 0; $i < count($departmentarray); $i++) { ?>
    					<option value="<?php echo $departmentarray[$i]['iddepartment']; ?>"
    <?php if ($degdepartment == $departmentarray[$i]['iddepartment']) {
	echo "selected=selected";
    }; ?>><?php echo $departmentarray[$i]['department']; ?></option>
<?php } ?>

				    </select>
				</div>
			    </div>
			    <div class="form-group" id="degotherschoolcoursename" style='display:none'>
				<label class="col-sm-5 control-label">Course Name </label>
				<div class="col-sm-7">
				    <input type="name" class="form-control" placeholder="Course Name" id="deg_othercoursename" name="deg_othercoursename" value="<?php echo $deg_othercoursename; ?>">
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-sm-5 control-label">College Name</label>
				<div class="col-sm-7">
				    <input type="name" class="form-control" placeholder="College Name" id="be_college_name" name="be_college_name" value="">
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-sm-5 control-label">University Name </label>
				<div class="col-sm-7">
				    <input type="name" class="form-control" placeholder="University Name" id="be_university_name" name="be_university_name" value="">
				</div>
			    </div>

                            <div class="form-group">
				<label class="col-sm-5 control-label">Aggregate Marks </label>
				<div class="col-sm-7">
				    <label class="radio-inline">
					<input type="radio" name="deg_percentagetype" id="deg_percentagetype" value="Percentage" checked="checked"> Percentage
				    </label>
				    <label class="radio-inline">
					<input type="radio" name="deg_percentagetype" id="deg_percentagetype" value="CGPA" checked="checked"> CGPA(out of 10 points)
				    </label>
				    <input type="text" class="form-control mar-t10" placeholder="" id="deg_percentage" name="deg_percentage" value="<?php echo $degpercentage; ?>">
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-sm-5 control-label">Seat Type</label>
				<div class="col-sm-7">
				    <label class="radio-inline">
					<input type="radio" name="be_seatquota" id="be_seatquota" value="Merit" checked="checked"> Merit
				    </label>
				    <label class="radio-inline">
					<input type="radio" name="be_seatquota" id="be_seatquota" value="Payment" > Payment/Management
				    </label>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-sm-5 control-label">Attempts in BE</label>
				<div class="col-sm-7">
				    <label class="radio-inline">
					<input type="radio" name="be_attempt" id="be_attempt" value="Single" checked="checked" onclick="beAttempt('Single')"> Single Attempt
				    </label>
				    <label class="radio-inline">
					<input type="radio" name="be_attempt" id="be_attempt" value="Backlog" onclick="beAttempt('Backlog')"> Backlog
				    </label>
				</div>
			    </div>
			    <div class="form-group" id="backlogAttempDiv" style='display:none'>
				<label class="col-sm-5 control-label">Subjects</label>
				<div class="col-sm-7">
				    <input type="name" class="form-control" placeholder="Subject1, Subject2..." id="be_subject" name="be_subject" value="">
				</div>
			    </div>
			</div>
			<div class="form-horizontal col-sm-6">
			    <div class="form-group">
				<label class="col-sm-5 control-label">Email</label>
				<div class="col-sm-7">
				    <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?php echo $firstName; ?>">
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-sm-5 control-label">Home Town </label>
				<div class="col-sm-7">
				    <input type="text" class="form-control" placeholder="Home Town" id="hometown" name="hometown" value="<?php echo $firstName; ?>">
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-sm-5 control-label">Course Opted</label>
				<div class="col-sm-7">
				    <select class="form-control" id="pgdip_coursename" name="pgdip_coursename" onchange="othercoureseshideshow(this.value)">
<?php for ($i = 0; $i < count($pgCoursesArray); $i++) { ?>
    					<option value="<?php echo $pgCoursesArray[$i]['idpgdipcourses']; ?>" <?php if ($pgDipCoursename == $pgCoursesArray[$i]['idpgdipcourses']) {
	echo "selected=selected";
    } ?>><?php echo $pgCoursesArray[$i]['pgdip_coursename']; ?></option>
<?php } ?>

				    </select>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-sm-5 control-label">State </label>
				<div class="col-sm-7">
				    <select class="form-control" id="state" name="state">
					<option value="Karnataka">Karnataka</option>
					<option value="Andra Pradesh">Andra Pradesh</option>
					<option value="Tamilnadu">Tamilnadu</option>
					<option value="Kerala">Kerala</option>
					<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					<option value="Assam">Assam</option>
					<option value="Bihar">Bihar</option>
					<option value="Chhattisgarh">Chhattisgarh</option>
					<option value="Goa">Goa</option>
					<option value="Gujarat">Gujarat</option>
					<option value="Haryana">Haryana</option>
					<option value="Himachal Pradeshted">Himachal Pradesh</option>
					<option value="Jammu and Kashmir">Jammu and Kashmir</option>
					<option value="Jharkhand">Jharkhand</option>
					<option value="Madhya Pradesh">Madhya Pradesh</option>
					<option value="Maharashtra">Maharashtra</option>
					<option value="Meghalaya">Meghalaya</option>
					<option value="Mizoram">Mizoram</option>
					<option value="Nagaland">Nagaland</option>
					<option value="Odisha">Odisha</option>
					<option value="Punjab">Punjab</option>
					<option value="Rajasthan">Rajasthan</option>
					<option value="Sikkim">Sikkim</option>
					<option value="Telangana">Telangana</option>
					<option value="Tripura">Tripura</option>
					<option value="Uttar Pradesh">Uttar Pradesh</option>
					<option value="Uttarakhand">Uttarakhand</option>
					<option value="West Bengal">West Bengal</option>
				    </select>
				</div>
				<div class="form-group">
				    <label class="col-sm-4 control-label">Are you fresher or experience?</label>
				    <div class="col-sm-5">
					<input type="radio" name="studenttype" id="studenttype" value='Fresher'>Fresher
					<input type="radio" name="studenttype" id="studenttype" value='Experience'>Experience
				    </div>
				</div>
				<h3 class="brd-btm mar-b20">
<input type="radio" name="twelth_details" id="twelth_details" value="PUC" checked="checked"> PUC  Details				
<input type="radio" name="twelth_details" id="twelth_details" value="12th"> 12th
<input type="radio" name="twelth_details" id="twelth_details" value="Diploma" > Diploma
				</h3>

				<div class="form-group">
				    <label class="col-sm-5 control-label">Passed Out </label>
				    <div class="col-sm-7">
					<select class="form-control" id="puc_passoutyear" name="puc_passoutyear">
					    <option value=''>Select</option>
<?php for ($i = 0; $i < count($yeararray); $i++) { ?>
    					    <option value="<?php echo $yeararray[$i]['years']; ?>" <?php if ($pucpassoutyear == $yeararray[$i]['years']) {
	echo "selected=selected";
    } ?>><?php echo $yeararray[$i]['years']; ?></option>
<?php } ?>

					</select>
				    </div>
				</div>


				<div class="form-group">
				    <label class="col-sm-5 control-label">Percentage</label>
				    <div class="col-sm-7">
					<input type="text" class="form-control" placeholder="Percentage" id="puc_percentage" name="puc_percentage" value="<?php echo $firstName; ?>">
				    </div>
				</div>

				<h3 class="brd-btm mar-b20">M.Tech / M.E  Details</h3>

				<div class="form-group">
				    <label class="col-sm-5 control-label">Passed Out <span class="error-text"></span></label>
				    <div class="col-sm-7">
					<select class="form-control" id="pg_passoutyear" name="pg_passoutyear">
					    <option value=''>Select</option>
<?php for ($i = 0; $i < count($yeararray); $i++) { ?>
    					    <label class="radio-inline">
    						<option value="<?php echo $yeararray[$i]['years']; ?>" <?php if ($pgpassoutyear == $yeararray[$i]['years']) {
	echo "selected=selected";
    } ?>><?php echo $yeararray[$i]['years']; ?></option>
					    <?php } ?>

					</select>
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-5 control-label">Branch<span class="error-text"></span></label>
				    <div class="col-sm-7">
					<select class="form-control" id="pg_department" name="pg_department" onchange="otherpgcoureseshideshow(this.value)">
					    <option value=''>Select</option>
<?php for ($i = 0; $i < count($departmentarray); $i++) { ?>
    					    <option value="<?php echo $departmentarray[$i]['iddepartment']; ?>" <?php if ($pgdepartment == $departmentarray[$i]['iddepartment']) {
	echo "selected=selected";
    } ?>><?php echo $departmentarray[$i]['department']; ?></option>
<?php } ?>

					</select>
				    </div>
				</div>
				<div class="form-group" id="pgotherschoolcoursename" style='display:none'>
				    <label class="col-sm-5 control-label">Course Name </label>
				    <div class="col-sm-7">
					<input type="name" class="form-control" placeholder="Course Name" id="pg_othercoursename" name="pg_othercoursename" value="<?php echo $pg_othercoursename; ?>">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-5 control-label">College Name</label>
				    <div class="col-sm-7">
					<input type="name" class="form-control" placeholder="College Name" id="me_college_name" name="me_college_name" value="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-5 control-label">University Name </label>
				    <div class="col-sm-7">
					<input type="name" class="form-control" placeholder="University Name" id="me_university_name" name="me_university_name" value="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-5 control-label">Aggregate Marks </label>
				    <div class="col-sm-7">
					<label class="radio-inline">
					    <input type="radio" name="pg_percentagetype" id="pg_percentagetype" value="Percentage" checked="checked"> Percentage
					</label>
					<label class="radio-inline">
					    <input type="radio" name="pg_percentagetype" id="pg_percentagetype" value="CGPA" checked="checked"> CGPA(out of 10 points)
					</label>
					<input type="text" class="form-control mar-t10" placeholder="" id="pg_percentage" name="pg_percentage" value="<?php echo $pgpercentage; ?>">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-5 control-label">Seat Type</label>
				    <div class="col-sm-7">
					<label class="radio-inline">
					    <input type="radio" name="me_seatquota" id="me_seatquota" value="Merit" checked="checked"> Merit
					</label>
					<label class="radio-inline">
					    <input type="radio" name="me_seatquota" id="me_seatquota" value="Payment" > Payment/Management
					</label>
                                    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-5 control-label">Attempts in ME</label>
				    <div class="col-sm-7">
					<label class="radio-inline">
					    <input type="radio" name="me_attempt" id="me_attempt" value="Single" checked="checked" onclick="meAttempt('Single')"> Single Attempt
					</label>
					<label class="radio-inline">
					    <input type="radio" name="me_attempt" id="me_attempt" value="Backlog" onclick="meAttempt('Backlog')"> Backlog
					</label>
                                    </div>
				</div>
				<div class="form-group" id="backlogAttempDivME" style='display:none'>
				    <label class="col-sm-5 control-label">Subjects</label>
				    <div class="col-sm-7">
					<input type="name" class="form-control" placeholder="Subject1, Subject2..." id="me_subject" name="me_subject" value="">
				    </div>
				</div>

			    </div>


			</div>

			<div class="row">
			    <div class="col-sm-12">
				<h3 class="brd-btm mar-b20">Councellor Questions</h3>

				<div class="form-horizontal">
				    <div class="form-group">
					<label class="col-sm-4 control-label"><span id="othercoursesQuestion" style="color:black";>Have you taken any other skill development courses?</span></label>
					<div class="col-sm-7">
					    <input type="radio" name="othercourses" id="othercourses" value="Yes" onclick="fnothercourses(this.value)">Yes
					    <input type="radio" name="othercourses" id="othercourses" value="No" onclick="fnothercourses(this.value)">No
					</div>
				    </div>
				    <div id="othercoursesoptions" style="display:none">
					<div class="form-group">
					    <label class="col-sm-4 control-label">Course Name</label>
					    <div class="col-sm-3">
						<input type="text" class="form-control" placeholder="Course Name" id="other_coursename" name="other_coursename">
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-4 control-label">Institute Name</label>
					    <div class="col-sm-3">
						<input type="text" class="form-control" placeholder="Institute Name" id="other_institutename" name="other_institutename">
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-4 control-label">Duration</label>
					    <div class="col-sm-3">
						<input type="text" class="form-control" placeholder="Duration" id="other_courseduration" name="other_courseduration">
					    </div>
					</div>
				    </div>
				    <div class="form-group">
					<label class="col-sm-4 control-label"><span id="primaryReasonLable">Primary reason for taking the course?</span></label>
					<div class="col-sm-8">
					    <input type="radio" name="primary_reason" id="primary_reason" value="Job in core industry" onclick="fnPrimaryReason('Job in core industry')">Job in core industry
					    <input type="radio" name="primary_reason" id="primary_reason" value="Highter studies India" onclick="fnPrimaryReason('Highter studies India')">Highter studies in India
					    <input type="radio" name="primary_reason" id="primary_reason" value="Higher studies Abroad" onclick="fnPrimaryReason('Higher studies Abroad')">Preparing for heigher studies Abroad
					    <input type="radio" name="primary_reason" id="primary_reason" value="other Technical services exams" onclick="fnPrimaryReason('other Technical services exams')">Preparing for other Technical exams

					</div>
				    </div>
				    <div class="form-group">
					<label class="col-sm-4 control-label">Do you know the domain you are interested in?</label>
					<div class="col-sm-7">
					    <input type="radio" name="interested_in" id="interested_in" value="VLSI" onclick="courses('vlsi')">VLSI
					    <input type="radio" name="interested_in" id="interested_in" value="EMBEDDED" onclick="courses('embedded')">EMBEDDED
					    <input type="radio" name="interested_in" id="interested_in" value="Both" onclick="courses('both')">Not Sure/ Both

					</div>
				    </div>
				    <div id='vlsidiv' style="display:none;">
					<div class="form-group">
					    <label class="col-sm-4 control-label">How do you rate yourself in Logic Design?</label>
					    <div class="col-sm-5">
						<input type="radio" name="vlsi_logic_design" id="vlsi_logic_design" value='Excellent'>Excellent
						<input type="radio" name="vlsi_logic_design" id="vlsi_logic_design" value='Good'>Good
						<input type="radio" name="vlsi_logic_design" id="vlsi_logic_design" value='Good but need help'>Good but need help
						<input type="radio" name="vlsi_logic_design" id="vlsi_logic_design" value='Average'>Average
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-4 control-label">How do you rate yourself in Transistor theory?</label>
					    <div class="col-sm-5">
						<input type="radio" name="vlsi_transistor_theory" id="vlsi_transistor_theory" value='Excellent'>Excellent
						<input type="radio" name="vlsi_transistor_theory" id="vlsi_transistor_theory" value='Good'>Good
						<input type="radio" name="vlsi_transistor_theory" id="vlsi_transistor_theory" value='Good but need help'>Good but need help
						<input type="radio" name="vlsi_transistor_theory" id="vlsi_transistor_theory" value='Average'>Average
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-4 control-label">How do you rate yourself in network analysis?</label>
					    <div class="col-sm-5">
						<input type="radio" name="vlsi_network_analysis" id="vlsi_network_analysis" value='Excellent'>Excellent
						<input type="radio" name="vlsi_network_analysis" id="vlsi_network_analysis" value='Good'>Good
						<input type="radio" name="vlsi_network_analysis" id="vlsi_network_analysis" value='Good but need help'>Good but need help
						<input type="radio" name="vlsi_network_analysis" id="vlsi_network_analysis" value='Average'>Average
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-4 control-label">How do you rate yourself in HDL Progrmming using verilog?</label>
					    <div class="col-sm-5">
						<input type="radio" name="vlsi_hdl" id="vlsi_hdl" value='Excellent'>Excellent
						<input type="radio" name="vlsi_hdl" id="vlsi_hdl" value='Good'>Good
						<input type="radio" name="vlsi_hdl" id="vlsi_hdl" value='Good but need help'>Good but need help
						<input type="radio" name="vlsi_hdl" id="vlsi_hdl" value='Average'>Average
					    </div>
					</div>
				    </div>
				    <div id='embeddeddiv' style='display:none'>
					<div class="form-group">
					    <label class="col-sm-4 control-label">Microcontroller / Microprocess Basics?</label>
					    <div class="col-sm-5">
						<input type="radio" name="embedded_Microcontroller" id="embedded_Microcontroller" value='Excellent'>Excellent
						<input type="radio" name="embedded_Microcontroller" id="embedded_Microcontroller" value='Good'>Good
						<input type="radio" name="embedded_Microcontroller" id="embedded_Microcontroller" value='Good but need help'>Good but need help
						<input type="radio" name="embedded_Microcontroller" id="embedded_Microcontroller" value='Average'>Average
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-4 control-label">How do you rate yourself in C?</label>
					    <div class="col-sm-5">
						<input type="radio" name="embedded_C" id="embedded_C" value='Excellent'>Excellent
						<input type="radio" name="embedded_C" id="embedded_C" value='Good'>Good
						<input type="radio" name="embedded_C" id="embedded_C" value='Good but need help'>Good but need help
						<input type="radio" name="embedded_C" id="embedded_C" value='Average'>Average
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-sm-4 control-label">How do you rate yourself in Linux?</label>
					    <div class="col-sm-5">
						<input type="radio" name="embedded_Linux" id="embedded_Linux" value='Excellent'>Excellent
						<input type="radio" name="embedded_Linux" id="embedded_Linux" value='Good'>Good
						<input type="radio" name="embedded_Linux" id="embedded_Linux" value='Good but need help'>Good but need help
						<input type="radio" name="embedded_Linux" id="embedded_Linux" value='Average'>Average
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-4 control-label">How do you rate yourself in RTOS?</label>
					    <div class="col-sm-5">
						<input type="radio" name="embedded_RTOS" id="embedded_RTOS" value='Excellent'>Excellent
						<input type="radio" name="embedded_RTOS" id="embedded_RTOS" value='Good'>Good
						<input type="radio" name="embedded_RTOS" id="embedded_RTOS" value='Good but need help'>Good but need help
						<input type="radio" name="embedded_RTOS" id="embedded_RTOS" value='Average'>Average
					    </div>
					</div>
				    </div>
				    <div class="form-group">
					<label class="col-sm-4 control-label">How many weeks can you spare?</label>
					<div class="col-sm-7">
					    <input type="radio" name="weeks_spare" id="weeks_spare"  value='4'>4 Weeks
					    <input type="radio" name="weeks_spare" id="weeks_spare"  value='12'>12 Weeks
					    <input type="radio" name="weeks_spare" id="weeks_spare"  value='16'>16 Weeks
					    <input type="radio" name="weeks_spare" id="weeks_spare"  value='24'>24 Weeks
					</div>
				    </div>

				    <div class="form-group">
					<label class="col-sm-4 control-label">Are you looking Weekday or Weekend Courses?</label>
					<div class="col-sm-7">
					    <input type="radio" name="timeduration" id="timeduration" value="Monday to Friday">Monday to Friday
					    <input type="radio" name="timeduration" id="timeduration" value="Weekend Part Time">Weekend Part Time
					</div>
				    </div>

				    <div class="form-group">
					<label class="col-sm-4 control-label"><span id="incomeFamilyLabel">Approximate income of Family?</span></label>
					<div class="col-sm-7">
					    <input type="radio" name="income" id="income"   value='less than 3 Lack' onclick="fnIncomeOfFamily(this.value)">Less than 3 Lack
					    <input type="radio" name="income" id="income"   value='3 to 5 Lack' onclick="fnIncomeOfFamily(this.value)">3 to 5 Lack
					    <input type="radio" name="income" id="income"   value='greater than 5 Lack' onclick="fnIncomeOfFamily(this.value)">Greater than 5 Lack
					</div>
				    </div>
				    <div class="form-group">
					<label class="col-sm-4 control-label">Any gap in education</label>
					<div class="col-sm-7">
					    <input type="radio" name="education_gap" id="education_gap" value="Yes" onclick="fnEducationGap('Yes');">Yes
					    <input type="radio" name="education_gap" id="education_gap" value="No" checked="checked" onclick="fnEducationGap('No');">No
					</div>
				    </div>
				    <div id='educationGapDiv' style="display:none">
					<div class="form-group">
					    <label class="col-sm-4 control-label">Reason</label>
					    <div class="col-sm-4">
						<input type="name" class="form-control" placeholder="Reason" id="education_gap_reason" name="education_gap_reason" value="">
					    </div>
					</div>
				    </div>
				    <div class="form-group">
					<label class="col-sm-4 control-label"><span id="jobOfferInHand">Do you have a job offer in hand from campus?</span></label>
					<div class="col-sm-7">
					    <input type="radio" name="joboffer" id="joboffer" value="Yes" onclick="fnJobOffer('Yes');">Yes
					    <input type="radio" name="joboffer" id="joboffer" value="No" onclick="fnJobOffer('No');">No
					</div>
				    </div>

				    <div id="jobofferDivYES" style="display:none">
					<div class="form-group">
					    <label class="col-sm-4 control-label">Company Name</label>
					    <div class="col-sm-5">
						<input type="name" class="form-control" placeholder="Company NAme" id="joboffer_company_name" name="joboffer_company_name" value="">
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-4 control-label">Joining Date</label>
					    <div class="col-sm-5">
						<input type="name" class="form-control" placeholder="" id="joboffer_joining_date" name="joboffer_joining_date" value="">
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-4 control-label">CTC</label>
					    <div class="col-sm-5">
						<input type="name" class="form-control" placeholder="" id="joboffer_ctc" name="joboffer_ctc" value="">
					    </div>
					</div>
				    </div>
				    <div id="jobofferDivNO" style="display:none">

					<div class="form-group">
					    <label class="col-sm-4 control-label"><span id="expectingJobLabel">Are you expecting a job ?</span></label>
					    <div class="col-sm-4">
						<input type="radio" name="expectingjob" id="expectingjob" value="Yes" onclick="fnExpectingJobOffer('Yes');">Yes
						<input type="radio" name="expectingjob" id="expectingjob" value="No" checked="checked" onclick="fnExpectingJobOffer('No');">No
					    </div>
					</div>
				    </div>
				    <div id="expectingJobOfferDivYes" style="display:none">
					<div class="form-group">
					    <label class="col-sm-4 control-label">Company Name</label>
					    <div class="col-sm-4">
						<input type="name" class="form-control" placeholder="Company NAme" id="expecting_joboffer_company_name" name="expecting_joboffer_company_name" value="">
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-4 control-label">Joining Date</label>
					    <div class="col-sm-4">
						<input type="name" class="form-control" placeholder="" id="expecting_joboffer_joining_date" name="expecting_joboffer_joining_date" value="">
					    </div>
					</div>
				    </div>



				</div>
			    </div>
			    <div class="row">
				<div class="col-sm-12">
				    <h3 class="brd-btm mar-b20">Councellor Comments</h3>

				    <div class="form-horizontal">
					<div class="form-group">
					    <label class="col-sm-2 control-label">Councellor Comments</label>
					    <div class="col-sm-10">
						<textarea class="form-control" rows="3"  placeholder="" id="councellor" name="councellor"></textarea>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Follow up action</label>
					    <div class="col-sm-3">
						<select class="form-control" id="review_status" name="review_status" onchange="onReviewStatus(this.value)">
<?php for ($i = 0; $i < count($reviewStatusArray); $i++) { 
	  if($reviewStatusArray[$i]['idreviewstatus']<'1000'){?>
    <option value="<?php echo $reviewStatusArray[$i]['idreviewstatus']; ?>"
    <?php if ($reviewStatusArray == $reviewStatusArray[$i]['idreviewstatus']) {
	echo "selected=selected";
    }; ?>>
    <?php echo $reviewStatusArray[$i]['reviewname']; ?></option>
<?php }} ?>

						</select>
					    </div>
					
					    <label class="col-sm-1 control-label">Enquiry From</label>
					    <div class="col-sm-2">
						<select class="form-control" id="enquiry_from" name="enquiry_from">
<?php for ($i = 0; $i < count($reviewStatusArray); $i++) { 
	  if($reviewStatusArray[$i]['idreviewstatus']>='1000'){?>
    <option value="<?php echo $reviewStatusArray[$i]['idreviewstatus']; ?>"
    <?php if ($reviewStatusArray == $reviewStatusArray[$i]['idreviewstatus']) {
	echo "selected=selected";
    }; ?>>
    <?php echo $reviewStatusArray[$i]['reviewname']; ?></option>
<?php }} ?>

						</select>
					    </div>
					    <label class="col-sm-1 control-label">Course</label>
					    <div class="col-sm-2">
						<select class="form-control" id="course_by_counsellor" name="course_by_counsellor">
					<option value="ADAD_PD">PD</option>
					<option value="ADAD_FC">FC</option>
					<option value="ADAD_RTL">RTL</option>
					<option value="EMBEDDED">EMBEDDED</option>

						</select>
					    </div>
					</div>

					<div class="form-group" id='reviewreason' style='display:none'>
					    <label class="col-sm-2 collor
						   ntrol-label">Reason</label>
					    <div class="col-sm-10">
						<input type="text" class="form-control" rows="3"  placeholder="" id="reason" name="reason"/>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Assign To</label>
					    <div class="col-sm-5">
						<select class="form-control" id="idcouncellor" name="idcouncellor">
<?php for ($i = 0; $i < count($councellorarray); $i++) { ?>
    						    <option value="<?php echo $councellorarray[$i]['idcouncellor']; ?>"
    							    ><?php echo $councellorarray[$i]['name']; ?></option>
<?php } ?>

						</select>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Next Councelling Date</label>
					    <div class="col-sm-5">
						<input  class="form-control" type="text" name='datepicker' id="datepicker">
					    </div>
					</div>
				    </div>
				</div>
			    </div>

			    <div class="clearfix brd-top pad-t20">
				<button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">Save & Continue</button>
			    </div>
			</div>
		    </div>

		    <footer class="home-footer">
			<div class="container">
			    <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>
			</div>
		    </footer>
		    <!-- Bootstrap core JavaScript
		    ================================================== -->
		    <!-- Placed at the end of the document so the pages load faster -->
		    </form>
		    </body>

		    </html>
