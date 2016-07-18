<?php
include('../application/conn.php');

include('include/sessioncheck.php');


if ($_POST) {
    //print_r($_POST);
    $rvpattern = $_POST['rvpattern'];
    $sqllike = " and rvvlsiid like '%$rvpattern%'";
    for ($i = 0; $i < count($_POST['student']); $i++) {

	if ($i == 0) {
	    $sql = "a." . $_POST['student'][$i];
	}
	else {
	    $sql = $sql . ',a.' . $_POST['student'][$i];
	}
    }
    if (isset($_POST['rvvlsi'])) {
	$studentSql = " Select $sql,a.rvvlsiid,b.department as degdeparment, c.department as pgdepartment
	               from tbl_student as a
LEFT join tbl_department as c ON a.pg_department = c.iddepartment 
Left join tbl_department as b ON a.deg_department = b.iddepartment
where  a. rvvlsiid!='' and a.rvvlsiid like '%%' order by a.rvvlsiid desc";
    }
    else {
	$studentSql = "Select $sql from tbl_student where idstudent>0 $sqllike";
    }

    $result = mysql_query($studentSql);
    $xls_filename = 'export_' . date('Y-m-d') . '.xls'; // Defzne Excel (.xls) file name
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=$xls_filename");
    header("Pragma: no-cache");
    header("Expires: 0");

    $sep = "\t"; // tabbed character

    for ($i = 0; $i < mysql_num_fields($result); $i++) {
	echo mysql_field_name($result,
		$i) . "\t";
    }
    print("\n");

// Start while loop to get data
    while ($row = mysql_fetch_row($result)) {
	$schema_insert = "";
	for ($j = 0; $j < mysql_num_fields($result); $j++) {

	    if (!isset($row[$j])) {
		$schema_insert .= "NULL" . $sep;
	    }
	    elseif ($row[$j] != "") {
		$schema_insert .= "$row[$j]" . $sep;
	    }
	    else {
		$schema_insert .= "" . $sep;
	    }
	}
	$schema_insert = str_replace(",",
		"",
		$schema_insert);
	$schema_insert = str_replace("&#39;",
		"",
		$schema_insert);


	$schema_insert = str_replace($sep . "$",
		"",
		$schema_insert);
	$schema_insert = preg_replace("/\r\n|\n\r|\n|\r/",
		" ",
		$schema_insert);
	$schema_insert .= "\t";
	print(trim($schema_insert));
	print "\n";
    }

    exit;

    /* $dbTable = 'Test';
      header('Content-Type: application/vnd.ms-excel'); //define header info for browser
      header('Content-Disposition: attachment; filename='.$dbTable.'-'.date('Ymd').'.xls');
      header('Pragma: no-cache');
      header('Expires: 0');


      echo "Name"."\t".
      "Name"."\t".
      "Phone"."\t".
      "Email"."\t".
      "sslc_passoutyear"."\t".
      "sslc_percentage"."\t".
      "sslc_schoolname"."\t".
      "puc_passoutyear"."\t".
      "puc_percentage"."\t".
      "puc_schoolname"."\t".
      "deg_passoutyear"."\t".
      "deg_schoolname"."\t".
      "deg_percentage"."\t".
      "deg_university"."\t";

      print("\n");

      while($imp=mysql_fetch_array($result))
      {

      $output=str_replace("\t", "t",trim(stripslashes($imp[firstname])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[lastname])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[mobile])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[email])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[sslc_passoutyear])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[sslc_percentage])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[sslc_schoolname])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[puc_passoutyear])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[puc_percentage])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[puc_schoolname])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[deg_passoutyear])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[deg_schoolname])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[deg_percentage])))."\t".
      str_replace("\t", "t",trim(stripslashes($imp[deg_university])))."\t";

      $output = preg_replace("/\r\n|\n\r|\n|\r/", ' ', $output);
      print(trim($output))."\t\n";
      }

      exit; */
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

    <body>
	<?php include('include/header.php'); ?>
	<?php include('include/nav.php'); ?>
	<form action="" method="POST" id="academicProject">


	    <div class="container mar-t10">

		<div class="row">
		    <div class="col-sm-12">
			<h3 class="brd-btm mar-b20">Download Options</h3>
			<div class="form-horizontal">

			    <div class="col-sm-12">
				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="firstname" checked="checked" > First Name
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="lastname" checked="checked" > Last Name
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="mobile" checked="checked" > Mobile
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="email" checked="checked" > Email
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="dob" checked="checked" > Dob
				</label>
				<label class="radio-inline">
				    <input type="checkbox" name="rvvlsi" id="rvvlsi" value="only" checked="checked" > Only RV-VLSI
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="sslc_passoutyear" checked="checked" > sslc_passoutyear
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="sslc_percentage" checked="checked" > sslc_percentage
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="sslc_schoolname" checked="checked" > sslc_schoolname
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="puc_passoutyear" checked="checked" > puc_passoutyear
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="puc_percentage" checked="checked" > puc_percentage
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="puc_schoolname" checked="checked" > puc_schoolname
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="deg_passoutyear" checked="checked" > deg_passoutyear
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="deg_percentage" checked="checked" > deg_percentage
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="deg_schoolname" checked="checked" > deg_schoolname
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="deg_university" checked="checked" > deg_university
				</label>

				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="deg_state" checked="checked" > deg_state
				</label>


				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="deg_department" checked="checked" > BE
				</label>
							<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="pg_department" checked="checked" > Master Degree
				</label>
				<label class="radio-inline">
				    <input type="checkbox" name="student[]" id="student[]" value="placed" checked="checked" > Placement
				</label>
				<label class="radio-inline">
				    RV_VLSIID<input type="text" name="rvpattern" id="rvpattern" value="" >
				</label>
			    </div>



			</div>
		    </div>
		</div>


		<div class="clearfix brd-top pad-t20">
		    <button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">Download</button>
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
