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

include("fckeditor/fckeditor.php") ;
if(isset($_POST[add]))
	 {
	 $startdate=explode("/",$_POST[txtDate]);
	 $stime=mktime($st,$_REQUEST[s_half],0,$startdate[1],$startdate[2],$startdate[0]);
	 mysql_query("insert into $news_events_table(nw_title,nw_date,nw_description) values('".addslashes($_POST[txtTitle])."','$stime','".addslashes($_POST[areaNews])."') ") or die("culdnot:".mysql_error());
	 header("location:admin_manage_news.php?msg=1");
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
				<form method="post" action="" onsubmit="return validateNews()" name="newsForm">
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr>
				  <td height="25" colspan="2" class="heading_new">New News </td>
				</tr>
				<tr>
				  <td height="25" class="text10" >&nbsp;</td>
				  <td class="sub_link">&nbsp;</td>
				  </tr>
				<tr>
				  <td width="26%" height="25" class="text10" >Title : </td><td width="76%" class="sub_link"><input name="txtTitle" type="text" class="text10" style="width:450px"    /></td>
				</tr>
				<tr>
				  <td width="26%" class="text10" >Date : </td> 
				  <td width="76%"><input name="txtDate" type="text" class="general-body" readonly>&nbsp;&nbsp;<input value="Calendar" onClick="displayCalendar(document.newsForm.txtDate,'yyyy/mm/dd',this)" class="button" type="button"></td>
				</tr>
				<tr>
				  <td  height="25" class="text10" >Description : </td>
				<td width="76%" class="sub_link">&nbsp;</td>
				</tr>
				<tr>
				  <td  height="25" colspan="2" class="text10" >
				  
				  <?
				
					$oFCKeditor = new FCKeditor('areaNews') ;
					$oFCKeditor->BasePath = '/admin/fckeditor/' ;
						$oFCKeditor->Height=500;
						$oFCKeditor->Value=stripslashes($details[ps_description]) ;
						
						$oFCKeditor->Create() ;
						?>
				 </td>
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
