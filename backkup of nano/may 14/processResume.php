<?php
include('application/conn.php');
include('include/settingmessage.php');
error_reporting(-1);
$idstudent = $_SESSION['idstudent'];
$studentSql = mysql_query("Select * from tbl_student where idstudent='$idstudent'");
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
    $foundEmbedded=0;
    $foundvlsi=0;    
    $idstudent = $studentArray[$i]['idstudent'];
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
           /* echo "SELECT * FROM `tbl_academicproject` 
                WHERE challenges like '%$keyname%' OR 
                tools_used like '%$keyname%'  OR
                project_description like '%$keyname%' 
                and idstudent=$idstudent ";*/
             $studentAcademicSql = mysql_query("SELECT * FROM `tbl_academicproject` 
                WHERE (challenges like '%$keyname%' OR 
                tools_used like '%$keyname%'  OR
                 project_title like '%$keyname%'  OR
                project_description like '%$keyname%') and idstudent=$idstudent 
                 ");
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
}

for($i=0;$i<count($studentResumeType);$i++)
{
    $resumeTypeId = $studentResumeType[$i]['idresumetype'];
    $keywordsCount = 0;
    $keywordsFound = '';
    $studentResumeProcess[$i]['idresumetype'] = $resumeTypeId;
    for($j=0;$j<count($studentResumeType[$i]['resumeKeywordSelection']);$j++)
    {
        if($studentResumeType[$i]['resumeKeywordSelection'][$j]['keyfound']=='Yes')
        {
            $keywordsCount = $keywordsCount + $studentResumeType[$i]['resumeKeywordSelection'][$j]['noOfKeyWords'];
            $keywordsFound = $keywordsFound.' , '.$studentResumeType[$i]['resumeKeywordSelection'][$j]['keyWordsfound'];

        }
        $studentResumeProcess[$i]['noOfKeyWords'] = $keywordsCount;
        $studentResumeProcess[$i]['keyWordsfound'] = $keywordsFound;
    }
    //$resumeTypeId = $studentResumeType[$i]['idresumetype'];
}

//sprint_r($studentResumeProcess);
mysql_query("Delete from tbl_studentresumekeywords where idstudent='$idstudent'");
for($k=0;$k<count($studentResumeProcess);$k++)
{
    $idresumetype = $studentResumeProcess[$k]['idresumetype'];
    $noOfKeyWords = $studentResumeProcess[$k]['noOfKeyWords'];
    $keyWordsfound = $studentResumeProcess[$k]['keyWordsfound'];
    $idstudent = $idstudent;
    mysql_query("Insert into tbl_studentresumekeywords (idstudent,idresumetype,noofkeywords,keywords)
        values ('$idstudent','$idresumetype','$noOfKeyWords','$keyWordsfound')");

}

/*echo "<pre/>";
print_r($studentResumeProcess);
exit;*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nanochip Solutions</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script>
  function fnNextClick()
  {
  	 parent.location='profileInformation.php';
  }
  </script>
  </head>

  <body>
   <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
     <p class="alert alert-success txtc font16-sm-reg"><?php echo $thankyoupage;?>
</p>
                
    </div> 
    
    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
 
  </body>
</html>
