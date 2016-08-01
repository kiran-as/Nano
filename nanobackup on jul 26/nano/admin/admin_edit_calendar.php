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


if(isset($_POST[update]))
	 {
		 mysql_query("update $prg_calendar_table set
		  pr_id='$_POST[selProgram]'
		 ,cl_start_month='$_POST[selStartMonth]'
		 ,cl_end_month='$_POST[selEndMonth]'
		 ,cl_start_week='$_POST[selStartWeek]'
		 ,cl_end_week='$_POST[selEndtWeek]'
		
		 ,cl_status='$_POST[selStatus]' where cl_id=$_REQUEST[cl_id]") or die("culdnot:".mysql_error());
	header("location:admin_programe_calendar.php?msg=2");
	
	 
	 
	 }	

if(is_numeric($_REQUEST[cl_id]))
	{
$edit_details=mysql_query("select * from $prg_calendar_table where cl_id=$_REQUEST[cl_id] ") or die("culd:".mysql_error());
$details=mysql_fetch_array($edit_details);
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
				<Table width="80%" cellpadding="0" cellspacing="0" >
				<tr>
				  <td height="25" colspan="2" class="heading_new">Edit Program Calendar </td>
				</tr>
				<tr>
				  <td width="17%" height="25" class="text10" >&nbsp;</td>
				  <td width="83%" class="sub_link">&nbsp;</td>
				  </tr>
				<tr>
				  <td height="25" class="text10" >Program : </td>
				  <td >
				  <select name="selProgram" class="text10">
				 <?
$prog_result=mysql_query("select * from $programers_table order by pr_title asc ") or die("prg".mysql_error());
	while($prg=mysql_fetch_array($prog_result))
				{
				if($details[pr_id]==$prg[pr_id])
				$sel="selected";
				else
				$sel="";
				
				echo "<option value='$prg[pr_id]' $sel>".stripslashes($prg[pr_title])."</option>";
				}
				  ?>
				  </select>				  </td>
				  </tr>
			
				<tr>
				  <td height="25" class="text10" >Start Month : </td>
				  <td >
				  <select name="selStartMonth">
				  <option value="1" <? if($details[cl_start_month]=='1') echo "selected"; ?>>Jan</option>
				  <option value="2" <? if($details[cl_start_month]=='2') echo "selected"; ?>>Feb</option>
				  <option value="3" <? if($details[cl_start_month]=='3') echo "selected"; ?>>Mar</option>
				  <option value="4" <? if($details[cl_start_month]=='4') echo "selected"; ?>>Apr</option>
				  <option value="5" <? if($details[cl_start_month]=='5') echo "selected"; ?>>May</option>
				  <option value="6" <? if($details[cl_start_month]=='6') echo "selected"; ?>>Jun</option>
				  <option value="7" <? if($details[cl_start_month]=='7') echo "selected"; ?>>Jul</option>
				  <option value="8" <? if($details[cl_start_month]=='8') echo "selected"; ?>>Aug</option>
				  <option value="9" <? if($details[cl_start_month]=='9') echo "selected"; ?>>Sep</option>
				  <option value="10" <? if($details[cl_start_month]=='10') echo "selected"; ?>>Oct</option>
				  <option value="11" <? if($details[cl_start_month]=='11') echo "selected"; ?>>Nov</option>
				  <option value="12" <? if($details[cl_start_month]=='12') echo "selected"; ?>>Dec</option>
				  </select>				  </td>
				  </tr>
				  <tr>
				  <td height="25" class="text10" >Start Week: </td>
				  <td ><select name="selStartWeek" class="text10">
				  <option value="1" <? if($details[cl_start_week]=='1') echo "selected"; ?>>1 Week</option>
				  <option value="2" <? if($details[cl_start_week]=='2') echo "selected"; ?>>2 Week</option>
				  <option value="3" <? if($details[cl_start_week]=='3') echo "selected"; ?>>3 Week </option>
				  <option value="4" <? if($details[cl_start_week]=='4') echo "selected"; ?>>4 Week </option>
				  </select></td>
				  </tr>
				<tr>
				  <td height="25" class="text10" > End Month: </td>
				  <td >
				   <select name="selEndMonth">
				  <option value="1" <? if($details[cl_end_month]=='1') echo "selected"; ?>>Jan</option>
				  <option value="2" <? if($details[cl_end_month]=='2') echo "selected"; ?>>Feb</option>
				  <option value="3" <? if($details[cl_end_month]=='3') echo "selected"; ?>>Mar</option>
				  <option value="4" <? if($details[cl_end_month]=='4') echo "selected"; ?>>Apr</option>
				  <option value="5" <? if($details[cl_end_month]=='5') echo "selected"; ?>>May</option>
				  <option value="6" <? if($details[cl_end_month]=='6') echo "selected"; ?>>Jun</option>
				  <option value="7" <? if($details[cl_end_month]=='7') echo "selected"; ?>>Jul</option>
				  <option value="8" <? if($details[cl_end_month]=='8') echo "selected"; ?>>Aug</option>
				  <option value="9" <? if($details[cl_end_month]=='9') echo "selected"; ?>>Sep</option>
				  <option value="10" <? if($details[cl_end_month]=='10') echo "selected"; ?>>Oct</option>
				  <option value="11" <? if($details[cl_end_month]=='11') echo "selected"; ?>>Nov</option>
				  <option value="12" <? if($details[cl_end_month]=='12') echo "selected"; ?>>Dec</option>
				  </select>				  </td>
				  </tr>
				
				<tr>
				  <td height="25" class="text10" >End Week : </td>
				  <td ><select name="selEndtWeek" class="text10">
				   <option value="1" <? if($details[cl_end_week]=='1') echo "selected"; ?>>1 Week</option>
				  <option value="2" <? if($details[cl_end_week]=='2') echo "selected"; ?>>2 Week</option>
				  <option value="3" <? if($details[cl_end_week]=='3') echo "selected"; ?>>3 Week </option>
				  <option value="4" <? if($details[cl_end_week]=='4') echo "selected"; ?>>4 Week </option>
				  </select></td>
				  </tr>
			
				<tr>
				  <td height="25" class="text10" >Status : </td>
				  <td >
				  <select name="selStatus" class="text10">
				  <option value="1" <? if($details[cl_status]=='1') echo "selected"; ?>>Active</option>
				  <option value="0" <? if($details[cl_status]=='0') echo "selected"; ?>>De-Active</option>
				  </select></td>
				  </tr>
				<tr>
				  <td  height="25" colspan="2" class="text10" >&nbsp;</td>
				</tr>
				<tR><td ></td><td>
				  <input name="update" type="submit" class="button" value="Update" />
				  </td></tR>
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
