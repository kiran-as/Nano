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
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>

</head>

<body>
<div  class="main_container" style="width:700; padding:10px 20px;">
		
<table width="660">
<tr>
<td width="32%" align="left"><span style="font-family:verdana,Geneva, sans-serif; font-weight:bold;font-size:18px;"><?=ucfirst($members->m_fname);?>&nbsp;<?=$members->m_lname;?></span><br/>
Resume id : <?=$members->m_resume_id;?><br />
</td>
<td width="68%" align="left"><a href="createword.php?m_id=<?=$_REQUEST['m_id']?>" target="_blank" ><img src="<?=$server_url?>images/download.icon_2new.jpg" border="0" /></a></td>
</tr>

<tr><td colspan="2">&nbsp; </td></tr>







      <? if($core_count!=0 && $core_result[0]->cc_array!=''){?>  
      <tr style="overflow: auto;">
        <td colspan="2" >&nbsp;</td>
      </tr>
      <tr style="overflow: auto;">
<td colspan="2" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#eee; height:30px;">Core Competency:</td>
</tr>
<!--<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->

<tr><td colspan="2"><ul><?   
   

	   
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
	 $othcore=explode("#",$core_result[0]->cc_other);
	
	if(count($othcore)!=0 && $core_result[0]->cc_other!=''){
	for($c=0;$c<count($othcore);$c++){
	
	if($othcore[$c]!=''){?>
<li style="text-align:justify;" ><?=stripslashes($othcore[$c])?></li>
	<? }}}?>

</ul></td></tr>

<? }?>

<tr><td colspan="2">&nbsp;</td></tr>

<tr>
<td colspan="6" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;"> Education <!--(Core Competency/Skill set)-->:</td>
</tr><tr><td colspan="6">&nbsp; </td></tr>
<!--
<tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;">Academic Qualifications:</td>
</tr>-->

<tr><td colspan="6"><table width="100%" border="0" cellpadding="5" cellspacing="1" >
<tr style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:12px; background-color:#BEBE7C; height:30px;">
                <td  width="290" align="center"><strong>Degree</strong></td>
	            <!--<td width="214" ><strong>Branch</strong></td>-->

    <td width="312" ><div align="center"><strong>Discipline </strong></div></td>
    <td width="249" ><div align="center"><strong>Institute<br /> University</strong></div></td>
   <td width="193"><div align="center"><strong>Year of Passing</strong></div></td>
    <td width="150"><div align="center"><strong>Aggregate</strong></div></td>
  </tr>
       <!-- <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->
		
		
        <? 
	$qual_array=array(21,6,1,2,3,4,5);	
for($i=0;$i<=count($qual_array);$i++)
{
	$total_query=$db->getResults("SELECT * FROM rv_educational_details where m_id='".$_REQUEST[m_id]."' and qua_id='".$qual_array[$i]."'");
	
	$edu_toal_count=count($total_query);
if($edu_toal_count!=='0')
{
	foreach($total_query as $alleducation){
?>


<tr>                <td style="background-color:#E4E4E4;" align="center" >

<?

if(($alleducation->qua_id=='4') ||($alleducation->qua_id=='5'))
		{
		echo stripslashes(get_qualification($alleducation->qua_id));
		}

?>
<?=stripslashes(get_course($alleducation->e_course));?></td>
                    
	    <td class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center">
   <?=stripslashes(get_branch($alleducation->e_branch));?>
   
   </div></td>
	    
              
    <td width="249" class="general-bodyBold" style="background-color:#E4E4E4;" align="center">
    
	<? if($alleducation->qua_id==4 || $alleducation->qua_id==5)
    { 
		echo stripslashes($alleducation->e_institute); 
		if(($alleducation->e_university)!==NULL)
		{
		?>
		<hr size="1"  width="150%" color="white">
		<?	 
		echo stripslashes($alleducation->e_university); 
		}
    
    } 
	 else 
	{ 
		if($alleducation->e_institute=='-1')
		{ 
		echo stripslashes($alleducation->e_other_institute);
		}
		else 
		{
		echo stripslashes(get_institute($alleducation->e_institute));
		}
		
		?>
		
         
		<? if($alleducation->e_university=='-1')
		{ 
		echo stripslashes($alleducation->e_other_university);
		}
		else 
		{
			if(get_university($alleducation->e_university)=='')
			{echo "";}else { ?> <hr size="1"  width="150%" color="white"> <? echo stripslashes(get_university($alleducation->e_university));	}
	
		}?>
	
	<? }?>
	</td>
    <td width="193" class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center"><? echo $alleducation->e_passout_year//$from_proj=explode('-',$alleducation->e_start);
	 ?>
     </td>
	 <td width="193" class="general-bodyBold" style="background-color:#E4E4E4;"><div align="center"><? if($alleducation->e_percentage!=''){?><?=stripslashes($alleducation->e_percentage)?>&nbsp;<?=$alleducation->e_percentage_type==1?'%':'CGPA (out of 10)';  }?></div></td></tr>

      
        <? } } }?></table></td></tr>
     
