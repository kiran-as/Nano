<?php
include('../application/conn.php');

$idrecruiter = $_SESSION['idrecruiter'];
$studentSql = mysql_query("Select a.*,b.idrecruiter, b.company from tbl_recruitement as a ,tbl_recruiter as b
	                        where a.idrecruiter=b.idrecruiter and a.idrecruiter=$idrecruiter");
$i = 0;
$recruitementArray = array();
while ($row = mysql_fetch_assoc($studentSql)) {
    $recruitementArray[$i]['recruitementposition'] = $row['recruitementposition'];
    $recruitementArray[$i]['idrecruitement'] = $row['idrecruitement'];
    $recruitementArray[$i]['username'] = $row['username'];
    $recruitementArray[$i]['company'] = $row['company'];
    $recruitementArray[$i]['recruitementdate'] = $row['recruitementdate'];
    $recruitementArray[$i]['status'] = $row['status'];
    $recruitementArray[$i]['noofopening'] = $row['noofopening'];
    $recruitementArray[$i]['interviewdate'] = $row['interviewdate'];
    $recruitementArray[$i]['experience_type'] = $row['experience_type'];
    $recruitementArray[$i]['jobcode'] = $row['jobcode'];
        $recruitementArray[$i]['excelfilename'] = $row['excelfilename'];
    $companyName  = $row['company'];
    $i++;
}

if ($_POST['downloadzipId']) {

    $i = 0;
    $idrecruitement = $_POST['downloadzipId'];
    $studentSql = mysql_query(" Select rvvlsiid,mobile from tbl_student where idstudent in
	           (select idstudent from tbl_recruitementresumes where idrecruitement=$idrecruitement)");
    while ($row = mysql_fetch_assoc($studentSql)) {
	$files['files'][$i] = $row['rvvlsiid'] . '.pdf';

	$Mobile = '9538130954';
	  //  $time = urlencode("Congragulations, your resume has been tagged for a job opening in ($companyname) stay tuned for more updates from ($companyname)");
	    $ch = curl_init();
	  //  $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&message=$time&response=Y";
	    $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=subhas&pass=subhas&senderid=NANOCH&dest_mobileno=$Mobile&tempid=34762&F1=$companyName&F2=$companyname&response=Y";
	    //set the url, number of POST vars, POST data
	      curl_setopt($ch, CURLOPT_URL, $url);
 curl_exec($ch);

	$i++;
    }


    $file_folder = $_POST['jobcode'] . '/'; //
    // Checking files are selected
    $zip = new ZipArchive(); // Load zip library
    $zip_name = $_POST['jobcode'] . ".zip"; // Zip name
    if ($zip->open($zip_name,
		    ZIPARCHIVE::CREATE) !== TRUE) {
	// Opening zip file to load files
	$error .= "* Sorry ZIP creation failed at this time";
    }

    //$file = '1ADPDB250101.pdf';
    foreach ($files['files'] as $file) {

	$zip->addFile($file_folder . $file); // Adding files into zip
    }
    $zip->close();
    if (file_exists($zip_name)) {
// push to download the zip
	header('Content-type: application/zip');
	header('Content-Disposition: attachment; filename="' . $zip_name . '"');
	readfile($zip_name);
// remove zip file is exists in temp path
	unlink($zip_name);
	exit;
    }
    
}
?>
<link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">

    $(document).ready(function () {
	$('#example').dataTable({
	    "order": [[3, "desc"]]
	});
    });
</script>
<script type="text/javascript">

    function fnChangeApprove(approvestatus)
    {
	approvestatus = approvestatus.split('--');
	if (approvestatus[0] == 'Yes')
	{
	    cnfStatus = confirm('Do you really want to make it as UnApprove?');
	    if (cnfStatus == true)
	    {
		formData = 'idrecruitement=' + approvestatus[1] + '&type=Approve&Status=UnApprove';
		$.ajax({
		    url: "ajax/ajax_recruitementupdates.php",
		    type: "POST",
		    data: formData,
		    success: function (data, textStatus, jqXHR)
		    {
			parent.location = 'recruitementList.php';
		    },
		    error: function (jqXHR, textStatus, errorThrown)
		    {

		    }
		});
	    }
	}

	if (approvestatus[0] == 'No')
	{
	    cnfStatus = confirm('Do you really want to make it as Approve?');
	    if (cnfStatus == true)
	    {
		formData = 'idrecruitement=' + approvestatus[1] + '&type=Approve&Status=Approve';
		$.ajax({
		    url: "ajax/ajax_recruitementupdates.php",
		    type: "POST",
		    data: formData,
		    success: function (data, textStatus, jqXHR)
		    {
			parent.location = 'recruitementList.php';
		    },
		    error: function (jqXHR, textStatus, errorThrown)
		    {

		    }
		});
	    }
	}
    }
</script>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/main.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<script type="text/javascript">
    function downloadZipFile(idRecruitement, jobCode)
    {
	cnfStatus = confirm('Do you really want to download Resumes?');
	if (cnfStatus == true)
	{
	    $('#downloadzipId').val(idRecruitement);
	    $('#jobcode').val(jobCode);
	    $('#excelId').val('');
	    document.downloadForm.submit();
	}
    }

    function downloadExcelId(idRecruitement)
    {
	cnfStatus = confirm('Do you really want to download the Excel?');
	if (cnfStatus == true)
	{
	    $('#excelId').val(idRecruitement);
	    $('#downloadzipId').val('');
	    document.downloadForm.submit();
	}
    }
</script>
<body>
    <?php include('include/header.php'); ?>
    <?php include('include/nav.php'); ?>
    <div class="container mar-t30">
	<p class="alert alert-success txtc font16-sm-reg  label-info"><a href="addnewRecruitment.php">Click here</a> or Click on Add New Position button to create the job description to shortlist the best resume according to your
	    job description.</p>
	<div class="clearfix brd-btm pad-b20" style="display:">
	    <a href="addnewRecruitment.php" class="btn btn-primary pull-right" >+ ADD New Position</a>
	</div>

	<?php if (count($recruitementArray) > 0) { ?>
    	<table id="example" class="table table-striped" cellspacing="0" width="100%">
    	    <thead>
    		<tr>
    		    <th>Job Code</th>
    		    <th>Job Type</th>
    		    <th>Job Title</th>
    		    <th>No of Openings</th>
    		    <th>No of Resumes Tagged</th>
    		    <th>Candidate Summary</th>
    		    <th>Resumes</th>
    		</tr>
    	    </thead>

    	    <tbody>
		    <?php
		    for ($i = 0; $i < count($recruitementArray); $i++) {
			$idrecruitement = $recruitementArray[$i]['idrecruitement'];
			$approved = $recruitementArray[$i]['approved'];
			$jobCode = $recruitementArray[$i]['jobcode'];
			$excelfilename = $recruitementArray[$i]['excelfilename'];
			?>
			<tr>
			    <td><?php echo $recruitementArray[$i]['jobcode']; ?></td>
			    <td> <?php echo $recruitementArray[$i]['experience_type']; ?></td>
			    <td><?php echo $recruitementArray[$i]['recruitementposition']; ?></td>
			    <td><?php echo $recruitementArray[$i]['noofopening']; ?></td>

			    <?php
			    $countOfStudentForRecruitmentSql = mysql_query("Select count(idrecruitementresumes) as totalcount
	from tbl_recruitementresumes where idrecruitement='$idrecruitement'");
			    while ($row = mysql_fetch_assoc($countOfStudentForRecruitmentSql)) {
				$totalResumesAttached = $row['totalcount'];
			    }
			    ?>
			    <td><?php echo $totalResumesAttached; ?></td>

			    <?php if ($recruitementArray[$i]['status'] == 'Close') { ?>
			    <td><a href="<?php echo $jobCode;?>/<?php echo $excelfilename;?>" target='_blank'>Download</a></td>
			    <td><a href="javascript:downloadZipFile('<?php echo $idrecruitement; ?>','<?php echo $recruitementArray[$i]['jobcode']; ?>')">Download</a></td>

				<?php
			    }
			    else {
				?>
	    		    <td>In-Process</td>
	    		    	    		    <td>In-Process</td>
	    		    <td>In-Process</td>

			    <?php } ?>
			</tr>
		    <?php } ?>

    	    </tbody>
    	</table>
	<?php } ?>
    </div>
    <form action="" method="POST" name='downloadForm' id='downloadForm'>
	<input type='hidden' id='downloadzipId' name='downloadzipId' value='' />
	<input type='hidden' id='excelId' name='excelId' value='' />
	<input type='hidden' id='jobcode' name='jobcode' value='' />
    </form>
</body>

