<? session_start();

ini_set('display_errors','Off');
ini_set('log_errors','0');


$username="ncs";
$password="ncs3089";
$hostname="localhost";
$database="ncs";
$server_url="http://www.nanochipsolutions.com/";
	
	
/*$username="kaivalya_vlsi";
$password="CiME)OttuGRG";
$hostname="localhost";
$database="kaivalya_vlsi";*/

/*$server_url="http://www.sksversion.com/rv-vlsi/";
$username="kaivalya_test";
$password="}{uW0&(U76TH";
$hostname="localhost";
$database="kaivalya_test";*/

/*$dblink=mysql_connect("localhost","sachin","");
mysql_select_db("rvvlsi",$dblink);*/
/*$dblink=mysql_connect("localhost","root","");
mysql_select_db("rvvlsi",$dblink);*/
$error_BUG=0;
$reqs_array=$_REQUEST;

if(count($reqs_array)>0)
{
	foreach($reqs_array as $keys=>$values)
	{
		
		if(stristr($values,"union all") || stristr($values,"union") /*|| stristr($values," OR ")*/)
		{
			
		 $error_BUG++;
		}
	}
}

// header("Location: index.php");

function messaging($msgId)
			{ 
			switch($msgId)
				{
				case 1:
					$msg="Inserted.";
				break;
				
				case 2:
					$msg="Updated.";
				break;
				
				case 3:
				$msg="Deleted.";
				break;	
				
				case 4:
				$msg="Invalid EmailId or password.";
				break;
				case 5:
				$msg="old Password Wrong .";
				break;
				case 6:
				$msg="Email Id already exists.";
				break;
				case 7:
				$msg="Your Account is not activated, to  activate your account 
				  <a href = activate_recruiter.php style=text-decoration:none;>CLICK HERE</a>";
				break;
				
				case 8:
				$msg="Your Account is not activated, to  activate your account 
				  <a href = activate_student.php style=text-decoration:none;>CLICK HERE</a>";
				break;
				
				case 9:
				$msg="No Student Selected";
				
				break;
				
				}	
			
			return $msg;
			}
			
			
			
//tables
	
	$admin_table="rv_admin";
	$news_events_table="rv_news_events";
	$page_content_table="rv_page_content";
	$programers_table="rv_programes";
	$video_table="rv_vidoes";
	$pages_table="rv_page_content";
	$sub_program_table="rv_prg_sub";
	$prg_calendar_table="rv_prg_calendar";
	$prg_planner_table='rv_course_planner';
	$contact_us_table='rv_contact_enq';
	$sub_page_content='rv_page_subcontent';
	$members_table='rv_registration';
	$date_table='rv_date';
	$education_table='rv_educational_details';
	$education_table1='rv_educational_details1';
	$genral_information_table = 'rv_genral_information';
	$certification_table = 'rv_certification';
	$voluntary_table = 'rv_voluntary_works';
	$projects_table = 'rv_academic_projects';	
	$resumes_table = 'rv_students_resumes';	
	//$recruiters_table = 'rv_recruiters';
	$jobposting_table = 'rv_job_posting';
	$states  = 'states';
	$countries = 'countries';
	$qualifications_table  ='rv_qualifications';
	$course_table = 'rv_course';
	$institutes ='rv_institutes';
	$universities_table = 'rv_universities';
	$career_preference_table ='career_preference';
	$career_objective_table='rv_career_objective';
	$work_experience_table='rv_work_experience';
	$achievements_table='rv_achievements';
	$core_competecny_table='rv_corecompetency';
	$rec_table = 'rv_recruiters';
	$job_app_table='rv_jobapp';
	$members_questions_answers='rv_members_questions_answers';
	$tests_questions_table='rv_test_questions';
	$tests_table='rv_tests';
	$branch_table = 'rv_branch';
	$members_online_test='rv_members_online_test';
	$proj_work_experience_table='rv_work_proj';
