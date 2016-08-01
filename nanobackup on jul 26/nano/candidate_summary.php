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
<div class="main_container" style="width:700; padding:10px 20px;">
		
 			<table width="660">
<tr>
<td width="79%" align="left"><span style="font-family:verdana,Geneva, sans-serif; font-weight:bold;font-size:18px;"><?=ucfirst($members->m_fname);?>&nbsp;<?=$members->m_lname;?></span><br/>
E-mail id : <?=$members->m_emailid;?><br />
<?=$members->m_phone;?></td>
<td width="21%" align="left"><a href="createword.php?m_id=<?=$_REQUEST['m_id']?>" target="_blank" ><img src="<?=$server_url?>images/download.icon_2new.jpg" border="0" /></a></td>
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
		if(in_array('-1',$core_array)){
		?> 
<li style="text-align:justify;" ><?=stripslashes($core_result[0]->cc_other);?></li>

<? }  	?>
</ul></td></tr>

<? }?>

<tr><td colspan="2">&nbsp;</td></tr>
<tr>
<td colspan="6" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;"> Summary of Qualification/Technical Skills:</td>
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
		
		
        <?   $total_query=$db->getResults("SELECT * FROM rv_educational_details1 where m_id='".$_REQUEST[m_id]."' order by e_id asc");
   
   $edu_toal_count=count($total_query);
   $i =0;
foreach($total_query as $alleducation){

if($alleducation->qua_id != '0' && $alleducation->qua_id != '' && $alleducation->branch_name != '0' ){	

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
<? $work_experience_query="SELECT * FROM $work_experience_table where m_id='".$_REQUEST[m_id]."'";
		 
$work_experience_result=$db->getResults($work_experience_query);

if(count($work_experience_result)!=0){?>


<tr><td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Work Experience:</td></tr>

      <!--  <tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>-->


<?
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
       <tr><? }?>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>
</table>

</div>

</body>
</html>