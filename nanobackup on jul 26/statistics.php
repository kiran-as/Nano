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
   
 $date_query=$db->getResults("SELECT * FROM rv_work_experience wrk,rv_registration mem where wrk.m_id=mem.m_id");
	$y2=0;
	$y2_5=0;
	$y5=0;
	foreach($date_query as $date_row)
	{
	$months_from=explode('-',$date_row->we_from_date); 	
	$months_to=explode('-',$date_row->we_to_date);
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
<script type="text/javascript">var GB_ROOT_DIR = "<?=$server_url?>greybox/";</script>
<script type="text/javascript" src="<?=$server_url?>greybox/AJS.js"></script>
<script type="text/javascript" src="<?=$server_url?>greybox/AJS_fx.js"></script>
<script type="text/javascript" src="<?=$server_url?>greybox/gb_scripts.js"></script>
<link href="<?=$server_url?>greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div class="main_div">	
<? include "includes/header.php" ?>

<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />
</div><!--end of main_banner-->
<div class="main_content">

<link rel="stylesheet" href="nanochip/ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>


<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<script>
function addOption(theSel){
 oc = theSel.options.length;
 if(theSel.selectedIndex==oc-1){
   newOpt = window.prompt("Please Enter..","");
   if(newOpt+"">""){
     theSel.options[oc] = new Option(theSel.options[oc-1].text);
     theSel.options[oc-1] = new Option(newOpt, newOpt, true, true);
   }
 }
}


function searchValidation(){

if(document.searchForm.m_city.value=='0' && document.searchForm.qua_id.value=='0' && document.searchForm.branch_name.value=='0')
{
alert("Please select atleast one Search Option");
document.searchForm.m_city.focus();
return false;

}


}
function checkAll(master){
var checked = master.checked;
var col = document.getElementsByTagName("INPUT");
for (var i=0;i<col.length;i++) {
col[i].checked= checked;
}
}

</script>
<style type="text/css">

a.active
{
	color: #114981;
	font-size:14px;
	text-decoration:none;
}
</style>

<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<div style="float:left; width:980px; margin:0px; padding:0px;">

<div class="main_content">

    <div class="candidate_inner">
    <ul>
    <a href="statistics.php" style="text-decoration:none;"><li style="border-bottom:1px solid #333; margin-bottom:-1px;">
    <div class="candidate_nanohdleft"></div>
    <div class="candidate_nanohdmid">Dash Board</div> 
    <div class="candidate_nanohdright"></div></li></a>
    <a href="jobposting_form.php"  style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Manage Job Posting</div>
    <div class="nanohdrightdefault"></div></li></a>
    <!--<a href="recruiter_menu.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Search</div>
    <div class="nanohdrightdefault"></div> </li></a>-->
    <a href="recuirter_editprofile.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Edit Profile</div>
    <div class="nanohdrightdefault"></div> </li></a>
    <a href="recruiter_logout.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Logout</div>
    <div class="nanohdrightdefault"></div> </li></a>
    </ul>
    
    </div>
<!--<div class="rightimg_left"></div>
<div style="background-image:url(images/rightcontent_mid.jpg); width:960px; background-repeat:repeat-x; height:25px; line-height:20px; float:left;">

<table width="960px" style="line-height:15px;">
<tr>
<td width="134"><a href="candidate_details.php" class="dash_boardmenu"><strong style="color:#114981;font-size:16px;font-weight:bold;">Dash Board</strong></a></td>
<td width="103"><a href="recuirter_editprofile.php" class="dash_boardmenu" ><strong>Edit Profile</strong></a></td>
<td width="158"><a href="jobposting_form.php" class="dash_boardmenu" ><strong>Manage Job Posting</strong></a></td>-->
<!--<td width="92"><a href="statistics.php" class="dash_boardmenu" ><strong>Statistics</strong></a></td>-->
<!--<td width="77"><a href="recruiter_menu.php" class="dash_boardmenu" ><strong>Search</strong></a></td>-->
<!--<td width="150"><a href="#" class="dash_boardmenu" ><strong>Change Password</strong></a></td>-->
<!--<td width="58" ><a href="recruiter_logout.php" class="dash_boardmenu" ><strong>Logout</strong></a></td>
<td width="152"><h3 class="h3class" style="float:right; text-align:right">Welcome <?=ucfirst($_SESSION['username']);?></h3></td>
</tr>
</table>
</div>
<div class="rightimg_right"></div>-->
</div>

<div style="width:980px; padding:10px 0px; float:left;">
<div class="dashboardtop_bg">
 <div class="recruitleftbg"></div>
 <div class="dashboardmidbg"></div>
 <div class="recruitrightbg"></div>
 </div>
 <table   width="725px" cellspacing="0" cellpadding="0"  style="border-left:1px solid #736f6f; border-right:1px solid #736f6f; float:left; background-color:#f3e1e1;">   
<tr>
    <td colspan="3"><h3 class="h3class" style="float:left; text-align:left; padding-left:10px;">Welcome <?=ucfirst($_SESSION['username']);?></h3></td>
    </tr></table>
<table width="725px" cellspacing="0" cellpadding="0" style="border-left:1px solid #736f6f; border-right:1px solid #736f6f; float:left; background-color:#f3e1e1;">   
    <tr>
   <?  //include_once('includes/recruiters_side_menu.php');?>
      <!--<td width="1%" height="15" >&nbsp;</td>
      <td width="83%" height="15" >&nbsp;</td>-->
    </tr>
    <tr>
     <!-- <td width="1%" >&nbsp;</td>-->
	  
	  <td width="713px" align="center" style="font-size:14px">
      <table width="54%" border="0" cellspacing="0" cellpadding="2" style="border:1px solid #aeadad;">
  <!--<tr>
    <td colspan="3"><strong>Welcome &nbsp;&nbsp;<?=$_SESSION['username'];?></strong></td>
    </tr>-->
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td width="82%" align="left" style="border-bottom:1px solid #aeadad;">Total number or resumes</td>
    <td width="3%" align="left" style="border-bottom:1px solid #aeadad;">:</td>
    <td width="15%" align="left" style="border-bottom:1px solid #aeadad;"><?=count($db->getResults("SELECT m_id FROM $members_table"));?></td>
    </tr>
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td align="left" style="border-bottom:1px solid #aeadad;">Total number of resumes with BE/B.Tech</td>
    <td align="left" style="border-bottom:1px solid #aeadad;">:</td>
    <td align="left" style="border-bottom:1px solid #aeadad;"><?=count($db->getResults("SELECT distinct(mem.m_id) from $education_table ed,$members_table mem where ed.qua_id='2' and ed.e_course='25' and ed.m_id=mem.m_id"));?></td>
    </tr>
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td align="left" style="border-bottom:1px solid #aeadad;">Total number of resumes  with BE and MTech</td>
    <td align="left" style="border-bottom:1px solid #aeadad;">:</td>
    <td align="left" style="border-bottom:1px solid #aeadad;"><?=count($db->getResults("SELECT distinct(mem.m_id) from $education_table  ed,$members_table mem where ed.qua_id=1 and ed.e_course=1 and ed.m_id=mem.m_id"));?></td>
    </tr>
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td align="left" style="border-bottom:1px solid #aeadad;">Total Number or  resumes with PG Diploma and Certificate courses </td>
    <td align="left" style="border-bottom:1px solid #aeadad;">:</td>
    <td align="left" style="border-bottom:1px solid #aeadad;"><?=count($db->getResults("SELECT  distinct(mem.m_id)  from $education_table ed,$members_table mem where ed.qua_id='21' and ed.m_id=mem.m_id"));?></td>
    </tr>
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td align="left" style="border-bottom:1px solid #aeadad;">Total Number of resumes with 0 to 2 years of exp</td>
    <td align="left" style="border-bottom:1px solid #aeadad;">:</td>
    <td align="left" style="border-bottom:1px solid #aeadad;"><?=$y2?>	</td>
    </tr>
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td align="left" style="border-bottom:1px solid #aeadad;">Total Number of resumes with 2 to 5 years  of exp</td>
    <td align="left" style="border-bottom:1px solid #aeadad;">:</td>
    <td align="left" style="border-bottom:1px solid #aeadad;"><?=$y2_5?></td>
    </tr>
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td align="left" style="border-bottom:1px solid #aeadad;">Total Number of resumes with 5 and above years of exp</td>
    <td align="left" style="border-bottom:1px solid #aeadad;">:</td>
    <td align="left" style="border-bottom:1px solid #aeadad;"><?=$y5?></td>
    </tr>
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td style="border-bottom:1px solid #aeadad;">&nbsp;</td>
    <td style="border-bottom:1px solid #aeadad;">&nbsp;</td>
    <td style="border-bottom:1px solid #aeadad;">&nbsp;</td>
    </tr>
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td align="left" style="border-bottom:1px solid #aeadad;"><strong>Domain Experience</strong></td>
    <td style="border-bottom:1px solid #aeadad;">&nbsp;</td>
    <td style="border-bottom:1px solid #aeadad;">&nbsp;</td>
    </tr>
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td align="left" style="border-bottom:1px solid #aeadad;">Expertise in Front End</td>
    <td align="left" style="border-bottom:1px solid #aeadad;">:</td>
    <td align="left" style="border-bottom:1px solid #aeadad;"><?=count($db->getResults("SELECT m.m_id,proj.p_end,proj.p_vlsitype FROM $members_table m ,$projects_table proj where m.m_id=proj.m_id and proj.p_end='VLSI' and proj.p_vlsitype='1'"));?></td>
    </tr>
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td align="left" style="border-bottom:1px solid #aeadad;">Expertise in Back End</td>
    <td align="left" style="border-bottom:1px solid #aeadad;">:</td>
    <td align="left" style="border-bottom:1px solid #aeadad;"><?=count($db->getResults("SELECT m.m_id,proj.p_end,proj.p_vlsitype FROM $members_table m ,$projects_table proj where m.m_id=proj.m_id and proj.p_end='VLSI' and proj.p_vlsitype='2'"));?></td>
    </tr>
  <tr style="background-color:#ffffff; border-bottom:1px solid #aeadad;">
    <td align="left">Embed systems</td>
    <td align="left">:</td>
    <td align="left"><?=count($db->getResults("SELECT m.m_id,proj.p_end FROM $members_table m ,$projects_table proj where m.m_id=proj.m_id and proj.p_end='EMBEDED'"));?></td>
    </tr>

</table>
     </td>
	</tr>
</table>
<div class="dashboardtop_bg">
 <div class="recruitleftbtbg"></div>
 <div class="dashboardmidbtbg"></div>
 <div class="recruitrightbtbg"></div>
 </div>
  </div>
</div><!--end of right_maincontent-->
<?php //include "left_con.php" ?>

</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div> <!--end of main_div-->
</body>
</html>