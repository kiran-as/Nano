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

?> 
	
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

}else{
$img='free_resume_builder_edit.png';
}
 }else{
 $img='free_resume_builder1.png';
 }
 
 ?>
 
 <?
  

 if(isset($_POST['infoUpdate']))
 {
$info_query="update $members_table  set m_father_name='".$ch->checkFields($_POST['txtFatherName'])."',
								      m_address='".$ch->checkFields($_POST['txtAddress'])."',
								      m_fname='".$ch->checkFields($_POST['txtFirstName'])."',
								      m_lname='".$ch->checkFields($_POST['txtLastName'])."',
								    m_martial_status ='".$ch->checkFields($_POST['txtMartialStatus'])."',
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
 
		$info_query="update  $members_table set m_student = '".$ch->checkFields($_POST['Rvstudent'])."' where m_id='".$_SESSION[m_id]."'";
		$result=$db->insertRecord($info_query);
		/*$checkId=$career_obj=$db->getResults("select * from rv_members_ids where rm_mem_id");*/
		$db->insertRecord("update  rv_members_ids set  m_id='".$_SESSION[m_id]."',rm_status='1' where rm_mem_id='".$ch->checkFields($_POST['Rvstudent'])."'");
		
		$query="select * from $career_objective_table where m_id='".$_SESSION[m_id]."'";
		$career_obj=$db->getResults($query);
		foreach($career_obj as $career){}
 		if(($career_obj)==0)
		$insert_query="insert into  $career_objective_table  set co_objective = '".$ch->checkFields($_POST['Career'])."',m_id='".$_SESSION[m_id]."'";
		else
		$insert_query="update $career_objective_table  set co_objective = '".$ch->checkFields($_POST['Career'])."' where m_id='".$_SESSION[m_id]."'";
		$result=$db->insertRecord($insert_query);
 
		$media_array='';
		$media_array = implode(',',$_POST['chkCareer']);
	    $query_career=$db->getResults("SELECT * FROM $core_competecny_table where m_id='".$_SESSION[m_id]."'"); 
		if(count($query_career)==0){
		$query_car = "INSERT INTO $core_competecny_table set m_id='".$_SESSION[m_id]."',cc_array='$media_array',cc_other='$_POST[carrerArae]'";
		}else{
		$query_car = "update $core_competecny_table set cc_array='$media_array',cc_other='$_POST[carrerArae]' where  m_id='".$_SESSION[m_id]."'";
		}
		$result=$db->insertRecord($query_car);

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

		$limit = count($Qua);

		for($i=0;$i<$limit;$i++) {
			$Qua[$i] = mysql_real_escape_string($Qua[$i]);
			$Branch[$i] = mysql_real_escape_string($Branch[$i]);
			$Branch1[$i] = mysql_real_escape_string($Branch1[$i]);
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
		
	echo '<script>document.location="job_seeker_menu.php?tab=1&msg=1";</script>';

 }	
 

if(isset($_POST['del']))
{
	
for($i=0;$i<count($_POST["chkDelete"]);$i++)
	{
		if($_POST["chkDelete"][$i] != "")
		{
		    $strSQL = "DELETE FROM $education_table1 ";
			$strSQL .="WHERE e_id = '".$_POST["chkDelete"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

  echo  '<script>document.location="job_seeker_menu.php?tab=1&msg=3";</script>';
}
 
 //*** Update Condition ***//
if(isset($_POST['Submit']))
{
	for($i=1;$i<=$_POST["hdnLine"];$i++)
	{
		$strSQL = "UPDATE  $education_table1 SET ";
		
		
		$strSQL .="m_id = '".$_SESSION[m_id]."' ";
		$strSQL .=",branch_name = '".$_POST["selBranch$i"]."' ";
		$strSQL .=",e_start = '".$_POST["selMonth$i"]."' ";
		$strSQL .=",e_end = '".$_POST["selPassedyear$i"]."' ";
		$strSQL .=",e_start1 = '".$_POST["selMonth1$i"]."' ";
		$strSQL .=",e_end1 = '".$_POST["selPassedyear1$i"]."' ";
		$strSQL .=",insti_name = '".$_POST["selInst$i"]."' ";
		$strSQL .=",e_university = '".$_POST["selUniv$i"]."' ";
		$strSQL .=",e_city = '".$_POST["txtCity$i"]."' ";
		$strSQL .=",e_percentage = '".$_POST["percentage$i"]."' ";
		$strSQL .="WHERE e_id = '".$_POST["hdnCustomerID$i"]."' ";
		$objQuery = mysql_query($strSQL);
	}
			$strSQL = "SELECT * FROM  $education_table1 ORDER BY e_id ASC";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			
			$info_query="update  $members_table set m_student = '".$ch->checkFields($_POST['Rvstudent'])."' where m_id='".$_SESSION[m_id]."'";
			$result=$db->insertRecord($info_query);
			$db->insertRecord("update  rv_members_ids set  m_id='".$_SESSION[m_id]."',rm_status='1' where rm_mem_id='".$ch->checkFields($_POST['Rvstudent'])."'");
			
	$insert_query="update $career_objective_table  set co_objective = '".$ch->checkFields($_POST['Career'])."' where m_id='".$_SESSION[m_id]."'";
	$result=$db->insertRecord($insert_query);
	
			$media_array='';
		    $media_array = implode(',',$_POST['chkCareer']);
			$query_car = "update $core_competecny_table set cc_array='".$media_array."',cc_other='".$_POST['carrerArae']."' where  m_id='".$_SESSION[m_id]."'";
        	$result=$db->insertRecord($query_car);
		

			
echo '<script>document.location="job_seeker_menu.php?tab=1&msg=2";</script>';
//header("Location:job_seeker_menu.php?tab=2&msg=2");
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
$info_query="insert into $achievements_table  set ac_title='".$ch->checkFields($_POST['txtAchiveTitle'])."',ac_title1='".$ch->checkFields($_POST['txtAchiveTitle1'])."',ac_title2='".$ch->checkFields($_POST['txtAchiveTitle2'])."', ac_description='".$ch->checkFields($_POST['txtAchiveother'])."',m_id='".$_SESSION[m_id]."'";
									
$result=$db->insertRecord($info_query);

 //header("Location:core_competency.php?msg=3");
//header("Location:job_seeker_menu.php?tab=1&msg=3&action=$action");
	echo '<script>document.location="job_seeker_menu.php?tab=3&msg=1";</script>';
}	
 
 
if(isset($_POST['accAchiv']))
 {


$update_ach_query="update $achievements_table  set ac_title='".$ch->checkFields($_POST['txtAchiveTitle'])."', ac_title1='".$ch->checkFields($_POST['txtAchiveTitle1'])."',ac_title2='".$ch->checkFields($_POST['txtAchiveTitle2'])."', m_id='".$_SESSION[m_id]."' where ac_id='".$_REQUEST[ac_id]."'";
 $result=$db->insertRecord($update_ach_query);
 $_REQUEST[msg]=2;
$tab='1';

echo '<script>document.location="job_seeker_menu.php?tab=3&msg=2";</script>';
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
 				

 
if(isset($_POST['delete']))
{
for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = "DELETE FROM $education_table1 ";
			$strSQL .="WHERE e_id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

echo  '<script>document.location="job_seeker_menu.php?tab=1&msg=3";</script>';
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

	echo '<script>document.location="job_seeker_menu.php?tab=2&msg=1";</script>';
	
	}
/*

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

//echo '<script>document.location="job_seeker_menu.php?tab=2&msg=1";</script>';*/
	//header("Location:job_seeker_menu.php?tab=3&msg=1&action=$action");
	
	
	
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

	echo '<script>document.location="job_seeker_menu.php?tab=2&msg=2";</script>';
	
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
   			if($_POST['selVLSIType']=='')
$vlsityp=0;
else
$vlsityp=$_POST['selVLSIType'];		

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
											  p_vlsitype ='".$ch->checkFields($vlsityp)."',	
											 p_challenges='".$ch->checkFields($_POST['areaChallenges'])."'  
											 where p_id='".$_REQUEST[p_id]."'";
									
									
 $result=$db->insertRecord($info_query);
 $_REQUEST[msg]=2;
$tab='5';
//header("Location:job_seeker_menu.php?tab=4&msg=2");
echo '<script>document.location="job_seeker_menu.php?tab=2&msg=2";</script>';
}
 
 
 
  if(isset($_POST['projectInsert']))
 {
 
   // $period = $_REQUEST[selFrom]."-".$_REQUEST[selTo];
    $from=$_POST['selFrom'].'-'.$_POST['selFromYear'];
   $to=$_POST['selMonth1'].'-'.$_POST['selYear1'];

if($_POST['selVLSIType']=='')
$vlsityp=0;
else
$vlsityp=$_POST['selVLSIType'];

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
												  p_vlsitype ='".$ch->checkFields($vlsityp)."',
									              m_id='".$_SESSION[m_id]."'";
												  
			
 $result=$db->insertRecord($info_query);
$_REQUEST[msg]=1;
if($_POST[eduInsert]!='Save'){
$_REQUEST[action]='new';

} 
$tab='5';
	 			echo '<script>document.location="job_seeker_menu.php?tab=2&msg=1";</script>';
				
					
		}		
 
 if($_REQUEST[menu]=='projectDel' && is_numeric($_REQUEST[p_id])!='')
 {
$delete_query="delete from $projects_table where p_id='".$_REQUEST[p_id]."'";
$result=$db->deleteRecord($delete_query);
$_REQUEST[msg]=3;
$tab='5';

echo '<script>document.location="job_seeker_menu.php?tab=2&msg=3";</script>';
}
  if($_REQUEST[menu]=='achDel' && is_numeric($_REQUEST[ac_id])!='')
 {

$db->deleteRecord("delete from $achievements_table where ac_id='".$_REQUEST[ac_id]."'");
$_REQUEST[msg]=3;
$tab='5';

echo '<script>document.location="job_seeker_menu.php?tab=1&msg=3";</script>';
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
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
 <script type="text/javascript" src="lib/jquery.js"></script>
<script type='text/javascript' src='lib/jquery.autocomplete.js'></script>
<script type='text/javascript' src='lib/localdata.js'></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<script src="calender/dhtmlgoodies_calendar.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript" src="js/SpryEffects.js"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/dw_scrollObj.js" type="text/javascript"></script>
<script src="Scripts/dw_glidescroll.js" type="text/javascript"></script>
<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
			<link rel="stylesheet" href="jquery-tooltip/jquery.tooltip.css" />
<link rel="stylesheet" href="../screen.css" />
<script src="../lib/jquery.js" type="text/javascript"></script>
<script src="../lib/jquery.bgiframe.js" type="text/javascript"></script>
<script src="../lib/jquery.dimensions.js" type="text/javascript"></script>
<script src="jquery-tooltip/jquery.tooltip.js" type="text/javascript"></script>

<script src="jquery-tooltip/chili-1.7.pack.js" type="text/javascript"></script>
		<link type="text/css" href="jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
		<link type="text/css" href="jquery.ui.tabs.css" rel="stylesheet" />	
		<script type="text/javascript" src="jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8.10.custom.min.js"></script>
		
			

</head>

<body>
<div class="main_div">
<? include "includes/header.php" ?>

<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />
</div><!--end of main_banner-->
<div class="main_content">
<div class="stmenuright_maincontent">

<div class="rightimg_top">
<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Resume Details </h3>
</div>
<div class="rightimg_right">
</div>
</div><!--end of rightimg_top-->
 <div class="stmenurightinner_content_inner">
 <tr>
  <table width="100%">
  <tr>
  <p class="right_content_style">
<td valign="top" class="recruit_menu_bg">
<script type="text/javascript" src="wz_tooltip/wz_tooltip.js"></script>

  <div id="tabs">
  <ul>
      
  <li><a href="ajax/general_information.php"  onclick="example_ajax_request('1')"><img src="images/step1.png" border="0" onMouseOver="Tip('Personal information')" onmouseout="UnTip()"></a></li>
  
 <li><a href="ajax/career_new.php?msg=<?=$_REQUEST[msg]?>&action=<?=$_REQUEST[action]?>" onclick="example_ajax_request('2')"><img src="images/step2.png" border="0" onMouseOver="Tip('Career and Educational Details')" onmouseout="UnTip()"></a></li>
 
 <!--<li><a href="ajax/core_competency.php?msg=<?=$_REQUEST[msg]?>&action=<?=$_REQUEST[action]?>">STEP - 3</a></li>-->
 <li><a href="ajax/work_experience.php?edumsg=<?=$edumsg?>&action=<?=$_REQUEST[action]?>" onclick="example_ajax_request('3')"><img src="images/step3.png" border="0" onMouseOver="Tip('Work and Academic Details')" onmouseout="UnTip()"></a></li>
 
 <li><a href="ajax/achievements.php?msg=<?=$_REQUEST[msg]?>&action=<?=$_REQUEST[action]?>" onclick="example_ajax_request('4')"><img src="images/step4.png" border="0" onMouseOver="Tip('Achievements Details')" onmouseout="UnTip()"></a></li>
 <!--<li><a href="ajax/projects_completed.php?msg=<?=$_REQUEST[msg]?>&action=<?=$_REQUEST[action]?>"onclick="example_ajax_request('5')"><img src="images/step5.png" border="0"></a></li>
 <li><a href="ajax/achievements.php?msg=<?=$_REQUEST[msg]?>&action=<?=$_REQUEST[action]?>">STEP - 7</a></li>-->
 
 <li><a href="ajax/resume.php?msg=<?=$_REQUEST[msg]?>&action=new" onclick="example_ajax_request('6')"><img src="images/resume.png" border="0"onMouseOver="Tip('Resume Details')" onmouseout="UnTip()"></a></li>
 
</ul></div></Td></tr></table></p>


<script>
example_ajax_request('1');
<? if($_REQUEST[tab]!=''){ ?>
var $tabs = $('#tabs').tabs(); // first tab selected
$tabs.tabs('select', <?=$_REQUEST[tab];?>); // switch to third tab
<? } ?>

</script>
</div>
</div><!--end of right_maincontent-->
<div class="stmenuleft_maincontent">
<div class="news_events">
<div class="news_top">
<div class="lefttopleft">
</div>
<div class="lefttopmiddle">
<h1 class="h1class">Candidate Resume Buliding</h1>
</div>
<div class="lefttopright">
</div>
</div><!--end of news_top-->

<div class="leftmiddle_content">

<p class="left_para" style="margin:0px;padding:0px;"><td width="242" ><a href="job_seeker_menu.php" class=""><img src="images/<?=$img?>" border="0"></img></a></td>
 </p> 

<p  class="left_para" style="margin:0px;padding:0px;"><?  if(!empty($_SESSION[m_id])){?>
<tr>  
<td><a href="change_password.php" class=""><img src="images/change_pwdimg.png" border="0"></img></a></td>
</tr> </p>
<p class="left_para" style="margin:0px;padding:0px;">
<tr>  
<td ><a href="logout.php" class=""><img src="images/logout_img.png" border="0"></img></a></td>
</tr> 
<? } ?>
</p> 
<tr>
    <Td width="20%">&nbsp;</Td>
    <Td width="76%">&nbsp;</Td>
    <td width="4%"></td>
  </tr>
 
    
	
<table width="240" height="458"  valign="top"  >
  <tr>
    <td width="17%" colspan="2" style=" color:#114981; font-size:14px;" align="center"></td>
    
  </tr><!--
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
  
  <tr>
    <td>&nbsp;</td>
    <td><a href="job_seeker_menu.php?tab=1"   style="color:#000000;font-size:14px;">Achievements</a></td>
  </tr>
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
    </tr>-->
</table>
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
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>
