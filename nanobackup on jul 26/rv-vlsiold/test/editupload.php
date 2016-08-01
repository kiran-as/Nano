<script language="javascript" type="text/javascript" src="../javascript/validation.js"></script>
<link rel="stylesheet" href="../css/styleupdated.css" type="text/css" media="screen" />

<link rel="stylesheet" href="../css/lytebox.css" type="text/css" media="screen" />
</head>
<script type="text/javascript">
function fnclose()
{
  parent.location="http://www.rv-vlsi.com/rvvlsi/editmailcontent.php";
}

</script>

 <table width="100%"  cellpadding="4" cellspacing="10" border="0" class="resuemviewtableborder">
 
 <tr>
 <form action="editupload_ac.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <td colspan="2" class="popupheader">
		 <table width="100%" border="0" cellspacing="0" cellpadding="1">
         <tr>
          <td nowrap="nowrap">Upload Image</td>
         <td width="100%" align="right"><img src="../images/close.gif" align="absmiddle" onClick="fnclose();" style="cursor:pointer"></td>
      </tr>
  </table>
  </td>
  </tr>
  
		<tr><td>
		<table cellpadding="0" cellspacing="0" border="0" class=""><tr>

<tr>
<td>Select file
<input name="ufile" type="file" id="ufile" size="50" /></td>
</tr>
<tr><td>
Filetypes to be uploaded : JPEG,JPG,GIF,PNG <br/>
The Maximum width of the File:850px.
</td></tr>
<tr><td><img src="../images/pixeltransparent.png" width="200" height="10" ></td></tr>
      <tr> <td align="right">
	  <input type="submit" name="Submit" value="Upload" class="bluebutton"/>
	  <input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td></tr>
	</form>				
  </table>
  
  
<!--<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form action="upload_ac.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="100%" align="right"><img src="../images/close.gif" align="absmiddle" onClick="fnclose();" style="cursor:pointer"></td>
      </tr>
<tr>
<td><strong>Single File Upload </strong></td>
</tr>
<tr>
<td>Select file
<input name="ufile" type="file" id="ufile" size="50" /></td>
</tr>
<tr>
<td align="center"><input type="submit" name="Submit" value="Upload" class="bluebutton"/></td>
</tr>

</table>-->
</td>
</form>
</tr>



</table>