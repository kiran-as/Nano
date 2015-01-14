<?php
include('application/conn.php');
$idstudent = $_SESSION['idstudent'];
echo "Select * from tbl_student where idstudent='$idstudent'";
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
     
     
    $pgdippassoutyear = $row['pgdip_passoutyear'];
    $pgdippercentagetype = $row['pgdip_percentagetype'];
    $pgdippercentage = $row['pgdip_percentage'];
    $pgdipschoolname = $row['pgdip_schoolname'];
    $pgdipboard = $row['pgdip_university'];
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
/////////////////$achievementSql = mysql_query("Select * from tbl_achievements where idstudent=$idstudent");
$achievementsArray = array();
$i=0;
while($row = mysql_fetch_assoc($achievementSql))
{
    $achievementsArray[$i]['achievements'] = $row['achievements'];
    $i++;
}


////academic profiles///
$achievementSql = mysql_query("Select * from tbl_achievements where idstudent=$idstudent");
$achievementsArray = array();
$i=0;
while($row = mysql_fetch_assoc($achievementSql))
{
    $achievementsArray[$i]['achievements'] = $row['achievements'];
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
    $i++;
}
///////
////academic profiles///
$companySql = mysql_query("Select * from tbl_companyproject where idstudent=$idstudent");
$i=0;
while($row = mysql_fetch_assoc($companySql))
{
    $companyArray[$i]['project_title'] = $row['project_title'];
    $companyArray[$i]['company_name'] = $row['company_name'];
    $companyArray[$i]['time_duration'] = $row['time_duration'];
    $companyArray[$i]['project_description'] = $row['project_description'];
    $companyArray[$i]['tools_used'] = $row['tools_used'];
    $companyArray[$i]['challenges'] = $row['challenges'];
    $i++;
}
///////


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
   <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    <p class="font16-sm brd-btm">Personal Information</p>
    <div class="row">
      <div class="col-sm-3">
        <label class="control-label"><span class="font-gray">Name :</span><?php echo $firstName.' '.$lastName;?></label>
      </div>
      <div class="col-sm-3">
        <label class="control-label"><span class="font-gray">Email :</span><?php echo $email;?></label>
      </div> 
      <div class="col-sm-3">
        <label class="control-label"><span class="font-gray">Phone Number :</span> <?php echo $mobileNumber;?></label>
      </div> 
      <div class="col-sm-3">
        <label class="control-label"><span class="font-gray">Address :</span> 
<?php echo $address;?></label>
      </div>                 
    </div> 
    <p class="font16-sm brd-btm">Profile Summary</p>
    <p><?php echo $career_objective;?></p>   
    <p class="font16-sm brd-btm pad-t10">Technical Skills</p>
<ul class="content-list">
    <?php if($achievementsArray[0]['achievements']!=''){?>
    <li><?php echo $achievementsArray[0]['achievements'];?></li>
    <?php }?>
    <?php if($achievementsArray[1]['achievements']!=''){?>
    <li><?php echo $achievementsArray[1]['achievements'];?></li>
    <?php }?>
    <?php if($achievementsArray[2]['achievements']!=''){?>
    <li><?php echo $achievementsArray[2]['achievements'];?></li>
    <?php }?>
