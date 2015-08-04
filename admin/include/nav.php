<?php
$urlname = explode('/admin/',$_SERVER['REQUEST_URI']);
$dashboardClass = '';
$studentListClass = '';
$searchDomainStudentClass = '';
$recruitementListClass = '';
$directEntryClass = '';
$domainKeywordClass='';
$processResumeClass = '';
$settingClass='';
if($urlname[1]=='dashboard.php')
{
   $dashboardClass = 'active';
}
else if($urlname[1]=='studentlist.php')
{
   $studentListClass = 'active';
}
else if($urlname[1]=='searchDomainStudent.php')
{
   $searchDomainStudentClass = 'active';
}
else if($urlname[1]=='recruitementList.php')
{
   $recruitementListClass = 'active';
}
else if($urlname[1]=='directEntry.php')
{
  $directEntryClass = 'active';
}
else if($urlname[1]=='settings.php')
{
   $settingClass = 'active';
}
else if($urlname[1]=='domainKeyword.php')
{
  $domainKeywordClass = 'active';
}

else if($urlname[1]=='downloadExce.php')
{
  $downloadExceClass = 'active';
}
else 
{
   $downloadExceClass = 'active';
}
?>
<div class="main-nav-wrapper">
       <nav class="container">
           <ul class="main-nav clearfix">

               <li class="<?php echo $dashboardClass;?>">
                  <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="List the summary of all Resumes by categories">
                     <a href="dashboard.php">Dashboard</a>
                 </div>
               </li>
               <li class="<?php echo $studentListClass;?>">
                                 <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="List of all Resumes present in Database">

               <a href="studentlist.php">Resumes in DB</a>
               </div>
               </li>
              
                <li class="<?php echo $recruitementListClass;?>">
                                  <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jobs posted by Recruiter is listed under this section">
                 <?php if($_SESSION['idadmin']!=1) { ?>
                <a href="recruitementList.php">Current Job Openings/ Assign Resumes</a>
                 <?php } else { ?>
               <a href="recruitementListSuperAdmin.php">Current Job Openings/ Assign Resumes</a>

                <?php } ?> 
                 </div>
                </li>
                      <li class="<?php echo $downloadExceClass;?>">
                                 <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Default message setting text to appear in the Resume builder in every page">
              <?php if($_SESSION['idadmin']!=1){ ?>
               <a href="recruiterActivation.php">Recruiter Activation</a>
               <?php } else { ?>
               <a href="recruiterList.php">Recruiter Activation</a>

                <?php } ?> 
                </div>
               </li>

               <li class="<?php echo $processResumeClass;?>" style='display:none'>
                                 <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click here to search resumes for new keywords that have been added under the domain search">

               <a href="processResume.php">Refresh Dashboard</a>
                </div>
               </li>

               <li class="<?php echo $domainKeywordClass;?>">
                                 <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click here to add a new domain keyword">

               <a href="domainKeyword.php">Add Domain Keyword</a>
                </div>
               </li>
               <li class="<?php echo $settingClass;?>">
                                 <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Default message setting text to appear in the Resume builder">

               <a href="settings.php">Resume Builder Settings</a>
                </div>
               </li>

               <li class="<?php echo $downloadExceClass;?>">
                                 <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Default message setting text to appear in the Resume builder">

               <a href="downloadExce.php">Create Excel</a>
                </div>
               </li>
           
           </ul>
       </nav>
    </div><!--/Main Nav Ends-->

    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script> 