<?php error_reporting(E_ALL ^ E_NOTICE);
 include_once('db/dbconfig.php');
session_start();
$resultccc	="SELECT * FROM tbl_programs WHERE idprograms=".$_GET['idprograms'];
$result = mysql_query($resultccc);
while ($row = mysql_fetch_assoc($result)) {
   $Description = $row['Description'];
   $Title = $row['Title'];
   print_r($_SESSION['dates']);
   die();
   $html='Dear '.$_SESSION['name'];
   $html.='
<div>
	&nbsp;</div>
<div>
	Congratulation for registering to "'.$Title.'" !</div>
<div>
	&nbsp;</div>
<div>
	An RV-VLSI counselor will call you shortly to complete the admission process and</div>
<div>
	enroll you into your chosen batch.</div>
<div>
	&nbsp;</div>
<div>
	Kindly download and print the <a href="http://www.rv-vlsi.com/RV_VLSI_Application_Form_PDF.pdf">Application Form</a>, and submit the duly filled out</div>
<div>
	application form when you visit our center.</div>
<div>
	&nbsp;</div>
<div>
	&nbsp;</div>
<div>
	<strong>Thanks and Regards,</strong></div>
<div>
	<strong>RV-VLSI Team</strong></div>
   ';
  // $html=' Thanks for applying for the'.$Title.'.The admin of the RV-VLSI will contact you personally';
  }
?>