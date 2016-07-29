<? 
   include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   if(!empty($_SESSION['m_id']))
   header("Location:student_menu.php");
   
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
				$random_password = makeRandomPassword();     
                $db_password = md5($random_password);          
                $sql = "UPDATE $members_table SET m_password= '$db_password' WHERE m_emailid= '$email'";
				
                $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers =  "From: \"Nanochipsolutions.com\" <auto-reply@$host>\r\n" ;
                $from = "Nanochip Solutions Forgot Password<auto-reply@$host>";                  
                $subject = "Your password for Nanochipsolutions.com";     
                $message = "Your Password has been changed.          
                
                New Password: $random_password          
                
                $server_url/job_seeker_login.php
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

	 if(isset($_POST[loginSubmit]))
	 {
 			
            $pwd=$_POST['txtPassword'];
            $login_query = "SELECT * FROM $members_table where m_emailid='".$_POST[txtEmailId]."' ";
	//echo $login_query;die;

   			$login_result=$db->getResults($login_query);
				//echo md5($pwd)."<br/>";
			//	echo $login_result[0]->m_password;
	    	if($login_result[0]->m_password==md5($pwd))
				{ //echo "i am in ";//die;
				
  				if($login_result[0]->m_approve=='1')
					   {
					 $useremail = $login_result[0]->m_emailid;
					$userId = $login_result[0]->m_id;	
					$username=$login_result[0]->m_fname.'&nbsp;'.$login_result[0]->m_lname;			
					$user=$login_result[0]->m_fname;
					$_SESSION['user'] = $user;
					$_SESSION['username'] = $username;
					$_SESSION['m_id'] = $userId; 
					$_SESSION['m_emailid'] = $useremail;
					echo "<script>document.location.href='1_personal_info.php'</script>";
				 //   header("Location: student_menu.php");
						}
					else
						{
					echo "<script>document.location.href='1_job_seeker_login.php?msg=8'</script>";		
						}
		  		 }
			else
			   {
				echo "<script>document.location.href='1_job_seeker_login.php?msg=4'</script>";
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
<!--<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
 <script type="text/javascript" src="lib/jquery.js"></script>
<script type='text/javascript' src='lib/jquery.autocomplete.js'></script>
<script type='text/javascript' src='lib/localdata.js'></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
--><link href="rv_main.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />

<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
<!--<script src="js/ajax.js" type="text/javascript"></script>-->
	 

			<script type="text/javascript" src="jquery_tabs/js/jquery-1.5.1.min.js"></script>

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
<style>


#fade { /*--Transparent background layer--*/
	display: none; /*--hidden by default--*/
	background: #000;
	position: fixed; left: 0; top: 0;
	width: 100%; height: 100%;
	opacity: .80;
	z-index: 9999;
}
.popup_block{
	display: none; /*--hidden by default--*/
	background: #fff;
	padding: 20px;
	border: 20px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	/*--CSS3 Box Shadows--*/
	-webkit-box-shadow: 0px 0px 20px #000;
	-moz-box-shadow: 0px 0px 20px #000;
	box-shadow: 0px 0px 20px #000;
	/*--CSS3 Rounded Corners--*/
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}
img.btn_close {
	float: right;
	margin: -55px -55px 0 0;
}
/*--Making IE6 Understand Fixed Positioning--*/
*html #fade {
	position: absolute;
}
*html .popup_block {
	position: absolute;
}
</style>
<style type="text/css">

.recruitleftbg_n
{
	float:left;
	background-image:url(images/blue_bgleft.png);
	background-repeat:no-repeat;
	width:6px;
	height:8px;
}
.recruiter_loginmidbg_n
{
	float:left;
	background-image:url(images/blue_bgmid.png);
	background-repeat:repeat-x;
	width:440px;
	height:8px;
}
.recruitrightbg_n
{
	float:left;
	background-image:url(images/blue_bgright.png);
	background-repeat:no-repeat;
	width:6px;
	height:8px;
}
.recruitleftbtbg_n
{
	float:left;
	background-image:url(images/blue_bgleft-b.png);
	background-repeat:no-repeat;
	width:6px;
	height:8px;
}
.recruiter_loginmidbtbg_n
{
	float:left;
	background-image:url(images/blue_bgmid-b.png);
	background-repeat:repeat-x;
	width:440px;
	height:8px;
}
.recruitrightbtbg_n
{
	float:left;
	background-image:url(images/blue_bgright-b.png);
	background-repeat:no-repeat;
	width:6px;
	height:8px;
}
</style>
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
<!--<div class="rightimg_left">
</div>
<div class="rightimg_mid" style="width:960px;">
<h3 class="h3class">Recruiter Login</h3>
</div>
<div class="rightimg_right">
</div>-->
</div><!--end of rightimg_top-->
<div class="recruiterinner_content">

 <div style="float:left; width:450px; margin:0px 20px;">
 <div class="recruiter_login_bg">
 <div class="recruitleftbg_n"></div>
 <div class="recruiter_loginmidbg_n"></div>
 <div class="recruitrightbg_n"></div>
 </div>
 
 <div style="float:left; width:450px; background-color:#dfeffb; border-left:1px solid #cfcfcf; border-right:1px solid #cfcfcf;">
   	  <div style="float:left; width:450px;">
	<table width="100%" >
  <h3 align="left" style="color:#114981;font-size:16px;font-weight:bold;margin:0px;padding-left:10px;">Job Seeker Login</h3>
<?=$input->formStart('LoginForm','','onSubmit="return loginValidations();"');?>
  <table width="100%" border="0"  align="center" >   
      <tr>
      <td width="300">&nbsp;</td>
          <td colspan="4" align="right">
         <span class="error" colspan="3" style="padding-right:20px;">* Indicates required field</span></td>
      </tr>
