<?php
include("application/conn.php");
$yearsql = mysql_query("Select * from tbl_batch");
$i=0;
while($row = mysql_fetch_assoc($yearsql))
{
    $batcharray[$i]['idbatch'] = $row['idbatch'];
    $batcharray[$i]['batchname'] = $row['batchname'];    
    $i++;
}


?>
