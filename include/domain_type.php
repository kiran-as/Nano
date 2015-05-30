<?php
include("application/conn.php");
$yearsql = mysql_query("Select * from tbl_domain_type");
$i=0;
while($row = mysql_fetch_assoc($yearsql))
{
    $domain_typeArray[$i]['id'] = $row['id'];
    $domain_typeArray[$i]['domain_name'] = $row['domain_name'];    
    $i++;
}


?>
