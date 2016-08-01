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

include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	   
	   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
?>
<?

if($_REQUEST[mode]==3 && is_numeric($_REQUEST[p_id]))
	{
	mysql_query("Delete from $programers_table where pr_id=$_REQUEST[p_id] ") or die("culdnot delete:".mysql_error());
	header("location:admin_manage_programs.php?msg=3");
	}

$programs_query=" select * from $programers_table ";

$result=mysql_query($programs_query);

$totalrow=mysql_num_rows($result);



$limit=20;



			$png=$_REQUEST['png'];

			

			if(empty($png)){

			

      			  $png = 1;

    			} 

				

	        $limitvalue = ($png * $limit )- ($limit);  

			$programs_query.= " order  by pr_id desc  LIMIT $limitvalue, $limit  ";

			



	

	

	$program_result=mysql_query($programs_query) or die("culnot select:".mysql_error());

   $num_rows=mysql_num_rows($program_result);




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
				<Table width="87%" cellpadding="0" cellspacing="0" >
				<tr><td colspan="4" class="heading_new">Programs List</td></tr>
				<tr>
				  <td colspan="4" class="text11red"><div align="center"><?=messaging($_REQUEST[msg]);?></div>				    </td>
				  </tr>
				<tr><td width="15%">&nbsp;</td>
				<td colspan="3"><div align="right"><a href="admin_new_manage.php" class="link_green">New </a></div></td>
				</tr>
				<tr><td height="25" class="sub_link">Title</td><td width="28%" class="sub_link"> <div align="center">Status</div></td>
				<td width="17%" class="sub_link"><div align="center">Edit</div></td>
				<td width="40%" class="sub_link"><div align="center">Delete</div></td>
				</tr>
				<tr><td style="height:1px; background:#666600;" colspan="4"></td></tr>
				<?
				$programs_result = mysql_query("select * from $programers_table");
				
				while($program=mysql_fetch_array($programs_result))
					{ ?>
					<tr><td height="25" class="text10"><?=stripslashes($program[pr_title]);?></td>
					<td class="text10" align="center">
					
					<? if($program[pr_status]==1)
					{
			      echo "<img src='../images/green.png'>";
				  }
			    else {
			         echo "<img src='../images/red.png'>";
					 } ?>
				
						<td class="text10" align="center"><a href="admin_edit_manage.php?p_id=<?=$program[pr_id];?>"><img src="../images/edit.png" border="0" onclick="return toEdit();" /></a></td>
			
			<td><div align="center"><a href="admin_manage_programs.php?p_id=<?=$program[pr_id];?>&mode=3"> <img src="../images/error.png" border="0"  onclick="return toDelete();" /> </a></div></td>
			<tr><td style="height:1px; background:#666600;" colspan="4" class="text10" ></td></tr>
				<? } ?>
				
				<tr><td colspan="4" align="right" >
				<?
				
				if($totalrow>$limit)
					{
					$page="admin_manage_programs.php";

					pagenation($totalrow,$limit,$png,$page);
					}
				?>
				</td></tr>
				</Table>
				</td>
				</tr>
				<tr><td></td></tr>
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
