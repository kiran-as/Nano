<?php
include('application/conn.php');
$idstudent = $_SESSION['idstudent'];
$success =2;
//echo "Select * from tbl_student where idstudent='$idstudent'";
$profileInformationSql = mysql_query("Select * from tbl_student where idstudent='$idstudent'");
while($row = mysql_fetch_assoc($profileInformationSql))
{
    $firstName = $row['firstname'];
    $lastName = $row['lastname'];
    $mobileNumber = $row['mobile'];
    $city = $row['city'];
    $country = $row['country'];
    $pincode = $row['pincode'];
    $fatherName = $row['fathername'];
    $datepicker = $row['dob'];
    $gender = $row['gender'];
    $nationality = $row['nationality'];
    $languages = $row['languages'];
    $address = $row['address']; 
    $email = $row['email'];
    $career_objective = $row['career_objective']; 
    $addressdoorno = $row['addressdoorno'];
    $addresslineone = $row['addresslineone']; 
    $addresslinetwo = $row['addresslinetwo'];
 $state = $row['state'];
}


////Academic deeatils//
$profileInformationSql = mysql_query("Select * from tbl_student where idstudent=$idstudent");
while($row = mysql_fetch_assoc($profileInformationSql))
{
      $sslcpassoutyear = $row['sslc_passoutyear'];
    $sslcpercentagetype = $row['sslc_percentagetype'];
    $sslcpercentage = $row['sslc_percentage'];
    $sslcschoolname = $row['sslc_schoolname'];
    
    $pucpassoutyear = $row['puc_passoutyear'];
    $pucpercentagetype = $row['puc_percentagetype'];
    $pucpercentage = $row['puc_percentage'];
    $pucschoolname = $row['puc_schoolname'];
    
    $degpassoutyear = $row['deg_passoutyear'];
    $degpercentagetype = $row['deg_percentagetype'];
    $degpercentage = $row['deg_percentage'];
    $degschoolname = $row['deg_schoolname'];
    $degboard = $row['deg_university'];
    $degdepartment = departmentname($row['deg_department']);
     
    $pgpassoutyear = $row['pg_passoutyear'];
    $pgpercentagetype = $row['pg_percentagetype'];
    $pgpercentage = $row['pg_percentage'];
    $pgschoolname = $row['pg_schoolname'];
    $pgboard = $row['pg_university'];
    $pgdepartment = departmentname($row['pg_department']);
     $pgdepartment = departmentname($row['pg_department']);
    if($pgdepartment=='Others')
    {
       $pgdepartment = $row['pg_othercoursename'];
     } 
     
   $pgdippassoutyear = $row['pgdip_passoutyear'];
    $pgdippercentagetype = $row['pgdip_percentagetype'];
    $pgdippercentage = $row['pgdip_percentage'];
    $pgdipschoolname = $row['pgdip_schoolname'];
    $pgdipboard = $row['pgdip_university'];
    $pgdipcourse = pgDipCourse($row['pgdip_coursename']);

    if($pgdipschoolname=='1')
    {
      $pgdipschoolname = 'RV-VLSI Design Center';
    }
    else
    {
      $pgdipschoolname = $row['pgdip_otherschools'];
    }

    $deg_projectname = $row['deg_projectname'];
    $deg_projectdescription = $row['deg_projectdescription'];
    $deg_projecttools = $row['deg_projecttools'];
    $deg_projectchallenges = $row['deg_projectchallenges'];
    
    $pg_projectname = $row['pg_projectname'];
    $pg_projectdescription = $row['pg_projectdescription'];
    $pg_projecttools = $row['pg_projecttools'];
    $pg_projectchallenges = $row['pg_projectchallenges'];
}

function departmentname($idDepartment)
{
  $departmentSql = mysql_query("Select * from tbl_department where iddepartment=$idDepartment");
  while($row = mysql_fetch_assoc($departmentSql))
  {
      $departmentName = $row['department'];
  }
  return $departmentName;
}

