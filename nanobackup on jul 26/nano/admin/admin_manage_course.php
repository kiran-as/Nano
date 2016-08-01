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


	if($_REQUEST[action]=='delete' && is_numeric($_REQUEST[course_id])!='')
 {

 	$delete_query="delete from $course_table where cor_id ='".$_REQUEST[course_id]."'";
									
 $result=$db->deleteRecord($delete_query);
 header("Location: admin_manage_course.php?msg=3");
	 				
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
				<tr><td width="20%" valign="top">
				<? include("admin_navigation.php");?>
				
				
				</td>
				<?
				$query=" select * from $course_table  order by cor_id desc";

               $result = $db->getResults($query);
				?>
				<td width="80%" valign="top" >
				<table width="68%">
				<tr>
				  <td colspan="6" class="heading_new">Manage Course </td>
				  </tr>
				<tr>
				  <td colspan="5" class="text11red">
				    <div align="center"><?=messaging($_REQUEST[msg]);?></div></td>
				  </tr>
				<tr>
				  <td colspan="5" class="slider"><div align="right"><a href="admin_add_course.php" class="link_green">New Course</a></div></td>
				  </tr>
				  
				<tr height="25">
				<td width="67%" class="slider">Course Name </td>
				
				<td width="17%" class="slider"><div align="center">Status</div></td>
				<td width="16%" class="slider"><div align="center">Edit</div></td>
				<!--<td width="17%" class="slider"><div align="center">Delete</div></td>-->
				</tr>
				<tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>	
				
				<? 

				  foreach($result as $name)
				  {
				  ?>
				
			<tr height="25">
			<td class="text10"><?=stripslashes($name->cor_name);?></td>	
			<td class="text10" align="center"><? if($name->cor_status==1)
			  echo "<img src='../images/green.png'>";
			  else
			echo "<img src='../images/red.png'>";				  
			  
			  ?></td>
			<td class="text10" align="center"><a href="admin_edit_course.php?id=<?=$name->cor_id;?>"><img src="../images/edit.png" border="0"  onclick="return toEdit();" /></img></a></td>
			
			<?php /*?><td><div align="center"><a href="admin_manage_course.php?action=delete&course_id=<?=$name->cor_id;?>"> <img src="../images/error.png" border="0" onclick="return toDelete();" /></a></div></td><?php */?>
			
			</tr>
			
				<tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>
				<? } ?>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan="5" align="right" >&nbsp;</td>
				</tr>
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
