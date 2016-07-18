<?php

include('../application/conn.php');
include('../include/year.php');
include('../include/department.php');
include('../include/pgcourses.php');
include('../include/reviewstatus.php');
include('../include/councellor.php');
//////////////////
$councellorId = $_SESSION['idcouncellor'];
$folderpath = date('Y').'/'.date('M').'/'.date('d');
if (!file_exists(date('Y').'/'.date('M').'/'.date('d'))) {
    mkdir($folderpath,0775,2);
    chmod($folderpath, 777);
}

///////////////////////////////////////////


$studentId = $student_id = $studentId = $_GET['idstudent'];
$studentdetails = mysql_query(("Select a.name, a.phone, a.came_through,
                                  a.sslc_passoutyear, a.tenth_percentage,
                                 a.deg_passoutyear, a.deg_department,a.deg_othercoursename,
                                  a.email from tbl_rvstudent as a 
                  where a.idrvstudent=$studentId"));


while($row = mysql_fetch_assoc($studentdetails))
{
  $name = $row['name'];
  $phone = $row['phone'];
  $came_through = $row['came_through'];
  $sslc_passoutyear = $row['sslc_passoutyear'];
  $tenth_percentage = $row['tenth_percentage'];
  $deg_passoutyear = $row['deg_passoutyear'];
  $deg_department = $row['deg_department'];
  $deg_othercoursename = $row['deg_othercoursename'];
  $email = $row['email'];
  }

$councellorId = $_SESSION['idcouncellor'];

$selectSql = mysql_query("Select discount_available,discontinue,discount_reason 
	from tbl_rvstudent where idrvstudent='$studentId'");
while($row = mysql_fetch_assoc(	$selectSql)){
	$discount_available = $row['discount_available'];
	$discount_reason = $row['discount_reason'];
	$discontinue = $row['discontinue'];
}

if($discount_available==''){
	$discount_available = 'No';
}

if($discontinue==''){
	$discontinue='No';
}
$i=0;
$totalpayment = 0;
$selectSql = mysql_query("Select * from tbl_paymentdetails where idrvstudent='$studentId' order by payment_date asc");
while($row = mysql_fetch_assoc(	$selectSql)){
	$paymentResult[$i]['amount'] = $row['amount'];
	$totalpayment = $totalpayment + $row['amount'];
	$paymentResult[$i]['payment_date'] = date('d-m-Y',strtotime($row['payment_date']));
	$paymentResult[$i]['receipt_date'] = date('d-m-Y',strtotime($row['receipt_date']));
	$paymentResult[$i]['receipt_no'] = $row['receipt_no'];
	$paymentResult[$i]['payment_no'] = $row['payment_no'];

	$paymentResult[$i]['mode_of_payment'] = $row['mode_of_payment'];
	$paymentResult[$i]['created_date'] = $row['created_date'];
	$paymentResult[$i]['idpaymentdetails'] = $row['idpaymentdetails'];
	$i++;

}
if($_POST){
	$amount = $_POST['amount'];
	$payment_date = date('Y-m-d',strtotime($_POST['payment_date']));
	$receipt_date = date('Y-m-d',strtotime($_POST['receipt_date']));
	$receipt_no = $_POST['receipt_no'];
	$mode_of_payment = $_POST['mode_of_payment'];
	$payment_no = $_POST['payment_no'];
    $crdeated_date = date('Y-m-d');
if($amount) {

     $sql = "Insert into tbl_paymentdetails(amount,payment_no,payment_date,
    	receipt_no,mode_of_payment,receipt_date,idrvstudent,idcounsellor,created_date) values 
		('$amount','$payment_no','$payment_date',
		'$receipt_no','$mode_of_payment','$receipt_date','$studentId','$councellorId','$crdeated_date')";
		mysql_query($sql);

		    $discontinued = $_POST['discontinued'];
		    $discount_given = $_POST['discount_given'];
		    $discount_reason = $_POST['discount_reason'];
		    	$next_due_date = date('Y-m-d',strtotime($_POST['next_due_date']));
      $udpateSql = "Update tbl_rvstudent set discontinue='$discontinued', 
		    	 discount_available='$discount_given',
		    	 discount_reason='$discount_reason',
		    	 next_due_date = '$next_due_date'
		    	 where idrvstudent='$studentId'";

		    mysql_query("Update tbl_rvstudent set discontinue='$discontinued', 
		    	 discount_available='$discount_given',
		    	 discount_reason='$discount_reason',
		    	 next_due_date = '$next_due_date'
		    	 where idrvstudent='$studentId'");

// Here we define the file path and name 
$target_file = $folderpath.'/addStudent.txt'; 
$target_file_data = 'advancePaymentDetails.php'.$sql.'---'.$udpateSql;
$handle = fopen($target_file, "a"); 
fwrite($handle, $target_file_data); // write it 
fclose($handle);		    
		echo "<script>parent.location='advancePaymentDetails.php?idstudent=$studentId'</script>";
		exit;
}
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
	<link rel="stylesheet" href="js/jquery-ui.css">
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/jquery-ui.js"></script>

	<script>
	    $(function () {
		$('#payment_date').datepicker({dateFormat: 'dd-mm-yy'});

		$('#receipt_date').datepicker({dateFormat: 'dd-mm-yy'});

		$('#next_due_date').datepicker({dateFormat: 'dd-mm-yy'});


	    });

function deletePayment(id) {
	var cnf = confirm('Do you really want to delete the data');
	var studentId = '<?php echo $studentId;?>';
	if(cnf==true)
	{
		formData='idpaymentdetails='+id;   
			$.ajax({
			url : "ajax/deletepayment.php",
			type: "POST",
			data : formData,
			success: function(data, textStatus, jqXHR)
			{
                window.location='advancePaymentDetails.php?idstudent='+studentId;
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
		  
			}
		   });
	}
}
	</script>
    </head>

    <body>
	<form action="" method="POST" id="academicProject">
<?php include('include/header.php'); ?>
	    <?php include('include/nav.php'); ?>
	    <div class="container mar-t30">
		    <h3 class="brd-btm mar-b20">Payment Details</h3>

		<div class="container mar-t10">
		<div class="form-group">
		    		    <h3 class="brd-btm mar-b20">Student Details</h3>
<div class="form-horizontal  col-sm-6">
		      <div class="form-group">
		        <label class="col-sm-4 control-label">First Name </label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control"  readonly="readonly" placeholder="First Name" id="name" name="name" value="<?php echo $name;?>">
		        </div>        
		      </div>
		    
		      <div class="form-group">
		        <label class="col-sm-4 control-label">Mobile</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control"  readonly="readonly" placeholder="First Name" id="phone" name="phone" value="<?php echo $phone;?>">
		        </div>        
		      </div>
      		</div>
			<div class="form-horizontal  col-sm-6">
		      <div class="form-group">
		        <label class="col-sm-4 control-label">Email</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control"  readonly="readonly" placeholder="First Name" id="phone" name="phone" value="<?php echo $email;?>">
		        </div>        
		      </div>
		     
		     <div class="form-group">
		        <label class="col-sm-4 control-label">Email</label>
		        <div class="col-sm-8">
		          <input type="text" class="form-control"  readonly="readonly" placeholder="First Name" id="phone" name="phone" value="<?php echo $email;?>">
		        </div>        
		      </div>

      		</div>
			
			</div>

		    <div class="form-group">
		    		    <h3 class="brd-btm mar-b20">Previous Payment</h3>

			<div class="form-horizontal col-sm-12">
			    <div class="form-group">
				<label class="col-sm-2 control-label">Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<label class="col-sm-2 control-label">Payment Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

				<label class="col-sm-1 control-label">Mode Of Payment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<label class="col-sm-2 control-label">Cheque / DD No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<label class="col-sm-2 control-label">Receipt No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<label class="col-sm-2 control-label">Receipt Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
             </div>
            <?php for($i=0;$i<count($paymentResult);$i++) {?>
            <div class="form-group">
              	<div class="col-sm-2">
					<input type="name" readonly="readonly" class="form-control" placeholder="Amount"  value="<?php echo $paymentResult[$i]['amount'];?>">
				</div>
				<div class="col-sm-2">
					<input type="name" readonly="readonly" class="form-control" placeholder="payment_date"  value="<?php echo $paymentResult[$i]['payment_date'];?>">
				</div>
				<div class="col-sm-1">
					<input type="name" readonly="readonly" class="form-control" placeholder="payment_date"  value="<?php echo $paymentResult[$i]['mode_of_payment'];?>">
				</div>
				
				<div class="col-sm-2">
					<input type="name" readonly="readonly" class="form-control" placeholder="payment_no"  value="<?php echo $paymentResult[$i]['payment_no'];?>">
				</div>
				<div class="col-sm-2">
					<input type="name" readonly="readonly" class="form-control" placeholder="Receipt No"  value="<?php echo $paymentResult[$i]['receipt_no'];?>">
				</div>
				<div class="col-sm-2">
					<input type="name" readonly="readonly" class="form-control" placeholder="Receipt Date"  value="<?php echo $paymentResult[$i]['receipt_date'];?>">
</div>
			     				<div class="col-sm-1">

					<button onclick="deletePayment(<?php echo $paymentResult[$i]['idpaymentdetails'];?>)" name="Delete" value="Delete">Delete</button>
				</div>
			</div>
              <?php } ?>

<div class="form-group">
              	<div class="col-sm-2">
					Total Amount Paid - <input type="name" readonly="readonly" class="form-control" placeholder="Amount"  value="<?php echo $totalpayment;?>">
				</div>
				
			</div>
			</div>
			
			</div>
		    <div class="container mar-t10">
		    <div class="form-group">
		    		    <h3 class="mar-b20">Curernt Payment</h3>

			<div class="form-horizontal col-sm-12">
			    <div class="form-group">
				<label class="col-sm-2 control-label">Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<label class="col-sm-2 control-label">Payment Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

				<label class="col-sm-2 control-label">Mode Of Payment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<label class="col-sm-2 control-label">Cheque / DD No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<label class="col-sm-2 control-label">Receipt No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<label class="col-sm-2 control-label">Receipt Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
             </div>

            <div class="form-group">
              	<div class="col-sm-2">
					<input type="name" class="form-control" placeholder="Amount" id="amount" name="amount" value="">
				</div>
				<div class="col-sm-2">
					<input type="name" class="form-control" placeholder="payment_date" id="payment_date" name="payment_date" value="">
				</div>
				<div class="col-sm-2">
					 <select class="form-control" id="mode_of_payment" name="mode_of_payment">
              <option value="CASH">CASH</option>
              <option value="DD">DD</option>
              <option value="CHEQUE">CHEQUE</option>
              <option value="NEFT">NEFT</option>
            </select>
				</div>
				<div class="col-sm-2">
					<input type="name" class="form-control" placeholder="payment_no" id="payment_no" name="payment_no" value="">
				</div>
				<div class="col-sm-2">
					<input type="name" class="form-control" placeholder="Receipt No" id="receipt_no" name="receipt_no" value="">
				</div>
				<div class="col-sm-2">
					<input type="name" class="form-control" placeholder="Receipt Date" id="receipt_date" name="receipt_date" value="">
				</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label">Next Due Date</label>
			<div class="col-sm-7">
			 					<input type="name" class="form-control" placeholder="next_due_date" id="next_due_date" name="next_due_date" value="">
</div>
</div>
			<div class="form-group">
			                <label class="col-sm-2 control-label">Discontinued</label>

			<div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="discontinued" id="discontinued" value="Yes" <?php if($discontinue=='Yes'){ echo "checked=checked";};?>> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="discontinued" id="discontinued" value="No" <?php if($discontinue=='No'){ echo "checked=checked";};?>> No
                    </label>        
            </div>
            </div>
            <div class="form-group">
			                <label class="col-sm-2 control-label">Discount Availability</label>

            <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="discount_given" id="discount_given" value="Yes" <?php if($discount_available=='Yes'){ echo "checked=checked";};?>> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="discount_given" id="discount_given" value="No" <?php if($discount_available=='No'){ echo "checked=checked";};?>> No
                    </label>        
            </div>
            </div>

 <div class="form-group">
			                <label class="col-sm-2 control-label">Discount Reason</label>

            <div class="col-sm-7">                <input type="name" class="form-control" placeholder="Discount Reason" id="discount_reason" name="discount_reason" value="<?php echo $discount_reason;?>">
  
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
