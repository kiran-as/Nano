<?php include("includes/phpincludes.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RV-VLSI Design Center</title>
<script type="text/javascript" src="../js/admin_validation.js"></script>
<link rel="stylesheet" href="../css/styleupdated.css" type="text/css" media="screen" />
</head>
<body>
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0" id="counselor">
<tr><td align="left"><?php include("includes/counselorheader.php"); ?></td></tr>
<tr><td height="350" valign="middle">
<form method="post" action="" onSubmit="return loginValidation()" name="login">
<table width="250" cellpadding="4" cellspacing="4" border="0" class="loginpanel">
<tr><td colspan="2" class="panelheader">Counselor Login</td></tr>
<tr><td colspan="2" class="text11red"><?=messaging($_REQUEST[msg]);?></td></tr>
<tr><td class="label" nowrap="nowrap">Email <span>*</span></td><td><input name="txtEmailId" type="text" class="text10" value=""  size="40" /> </td></tr>
<tr><td class="label" nowrap="nowrap">Password <span>*</span></td><td><input name="txtPassword" type="password" class="text10" value="" size="40"/></td></tr>
<tr><td colspan="2" align="right"><input name="login" type="submit" class="blueButton" value="Login" /></td></tr>
</table>
</form>
</td></tr>
<tr><td><?php include("includes/counselorfooter.php"); ?></td></tr>
</table>

</body>
</html>
