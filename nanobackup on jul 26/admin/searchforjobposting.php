<?php  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php');  
	//include_once('../classes/recruiter.class.php');  
	   $_SESSION['idrecruiter']=''; 
  $_SESSION['idjobposting']=''; 	   
	$input=new inputFields();	
	$ch=new checkInputFields();	
	$db=new dataBase();
	$rec = new recruiter();
	$db->connectDB(); 
$countrows =0;
$assignedstatus=0;
$resultsss = "SELECT * FROM rv_job_posting where jp_id=".$_GET['idjobposting'];
$idrecruiter=$_SESSION['idrecruiter'] =$_GET['idrecruiter'];

$_SESSION['idjobposting']=$idjobposting = $_GET['idjobposting'];
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
		
		
		$queryrecruiter = "SELECT * FROM rv_recruiters where r_id=".$idrecruiter;

	$resultrecruiter = mysql_query($queryrecruiter);
	while ($rows = mysql_fetch_assoc($resultrecruiter)) {
		$recruitername	= $rows["r_user_name"];
		$compname = $rows["r_company"];
		$_SESSION['recemails']=$recruiteremail = $rows["r_email"];
 
		}
		
		
		$withoutsearch=0;$countrows = count($arraStudentss);
		if($_POST)
		{
			$searchresult = $_POST['search'];
			$searchresultss = "SELECT a . * , b . rm_mem_id 
							  FROM rv_registration AS a
							  LEFT JOIN rv_members_ids AS b ON a.m_id = b.m_id
							  LEFT JOIN rv_academic_projects As c ON c.m_id = a.m_id
                              WHERE a.m_emailid LIKE  '%$searchresult%' OR
                              a.m_skills like '%$searchresult%' OR
						      a.m_resume_id like '%$searchresult%' OR
						      a.m_fname like '%$searchresult%' OR
							    a.m_lname like '%$searchresult%' OR
						      c.p_tools like '%$searchresult%' OR
						       c.p_challenges like '%$searchresult%' OR
						        c.p_other_tech like '%$searchresult%' OR
						        b.rm_mem_id like '%$searchresult%' OR
						      a.m_city like '%$searchresult%' 
								GROUP BY a.m_id";
			/*$searchresultss = "Select a.*
						       from rv_registration as a where
						      a.m_emailid like '%$searchresult%'  OR
						      a.m_skills like '%$searchresult%' OR
						      a.m_resume_id like '%$searchresult%' OR
						      a.m_city like '%$searchresult%' 
						 group by m_id 
						 ";*/
			$s=0;
			$resultc = mysql_query($searchresultss);
	    while ($row = mysql_fetch_assoc($resultc)) {
	    			  $arraStudentss[$s]["m_id"]	= $row["m_id"];
			  $arraStudentss[$s]["m_fname"]	= $row["m_fname"];
			   $arraStudentss[$s]["m_lname"]	= $row["m_lname"];
			 $arraStudentss[$s]["m_resume_id"]	= $row["m_resume_id"];
			 $arraStudentss[$s]["rm_mem_id"]	= $row["rm_mem_id"];
			$s++;
		 }
		 
		$countrows = count($arraStudentss);
		$withoutsearch=1;
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
				   
				 $from='info@nanochipsolutions.com';
				 $to      = 'askiran123@gmail.com';//$email;
				 $subject = 'Nanochip Solutions:Your resume sent to recruiter' ;
				 $message = $html;
				 $headers = "Content-type: text/html\r\n"; 
				    'Reply-To: info@nanochipsolutions.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				 $headers.= "From:" . $from;
				 mail($to, $subject, $message, $headers);  
				 
			}
			
			$htmls='<table width="100%" cellpadding="3" cellspacing="3" border="0">
				         <tr>
						    <td>Dear '.$recruitername.'</td>
						 </tr>
						 <tr>
						    <td>Resumes that best suit your job description have been shortlisted and tagged to your account. Kindly login to your Nanochip Solutions Recruiter account and download the resumes for further processing. The resumes will be available to download till '.$expirydate.' after which it will expire</td>
						 </tr>
						 <tr>
						    <td>Thanks and Regards,</td>
						 </tr>
						 <tr>
						    <td>Nanochip Solutions Team</td>
						 </tr></table>';
				   
				 $from='info@nanochipsolutions.com';
				 $to      = $_SESSION['recemails'];//$_SESSION['recemails'];
				 $subject = 'Nanochip Solutions:Resumes available to view' ;
				 $message = $htmls;
				 $headers = "Content-type: text/html\r\n"; 
				    'Reply-To: info@nanochipsolutions.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				 $headers.= "From:" . $from;
				 mail($to, $subject, $message, $headers); 
			
			$assignedstatus=1;
