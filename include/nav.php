<?php

$urlname = explode('/college/',$_SERVER['REQUEST_URI']);
$profileInformationClass = '';
$academicQualificationClass = '';
$academicProjectsClass = '';
$rvvlsiOrOtherProjectsClass = '';
$companyProjectsClass = '';
$careerDetailsClass = '';
if($urlname[1]=='profileInformation.php')
{
   $profileInformationClass = 'active';
}
else if($urlname[1]=='academicQualification.php')
{
   $academicQualificationClass = 'active';
}
else if($urlname[1]=='academicProjects.php')
{
   $academicProjectsClass = 'active';
}
else if($urlname[1]=='rvvlsiOrOtherProjects.php')
{
   $rvvlsiOrOtherProjectsClass = 'active';
}
else if($urlname[1]=='companyProjects.php')
{
  $companyProjectsClass = 'active';
}
else 
{
   $processResumeClass = 'active';
}
?>
<div class="main-nav-wrapper">
       <nav class="container">
           <ul class="main-nav clearfix">
               <li class="<?php echo $profileInformationClass;?>"><a href="profileInformation.php">Personal Information</a></li>
               <li class="<?php echo $academicQualificationClass;?>"><a href="academicQualification.php">academic qualification</a></li>
               <li class="<?php echo $academicProjectsClass;?>"><a href="academicProjects.php">BE/MTech. projects</a></li>
                <li class="<?php echo $rvvlsiOrOtherProjectsClass;?>"><a href="rvvlsiOrOtherProjects.php">RV-VLSI / Other Institute</a></li>
               <li class="<?php echo $companyProjectsClass;?>"><a href="companyProjects.php">work experience</a></li>
               <li class="<?php echo $careerDetailsClass;?>"><a href="careerDetails.php">other details</a></li>
           </ul>
       </nav>
    </div><!--/Main Nav Ends-->