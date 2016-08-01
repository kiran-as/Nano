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
	$today  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
	
	$fiveday  = mktime(0, 0, 0, date("m")  , date("d")+5, date("Y"));
	
	$selectquery = mysql_query("Select a.*,b.* from rv_job_posting as a,rv_recruiters as b where a.r_id=b.r_id and a.jp_expdate>=$today and a.jp_expdate<=$fiveday group by a.jp_id");
	$i=0;
	while($row = mysql_fetch_assoc($selectquery))
	{
	  $arryjobposted[$i]['jp_company'] = $row['jp_company'];
	  $arryjobposted[$i]['jp_name'] = $row['jp_name'];
	  $arryjobposted[$i]['r_user_name'] = $row['r_user_name'];
	  $arryjobposted[$i]['jp_telephone'] = $row['jp_telephone'];
	  $arryjobposted[$i]['jp_mobile'] = $row['jp_mobile'];
	  $arryjobposted[$i]['jp_email'] = $row['jp_email'];
	  	  $arryjobposted[$i]['jp_id'] = $row['jp_id'];
		  $i++;
	}
	$countofarrayjobposted = $i;
$dates = date('Y-m-d');
$resultsss = "SELECT * 
FROM  `rv_recruiters` 
WHERE r_id
IN (
SELECT r_id
FROM rv_job_posting
WHERE jp_expdate =  ''
GROUP BY r_id
UNION 
SELECT r_id
FROM rv_job_posting
WHERE upddate =  '$dates'
GROUP BY r_id)
order by r_company"
;

	$resultc = mysql_query($resultsss);
	$s=0;
	$prid = 0;
	while ($row = mysql_fetch_assoc($resultc)) {
		$arraStudent[$s]["r_user_name"]	= $row["r_user_name"];
		$arraStudent[$s]["r_company"]	= $row["r_company"];
		$arraStudent[$s]["r_mobile"]	= $row["r_mobile"];
		$arraStudent[$s]["r_email"]	= $row["r_email"];
		$arraStudent[$s]["r_designation"]	= $row["r_designation"];
		$arraStudent[$s]["r_active"]	= $row["r_active"];
		$idrecruiterjobpending  = $arraStudent[$s]["r_id"]	= $row["r_id"];
		$prid = $prid.','.$idrecruiterjobpending;
		$arraStudent[$s]["registereddate"]	= $row["registereddate"];
		$selectjobpending = "Select * from rv_job_posting where r_id=$idrecruiterjobpending and jp_expdate=''";
		$arraStudent[$s]["pendingjobposting"]=0;
		$executeselectjobpending = mysql_query($selectjobpending);
		//$cntpending = count($executeselectjobpending);
			while ($row = mysql_fetch_assoc($executeselectjobpending)) {
			$arraStudent[$s]["pendingjobposting"]=1;	
			}
		  $s++;  
		}
		
