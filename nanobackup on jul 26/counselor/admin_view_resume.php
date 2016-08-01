<? include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php'); 
  
  	   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   
    $query = "SELECT * FROM $members_table where m_id='".$_REQUEST[m_id]."'"; 
 
    $members_result=$db->getResults($query);
    foreach($members_result as $members){}	
   
 $core_result=$db->getResults("SELECT * FROM $core_competecny_table where m_id='".$_REQUEST[m_id]."' order by cc_id desc");	  
 $core_count=count($core_result);
   $core_array=explode(",",$core_result[0]->cc_array);
   //get qualifications
   function get_course($id)
   {
	   
       $qualresult=mysql_fetch_assoc(mysql_query("SELECT cor_name FROM rv_course where cor_id ='$id'"));
	   $fsf=$qualresult['cor_name']; 
	  
	   return $fsf;
   }
    function get_qualification($id)
   {
	   
       $qualresult=mysql_fetch_assoc(mysql_query("SELECT qua_code FROM rv_qualifications where qua_id='$id'"));
	   $fsf=$qualresult['qua_code']; 
	  
	   return $fsf;
   }
   
    function get_branch($id)
   {
	   
       $qualresult=mysql_fetch_assoc(mysql_query("SELECT * FROM rv_branch where branch_id='$id'"));
	   $fsf=$qualresult['branch_name']; 
	  
	   return $fsf;
   }
    function get_institute($id)
   {
	   
       $qualresult=mysql_fetch_assoc(mysql_query("SELECT * FROM rv_institutes where insti_id='$id'"));
	   $fsf=$qualresult['insti_name']; 
	  
	   return $fsf;
   }
    function get_university($id)
   {
	   
       $qualresult=mysql_fetch_assoc(mysql_query("SELECT * FROM rv_universities where uni_id ='$id'"));
	   $fsf=$qualresult['uni_name']; 
	  
	   return $fsf;
   }
 
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<meta name="keywords" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<title>Nanochip Solutions</title>
<link rel="stylesheet" href="../style.css" type="text/css" />
<link rel="stylesheet" href="../style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="../ddlevelsmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/prototype.js"></script>
<script type="text/javascript" src="../js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="../js/lightbox.js"></script>
 <script type="text/javascript" src="../lib/jquery.js"></script>
<script type='text/javascript' src='../lib/jquery.autocomplete.js'></script>
<script type='text/javascript' src='../lib/localdata.js'></script>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="../rv_main.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/job_portal.css" rel="stylesheet" type="text/css" />

  <link type="text/css" rel="stylesheet" href="../calender/dhtmlgoodies_calendar.css" media="screen"/></link>
<script src="../calender/dhtmlgoodies_calendar.js" type="text/javascript"></script>

<script src="../js/student_validation.js" type="text/javascript"></script>
<script src="../js/recruiter_validation.js" type="text/javascript"></script>
<script src="../js/ajax.js" type="text/javascript"></script>
	 
 <script type="text/javascript">
  
			function isalpha(str)
	{
 	var re = /[^a-zA-Z' ']/g
  	if (re.test(str)) return false;
 	return true;
	
	}			
		
	  	
			
		
    </script>
	<script type="text/javascript">
 function changeState(typeID)
{

	if(typeID!=99)
   {
	
	
	
	document.getElementById("selDiv").style.display='none';
	 
	document.getElementById("textDiv").style.display='block';
	
	} else 
	 {
		
	document.getElementById("selDiv").style.display='block';
	 
	document.getElementById("textDiv").style.display='none';
	
	 
	 }
	
	
}
</script>
 

</head>

<body>
<div class="main_div">
<? // include "includes/header.php" ?>
<!--<div class="main_banner">
<img src="../images/bannernanochip.jpg" width="980" height="200" border="0" />
</div>--><!--end of main_banner-->
<div class="main_content">


<div class="stmenuright_maincontent">

<!--<div class="rightimg_top">
<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Resume Builder</h3>
</div>
<div class="rightimg_right">
</div>
</div>--><!--end of rightimg_top-->
 <div class="rightinner_content_inner">
