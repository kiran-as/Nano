<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
	    include_once('classes/checkingAuth.php');
   $check=new checkingAuth();
   $check->loginCheck();   

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
    $query = "SELECT * FROM $members_table where m_id='".$_SESSION[m_id]."'"; 
 
    $members_result=$db->getResults($query);
    foreach($members_result as $members){}	
   
 $core_result=$db->getResults("SELECT * FROM $core_competecny_table where m_id='".$_SESSION[m_id]."' order by cc_id desc");	  
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
<title>ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company</title>


		
		<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" /> 
		
		
		

 
 

</head>
<script type='text/javascript'>
function complete()
{
	window.location="http://nanochipsolutions.com/1_show_emp.php";
}
function skiptopersonalinfo()
{

	window.location="http://nanochipsolutions.com/1_personal_info.php";
}
</script>
<body>
<div class="main_div">
<?php include("includes/2_jobseekerheader.php"); ?>
<div class="main_banner">
<!--<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />-->
</div><!--end of main_banner-->
<div class="main_content">



<br>
<table width="100%" cellpadding="2" cellspacing="2" border="0">
<tr>
<td class="resumeviewinfo" width="75%">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td><img src="images/icon_information.png" align="absmiddle"></td>
<td><? if($members->m_resume_status !=1){?>A complete resume has a higher probability of being shortlisted for interviews.
 We suggest you to keep your resume updated and complete for a better chance of being selected. Please click here to <a href="personal_info.php">Edit Resume</a><? }else{?>A complete resume has a higher probability of being shortlisted for interviews. We suggest you to keep your resume updated and complete for a better chance of being selected.<? }?></td>
</tr></table>



</td>
<td width="25%" align="right"><a href="createstudentword.php?m_id=<?=$members->m_id?>"><img src="images/icon_download.png"></a></td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="resuemviewtableborder">


<tr>
<td  colspan="6" align="left" style=" padding-left:10px; font-weight:bold; font-size:15px;"><span style="font-family:verdana,Geneva, sans-serif; font-weight:bold;font-size:18px; color: #114981;"><?=ucfirst($members->m_fname);?>&nbsp;<?=$members->m_lname;?></span><br/>
<span style="float:left;">E-mail id : <?=$members->m_emailid;?></span><span style="float:right"><? if($members->m_resume_id!='') {?>
Resume ID:&nbsp;&nbsp;<?=$members->m_resume_id; ?>&nbsp;&nbsp;
<? } ?></span><br />
Ph.No : <?=$members->m_phone; ?><span style="float:right;"></span><span style="float:right" class="empfactor">Employability Factor :&nbsp;&nbsp;<?=employabilityFactor($_SESSION[m_id])?>&nbsp;&nbsp;</td>
</tr>



<tr><td colspan="6">&nbsp; </td></tr>
<tr><td colspan="6">&nbsp; </td></tr>
<? $sql="SELECT * FROM $career_objective_table where m_id='".$_SESSION[m_id]."'";
$co_result_query=$db->getResults($sql);  foreach($co_result_query as $member_s){}
 // if(count($co_result_query)!=0){?>
<tr>
<td  colspan="6" class="resumeviewheaders">Career Objective:</td>
</tr><br />
<tr >
<td colspan="6" align="left"  > 
<div style="float:left; padding:5px 10px 10px 10px; margin:5px 10px 10px 10px; width:600px; text-align:justify;"><?=stripslashes($member_s->co_objective)?></div>


</td>
</tr>

