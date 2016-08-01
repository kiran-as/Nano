<?   ini_set('magic_quotes_gpc',1);
include("fckeditor/fckeditor.php") ;

echo ini_get('expose_php');

echo $_POST[areaDescription];
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
<script>
function Validation()
			{
			var frm=document.contentForm;
			if(frm.txtTitle.value=='')
				{
				alert("Enter Title");
				frm.txtTitle.focus();
				return false;
				}
			
			}

</script>

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
				<tr><td width="20%" valign="top" >
				<? include("admin_navigation.php");?>
				
				
				</td>
				<td width="80%" valign="top">
				<form method="post" action="" onsubmit="return Validation();" name="contentForm">
				<Table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr><td width="19%"  class="heading_new" colspan="2"><? if($_REQUEST[mode]==1) echo 'Add Content to'; else echo 'Edit Content of';?> <?=$page_details[cn_title];?> page</td>
				</tr>
				<tr class="text10"><td height="25">&nbsp;</td>
				</tr>
				<tr><td height="25" class="text10">Title :</td><td width="81%"><input type="text" name="txtTitle" class="text10" style="width:300px;" maxlength="255" value="<?=stripslashes($details[ps_title]);?>" /></td></tr>
				<tr class="text10"><td height="25">Description :</td>
				</tr>
				<tr><td colspan="2">
				<textarea name="areaDescription"></textarea>
				<?
				
					/*$oFCKeditor = new FCKeditor('areaDescription') ;
					$oFCKeditor->BasePath = '/admin/fckeditor/' ;
						$oFCKeditor->Height=500;
						$oFCKeditor->Value=stripslashes($details[ps_description]) ;
						
						$oFCKeditor->Create() ;*/
						?></td></tr>
				<tr><td></td><td>
				<? if($_REQUEST[mode]==1) { ?>
				<input type="submit" name="add" value="ADD" class="button" />
				<? }  else { ?>
				<input type="submit" name="update" value="Update" class="button" />
				
				<? }?>
				
				</td></tr>
				</Table>
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
