<?php
include('../application/conn.php');
$idrecruiter = $_SESSION['idrecruiter'];
$studentSql = mysql_query("Select a.*,b.idrecruiter, b.company from tbl_recruitement as a ,tbl_recruiter as b 
	                        where a.idrecruiter=b.idrecruiter and a.idrecruiter=$idrecruiter");
$i=0;
$recruitementArray = array();
while($row = mysql_fetch_assoc($studentSql))
{
    $recruitementArray[$i]['recruitementposition'] = $row['recruitementposition'];
    $recruitementArray[$i]['idrecruitement'] = $row['idrecruitement'];
    $recruitementArray[$i]['username'] = $row['username'];
    $recruitementArray[$i]['company'] = $row['company'];
    $recruitementArray[$i]['recruitementdate'] = $row['recruitementdate'];
    $recruitementArray[$i]['status'] = $row['status'];   
    $recruitementArray[$i]['noofopening'] = $row['noofopening']; 
    $recruitementArray[$i]['interviewdate'] = $row['interviewdate'];   
    $recruitementArray[$i]['experience_type'] = $row['experience_type'];
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
                    <p class="alert alert-success txtc font16-sm-reg  label-info"><a href="addnewRecruitment.php">Click here</a> or Click on Add New Position button to create the job description to shortlist the best resume according to your 
job description.</p>
        <div class="clearfix brd-btm pad-b20" style="display:">
        <a href="addnewRecruitment.php" class="btn btn-primary pull-right" >+ ADD New Position</a>                     
    </div>    
  
  <?php if(count($recruitementArray)>0) { ?>
			<table id="example" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
					<th>Job Type</th>
						<th>Job Title</th>
						<th>Position Created Date</th>
						<th>No of Openings</th>
						<th>Interview Date</th>
						<th>No of Resumes Tagged</th>
						<th>Status</th>
					</tr>
				</thead>

				<tbody>
				<?php for($i=0;$i<count($recruitementArray);$i++){
					$idrecruitement = $recruitementArray[$i]['idrecruitement'];
					$approved = $recruitementArray[$i]['approved'];?>
					<tr>
					<td> <?php echo $recruitementArray[$i]['experience_type'];?></td>
						<td><?php echo $recruitementArray[$i]['recruitementposition'];?></td>
						<td><?php echo $recruitementArray[$i]['recruitementdate'];?></td>
						<td><?php echo $recruitementArray[$i]['noofopening'];?></td>
						<td><?php echo $recruitementArray[$i]['interviewdate'];?></td>

						<?php 
$countOfStudentForRecruitmentSql = mysql_query("Select count(idrecruitementresumes) as totalcount 
	from tbl_recruitementresumes where idrecruitement='$idrecruitement'");
while($row = mysql_fetch_assoc($countOfStudentForRecruitmentSql))
{
	$totalResumesAttached = $row['totalcount'];
}
?>
						<td><?php echo $totalResumesAttached;?></td>
						
						<?php if($recruitementArray[$i]['status']=='Close'){?>
						<td><a href="viewRecruitementlistCandidates.php?idrecruitement=<?php echo $idrecruitement;?>">View Candidates</a></td>
					    <?php } else {?>
                        <td>In-Process</td>
                        <?php }?>					    	
 
					</tr>
					<?php }?>
					
				</tbody>
			</table>
			<?php } ?>
</div>
</body>

			