</ul>                             
<p class="font16-sm brd-btm pad-t10">Educational Details</p>
   <table class="table table-bordered">
      <thead>
          <tr>
              <th>Degree</th>
              <th>Discipline</th>
              <th>College/School</th>
              <th>Year Of Passing</th>
              <th>Aggregate</th>
          </tr>
      </thead>
      <tbody>
          <?php if($pgdipschoolname!='')
          {?>
          <tr>
              <td>PG Diploma</td>
              <td>Embedded Systems</td>
              <td>RV_VLSI Deisgn Center</td>
              <td>2010</td>
              <td>50%</td>                            
          </tr>
          <?php }?>
          
          <?php if($pgboard!='') {?>
          <tr>
              <td>Master Degree</td>
              <td><?php echo $pgdepartment;?></td>
              <td><?php echo $pgschoolname;?></td>
              <td><?php echo $pgpassoutyear;?></td>
              <td><?php echo $pgpercentage;?></td>                            
          </tr>
          <?php }?>
          <?php if($degschoolname!='') {?>
          <tr>
              <td>Degree</td>
              <td><?php echo $degdepartment;?></td>
              <td><?php echo $degschoolname;?></td>
              <td><?php echo $degpassoutyear;?></td>
              <td><?php echo $degpercentage;?></td>                            
          </tr>
          <?php }?>
           <?php if($pucschoolname!='') {?>
          <tr>
              <td>PUC</td>
              <td> - </td>
              <td><?php echo $pucschoolname;?></td>
              <td><?php echo $pucpassoutyear;?></td>
              <td><?php echo $pucpercentage;?></td>                            
          </tr>
          <?php }?>
          <tr>
              <td>SSLC</td>
              <td> - </td>
              <td><?php echo $sslcschoolname;?></td>
              <td><?php echo $sslcpassoutyear;?></td>
              <td><?php echo $sslcpercentage;?></td>                            
          </tr>
      </tbody>
       
   </table>  
  <p class='font16-sm brd-btm pad-t10'>Project Details</p>";
      <?php for($i=0;$i<count($academicArray);$i++){
           $project_title = $academicArray[$i]['project_title'];
    $college_name = $academicArray[$i]['college_name'];
    $time_duration = $academicArray[$i]['time_duration'];
    $project_description = $academicArray[$i]['project_description'];
    $tools_used = $academicArray[$i]['tools_used'];
    $challenges = $academicArray[$i]['challenges'];?>
          <table class='table table-bordered'>
      <tbody>
          <tr>
              <td width='15%'><span class='font-gray'>Project Name</span></td>                           
              <td width='70%'> <?php  echo $project_title;?></td>                           
          </tr>  
          <tr>
              <td><span class='font-gray'>Company Name</span></td>                           
              <td><?php  echo $college_name;?></td>                           
          </tr>  
          <tr>
              <td><span class='font-gray'>Project Description</span></td>                           
              <td><?php  echo $project_description;?></td>                           
          </tr> 
          <tr>
              <td><span class='font-gray'>Challenges</span></td>                           
              <td><?php  echo $challenges;?></td>                           
          </tr> 
          <tr>
              <td><span class='font-gray'>Tools</span></td>                           
              <td><?php  echo $tools_used;?></td>                           
          </tr> 
      </tbody>
       
   </table> ";
     <?php }?>

      <?php for($i=0;$i<count($companyArray);$i++){
           $project_title = $companyArray[$i]['project_title'];
    $college_name = $companyArray[$i]['company_name'];
    $time_duration = $companyArray[$i]['time_duration'];
    $project_description = $companyArray[$i]['project_description'];
    $tools_used = $companyArray[$i]['tools_used'];
    $challenges = $companyArray[$i]['challenges'];
    $idcompanyproject = $companyArray[$i]['idcompanyproject'];?>
          <table class='table table-bordered'>
      <tbody>
          <tr>
              <td width='15%'><span class='font-gray'>Project Name</span></td>                           
              <td width='70%'> <?php  echo $project_title;?></td>                           
          </tr>  
          <tr>
              <td><span class='font-gray'>Company Name</span></td>                           
              <td><?php  echo $college_name;?></td>                           
          </tr>  
          <tr>
              <td><span class='font-gray'>Project Description</span></td>                           
              <td><?php  echo $project_description;?></td>                           
          </tr> 
          <tr>
              <td><span class='font-gray'>Challenges</span></td>                           
              <td><?php  echo $challenges;?></td>                           
          </tr> 
          <tr>
              <td><span class='font-gray'>Tools</span></td>                           
              <td><?php  echo $tools_used;?></td>                           
          </tr> 
      </tbody>
       
   </table> ";
     <?php }?>
    
      
    </div> 
    <div>
    <a href="processResume.php">Submit Resume</a>
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