$resultoldjobs = "Select a.* from rv_recruiters as a where a.r_id not in ($prid) order by a.r_company";

	$resultc = mysql_query($resultoldjobs);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		$arraoldjobs[$s]["r_user_name"]	= $row["r_user_name"];
		$arraoldjobs[$s]["r_company"]	= $row["r_company"];
		$arraoldjobs[$s]["r_mobile"]	= $row["r_mobile"];
		$arraoldjobs[$s]["r_email"]	= $row["r_email"];
		$arraoldjobs[$s]["r_designation"]	= $row["r_designation"];
		$arraoldjobs[$s]["r_active"]	= $row["r_active"];
		$idrecruiterjobpending  = $arraoldjobs[$s]["r_id"]	= $row["r_id"];
		$arraoldjobs[$s]["registereddate"]	= $row["registereddate"];
		$s++;
		}		
		
		
			$withoutsearch=0;
    if($_POST)
	{
	  $searchresult = $_POST['searchdetails'];
			$searchresultss = "Select a.*
						       from rv_recruiters as a where
						      a.r_user_name like '%$searchresult%'  OR
						      a.r_company like '%$searchresult%' OR
						      a.r_mobile like '%$searchresult%' OR
							  a.r_designation like '%$searchresult%' OR
						      a.r_email like '%$searchresult%' 
						 group by a.r_id 
						 ";
						 //echo $searchresultss;
				$arraStudent = array();		 
			$k=0;
			$resultcc = mysql_query($searchresultss);
		while ($rows = mysql_fetch_assoc($resultcc)) {
		$arraStudent[$k]["r_user_name"]	= $rows["r_user_name"];
		$arraStudent[$k]["r_company"]	= $rows["r_company"];
		$arraStudent[$k]["r_mobile"]	= $rows["r_mobile"];
		$arraStudent[$k]["r_email"]	= $rows["r_email"];
		$arraStudent[$k]["r_designation"]	= $rows["r_designation"];
		$arraStudent[$k]["r_active"]	= $rows["r_active"];
		$arraStudent[$k]["r_id"]	= $rows["r_id"];
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
function deleterecruiter(idrecruiter)
{
 var deletess = confirm("Do you really want to delete");
  if(deletess == true)
  {
        
	 window.location = "deleterecruiter.php?idrecruiter="+idrecruiter;
   }
}

function fnshownewjobs()
{
   document.getElementById('newjobs').style.display='';
   document.getElementById('oldjobs').style.display='none';
}
function fnshowoldjobs()
{
 document.getElementById('newjobs').style.display='none';
   document.getElementById('oldjobs').style.display='';
}

</script>
</head>

<body>
<div>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                <td width="111"><a href="admin_home.php"><img src="../images/Nanologo.jpg"   border="0" /></td>

                
                
                <td width="99999" align="right" valign="top"></a>Welcome Admin <a href="logout.php">Logout</a></td>
                <td align="left" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="bottom"></td>
                  </tr>
				  <tr><td width="20%"></td><td width="1px" style="background-color:#999999"></td><td width="78%"></td></tr>
                </table></td>
                <td width="332" align="right" valign="bottom" class="link_green" style="padding-bottom:5px;">&nbsp;</td>
              </tr>
            </table>
            </td>
           
            
          </tr>
          
          <tr>
            <td align="left" valign="top" style="background:#CCCCCC; height:2px;" ></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
            
				<tr>
				<td width="16%"  height="100%" valign="top" style="border-right: 2px solid #CCCCCC;">
				<? include("admin_navigation.php");?>
				
				
				</td>
				<td width="100%" valign="top">
				
					<Table width="100%" cellpadding="0" cellspacing="0" >
				
						<tr>
						<td colspan="4" class="heading_new">Manage Recruiters and Jobs</td></tr>
				<tr>
				<td>
				<table height="20%"  width="100%">
					<tr>
					  <td width="20%" valign="top"></td>
					</tr>
					<form action="" method="post">
					
					    
					   <td>
					       <table width="100%">
						       <Tr>
							        <Td>
									Manage Recruiters and Jobs
									<input type="radio" name="jobs" id="jobs" value="recent" onclick="fnshownewjobs()" checked="checked">Recent Posts
									<input type="radio" name="jobs" id="jobsss" value="old" onclick="fnshowoldjobs()">Old Posts
									</td>
									<Td align="right">
									 <input type="text" name='searchdetails' id='searchdetails' value="Enter Search word" onClick="this.value=''"/>
							<input type="submit" name="Search" value="Search" id='Search' style="background-color:#424843;color:#ffffff;" />
							
									</td>
							   </tr>
						   </table>
					   
					       
							
					   </td>
					</tr></form>

<tr>

                 <tr><td colspan="6"><?php if($withoutsearch==1)
{
  if($countrows==0)
  {
  	echo " No records to display, Please enter the search parameters";
  }
	
}?></td></tr>

<td>
<?php if($countofarrayjobposted>0){?>
            
			<table>
			<td align="left" style="display:none"><a href="expiryjobposting.php" rel="lyteframe" 
   				rev="width: 700px; height: 300px; scrolling:no">jobposted intimation</a></td>

			</table>
	<?php }?>	
			

                <table id="newjobs" border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">

				   <tr class="gridheader">
				     <td></td>
					   <td>Name</td>
   					   <td>Company</td>
					   <td>Mobile</td>
					   <td>E-Mail</td>
   					   <td >Designation</td>	
						<td nowrap="nowrap">Reg Date</td>						   
					   <td nowrap="nowrap"></td>
					   	
				  </tr>
				 
				  <?php //print_R(count($arraStudent));
for($s=0;$s<count($arraStudent);$s++){
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
?>

<tr class="<?php echo $row_color?>">
<td  nowrap="nowrap"><?php if($arraStudent[$s]['r_active'] == 1) 
						{ ?>
						 <img src="../images/icon_green.png" border="0" hspace="4"  align="absmiddle"/>
						<?php if($arraStudent[$s]['pendingjobposting']==1){?>
						<img src="../images/flag_red.png" border="0" hspace="4"  align="absmiddle"/>
						<?php } else {?>
						
						<?php }?>
						 
						  
				   <?php } else {?>
				   
						  <img src="../images/icon_red.png" border="0" hspace="4"  align="absmiddle"/>
						  <a> </a>
						  <?php }?></td>
						  
<td  nowrap="nowrap"><?php if($arraStudent[$s]['r_active'] == 1) 
						{ ?>
						 
						  <a href="admin_manage_jobposting.php?idrecruiter=<?php echo $arraStudent[$s]['r_id']?>"> <?php echo $arraStudent[$s]['r_user_name'];?></a>
				   <?php } else {?>
				   
						 
						   <a href="admin_manage_jobposting.php?idrecruiter=<?php echo $arraStudent[$s]['r_id']?>"> <?php echo $arraStudent[$s]['r_user_name'];?></a>
						  <?php }?></td>

<td  nowrap="nowrap"><?php echo $arraStudent[$s]['r_company'];?></td>
<td  nowrap="nowrap"><?php echo $arraStudent[$s]['r_mobile'];?></td>
<td  nowrap="nowrap"><?php echo $arraStudent[$s]['r_email'];?></td>
<td  nowrap="nowrap"><?php echo $arraStudent[$s]['r_designation'];?></td>
<td  nowrap="nowrap"><?php echo $arraStudent[$s]['registereddate'];?></td>

						  <td>
				<a onclick="deleterecruiter(<?php echo $arraStudent[$s]['r_id']?>)"><img src="../images/icon_delete.png" border="0" alt="Delete" align="right"/></a>
				  <a href="editrecruiter.php?idrecruiter=<?php echo $arraStudent[$s]['r_id']?>" rel="lyteframe" 
   				rev="width:450px; height:420px; scrolling:yes"><img src="../images/icon_edit.png" border="0" alt="Delete" align="right"/></a>
						  </td>
						  
</tr>

<?php
}
?>
		
			</table>
			
			
			
			<table style="display:none" id="oldjobs" border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">

				   <tr class="gridheader">
				     <td></td>
					   <td>Name</td>
   					   <td>Company</td>
					   <td>Mobile</td>
					   <td>E-Mail</td>
   					   <td >Designation</td>	
						<td nowrap="nowrap">Reg Date</td>						   
					   <td nowrap="nowrap"></td>
					   	
				  </tr>
				 
				  <?php //print_R(count($arraStudent));
for($s=0;$s<count($arraoldjobs);$s++){
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
?>

<tr class="<?php echo $row_color?>">
<td  nowrap="nowrap"><?php if($arraoldjobs[$s]['r_active'] == 1) 
						{ ?>
						 <img src="../images/icon_green.png" border="0" hspace="4"  align="absmiddle"/>
						<?php if($arraoldjobs[$s]['pendingjobposting']==1){?>
						<img src="../images/flag_red.png" border="0" hspace="4"  align="absmiddle"/>
						<?php } else {?>
						
						<?php }?>
						 
						  
				   <?php } else {?>
				   
						  <img src="../images/icon_red.png" border="0" hspace="4"  align="absmiddle"/>
						  <a> </a>
						  <?php }?></td>
						  
<td  nowrap="nowrap"><?php if($arraoldjobs[$s]['r_active'] == 1) 
						{ ?>
						 
						  <a href="admin_manage_jobposting.php?idrecruiter=<?php echo $arraoldjobs[$s]['r_id']?>"> <?php echo $arraoldjobs[$s]['r_user_name'];?></a>
				   <?php } else {?>
				   
						 
						   <a href="admin_manage_jobposting.php?idrecruiter=<?php echo $arraoldjobs[$s]['r_id']?>"> <?php echo $arraoldjobs[$s]['r_user_name'];?></a>
						  <?php }?></td>

<td  nowrap="nowrap"><?php echo $arraoldjobs[$s]['r_company'];?></td>
<td  nowrap="nowrap"><?php echo $arraoldjobs[$s]['r_mobile'];?></td>
<td  nowrap="nowrap"><?php echo $arraoldjobs[$s]['r_email'];?></td>
<td  nowrap="nowrap"><?php echo $arraoldjobs[$s]['r_designation'];?></td>
<td  nowrap="nowrap"><?php echo $arraoldjobs[$s]['registereddate'];?></td>

						  <td>
				<a onclick="deleterecruiter(<?php echo $arraoldjobs[$s]['r_id']?>)"><img src="../images/icon_delete.png" border="0" alt="Delete" align="right"/></a>
				  <a href="editrecruiter.php?idrecruiter=<?php echo $arraoldjobs[$s]['r_id']?>" rel="lyteframe" 
   				rev="width:450px; height:420px; scrolling:yes"><img src="../images/icon_edit.png" border="0" alt="Delete" align="right"/></a>
						  </td>
						  
</tr>

<?php
}
?>
		
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
        
      </tr>
    
      <tr>
        <td colspan="10" style="background:#CCCCCC; height:2px;">
      </td></tr>
      <tr> <td colspan="10" align="middle">Copyright @ Nanochipsolutions.</td></tr>
    </table></td>
  </tr>
</table>

</body>
</html>
