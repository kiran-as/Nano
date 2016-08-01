<?  include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
 //include_once('config/header.php');
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   
 if(isset($_POST['FrgtEmail']))
   {
		$email = $_POST['FrgtEmail'];
		if(isset($_POST['FrgtEmail']))
		{
			$query = "SELECT r_user_name FROM $rec_table WHERE r_email  = '$email'";
			$pass = mysql_query($query) or die(mysql_error());
			$count = mysql_num_rows($pass);
			if($count == 0) 
			{ 
			$reset ="Your email does not exist in our database";
			}
			else
			{
				function makeRandomPassword() 
					{           
					$word = "abchefghjkmnpqrstuvwxyz0123456789";           
					srand((double)microtime()*1000000);            
					$i = 0;           
					while ($i <= 7) {                 
					$num = rand() % 33;                 
					$tmp = substr($word, $num, 1);                 
					$pass = $pass . $tmp;                 
					$i++;           
					}           
					return $pass;     
					}
					$random_password = makeRandomPassword();     
					$db_password = md5($random_password);          
					$sql = "UPDATE $rec_table SET r_password= '$db_password' WHERE r_email= '$email'";
					mysql_query($sql);
					$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers =  "From: \"Nanochipsolutions.com\" <auto-reply@$host>\r\n" ;               
					$subject = "Your password for Nanochipsolutions.com";     
					$message = "Your Password has been changed.          
					
					New Password: $random_password          
					
					 www.nanochipsolutions.com/recruiter_login.php  
					Once logged in you can change your password          
					
					Thank you
					
					Nanochipsolutions.com Team          
					
					This is an automated response, please do not reply!";
									  
					mail($email, $subject, $message, $headers);
					mysql_free_result($pass);
					$reset="Sent new Password to your EmailId";
			}
		}
	}
   
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<meta name="keywords" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<title>ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company</title>

<link rel="stylesheet" href="css/styleupdated1.css" type="text/css" media="screen" />
<link href="css/recruiter-styles.css" rel="stylesheet">

<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
 <script type="text/javascript" src="lib/jquery.js"></script>
<script type='text/javascript' src='lib/jquery.autocomplete.js'></script>
<script type='text/javascript' src='lib/localdata.js'></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
  <link type="text/css" rel="stylesheet" href="calender/dhtmlgoodies_calendar.css" media="screen"/></link>
<script src="calender/dhtmlgoodies_calendar.js" type="text/javascript"></script>
<link href="css/ajaxtabs.css" rel="stylesheet" type="text/css" />
<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
<script type="text/javascript">
function checkError(form){
        var error = '<?php echo $error; ?>';
        switch (error){
                case '1':
                        document.getElementById("Error1").style.display = "";
                        break;
                case '2':
                        document.getElementById("Error2").style.display = "";
                        break;
                case '3':
                        document.getElementById("Error3").style.display = "";
                        break;
                case '4':
                        document.getElementById("Error4").style.display = "";
                        break;
        }
}
</script>
</head>
<body>
<div class="container">
<div class="dashboard">
<div id="table">
<div id="row" class="header">
<div id="globalfirstcell"><a href="index.php"><img src="images/logonanao.jpg"></a>
<div class="floatright"><a href="index.php">Home</a> 
<br>

</div>
</div>
</div>
<div class="dashboard">

<div id="row">

	
		
	</div>
	</div>
	</div>
<div id="row" class="dashboard">
<div class="row">
<form  name="frmSample" method="post" action="#" onSubmit="return ValidateForm()">
	<table>
 <tr>
  
 <td colspan="2">Please enter your registered email id below. Your password will be reset and emailed to you.</td>
  </tr>    
  
   <tr>
    
    <td width="225"  height="19" align="left">
    <input type="text" name="FrgtEmail" id="FrgtEmail" /></td>
    <td width="196" align="left">
    <input type="submit" name="FrgtSubmit" value="Submit" class="blueButton"/>
   </td>
   </tr>
   <tr>
 <td height="15" colspan="2" style="color:#F00;"><strong><? if(isset($reset)) echo $reset; ?></strong> </td>
  </tr></table>
   
</form>
</div>
</div>
<div class="footer">Copyrights @ 2012 Nanochipsolutions</div>
</div>
</body>
</html>