<div class="step-main-Div" >

        <?php /*?><div class="recruit_inner">
       <ul>
       <a href="personal_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Step 1</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
       <a href="educations_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Step 2</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
       <a href="academic_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Step 3</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
       <a href="work_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Step 4</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
       <li>
       <div class="nanohdleft"></div>
       <div class="nanohdmid"><a href="resume.php" style="text-decoration:none;"><img src="../images/resume_bgn.png" width="84" height="24" align="absmiddle" border="0" style=" margin-top:8px;" /></a></div>
       <div class="nanohdright"></div>
       </li>
       </ul>
      
     
       
<!--<div class="step-inner-Div">
<table width="100%"  align="center" cellpadding="4" border="0"  cellspacing="0"style="font-size:12px; text-align:center; color:#ffffff; font-family:Arial, Helvetica, sans-serif;">   
  <tr class="loginheaderclass">
  <td class="stepclass"><a href="personal_info.php">Step 1</a></td>
  <td class="stepstyle"><a href="educations_info.php">Step 2</a></td>
  <td class="stepstyle"><a href="inner_design3.php">Step 3</a></td>
  <td class="stepstyle"><a href="inner_design4.php">Step 4</a></td>
   <td class="stepstyle"><a href="inner_design5.php">Resume</a></td>
  </tr>
</table>
</div>-->
</div><?php */?>

<div class="step-inner-Div" style="border:1px solid #2D2D2D;" >
<br/>
<div class="step-sub-tabs">
<div class="innertab1_mid">Resume</div>
<div class="innertab1_right"></div>
</div>
<div class="step-sub-tabs" style="float:right;">
<div class="innertab1_left"></div>
<div class="innertab1_mid"> <a href="../createstudentword.php?m_id=<?=$members->m_id?>" style="color:#000; text-decoration:blink;">Download Resume</a></div>
</div>


<div style="float:left; width:723px; background-image:url(images/innertab_bg.png); background-position:bottom; background-repeat:repeat-x;">
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="float:left;">


<tr>
<td  colspan="6" align="left" style=" padding-left:10px; font-weight:bold; font-size:15px;"><span style="font-family:verdana,Geneva, sans-serif; font-weight:bold;font-size:18px; color: #114981;"><?=ucfirst($members->m_fname);?>&nbsp;<?=$members->m_lname;?></span><br/>
<span style="float:left;">E-mail id : <?=$members->m_emailid;?></span><span style="float:right"><? if($members->m_resume_id!='') {?>
Resume ID:&nbsp;&nbsp;<?=$members->m_resume_id; ?>&nbsp;&nbsp;
<? } ?></span><br />
Ph.No : <?=$members->m_phone; ?><span style="float:right;"></span></td>
</tr>



<tr><td colspan="6">&nbsp; </td></tr>
<tr><td colspan="6">&nbsp; </td></tr>
<? $sql="SELECT * FROM $career_objective_table where m_id='".$_REQUEST[m_id]."'";
$co_result_query=$db->getResults($sql);  foreach($co_result_query as $member_s){}
 // if(count($co_result_query)!=0){?>
<tr>
<td style="font-family:calibri; font-weight:bold; font-size:16px; background-color:#BEBE7C; height:26px; background-image:url(images/innertabmid.png); background-repeat:repeat-x; padding-left:10px;" colspan="6">Career Objective:</td>
</tr><br />
<tr >
<td colspan="6" align="left"  > 
<div style="float:left; padding:5px 10px 10px 10px; margin:5px 10px 10px 10px; width:600px; text-align:justify;"><?=stripslashes($member_s->co_objective)?></div>


</td>
</tr>

<? // }?>

 <? if($core_count!=0 && $core_result[0]->cc_array!=''){?>  <tr style="overflow: auto;">
<td style="font-family:calibri; font-weight:bold; font-size:16px; background-color:#BEBE7C; height:26px; background-image:url(images/innertabmid.png); background-repeat:repeat-x; padding-left:10px;"  colspan="6">Core Competency:</td>
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

<? } }  $othcore=explode("#",$core_result[0]->cc_other);
	
	if(count($othcore)!=0 && $core_result[0]->cc_other!=''){
	for($c=0;$c<count($othcore);$c++){
	
	if($othcore[$c]!=''){?>
<li style="text-align:justify;" ><?=stripslashes($othcore[$c])?></li>
	<? }}?>

</ul></td></tr>

<? }?>
<tr>
<!--<td colspan="6" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;"> Summary of Qualification/Technical Skills:</td>-->
<tr><td colspan="6">&nbsp;</td></tr>

<tr>
<td colspan="6" style="font-family:calibri; font-weight:bold; font-size:16px; background-color:#BEBE7C; height:26px; background-image:url(images/innertabmid.png); background-repeat:repeat-x; padding-left:10px;" > Education <!--(Core Competency/Skill set)-->:</td>
</tr><tr><td colspan="6">&nbsp; </td></tr>
<!--
<tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;">Academic Qualifications:</td>
</tr>-->

<tr><td colspan="6">




