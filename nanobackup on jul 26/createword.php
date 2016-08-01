<?php
error_reporting('1');
  include_once('db/dbconfig.php');
    include_once('admin_login_check.php');
    include_once('classes/dataBase.php');
    include_once('classes/checkInputFields.php');
    include_once('classes/checkingAuth.php');
    include_once('classes/inputFields.php');
    include_once('classes/messages.php');  
	
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
 
	header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");   
	   
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
 	//header("Content-type: application/vnd.ms-word");
	
	$name=ucfirst($members->m_resume_id)."_Resume.doc";
header("Content-Disposition: attachment;Filename=".trim($name));     
$final_word='';   
   
$final_word.='<html>';
$final_word.='<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">';
$final_word.='<body>';
$final_word.='<table width="100%">
<tr>
<td  colspan="6" align="left"><span style="font-family:verdana,Geneva, sans-serif; font-weight:bold;font-size:18px;">'.ucfirst($members->m_fname).'&nbsp;'.$members->m_lname.'</span><br/>
Resume id: '.$members->m_resume_id.'<br />
</td>
</tr>

<tr><td colspan="6">&nbsp; </td></tr>

<tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Career Objective:</td>
</tr>
<tr><td colspan="6">&nbsp;  </td></tr>';

 $sql="SELECT * FROM $career_objective_table where m_id='".$_REQUEST[m_id]."'";
$co_result=$db->getResults($sql);
  foreach($co_result as $objective){
$final_word.='<tr>
<td colspan="6">'.$objective->co_objective.'</td>
</tr>'; }

$final_word.='<tr><td colspan="6">&nbsp;</td></tr>


<tr>
<td colspan="6" style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;"> Education <!--(Core Competency/Skill set)-->:</td>
</tr><tr><td colspan="6">&nbsp; </td></tr>


<tr><td colspan="6"><table width="100%" border="0" cellpadding="5" cellspacing="1" >
<tr style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:12px; background-color:#cbcbcb; height:30px;">
<td  width="290" align="center"><strong>Degree</strong></td>
<td width="312" ><div align="center"><strong>Discipline </strong></div></td>
<td width="249" ><div align="center"><strong>Institute<br /> University</strong></div></td>
<td width="193"><div align="center"><strong>Year of Passing</strong></div></td>
<td width="150"><div align="center"><strong>Aggregate</strong></div></td>
</tr>   ';        


$qual_array=array(21,6,1,2,3,4,5);
for($i=0;$i<=count($qual_array);$i++)
{
$total_query=$db->getResults("SELECT * FROM rv_educational_details where m_id='".$_REQUEST[m_id]."' and qua_id='".$qual_array[$i]."'");
$edu_toal_count=count($total_query);
if($edu_toal_count!=='0')
{
	foreach($total_query as $alleducation)
	{
	
$final_word.='<tr> 
        <td style="background-color:#E4E4E4;" align="center">';

		if(($alleducation->qua_id=='4') ||($alleducation->qua_id=='5'))
		{
$final_word.=stripslashes(get_qualification($alleducation->qua_id));
		}
$final_word.=stripslashes(get_course($alleducation->e_course));
	$final_word.='</td> 
           <td style="background-color:#E4E4E4;" align="center">';
$final_word.=stripslashes(get_branch($alleducation->e_branch));
$final_word.='</td> 
        <td style="background-color:#E4E4E4;" align="center">';
 if($alleducation->qua_id==4 || $alleducation->qua_id==5)
	{ 
	$final_word.=stripslashes($alleducation->e_institute); 
    $final_word.='<br/>';
$final_word.=stripslashes($alleducation->e_university); 
	 } 
	 else { 
	 if($alleducation->e_institute=='-1'){ 
$final_word.=stripslashes($alleducation->e_other_institute);
	}
	else {
$final_word.=stripslashes(get_institute($alleducation->e_institute));
		}
		
        $final_word.='<br/>';
if($alleducation->e_university=='-1'){ 
	
$final_word.=stripslashes($alleducation->e_other_university);
	
	}
	else {
$final_word.=stripslashes(get_university($alleducation->e_university));
		}
 
 }
$final_word.=' </td> 
         
            <td style="background-color:#E4E4E4;" align="center">';
$final_word.=$alleducation->e_passout_year;
 $final_word.='</td> 
         
            <td style="background-color:#E4E4E4;" align="center">';
if($alleducation->e_percentage!=''){
$final_word.=stripslashes($alleducation->e_percentage);

$final_word.='&nbsp;';
if($alleducation->e_percentage_type==1)
$final_word.='%';
$final_word.='CGPA (out of 10)';  
}	
		
$final_word.='</td> 
         </tr>';
		 
		
		
	}
}
}


$final_word.='</table></td></tr>
     
<tr><td colspan="6">&nbsp;</td></tr>
<tr><td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Work Experience:</td></tr>';
$work_experience_query="SELECT * FROM $work_experience_table where m_id='".$_REQUEST[m_id]."'";
$work_query=mysql_query("SELECT * FROM $work_experience_table where m_id='".$_REQUEST[m_id]."'");
		  $count=mysql_num_rows($work_query);
		   while($wid=mysql_fetch_assoc($work_query))
		   {
			   $widlist[]=$wid['we_id'];
		   }
		    $to_work_exp=implode($widlist,',');
		 
$work_experience_result=$db->getResults($work_experience_query);
  foreach($work_experience_result as $work_experience){	
  		 $total_work_exp.=$work_experience->we_id.",";

$final_word.='<tr>	<td  align="left" class="general-bodyBold"><strong>Organization</strong>:</td><td colspan="5">'.stripslashes($work_experience->we_company).'</td></tr>
			     <tr>  <td width="18%" align="left" class=""><strong>Designation</strong>:</td>
		   <td width="82%" colspan="5">'.stripslashes($work_experience->we_designation).'</td>
		   </tr>
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5">';
$from_proj=explode('-',$work_experience->we_from_date);
		   $final_word.=$month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];
	      $final_word.='to';
		        $to_proj=explode('-',$work_experience->we_to_date);
		   $final_word.=$month_array[$to_proj[0]].'&nbsp;'.$to_proj[1];
		  $final_word.='</td></tr>   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>';}
		 $final_word.='<tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>
		    <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Projects:</td></tr>';


 //$work_exp_result=$db->getResults("select * from $work_projects_table where find_in_set(wp_company,'$to_work_exp')"); 
