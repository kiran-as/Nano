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
<td  colspan="6" align="left"><h1 style="font-family:verdana,Geneva, sans-serif;"><?=$members->m_fname;?>&nbsp;<?=$members->m_lname;?></h1>
<?=$members->m_emailid;?><br />
<?=$members->m_address;?>&nbsp;<?=$members->m_city;?><br />
 <?=$members->m_phone;?><br /></td>
</tr>
<tr><td colspan="6">&nbsp; </td></tr>
<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>
<tr><td colspan="6">&nbsp; </td></tr>

<tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px;" colspan="6">Career Profile:</td>
</tr>
<tr><td colspan="6">&nbsp;  </td></tr>

<? $sql="SELECT * FROM $career_objective_table where m_id='".$_SESSION[m_id]."'";
$co_result=$db->getResults($sql);
  foreach($co_result as $objective){	?>
<tr>
<td colspan="6"><?=$objective->co_objective;?></td>
</tr><? }?>
<tr><td colspan="6">&nbsp; </td></tr>

<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>	
<tr><td colspan="6">&nbsp;</td></tr>
<tr>
<td colspan="6" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px;"> Qualification <!--(Core Competency/Skill set)-->:</td>
</tr><tr><td colspan="6">&nbsp; </td></tr>
<!--
<tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;">Academic Qualifications:</td>
</tr>-->


<tr>
                <td  width="349"><strong>Degree</strong></td>
	            <td width="214" ><strong>Branch</strong></td>

	    <td width="220" ><div align="left"><strong>Institute </strong></div></td>
	    
                
          <td width="135" ><div align="left"><strong>City</strong></div></td>
    <td width="150"><div align="left"><strong>Year of Passing</strong></div></td>
    <td width="118"><div align="left"><strong>Aggregate</strong></div></td>
  </tr>
        <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>
		
        <? $education_query="SELECT * FROM $education_table where m_id='".$_SESSION[m_id]."'";
		 
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

                <td ><?=$edu;?></td>
             
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
	            <td ><?=$brnc;?></td>
                <? if($education->qua_id==4 || $education->qua_id==5){
				$inst=stripslashes($education->e_other_institute);
             }else{
$inst_result=$db->getResults("SELECT * FROM $institutes where insti_id='$education->insti_id'");
	$inst=stripslashes($inst_result[0]->insti_name);
	}?>    
	        
	    <td class="general-bodyBold"><div align="left"><?=$inst;?> </div></td>
	    <? ?>
                
    <td width="135" class="general-bodyBold"><div align="left"><?=$education->e_city;?></div></td>
    <td width="150" class="general-bodyBold"><div align="left"><?=$education->e_year;?> </div></td>
    <? if($education->e_percentage!=''){ ?>
    <td width="118" class="general-bodyBold"><div align="center"><?=$education->e_agg_marks;?>&nbsp;<?=$education->e_percentage."&nbsp;";?>&nbsp;</div></td>
    <? }?>
  </tr>
        <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>
        <? }?>
     
<tr><td colspan="6">&nbsp;</td></tr>
<tr><td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">Work Experience:</td></tr>

        <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>


<? $work_experience_query="SELECT * FROM $work_experience_table where m_id='".$_SESSION[m_id]."'";
		 
$work_experience_result=$db->getResults($work_experience_query);
  foreach($work_experience_result as $work_experience){	
  		 $total_work_exp.=$work_experience->we_id.",";?>
  		 
		   <tr>  <td align="left" class=""><strong>Designation</strong>:</td><td colspan="5"><?=stripslashes($work_experience->we_designation);?></td></tr>
			  <tr>	<td  align="left" class="general-bodyBold"><strong>Organization</strong>:</td><td colspan="5"><?=stripslashes($work_experience->we_company);?></td></tr>
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5"><?php  $from_proj=explode('-',$work_experience->From_date);
		  echo  $month_array[$from_proj[0]].'/'.$from_proj[1];?>
	      to 
		      <?php  $to_proj=explode('-',$work_experience->To_date);
		  echo  $month_array[$to_proj[0]].'/'.$to_proj[1];?></td></tr>
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>  

		 <? }?>
       <tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>
		    <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">Projects:</td></tr>
<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>