function pgDipCourse($idpgdipcourses)
{
  $departmentSql = mysql_query("Select * from tbl_pgdipcourses where idpgdipcourses=$idpgdipcourses");
  while($row = mysql_fetch_assoc($departmentSql))
  {
      $pgdip_coursename = $row['pgdip_coursename'];
  }
  return $pgdip_coursename;
}
/////////////////$achievementSql = mysql_query("Select * from tbl_achievements where idstudent=$idstudent");


////academic profiles///
$achievementSql = mysql_query("Select * from tbl_corecompetancy where idstudent=$idstudent");
$achievementsArray = array();
$i=0;
while($row = mysql_fetch_assoc($achievementSql))
{
    $achievementsArray[$i]['achievements'] = $row['corecompetancy'];
    $i++;
}
///////

////academic profiles///
//echo "Select * from tbl_academicproject where idstudent=$idstudent";
$academicSql = mysql_query("Select * from tbl_academicproject where idstudent=$idstudent");
$i=0;
while($row = mysql_fetch_assoc($academicSql))
{
    $academicArray[$i]['project_title'] = $row['project_title'];
    $academicArray[$i]['college_name'] = $row['college_name'];
    $academicArray[$i]['time_duration'] = $row['time_duration'];
    $academicArray[$i]['project_description'] = $row['project_description'];
    $academicArray[$i]['tools_used'] = $row['tools_used'];
    $academicArray[$i]['challenges'] = $row['challenges'];
    $academicArray[$i]['challenges1'] = $row['challenges1'];
    $academicArray[$i]['challenges2'] = $row['challenges2'];
    $academicArray[$i]['challenges3'] = $row['challenges3'];
    $academicArray[$i]['challenges4'] = $row['challenges4'];
    $i++;
}
///////
////academic profiles///
$companySql = mysql_query("Select * from tbl_companyproject where idstudent=$idstudent");
$companyArraySql = array($companySql);
$i=0;
while($row = mysql_fetch_assoc($companyArraySql))
{
    $companyArray[$i]['project_title'] = $row['project_title'];
    $companyArray[$i]['company_name'] = $row['company_name'];
    $companyArray[$i]['time_duration'] = $row['time_duration'];
    $companyArray[$i]['project_description'] = $row['project_description'];
    $companyArray[$i]['tools_used'] = $row['tools_used'];
    $companyArray[$i]['challenges'] = $row['challenges'];
    $companyArray[$i]['challenges1'] = $row['challenges1'];
    $companyArray[$i]['challenges2'] = $row['challenges2'];
    $companyArray[$i]['challenges3'] = $row['challenges3'];
    $companyArray[$i]['challenges4'] = $row['challenges4'];    
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <form action='' method='POST'>
<header>
        <div class="navbar navbar-inverse top--header" role="navigation">
          <div class="container">
            <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>             
              <a href="#" class="navbar-brand logo logo--small mar-t10 mar-b10">Nanochip Solutions</a>              
            </div> 
            <div class="row">
            <div class="navbar-right">
            <div id="navbar" class="navbar-collapse collapse">  
               <div class="clearfix">
                <ul class="nav navbar-nav header-nav">
                  <li>Welcome <?php echo $_SESSION['studentName'];?></li>
                  <li class=""><a href="editResume.php" class="pad-sm-t13 pad-sm-b12">Edit Resume</a></li>
                  <li class=""><a href="index.php" class="pad-sm-t13 pad-sm-b12">Logout</a></li>                                  
                </ul>                   
               </div>                                            
            </div>    
            </div>                  
            </div>                           
          </div>
        </div>      
    </header> <!--/Header Ends-->   
     <?php include('include/nav.php');?>
    <div class="container mar-t30">
<table width="100%">
    <!-- Career objective message -->
    <div class="row">
      <?php if(empty($career_objective)) { ?>
     <tr><td> <hr/>
     <?php $success=1;?>
       Career objective is missing which is the most important in the resume to get shortlisted. Please click on the "OTHER DETAILS" tab and fill the career objective.
     </td></tr>
      <?php } else if(strlen($career_objective)<92) {?>
<tr><td><hr/>
<?php $success=1;?>
       Add more details on the Career objective this will improve the chances of resume getting shortlisted.  Please click on the "OTHER DETAILS" tab and fill the career objective.
    </td></tr>
      <?php }?>
     </div>
    <!-- end of career objective messages-->

    <!-- Career objective message -->
    <div class="row">
      <?php if(empty($achievementsArray)) { ?>
     <tr><td><hr/>
     <?php $success=1;?>
       Ideally it is recommended to have atleast 7 or more core competancies in your resume. Please click on the "OTHER DETAILS" tab and fill the Core competancy.
     </td></tr>
      <?php } else if(count($achievementsArray)<7) {?>
    <tr><td><hr/>
    <?php $success=1;?>
      Ideally it is recommended to have atleast 7 or more core competancies in your resume. Please click on the "OTHER DETAILS" tab and fill the Core competancy.
     </td></tr>
      <?php }?>
     </div>
    <!-- end of career objective messages-->

    <!-- Company Project message -->
    <div class="row">
     <?php 
      for($i=0;$i<count($academicArray);$i++){
           $project_title = $academicArray[$i]['project_title'];
          $college_name = $academicArray[$i]['college_name'];
          $time_duration = $academicArray[$i]['time_duration'];
          $project_description = $academicArray[$i]['project_description'];
          $tools_used = $academicArray[$i]['tools_used'];
          $challenges = $academicArray[$i]['challenges'];
          $challenges1 = $academicArray[$i]['challenges1'];
          $challenges2 = $academicArray[$i]['challenges2'];
          $challenges3 = $academicArray[$i]['challenges3'];
          $challenges4 = $academicArray[$i]['challenges4'];
          if(empty($challenges4)) {?>
         
          <?php }?>

         <?php if((count($challenges1)<91) && (count($challenges2)<91)) {?>
          <tr><td><hr/>
          <?php $success=1;?>
           Ideally it is recommended to add more details on the first two challenges for the project "<?php echo $project_title;?>"
         </td></tr>
          <?php }?>

          <?php }?>
     </div>
    <!-- end of Company Project messages-->

      <!-- Company Project message -->
    <div class="row">
     <?php 
      for($i=0;$i<count($companyArray);$i++){
           $project_title = $companyArray[$i]['project_title'];
          $college_name = $companyArray[$i]['college_name'];
          $time_duration = $companyArray[$i]['time_duration'];
          $project_description = $companyArray[$i]['project_description'];
          $tools_used = $companyArray[$i]['tools_used'];
          $challenges = $companyArray[$i]['challenges'];
          $challenges1 = $companyArray[$i]['challenges1'];
          $challenges2 = $companyArray[$i]['challenges2'];
          $challenges3 = $companyArray[$i]['challenges3'];
          $challenges4 = $companyArray[$i]['challenges4'];
          if(empty($challenges4)) {?>
         
          <?php }?>

         <?php if((count($challenges1)<91) && (count($challenges2)<91)) {?>
          <tr><td><hr/>
          <?php $success=1;?>
           Ideally it is recommended to add more details on the first two challenges for the project "<?php echo $project_title;?>"
         </td></tr>
          <?php }?>

          <?php }?>
     </div>

     <?php if($success==1) {?>
     <tr><td><hr/>
           Force download to see the resume <a href="downloadResume.php">Click here to download</a>
           </td></tr>
     <?php } else { ?>
      <tr><td><hr/>
          Congrates!!! Your resumes has high chances for getting shortlisted. <a href="downloadResume.php">Click here to download</a>
         </td></tr>

     <?php } ?>
</table>
     </div>
     </form> 

    <div class="clearfix brd-top pad-t20">
    <a href="processResume.php" class="btn btn-primary pull-right">Submit Resume</a>
    </div>
    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
