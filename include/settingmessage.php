<?php
include("application/conn.php");
$yearsql = mysql_query("Select * from tbl_settings");
$i=0;
while($row = mysql_fetch_assoc($yearsql))
{
    $welcomepage = $row['welcomepage'];
    $profileinformationpage = $row['profileinformationpage'];
    $academicqualificationpage = $row['academicqualificationpage'];
    $beprojectspage = $row['beprojectspage'];
    $traininginstitutepage = $row['traininginstitutepage'];
    $companypage = $row['companypage'];
    $otherdetailpage = $row['otherdetailpage'];                        
}


?>