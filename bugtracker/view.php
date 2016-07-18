<?php
include('../application/conn.php');

$idbug = $_GET['id'];
$profileInformationSql = mysql_query("Select * from tbl_bugs where idbug=$idbug");
while($row = mysql_fetch_assoc($profileInformationSql))
{
    $firstName = $row['name'];
    $phone = $row['phone'];
    $status = $row['status'];
    $email = $row['email'];
    $message = $row['message'];
	$bug_type = $row['bug_type'];
	$response = $row['response'];
	$image = $row['image'];
		$response_image = $row['response_image'];
}

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
	$status = $_POST['status'];
	$response = $_POST['response'];
$message = $_POST['message'];
	$sql = "Update tbl_bugs set bug_type='$bug_type',
	 name='$name',
	 email='$email',
	 phone='$phone',
	 status='$status',
	 updated_date='$createdDate',
message = '$message',
	 response='$response',
	 response_image='$file_name'
	 where idbug=$idbug
	  ";
	 mysql_query($sql);
	

echo "<script>parent.location='list.php'</script>";
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

<div class="main-nav-wrapper">
       <nav class="container">
           <ul class="main-nav clearfix">
               <li class="<?php echo $studentDetails;?>"><a href="index.php">Bug Reporting Tool</a></li>
               <li class="<?php echo $studentDetails;?>"><a href="list.php">Bug Reporting List</a></li>
               
           </ul>
       </nav>
    </div>	    <div class="container mar-t30">

		<div class="container mar-t10">
			
			    <div class="row">
				<div class="col-sm-12">
				    <h3 class="brd-btm mar-b20">Issues/Bug</h3>

				    <div class="form-horizontal">
					<div class="form-group">
					    <label class="col-sm-2 control-label">Description of the problem</label>
					    <div class="col-sm-10">
						<textarea class="form-control" rows="3"  placeholder="" id="message" name="message"><?php echo $message;?></textarea>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Description of Problem with image</label>
					    <div class="col-sm-5">
							<img src="images/<?php echo $image;?>" height="300px;">
					    </div>
					</div>	
					<div class="form-group">
					    <label class="col-sm-2 control-label">Solution to the problem</label>
					    <div class="col-sm-10">
						<textarea class="form-control" rows="3"  placeholder="" id="response" name="response"><?php echo $response;?></textarea>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Description of Solution with image</label>
					    <div class="col-sm-5">
							<img src="images/<?php echo $response_image;?>" height="300px;">
					    </div>
					</div>	
					<div class="form-group">
					    <label class="col-sm-2 control-label">Product Type</label>
					    <div class="col-sm-5">
						<select class="form-control" id="bug_type" name="bug_type">
                            <option value="Resume Builder" <?php if($bug_type=='Resume Builder'){ echo "Selected=Selected";}?>>Resume Builder</option>
							<option value="RV-VLSI"  <?php if($bug_type=='RV-VLSI'){ echo "Selected=Selected";}?>>RV-VLSI Website</option>
							<option value="Counsellor"  <?php if($bug_type=='Counsellor'){ echo "Selected=Selected";}?>>Counsellor</option>
						</select>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Name of the Reporter</label>
					    <div class="col-sm-5">
							<input type="text" class="form-control" id="name" name="name" value="<?php echo $firstName;?>"/>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Contact Number</label>
					    <div class="col-sm-5">
							<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone;?>"/>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Email Id</label>
					    <div class="col-sm-5">
							<input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>"/>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Status</label>
					    <div class="col-sm-5">
						<select class="form-control" id="status" name="status">
                            <option value="Open" <?php if($status=='Open'){ echo "Selected=Selected";}?>>Open</option>
							<option value="Closed"  <?php if($status=='Closed'){ echo "Selected=Selected";}?>>Closed</option>
							<option value="Progress"  <?php if($status=='Progress'){ echo "Selected=Selected";}?>>Progress</option>
						</select>
					    </div>
					</div>	
										
					
				</div>
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
