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

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nanochip Solutions</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <?php include('../include/header.php');?>
    <?php //include('include/nav.php');?>
    <div class="container mar-t30">
    <div class="clearfix brd-btm pad-b20">
        <a href="addCompanyProject.php" class="btn btn-primary pull-right" >+ ADD PROJECT</a>                     
    </div>    
    <table class="table table-striped">
      <thead>
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
      </thead>
      <tbody>
           <?php for($i=0;$i<count($studentArray);$i++){?>
        <tr>
        <th>
            <?php echo $studentArray[$i]['studentname'];?>
        </th>
        <th>
            <?php echo $studentArray[$i]['idstudent'];?>
        </th>
        <th>
            <?php echo $studentArray[$i]['vlsi'];?>
        </th>
        <th>
            <a href="viewResume.php?resumeTypes=2&idstudent=<?php echo $studentArray[$i]['idstudent'];?>" target="_blank"><?php echo $studentArray[$i]['Embedded'];?></a>
        </th>
    </tr>
   <?php } ?>
                                                             
      </tbody>
    </table>                
    <div class="clearfix brd-top pad-t20">
        <button type="submit" class="btn btn-primary pull-right">NEXT</button>                      
    </div>                   
    </div> 
    
    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
 
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
