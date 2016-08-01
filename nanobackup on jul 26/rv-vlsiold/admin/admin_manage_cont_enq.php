<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
error_reporting(E_ALL ^ E_NOTICE);

if($_REQUEST[mode]==3 && is_numeric($_REQUEST[ce_id]))
	{
	mysql_query("Delete from $contact_us_table where ce_id=$_REQUEST[ce_id] ") or die("culdnot delete:".mysql_error());
	header("location:admin_manage_cont_enq.php?msg=3");
	}

if($_REQUEST[mode]==5)
		{
		mysql_query("Delete from $contact_us_table  ") or die("culdnot delete:".mysql_error());
		header("location:admin_manage_cont_enq.php?msg=3");
		}


$contact_query=" select * from $contact_us_table ";

$result=mysql_query($contact_query);

$totalrow=mysql_num_rows($result);



$limit=20;



			$png=$_REQUEST['png'];

			

			if(empty($png)){

			

      			  $png = 1;

    			} 

				

	        $limitvalue = ($png * $limit )- ($limit);  

			 $contact_query.= " order  by ce_id desc  LIMIT $limitvalue, $limit  ";

			



	

	

	$contact_result=mysql_query($contact_query) or die("culnot select:".mysql_error());

   $num_rows=mysql_num_rows($contact_result);




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
                <td width="111"><a href="../index.php"><img src="../images/logo.jpg" width="111" height="98" border="0" /></a></td>
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

				<tr><td width="20%" valign="top" style="border-right: 2px solid #CCCCCC;">
				<?php include("admin_navigation.php");?>
				
				
				</td>
				<td width="80%" valign="top" >
				<table width="100%">
				<tr>
				  <td colspan="7" class="heading_new">Contact Us Enquiries List </td>
				  </tr>
				<tr>
				  <td colspan="4" align="right" ><a href="admin_manage_cont_enq.php?mode=5" class="link_green" onclick="return toDeleteAll();">Delete all Enquiries</a></td>
				  <td  colspan="3" align="right"><a href="excel_con_import.php" class="link_green">Import Enquiries</a></td>
				  </tr>
				<tr>
				  <td colspan="5" class="text11red">
				    <div align="center"><?=messaging($_REQUEST[msg]);?></div></td>
				  </tr>
				
				<tr height="25">
				<td width="16%" class="slider">Name</td>
				<td width="15%" class="slider">Phone No </td>
				<td width="25%" class="slider">Email</td>
				<td width="13%" class="slider">Occupation</td>
				<td width="20%" class="slider">Date &amp; Time </td>
				<td width="4%" class="slider"><div align="center">View</div></td>
				<td width="7%" class="slider"><div align="center">Delete</div></td>
				</tr>
				<tr><td style="height:1px; background:#666600;" colspan="7"></td></tr>	
				<? if($num_rows==0) { ?>
				<tr><td height="25" colspan="7" class="text11red"><div align="center">No Records Exists</div></td>
				</tr>
				<? }?>	
				
				<?
				while($contact=mysql_fetch_array($contact_result))
					{
				?>
			<tr height="25">
			<td class="text10"><?=stripslashes($contact[ce_name]);?></td>	
			<td class="text10"><?=stripslashes($contact[ce_phone]);?></td>
			<td class="text10"><?=stripslashes($contact[ce_email]);?></td>
			<td class="text10"><?=stripslashes($contact[ce_occupation]);?></td>
			<td class="text10">
			<?=date("d",$contact[ce_date]);?>&nbsp;<sup><?=date('S',$contact[ce_date])?></sup>&nbsp;<?=date('M, Y',$contact[ce_date])?>&nbsp;&nbsp;<?=date('g:i:s',$contact[ce_date])?>
			
			</td>
			<td><div align="center"><a href="admin_view_con_enquiry.php?ce_id=<?=$contact[ce_id];?>"><img src="../images/edit.png" border="0" /></a></div></td>
			<td><div align="center"><a href="admin_manage_cont_enq.php?ce_id=<?=$contact[ce_id];?>&mode=3" onclick="return toDelete();"><img src="../images/error.png" border="0" /></a></div></td>
			</tr>
			
				<tr><td style="height:1px; background:#666600;" colspan="7"></td></tr>
				<? } ?>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan="5" align="right" >
				<?
				
				if($totalrow>$limit)
					{
					$page="admin_manage_cont_enq.php";

					pagenation($totalrow,$limit,$png,$page);
					}
				?>
				</td></tr>
				</table>
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
