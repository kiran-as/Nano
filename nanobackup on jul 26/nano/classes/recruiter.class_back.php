<?php
include_once("../db/dbconfig.php");


   include_once('dataBase.php');
   $db=new dataBase();
   $db->connectDB();


class recruiter
{

public function  checkRecLogin($POST)
	{
		global $rec_table;
	
			 $db = new dataBase();
  $sel_sql= "select * from $rec_table where r_user_name='".$POST['txtUsername']."' and r_password='".md5($POST['txtPassword'])."'";
 // echo $sel_sql;die;
		$result = $db->getResults($sel_sql);
//print_r($result);die;
       $num_rows=$db->numRows($result);
		 if($num_rows==1)
		 {
		 $_SESSION['REC_USERNAME'] = $result[0]->r_user_name;
		 $_SESSION['REC_ID'] = $result[0]->r_id;
		 $_SESSION['REC_EMAIL'] = $result[0]->r_email;

		 }

          return  $num_rows;
		  

	}



 public  function  createRegistration($POST)
	{
		global $rec_table;
	
	$db = new dataBase();

		 $sql="INSERT INTO  $rec_table (
		`r_user_name` ,
		`r_password` ,
		`r_email` ,
		`r_company` ,
		`r_address` ,
		`r_city` ,
		`r_state` ,
		`r_country` ,
		`r_pin` ,
		`r_designation` ,
		`r_phone` ,
		`r_mobile` ,
		`r_web_url` ,
		`r_comp_desc` ,
		`r_industry` ,
		`r_no_employes`,
		`r_actcode`
		)
		VALUES ('".addslashes($POST['txtUserName'])."','".md5($POST['txtPassword'])."','".addslashes($POST['txtEmail'])."','".addslashes($POST['txtCompany'])."','".addslashes($POST['txtAddress'])."','".addslashes($POST['txtCity'])."','".addslashes($_REQUEST['txtState'])."','".addslashes($POST['txtCountry'])."','".addslashes($POST['txtPinCode'])."','".addslashes($POST['txtDesignation'])."','".addslashes($POST['txtPhone'])."','".addslashes($POST['txtMobile'])."','".addslashes($POST['txtWebUrl'])."','".addslashes($POST['txtComDescriptn'])."','".addslashes($POST['txtIndustry'])."','".addslashes($POST['txtNoEmp'])."','".addslashes($POST['$activ_code'])."')";
	
 $result=$db->lastinsertid($sql);
 

if($result>0)
    {
return $msg=1;
	}

}


public function  getRecruiters($count = "",$limitvalue = "",$limit = "",$r_id="")
	{
		global $rec_table;

			$db = new dataBase();
			$sel_sql= "select * from $rec_table";
			
			 if(!empty($r_id))
			 {
			 $sel_sql.=" where r_id ='".$r_id."'";
			 $result=$db->getResults($sel_sql);
			 }
			
			else
			{
				if($limitvalue!="" or $limit != "")
				{
				$sel_sql.=" order by r_id desc  LIMIT $limitvalue, $limit";
				}
				$result=$db->getResults($sel_sql);
				if($count==1)
				{
				 $result=$db->numRows($result);
				}
		    }
			 
			 
			 return $result;
	
	
	}


public function  delRecruiters($r_id)
	{
		global $rec_table;
	
			$db = new dataBase();
			
			$del_sql= "delete from $rec_table where r_id = $r_id";
			
			 return $result=$db->deleteRecord($del_sql);

	}
	


	public function  createJobApp($POST)
	{
	global $job_app_table;
			$db = new dataBase();
			
			$ins_sql= "INSERT INTO $job_app_table (
			`r_id` ,
			`ja_title` ,
			`ja_desc` ,
			`ja_skills` ,
			`status`
			)
			VALUES (
			'".$_SESSION['REC_ID']."', '".addslashes($POST['txtTitle'])."', '".addslashes($POST['txtDescription'])."', '".addslashes($POST['txtSkills'])."', '1'
			)";
			//echo $ins_sql;die;
			
			$result=$db->lastinsertid($ins_sql);
			
			if($result>0)
			{
			return $msg=1;
			}
	
	}
	
	public function  getJobApp($count = "",$limitvalue = "",$limit = "",$ja_id="")
	{
		global $job_app_table;

			$db = new dataBase();
			$sel_sql= "select * from $job_app_table";
			//echo $ja_id;die;
			
			 if(!empty($ja_id))
			 {
			 $sel_sql.=" where ja_id ='".$ja_id."'";
			 $result=$db->getResults($sel_sql);
			 }
			
			else
			{
				if($limitvalue!="" or $limit != "")
				{
				$sel_sql.=" order by ja_id desc  LIMIT $limitvalue, $limit";
				}
				//echo $sel_sql;die;
				$result=$db->getResults($sel_sql);
				
				if($count==1)
				{
				 $result=$db->numRows($result);
				}
		    }
			 
			 
			 return $result;
	
	
	}
	
	public function  delJobApp($ja_id)
	{
		global $job_app_table;
	
			$db = new dataBase();
			
			$del_sql= "delete from $job_app_table where ja_id = $ja_id";
			
			 return $result=$db->deleteRecord($del_sql);

	}
	
	public function  updateJobapp($ja_id,$POST)
	{
	global $job_app_table;
	     $array = implode(',',$POST['sub_check']);
		// print_r($array);die;
	
			$db = new dataBase();
			//$db->connectDB(); 
			//echo $ja_id;die;
			
		 $up_sql= "update $job_app_table set st_ids='".$array."' where ja_id =$ja_id";
		//echo $up_sql;die;
			 $result=$db->updateRecord($up_sql);

	}
	



}
?>