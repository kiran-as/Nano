<?php
include('../application/conn.php');
error_reporting(-1);
error_reporting(0);
$studentSql = mysql_query("Select a.*,b.company,b.idrecruiter from tbl_recruitement as a ,tbl_recruiter as b
	                        where a.idrecruiter=b.idrecruiter order by a.idrecruitement desc");
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

$filename = $jobcode.".csv";
$fp = fopen('php://output', 'w');
$header[] = 'RV-VLSIID';
$header[] = 'FIRST NAME';
$header[] = 'LAST NAME';
$header[] = 'EMAIL';
$header[] = 'MOBILE';
$header[] = 'SSLC PASSOUT YEAR';
$header[] = 'SSLC PERCENTAGE';
$header[] = 'SSLC SCHOOL NAME';
$header[] = 'PUC PASSOUT YEAR';
$header[] = 'PUC PERCENTAGE';
$header[] = 'PUC SCHOOL NAME';
$header[] = 'DEGREE PASSOUT YEAR';
$header[] = 'DEGREE SCHOOL NAME';
$header[] = 'DEGREE PERCENTAGE';
$header[] = 'DEGREE DEPARTMENT';
$header[] = 'DEGREE UNIVERSIT';
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

    $studentSql = "Select a.rvvlsiid,a.firstname,a.lastname,a.email,a.mobile,a.sslc_passoutyear,
    a.sslc_percentage,
a.sslc_schoolname,
a.puc_passoutyear,
a.puc_percentage,
a.puc_schoolname,
a.deg_passoutyear,
a.deg_schoolname,
a.deg_percentage,
b.department,
a.deg_university,
a.sslc_schoolname,
a.puc_schoolname,
a.deg_schoolname,
a.deg_university
 from tbl_student as a, tbl_department as b
                  where a.deg_department=b.iddepartment and a. idstudent in

     (Select idstudent from tbl_recruitementresumes where idrecruitement in ($idrecruitement)) ";

    $result = mysql_query($studentSql);
while($rowss = mysql_fetch_assoc($result))
    {
        $rowss['sslc_schoolname'] = str_replace($find, '', $rowss['sslc_schoolname']);
        $rowss['puc_schoolname'] = str_replace($find, '', $rowss['puc_schoolname']);



        $rowss['deg_schoolname'] = str_replace($find, '', $rowss['deg_schoolname']);
        $rowss['deg_university'] = str_replace($find, '', $rowss['deg_university']);
        fputcsv($fp, $rowss);
    }
    
   /* while ($imp = mysql_fetch_array($result)) {

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
    }*/
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nanochip Solutions - Domain Keyword</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#example').dataTable( {
                "bSort": false
              });
 $('#example1').dataTable( {
                "bSort": false
              });
        } );
    </script> 
