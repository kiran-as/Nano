<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');


  if(isset($_POST['change']))
	{

	$checkPassword=mysql_fetch_array(mysql_query("select * from  
 $admin_table where ad_id=$_SESSION[rv_vlsi_id]")) or die("culnot do it:".mysql_error());
		
		if($checkPassword[ad_password]==$_POST['txtOldPassword'])
			{
			mysql_query("update $admin_table set 	ad_password='".$_POST['txtNewPassword']."' where ad_id=$_SESSION[rv_vlsi_id]") or die("culnot updated:".mysql_error());
			header("Location:admin_change_password.php?msg=2");
			}
			else
				{
				header("Location:admin_change_password.php?msg=5");
				
				}
	
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

				<tr><td width="20%" valign="top" style="border-right: 2px solid #CCCCCC;">
				<? include("admin_navigation.php");?>
				
				
				</td>
				<td width="80%" valign="top" >
				
				<form method="post" action="" onSubmit="return validateChangePassword()" name="changeForm">
		  <table width="50%" align="left" >
		
		  <tr><td class="heading_new" colspan="5">Change Password</td>
		  </tr>
		  <tr><td colspan="2"><div align="right" class="error"></div></td></tr>
		    <tr><td colspan="4" class="text11red"></td>
		  </tr>

		  <tr>
		    <td class="text10" >Old password :</td>
		    <td class="text"><input type="password" class="general-body" name="txtOldPassword" style="width:200px;" /></td></tr>
<tr>
  <td class="text10">New password :</td>
  <td class="text"><input type="password" class="general-body" name="txtNewPassword" style="width:200px;" /></td></tr>
<tr>
  <td class="text10">Confirm password :</td>
  <td class="text"><input type="password" class="general-body" name="txtConfPassword"  style="width:200px;" /></td></tr>
<tr><Td width="38%" class="text">&nbsp;</Td>
</tr>
<tr><td  align="center" class="text" colspan="2"><div align="center">
  <input type="submit" name="change" value="Change Password" class="button" style="width:150px;" />
</div></td></tr>
<tr><Td width="38%">&nbsp;</Td></tr>
		  </table>
	</form>
				
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
