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


if($_REQUEST[mode]==3 && is_numeric($_REQUEST[cl_id]))
	{
	mysql_query("delete from $prg_calendar_table where cl_id=$_REQUEST[cl_id] ") or die("culdnot:".mysql_error());
	header("location:admin_programe_calendar.php?msg=3");
	}


$calendar_query=" select * from $prg_calendar_table pr,$programers_table st where st.pr_id=pr.pr_id ";

$result=mysql_query($calendar_query);

$totalrow=mysql_num_rows($result);



$limit=20;



			$png=$_REQUEST['png'];

			

			if(empty($png)){

			

      			  $png = 1;

    			} 

				

	        $limitvalue = ($png * $limit )- ($limit);  

			$calendar_query.= " order  by cl_id desc  LIMIT $limitvalue, $limit  ";

			



	

	

	$calendar_result=mysql_query($calendar_query) or die("culnot select:".mysql_error());

   $num_rows=mysql_num_rows($calendar_result);

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
				<td width="80%" valign="top" >
				<table width="100%">
				<tr>
				  <td colspan="6" class="heading_new">Program Calendar </td>
				  </tr>
				<tr>
				  <td colspan="5" class="text11red">
				    <div align="center"><?=messaging($_REQUEST[msg]);?></div></td>
				  </tr>
				<tr>
				  <td colspan="5" class="slider"><div align="right"><a href="admin_new_calendar.php" class="link_green">New</a></div></td>
				  </tr>
				<tr height="25">
				<td width="24%" class="slider">Program</td>
				<td width="29%" class="slider">Start month / week </td>
				<td width="26%" class="slider">End Month / week </td>
				<td width="8%" class="slider"><div align="center">Status</div></td>
				<td width="5%" class="slider"><div align="center">Edit</div></td>
				<td width="8%" class="slider"><div align="center">Delete</div></td>
				</tr>
				<tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>	
				<? if($num_rows==0) { ?>
				<tr><td height="25" colspan="6" class="text11red"><div align="center">No Records Exists</div></td>
				</tr>
				<? }?>	
				
				<?
				while($calendar=mysql_fetch_array($calendar_result))
					{
				?>
			<tr height="25">
			<td class="text10"><?=stripslashes($calendar[pr_title]);?></td>	
			<td class="text10">
			
			<?
			switch($calendar[cl_start_month])
				{
				case 1:
				echo "Jan";
				break;
				
				case 2:
				echo "Feb";
				break;
				
				case 3:
				echo "Mar";
				break;
				
				case 4:
				echo "Apr";
				break;
				
				case 5:
				echo "May";
				break;
				
				case 6:
				echo "Jun";
				break;
				
				case 7:
				echo "Jul";
				break;
				
				case 8:
				echo "Aug";
				break;
				
				case 9:
				echo "Sep";
				break;
				
				case 10:
				echo "Oct";
				break;
				
				case 11:
				echo "Nov";
				break;
				
				case 12:
				echo "Dec";
				break;
				}
			
			?> /	<?=$calendar[cl_start_week];?> Week
			</td>
			<td class="text10">
			
			
			<?
			switch($calendar[cl_end_month])
				{
				case 1:
				echo "Jan";
				break;
				
				case 2:
				echo "Feb";
				break;
				
				case 3:
				echo "Mar";
				break;
				
				case 4:
				echo "Apr";
				break;
				
				case 5:
				echo "May";
				break;
				
				case 6:
				echo "Jun";
				break;
				
				case 7:
				echo "Jul";
				break;
				
				case 8:
				echo "Aug";
				break;
				
				case 9:
				echo "Sep";
				break;
				
				case 10:
				echo "Oct";
				break;
				
				case 11:
				echo "Nov";
				break;
				
				case 12:
				echo "Dec";
				break;
				}
			
			?> /	<?=$calendar[cl_end_week];?> Week
			
			
			</td>
			<td><div align="center">
			  <? if($calendar[cl_status]==1)
			  echo "<img src='../images/green.png'>";
			  else
			echo "<img src='../images/red.png'>";				  
			  
			  ?>
			  </div></td>
			<td><div align="center"><a href="admin_edit_calendar.php?cl_id=<?=$calendar[cl_id];?>"><img src="../images/edit.png" border="0" /></a></div></td>
			<td><div align="center"><a href="admin_programe_calendar.php?cl_id=<?=$calendar[cl_id];?>&mode=3" onclick="return toDelete();"><img src="../images/error.png" border="0" /></a></div></td>
			</tr>
			
				<tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>
				<? } ?>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan="5" align="right" >
				<?
				
				if($totalrow>$limit)
					{
					$page="admin_programe_calendar.php";

					pagenation($totalrow,$limit,$png,$page);
					}
				?>
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
