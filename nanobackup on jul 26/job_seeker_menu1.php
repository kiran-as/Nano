<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

 
	$db=new dataBase();
   $db->connectDB(); 
   $check=new checkingAuth();
   $check->loginCheck();   
  $input=new inputFields();	
    $ch=new checkInputFields();	
   
 include_once('config/header1.php');?> 	
 
 
 <?
  

 if(isset($_POST['infoUpdate']))
 {
$info_query="update $members_table  set m_father_name='".$ch->checkFields($_POST['txtFatherName'])."',
								      m_address='".$ch->checkFields($_POST['txtAddress'])."',
								      m_fname='".$ch->checkFields($_POST['txtFirstName'])."',
								      m_lname='".$ch->checkFields($_POST['txtLastName'])."',
								    m_martial_status='".$ch->checkFields($_POST['txtMartialStatus'])."',
									m_hobbies='".$ch->checkFields($_POST['txtHobbies'])."',
									m_city='".$ch->checkFields($_POST['txtCity'])."', 
									m_state='".$ch->checkFields($_POST['selState'])."', 
									m_other_state='".$ch->checkFields($_POST['txtState'])."', 
									m_country='".$ch->checkFields($_POST['selCountry'])."', 
									m_phone='".$ch->checkFields($_POST['txtPhoneNumber'])."', 
									m_objective='".$ch->checkFields($_POST['areaObjective'])."', 
									m_skills='".$ch->checkFields($_POST['areaSkills'])."', 
									m_std_code ='".$ch->checkFields($_POST['txtStdCode'])."',
									m_nationality='".$ch->checkFields($_POST['txtNationality'])."',
									m_languages ='".$ch->checkFields($_POST['txtLanguages'])."',
									m_pincode ='".$ch->checkFields($_POST['txtPinCode'])."',
									m_gender ='".$ch->checkFields($_POST['txtGender'])."',
									m_day ='".$ch->checkFields($_POST['txtDay'])."',
									m_month ='".$ch->checkFields($_POST['txtMonth'])."',
									m_year ='".$ch->checkFields($_POST['txtYear'])."',
									m_contact_number ='".$ch->checkFields($_POST['txtContactNo'])."',
									m_dob='".$ch->checkFields($txtDat)."' where m_id='".$_SESSION[m_id]."'";
									
						
 $result=$db->insertRecord($info_query);
$_REQUEST[msg]=2;
$tab=0;
			
//header("Location:job_seeker_menu.php?tab=0&msg=2");
	echo '<script>document.location="job_seeker_menu.php?tab=0&msg=2";</script>';

 				}	
 
 if(isset($_POST['insert']))
 {
 echo $_POST['Rvstudent'];
$info_query="update  $members_table set m_student = '".$ch->checkFields($_POST['Rvstudent'])."' where m_id='".$_SESSION[m_id]."'";
 $result=$db->insertRecord($info_query);
$_REQUEST[msg]=2;
$tab=0;
			
//header("Location:job_seeker_menu.php?tab=0&msg=2");
	echo '<script>document.location="job_seeker_menu.php?tab=1&msg=2";</script>';

 				}	
 
 // career update
 
if(isset($_POST['objectiveUpdate']))
{
 
 $query="select * from $career_objective_table where m_id='".$_SESSION[m_id]."'";
$career_obj=$db->getResults($query);
  foreach($career_obj as $career){}
 
if(($career_obj)==0)
$insert_query="insert into  $career_objective_table  set co_objective = '".$ch->checkFields($_POST['Career'])."',m_id='".$_SESSION[m_id]."'";
else
$insert_query="update $career_objective_table  set co_objective = '".$ch->checkFields($_POST['Career'])."' where m_id='".$_SESSION[m_id]."'";
$result=$db->insertRecord($insert_query);
$_REQUEST[msg]=2;
$tab=1;
			
	//header("Location:job_seeker_menu.php?tab=1&msg=2");
echo '<script>document.location="job_seeker_menu.php?tab=1&msg=2";</script>';

}
//end of career section

