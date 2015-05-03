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
else 
{
   $processResumeClass = 'active';
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

               <a href="studentlist.php">Student List</a>
               </div>
               </li>
               <li class="<?php echo $searchDomainStudentClass;?>">
                                 <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click here to shortlist the resume based on %, keywords etc">

               <a href="advancedSearch.php">Search</a>
                </div>
               </li>
                <li class="<?php echo $recruitementListClass;?>">
                                  <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jobs posted by Recruiter is listed under this section">

                <a href="recruitementList.php">Current Openings</a>
                 </div>
                </li>
               <li class="<?php echo $processResumeClass;?>">
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

               <a href="settings.php">Settings</a>
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