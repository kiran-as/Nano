<?php
include('../application/conn.php');
$studentSql = mysql_query("Select * from tbl_student");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['idstudent'] = $row['idstudent'];
    $studentArray[$i]['studentname'] = $row['firstname'].' - '.$row['lastname'];
    $i++;
}

$studentSql = mysql_query("Select * from tbl_resumekeywords where idresumetype=1");
$resume=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $resumeKeyWordsVlsiArray[$resume]['idresumetype'] = $row['idresumetype'];
    $resumeKeyWordsVlsiArray[$resume]['keywords'] = $row['keywords'];
    $resume++;
}


$studentSql = mysql_query("Select * from tbl_resumekeywords where idresumetype=2");
$resume=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $resumeKeyWordsEmbeddedArray[$resume]['idresumetype'] = $row['idresumetype'];
    $resumeKeyWordsEmbeddedArray[$resume]['keywords'] = $row['keywords'];
    $resume++;
}



for($i=0;$i<count($studentArray);$i++)
{
    $foundEmbedded=0;
    $foundvlsi=0;    
    $idstudent = $studentArray[$i]['idstudent'];
    //function for academic project
     $studentArray[$i]['vlsi']='No';
     $studentArray[$i]['Embedded']='No';
    for($k=0;$k<count($resumeKeyWordsVlsiArray);$k++)
    {
        
        if($foundvlsi==1)
        {
            break;
        }

        $keyname = $resumeKeyWordsVlsiArray[$k]['keywords'];
        $studentAcademicSql = mysql_query("SELECT * FROM `tbl_academicproject` 
            WHERE challenges like '%$keyname%' OR 
            tools_used like '%$keyname%'  OR
            project_description like '%$keyname%' 
            and idstudent=$idstudent");
        while($row = mysql_fetch_assoc($studentAcademicSql))
        {
            $foundvlsi=1;
            $studentArray[$i]['vlsi']='Yes';
            break;
        }
    }
    
    for($l=0;$l<count($resumeKeyWordsEmbeddedArray);$l++)
    {
        
        if($foundEmbedded==1)
        {
            break;
        }

        $keyname = $resumeKeyWordsEmbeddedArray[$l]['keywords'];
        $studentAcademicSql = mysql_query("SELECT * FROM `tbl_academicproject` 
            WHERE challenges like '%$keyname%' OR 
            tools_used like '%$keyname%'  OR
            project_description like '%$keyname%' 
            and idstudent=$idstudent");
        while($row = mysql_fetch_assoc($studentAcademicSql))
        {
            $foundEmbedded=1;
            $studentArray[$i]['Embedded']='Yes';
            break;
        }
    }

}
echo "<pre/>";
print_r($studentArray);exit;
?>
<table>
    <tr>
        <th>
            Student Name
        </th>
        <th>
            Resume ID
        </th>
        <th>
           VLSI
        </th>
        <th>
            EMBEDDED
        </th>
    </tr>
</table>