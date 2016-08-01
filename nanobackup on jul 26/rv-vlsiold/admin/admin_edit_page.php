<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include("fckeditor/fckeditor.php");

if($_REQUEST[mode]==3)
	{
	mysql_query("delete from $sub_page_content where ps_id=$_REQUEST[ps_id] ") or die(mysql_error());
	header("Location:admin_edit_page.php?cn_id=$_REQUEST[cn_id]&msg=3");
	}

if(isset($_POST[update]))
	{
	mysql_query("update $page_content_table set cn_description='".addslashes($_POST[areaDescription])."' where cn_id=$_REQUEST[cn_id]") or die(mysql_error());
	
	header("Location:admin_edit_page.php?cn_id=$_REQUEST[cn_id]&msg=2");
	}


if(isset($_POST[updateOrder]))
		{
$sub_content=mysql_query("select * from $sub_page_content where cn_id=$_REQUEST[cn_id]") or die(mysql_error());
	 while($content=mysql_fetch_array($sub_content))
	  		{
		
			$value=$_POST["txtOrder".$content[ps_id]];
			mysql_query("update $sub_page_content set ps_order='$value'	where ps_id=$content[ps_id]") or die(mysql_error());
						
			}
header("Location:admin_edit_page.php?cn_id=$_REQUEST[cn_id]&msg=2");
		}
		
		
$page_result=mysql_query("select * from $page_content_table where cn_id=$_REQUEST[cn_id]") or die(mysql_error());
$page_details=mysql_fetch_array($page_result);




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
				  <table width="100%" >
				  <tr><td class="heading_new" colspan="3">Edit <?=$page_details[cn_title];?></td></tr>
				<tr><td width="62%">&nbsp;</td></tr>
				<tr><td colspan="4" class="text11red"><?=messaging($_REQUEST[msg]);?></td></tr>
				<tr><td><form method="post" action=""><table width="100%">
				<tr><td class="text10"><strong>Header Content</strong></td>
				</tr>
				<tr><td >	<?
				
					$oFCKeditor = new FCKeditor('areaDescription') ;
					$oFCKeditor->BasePath = '/admin/fckeditor/' ;
						$oFCKeditor->Height=300;
						$oFCKeditor->Value= stripslashes($page_details[cn_description]) ;
						
						$oFCKeditor->Create() ;
						?></td></tr>
						<tr><td align="center"><input type="submit" name="update" value="Update" class="button" /></td></tr>
						</table></form></td></tr>
				  <tr>
				    <td height="25" class="text10">&nbsp;</td>
				    
				    </tr>
					<tr><td>
					<form method="post" action="" >
					
					<table width="60%" cellpadding="0" cellspacing="0" border="0">
				  <tr>
				    <td width="70%" height="25" class="text10"><strong>Sub Content </strong></td>
				    <td width="11%" height="25" class="text10">&nbsp;</td>
				    </tr>
				  <tr>
				    <td height="25" class="text10">&nbsp;</td>
				    <td height="25" colspan="2" class="text10"><div align="center"><a href="admin_new_content.php?cn_id=<?=$_REQUEST[cn_id];?>&mode=1" class="text10green">New Content</a></div></td>
				    </tr>
				  <tr>
				    <td height="25" class="text10"><strong>Title</strong></td>
					<td class="text10"><div align="center"><strong>Order</strong></div></td>
				  <td width="7%" height="25" class="text10"><div align="center"><strong>Edit</strong></div></td>
				   <td width="12%" height="25" class="text10"><div align="center"><strong>Delete</strong></div></td>
				  </tr>
				  <tr><td style="height:1px; background:#666600;" colspan="4"></td></tr>
				  <?
		  $sub_page_content=mysql_query("select * from $sub_page_content where cn_id=$_REQUEST[cn_id] order by  ps_id desc") or die(mysql_error());
				  while($content=mysql_fetch_array($sub_page_content))
				  		{
				  ?>
				  <tr><td height="25" class="text10"><?=stripslashes($content[ps_title]);?></td>
				  <td><div align="center">
				    <input type="text" name="txtOrder<?=$content[ps_id];?>" size="2" class="text10" maxlength="2" value="<?=$content[ps_order];?>" />
				    </div></td>
				  <td><div align="center"><a href="admin_new_content.php?cn_id=<?=$_REQUEST[cn_id];?>&mode=2&ps_id=<?=$content[ps_id];?>"><img src="../images/edit.png" border="0" onclick="return toEdit();" /></a></div></td>
				  <td height="25"  class="text10"><div align="center"><a href="admin_edit_page.php?cn_id=<?=$_REQUEST[cn_id];?>&mode=3&ps_id=<?=$content[ps_id];?>" class="text10green"><img src="../images/error.png" border="0" onclick="return toDelete();"/></a></div></td>
				  </tr>
				 <tr><td style="height:1px; background:#666600;" colspan="4"></td></tr>
				  <? } ?>
				  <tr><td><td><input type="submit" name="updateOrder" value="Order Update" class="button" /></td></tr>
				  </table>
				  
				  </form>
				  </td></tr>
				  
				  
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
