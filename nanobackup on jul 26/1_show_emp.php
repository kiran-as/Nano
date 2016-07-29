<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
	    include_once('classes/checkingAuth.php');
   $check=new checkingAuth();
   $check->loginCheck();   


	$db=new dataBase();
   $db->connectDB();  ?>
   <?php 
   $resultsss = "SELECT * FROM rv_empfactor where mid='".$_SESSION[m_id]."'";
	//print_r($resultsss);
	$resultc = mysql_query($resultsss);
	
	while ($row = mysql_fetch_assoc($resultc)) {
   $empfactor = $row['empfactor'];
   $mid = $row['mid'];
 
}

   ?>
  <? //=employabilityFactor($_SESSION[m_id])?><?

    $currentempfctr = (employabilityFactor($_SESSION[m_id]));
	
	 if($currentempfctr!=$empfactor)
	 {
   // print_r($currentempfctr);
  // print_r($_SESSION['m_emailid']);$flag
  $flag=0;
                                  if($flag==0)
								  {
									    $to 	 = $_SESSION['m_emailid'];
										$subject = 'Employability Factor';
										$message = 'Your Current Employabililty Factor is'.$currentempfctr;
										
										$from 	 = 'testing';
										$headers  = "From:" . 'testing';		
								  		$headers .= "\r\n".'MIME-Version: 1.0' . "\r\n";
										$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
										mail($to,$subject,$message,$headers);
										$flag=1;
									}
										//header("Location:1_educations_info.php?msg=0&tb=2#tabs-2");
			$result	=	mysql_query("delete from rv_empfactor where mid=".$_SESSION[m_id]);
			
			$Insert	=	mysql_query("INSERT INTO rv_empfactor (mid, empfactor)VALUES ('".$_SESSION[m_id]."','".$currentempfctr."')")or die(mysql_error());  
						
										
 
  		}						
 
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<meta name="keywords" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<title>ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company</title>
<!--<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />

<script src="js/student_validation.js" type="text/javascript"></script>
	
<script src="js/recruiter_validation.js" type="text/javascript"></script>-->
<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />
<!--<script src="js/ajax.js" type="text/javascript"></script>-->
	<script type="text/javascript" src="jquery_tabs/js/jquery-1.5.1.min.js"></script> 

			 
 
	
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

</head>

<body>
<div class="main_div">
<?php include("includes/2_jobseekerheader.php"); ?>



<div class="stmenuright_maincontent">

<!--<div class="rightimg_top">
<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Resume Builder</h3>
</div>
<div class="rightimg_right">
</div>
</div>--><!--end of rightimg_top-->




<img src="images/pixel_transparent.gif" width="1" height="50">
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="resumeviewinfo">

<tr>

  <td><span  style="font-size:18px; font-weight:bold;">Congratulations on successfully uploading your resume. <br/>Your Current  <a href="#?w=500" rel="popup_name" class="poplight" style="color:#114981;">Employability Factor</a> is  <?=employabilityFactor($_SESSION[m_id])?></span></td>

</tr>
</table>
<img src="images/pixel_transparent.gif" width="1" height="150">

<? include "includes/footer.php" ?>
</div><!--end of right_maincontent-->
<?php // include "stmenuleft_content.php"; ?>
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
</div><!--end of main_div-->
</body>
</html>