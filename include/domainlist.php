<?php
include("application/conn.php");
$yearsql = mysql_query("Select * from tbl_resumetypes");
$i=0;
while($row = mysql_fetch_assoc($yearsql))
{
    $resumetypearray[$i]['idresumetype'] = $row['idresumetype'];
    $resumetypearray[$i]['resumetypename'] = $row['resumetypename'];    
    $i++;
}


?>
