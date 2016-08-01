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

 if(isset($_POST['Update']))
 {
 
 
 	$info_query="update $institutes set insti_name	='".$ch->checkFields($_POST['txtInstitute'])."',
								  insti_status ='".$ch->checkFields($_POST['txtSelect'])."',
								  uni_id ='".$ch->checkFields($_POST['selUniversity'])."'
								 where insti_id ='".$_REQUEST['id']."'";
								 //echo $info_query;die;
							
									
 $result=$db->insertRecord($info_query);
header("Location: admin_manage_institutes.php?msg=2");
 
	 		?>	
			<script> window.location = "admin_manage_recruiters.php?msg=2";</script>		
				<? } ?>	

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
<script type="text/javascript">

function institute_validation()
			{
				
		var frm=document.txtForm;
			
				if(frm.txtInstitute.value=='')
					 {
					alert("Please enter institute");
					frm.txtInstitute.focus();
					return false;
					 }
					  else if (frm.selUniversity.value=='0')
					 {
				alert("Please select status ");
					frm.selUniversity.focus();
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
            <tr><td width="20%" height="167" valign="top">
				<? include("admin_navigation.php");?>
			</td>	  
						
				<? $result = $db->getResults("select * from $institutes where insti_id='$_REQUEST[id]'");
				//print_r($result);die;
				foreach($result as $edit){}?>

<td width="80%" valign="top" ><?=$input->formStart('txtForm','','onSubmit="return institute_validation();"');?>
<table width="465">
  <tr>
    <td colspan="3" class="heading_new">Edit   Institute</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td align="right" class = "balu" colspan="2" >* Indicates required field</td>
  </tr>
<tr>
<td width="88" class="text10">Name :</td>
<td width="220"><?=$input->textBox('txtInstitute',$edit->insti_name,'','style=width:200px;','');?></td>
<td width="162"><span class="balu">*</span></td>
</tr>
<tr>
  <td class="text10">University : </td>
  <td><!--<input type="text" name="" id="suggestuniversities" value="" style="width:200px;" />-->
  <select name="selUniversity" id="selUniversity" style="width:205px;">
  <option value="0">Select</option>
  <? 	$universities_result = $db->getResults("select * from $universities_table  order by uni_id desc");
foreach($universities_result as $universities){
?>
  <option value="<?=stripslashes($universities->uni_id);?>" <?=$universities->uni_id==$edit->uni_id?'selected':'';?> ><?=stripslashes($universities->uni_name);?></option>
<? }?>
</select></td>
  <td><span class="balu">*</span></td>
</tr>
<tr>
<td width="88" class="text10">Status :</td>
<td width="220"><select name="txtSelect" style="width:205px;">
  <option value='0'>Select</option>
  <option value="1" <? if($edit->insti_status==1) echo "selected";?>>Active</option>
  <option value="2" <? if($edit->insti_status==2) echo "selected";?>>In-Active</option>
</select></td>
<td width="162"><span class="balu">*</span></td>
</tr>
<tr>
<td width="88">&nbsp;</td>
<td width="220"><?=$input->submitButton('Update','Update','text', 'style=background-color:#424843;color:#ffffff;margin-left:50px;');?></td>
<td width="162">&nbsp;</td>
</tr>
</table>
<?=$input->formEnd()?></td>	                     
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
