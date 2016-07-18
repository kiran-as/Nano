<?php
include('../application/conn.php');



if($_POST)
{
	mysql_query("truncate table tbl_tempstudentexcel");
	$fromDate = date('Y-m-d',strtotime($_POST['datepicker']));
	$toDate = date('Y-m-d',strtotime($_POST['datepicker1']));	
$sql = mysql_query("Select idrvstudent,name,email,phone,department,be_college_name,deg_percentage,pg_percentage from tbl_rvstudent, tbl_department where tbl_rvstudent.deg_department = tbl_department.iddepartment and created_date > '$fromDate' and created_date < '$toDate'");

while($row = mysql_fetch_assoc($sql))
{
  $i=1;
$detailsarray = array();
    $idrvstudent = $row['idrvstudent'];
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $department = $row['department'];
    $collegename = $row['be_college_name'];
$deg_percentage = $row['deg_percentage'];
$pg_percentage = $row['pg_percentage'];


    $councellorSql = mysql_query("Select a.councellor_review, b.firstname, c.reviewname, a.councelling_date
    	                          from tbl_rvstudentcouncellor as a, tbl_councellor as b,tbl_reviewstatus as c
    	                          where a.councellor_id=b.idcouncellor 
    	                           and  a.review_status = c.idreviewstatus
    	                           and a.idstudent = $idrvstudent order by a.councelling_date");
  
     while($rows = mysql_fetch_assoc($councellorSql))
	{
        $detailsarray['review_'.$i.'_by'] = $rows['firstname'];
        $detailsarray['review_'.$i] = $rows['councellor_review'];
        $detailsarray['review_'.$i.'_date'] = $rows['councelling_date'].'---'.$rows['reviewname'];
        $i++;
	}

   $sqlss = "Insert into tbl_tempstudentexcel (name,email,phone,deg_department,deg_college,deg_percentage,pg_percentage,
  	review_1,review_1_by,review_1_date,
  	review_2,review_2_by,review_2_date,
  	review_3,review_3_by,review_3_date,
  	review_4,review_4_by,review_4_date,
  	review_5,review_5_by,review_5_date)
  	 values ('$name','$email','$phone','$department','$collegename','$deg_percentage','$pg_percentage',
  	'".$detailsarray['review_1']."','".$detailsarray['review_1_by']."','".$detailsarray['review_1_date']."','
".$detailsarray['review_2']."','".$detailsarray['review_2_by']."','".$detailsarray['review_2_date']."','
".$detailsarray['review_3']."','".$detailsarray['review_3_by']."','".$detailsarray['review_3_date']."','
".$detailsarray['review_4']."','".$detailsarray['review_4_by']."','".$detailsarray['review_4_date']."','
".$detailsarray['review_5']."','".$detailsarray['review_5_by']."','".$detailsarray['review_5_date']."')";


   $result = mysql_query($sqlss);



}


$studentSql = "Select * from tbl_tempstudentexcel";
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
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
   <script>

    $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1940:2015"
    });
    $( "#datepicker1" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1940:2015"
    });


    $( "#format" ).change(function() {
      $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
      $( "#datepicker1" ).datepicker( "option", "dateFormat", $( this ).val() );

    });
  });
    </script>

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
				       <div class="form-group">
        <label class="col-sm-2 control-label">From Date<span class="error-text">*</span></label>
        <div class="col-sm-3">
        <input type="text" class="form-control" placeholder="From Date" id="datepicker" name="datepicker" value="">
        </div>        
                      
      </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">To Date<span class="error-text">*</span></label>
        <div class="col-sm-3">
        <input type="text" class="form-control" placeholder="To Date" id="datepicker1" name="datepicker1" value="">
        (Please select the interval within 30 days, Since there will be huge amount of data)</div>        
                      
      </div>

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
