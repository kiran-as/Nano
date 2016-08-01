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
   
   if(isset($_POST['jobInsert']))
   
   {
		$chkbrnch=implode(",",$_POST[chkBranch]);
		$chkDomine=implode(",",$_POST[chDomine]); 
		$query_jobposting=" insert into $jobposting_table set 
								r_id						='".$ch->checkFields($_SESSION[r_id])."',
								jp_company					='".$ch->checkFields($_POST[txtCompany])."',
								jp_address					='".$ch->checkFields($_POST[txtAddress])."',
								jp_name						='".$ch->checkFields($_POST[txtName])."',
								jp_designation				='".$ch->checkFields($_POST[txtDesignation])."',
								jp_telephone				='".$ch->checkFields($_POST[txtTelephone])."',
								jp_mobile					='".$ch->checkFields($_POST[txtMobile])."',
								jp_email					='".$ch->checkFields($_POST[txtEmail])."',
								jp_description				='".$ch->checkFields($_POST[txtJobDescrp])."',
								jp_job_title				='".$ch->checkFields($_POST[txtJobTitle])."',
								jp_be						='".$ch->checkFields($_POST[chkBE])."',
								jp_me						='".$ch->checkFields($_POST[chkME])."',
								jp_branch					='".$ch->checkFields($chkbrnch)."',
								jp_sslc						='".$ch->checkFields($_POST[chkSSLC])."',
								jp_sslc_cutoff				='".$ch->checkFields($_POST[txtSSLC])."',
								jp_puc						='".$ch->checkFields($_POST[chkPUC])."',
								jp_puc_cutoff				='".$ch->checkFields($_POST[txtPUC])."',
								jp_degree					='".$ch->checkFields($_POST[chkDEGREE])."',
								jp_degree_cutoff			='".$ch->checkFields($_POST[txtDegree])."',
								jp_pg						='".$ch->checkFields($_POST[chkPG])."',
								jp_pg_cutoff				='".$ch->checkFields($_POST[txtPG])."',
								jp_backlogs					='".$ch->checkFields($_POST[rdBacklogs])."',
								jp_backlogs_year			='".$ch->checkFields($_POST[rdBacklogYear])."',
								jp_hire_freshers			='".$ch->checkFields($_POST[chFresher])."',
								jp_hire_experienc			='".$ch->checkFields($_POST[chExp])."',
								jp_candidates_quarterly		='".$ch->checkFields($_POST[txtQuarterly])."',
								jp_candidates_annualy		='".$ch->checkFields($_POST[txtAnually])."',
								jp_domain					='".$ch->checkFields($chkDomine)."',
								jp_other_domain				='".$ch->checkFields($_POST[txtOther])."',
								jp_written_apptitude		='".$ch->checkFields($_POST[chApp])."',
								jp_written_technical		='".$ch->checkFields($_POST[chWTech])."',
								jp_technical				='".$ch->checkFields($_POST[chTech])."',
								jp_hr						='".$ch->checkFields($_POST[chHR])."',
								jp_written_general			='".$ch->checkFields($_POST[chGW])."',
								jp_written_apptitude_marks	='".$ch->checkFields($_POST[txtDurnApp])."',
								jp_written_technical_marks	='".$ch->checkFields($_POST[txtWTec])."',
								jp_technical_marks			='".$ch->checkFields($_POST[txtTech])."',
								jp_hr_marks					='".$ch->checkFields($_POST[txtDurHr])."',
								jp_written_contents_marks	='".$ch->checkFields($_POST[txtDurGenral])."',
								jp_skills					='".$ch->checkFields($_POST[txtSpeciSkills])."',
								jp_suggested_read			='".$ch->checkFields($_POST[txtReading])."',
								jp_venue					='".$ch->checkFields($_POST[txtVenue])."',
								jp_our_campus				='".$ch->checkFields($_POST[rdOur])."',
								jp_intership				='".$ch->checkFields($_POST[rdPositions])."',
								jp_intership_duration		='".$ch->checkFields($_POST[rdDuration])."',
								jp_intership_placement		='".$ch->checkFields($_POST[rdAssuared])."',
								jp_regular_positions		='".$ch->checkFields($_POST[rdHiring])."',
								jp_agreement				='".$ch->checkFields($_POST[rdBond])."',
								jp_created_date				='".$ch->checkFields(mktime())."'";
		//echo $query_jobposting;
		$db->insertRecord($query_jobposting);
		//Email sending to admin
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Nanochipsolutions <inof@nanochipsolutions.com>' . "\r\n";     
		$to='puneeth@rv-vlsi.com';
		$subject='New Job Created on Portal';
		$message='<table width="100%" border="0" cellspacing="3" cellpadding="3">
		<tr>
		  <td><a href="http://nanochipsolutions.com/"><img src="http://nanochipsolutions.com/images/Nanologo.jpg"  border="0"/></a></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
  </tr>
		<tr>
		<td width="19%">&nbsp;</td>
		<td width="2%">&nbsp;</td>
		<td width="79%">&nbsp;</td>
		</tr>
		<tr>
		<td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;"><div align="right">Company Name</div></td>
		<td>:</td>
		<td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:normal;">'.$_REQUEST[txtCompany].'</td>
		</tr>
		
		<tr>
		<td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;"><div align="right">Contact Person</div></td>
		<td>:</td>
		<td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:normal;">'.$_REQUEST[txtName].'</td>
		</tr>
		<tr>
		<td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;"><div align="right">Phone Number</div></td>
		<td>:</td>
		<td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:normal;">'.$_REQUEST[txtTelephone].'</td>
		</tr>
		<tr>
		<td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;"><div align="right">Posted Date</div></td>
		<td>:</td>
		<td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:normal;">'.date('d/M/Y',mktime()).'</td>
		</tr>
		
		<tr>
		  <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:normal;">&nbsp;</td>
  </tr>
		<tr>
		  <td colspan="3" valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">Thank you</td>
  </tr>
		<tr>
		  <td colspan="3" valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">Nanochip Solutions Team </td>
  </tr>
		<tr>
		  <td colspan="3" valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">This is an automated response, please do not reply!</td>
  </tr>
		<tr>
		  <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:normal;">&nbsp;</td>
  </tr>
		<tr>
		  <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">&nbsp;</td>
		  <td>&nbsp;</td>
		<td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:normal;">&nbsp;</td>
		</tr>
		</table>';
       		
	
		mail($to, $subject, $message, $headers);
		
			$headers1  = 'MIME-Version: 1.0' . "\r\n";
		$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers1 .= 'From: Nanochipsolutions <inof@nanochipsolutions.com>' . "\r\n";     
		$to1=$_REQUEST[txtEmail];
		$subject1='Thanks for creating a New Job';
		$message1='<table width="100%" border="0" cellspacing="3" cellpadding="3">
		<tr>
		  <td width="19%"><a href="http://nanochipsolutions.com/"><img src="http://nanochipsolutions.com/images/Nanologo.jpg"  border="0"/></a></td>
		  <td width="2%">&nbsp;</td>
		  <td width="79%">&nbsp;</td>
  </tr>
		<tr>
		  <td colspan="3">&nbsp;</td>
  </tr>
		<tr>
		  <td colspan="3">Hi '.$_REQUEST[txtName].',</td>
  </tr>
		<tr>
		  <td colspan="3">&nbsp;</td>
  </tr>
		<tr>
		  <td colspan="3">Thanks for posting a job, this job posting is being process. We will contact you  with the resumes matching the job description at the earliest and intimate them  with an email.</td>
  </tr>
		
		<tr>
		  <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:normal;">&nbsp;</td>
  </tr>
		<tr>
		  <td colspan="3" valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">Thank you,</td>
  </tr>
		<tr>
		  <td colspan="3" valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">Nanochip Solutions Team </td>
  </tr>
		<tr>
		  <td colspan="3" valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">This is an automated response, please do not reply!</td>
  </tr>
		<tr>
		  <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:normal;">&nbsp;</td>
  </tr>
		<tr>
		  <td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:Bold;">&nbsp;</td>
		  <td>&nbsp;</td>
		<td valign="top" style="font-family:"Arial Black", Gadget, sans-serif;
		font-weight:normal;">&nbsp;</td>
		</tr>
		</table>';
       		
	
		mail($to1, $subject1, $message1, $headers1);
		
		
		echo "<script>document.location.href='jobposting_form.php?msg=1'</script>";
		}
	
	
	if(isset($_POST['jobUpdate']))
	{
		/*$chkbrnch=implode(",",$_POST[chkBranch]);
		$chkDomine=implode(",",$_POST[chDomine]);
		$query_jobposting=" update $jobposting_table set 
													r_id						='".$ch->checkFields($_SESSION[r_id])."',
													jp_company					='".$ch->checkFields($_POST[txtCompany])."',
													jp_address					='".$ch->checkFields($_POST[txtAddress])."',
													jp_name						='".$ch->checkFields($_POST[txtName])."',
													jp_designation				='".$ch->checkFields($_POST[txtDesignation])."',
													jp_telephone				='".$ch->checkFields($_POST[txtTelephone])."',
													jp_mobile					='".$ch->checkFields($_POST[txtMobile])."',
													jp_email					='".$ch->checkFields($_POST[txtEmail])."',
													jp_description				='".$ch->checkFields($_POST[txtJobDescrp])."',
													jp_job_title				='".$ch->checkFields($_POST[txtJobTitle])."',
													jp_be						='".$ch->checkFields($_POST[chkBE])."',
													jp_me						='".$ch->checkFields($_POST[chkMe])."',
													jp_branch					='".$ch->checkFields($chkbrnch)."',
													jp_sslc						='".$ch->checkFields($_POST[chkSSLC])."',
													jp_sslc_cutoff				='".$ch->checkFields($_POST[txtSSLC])."',
													jp_puc						='".$ch->checkFields($_POST[chkPUC])."',
													jp_puc_cutoff				='".$ch->checkFields($_POST[txtPUC])."',
													jp_degree					='".$ch->checkFields($_POST[chkDEGREE])."',
													jp_degree_cutoff			='".$ch->checkFields($_POST[txtDegree])."',
													jp_pg						='".$ch->checkFields($_POST[chkPG])."',
													jp_pg_cutoff				='".$ch->checkFields($_POST[txtPG])."',
													jp_backlogs					='".$ch->checkFields($_POST[rdBacklogs])."',
													jp_backlogs_year			='".$ch->checkFields($_POST[rdBacklogYear])."',
													jp_hire_freshers			='".$ch->checkFields($_POST[chFresher])."',
													jp_hire_experienc			='".$ch->checkFields($_POST[chExp])."',
													jp_candidates_quarterly		='".$ch->checkFields($_POST[txtQuarterly])."',
													jp_candidates_annualy		='".$ch->checkFields($_POST[txtAnually])."',
													jp_domain					='".$ch->checkFields($chkDomine)."',
													jp_other_domain				='".$ch->checkFields($_POST[txtOther])."',
													jp_written_apptitude		='".$ch->checkFields($_POST[chApp])."',
													jp_written_technical		='".$ch->checkFields($_POST[chWTech])."',
													jp_technical				='".$ch->checkFields($_POST[chTech])."',
													jp_hr						='".$ch->checkFields($_POST[chHR])."',
													jp_written_general			='".$ch->checkFields($_POST[chGW])."',
													jp_written_apptitude_marks	='".$ch->checkFields($_POST[txtDurnApp])."',
													jp_written_technical_marks	='".$ch->checkFields($_POST[txtWTec])."',
													jp_technical_marks			='".$ch->checkFields($_POST[txtTech])."',
													jp_hr_marks					='".$ch->checkFields($_POST[txtDurHr])."',
													jp_written_contents_marks	='".$ch->checkFields($_POST[txtDurGenral])."',
													jp_skills					='".$ch->checkFields($_POST[txtSpeciSkills])."',
													jp_suggested_read			='".$ch->checkFields($_POST[txtReading])."',
													jp_venue					='".$ch->checkFields($_POST[txtVenue])."',
													jp_our_campus				='".$ch->checkFields($_POST[rdOur])."',
													jp_intership				='".$ch->checkFields($_POST[rdPositions])."',
													jp_intership_duration		='".$ch->checkFields($_POST[rdDuration])."',
													jp_intership_placement		='".$ch->checkFields($_POST[rdAssuared])."',
													jp_regular_positions		='".$ch->checkFields($_POST[rdHiring])."',
													jp_agreement				='".$ch->checkFields($_POST[rdBond])."',
													jp_modified_date			='".$ch->checkFields(mktime())."' where jp_id='".$_REQUEST[jp_id]."'";
													
										
												   $db->insertRecord($query_jobposting);
													echo "<script>document.location.href='jobposting_form.php?msg=2'</script>";*/
	}


