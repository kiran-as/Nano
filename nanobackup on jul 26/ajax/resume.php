<? 
    include_once('../db/dbconfig.php');
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
    $query = "SELECT * FROM $members_table where m_id='".$_SESSION[m_id]."'"; 
 
    $members_result=$db->getResults($query);
    foreach($members_result as $members){}	
   
 $core_result=$db->getResults("SELECT * FROM $core_competecny_table where m_id='".$_SESSION[m_id]."' order by cc_id desc");	  
 $core_count=count($core_result);
   $core_array=explode(",",$core_result[0]->cc_array);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resume View</title>
<style type="text/css">

</style>
</head>

<body>
<table width="100%">
<tr>
<td  colspan="6" align="left"><span style="font-family:verdana,Geneva, sans-serif; font-weight:bold;font-size:18px;"><?=ucfirst($members->m_fname);?>&nbsp;<?=$members->m_lname;?></span><br/>
E-mail id : <?=$members->m_emailid;?><br />
<?=$members->m_phone;?></td>
</tr>

<tr><td colspan="6">&nbsp; </td></tr>

<tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Career Objective:</td>
</tr>
<tr><td colspan="6">&nbsp;  </td></tr>

<? $sql="SELECT * FROM $career_objective_table where m_id='".$_SESSION[m_id]."'";
$co_result=$db->getResults($sql);
  foreach($co_result as $objective){	?>
<tr>
<td colspan="6"><?=$objective->co_objective;?></td>
</tr><? }?>
<!--<tr><td colspan="6">&nbsp; </td></tr>

<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>	-->
<tr><td colspan="6">&nbsp;</td></tr>
 <? if($core_count!=0 && $core_result[0]->cc_array!=''){?>  <tr style="overflow: auto;">
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Core Competency:</td>
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
<!--<td colspan="6" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;"> Summary of Qualification/Technical Skills:</td>-->
<tr><td colspan="6">&nbsp;</td></tr>

<tr>
<td colspan="6" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;"> Education <!--(Core Competency/Skill set)-->:</td>
</tr><tr><td colspan="6">&nbsp; </td></tr>
<!--
<tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;">Academic Qualifications:</td>
</tr>-->

<tr><td colspan="6"><table width="100%" border="0" cellpadding="0" cellspacing="3" >
<tr style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:12px; background-color:#BEBE7C; height:30px;">
                <td  width="290"><strong>Degree</strong></td>
	            <!--<td width="214" ><strong>Branch</strong></td>-->

    <td width="312" ><div align="center"><strong>Discipline </strong></div></td>
    <td width="249" ><div align="center"><strong>Institute<br /> University</strong></div></td>
   <td width="193"><div align="center"><strong>Year of Passing</strong></div></td>
    <td width="150"><div align="center"><strong>Aggregate</strong></div></td>
  </tr>
       <!-- <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->
		
		
        <?   $total_query=$db->getResults("SELECT * FROM rv_educational_details1 where m_id='".$_SESSION[m_id]."' order by e_id asc");
   
   $edu_toal_count=count($total_query);
   $i =0;
foreach($total_query as $alleducation){

if($alleducation->qua_id != '0' && $alleducation->qua_id != '' &&  $alleducation->m_id ==$_SESSION[m_id] )       //if($alleducation->qua_id != '0' && $alleducation->qua_id != '' && $alleducation->branch_name != '0' )
{	

$i++;?>
<input type="hidden" name="hdnID<?php echo $i;?>" size="5" value="<?php echo $alleducation->e_id;?>">


<tr>                <td style="background-color:#E4E4E4;" ><?=stripslashes($alleducation->qua_id);?></td>
             
    	<?// $branchquery="SELECT * FROM $branch_table where branch_id='$alleducation->branch_name'";
		 
//$branchquery_result=$db->getResults($branchquery);
					 ?>        
	    <td class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center">
   <?=stripslashes($alleducation->branch_name);?>
   
   </div></td>
	    
              
    <td width="249" class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center">
	<?=stripslashes($alleducation->insti_name);?><br />	<?=stripslashes($alleducation->e_university);?>
	
	</div></td>
    <td width="193" class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center"><? //$from_proj=explode('-',$alleducation->e_start);
	//echo  $month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];?>
	 <? //echo  $alleducation->e_end.'<br />';?>
	 <? $from_proj=explode('-',$alleducation->e_start1);
	echo  $month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];?>
	 <? echo  $alleducation->e_end1;?></td>
	 <td width="193" class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center"><?=stripslashes($alleducation->e_percentage)?></td></tr>
	
	</div>
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
  <?} ?>
       <!-- <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>-->
        <? }?></table></td></tr>
     
<tr><td colspan="6">&nbsp;</td></tr>
<tr><td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Work Experience:</td></tr>

      <!--  <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->


<? $work_experience_query="SELECT * FROM $work_experience_table where m_id='".$_SESSION[m_id]."'";
		 
$work_experience_result=$db->getResults($work_experience_query);
  foreach($work_experience_result as $work_experience){	
  		 $total_work_exp.=$work_experience->we_id.",";
		 ?>
  		 
		
			  <tr>	<td  align="left" class="general-bodyBold"><strong>Organization</strong>:</td><td colspan="5"><?=stripslashes($work_experience->we_company);?></td></tr>
			     <tr>  <td width="18%" align="left" class=""><strong>Designation</strong>:</td>
		   <td width="82%" colspan="5"><?=stripslashes($work_experience->we_designation);?></td>
		   </tr>
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5"><?php  $from_proj=explode('-',$work_experience->From_date);
		  echo  $month_array[$from_proj[0]+1].'&nbsp;'.$from_proj[1];?>
	      to 
		      <?php  $to_proj=explode('-',$work_experience->To_date);
		  echo  $month_array[$to_proj[0]+1].'&nbsp;'.$to_proj[1];?></td></tr>
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>  

		 <? }?>
       <tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>
		    <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Projects:</td></tr>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->