$work_projects_table='rv_work_projects';
$interview_assistant='rv_interview_assistant';
$top_ten_table='rv_top_ten';
$topics_table='rv_forum_topics';
$topics_comments_table='rv_topics_comments';
	
	global $admin_table;
	global $news_events_table;
	global $page_content_table;
	global $pages_table;
	global $programers_table;
	global $video_table;
	global $sub_program_table;
	global $prg_calendar_table;
	global $prg_planner_table;
	global $contact_us_table;
	global $sub_page_content;
	global $rec_table;
	global $job_app_table;
	global $course_table;
	$backlogs = array('No Backlogs','1','2','3','4',);
	
	$year_array  =  array('1970','1971','1972','1973','1974','1975','1976','1977','1978','1979','1980','1981','1982','1983','1984','1985','1986','1987','1988','1989','1990','1991','1992','1993','1994','1995','1996','1997','1998','1999','1999','2000','2001','2002','2003','2004','2005',);

	$month_array  = array('Month','Jan','Feb','Mar','April','May','June','July','Aug','Sep','Oct','Nov','Dec');
	
	
	
	$day_array  = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
	
	
	function replace_name($string)
			{
			$operators=array(" ","!","#","$","%","^","&","*","(",")","=","+","|","/","[","~","]",";",",","'");
			
			
			for($i=0;$i<count($operators);$i++)
					{
					$string=str_replace($operators[$i],"_",$string);
					}
					
			return $string;
			}	
	
	function pagenation($totalrows,$limit,$pn,$page)
					{
							if($pn != 1){ 
								$pageprev = $pn-1;
								
								echo("<a href=\"$page?png=$pageprev\" class='link_green' >Prev</a> "); 
							}
						
							$numofpages = $totalrows / $limit; 
							
							for($i = 1; $i <= $numofpages; $i++){
								if($i == $pn){
									echo($i." ");
								}else{
									echo("<a href=\"$page?png=$i\" class='link_green'>$i</a> ");
								}
							}
						
						
							if(($totalrows % $limit) != 0){
								if($i == $pn){
									echo($i." ");
								}else{
									echo("<a href=\"$page?png=$i\" class='link_green'>$i</a> ");
								}
							}
						
							if(($totalrows - ($limit * $pn)) > 0){
								$pagenext = $pn+1;
								 
								echo("<a href=\"$page?png=$pagenext\" class='link_green'>Next</a>"); 
							}

					}	
	function fetchCountries($selected)
		{
		global $countries;
		//dbconnect :: dbc();
		$countries_qry = "select * from $countries";
		$countries_qry = mysql_query($countries_qry) or die('error at countries'.mysql_error());
			
		$countries= '<select name="txtCountry" id="txtCountry" style="width:150px;" onchange="return SelectState(this.value)">';
		$countries.=  '<option value="0">Select Country</option>';
		$i=1;
		while($countries_result=mysql_fetch_array($countries_qry))
		 {
		 if($countries_result[country_id]==$selected)
		 $sel='selected="selected"';
		 else
		 $sel='';
		$countries.= "<option ".$sel." value=".$countries_result[country_id].">".$countries_result[name]."</option>";
        
		$i++;
		}
       	$countries.= '</select>';
		
		return $countries;
		}
		
		

		function SelectedState($selected)
		{
		//dbconnect :: dbc();
		global $states;
		  $states_qry = "select * from $states";
		$states_qry = mysql_query($states_qry) or die('error at countries.""'.mysql_error());
			
		$states=  '<select name="txtState" id="txtState" style="width:200px">';
		$states.=   '<option value="0">Select State</option>';
		$i=1;
		while($states_result=mysql_fetch_array($states_qry))
		 {
		 if($states_result[state_id]==$selected)
		 $sel='selected="selected"';
		 else
		 $sel='';

		$states.=  "<option ".$sel."  value=".$states_result[state_id].">".$states_result[name]."</option>";
        
		$i++;
		}
       	$states.=  '</select>';
		
		return  $states;
		
		}
		
		function fetchtitle($selected)
		{
		global $qualifications_table;
		//dbconnect :: dbc();
		$qualifications_table_qry = "select * from $qualifications_table";
		$qualifications_table_qry = mysql_query($qualifications_table_qry) or die('error at countries'.mysql_error());
			
		//$titels= '<select name="txtTitle"  onchange="return  Selectcourse(this.value)">';
		if($_REQUEST[action]=='editEduinfo'){
		$dis='disabled="disabled"';
		}else{
		$dis='';
		}
		
		$titels= '<select name="selQulification" id="selQulification" style="width:150px;" '.$dis.' onchange="return  selectQulification(this.value)">';
		
		$i=1;
		while($titels_result=mysql_fetch_array($qualifications_table_qry))
		 {
		 if($titels_result[qua_id]==$selected)
		 $sel='selected="selected"';
		 else
		 $sel='';
		$titels.= "<option ".$sel." value=".$titels_result[qua_id].">".$titels_result[qua_title]."</option>";
        
		$i++;
		}
       	$titels.= '</select>';
		
		return $titels;
		}
		
		function Selectedcourse($selected)
		{
		//dbconnect :: dbc();
	global $course_table;
		  $states_qry = "select * from $course_table ";
		$states_qry = mysql_query($states_qry) or die('error at courses'.mysql_error());
			
		$states=  '<select name="selCourse" id="selCourse" style="width:150px;">';
		
		$i=1;
		while($states_result=mysql_fetch_array($states_qry))
		 {
		 if($states_result[e_course]==$selected)
		 $sel='selected="selected"';
		 else
		 $sel='';

		$states.=  "<option ".$sel."  value=".$states_result[e_course].">".$states_result[cor_name]."</option>";
        
		$i++;
		}
       	$states.=  '</select>';
		
		return  $states;
		
		}
	
