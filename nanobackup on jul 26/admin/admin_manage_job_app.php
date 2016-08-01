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


				########################################VIEW JOB APPLICATIONS####################################
				
				
		
				
				 if(isset($_POST['Update']))
 {
 
 $date=explode("/",$_POST['txtDate']);
 $date=mktime(0,0,0,$date[1],$date[0],$date[2]);
 
 	$info_query="update rv_job_posting  set jp_job_title	='".$ch->checkFields($_POST['txtTitle'])."',
											jp_expdate		='".$ch->checkFields($date)."',
											jp_description	='".$ch->checkFields($_POST['areaDescription'])."',
											jp_skills		='".$ch->checkFields($_POST['areaskills'])."'
											where jp_id 	='".$_REQUEST['j_id']."'";
								 //echo $info_query;die;
									
									
 $result=$db->insertRecord($info_query);
header("Location:admin_manage_job_app.php?msg=2");

}


$query=" select * from rv_job_posting  ";
 
   
   if($_REQUEST['txtSearch']!='')
   			{
			
			
			$searchKey=urldecode($_REQUEST['txtSearch']);
		$query.=" where jp_company like '%$searchKey%' or 	jp_job_title like '%$searchKey%' or jp_designation like '%$searchKey%' or jp_email like '%$searchKey%'	or jp_mobile like '%$searchKey%'  or jp_domain like '%$searchKey%'";
			}
			
  $result_students=$db->getResults($query);
   $totalrow=count($result_students);



//$totalrow   = $rec->getJobApp(1);

$limit=30;
$png=$_REQUEST['png'];
if(empty($png)){
 $png = 1;
} 

$limitvalue = ($png * $limit )- ($limit);  
//$list_results = $rec->getJobApp('',$limitvalue,$limit);

$list_count   = $rec->getJobApp(1,$limitvalue,$limit);

 $limitvalue = ($png * $limit )- ($limit);  
		$query.=" order  by jp_id desc  LIMIT $limitvalue, $limit ";
    $list_results=$db->getResults($query);
	 $num_rows=count($result_students);
	 $list_count   = $rec->getRecruiters(1,$limitvalue,$limit);
	

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
<script type="text/javascript" >
function Job_validation()
			{
				//alert("fdgdfg");
				
		var frm=document.txtForm;
			
				if(frm.txtTitle.value=='')
					 {
					alert("Please enter Title");
					frm.txtTitle.focus();
					return false;
					 }
					 else if (frm.areaDescription.value=='')
					 {
				alert("Please enter job description ");
					frm.areaDescription.focus();
					return false;
					 }
					  else if (frm.areaskills.value=='')
					 {
				alert("Please enter skills ");
					frm.areaskills.focus();
					return false;
					 }
			}