<table width="100%" border="0" cellpadding="5" cellspacing="1" >
<tr style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:12px; background-color:#cbcbcb; height:30px;">
<td  width="290" align="center"><strong>Degree</strong></td>
<td width="312" ><div align="center"><strong>Discipline </strong></div></td>
<td width="249" ><div align="center"><strong>Institute<br /><hr size="1"  width="100%" color="white">  University</strong></div></td>
<td width="193"><div align="center"><strong>Year of Passing</strong></div></td>
<td width="150"><div align="center"><strong>Aggregate</strong></div></td>
</tr>           

<?  
$qual_array=array(21,6,1,2,3,4,5);
for($i=0;$i<=count($qual_array);$i++)
{
$total_query=$db->getResults("SELECT * FROM rv_educational_details where m_id='".$_REQUEST[m_id]."' and qua_id='".$qual_array[$i]."'");
$edu_toal_count=count($total_query);
if($edu_toal_count!=='0')
{
	foreach($total_query as $alleducation)
	{
		?>
        <tr> 
        <td style="background-color:#E4E4E4;" align="center">
        <? 
		if(($alleducation->qua_id=='4') ||($alleducation->qua_id=='5'))
		{
		echo stripslashes(get_qualification($alleducation->qua_id));
		}
		echo stripslashes(get_course($alleducation->e_course));
		?>
         </td> 
           <td style="background-color:#E4E4E4;" align="center">
        <?	echo stripslashes(get_branch($alleducation->e_branch));?>
         </td> 
        <td style="background-color:#E4E4E4;" align="center">
         <? if($alleducation->qua_id==4 || $alleducation->qua_id==5)
	{ 
	echo stripslashes($alleducation->e_institute); ?>
    <hr size="1"  width="150%" color="white">
    <? 
	 echo stripslashes($alleducation->e_university); 
	 } 
	 else { 
	
		echo stripslashes($alleducation->e_institute);
		
	
	  if($alleducation->e_university=='-1'){ 
	echo '  <hr size="1"  width="150%" color="white">';
	echo stripslashes($alleducation->e_other_university);
	
	}
	else {
		     if(get_university($alleducation->e_university)=='')
			{ echo "";}else { ?> <hr size="1"  width="150%" color="white"> <? echo stripslashes(get_university($alleducation->e_university));	}
		}?>
 
    <? }?>
         </td> 
         
            <td style="background-color:#E4E4E4;" align="center">
        <? echo $alleducation->e_passout_year; ?>
		
         </td> 
         
            <td style="background-color:#E4E4E4;" align="center">
			
			
        <? 
		
		if($alleducation->e_percentage!=''){
		
		if($alleducation->e_percentage_type==1){
			echo stripslashes($alleducation->e_percentage).' %';
		}else{
		echo 'CGPA '.stripslashes($alleducation->e_percentage).'/10';}}?>
		
         </td> 
         </tr>
		 
		 <?
		
	}
}
}
?>

</table>
    
        
        
</td></tr>
 <tr><td colspan="6">&nbsp;</td></tr>  
          <tr>
<td style="font-family:calibri; font-weight:bold; font-size:16px; background-color:#BEBE7C; height:26px; background-image:url(images/innertabmid.png); background-repeat:repeat-x; padding-left:10px;"  colspan="6">Academic Projects:</td>
         </tr>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->


<? $projects_query="SELECT * FROM $projects_table where m_id='".$_REQUEST[m_id]."'";
		 
$projects_result=$db->getResults($projects_query);
  foreach($projects_result as $projects){	?>
  <tr>
		<td colspan="6"><table width="100%" border="0" cellspacing="3" cellpadding="3">
         <tr>
           <td width="26%" align="left" class="general-bodyBold"><strong>Title</strong>:</td>
           <td width="74%" colspan="5"><?=$projects->p_title;?></td>
         </tr>
              <tr>
                <td align="left" class="general-bodyBold"><strong>Role</strong>:</td><td colspan="5"><?=$projects->p_role;?></td></tr>
			  <tr>
			    <td  align="left" class="general-bodyBold"><strong>Organization</strong>:</td><td colspan="5"><?=$projects->p_company;?></td></tr>
	    	  <tr>
	    	    <td  align="left" class="general-bodyBold"><strong>Duration of Project in Months</strong>:</td>
	    	    <td colspan="5"><?php 
			  if($projects->p_duration!='NULL' || $projects->p_duration!=''){
			  echo $projects->p_duration;
			/*  $from_proj=explode('-',$projects->p_from_date);
		  echo  $month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];?>
	      to 
		      <?php  $to_proj=explode('-',$projects->p_to_date);
		  echo  $month_array[$to_proj[0]].'&nbsp;'.$to_proj[1];*/?><? }?></td></tr>

	  <tr>
	    <td  align="left" class="general-bodyBold" valign="top"><strong>Description</strong>:</td><td colspan="5" style="text-align:justify;"><?=$projects->p_description;?></td></tr>
	  <tr>
	    <td  align="left" class="general-bodyBold" valign="top"><strong>Tools Used </strong>:</td><td colspan="5"><?=$projects->p_tools;?></td></tr>
	  <tr>
	    <td  align="left" class="general-bodyBold" valign="top"><strong>Deliverable/Challenges Faced:</strong>:</td><td colspan="5"><?=$projects->p_challenges;?></td></tr>
        
        </table></td></tr>
  
             
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>   </tr>   <? }?>  
<tr><td colspan="6">&nbsp;</td></tr>
<tr><td style="font-family:calibri; font-weight:bold; font-size:16px; background-color:#BEBE7C; height:26px; background-image:url(images/innertabmid.png); background-repeat:repeat-x; padding-left:10px;" colspan="6">Work Experience:</td></tr>

      <!--  <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->