<?  $work_exp_result=$db->getResults("select * from $work_projects_table where find_in_set(we_id,'$total_work_exp')"); 
	if(count($work_exp_result)!='0'){	 

  foreach($work_exp_result as $work_exp){	?>
              <tr>  <td align="left" class="general-bodyBold"><strong>Title</strong>:</td><td colspan="5"><?=$work_exp->wp_title;?></td></tr>
              <tr>  <td align="left" class="general-bodyBold"><strong>Role</strong>:</td><td colspan="5"><?=$work_exp->wp_role;?></td></tr>
			<?php  if($work_exp->wp_from_date!='' || $work_exp->wp_to_date!=''){?>
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5"><?php
			  
			  $from_exp=explode('-',$work_exp->wp_from_date);
		  echo  $month_array[$from_exp[0]].'&nbsp;'.$from_exp[1];?>
	      to 
		      <?php  $to_exp=explode('-',$work_exp->wp_to_date);
		  echo  $month_array[$to_exp[0]].'&nbsp;'.$to_exp[1];?></td></tr><? }?>

	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Description</strong>:</td><td colspan="5" style="text-align:justify;"><?=stripslashes($work_exp->wp_description);?></td></tr>
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Tools Used </strong>:</td><td colspan="5"><?=stripslashes($work_exp->wp_tools);?></td></tr>
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Deliverable/Challenges Faced:</strong>:</td><td colspan="5"><?=stripslashes($work_exp->wp_challenges);?></td></tr>
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>   </tr>   <? }}else{?>
	         <tr><td  class="error" colspan="6" align="center"><strong>No Projects</strong></td></tr>	 
		<? }?> 
		 		 
         <tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>
         <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">BE Projects:</td></tr>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->


<? $projects_query="SELECT * FROM $projects_table where m_id='".$_SESSION[m_id]."'";
		 
$projects_result=$db->getResults($projects_query);
  foreach($projects_result as $projects){	?>
              <tr>  <td align="left" class="general-bodyBold"><strong>Title</strong>:</td><td colspan="5"><?=$projects->p_title;?></td></tr>
              <tr>  <td align="left" class="general-bodyBold"><strong>Role</strong>:</td><td colspan="5"><?=$projects->p_role;?></td></tr>
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
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Deliverable/Challenges Faced:</strong>:</td><td colspan="5"><?=$projects->p_challenges;?></td></tr>
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>   </tr>   <? }?>

        <tr><td colspan="6">&nbsp;</td></tr>
<tr><td colspan="6">&nbsp;</td></tr>
<?    $query_achv = "SELECT * FROM $achievements_table where m_id='".$_SESSION[m_id]."' order by ac_id desc"; 
      $achv_result=$db->getResults($query_achv);
	  $achv_count=count($achv_result);
	  if($achv_count!=0){?>
        <tr style="overflow: auto;">
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Achievements:</td>
</tr>

<? }?>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->

<tr><td colspan="6"><ul><? 
	    foreach($achv_result as $achivments){?> 
<li style="text-align:justify;" ><?=stripslashes($achivments->ac_title)?></li>
<li style="text-align:justify;" ><?=stripslashes($achivments->ac_title1)?></li>
<li style="text-align:justify;" ><?=stripslashes($achivments->ac_title2)?></li>

<? }?>
</ul></td></tr>

<tr><td colspan="6">&nbsp;</td></tr>
     
  <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Personal profile:</td>
</tr>
<!--<tr>
<td style="height: 1px;" colspan="5" bgcolor="#000000" ></td></tr>-->

 <tr>
<td colspan="6"><table width="100%" border="0" cellspacing="3" cellpadding="3">
   <tr>
    <td width="17%"><strong>Name</strong></td>
    <td width="83%">: <?=$members->m_fname;?>&nbsp;<?=$members->m_lname;?></td>
  </tr>
 
  <tr>
    <td width="17%"><strong>Date of Birth</strong></td>
    <td width="83%">: <?=$members->m_day;?>/<?=$members->m_month;?>/<?=$members->m_year;?></td>
  </tr>
    <tr>
    <td width="17%"><strong>Address</strong></td>
    <td width="83%">: <?=$members->m_address;?>&nbsp;,<?=$members->m_city;?>-<?=$members->m_pincode;?></td>
  </tr>
  <?php if($members->m_father_name != ''){ ?>
  <tr>
    <td width="17%"><strong>Father Name</strong></td>
    <td width="83%">: <?=$members->m_father_name;?></td>
  </tr>
  <?php } ?>
 <tr>
    <td><strong>Nationality</strong></td>
    <td width="83%">: <?=$members->m_nationality;?></td>
  </tr>
  <tr>
    <td><strong>Sex</strong></td>
    <td>: <? if($members->m_gender=='male') echo "Male";else echo "Female";?></td>
  </tr>
   <tr>
    <td width="17%"><strong>Marital Status</strong></td>
    <td width="83%">: <?=$members->m_martial_status;?></td>
  </tr>
  
  <tr>
    <td><strong>Languages known </strong></td>
    <td width="83%"> : <?=$members->m_languages;?></td>
  </tr>
  <?php if($members->m_hobbies != ''){ ?>
   <tr>
    <td><strong>Hobbies </strong></td>
    <td width="83%">: <?=$members->m_hobbies;?></td>
  </tr><?php } ?>
</table></td>
</tr>
<tr><td colspan="6">&nbsp;</td></tr>

<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>
</table>



</div>
</div>
</div>
</body>
</html>