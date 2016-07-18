<?php 
include('application/conn.php');
$idstudent = $_SESSION['idstudent'];
//echo "Select * from tbl_resumekeywords where idresumetype=$idresumeTypes";
$resumeKeywordsSql = mysql_query("Select * from tbl_resumekeywords");
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

    $currentsalary = $row['current_salary'];
    $currentdesignation = $row['current_designation'];
    $currentcompany = $row['current_company'];
    $currentlocation = $row['current_location'];
    $expectedsalary = $row['expected_salary'];
    $expectedlocation = $row['expected_location'];
    $expecteddesignation = $row['expected_designation'];   
    $experience = $row['experience'];     
    $previousexp = $row['previousexp']; 
     $currentcompanyfromyear = $row['currentcompanyfromyear'];
     $currentcompanyfrommonth = getMonthName($row['currentcompanyfrommonth']);    

}


////Academic deeatils//
$profileInformationSql = mysql_query("Select * from tbl_student where idstudent=$idstudent");
while($row = mysql_fetch_assoc($profileInformationSql))
{
   $working_currently = $row['working_currently'];
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

     if($degpercentage=='percentage') {
       $degpercentage = '%';
    } else {
      $degpercentage = 'CGPA';
    }

    $degschoolname = $row['deg_schoolname'];
    $degboard = $row['deg_university'];
    $degdepartment = departmentname($row['deg_department']);
     
    $pgpassoutyear = $row['pg_passoutyear'];
    $pgpercentagetype = $row['pg_percentagetype'];
    if($pgpercentagetype=='percentage') {
       $pgpercentagetype = '%';
    } else {
      $pgpercentagetype = 'CGPA';
    }
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
    $experience_years = $row['experience_years'];
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
$companySql = mysql_query("Select * from tbl_companies where idstudent=$idstudent");
$i=0;
while($row = mysql_fetch_assoc($companySql))
{
    $companiesArray[$i]['companyname'] = $row['companyname'];
    $companiesArray[$i]['designation'] = $row['designation'];
    $companiesArray[$i]['frommonth'] = getMonthName($row['frommonth']);
    $companiesArray[$i]['tomonth'] = getMonthName($row['tomonth']);
    $companiesArray[$i]['fromyear'] = $row['fromyear'];
    $companiesArray[$i]['toyear'] = $row['toyear'];
    $i++;
}
///////
function getMonthName($monthName)
{
  switch($monthName)
  {
    case '1';return 'Jan';
             break;
case '2';return 'Feb';
             break;
case '3';return 'Mar';
             break;
case '4';return 'Apr';
             break;
case '5';return 'May';
             break;
case '6';return 'June';
             break;
case '7';return 'July';
             break;
case '8';return 'Aug';
             break;
case '9';return 'Sep';
             break;
case '10';return 'Oct';
             break;
case '11';return 'Nov';
             break;     
case '12';return 'Dec';
             break;                                                                                                                                           
  }
}
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
    $academicArray[$i]['role'] = $row['role'];

    $i++;
}
////
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
    $companyArray[$i]['challenges1'] = $row['challenges1'];
    $companyArray[$i]['challenges2'] = $row['challenges2'];
    $companyArray[$i]['challenges3'] = $row['challenges3'];
    $companyArray[$i]['challenges4'] = $row['challenges4'];
    $companyArray[$i]['client'] = $row['client'];
    $companyArray[$i]['start_date'] = date('M-Y',strtotime($row['start_date']));
    $companyArray[$i]['end_date'] =date('M-Y',strtotime($row['end_date']));

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

//$table = "<table width='100%'><tr><td>&nbsp;</td><td align='left' width='40%'>$firstName $lastName <br/> Address: $address <br/>Email:$email <br/> Phone: $mobileNumber</td></tr></table>";

//$tableobjective = "<table width='100%'><tr><td width='20%'+>Objective</td><td align='left'>$career_objective</td></tr></table>";


