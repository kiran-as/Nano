<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
   include_once('classes/messages.php');  
   include_once('classes/recruiter.class.php');  

 

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   $check=new checkingAuth();
   $check->loginCheckrec(); 
  $rec = new recruiter();
 $ja_row = $rec->getJobApp('','','',$_REQUEST['jp_id']);
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
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<div style="float:left; width:980px; margin:0px; padding:0px;">

<div style="float:left; width:980px; margin:0px; padding:0px;">
<div class="recruit_inner">
    <ul>
    <a href="statistics.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Dash Board</div>
    <div class="nanohdrightdefault"></div></li></a>
    <a href="jobposting_form.php" style="text-decoration:none;"><li style="border-bottom:1px solid #333; margin-bottom:-1px;">
    <div class="candidate_nanohdleft"></div>
    <div class="candidate_nanohdmid">Manage Job Posting</div>
    <div class="candidate_nanohdright"></div></li></a>
    <!--<a href="recruiter_menu.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Search</div>
    <div class="nanohdrightdefault" ></div> </li></a>-->
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
</div>

<div style="width:977px; padding-top:10px; padding-bottom:10px; float:left;">
<div class="dashboardtop_bg">
 <div class="recruitleftbg"></div>
 <div style="float:left;background-image:url(images/recruitmidbg.png);background-repeat:repeat-x;width:965px;height:8px;"></div>
 <div class="recruitrightbg"></div>
 </div>
	

	<table width="100%"   cellspacing="0" cellpadding="0" style="border-left:1px solid #736f6f;border-right:1px solid #736f6f;float:left; background-color:#f3e1e1; padding-left:0px;"> 
	  <?
	  if(!empty($ja_row[0]->st_ids))
 {	
			?>
      <tr> 
    <td colspan="5" class="strong"><h3 align="left" style="color:#114981;font-size:18px;font-weight:bold;margin:0px;padding-left:10px;">Assigned Candidates</h3></td>
	
	</tr>	
     <tr><td colspan="7">&nbsp;</td></tr>	
  <tr> 
    <td width="18%" class="slider" style="padding-left:10px;">Resume ID</td>
	<td width="58%" class="slider">Name</td>
	
	<td width="24%" class="slider">Resume view</td>
	
	</tr>
	  <tr><td  style="border-bottom:1px solid #333; height:1px;" colspan="7">&nbsp;</td></tr>
  <? 
 $st_list = explode(",",$ja_row[0]->st_ids);
 $i=0;
 foreach($st_list as $student)
 {
 $query ="select * from rv_registration where m_id=$st_list[$i]";
//echo $query ;die;
    $result_students=$db->getResults($query);

  ?>
  <tr>
    <td height="35" style="padding-left:10px;"><?=$result_students[0]->m_resume_id?></td>
    <td><?=$result_students[0]->m_fname.'&nbsp;'.$result_students[0]->m_lname?></td> 
  
	<td>
    <a href="#" onclick="GB_showCenter('Summary of <?=strtoupper($result_students[0]->m_fname)." ".strtoupper($result_students[0]->m_lname)?>','<?=$server_url?>candidate_summary.php?m_id=<?=$result_students[0]->m_id?>',400,750);" style=" color:#000;font-size:14px; font-weight:bold;"><img src="images/veiw_resumeimg.png" width="118" height="20" border="0" align="absmiddle" /></a>
    </td>
	
    </tr>
	   <tr><td style="height: 1px;" colspan="3" bgcolor="#999999" ></td></tr> 
 <? $i++;}
 }
 else
 {?>
<tr>
  <td colspan="3" align="center"  valign="top"><? echo "NO STUDENT SELECTED"; ?> </td>
</tr>
<? } ?>
</table>  
<div class="dashboardtop_bg">
 <div class="recruitleftbtbg"></div>
 <div style="float:left;background-image:url(images/recruitmidbtbg.png);background-repeat:repeat-x;width:965px;height:8px;"></div>
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