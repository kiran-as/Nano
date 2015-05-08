<?php
include("application/conn.php");
$yearsql = mysql_query("Select * from tbl_councellor");
$i=0;
while($row = mysql_fetch_assoc($yearsql))
{
    $councellorarray[$i]['idcouncellor'] = $row['idcouncellor'];
    $councellorarray[$i]['name'] = $row['firstname'].' '.$row['lastname'];    
    $i++;
}


?>
