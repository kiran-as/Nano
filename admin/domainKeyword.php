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
	<link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#example').dataTable( {
		"order": [[1, "desc" ]]
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
  <?php include('../include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <div class="clearfix brd-btm pad-b20" style="display:">
        <a href="newKeyword.php" class="btn btn-primary pull-right" >+ ADD Keyword</a>                     
    </div>    
  
			<table id="example" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Keyword</th>
						<th>Domain Type</th>
						<th>Edit</th>
						
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
</body>

			