<?  $work_experience_query="SELECT * FROM $work_experience_table where m_id='".$_REQUEST[m_id]."'";
		 
$work_experience_result=$db->getResults($work_experience_query);
  foreach($work_experience_result as $work_experience){	
  	 $total_work_exp.=$work_experience->we_id.",";
		 ?>
  		<tr>
		<td colspan="6">
        <table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <td  align="left" class="general-bodyBold"><strong>Organization</strong>:</td><td colspan="5"><?=stripslashes($work_experience->we_company);?></td></tr>
			     <tr>
			       <td width="26%" align="left" class=""><strong>Designation</strong>:</td>
		   <td width="74%" colspan="5"><?=stripslashes($work_experience->we_designation);?></td>
		   </tr>
	    	  <tr>
	    	    <td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5"><?php  $from_proj=explode('-',$work_experience->we_from_date);
		  echo  $month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];?>
	      to 
		      <?php  $to_proj=explode('-',$work_experience->we_to_date);
		  echo  $month_array[$to_proj[0]].'&nbsp;'.$to_proj[1];?></td></tr>
        
        </table></td></tr>

         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>  

		 <? }?>
       <tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>
		 
		 <? 
		 //$work_exp_result=$db->getResults("select * from $work_projects_table where find_in_set(we_id,'$total_work_exp')"); 
		 $work_exp_result=$db->getResults("select * from $work_projects_table where m_id='".$_REQUEST[m_id]."'"); 
	if(count($work_exp_result)!='0'){	?>
		    <tr>
<td style="font-family:calibri; font-weight:bold; font-size:16px; background-color:#ccc; height:26px;  padding-left:10px;"  colspan="6">Projects:</td></tr>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->

        
<? 

  foreach($work_exp_result as $work_exp){	?>
  <tr>
		<td colspan="7">
        
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
         <tr>
                  
                <td width="25%" align="left" class="general-bodyBold"><strong>Company</strong>:</td><td width="74%" colspan="6">                
                <?
			
			    $query=mysql_query("select we_company from rv_work_experience where we_id='".$work_exp->wp_company."'");
				  $fetch=mysql_fetch_assoc($query);
				 echo $fetch['we_company'];
				?>
               </td></tr>
               <tr>
                 
                <td width="25%" align="left" class="general-bodyBold"><strong>Title</strong>:</td>
                <td width="74%" colspan="6"><?=$work_exp->wp_title;?></td></tr>
              <tr>
                <?php /*?><td align="left" class="general-bodyBold">&nbsp;</td>  
                <td align="left" class="general-bodyBold"><strong>Role</strong>:</td><td colspan="5"><?=$work_exp->wp_role;?></td></tr><?php */?>
			<?php  if($work_exp->wp_duration!=''){?>
	    	  <tr>
	    	    
	    	    <td  align="left" class="general-bodyBold"><strong>Duration of Project in Months</strong>:</td><td colspan="6"><?php
			  echo $work_exp->wp_duration;
			 /* $from_exp=explode('-',$work_exp->wp_from_date);
		  echo  $month_array[$from_exp[0]].'&nbsp;'.$from_exp[1];?>
	      to 
		      <?php  $to_exp=explode('-',$work_exp->wp_to_date);
		  echo  $month_array[$to_exp[0]].'&nbsp;'.$to_exp[1];*/?></td></tr><? }?>

	  <tr>
	    
	    <td  align="left" class="general-bodyBold" ><strong>Description</strong>:</td><td colspan="6" style="text-align:justify;"><?=stripslashes($work_exp->wp_description);?></td></tr>
	  <tr>
	    
	    <td  align="left" class="general-bodyBold" v><strong>Tools Used </strong>:</td><td colspan="6"><?=stripslashes($work_exp->wp_tools);?></td></tr>
	 <?php /*?> <tr>
	    <td  align="left" class="general-bodyBold" valign="top">&nbsp;</td>	
	    <td  align="left" class="general-bodyBold" valign="top"><strong>Deliverable/Challenges Faced:</strong>:</td><td colspan="5"><?=stripslashes($work_exp->wp_challenges);?></td></tr>
       <?php */?> 
                    
    
                    
                     </table> 
                   </td></tr>   
                    <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr> 
               <? }?>
	       
           
		   <? }?>      
		 		 
         <tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>

