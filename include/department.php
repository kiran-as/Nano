<?php
include("application/conn.php");
$yearsql = mysql_query("Select * from tbl_department");
$i=0;
while($row = mysql_fetch_assoc($yearsql))
{
    $departmentarray[$i]['iddepartment'] = $row['iddepartment'];
    $departmentarray[$i]['department'] = $row['department'];    
    $i++;
}


?>
