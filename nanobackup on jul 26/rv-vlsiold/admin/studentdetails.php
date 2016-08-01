<?php include_once('../db/dbconfig.php');

session_start();


$resultccc	="Select *  from tbl_studentdetailsinformation where idstudentdetailsinformation=".$_GET['idstudentdetailsinformation'];

$result = mysql_query($resultccc);
while ($row = mysql_fetch_assoc($result)) {
           
   $idstudentdetailsinformation = $row['idstudentdetailsinformation'];
   $StudentName = $row['StudentName'];
   $StudentEmail = $row['StudentEmail'];   
   $StudentPhone = $row['StudentPhone'];
   $Question1 = $row['Question1'];
   $Answer1 = $row['Answer1'];
   $Question2 = $row['Question2'];
   $Answer2 = $row['Answer2'];
   $Question3 = $row['Question3'];
   $Answer3 = $row['Answer3'];
   $Question4 = $row['Question4'];
   $Answer4 = $row['Answer4'];
   $Question5 = $row['Question5'];
   $Answer5 = $row['Answer5'];
   $Result = $row['Result'];
   if($Result=='Courses')
   {
     $Result = '--';
   }

  }
  

 
?>


<html>
<head>
<script language="javascript" type="text/javascript" src="javascript/validation.js"></script>
<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/styleupdated.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/lytebox.css" type="text/css" media="screen" />
</head>

<script type="text/javascript">

function fnclose()
{
  parent.location="admin_manage_enquires.php";
}
</script>


<body>
 <form action="" method="POST" id="myForm" name="myform" onSubmit="return validatedoctors();">
 <table width="100%"  cellpadding="4" cellspacing="10" border="0" class="">
 
 <tr>
        <td colspan="2" class="popupheader">
		 <table width="100%" border="0" cellspacing="0" cellpadding="1">
         <tr>
          <td nowrap="nowrap">Student Information</td>
         <td width="100%" align="right"><img src="../images/close.gif" align="absmiddle" onClick="fnclose();" style="cursor:pointer"></td>
      </tr>
  </table>
  </td>
  </tr>
  
		<tr><td>
		    <table border="1" cellspacing="1" cellpadding="3" width="100%" class="">
		<tr class="alternaterowcolor1'">
			<td nowrap="nowrap">Student Name</td>
			<td><?php echo $StudentName?></td>
		</tr>
		
		<tr class="alternaterowcolor'">
			<td nowrap="nowrap">Student Phone</td>
			<td><?php echo $StudentPhone;?></td>
		</tr>
		
		<tr class="alternaterowcolor1'">
			<td nowrap="nowrap">Student Email</td>
			<td><?php echo $StudentEmail;?></td>
		</tr>
		
		<tr class="alternaterowcolor'">
			<td><?php echo $Question1;?></td>
			<td><?php echo $Answer1;?></td>
		</tr>
		
		<tr class="alternaterowcolor1'">
			<td nowrap="nowrap"><?php echo $Question2;?></td>
			<td><?php echo $Answer2;?></td>
		</tr>
		
		<tr class="alternaterowcolor'">
			<td nowrap="nowrap"><?php echo $Question3;?></td>
			<td><?php echo $Answer3;?></td>
		</tr>
		
		<tr class="alternaterowcolor1'">
			<td nowrap="nowrap"><?php echo $Question4;?></td>
			<td><?php echo $Answer4;?></td>
		</tr>
		
		<tr class="alternaterowcolor'">
			<td nowrap="nowrap"><?php echo $Question5;?></td>
			<td><?php echo $Answer5;?></td>
        </tr>

		<tr class="alternaterowcolor'">
			<td nowrap="nowrap">Courses Offered</td>
			<td><?php echo $Result;?></td>
		</tr>

		</table>
		
		
		</td></tr>
      <tr> <td align="right">
	  <input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td></tr>
					
  </table>
  </form>
</body>
</html>