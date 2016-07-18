<?php
include('../application/conn.php');
error_reporting(-1);


$studentSql = mysql_query("Select * from tbl_batch");
$i=0;
$studentArray = array();
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['batchname'] = $row['batchname'];
    $batchname = $row['batchname'];

    $countSql = mysql_query("Select count(idstudent) as totalcount from tbl_student where rvvlsiid like '%$batchname%'");
    while($rows = mysql_fetch_assoc($countSql))
    {
        $studentArray[$i]['totalcount'] = $rows['totalcount'];
        $studentArray[$i]['NonPlaced'] = $rows['totalcount'];
    }

    $countSql = mysql_query("Select count(idstudent) as totalcount from tbl_student where rvvlsiid like '%$batchname%' and placed='Yes'");
    while($rowss = mysql_fetch_assoc($countSql))
    {
        $studentArray[$i]['PlacedStudent'] = $rowss['totalcount'];
    }

        $studentArray[$i]['NonPlaced'] = $studentArray[$i]['totalcount']  - $studentArray[$i]['PlacedStudent'];
    

    $i++;
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

  <body>
    <?php include('include/nav.php');?>
            
   <section class="nrb-rhs-container">      
       <div class="container-fluid pad-t20">
        <h3 class="nrb-primary-title pad-b10 mar-t5">Batch Report</h3>
          <a href="addbatch.php" class="" >+ ADD New Batch</a>                     

			<table id="example" class="table nrb-table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Batch NAme</th>
						<th>Total Student</th>
						<th>Placed</th>
                        <th>Yet to Place</th>
                        <th>Excel</th>
					</tr>
				</thead>

					<tbody>
				<?php for($i=0;$i<count($studentArray);$i++){ 
                    $batchname = $studentArray[$i]['batchname'];?>
					<tr>
						<td><?php echo $studentArray[$i]['batchname'];?></td>
						<td><?php echo $studentArray[$i]['totalcount'];?></td>
<td><?php echo $studentArray[$i]['PlacedStudent'];?></td>
<td><?php echo $studentArray[$i]['NonPlaced'];?></td>	
<td><a href="downloadcsvOfPlacedStudentsOfBatch.php?batchname=<?php echo $batchname;?>" target="_blank" >Download</a></td>
</tr>
					<?php }?>
					
				</tbody>
			</table></div>
</section>
</body>
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
        } );
    </script> 

			
