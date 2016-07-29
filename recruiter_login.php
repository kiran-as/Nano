<?php 
echo "<script>parent.location='college/recruiter/index.php'</script>";
exit;
include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  


mail($to,$subject,$txt,$headers);

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
     $_SESSION["r_user_name"] = '';
		  $_SESSION["r_user_name"] = '';
		  $_SESSION['r_id']	= '';
  if($_POST)
  {
  
  	$email = $_POST['email'];
  	$plainpwd = $_POST['password'];
  	$password = md5($plainpwd);
  	$cnt1=0;
  	$selectrecruiter = "Select * from rv_recruiters where r_email='$email' and r_password='$password' and r_approve=1";

	$resultc = mysql_query($selectrecruiter);
	
	while ($row = mysql_fetch_assoc($resultc)) {
		  $_SESSION["r_user_name"] = $arraStudent["r_user_name"]	= $row["r_user_name"];
		  $_SESSION["r_company"] = $arraStudent["r_company"]	= $row["r_company"];
		  $_SESSION['r_id']	= $row["r_id"];
		  
		  $cnt1=1;
		}
	// $cnt=count($arraStudent);
	 
	 if($cnt1==0)
	 {
	 	 echo "<script>alert('Please Enter the correct Email and Password');</script>";
	 	 echo "<script>parent.location = 'recruiter_index1.php';</script>";	 
	 	 
	 }
	 else 
	 {
	 	 echo "<script>parent.location = 'dashboard.php';</script>";	 
	 }
  	
  }
   
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recruiter Login</title>
<link href="css/recruiter-styles.css" rel="stylesheet">
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>	
</head>

<script type="text/javascript">
function fnvalidates()
{
      // alert('asdf');
       if(document.getElementById('email').value=='')
       {
           alert('Enter the E-Mail');
           document.getElementById('email').focus();
           return false;
       }
       if(document.getElementById('password').value=='')
       {
           alert('Enter the Password');
           document.getElementById('password').focus();
           return false;
       }
       document.form.submit();
       
}

</script>
<body>
<div class="container">
<div id="table">
<div id="row" class="header">
<!--<div id="globalfirstcell"><a href="index.php"><img src="images/logonanao.jpg"></a></div>-->
<?php include "includes/header.php" ?>
</div>
</div>
<form action="" method="post">
<div id="row">
<h1>Welcome to our Recuritment Solutions</h1>
<div class="welcomescreenimage">
					<div id="da-slider" class="da-slider">
						<div class="da-slide">
							<div class="da-img"><img src="images/slider/1.jpg" alt="image01" /></div>
						</div>
						<div class="da-slide">						
							<div class="da-img"><img src="images/slider/2.jpg" alt="image01" /></div>
						</div>
						<div class="da-slide">						
							<div class="da-img"><img src="images/slider/3.jpg" alt="image01" /></div>
						</div>
						<div class="da-slide">						
							<div class="da-img"><img src="images/slider/4.jpg" alt="image01" /></div>
						</div>
						<div class="da-slide">						
							<div class="da-img"><img src="images/slider/5.jpg" alt="image01" /></div>
						</div>
						<div class="da-slide">						
							<div class="da-img"><img src="images/slider/6.jpg" alt="image01" /></div>
						</div>
						<nav class="da-arrows">
							<span class="da-arrows-prev"></span>
							<span class="da-arrows-next"></span>
						</nav>
					</div>
  	</div>
	<div class="loginpanelleft">
	<img src="images/info.png">
</div>
	<div class="loginpanel">
	<span> Sign In</span>
	<div class="clearboth">
	<span class="login-addon"><i class="iconuser"></i></span>
								
								<input id="email" style="width: 87%" class="logintext" type="text" name="email" value="Email Address" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"></div><br>
			
<div class="clearboth">
	<span class="login-addon"><i class="iconpass"></i></span>
								
								<input id="password" style="width: 87%"class="logintext" type="password" name="password" value="Password" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"></div>

			
								<div class="floatleft"><a href="recruiters_registration.php">New User</a> | <a href="recruiter_forgot_password.php">Forgot Password?</a></div>
								<div class="floatright"><input name="" type="image" src="images/loginbtn.png" onclick='return fnvalidates();'/></div>
	
	</div>

	<div class="footer">For Further Information <a href="mailto:info@nanochipsolutions.com">Contact Us</a> | Copyrights © 2012 Nanochipsolutions</div>
	</div>
	</form>
</body>
<script type="text/javascript" src="slider/jquery.js"></script>
	<script type="text/javascript" src="slider/protoFluid3.02.js"></script>
	<script type="text/javascript" src="slider/jquery.cslider.js"></script>
		<script type="text/javascript">
			$(function() {
			
				$('#da-slider').cslider();
				
			});
		</script>
</html>
