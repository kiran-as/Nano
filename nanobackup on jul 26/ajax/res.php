<?  include_once('../db/dbconfig.php');
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
<td>

<table width="100%">
<tr>
<td width="204"  colspan="4" align="center" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;">
<?=$members->m_fname;?>&nbsp;<?=$members->m_lname;?>
</td><td>

<?=$members->m_address;?>
</td>
</tr>
<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>
<tr>
<td ><strong>Email-Id</strong> :
<?=$members->m_emailid;?></td>
<td colspan="2"><strong>Mobile No</strong> :  <?=$members->m_phone;?></td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>

<tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;">Career Objectives:</td>
</tr>
<? $sql="SELECT * FROM $career_objective_table where m_id='".$_SESSION[m_id]."'";
$co_result=$db->getResults($sql);
  foreach($co_result as $objective){	?>
<tr>
<td colspan="6"><?=$objective->co_objective;?></td>
</tr><? }?>

<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>	
<tr><td>&nbsp;</td></tr>
<tr>
<td colspan="6" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px;">Summary of Qualification (Core Competency/Skill set):</td>
</tr>
<tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:12px;">Academic Qualifications:</td>
</tr>

<tr>
                <td ><strong>Degree</strong></td>
	            <td width="221" ><strong>Branch</strong></td>
	    
	    <td width="188" class="general-bodyBold"><div align="center"><strong>University/College/Institute </strong></div></td>
	    
                
                <td width="113" class="general-bodyBold"><div align="center"><strong>City</strong></div></td>
                <td width="115" class="general-bodyBold"><div align="center"><strong>Year of Passing</strong></div></td>
                <td width="81" class="general-bodyBold"><div align="center"><strong>% or CGPA</strong></div></td>
	    </tr>
        <tr><td style="height: 1px;" colspan="6" bgcolor="#00CCFF" ></td></tr>
        <? $education_query="SELECT * FROM $education_table where m_id='".$_SESSION[m_id]."'";
		 
$edu_result=$db->getResults($education_query);
  foreach($edu_result as $education){	?>


<tr><? $course_query="SELECT * FROM $course_table where cor_id='$education->cor_id'";
$cor_result=$db->getResults($course_query);
foreach($cor_result as $course){}	?>

                <td ><?=$course->cor_name;?></td>
                <? ?>
              <? $branch_query="SELECT * FROM $branch_table where branch_id='$education->branch_id'";
$branch_result=$db->getResults($branch_query);
foreach($branch_result as $branch){}	?>  
	            <td ><?=$branch->branch_name;?></td>
                <? ?>
              <? $inst_query="SELECT * FROM $institutes where insti_id='$education->insti_id'";
$inst_result=$db->getResults($inst_query);
foreach($inst_result as $inst){	}?>    
	            
	    <td class="general-bodyBold"><div align="center"><?=$inst->insti_name;?> </div></td>
	    <? ?>
                
                <td width="113" class="general-bodyBold"><div align="center"><?=$education->e_city;?></div></td>
                <td width="115" class="general-bodyBold"><div align="center"><?=$education->e_year;?> </div></td>
                <td width="81" class="general-bodyBold"><div align="center"><?=$education->e_percentage;?> </div></td>
	    </tr>
        <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>
        <? }?>
     
<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>
<tr><td>&nbsp;</td></tr>
        <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:12px;">Work Experience:</td>
</tr>
<tr>
                <td ><strong>Title</strong></td>
	            <td ><strong>Company/organization worked in</strong></td>
	    
	    <td width="188" class="general-bodyBold"><div align="center"><strong>Duration </strong></div></td>
	    
                
        </tr>
        <tr><td style="height: 1px;" colspan="6" bgcolor="#00CCFF" ></td></tr>


<? $work_experience_query="SELECT * FROM $work_experience_table where m_id='".$_SESSION[m_id]."'";
		 
$work_experience_result=$db->getResults($work_experience_query);
  foreach($work_experience_result as $work_experience){	?>
  <tr>
                <td ><?=$work_experience->we_designation;?></td>
               
	         <td ><?=$work_experience->we_company;?></td>
	            
	  <td ><div align="center"><?=$work_experience->we_duration;?></div></td>
	    
                
                
	     
         </tr>
		 <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr><? }?>
         <tr><td>&nbsp;</td></tr>

         <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:12px;">BE Projects :</td>
</tr>
<tr>
                <td ><strong>Title</strong></td>
	            <td ><strong>Company/organization Done in</strong></td>
	    
	    <td width="188" class="general-bodyBold"><div align="center"><strong>Duration</strong></div></td>
	    
                
                <td width="113" class="general-bodyBold"><div align="center"><strong>Description</strong></div></td>
                <td width="115" class="general-bodyBold"><div align="center"><strong>Tools Used </strong></div></td>
                <td width="81" class="general-bodyBold"><div align="center"><strong>Challenges</strong></div></td>
	    </tr>
<tr><td style="height: 1px;" colspan="6" bgcolor="#00CCFF" ></td></tr>

<? $projects_query="SELECT * FROM $projects_table where m_id='".$_SESSION[m_id]."'";
		 
$projects_result=$db->getResults($projects_query);
  foreach($projects_result as $projects){	?>
  <tr>
                <td ><?=$projects->p_title;?></td>
               
	         <td ><?=$projects->p_company;?></td>
	            
	  <td width="188" class="general-bodyBold"><div align="center"><?=$projects->p_period;?></div></td>
	    
                
                <td width="113" class="general-bodyBold"><div align="center"><?=$projects->p_description;?></div></td>
                <td width="115" class="general-bodyBold"><div align="center"><?=$projects->p_tools;?></div></td>
                <td width="81" class="general-bodyBold"><div align="center"><?=$projects->p_challenges;?></div></td>
	
         </tr> 
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>    <? }?>

        
        <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:12px;">Achievements/Extra-Curricular Activities:</td>
</tr>
<tr>
<td style="height: 1px;" colspan="6" bgcolor="#00CCFF" ></td></tr>
<tr><td>&nbsp;</td></tr>
  <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:12px;">Personal Details:</td>
</tr> <tr> 
<td style="height: 1px;" colspan="6" bgcolor="#00CCFF" ></td></tr>
 <tr>
<td colspan="4"><table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="41%"><strong>Permanent Address</strong></td>
    <td width="59%" colspan="3"><?=$members->m_address?></td>
  </tr>
  <tr>
    <td><strong>Date of Birth</strong></td>
    <td><?=$members->m_day;?>/<?=$members->m_month;?>/<?=$members->m_year;?></td>
  </tr>
  <tr>
    <td><strong>Gender</strong></td>
    <td><? if($members->m_gender=='male') echo "Male";else echo "Female";?></td>
  </tr>
  <tr>
    <td><strong>Nationality</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Languages known (Linguistic ability) etc</strong></td>
    <td>&nbsp;</td>
  </tr>
  
  
</table>
</td>
</tr>

<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>

</table>

</td>
</tr>
</table>
</div>
</div>
</div>
</body>
</html>
