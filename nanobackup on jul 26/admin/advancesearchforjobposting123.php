<?php  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php');  
	//include_once('../classes/recruiter.class.php');  
	   
	$input=new inputFields();	
	$ch=new checkInputFields();	
	$db=new dataBase();
	$rec = new recruiter();
	$db->connectDB(); 
$countrows =0;

$resultsss = "SELECT * FROM rv_job_posting where jp_id=".$_GET['idjobposting'];
$idrecruiter =$_GET['idrecruiter'];
$idjobposting = $_GET['idjobposting'];
	$resultc = mysql_query($resultsss);
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent["jp_job_title"]	= $row["jp_job_title"];
		 $arraStudent["jp_description"]	= $row["jp_description"];
		 $arraStudent["jp_id"]	= $row["jp_id"];
		 $arraStudent["jp_expdate"]	= $row["jp_expdate"];
		 $arraStudent["jp_skills"]	= $row["jp_skills"];
		 $titlejobposting = $row["jp_job_title"];
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
 
		}

		/////////end of the function///////////////////////
		
		 		////function for displaying all the branches//////	
		$resultbranch= "SELECT *  FROM  `rv_branch`  WHERE cor_id IN ( 1, 13, 14, 16, 25, 55, 53 )  AND  `branch_status` =1 GROUP BY branch_name";
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
			
		$withoutsearch=1;
			//print_R($_POST['education']);
			$courscount = count($_POST['coursess']);
			$branchcount = count($_POST['branch']);
			//$education = count($_POST['education']);
			
					//print_r($courscount);
						//print_r($branchcount);
						//print_r($education);
						//die();
						$flag=0;
			$tenth=800;$twelth=800;$degree=800;$postdegree=800;
			
			 if($_POST['education'][0])
			 {
			 	$tenth = $_POST['education'][0];
			 	$flag=1;
			 }
			 
		     if($_POST['education'][1])
			 {
			 	$twelth = $_POST['education'][1];
			 	$flag=1;
			 }

		    if($_POST['education'][2])
			 {
			 	$degree = $_POST['education'][2];
			 	$flag=1;
			 }
		 if($_POST['education'][3])
			 {
			 	$postdegree = $_POST['education'][3];
			 	$flag=1;
			 }
			 
			 if($courscount>0 && $branchcount>0 && $flag>0)
			{
			//for coursesids 
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
							 
		        $branchsid;//all courses ids
				
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
				 
				 $branchid;//all branches ids
				 
				 
				  $larrselect="Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$tenth and b.qua_id=5 and a.m_id=b.m_id 
		 						   AND a.e_branch in($branchid) AND a.e_course in ($branchsid) UNION 
		 						   Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$twelth and b.qua_id=4 and a.m_id=b.m_id 
		 						   AND a.e_branch in($branchid) AND a.e_course in ($branchsid) UNION 
		 						   Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$degree and b.qua_id=2 and a.m_id=b.m_id 
		 						   AND a.e_branch in($branchid) AND a.e_course in ($branchsid)
		 						   ";
				  
				$arrresultmids= mysql_query($larrselect);
				$resultsmid=0;
				while ($row = mysql_fetch_assoc($arrresultmids)) {
	    		$midsss	= $row["m_id"];
	    		$resultsmid = $resultsmid.',"'.$midsss.'"';
				$mid++;
				}
				
				$larresultsdetails = "SELECT * from rv_registration where m_id in ($resultsmid)";
		 	    $arraStudentss=array();
		 	 	$resultc = mysql_query($larresultsdetails);
		 	 	$re=0;
	            while ($row = mysql_fetch_assoc($resultc)) 
				{
	    		$arraStudentss[$re]["m_id"]	= $row["m_id"];
	    		$arraStudentss[$re]["m_fname"]	= $row["m_fname"];
			    $arraStudentss[$re]["m_resume_id"]	= $row["m_resume_id"];
			    $re++;
		        }
					$countrows = count($arraStudentss);	 
					
					
			
			}
			else if($courscount>0 && $branchcount>0 ||$flag>0 && $branchcount>0 ||$courscount>0 && $flag>0)
			{
			//echo "Asdf";
			
			   //for coursesids 
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
							 
		        $branchsid;//all courses ids
				
				
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
				 
				 $branchid;//all branches ids
			  
			  if($courscount>0 && $branchcount>0)
			  {
			     $larrselect="Select a.m_id from rv_educational_details as a
		 						   where a.e_branch in($branchid) AND a.e_course in ($branchsid)";
			  }  
				
			  else if($courscount>0 && $flag>0)
			  {
			   
			      $larrselect="Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$tenth AND a.m_id=b.m_id AND a.e_course in ($branchsid) UNION 
		 						   Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$twelth and b.qua_id=4 and a.m_id=b.m_id AND
		 						   a.e_course in ($branchsid) UNION 
		 						   Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$degree and b.qua_id=2 and a.m_id=b.m_id 
		 						   AND a.e_course in ($branchsid)
		 						   ";
				   //echo $larrselect;
				}
				
				
				else if($branchcount>0 && $flag>0)
				{
				    $larrselect="Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$tenth and b.qua_id=5 and a.m_id=b.m_id 
		 						   AND a.e_branch in($branchid) UNION 
		 						   Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$twelth and b.qua_id=4 and a.m_id=b.m_id 
		 						   AND a.e_branch in($branchid) UNION 
		 						   Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$degree and b.qua_id=2 and a.m_id=b.m_id 
		 						   AND a.e_branch in($branchid) 
		 						   ";
				}
				$arrresultmids= mysql_query($larrselect);
				$resultsmid=0;
				while ($row = mysql_fetch_assoc($arrresultmids)) {
	    		$midsss	= $row["m_id"];
	    		$resultsmid = $resultsmid.',"'.$midsss.'"';
				$mid++;
				}
			  
				$larresultsdetails = "SELECT * from rv_registration where m_id in ($resultsmid)";
		 	    $arraStudentss=array();
		 	 	$resultc = mysql_query($larresultsdetails);
		 	 	$re=0;
	            while ($row = mysql_fetch_assoc($resultc)) 
				{
	    		$arraStudentss[$re]["m_id"]	= $row["m_id"];
	    		$arraStudentss[$re]["m_fname"]	= $row["m_fname"];
			    $arraStudentss[$re]["m_resume_id"]	= $row["m_resume_id"];
			    $re++;
		        }
					$countrows = count($arraStudentss);	
			}
			
			else if($coursecount==0 || $flag==0 || $branchcount==0)
			{
			   //for coursesids 
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
							 
		        $branchsid;//all courses ids
				
				
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
				 
				 $branchid;//all branches ids
				 
				 
				 if($branchcount>0)
				 {
				   $larrselect="Select a.m_id from rv_educational_details as a
		 						   where a.e_branch in($branchid)";
				 }
				 else if($coursecount>0)
				 {
				 $larrselect="Select a.m_id from rv_educational_details as a
		 						   where a.e_course in ($branchsid)";
				 }
				 else
				 {
				 $larrselect="Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$tenth and b.qua_id=5 UNION 
		 						   Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$twelth and b.qua_id=4  UNION 
		 						   Select a.m_id from rv_educational_details as a,rv_educational_details as b 
		 						   where b.e_percentage >=$degree and b.qua_id=2 
		 						   ";
				 }
				 
				 $arrresultmids= mysql_query($larrselect);
				$resultsmid=0;
				while ($row = mysql_fetch_assoc($arrresultmids)) {
	    		$midsss	= $row["m_id"];
	    		$resultsmid = $resultsmid.',"'.$midsss.'"';
				$mid++;
				}
			  
				$larresultsdetails = "SELECT * from rv_registration where m_id in ($resultsmid)";
		 	    $arraStudentss=array();
		 	 	$resultc = mysql_query($larresultsdetails);
		 	 	$re=0;
	            while ($row = mysql_fetch_assoc($resultc)) 
				{
	    		$arraStudentss[$re]["m_id"]	= $row["m_id"];
	    		$arraStudentss[$re]["m_fname"]	= $row["m_fname"];
			    $arraStudentss[$re]["m_resume_id"]	= $row["m_resume_id"];
			    $re++;
		        }
					$countrows = count($arraStudentss);	
					
					
			}
			       
					
					
		}
			

		if($_POST['Assign'])
		{
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
				
				 $html='Dear '.$name;
				   
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
				<tr><td colspan="4" class="heading_new">Search Student for <?php echo $compname;?> ,<a href="admin_mangae_recruiters.php"><?php echo $recruitername;?></a> <a href="admin_manage_jobposting.php?idrecruiter=<?php echo $idrecruiter;?>"><?php echo $titlejobposting;?></a></td></tr>
				<tr>
				<td>
				<table height="20%"  width="100%">
<tr><td width="20%" valign="top">

				
				
				</td></tr>

 <tr><td>
 
 <table>
 	<tr>
 		<td>
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
 </td></tr>
<tr><td>
            
	</form>		
		
			
<table border="0" cellspacing="1" cellpadding="3" width="100%">
<tr>
<td>
<a href="#" onclick="fnselectallcheckbox();">Select All</a> | <a href="#" onclick="fnunselectallcheckbox();">UnSelect All</a>
</td>
</tr>
<tr><td><?php if($withoutsearch==0 || $withoutsearch==1)
{
  if($countrows==0)
  {
  	echo " No records to display, Please enter the search parameters";
  }
	
}?></td></tr>
<tr valign="top" >
<td id='showone'>    <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">



				   <tr class="gridheader">
				   
					    <td></td>
   					   <td width="50%">Student Name</td>
					   <td width="50%">Resume Id</td>
					   	
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
<td><a href="admin_view_resume.php?m_id=<?php echo $arraStudentss[$s]['m_id']?>" target="_blank" > <?php echo $arraStudentss[$s]['m_fname'];?></a></td>

						  <td><?php echo $arraStudentss[$s]['m_resume_id']?></td>

						  
</tr>

<?php
}
?>
		
			</table></td>