if(isset($_POST['coreInsert']))
 {
 $media_array='';
$media_array = implode(',',$_POST['chkCareer']);


  $query_career=$db->getResults("SELECT * FROM $core_competecny_table where m_id='".$_SESSION[m_id]."'"); 
	  if(count($query_career)==0){
$query_car = "INSERT INTO $core_competecny_table set m_id='".$_SESSION[m_id]."',cc_array='$media_array',cc_other='$_POST[carrerArae]'";
}else{
$query_car = "update $core_competecny_table set cc_array='$media_array',cc_other='$_POST[carrerArae]' where  m_id='".$_SESSION[m_id]."'";
}
									
$result=$db->insertRecord($query_car);


header("Location:job_seeker_menu.php?tab=1&msg=1");
}/*
 if(isset($_POST['coreInsert']))
 {
 foreach($_POST['media'] as $value){
    $query="insert into $core_competecny_table (cc_title,m_id) values ('$value','".$_SESSION[m_id]."')";
  
    
									
$result=$db->insertRecord($query);
}
if($_POST['coreInsert']!='Save'){
$action='new';
}
$_REQUEST[msg]=1;
$tab='2';
header("Location:job_seeker_menu.php?tab=1&msg=1&action=$action");
} */
 
// core competency
/*
if(isset($_POST['coreInsert']))
 {
 
$period=$_POST[selFrom]."-".$_POST[selFrom];
$info_query="insert into $core_competecny_table  set cc_title='".$ch->checkFields($_POST['txtTitle'])."',
                                                         m_id='".$_SESSION[m_id]."',
                                                    cc_qsummery='".$ch->checkFields($_POST['Qualification'])."',
                                                    cc_professional_skills='".$ch->checkFields($_POST['Professional'])."',
                                                    cc_techenical_skills='".$ch->checkFields($_POST['Technical'])."',
													cc_transistor='".$ch->checkFields($_POST['chkTransitor'])."',
													cc_verilog='".$ch->checkFields($_POST['chkVerilog'])."',
													cc_digital='".$ch->checkFields($_POST['chkDigitial_Design'])."',
													cc_vlsi='".$ch->checkFields($_POST['chkVlsi'])."',
													cc_embeded='".$ch->checkFields($_POST['chkEmbeded'])."',
													cc_industry='".$ch->checkFields($_POST['chkIndustry'])."',
													cc_ic='".$ch->checkFields($_POST['chkIc'])."',
													cc_linux='".$ch->checkFields($_POST['chkLinux'])."',
													cc_others='".$ch->checkFields($_POST['chkOthers'])."',
                                                    cc_tools_used='".$ch->checkFields($_POST['Tools'])."'";
													
									
$result=$db->insertRecord($info_query);

if($_POST['coreInsert']!='Save'){
$action='new';
}
$_REQUEST[msg]=1;
$tab='2';
header("Location:job_seeker_menu.php?tab=1&msg=1&action=$action");
}	
 */
 
if(isset($_POST['coreUpdate']))
 {
 
 $period=$_POST[selFrom]."-".$_POST[selTo];
$info_query="update $core_competecny_table  set cc_title='".$ch->checkFields($_POST['txtTitle'])."',
                                                    m_id='".$_SESSION[m_id]."',
 	                                                cc_qsummery='".$ch->checkFields($_POST['Qualification'])."',
	                                                cc_professional_skills='".$ch->checkFields($_POST['Professional'])."',
	                                                cc_techenical_skills='".$ch->checkFields($_POST['Technical'])."',
													cc_transistor='".$ch->checkFields($_POST['chkTransitor'])."',
													cc_verilog='".$ch->checkFields($_POST['chkVerilog'])."',
													cc_digital='".$ch->checkFields($_POST['chkDigitial_Design'])."',
													cc_vlsi='".$ch->checkFields($_POST['chkVlsi'])."',
													cc_embeded='".$ch->checkFields($_POST['chkEmbeded'])."',
													cc_industry='".$ch->checkFields($_POST['chkIndustry'])."',
													cc_ic='".$ch->checkFields($_POST['chkIc'])."',
													cc_linux='".$ch->checkFields($_POST['chkLinux'])."',
													cc_others='".$ch->checkFields($_POST['chkOthers'])."',
	                                                cc_tools_used='".$ch->checkFields($_POST['Tools'])."' where cc_id='".$_REQUEST[cc_id]."'";
 $result=$db->insertRecord($info_query);
 $_REQUEST[msg]=2;
$tab='2';

//header("Location:job_seeker_menu.php?tab=1&msg=2");

echo '<script>document.location="job_seeker_menu.php?tab=1&msg=2";</script>';
 }	 
 
