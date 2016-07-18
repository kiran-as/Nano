<?php
$urlname = explode('/councellor/',$_SERVER['REQUEST_URI']);
$studentDetails = '';
$admission = '';
$downloadExce = '';

if($urlname[1]=='studentDetails.php' || $urlname[1]=='editStudent.php' || $urlname[1]=='addNewStudent.php')
{
   $studentDetails = 'active';
}
if($urlname[1]=='admission.php')
{
   $admission = 'active';
}
if($urlname[1]=='downloadExce.php')
{
   $downloadExce = 'active';
}
?>
<div class="main-nav-wrapper">
       <nav class="container">
           <ul class="main-nav clearfix">
               <li class="<?php echo $studentDetails;?>"><a href="studentDetails.php">Enquiries</a></li>
                <li class="<?php echo $admission;?>"><a href="admission.php">Admission</a></li>
                <li class="<?php echo $downloadExce;?>"><a href="downloadExce.php">Report</a></li>

           </ul>
       </nav>
    </div><!--/Main Nav Ends-->