<?php include_once('db/dbconfig.php');
include_once('admin_login_check.php');
session_start();
if($_GET['idprograms'] ==1)
{
$header='Digital System Design & Implementation: made easy';
$Title = 'In this course you will learn the fundamental constructs of VHDL or Verilog Hardware
Description Language. Hardware Description Language abbreviated as HDLs is the modern way
of describing the behavior of the hardware in concern and learning these languages forms the
first step into the world of VLSI. Further in the course you will learn the fundamentals of FPGA
technology on which hardware is realized. This course is everything you need to kick-start your
venture in the world of VLSI and embedded systems design.';

}
	
if($_GET['idprograms'] ==2)
{
	$header='High Performance Digital System Design Techniques';
$Title = 'Modern programmable VLSI systems are complex and require intense techniques for building
and optimizing them for performance and productivity. Efficient HDL coding techniques needs
to be incorporated for generating robust hardware configuration to achieve a given functionality.
Advanced performance analysis such as Static Timing Analysis provides early estimate about
the system performance which is very crucial in developing reliable commercial hardware.
The course is focused on discussing such techniques with respect to the programmable VLSI
technology.';

}
if($_GET['idprograms'] ==3)
{
	$header='Advanced Embedded Systems Design using NIOS II Soft Processor';
$Title = 'Implementing a processor on a programmable VLSI system has many advantages like faster
time to market, faster design changes, exploration of alternative architectures, NRE cost
reduction, etc.,. Since the processor can be implemented on a programmable VLSI system,
developing powerful embedded system around it would be become very easy. Programmable
logic fabric surrounding such soft processors gives us an excellent opportunity to develop
custom peripherals, incorporate several IPs from the commercial vendors and open-source
consortiums. The course is focused on discussing the techniques of building embedded systems
on programmable logic devices.';

}


?>


<html>
<head>
<script language="javascript" type="text/javascript" src="javascript/validation.js"></script>
<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />

<link rel="stylesheet" href="css/lytebox.css" type="text/css" media="screen" />
</head>

<script type="text/javascript">


function fnclose()
{
  parent.location="program_offerings.php";
}
</script>


<body>
 <form action="" method="POST" id="myForm" name="myform" onSubmit="return validatedoctors();">
 
 <table width="100%"  cellpadding="4" cellspacing="10" border="0">
   <tr><td align="right"><img src="images/close.gif" align="absmiddle" onClick="fnclose();" style="cursor:pointer"></td></tr>
   <tr><td>
   
   <table width="100%" style="border-bottom:2px solid #425843;"><tr><td><img src="/images/RV-Institute_logo.jpg" align="absmiddle"></td>
     <td width="100%" align="center"><img src="/images/jgain.png" width="450" height="132"></td>
     <td><img src="/images/logo_new.jpg" align="absmiddle"></td></tr>
  </table>
   
   </td></tr>
   <tr><td style="font-weight:bold;"><?php echo $header?></td></tr>
    <tr>

			<td>"<?php echo $Title;?>".</td>
			</tr>
      <tr> <td align="right">
	  <img src="images/disable_closebtn.png" onClick="fnclose();" style="cursor:pointer"/></td></tr>
	<tr><td>
    <table width="100%" cellpadding="2" cellspacing="2" border="0"  style="border-top:2px solid #425843; font-size:12px;"><tr><td wdith="50%" align="left">	A unit of Rashtreeya Sikshana Samiti Trust.</td><td align="right">	All rights reserved, Copyright © RV-VLSI Design Center.	  </td></tr></table> </td></tr>		
  </table>
 
 
 <table width="100%"  cellpadding="4" cellspacing="10" border="0" class="resuemviewtableborder" style="display:none;">
 
 <tr>
        <td colspan="2" class="popupheader">
		 <table width="100%" border="0" cellspacing="0" cellpadding="1">
         <tr>
          <td nowrap="nowrap"><?php echo $header?></td>
         <td width="100%" align="right"><img src="images/close.gif" align="absmiddle" onClick="fnclose();" style="cursor:pointer"></td>
      </tr>
  </table>
  </td>
  </tr>
  <tr><td colspan="2"> <table width="100%" style="border-bottom:2px solid #425843;"><tr><td><img src="/images/RV-Institute_logo.jpg" align="absmiddle"></td>
     <td width="100%" align="center"><img src="/images/jgain.png" width="450" height="132"></td>
     <td><img src="/images/logo_new.jpg" align="absmiddle"></td></tr>
  </table></td></tr>
  
		<tr><td>
		<table cellpadding="0" cellspacing="0" border="0"><tr>
			<td></td>
		</tr></table>
		
		
		</td></tr>
      <tr> <td align="right">
	  <input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td></tr>
					
  </table>
  </form>
</body>
</html>