</script>	
<script type="text/javascript" src="../js/admin_validation.js"></script>
<link href="../rv_main.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="../css/dhtmlgoodies_calendar.css" media="screen"></LINK>
<SCRIPT type="text/javascript" src="../js/dhtmlgoodies_calendar.js"></script>


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
				
				
				
		
			

				
				
				<? if($_REQUEST['mode'] == 7) {		
				
				$j_row=$db->getResults("select * from rv_job_posting where jp_id='".$_REQUEST['j_id']."'");?>
				<table width="66%" align="center">
				<tr>
				  <td colspan="3" class="heading_new">Edit  Job Details</td>
				</tr>
				<tr><td width="35%">&nbsp;</td>
				<td>&nbsp;</td>
				<td width="35%" class = "error">* indicates required field</td>
				</tr>
				<?=$input->formStart('txtForm','','onSubmit="return Job_validation();"');?>
				<tr>
				  <td height="25" class="sub_link">Job Title :</td>
				  <td   width="30%" class="text10"><?=$input->textBox('txtTitle',$j_row[0]->jp_job_title,'text','style=width:200px;','');?></td>
				  <td class="error">*</td>
				</tr>  
				
				<tr>
				  <td height="25" class="sub_link">Job Description  :</td>
				  <td   width="30%" class="text10"><?=$input->textBox('areaDescription',$j_row[0]->jp_description,'text','style=width:200px;','');?></td>
				   <td class="error"> *</td>
				</tr> 
				
				<tr>
				  <td height="25" class="sub_link">Skill :</td>
				   <td   width="30%" class="text10"><?=$input->textBox('areaskills',  $j_row[0]->jp_skills,'text','style=width:200px;','');?></td>
				   <td class="error"> *</td>
				 </tr>
                 <tr>
				  <td height="25" class="sub_link">Expiry Date :</td>
				   <td width="76%"><input name="txtDate"  value="<? if($j_row[0]->jp_expdate!='0') echo date('d/m/Y',$j_row[0]->jp_expdate);?>" type="text" class="general-body" readonly>&nbsp;&nbsp;<input value="Calendar" onClick="displayCalendar(document.txtForm.txtDate,'dd/mm/yyyy',this)" class="button" type="button"></td>
	  <td width="3%"><span class="error">*</span></td>
	  </tr>
				   <td class="error"> *</td>
				 </tr>
				 
       <tr>
	   <td height="25" class="sub_link">&nbsp;</td>
		<td height="25" class="sub_link" align="left"><?=$input->submitButton('Update','Update','text', 'style=background-color:#424843;color:#ffffff;margin-left:50px;');?></td>
		</tr>		 
				 
				 
				<?=$input->formEnd()?>
				</table>
				
				</td>
				</tr>
            </table>
				<?php } else { 
				
			########################################LIST JOB APPLICATIONS####################################
			?>
			
			<table width="100%"  border="0" cellpadding="0" cellspacing="0">
				<tr>
				  <td colspan="7" class="heading_new">Manage Job Posting</td>
				  </tr>
				  	<form name="mainform" id="mainform"  method="post" action="admin_manage_job_app.php" style="padding:25px 0px;">
<!-- first name table -->
<tr>
<td colspan="6" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<label for="search" style="position:relative;text-align: center;">Search for&nbsp;:</label>
<input name="txtSearch" type="text"  style="width:200px;" value="<? if($_REQUEST['txtSearch']!='') echo $_REQUEST['txtSearch']; else echo "Enter Search word"; ?>" onClick="this.value=''" >
<input type="submit" name="submit" value="Search" style="background-color:#424843;color:#ffffff;" />
<!--<label>(Search by Name,City)</label>-->

</td>
</tr>
</form>
				
				<tr>
				  <td colspan="7" class="heading_new">&nbsp;</td>
				  </tr>
				<tr>
				  <td colspan="5" class="text11red">
				    <div align="center"><?=messaging($_REQUEST[msg]);?></div></td>
				  </tr>
				
				<tr height="25">
				<td width="29%" class="sub_link">Title</td>
				<td width="24%" class="sub_link">Company</td>
				<td width="13%" class="sub_link">Expire Date</td>
				<td width="17%"  align="center" class="sub_link">Assign</td>
				<td width="10%" align="center" class="sub_link">Modify</td>
				<td width="7%"  align="center" class="sub_link">Delete</td>
				</tr>
				<tr><td height="25" colspan="6" class="text11red"><div align="center"><? if($num_rows==0){
	 echo 'No Results Found';
	 
	 }?></div>
</td></tr>		 
				
				
				<?
				foreach($list_results as $jobapp)
					{
				?>
			<tr height="10">
			<td height="26" class="text10"><?=stripslashes($jobapp->jp_job_title);?></td>	
			<td class="text10"><?=stripslashes($jobapp->jp_company);?> </td>
			<td class="text10"><?=date('d/m/Y',$jobapp->jp_expdate);?></td>
			
				<td ><div align="center"><a href="admin_assign_jobs.php?j_id=<?=$jobapp->jp_id;?>" class="link_green">Assign</a></div></td>
			<td><div align="center"><a href="<?php echo $_SERVER['PHP_SELF'];?>?j_id=<?=$jobapp->jp_id;?>&mode=7"><img src="../images/edit.png" border="0" /></a></div></td>
			<td><div align="center"><a href="<?php echo $_SERVER['PHP_SELF'];?>?j_id=<?=$jobapp->jp_id;?>&mode=3" onclick="return toDelete();"><img src="../images/error.png" border="0" /></a></div></td>
			</tr>
			
				<tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>
				<? } ?>
				<? if($list_count ==0) { ?>
				<tr><td height="17" colspan="7"  align="center">No Records Exists</td>
				</tr>
				<? }?>	
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
				
				<tr><td height="2"></td>
				</tr>
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