if($_REQUEST[menu]=='coreDelete' && is_numeric($_REQUEST[cr_id])!='')
 {
$delete_query="delete from $core_competecny_table where cc_id='".$_REQUEST[cr_id]."'";
$result=$db->deleteRecord($delete_query);
$_REQUEST[msg]=3;
$tab='2';
//header("Location:job_seeker_menu.php?tab=1&msg=3");
 //header("Location:core_competency.php?msg=3");

echo '<script>document.location="job_seeker_menu.php?tab=1&msg=3";</script>';
 }	 
 
 
 // end of competency//
 
 //Achievements 
 if(isset($_POST['achInsert']))
 {
 
//$period=$_POST[selFrom]."-".$_POST[selFrom];
$info_query="insert into $achievements_table  set ac_title='".$ch->checkFields($_POST['txtAchiveTitle'])."',m_id='".$_SESSION[m_id]."'";
									
$result=$db->insertRecord($info_query);
$_REQUEST[msg]=1;
if($_POST['achInsert']!='Save'){
$action='new';
}
$tab='2';
 //header("Location:core_competency.php?msg=3");
//header("Location:job_seeker_menu.php?tab=1&msg=3&action=$action");
echo '<script>document.location="job_seeker_menu.php?tab3=&msg=3&action=$action";</script>';
}	
 
 
if(isset($_POST['accAchiv']))
 {


$update_ach_query="update $achievements_table  set ac_title='".$ch->checkFields($_POST['txtAchiveTitle'])."', m_id='".$_SESSION[m_id]."' where ac_id='".$_REQUEST[ac_id]."'";
 $result=$db->insertRecord($update_ach_query);
 $_REQUEST[msg]=2;
$tab='1';

echo '<script>document.location="job_seeker_menu.php?tab=1&msg=2";</script>';
//header("Location:job_seeker_menu.php?tab=1&msg=2");
 }	 

 
  if(isset($_POST['wepInsert']))
 {
 
//$period=$_POST[selFrom]."-".$_POST[selFrom];
$info_query="insert into $proj_work_experience_table  set wep_title='".$ch->checkFields($_POST['txtTitle'])."',m_id='".$_SESSION[m_id]."', wep_description='".$ch->checkFields($_POST['Qualification'])."'";
									
$result=$db->insertRecord($info_query);
$_REQUEST[msg]=1;
$tab='4';
echo '<script>document.location="job_seeker_menu.php?tab=3&msg=1";</script>';
//header("Location:job_seeker_menu.php?tab=3&msg=1");
}	
 
 
if(isset($_POST['wepCore']))
 {/*
 
// $period=$_POST[selFrom]."-".$_POST[selTo];
$info_query="update $proj_work_experience_table  set wep_title='".$ch->checkFields($_POST['txtTitle'])."', m_id='".$_SESSION[m_id]."',	wep_description='".$ch->checkFields($_POST['Qualification'])."' where wep_id='".$_REQUEST[wep_id]."'";
 $result=$db->insertRecord($info_query);
 $_REQUEST[msg]=2;
$tab='4';
header("Location:job_seeker_menu.php?tab=3");

 */}	
 if($_REQUEST[menu]=='workDel' && is_numeric($_REQUEST[we_id])!='')
 {

$db->deleteRecord("delete from $work_experience_table where we_id='".$_REQUEST[we_id]."'");
$db->deleteRecord("delete from $work_projects_table where we_id=$_REQUEST[we_id]");

$_REQUEST[msg]=3;
$tab='4';
 //header("Location:core_competency.php?msg=3");

echo '<script>document.location="job_seeker_menu.php?tab=2&msg=3";</script>';

//header("Location:job_seeker_menu.php?tab=3&msg=3");
 }
 /*
 if($_REQUEST[menu]=='eduDel' && is_numeric($_REQUEST[e_id])!='')
 {
$delete_query="delete from $education_table where e_id='".$_REQUEST[e_id]."'";
$result=$db->deleteRecord($delete_query);
$_REQUEST[msg]=3;
$tab='3';
 //header("Location:core_competency.php?msg=3");
echo '<script>document.location="job_seeker_menu.php?tab=2&msg=3";</script>';

//header("Location:job_seeker_menu.php?tab=2&msg=3");
 } 
 */
  if($_REQUEST[menu]=='eduDel' && is_numeric($_REQUEST[e_id])!='')
 {
$delete_query="delete from $education_table1 where e_id='".$_REQUEST[e_id]."'";
$result=$db->deleteRecord($delete_query);
$_REQUEST[msg]=3;
$tab='3';
 //header("Location:core_competency.php?msg=3");
echo '<script>document.location="job_seeker_menu.php?tab=1&msg=3";</script>';

//header("Location:job_seeker_menu.php?tab=2&msg=3");
 } 
  /*
 if(isset($_POST['eduSave']))
 {
		for($i=0;$i<$count;$i++){
 $edu_update_query="UPDATE  $education_table1 SET qua_id='$txtQua[$i]', m_id='".$_SESSION[m_id]."', branch_name='$selBranch[$i]',e_start='$selMonth[$i]',e_end='$selPassedyear[$i]',e_start1='$selMonth1[$i]',e_end1='$selPassedyear1[$i]',insti_name='$selInst[$i]',e_university='$selUniv[$i]',e_city='$txtCity[$i]',e_percentage='$percentage[$i]' WHERE e_id='$e_id[$i]'";
 //$result=mysql_query($edu_update_query); 
 
  $result=$db->insertRecord($edu_update_query);
  }
				*/
				
