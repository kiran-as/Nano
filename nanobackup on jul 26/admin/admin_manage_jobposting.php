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

 $curdate = mktime();
 $idgetrecruiter = $_GET['idrecruiter'];
$resultsss = "SELECT * FROM rv_job_posting where r_id=$idgetrecruiter order by jp_id desc";

$idrecruiter = $_GET['idrecruiter'];
$resultrecruiter = "SELECT * FROM rv_recruiters where r_id=".$_GET['idrecruiter'];

	$resultrecruiter = mysql_query($resultrecruiter);
	while ($row = mysql_fetch_assoc($resultrecruiter)) {
		
		 $compname	= $row["r_company"];
 $username	= $row["r_user_name"];
		}
		
		
		
	$resultc = mysql_query($resultsss);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$s]["jp_job_title"]	= $row["jp_job_title"];
		 $arraStudent[$s]["jp_description"]	= $row["jp_description"];
		 $arraStudent[$s]["jp_id"]	= $row["jp_id"];
		 	   $arraStudent[$s]["jp_expdate"]	= $row["jp_expdate"];
		    $arraStudent[$s]["createddate"]	= date('d/m/Y',$row["jp_created_date"]);
		    $arraStudent[$s]["expdate"]	= date('d/m/Y',$row["jp_expdate"]);
			 $arraStudent[$s]["jp_bonddetails"]	= $row["jp_bonddetails"];
		  $s++;  
		}
		$withoutsearch=0;$countrows = count($arraStudent);
		
		    if($_POST)
	{
	  $searchresult = $_POST['searchdetails'];
			$searchresultss = "Select a.*
						       from rv_job_posting as a where 
						      a.jp_job_title like '%$searchresult%'   AND  a.r_id=$idrecruiter   OR
						      a.jp_description like '%$searchresult%' AND  a.r_id=$idrecruiter 
						 ";
						 //echo $searchresultss;
				$arraStudent = array();		 
			$k=0;
			$resultcc = mysql_query($searchresultss);
		while ($rows = mysql_fetch_assoc($resultcc)) {
		  $arraStudent[$k]["jp_job_title"]	= $rows["jp_job_title"];
		 $arraStudent[$k]["jp_description"]	= $rows["jp_description"];
		 $arraStudent[$k]["jp_id"]	= $rows["jp_id"];
		  $arraStudent[$k]["jp_expdate"]	=  date(" d-m-Y ",$rows["jp_expdate"]);
		 	 
		  $arraStudent[$k]["jp_created_date"]	= date(" d-m-Y ",$rows["jp_created_date"]); 
		  $k++;  
		}
		  $withoutsearch=1;
		 
		 	$countrows = count($arraStudent);
		
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
function deleterecruiter(idprog,recruiter)
{
 
 var deletess = confirm("Do you really want to delete");
  if(deletess == true)
  {
        
	 window.location = "deletejobposting.php?jpid="+idprog+"&recruiter="+recruiter;
   }
   
}

//Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
</head>

<body>
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
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr><td colspan="4" class="heading_new">Job Posting for <?php echo $compname;?> , <?php echo $username;?></td></tr>
				<tr>
				<td>
				<table height="20%"  width="100%">
<tr><td width="20%" valign="top">

				
				
				
							
				</td></tr>
<form action="" method="post">
 <tr><td align="right">Enter Title or Designation<input type="text" name='searchdetails' id='searchdetails' value="Enter Search word" onClick="this.value=''"'/>
<input type="submit" name="Search" value="Search" id='Search' style="background-color:#424843;color:#ffffff;" /></td></tr></form>
<tr><td><?php if($withoutsearch==1)
{
  if($countrows==0)
  {
  	echo " No records to display, Please enter the search parameters";
  }
	
}?></td></tr>
<tr><td><?php if($withoutsearch==0)
{
  if($countrows==0)
  {
  	echo "Recruiter has not added any job";
  }
	
}?></td></tr>
<tr><td>

            
			
		
			
<?php if($withoutsearch==0 || $withoutsearch==1)
     if($countrows>0){?>
                <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
				   <tr class="gridheader">
					   <td width="24%" valign="top">Title</td>
   					      <td  width="20%" valign="top">Posted Date</td>
   					         <td  width="20%" valign="top">Expiry Date</td>
							  <td width="20" valign="top">Bond Details <br/> <span style="font-size:10px;color: #999999;">Months</span></td>
							 <td width="6" valign="top">Status</td>
					   <td   width="7%"></td>
					   	
				  </tr>
				  <?php
for($s=0;$s<count($arraStudent);$s++){
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
?>
 
<tr class="<?php echo $row_color?>">
<?php if(($arraStudent[$s]['jp_expdate']=='') || ($curdate > $arraStudent[$s]['jp_expdate']))
{
?>
<td><?php echo $arraStudent[$s]['jp_job_title'];?></a></td>
<?php }
else {?>
<td> <a href="searchforjobposting.php?idjobposting=<?php echo $arraStudent[$s]['jp_id']?>&idrecruiter=<?php echo $idrecruiter;?>"><?php echo $arraStudent[$s]['jp_job_title'];?></a></td>
<?php }?>
<?php $jpid = $arraStudent[$s]['jp_id'];
	  
	  	
    $queryofjobpostingid = "SELECT *  FROM rv_jobpostedstudent WHERE jp_id=$jpid"; 
	//echo $queryofjobpostingid;
	$resultc = mysql_query($queryofjobpostingid);
	$countofjobstudents=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arrastudentforjobposting[$countofjobstudents]["m_id"]	= $row["m_id"];
		  $countofjobstudents++;  
		}
	  //echo $countofjobstudents;
	  //die();
	  
	  
	  ?>
	   <?php 
	 $todaydate = date('d-m-Y');
	 $datearray = explode('-',$todaydate);
$dates = $datearray[0];
$months = $datearray[1];
$years = $datearray[2];
$curdates = mktime(0,0,0,$months,$dates,$years);
/*echo "-----------------------".$countofjobstudents;
echo $curdates;
echo $arraStudent[$s]['jp_expdate'];
echo "<br/>";
	 */
	 $processing=0;
	 if($arraStudent[$s]['jp_expdate']=='')
	 {
	   $processing=1;
	 }
	 if($processing==0)
	 {
		 if($curdates >= $arraStudent[$s]['jp_expdate'])
		 {
			$processing=2;
		 }
	 }
	 
	 if($curdates < $arraStudent[$s]['jp_expdate'])
	 {
	    $processing=1;
	 }
	 
	  if($processing!=2)
	 {
	 if($countofjobstudents>0)
	 {
	    $processing=3;
	 }
	 }
	 ?>
	 
<td><?php echo $arraStudent[$s]["createddate"];?></td>
<td><?php echo $arraStudent[$s]["expdate"];?></td>
<td><?php echo $arraStudent[$s]["jp_bonddetails"];?></td>
 <td nowrap="nowrap">
	    <?php if($processing==2){?>
	   <span class="label label-warning">Expired</span>
	  
	  <?php } else if($processing==3){?>
	 <span class="label label-success">Active</span>
	  
	  <?php } else {?>
	  <span class="label label-process">Processing</span>
	  
	  <?php }?>
	  </td>
	  
						  <td>
				<a onclick="deleterecruiter(<?php echo $arraStudent[$s]['jp_id']?>,<?php echo $idrecruiter;?>)"><img src="../images/icon_delete.png" border="0" alt="Delete" align="right"/></a>
				<a href="JavaScript:newPopup('http://nanochipsolutions.com/admin/editjobpostings.php?jpid=<?php echo $arraStudent[$s]['jp_id']?>&idrecruiter=<?php echo $idrecruiter;?>');"><img src="../images/icon_descriptionview.png" border="0" alt="Delete" align="right"/></a>
				 
				  <a href="editjobposting.php?idjobposting=<?php echo $arraStudent[$s]['jp_id']?>&idrecruiter=<?php echo $idrecruiter;?>" rel="lyteframe" 
   				rev="width:500px; height:500px; scrolling:no"><img src="../images/icon_edit.png" border="0" alt="Delete" align="right"/></a>
						 
						  </td>
						  
</tr>

<?php
}
?>
		
			</table>
			<?php }?>
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
