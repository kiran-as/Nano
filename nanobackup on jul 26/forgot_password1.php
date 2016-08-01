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
   
   if(isset($_POST['forgotpwd']))
   {
		$email = $_POST['email'];
		if(!isset($_POST['email'])) 
		{
		}
		elseif (empty($email)) 
		{    
		$error = '2';
		}
		elseif(isset($_POST['email']))
		{
			$query = "SELECT m_fname FROM $members_table WHERE m_emailid  = '$email'";
			$pass = mysql_query($query) or die(mysql_error());
			$count = mysql_num_rows($pass);
			if($count == 0) 
			{ 
			$error = '1';
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
					$url = 'http://www.nanochipsolutions.com/recruiter_login.php';
				$random_password = makeRandomPassword();     
                $db_password = md5($random_password);          
                $sql = "UPDATE $members_table SET m_password= '$db_password' WHERE m_emailid= '$email'";
				
                $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers =  "From: \"Nanochipsolutions.com\" <auto-reply@$host>\r\n" ;
                $from = "Nanochip Solutions Forgot Password<auto-reply@$host>";                  
                $subject = "Your password for Nanochipsolutions.com";     
                $message = "Your Password has been changed.          
                
                New Password: $random_password          
                
                <a href='www.nanochipsolutions.com/recruiter_login.php'>nanochipsolutions.com/recruiter_login</a>  
                Once logged in you can change your password          
                
                Thank you
                
                Nanochip Solutions Team          
                
                This is an automated response, please do not reply!";
                                  
                mail($email, $subject, $message,$headers);
				mysql_query($sql);
                mysql_free_result($pass);
				$msg="Sent new Password to your EmailId";
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
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
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

<<body>
<div class="container">
<div class="dashboard">
<div id="table">
<div id="row" class="header">
<div id="globalfirstcell"><a href="index.php"><img src="images/logonanao.jpg"></a></div>
<div class="floatright"> Welcome <?php echo $_SESSION["r_user_name"];?> | <a href="recruiter_logout.php">Logout</a> 
<br><br>
<a href="dashboard.php">Dashboard</a> | <a href="recruiteredit.php">Edit Profile</a>
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
	<?=$input->formStart('Form','','');?>

                       
                        <form method="post" action="<?=$_SERVER['PHP_SELF']?>" >
                
                       
                       <table width="100%" style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">
                           <tr>
                           
                           <td colspan="3"> <div  class="errorDisplay" align="center" style="color:#FF0000">
                                                        <strong><?=$msg?></strong><br />
                                        
                           
                                                </div></td></tr>
                         <tr>
                           <td colspan="3" >  <div id="Error1" class="errorDisplay" align="center" style="display:none; color:#FF0000">
                                                        <strong>INCORRECT EMAIL</strong><br />
                                                        The email address you've provided do not match our records.<br />
                                                        <strong>Please Try Again!</strong>
                                                </div>
                        <div id="Error2" class="errorDisplay" align="center" style="display:none; color:#FF0000">
                            <strong>PLEASE ENTER THE REQUIRED INFORMATION</strong><br />
                            Please type your email to recieve your new password!<br />
                                                </div>
                        <div id="Error3" class="errorDisplay" align="center" style="display:none; color:#FF0000">
                            <strong>EMAIL ADDRESS HAS INCORRECT FORMAT</strong><br />
                            Please try again!<br />
                                                </div>
                        <div id="Error4" class="errorDisplay" align="center" style="display:none; color:#FF0000">
                            <strong>SENDING ERROR</strong><br />
                            Please try again!<br />
                                                </div> 
												<script>checkError();</script></td>
                         </tr>
                         <tr><td></td></tr>
                         <tr>
                         <td width="23%">&nbsp;</td>
                                    <td width="9%">Email:</td>
                                <td width="68%" height="22px"><input type="text" name="email" id="email" size="30" style="width:200px; height:24px; border:1px solid #bebebe; background-image:url(images/textbgshade.png); background-repeat:repeat-x; background-position:bottom;"/></td>
								</tr>
								<tr>
								<td>&nbsp;</td>
                                <td align="left"  colspan="2" style="padding-left:110px;"><input type="submit" name="forgotpwd" value="" style="background-image:url(images/submitbg_new.png); margin-top:5px; background-repeat:no-repeat; width:73px; height:23px; border:none;" /></td>
                            </tr>
</table>
  </form>

 </div>
</div>
<div class="footer">Copyrights © 2012 Nanochipsolutions</div>
</div>
</body>
</html>