<? // }?>

 <? if($core_count!=0 && $core_result[0]->cc_array!=''){?>  <tr style="overflow: auto;">
<td   colspan="6" class="resumeviewheaders">Core Competency:</td>
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
<td colspan="6" class="resumeviewheaders"> Education :</td>
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
$total_query=$db->getResults("SELECT * FROM rv_educational_details where m_id='".$_SESSION[m_id]."' and qua_id='".$qual_array[$i]."'");
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
<td   colspan="6" class="resumeviewheaders">Academic Projects:</td>
         </tr>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->


<? $projects_query="SELECT * FROM $projects_table where m_id='".$_SESSION[m_id]."'";
		 
$projects_result=$db->getResults($projects_query);
  foreach($projects_result as $projects){	?>
  <tr>
		<td colspan="6"><table width="100%" border="0" cellspacing="3" cellpadding="3">
         <tr>
           <td width="26%" align="left" class="bold">Title:</td>
           <td width="74%"><?=$projects->p_title;?></td>
         </tr>
              <tr>
                <td align="left" class="bold">Role:</td>
				<td ><?=$projects->p_role;?></td></tr>
			  <tr>
			    <td  align="left" class="bold">Organization:</td>
				<td ><?=$projects->p_company;?></td></tr>
	    	  <tr>
	    	    <td  align="left" class="bold">Duration of Project in Months:</td>
	    	    <td ><?php 
			  if($projects->p_duration!='NULL' || $projects->p_duration!=''){
			  echo $projects->p_duration;
			/*  $from_proj=explode('-',$projects->p_from_date);
		  echo  $month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];?>
	      to 
		      <?php  $to_proj=explode('-',$projects->p_to_date);
		  echo  $month_array[$to_proj[0]].'&nbsp;'.$to_proj[1];*/?><? }?></td></tr>

	  <tr>
	    <td  align="left" class="bold" valign="top">
Description:</td><td style="text-align:justify;"><?=$projects->p_description;?></td></tr>
	  <tr>
	    <td  align="left" class="bold" valign="top">Tools Used:</td>
		<td><?=$projects->p_tools;?></td></tr>
	  <tr>
	    <td  align="left" class="bold" valign="top">Deliverable/Challenges Faced:</td>
		<td><?=$projects->p_challenges;?></td></tr>
        
        </table></td></tr>
  
             
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#cbdaef" ></td></tr>   </tr>   <? }?>  
<tr><td colspan="6">&nbsp;</td></tr>
<tr><td  colspan="6" class="resumeviewheaders">Work Experience:</td></tr>

      <!--  <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->


<?  $work_experience_query="SELECT * FROM $work_experience_table where m_id='".$_SESSION[m_id]."'";
		 
$work_experience_result=$db->getResults($work_experience_query);
  foreach($work_experience_result as $work_experience){	
  	 $total_work_exp.=$work_experience->we_id.",";
		 ?>
  		<tr>
		<td colspan="6">
        <table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <td  align="left" class="bold">Organization:</td><td colspan="5"><?=stripslashes($work_experience->we_company);?></td></tr>
			     <tr>
			       <td width="26%" align="left" class="bold">Designation:</td>
		   <td width="74%" colspan="5"><?=stripslashes($work_experience->we_designation);?></td>
		   </tr>
	    	  <tr>
	    	    <td  align="left" class="bold">Duration:</td><td colspan="5"><?php  $from_proj=explode('-',$work_experience->we_from_date);
		  echo  $month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];?>
	      to 
		      <?php  $to_proj=explode('-',$work_experience->we_to_date);
		  echo  $month_array[$to_proj[0]].'&nbsp;'.$to_proj[1];?></td></tr>
        
        </table></td></tr>

         <tr><td style="height: 1px;" colspan="6" bgcolor="#cbdaef" ></td></tr>  

		 <? }?>
       <tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>
		 
		 <? 
		 //$work_exp_result=$db->getResults("select * from $work_projects_table where find_in_set(we_id,'$total_work_exp')"); 
		 $work_exp_result=$db->getResults("select * from $work_projects_table where m_id='".$_SESSION[m_id]."'"); 
	if(count($work_exp_result)!='0'){	?>
		    <tr>
<td   colspan="6" class="resumeviewheaders">Projects:</td></tr>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->

        
<? 

  foreach($work_exp_result as $work_exp){	?>
  <tr>
		<td colspan="7">
        
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
         <tr>
                  
                <td width="25%" align="left" class="bold"><strong>Company</strong>:</td><td width="74%" colspan="6">                
                <?
			
			    $query=mysql_query("select we_company from rv_work_experience where we_id='".$work_exp->wp_company."'");
				  $fetch=mysql_fetch_assoc($query);
				 echo $fetch['we_company'];
				?>
               </td></tr>
               <tr>
                 
                <td width="25%" align="left" class="bold"><strong>Title</strong>:</td>
                <td width="74%" colspan="6"><?=$work_exp->wp_title;?></td></tr>
              <tr>
               
                <td align="left" class="bold"><strong>Role</strong>:</td><td colspan="5"><?=$work_exp->wp_role;?></td></tr>
			<?php  if($work_exp->wp_duration!=''){?>
	    	  <tr>
	    	    
	    	    <td  align="left" class="bold"><strong>Duration of Project in Months</strong>:</td><td colspan="6"><?php
			  echo $work_exp->wp_duration;
			 /* $from_exp=explode('-',$work_exp->wp_from_date);
		  echo  $month_array[$from_exp[0]].'&nbsp;'.$from_exp[1];?>
	      to 
		      <?php  $to_exp=explode('-',$work_exp->wp_to_date);
		  echo  $month_array[$to_exp[0]].'&nbsp;'.$to_exp[1];*/?></td></tr><? }?>

	          <tr>
	    
	    <td  align="left" class="bold" ><strong>Team Size</strong>:</td><td colspan="6" style="text-align:justify;"><?=stripslashes($work_exp->wp_team_size);?></td></tr>
	            <tr>
	    
	    <td  align="left" class="bold" ><strong>Description</strong>:</td><td colspan="6" style="text-align:justify;"><?=stripslashes($work_exp->wp_description);?></td></tr>
	  <tr>
	    
	    <td  align="left" class="bold" v><strong>Tools Used </strong>:</td><td colspan="6"><?=stripslashes($work_exp->wp_tools);?></td></tr>
	  <tr>
	   
	    <td  align="left" class="bold" valign="top"><strong>Deliverable/Challenges Faced:</strong>:</td><td colspan="5"><?=stripslashes($work_exp->wp_challenges);?></td></tr>
                     </table> 
                  </td></tr>   
                    <tr><td style="height: 1px;" colspan="6" bgcolor="#cbdaef" ></td></tr> 
               <? }?>
	       
           
		   <? }?>      
		 		 
         <tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>

<!--
        <tr><td colspan="6">&nbsp;</td></tr>-->
<tr><td colspan="6">&nbsp;</td></tr>
<?    $query_achv = "SELECT * FROM $achievements_table where m_id='".$_SESSION[m_id]."' order by ac_id desc"; 
      $achv_result=$db->getResults($query_achv);
	  $achv_count=count($achv_result);
	  if($achv_count!=0){?>
        <tr style="overflow: auto;">
<td   colspan="6" class="resumeviewheaders">Achievements:</td>
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
<td   colspan="6" class="resumeviewheaders">Personal Profile:</td>
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
<div>
<table border=0 width="100%">
<tr>
<td align="right">

   <input type="button" name="Submit" value="Submit" label="Submit" class="blueButton" onclick='complete();'/>  <input type="button" name="Cancel" value="Cancel" label="Cancel" class="grayButton" onclick='skiptopersonalinfo();'/></td>

  </tr>
  </table>
</div>
<? include "includes/footer.php" ?>
</div><!--end of right_maincontent-->
<!--end of main_content-->


</div>


</div><!--end of main_div-->
</body>
</html>