$work_exp_result=$db->getResults("select * from $work_projects_table where m_id='".$_REQUEST[m_id]."'"); 
	if(count($work_exp_result)!='0'){	 

  foreach($work_exp_result as $work_exp){	
  $final_word.='<tr>  <td align="left" class="general-bodyBold"><strong>Company</strong>:</td><td colspan="5">';
   $query=mysql_query("select we_company from rv_work_experience where we_id='".$work_exp->wp_company."'");
	$fetch=mysql_fetch_assoc($query);
	$final_word.=$fetch['we_company'];
				
  $final_word.='</td></tr>';
  $final_word.='<tr>  <td align="left" class="general-bodyBold"><strong>Title</strong>:</td><td colspan="5">'.$work_exp->wp_title.'</td></tr>';
if($work_exp->wp_duration!='' ){
$final_word.='<tr><td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5">';
$final_word.=$work_exp->wp_duration;
 /* $from_exp=explode('-',$work_exp->wp_from_date);
		   $final_word.=$month_array[$from_exp[0]].'&nbsp;'.$from_exp[1];
	      $final_word.='to ';
 $to_exp=explode('-',$work_exp->wp_to_date);
		   $final_word.=$month_array[$to_exp[0]].'&nbsp;'.$to_exp[1];*/
		 $final_word.='</td></tr>';}

	$final_word.='<tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Description</strong>:</td><td colspan="5" style="text-align:justify;">'.stripslashes($work_exp->wp_description).'</td></tr>
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Tools Used </strong>:</td><td colspan="5">'.stripslashes($work_exp->wp_tools).'</td></tr>
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>   </tr>';
 }}else{
$final_word.='<tr><td  class="error" colspan="6" align="center"><strong>No Projects</strong></td></tr>';
}
$final_word.=' <tr>
           <td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:14px;" colspan="6">&nbsp;</td>
         </tr>
         <tr>
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Academic Projects:</td></tr>';

$projects_query="SELECT * FROM $projects_table where m_id='".$_REQUEST[m_id]."'";
		 
