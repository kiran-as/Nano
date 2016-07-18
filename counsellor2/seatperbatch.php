<?php

include('../application/conn.php');
include('../include/year.php');
include('../include/department.php');
include('../include/pgcourses.php');
include('../include/reviewstatus.php');
include('../include/councellor.php');

$studentId = $student_id = $studentId = $_GET['idstudent'];
$councellorId = $_SESSION['idcouncellor'];

$selectSql = mysql_query("Select * 
	from tbl_seatperbatch");
while($row = mysql_fetch_assoc(	$selectSql)){
	$adad = $row['adad'];
	$embedded = $row['embedded'];
}

if($_POST){
	$adad = $_POST['adad'];
	$embedded = $_POST['embedded'];

     $sql = "Insert into tbl_seatperbatch(adad,embedded) values 
('$adad','$embedded')";
mysql_query($sql);
echo "<script>parent.location='seatperbatch.php'</script>";
exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nanochip Solutions</title>

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../css/main.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Bootstrap core JavaScript
	   ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="../js/jquery-1.11.0.min.js"></script>
	<script src="../js/jquery.validation.js"></script>
	<script src="../js/customised_validation.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

	<script>
	    $(function () {
		$("#payment_date").datepicker({minDate: -00, maxDate: "+1M +10D"});
		$('#payment_date').datepicker({dateFormat: 'dd-mm-yy'});

		$("#receipt_date").datepicker({minDate: -00, maxDate: "+1M +10D"});
		$('#receipt_date').datepicker({dateFormat: 'dd-mm-yy'});

	    });

	</script>
    </head>

    <body>
	<form action="" method="POST" id="academicProject">
<?php include('include/header.php'); ?>
	    <?php include('include/nav.php'); ?>
	    <div class="container mar-t30">
		    <h3 class="brd-btm mar-b20">Seat per Batch</h3>
		    <div class="container mar-t10">

 <div class="form-group">
			                <label class="col-sm-5 control-label">ADAD</label>

            <div class="col-sm-7">                
            <input type="name" class="form-control" placeholder="Discount Reason" id="adad" name="adad" value="<?php echo $adad;?>">
  
            </div>
			</div>
<div class="form-group">
			                <label class="col-sm-5 control-label">EMbedded</label>

            <div class="col-sm-7">                
            <input type="name" class="form-control" placeholder="Discount Reason" id="embedded" name="embedded" value="<?php echo $embedded;?>">
  
            </div>
			</div>

			</div>
			
			    <div class="clearfix brd-top pad-t20">
				<button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">Save & Continue</button>
			    </div>
			</div>
		    </div>

		    <footer class="home-footer">
			<div class="container">
			    <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>
			</div>
		    </footer>
		    <!-- Bootstrap core JavaScript
		    ================================================== -->
		    <!-- Placed at the end of the document so the pages load faster -->
		    </form>
		    </body>

		    </html>
