<?php 
?>


<html>
<head>
<script language="javascript" type="text/javascript" src="javascript/validation.js"></script>
<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />

<link rel="stylesheet" href="css/lytebox.css" type="text/css" media="screen" />
</head>

<script type="text/javascript">


function fnclose()
{
  parent.location="checkingdisplaycourses.php";
}
</script>


<body>
 <form action="" method="POST" id="myForm" name="myform" onSubmit="return validatedoctors();">
 <table width="100%"  cellpadding="4" cellspacing="10" border="0" class="resuemviewtableborder">
 
 <tr>
        <td colspan="2" class="popupheader">
		 <table width="100%" border="0" cellspacing="0" cellpadding="1">
         <tr>
          <td nowrap="nowrap">Information</td>
         <td width="100%" align="right"><img src="images/close.gif" align="absmiddle" onClick="fnclose();" style="cursor:pointer"></td>
      </tr>
  </table>
  </td>
  </tr>
  
		<tr><td>
		<table cellpadding="0" cellspacing="0" border="0" class="resumeviewinfo"><tr>
			<td><img src="images/iocn_information.png"></td>
			<td>mail has been sent to the recruiter</td>
			
		</tr></table>
		
		
		</td></tr>
      <tr> <td align="right">
	  <input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td></tr>
					
  </table>
  </form>
</body>
</html>