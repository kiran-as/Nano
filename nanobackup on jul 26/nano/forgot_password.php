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
   $email = $_POST['email'];
   if (!isset($_POST['email'])) 
   {
 
}
elseif (empty($email)) 
{    
        $error = '2';
}
else 
{
        $email = mysql_real_escape_string($email);
        $status = "OK";
 
        //error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
        if (!stristr($email,"@") OR !stristr($email,".")) 
		{
		
                $error = '3'; 
				
                $status = "NOTOK";
        }
 
        if($status == "OK")
		{

  
                $query = "SELECT r_user_name FROM $rec_table WHERE r_email  = '$email'";
                $pass = mysql_query($query) or die(mysql_error());
                //$row = mysql_fetch_object($pass);
                $count = mysql_num_rows($pass);
				echo $count;
				die;
                // email is stored to a variable 
                if ($count == 0) 
				{ 
                        $error = '1';
                }
                
                function makeRandomPassword() {           
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
				
                
                $from = "rv-vlsi.com <info@rv-vlsi.com>";                  
                $subject = "Your password for rv-vlsi.com";     
                $message = "Your Password has been changed.          
                
                New Password: $random_password          
                
               $server_url/login.php    
                Once logged in you can change your password          
                
                Thank you
                
                RV-VlSI Team          
                
                This is an automated response, please do not reply!";
                                  
                mail($email, $subject, $message, $from);
                mysql_free_result($pass);
                header("Location:index.php");
				}
				  else {
                $error = '4';   
        }
}
  


   
 ?>
  <script>
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
</head>

<body>
<div class="main_div">
<? include "includes/header.php" ?>

<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />
</div><!--end of main_banner-->
<div class="main_content">


<div class="stmenuright_maincontent">

<div class="rightimg_top">
<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Forgot Password</h3>
</div>
<div class="rightimg_right">
</div>
</div><!--end of rightimg_top-->
 <div class="stmenurightinner_content_inner"  style="margin-bottom:-13px;">
  <table width="100%">

  <p class="right_content_style">
 <tr><Td>
	<?=$input->formStart('Form','','');?>

                       
                        <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                
                       
                       <table width="100%" cellpadding="3" cellspacing="0" class="recruit_menu_bg" style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">
                       <tr>
                           <td colspan="2" >  
                      <b>Recover a forgotten password!</b></td>
                         </tr>
                         <tr>
                           <td colspan="2" >  <div id="Error1" class="errorDisplay" align="center" style="display:none; color:#FF0000">
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
                         <tr>
    
    
	
                                <td>Email:</td>
                                <td><input type="text" name="email" id="email" size="30"/></td>
								</tr>
								<tr>
								<td>&nbsp;</td>
                                <td align="left" style="padding-left:60px;"><input type="submit" value="Submit" class="button"/></td>
                            </tr>
</table>
  </form>

  </Td>
  </tr>   
  </table>
  
</div>
</div><!--end of right_maincontent-->


<?php include "stmenuleft_content.php" ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>