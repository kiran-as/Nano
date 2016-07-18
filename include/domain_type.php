<?php
include("application/conn.php");
$yearsql = mysql_query("Select * from tbl_resumetypes");
$i=0;
while($row = mysql_fetch_assoc($yearsql))
{
    $domain_typeArray[$i]['idresumetype'] = $row['idresumetype'];
    $domain_typeArray[$i]['resumetypename'] = $row['resumetypename'];    
    $i++;
}


?>
