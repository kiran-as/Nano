<?php
include("application/conn.php");
$trainingInstituteSql = mysql_query("Select * from tbl_traininginstitute");
$i=0;
while($row = mysql_fetch_assoc($trainingInstituteSql))
{
    $trainingInstituteArray[$i]['idtraininginstitute'] = $row['idtraininginstitute'];
    $trainingInstituteArray[$i]['traininginstitute'] = $row['traininginstitute'];    
    $i++;
}


?>