$table="<table width='100%'>

       
          <tr>
              <th align='left' colspan='2'>Profile Information</th>
          </tr>
           <tr>
              <td colspan='2'>&nbsp;</td>
          </tr>
         
          <tr>
              <td width='12%' align='right'  style='font-weight:bold'> Name : </td>
              <td>$firstName $lastName</td>
           </tr>
            <tr>
              <td width='12%' align='right'  style='font-weight:bold'> Email : </td>
              <td>$email</td>
           </tr>
            <tr>
              <td width='12%' align='right'  style='font-weight:bold'> Phone : </td>
              <td>$mobileNumber</td>
           </tr>
            <tr>
              <td width='12%' align='right'  style='font-weight:bold' valign='top'> Address : </td>
              <td>$address</td>
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
                   
                  $table.="<li style='margin: 0 0 5px 0;'>$achievementstitle</li>";
                }
              }
              $table.="</ul>"; 
      }
 $table .= "<pagebreak />";
/*
$table.="<br/>  <table width='100%' border='1' style='border-collapse:collapse;'>
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

if($working_currently=='Yes')
{
$table.=" <br/> <table width='100%' border='1'  style='border-collapse:collapse;'>
<tr>
                 <td colspan='4' style='font-weight:bold' align='Center'>Experience Details</td>
            </tr>
            <tr>
            <td style='font-weight:bold'>Company Name</td>
            <td style='font-weight:bold'>Designation</td>
            <td style='font-weight:bold'>From </td>
            <td style='font-weight:bold'>To </td></tr>";

          
      
$table.="<tr><td>$currentcompany</td>
<td>$currentdesignation</td>
<td>$currentcompanyfrommonth,$currentcompanyfromyear</td>
<td>Till to date</td>
</tr>";
}
if(count($companiesArray)>0) {

if($working_currently!='Yes')
{
  $table.=" <br/> <table width='100%' border='1'  style='border-collapse:collapse;'>
  <tr>
                   <td colspan='4' style='font-weight:bold' align='Center'>Experience Details</td>
              </tr>
              <tr>
              <td style='font-weight:bold'>Company Name</td>
              <td style='font-weight:bold'>Designation</td>
              <td style='font-weight:bold'>From </td>
              <td style='font-weight:bold'>To </td></tr>";

}
             for($i=0;$i<count($companiesArray);$i++){
                $companyname = $companiesArray[$i]['companyname'];
                $designation = $companiesArray[$i]['designation'];
                $frommonth = $companiesArray[$i]['frommonth'];
                $tomonth = $companiesArray[$i]['tomonth'];
                $fromyear = $companiesArray[$i]['fromyear'];
                $toyear = $companiesArray[$i]['toyear'];
                if($companyname=='') {
                  continue;
                }
            
                $table.="<tr><td>$companyname</td>
                <td>$designation</td>
                <td>$frommonth,$fromyear</td>
                <td>$tomonth, $toyear</td>
                </tr>";
            }
  }

 
            $table.="</table>";*/
            $projectcount = 0;
 if(count($companyArray)>0) { 

 $table.="<table width='100%'>";
            $table.="<tr>
                 <td style='font-weight:bold' align='Center'>Company Project Details</td>
            </tr>
            </table>";

          for($i=0;$i<count($companyArray);$i++){
           $project_title = ucfirst($companyArray[$i]['project_title']);
          $college_name = ucfirst($companyArray[$i]['company_name']);
          $time_duration = $companyArray[$i]['time_duration'];
          $project_description = $companyArray[$i]['project_description'];
          $tools_used = $companyArray[$i]['tools_used'];
          $challenges = $companyArray[$i]['challenges'];
          $challenges1 = $companyArray[$i]['challenges1'];
          $challenges2 = $companyArray[$i]['challenges2'];
          $challenges3 = $companyArray[$i]['challenges3'];
          $challenges4 = $companyArray[$i]['challenges4'];
$designation = ucfirst($companyArray[$i]['designation']);
$client = ucfirst($companyArray[$i]['client']);
$start_date = $companyArray[$i]['start_date'];
$end_date = $companyArray[$i]['end_date'];
       if($challenges) {
           $challenges = $companyArray[$i]['challenges'];
       }
          if(!empty($project_title))
          {
            $table.="<table width='100%'>";
            $table.="<tr>
                 <td align='left' >$college_name</td>
                 <td align='right'>Client: $client</td>
            </tr>";
          }
         $table.="<tr>
                 <td align='left' >$designation</td>
                 <td align='right'>$start_date to $end_date</td>
            </tr>";

         // Project title
            $table.="<tr>
                 <td align='left' colspan='2'>$project_title</td>
            </tr>";
          

            $table.="<tr>
                        <td colspan='2'>
                        <span  style='font-weight:bold;font-color:blue;'>Description</span>
                       </td>
                       </tr>
                       </table>";

            $table.="<ul style='list-style-type:disc' valign='top'>
                         <li>$project_description</li>
                </ul>
               ";

             $table.="<table valign='top'><tr>
                        <td colspan='2'><span  style='font-weight:bold;font-color:blue;'>Tools</span>
                </td>
                </tr></table>";
                  $table.="<ul style='list-style-type:disc'>
                         <li>$tools_used</li>
                </ul>
               ";
        /* if(!empty($project_description))
          {
            $table.="<tr>
                 <td width='20%'  style='font-weight:bold'>Project Description</td>
                 <td width='80%'>$project_description</td>
            </tr>";
          }
         /*  if(!empty($tools_used))
          {
            $table.="<tr>
                 <td width='20%' style='font-weight:bold'>Tools Used</td>
                 <td width='80%'>$tools_used</td>
            </tr>";
          }*/
          if(!empty($challenges))
          {
            $table.="<tr>
                        <td colspan='2'><span  style='font-weight:bold;font-color:blue;'>Challenges</span>
                 <ul style='list-style-type:disc'>";
              $table.=" <li  style='margin: 0 0 2px 0;'>$challenges</li>";
              if(!empty($challenges1)) {
              $table.=" <li  style='margin: 0 0 2px 0;'>$challenges1</li>";

              }
              if(!empty($challenges2)) {
              $table.=" <li  style='margin: 0 0 2px 0;'>$challenges2</li>";
                
              }
              if(!empty($challenges3)) {
              $table.=" <li  style='margin: 0 0 2px 0;'>$challenges3</li>";
                
              }
              

            $table.="</ul></td>
            </tr>";
          }
          $table.="</table>"; 

          if($i%2==0) {

            $table.="<hr/>";
          }
          $projectcount = $i;
          if($projectcount==1 || $projectcount==3 || $projectcount==5 || $projectcount==7 || $projectcount==9) {
             $table .= "<pagebreak />";
          }
        }
  }



 $table.=" <br/> <table width='100%' border='0' style='border-collapse:collapse;'>";
            $table.="<tr>
                 <td style='font-weight:bold' align='Center'>Domain Specific Project</td>
            </tr></table>";
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
          $role = $academicArray[$i]['role'];

         $table.="<table width='100%'>";
            $table.="<tr>
                 <td align='left' >$college_name</td>
                 <td align='right'></td>
            </tr>";
           $table.="<tr>
                 <td align='left' colspan='2'>$project_title</td>
            </tr>";
          

            $table.="<tr>
                        <td colspan='2'>
                        <span  style='font-weight:bold;font-color:blue;'>Description</span>
                       </td>
                       </tr>
                       </table>";

            $table.="<ul style='list-style-type:disc' valign='top'>
                         <li>$role</li>
                </ul>
               ";

             $table.="<table valign='top'><tr>
                        <td colspan='2'><span  style='font-weight:bold;font-color:blue;'>Tools</span>
                </td>
                </tr></table>";
                  $table.="<ul style='list-style-type:disc'>
                         <li>$tools_used</li>
                </ul>
               ";
          if(!empty($challenges))
          {
            $table.="<tr>
                        <td colspan='2'><span  style='font-weight:bold;font-color:blue;'>Challenges</span>
                 <ul style='list-style-type:disc'>";
              $table.=" <li  style='margin: 0 0 2px 0;'>$challenges</li>";
              if(!empty($challenges1)) {
              $table.=" <li  style='margin: 0 0 2px 0;'>$challenges1</li>";

              }
              if(!empty($challenges2)) {
              $table.=" <li  style='margin: 0 0 2px 0;'>$challenges2</li>";
                
              }
              if(!empty($challenges3)) {
              $table.=" <li  style='margin: 0 0 2px 0;'>$challenges3</li>";
                
              }
            $table.="</ul></td>
            </tr>";
          }
          $table.="</table>"; 

          if($i%2==0) {

            $table.="<hr/>";
          }
          $projectcount = $projectcount+1;
          if($projectcount==1 || $projectcount==3 || $projectcount==5 || $projectcount==7 || $projectcount==9 || $projectcount==11|| $projectcount==13|| $projectcount==15) {
             $table .= "<pagebreak />";
          }
        }

