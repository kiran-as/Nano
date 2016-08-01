

<table width="215" align="left" class="recruit_menu_bg">   
    <tr>
      <td class="strong">&nbsp;</td>
	  
    </tr>
	  
    
    <!--
	<tr>  
<td width="200" height="25" ><a href="genral_information.php" class="menustyle">Personal Information</a></td>

</tr>
 <tr>  
<td width="200" height="25" ><a href="career_objective.php" class="menustyle">Career Objective</a></td>

</tr>
 <tr>  
<td width="200" height="25" class="menustyle"><a href="core_competency.php" class="menustyle">Core Competency</a></td>

</tr>
 <tr>  
<td width="200" height="25"><a href="educational_details.php" class="menustyle">Educational Details</a></td>

</tr> 
<tr>  
<td width="200" height="25"><a href="work_experience.php" class="menustyle">Work Experience</a></td>

</tr> 

<tr>  
<td width="200" height="25" class="menustyle"><a href="projects_completed.php" class="menustyle">Projects Completed</a></td>

</tr>
 <tr>  
<td width="200" height="25" class="menustyle"><a href="achievements.php" class="menustyle">Achievements</a></td>

</tr>-->
<!--<tr>  
<td width="200" height="25"><a href="career_details.php" class="menustyle">Career Details</a></td>

</tr>
<tr>  
<td width="200" height="25"><a href="career_preference.php" class="menustyle">Career Preference</a></td>

</tr> 


<tr>  
<td width="200" height="25"><a href="certification_details.php" class="menustyle">Certification</a></td>


</tr>  

<tr>  
<td width="200" height="25"><a href="voluntary_works.php" class="menustyle">Voluntary Works</a></td>

</tr> 


 
 <tr>  
<td width="200" height="25"><a href="resume_details.php" class="menustyle">Resume View</a></td>

</tr> -->
<?  if(!empty($_SESSION[m_id])){
 $gen_result=$db->getResults("select * from $members_table where m_id='".$_SESSION[m_id]."'");
 $gen=count($gen_result);
 $career_result=$db->getResults("select * from $career_objective_table where m_id='".$_SESSION[m_id]."'");
 $cobj=count($career_result);
 $core_result=$db->getResults("select * from $core_competecny_table where m_id='".$_SESSION[m_id]."'");
 $core=count($core_result);
  $edu_result=$db->getResults("select * from $education_table where m_id='".$_SESSION[m_id]."'");
 $edu=count($edu_result);
  $workexp_result=$db->getResults("select * from $work_experience_table where m_id='".$_SESSION[m_id]."'");
 $work=count($workexp_result);
 $proj_result=$db->getResults("select * from $projects_table where m_id='".$_SESSION[m_id]."'");
 $proj=count($proj_result);
 $ache_result=$db->getResults("select * from $achievements_table where m_id='".$_SESSION[m_id]."'");
 $ache=count($ache_result);
if($cobj==0 && $core==0 && $work==0 && $proj==0 && $ache==0){
$img='free_resume_builder.jpg';

}else{
$img='free_resume_builder_edit.jpg';
}
 }else{
 $img='free_resume_builder1.png';
 }
 
 ?>
<tr>  
<td ><a href="job_seeker_menu.php" class=""><img src="images/<?=$img?>" border="0"></img></a></td>


<tr>  
<td ><a href="#" class=""><img src="images/interviewAssis_img.png" border="0"></img></a></td>

</tr> 
<tr>  
<td ><a href="#" class=""><img src="images/enrolltest_img.png" border="0"></img></a></td>

</tr> 

<tr>  
<td ><a href="#" class=""><img src="images/top10_img.png" border="0"></img></a></td>
</tr>

<tr>  
<td ><a href="#" class=""><img src="images/forum_img.png" border="0"></img></a></td>
</tr>




  
</table>
