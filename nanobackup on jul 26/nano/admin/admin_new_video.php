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


if(isset($_POST[add]))
	 {
	 mysql_query("insert into $video_table(vi_title,vi_url) values('".addslashes($_POST[txtTitle])."',
	 '".addslashes($_POST[areaProgram])."') ") or die("culdnot:".mysql_error());
	 header("location:admin_manage_vides.php?msg=1");
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

<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>

<script language="javascript" type="text/javascript">

  tinyMCE.init({

    theme : "advanced",

    mode: "exact",

    elements : "areaProgram",

    theme_advanced_toolbar_location : "top",

    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"

    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"

    + "bullist,numlist,outdent,indent",

    theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"

    +"undo,redo,cleanup,code,separator,sub,sup,charmap",

    theme_advanced_buttons3 : "",

    height:"350px",

    width:"600px",

	plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,media,searchreplace,print,contextmenu,paste,directionality,fullscreen",

		theme_advanced_buttons1_add_before : "save,newdocument,separator",

		theme_advanced_buttons1_add : "fontsizeselect",

		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor",

		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",

		theme_advanced_buttons3_add_before : "tablecontrols,separator",

		theme_advanced_buttons3_add : "emotions,iespell,media,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",

		theme_advanced_toolbar_location : "top",

		theme_advanced_toolbar_align : "left",

		theme_advanced_statusbar_location : "bottom",

		content_css : "example_word.css",

	    plugi2n_insertdate_dateFormat : "%Y-%m-%d",

	    plugi2n_insertdate_timeFormat : "%H:%M:%S",

		external_link_list_url : "http://127.0.0.1/tutorial/examples/example_link_list.js",

		external_image_list_url : "http://localhost/tutorial/examples/example_image_list.js",

		media_external_list_url : "http://localhost/tutorial/examples/example_media_list.js",

		file_browser_callback : "fileBrowserCallBack",

		paste_use_dialog : false,

		theme_advanced_resizing : true,

		theme_advanced_resize_horizontal : false,

		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",

		paste_auto_cleanup_on_paste : true,

		paste_convert_headers_to_strong : false,

		paste_strip_class_attributes : "all",

		paste_remove_spans : false,

		paste_remove_styles : false

    //file_browser_callback : 'myFileBrowser'

  });



  function myFileBrowser (field_name, url, type, win) {

    var fileBrowserWindow = new Array();

    fileBrowserWindow['title'] = 'File Browser';

    fileBrowserWindow['file'] = "my_cms_script.php" + "?type=" + type;

    fileBrowserWindow['width'] = '420';

    fileBrowserWindow['height'] = '400';

    tinyMCE.openWindow(fileBrowserWindow, { window : win, resizable : 'yes', inline : 'yes' });

    return false;

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
				<tr><td width="20%" valign="top"><? include("admin_navigation.php");?></td>
				<td width="80%" valign="top" >
				<form method="post" action="" onsubmit="return validateProgram()" name="programForm">
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr>
				  <td height="25" colspan="2" class="heading_new">New Video </td>
				</tr>
				<tr>
				  <td height="25" class="text10" >&nbsp;</td>
				  <td class="sub_link">&nbsp;</td>
				  </tr>
				<tr>
				  <td width="26%" height="25" class="text10" >Title : </td><td width="74%" class="sub_link"><input name="txtTitle" type="text" class="text10" style="width:450px"   /></td>
				</tr>
				<tr>
				  <td  height="25" class="text10" >Description : </td>
				<td width="74%" class="sub_link">&nbsp;</td>
				</tr>
				<tr>
				  <td  height="25" colspan="2" class="text10" ><textarea name="areaProgram" class="text10" id="areaProgram"></textarea></td>
				  </tr>
				<tR>
				  <td colspan="2">&nbsp;</td>
				  </tR>
				<tR><td colspan="2"><div align="center">
				  <input name="add" type="submit" class="button" value="Add" />
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

</body>
</html>