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

if(isset($_POST[add]))
	 {
	 	// echo "insert into $news_events_table(nw_title,nw_date,lw_image1,lw_image2,lw_image3,nw_description".$stitle_filed."".$img_field.") values('".addslashes($_POST[txtTitle])."',$stime,'$images[1]','$images[2]','$images[3]','".addslashes($_POST[areaNews])."'".$stitle_filed_val."".$img_field_val.") ";die;
		$sql=" INSERT into $tests_table SET  
		 t_title='".addslashes($_POST[txtTitle])."',
	 t_duration='".addslashes($_POST[selDur])."',
	 t_shortdesc='".addslashes($_POST[ShortDesc])."',
	 t_instruction='".addslashes($_POST[Instructions])."',
	 t_status='".addslashes($_POST[selStatus])."'";
	 
  /*$sql= "insert into $news_events_table(nw_title,nw_date,lw_image1,lw_image2,lw_image3,nw_description".$stitle_filed."".$img_field.") values('".addslashes($_POST[txtTitle])."',$stime,'$images[1]','$images[2]','$images[3]','".addslashes($_POST[areaNews])."'".$stitle_filed_val."".$img_field_val.") ";*/

	
	 mysql_query($sql) or die("culdnot:".mysql_error());
	 header("location:admin_manage_tests.php?msg=1");
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
				<form method="post" action="" onsubmit="return validateTests()" name="TestsForm" enctype="multipart/form-data">
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr>
				  <td height="25" colspan="2" class="heading_new">New Test </td>
				</tr>
				<tr>
				  <td height="25" class="text10" >&nbsp;</td>
				  <td class="sub_link">&nbsp;</td>
				  </tr>
				<tr>
				  <td width="26%" height="25" class="text10" >Title : </td><td width="76%" ><input name="txtTitle" type="text" class="text10" style="width:450px"    /></td>
				</tr>
                 <tr>
				  <td height="25" class="text10" >Duration(Minutes) : </td>
				  <td >
				  <select name="selDur" class="text10">
				  <option value="0">select</option>
				  <option value="60">1</option>
				  <option value="120">2</option>
                  <option value="180">3</option>
				  <option value="240">4</option>
                  <option value="300">5</option>
				  </select></td>
				  </tr>
				<!--<tr>
				  <td width="26%" class="text10" >Date : </td> 
				  <td width="76%"><input name="txtDate" type="text" class="general-body" readonly>&nbsp;&nbsp;<input value="Calendar" onClick="displayCalendar(document.newsForm.txtDate,'yyyy/mm/dd',this)" class="button" type="button"></td>
				</tr>-->
                
				<tr>
				  <td  height="25" class="text10" >Short Description : </td>
				<td width="76%" class="sub_link">&nbsp;</td>
				</tr>
				<tr>
				  <td  height="25" colspan="2" class="text10" >
				  
<textarea id="ShortDesc" name="ShortDesc"></textarea>
				 </td>
				  </tr>
                
                <tr>
				  <td  height="25" class="text10" >Instructions : </td>
				<td width="76%" class="sub_link">&nbsp;</td>
				</tr>
				<tr>
				  <td  height="25" colspan="2" class="text10" >
				  
<textarea id="Instructions" name="Instructions"></textarea>
				 </td>
				  </tr>
				<tr>
				  <td height="25" class="text10" >Status : </td>
				  <td >
				  <select name="selStatus" class="text10">
				   <option value="0">select</option>
				  <option value="1">Active</option>
				  <option value="2">De-Active</option>
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
<script type="text/javascript">
				CKEDITOR.replace( 'ShortDesc' );
				CKEDITOR.replace( 'Instructions' );
			</script>

</body>
</html>
