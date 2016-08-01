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



if(isset($_POST[update])&& is_numeric($_REQUEST[q_id]))
	 {
	 
	$query="Update $tests_questions_table set
	  t_id='".addslashes($_REQUEST[t_id])."',
	 q_question='".addslashes($_POST[ShortDesc])."',
	 q_answer1='".addslashes($_POST[txtAns1])."',
	 q_answer2='".addslashes($_POST[txtAns2])."',
	 q_answer3='".addslashes($_POST[txtAns3])."',
	 q_answer4='".addslashes($_POST[txtAns4])."',
	 q_rightanswer='".addslashes($_POST[selAns])."'
	 where q_id='".$_REQUEST[q_id]."'";
	//echo  $query;die;
	 
	 mysql_query( $query) or die("culdnot:".mysql_error());
	 header("location:admin_test_questions.php?t_id=$_REQUEST[t_id]&msg=2");
	 }	
	 
if(is_numeric($_REQUEST[t_id]) && is_numeric($_REQUEST[q_id]))
	{
$event_details=mysql_query("select * from $tests_questions_table where t_id=$_REQUEST[t_id] and q_id=$_REQUEST[q_id] ") or die("culdnot:".mysql_error());
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
				<form action="" method="post" enctype="multipart/form-data" name="QuestionForm" onsubmit="return validateQuestions()">
				<Table width="100%" cellpadding="0" cellspacing="0" >
                 <? $sql="select * from $tests_table where t_id='".$_REQUEST[t_id]."'";
				$test_result=$db->getResults($sql);
				foreach($test_result as $result){
				?>
				<tr>
				  <td height="25" colspan="2" class="heading_new">Edit Question For Test <?=stripslashes($result->t_title);?></td>
				</tr>
                <? }?>
				<tr>
				  <td height="25" class="text10" >&nbsp;</td>
				  <td class="text11red"><?=messaging($_REQUEST[msg]);?></td>
				  </tr>
				 <tr>
				  <td  height="25" class="text10" >Question : </td>
				<td width="76%" class="sub_link">&nbsp;</td>
				</tr>
				<tr>
				  <td  height="25" colspan="2" class="text10" >
				  
<textarea id="ShortDesc" name="ShortDesc"><?=stripslashes($details[q_question]);?></textarea>				 </td>
				  </tr>
				<tr>
				  <td height="25" class="text10" ><strong>Answers</strong></td>
				  <td >&nbsp;</td>
				  </tr>
				<tr>
				  <td width="26%" height="25" class="text10" >A : </td><td width="76%" ><input name="txtAns1" type="text" class="text10" style="width:450px"  value="<?=stripslashes($details[q_answer1]);?>"   /></td>
				</tr>
                <tr>
				  <td width="26%" height="25" class="text10" >B : </td><td width="76%" ><input name="txtAns2" type="text" class="text10" style="width:450px"   value="<?=stripslashes($details[q_answer2]);?>" /></td>
				</tr>
                <tr>
				  <td width="26%" height="25" class="text10" >C : </td><td width="76%" ><input name="txtAns3" type="text" class="text10" style="width:450px"  value="<?=stripslashes($details[q_answer3]);?>"  /></td>
				</tr>
                <tr>
				  <td width="26%" height="25" class="text10" >D : </td><td width="76%" ><input name="txtAns4" type="text" class="text10" style="width:450px" value="<?=stripslashes($details[q_answer4]);?>"   /></td>
				</tr>
                 <tr>
				  <td height="25" class="text10" >Duration : </td>
				  <td >
				  <select name="selAns" class="text10">
				   <option value="0">select</option>
				  <option value="A" <? if($details[q_rightanswer]=='A') echo "selected"; ?>>A</option>
				  <option value="B" <? if($details[q_rightanswer]=='B') echo "selected"; ?>>B</option>
                  <option value="C" <? if($details[q_rightanswer]=='C') echo "selected"; ?>>C</option>
				  <option value="D" <? if($details[q_rightanswer]=='D') echo "selected"; ?>>D</option>
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
