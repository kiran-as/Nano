<?php
include('../../application/conn.php');
$resumeTypesSql = mysql_query("Select * from tbl_resumetypes order by idresumetype asc");
$resume=0;
while($row = mysql_fetch_assoc($resumeTypesSql))
{
    $resumeTypesArray[$resume]['idresumetype'] = $row['idresumetype'];
    $idresumetype = $row['idresumetype'];
    $resumeCountSql = mysql_query("Select count(*) as totalcount
                           from tbl_resumekeywords 
                           where idresumetype='$idresumetype'");
	$resumecount=0;
	while($rows = mysql_fetch_assoc($resumeCountSql))
	{
		 $totalResumeKeyCount = $rows['totalcount'];
	}
    $resumeTypesArray[$resume]['resumeKeyCount'] = $totalResumeKeyCount;

    $resumeTypesArray[$resume]['resumetypename'] = $row['resumetypename'];
    $resume++;
}?>