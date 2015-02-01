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
?>
 
    <?php 
 $html = "

 <div class='container mar-t30'>
    <p class='font16-sm brd-btm'>Personal Information</p>
    <div class='row'>
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Name :</span> Kiran Kumar</label>
      </div>
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Email :</span> email@example.com</label>
      </div> 
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Phone Number :</span> 124563987</label>
      </div> 
      <div class='col-sm-3'>
        <label class='control-label'><span class='font-gray'>Address :</span> 
No.335, Corner Shop, Rajajinagar 1st N Block, Rajajinagar, Opposite Sagar Fast Food, Bangalore - 560010</label>
      </div>                 
    </div> 
    <p class='font16-sm brd-btm'>Profile Summary</p>
    <p>04+ years of experience as Web/Graphic Designer with a passion for designing beautiful and functional user experiences. A perfectionist and minimalist who follows the best practices & trends in the field. Designing and planning of corporate websites, web applications, mobile applications (iPhone/iPad), Branding(Logos), Cartoon and Characters. Expertise and efficient in web designing using Photoshop, Illustrator, Flash, Dreamweaver and front-end technologies using HTML5, XHTML, CSS3, Javascript and jQuery. Excellent working knowledge of semantic and accessible coding standards along with great attention to details and page optimization. </p>   
    <p class='font16-sm brd-btm pad-t10'>Technical Skills</p>
<ul class='content-list'>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
</ul>                             
<p class='font16-sm brd-btm pad-t10'>Employment Details</p>
   <table class='table table-bordered'>
      <tbody>
          <tr>
              <td width='15%'><span class='font-gray'>Project Name</span></td>                           
              <td width='70%'>Speak Socially</td>                           
          </tr>  
          <tr>
              <td><span class='font-gray'>Company Name</span></td>                           
              <td>Docustar</td>                           
          </tr>  
          <tr>
              <td><span class='font-gray'>Project Description</span></td>                           
              <td>DocuStars campaign management portal, MarketHUB+, is an innovative web-based tool that allows your company to 
effectively and efficiently manage and maintain its media strategies. Speak Socially which is visible to users when granting permission to the social media outlets like Twitter, Facebook, LinkedIn, Pinterest, etc. as the application wanting access to 
post to their account.</td>                           
          </tr> 
          <tr>
              <td><span class='font-gray'>Challenges</span></td>                           
              <td><ul class='table-content-list'>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
</ul> </td>                           
          </tr>                                             
      </tbody>
       
   </table>  
    <p class='font16-sm brd-btm pad-t10'>Technical Skills</p>
<ul class='content-list'>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
</ul>     
    </div> ";

    require('../admin/pdf/WriteHTML.php');

$pdf=new PDF_HTML();
$filename ='kiran';
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Image('../img/logo_small.png',18,13,33);
$pdf->SetFont('Arial','B',14);
$pdf->WriteHTML('<para><h1>PHPGang Programming Blog, Tutorials, jQuery, Ajax, PHP, MySQL and Demos</h1><br>
Website: <u>www.phpgang.com</u></para><br><br>How to Convert HTML to PDF with fpdf example');

$pdf->SetFont('Arial','B',7); 
$htmlTable='<TABLE>
<TR>
<td>asdfsafsadf</td>
</TR>
</TABLE>';
$pdf->WriteHTML2("<br><br><br>$html");
$pdf->SetFont('Arial','B',6);
//$pdf->Output('library/yourfilename.pdf','F');
$pdf->Output('yourfilename.pdf','D');

?>