$projects_result=$db->getResults($projects_query);
  foreach($projects_result as $projects){
              $final_word.='<tr>  <td align="left" class="general-bodyBold"><strong>Title</strong>:</td><td colspan="5">'.$projects->p_title.'</td></tr>
              <tr>  <td align="left" class="general-bodyBold"><strong>Role</strong>:</td><td colspan="5">'.$projects->p_role.'</td></tr>
			  <tr>	<td  align="left" class="general-bodyBold"><strong>Organization</strong>:</td><td colspan="5">'.$projects->p_company.'</td></tr>
	    	  <tr>	<td  align="left" class="general-bodyBold"><strong>Duration</strong>:</td><td colspan="5">';
			 if($projects->p_duration!='NULL' || $projects->p_duration!=''){
			   $final_word.=$projects->p_duration;
		/*  $final_word.=$month_array[$from_proj[0]].'&nbsp;'.$from_proj[1];
	      $final_word.='to ';
		        $to_proj=explode('-',$projects->p_to_date);
		  $final_word.=$month_array[$to_proj[0]].'&nbsp;'.$to_proj[1]; */}
		  $final_word.='</td></tr>

	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Description</strong>:</td><td colspan="5" style="text-align:justify;">'.$projects->p_description.'</td></tr>
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Tools Used </strong>:</td><td colspan="5">'.$projects->p_tools.'</td></tr>
	  <tr>	<td  align="left" class="general-bodyBold" valign="top"><strong>Deliverable/Challenges Faced:</strong></td><td colspan="5">'.$projects->p_challenges.'</td></tr>
   
         <tr><td style="height: 1px;" colspan="6" bgcolor="#999999" ></td></tr>   </tr>';}

         $final_word.='<tr><td colspan="6">&nbsp;</td></tr>
<tr><td colspan="6">&nbsp;</td></tr>';
$query_achv = "SELECT * FROM $achievements_table where m_id='".$_REQUEST[m_id]."' order by ac_id desc"; 
      $achv_result=$db->getResults($query_achv);
	  $achv_count=count($achv_result);
	  if($achv_count!=0){ 
	  $final_word.='<tr style="overflow: auto;">
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Achievements:</td>
</tr>';

}

$final_word.='<tr><td colspan="6"><ul>';

	  
		$achiv_results=explode("#",$achv_result[0]->ac_description);
for($a=0;$a<count($achiv_results);$a++){
if($achiv_results[$a]!=''){
		
	$final_word.='	<li style="text-align:justify;" >'.stripslashes($achiv_results[$a]).'</li>';
	}}
	
/* $final_word.='<tr><td colspan="6"><ul>';
	    foreach($achv_result as $achivments){
 $final_word.='<li style="text-align:justify;" >'.stripslashes($achivments->ac_title).'</li>
<li style="text-align:justify;" >'.stripslashes($achivments->ac_title1).'</li>
<li style="text-align:justify;" >'.stripslashes($achivments->ac_title2).'</li>';

}
 $final_word.='</ul></td></tr>*/

$final_word.='</ul></td></tr><tr><td colspan="6">&nbsp;</td></tr>';
 if($core_count!=0 && $core_result[0]->cc_array!=''){
  $final_word.='<tr style="overflow: auto;">
<td style="font-family:Verdana, Geneva, sans-serif;font-weight:bold; font-size:14px; background-color:#BEBE7C; height:30px;" colspan="6">Core Competency:</td>
</tr><tr><td colspan="6"><ul>';   
   

	   
		if(in_array('1',$core_array)){

 $final_word.='<li style="text-align:justify;" >Good understanding of fundamentals of Transistors and circuit theory</li>';
}   
		if(in_array('2',$core_array)){

 $final_word.='<li style="text-align:justify;" >Good knowledge of Verilog RTL coding</li>';

}
		if(in_array('3',$core_array)){
	
 $final_word.='<li style="text-align:justify;" >Good knowledge of Digitial Design Concepts</li>';

}
		if(in_array('4',$core_array)){
 $final_word.='<li style="text-align:justify;" >Good exposure to technology by undergoing additional training in VLSI and/or Embedded</li>';

}
		if(in_array('5',$core_array)){

 $final_word.='<li style="text-align:justify;" >Implemented a VLSI and/or embedded project during my undergrad/post grad</li>';
}
		if(in_array('6',$core_array)){
		
		 $final_word.='<li style="text-align:justify;" >Attended technology intensive courses conducted by industry experts on VLSI and Embedded domains</li>';
		  }   
		if(in_array('7',$core_array)){
		
 $final_word.='<li style="text-align:justify;" >Excellent knowledge of IC Fabrication process</li>';}
		if(in_array('8',$core_array)){
 $final_word.='<li style="text-align:justify;" >Good working knowledge of Linux, and C programming</li>';
 }
		if(in_array('-1',$core_array)){
		
 $final_word.='<li style="text-align:justify;" >'.stripslashes($core_result[0]->cc_other).'</li>';

}
 $othcore=explode("#",$core_result[0]->cc_other);
	
	if(count($othcore)!=0 && $core_result[0]->cc_other!=''){
	for($c=0;$c<count($othcore);$c++){
	
	if($othcore[$c]!=''){
	$final_word.='<li style="text-align:justify;" >'.stripslashes($othcore[$c]).'</li>';

	}}}



 $final_word.='</ul></td></tr>';

 }
 $final_word.='<tr>
<td colspan="6"><table width="100%" border="0" cellspacing="3" cellpadding="3">';

 $final_word.='</table></td>
</tr>
<tr><td colspan="6">&nbsp;</td></tr>

<tr><td style="height: 1px;" colspan="6" bgcolor="#000000" ></td></tr>
</table>';
$final_word.="</body>";
$final_word.="</html>";
echo $final_word;
?>