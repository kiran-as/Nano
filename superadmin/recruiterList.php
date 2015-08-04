<?php
include('../application/conn.php');
error_reporting(-1);

$studentSql = mysql_query("Select a.* from tbl_recruiter as a ");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $recruitementArray[$i]['idrecruiter'] = $row['idrecruiter'];
    $recruitementArray[$i]['company'] = $row['company'];
    $recruitementArray[$i]['usename'] = $row['usename'];
    $recruitementArray[$i]['email'] = $row['email'];
$recruitementArray[$i]['web_url'] = $row['web_url'];
    $recruitementArray[$i]['mobile'] = $row['mobile'];
 $recruitementArray[$i]['status'] = $row['status'];
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
	if(approvestatus[0]=='Inactive')
	{
		cnfStatus = confirm('Do you really want to Activate the Recruiter?');
		if(cnfStatus==true)
		{
			 formData='idrecruiter='+approvestatus[1]+'&type=Approve&Status=Activate';   
			$.ajax({
			url : "ajax/ajax_recruiterupdates.php",
			type: "POST",
			data : formData,
			success: function(data, textStatus, jqXHR)
			{
                parent.location='recruiterList.php';
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
		  
			}
		   });
		}
	}

	if(approvestatus[0]=='Active')
	{
		cnfStatus = confirm('Do you really Inactivate the Recruiter');
		if(cnfStatus==true)
		{
			 formData='idrecruiter='+approvestatus[1]+'&type=Approve&Status=Inactive';   
			$.ajax({
			url : "ajax/ajax_recruiterupdates.php",
			type: "POST",
			data : formData,
			success: function(data, textStatus, jqXHR)
			{
                parent.location='recruiterList.php';
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
  <?php include('../include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <div class="clearfix brd-btm pad-b20" style="display:none">
        <a href="addCompanyProject.php" class="btn btn-primary pull-right" >+ ADD PROJECT</a>                     
    </div>    
  
			<table id="example" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Company NAme</th>
						<th>User NAme</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Status</th>
						<th>Web Url</th>
					</tr>
				</thead>

				<tbody>
				<?php for($i=0;$i<count($recruitementArray);$i++){
					$idrecruiter = $recruitementArray[$i]['idrecruiter'];
					$status = $recruitementArray[$i]['status'];?>
					<tr>
						<td><?php echo $recruitementArray[$i]['company'];?></td>
						<td><?php echo $recruitementArray[$i]['usename'];?></td>
						<td><?php echo $recruitementArray[$i]['email'];?></td>
						
						<td>
						<?php echo $recruitementArray[$i]['mobile'];?></td>
						<td><a href="javascript:fnChangeApprove('<?php echo $status.'--'.$idrecruiter;?>');">
						   <?php echo $recruitementArray[$i]['status'];?></a></td>
						<td>
						<?php echo $recruitementArray[$i]['web_url'];?></td>
					</tr>
					<?php }?>
					
				</tbody>
			</table>
</div>
</body>

			