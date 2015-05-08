<?php
include("application/conn.php");
$yearsql = mysql_query("Select * from tbl_documents");
$i=0;
while($row = mysql_fetch_assoc($yearsql))
{
    $documentarray[$i]['iddocuments'] = $row['iddocuments'];
    $documentarray[$i]['documentname'] = $row['documentname'];    
    $i++;
}


?>