<!--
        <tr><td colspan="6">&nbsp;</td></tr>-->
<tr><td colspan="6">&nbsp;</td></tr>
<?    $query_achv = "SELECT * FROM $achievements_table where m_id='".$_REQUEST[m_id]."' order by ac_id desc"; 
      $achv_result=$db->getResults($query_achv);
	  $achv_count=count($achv_result);
	  if($achv_count!=0){?>
        <tr style="overflow: auto;">
<td style="font-family:calibri; font-weight:bold; font-size:16px; background-color:#BEBE7C; height:26px; background-image:url(images/innertabmid.png); background-repeat:repeat-x; padding-left:10px;"  colspan="6">Achievements:</td>
</tr>

<? }?>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->

<tr><td colspan="6"><ul><? 
	  
		$achiv_results=explode("#",$achv_result[0]->ac_description);
for($a=0;$a<count($achiv_results);$a++){
if($achiv_results[$a]!=''){
		
		?> 
<li style="text-align:justify;" ><?=stripslashes($achiv_results[$a])?></li>



<? }}?>
</ul></td></tr>

<tr><td colspan="6">&nbsp;</td></tr>
     
  <tr>
<td style="font-family:calibri; font-weight:bold; font-size:16px; background-color:#BEBE7C; height:26px; background-image:url(images/innertabmid.png); background-repeat:repeat-x; padding-left:10px;"  colspan="6">Personal Profile:</td>
</tr>
<!--<tr>
<td style="height: 1px;" colspan="5" bgcolor="#000000" ></td></tr>-->

 <tr>
<td colspan="6"><table width="100%" border="0" cellspacing="3" cellpadding="3">
   <tr>
     <td width="27%"><strong>Name</strong></td>
    <td width="72%">: <?=$members->m_fname;?>&nbsp;<?=$members->m_lname;?></td>
  </tr>
 
  <tr>
    <td width="27%"><strong>Date of Birth</strong></td>
    <td width="72%">: <?=$members->m_day;?>/<?=$members->m_month;?>/<?=$members->m_year;?></td>
  </tr>
    <tr>
      <td width="27%"><strong>Address</strong></td>
    <td width="72%">: <?=$members->m_address;?>&nbsp;,<?=$members->m_city;?>-<?=$members->m_pincode;?></td>
  </tr>
  <?php if($members->m_father_name != ''){ ?>
  <tr>
    <td width="27%"><strong>Father Name</strong></td>
    <td width="72%">: <?=$members->m_father_name;?></td>
  </tr>
  <?php } ?>
 
  <tr>
    <td><strong>Sex</strong></td>
    <td>: <? if($members->m_gender=='male') echo "Male";else echo "Female";?></td>
  </tr>
   <?php /*?><tr>
     <td width="27%"><strong>Marital Status</strong></td>
    <td width="72%">: <?=$members->m_martial_status;?></td>
  </tr><?php */?>
  
  <tr>
    <td><strong>Languages known </strong></td>
    <td width="72%"> : <?=$members->m_languages;?></td>
  </tr>
  <tr>
   <td><strong>Nationality</strong></td>
    <td width="72%">: <?=$members->m_nationality;?></td>
  </tr>
  <?php /* if($members->m_hobbies != ''){ ?>
   <tr>
     <td><strong>Hobbies </strong></td>
    <td width="72%">: <?=$members->m_hobbies;?></td>
  </tr><?php } */ ?>
</table></td>
</tr>
<tr><td colspan="6">&nbsp;</td></tr>

</table>
		</div>
</div>
</div>
</div>
</div><!--end of right_maincontent-->
<?php // include "stmenuleft_content.php"; ?>
</div><!--end of main_content-->

<? //include "../includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>