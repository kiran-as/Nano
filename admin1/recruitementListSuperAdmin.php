<?php
include('../application/conn.php');
error_reporting(-1);
error_reporting(0);
$studentSql = mysql_query("Select a.*,b.company,b.idrecruiter from tbl_recruitement as a ,tbl_recruiter as b
	                        where a.idrecruiter=b.idrecruiter");
$i = 0;
while ($row = mysql_fetch_assoc($studentSql)) {
    $recruitementArray[$i]['recruitementposition'] = $row['recruitementposition'];
    $recruitementArray[$i]['idrecruitement'] = $row['idrecruitement'];
    $recruitementArray[$i]['company'] = $row['company'];
    $recruitementArray[$i]['recruitementdate'] = $row['recruitementdate'];
    $recruitementArray[$i]['approved'] = $row['approved'];

    $recruitementArray[$i]['status'] = $row['status'];
    $recruitementArray[$i]['idrecruiter'] = $row['idrecruiter'];
    $recruitementArray[$i]['jobcode'] = $row['jobcode'];
      $recruitementArray[$i]['excelfilename'] = $row['excelfilename'];
    $companyName = $row['company'];
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

    	$find = array("&#39;",",");

$imp['sslc_schoolname'] = str_replace($find, '', $imp['sslc_schoolname']);
$imp['puc_schoolname'] = str_replace($find, '', $imp['puc_schoolname']);



$imp['deg_schoolname'] = str_replace($find, '', $imp['deg_schoolname']);
$imp['deg_university'] = str_replace($find, '', $imp['deg_university']);

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

    $i = 0;
    $idrecruitement = $_POST['downloadzipId'];
    $studentSql = mysql_query(" Select rvvlsiid,mobile from tbl_student where idstudent in
	           (select idstudent from tbl_recruitementresumes where idrecruitement=$idrecruitement)");
    while ($row = mysql_fetch_assoc($studentSql)) {
	$files['files'][$i] = $row['rvvlsiid'] . '.pdf';

	$i++;
    }


    $file_folder = '../recruiter/'.$_POST['jobcode'] . '/'; //
    // Checking files are selected
    $zip = new ZipArchive(); // Load zip library
    $zip_name = $_POST['jobcode'] . ".zip"; // Zip name
    if ($zip->open($zip_name, ZIPARCHIVE::CREATE) !== TRUE) {
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

$(document).ready(function() {


    $('#example').dataTable({
       "order": [[ 3, "desc" ]],
                "fnDrawCallback": function() {
                    $('[data-toggle="tooltip"]').tooltip()

  $('.simple-ajax-popup-align-top').magnificPopup({
          type: 'ajax',
          alignTop: true,
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });

        $('.simple-ajax-popup').magnificPopup({
          type: 'ajax'
        });

$('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
    
  });

  $('.image-popup-fit-width').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    image: {
      verticalFit: false
    }
  });

  $('.image-popup-no-margins').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });
            },
      "oLanguage": { "sSearch": "<p class='help-block'>Search for one pattern in the database (only one keyword)</p>" } 
    } );

$('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
    
  });

  $('.image-popup-fit-width').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    image: {
      verticalFit: false
    }
  });

  $('.image-popup-no-margins').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });


} );
</script>

