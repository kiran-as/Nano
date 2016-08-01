<?  include_once('../db/dbconfig.php');
    include_once('../classes/dataBase.php');
	include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	   
	   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

if(isset($_POST[login]))
	{
$check_login=mysql_query("select * from $admin_table where ad_username='".$_POST[txtEmailId]."'") or die("culnot do it:".mysql_error());
$check=mysql_fetch_array($check_login);
	if($check[ad_password]==$_POST[txtPassword])
		{
		$_SESSION['rv_vlsi_id']=$check[ad_id]; ?>
		<SCRIPT language="JavaScript">

document.location.href='admin_home.php?msg=1';

</SCRIPT>
		<? //header("Location:admin_home.php");
		}
		else
		?>
        <SCRIPT language="JavaScript">

document.location.href='index.php?msg=4';

</SCRIPT>
		<? //header("Location:index.php?msg=4");	
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

<link href="../rv_main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/admin_validation.js"></script>

<link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen" />

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
				
				
				<tr><td>
				<table cellpadding="0" cellspacing="0" border="0" width="40%" align="center">
							<tr><td width="25"><img src="../images/top_left_crnr.gif" /></td>
							<td valign="top" style="background-image:url(../images/btm.gif);background-repeat:repeat-x;" width="25"></td><td  align="left" width="25"><img src="../images/top_right_crnr.gif"  /> </td>
							</tr>
							<tr><td style="background-image:url(../images/left_v.gif); background-repeat:repeat-Y;"></td><td width="100%" >
<form method="post" action="" onSubmit="return loginValidation()" name="login">
<Table width="100%" align="center" >
<tR><td colspan="2" class="heading_new" style="font-weight: bold">Admin Login</td>
</tR>
<tR><td colspan="2" class="text11red" align="center"><?=messaging($_REQUEST[msg]);?></td>
</tR>
<tr>
  <td width="47%">&nbsp;</td>
  <td width="53%">&nbsp;</td>
</tr>
<tr><td class="text10">Email Id :</td>
<td><input name="txtEmailId" type="text" class="text10" value=""  style="width:150px" /></td></tr>
<tr><td class="text10">Password :</td>
<td><input name="txtPassword" type="password" class="text10" value="" style="width:150px" /></td></tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr><td colspan="2"><div align="center">
  <input name="login" type="submit" class="button" value="Login" />
</div></td></tr>
</Table>
</form>
</td><td style="background-image:url(../images/left_v.gif); background-repeat:repeat-y; background-position:right; margin-right:5px;" width="25"  ></td></tr>
								<tr><td  width="25"><img src="../images/btm_left_crnr.gif" /></td><td style="background-image:url(../images/btm.gif);background-repeat:repeat-x; background-position:bottom" ></td><td align="right" width="25" ><img src="../images/btm_right_crnr.gif" border="0" /></td>
								</tr>				
								</table>
				
				</td></tr>
				
				
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
