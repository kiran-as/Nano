<?php
$urlname = explode('/counsellor2/',$_SERVER['REQUEST_URI']);
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
if($urlname[1]=='advancePayment.php')
{
   $advancePayment = 'active';
}
if($urlname[1]=='followup.php') {
  $followup = 'active';
}
if($urlname[1]=='seatperbatch.php')
{
   $seatperbatch = 'active';
}
if($urlname[1]=='followup.php') {
  $followup = 'active';
}
if($urlname[1]=='global.php') {
  $global = 'active';
}
if($urlname[1]=='downloadExce.php') {
  $downloadExce = 'active';
}
?>
<div class="main-nav-wrapper">
       <nav class="container">
           <ul class="main-nav clearfix">
               <li class="<?php echo $studentDetails;?>"><a href="studentDetails.php">Enquiries</a></li>
                <li class="<?php echo $followup;?>"><a href="followup.php">Follow Up</a></li>
                <li class="<?php echo $admission;?>"><a href="admission.php">Application Bought</a></li>
                <li class="<?php echo $advancePayment;?>"><a href="advancePayment.php">Advance Payment</a></li>
                <li class="<?php echo $seatperbatch;?>"><a href="seatperbatch.php">Seats Per Batch</a></li>
                <li class="<?php echo $global;?>"><a href="global.php">Global Search</a></li>
                <li class="<?php echo $downloadExce;?>"><a href="downloadExce.php">Report</a></li>
                <li class="<?php echo $downloadExce;?>"><a href="saleReport.php">Sales Report</a></li>

           </ul>
       </nav>
    </div><!--/Main Nav Ends-->