<script type="text/javascript">

    function fnChangeApprove(approvestatus)
    {

	approvestatus = approvestatus.split('--');

	if (approvestatus[0] == 'Open')
	{
	    cnfStatus = confirm('Do you really want Review the recruitement Position');
	    if (cnfStatus == true)
	    {
        $('#loadingDiv').show();
		formData = 'idrecruitement=' + approvestatus[1] + '&type=Approve&Status=UnApprove';
		$.ajax({
		    url: "ajax/ajax_recruitementupdatesMessage.php",
		    type: "POST",
		    data: formData,
		    success: function (data, textStatus, jqXHR)
		    {
          $('#loadingDiv').hide();
			parent.location = 'recruitementListSuperAdmin.php';

		    },
		    error: function (jqXHR, textStatus, errorThrown)
		    {

		    }
		});
	    }
	}

	if (approvestatus[0] == 'Close')
	{
	    cnfStatus = confirm('Do you really Open the Recruitment Position');
	    if (cnfStatus == true)
	    {
         $('#loadingDiv').show();
		formData = 'idrecruitement=' + approvestatus[1] + '&type=Approve&Status=Approve';
		$.ajax({
		    url: "ajax/ajax_recruitementupdatesMessage.php",
		    type: "POST",
		    data: formData,
		    success: function (data, textStatus, jqXHR)
		    {
           $('#loadingDiv').hide();
			parent.location = 'recruitementListSuperAdmin.php';

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
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../css/main.css" rel="stylesheet">


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

<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">
<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="../css/magnific-popup.css"> 

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->

<!-- Magnific Popup core JS file -->
<script src="../js/jquery.magnific-popup.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .loadingDiv{
      text-align: center;

    }
    </style>
  </head>

<body>
    <?php include('include/header.php'); ?>
    <?php include('include/nav.php'); ?>
    <div class="container mar-t30">
        <div class="clearfix brd-btm pad-b20" style="display:none">
	    <a href="addCompanyProject.php" class="btn btn-primary pull-right" >+ ADD PROJECT</a>
	</div>
<div id="loadingDiv" class="loadingDiv" style="display:none"><p>It takes maximum of 5 min,<br/> Dont click until the loading icon disappear</p><img src="../img/nanochipsolution.gif"></img></div>
	<table id="example" class="table table-striped" cellspacing="0" width="100%">
	    <thead>
		<tr>
		    <th>Position</th>
		    <th>Company</th>
		    <th>Resumes Tagged</th>
		    <th>Status</th>
		    <th>View Candidates</th>
		    <th>Search Candidates</th>
		
		    <th>Summary of excel</th>
		    <th>Zip download</th>
		        <th>Job Description</th>
		    <th>Upload</th>
		</tr>
	    </thead>

	    <tbody>
		<?php
		for ($i = 0; $i < count($recruitementArray); $i++) {
		    $idrecruitement = $recruitementArray[$i]['idrecruitement'];
		    $idrecruiter = $recruitementArray[$i]['idrecruiter'];
		    $approved = $recruitementArray[$i]['approved'];
		    $status = $recruitementArray[$i]['status'];
		    $jobCode = $recruitementArray[$i]['jobcode'];
		    $excelfilename = $recruitementArray[$i]['excelfilename'];
		    ?>
    		<tr>
    		    <td><?php echo $recruitementArray[$i]['recruitementposition']; ?></td>
    		    <td><?php echo $recruitementArray[$i]['company']; ?></td>
			<?php
			$countOfStudentForRecruitmentSql = mysql_query("Select count(idrecruitementresumes) as totalcount
	from tbl_recruitementresumes where idrecruitement='$idrecruitement'");
			while ($row = mysql_fetch_assoc($countOfStudentForRecruitmentSql)) {
			    $totalResumesAttached = $row['totalcount'];
			}
			?>
    		    <td><?php echo $totalResumesAttached; ?></td>

<?php if ($recruitementArray[$i]['status'] == 'Review') {?>
    		    <td><a class="simple-ajax-popup-align-top" href='confirmationIframe.php?idrecruitement=<?php echo $idrecruitement;?>'>Review</a></td>

			<?php } else { ?>
			    		    <td><a href="javascript:fnChangeApprove('<?php echo $status . '--' . $idrecruitement; ?>');"><?php echo $recruitementArray[$i]['status']; ?></a></td>
			<?php } ?>


			<?php if ($totalResumesAttached > 0) { ?>
			    <td><a href="viewRecruitementlistCandidates.php?idrecruitement=<?php echo $idrecruitement; ?>" target="_blank">View Candidates</a></td>

			    <?php
			}
			else {
			    ?>
			    <td>Still candidates not assigned</td>

			<?php } ?>

			


			<?php if (($recruitementArray[$i]['status'] == 'Review') || ($recruitementArray[$i]['status'] == 'Close')) { ?>
              <td>Search candidates</td>
			    <?php if(!empty($recruitementArray[$i]['excelfilename']))
			    { ?>
			    <td><a href="../recruiter/<?php echo $jobCode;?>/<?php echo $excelfilename;?>" target='_blank'> Download of Student Summary in Excel</a></td>

			    <?php }
			    else
			    { ?>
			    <td><a href='javascript:downloadExcelId(<?php echo $idrecruitement; ?>)'>Download of Student Summary in Excel</a></td>

			   <?php } ?>
			    <td><a href="javascript:downloadZipFile('<?php echo $idrecruitement; ?>','<?php echo $recruitementArray[$i]['jobcode']; ?>')">Download of Resumes</a></td>

			    <?php
			}
			else {
			    ?>
			    <td><a href="advanceSearchRecruiter.php?idrecruitement=<?php echo $idrecruitement; ?>" target="_blank">Search Candidates</a></td>
			    <td>In Process</td>
			    <td>In Process</td>

			<?php } ?>
    		    <td><a href="editRecruitment.php?idrecruitement=<?php echo $idrecruitement; ?>&idrecruiter=<?php echo $idrecruiter; ?>" target="_blank">View details entered by Recruiter</a></td>
    		    <td><a class="simple-ajax-popup-align-top" href='uploadfileIframe.php?idrecruitement=<?php echo $idrecruitement;?>'>
Upload edited summary resume excel</a></td>
    		</tr>
		<?php } ?>

	    </tbody>
	</table>
    </div>
    <form action="" method="POST" name='downloadForm' id='downloadForm'>

	<input type='hidden' id='downloadzipId' name='downloadzipId' value='' />
	<input type='hidden' id='excelId' name='excelId' value='' />
	<input type='hidden' id='jobcode' name='jobcode' value='' />
    </form>

</div> 

</body>

