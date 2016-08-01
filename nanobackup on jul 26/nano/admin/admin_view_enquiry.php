<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	   
	   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 


if(is_numeric($_REQUEST[p_id]))
		{
		$eq_details=mysql_query("select * from $prg_planner_table where p_id=$_REQUEST[p_id] ") or die("culdnot:".mysql_error());
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
				<td width="80%"  valign="top">
				<table width="95%" align="center">
				<tr><td colspan="2" class="heading_new">View Enquiry Details</td></tr>
				<tr><td width="70%">&nbsp;</td>
				</tr>
				<tr><td height="25" class="sub_link">Name :</td>
				<td width="30%" class="text10"><?=stripslashes($details[p_name]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">Phone :</td>
				<td class="text10"><?=stripslashes($details[p_phone]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">Email :</td>
				<td class="text10"><?=stripslashes($details[p_email]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">How do you rate yourself on basic electronics on a scale of 0 to 10 (10 being the best) :</td>
				<td class="text10"><?=stripslashes($details[p_electronics]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">Do you like programming in C :</td>
				<td class="text10"><?=stripslashes($details[p_c_programming]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">What is your highest qualification :</td>
				<td class="text10"><?=stripslashes($details[p_higher]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">Are you interested in :</td>
				<td class="text10"><?=stripslashes($details[p_interested]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">Do you have ANY industry experience select below :</td>
				<td class="text10"><?=stripslashes($details[p_industry]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">How many weeks can you spare fulltime Monday to Friday :</td>
				<td class="text10"><?=stripslashes($details[p_weeks]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">Are you planning on going abroad in the next 12 months for higher studies :</td>
				<td class="text10"><?=stripslashes($details[p_planning]);?></td>
				</tr>
				<tr><td height="25" class="sub_link">Are you a student in BE 5th sem and above :</td>
				<td class="text10"><?=stripslashes($details[p_completed]);?></td>
				</tr>
				<tr ><td height="25" class="sub_link">Result</td>
				</tr>
				<tr ><td height="25" colspan="2" class="text10"><?=stripslashes($details[p_result]);?></td>
				</tr>
				
				
				<tr><td height="25" class="sub_link">Date & Time</td>
				<td class="text10"><?=date("d",$details[p_time]);?>&nbsp;<sup><?=date('S',$details[p_time])?></sup>&nbsp;<?=date('M, Y',$details[p_time])?>&nbsp;&nbsp;<?=date('g:i:s',$details[p_time])?></td>
				</tr>
				
				<tr><td height="25" class="sub_link">IP Address</td>
				<td class="text10"><?=stripslashes($details[p_ip_address]);?></td>
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