<tr><td colspan="6">&nbsp;</td></tr>
<?   $work_experience_query="SELECT * FROM $work_experience_table where m_id='".$_REQUEST[m_id]."'";
		 $work_query=mysql_query("SELECT * FROM $work_experience_table where m_id='".$_REQUEST[m_id]."'");
		  $count=mysql_num_rows($work_query);
		   while($wid=mysql_fetch_assoc($work_query))
		   {
			   $widlist[]=$wid['we_id'];
		   }
		    $to_work_exp=implode($widlist,',');
$work_experience_result=$db->getResults($work_experience_query);

if(count($work_experience_result)!=0){?>


<tr>
  <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Work Experiences:</td></tr>
      <!--  <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->
<?
  foreach($work_experience_result as $work_experience){	
  		 $total_work_exp.=$work_experience->we_id.",";
		 ?>
  		 
		
			  <tr>	<td  align="left" class="general-bodyBold"><strong>Organization</strong>:</td><td colspan="5"><?=stripslashes($work_experience->we_company);?></td></tr>
			     <tr>  <td width="32%" align="left" class=""><strong>Designation</strong>:</td>
		   <td width="68%" colspan="5"><?=stripslashes($work_experience->we_designation);?></td>
		   </tr>
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5">
			  <?php  $from_proj=explode('-',$work_experience->we_from_date);
		  echo  $month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];?>
	      to 
		      <?php  $to_proj=explode('-',$work_experience->we_to_date);
		  echo  $month_array[$to_proj[0]].'&nbsp;'.$to_proj[1];?></td></tr>
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>  

		 <? }?>
       <tr><? }?>
       
       
        <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
       
      <? $work_exp_result=$db->getResults("select * from $work_projects_table where m_id='".$_REQUEST[m_id]."'"); 
	if(count($work_exp_result)!='0'){  ?>


<tr>
  <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Projects:</td></tr>
      <!--  <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->
<?
  foreach($work_exp_result as $work_exp){
		 ?>
  		 
		
			  <tr>	<td  align="left" class="general-bodyBold"><strong>Company</strong>:</td>
              <td colspan="5"> <?
				
				 $query=mysql_query("select we_company from rv_work_experience where we_id='".$work_exp->wp_company."'");
				  $fetch=mysql_fetch_assoc($query);
				 echo $fetch['we_company'];
				?></td></tr>
                
                <tr>	<td  align="left" class="general-bodyBold"><strong>Title</strong>:</td>
              <td colspan="5"><?=$work_exp->wp_title;?>	</td></tr>
              <?php  if($work_exp->wp_from_date!='' || $work_exp->wp_to_date!=''){?>
               <tr>	
               <td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td>
              <td colspan="5">
              
              <?
              $from_exp=explode('-',$work_exp->wp_from_date);
		  echo  $month_array[$from_exp[0]].'&nbsp;'.$from_exp[1];?>
	      to 
		      <?php  $to_exp=explode('-',$work_exp->wp_to_date);
		  echo  $month_array[$to_exp[0]].'&nbsp;'.$to_exp[1];
			  ?>
              </td>
              
              </tr><? }?>
              
			     <tr>  <td width="32%" align="left" class=""><strong>Description</strong>:</td>
			     <td width="68%" colspan="5"><?=stripslashes($work_exp->wp_description);?></td>	
			     </tr>     
		   
          
           
           
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Tools Used</strong>:</td><td colspan="5"><?=stripslashes($work_exp->wp_tools);?></td></tr>
            
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>  

		 <? }?>
       <tr><? }?>
       
     <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>

         </tr>

         <tr><td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Academic Projects:</td></tr>
        <? $projects_query="SELECT * FROM $projects_table where m_id='".$_REQUEST[m_id]."'";
		 
