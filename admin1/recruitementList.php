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
	<link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#example').dataTable( {
		"order": [[ 3, "desc" ]]
	} );
} );
	</script>
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
                exit;
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
<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <div class="clearfix brd-btm pad-b20" style="display:none">
        <a href="addCompanyProject.php" class="btn btn-primary pull-right" >+ ADD PROJECT</a>                     
    </div>    
  
			<table id="example" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Position</th>
						<th>Posted On</th>
						<th>Company</th>
						<th>No of Openings</th>
						<th style="width:100px">No of Resumes shortlisted</th>
						<th>Status</th>
						<th>Interview Date</th>
						<th>Candidates Shortlisted</th>
						<th>Search Candidates</th>
												<th>Job Description</th>

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
						<td><?php echo $recruitementArray[$i]['recruitementdate'];?></td>
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
						<td><a href="javascript:fnalert();"> <?php echo $recruitementArray[$i]['status'];?> </a></td>
						
						<td><?php echo $recruitementArray[$i]['interviewdate'];?></td>

						<td><a href="viewRecruitementlistCandidates.php?idrecruitement=<?php echo $idrecruitement;?>" target="_blank">View Candidates</a></td>
						 <?php if($recruitementArray[$i]['status']=='Close') { ?>
						<td>Search Candidates</td>
                         <?php } else {?> 
                         						<td><a href="advanceSearchRecruiter.php?idrecruitement=<?php echo $idrecruitement;?>" target="_blank">Search Candidates</a></td>

                         <?php }?>
                         						<td><a href="editRecruitment.php?idrecruitement=<?php echo $idrecruitement;?>&idrecruiter=<?php echo $idrecruiter;?>" target="_blank">View details entered by Recruiter</a></td>

					</tr>
					<?php }?>
					
				</tbody>
			</table>
</div>
</body>

			