<?  $work_exp_result=$db->getResults("select * from $work_projects_table where find_in_set(we_id,'$total_work_exp')"); 
	if(count($work_exp_result)!='0'){	 

  foreach($work_exp_result as $work_exp){	?>
              <tr>  <td align="left" class="general-bodyBold"><strong>Title</strong>:</td><td colspan="5"><?=$work_exp->wp_title;?></td></tr>
			<?php  if($work_exp->wp_from_date!='' || $work_exp->wp_to_date!=''){?>
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5"><?php
			  
			  $from_exp=explode('-',$work_exp->wp_from_date);
		  echo  $month_array[$from_exp[0]].'/'.$from_exp[1];?>
	      to 
		      <?php  $to_exp=explode('-',$work_exp->wp_to_date);
		  echo  $month_array[$to_exp[0]].'/'.$to_exp[1];?></td></tr><? }?>

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
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">BE Projects:</td></tr>
<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>


<? $projects_query="SELECT * FROM $projects_table where m_id='".$_SESSION[m_id]."'";
		 
$projects_result=$db->getResults($projects_query);
  foreach($projects_result as $projects){	?>
              <tr>  <td align="left" class="general-bodyBold"><strong>Title</strong>:</td><td colspan="5"><?=$projects->p_title;?></td></tr>
			  <tr>	<td  align="left" class="general-bodyBold"><strong>Organization</strong>:</td><td colspan="5"><?=$projects->p_company;?></td></tr>
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5"><?php 
			  if($projects->p_from_date!='NULL' || $projects->p_to_date!='NULL'){
			  $from_proj=explode('-',$projects->p_from_date);
		  echo  $month_array[$from_proj[0]].'/'.$from_proj[1];?>
	      to 
		      <?php  $to_proj=explode('-',$projects->p_to_date);
		  echo  $month_array[$to_proj[0]].'/'.$to_proj[1];?><? }?></td></tr>

	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Description</strong>:</td><td colspan="5" style="text-align:justify;"><?=$projects->p_description;?></td></tr>
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Tools Used </strong>:</td><td colspan="5"><?=$projects->p_tools;?></td></tr>
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Challenges</strong>:</td><td colspan="5"><?=$projects->p_challenges;?></td></tr>
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>   </tr>   <? }?>

        <tr><td colspan="6">&nbsp;</td></tr>
<tr><td colspan="6">&nbsp;</td></tr>

        <tr style="overflow: auto;">
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;overflow: auto;" colspan="6">Achievements:</td>
</tr>
<tr>
<td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>

<tr><td colspan="6"><ul><?    $query_achv = "SELECT * FROM $achievements_table where m_id='".$_SESSION[m_id]."' order by ac_id desc"; 
      $achv_result=$db->getResults($query_achv);
	  $achv_count=count($achv_result);
	    foreach($achv_result as $achivments){?> 
<li style="text-align:justify;" ><?=stripslashes($achivments->ac_title)?></li>

<? }?>
</ul></td></tr>

<tr><td colspan="6">&nbsp;</td></tr>
        <tr style="overflow: auto;">
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;overflow: auto;" colspan="6">Core Competency:</td>
</tr>
<tr>
<td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>

<tr><td colspan="6"><ul><?    $core_result=$db->getResults("SELECT * FROM $core_competecny_table where m_id='".$_SESSION[m_id]."' order by cc_id desc");
     
	  $core_count=count($core_result);
	    foreach($core_result as $core){?> 
<li style="text-align:justify;" ><?=stripslashes($core->cc_title)?></li>

<? }?>
</ul></td></tr>
  <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;overflow: auto;" colspan="6">Personal profile:</td>
</tr>
<tr>
<td style="height: 1px;" colspan="5" bgcolor="#000000" ></td></tr>

 <tr>
<td colspan="6"><table width="100%" border="0" cellspacing="3" cellpadding="3">
   <tr>
    <td width="50%"><strong>Name</strong></td>
    <td width="50%"><?=$members->m_fname;?>&nbsp;<?=$members->m_lname;?></td>
  </tr>
 
  <tr>
    <td width="50%"><strong>Date of Birth</strong></td>
    <td width="50%"><?=$members->m_day;?>/<?=$members->m_month;?>/<?=$members->m_year;?></td>
  </tr>
    <tr>
    <td width="50%"><strong>Address</strong></td>
    <td width="50%"><?=$members->m_address;?>&nbsp;,<?=$members->m_city;?></td>
  </tr>
 
  <tr>
    <td><strong>Gender</strong></td>
    <td><? if($members->m_gender=='male') echo "Male";else echo "Female";?></td>
  </tr>
  <tr>
    <td><strong>Nationality</strong></td>
    <td width="50%"><?=$members->m_nationality;?></td>
  </tr>
  <tr>
    <td><strong>Languages known </strong></td>
    <td width="50%"><?=$members->m_languages;?></td>
  </tr>
  
  
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
