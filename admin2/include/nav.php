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
$downloadExceClass='';
$recruiterActivation='';
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
else if($urlname[1]=='recruitementList.php' || $urlname[1]=='recruitementListSuperAdmin.php')
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

else if($urlname[1]=='recruiterActivation.php' || $urlname[1]=='recruiterList.php')
{
  $recruiterActivation = 'active';
}
else 
{
   $downloadExceClass = 'active';
}
?>
<!--
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
                      <li class="<?php echo $recruiterActivation;?>">
                                 <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Default message setting text to appear in the Resume builder in every page">
              <?php if($_SESSION['idadmin']!=1){ ?>
               <a href="recruiterActivation.php">Recruiter Activation</a>
               <?php } else { ?>
               <a href="recruiterList.php">Recruiter Activation</a>

                <?php } ?> 
                </div>
               </li>

               <li class="<?php echo $processResumeClass;?>">
                                 <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click here to search resumes AFTER adding new keywords that have been added.">
<?php if($_SESSION['idadmin']==1){ ?>
               <a href="processResume.php">Refresh Database</a>
<?php }else { ?>
               <a href="refreshDB.php">Refresh Database</a>

                <?php } ?>
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
                                 <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Use this to create various reports for Recruiters and RV-VLSI internal use">

               <a href="downloadExce.php">Create Excel For Recruiters</a>
                </div>
               </li>

 <li class="<?php echo $downloadExceClass;?>">
                                 <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Use this to create college wise report">

               <a href="collegewise.php">College Wise Report</a>
                </div>
               </li>
           
           </ul>
       </nav>
    </div><!--/Main Nav Ends-->

 <aside class="nrb-lhs">
        <div class="nrb-brand text-center">
            <a href="#">Nanochip Solutions</a>
        </div>
        <ul class="nrb-lhs-nav">
            <li class=""><a href="#">Dashboard</a></li>
            <li class="<?php echo $studentListClass;?>"><a href="studentlist.php">Resumes in DB</a></li>
            <li class=""><a href="recruitementListSuperAdmin.php">Job Openings</a></li>
            <li class=""><a href="recruitementListSuperAdminReviewResume.php">Review - Job Openings</a></li>            
            <li class=""><a href="recruiterList.php">Recruiter Activation</a></li>
            <li class="<?php echo $domainKeywordClass;?>"><a href="domainKeyword.php">Domain Keyword</a></li>
            <li class=""><a href="#">Resume Builder Settings</a></li>
            <li class=""><a href="batchlist.php">Batch Report</a></li>
             <li class=""><a href="placedReport.php">Placed Report</a></li>
            <li class=""><a href="index.php">Logout</a></li>                        
        </ul>
    </aside>
    
