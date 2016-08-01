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

<!--<div class="rightimg_top">
<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Job Seeker Details</h3>
</div>
<div class="rightimg_right">
</div>
</div>--><!--end of rightimg_top-->
 <div class="rightinner_content_inner">
 <div style="float:left; width:460px; margin:0px 160px;">
 <div class="login_bg">
 <div class="recruitleftbg"></div>
 <div class="loginmidbg"></div>
 <div class="recruitrightbg"></div>
 </div>
 <div style="float:left; width:410px; background-color:#f3e1e1; border-left:1px solid #736f6f; border-right:1px solid #736f6f;">
	
  <table width="100%" height="43" >   
   
    <tr>
    
        <td width="750" colspan="2" >
        <table align="center"> 
        <tr>
        <td>&nbsp;</td>
        </tr>
        <tr>
        <td align="center" height="77px" style="font-size:20px; font-weight:bold; color: #114981;"><strong>Welcome &nbsp;<?=ucfirst($_SESSION['username']);?></strong><br/>
		<?php /*?><? if($visit==1){?><a href="personal_info.php" class="mail_text">Free Resume Builder</a><? }?><?php */?>
         <?   
 $gen_result=$db->getResults("select * from $members_table where m_id='".$_SESSION[m_id]."'");
 $gen=count($gen_result);
 
 $career_result=$db->getResults("select * from $career_objective_table where m_id='".$_SESSION[m_id]."'");
  $cobj=count($career_result);
 
 $core_result=$db->getResults("select * from $core_competecny_table where m_id='".$_SESSION[m_id]."'");
  $core=count($core_result);
 
  $edu_result=$db->getResults("select * from $education_table where m_id='".$_SESSION[m_id]."'");
 $edu=count($edu_result);
 
  $workexp_result=$db->getResults("select * from $work_experience_table where m_id='".$_SESSION[m_id]."'");
  $work=count($workexp_result);
 
 $proj_result=$db->getResults("select * from $projects_table where m_id='".$_SESSION[m_id]."'");
 $proj=count($proj_result);
 
 $ache_result=$db->getResults("select * from $achievements_table where m_id='".$_SESSION[m_id]."'");
 $ache=count($ache_result);
 ?>
        <? if($cobj==0 && $core==0 && $work==0 && $proj==0 && $ache==0)
{

?><p><a href="personal_info.php" class="mail_text" style="font-size:18px; font-weight:bold; color: #114981;">Build you’re Industry Standard Resume for FREE </a></p><? }?>
        </td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        </tr>
        <tr>
        </table>        </td>
      <!--<td width="1%" height="15" >&nbsp;</td>
      <td width="83%" height="15" >&nbsp;</td>-->
    </tr>
</table>

</div>
  <div class="login_bg">
 <div class="recruitleftbtbg"></div>
 <div class="loginmidbtbg"></div>
 <div class="recruitrightbtbg"></div>
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


</div><!--end of main_content-->

</div>
<?php include "stmenuleft_content.php" ?>
</div>
<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>