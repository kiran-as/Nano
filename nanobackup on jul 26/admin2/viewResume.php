<?php
include('../application/conn.php');
$idstudent = $_GET['idstudent'];
//echo "Select * from tbl_resumekeywords where idresumetype=$idresumeTypes";
$resumeKeywordsSql = mysql_query("Select * from tbl_resumekeywords ");
while($row = mysql_fetch_assoc($resumeKeywordsSql))
{
    $resumeKeyWordsArray[] = $row['keywords'];
}
    
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
    $i++;
}
///////
$address = "";
if($addressdoorno!=''){
 $address.= '#'.$addressdoorno."<br/>";
 }
 if($addresslineone!=''){
  $address.= $addresslineone."<br/>";
 }
 if($addresslinetwo!=''){
 $address.= $addresslinetwo."<br/>";
 }
 if($city!=''){
 $address.=$city."<br/>";
 }
 if($state!=''){
  if($pincode!=''){
 $address.= $state."-".$pincode."<br/>";
 }
 else
 {
 $address.=$state."<br/>";
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
   <?php include('include/header.php');?>
 <?php $html = "<div class='container mar-t30'>
    <p class='font16-sm brd-btm'>Personal Information</p>
    <div class='row'>
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Name :</span>$firstName $lastName</label>
      </div>
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Email :</span>$email</label>
      </div> 
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Phone Number :</span>$mobileNumber</label>
      </div> 
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Address :</span> 
$address      
</div>                 
    </div> 
    <p class='font16-sm brd-btm'>Profile Summary</p>
    <p>$career_objective</p>   
    <p class='font16-sm brd-btm pad-t10'>Core Competancy</p>
<ul class='content-list'>";
 if($achievementsArray[0]['achievements']!=''){
     $achievements = $achievementsArray[0]['achievements'];
    $html.="<li>$achievements</li>";
     }
    if($achievementsArray[1]['achievements']!=''){
    $achievements = $achievementsArray[1]['achievements'];
    $html.="<li>$achievements</li>";
     }
     if($achievementsArray[2]['achievements']!=''){
    $achievements = $achievementsArray[2]['achievements'];
    $html.="<li>$achievements</li>";
     }
     if($achievementsArray[3]['achievements']!=''){
    $achievements = $achievementsArray[3]['achievements'];
    $html.="<li>$achievements</li>";
     }
      if($achievementsArray[4]['achievements']!=''){
    $achievements = $achievementsArray[4]['achievements'];
    $html.="<li>$achievements</li>";
     }
    $html.="
</ul>                             
<p class='font16-sm brd-btm pad-t10'>Educational Details</p>
   <table class='table table-bordered'>
      <thead>
          <tr>
              <th>Degree</th>
              <th>Discipline</th>
              <th>University</th>
              <th>Year Of Passing</th>
              <th>Aggregate</th>
          </tr>
      </thead>
      <tbody>";
        if($pgdipschoolname!='')
          {
           $html.="<tr>
              <td>PG Diploma</td>
              <td>$pgdipcourse</td>
              <td>$pgdipschoolname</td>
              <td>$pgdippassoutyear</td>
              <td>-</td>                            
          </tr>";
           }
          
          if($pgboard!='') {
           $html.="<tr>
              <td>Master Degree</td>
              <td>$pgdepartment</td>
              <td>$pgschoolname</td>
              <td>$pgpassoutyear</td>
              <td>$pgpercentage</td>                            
          </tr>";
          }
           if($degschoolname!='') {
           $html.="<tr>
              <td>Degree</td>
              <td>$degdepartment</td>
              <td>$degschoolname</td>
              <td>$degpassoutyear</td>
              <td>$degpercentage</td>                            
          </tr>";
          }
           if($pucschoolname!='') {
           $html.="<tr>
              <td>PUC</td>
              <td> - </td>
              <td>$pucschoolname</td>
              <td>$pucpassoutyear</td>
              <td>$pucpercentage</td>                            
          </tr>";
          }
          if($pucschoolname!='') {
              $html.="<tr>
              <td>SSLC</td>
              <td> - </td>
              <td>$sslcschoolname</td>
              <td>$sslcpassoutyear</td>
              <td>$sslcpercentage</td>                            
          </tr>";
          }
      $htmls="</tbody>
       
   </table>  
   <p class='font16-sm brd-btm pad-t10'>Project Details</p>";
      for($i=0;$i<count($academicArray);$i++){
           $project_title = $academicArray[$i]['project_title'];
    $college_name = $academicArray[$i]['college_name'];
    $time_duration = $academicArray[$i]['time_duration'];
    $project_description = $academicArray[$i]['project_description'];
    $tools_used = $academicArray[$i]['tools_used'];
    $challenges = $academicArray[$i]['challenges'];
          $htmls.="<table class='table table-bordered'>
      <tbody>
          <tr>
              <td width='15%'><span class='font-gray'>Project Name</span></td>                           
              <td width='70%'>$project_title</td>                           
          </tr>  
          <tr>
              <td><span class='font-gray'>Institute Name</span></td>                           
              <td>$college_name</td>                           
          </tr>";
           if($project_description!=''){
          $htmls.="<tr>
              <td><span class='font-gray'>Project Description</span></td>                           
              <td>$project_description</td>                           
          </tr>";
          }
             if($challenges!=''){
          $htmls.="<tr>
              <td><span class='font-gray'>Challenges/ Solutions</span></td>                           
              <td>$challenges</td>                           
          </tr>";
          } 
             if($tools_used!=''){
          $htmls.="<tr>
              <td><span class='font-gray'>Tools</span></td>                           
              <td>$tools_used</td>                           
          </tr>";
          } 

 if($deg_projectname!=''){
$htmls.="<table class='table table-bordered'>
      <tbody>
          <tr>
              <td width='15%'><span class='font-gray'>Project Name</span></td>                           
              <td width='70%'>$deg_projectname</td>                           
          </tr>  
          <tr>
              <td><span class='font-gray'>Institute Name</span></td>                           
              <td>$degschoolname</td>                           
          </tr>";
           if($deg_projectdescription!=''){
          $htmls.="<tr>
              <td><span class='font-gray'>Project Description</span></td>                           
              <td>$deg_projectdescription</td>                           
          </tr>";
          }
             if($deg_projectchallenges!=''){
          $htmls.="<tr>
              <td><span class='font-gray'>Challenges</span></td>                           
              <td>$deg_projectchallenges</td>                           
          </tr>";
          } 
             if($deg_projecttools!=''){
          $htmls.="<tr>
              <td><span class='font-gray'>Tools</span></td>                           
              <td>$deg_projecttools</td>                           
          </tr>";
          } 
}

      $htmls.="</tbody>
       
   </table> ";
      }
    
     
    $htmls.="</div>";
    for($k=0;$k<count($resumeKeyWordsArray);$k++)
    {
        
        
        //$replacement = "<table><tr><td>kiran php </td></tr></table>";
        $one = $resumeKeyWordsArray[$k];
        $htmls =  str_ireplace($one, "<font color='red'>$one</font>", $htmls);

    }
echo $html.$htmls;
?>
