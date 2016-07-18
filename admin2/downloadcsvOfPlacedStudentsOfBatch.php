<?php
include('../application/conn.php');
error_reporting(-1);

$batchname = $_GET['batchname'];
$filename = $batchname.".csv";
$fp = fopen('php://output', 'w');

$header[] = 'FirstName';
$header[] = 'LastNAme';
$header[] = 'Email';
$header[] = 'Mobile';
$header[] = 'ProfilePic';
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);
    $countSql = mysql_query("Select firstname,lastname,email,mobile,profilepic  from tbl_student where rvvlsiid like '%$batchname%' and placed='Yes'");
    while($rowss = mysql_fetch_assoc($countSql))
    {
        $rowss['profilepic'] = 'http://nanochipsolutions.com/college/img/profilepic/'.$rowss['profilepic'];
        fputcsv($fp, $rowss);
    }



?>
