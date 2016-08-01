<? 
    include_once('db/dbconfig.php');
    include_once('admin_login_check.php');
    include_once('classes/dataBase.php');
    include_once('classes/checkInputFields.php');
    include_once('classes/checkingAuth.php');
    include_once('classes/inputFields.php');
    include_once('classes/messages.php');  
	   
	$m_id=$_GET['m_id'];
    $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
    $db->connectDB(); 
    $query = "SELECT * FROM $members_table where m_id='".$m_id."'"; 
 
    $members_result=$db->getResults($query);
    foreach($members_result as $members){}	
   
 $core_result=$db->getResults("SELECT * FROM $core_competecny_table where m_id='".$m_id."' order by cc_id desc");	  
 $core_count=count($core_result);
   $core_array=explode(",",$core_result[0]->cc_array);
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
</script>


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

<div class="main_container" style="width:900px; padding-left:35px;">
		
 			<table width="100%">
<tr>
<td  colspan="6" align="left"><span style="font-family:verdana,Geneva, sans-serif; font-weight:bold;font-size:18px;"><?=ucfirst($members->m_fname);?>&nbsp;<?=$members->m_lname;?></span><br/>
E-mail id : <?=$members->m_emailid;?><br />
<?=$members->m_phone;?></td>
</tr>

<tr><td colspan="6">&nbsp; </td></tr>

<tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#eee; height:30px;" colspan="6">Career Objective:</td>
</tr>
<tr><td colspan="6">&nbsp;  </td></tr>

<? $sql="SELECT * FROM $career_objective_table where m_id='".$m_id."'";
$co_result=$db->getResults($sql);
  foreach($co_result as $objective){	?>
<tr>
<td colspan="6"><?=$objective->co_objective;?></td>
</tr><? }?>
<!--<tr><td colspan="6">&nbsp; </td></tr>

<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>	-->
<tr><td colspan="6">&nbsp;</td></tr>
<tr>
<td colspan="6" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#eee; height:30px;"> Summary of qualification/Technical Skills:</td>
<tr><td colspan="6">&nbsp;</td></tr>

<tr>
<td colspan="6" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#eee; height:30px;"> Education <!--(Core Competency/Skill set)-->:</td>
</tr><tr><td colspan="6">&nbsp; </td></tr>
<!--
<tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;">Academic Qualifications:</td>
</tr>-->

<tr><td colspan="6"><table width="100%" border="0" cellpadding="0" cellspacing="3" >
<tr style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:12px; background-color:#eee; height:30px;">
                <td  width="290"><strong>Degree</strong></td>
	            <!--<td width="214" ><strong>Branch</strong></td>-->

    <td width="312" ><div align="center"><strong>Institute </strong></div></td>
	    
                
    <td width="249" ><div align="center"><strong>University</strong></div></td>
    <td width="193"><div align="center"><strong>Year of Passing</strong></div></td>
    <td width="150"><div align="center"><strong>Aggregate</strong></div></td>
  </tr>
       <!-- <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->
		
		
        <? $education_query="SELECT * FROM $education_table where m_id='".$m_id."'";
		 
$edu_result=$db->getResults($education_query);
  foreach($edu_result as $education){	?>


<tr><? if($education->cor_id=='0'){
if($education->qua_id==4){
$edu='12th Class';
}if($education->qua_id==5){
$edu='10th Class';
}
}else{
$cor_result=$db->getResults("SELECT * FROM $course_table where cor_id='$education->cor_id'");
$edu=stripslashes($cor_result[0]->cor_name);
}
	?>

                <td style="background-color:#E4E4E4;" ><?=$edu;?></td>
             
              <? 
			  if($education->branch_id!='0'){
		
$branch_result=$db->getResults("SELECT * FROM $branch_table where branch_id='$education->branch_id'");

$brnc=stripslashes($branch_result[0]->branch_name);
}else{

if($education->e_sylbus=='state'){
$brnc='State Sylabus';
}else if($education->e_sylbus=='cbsc'){
$brnc='CBSC';
}else{
$brnc='ICSC';
}
}
?>  
	           <!-- <td ><?=$brnc;?></td>-->
                <? if($education->qua_id==4 || $education->qua_id==5){
				$inst=stripslashes($education->e_other_institute);
             }else{
$inst_result=$db->getResults("SELECT * FROM $institutes where insti_id='$education->insti_id'");
	$inst=stripslashes($inst_result[0]->insti_name);
	}?>    
	        
	    <td class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center"><?=$inst;?> </div></td>
	    <? ?>
                
    <td width="249" class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center"><? $uni_result=$db->getResults("SELECT * FROM $universities_table where uni_id='$education->uni_id'");
	echo stripslashes($uni_result[0]->uni_name);?></div></td>
    <td width="193" class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center"><?=$education->e_year;?> </div></td>
    <? if($education->e_percentage =='Percentage'){ ?>
    <td width="150" class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center"><?=$education->e_agg_marks;?>&nbsp;%</div></td>
    <? }  ?>
	 <? if($education->e_percentage =='CGPA'){ ?>
    <td width="150" class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center"><?=$education->e_agg_marks;?>&nbsp;CGPA<?//=$education->e_percentage."&nbsp;";?>&nbsp;</div></td>
    <? }?>
	 <? if($education->e_school_percentage !=''){ ?>
    <td width="150" class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center"><?=$education->e_school_percentage;?>&nbsp;%<?//=$education->e_percentage."&nbsp;";?>&nbsp;</div></td>
    <? }?>
  </tr>
       <!-- <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>-->
        <? }?></table></td></tr>
     
