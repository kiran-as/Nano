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



if($_REQUEST[mode]==3 && is_numeric($_REQUEST[t_id]) && is_numeric($_REQUEST[q_id]))
	{
	mysql_query("Delete from $tests_questions_table where t_id=$_REQUEST[t_id] and q_id=$_REQUEST[q_id]") or die("culdnot delete:".mysql_error());
	header("location:admin_test_questions.php?t_id=$_REQUEST[t_id]&msg=3");
	}


$news_query=" select * from $tests_questions_table where t_id='".$_REQUEST[t_id]."'";

/*$result=mysql_query($news_query);

$totalrow=mysql_num_rows($result);*/



$limit=10;



			$png=$_REQUEST['png'];

			

			if(empty($png)){

			

      			  $png = 1;

    			} 

				

	        $limitvalue = ($png * $limit )- ($limit);  

			 $news_query.= " order  by q_id desc  LIMIT $limitvalue, $limit ";
			// echo $news_query;die;

			



	

	

	$news_result=mysql_query($news_query) or die("culnot select:".mysql_error());

   $num_rows=mysql_num_rows($news_result);




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
				<form name="testForm" id="testForm" method="post" action="">
				<Table width="100%" cellpadding="0" cellspacing="0" >
                 <? $sql="select * from $tests_table where t_id='".$_REQUEST[t_id]."'";
				$test_result=$db->getResults($sql);
				foreach($test_result as $result){
				?>
				<tr>
				  <td colspan="5" class="heading_new">Questions For Test <?=stripslashes($result->t_title);?></td>
				</tr>
                <? }?>
				<tr>
				  <td colspan="5" class="text11red"><div align="center"><?=messaging($_REQUEST[msg]);?></div>				    </td>
				  </tr>
				<tr><td width="70%">&nbsp;</td>
				<td colspan="5"><div align="right"><a href="admin_new_test_questions.php?t_id=<?=$_REQUEST[t_id];?>" class="link_green">Add Questions </a></div></td>
				</tr>
				<tr><td height="25" class="sub_link">Title</td>
                				<td width="8%" class="sub_link"><div align="center"><!--Order--></div></td>
                				<td width="8%" class="sub_link"><div align="center">Edit</div></td>
				<td width="13%" class="sub_link"><div align="center">Delete</div></td>
				</tr>
				<tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>
				<?
				while($news=mysql_fetch_array($news_result))
					{ ?>
				<tr><td height="25" class="text10"><?=stripslashes($news[q_question]);?></td>
                                        
				  <td><label>
				    <div align="center">
				      <!--<input type="text" name="textfield" maxlength="3" size="3" />-->
				        </div>
				  </label></td>
				  <td>
					  <div align="center"><a href="admin_edit_test_questions.php?q_id=<?=$news[q_id];?>&t_id=<?=$_REQUEST[t_id]?>"><img src="../images/edit.png" border="0" onclick="return toEdit();" /></a></div></td><td>
					        <div align="center"><a href="admin_test_questions.php?q_id=<?=$news[q_id];?>&t_id=<?=$_REQUEST[t_id]?>&mode=3" ><img src="../images/error.png" border="0" onclick="return toDelete();" />		</a>			                  </div></td></tr>	
					<tr><td style="height:1px; background:#666600;" colspan="4"></td></tr>
					
				<?	}
				?>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan="4" align="right" >
				<?
				
				if($totalrow>$limit)
					{
					$page="admin_test_questions.php";

					pagenation($totalrow,$limit,$png,$page);
					}
				?>
				</td></tr>
				</Table>
				</form>
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
