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
    $i++;
}

if ($_POST['excelId']) {
    $idrecruitement = $_POST['excelId'];
    $studentSql = mysql_query("Select a.*
			       from tbl_recruitement as a
                               where a.idrecruitement=$idrecruitement");
    $i = 0;
    $recruitementArray = array();
    while ($row = mysql_fetch_assoc($studentSql)) {
	$recruitementposition = $row['recruitementposition'];
	$jobcode = $row['jobcode'];
    }

    $studentSql = "Select a.*,b.department from tbl_student as a, tbl_department as b
                  where a.deg_department=b.iddepartment and a. idstudent in

     (Select idstudent from tbl_recruitementresumes where idrecruitement in ($idrecruitement)) ";

    $result = mysql_query($studentSql);

    header('Content-Type: application/vnd.ms-excel'); //define header info for browser
    header('Content-Disposition: attachment; filename=' . $recruitementposition . '-' . $jobcode . '-' . date('Ymd') . '.xls');
    header('Pragma: no-cache');
    header('Expires: 0');


    echo "SSLC PASSOUT YEAR" . "\t" .
    "SSLC PERCENTAGE" . "\t" .
    "SSLC SCHOOL NAME" . "\t" .
    "PUC PASSOUT YEAR" . "\t" .
    "PUC PERCENTAGE" . "\t" .
    "PUC SCHOOL NAME" . "\t" .
    "DEGREE PASSOUT YEAR" . "\t" .
    "DEGREE SCHOOL NAME" . "\t" .
    "DEGREE PERCENTAGE" . "\t" .
    "DEGREE DEPARTMENT" . "\t" .
    "RV-VLSIID" . "\t" .
    "DEGREE UNIVERSITY" . "\t";

    print("\n");

    while ($imp = mysql_fetch_array($result)) {
	$schollarray = explode(',', $imp['sslc_schoolname']);
	$imp[sslc_schoolname] = $schollarray[0];

	$pucarray = explode(',', $imp['puc_schoolname']);
	$imp[puc_schoolname] = $pucarray[0];


	$output = str_replace("\t", "t", trim(stripslashes($imp[sslc_passoutyear]))) . "\t" .
		str_replace("\t", "t", trim(stripslashes($imp[sslc_percentage]))) . "\t" .
		str_replace("\t", "t", trim(stripslashes($imp[sslc_schoolname]))) . "\t" .
		str_replace("\t", "t", trim(stripslashes($imp[puc_passoutyear]))) . "\t" .
		str_replace("\t", "t", trim(stripslashes($imp[puc_percentage]))) . "\t" .
		str_replace("\t", "t", trim(stripslashes($imp[puc_schoolname]))) . "\t" .
		str_replace("\t", "t", trim(stripslashes($imp[deg_passoutyear]))) . "\t" .
		str_replace("\t", "t", trim(stripslashes($imp[deg_schoolname]))) . "\t" .
		str_replace("\t", "t", trim(stripslashes($imp[deg_percentage]))) . "\t" .
		str_replace("\t", "t", trim(stripslashes($imp[department]))) . "\t" .
		str_replace("\t", "t", trim(stripslashes($imp[rvvlsiid]))) . "\t" .
		str_replace("\t", "t", trim(stripslashes($imp[deg_university]))) . "\t";

	$output = preg_replace("/\r\n|\n\r|\n|\r/", ' ', $output);
	print(trim($output)) . "\t\n";
    }
    exit;
}

if ($_POST['downloadzipId']) {
    $jobcode = 'NANOCH41588873';
    var_dump(chmod($jobcode, 0777));

    $files = array();
    $i = 0;
    $idrecruitement = $_POST['downloadzipId'];
    $studentSql = mysql_query(" Select rvvlsiid from tbl_student where idstudent in
	           (select idstudent from tbl_recruitementresumes where idrecruitement=$idrecruitement)");
    while ($row = mysql_fetch_assoc($studentSql)) {
	$files[$i] = 'NANOCH41588873/' . $row['rvvlsiid'] . '.pdf';
	$i++;
    }

    //$files = array('NANOCH41588873/1ADPDB250101.pdf');
    $zipname = 'file.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    foreach ($files as $file) {
	$zip->addFile($file);
    }
    $zip->close();
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename=' . $zipname);
    header('Content-Length: ' . filesize($zipname));
    header('Pragma: no-cache');
    header('Expires: 0');
    // readfile($zipname);
    exit;
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
    function downloadZipFile(idRecruitement)
    {
	cnfStatus = confirm('Do you really want to download Resumes?');
	if (cnfStatus == true)
	{
	    $('#downloadzipId').val(idRecruitement);
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
    		    <th>Position Created Date</th>
    		    <th>No of Openings</th>
    		    <th>Interview Date</th>
    		    <th>No of Resumes Tagged</th>
    		    <th>Status</th>
    		    <th>Over View</th>
    		    <th>Download Zip File</th>
    		</tr>
    	    </thead>

    	    <tbody>
		    <?php
		    for ($i = 0; $i < count($recruitementArray); $i++) {
			$idrecruitement = $recruitementArray[$i]['idrecruitement'];
			$approved = $recruitementArray[$i]['approved'];
			?>
			<tr>
			    <td><?php echo $recruitementArray[$i]['jobcode']; ?></td>
			    <td> <?php echo $recruitementArray[$i]['experience_type']; ?></td>
			    <td><?php echo $recruitementArray[$i]['recruitementposition']; ?></td>
			    <td><?php echo $recruitementArray[$i]['recruitementdate']; ?></td>
			    <td><?php echo $recruitementArray[$i]['noofopening']; ?></td>
			    <td><?php echo $recruitementArray[$i]['interviewdate']; ?></td>

			    <?php
			    $countOfStudentForRecruitmentSql = mysql_query("Select count(idrecruitementresumes) as totalcount
	from tbl_recruitementresumes where idrecruitement='$idrecruitement'");
			    while ($row = mysql_fetch_assoc($countOfStudentForRecruitmentSql)) {
				$totalResumesAttached = $row['totalcount'];
			    }
			    ?>
			    <td><?php echo $totalResumesAttached; ?></td>

			    <?php if ($recruitementArray[$i]['status'] == 'Close') { ?>
	    		    <td><a href="viewRecruitementlistCandidates.php?idrecruitement=<?php echo $idrecruitement; ?>">View Candidates</a></td>
				<?php
			    }
			    else {
				?>
	    		    <td>In-Process</td>
			    <?php } ?>
			    <td><a href='javascript:downloadExcelId(<?php echo $idrecruitement; ?>)'>Resume Summary in Excel</a></td>
			    <td><a href='javascript:downloadZipFile(<?php echo $idrecruitement; ?>)'>Download of Resumes</a></td>
			</tr>
		    <?php } ?>

    	    </tbody>
    	</table>
	<?php } ?>
    </div>
    <form action="" method="POST" name='downloadForm' id='downloadForm'>
	<input type='text' id='downloadzipId' name='downloadzipId' value='' />
	<input type='text' id='excelId' name='excelId' value='' />
    </form>
</body>

