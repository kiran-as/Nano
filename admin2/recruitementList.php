<?php
include('../application/conn.php');
error_reporting(0);

$studentSql = mysql_query("Select a.*,b.idrecruiter from tbl_recruitement as a ,tbl_recruiter as b 
	                        where a.idrecruiter=b.idrecruiter");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $recruitementArray[$i]['recruitementposition'] = $row['recruitementposition'];
    $recruitementArray[$i]['idrecruitement'] = $row['idrecruitement'];
    $recruitementArray[$i]['company'] = $row['company'];
    $recruitementArray[$i]['username'] = $row['username'];
    $recruitementArray[$i]['recruitementdate'] = $row['recruitementdate'];
    $recruitementArray[$i]['approved'] = $row['approved'];
    $recruitementArray[$i]['status'] = $row['status'];
    $recruitementArray[$i]['noofopening'] = $row['noofopening']; 
    $recruitementArray[$i]['interviewdate'] = $row['interviewdate'];
        $recruitementArray[$i]['idrecruiter'] = $row['idrecruiter'];

    $i++;
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<script type="text/javascript">

function fnChangeApprove(approvestatus)
{
	approvestatus = approvestatus.split('--');
	if(approvestatus[0]=='Yes')
	{
		cnfStatus = confirm('Do you really want to make it as UnApprove?');
		if(cnfStatus==true)
		{
			 formData='idrecruitement='+approvestatus[1]+'&type=Approve&Status=UnApprove';   
			$.ajax({
			url : "ajax/ajax_recruitementupdates.php",
			type: "POST",
			data : formData,
			success: function(data, textStatus, jqXHR)
			{
                parent.location='recruitementList.php';
                //exit;
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
		  
			}
		   });
		}
	}

	if(approvestatus[0]=='No')
	{
		cnfStatus = confirm('Do you really want to make it as Approve?');
		if(cnfStatus==true)
		{
			 formData='idrecruitement='+approvestatus[1]+'&type=Approve&Status=Approve';   
			$.ajax({
			url : "ajax/ajax_recruitementupdates.php",
			type: "POST",
			data : formData,
			success: function(data, textStatus, jqXHR)
			{
                parent.location='recruitementList.php';
                exit;
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
		  
			}
		   });
		}
	}
}

function fnalert()
{
	alert('You dont have permission to open/close the job listing');
}
</script>

  </head>

  <body>
    <?php include('include/nav.php');?>
     <section class="nrb-rhs-container">      
       <div class="container-fluid pad-t20">
        <h3 class="nrb-primary-title pad-b10 mar-t5">Assign Resumes</h3>
        
  
			<table id="example" class="table nrb-table" cellspacing="0" width="100%">
			<thead>
					<tr>
						<th>Position</th>
						<th>Company</th>
						<th>Openings</th>
						<th>Shortlisted</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
				<?php for($i=0;$i<count($recruitementArray);$i++){
					$idrecruitement = $recruitementArray[$i]['idrecruitement'];
					$idrecruiter = $recruitementArray[$i]['idrecruiter'];
					$approved = $recruitementArray[$i]['approved'];
					$status = $recruitementArray[$i]['status'];?>
					<tr>
						<td><?php echo $recruitementArray[$i]['recruitementposition'];?></td>
						<td><?php echo $recruitementArray[$i]['company'];?></td>
						<td><?php echo $recruitementArray[$i]['noofopening'];?></td>
						<?php 
$countOfStudentForRecruitmentSql = mysql_query("Select count(idrecruitementresumes) as totalcount 
	from tbl_recruitementresumes where idrecruitement='$idrecruitement'");
while($row = mysql_fetch_assoc($countOfStudentForRecruitmentSql))
{
	$totalResumesAttached = $row['totalcount'];
}
?>
						<td><?php echo $totalResumesAttached;?></td>
						

						 <?php if($recruitementArray[$i]['status']=='Close') { ?>
						<td>
                        <a href="#" class="btn btn-primary btn-sm disabled">+ Add Resumes</a>
                        <a href="#" class="btn btn-secondary btn-sm mar-l5">Review Resumes</a>
                    </td>
                         <?php } else {?> 
                         						<td>
<a href="advanceSearchRecruiter.php?idrecruitement=<?php echo $idrecruitement;?>" class="btn btn-primary btn-sm">+ Add Resumes</a>
                        <a href="#" class="btn btn-secondary btn-sm disabled mar-l5">Review Resumes</a>
</td>
                         <?php }?>

					</tr>
					<?php }?>
					
				</tbody>
			</div>        
    </section>
</body>

 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>  