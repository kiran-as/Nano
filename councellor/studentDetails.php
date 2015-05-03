<?php
include('../application/conn.php');
include('include/resumeType.php');
$councellorId = $_SESSION['idcouncellor'];
error_reporting(-1);

$studentSql = mysql_query("Select a.idrvstudent, a.name,a.email,a.phone,b.pgdip_coursename,a.created_date
	 from tbl_rvstudent as a, tbl_pgdipcourses as b
	 where a.pgdip_coursename=b.idpgdipcourses 
	 and a.idrvstudent not in (Select idstudent from tbl_rvstudentcouncellor where review_status=3)");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['idrvstudent'] = $row['idrvstudent'];
    $studentArray[$i]['name'] = $row['name'];
    $councellorArrayDetails = getDetailsOfLastReview($row['idrvstudent']);
    $studentArray[$i]['email'] = $row['email'];
    $studentArray[$i]['reviewname'] = $councellorArrayDetails[0]['reviewname'];
    $studentArray[$i]['reviewby'] = $councellorArrayDetails[0]['name'];
    $studentArray[$i]['reviewon'] = $councellorArrayDetails[0]['created_date'];    
    $studentArray[$i]['phone'] = $row['phone'];
    $studentArray[$i]['pgdip_coursename'] = $row['pgdip_coursename'];
    $studentArray[$i]['created_date'] = $row['created_date'];
    $i++;
}

function getDetailsOfLastReview($id)
{
   $councellorSql = mysql_query("Select a.* , b.*, c.*
                              from tbl_rvstudentcouncellor as a, tbl_councellor as b, tbl_reviewstatus as c
                              where a.councellor_id = b.idcouncellor 
                              and a.review_status = c.idreviewstatus
                              and a.idstudent=$id order by idrvstudentcouncellor desc limit 0,1");
$i=0;
while($row = mysql_fetch_assoc($councellorSql))
{
   $councellorArray[$i]['reviewname'] = $row['reviewname'];  
   $councellorArray[$i]['name'] = $row['firstname'].' '.$row['lastname'];
   $councellorArray[$i]['created_date'] = $row['created_date'];
   $councellorArray[$i]['review_status'] = $row['review_status'];
   return $councellorArray;
}
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
        <div class="clearfix brd-btm pad-b20">
        <a href="addNewStudent.php" class="btn btn-primary pull-right" >+ ADD Student</a>                     
    </div>    
  
			<table id="example" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Course Opted</th>
						<th>Latest Review</th>
						<th>Latest Review By</th>
						<th>Latest Revied On</th>
						<th>Created Date</th>
						<th>Edit</th>
						 
					</tr>
				</thead>

				<tbody>
				<?php for($i=0;$i<count($studentArray);$i++){
					$idstudent = $studentArray[$i]['idrvstudent'];?>
					<tr>
						<td><?php echo $studentArray[$i]['name'];?></td>
						<td><?php echo $studentArray[$i]['email'];?></td>
						<td><?php echo $studentArray[$i]['phone'];?></td>
						<td><?php echo $studentArray[$i]['pgdip_coursename'];?></td>
						<td><?php echo $studentArray[$i]['reviewname'];?></td>
						<td><?php echo $studentArray[$i]['reviewby'];?></td>
						<td><?php echo date('d-M-Y H:i:s',strtotime($studentArray[$i]['reviewon']));?></td>          
						<td><?php echo date('d-M-Y H:i:s',strtotime($studentArray[$i]['created_date']));?>

            <td><a href='editStudent.php?idstudent=<?php echo $idstudent;?>'>View/Edit Review</a></td>
					</tr>
					<?php }?>
					
				</tbody>
			</table>
</div>
</body>

			