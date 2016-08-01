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

 
	   
	   
  
?>
<?php

 if(isset($_POST['Submit']))
 {
$insert_query="INSERT INTO $branch_table set branch_name = '".$ch->checkFields($_POST['txtQualification'])."',	branch_status	 ='".$ch->checkFields($_POST['txtSelect'])."',cor_id	 ='".$ch->checkFields($_POST['selCourse'])."'";
//echo $insert_query;
								
								 $result=$db->insertRecord($insert_query);
								 ?>
	
		<script type="text/javascript"> 
		window.location="admin_manage_branch.php?msg=1";
		</script>
<?php		
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RV-VLSI Design Center</title>
<style type="text/css">

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.balu
{
color:#FF0000;
}

</style>

<link href="../rv_main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" >
function qualifications_validation()
			{selCourse
				//alert("sdgdsf");
			var frm=document.txtForm;
			
				if(frm.txtQualification.value=='')
					 {
					alert("Please enter branch");
					frm.txtQualification.focus();
					return false;
					 }
					 
					  else if (frm.selCourse.value=='0')
					 {
				alert("Please select course ");
					frm.selCourse.focus();
					return false;
					 }
					 else if (frm.txtSelect.value=='0')
					 {
				alert("Please select status ");
					frm.txtSelect.focus();
					return false;
					 }
			}
				
</script>			


</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top">
<table width="100%" height="557" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
            <td align="left" valign="top">
			<table width="98%" height="167" border="0" cellpadding="0" cellspacing="0">
			<tr>
            <td>&nbsp;  </td>
          </tr>
            <tr><td width="29%" height="167" valign="top">
				<? include("admin_navigation.php");?>
			</td>	  
               
				

<td width="71%" valign="top" ><?=$input->formStart('txtForm','','onSubmit="return qualifications_validation();"');?>
<table width="537">
  <tr>
    <td colspan="3" class="heading_new">Add Branch </td>
  </tr>
 <tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
    <td width="254" align="left"  class="balu">* Indicates required field</td>
  </tr>

  <tr><td colspan="3" align="right">&nbsp;</td>
  </tr>
<tr>
<td width="62" class = text10>Branch : </td>
<td width="205"><?=$input->textBox('txtQualification','','','style=width:200px;','');?></td>
 <td class="balu"> *</td>
</tr>
<tr>
  <td class = text10>Course : </td>
  <td><!--<input type="text" name="" id="suggestuniversities" value="" style="width:200px;" />-->
  <select name="selCourse" id="selCourse" style="width:205px;">
  <option value="0">Select</option>
  <? 	$course_result = $db->getResults("select * from $course_table  order by cor_id desc");
foreach($course_result as $course){
?>
  <option value="<?=stripslashes($course->cor_id);?>" ><?=stripslashes($course->cor_name);?></option>
<? }?>
</select></td>
  <td><span class="balu">*</span></td>
</tr>
<tr>
<td width="62" class = text10>Status : </td>
<td width="205">
    <select name="txtSelect" style="width:205px;">
                                <option value="0">Select</option>
                                <option value="1" >Active</option>
                                <option value="2">In-Active</option>
                            </select></td>
    <td class="balu"> *</td>
  
</tr>
<tr>
<td width="62">&nbsp;</td>
<td width="205"><?=$input->submitButton('Submit','Submit','text', 'style=background-color:#424843;color:#ffffff;margin-left:50px');?></td>
</tr>
</table><?=$input->formEnd()?></td>	                     
</tr>                       
</table>
     
				</td>
			  </tr>
				<tr><td></td></tr>
            </table></td>
        </tr>
      </table></td>
        <td width="20">&nbsp;</td>
      </tr>
      
      <tr>
        <td height="37" colspan="3" align="center" valign="middle" background="../images/footer_bg.jpg">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20">&nbsp;</td>
            <td align="left" valign="middle" class="copyright">A unit of Rashtreeya Sikshana Samiti Trust.</td>
            <td align="right" valign="middle" class="copyright">All rights reserved, Copyright © RV-VLSI Design Center.</td>
            <td width="20">&nbsp;</td>
          </tr>
        </table>
		</td>
       </tr>
</table>

</body>
</html>
