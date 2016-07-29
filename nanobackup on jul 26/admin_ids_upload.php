<?  include_once('db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('reader.php'); // include the class
   $data = new Spreadsheet_Excel_Reader(); // instantiate the object
   $data->setOutputEncoding('CP1251'); // select output encoding
   
	   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

 
	   
	   
  
?>
<?php



/*if(isset($_POST[Submit]))
   		{
		$filename=mktime().basename($_FILES['excelFile']['name']);
		move_uploaded_file($_FILES['excelFile']['tmp_name'],"../excel/".$filename);  
   
$data->read("../excel/".$filename); // specify the file to read
  $startRow = 2;
  $sheet = $data->sheets[0];
  $rows = $sheet['cells'];
  $rowCount = count($rows);

  $cells = $data->sheets[0]['cells'];
 
	
  for ($row = $startRow;$row <= $rowCount;$row++) 
  {
$insert_query="INSERT INTO $course_table set rm_mem_id = '".addslashes($cells[$row][1])."',rm_status='0'";
mysql_query($insert_query);  }

header("Location:admin_ids_upload.php?msg=3");		
		}*/
		
		
if(isset($_POST[Submit]))
   		{
		$total_ids=explode(',',$_POST[txtIds]);
	
  for ($r =0;$r <= count($total_ids);$r++) 
  {
$insert_query="INSERT INTO rv_members_ids set rm_mem_id = '".strtoupper($total_ids[$r])."',rm_status='0'";
mysql_query($insert_query);
  }

header("Location: admin_ids_upload.php?msg=1");		
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
			{
				//alert("sdgdsf");
			var frm=document.txtForm;
			
				if(frm.txtQualification.value=='')
					 {
					alert("Please enter Course");
					frm.txtQualification.focus();
					return false;
					 }
					 
					  else if (frm.selQual.value=='0')
					 {
				alert("Please select Qulification ");
					frm.selQual.focus();
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
                <td width="111"><a href="../index.php"><img src="../images/logo.jpg" width="111" height="98" border="0" /></a></td>
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
               
				

<td width="71%" valign="top" ><? if($_REQUEST[action]=='add'){

 echo $input->formStart('txtForm','','onSubmit="return qualifications_validation();"');?>
<table width="537">
  <tr>
    <td colspan="3" class="heading_new">Add IDs  </td>
  </tr>
 <tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
 <td width="185" align="left" class="balu">* Indicates required field</td>
 </tr>
<!--<tr>
<td width="103" class = text10>Excel File  : </td>
<td width="233"><input type="file" name="excelFile" /></td> 
<td width="185" class="balu"> *</td>
</tr>-->
<tr>
<td width="103" class="text10" valign="top"> ID's  : </td>
<td width="233" valign="top"><textarea name="txtIds" id="txtIds" cols="50" rows="10"></textarea></td> 
<td width="185" class="balu" valign="top"> *</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
<td width="103">&nbsp;</td>
<td width="233"><?=$input->submitButton('Submit','Submit','text', 'style=background-color:#424843;color:#ffffff;margin-left:50px');?></td>
</tr>
</table>
<? echo $input->formEnd();
}else{
?> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>Members ID's </strong></td>
    <td><a href="admin_ids_upload.php?action=add">New ID's</a></td>
  </tr>
	 <tr>
      <td><strong>Member ID </strong></td>
      <td><strong>Delete</strong></td>
    </tr><? 
	
	 $ids_query=mysql_query("select * from rv_members_ids") or die(mysql_error());
				  while($ids_row=mysql_fetch_array($ids_query))
				  		{?>
   
    <tr>
    <td><?=$ids_row[rm_mem_id]?></td>
    <td><img src="../images/error.png" border="0" />&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" style=" background-color:#ccc; height:1px;"></td>
    </tr>
	<? }?>
  
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
</table>


<? }
?></td>	                     
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
