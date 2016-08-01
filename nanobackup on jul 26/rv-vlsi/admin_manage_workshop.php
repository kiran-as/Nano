<?php  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');

 include_once('../db/dbconfig.php');
include_once('admin_login_check.php');

$resultsss = "SELECT * FROM  tbl_registerfreeworkshop";
$arraStudent=array();
	$resultc = mysql_query($resultsss);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$s]["StudentName"]	= $row["name"];
		 $arraStudent[$s]["StudentEmail"]	= $row["email"];
		 $arraStudent[$s]["StudentPhone"]	= $row["mobile"];
		 $arraStudent[$s]["idstudentdetailsinformation"]	= $row["idregisterfreeworkshop"];
		  $s++;  
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../css/styleupdated.css" type="text/css" media="screen" />
<!--<link href="../css/style.css" rel="stylesheet" type="text/css"> -->
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RV-VLSI Design Center</title>
	<script language="javascript" type="text/javascript" src="../javascript/lytebox.js"></script>
	<link rel="stylesheet" href="../css/lytebox.css" type="text/css" media="screen" />
<script type="text/javascript" src="../js/admin_validation.js"></script>
<link href="../rv_main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function deletemanageprog(idprog)
{
 var deletess = confirm("Do you really want to delete");
  if(deletess == true)
  {
        
	 window.location = "deletestudentsworkshop.php?idstudentdetailsinformation="+idprog;
   }
}

function deletemsg()
{
 var deletess = confirm("Do you really want to delete");
  if(deletess == true)
  {
        
	 window.location = "deleteallstudentsworkshop.php";
   }
}

</script>

</head>

<body>
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
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
            
				<tr><td width="20%" valign="top" style="border-right: 2px solid #CCCCCC;">
				<?php include("admin_navigation.php");?>
				
				
				</td>
				<td width="80%" valign="top">
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr><td colspan="4" class="heading_new">Student Details</td></tr>
				<tr>
				<td>
				<table height="20%"  width="100%">
<tr><td width="20%" valign="top">

				
				
				</td></tr>

 <tr>

 <td align="right">
<a href="importstudentsregister.php" class="blueButton">Export to Excel</a>
<input type="button" id="delete" name="delete" value="Delete All Enquires" onclick="deletemsg();" class="blueButton"> </td></tr>
<tr>

<td>
            
			
		
			

                <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
				   <tr class="gridheader">
				       
					   <td width="35%">Student Name</td>
					   <td width="30%">Student Email</td>
					   <td width="35%">Phone</td>
					   <td nowrap="nowrap"></td>
					
					   	
				  </tr>
				  <?php
for($s=0;$s<count($arraStudent);$s++){
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
?>

<tr class="<?php echo $row_color?>">
<td>
<a href="studentdetails.php?idstudentdetailsinformation=<?php echo $arraStudent[$s]['idstudentdetailsinformation']?>" rel="lyteframe" rev="width:750px; height:520px; scrolling:auto"><?php echo $arraStudent[$s]['StudentName'];?></a>
				
</td>
<td><?php echo $arraStudent[$s]['StudentEmail'];?></td>
<td><?php echo $arraStudent[$s]['Title'];?></td>
						  <td>
						  <a onclick="deletemanageprog(<?php echo $arraStudent[$s]['idstudentdetailsinformation']?>)">
						  <img src="../images/icon_delete.png" border="0" alt="Delete" align="right"/></a></td>
</tr>

<?php
}
?>
		
			</table>
			</td>
			</tr>
			</table>
 </div>                  

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
