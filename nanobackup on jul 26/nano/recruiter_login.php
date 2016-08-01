<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
    
   if(!empty($_SESSION['r_id']))
   header("Location:candidate_details.php");


   if(isset($_POST['FrgtEmail']))
   {
	  $email = $_POST['FrgtEmail'];
	   
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
				//echo $count;
				//die;
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
			  mysql_query($sql);
				
                
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
				$reset="Sent new Password to your EmailId";
                //header("Location:recruiter_login.php");
				}
				  else {
                $error = '4';   
        }

   }

	 if(isset($_POST[loginSubmit]))
	 {
	 $pwd=$_POST['txtPassword'];
    $login_query = "SELECT * FROM $rec_table where r_email='".$_POST[txtEmailId]."'";
  // echo $login_query;die;
  
			$login_result=$db->getResults($login_query);
			//echo count($login_result);die;
			
			//echo $login_result[0]->r_password;
		//echo md5($_POST[txtPassword]);die;
 if($login_result[0]->r_password==md5($pwd))
			{
			if($login_result[0]->r_approve=='1')
			
			{ 
			
			$userId = $login_result[0]->r_id;	
			$username=$login_result[0]->r_user_name;			
			$_SESSION['username'] = $username;
			$_SESSION['r_id'] = $userId; 
			echo "<script>document.location.href='candidate_details.php'</script>";
		 //   header("Location: student_menu.php");
		    }
	
	        else 
	          {
	             echo "<script>document.location.href='recruiter_login.php?msg=7'</script>";
		           //header("Location: recruiter_login.php?msg=4");
	          }
	   
	}
	  
 else
 {
 echo "<script>document.location.href='recruiter_login.php?msg=4'</script>";
 //header("Location: login.php?msg=4");
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
<script language = "Javascript">
/**
 * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */

function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}

function ValidateForm(){
	var emailID=document.frmSample.FrgtEmail
	
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please Enter your Email ID")
		emailID.focus()
		return false
	}
	if (echeck(emailID.value)==false){
		emailID.value=""
		emailID.focus()
		return false
	}
	return true
 }
</script>
</head>

<body>
<div class="main_div">
<? include "includes/header.php" ?>

<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />
</div><!--end of main_banner-->
<div class="main_content">


<div class="stmenuright_maincontent">

<div class="rightimg_top" style="width:980px;">
<div class="rightimg_left">
</div>
<div class="rightimg_mid" style="width:960px;">
<h3 class="h3class">Recruiter Login</h3>
</div>
<div class="rightimg_right">
</div>
</div><!--end of rightimg_top-->
 <div class="rightinner_content_inner" style="width:980px; padding:10px;">
  <div style="float:left; width:420px; height:160px;border-right:2px dotted #000;">
	<?=$input->formStart('LoginForm','','onSubmit="return loginValidations();"');?>
	<table width="100%">    
	<tr>
	  <td height="25" colspan="3"  class="text"><strong>Already Member? Login here.. </strong></td>
	  <td>&nbsp;</td>
	  </tr>
	  <? if($_REQUEST[msg]!=''){?>
	  <tr>
      <td height="25" class="error" align="center">&nbsp;</td>
	  <td colspan="2"><span class="error">
	    <?=messaging($_REQUEST[msg])?>
	  </span></td>
	  <td width="23" align="right" style="padding-right:20px;">&nbsp;</td>
	  </tr>
	  <? }?>
	<tr>  
<td width="18" height="25"  class="text">&nbsp;</td>
<td width="129"><span class="text">Email ID : </span></td>
<td width="230"  height="25"><?=$input->textBox('txtEmailId','','text','style=width:200px;','');?></td>
<td><span class="error">*</span></td>
</tr>
 
 <tr>
 <td width="18" height="25"  class="text">&nbsp;</td>
 <td width="129"><span class="text">Password :</span></td>
 <td  height="25"><?=$input->password('txtPassword','','text','style=width:200px;','');?></td>
  
  <td><span class="error">*</span></td>
  </tr>    
  
   <tr>
    
    <td  height="19" width="18">&nbsp;</td>
    
    <td width="129">&nbsp;</td>
    <td  height="19" colspan="2" align="left">
	    <input  type="submit" class="button" value="Login" name="loginSubmit" />
		<input  type="Reset" class="button" value="Reset" name="Reset" />   </td>
    </tr><!--
      <tr>
    
    <td  height="19" width="228">&nbsp;</td>
    
    <td width="185">&nbsp;</td>
    <td  height="19" colspan="2" style="padding-left:10px;"><a href="recruiters_registration.php" class="text10red" style="text-decoration:underline;">Registration</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="recruiter_forgot_password.php" class="text10red" style="text-decoration:underline;">Forgot Password</a></td>
   </tr>
   </tr>-->
</table>
  </form></div><div style="float:left;  padding-left:30px;">
 
  <table>


<form  name="frmSample" method="post" action="#" onSubmit="return ValidateForm()">
	
	<tr>
      <td colspan="2" align="right" style="padding-right:20px;"><div align="right"><span class="error">* Indicates essential field</span></div></td>
    </tr>
    
	<tr>
	  <td height="25" colspan="2"><strong>New User <a href="recruiters_registration.php">Register</a> here </strong></td>
	  </tr>
	<tr>  
<td height="25" colspan="2"><strong>Forgotten your Password ? </strong></td>
</tr>
  
 
 <tr>
 <td height="25" colspan="2"><span style="color:#000; font-size:10px;">Please enter your Email ID below than we will reset your password and will mail you.</span> </td>
  </tr>    
  
   <tr>
    
    <td width="257"  height="19" align="left"><input type="text" name="FrgtEmail" id="FrgtEmail" maxlength="255" style="width:230px;"  />&nbsp;<span class="error">*</span></td>
    <td width="201" align="left"><input  type="submit" class="button" value="Submit" name="FrgtSubmit" /></td>
   </tr>
   <tr>
 <td height="25" colspan="2" style="color:#F00;"><strong><? if(isset($reset)) echo $reset; ?></strong> </td>
  </tr><!--
      <tr>
    
    <td  height="19" width="228">&nbsp;</td>
    
    <td width="185">&nbsp;</td>
    <td  height="19" colspan="2" style="padding-left:10px;"><a href="recruiters_registration.php" class="text10red" style="text-decoration:underline;">Registration</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="recruiter_forgot_password.php" class="text10red" style="text-decoration:underline;">Forgot Password</a></td>
   </tr>
   </tr>-->
   </form>
</table>


  </div></Td></tr> </table></p>
</div>
</div><!--end of right_maincontent-->
<?php //include "stmenuleft_content.php" ?>
</div><!--end of main_content-->

<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>