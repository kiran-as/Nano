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
     
     
    $pgdippassoutyear = $row['pgdip_passoutyear'];
    $pgdippercentagetype = $row['pgdip_percentagetype'];
    $pgdippercentage = $row['pgdip_percentage'];
    $pgdipschoolname = $row['pgdip_schoolname'];
    $pgdipboard = $row['pgdip_university'];
    $pgdipcourse = pgDipCourse($row['pgdip_coursename']);
    $deg_othercoursename = $row['deg_othercoursename'];
    $pgdip_othercoursename = $row['pgdip_othercoursename'];
    $pg_othercoursename = $row['pg_othercoursename'];
    if($degdepartment=='Others')
    {
      $degdepartment = $deg_othercoursename;
    }

    if($pgdepartment=='Others')
    {
      $pgdepartment = $pg_othercoursename;
    }

    if($pgdipcourse=='Others')
    {
      $pgdipcourse = $pgdip_othercoursename;
    }


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
$i=0;
while($row = mysql_fetch_assoc($companySql))
{
    $companyArray[$i]['project_title'] = $row['project_title'];
    $companyArray[$i]['company_name'] = $row['company_name'];
    $companyArray[$i]['time_duration'] = $row['time_duration'];
    $companyArray[$i]['project_description'] = $row['project_description'];
    $companyArray[$i]['tools_used'] = $row['tools_used'];
    $companyArray[$i]['challenges'] = $row['challenges'];
    $companyArray[$i]['designation'] = $row['designation'];
    $companyArray[$i]['client'] = $row['client'];
    $companyArray[$i]['start_date'] = $row['start_date'];
    $companyArray[$i]['end_date'] = $row['end_date'];    
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

/**/
$table="<table width='100%'>

          <tr>
              <th align='left'>Profile Information</th>
          </tr>
          <tr>
              <td width='40%'><span style='font-weight:bold'>Name:</span> $firstName $lastName</td>
              
              <td><span style='font-weight:bold'>Email:</span> $email</td>
          </tr>
          <tr>
                 <td valign='top' ><span style='font-weight:bold'>Phone:</span> $mobileNumber</td>
              <td><span style='font-weight:bold'>Address:</span> $address</td>
           
          </tr>      
        </table>";
$table.="<br/>  <table>
          <tr>
              <th align='left'>Career Objective</th>
          </tr>
          </table>
          <ul style='list-style-type:disc'>
              <li>$career_objective</li>
          </ul>
        ";

    
if(count($achievementsArray)>0){

$table.="<br/><table>
          <tr>
              <th align='left'>Core Competancy</th>
          </tr>
          </table>
         <ul style='list-style-type:disc'>";
              for($i=0;$i<count($achievementsArray);$i++){
                
                if(!empty($achievementsArray[$i]['achievements']))
                {
                  $achievementstitle = $achievementsArray[$i]['achievements'];
                   
                  $table.="<li>$achievementstitle</li>";
                }
              }
              $table.="</ul>"; 
      }
$table.="<br/>  <table width='100%' border='1'>
          <tr>
              <th colspan='5'>Education Details</th>
          </tr>
          <tr>
               <th width='10%'>Degree</th>
               <th width='35%'>Discipline</th>
               <th width='30%'>School/College</th>
               <th width='10%'>Year of passing</th>
               <th width='15%'>Aggregate</th>
          </tr>";
          if($pgdipschoolname!='')
          {
           $table.="<tr>
              <td>PG Diploma</td>
              <td>$pgdipcourse</td>
              <td>$pgdipschoolname</td>
              <td>$pgdippassoutyear</td>
              <td>-</td>                            
          </tr>";
           }
  if($pgboard!='') {
          $table.="<tr>
              <td>Master Degree</td>
              <td>$pgdepartment</td>
              <td>$pgschoolname</td>
              <td>$pgpassoutyear</td>
              <td>$pgpercentage</td>                            
          </tr>";
           }
         if($degschoolname!='') {
          $table.="<tr>
              <td>Degree</td>
              <td>$degdepartment</td>
              <td>$degschoolname</td>
              <td>$degpassoutyear</td>
              <td>$degpercentage</td>                            
          </tr>";
           }
          if($pucschoolname!='') {
           $table.="<tr>
              <td>PUC</td>
              <td> - </td>
              <td>$pucschoolname</td>
              <td>$pucpassoutyear</td>
              <td>$pucpercentage</td>                            
          </tr>";
           }
           $table.="<tr>
              <td>SSLC</td>
              <td> - </td>
              <td>$sslcschoolname</td>
              <td>$sslcpassoutyear</td>
              <td>$sslcpercentage</td>                            
          </tr>



         </table>"; 

             if(count($companyArray)>0) { 

 $table.=" <br/> <table width='100%' border='0' style='border-collapse:collapse;'>";
            $table.="<tr>
                 <td style='font-weight:bold' align='Center'>Company Project Details</td>
            </tr></table>";
 } 
          for($i=0;$i<count($companyArray);$i++){
           $project_title = $companyArray[$i]['project_title'];
          $college_name = $companyArray[$i]['company_name'];
          $time_duration = $companyArray[$i]['time_duration'];
          $project_description = $companyArray[$i]['project_description'];
          $tools_used = $companyArray[$i]['tools_used'];
          $challenges = $companyArray[$i]['challenges'];
          $challenges1 = $companyArray[$i]['challenges1'];
          $challenges2 = $companyArray[$i]['challenges2'];
          $challenges3 = $companyArray[$i]['challenges3'];
          $challenges4 = $companyArray[$i]['challenges4'];
$designation = $companyArray[$i]['designation'];

$clientname = $companyArray[$i]['client'];
$start_date = date('M, Y',strtotime($companyArray[$i]['start_date']));
$end_date = date('M, Y',strtotime($companyArray[$i]['end_date']));
       if($challenges) {
           $challenges = $companyArray[$i]['challenges'];
       }
          if(!empty($project_title))
          {
            $table.=" <br/> <table width='100%' border='1' style='border-collapse:collapse;'>";
            $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Project Title</td>
                 <td width='80%'>$project_title</td>
            </tr>";
          }
          if(!empty($college_name))
          {
            $table.="<tr>
                 <td width='20%'  style='font-weight:bold'>Company Name</td>
                 <td width='80%'>$college_name</td>
            </tr>";
          }
          if(!empty($clientname))
          {
            $table.="<tr>
                 <td width='20%'  style='font-weight:bold'>Client</td>
                 <td width='80%'>$clientname</td>
            </tr>";
          }
          if(!empty($designation))
          {
            $table.="<tr>
                 <td width='20%'  style='font-weight:bold'>Designation</td>
                 <td width='80%'>$designation</td>
            </tr>";
          }
          if(!empty($start_date))
          {
            $table.="<tr>
                 <td width='20%'  style='font-weight:bold'>Duration</td>
                 <td width='80%'>$start_date - $end_date</td>
            </tr>";
          }
          if(!empty($project_description))
          {
            $table.="<tr>
                 <td width='20%'  style='font-weight:bold'>Project Description</td>
                 <td width='80%'>$project_description</td>
            </tr>";
          }
          if(!empty($tools_used))
          {
            $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Tools Used</td>
                 <td width='80%'>$tools_used</td>
            </tr>";
          }
          if(!empty($challenges))
          {
            $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Challenges</td>
                 <td width='80%'>
                 <ul style='list-style-type:disc'>";
              $table.=" <li>$challenges</li>";
              if(!empty($challenges1)) {
              $table.=" <li>$challenges1</li>";

              }
              if(!empty($challenges2)) {
              $table.=" <li>$challenges2</li>";
                
              }
              if(!empty($challenges3)) {
              $table.=" <li>$challenges3</li>";
                
              }
              if(!empty($challenges4)) {
              $table.=" <li>$challenges4</li>";
              }
            $table.="</ul></td>
            </tr>";
          }
          $table.="</table>"; 
        }
 $table.=" <br/> <table width='100%' border='1'>";
            $table.="<tr>
                 <td style='font-weight:bold' align='Center'>Project Details</td>
            </tr></table>";
          for($i=0;$i<count($academicArray);$i++){
           $project_title = $academicArray[$i]['project_title'];
          $college_name = $academicArray[$i]['college_name'];
          $time_duration = $academicArray[$i]['time_duration'];
          $project_description = $academicArray[$i]['project_description'];
          $tools_used = $academicArray[$i]['tools_used'];
          $challenges = $academicArray[$i]['challenges'];

          if(!empty($project_title))
          {
            $table.=" <br/> <table width='100%' border='1'>";
            $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Project Title</td>
                 <td width='80%'>$project_title</td>
            </tr>";
          }
          if(!empty($college_name))
          {
            $table.="<tr>
                 <td width='20%'  style='font-weight:bold'>Institue Name</td>
                 <td width='80%'>$college_name</td>
            </tr>";
          }
          if(!empty($project_description))
          {
            $table.="<tr>
                 <td width='20%'  style='font-weight:bold'>Project Description</td>
                 <td width='80%'>$project_description</td>
            </tr>";
          }
          if(!empty($tools_used))
          {
            $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Tools Used</td>
                 <td width='80%'>$tools_used</td>
            </tr>";
          }
          if(!empty($challenges))
          {
            $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Challenges</td>
                 <td width='80%'>$challenges</td>
            </tr>";
          }
          $table.="</table>"; 
        }

if($deg_projectname!=''){ 
  $table.=" <br/> <table width='100%' border='1'>";
  $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Project Name</td>
                 <td width='80%'>$deg_projectname</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Institute Name</td>
                 <td width='80%'>$degschoolname</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Project Description</td>
                 <td width='80%'>$deg_projectdescription</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Challenges</td>
                 <td width='80%'>$deg_projectchallenges</td>
            </tr>
             <tr>
                 <td width='20%' style='font-weight:bold'>Tools</td>
                 <td width='80%'>$deg_projecttools</td>
            </tr>";
               $table.="</table>"; 

     } 

if($pg_projectname!=''){ 
  $table.=" <br/> <table width='100%' border='1'>";
  $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Project Name</td>
                 <td width='80%'>$pg_projectname</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Institute Name</td>
                 <td width='80%'>$pgschoolname</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Project Description</td>
                 <td width='80%'>$pg_projectdescription</td>
            </tr>
            <tr>
                 <td width='20%' style='font-weight:bold'>Challenges</td>
                 <td width='80%'>$pg_projectchallenges</td>
            </tr>
             <tr>
                 <td width='20%' style='font-weight:bold'>Tools</td>
                 <td width='80%'>$pg_projecttools</td>
            </tr>";
               $table.="</table>"; 

     } 
                          
  include("library/mpdf60/mpdf.php");/*MPDF library );*/

$mpdf=new mPDF();      
$filename = $firstName.' '.$lastName;
$mpdf->WriteHTML($table);/*the above php variable is passed as the output parameter */
$mpdf->Output($filename.'.pdf','D');




?>
