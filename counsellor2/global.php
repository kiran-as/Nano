<?php
error_reporting(0);
include('../application/conn.php');
include('include/resumeType.php');
$councellorId = $_SESSION['idcouncellor'];
error_reporting(-1);

	$studentSql = mysql_query("Select a.step,a.idrvstudent, a.name,a.email,a.phone from tbl_rvstudent as a");

$i=0;
$studentArray = array();
while($row = mysql_fetch_assoc($studentSql))
{

    $step = $row['step'];
    	if($step==1) {
    		$step = "Enquiries";
    	}
    	if($step==2) {
    		$step = "Follow Up";
    	}
    	if($step==3) {
    		$step = "Application Brought";
    	}							
    	if($step==4) {
    		$step = "Advance Paid";
    	}

 	$studentArray[$i]['idrvstudent'] = $row['idrvstudent'];
    $studentArray[$i]['name'] = $row['name'];
    $studentArray[$i]['email'] = $row['email'];
    $studentArray[$i]['phone'] = $row['phone'];
    $studentArray[$i]['step'] = $step;

    $i++;      

   
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
    </div>    
  
			<table id="example" class="table " cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Menu</th>
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
						<td><?php echo $studentArray[$i]['name'];?></td>
						<td><?php echo $studentArray[$i]['email'];?></td>
						<td><?php echo $studentArray[$i]['phone'];?></td>
						<td><?php echo $studentArray[$i]['step'];?></td>

            <td><a href='editStudent.php?idstudent=<?php echo $idstudent;?>'>View/Edit Review</a></td>
            <td><a href='#' onclick="fndelete(<?php echo $idstudent;?>);">Delete</a></td>
					</tr>
					<?php }?>
					
				</tbody>
			</table>
</div>
</body>

			