<script type="text/javascript">

    function fnChangeApprove(approvestatus)
    {
	approvestatus = approvestatus.split('--');

	if (approvestatus[0] == 'Review')
	{
	    cnfStatus = confirm('Do you really want Review the recruitement Position');

	    if (cnfStatus == true)
	    {
            alert('Email will sent to Venky Sir to review, and cc to Archana Mam');
        $('#loadingDiv').show();
		formData = 'idrecruitement=' + approvestatus[1] + '&type=Approve&Status=Review';
		$.ajax({
		    url: "ajax/ajax_recruitementupdatesMessage.php",
		    type: "POST",
		    data: formData,
		    success: function (datas, textStatus, jqXHR)
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

    if (approvestatus[0] == 'Generate')
    {
        cnfStatus = confirm('The summary of the CSV and pdf will generate now. Do you want to generate it?');
        if (cnfStatus == true)
        {
        $('#loadingDiv').show();
        formData = 'idrecruitement=' + approvestatus[1] + '&type=Approve&Status=Generate';
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


<script type="text/javascript">

    function rejectResumeId(recruitmentId) {
        $('#rejecteResume').val(recruitmentId);
    }
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

    <style>
    .loadingDiv{
      text-align: center;

    }
    </style>
  </head>

<body>
    <?php include('include/nav.php'); ?>

<div id="loadingDiv" class="loadingDiv" style="display:none"><p>It takes maximum of 5 min,<br/> Dont click until the loading icon disappear</p><img src="../img/nanochipsolution.gif"></img></div>

    <section class="nrb-rhs-container">  
         <div class="container-fluid pad-t20">
        <h3 class="nrb-primary-title pad-b10 mar-t5">Step 1: </h3>
        <p class='stepsinrecruiter'>Click on Add Resumes, and assign the students to the particualr job posting, once students are added, click on Generate csv/PDF button.</p>
        <table id="example" class="table nrb-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>JOB CODE</th>
                    <th>POSITION</th>
                    <th>COMPANY</th>
                    <th>JOB DESCRIPTION</th>
                    <th>RESUMES</th>
                    <th>ACTIONS</th>                    
                </tr>
            </thead>
            <tbody>
            <?php
    for ($i = 0; $i < count($recruitementArray); $i++) {
        if(($recruitementArray[$i]['status']=='Open')) {
        $idrecruitement = $recruitementArray[$i]['idrecruitement'];
        $idrecruiter = $recruitementArray[$i]['idrecruiter'];
        $approved = $recruitementArray[$i]['approved'];
        $status = $recruitementArray[$i]['status'];
        $jobCode = $recruitementArray[$i]['jobcode'];
        $excelfilename = $recruitementArray[$i]['excelfilename'];
        $countOfStudentForRecruitmentSql = mysql_query("Select count(idrecruitementresumes) as totalcount
  from tbl_recruitementresumes where idrecruitement='$idrecruitement'");
      while ($row = mysql_fetch_assoc($countOfStudentForRecruitmentSql)) {
          $totalResumesAttached = $row['totalcount'];
      }
     
            
        ?>
                <tr>
                <td><?php echo $jobCode;?></td>
                              <td><?php echo $recruitementArray[$i]['recruitementposition']; ?></td>
            <td><?php echo $recruitementArray[$i]['company']; ?></td>

                    <td><a href="viewRecruitementlistCandidates.php?idrecruitement=<?php echo $idrecruitement; ?>" target="_blank">View Candidates</a></td>     
                    <td><?php echo $totalResumesAttached; ?></td>

<?php if (($recruitementArray[$i]['status'] == 'Generate')) { ?>
<td>
                        <a href="#" class="btn btn-primary btn-sm disabled mar-l5">+ Add Resumes</a>

                        <a href="recruitementListSuperAdminReviewResume.php" class="btn btn-secondary btn-sm ">Generate PDF/XL</a>
                    </td>
 <?php } else if ($recruitementArray[$i]['status'] == 'Open')  {?>
<td>
                        <a href="advanceSearchRecruiter.php?idrecruitement=<?php echo $idrecruitement; ?>" target="_blank" class="btn btn-primary btn-sm">+ Add Resumes</a>

                        <a href="javascript:fnChangeApprove('Generate--<?php echo $idrecruitement; ?>');" class="btn btn-secondary btn-sm">Generate PDF/XL</a>
                    </td> 
 <?php } else {?>
<td>
                        <a href="#" class="btn btn-secondary btn-sm ">Completed.</a>

                    </td> 
 <?php } ?>
                                        
                </tr>
                <?php } }?> 
                </tbody>
                </table>

                
        </div>

        <div class="container-fluid pad-t20">
        <h3 class="nrb-primary-title pad-b10 mar-t5">Step 2: </h3>
        <p class='stepsinrecruiter'>Download the summary of CSV, Validate it and upload the modified one, and send for review. If send for review is disabled, then you have not uploaded the csv. </p>
        <table id="example" class="table nrb-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                 <th>JOB CODE</th>
                    <th>POSITION</th>
                    <th>COMPANY</th>
                    <th>Zip Download</th>
                    <th>Excel Download</th>
                    <th>Upload Excel</th>
                    <th>ACTIONS</th>                    
                </tr>
            </thead>
            <tbody>
            <?php
    for ($i = 0; $i < count($recruitementArray); $i++) {
         if($recruitementArray[$i]['status']=='Generate') {
        $idrecruitement = $recruitementArray[$i]['idrecruitement'];
        $idrecruiter = $recruitementArray[$i]['idrecruiter'];
        $approved = $recruitementArray[$i]['approved'];
        $status = $recruitementArray[$i]['status'];
        $jobCode = $recruitementArray[$i]['jobcode'];
        $excelfilename = $recruitementArray[$i]['excelfilename'];
        $countOfStudentForRecruitmentSql = mysql_query("Select count(idrecruitementresumes) as totalcount
  from tbl_recruitementresumes where idrecruitement='$idrecruitement'");
      while ($row = mysql_fetch_assoc($countOfStudentForRecruitmentSql)) {
          $totalResumesAttached = $row['totalcount'];
      }
     
            
        ?>
                <tr>
                                <td><?php echo $jobCode;?></td>

                <td><?php echo $recruitementArray[$i]['recruitementposition']; ?></td>
                <td><?php echo $recruitementArray[$i]['company']; ?></td>

                     <td><a href="javascript:downloadZipFile('<?php echo $idrecruitement; ?>','<?php echo $recruitementArray[$i]['jobcode']; ?>')">PDF</a></td>

                     <?php if(!empty($recruitementArray[$i]['excelfilename']))
                { ?>
                <td><a href="../recruiter/<?php echo $jobCode;?>/<?php echo $excelfilename;?>" target='_blank'> Excel</a></td>

                <?php }
                else
                { ?>
                    <td><a href='javascript:downloadExcelId(<?php echo $idrecruitement; ?>)'>Excel</a></td>

               <?php } ?>
               

                <?php if(!empty($recruitementArray[$i]['excelfilename']))
                { ?>
                <td><a href="../recruiter/<?php echo $jobCode;?>/<?php echo $excelfilename;?>" target='_blank'> Excel</a></td>
<td>
                        <a href="javascript:fnChangeApprove('Review--<?php echo $idrecruitement; ?>');" class="btn btn-primary btn-sm" >Send for Review</a>
                    </td> 
                <?php }
                else
                { ?>
<td><a class="simple-ajax-popup-align-top" href='uploadfileIframe.php?idrecruitement=<?php echo $idrecruitement;?>'>
Upload Excel</a></td>
<td>
                        <a href="javascript:fnChangeApprove('Review--<?php echo $idrecruitement; ?>');" class="btn btn-primary btn-sm disabled mar-l5" >Send for Review</a>
                    </td> 
               <?php } ?>

                    




                                        
                </tr>
                <?php }}?> 
                </tbody>
                </table>
        </div>
       <div class="container-fluid pad-t20">
        <h3 class="nrb-primary-title pad-b10 mar-t5">Completed Job Openings</h3>
        <table id="example1" class="table nrb-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>JOB CODE</th>
                    <th style='width:25%'>POSITION</th>
                    <th>COMPANY</th>
                    <th>CANDIDATES</th>
                    <th>RESUMES</th>
                    <th>ACTIONS</th>                    
                </tr>
            </thead>
            <tbody>
            <?php
    for ($i = 0; $i < count($recruitementArray); $i++) {
         if($recruitementArray[$i]['status']=='Close') {
        $idrecruitement = $recruitementArray[$i]['idrecruitement'];
        $idrecruiter = $recruitementArray[$i]['idrecruiter'];
        $approved = $recruitementArray[$i]['approved'];
        $status = $recruitementArray[$i]['status'];

        $jobCode = $recruitementArray[$i]['jobcode'];
        $excelfilename = $recruitementArray[$i]['excelfilename'];
        $countOfStudentForRecruitmentSql = mysql_query("Select count(idrecruitementresumes) as totalcount
  from tbl_recruitementresumes where idrecruitement='$idrecruitement'");
      while ($row = mysql_fetch_assoc($countOfStudentForRecruitmentSql)) {
          $totalResumesAttached = $row['totalcount'];
      }
     
            
        ?>
                <tr>
                                <td><?php echo $jobCode;?></td>

                              <td><?php echo $recruitementArray[$i]['recruitementposition']; ?></td>
            <td><?php echo $recruitementArray[$i]['company']; ?></td>

                    <td><a href="viewRecruitementlistCandidates.php?idrecruitement=<?php echo $idrecruitement; ?>" target="_blank">View Candidates</a></td>     
                    <td><?php echo $totalResumesAttached; ?></td>

<?php if (($recruitementArray[$i]['status'] == 'Review')) { ?>
<td>
                        <a href="#" class="btn btn-primary btn-sm disabled mar-l5">+ Add Resumes</a>

                        <a href="recruitementListSuperAdminReviewResume.php" class="btn btn-secondary btn-sm ">Review Resumes</a>
                    </td>
 <?php } else if ($recruitementArray[$i]['status'] == 'Open')  {?>
<td>
                        <a href="advanceSearchRecruiter.php?idrecruitement=<?php echo $idrecruitement; ?>" target="_blank" class="btn btn-primary btn-sm">+ Add Resumes</a>

                        <a href="javascript:fnChangeApprove('Open--<?php echo $idrecruitement; ?>');" class="btn btn-secondary btn-sm">Submit For Review</a>
                    </td> 
 <?php } else {?>
<td>
                        <a href="#" class="btn btn-secondary btn-sm ">Completed.</a>

                    </td> 
 <?php } ?>
                                        
                </tr>
                <?php } }?> 
                </tbody>
                </table>


        </div>

       
    </section>

<!--     <div class="container mar-t30">
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

</div>  -->
<form action="" method="POST" name='downloadForm' id='downloadForm'>

    <input type='hidden' id='downloadzipId' name='downloadzipId' value='' />
    <input type='hidden' id='excelId' name='excelId' value='' />
    <input type='hidden' id='jobcode' name='jobcode' value='' />
    </form>
</body>