<tr><td colspan="5" class="error" align="center" style="padding-left:100px;"><?=messaging($_REQUEST[msg]);?></td>
</tr>
<tr> <td>&nbsp; </td></tr>
<td width="100">&nbsp;</td>
<td><span class="text">Email ID : </span></td>
<td  height="23" colspan="2">
<input type="text" name="txtEmailId" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/textbgnew.png); background-repeat:repeat-x;"/>
<?php /*?><?=$input->textBox('txtEmailId','','text','style=width:200px;','');?> <?php */?>  </td>
<td width="297"><span class="error">&nbsp;&nbsp;*</span></td>
</tr>

 <tr>
<td width="100">&nbsp;</td>
 <td width="100"><span class="text">Password :</span></td>
 <td  height="22"  colspan="2">
 <input type="password" name="txtPassword" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/textbgnew.png); background-repeat:repeat-x;"/>
 <?php /*?><?= $input->password('txtPassword','','text','style=width:200px;','');?><?php */?>   </td>
 <td><span class="error">&nbsp;&nbsp;*</span></td>
  </tr>    
  
   <tr>
    
    <td  height="19" width="136">&nbsp;</td>
    <td  height="19" colspan="3" align="center" style="padding-left:60px;">
    <!--<input type = "image" src="images/login.png" name="loginSubmit" value ="login" >-->
	   
    <input  type="submit" value="" name="loginSubmit" width="75px" height="25px" style="background-image:url(images/loginbg_new.png); margin-top:10px; background-repeat:no-repeat; width:73px; height:23px; border:none;" />

         <!--     <input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>-->
           </td>
   </tr>
      <tr>
    <td  height="19" width="136">&nbsp;</td>
    <td  height="19" colspan="3" align="left" style="padding-left:30px;"><a href="student_registration.php" class="mail_text">Register as Jobseeker</a>&nbsp;&nbsp;
    <a href="forgot_password.php" class="mail_text">Forgot Password</a>
   </td>
   </tr>
</table>
  </form></Td></tr> </table></div>  </div>
  <div class="recruiter_login_bg">
 <div class="recruitleftbtbg_n"></div>
 <div class="recruiter_loginmidbtbg_n"></div>
 <div class="recruitrightbtbg_n"></div>
 </div>
  </div>
  
  <div style="float:left; width:450px; margin:0px 10px;">
 <div class="recruiter_login_bg">
 <div class="recruitleftbg_n"></div>
 <div class="recruiter_loginmidbg_n"></div>
 <div class="recruitrightbg_n"></div>
 </div>
 
  <div style="float:left; width:450px; background-color:#dfeffb; border-left:1px solid #cfcfcf; border-right:1px solid #cfcfcf;">
   	  <div style="float:left; width:430px; height:155px; padding:10px; font-family:calibri;">
<span style="font-size:14px;">Want a Job in VLSI and Embedded Companies? Register now for FREE!</span>
  <ul style="list-style:circle; "><li>Nation’s First Job Portal Exclusively catering to VLSI and Embedded Industry</li><li>With exclusivity to Semiconductor Industry your resume is not lost among millions of resumes as in other job portals</li><li>Build Industry Standard resumes for FREE in 5 easy steps</li><li>Promote your resume to Top MNCs in Semiconductor domain</li><li>Check your <a href="#?w=500" rel="popup_name" class="poplight" style="color:#114981;">Employability Factor</a> for FREE upon registration</li></ul> </div>
  </div>
  <div class="recruiter_login_bg">
 <div class="recruitleftbtbg_n"></div>
 <div class="recruiter_loginmidbtbg_n"></div>
 <div class="recruitrightbtbg_n"></div>
 </div>
  </div>
  
</div>
 
</div><!--end of right_maincontent-->
<?php //include "stmenuleft_content.php" ?>
</div><!--end of main_content-->
<div id="popup_name" class="popup_block">
<span style="font-size:18px; font-weight:bold;">Employability Factor</span>
 <p><strong>Employability Factor </strong> refers to a person’s capability of gaining initial employment or finding new employment in the industry of his interests. It’s a good reflection of what value the employer seeks in your skills that will make you productive to the company.</p><p>The Nanochip resume builder has been integrated with an intelligent calculator of Employability Factor that best reflects your chances of being selected by Semiconductor companies for interviews and eventually being absorbed by them. It is suggested that an employability factor above 70 points will give you a high probability of being absorbed into the VLSI and Embedded Industry. </p>
        
</div>

<script>
$('a.poplight[href^=#]').click(function() {
    var popID = $(this).attr('rel'); //Get Popup Name
    var popURL = $(this).attr('href'); //Get Popup href to define size

    //Pull Query & Variables from href URL
    var query= popURL.split('?');
    var dim= query[1].split('&');
    var popWidth = dim[0].split('=')[1]; //Gets the first query string value

    //Fade in the Popup and add close button
    $('#' + popID).fadeIn().css({ 'width': Number( popWidth ) }).prepend('<a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>');

    //Define margin for center alignment (vertical   horizontal) - we add 80px to the height/width to accomodate for the padding  and border width defined in the css
    var popMargTop = ($('#' + popID).height() + 80) / 2;
    var popMargLeft = ($('#' + popID).width() + 80) / 2;

    //Apply Margin to Popup
    $('#' + popID).css({
        'margin-top' : -popMargTop,
        'margin-left' : -popMargLeft
    });

    //Fade in Background
    $('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
    $('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) is used to fix the IE Bug on fading transparencies 

    return false;
});

//Close Popups and Fade Layer
$('a.close, #fade').live('click', function() { //When clicking on the close or fade layer...
    $('#fade , .popup_block').fadeOut(function() {
        $('#fade, a.close').remove();  //fade them both out
    });
    return false;
});</script>
<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>