<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	  include_once('../classes/recruiter.class.php');  
	   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
	$rec = new recruiter();
   $db->connectDB(); 



if($_REQUEST[mode]==3 && is_numeric($_REQUEST[j_id]))
	{
	//mysql_query("Delete from $contact_us_table where ce_id=$_REQUEST[ce_id] ") or die("culdnot delete:".mysql_error());
	$deleteRow   = $rec->delJobApp($_REQUEST[j_id]);
	header("location:".$_SERVER['PHP_SELF']."?msg=3");
	}








$totalrow   = $rec->getJobApp(1);

$limit=30;
$png=$_REQUEST['png'];
if(empty($png)){
 $png = 1;
} 

$limitvalue = ($png * $limit )- ($limit);  
$list_results = $rec->getJobApp('',$limitvalue,$limit);
$list_count   = $rec->getJobApp(1,$limitvalue,$limit);





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RV-VLSI Design Center</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script type="text/jvascript" src="../js/admin_validation.js"></script>
<link href="../rv_main.css" rel="stylesheet" type="text/css" />


</head>

<body>
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
                <td width="55">&nbsp;</td>
                <td width="88" align="left" valign="middle">&nbsp;</td>
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
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                </tr>
				<tr><td width="20%" valign="top">
				<? include("admin_navigation.php");?>
				
				
				</td>
				<td width="80%" valign="top" >
				
				
				
				<?php 
				########################################VIEW JOB APPLICATIONS####################################
				
				
				if($_REQUEST['mode'] == 7) {
				
				$j_row = $rec->getJobApp('','','',$_REQUEST['j_id']);
	
				
				?>
				
				
				
				<table width="95%" align="center">
				<tr>
				  <td colspan="2" class="heading_new">View Job Application Details</td>
				</tr>
				<tr><td width="16%">&nbsp;</td>
				</tr>
				<tr>
				  <td height="25" class="sub_link">Job Title :</td>
				  <td width="84%" class="text10"><?=stripslashes($j_row[0]->j_title);?></td>
				</tr>
				<tr>
				  <td height="25" class="sub_link">Job Description  :</td>
				  <td class="text10"><?=stripslashes($j_row[0]->j_description);?></td>
				</tr>
				<tr>
				  <td height="25" class="sub_link">Skilll :</td>
				  <td class="text10"><?=stripslashes($j_row[0]->j_skills);?></td>
				</tr>
				</table>
				
				</td>
				</tr>
            </table>
				<?php } else { 
				
			########################################LIST JOB APPLICATIONS####################################
			?>
			<table width="100%">
				<tr>
				  <td colspan="7" class="heading_new">Manage Job Posting</td>
				  </tr>
				
				<tr>
				  <td colspan="5" class="text11red">
				    <div align="center"><?=messaging($_REQUEST[msg]);?></div></td>
				  </tr>
				
				<tr height="25">
				<td width="29%" class="slider">Title</td>
				<td width="24%" class="slider">Job description</td>
				<td width="25%" class="slider">Skills</td>
				<td width="9%" class="slider"><div align="center">Assign</div></td>
				<td width="6%" class="slider"><div align="center">View</div></td>
				<td width="7%" class="slider"><div align="center">Delete</div></td>
				</tr>
				<tr><td style="height:1px; background:#666600;" colspan="7"></td></tr>	
				<? if($list_count ==0) { ?>
				<tr><td height="25" colspan="5" class="text11red"><div align="center">No Records Exists</div></td>
				</tr>
				<? }?>	
				
				<?
				foreach($list_results as $jobapp)
					{
				?>
			<tr height="25">
			<td class="text10"><?=stripslashes($jobapp->j_title);?></td>	
			<td class="text10"><?=stripslashes($jobapp->j_description);?></td>
			<td class="text10"><?=stripslashes($jobapp->j_skills);?></td>
				<td ><div align="center"><a href="admin_assign_jobs.php?j_id=<?=$jobapp->j_id;?>" class="link_green">Assign</a></div></td>
			<td><div align="center"><a href="<?php echo $_SERVER['PHP_SELF'];?>?j_id=<?=$jobapp->j_id;?>&mode=7"><img src="../images/edit.png" border="0" /></a></div></td>
			<td><div align="center"><a href="<?php echo $_SERVER['PHP_SELF'];?>?j_id=<?=$jobapp->j_id;?>&mode=3" onclick="return toDelete();"><img src="../images/error.png" border="0" /></a></div></td>
			</tr>
			
				<tr><td style="height:1px; background:#666600;" colspan="7"></td></tr>
				<? } ?>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan="5" align="right" >
				<?
				
				if($totalrow>$limit)
					{
					$page=$_SERVER['PHP_SELF'];

					pagenation($totalrow,$limit,$png,$page);
					}
				?>
				</td></tr>
				</table>	
				
				
				<? } ?>
				
				
				</td>
				</tr>
				<tr><td></td></tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td height="20" colspan="3" align="center" valign="middle"></td>
      </tr>
      <tr>
        <td height="37" colspan="3" align="center" valign="middle" background="../images/footer_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20">&nbsp;</td>
            <td align="left" valign="middle" class="copyright">A unit of Rashtreeya Sikshana Samiti Trust.</td>
            <td align="right" valign="middle" class="copyright">All rights reserved, Copyright © RV-VLSI Design Center.</td>
            <td width="20">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>




</body>
</html>
