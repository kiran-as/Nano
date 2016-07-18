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

<script type="text/javascript">

function fnChangeApprove(approvestatus)
{

	approvestatus = approvestatus.split('--');
	if(approvestatus[0]=='Inactive')
	{
		cnfStatus = confirm('Do you really want to Activate the Recruiter?');

		if(cnfStatus==true)
		{
			alert('SMS and Email will be sent to Recruiter and one copy to Archana Mam');
            $('#loading').show();
            $('#example').hide();
 			 formData='idrecruiter='+approvestatus[1]+'&type=Approve&Status=Activate';   
			$.ajax({
			url : "ajax/ajax_recruiterupdates.php",
			type: "POST",
			data : formData,
			success: function(data, textStatus, jqXHR)
			{
				$('#loading').hide();
            $('#example').show();
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
  <body>

    <?php include('include/nav.php');?>
     <section class="nrb-rhs-container">      
       <div class="container-fluid pad-t20">
       <div id='loading' style='display:none'> 
		     <div id='loadingDiv' >
		     </div>
	        <div class='fullscreenDiv'>
			    <div class="center">SMS and EMAIL are in progress.</div>
			</div>
      </div>
        <h3 class="nrb-primary-title pad-b10 mar-t5">Active Recruiter List</h3>

			<table id="example" class="table nrb-table" cellspacing="0" width="100%">
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
					$status = $recruitementArray[$i]['status'];
										if($status!='Inactive'){?>

					<tr>
						<td><?php echo $recruitementArray[$i]['company'];?></td>
						<td><?php echo $recruitementArray[$i]['usename'];?></td>
						<td><?php echo $recruitementArray[$i]['email'];?></td>
						
						<td>
						<?php echo $recruitementArray[$i]['mobile'];?></td>
						<td><a href="javascript:fnChangeApprove('<?php echo $status.'--'.$idrecruiter;?>');">
						   <?php echo $status;?></a></td>
						<td>
						<?php echo $recruitementArray[$i]['web_url'];?></td>
					</tr>
					<?php }}?>
					
				</tbody>
			</table>
<hr>
        <h3 class="nrb-primary-title pad-b10 mar-t5">Inactive Recruiter List</h3>

			<table id="example1" class="table nrb-table" cellspacing="0" width="100%">
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
					$status = $recruitementArray[$i]['status'];
					if($status=='Inactive'){?>
					<tr>
						<td><?php echo $recruitementArray[$i]['company'];?></td>
						<td><?php echo $recruitementArray[$i]['usename'];?></td>
						<td><?php echo $recruitementArray[$i]['email'];?></td>
						
						<td>
						<?php echo $recruitementArray[$i]['mobile'];?></td>
						<td><a href="javascript:fnChangeApprove('<?php echo $status.'--'.$idrecruiter;?>');">
						   <?php echo $status;?></a></td>
						<td>
						<?php echo $recruitementArray[$i]['web_url'];?></td>
					</tr>
					<?php }}?>
					
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
             $('#example').dataTable( {
                "bSort": false
              });
 $('#example1').dataTable( {
                "bSort": false
              });
        } );
    </script> 



			