//echo "<script>parent.location = 'admin_manage_jobposting.php?idrecruiter=$idrecruiter';</script>";	 
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
  
   window.location = "http://nanochipsolutions.com/admin/admin_manage_jobposting.php?idrecruiter="+idrecruiter;
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

//Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}

function fnclose()
{
var jobposting = <?php echo $idjobposting;?>;

var idrecruiter = <?php echo $idrecruiter;?>;

parent.location="searchforjobposting.php?idjobposting="+jobposting+"&idrecruiter="+idrecruiter+"";
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
               <tr>
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
				<?php if($assignedstatus==0){?>
				
				<td width="80%" valign="top">
		<form action="" method="post" name="">
				<table width="100%" cellpadding="0" cellspacing="0" >
				<tr><td colspan="4" class="heading_new">Search Student for <?php echo $compname;?> ,<a href="admin_manage_jobposting.php?idrecruiter=<?php echo $idrecruiter;?>"><?php echo $recruitername;?></a> <a href="JavaScript:newPopup('http://nanochipsolutions.com/admin/editjobpostings.php?jpid=<?php echo $idjobposting?>&idrecruiter=<?php echo $idrecruiter;?>');"><?php echo $titlejobposting;?></a></td></tr>
				<tr>
				<td>
				<table height="20%"  width="100%">
<tr><td width="20%" valign="top">

				
				
				</td></tr>

 <tr><td align="right">
 <input type="text" name="search" id="search" value="Enter Search word" onClick="this.value=''"' style="width: 450px;"><input type="submit" name="Search" value="Search" id='Search' style="background-color:#424843;color:#ffffff;" /></input>
</input><br>  <span style="font-size: 10px;color:#EFFEFEF;">Search here by First Name OR Last name OR City OR Skills OR Resume ID OR Email ID OR Tools OR Other Technologies </span>
</td></tr>
<tr><td>
<table width="100%">

<tr>
<?php if($countrows>0){?>
<td>
<a href="#" onclick="fnselectallcheckbox();">Select All</a> | <a href="#" onclick="fnunselectallcheckbox();">UnSelect All</a>
</td>
<?php }?>
<td align="right">
<a href="advancesearchforjobpostingcombined.php?idjobposting=<?php echo $idjobposting;?>&idrecruiter=<?php echo $idrecruiter;?>">Advanced Search</a></td>

</tr>
</table>
</td></tr>
<tr><td>

            
	</form>		
		
	<form action="" method="post" name="">		
<table border="0" cellspacing="1" cellpadding="3" width="100%">
<tr><td><?php if($withoutsearch==0 || $withoutsearch==1)
{
  if($countrows==0)
  {
  	echo " No records to display, Please enter the search parameters";
  }
	
}?></td></tr>
<tr>
<?php if($countrows>0){?>

<td id='showone' valign="top">    <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
				   <tr class="gridheader">
					  <td></td>
   					   <td width="33.33%">Student Name</td>
					   <td width="33.33%">Resume Id</td>
					   <td width="33.33%">RV-VLSI UID</td>
					   	
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
<td><a href="admin_view_resume.php?m_id=<?php echo $arraStudentss[$s]['m_id']?>" target="_blank" > <?php echo $arraStudentss[$s]['m_fname'].' '.$arraStudentss[$s]['m_lname'];?></a></td>

						  <td><?php echo $arraStudentss[$s]['m_resume_id']?></td>
						    <td><?php echo $arraStudentss[$s]['rm_mem_id']?></td>

						  
</tr>

<?php
}
?>
		
			</table></td>
<td id='showtwo' valign="top">    <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
				   <tr class="gridheader">
					 <td></td>
   					    <td width="33.33%">Student Name</td>
					   <td width="33.33%">Resume Id</td>
					   <td width="33.33%">RV-VLSI UID</td>
					   	
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
<td id='showthree' valign="top">    <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
				   <tr class="gridheader">
					   <td></td>
   					    <td width="33.33%">Student Name</td>
					   <td width="33.33%">Resume Id</td>
					   <td width="33.33%">RV-VLSI UID</td>
					   	
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
<tr><td colspan="4" align="right">
<input type="checkbox" name='replaytous' id='replaytous' >Reply To Us</input> 
<input type="checkbox" name='contactdetails' id='contactdetails' >Show Contact Details  </input> <input type="submit" class="blueButton" name="Assign" id="Assign" value="Assign" /></td></tr>
</table>
       </form>     
			</td>
			</tr>
			</table>
			
			
 </div>                  

				</td>
				<?php }?>
			
			<?php } else {?>
			<td valign="top">
			<table width="100%"  cellpadding="4" cellspacing="10" border="0" class="resuemviewtableborder">
 <tr>
			
			<td><img src="/images/iocn_information.png">E-Mail has sent to the Recruiter</td>
			
		</tr>
		
		
      <tr> <td align="right">
	  <input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td></tr>
					
  </table>
  </td>
			<?php }?>
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
