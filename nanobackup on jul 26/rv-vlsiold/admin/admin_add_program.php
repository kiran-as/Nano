<?php include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include("../ckeditor/ckeditor.php");
error_reporting(E_ALL ^ E_NOTICE);
if($_POST)
{

$programtype = $_POST['programtype'];
$title = $_POST['title'];
$shorttitle = '000';
$TemplateBody = $_POST['TemplateBody'];
$AlteraCategory = $_POST['AlteraCategory'];
$programname= '0';
$noofdays = 1;

$Insert	=	mysql_query("INSERT INTO tbl_programs (Description, Title,ShortTitle,ProgramName,Programtype,Noofdays,AlteraCategory)
VALUES ('".$TemplateBody."','".$title."','".$shorttitle."','".$programname."','".$programtype."','".$noofdays."','".$AlteraCategory."')")or die(mysql_error()); 
echo "<script>parent.location = 'admin_manage_programs.php';</script>";	  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../css/styleupdated.css" type="text/css" media="screen" />
<!--<link href="../css/style.css" rel="stylesheet" type="text/css"> -->
	
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
	<script language="javascript" type="text/javascript" src="../javascript/lytebox.js"></script>
	<link rel="stylesheet" href="../css/lytebox.css" type="text/css" media="screen" />
<link href="../rv_main.css" rel="stylesheet" type="text/css" /> 
<link href="../rv_main.css" rel="stylesheet" type="text/css" /> 
<script type="text/javascript">

function funradio(alt)
{
  if(alt==0)
  {
         document.getElementById('alterass').style.display='';
  }
  else
  {
   document.getElementById('alterass').style.display='none';
  }
}
function validateprograms()
{
  var title = document.getElementById('title').value;
  if(title=='')
   {
     alert('Please Enter the Title');
	 return false;
   }
 
  var TemplateBody = document.getElementById('TemplateBody').value;
  if(TemplateBody=='')
   {
     alert('Please Enter the TemplateBody');
	 return false;
   }  
  }
  
 function fnclose()
 {
     parent.location="admin_manage_programs.php";
 }
  </script>
<body onload="funradio(0);">
<div class="wrapper">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            				<tr><td width="20%" valign="top" style="border-right: 2px solid #CCCCCC;">
				<?php include("admin_navigation.php");?>
				
				<img src="images/pixeltransparent.png" width="200" height="1" />
				
				</td>
				<td width="80%" valign="top" style="padding-left:10px;">
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr><td colspan="4" class="heading_new">Add New Program</td></tr>
				<tr>
				<td>
				


 <form action="" method="POST" id="myForm" name="myform">
<table width="100%" cellpadding="0" cellspacing="0" border="0" >
  <tr>
    <td>
		 <table border="0" cellspacing="0" cellpadding="3" width="100%" >
<tr>
	  <td  class="label" nowrap="nowrap">Program Type</td>
	 <td><input type="radio" name="programtype" id="programtype" value="1" checked="checked" onclick="funradio(this.value)">RV-VLSI
								<input type="radio" name="programtype" id="programtype1" value="0" checked="checked"onclick="funradio(this.value)">ALTERA</td>
</tr>
<tr>
     <td  class="label" nowrap="nowrap">Title</td>
	 <td><input type="text" name="title" id="title" size="60" value="" /></td>
	 
</tr><input type="hidden" id="idprogram" name="idprogram" value="" />
<tr  id="alterass">
     <td class="label" nowrap="nowrap">
	Select Category</td><td>
	 <select name="AlteraCategory" id="AlteraCategory" value=""> 
																		<option value="1">Digital System Design & Implementation: made easy</option>
																		<option value="2">High Performance Digital System Design Techniques</option>
																		<option value="3">Advanced Embedded Systems Design using NIOS II Soft Processor</option>
																		</select></td>
	 
</tr>
<tr><td colspan="2"><a href="../test/upload.php" rel="lyteframe" 
   				rev="width:600px; height:450px; scrolling:auto"> upload image</a></td></tr>

<tr><td colspan="2" class="label" nowrap="nowrap">Description</td></tr>
<tr>

	 <td colspan="2"><?php 
				$CKEditor = new CKEditor();
				$config = array();
	  				  					
	  			$CKEditor->editor("TemplateBody",$TemplateBody);
				 $CKEditor->config['height'] = 700;
	  // Use @@ at the beggining of a string to ouput it without surrounding quotes.
	  $CKEditor->config['width'] = 300;
	  

	  
				
	  		?></td>
</tr>

<tr>
      <td  class="label" nowrap="nowrap">Active</td>
 <td><select name="active" id="active" value=""style="width:150px;"> 
																		<option value="1" >Active</option><option value="0" >In-Active</option>
																		</select></td>
</tr>
		
			<tr>
			   <td colspan="2" align="right"><input type="submit" name="save" id="save" value="save" class="blueButton" onClick="return validateprograms();"/>
											<input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td>
			
			</tr>
		
		
		</table>
	</td>
  </tr>
</table>
</form>

				</td>
				</tr>
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
            <td align="right" valign="middle" class="copyright">All rights reserved, Copyright  RV-VLSI Design Center.</td>
            <td width="20">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

</div>
</body>
</html>