//*** Update Condition ***//
if(isset($_POST['eduSave']))
{
	for($i=1;$i<=$_POST["hdnLine"];$i++)
	{
		$strSQL = "UPDATE rv_educational_details1 SET ";
		
		$strSQL .="qua_id = '".$_POST["txtQua$i"]."' ";
		$strSQL .=",branch_name = '".$_POST["selBranch$i"]."' ";
		$strSQL .=",e_start = '".$_POST["e_start$i"]."' ";
		$strSQL .=",e_end = '".$_POST["e_end$i"]."' ";
		$strSQL .=",e_start1 = '".$_POST["e_start1$i"]."' ";
		$strSQL .=",e_end1 = '".$_POST["e_end1$i"]."' ";
		$strSQL .=",insti_name = '".$_POST["insti_name$i"]."' ";
		$strSQL .=",e_university = '".$_POST["e_university$i"]."' ";
		$strSQL .=",e_city = '".$_POST["e_city$i"]."' ";
		$strSQL .=",e_percentage = '".$_POST["e_percentage$i"]."' ";
		$strSQL .=",m_id = '".$_SESSION[m_id]."' ";
		$strSQL .="WHERE e_id = '".$_POST["hdnID$i"]."' ";
		$objQuery = mysql_query($strSQL);
		//$result=$db->insertRecord($strSQL);
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
				
$edumsg='Updated';
$tab='3';
echo '<script>document.location="job_seeker_menu.php?tab=1&msg=2";</script>';
//header("Location:job_seeker_menu.php?tab=2&msg=2");
 }

if(isset($_POST['eduInsert']))
{
 $Qua = $_POST['txtQua'];
 $Branch= $_POST['selBranch'];
$Month = $_POST['selMonth'];
$Pass = $_POST['selPassedyear'];
$Month1 = $_POST['selMonth1'];
$Pass1 = $_POST['selPassedyear1'];
$Inst = $_POST['selInst'];
$University = $_POST['selUniv'];
$City = $_POST['txtCity'];
$Percentage = $_POST['percentage'];

$limit = count($Branch);

for($i=0;$i<$limit;$i++) {
	$Qua[$i] = mysql_real_escape_string($Qua[$i]);
    $Branch[$i] = mysql_real_escape_string($Branch[$i]);
    $Month[$i] = mysql_real_escape_string($Month[$i]);
    $Pass[$i] = mysql_real_escape_string($Pass[$i]);
	$Month1[$i] = mysql_real_escape_string($Month1[$i]);
    $Pass1[$i] = mysql_real_escape_string($Pass1[$i]);
    $Inst[$i] = mysql_real_escape_string($Inst[$i]);
    $University[$i] = mysql_real_escape_string($University[$i]);
    $City[$i] = mysql_real_escape_string($City[$i]);
    $Percentage[$i] = mysql_real_escape_string($Percentage[$i]);

    $query = "INSERT INTO  $education_table1 (`qua_id`, `m_id`,`branch_name` , `e_start` , `e_end` ,`e_start1`,`e_end1`, `insti_name` ,`e_university`,`e_city`,`e_percentage`) VALUES ('".$Qua[$i]."','".$_SESSION[m_id]."','".$Branch[$i]."','".$Month[$i]."','".$Pass[$i]."','".$Month1[$i]."','".$Pass1[$i]."','".$Inst[$i]."','".$University[$i]."','".$City[$i]."','".$Percentage[$i]."')";

   $result=$db->insertRecord($query);
}
if($_POST[eduInsert]!='Save'){
$action='new';

} 
 

$tab='3';

echo '<script>document.location="job_seeker_menu.php?tab=1&msg=1&action='.$action.'";</script>';
//header("Location:job_seeker_menu.php?tab=2&msg=1");  

}


 
 if(isset($_POST['workInsert']))
 	{

 
 $mktime_from=mktime(0,0,0,$_POST['txtFromMonth'],1,$_POST['selFromYear']);
 $mktime_to=mktime(0,0,0,$_POST['txtToMonth'],1,$_POST['selToYear']);
 $month=round(($mktime_to-$mktime_from)/(30*24*60*60));
  
$from=$_POST['selMonth'].'-'.$_POST['selYear'];
$to=$_POST['selMonth1'].'-'.$_POST['selYear1'];
$work_insert_query="insert into $work_experience_table  set we_company='".$ch->checkFields($_POST['txtCompany'])."',
	we_designation='".$ch->checkFields($_POST['txtDesignation'])."',we_project='".$ch->checkFields($_POST['txtProject'])."',we_other='".$ch->checkFields($_POST['txtExp'])."',
	From_date='".$from."',To_date='".$to."',m_id='".$_SESSION[m_id]."',we_type = '".$ch->checkFields($_POST['txtType'])."'";

					
$db->insertRecord($work_insert_query);

 $proj_work_result=$db->getResults("select * from $work_projects_table where we_id='0'");

$work_id=mysql_insert_id();
foreach($proj_work_result as $proj_work){

$db->insertRecord("update $work_projects_table  set we_id='".$work_id."' where wp_id='".$proj_work->wp_id."'");

}

if($_POST[workInsert]!='Save'){
$action='new';

} 
$_REQUEST[msg]=1;
$tab='4';

echo '<script>document.location="job_seeker_menu.php?tab=2&msg=1&action=$action";</script>';
	//header("Location:job_seeker_menu.php?tab=3&msg=1&action=$action");
	}
	
	
	  if(isset($_POST['updateWork']))
 	{

 
 $mktime_from=mktime(0,0,0,$_POST['txtFromMonth'],1,$_POST['selFromYear']);
 $mktime_to=mktime(0,0,0,$_POST['txtToMonth'],1,$_POST['selToYear']);
 $month=round(($mktime_to-$mktime_from)/(30*24*60*60));
  
$from=$_POST['selMonth'].'-'.$_POST['selYear'];
$to=$_POST['selMonth1'].'-'.$_POST['selYear1'];
$work_insert_query="update $work_experience_table  set we_company='".$ch->checkFields($_POST['txtCompany'])."',
	we_designation='".$ch->checkFields($_POST['txtDesignation'])."',we_project='".$ch->checkFields($_POST['txtProject'])."',we_other='".$ch->checkFields($_POST['txtExp'])."',
	From_date='".$from."',To_date='".$to."',m_id='".$_SESSION[m_id]."',we_type = '".$ch->checkFields($_POST['txtType'])."' where we_id='".$_REQUEST[we_id]."'";

$select_wp=$db->insertRecord($work_insert_query);
//echo $select_wp;

$_REQUEST[msg]=2;
$tab='4';

	echo '<script>document.location="job_seeker_menu.php?tab=3&msg=2";</script>';
	
	//header("Location:job_seeker_menu.php?tab=3&msg=2");
	}
 
if($_REQUEST[menu]=='achvment' && is_numeric($_REQUEST[ac_id])!='')
 {
$delete_query="delete from $achievements_table where ac_id='".$_REQUEST[ac_id]."'";
$result=$db->deleteRecord($delete_query);
$_REQUEST[msg]=3;
$tab='6';
 //header("Location:core_competency.php?msg=3");
header("Location:job_seeker_menu.php?tab=4&msg=3");} 
 if($_REQUEST[menu]=='work_proj_delete' && is_numeric($_REQUEST[wp_id])!='')
 {
$delete_query="delete from $work_projects_table where wp_id='".$_REQUEST[wp_id]."'";
$result=$db->deleteRecord($delete_query);
$_REQUEST[msg]=3;
$tab='6';


echo '<script>document.location="job_seeker_menu.php?tab=4&msg=3";</script>';
//header("Location:job_seeker_menu.php?tab=4&msg=3"); 
} 
	
  
 if(isset($_POST['projectUpdate']))
 {
 
 $period=$_POST[selFrom]."-".$_POST[selTo];
  $from=$_POST['selFrom'].'-'.$_POST['selFromYear'];
   $to=$_POST['selMonth1'].'-'.$_POST['selYear1'];
 	$info_query="update $projects_table  set p_title = '".$ch->checkFields($_POST['txtTitle'])."',
								             p_company ='".$ch->checkFields($_POST['txtCompany'])."',
									         p_role = '".$ch->checkFields($_POST['txtRole'])."',
									         p_period	='".$ch->checkFields($period)."', 
											 m_id='".$_SESSION[m_id]."', 
											   p_teamsize = '".$ch->checkFields($_POST['TeamSize'])."', 
											   p_from_date = '".$ch->checkFields($from)."', 
											 p_to_date = '".$ch->checkFields($to)."',
											 p_end='".$ch->checkFields($_POST['selProject'])."',
											  p_other_tech = '".$ch->checkFields($_POST['txtOtherproject'])."',
											 p_description='".$ch->checkFields($_POST['areaDescription'])."',
											 p_tools='".$ch->checkFields($_POST['areaTools'])."',
											 p_challenges='".$ch->checkFields($_POST['areaChallenges'])."'  
											 where p_id='".$_REQUEST[p_id]."'";
									
									
 $result=$db->insertRecord($info_query);
 $_REQUEST[msg]=2;
$tab='5';
//header("Location:job_seeker_menu.php?tab=4&msg=2");
echo '<script>document.location="job_seeker_menu.php?tab=4&msg=2";</script>';
}
 
 
 
  if(isset($_POST['projectInsert']))
 {
 
   // $period = $_REQUEST[selFrom]."-".$_REQUEST[selTo];
    $from=$_POST['selFrom'].'-'.$_POST['selFromYear'];
   $to=$_POST['selMonth1'].'-'.$_POST['selYear1'];


 	$info_query="insert into $projects_table  set p_title = '".$ch->checkFields($_POST['txtTitle'])."',
								                  p_company	='".$ch->checkFields($_POST['txtCompany'])."',
			                                      p_period = '$period',
												  p_role = '".$ch->checkFields($_POST['Role'])."',
												  p_teamsize = '".$ch->checkFields($_POST['TeamSize'])."', 
												  p_from_date = '".$ch->checkFields($from)."', 
												  p_to_date = '".$ch->checkFields($to)."',
												  p_other_tech = '".$ch->checkFields($_POST['txtOtherproject'])."',
			                                      p_end ='".$ch->checkFields($_POST['selEnd'])."',
		                                          p_description = '".$ch->checkFields($_POST['areaDescription'])."',
		                                          p_tools = '".$ch->checkFields($_POST['areaTools'])."',
		                                          p_challenges ='".$ch->checkFields($_POST['areaChallenges'])."',
												
									              m_id='".$_SESSION[m_id]."'";
												  
									
 $result=$db->insertRecord($info_query);
$_REQUEST[msg]=1;
if($_POST[eduInsert]!='Save'){
$_REQUEST[action]='new';

} 
$tab='5';
	 			echo '<script>document.location="job_seeker_menu.php?tab=2&msg=1";</script>';
				
					
			//	header("Location:job_seeker_menu.php?tab=4&msg=1");
			}		
 
 if($_REQUEST[menu]=='projectDel' && is_numeric($_REQUEST[p_id])!='')
 {
$delete_query="delete from $projects_table where p_id='".$_REQUEST[p_id]."'";
$result=$db->deleteRecord($delete_query);
$_REQUEST[msg]=3;
$tab='5';
 //header("Location:core_competency.php?msg=3");
//header("Location:job_seeker_menu.php?tab=4&msg=3");
echo '<script>document.location="job_seeker_menu.php?tab=2&msg=3";</script>';
}
  if($_REQUEST[menu]=='achDel' && is_numeric($_REQUEST[ac_id])!='')
 {

$db->deleteRecord("delete from $achievements_table where ac_id='".$_REQUEST[ac_id]."'");
$_REQUEST[msg]=3;
$tab='5';
 //header("Location:core_competency.php?msg=3");
//header("Location:job_seeker_menu.php?tab=1&msg=3");
echo '<script>document.location="job_seeker_menu.php?tab=1&msg=3";</script>';
}
//$menu_result=$db->getResults("select count(m_id) from $members_table  ");
 /*$gen_result=$db->getResults("select * from $members_table where m_id='".$_SESSION[m_id]."'");
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
 $ache=count($ache_result);*/
 //echo $gen."sri";echo $cobj."sri";echo $core."sri";echo $edu."sri";echo $work."sri";echo $proj."sri";echo $ache."sri";die;?>
	 
<tr>
 
  <Td><table width="100%">
  <tr>
    <Td width="20%">&nbsp;</Td>
    <Td width="76%">&nbsp;</Td>
    <td width="4%"></td>
  </tr>
  <tr>
    <td valign="top" ><? include_once('includes/side_menu.php');?>
<div style="float:left; width:215p; margin-top:10px;" ><table width="250" height="458" class="recruit_menu_bg"  valign="top" >
  <tr>
    <td width="17%" colspan="2" style=" color:#880011; font-size:14px;" align="center"><strong>INDEX</strong></td>
    
  </tr>
  <tr>
    <td colspan="1" style=" color:#880011; font-size:13px;"><img src="images/step1.png"> </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="job_seeker_menu.php?tab=0"   style="color:#000000;font-size:13px;">General Information </a></td>
	
  </tr>
  <td>&nbsp;</td>
  <tr> 
    <td colspan="2" style=" color:#880011; font-size:13px;"><img src="images/step2.png"> </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="job_seeker_menu.php?tab=1"   style="color:#000000;font-size:14px;">Career Objective</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="job_seeker_menu.php?tab=1"   style="color:#000000;font-size:14px;">Core Competency</a></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><a href="job_seeker_menu.php?tab=1"  style="color:#000000;font-size:14px;">Educational Details</a></td>
  </tr>
  <!--
  <tr>
    <td>&nbsp;</td>
    <td><a href="job_seeker_menu.php?tab=1"   style="color:#000000;font-size:14px;">Achievements</a></td>
  </tr>-->
  <td>&nbsp;</td>
  <tr>
    <td colspan="2" style=" color:#880011; font-size:13px;"><img src="images/step3.png"> </td>
    </tr>
	 <tr>
    <td>&nbsp;</td>
    <td><a href="job_seeker_menu.php?tab=2"   style="color:#000000;font-size:14px;">Work Experience</a></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><a href="job_seeker_menu.php?tab=2"   style="color:#000000;font-size:14px;">Academic Projects</a></td>
  </tr>

  <td>&nbsp;</td>
  <tr>
    <td colspan="2" style=" color:#880011; font-size:13px;"><img src="images/step4.png"></td>
    </tr>
	<tr>
    <td>&nbsp;</td>
    <td><a href="job_seeker_menu.php?tab=3"   style="color:#000000;font-size:14px;">Achievements</a></td>
  </tr>
 
  <td>&nbsp;</td>
  <tr>
    <td colspan="2" style=" color:#880011; font-size:13px;"><img src="images/step5.png"> </td>
    </tr>
	<tr>
    <td>&nbsp;</td>
    <td><a href="job_seeker_menu.php?tab=4"   style="color:#000000;font-size:14px;">Employability Factor</a></td>
  </tr>
  <td>&nbsp;</td>
  <tr>
    <td colspan="2" style=" color:#880011; font-size:13px;"><img src="images/resume.png"></td>
    </tr>
</table>
</div>
	
	
	</Td>
    <td valign="top" >
  <div id="tabs">
  <ul>
      
  <li><a href="ajax/general_information.php"  onclick="example_ajax_request('1')"><img src="images/step1.png" border="0"></a></li>
  
 <li><a href="ajax/career_objective.php?msg=<?=$_REQUEST[msg]?>&action=<?=$_REQUEST[action]?>" onclick="example_ajax_request('2')"><img src="images/step2.png" border="0"></a></li>
 
 <!--<li><a href="ajax/core_competency.php?msg=<?=$_REQUEST[msg]?>&action=<?=$_REQUEST[action]?>">STEP - 3</a></li>-->
 <li><a href="ajax/work_experience.php?edumsg=<?=$edumsg?>&action=<?=$_REQUEST[action]?>" onclick="example_ajax_request('3')"><img src="images/step3.png" border="0"></a></li>
 
 <li><a href="ajax/achievements.php?msg=<?=$_REQUEST[msg]?>&action=<?=$_REQUEST[action]?>" onclick="example_ajax_request('4')"><img src="images/step4.png" border="0"></a></li>
 <li><a href="ajax/projects_completed.php?msg=<?=$_REQUEST[msg]?>&action=<?=$_REQUEST[action]?>"onclick="example_ajax_request('5')"><img src="images/step5.png" border="0"></a></li>
<!-- <li><a href="ajax/achievements.php?msg=<?=$_REQUEST[msg]?>&action=<?=$_REQUEST[action]?>">STEP - 7</a></li>-->
 
 <li><a href="ajax/resume.php?msg=<?=$_REQUEST[msg]?>&action=new" onclick="example_ajax_request('6')"><img src="images/resume.png" border="0"></a></li>
 
</ul></div></Td></tr> </table></Td></tr>  

<script>
example_ajax_request('1');
<? if($_REQUEST[tab]!=''){ ?>
var $tabs = $('#tabs').tabs(); // first tab selected
$tabs.tabs('select', <?=$_REQUEST[tab];?>); // switch to third tab
<? } ?>


</script>

<? include_once('config/footer.php') ?>