<td id='showtwo'>    <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
				   <tr class="gridheader">
					    <td></td>
   					   <td width="50%">Student Name</td>
					   <td width="50%">Resume Id</td>
					   	
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
<td><a href="admin_view_resume.php?m_id=<?php echo $arraStudentss[$s]['m_id']?>" target="_blank" > <?php echo $arraStudentss[$s]['m_fname'];?></a></td>

						  <td><?php echo $arraStudentss[$s]['m_resume_id']?></td>

						  
</tr>

<?php
}
?>
		
			</table></td>
<td id='showthree'>    <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
				   <tr class="gridheader">
					    <td></td>
   					   <td width="50%">Student Name</td>
					   <td width="50%">Resume Id</td>
					   	
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
<td><a href="admin_view_resume.php?m_id=<?php echo $arraStudentss[$s]['m_id']?>" target="_blank" > <?php echo $arraStudentss[$s]['m_fname'];?></a></td>

						  <td><?php echo $arraStudentss[$s]['m_resume_id']?></td>

						  
</tr>

<?php
}
?>
		
			</table></td>
</tr>

<tr><td colspan="3" align="right"><input type="checkbox" name='contactdetails' id='contactdetails' >Show Contact Details  </input> <input type="submit" class="blueButton" name="Assign" id="Assign" value="Assign" /></td></tr>

</table>
            
			</td>
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
