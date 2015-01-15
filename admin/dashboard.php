<?php
include('../application/conn.php');

//function to fetch freshers resume
$fresherResumeCount=0;
$fresherResume = mysql_query("Select * from tbl_student where 
    deg_percentage !=''  and pg_percentage='0' and pgdip_percentage!='0' and phd_percentage='0'");
while($row = mysql_fetch_assoc($fresherResume))
{
    $fresherResumeCount++;
}

//function for fetching the count of rv-vlsi resumes independent of degree
$rvvlsiDesignCenterCount=0;
$rvvlsiDesignCenterSql = mysql_query("Select * from tbl_student where 
    pgdip_percentage !='0' and pgdip_schoolname='1'");
while($row = mysql_fetch_assoc($rvvlsiDesignCenterSql))
{
    $rvvlsiDesignCenterCount++;
}

//function for fetching the count of rv-vlsi resumes independent of degree
$experienceResumeCount=0;
$fresherResume = mysql_query("Select distinct(idstudent) from tbl_companyproject");
while($row = mysql_fetch_assoc($fresherResume))
{
    $experienceResumeCount++;
}

//function for fetching the count other institute resume
$otherCenterCount=0;
$otherCenterSql = mysql_query("Select * from tbl_student where 
    pgdip_percentage !='0' and pgdip_schoolname!='1'");
while($row = mysql_fetch_assoc($otherCenterSql))
{
    $otherCenterCount++;
}

//function to fetch only the resumes of BE
$BEResumeCount=0;
$BEResume = mysql_query("Select * from tbl_student where 
    deg_percentage !='0'  and pg_percentage='0' and phd_percentage='0'");
while($row = mysql_fetch_assoc($BEResume))
{
    $BEResumeCount++;
}

//function to fetch only the resumes of ME
$MEResumeCount=0;
$MEResume = mysql_query("Select * from tbl_student where 
     pg_percentage!='0' and phd_percentage='0'");
while($row = mysql_fetch_assoc($MEResume))
{
    $MEResumeCount++;
}

//function to fetch only the resumes of Ph.D
$PhdResumeCount=0;
$PhdResume = mysql_query("Select * from tbl_student where phd_percentage!='0'");
while($row = mysql_fetch_assoc($PhdResume))
{
    $PhdResumeCount++;
}
//echo $otherCenterCount;

//function to fetch the pgdiplomacourses
$pgDiplomaCoursesSql = mysql_query("Select * from tbl_pgdipcourses");
$i=0;
while($row = mysql_fetch_assoc($pgDiplomaCoursesSql))
{

  //    print_r($row);
    $pgdiplomacoursesArray[$i]['coursename'] = $row['pgdip_coursename'];
    $idPgDipCoureses = $row['idpgdipcourses'];
    $noOfBeDipCourses = 0;
    $noOfMeDipCourses = 0;
/*    echo "Select * from tbl_student where 
        deg_percentage !='0'  and pg_percentage='0' and phd_percentage='0' and 
        pgdip_coursename='$idPgDipCoureses'";
        exit;*/
    $BEResume = mysql_query("Select * from tbl_student where 
        deg_percentage !='0'  and pg_percentage='0' and phd_percentage='0' and 
        pgdip_coursename='$idPgDipCoureses'");
    while($row = mysql_fetch_assoc($BEResume))
    {

        $noOfBeDipCourses++;
    }
   /* echo $noOfBeDipCourses;
    exit;*/
    //function to fetch only the resumes of ME
    $MEResume = mysql_query("Select * from tbl_student where 
         pg_percentage!='0' and phd_percentage='0' and 
        pgdip_coursename='$idPgDipCoureses'");
    while($row = mysql_fetch_assoc($MEResume))
    {
        $noOfMeDipCourses++;
    }

    $pgdiplomacoursesArray[$i]['noOfBeDipCourses'] = $noOfBeDipCourses;
    $pgdiplomacoursesArray[$i]['noOfMeDipCourses'] = $noOfMeDipCourses;
    $i++;
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
        <div class="clearfix brd-btm pad-b20" style="display:none">
        <a href="addCompanyProject.php" class="btn btn-primary pull-right" >+ ADD PROJECT</a>                     
    </div>    
    <table class="table table-striped">
      <thead>
        <tr>
          <th>
            Freshers
        </th>
        <th>
            RV-VLSI
        </th>
        <th>
           Experience
        </th>
        <th>
            Other Schools
        </th>
        </tr>
      </thead>
      <tbody>
           
        <tr>
        <th>
            <?php echo $fresherResumeCount;?>
        </th>
        <th>
            <?php echo $rvvlsiDesignCenterCount;?>
        </th>
        <th>
            <?php echo $experienceResumeCount;?>
        </th>
        <th>
            <?php echo $otherCenterCount;?>
        </th>
    </tr>
  
                                                             
      </tbody>
    </table>  

    <table class="table table-striped">
      <thead>
        <tr>
          <th>
            BE
        </th>
        <th>
            ME
        </th>
        <th>
           Ph.D
        </th>
        
        </tr>
      </thead>
      <tbody>
           
        <tr>
        <th>
            <?php echo $BEResumeCount;?>
        </th>
        <th>
            <?php echo $MEResumeCount;?>
        </th>
        <th>
            <?php echo $PhdResumeCount;?>
        </th>
        
    </tr>
   
                                                             
      </tbody>
    </table>  


 <table class="table table-striped">
      <thead>
        <tr>
          <th> Pg Course Name
        </th>
        <th>
            BE
        </th>
        <th>
          ME
        </th>
        
        </tr>
      </thead>
      <tbody>
           <?php for($i=0;$i<count($pgdiplomacoursesArray);$i++){?>
        <tr>
        <th>
            <?php echo $pgdiplomacoursesArray[$i]['coursename'];?>
        </th>
        <th>
            <?php echo $pgdiplomacoursesArray[$i]['noOfBeDipCourses'];?>
        </th>
        <th>
            <?php echo $pgdiplomacoursesArray[$i]['noOfMeDipCourses'];?>
        </th>
        
    </tr>
   
           <?php }?>                                                  
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
