<?php
include("application/conn.php");
$pgCoursesSql = mysql_query("Select * from tbl_pgdipcourses");
$i=0;
while($row = mysql_fetch_assoc($pgCoursesSql))
{
    $pgCoursesArray[$i]['idpgdipcourses'] = $row['idpgdipcourses'];
    $pgCoursesArray[$i]['pgdip_coursename'] = $row['pgdip_coursename'];    
    $i++;
}


?>