$projects_result=$db->getResults($projects_query);
  foreach($projects_result as $projects){	?>
  		 
		
			  <tr>	<td  align="left" class="general-bodyBold"><strong>Title :</strong>:</td><td colspan="5"><?=$projects->p_title;?></td></tr>
			     <tr>  <td width="32%" align="left" class=""><strong>Role:</strong></td>
		   <td width="68%" colspan="5"><?=$projects->p_role;?></td>
		   </tr>
            <tr>  <td width="32%" align="left" class=""><strong>Organization:</strong></td>
		   <td width="68%" colspan="5"><?=$projects->p_company;?></td>
		   </tr>
     
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration:</strong></td><td colspan="5"><?php 
			  if($projects->p_from_date!='NULL' || $projects->p_to_date!='NULL'){
			  $from_proj=explode('-',$projects->p_from_date);
		  echo  $month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];?>
	      to 
		      <?php  $to_proj=explode('-',$projects->p_to_date);
		  echo  $month_array[$to_proj[0]].'&nbsp;'.$to_proj[1];?><? }?></td></tr>
   
         
         <tr>
           <td  align="left" class="general-bodyBold"><strong>Description:</strong></td>
           <td colspan="5"><?=$projects->p_description;?></td>
         </tr>
         <tr>
           <td align="left" class=""><strong>Tools Used:</strong> </td>
           <td colspan="5"><?=$projects->p_tools;?></td>
         </tr>
         <tr>
           <td  align="left" class="general-bodyBold"><strong>Deliverable/Challenges Faced:</strong></td>
           <td colspan="5"><?=$projects->p_challenges;?></td>
         </tr>  
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>

		 
       <tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr> <? }?>
         <?  $query_achv = "SELECT * FROM $achievements_table where m_id='".$_REQUEST[m_id]."' order by ac_id desc"; 
      $achv_result=$db->getResults($query_achv);
	  $achv_count=count($achv_result);
	  if($achv_count!=0){?>
        <tr style="overflow: auto;">
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Achievements:</td>
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
<?php /*?><tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Personal profile:</td>
</tr><?php */?>
<!--<tr>
<td style="height: 1px;" colspan="5" bgcolor="#000000" ></td></tr>-->

<?php /*?> <tr>
<td colspan="6">
   <tr>
     <td width="27%"><strong>Name</strong></td>
    <td >: <?=$members->m_fname;?>&nbsp;<?=$members->m_lname;?></td>
  </tr>
 
  <tr>
    <td width="27%"><strong>Date of Birth</strong></td>
    <td width="72%">: <?=$members->m_day;?>/<?=$members->m_month;?>/<?=$members->m_year;?></td>
  </tr>
  
  <?php if($members->m_father_name != ''){ ?>
  <tr>
    <td width="27%"><strong>Father Name</strong></td>
    <td width="72%">: <?=$members->m_father_name;?></td>
  </tr>
  <?php } ?>
 <tr>
   <td><strong>Nationality</strong></td>
    <td width="72%">: <?=$members->m_nationality;?></td>
  </tr>
  <tr>
    <td><strong>Sex</strong></td>
    <td>: <? if($members->m_gender=='male') echo "Male";else echo "Female";?></td>
  </tr>
   <tr>
     <td width="27%"><strong>Marital Status</strong></td>
    <td width="72%">: <?=$members->m_martial_status;?></td>
  </tr>
  
  <tr>
    <td><strong>Languages known </strong></td>
    <td width="72%"> : <?=$members->m_languages;?></td>
  </tr>
  <?php if($members->m_hobbies != ''){ ?>
   <tr>
     <td><strong>Hobbies </strong></td>
    <td width="72%">: <?=$members->m_hobbies;?></td>
  </tr><?php } ?>
  </td></tr>
<?php */?>  <tr><td colspan="6">&nbsp;</td></tr>
</table>

</div> 

</body>
</html>