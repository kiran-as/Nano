<?php
error_reporting(0);
include('../application/conn.php');
include('include/resumeType.php');
$councellorId = $_SESSION['idcouncellor'];
error_reporting(-1);
if($councellorId==100 || $councellorId==101)
{
$studentSql = mysql_query("Select a.idrvstudent,a.idcouncellor, a.name,a.email,a.phone,b.pgdip_coursename,a.created_date
	 from tbl_rvstudent as a, tbl_pgdipcourses as b
	 where a.pgdip_coursename=b.idpgdipcourses and idcouncellor=$councellorId 
	 and step=4");
}
else
{
	$studentSql = mysql_query("Select a.idrvstudent,a.idcouncellor, a.name,a.email,a.phone,b.pgdip_coursename,a.created_date
	 from tbl_rvstudent as a, tbl_pgdipcourses as b
	 where a.pgdip_coursename=b.idpgdipcourses 
	 and step=4");
}
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['idrvstudent'] = $row['idrvstudent'];
    $studentArray[$i]['assignedto'] = getCouncellorName($row['idcouncellor']);
    $studentArray[$i]['name'] = $row['name'];
    $councellorArrayDetails = getDetailsOfLastReview($row['idrvstudent']);
    $studentArray[$i]['email'] = $row['email'];
    $studentArray[$i]['reviewname'] = $councellorArrayDetails[0]['reviewname'];
    $studentArray[$i]['reviewby'] = $councellorArrayDetails[0]['name'];
    if($councellorArrayDetails[0]['created_date']=='')
    {
//$studentArray[$i]['reviewon'] = date('Y-m-d');
    }
    else
    {
    $studentArray[$i]['reviewon'] = $councellorArrayDetails[0]['created_date'];    
}
    $studentArray[$i]['councelling_date'] = $councellorArrayDetails[0]['councelling_date'];     
    $studentArray[$i]['phone'] = $row['phone'];
    $studentArray[$i]['pgdip_coursename'] = $row['pgdip_coursename'];
    $studentArray[$i]['created_date'] = $row['created_date'];
    $i++;
}

function getCouncellorName($id)
{
	 $councellorSql = mysql_query("Select a.* 
                              from tbl_councellor as a
                              where a.idcouncellor = $id");
$i=0;
while($row = mysql_fetch_assoc($councellorSql))
{
   $councellorName = $row['firstname'].' '.$row['lastname'];
   return $councellorName;
}

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
      $councellorArray[$i]['councelling_date'] = $row['councelling_date'];

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
		"order": [[ 4, "desc" ]]
	} );
} );

function fndelete(id){
	var cnf = confirm('Do you really want to delete the data');
	if(cnf==true)
	{
		formData='idstudent='+id;   
			$.ajax({
			url : "deletestudent.php",
			type: "POST",
			data : formData,
			success: function(data, textStatus, jqXHR)
			{
                parent.location='studentDetails.php';
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
		  
			}
		   });
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
        <div class="clearfix brd-btm pad-b20">
        <a href="addNewStudent.php" class="btn btn-primary pull-right" >+ ADD Student</a>                     
    </div>    
  
			<table id="example" class="table " cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Course Opted</th>
							<th>Last Updated On</th>
<th>Last Updated By</th>
<th>Last Review</th>
<th>Next Counselling date</th>

						<th>Assigned To</th>
						
						
						
					
						
						<th>Edit</th>
						<th>Delete</th>
						 
					</tr>
				</thead>

				<tbody>
				<?php for($i=0;$i<count($studentArray);$i++){
					$idstudent = $studentArray[$i]['idrvstudent'];
					if($i%2==0)
					{
						$bgcolor="#e0e0e0";
					}
					else
					{
                    	$bgcolor = "white";
                    }
                    if($studentArray[$i]['councelling_date'] == date('Y-m-d'))
                    {
                    	$bgcolor = "#ff4c4c";
                    }
                    else if($studentArray[$i]['councelling_date'] < date('Y-m-d'))
                    {
                    	$bgcolor = "4cffa0";
                    }
					?>
					<tr style="background-color:<?php echo $bgcolor;?>">
						<td><a href='advancePaymentDetails.php?idstudent=<?php echo $idstudent;?>'><?php echo $studentArray[$i]['name'];?></a></td>
						<td><?php echo $studentArray[$i]['email'];?></td>
						<td><?php echo $studentArray[$i]['phone'];?></td>
						<td><?php echo $studentArray[$i]['pgdip_coursename'];?></td>
						<td><?php echo date('d-M-Y H:i:s',strtotime($studentArray[$i]['reviewon']));?></td>          
						<td><?php echo $studentArray[$i]['reviewby'];?></td>

						<td><?php echo $studentArray[$i]['reviewname'];?></td>
						<td><?php echo $studentArray[$i]['councelling_date'];?></td>

						<td><?php echo $studentArray[$i]['assignedto'];?></td>

            <td><a href='editStudent.php?idstudent=<?php echo $idstudent;?>'>View/Edit Review</a></td>
            <td><a href='#' onclick="fndelete(<?php echo $idstudent;?>);">Delete</a></td>
					</tr>
					<?php }?>
					
				</tbody>
			</table>
</div>
</body>

			
