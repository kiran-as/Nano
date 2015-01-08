<?php
include("application/conn.php");
$yearsql = mysql_query("Select * from tbl_year");
$i=0;
while($row = mysql_fetch_assoc($yearsql))
{
    $yeararray[$i]['idyear'] = $row['idyear'];
    $yeararray[$i]['years'] = $row['years'];    
    $i++;
}


?>