<tr><td colspan="6">&nbsp;</td></tr>
<tr><td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#eee; height:30px;" colspan="6">Work Experience:</td></tr>

      <!--  <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->


<? $work_experience_query="SELECT * FROM $work_experience_table where m_id='".$m_id."'";
		 
$work_experience_result=$db->getResults($work_experience_query);
  foreach($work_experience_result as $work_experience){	
  		 $total_work_exp.=$work_experience->we_id.",";?>
  		 
		   <tr>  <td width="18%" align="left" class=""><strong>Designation</strong>:</td>
		   <td width="82%" colspan="5"><?=stripslashes($work_experience->we_designation);?></td>
		   </tr>
			  <tr>	<td  align="left" class="general-bodyBold"><strong>Organization</strong>:</td><td colspan="5"><?=stripslashes($work_experience->we_company);?></td></tr>
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5"><?php  $from_proj=explode('-',$work_experience->From_date);
		  echo  $month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];?>
	      to 
		      <?php  $to_proj=explode('-',$work_experience->To_date);
		  echo  $month_array[$to_proj[0]].'&nbsp;'.$to_proj[1];?></td></tr>
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>  

		 <? }?>
       <tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>
		    <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#eee; height:30px;" colspan="6">Projects:</td></tr>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->


<?  $work_exp_result=$db->getResults("select * from $work_projects_table where find_in_set(we_id,'$total_work_exp')"); 
	if(count($work_exp_result)!='0'){	 

  foreach($work_exp_result as $work_exp){	?>
              <tr>  <td align="left" class="general-bodyBold"><strong>Title</strong>:</td><td colspan="5"><?=$work_exp->wp_title;?></td></tr>
			<?php  if($work_exp->wp_from_date!='' || $work_exp->wp_to_date!=''){?>
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5"><?php
			  
			  $from_exp=explode('-',$work_exp->wp_from_date);
		  echo  $month_array[$from_exp[0]].'&nbsp;'.$from_exp[1];?>
	      to 
		      <?php  $to_exp=explode('-',$work_exp->wp_to_date);
		  echo  $month_array[$to_exp[0]].'&nbsp;'.$to_exp[1];?></td></tr><? }?>

	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Description</strong>:</td><td colspan="5" style="text-align:justify;"><?=stripslashes($work_exp->wp_description);?></td></tr>
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Tools Used </strong>:</td><td colspan="5"><?=stripslashes($work_exp->wp_tools);?></td></tr>
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Challenges</strong>:</td><td colspan="5"><?=stripslashes($work_exp->wp_challenges);?></td></tr>
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>   </tr>   <? }}else{?>
	         <tr><td  class="error" colspan="6" align="center"><strong>No Projects</strong></td></tr>	 
		<? }?> 
		 		 
         <tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>
         <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#eee; height:30px;" colspan="6">BE Projects:</td></tr>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->


<? $projects_query="SELECT * FROM $projects_table where m_id='".$m_id."'";
		 
$projects_result=$db->getResults($projects_query);
  foreach($projects_result as $projects){	?>
              <tr>  <td align="left" class="general-bodyBold"><strong>Title</strong>:</td><td colspan="5"><?=$projects->p_title;?></td></tr>
			  <tr>	<td  align="left" class="general-bodyBold"><strong>Organization</strong>:</td><td colspan="5"><?=$projects->p_company;?></td></tr>
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5"><?php 
			  if($projects->p_from_date!='NULL' || $projects->p_to_date!='NULL'){
			  $from_proj=explode('-',$projects->p_from_date);
		  echo  $month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];?>
	      to 
		      <?php  $to_proj=explode('-',$projects->p_to_date);
		  echo  $month_array[$to_proj[0]].'&nbsp;'.$to_proj[1];?><? }?></td></tr>

	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Description</strong>:</td><td colspan="5" style="text-align:justify;"><?=$projects->p_description;?></td></tr>
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Tools Used </strong>:</td><td colspan="5"><?=$projects->p_tools;?></td></tr>
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Challenges</strong>:</td><td colspan="5"><?=$projects->p_challenges;?></td></tr>
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>   </tr>   <? }?>

        <tr><td colspan="6">&nbsp;</td></tr>
