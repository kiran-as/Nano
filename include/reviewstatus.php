<?php
include("application/conn.php");
$pgCoursesSql = mysql_query("Select * from tbl_reviewstatus");
$i=0;
while($row = mysql_fetch_assoc($pgCoursesSql))
{
    $reviewStatusArray[$i]['idreviewstatus'] = $row['idreviewstatus'];
    $reviewStatusArray[$i]['reviewname'] = $row['reviewname'];    
    $i++;
}


?>
