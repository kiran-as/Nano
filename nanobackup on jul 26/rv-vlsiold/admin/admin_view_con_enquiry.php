<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');

if(is_numeric($_REQUEST[ce_id]))
		{
		$eq_details=mysql_query("select * from $contact_us_table where ce_id=$_REQUEST[ce_id] ") or die("culdnot:".mysql_error());
		$details=mysql_fetch_array($eq_details);
		}
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
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                </tr>
				<tr><td width="20%" valign="top">
				<? include("admin_navigation.php");?>
				
				
				</td>
				<td width="80%"  valign="top">
				<table width="95%" align="center">
				<tr>
				  <td colspan="2" class="heading_new">View Conact Us Enquiry Details</td>
				</tr>
				<tr><td width="29%">&nbsp;</td>
				</tr>
				<tr><td height="25" class="sub_link">Name :</td>
				<td width="71%" class="text10"><?=stripslashes($details[ce_name]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">Phone :</td>
				<td class="text10"><?=stripslashes($details[ce_phone]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">Email :</td>
				<td class="text10"><?=stripslashes($details[ce_email]);?></td>
				</tr>
				<tr>
				  <td height="25" class="sub_link"><strong>Occupation </strong>:</td>
				  <td class="text10"><?=stripslashes($details[ce_occupation]);?></td>
				</tr>
				<tr>
				  <td height="25" class="sub_link"><strong>Institute/Organization :</strong></td>
				  <td class="text10"><?=stripslashes($details[ce_institution]);?></td>
				</tr>
				<tr>
				  <td height="25" class="sub_link"><strong>Address :</strong></td>
				  <td class="text10"><?=stripslashes($details[ce_address]);?></td>
				</tr>
				<tr>
				  <td height="25" class="sub_link"><strong>Comments /Questions :</strong></td>
				  <td class="text10"><?=stripslashes($details[ce_comments]);?></td>
				</tr>
				
				
				<tr><td height="25" class="sub_link">Date & Time</td>
				<td class="text10"><?=date("d",$details[ce_date]);?>&nbsp;<sup><?=date('S',$details[ce_date])?></sup>&nbsp;<?=date('M, Y',$details[ce_date])?>&nbsp;&nbsp;<?=date('g:i:s',$details[ce_date])?></td>
				</tr>
				
				<tr><td height="25" class="sub_link">IP Address</td>
				<td class="text10"><?=stripslashes($details[ce_ip]);?></td>
				</tr>
				</table>
				
				</td>
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
