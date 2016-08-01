<?  include_once('../db/dbconfig.php');
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



if($_REQUEST[mode]==3 && is_numeric($_REQUEST[r_id]))
	{
	//mysql_query("Delete from $contact_us_table where ce_id=$_REQUEST[ce_id] ") or die("culdnot delete:".mysql_error());
	$deleteRow   = $rec->delRecruiters($_REQUEST[r_id]);
	header("location:".$_SERVER['PHP_SELF']."?msg=3");
	}



$totalrow   = $rec->getRecruiters(1);

$limit=30;
$png=$_REQUEST['png'];
if(empty($png)){
 $png = 1;
}


$limitvalue = ($png * $limit )- ($limit); 

$list_results = $rec->getRecruiters('',$limitvalue,$limit);
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
<script type="text/javascript" src="../js/admin_validation.js"></script>
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
				
				<table width="100%"  border="0" cellpadding="0" cellspacing="0">
				  <tr>
                    <td colspan="7" class="heading_new">Manage recruiters </td>
                  </tr>
                  <tr><td colspan="7">
                  
                  <form name="mainform" id="mainform"  method="post" action="recruiter_search.php" style="padding:0px 0px;">
<!-- first name table -->
<table width="800" align="right" cellpadding="0" cellspacing="0">
<tr>
<td width="400" class="text11red"><?=messaging($_REQUEST[msg]);?></td>
<td align="right">Search for&nbsp;:<input type="text" name="search" id="search" value="" >
<input type="submit" name="submit" value="Find" style="position:relative;width:70px;" />
</td>
</tr></table>
</form>
                  </td></tr>
				 
				  <tr height="25">
				<td width="10%" class="sub_link">Name</td>
				<td width="15%" class="sub_link">Phone No</td>
				<td width="27%" class="sub_link">Email</td>
				<td width="15%"  align="left" class="sub_link">Designation</td>
				<td width="10%" align="left" class="sub_link">Edit</td>
			    <td width="8%" class="sub_link"><div align="left">View</div></td>
				<td width="7%"  align="left" class="sub_link">Delete</td>
				</tr>
                               
                    <tr><td style="height:1px; background:#666600;" colspan="7"></td></tr>
                  
                  <? if($list_count==0) { ?>
                  <tr>
                    <td height="25" colspan="6" class="text11red"><div align="center">No Records Exists</div></td>
                  </tr>
                  <? }?>
                  <?
				foreach($list_results as $rec)
					{
				?>
                  <tr height="25">
                    <td class="text10"><?=stripslashes($rec->r_user_name);?></td>
                    <td class="text10"><?=stripslashes($rec->r_mobile);?></td>
                    <td class="text10"><?=stripslashes($rec->r_email);?></td>
                    <td class="text10"><?=stripslashes($rec->r_designation);?></td>
					<td class="text10"><div align="left"><a href="admin_edit_recruiters.php?r_id=<?=$rec->r_id;?>"><img src="../images/edit.png" border="0"  onclick="return toEdit();" /></img></a></div></td>
                    <td class="text10"><div align="left"><a href="<?php echo $_SERVER['PHP_SELF'];?>?r_id=<?=$rec->r_id;?>&mode=7"><img src="../images/edit.png" border="0" /></a></div></td>
                    <td class="text10"><div align="left"><a href="<?php echo $_SERVER['PHP_SELF'];?>?r_id=<?=$rec->r_id;?>&mode=3" onclick="return toDelete();"><img src="../images/error.png" border="0" /></a></div></td>
                  </tr>
                  <tr>
                    <td style="height:1px; background:#666600;" colspan="7"></td>
                  </tr>
                  <? } ?>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="7" align="right" style="font-size:14px; color:#CC6633;"><?
				
				if($totalrow>$limit)
					{
					$page=$_SERVER['PHP_SELF'];

					pagenation($totalrow,$limit,$png,$page);
					}
				?>                    </td>
                  </tr>
                </table>          </td>
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
