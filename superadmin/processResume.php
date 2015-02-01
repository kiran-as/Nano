<?php
include('../application/conn.php');
error_reporting(-1);
$studentSql = mysql_query("Select * from tbl_student");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['idstudent'] = $row['idstudent'];
    $studentArray[$i]['studentname'] = $row['firstname'].' - '.$row['lastname'];
    $i++;
}

$resumeTypesSql = mysql_query("Select * from tbl_resumetypes");
$resume=0;
while($row = mysql_fetch_assoc($resumeTypesSql))
{
    $resumeTypesArray[$resume]['idresumetype'] = $row['idresumetype'];
    $resumeTypesArray[$resume]['resumetypename'] = $row['resumetypename'];
    $resume++;
}


for($i=0;$i<count($studentArray);$i++)
{
     echo "<pre/>";
    $foundEmbedded=0;
    $foundvlsi=0;    
    echo $idstudent = $studentArray[$i]['idstudent'];
    //function for academic project
     $studentArray[$i]['vlsi']='No';
     $studentArray[$i]['Embedded']='No';

     for($resumetype=0;$resumetype<count($resumeTypesArray);$resumetype++){

         $idresumetype = $studentResumeType[$resumetype]['idresumetype'] =  $resumeTypesArray[$resumetype]['idresumetype'];
         $studentResumeType[$resumetype]['resumetypename'] =  $resumeTypesArray[$resumetype]['resumetypename'];
        

        $studentSql = mysql_query("Select * from tbl_resumekeywords where idresumetype='$idresumetype'");
        $resume=0;
        $resumeKeyWords = array();
        while($row = mysql_fetch_assoc($studentSql))
        {
            $resumeKeyWords[$resume]['idresumetype'] = $row['idresumetype'];
            $resumeKeyWords[$resume]['keywords'] = $row['keywords'];
            $resume++;
        }
        
        for($k=0;$k<count($resumeKeyWords);$k++)
        {
            $keyname = $resumeKeyWords[$k]['keywords'];
            $noOfKeyFound = 0;
            $keyWordsFound = '';
            $keyfound = 'no';
            echo "SELECT * FROM `tbl_academicproject` 
                WHERE challenges like '%$keyname%' OR 
                tools_used like '%$keyname%'  OR
                project_description like '%$keyname%' 
                and idstudent=$idstudent ";
            $studentAcademicSql = mysql_query("SELECT * FROM `tbl_academicproject` 
                WHERE challenges like '%$keyname%' OR 
                tools_used like '%$keyname%'  OR
                project_description like '%$keyname%' 
                and idstudent=$idstudent ");
            while($row = mysql_fetch_assoc($studentAcademicSql))
            {
                $noOfKeyFound++;
                $keyWordsFound = $keyname;
                $keyfound = 'Yes';

                break;
            }
                $studentResumeType[$resumetype]['resumeKeywordSelection'][$k]['keyfound'] = $keyfound;
                $studentResumeType[$resumetype]['resumeKeywordSelection'][$k]['noOfKeyWords'] = $noOfKeyFound;
                $studentResumeType[$resumetype]['resumeKeywordSelection'][$k]['keyWordsfound'] = $keyWordsFound;
        }


     }
 
 /* print_R($studentResumeType);
  exit;*/

    for($s=0;$s<count($studentResumeType);$s++)
    {
        $resumeTypeId = $studentResumeType[$s]['idresumetype'];
        $keywordsCount = 0;
        $keywordsFound = '';
        $studentResumeProcess[$s]['idresumetype'] = $resumeTypeId;
        for($j=0;$j<count($studentResumeType[$s]['resumeKeywordSelection']);$j++)
        {
            if($studentResumeType[$s]['resumeKeywordSelection'][$j]['keyfound']=='Yes')
            {
                $keywordsCount = $keywordsCount + $studentResumeType[$s]['resumeKeywordSelection'][$j]['noOfKeyWords'];
                $keywordsFound = $keywordsFound.' , '.$studentResumeType[$s]['resumeKeywordSelection'][$j]['keyWordsfound'];

            }
            $studentResumeProcess[$s]['noOfKeyWords'] = $keywordsCount;
            $studentResumeProcess[$s]['keyWordsfound'] = $keywordsFound;
        }
        //$resumeTypeId = $studentResumeType[$i]['idresumetype'];
    }

   /* print_r($studentResumeProcess);
    exit;*/
    mysql_query("Delete from tbl_studentresumekeywords where idstudent='$idstudent'");
    for($k=0;$k<count($studentResumeProcess);$k++)
    {
        $idresumetype = $studentResumeProcess[$k]['idresumetype'];
        $noOfKeyWords = $studentResumeProcess[$k]['noOfKeyWords'];
        $keyWordsfound = $studentResumeProcess[$k]['keyWordsfound'];
        $idstudent = $idstudent;
        mysql_query("Insert into tbl_studentresumekeywords (idstudent,idresumetype,noofkeywords,keywords)
            values ('$idstudent','$idresumetype','$noOfKeyWords','$keyWordsfound')");

        echo "Insert into tbl_studentresumekeywords (idstudent,idresumetype,noofkeywords,keywords)
            values ('$idstudent','$idresumetype','$noOfKeyWords','$keyWordsfound')";

    }
}

echo "<script>parent.location='dashboard.php'</script>";
exit;
?>