function rvStudents($m_id){
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

 $rv_student_query = "select * from rv_educational_details where e_institute='41' and m_id='".$m_id."'";
 $rv_student_result=$db->getResults($rv_student_query);
 if(count($rv_student_result)!='0'){
 $return='<img src="../images/small_logo.png"  border="0"/>';
 }else{
  $return='';
 }
 
   return $return;
}	
	
function emplFactorEducation($m_id){
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

 $rv_marks='';
 
 // 10th class
 $student_10th=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='5'");

if($student_10th[0]->e_agg_marks>=60 && count($student_10th)!=0){
$rv_marks+=5;
}

 
 // inter or 12th class
 $student_12th=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='4'");

if($student_12th[0]->e_agg_marks>60 && count($student_12th)!=0){
$rv_marks+=5;
}

 // For Deplamo
  $student_dep=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='3'");

if(count($student_dep)!=0){
$rv_marks+=25;
} 
 //  For graduation except  BE or B.tach
  $student_graduation=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='2' and (e_course!=25 or e_course!=26)");

if(count($student_graduation)!=0){
$rv_marks+=25;
}   
  //  For graduation ( BE or B.tach)
  $student_be=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='2' and (e_course=25 or e_course=26)");

if(count($student_be)!=0){

// b.tech in NIT,IIT AND ISSC
if($student_be[0]->insti_id=='1' || $student_be[0]->insti_id=='2' || $student_be[0]->insti_id=='3'){
if($student_be[0]->e_agg_marks<60){
$rv_marks+=45;
}else{
$rv_marks+=50;
}
}else{
// b.tech in all colleges
if($student_be[0]->e_agg_marks<60){
$rv_marks+=40;
}else{
$rv_marks+=45;
}
}   
  }
  
   //  For PG ( ME or METECH)
  $student_pg=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='1' ");

if(count($student_pg)!=0){

// b.tech in ME	,MTACH,MS
if($student_pg[0]->e_course=='1' || $student_pg[0]->e_course=='11' || $student_pg[0]->e_course=='13'){
if($student_pg[0]->e_course=='13' && $student_pg[0]->e_country!=99){
// ms in abroad
$rv_marks+=20;
}else{
$rv_marks+=15;
}
}else{
// PG IN OTHER BRANCHES

$rv_marks+=10;

}   
  }
  return $rv_marks;
 }


function emplFactorWork($m_id){
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

 $rv_marks='';
    $projects_employee=$db->getResults("select * from rv_work_projects where m_id='".$m_id."'");
	  $project_emp_count=count($projects_employee);
	  
	  if($project_emp_count!=0 && $projects_employee[0]->p_end=='VLSI'){
	  $rv_marks+=5;
	  }
	  
	  $comp=strtolower($projects_employee[0]->p_company);
	  //$rvvlsi='vlsi';
	 
    $pos = strpos($comp, "vlsi");
    if ($project_emp_count!=0 && $pos == true) {
       $rv_marks+=5;
    } 
	  
	  
	  
	    if($project_count123!=0 && $projects_exployee123[0]->p_end=='VLSI'){
	  $rv_marks+=10;
	  } 


// number of years
     $works_experince_employee=$db->getResults("SELECT * FROM rv_work_experience where m_id='".$m_id."'"); 
   $works_employee_count=count($works_experince_employee);
   if($works_employee_count!=0){
   $emp_from=explode('-',$works_experince_employee[0]->From_date);
    $emp_to=explode('-',$works_experince_employee[0]->To_date);

$num_years=$emp_to[1]-$emp_from[1];
if($num_years>=1){
$total_points=$num_years*2;
 $rv_marks+=$total_points;
}

}return $rv_marks;
}
	
