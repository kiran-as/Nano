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
 <style>
 /*-->
CUSTOM FONTS
<--*/

@font-face {
    font-family: 'source_sans_proregular';
    src: url('../fonts/sourcesanspro-regular-webfont.eot');
    src: url('../fonts/sourcesanspro-regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('../fonts/sourcesanspro-regular-webfont.woff2') format('woff2'),
         url('../fonts/sourcesanspro-regular-webfont.woff') format('woff'),
         url('../fonts/sourcesanspro-regular-webfont.ttf') format('truetype'),
         url('../fonts/sourcesanspro-regular-webfont.svg#source_sans_proregular') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'source_sans_prosemibold';
    src: url('../fonts/sourcesanspro-semibold-webfont.eot');
    src: url('../fonts/sourcesanspro-semibold-webfont.eot?#iefix') format('embedded-opentype'),
         url('../fonts/sourcesanspro-semibold-webfont.woff2') format('woff2'),
         url('../fonts/sourcesanspro-semibold-webfont.woff') format('woff'),
         url('../fonts/sourcesanspro-semibold-webfont.ttf') format('truetype'),
         url('../fonts/sourcesanspro-semibold-webfont.svg#source_sans_prosemibold') format('svg');
    font-weight: normal;
    font-style: normal;

}



body{font-family: 'source_sans_proregular'; font-size: 14px; color: #333238;}
ul{ list-style: none; margin: 0px; padding: 0px;}
a{ color: #1e88e5;}

.container{max-width: 1180px;}
.navbar-inverse{ border-radius: 0px; border: 0px none; margin-bottom: 0px;}
.txtr{ text-align: right;}
.txtc{ text-align: center;}

/*-->
Margin & Padding
<--*/
.mar-t10{ margin-top: 10px;}
.mar-t20{ margin-top: 20px;}
.mar-t30{ margin-top: 30px;}
.mar-b0{ margin-bottom: 0px;}
.mar-b5{ margin-bottom: 5px;}
.mar-b10{ margin-bottom: 10px;}
.mar-b15{ margin-bottom: 15px;}
.mar-b20{ margin-bottom: 20px;}
.mar-b30{ margin-bottom: 30px;}
.mar-r15{ margin-right: 15px;}
.mar-r20{ margin-right: 20px;}
.mar-r30{ margin-right: 30px;}
.mar-l10{ margin-left: 10px;}
.mar-l20{ margin-left: 20px;}
.mar-l30{ margin-left: 30px;}


.pad-t5{ padding-top: 5px;}
.pad-t9.pad-t9{ padding-top: 9px;}
.pad-t10{ padding-top: 10px;}
.pad-t15{ padding-top: 15px;}
.pad-t20{ padding-top: 20px;}
.pad-t40{ padding-top: 40px;}
.pad-b5{ padding-bottom:5px;}
.pad-b10{ padding-bottom:10px;}
.pad-b15{ padding-bottom:15px;}
.pad-b20{ padding-bottom:20px;}
.pad-l10{ padding-left: 10px;}
.pad-l20{ padding-left: 20px;}
.pad-l40{ padding-left: 40px;}

.pad20{ padding: 20px;}



/*-->
HEADER & FOOTER
<--*/
.top--header{ background: #fff; border-bottom: 1px solid #e5e5e5;}
.header-nav.header-nav li {padding: 15px;}
.header-nav.header-nav li a{ color: #1e88e5; padding: 0px;}
.header-nav.header-nav li.active a, .header-nav.header-nav.header-nav li a:hover, .header-nav.header-nav.header-nav li a:focus{ color: #333238; background-color: transparent;}
.logo{ display: inline-block; text-indent: -9999px;}
.logo--small.logo--small.logo--small{ background: url('../img/logo_small.png') no-repeat center center; width: 106px; height: 35px; margin-left: 0px;}
.clear--top{margin-bottom: -1px;}
footer{ background-color: #333238; margin-top: 30px; padding: 15px 0px 5px 0px; text-align: center; color: #fff;}

.main-nav-wrapper{ background-color: #f2f2f2;}
.main-nav li{ float: left; border-left: 1px solid #cecece;}
.main-nav li a{ padding: 14px 20px; display: block; font-size: 16px; font-family: source_sans_prosemibold; text-transform: uppercase; border-left: 1px solid #fff; color: #333238;}
.main-nav li:last-child{border-right: 1px solid #cecece;}
.main-nav li:last-child a{border-right: 1px solid #fff;}
.main-nav li a:hover, .main-nav li.active a{ color: #1e88e5; text-decoration: none;}
.clr-brdradius.clr-brdradius{border-radius:0px ;}

.brd-btm{ border-bottom: 1px solid #e5e5e5;}
.font12{font-size: 12px;}
.font16-sm{ color: #000; font-size: 16px;font-family: 'source_sans_prosemibold';}
.font14-sm{ color: #000;font-family: 'source_sans_prosemibold';}
.font-gray{ color: #888;}
.btn-primary.btn-primary, .btn-inverse.btn-inverse:hover{ background-color: #4caf50; border-color: #4caf50;  color: #fff;}
.btn-primary:hover{ background-color:#46a049; border-color: #46a049;}
.control-label{ font-weight: normal;}
.error-text{ color: red;}
.brd-top{ border-top:1px solid #e5e5e5;}
.icon{background: url('../img/sprite.png') no-repeat 0px 0px; padding-left: 20px;}
.icon--edit{ background-position: 0px 2px;}
.icon--delete{ background-position: 0px -35px;}
.icon--add{ background-position: 0px -64px;}

.content-list { list-style: outside disc; margin-left: 40px; margin-top: 20px;}
.content-list li { padding-bottom: 20px;}
.table-content-list { list-style: outside disc; margin-left: 20px;}
.table-content-list li { padding-bottom: 5px;}


/******** Only Replace this CSS ******************************/
.login-wrapper{background: #E4E4E4; height: 100%; margin: 0; width: 100%; padding-top: 150px; padding-bottom: 200px;}
.login-container{width: 400px; margin: 0 auto; text-align: center;background: #fff;padding: 20px 30px;box-sizing: border-box;}
.login-container .form-control{ height: 45px;}
.font20{ color: #888; font-size: 20px; text-transform: uppercase;}
.font48{ color: #1e88e5; font-size: 48px; }
.primary-box{border-radius: 3px; border: 1px solid #e5e5e5;}



.brd-left{ border-left: 1px solid #e5e5e5;}
.lhs-list li{ padding-bottom: 10px;}
.lhs-list li a{ color: #000; font-family: 'source_sans_prosemibold';}
.lhs-list li.active a{ color: #1e88e5;}
 body{ margin: 0px;}
        .container{ max-width: 1180px;padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;}
        .row { margin-right: -15px; margin-left: -15px; box-sizing: border-box;}
        .col-sm-10, .col-sm-6, .col-sm-3{position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; box-sizing: border-box;}
        .col-sm-6{ width: 45%;}
        .col-sm-3 {width: 25%;}
        .pull-left { float: left!important;}
        .clearfix:before,
        .clearfix:after, .row:before, .row:after { content: ''; display: table;} 
        .clearfix:after, .row:after { clear: both;}
        .clearfix {zoom: 1;}
        .pull-right {float: right!important;}
        .table-bordered {
            border: 1px solid #ddd;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
            border-spacing: 0;
            border-collapse: collapse;            
        }
        .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, 
        .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
            border: 1px solid #ddd;
        }        
  </style>        
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

/*   require('../admin/pdf/WriteHTML.php');

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
$pdf->Output('yourfilename.pdf','D');*/

echo $html;
exit;
include("mpdf60/mpdf.php");/*MPDF library */

$mpdf=new mPDF();      
$mpdf->WriteHTML($html);/*the above php variable is passed as the output parameter */
$mpdf->Output();/*to display the pdf file */

// We'll be outputting a PDF
header("Content-type: application/pdf;charset=utf-8;encoding=utf-8");

// It will be called downloaded.pdf
header("Content-Disposition: attachment; filename=".$passangername."_ticket.pdf");
exit;


?>