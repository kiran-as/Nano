<?php
include('../application/conn.php');
if($_POST)
{
	//PRINT_R($_FILES);

	  $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
     // $file_ext=strtolower(end(explode('.',$file_name)));

      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
     
         var_dump(move_uploaded_file($file_tmp,"images/".$file_name));
       

	
	$bug_type = $_POST['bug_type'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$createdDate = date('Y-m-d');
	$message = $_POST['message'];
	$status = 'OPEN';
	$sql = "Insert into tbl_bugs (message,bug_type,created_date,status,
		image,name,email,phone) 
	values ('$message','$bug_type','$createdDate','$status',
		'$file_name','$name','$email','$phone')";
	mysql_query($sql);


echo "<script>alert('Thanks for Reporting the issue')</script>";
echo "<script>parent.location='index.php'</script>";
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

	
    </head>

    <body>
	<form action="" method="POST" id="academicProject" enctype="multipart/form-data">
		    <?php include('include/header.php'); ?>

	    <?php include('include/nav.php'); ?>
	    <div class="container mar-t30">

		<div class="container mar-t10">
			
			    <div class="row">
				<div class="col-sm-12">
				    <h3 class="brd-btm mar-b20">Issues/Bug</h3>

				    <div class="form-horizontal">
					<div class="form-group">
					    <label class="col-sm-2 control-label">Description of the problem</label>
					    <div class="col-sm-10">
						<textarea class="form-control" rows="3"  placeholder="" id="message" name="message"></textarea>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Product Type</label>
					    <div class="col-sm-5">
						<select class="form-control" id="bug_type" name="bug_type">
                            <option value="Resume Builder">Resume Builder</option>
							<option value="RV-VLSI">RV-VLSI Website</option>
							<option value="Counsellor">Counsellor</option>
						</select>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Name of the Reporter</label>
					    <div class="col-sm-5">
							<input type="text" class="form-control" id="name" name="name" />
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Contact Number</label>
					    <div class="col-sm-5">
							<input type="text" class="form-control" id="phone" name="phone" />
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Email Id</label>
					    <div class="col-sm-5">
							<input type="text" class="form-control" id="email" name="email" />
					    </div>
					</div>	
					<div class="form-group">
					    <label class="col-sm-2 control-label">Upload Screen shot</label>
					    <div class="col-sm-5">
							<input type="file" class="form-control" id="image" name="image" />
					    </div>
					</div>					
					
				</div>
			    </div>

			    <div class="clearfix brd-top pad-t20">
				<button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">Submit</button>
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