function employabilityFactor($m_id){
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

 $rv_marks='';
 
 // 10th class
 $student_10th=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='5'");

if($student_10th[0]->e_agg_marks>=60 && count($student_10th)!=0){
$rv_marks+=5;
}

 
 // inter or 12th class
 $student_12th=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='4'");

if($student_12th[0]->e_agg_marks>60 && count($student_12th)!=0){
$rv_marks+=5;
}

 // For Deplamo
  $student_dep=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='3'");

if(count($student_dep)!=0){
$rv_marks+=25;
} 
 //  For graduation except  BE or B.tach
  $student_graduation=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='2' and (e_course!=25 or e_course!=26)");

if(count($student_graduation)!=0){
$rv_marks+=25;
}   
  //  For graduation ( BE or B.tach)
  $student_be=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='2' and (e_course=25 or e_course=26)");

if(count($student_be)!=0){

// b.tech in NIT,IIT AND ISSC
if($student_be[0]->insti_id=='1' || $student_be[0]->insti_id=='2' || $student_be[0]->insti_id=='3'){
if($student_be[0]->e_agg_marks<60){
$rv_marks+=45;
}else{
$rv_marks+=50;
}
}else{
// b.tech in all colleges
if($student_be[0]->e_agg_marks<60){
$rv_marks+=40;
}else{
$rv_marks+=45;
}
}   
  }
  
   //  For PG ( ME or METECH)
  $student_pg=$db->getResults("select * from rv_educational_details where m_id='".$m_id."' and qua_id='1' ");

if(count($student_pg)!=0){

// b.tech in ME	,MTACH,MS
if($student_pg[0]->e_course=='1' || $student_pg[0]->e_course=='11' || $student_pg[0]->e_course=='13'){
if($student_pg[0]->e_course=='13' && $student_pg[0]->e_country!=99){
// ms in abroad
$rv_marks+=20;
}else{
$rv_marks+=15;
}
}else{
// PG IN OTHER BRANCHES

$rv_marks+=10;

}   
  }
 
     $projects_employee=$db->getResults("select * from rv_work_projects where m_id='".$m_id."'");
	  $project_emp_count=count($projects_employee);
	  
	  if($project_emp_count!=0 && $projects_employee[0]->p_end=='VLSI'){
	  $rv_marks+=5;
	  }
	  
	  $comp=strtolower($projects_employee[0]->p_company);
	  //$rvvlsi='vlsi';
	 
    $pos = strpos($comp, "vlsi");
    if ($project_emp_count!=0 && $pos == true) {
       $rv_marks+=5;
    } 
	  
	  
	  
	    if($project_count123!=0 && $projects_exployee123[0]->p_end=='VLSI'){
	  $rv_marks+=10;
	  } 


// number of years
     $works_experince_employee=$db->getResults("SELECT * FROM rv_work_experience where m_id='".$m_id."'"); 
   $works_employee_count=count($works_experince_employee);
   if($works_employee_count!=0){
   $emp_from=explode('-',$works_experince_employee[0]->From_date);
    $emp_to=explode('-',$works_experince_employee[0]->To_date);

$num_years=$emp_to[1]-$emp_from[1];
if($num_years>=1){
$total_points=$num_years*2;
 $rv_marks+=$total_points;
}

}
 
return $rv_marks;
}	


