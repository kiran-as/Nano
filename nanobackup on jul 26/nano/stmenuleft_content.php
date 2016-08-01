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
$img='free_resume_builder1.png';
$href='student_registration.php';

}else{
$img='free_resume_builder_edit.png';
$href='job_seeker_menu.php';
}
 }else{
 $img='free_resume_builder1.png';
 $href='student_registration.php';
 }
 
 ?>
 <div class="stmenuleft_maincontent">
<div class="news_events">
<div class="news_top">
<div class="lefttopleft">
</div>
<div class="lefttopmiddle">
<h1 class="h1class">Candidate Resume </h1>
</div>
<div class="lefttopright">
</div>
</div><!--end of news_top-->

<div class="leftmiddle_content">


<p class="left_para" style="margin:0px;padding:0px;"><td width="242" ><a href="<?=$href?>" class=""><img src="images/<?=$img?>" border="0"></img></a></td>
 </p> 
<p class="dot_style"></p>

<p  class="left_para" style="margin:0px;padding:0px;"><?  if(!empty($_SESSION[m_id])){?>
<tr>  
<td><a href="change_password.php" class=""><img src="images/change_pwdimg.png" border="0"></img></a></td>
</tr> 
</p>
<p  class="left_para" style="margin:0px;padding:0px;">
<tr>  
<td ><a href="logout.php" class=""><img src="images/logout_img.png" border="0"></img></a></td>
</tr> 
<? }?>
</p> 
<!--
<p  class="left_para"><img class="arrow_img" src="images/arrow_img.jpg" width="9" height="9" /><span class="date_style">25.02.2011</span></p>
<h2 class="h2class">News & Events Heading</h2>
<p class="content_style">Directly or through channel 
distributors, we have 
developed.</p> 
<p class="dot_style">...............................................</p>-->
</div>

<div class="news_bottom">
<div class="leftbottom_left">
</div>
<div class="leftbottom_center">
</div>
<div class="leftbottom_right">
</div>
</div>

</div><!--end of news_events-->
</div><!--end of left_maincontent-->