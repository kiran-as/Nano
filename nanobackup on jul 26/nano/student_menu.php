<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

 $check=new checkingAuth();
   $check->loginCheck();   

	
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   /*$employability_factor=0;
   $eduacational_query="select * from $education_table where m_id='".$_SESSION[m_id]."'";
   $education_result=$db->getResults($eduacational_query);
   foreach($education_result as $result)
   {
	   $query="select * from $qualifications_table where t_id='".$result->e_title."'";
	   $degree_result=$db->getResults($query);
	   if($query->t_id=='1')
	   {$employability_factor+=15;
		   }else if($query->t_id=='2')
	   {//$employability_factor+=15;
	   $spl_query="select * from $course_table where t_id='".$query->t_id."'";
	   $spl_result=$db->getResults($spl_query);
	   foreach($spl_result as $spresult)
	   {
		   if($spresult->cor_name=='BE')
	   {
		   $employability_factor+=45;
		   }else if($spresult->cor_name=='B.tech')
		   {$employability_factor+=45;
			   }
		   }
		   }
	   
	   }*/
   
   
   
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<meta name="keywords" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<title>ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
</head>

<body>
<div class="main_div">	
<? include "includes/header.php" ?>

<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />
</div><!--end of main_banner-->
<div class="main_content">
<div class="stmenuright_maincontent">

<div class="rightimg_top">
<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Job Seeker Details</h3>
</div>
<div class="rightimg_right">
</div>
</div><!--end of rightimg_top-->
 <div class="rightinner_content_inner">

	
  <table width="100%" height="43" >   
   
    <tr>
    
        <td width="750" colspan="2" >
        <table align="center"> 
        <tr>
        <td>&nbsp;</td>
        </tr>
        <tr>
        <td align="center" style="font-size:16px"><strong>Welcome &nbsp;&nbsp;<?=$_SESSION['username'];?></strong></td>
        </tr>
        </table>        </td>
      <!--<td width="1%" height="15" >&nbsp;</td>
      <td width="83%" height="15" >&nbsp;</td>-->
    </tr>
</table>

</div>
</div><!--end of right_maincontent-->
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
 <script type="text/javascript" src="lib/jquery.js"></script>
<script type='text/javascript' src='lib/jquery.autocomplete.js'></script>
<script type='text/javascript' src='lib/localdata.js'></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
  <link type="text/css" rel="stylesheet" href="calender/dhtmlgoodies_calendar.css" media="screen"/></link>
<script src="calender/dhtmlgoodies_calendar.js" type="text/javascript"></script>
<link href="css/ajaxtabs.css" rel="stylesheet" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />
<link href="rv_main.css" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript" src="js/SpryEffects.js"></script>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/dw_scrollObj.js" type="text/javascript"></script>
<script src="Scripts/dw_glidescroll.js" type="text/javascript"></script>
<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>

<?php include "stmenuleft_content.php" ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>