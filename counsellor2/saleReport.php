<?php
include('../application/conn.php');

include('include/sessioncheck.php');
$showTable = 0;
$fromDate=date('Y-m-d');
$toDate=date('Y-m-d');
if ($_POST) {
    	
    $fromDate = date('Y-m-d',strtotime($_POST['datepicker']));
    $toDate = date('Y-m-d',strtotime($_POST['datepicker1']));
    $totalStudentsSql = mysql_query("Select count(a.idrvstudent) as totalcount
                      from tbl_rvstudent as a where a.created_date > '$fromDate' and a.created_date < '$toDate'");
    while($row = mysql_fetch_assoc($totalStudentsSql))
    {
         $totalApplicationBought = $row['totalcount'];
    } 

    $notProcessedSql = mysql_query("Select count(a.idrvstudent) as totalcount
                      from tbl_rvstudent as a where a.created_date > '$fromDate' and a.created_date < '$toDate' and step not in (2,3,4)");
    while($row = mysql_fetch_assoc($notProcessedSql))
    {
         $totalnotProcessed = $row['totalcount'];
    } 

    $followupSql = mysql_query("Select count(a.idrvstudent) as totalcount
                      from tbl_rvstudent as a where a.created_date > '$fromDate' and a.created_date < '$toDate' and step=2");
    while($row = mysql_fetch_assoc($followupSql))
    {
         $totalfollowup = $row['totalcount'];
    }


    $applicationBoughtSql = mysql_query("Select count(a.idrvstudent) as totalcount
                      from tbl_rvstudent as a where a.created_date > '$fromDate' and a.created_date < '$toDate' and step=3");
    while($row = mysql_fetch_assoc($applicationBoughtSql))
    {
         $totalapplicationBought = $row['totalcount'];
    }


    $advancepaymentSql = mysql_query("Select count(a.idrvstudent) as totalcount
                      from tbl_rvstudent as a where a.created_date > '$fromDate' and a.created_date < '$toDate' and step=4");
    while($row = mysql_fetch_assoc($advancepaymentSql))
    {
         $totaladvancepayment = $row['totalcount'];
    }

    $showTable = 1;
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

    </head>
    <script src="../js/jquery-1.11.0.min.js"></script>
	<script src="../js/jquery.validation.js"></script>
	<script src="../js/customised_validation.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

	<script>
	    $(function () {
		$('#datepicker').datepicker({dateFormat: 'dd-mm-yy'});

		$('#datepicker1').datepicker({dateFormat: 'dd-mm-yy'});

	    });
	    </script>

    <body>
	<form action="" method="POST" id="academicProject">
<?php include('include/header.php'); ?>
	    <?php include('include/nav.php'); ?>

	    <div class="container mar-t10">

		<div class="row">
		    <div class="col-sm-12">
			<h3 class="brd-btm mar-b20">Sales Summary</h3>
			<div class="form-horizontal">
<div class="form-group">
					    <label class="col-sm-2 control-label">From Date</label>
					    <div class="col-sm-4">
						<input  class="form-control" type="text" name='datepicker' id="datepicker" value="<?php echo date('d-m-Y',strtotime($fromDate));?>">
					    </div>
					    <label class="col-sm-2 control-label">To Date</label>
					    <div class="col-sm-4">
						<input  class="form-control" type="text" name='datepicker1' id="datepicker1" value="<?php echo date('d-m-Y',strtotime($toDate));?>">
					    </div>
					</div>
			</div>
		    </div>
		</div>
		<?php if($showTable ==1) {?>
       <table width="100%" border="1">

            <tr>
               <td width="50%">Total Number of Enquiries:</td>
               <td><?php echo $totalApplicationBought;?></td>
            </tr>
             <tr>
               <td>Not Processed :  </td>
               <td><?php echo $totalnotProcessed;?> </td>
            </tr>
            <tr>
               <td>Follow Up : </td>
               <td><?php echo $totalfollowup;?> </td>
            </tr>
            <tr>
               <td>Application Bought : </td>
               <td><?php echo $totalapplicationBought;?>
            </td>
            </tr>
            <tr>
              <td>Advance Payment : </td>
              <td><?php echo $totaladvancepayment;?></td>
             </tr>
            </table>
        <?php }?>
		<div class="clearfix brd-top pad-t20">
		    <button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">Generate</button>
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
