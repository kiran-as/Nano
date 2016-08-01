<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  


   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   $check=new checkingAuth();
   $check->loginCheckrec(); 
  // echo $_SESSION['r_id'];
 $date_query=$db->getResults("SELECT * FROM rv_work_experience");
	$y2=0;
	$y2_5=0;
	$y5=0;
	foreach($date_query as $date_row)
	{
	$months_from=explode('-',$date_row->From_date);
	$months_to=explode('-',$date_row->To_date);
	$noofmonths=ceil((mktime(0,0,0,$months_to[0],0,$months_to[1])- mktime(0,0,0,$months_from[0],0,$months_from[1]))/(24*60*60*30));
	//echo "Time---".$noofmonths;
	if($noofmonths<=24){
	$y2++;
	}
	if($noofmonths>24 && $noofmonths<60){
	$y2_5++;
	}
	if($noofmonths>60){
	$y5++;
	}
	}
	
	
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

<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>


<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>


<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<div class="stmenuright_maincontent">

<div style="float:left; width:980px; margin:0px; padding:0px;">
<div class="rightimg_left">
</div>
<div style="background-image:url(images/rightcontent_mid.jpg); width:960px; background-repeat:repeat-x; height:25px; line-height:20px; float:left;">
<table width="960px" cellpadding="0" cellspacing="">
<tr>
<td width="141"><h3 class="h3class">Dash Board</h3></td>
<td width="108"><a href="#" class="dash_boardmenu" >Edit Profile</a></td>
<td width="166"><a href="#" class="dash_boardmenu" >Manage Job Posting</a></td>
<td width="95"><a href="statistics.php" class="dash_boardmenu" >Statistics</a></td>
<td width="80"><a href="recruiter_menu.php" class="dash_boardmenu" >Search</a></td>
<td width="157"><a href="#" class="dash_boardmenu" >Change Password</a></td>
<td width="72" ><a href="recruiter_logout.php" class="dash_boardmenu" >Logout</a></td>
<td width="139"><h3 class="h3class" style="float:right; text-align:right">Welcome &nbsp;&nbsp;<?=ucfirst($_SESSION['username']);?></h3></td>
</tr>
</table>
</div>
<div class="rightimg_right"></div>
</div>
 <div class="rightinner_content_inner" style="width:900px;padding-left:35px;">
	
   	  
  
	  
	
  <table width="100%" height="67"  class="recruit_table">   
    <tr>
   <?  //include_once('includes/recruiters_side_menu.php');?>
      <!--<td width="1%" height="15" >&nbsp;</td>
      <td width="83%" height="15" >&nbsp;</td>-->
    </tr>
    <tr>
     <!-- <td width="1%" >&nbsp;</td>-->
	  
	  <td width="80%" align="center" style="font-size:14px"><table width="100%" border="0" cellspacing="0" cellpadding="3">
  <!--<tr>
    <td colspan="3"><strong>Welcome &nbsp;&nbsp;<?=$_SESSION['username'];?></strong></td>
    </tr>-->
  <tr style="background-color:#ccc;">
    <td width="56%" align="left">Total number or resume</td>
    <td width="1%" align="left">:</td>
    <td width="43%" align="left"><?=count($db->getResults("SELECT m_id FROM $members_table"));?></td>
    </tr>
  <tr>
    <td align="left">Total number of resume with BE/B.Tech</td>
    <td align="left">:</td>
    <td align="left"><?=count($db->getResults("SELECT m.m_id,ed.qua_id FROM $members_table m ,$education_table1 ed where m.m_id=ed.m_id and ed.qua_id='BE/BTech'"));?></td>
    </tr>
  <tr style="background-color:#ccc;">
    <td align="left">Total number of resume  with BE and MTech</td>
    <td align="left">:</td>
    <td align="left"><?=count($db->getResults("SELECT m.m_id,ed.qua_id FROM $members_table m ,$education_table1 ed where m.m_id=ed.m_id and ed.qua_id='BE/BTech' and ed.qua_id='ME/MTech'"));?></td>
    </tr>
  <tr>
    <td align="left">Total Number or  resumes with Phd </td>
    <td align="left">:</td>
    <td align="left"><?=count($db->getResults("SELECT m.m_id,ed.qua_id FROM $members_table m ,$education_table1 ed where m.m_id=ed.m_id and ed.qua_id='Phd'"));?></td>
    </tr>
  <tr style="background-color:#ccc;">
    <td align="left">Total Number of resumes with 0 to 2 years of exp</td>
    <td align="left">:</td>
    <td align="left"><?=$y2?>	</td>
    </tr>
  <tr>
    <td align="left">Total Number of resumes with 2 to 5 years  of exp</td>
    <td align="left">:</td>
    <td align="left"><?=$y2_5?></td>
    </tr>
  <tr style="background-color:#ccc;">
    <td align="left">Total Number of resumes with 5 and above years of exp</td>
    <td align="left">:</td>
    <td align="left"><?=$y5?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr style="background-color:#ccc;">
    <td align="left"><strong>Domain Experience</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td align="left">Expertise in Front End</td>
    <td align="left">:</td>
    <td align="left"><?=count($db->getResults("SELECT m.m_id,proj.p_end,proj.p_vlsitype FROM $members_table m ,$projects_table proj where m.m_id=proj.m_id and proj.p_end='VLSI' and proj.p_vlsitype='1'"));?></td>
    </tr>
  <tr style="background-color:#ccc;">
    <td align="left">Expertise in Back End</td>
    <td align="left">:</td>
    <td align="left"><?=count($db->getResults("SELECT m.m_id,proj.p_end,proj.p_vlsitype FROM $members_table m ,$projects_table proj where m.m_id=proj.m_id and proj.p_end='VLSI' and proj.p_vlsitype='2'"));?></td>
    </tr>
  <tr>
    <td align="left">Embed systems</td>
    <td align="left">:</td>
    <td align="left"><?=count($db->getResults("SELECT m.m_id,proj.p_end FROM $members_table m ,$projects_table proj where m.m_id=proj.m_id and proj.p_end='EMBEDED'"));?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>
     </td>
	</tr>
</table></div>
</div><!--end of right_maincontent-->
<?php //include "left_con.php" ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>