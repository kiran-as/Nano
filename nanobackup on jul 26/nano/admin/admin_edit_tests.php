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

//include("fckeditor/fckeditor.php") ;



if(isset($_POST[update])&& is_numeric($_REQUEST[t_id]))
	 {
	 
	$query="Update $tests_table set
	 t_title='".addslashes($_POST[txtTitle])."',
	 t_duration='".addslashes($_POST[txtDur])."',
	 t_shortdesc='".addslashes($_POST[ShortDesc])."',
	 t_instruction='".addslashes($_POST[Instructions])."',
	 t_status='".addslashes($_POST[selStatus])."'
	 where t_id='".$_REQUEST[t_id]."'";
	//echo  $query;die;
	 
	 mysql_query( $query) or die("culdnot:".mysql_error());
	 header("location:admin_manage_tests.php?msg=2");
	 }	
	 
if(is_numeric($_REQUEST[t_id]))
	{
$event_details=mysql_query("select * from $tests_table where t_id=$_REQUEST[t_id] ") or die("culdnot:".mysql_error());
$details=mysql_fetch_array($event_details);
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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>


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
				<tr><td width="20%" valign="top"><? include("admin_navigation.php");?></td>
				<td width="80%" valign="top" >
				<form action="" method="post" enctype="multipart/form-data" name="TestsForm" onsubmit="return validateTests()">
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr>
				  <td height="25" colspan="2" class="heading_new">Edit Test</td>
				</tr>
				<tr>
				  <td height="25" class="text10" >&nbsp;</td>
				  <td class="text11red"><?=messaging($_REQUEST[msg]);?></td>
				  </tr>
				<tr>
				  <td width="26%" height="25" class="text10" >Title : </td><td width="76%" class="sub_link"><input name="txtTitle" type="text" class="text10" style="width:450px"  value="<?=stripslashes($details[t_title]);?>"  /></td>
				</tr>
                 <tr>
				  <td height="25" class="text10" >Duration : </td>
				  <td >
				  <select name="selDur" class="text10">
				   <option value="0">select</option>
				  <option value="60" <? if($details[t_duration]=='60') echo "selected"; ?>>60</option>
				  <option value="120" <? if($details[t_duration]=='120') echo "selected"; ?>>120</option>
                  <option value="180" <? if($details[t_duration]=='180') echo "selected"; ?>>180</option>
				  <option value="240" <? if($details[t_duration]=='240') echo "selected"; ?>>240</option>
                  <option value="300" <? if($details[t_duration]=='300') echo "selected"; ?>>300</option>
				  </select></td>
				  </tr>
				<tr>
				  <td  height="25" class="text10" >Short Descirption : </td>
				<td width="76%" class="sub_link">&nbsp;</td>
				</tr>
                <tr>
				  <td  height="25" colspan="2" class="text10" >
				  
<textarea id="ShortDesc" name="ShortDesc"><?=$details[t_shortdesc]?></textarea>
				 </td>
				  </tr>
                
                <tr>
				  <td  height="25" class="text10" >Instructions : </td>
				<td width="76%" class="sub_link">&nbsp;</td>
				</tr>
				<tr>
				  <td  height="25" colspan="2" class="text10" >
				  
<textarea id="Instructions" name="Instructions"><?=$details[t_instruction]?></textarea>
				 </td>
				  </tr>
				<tr>
				  <td height="25" class="text10" >Status : </td>
				  <td >
				   <select name="selStatus" class="text10">
				    <option value="0">select</option>
				  <option value="1" <? if($details[t_status]=='1') echo "selected"; ?>>Active</option>
				  <option value="2" <? if($details[t_status]=='0') echo "selected"; ?>>De-Active</option>
				  </select></td>
				  </tr>
                
               				<tr>
				  <td colspan="2">&nbsp;</td>
				  </tr>
				<tR>
				  <td colspan="2">&nbsp;</td>
				  </tR>
				<tR>
				  <td colspan="2">&nbsp;</td>
				  </tR>
				<tR><td colspan="2"><div align="center">
				  <input name="update" type="submit" class="button" value="Update" />
				  </div></td></tR>
				  
				</Table>
                
                
                
				</form>				</td>
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
<script type="text/javascript">
				CKEDITOR.replace( 'ShortDesc' );
				CKEDITOR.replace( 'Instructions' );
			</script>

</body>
</html>
