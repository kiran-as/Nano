<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

 $check=new checkingAuth();
   $check->loginCheck();   

	
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   ?>
  <script type="text/javascript">

	$(function() {
		$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				}
			}
		});
	});
	</script>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr><td><a href="index.php"><img src="images/Nanologo.jpg" width="212" height="80" border="0"  /></a></td>
 <td valign="top" align="right">
 <table cellpadding="0" cellspacing="0" border="0">
 <tr><td align="right"><strong>Welcome &nbsp;<?=ucfirst($_SESSION['username']);?></strong></td></tr>
 <tr><td style="padding-top:15px;"><table  cellpadding="3" cellspacing="3" border="0"  id="resumebuildertopnav">
<tr>
<td><a href="personal_info.php"><img src="images/content_arrow.jpg" width="9" height="9" border="0" hspace="4" />Edit Resume</a></td>
<td><a href="resume.php"><img  src="images/content_arrow.jpg" width="9" height="9" border="0" hspace="4" />View Resume</a></td>
<!--<td><a href="change_password.php"><img  src="images/content_arrow.jpg" width="9" height="9" border="0" hspace="4"  />Change Password</a></td>
--><td><a href="logout.php"><img  src="images/content_arrow.jpg" width="9" height="9" border="0" hspace="4" />Logout</a></td>
</tr>
</table></td></tr>
 </table>
 
 </td></tr>

</table>