if($_REQUEST[action]=='delete' && is_numeric($_REQUEST[jp_id])!='')
{
$delete_query="delete from $jobposting_table where jp_id='".$_REQUEST[jp_id]."'";
$result=$db->deleteRecord($delete_query);
echo "<script>document.location.href='jobposting_form.php?msg=3'</script>";
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
<div style="float:left; width:978px; margin:0px; padding:0px;">

<div class="main_content">

        <div class="candidate_inner">
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
 <div  style="float:left;background-image:url(images/recruitmidbg.png);background-repeat:repeat-x; width:968px;height:8px;"></div>
 <div class="recruitrightbg"></div>
 </div>
 <? if($_REQUEST[action]=='addJobinfo' || $_REQUEST[action]=='editJobinfo') { 
	  $edit_job_query = "SELECT * FROM $jobposting_table where jp_id ='".$_REQUEST[jp_id]."'";  


      $job_edit = $db->getResults($edit_job_query);
  foreach($job_edit as $jp_edit){}
  ?>
<table width="100%" cellspacing="0" cellpadding="0" style="border-left:1px solid #736f6f; border-right:1px solid #736f6f; padding-left:10px; background-color:#f3e1e1;">   
    <form action="" method="post" name="jobForm" onSubmit="return job_details_validation();">
    <tr>
      <td  class="strong" style="padding:0px;"><h3 align="left" style="color:#114981;font-size:18px;font-weight:bold;margin:0px;padding-left:0px;"> Job Posting</h3></td>
      <td width="185"  class="heading" style="padding:0px;">&nbsp;</td>
      <td width="227"  class="heading" style="padding:0px;">&nbsp;</td>
      <td width="159"  class="heading" style="padding:0px;">&nbsp;</td>
      </tr>
	
    <tr>
       <td width="398" height="34" align="left"><span class="error">&nbsp;</span></td>
	   <td colspan="2" ><span class="error">
	     <? $msg=new messages();
		 // echo $msg->success($_REQUEST[success]); ?>
       </span></td>
      <td height="34" align="left"><span class="error"> * Indicates Required field &nbsp;&nbsp;&nbsp;</span></td>
      </tr>
      
      
      <tr>
        <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="3">
          
          <!--<tr>
            <td width="280"   class="text"> Company : </td>
            <td colspan="3"><?=$input->textBox('txtCompany',stripslashes($jp_edit->jp_company),'','style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
            <td width="54" class="error">*</td>
            <td width="406">&nbsp;</td>
          </tr>-->
		  <input type="hidden" name="txtCompany" value="<?=$_SESSION['comp']?>" />
          <tr>
            <td width="280"   class="text"> Contact person for this job profile : </td>
            <td colspan="3"><?=$input->textBox('txtName',stripslashes($jp_edit->jp_name),'','style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
            <td width="54" class="error">*</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="280"   class="text"> Designation : </td>
            <td colspan="3" ><?=$input->textBox('txtDesignation',stripslashes($jp_edit->jp_designation),'','style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
            <td width="54" class="error">*</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="280"   class="text"> Telephone : </td>
            <td colspan="3"><?=$input->textBox('txtTelephone',stripslashes($jp_edit->jp_telephone),'','style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
            <td width="54" class="error">*</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="280"   class="text"> Mobile : </td>
            <td colspan="3" ><?=$input->textBox('txtMobile',stripslashes($jp_edit->jp_mobile),'','style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
            <td width="54" class="error">*</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="280"   class="text"> Email : </td>
            <td colspan="3" ><?=$input->textBox('txtEmail',stripslashes($jp_edit->jp_email),'','style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
            <td width="54" class="error">*</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="280" height="25"  class="text" valign="top"> Job Description/Specs : </td>
            <td colspan="3"><?=$input->textArea('txtJobDescrp',stripslashes($jp_edit->jp_description),'text','style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x; resize:none;"','');?></td>
            <td width="54" class="error">*</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="280"   class="text"> Job Title/Designation : </td>
            <td colspan="3"><?=$input->textBox('txtJobTitle',stripslashes($jp_edit->jp_job_title),'','style="width:250px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
            <td width="54" class="error">*</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td   class="text">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
            <td class="error">&nbsp;</td>
          </tr>
          <tr>
            <td width="280"   class="text">Minimum Qualification :</td>
            <td colspan="3"><input type="checkbox" name="chkBE" id="chkBE" value="1" <?=$jp_edit->jp_be==1?'checked':'';?>/>
                <span> BE/B.Tech</span></td>
            <td>&nbsp;</td>
            <td ><input type="checkbox" name="chkMe" id="chkMe" value="1" <?=$jp_edit->jp_me==1?'checked':'';?>/>
                <span> ME/M.Tech</span></td>
          </tr>
          <tr>
            <td width="280"   class="text">Specify The  Discipline :</td>
            <? $branch_array=explode(",",$jp_edit->jp_branch);?>
            <td colspan="3"><input type="checkbox" name="chkBranch[]" id="chkBranch" value="1" <?=in_array('1',$branch_array)?'checked':'';?>/>
                <span> Electronics & Communication Engineering </span></td>
            <td>&nbsp;</td>
            <td><input type="checkbox" name="chkBranch[]" id="chkBranch" value="2"<?=in_array('2',$branch_array)?'checked':'';?>/>
                <span> Telecommunication Engineering </span></td>
          </tr>
		   <tr>
            <td width="280"   class="text"></td>
            <? $branch_array=explode(",",$jp_edit->jp_branch);?>
            <td colspan="3"><input type="checkbox" name="chkBranch[]" id="chkBranch" value="3" <?=in_array('3',$branch_array)?'checked':'';?>/>
                <span> Electrical & Electronics Engineering </span></td>
            <td>&nbsp;</td>
            <td><input type="checkbox" name="chkBranch[]" id="chkBranch" value="4"<?=in_array('4',$branch_array)?'checked':'';?>/>
                <span> Instrumentation Technology</span></td>
          </tr>
		   <tr>
            <td width="280"   class="text"></td>
            <? $branch_array=explode(",",$jp_edit->jp_branch);?>
            <td colspan="3"><input type="checkbox" name="chkBranch[]" id="chkBranch" value="5" <?=in_array('5',$branch_array)?'checked':'';?>/>
                <span> Computer Science Engineering </span></td>
            <td>&nbsp;</td>
            <td><input type="checkbox" name="chkBranch[]" id="chkBranch" value="6" <?=in_array('6',$branch_array)?'checked':'';?>/>
                <span> Information Science</span></td>
          </tr>
        </table></td>
      </tr>


<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr><td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="3" class="recruit_table">   <tr>  
    <td height="25"  class="jobhd_text"> <b>Marks Required :</b> </td>
	<td height="25" align="center" colspan="3" class="text">&nbsp;</td>
	<td height="25"  align="center" class="jobhd_text"><div align="left"><b>Cut-Off :</b></div></td>
	
    </tr>
	
	<tr>
	  <td width="264"   class="text">&nbsp;  </td>
	<td colspan="3"><input type="checkbox" name="chkSSLC" id="chkSSLC" value="1" <?=$jp_edit->jp_sslc==1?'checked':'';?>/><span> SSLC</span></td>
	<td ><span class="error">
	  <?=$input->textBox('txtSSLC',stripslashes($jp_edit->jp_sslc_cutoff),'','style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?>
	</span></td>
	</tr>

	<tr>
	  <td width="264"   class="text">&nbsp;  </td>
	<td colspan="3"><input type="checkbox" name="chkPUC" id="chkPUC" value="1" <?=$jp_edit->jp_puc==1?'checked':'';?>/><span> PUC</span></td>
	<td ><span class="error">
	  <?=$input->textBox('txtPUC',stripslashes($jp_edit->jp_puc_cutoff),'','style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?>
	</span></td>
	</tr>
<tr>
	  <td width="264"   class="text">&nbsp;  </td>
	<td colspan="3"><input type="checkbox" name="chkDEGREE" id="chkDEGREE" value="1" <?=$jp_edit->jp_degree==1?'checked':'';?>/><span> DEGREE</span></td>
	<td ><span class="error">
	  <?=$input->textBox('txtDegree',stripslashes($jp_edit->jp_degree_cutoff),'','style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?>
	</span></td>
	</tr>
     <tr>
	  <td width="264"   class="text">&nbsp;  </td>
	  <td colspan="3"><input type="checkbox" name="chkPG" id="chkPG" value="1" <?=$jp_edit->jp_pg==1?'checked':'';?>/><span> POST GRADUATION</span></td>
	  <td ><span class="error">
	    <?=$input->textBox('txtPG',stripslashes($jp_edit->jp_pg_cutoff),'','style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?>
	  </span></td>
	  </tr>
	
	 <tr>
	   <td   class="text">&nbsp;</td>
	   <td colspan="3">&nbsp;</td>
	   <td >&nbsp;</td>
	   </tr>
	 <tr>
	  <td width="264"   class="text">Is Subject Carry Forward Allowed  ? </td>
	<td colspan="3"><input type="radio" name="rdBacklogs" id="rdBacklogs" value="1" <?=$jp_edit->jp_backlogs==1?'checked':'';?>/><span> Yes</span></td>
	<td ><input type="radio" name="rdBacklogs" id="rdBacklogs" value="2" <?=$jp_edit->jp_backlogs==2?'checked':'';?>/>
	  <span> No</span></td>
	</tr>
	
	<tr>
	  <td width="264"   class="text">Is Loss Of 1 Year/ Semester Allowed ? </td>
	<td colspan="3"><input type="radio" name="rdBacklogYear" id="rdBacklogs" value="1" <?=$jp_edit->jp_backlogs_year==1?'checked':'';?>/>
	  <span> Yes</span></td>
	<td><input type="radio" name="rdBacklogYear" id="rdBacklogYear" value="2" <?=$jp_edit->jp_backlogs_year==2?'checked':'';?>/>
	  <span> No</span></td>
	</tr>
	
	<tr>
	  <td width="264"   class="text">Do You Hire ? </td>
	<td colspan="3"><input type="checkbox"  name="chFresher" id="chFresher" value="1" <?=$jp_edit->jp_hire_freshers==1?'checked':'';?>/><span> Fresher</span></td>
	<td><input type="checkbox" name="chExp" id="chExp" value="1" <?=$jp_edit->jp_hire_experienc==1?'checked':'';?>/>
	  <span> Experienced</span></td>
	</tr>
	
	<tr>
	  <td width="264" height="25"   class="text">&nbsp;  </td>
	<td colspan="3">&nbsp;</td>
	<td width="370" class="error">&nbsp;</td>
	</tr>
	
	<tr>  
    <td height="25"  class="text"> Number Of Candidates Required ? </td>
    <td height="25" colspan="3"  class="text">Quarterly :      
      <?=$input->textBox('txtQuarterly',stripslashes($jp_edit->jp_candidates_quarterly),'','style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
    <td height="25"   class="text">Annually:
      <?=$input->textBox('txtAnually',stripslashes($jp_edit->jp_candidates_annualy),'','style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
    </tr></table></td></tr>
    
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    
    <tr>
	  <td   class="text" colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="3" class="recruit_table"><tr>  
    <td height="25"  class="jobhd_text" colspan="9"> <b>Domain Knowledge Required ?</b> </td>
	</tr>
	<tr>
	  <td width="33%" height="31"   class="text">
      
      <? $dommain_array=explode(",",$jp_edit->jp_domain);?>
      <input type="checkbox"  name="chDomine[]" id="chDomine" value="DDC"  <?=in_array('DDC',$dommain_array)?'checked':'';?>/>
	     <span>Digital Design Concepts</span> </td>
	  <td width="25%"><input type="checkbox"  name="chDomine[]" id="chDomine" value="FA" <?=in_array('FA',$dommain_array)?'checked':'';?>
	    />
	    <span>FPGA Architecture</span></td>
	  <td colspan="2"><input type="checkbox"  name="chDomine[]" id="chDomine" value="FDF" <?=in_array('FDF',$dommain_array)?'checked':'';?>
	    />
	    <span>FPGA Design Flow</span></td>
	  <td width="22%" ><input type="checkbox"  name="chDomine[]" id="chDomine" value="VRC" <?=in_array('VRC',$dommain_array)?'checked':'';?>
	    />
	    <span>VHDL/ Verilog RTL Coding</span></td>
	  </tr>
	<tr>
	  <td height="25"   class="text"><input type="checkbox"  name="chDomine[]" id="chDomine" value="VSV" <?=in_array('VSV',$dommain_array)?'checked':'';?>
	    />
	    <span>Verification using SV</span> </td>
	  <td><input type="checkbox"  name="chDomine[]" id="chDomine" value="STA" <?=in_array('STA',$dommain_array)?'checked':'';?>
	    />
	    <span>Static timing analysis</span></td>
	  <td colspan="2"><input type="checkbox"  name="chDomine[]" id="chDomine" value="DS" <?=in_array('DS',$dommain_array)?'checked':'';?>
	    />
	    <span>Design Synthesis</span></td>
	  <td ><input type="checkbox"  name="chDomine[]" id="chDomine" value="PD" <?=in_array('PD',$dommain_array)?'checked':'';?>
	    />
	    <span>Physical Design</span></td>
	  </tr>
	<tr>
	  <td height="25"   class="text"><input type="checkbox"  name="chDomine[]" id="chDomine" value="PVPE" <?=in_array('PVPE',$dommain_array)?'checked':'';?>
	    />
	    <span>Physical Verification & Parasitic Extraction</span> </td>
	  <td><input type="checkbox"  name="chDomine[]" id="chDomine" value="PMA" <?=in_array('PMA',$dommain_array)?'checked':'';?>
	    />
	    <span>Tape out & MASKCAD</span></td>
	  <td colspan="2"><input type="checkbox"  name="chDomine[]" id="chDomine" value="ASIC" <?=in_array('ASIC',$dommain_array)?'checked':'';?>
	    />
	    <span>ASIC Design Flow</span></td>
	  <td ><input type="checkbox"  name="chDomine[]" id="chDomine" value="SUP" <?=in_array('SUP',$dommain_array)?'checked':'';?>
	    />
	    <span>Scripting using Perl</span></td>
	  </tr>
	<tr>
	  <td   class="text"><input type="checkbox"  name="chDomine[]" id="chDomine" value="FL" <?=in_array('FL',$dommain_array)?'checked':'';?>
	    />
	    <span>Fundamentals of Linux</span> </td>
	  <td colspan="4"><input type="checkbox"  name="chDomine[]" id="chDomine" value="OT" <?=in_array('OT',$dommain_array)?'checked':'';?>
	    />
	    <span>Others (Please Specify in below box):
	    <?=$input->textBox('txtOther',stripslashes($jp_edit->jp_other_domain),'','style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?>
	    </span></td>
	  </tr> </table> </td>
	  </tr>
      
      <tr>
      <td   class="text">&nbsp;</td>
     <td   class="text">&nbsp;</td>
     <td   class="text">&nbsp;</td>
      </tr>
      
    <tr>
	  <td   class="text" colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="3" class="recruit_table"><tr>
     <td  class="jobhd_text"><b>Please  Specify Selection Procedure: </b>  </td>
     <td width="154"   class="text">&nbsp;</td>
     <td   class="text">&nbsp;</td>
     <td   class="text">&nbsp;</td>
     <td   class="text">&nbsp;</td>
     </tr>
	 
   
	<tr>
     <td class="jobhd_text"><b>Type of Test: </b>  </td>
	 <td height="25" colspan="3" align="center"  class="text">&nbsp;</td>
	<td height="25" class="jobhd_text"><b>Duration(HRS)</b>  </td>
	</tr>
	
	<tr>
	  <td width="321"   class="text">&nbsp;  </td>
	<td colspan="3"><input type="checkbox"  name="chApp" id="chApp" value="1" <?=$jp_edit->jp_written_apptitude==1?'checked':'';?>/><span> Written Test(Aptitude)</span></td>
	<td width="329" class="error"><?=$input->textBox('txtDurnApp',stripslashes($jp_edit->jp_written_apptitude_marks),'','style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
	</tr>

	<tr>
	  <td width="321"   class="text">&nbsp;  </td>
	<td colspan="3"><input type="checkbox"  name="chWTech" id="chWTech" value="1" <?=$jp_edit->jp_written_technical==1?'checked':'';?>/>
	<span> Written Test(Technical)</span></td>
	<td width="329" class="error"><?=$input->textBox('txtWTec',stripslashes($jp_edit->jp_written_technical_marks),'','style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
	</tr>
<tr>
	  <td width="321"   class="text">&nbsp;  </td>
	<td colspan="3"><input type="checkbox"  name="chTech" id="chTech" value="1" <?=$jp_edit->jp_technical==1?'checked':'';?>/><span> Technical Interview</span></td>
	<td width="329" class="error"><?=$input->textBox('txtTech',stripslashes($jp_edit->jp_technical_marks),'','style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
	</tr>
     <tr>
	  <td width="321"   class="text">&nbsp;  </td>
	  <td colspan="3"><input type="checkbox"  name="chHR" id="chHR" value="1" <?=$jp_edit->jp_hr==1?'checked':'';?> />
	  <span> General HR Interview</span></td>
	  <td width="329" class="error"><?=$input->textBox('txtDurHr',stripslashes($jp_edit->jp_hr_marks),'','style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
	  </tr>
	
	<tr>
	  <td width="321"   class="text">&nbsp;  </td>
	  <td colspan="3"><input type="checkbox"  name="chGW" id="chGW" value="1" <?=$jp_edit->jp_written_general==1?'checked':'';?> />
	  <span> General Contents Of Written Test(Technical) </span></td>
	  <td width="329" class="error"><?=$input->textBox('txtDurGenral',stripslashes($jp_edit->jp_written_contents_marks),'','style="width:50px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x;"','');?></td>
	  </tr>
	
    <tr>
      <td height="25"  class="text">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td class="error">&nbsp;</td>
      </tr>
    <tr>  
<td width="321" height="25" valign="top" class="text">Any Specified Skill Area Of Test  : </td>
<td colspan="3"><?=$input->textArea('txtSpeciSkills',stripslashes($jp_edit->jp_skills),'text','style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x; resize:none;"','');?></td>
<td width="329" class="error">&nbsp;</td>
</tr>
	
	<tr>  
<td width="321" height="25" valign="top" class="text">Suggested Reading if Any  : </td>
<td colspan="3"><?=$input->textArea('txtReading',stripslashes($jp_edit->jp_suggested_read),'text','style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x; resize:none;"','');?></td>
<td width="329" class="error">&nbsp;</td>
</tr>
	
	<tr>  
<td width="321" height="25" valign="top" class="text">Venue/Location For Test : </td>
<td colspan="3"><?=$input->textArea('txtVenue',stripslashes($jp_edit->jp_venue),'text','style="width:250px; height:70px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x; resize:none;"','');?></td>
<td width="329" class="error">&nbsp;</td>
</tr>

<tr>  <td height="25"  ><span class="text">Can Hold Written Test/Interviews At Our Campus ?</span></td>
    <td height="25"  ><span class="text">
      <input type="radio" name="rdOur" id="rdOur" value="1"  <?=$jp_edit->jp_our_campus==1?'checked':'';?>/>
      <span> Yes</span></span></td>
    <td width="143" height="25"  class="text">  <input type="radio" name="rdOur" id="rdOur" value="2"  <?=$jp_edit->jp_our_campus==2?'checked':'';?>/>
      <span> No</span></td>
    <td width="1"  class="text">&nbsp;</td>
    <td height="25"  class="text">&nbsp;</td>
    </tr>
 <tr>
   <td height="25"  class="text" colspan="5">&nbsp;</td>
   </tr>
 <tr>  
    <td height="25"  class="text"> Is The Hiring For Internship Positions ? </td>
    <td height="25"  class="text">  <input type="radio" name="rdPositions" id="rdPositions" value="1"  <?=$jp_edit->jp_intership==1?'checked':'';?>/>
      <span> Yes</span></td>
    <td height="25" colspan="2"  class="text">  <input type="radio" name="rdPositions" id="rdPositions" value="2"  <?=$jp_edit->jp_intership==2?'checked':'';?>/>
      <span> No</span></td>
    <td height="25"  class="text">&nbsp;</td>
    </tr>
	
	<tr>
	  <td width="321"   class="text">&nbsp;  </td>
	<td colspan="3">&nbsp;</td>
	<td width="329" class="error">&nbsp;</td>
	</tr>
 
	  <tr>  
    <td height="25"  class="text"> What Is The Duration Of Internship : </td>
	<td height="25" align="center"  class="text"><div align="left">
	  <input type="radio" name="rdDuration" id="rdDuration" value="1"  <?=$jp_edit->jp_intership_duration==1?'checked':'';?>/>
	  <span> 3 Months</span></div></td>
	<td height="25" colspan="2" align="center"  class="text"><div align="left">
	 <input type="radio" name="rdDuration" id="rdDuration" value="2"  <?=$jp_edit->jp_intership_duration==2?'checked':'';?>/>
	  <span> 6 Months</span></div></td>
	<td  ><input type="radio" name="rdDuration" id="rdDuration" value="3"  <?=$jp_edit->jp_intership_duration==3?'checked':'';?>/>
      <span> 1 Year</span></td>
	  </tr>
	
	<tr>
	  <td   class="text">&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td class="error">&nbsp;</td>
	  </tr>
	<tr>
	  <td width="321"   class="text">Are Placement Assured After Internship? </td>
	<td> <input type="radio" name="rdAssuared" id="rdAssuared" value="1"  <?=$jp_edit->jp_intership_placement==1?'checked':'';?>/><span> Yes</span></td>
	<td> <input type="radio" name="rdAssuared" id="rdAssuared" value="2"  <?=$jp_edit->jp_intership_placement==2?'checked':'';?>/>
	  <span> No</span></td>
	<td>&nbsp;</td>
	<td width="329" class="error">&nbsp;</td>
	</tr>
	
	<tr>
	  <td width="321"   class="text">&nbsp;  </td>
	<td colspan="3">&nbsp;</td>
	<td width="329" class="error">&nbsp;</td>
	</tr>
	
	 <tr>  
    <td height="25"  class="text"> Is The Hiring For Regular Positions?  </td>        
    <td height="25"  class="text"><input type="radio" name="rdHiring" id="rdHiring" value="1"  <?=$jp_edit->jp_regular_positions==1?'checked':'';?>/>
      <span> Yes</span></td>
    <td height="25"  class="text"><input type="radio" name="rdHiring" id="rdHiring" value="2"  <?=$jp_edit->jp_regular_positions==2?'checked':'';?>/>
      <span> No</span></td>
    <td height="25"  class="text">&nbsp;</td>
    <td height="25"  class="text">&nbsp;</td>
    </tr>
	
	<tr>
	  <td width="321"   class="text">&nbsp;  </td>
	<td colspan="3">&nbsp;</td>
	<td width="329" class="error">&nbsp;</td>
	</tr>
	
	 <tr>  
    <td height="25"  class="text"> Is There Any Service Agreement Bond?  </td>  
    <td height="25"  class="text"><input type="radio" name="rdBond" id="rdBond" value="1"  <?=$jp_edit->jp_agreement==1?'checked':'';?>/>
      <span> Yes</span></td>
    <td height="25"  class="text"><input type="radio" name="rdBond" id="rdBond" value="2"  <?=$jp_edit->jp_agreement==2?'checked':'';?>/>
      <span> No</span></td>
    <td height="25"  class="text">&nbsp;</td>
    <td height="25"  class="text">&nbsp;</td>
    </tr>          

<tr>
    <td width="321" height="24"  class="text">&nbsp;</td>
    <td  height="24" colspan="4">&nbsp;</td>
</tr>
  </table></td>
	  </tr>
      
      <tr>

    <td  height="19" width="398">&nbsp;</td> 
    
    <td  height="19" colspan="4">
    
    <? if($_REQUEST[action]=='editJobinfo')
       { ?>
        <input type="submit" name="jobUpdate" value="" style="background-image:url(images/updatebg_new.png); margin-top:0px; background-repeat:no-repeat; width:73px; height:23px; border:none;"/> <? }else {?>
	     <input type="submit" name="jobInsert" value="" style="background-image:url(images/submitbg_new.png); margin-top:0px; background-repeat:no-repeat; width:73px; height:23px; border:none;" />
         <?   }   ?>       </td></tr>
      </form>
      </table>

        
       
         <? 
   }
   else{
   $query_edu = "SELECT * FROM $jobposting_table where r_id='".$_SESSION[r_id]."'order by jp_id desc"; 
   
   $job_result=$db->getResults($query_edu);
   //echo $query_edu;
   ?>
      <table width="100%" cellspacing="0" cellpadding="0" style="border-left:1px solid #736f6f; border-right:1px solid #736f6f; padding-left:0px; background-color:#f3e1e1;">
      <tr>
     <td height="28" colspan="7"><h3 align="left" style="color:#114981;font-size:18px;font-weight:bold;margin:0px;padding-left:10px;">Job Postings</h3></td>
    </tr>
    
    <tr>
   
    <td height="19"  class="error" style="padding-bottom:10px; padding-left:10px;"><?=messaging($_REQUEST[msg])?></td>
    <td  class="error" style="padding-bottom:10px;">&nbsp;</td>
    <td colspan="7" align="right" style="padding-bottom:10px;"><a href="jobposting_form.php?action=addJobinfo" class="addlink"><img src="images/add_more.png" border="0" style="padding-right:10px;" /></a></td>
    </tr>
    
    <tr>
    
      <td width="22%"  class="slider" align="left" style="padding-left:10px;">Company</td>
    <td width="19%" class="slider" align="left">Contact Person </td>
    <td width="16%" class="slider" align="left">Posted Date </td>
    <td width="11%" class="slider" align="left">Expiry Date </td>
    <td width="11%" class="slider" align="center">View Assigned</td>
	<!--<td width="3%" class="slider" align="left">Edit</td>-->
    <td width="12%" class="slider" align="left" style="text-align:center;">Delete</td>
  </tr>
  <tr><td  style="border-bottom:1px solid #333; height:1px;" colspan="7">&nbsp;</td></tr>
  <?
 //echo "---".$job->jp_expdate."**".mktime();
   foreach($job_result as $job){  ?>
  
  <tr style="padding-top:10px;">
    
    <td height="15" style="padding-left:10px;"><?=stripslashes($job->jp_company)?></td>
    <td ><?=stripslashes($job->jp_name)?></td>
    <td><? echo date('d/M/Y',stripslashes($job->jp_created_date))?></td>
    <td><? 	if($job->jp_expdate!=''){
	    echo date(" d/M/Y ",stripslashes($job->jp_expdate));}?></td>
    <td align="center">
   <? //echo "select st_ids from rv_job_posting where jp_id ='".$job->jp_id."' and r_id='".$_SESSION[r_id]."'";
   $query=mysql_query(" select st_ids from rv_job_posting where jp_id ='".$job->jp_id."' and r_id='".$_SESSION[r_id]."'");
	 $fetch=mysql_fetch_assoc($query);
	 if(($fetch['st_ids'])!=='' && mktime()<=$job->jp_expdate ){ ?>
		 <div style="padding-top:6px;"><a class="link_green"href="rec_assigned_students.php?jp_id=<?=stripslashes($job->jp_id)?>"><img src="images/activeNew.png" border="0"></img></a></div></td> 
		 <? }	else if(mktime()>$job->jp_expdate && $job->jp_expdate!==''){
		 ?>
		  <div style="padding-top:6px;"><input type="image" src="images/expired.png"  /></div>
		 <? 
		 }else{
			 ?>
             
			 <div style="padding-top:6px;"><input type="image" src="images/beingprocessNew.png"  /></div>
			 <?
			 }
   ?></td> 
      
<!--<td><div align="left"><a href="jobposting_form.php?action=editJobinfo&jp_id=<?=stripslashes($job->jp_id)?>" style="text-decoration:none;"><img src="images/edit.png" title="Edit" onclick="return toedit();" border="0"/></a></div></td>-->
    <td><div align="center"><a href="jobposting_form.php?action=delete&jp_id=<?=stripslashes($job->jp_id)?>" style="text-decoration:none;"><img src="images/error.png" title="Delete" onClick="return  toDelete()" border="0"/></a></div></td>
  </tr>
      <tr><td  style="border-bottom:1px solid #333; height:1px;" colspan="7">&nbsp;</td></tr>
  <? }?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="7%">&nbsp;</td>
  </tr>

  <? }?>
      </table>
 <div class="dashboardtop_bg">
        <div class="recruitleftbtbg"></div>
        <div style="float:left;	background-image:url(images/recruitmidbtbg.png);background-repeat:repeat-x;width:968px;height:8px;"></div>
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