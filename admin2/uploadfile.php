<?php
include('../application/conn.php');

$idrecruitement = $_GET['idrecruitement'];
$companySql = mysql_query("Select * from tbl_recruiter as a, tbl_recruitement as b
                           where a.idrecruiter=b.idrecruiter and b.idrecruitement=$idrecruitement");
    while ($row = mysql_fetch_assoc($companySql)) {
  $companyname = $row['company'];
  $recruiterEmail = $row['email'];
  $recruiterName = $row['usename'];
  $jobcode = $row['jobcode'];
    }

if($_POST)
{

  $uploaddir = "../recruiter/$jobcode/";
 
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

$filename = $_FILES['fileToUpload']['name'];
mysql_query("Update tbl_recruitement set excelfilename='$filename' where 
  idrecruitement=$idrecruitement");


 echo "<script>parent.location='recruitementListSuperAdmin.php'</script>";
 exit;
}
?>

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
   
    <div class="container mar-t30">

    <form action="" method="post" enctype="multipart/form-data">
    Select Excel to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Excel" name="submit">
</form>
    </div>
</body>

