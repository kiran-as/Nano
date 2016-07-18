<?php
include('../application/conn.php');
error_reporting(-1);


$studentSql = mysql_query("Select a.*, b.* from tbl_resumetypes as a, tbl_resumekeywords as b
	                       where a.idresumetype=b.idresumetype");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['resumetypename'] = $row['resumetypename'];
        $studentArray[$i]['keywords'] = $row['keywords'];

    $studentArray[$i]['idresumekeywords'] = $row['idresumekeywords'];


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
        <a href="newKeyword.php" class="" >+ ADD Keyword</a>                     
            
   <section class="nrb-rhs-container">      
       <div class="container-fluid pad-t20">
        <h3 class="nrb-primary-title pad-b10 mar-t5">Domain Keyword List</h3>
  
			<table id="example" class="table nrb-table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Keyword</th>
						<th>Domain Type</th>
						<th>Edit</th>
					</tr>
				</thead>

					<tbody>
				<?php for($i=0;$i<count($studentArray);$i++){
					$idresumekeywords = $studentArray[$i]['idresumekeywords'];?>
					<tr>
						<td><?php echo $studentArray[$i]['keywords'];?></td>
						<td><?php echo $studentArray[$i]['resumetypename'];?></td>

                       <td><a href='editKeyword.php?idresumekeywords=<?php echo $idresumekeywords;?>' >Edit</a></td>
					</tr>
					<?php }?>
					
				</tbody>
			</table>
</div>
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
            $('#example').DataTable();
        } );
    </script> 

			