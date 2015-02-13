<?php
$urlname = explode('/admin/',$_SERVER['REQUEST_URI']);
$dashboardClass = '';
$studentListClass = '';
$searchDomainStudentClass = '';
$recruitementListClass = '';
$directEntryClass = '';
$processResumeClass = '';
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
else 
{
   $processResumeClass = 'active';
}
?>
<div class="main-nav-wrapper">
       <nav class="container">
           <ul class="main-nav clearfix">
               <li class="<?php echo $dashboardClass;?>"><a href="dashboard.php">Dashboard</a></li>
               <li class="<?php echo $studentListClass;?>"><a href="studentlist.php">Student List</a></li>
               <li class="<?php echo $searchDomainStudentClass;?>"><a href="searchDomainStudent.php">Domain Based Search</a></li>
                <li class="<?php echo $recruitementListClass;?>"><a href="recruitementList.php">Recruitement List</a></li>
               <li class="<?php echo $processResumeClass;?>"><a href="processResume.php">Refresh Dashboard</a></li>
               <li class="<?php echo $directEntryClass;?>"><a href="directEntry.php">Direct Entry</a></li>
           </ul>
       </nav>
    </div><!--/Main Nav Ends-->