$table.="<table width='100%'>
          <tr>
              <th colspan='2'>Education Details</th>
          </tr> ";
            if($pgdipschoolname!='')
          {
           $table.="<tr>
              <td><span   style='font-weight:bold'>PG Diploma</span>
                   in <span style='font-weight:bold'>$pgdipcourse</span></td>
                   <td align='right'><span   style='font-weight:bold'>$pgdippassoutyear</span></td>
                  </tr>
                  <tr>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$pgdipschoolname</span></td>                       
               </tr><tr>
              <td> &nbsp;</td>
              </tr>";
           }

           if($pgboard!='')
          {
           $table.="<tr>
              <td><span   style='font-weight:bold'>Master Degree </span>
                   in <span style='font-weight:bold'>$pgdepartment</span></td>
                   <td align='right'><span   style='font-weight:bold'>$pgpassoutyear</span></td>
                  </tr>
                  <tr>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$pgschoolname, , with $pgpercentage $pgpercentagetype</td>                       
               </tr>
               <tr><td>&nbsp;</td>
               </tr>";
           }
           if($degschoolname!='')
          {
           $table.="<tr>
              <td><span   style='font-weight:bold'>Bachelor Degree </span>
                   in <span style='font-weight:bold'>$degdepartment</span></td>
                   <td align='right'><span   style='font-weight:bold'>$degpassoutyear</span></td>
                  </tr>
                  <tr>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$degschoolname, with $degpercentage $degpercentagetype</td>                       
               </tr>
               <tr><td>&nbsp;</td>
               </tr>";
           }

           if($pucschoolname!='')
          {
           $table.="<tr>
              <td><span   style='font-weight:bold'>PUC / 12th </span>
                   in <span style='font-weight:bold'></span></td>
                   <td align='right'><span   style='font-weight:bold'>$pucpassoutyear</span></td>
                  </tr>
                  <tr>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$pucschoolname, with $pucpercentage %</td>                       
               </tr>
               <tr><td>&nbsp;</td>
               </tr>";
           }
          
           
           $table.="<tr>
              <td><span   style='font-weight:bold'>SSLC</span>
                   in <span style='font-weight:bold'></span></td>
                   <td align='right'><span   style='font-weight:bold'>$sslcpassoutyear</span></td>
                  </tr>
                  <tr>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sslcschoolname, with $sslcpercentage %</td>                       
               </tr>";
        

          
          $table.="</table>";       
/*
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
     } 
            */  
  include("admin2/library/mpdf60/mpdf.php");

$mpdf=new mPDF();      
$filename = $firstName.' '.$lastName;
$mpdf->SetHeader('<div>Powered by Nanochip Solutions</div>');

$mpdf->SetFooter('<div>Powered by Nanochip Solutions</div>');

$mpdf->WriteHTML($table.$newtable);
$mpdf->Output($filename.'.pdf','D');


//echo ;
?>
