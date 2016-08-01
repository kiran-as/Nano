<?php
 include_once('../db/dbconfig.php');
include_once('admin_login_check.php');

$resultsss = "SELECT a.*,b.* FROM tbl_programs as a,tbl_programcalendar as b where a.idprograms=b.idprograms and a.programtype=1 and a.Active=1";

	$resultc = mysql_query($resultsss);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		 $arraStudent[$s]["idprogramcalendar"]	= $row["idprogramcalendar"];
		  $arraStudent[$s]["Title"]	= $row["Title"];
		 $arraStudent[$s]["idprograms"]	= $row["idprograms"];
		 $arraStudent[$s]["startweek"]	= $row["startweek"];
		 $arraStudent[$s]["endweek"]	= $row["endweek"];
		 $arraStudent[$s]["startmonth"]	= $row["startmonth"];
		  $arraStudent[$s]["endmonth"]	= $row["endmonth"];
		   $arraStudent[$s]["active"]	= $row["active"];
		  $s++;  
		}
		
		
$alteraresultsss = "SELECT a.*,b.* FROM tbl_programs as a,tbl_programcalendar as b where a.idprograms=b.idprograms and a.programtype=0 and a.Active=1";

	$resultc = mysql_query($alteraresultsss);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
	 $altera[$s]["idprogramcalendar"]	= $row["idprogramcalendar"];
		  $altera[$s]["Title"]	= $row["Title"];
		 $altera[$s]["idprograms"]	= $row["idprograms"];
		 $altera[$s]["startdate"]	= $row["startdate"];
		 $altera[$s]["enddate"]	= $row["enddate"];
		  $altera[$s]["active"]	= $row["active"];
		  $s++;  
		}		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../css/styleupdated.css" type="text/css" media="screen" />
<!--<link href="../css/style.css" rel="stylesheet" type="text/css">-->
	
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
<script type="text/javascript">
function hidealtera()
{
  document.getElementById('altera').style.display='none';
  document.getElementById('rvvlsi').style.display='block';
}
function hidervvlsi()
{
  document.getElementById('altera').style.display='block';
  document.getElementById('rvvlsi').style.display='none';
}

function funradio(prog)
{

  if(prog==1)
  {
    hidealtera();
  }
  else
  {
    hidervvlsi();
  }
}
function deletemanageprogcalendar(idprog)
{
 var deletess = confirm("Do you really want to delete");
  if(deletess == true)
  {
        
	 window.location = "deleteprogramcalendar.php?idprograms="+idprog;
   }
} 
</script>
<body onload='hidealtera();'>
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
				<td width="80%" valign="top" >
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr><td colspan="4" class="heading_new">Program Calendar</td></tr>
				<tr>
				<td>
				

 <form action="" method="POST" id="myForm" name="myform">
<table height="20%"  width="100%">
 <tr><td><img src="images/pixeltransparent.png" width="1" height="10" /></td></tr>
 <tr><td align="right">
<a href="addprogramcalendar.php" class="blueButton">Add Calendar</a></td></tr>
<tr><td>
          
<table width="100%">
<tr>
  <td><input type="radio" name="programtype" id="programtype" value="1" onclick="funradio(this.value)"  checked="checked" >RV-VLSI
										<input type="radio" name="programtype" id="programtype1" value="0" onclick="funradio(this.value)">ALTERA</td>
</tr>
<tr>
<td id='rvvlsi' style="width:100%">

            

                 <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
				   <tr class="gridheader">
					   <td width="100%">Course Name</td>
					   <td nowrap="nowrap">Start Month/Week</td>
					   <td nowrap="nowrap">End Month/Week</td>
					   <td></td>
				  </tr>
				  <?php
for($s=0;$s<count($arraStudent);$s++){
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
?>

<tr class="<?php echo $row_color?>">
<td><?php if($arraStudent[$s]['active'] == 1) 
						{ ?>
						  <img src="../images/icon_green.png" border="0" hspace="4"  align="absmiddle"/>
				   <?php } else {?>
				   
						  <img src="../images/icon_red.png" border="0" hspace="4"  align="absmiddle"/>
						  <?php }?><a href="editprogramcalendar.php?idprogramcalendar=<?php echo $arraStudent[$s]['idprogramcalendar']?>"> <?php echo $arraStudent[$s]['Title'];?></a></td>
<td><?php echo $arraStudent[$s]['startmonth'].' '.$arraStudent[$s]['startweek'];?></td>
<td><?php echo $arraStudent[$s]['endmonth'].' '.$arraStudent[$s]['endweek'];?></td>
<td><!--<a href="deleteprogramcalendar.php?idprograms=<?php echo $arraStudent[$s]['idprogramcalendar']?>"><img src="../images/icon_delete.png" border="0" alt="Delete" align="right"/></a>-->

<a onclick="deletemanageprogcalendar(<?php echo $arraStudent[$s]['idprogramcalendar']?>)"><img src="../images/icon_delete.png" border="0" alt="Delete" align="right"/></a>

</td>
</tr>
<?php
}
?>
		
			</table>
			</td>
			<td id='altera'>

            

                <table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridborder">
				   <tr class="gridheader">
					   <td width="100%">Course Name</td>
					   <td nowrap="nowrap">Start Date</td>
					   <td nowrap="nowrap">End Date</td>
					   <td></td>
				  </tr>
				  <?php
for($s=0;$s<count($altera);$s++){
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
?>

<tr class="<?php echo $row_color?>">
<td><?php if($altera[$s]['active'] == 1) 
						{ ?>
						  <img src="../images/icon_green.png" border="0" hspace="4"  align="absmiddle"/>
				   <?php } else {?>
				   
						  <img src="../images/icon_red.png" border="0" hspace="4"  align="absmiddle"/>
						  <?php }?><a href="editprogramcalendar.php?idprogramcalendar=<?php echo $altera[$s]['idprogramcalendar']?>"> <?php echo $altera[$s]['Title'];?></a></td>
<td nowrap="nowrap"><?php echo $altera[$s]['startdate'];?></td>
<td nowrap="nowrap"><?php echo $altera[$s]['enddate'];?></td>
<td><a onclick="deletemanageprogcalendar(<?php echo $altera[$s]['idprogramcalendar']?>)"><img src="../images/icon_delete.png" border="0" alt="Delete" align="right"/></a></td>

</tr>
<?php
}
?>
		
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




			
 </div>                  
</body>
</html>