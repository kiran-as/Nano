<?php  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php');  
	//include_once('../classes/recruiter.class.php'); 
session_start();	
	   $sessionid = session_id();
	$input=new inputFields();	
	$ch=new checkInputFields();	
	$db=new dataBase();
	$rec = new recruiter();
	$db->connectDB(); 
$countrows =0;


$resultsss = "SELECT * FROM rv_job_posting where jp_id=".$_GET['idjobposting'];
$idrecruiter =$_GET['idrecruiter'];
$_SESSION['idjobposting'] = $idjobposting = $_GET['idjobposting'];
	$resultc = mysql_query($resultsss);
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent["jp_job_title"]	= $row["jp_job_title"];
		 $arraStudent["jp_description"]	= $row["jp_description"];
		 $arraStudent["jp_id"]	= $row["jp_id"];
		 $arraStudent["jp_expdate"]	= $row["jp_expdate"];
		 $arraStudent["jp_skills"]	= $row["jp_skills"];
		 $titlejobposting = $row["jp_job_title"];
		  $expirydate	=  date(" d-m-Y ",$row["jp_expdate"]);
		}
		$withoutsearch=0;
		////function for displaying all hte coursess//////	
		$resultcourse= "SELECT *  FROM  `rv_course` WHERE  `cor_status` =1";
		$resultcourses= mysql_query($resultcourse);
		$c=0;
		   while ($row = mysql_fetch_assoc($resultcourses)) {
	    			  $arrcourse[$c]["cor_id"]	= $row["cor_id"];
			          $arrcourse[$c]["cor_name"]	= $row["cor_name"];
			 
			$c++;
		 }
		 
		 		$queryrecruiter = "SELECT * FROM rv_recruiters where r_id=".$idrecruiter;

	$resultrecruiter = mysql_query($queryrecruiter);
	while ($rows = mysql_fetch_assoc($resultrecruiter)) {
		$recruitername	= $rows["r_user_name"];
		$compname= $rows["r_company"];
			$_SESSION['recemails']=$recruiteremail = $rows["r_email"];
 
		}

		/////////end of the function///////////////////////
		
		 		////function for displaying all the branches//////	
		$resultbranch= "SELECT *  FROM  `rv_branch`  WHERE cor_id IN ( 1, 2,21,48 )  AND  `branch_status` =1 GROUP BY branch_name";
		$resultbranches= mysql_query($resultbranch);
		$c=0;
		   while ($row = mysql_fetch_assoc($resultbranches)) {
	    			  $arrbranch[$c]["branch_id"]	= $row["branch_id"];
			          $arrbranch[$c]["branch_name"]	= $row["branch_name"];
			 
			$c++;
		 }
		
		/////////end of the function///////////////////////
		
		
		if($_POST)
		{
		      $year = $_POST['select3'];
			  
			 
		    /////////////for course///////////////////
		    for($crs=0;$crs<count($_POST['coursess']);$crs++)
				{
					$branch = $_POST['coursess'][$crs];
					if($crs==count($_POST['coursess'])-1)
						{
							$querybranchss.= 'cor_name LIKE '."'%$branch%'";
						}
					else{
							$querybranchss.='cor_name LIKE '."'%$branch%'".' OR ';
						}
				}
				 $branchids ="SELECT *  FROM  `rv_course`  WHERE `cor_status` =1  AND  $querybranchss AND `cor_status` =1";
				$arrresultbranches= mysql_query($branchids);
				$b=0;$branchsid="'52ss'";
				while ($row = mysql_fetch_assoc($arrresultbranches)) 
				{
				    		$crsidsss	= $row["cor_id"];
				    		$branchsid = $branchsid.',"'.$crsidsss.'"';
							$b++;
				}
							 
		       /// print_R($branchsid);//all courses ids
				
				
					///branches///
					for($crs=0;$crs<count($_POST['branch']);$crs++)
					{
						 $branch = $_POST['branch'][$crs];
					
						if($crs==count($_POST['branch'])-1)
						{
							$querybranch.= 'branch_name LIKE '."'%$branch%'";
						}
						else {
						$querybranch.='branch_name LIKE '."'%$branch%'".' OR ';
						}
					}
					
				 $branchids ="SELECT *  FROM  `rv_branch`  WHERE `branch_status` =1  AND  $querybranch";
	
					$arrresultbranches= mysql_query($branchids);
				    $b=0;$branchid="'52a'";
				   while ($row = mysql_fetch_assoc($arrresultbranches)) {
			    		$branchesidss	= $row["branch_id"];
			    		$branchid = $branchid.',"'.$branchesidss.'"';
						$b++;
				 }
				 
				 /// print_R($branchid);//all branches ids
				  //die();
				
				 
				  
				  ///////////for tentch////////////////////
				  if($_POST['education'][0]=='')
				  {
				    $tenthperc=0;
					$tenthpercnum = 0;
				  }
				  else
				  {
				  $tenthperc = $_POST['education'][0];
				  $tenthpercnum = ($tenthperc/10);
				  }
				  
				 $tenth = mysql_query("Select a.m_id from rv_educational_details as a where a.e_percentage >=$tenthperc and a.qua_id=5 group by m_id");
				 $tentharray = array();			  
				 $resultstenth=0;
				 while ($row = mysql_fetch_assoc($tenth)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultstenth = $resultstenth.',"'.$midsss.'"';
				 $mid++;
				 $inserttenth = mysql_query("Insert into tbl_temptenth 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");	
                  }
                 $tenthcpg = mysql_query("Select a.m_id from rv_educational_details as a where a.e_percentage >=$tenthpercnum and a.e_percentage_type=2 and a.qua_id=5 group by m_id");
				 $tentharray = array();			  
				 $resultstenth=0;
				 while ($row = mysql_fetch_assoc($tenthcpg)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultstenth = $resultstenth.',"'.$midsss.'"';
				 $mid++;
				 $inserttenth = mysql_query("Insert into tbl_temptenth 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");				 
				}		

				 /////////////////////////for puc///////////
			    if($_POST['education'][1]=='')
				  {
				    $twelthperc=0;
					$twelthpercpga=0;
				  }
				  else
				  {
				  $twelthperc = $_POST['education'][1];
				  $twelthpercpga = ($twelthperc/10);
				  }
				 $twelth = mysql_query("Select a.m_id from rv_educational_details as a where a.e_percentage >=$twelthperc and a.qua_id=4 group by m_id");
				 $tweltharray = array();			  
				 $resultstwelth=0;
				 while ($row = mysql_fetch_assoc($twelth)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultstwelth = $resultstwelth.',"'.$midsss.'"';
				 $mid++;
				 $inserttwelth = mysql_query("Insert into tbl_temptwelth 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");	
				 }
				 $twelthcgpa = mysql_query("Select a.m_id from rv_educational_details as a where a.e_percentage >=$twelthpercpga and a.e_percentage_type=2 and a.qua_id=4 group by m_id");
				 $tweltharray = array();			  
				 $resultstwelth=0;
				 while ($row = mysql_fetch_assoc($twelthcgpa)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultstwelth = $resultstwelth.',"'.$midsss.'"';
				 $mid++;
				 $inserttwelth = mysql_query("Insert into tbl_temptwelth 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");	
				}				   

				///////////////for degree//////////////////////////////////
				if($_POST['education'][2]=='')
				  {
				    $degreeperc = 0;
					$degreepercgpa = 0;
				  }
				  else
				  {
				  $degreeperc = $_POST['education'][2];
				  $degreepercgpa = ($degreeperc/10);
				  }
				  
				    $tenth = mysql_query("Select a.m_id from rv_educational_details as a where  a.qua_id=2 and a.e_percentage >=$degreeperc and a.e_passout_year>='$year' group by a.m_id");
				 $tentharray = array();			  
				 $resultstenth=0;
				 while ($row = mysql_fetch_assoc($tenth)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultstenth = $resultstenth.',"'.$midsss.'"';
				 $mid++;
				 $inserttenth = mysql_query("Insert into tbl_masterdegree 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");	
                  }
				  
				  
				    $tenth = mysql_query("Select a.m_id from rv_educational_details as a where  a.qua_id=2 and a.e_percentage >=$degreepercgpa and a.e_passout_year>='$year' group by a.m_id");
				 $tentharray = array();			  
				 $resultstenth=0;
				 while ($row = mysql_fetch_assoc($tenth)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultstenth = $resultstenth.',"'.$midsss.'"';
				 $mid++;
				 $inserttenth = mysql_query("Insert into tbl_masterdegree 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");	
                  }
				
				  
				 $degree = mysql_query("Select a.m_id from rv_educational_details as a
		 						   where a.e_percentage >=$degreeperc and a.qua_id=2  and a.e_passout_year>='$year'
		 						   AND a.e_branch in($branchid) AND a.e_course in ($branchsid)");
				 $degreearray = array();			  
				 $resultsdegree=0;
				 while ($row = mysql_fetch_assoc($degree)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultsdegree = $resultsdegree.',"'.$midsss.'"';
				 $mid++;
				  $insertdegree = mysql_query("Insert into tbl_tempdegree 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");
                   }
               $degreecgpa = mysql_query("Select a.m_id from rv_educational_details as a
		 						   where a.e_percentage >=$degreepercgpa and a.e_percentage_type=2 and a.qua_id=2  and a.e_passout_year>='$year'
		 						   AND a.e_branch in($branchid) AND a.e_course in ($branchsid)");
				 $degreearray = array();			  
				 $resultsdegree=0;
				 while ($row = mysql_fetch_assoc($degreecgpa)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultsdegree = $resultsdegree.',"'.$midsss.'"';
				 $mid++;
				  $insertdegree = mysql_query("Insert into tbl_tempdegree 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')"); 				 
				 
				}

				
				
				//////////////////Masterdegree*////////////////////
				if($_POST['education'][3]=='')
				  {
				    $master = 0;
					$mastercgpa = 0;
				  }
				  else
				  {
				  $master = $_POST['education'][3];
				  $mastercgpa = ($master/10);
				  }
				
				
				  
				  
				 $masterquery = mysql_query("Select a.m_id from rv_educational_details as a
		 						   where a.e_percentage >=$master and a.qua_id=1 and a.m_id in ($resultstenth)
		 						   AND a.e_branch in($branchid) AND a.e_course in ($branchsid)");
				 $degreearray = array();			  
				 $resultsdegree=0;
				 while ($row = mysql_fetch_assoc($masterquery)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultsdegree = $resultsdegree.',"'.$midsss.'"';
				 $mid++;
				  $insertdegree = mysql_query("Insert into tbl_tempmaster 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");
                   }
				     
               $masterquery = mysql_query("Select a.m_id from rv_educational_details as a
		 						   where a.e_percentage >=$mastercgpa and a.qua_id=1  and a.m_id in ($resultstenth) and a.e_percentage_type=2
		 						   AND a.e_branch in($branchid) AND a.e_course in ($branchsid)");
				 $degreearray = array();			  
				 $resultsdegree=0;
				 while ($row = mysql_fetch_assoc($masterquery)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultsdegree = $resultsdegree.',"'.$midsss.'"';
				 $mid++;
				  $insertdegree = mysql_query("Insert into tbl_tempmaster 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");
                   }
				
				 $masterquery = mysql_query("Select a.m_id from rv_educational_details as a
		 						   where a.e_percentage >=$master and a.qua_id=21 and a.m_id in ($resultstenth) and a.e_percentage>0
		 						   AND a.e_branch in($branchid) AND a.e_course in ($branchsid)");
				 $degreearray = array();			  
				 $resultsdegree=0;
				 while ($row = mysql_fetch_assoc($masterquery)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultsdegree = $resultsdegree.',"'.$midsss.'"';
				 $mid++;
				  $insertdegree = mysql_query("Insert into tbl_tempmaster 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");
                   }
				   
				   
				    $masterquery = mysql_query("Select a.m_id from rv_educational_details as a
		 						   where a.e_percentage >=$mastercgpa and a.qua_id=21 and a.m_id in ($resultstenth) and a.e_percentage>0 and a.e_percentage_type=2
		 						   AND a.e_branch in($branchid) AND a.e_course in ($branchsid)");
				 $degreearray = array();			  
				 $resultsdegree=0;
				 while ($row = mysql_fetch_assoc($masterquery)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultsdegree = $resultsdegree.',"'.$midsss.'"';
				 $mid++;
				  $insertdegree = mysql_query("Insert into tbl_tempmaster 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");
                   }
				
				///////////////end of masterdegree////////////////////
				
				
				/////////////////function for the search parameters////////////////
				$searchresult = $_POST['search'];
				if($searchresult!='Enter Search word')
				{
				$searchresultss = mysql_query("SELECT a . * , b . rm_mem_id 
							  FROM rv_registration AS a
							  LEFT JOIN rv_members_ids AS b ON a.m_id = b.m_id
							  LEFT JOIN rv_academic_projects As c ON c.m_id = a.m_id
                              WHERE a.m_emailid LIKE  '%$searchresult%' OR
                              a.m_skills like '%$searchresult%' OR
						      a.m_resume_id like '%$searchresult%' OR
						      a.m_fname like '%$searchresult%' OR
						      c.p_tools like '%$searchresult%' OR
						       c.p_challenges like '%$searchresult%' OR
						        c.p_other_tech like '%$searchresult%' OR
						        b.rm_mem_id like '%$searchresult%' OR
						      a.m_city like '%$searchresult%' 
								GROUP BY a.m_id");
				$searcharray = array();			  
				 $resultsdegree=0;
				 while ($row = mysql_fetch_assoc($searchresultss)) {
	    		 $midsss	= $row["m_id"];
	    		 $resultsdegree = $resultsdegree.',"'.$midsss.'"';
				 $mid++;
				  $insertdegree = mysql_query("Insert into tbl_tempsearch 
				 (mid, sessionid)VALUES ('".$midsss."','".$sessionid."')");				
				}			
			    }
				///////////////////////////////////////////////////////////////////
                ////////////final sql////////////////////
				$degreepresent=0;
				$sqldegreepresent = mysql_query("Select * from tbl_tempdegree where sessionid='$sessionid'");
				 while ($row = mysql_fetch_assoc($sqldegreepresent)) {
	    		 $degreepresent=1;
                 }	

                $masterpresent=0;
				$sqlmasterpresent = mysql_query("Select * from tbl_tempmaster where sessionid='$sessionid'");
				 while ($row = mysql_fetch_assoc($sqlmasterpresent)) {
	    		 $masterpresent=1;
                 }	
				 
				 $sqltempsearch = mysql_query("Select * from tbl_tempsearch where sessionid='$sessionid'");
				 while ($row = mysql_fetch_assoc($sqltempsearch)) {
	    		 $tempsearch=1;
                 }
				 
				
				 
                 if($degreepresent==0 && $masterpresent==1)
				 {
				   $finalsql = "Select a.mid as m_id from tbl_temptenth as a,
				                               tbl_temptwelth as b,
											   tbl_tempmaster as c
							where a.mid=b.mid and a.mid=c.mid and a.sessionid='$sessionid'";
						$arrresultmids= mysql_query($finalsql);
						$resultsmid=0;
						while ($row = mysql_fetch_assoc($arrresultmids)) {
						$midsss	= $row["m_id"];
						$resultsmid = $resultsmid.',"'.$midsss.'"';
						$mid++;
						} 
				
				 }
				 
				  if($degreepresent==1 && $masterpresent==0)
				 {
				    $finalsql = "Select a.mid as m_id from tbl_temptenth as a,
				                               tbl_temptwelth as b,
											   tbl_tempdegree as c
							where a.mid=b.mid and a.mid=c.mid and a.sessionid='$sessionid'";
						$arrresultmids= mysql_query($finalsql);
						$resultsmid=0;
						while ($row = mysql_fetch_assoc($arrresultmids)) {
						$midsss	= $row["m_id"];
						$resultsmid = $resultsmid.',"'.$midsss.'"';
						$mid++;
						} 
				
				 }
				 
				  if($degreepresent==1 && $masterpresent==1)
				 {
				     $finalsql = "Select a.mid as m_id from tbl_temptenth as a,
				                               tbl_temptwelth as b,
											   tbl_tempdegree as c,
											   tbl_tempmaster as d
							where a.mid=b.mid and a.mid=c.mid and a.mid=d.mid and a.sessionid='$sessionid'";
						$arrresultmids= mysql_query($finalsql);
						$resultsmid=0;
						while ($row = mysql_fetch_assoc($arrresultmids)) {
						$midsss	= $row["m_id"];
						$resultsmid = $resultsmid.',"'.$midsss.'"';
						$mid++;
						} 
				
				 }
				  //$finalsql = "
                  if($tempsearch==1)
				 {
				      $finalsql = "Select * from tbl_tempsearch where sessionid='$sessionid' and mid in ($resultsmid)";
						
				     $arrresultmids= mysql_query($finalsql);
						$resultssqlsearchmid=0;
						while ($row = mysql_fetch_assoc($arrresultmids)) {
						$midsss	= $row["mid"];
						$resultssqlsearchmid = $resultssqlsearchmid.',"'.$midsss.'"';
						$mid++;
						} 
				 }
				 if($tempsearch==0)
				 {
				 $resultssqlsearchmid = $resultsmid;	
				    
				 }

				$rvvlsi = 0;
			    if($_POST['rvvlsi']=='on')
			    {
				$rvvlsi=1;
			    }
				  
				if($rvvlsi==1)
				    {
				    $larresultsdetails = "SELECT a . * , b . rm_mem_id 
FROM rv_registration AS a
 JOIN rv_members_ids AS b ON a.m_id = b.m_id where a.m_id in ($resultssqlsearchmid) Group by a.m_id";
					}
				else
					{
				    $larresultsdetails = "SELECT a . * , b . rm_mem_id 
				                       from rv_registration  as a
									   	  LEFT JOIN rv_members_ids AS b ON a.m_id = b.m_id
							  LEFT JOIN rv_academic_projects As c ON c.m_id = a.m_id
                              
									   where a.m_id in ($resultssqlsearchmid) Group by a.m_id";
										
									//$larresultsdetails.='Group by a.m_id';
					}
				 //echo $larresultsdetails;
				
		 	    $arraStudentss=array();
		 	 	$resultc = mysql_query($larresultsdetails);
		 	 	$re=0;
	            while ($row = mysql_fetch_assoc($resultc)) 
				{
	    		$arraStudentss[$re]["m_id"]	= $row["m_id"];
	    		$arraStudentss[$re]["m_fname"]	= $row["m_fname"];
			    $arraStudentss[$re]["m_resume_id"]	= $row["m_resume_id"];
				$arraStudentss[$re]["m_lname"]	= $row["m_lname"];
			        $arraStudentss[$re]["rm_mem_id"]	= $row["rm_mem_id"];
			    $re++;
		        }
				
				//print_r($arrastudentss);
				//die();
				$countrows = count($arraStudentss);	
				$deletesqldegree = mysql_query("Delete from tbl_tempdegree where sessionid='$sessionid'");
				$deletesqltenth = mysql_query("Delete from tbl_temptenth where sessionid='$sessionid'");
				$deletesqltwelth = mysql_query("Delete from tbl_temptwelth where sessionid='$sessionid'");
				$deletesqlmaster = mysql_query("Delete from tbl_tempmaster where sessionid='$sessionid'");
			    $deletesqlsearch = mysql_query("Delete from tbl_tempsearch where sessionid='$sessionid'");
				$deletesqlsearch = mysql_query("Delete from tbl_masterdegree where sessionid='$sessionid'");
					
		}
		if($_POST['Assign'])
		{
		$showcontact=0;
			if($_POST['contactdetails']=='on')
			{
			$showcontact=1;
			}
			
			$replaytous = 0;
			if($_POST['replaytous']=='on')
			{
			$replaytous=1;
			}
			
			$countnss = count($_POST['IDApplication']);
			for($i=0;$i<$countnss;$i++)
			{
				$mid=$_POST['IDApplication'][$i];
				$searchresultss = "Select a.*
						       from rv_registration as a where
						      a.m_id =$mid";
			$resultcemail = mysql_query($searchresultss);
			while ($row = mysql_fetch_assoc($resultcemail)) {
				  $emailid	= $row["m_emailid"];
				  $name	= $row["m_fname"];
				}
				
						////functin for inserting into the table////
				$jobposting = $_SESSION['idjobposting'];
				
				$delteoldquery = mysql_query("Delete from rv_jobpostedstudent where jp_id='$jobposting'
				                   and m_id='$mid'");
$Insert	=	mysql_query("INSERT INTO rv_jobpostedstudent (jp_id, m_id,Showcontact,replaytous)
VALUES ('".$jobposting."','".$mid."','".$showcontact."','".$replaytous."')")or die(mysql_error()); 
 
				
				/////end of the function//////////
				
				
				 $html='<table width="100%" cellpadding="3" cellspacing="3" border="0">
				         <tr>
						    <td>Dear '.$name.'</td>
						 </tr>
						 <tr>
						    <td>Your resume has been shortlisted to be considered for a position at '.$compname.' and has been forwarded to the recruiter from '.$compname.' You will be intimated by the recruiter from '.$compname.' if you are selection to the next round/interview.</td>
						 </tr>
						 <tr>
						    <td>We wish you All The Very Best!</td>
						 </tr>
						 <tr>
						    <td>Nanochip Solutions Team</td>
						 </tr></table>';
				   
				 $from='RV-VLSI';
				 $to      = 'askiran123@gmail.com';//$email;
				 $subject = 'Recruiter edit' ;
				 $message = $html;
				 $headers = "Content-type: text/html\r\n"; 
				    'Reply-To: webmaster@example.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				 $headers.= "From:" . $from;
				 mail($to, $subject, $message, $headers);  
			}
			
echo "<script>parent.location = 'admin_manage_jobposting.php?idrecruiter=$idrecruiter';</script>";	 
		}	
		
		?>
		
		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../css/styleupdated1.css" type="text/css" media="screen" />
	 <script language="javascript" type="text/javascript" src="../js/lytebox.js"></script>
	<link rel="stylesheet" href="../css/lytebox.css" type="text/css" media="screen" />
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RV-VLSI Design Center</title>

<script type="text/javascript" src="../js/admin_validation.js"></script>

<script type="text/javascript">

function gobacktojobposting()
{
  var idrecruiter = <?php echo $idrecruiter;?>;
   window.location = "http://nanochipsolutions.com/admin1/admin_manage_jobposting.php?idrecruiter="+idrecruiter;
}

function deleterecruiter(idprog)
{
 var deletess = confirm("Do you really want to delete");
  if(deletess == true)
  {
        
	 window.location = "http://www.rv-vlsi.com/rvvlsi/deleteprogram.php?idprograms="+idprog;
   }
}

function hideshowoption()
{
	var cnt = <?php echo $countrows;?>;
	 if(cnt>100)
	 {
	 		 	document.getElementById('showone').style.display = '';
	 			 			 	document.getElementById('showtwo').style.display = '';
	 	document.getElementById('showthree').style.display = '';		 	
	 }
	 else if(cnt>50)
	 {
		 	 	document.getElementById('showone').style.display = '';
	 	 			 	document.getElementById('showtwo').style.display = '';
	 document.getElementById('showthree').style.display = 'none';	
	 }
	else if(cnt>0)
	 {
	 		 			 	document.getElementById('showone').style.display = '';
	 			 			document.getElementById('showtwo').style.display = 'none';
	 	document.getElementById('showthree').style.display = 'none';	
	 }
}

function fnselectallcheckbox()
{
		var cnt = <?php echo $countrows;?>;
		for(var i=0;i<cnt;i++)
		{
			 document.getElementById('m_id'+i).checked=true;
		}
}
//Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
function fnunselectallcheckbox()
{
		var cnt = <?php echo $countrows;?>;
		for(var i=0;i<cnt;i++)
		{
			 document.getElementById('m_id'+i).checked=false;
		}
}
</script>
</head>

<body onload='hideshowoption();'>
<div class="wrapper">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
             <td width="111"><a href="admin_home.php"><img src="../images/Nanologo.jpg"   border="0" /></a></td>
<td width="55"></td>
                
                   <td width="99999" align="right" valign="top">Welcome Admin,<a href="logout.php">Logout</a> </td>
                <td align="left" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="bottom"></td>
                  </tr>
				  <tr><td width="20%"></td><td width="1px" style="background-color:#999999"></td><td width="78%"></td></tr>
                </table></td>
                <td width="332" align="right" valign="bottom" class="link_green" style="padding-bottom:5px;">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          
          <tr>
            <td align="left" valign="top" style="background:#CCCCCC; height:2px;" ></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
            
				<tr><td width="16%" valign="top" style="border-right: 2px solid #CCCCCC;">
				<? include("admin_navigation.php");?>
				
				
				</td>
				<td width="80%" valign="top">
		<form action="" method="post" name="">
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr><td colspan="4" class="heading_new">Search Student for <?php echo $compname;?> ,<a href="admin_manage_jobposting.php?idrecruiter=<?php echo $idrecruiter;?>"><?php echo $recruitername;?></a> <a href="JavaScript:newPopup('http://nanochipsolutions.com/admin1/editjobpostings.php?jpid=<?php echo $idjobposting?>&idrecruiter=<?php echo $idrecruiter;?>');"><?php echo $titlejobposting;?></a></td></tr>
				<tr>
				<td>
				<table height="20%"  width="100%">
<tr><td width="20%" valign="top">

				
				
				</td></tr>

 <tr><td>
 
 <table>
 	<tr>
 		<td>
 		  <table width="800" border="0" cellspacing="2" cellpadding="2" style="background-color:#CCCCCC;">
    <tr style="background-color:#FFFFFF;">
      <td colspan="3" valign="top">Advanced Search</td>
    </tr>
    <tr style="background-color:#FFFFFF;">
      <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td><strong>Select Qualification <span style="color:Red">*</span></strong></td>
        </tr>
        <tr>
          <td> 
						<select multiple="multiple"  id="coursess"  name="coursess[]" class="label"  style="width:120px;height:150px;"> 
													  
						 <?php for($i=0;$i<count($arrcourse);$i++){?>
													  <option value="<?php echo $arrcourse[$i]['cor_name'];?>">
														<?php echo $arrcourse[$i]['cor_name'];?>
														</option>
													  <?php }?>
													  </select>
													  </td>
        </tr>
      </table></td>
      <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td><strong>Select Discipline <span style="color:Red">*</span></strong></td>
        </tr>
        <tr>
          <td>
 <select multiple="multiple"  id="branch"  name="branch[]" class="label"  style="width:200px;height:150px;"> 
							  
 <?php for($i=0;$i<count($arrbranch);$i++){?>
							  <option value="<?php echo $arrbranch[$i]['branch_name'];?>">
								<?php echo $arrbranch[$i]['branch_name'];?>
								</option>
							  <?php }?>
							  </select>
 
 </td>
        </tr>
      </table></td>
      <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td><strong>Marks Required</strong></td>
        </tr>
        <tr>
          <td>
           <table border="0" cellspacing="" cellpadding="" width="100%">
 <tr><td style="font-size: 11px;font-weight:bold;">EDUCATION</td>
 <td style="font-size: 11px;font-weight:bold;">CUT-OFF (%)</td>
 
 </tr>
  <tr><td>10th</td>
 <td><input type="text" value="" id="10" name="education[0]"></input></td>
 
 </tr>
 
   <tr><td>10+2/Diploma</td>
 <td><input type="text" value="" id="10" name="education[1]"></input></td>
 
 </tr>
 
   <tr><td>Under-Graduation</td>
 <td><input type="text" value="" id="10" name="education[2]"></input></td>
 
 </tr>
 
    <tr>
    <td>POST-Graduation</td>
 
 <td><input type="text" value="" id="10" name="education[3]"></input></td>
 
 </tr>
 
 
 
 </table>
          </td>
        </tr>
      </table></td>
    </tr>
    <tr style="background-color:#FFFFFF;">
      <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td><strong>Passed Out</strong></td>
        </tr>
        <tr>
          <td><select name="select3" id="selYearPG">
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
           
          </select>
           </td>
        </tr>
      </table></td>
      <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
              <td><input type="checkbox" name="rvvlsi" id="rvvlsi" />
Show only RV-VLSI Students</td>
          </tr>
            
        </table></td>
      <td valign="top"><input type="text" name="search" id="search" value="Enter Search word" onClick="this.value=''"></td>
    </tr>
    <tr style="background-color:#FFFFFF;">
	<td><span style="color:Red">*</span> Mandatory Fields</td>
	<td colspan="2" align="right">


<input type="submit"  value="Search" name="Search" id="Search" style="background-color:#424843;color:#ffffff;" ></input><a href="searchforjobposting.php?idjobposting=<?php echo $idjobposting;?>&idrecruiter=<?php echo $idrecruiter;?>">Cancel</a></td>


</tr>
  </table><!--
 			<table border="0" cellspacing="1" cellpadding="3" width="100%">
				 <tr>
				 <td class="heading_new">Courses</td>
				 <td class="heading_new">Qualification</td>
				 <td class="heading_new">Cut off</td>
				 </tr>
 <tr>
						 <td> 
						<select multiple="multiple"  id="coursess"  name="coursess[]" class="label"  style="width:120px;height:150px;"> 
													  
						 <?php for($i=0;$i<count($arrcourse);$i++){?>
													  <option value="<?php echo $arrcourse[$i]['cor_name'];?>">
														<?php echo $arrcourse[$i]['cor_name'];?>
														</option>
													  <?php }?>
													  </select>
													  </td>
 <td>
 <select multiple="multiple"  id="branch"  name="branch[]" class="label"  style="width:200px;height:150px;"> 
							  
 <?php for($i=0;$i<count($arrbranch);$i++){?>
							  <option value="<?php echo $arrbranch[$i]['branch_name'];?>">
								<?php echo $arrbranch[$i]['branch_name'];?>
								</option>
							  <?php }?>
							  </select>
 
 </td>
 <td>
 <table border="1" cellspacing="" cellpadding="" width="100%">
 <tr><td>EDUCTION</td>
 <td>CUT-OFF</td>
 
 </tr>
  <tr><td>SSLC</td>
 <td><input type="text" value="" id="10" name="education[0]"></input></td>
 
 </tr>
 
   <tr><td>PUC</td>
 <td><input type="text" value="" id="10" name="education[1]"></input></td>
 
 </tr>
 
   <tr><td >DEGREE</td>
 <td><input type="text" value="" id="10" name="education[2]"></input></td>
 
 </tr>
 
    <tr>
    <td>POST GRADUATION</td>
 
 <td><input type="text" value="" id="10" name="education[3]"></input></td>
 
 </tr>
 
 
 
 </table>
 </td>
 </tr>
 
 <tr>
 	<td><input type="checkbox" name='rvvlsi' id='rvvlsi'class="heading_new" >Show only RV-VLSI Students</input></td>
 </tr>
 
 <tr><td colspan="3" align="right">

</input>
<input type="submit"  value="Search" name="Search" id="Search" style="background-color:#424843;color:#ffffff;" ></input><a href="searchforjobposting.php?idjobposting=<?php echo $idjobposting;?>&idrecruiter=<?php echo $idrecruiter;?>">Cancel</a></td>


</tr>
 
 
 </table>
 --></td></tr>
<tr><td>
            
	</form>		
		
			
<table border="0" cellspacing="1" cellpadding="3" width="100%">
<?php if($countrows!=0)
  {?>
<tr>
<td>
<a href="#" onclick="fnselectallcheckbox();">Select All</a> | <a href="#" onclick="fnunselectallcheckbox();">UnSelect All</a>
</td>
</tr>
<?php }?>
<tr><td><?php if($withoutsearch==0 || $withoutsearch==1)
{
  if($countrows==0)
  {
  	echo " No records to display, Please enter the search parameters";
  }
	
}?></td></tr>
<?php if(count($arraStudentss)>0){?>
<tr valign="top" >
<td id='showone'>    <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">



				   <tr class="gridheader">
				   
					    <td></td>
   					   <td width="33.33%">Student Name</td>
					   <td width="33.33%">Resume Id</td>
					   	  <td width="33.33%">RV-VLSI UIDs</td>
				  </tr>
				  <?php
				  if(count($arraStudentss)<50){
				  	$totalcnt = count($arraStudentss);
				  }
				  else 
				  {
				  	$totalcnt=50;
				  }
for($s=0;$s<$totalcnt;$s++){
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
?>

<tr class="<?php echo $row_color?>">
  <td><input type="checkbox"  name="IDApplication[]" value="<?php  echo $arraStudentss[$s]['m_id']?>" id="m_id<?php echo $s;?>"</td>
<td><a href="admin_view_resume.php?m_id=<?php echo $arraStudentss[$s]['m_id']?>" target="_blank" > <?php echo $arraStudentss[$s]['m_fname'].' '.$arraStudentss[$s]['m_lname'];;?></a></td>

						  <td><?php echo $arraStudentss[$s]['m_resume_id']?></td>
	  <td><?php echo $arraStudentss[$s]['rm_mem_id']?></td>
						  
</tr>

<?php
}
?>
		
			</table></td>
<td id='showtwo'>    <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
				   <tr class="gridheader">
					    <td></td>
   					  <td width="33.33%">Student Name</td>
					   <td width="33.33%">Resume Id</td>
					   	  <td width="33.33%">RV-VLSI UIDs</td>
					   	
				  </tr>
				  <?php
				   if(count($arraStudentss)<100){
				  	$totalcnt = count($arraStudentss);
				  }
				  else 
				  {
				  	$totalcnt=100;
				  }
				  
for($s=50;$s<$totalcnt;$s++){
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
?>

<tr class="<?php echo $row_color?>">
  <td><input type="checkbox"  name="IDApplication[]" value="<?php  echo $arraStudentss[$s]['m_id']?>" id="m_id<?php echo $s;?>"</td>
<td><a href="admin_view_resume.php?m_id=<?php echo $arraStudentss[$s]['m_id']?>" target="_blank" > <?php echo $arraStudentss[$s]['m_fname'].' '.$arraStudentss[$s]['m_lname'];;?></a></td>

						  <td><?php echo $arraStudentss[$s]['m_resume_id']?></td>
<td><?php echo $arraStudentss[$s]['rm_mem_id']?></td>
						  
</tr>

<?php
}
?>
		
			</table></td>
<td id='showthree'>    <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
				   <tr class="gridheader">
					    <td></td>
   					 <td width="33.33%">Student Name</td>
					   <td width="33.33%">Resume Id</td>
					   	  <td width="33.33%">RV-VLSI UIDs</td>
					   	
				  </tr>
				  <?php
				   if(count($arraStudentss)<150){
				  	$totalcnt = count($arraStudentss);
				  }
				  else 
				  {
				  	$totalcnt=150;
				  }
				  
for($s=100;$s<$totalcnt;$s++){
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
?>

<tr class="<?php echo $row_color?>">
  <td><input type="checkbox"  name="IDApplication[]" value="<?php  echo $arraStudentss[$s]['m_id']?>" id="m_id<?php echo $s;?>"</td>
<td><a href="admin_view_resume.php?m_id=<?php echo $arraStudentss[$s]['m_id']?>" target="_blank" > <?php echo $arraStudentss[$s]['m_fname'].' '.$arraStudentss[$s]['m_lname'];;?></a></td>

						  <td><?php echo $arraStudentss[$s]['m_resume_id']?></td>
<td><?php echo $arraStudentss[$s]['rm_mem_id']?></td>
						  
</tr>

<?php
}
?>
		
			</table></td>
</tr>

<tr><td colspan="3" align="right"><input type="checkbox" name='replaytous' id='replaytous' >Replay To Us</input> 
<input type="checkbox" name='contactdetails' id='contactdetails' >Show Contact Details  </input> <input type="submit" class="blueButton" name="Assign" id="Assign" value="Assign" /></td></tr>

</table>
            
			</td>
			<?php }?>
			</tr>
			</table>
 </div>                  

				</td>
				</tr>
				</Table>
				</td>
				</tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20">&nbsp;</td>
      </tr>
    
         <tr>
        <td colspan="10" style="background:#CCCCCC; height:2px;">
      </td></tr>
      <tr> <td colspan="10" align="middle">Copyright @ Nanochipsolutions.</td></tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
		