// Forum Code Added By Srihari
function forum_comments($t_id,$tc_id,$m)
			{
			global $topics_comments_table,$m,$style1,$desgination_compnay,$company_compnay;

	$comments_query=mysql_query("select * from $topics_comments_table where p_tc_id=$tc_id and tp_id=$t_id ") or die(mysql_error());

	if(mysql_num_rows($comments_query)==0)
$comments.=forum_comments1($t_id,$tc_id,$m);
	else {
	$width=700-(40*$m);
	$v_width=$width-220;
	
	$comments.="<tr bgcolor='#FFFFFF' align='right'><td  colspan=3><div align='right'><Table width='$width'  cellpadding='0' cellspacing='0' border='0' align='right'>";
				$k=0;
				while($show_comments=mysql_fetch_array($comments_query))
						{
						
						
					
//echo "Select * from $topics_comments_table where p_tc_id=$show_comments[tc_id] and tp_id=$t_id <bR>";									
									
$child_comments=mysql_query("Select * from $topics_comments_table where p_tc_id=$show_comments[tc_id] and tp_id=$t_id ") or die(mysql_error());

							if(mysql_num_rows($child_comments)>0)
									{$m++;
									
		$comments.='<tr height="25" style="padding-bottom:2px;">
		  <td  bgcolor="#F4F4F4" width="'.$v_width.'px" ><div align="left" style="padding: 2px 13px 3px 3px;">'.stripslashes($show_comments[tc_comments]).'</div></td>
		   <td width="120" bgcolor="#F4F4F4" align="left" style="padding-bottom:2px;">'.stripslashes($desgination_compnay[$show_comments[tm_id]]).'<br>'.stripslashes($company_compnay[$show_comments[tm_id]]).' </td>
		  <td width="100" bgcolor="#F4F4F4" align="center">'.date("d M, Y",$show_comments[tc_date]).'<br />
		 <a onclick="GB_showCenter(\'Comment\', \'../comments_comment.php?t_id='.$t_id.'&tc_id='.$show_comments[tc_id].'\',300,600); return false;"   href="#">Reply</a>   
		  </td>
		  </tr><tr style="height:1px; background-color:#C2E0FA"><td colspan=3></td></tr><tr style="height:3px; background-color:#ffffff"><td></td></tr>';
							$comments.=forum_comments($t_id,$show_comments[tc_id],$m);
							
							
										}
								else
								{
							
												
							
						
				$comments.='<tr height="25" style="padding-bottom:2px;" >
		  <td  bgcolor="#F4F4F4" width="'.$v_width.'px"><div align="left" style="padding: 2px 13px 3px 3px;">'.stripslashes($show_comments[tc_comments]).'</div></td>
		   <td width="120" bgcolor="#F4F4F4" align="left" style="padding-bottom:2px;">'.stripslashes($desgination_compnay[$show_comments[tm_id]]).'<br>'.stripslashes($company_compnay[$show_comments[tm_id]]).' </td>
		  <td width="100" bgcolor="#F4F4F4" align="center" >'.date("d M, Y",$show_comments[tc_date]).'<br />
		 <a onclick="GB_showCenter(\'Comment\', \'../comments_comment.php?t_id='.$t_id.'&tc_id='.$show_comments[tc_id].'\',300,600); return false;"   href="#">Reply</a>   
		  </td>
		  </tr><tr style="height:1px; background-color:#CCC;"><td colspan=3></td></tr><tr style="height:3px; background-color:#ffffff"><td></td></tr>';
		   $m=0;
		 			 $k++;
						}
				}
				
				//echo $comments."<br>";
				$comments.="</table></div></td></tr>";
			}
			
			
			return $comments;
			}
	

function forum_comments1($t_id,$tc_id,$m)				
				{
				global $topics_comments_table,$m,$style1,$desgination_compnay,$company_compnay;
				$width=700-(40*$m);
				
				$v_width=$width-220;
	$comments_query=mysql_query("select * from $topics_comments_table where tc_id=$tc_id and tp_id=$t_id ") or die(mysql_error());
	$comments.="<tr align='right'><td bgcolor='#FFFFFF' align='right' ><div align='right'><Table width='$width'  cellpadding='1' cellspacing='0' border='0' align='right' style='padding-top:5px;'>";
while($show_comments=mysql_fetch_array($comments_query))
						{
						
				
			$comments.='<tr height="25" style="padding-bottom:2px;" >
		  <td  bgcolor="#F4F4F4" width="'.$v_width.'px"><div align="left" style="padding: 2px 13px 3px 3px;">'.stripslashes($show_comments[tc_comments]).'</div></td>
		   <td width="120" bgcolor="#F4F4F4" align="center" style="padding-bottom:2px;">'.stripslashes($desgination_compnay[$show_comments[tm_id]]).'<br>'.stripslashes($company_compnay[$show_comments[tm_id]]).' </td>
		  <td width="100" bgcolor="#F4F4F4" align="center">'.date("d M, Y",$show_comments[tc_date]).'<br />
		 <a onclick="GB_showCenter(\'Comment\', \'../comments_comment.php?t_id='.$t_id.'&tc_id='.$show_comments[tc_id].'\',300,600); return false;"   href="#">Reply</a>   
		  </td>
		  </tr><tr style="height:1px; background-color:#C2E0FA"><td colspan=3></td></tr><tr style="height:3px; background-color:#ffffff"><td></td></tr>';
		  $m=0;
		 			 $k++;
						}
				$comments.="</table></div></td></tr>";
				return $comments;
				}	
				function page_hit_counter($post_id,$post_type)
{ //echo "srihari";die;
	 //echo "select tp_hit from $forum_topics_table where tp_id='".$post_id."'";die;
	$get_hit_count_query = mysql_query("select tp_hit from $topics_table where tp_id='".$post_id."'") or die("didn't retrive hit ".mysql_error());
	$hit_count = mysql_fetch_array($get_hit_count_query);
	$hit = $hit_count[p_hit]+1;
	mysql_query("update $topics_table set tp_hit='".$hit."' where tp_id='".$post_id."'") or die("didn't update hit data ".mysql_error());



}


	



?>