<tr><td colspan="6">&nbsp;</td></tr>
<?    $query_achv = "SELECT * FROM $achievements_table where m_id='".$m_id."' order by ac_id desc"; 
      $achv_result=$db->getResults($query_achv);
	  $achv_count=count($achv_result);
	  if($achv_count!=0){?>
        <tr style="overflow: auto;">
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#eee; height:30px;" colspan="6">Achievements:</td>
</tr>

<? }?>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->

<tr><td colspan="6"><ul><? 
	    foreach($achv_result as $achivments){?> 
<li style="text-align:justify;" ><?=stripslashes($achivments->ac_title)?></li>

<? }?>
</ul></td></tr>

<tr><td colspan="6">&nbsp;</td></tr>
      <? if($core_count!=0 && $core_result[0]->cc_array!=''){?>  <tr style="overflow: auto;">
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#eee; height:30px;" colspan="6">Core Competency:</td>
</tr>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->

<tr><td colspan="6"><ul><?   
   

	   
		if(in_array('1',$core_array)){
		?> 
<li style="text-align:justify;" >Good understanding of fundamentals of Transistors and circuit theory</li>

<? }   
		if(in_array('2',$core_array)){
		?> 
<li style="text-align:justify;" >Good knowledge of Verilog RTL coding</li>

<? }   
		if(in_array('3',$core_array)){
		?> 
<li style="text-align:justify;" >Good knowledge of Digitial Design Concepts</li>

<? }   
		if(in_array('4',$core_array)){
		?> 
<li style="text-align:justify;" >Good exposure to technology by undergoing additional training in VLSI and/or Embedded</li>

<? }   
		if(in_array('5',$core_array)){
		?> 
<li style="text-align:justify;" >Implemented a VLSI and/or embedded project during my undergrad/post grad</li>

<? }   
		if(in_array('6',$core_array)){
		?> 
<li style="text-align:justify;" >Attended technology intensive courses conducted by industry experts on VLSI and Embedded domains</li>

<? }   
		if(in_array('7',$core_array)){
		?> 
<li style="text-align:justify;" >Excellent knowledge of IC Fabrication process</li>

<? }   
		if(in_array('8',$core_array)){
		?> 
<li style="text-align:justify;" >Good working knowledge of Linux, and C programming</li>

<? }   
		if(in_array('-1',$core_array)){
		?> 
<li style="text-align:justify;" ><?=stripslashes($core_result[0]->cc_other);?></li>

<? }  	?>
</ul></td></tr>

<? }?>
  <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#eee; height:30px;" colspan="6">Personal profile:</td>
</tr>
<!--<tr>
<td style="height: 1px;" colspan="5" bgcolor="#000000" ></td></tr>-->

 <tr>
<td colspan="6"><table width="100%" border="0" cellspacing="3" cellpadding="3">
   <tr>
    <td width="44%"><strong>Name</strong></td>
    <td width="56%">:<?=$members->m_fname;?>&nbsp;<?=$members->m_lname;?></td>
  </tr>
 
  <tr>
    <td width="44%"><strong>Date of Birth</strong></td>
    <td width="56%">:<?=$members->m_day;?>/<?=$members->m_month;?>/<?=$members->m_year;?></td>
  </tr>
    <tr>
    <td width="44%"><strong>Address</strong></td>
    <td width="56%">:<?=$members->m_address;?>&nbsp;,<?=$members->m_city;?>-<?=$members->m_pincode;?></td>
  </tr>
  <?php if($members->m_father_name != ''){ ?>
  <tr>
    <td width="44%"><strong>Father Name</strong></td>
    <td width="56%">:<?=$members->m_father_name;?></td>
  </tr>
  <?php } ?>
 <tr>
    <td><strong>Nationality</strong></td>
    <td width="56%">:<?=$members->m_nationality;?></td>
  </tr>
  <tr>
    <td><strong>Sex</strong></td>
    <td>:<? if($members->m_gender=='male') echo "Male";else echo "Female";?></td>
  </tr>
   <tr>
    <td width="44%"><strong>Marital Status</strong></td>
    <td width="56%">:<?=$members->m_martial_status;?></td>
  </tr>
  
  <tr>
    <td><strong>Languages known </strong></td>
    <td width="56%">:<?=$members->m_languages;?></td>
  </tr>
  <?php if($members->m_hobbies != ''){ ?>
   <tr>
    <td><strong>Hobbies </strong></td>
    <td width="56%">:<?=$members->m_hobbies;?></td>
  </tr><?php } ?>
</table></td>
</tr>
<tr><td colspan="6">&nbsp;</td></tr>

</table>

	</div>
  </div>

</div><!--end of main_content-->

    
   
<? include "includes/footer.php" ?>

</div> <!--end of main_div-->
</body>
</html>