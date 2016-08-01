<?php 
include_once('db/dbconfig.php');
session_name();
session_start();

if($_POST){

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$Insert	=	mysql_query("INSERT INTO tbl_students (name, email,phone)
VALUES ('".$name."','".$email."','".$phone."')")or die(mysql_error()); 

$resultccc	="SELECT * FROM tbl_mailtemplate WHERE 	idmailtitle=1";
$result = mysql_query($resultccc);
while ($row = mysql_fetch_assoc($result)) {
   $title = $row['Title'];
   $TemplateBody = $row['Description'];
      $idmailtitle = $row['idmailtitle'];
	    }

 
	
	
	$to      = $_POST['email'];
$subject = 'Welcome to RV-VLSI. Pioneers in Imparting Experience Based Education';
$message='Dear '.$_POST['name'].'<br/> 	&nbsp;</div>
<div>';
$from='RV-VLSI';
$message.= $TemplateBody;
$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers.= 'From: RV-VlSI <info@rv-vlsi.com>';

//mail($to, $subject, $message, $headers);

///////////////////////////////////Mail function for the admin///////////////////////////////////////////

$prgtype = $_POST['programtype'];
if($prgtype == '3.1')
{
   $progtype = '3';
  $prgdescription = 'BE in Electronics or related branch';
}
if($prgtype == '3.2')
{
 $progtype = '3';
  $prgdescription = 'ME/MS in Electronics or related branch';
}
if($prgtype == '2.1')
{
   $progtype = '2';
  $prgdescription = 'BSc or M.Sc in Electronics';
}
if($prgtype == '2.2')
{
    $progtype = '2';
  $prgdescription = 'Diploma in Electronic';
}
if($prgtype == '1')
{
  $progtype = '1';
  $prgdescription = 'Pursuing BE ';
}
if($prgtype == '3.3')
{
	 $progtype = '3';
  $prgdescription = 'Pursuing ME/MS or Ph.D';
}
if($prgtype == '4')
{
    $progtype = '4';
  $prgdescription = 'Others';
}


//////////////////////************///////////////////////
 $questiontype = $_POST['questiontype'];
if($progtype==1)
{
	$select = "select * from tbl_programs where ProgramName <= $questiontype and Programtype=1 and  Active=1 and Q4<=$progtype ORDER BY Title ASC";
}
else if($progtype==4)
{
	$select = "select * from tbl_programs where ProgramName <= $questiontype and Programtype=1 and   Active=1 and Q4<=$progtype ORDER BY Title ASC";
}	
else 
{
	$select = "select * from tbl_programs where ProgramName <= $questiontype and Programtype=1 and   Active=1 and Q4<=$progtype and Q4>1 ORDER BY Title ASC";
}		  


$resultprograms = mysql_query($select);
	$s=0;
	$results='';
	$values=0;
	while ($row = mysql_fetch_assoc($resultprograms)) {
		  $arrprograms[$s]["Title"]	= $row["Title"];
		  $arrprograms[$s]["idprograms"]	= $row["idprograms"];
		  $values = $values.','.$row["idprograms"];
		  $results = $results.','.$row["Title"];
		
		  $s++;  
		}
		$values;
      $rvvlsi = $s;


////////////////////////////////////////////////////////
$ipaddress =$_SERVER["REMOTE_ADDR"];
$day = date('d-m-Y');
$time = date('H:i:s');

$date = $day.' '.$time;

 $html='<table width="100%" border="1">
 						<tr>
							<td>Student Name</td>
							<td>'.$_POST['name'].'</td>
						</tr>
						<tr>
							<td>Student Email</td>
							<td>'.$_POST['email'].'</td>
						</tr>
						<tr>
							<td>Student Phone Number</td>
							<td>'.$_POST['phone'].'</td>
						</tr>
						<tr>
							<td colspan="2" align="center" >Student Answered Details</td>
						</tr>
						<tr>
							<td>1.Your primary objective to take up a course</td>
							<td>'.$_POST['questiontype1'].'</td>
						</tr>
						<tr>
							<td>2.Select the domain youre interest in</td>
							<td>'.$_POST['questiontype2'].'</td>
						</tr>
						<tr>
							<td>3.How many weeks can you spare fulltime, Monday to Friday?</td>
							<td>'.$_POST['questiontype'].'</td>
						</tr>
						<tr>
							<td>4.What is your highest qualification?</td>
							<td>'.$prgdescription.'</td>
						</tr>
						<tr>
							<td>5.Do you have ANY industry experience?</td>
							<td>'.$_POST['questiontype5'].'</td>
						</tr>
						<tr>
							<td>Results</td>
							<td>'.$results.'</td>
						</tr>
						
		</table>';

	$question1='Your primary objective to take up a course';	
	$question2='Select the domain youre interest in';
	$question3='How many weeks can you spare fulltime, Monday to Friday?';
	$question4='What is your highest qualification?';
	$question5='Do you have ANY industry experience';
	$question6='Courses';
	
 $Insert	=	mysql_query("INSERT INTO tbl_studentdetailsinformation (StudentName,StudentEmail,StudentPhone,Question1,Answer1,Question2,Answer2,Question3,Answer3,Question4,Answer4,Question5,Answer5,Result,Ip,Date)
VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$question1."','".$_POST['questiontype1']."','".$question2."','".$_POST['questiontype2']."','".$question3."','".$_POST['questiontype']."','".$question4."','".$prgdescription."','".$question5."','".$_POST['questiontype5']."','".$question6."','".$ipaddress."','".$date."')")or die(mysql_error());
 
 
 $from='RV-VLSI';
		$to      = 'askiran123@gmail.com';
$subject = 'Course planner '.$_POST['name'];
$message = $html;
$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers.= 'From: RV-VlSI <info@rv-vlsi.com>';
//mail($to, $subject, $message, $headers);

		



/////////////////////////////////////////////////////////////////
$_SESSION['email']=$_POST['email'];
$_SESSION['name']=$_POST['name'];
  $_SESSION['questiontype'] = $_POST['questiontype'];
    $_SESSION['programtype'] = $progtype;
	// $_SESSION['programlanguage'] = $_POST['programlanguage'];
header('location:checkingdisplaycourses.php'); 


	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="RV-VLSI,VLSI,Electronic,Design,FPGA, ASIC, Embedded Systems,Admission, Analog mixed signal domains, bangalore ,Karnataka , India,BE Projects for Electronic Engineers, University provided BE Projects, VLSI Training in Bangalore, VLSI Training in Bangalore with BE project, VLSI & Embedded system BE Projects, VTU proved BE projects, BE Projects for Electronic Engineers">
<title>RV-VLSI Design Center - Course Planner</title>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<!--<link href="rv_main.css" rel="stylesheet" type="text/css" /> -->

<link href="SpryAssets/SpryAccordion4.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/prototype1.js"></script>
<script language="JavaScript" type="text/javascript" src="js/SpryCollapsiblePanel.js"></script>
<script language="JavaScript" type="text/javascript" src="js/SpryData.js"></script>
<!--<link href="js/samples.css" rel="stylesheet" type="text/css" /> -->
<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />
<link rel="stylesheet" href="includes/styles.css" type="text/css" media="screen" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script type="text/javascript">
function validate()
{

	var hiddenquestiontype1 = document.getElementById('hiddenquestiontype1').value;
	  if(hiddenquestiontype1=='')
	  {
	    alert('Please Answer all the questions');
		return false;
	  }

		var hiddenquestiontype2 = document.getElementById('hiddenquestiontype2').value;
		  if(hiddenquestiontype2=='')
		  {
		    alert('Please Answer all the questions');
			return false;
		  }

			var hiddenquestiontype3 = document.getElementById('hiddenquestiontype3').value;
			  if(hiddenquestiontype3=='')
			  {
			    alert('Please Answer all the questions');
				return false;
			  }

				var hiddenquestiontype4 = document.getElementById('hiddenquestiontype4').value;
				  if(hiddenquestiontype4=='')
				  {
				    alert('Please Answer all the questions');
					return false;
				  }

					var hiddenquestiontype5 = document.getElementById('hiddenquestiontype5').value;
					  if(hiddenquestiontype5=='')
					  {
					    alert('Please Answer all the questions');
						return false;
					  }

  var name = document.getElementById('name').value;
  if(name=='')
  {
    alert('Please Enter the name');
	return false;
  }
  
  var email = document.getElementById('email').value;
  if(email=='')
  {
    alert('Please Enter the email');
	return false;
  }
  
  
  var phone = document.getElementById('phone').value;
  if(phone=='')
  {
    alert('Please Enter the phone');
	return false;
  }
  
  return true;
}


function hiddenquestiontype1ss()
{
	document.getElementById('hiddenquestiontype1').value=1;
}
function hiddenquestiontype2ss()
{
	document.getElementById('hiddenquestiontype2').value=1;
}
function hiddenquestiontype3ss()
{
	document.getElementById('hiddenquestiontype3').value=1;
}
function hiddenquestiontype4ss()
{
	document.getElementById('hiddenquestiontype4').value=1;
}
function hiddenquestiontype5ss()
{
	document.getElementById('hiddenquestiontype5').value=1;
}

</script>
</head>

<body  class="whitebg">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="143" rowspan="2"><img alt="RV-VLSI Design Center" src="images/RV-Institute_logo.jpg" width="143" height="110" border="0" usemap="#Map" style="padding:10px 0px;" />
                  <map name="MapMap" id="MapMap">
                    <area shape="rect" coords="0,2,107,97" href="index.php" />
                  </map></td>
                <td width="18" rowspan="2">&nbsp;</td>
                <td width="27" rowspan="2" align="left" valign="middle"><!--<img src="images/ATT_stamp_medium.jpg" width="107" height="69" border="0" style="margin:0px 0px 5px 0px;" />--></td>
                <td width="452" rowspan="2" align="left" valign="middle"><table width="88%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left" valign="middle"><br /><Br /><br /><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','405','height','35','src','caption_1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','caption_1' ); //end AC code
            </script>
                          <noscript>
                          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="405" height="35">
                            <param name="movie" value="caption_1.swf" />
                            <param name="quality" value="high" />
                            <embed src="caption_1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="405" height="35"></embed>
                          </object>
                        </noscript></td>
                    </tr>
                    <tr>
                      <td height="31">&nbsp;</td>
                    </tr>
                </table></td><td width="126" rowspan="2"><img src="images/logo_new.jpg" /></td>
                <td width="194" align="right" valign="bottom" class="link_green"><img src="images/contact_button.jpg" width="193" height="46" /></td>
              </tr>
              <tr><td align="right" valign="bottom" class="text10red" style="padding-bottom:5px;"><a href="index.php" class="text10red">Home</a> | <a href="contact_us.php" class="text10red">Contact Us</a> | <a href="sitemap.html" class="text10red">Sitemap</a></td>
              </tr>
            </table>
              <map name="Map" id="Map22">
                <area shape="rect" coords="0,2,141,110" href="index.php" />
              </map>
              <map name="Map" id="Map22">
                <area shape="rect" coords="1,2,108,97" href="index.php" />
              </map>
              <map name="Map" id="Map3">
                <area shape="rect" coords="1,2,108,97" href="index.php" />
              </map>
              <map name="Map" id="Map2">
                <area shape="rect" coords="1,2,108,97" href="index.php" />
              </map>
              <map name="Map" id="Map">
                <area shape="rect" coords="1,2,108,97" href="index.php" />
              </map>
              </td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="700" height="192" id="FlashID" title="">
                  <param name="movie" value="rvvlsi_newbanner.swf" />
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="7.0.70.0" />
                  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                  <param name="expressinstall" value="Scripts/expressInstall.swf" />
                  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                  <!--[if !IE]>-->
                  <object type="application/x-shockwave-flash" data="rvvlsi_newbanner.swf" width="701" height="192">
                    <!--<![endif]-->
                    <param name="quality" value="high" />
                    <param name="wmode" value="opaque" />
                    <param name="swfversion" value="7.0.70.0" />
                    <param name="expressinstall" value="Scripts/expressInstall.swf" />
                    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                    <div>
                      <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                    </div>
                    <!--[if !IE]>-->
                  </object>
                  <!--<![endif]-->
                </object></td>
                <td width="15">&nbsp;</td>
                 <td align="left" valign="bottom"><img src="images/jgainsmallban.png" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="38" align="left" valign="middle" background="images/menu_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="100%">
                
                <div class="header_menu">

<div id="ddtopmenubar" class="mattblackmenu">

 <ul>
 <li width="86" align="center" valign="middle" class="button_white"><a href="about_us.php"  rel="ddsubmenu1" class="button_white">About Us</a></li>
 <li width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38"  class="button_white"/></li>
 <li width="86" align="center" valign="middle" class="button_white"><a href="program_offerings.php" class="button_white">Program Offerings</a></li>
 <li width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></li>
 <li width="86" align="center" valign="middle" class="button_white"><a href="admission.php" class="button_white">Admissions</a></li>
 <li width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></li>
  <li width="86" align="center" valign="middle" class="button_white"><a href="infrastructure.php" class="button_white">Infrastructure</a></li>
 <li width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38"  class="button_white"/></li>
 <li width="86" align="center" valign="middle" class="button_white"><a href="placements.php" class="button_white">Placements</a></li>
 <li width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></li>
 <li width="86" align="center" valign="middle" class="button_white"><a href="testimonial.php" class="button_white">Testimonials</a></li>
 <li width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></li> 
  <li width="86" align="center" valign="middle" class="button_white"><a href="career.php" class="button_white">Careers</a></li>
 <li width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></li>
  <li width="86" align="center" valign="middle" class="button_white"><a href="news_events.php" class="button_white">News & Events</a></li>
 <li width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38"  class="button_white"/></li>
 <li width="86" align="center" valign="middle" class="button_white"><a href="faq.php" class="button_white">FAQ</a></li>         
</ul>

</div>
<script type="text/javascript">
ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")

function numbersonly(e){
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
	if (unicode<48||unicode>57) //if not a number
	return false //disable key press
	}
}
</script>
</div>
                               
                </td>
              </tr>
            </table></td>
          </tr>
          
          <tr>
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top">
				<form method="post" action="" name="frmCal" enctype="multipart/form-data" onsubmit="return calculate_course();">
            
             <table width="100%" border="0" cellpadding="3" cellspacing="1" class="whitebg" style="padding:10px;">
		   <tr>
		     <td><img src="images/header_courseplanner.png" width="454" height="32" /></td>
		     </tr>
		   <tr> 
			     <td class="infomation">Please answer all the questions below to view recommended courses that will best
meet your career objectives. Help Us, Help You!</td>
			  </tr>
              <tr><td>
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="notanswered">
  		   <tr> 
			     <td class="question">1.Your primary objective to take up a course</td>
			  </tr>
			  <tr>
			     <td>
                 <table width="100%"><tr><td width="50%"><input type="radio" name="questiontype1" id="questiontype1"  value="Gain Knowledge & Experience" onclick='hiddenquestiontype1ss();'>Gain Knowledge & Experience <br/>
								<input type="radio" name="questiontype1"  id="questiontype1" value="Pursue Higher Studies" onclick='hiddenquestiontype1ss();'>Pursue Higher Studies <br/>
								</td><td><input type="radio" name="questiontype1"  id="questiontype1" value="Gain Employment in Core Companies" onclick='hiddenquestiontype1ss();'>Gain Employment in Core Companies <br/>
								<input type="radio" name="questiontype1" id="questiontype1" value="Change of domain from IT/BPO to Core companies" onclick='hiddenquestiontype1ss();'>Change of domain from IT/BPO to Core companies</td></tr>
                                </table>
                 <input type="hidden" value="" id="hiddenquestiontype1" name="hiddenquestiontype1"></input>
                 </td>
			  </tr>
</table>
</td></tr>
<tr><td></td></tr>
<tr><td><table width="100%" border="0" cellpadding="2" cellspacing="2" class="notanswered">
   <tr> 
			      <td class="question">2.Select the domain you're interest in</td>
			  </tr>
			  <tr>
			     <td>
                 
                  <table width="100%"><tr><td width="50%">    <input type="radio" name="questiontype2" id="questiontype2"  value="ASIC VLSI Design" onclick='hiddenquestiontype2ss();'>ASIC VLSI Design <br/>
								<input type="radio" name="questiontype2"  id="questiontype2" value="FPGA VLSI Design" onclick='hiddenquestiontype2ss();' >FPGA VLSI Design <br/>
								</td><td>   
                                
             
								<input type="radio" name="questiontype2"  id="questiontype2" value="Embedded Systems Design" onclick='hiddenquestiontype2ss();'>Embedded Systems Design <br/>
								<input type="radio" name="questiontype2" id="questiontype2" value="Not Sure, I need your help" onclick='hiddenquestiontype2ss();'>Not Sure, I need your help</td></tr>
                                </table>
                              <input type="hidden" value="" id="hiddenquestiontype2" name="hiddenquestiontype2" onclick='hiddenquestiontype2ss();'></input>   
                             </td>
			  </tr>
</table>
</td></tr>			
<tr><td></td></tr>
<tr><td>


<table width="100%" border="0" cellpadding="2" cellspacing="2" class="notanswered">
  <tr> 
			     <td class="question">3.How many weeks can you spare fulltime, Monday to Friday?</td>
			  </tr>
			  <tr>
			     <td><input type="radio" name="questiontype" id="questiontype"  value="1" onclick='hiddenquestiontype3ss();'>1
								<input type="radio" name="questiontype"  id="questiontype" value="2" onclick='hiddenquestiontype3ss();'>2
								<input type="radio" name="questiontype"  id="questiontype" value="4" onclick='hiddenquestiontype3ss();'>4 
								<input type="radio" name="questiontype" id="questiontype" value="8" onclick='hiddenquestiontype3ss();'>8
								<input type="radio" name="questiontype" id="questiontype"  value="12" onclick='hiddenquestiontype3ss();'>12
								<input type="radio" name="questiontype" id="questiontype" value="20" onclick='hiddenquestiontype3ss();'>20</td>
			  </tr>
			   <input type="hidden" value="" id="hiddenquestiontype3" name="hiddenquestiontype3"></input>
</table>

</td></tr>
			  
	<tr><td></td></tr>
    <tr><td>
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="notanswered">
   <tr> 
			     <td class="question">4.What is your highest qualification?</td>
			  </tr>
			  <tr>
			     <td>
              <table width="100%"><tr><td width="50%"> 
                 <input type="radio" name="programtype"  id="programtype" value="3.1" onclick='hiddenquestiontype4ss();'>BE in Electronics or related branch <br/>
								<input type="radio" name="programtype"   id="programtype" value="3.2" onclick='hiddenquestiontype4ss();'>ME/MS in Electronics or related branch<br/>
								<input type="radio" name="programtype"   id="programtype" value="2.1" onclick='hiddenquestiontype4ss();'>BSc or M.Sc in Electronics<br/>
								<input type="radio" name="programtype"   id="programtype" value="2.2" onclick='hiddenquestiontype4ss();'>Diploma in Electronic<br/>
								</td><td valign="top">   
                                
             <input type="radio" name="programtype"   id="programtype"  value="1" onclick='hiddenquestiontype4ss();'>Pursuing BE <br/>
								<input type="radio" name="programtype"   id="programtype" value="3.3" onclick='hiddenquestiontype4ss();'>Pursuing ME/MS or Ph.D<br/>
								<input type="radio" name="programtype"   id="programtype" value="4" onclick='hiddenquestiontype4ss();'>Others</td></tr>
                                </table>    
                 
                 
                 
                   <input type="hidden" value="" id="hiddenquestiontype4" name="hiddenquestiontype4"></input>
                
								</td>
			  </tr>
</table>

    
    
    </td></tr>		
			  
	<tr><td></td></tr>
    <tr><td>
    <table width="100%" border="0" cellpadding="2" cellspacing="2" class="notanswered">
    
			   <tr> 
			     <td class="question">5.Do you have ANY industry experience?</td>
			  </tr>
			  <tr>
			     <td>
                 
                   <table width="100%"><tr><td width="50%"> 
                <input type="radio" name="questiontype5" id="questiontype5" value="No Experience" onclick='hiddenquestiontype5ss();'>No Experience<br/>
								<input type="radio" name="questiontype5" id="questiontype5" value="1 to 3" onclick='hiddenquestiontype5ss();'>1 to 3 <br/>
								</td><td>   
                                	<input type="radio" name="questiontype5" id="questiontype5" value="3 to 5" onclick='hiddenquestiontype5ss();'>3 to 5<br/>
								<input type="radio" name="questiontype5" id="questiontype5" value="5 and above" onclick='hiddenquestiontype5ss();'>5 and above</td></tr>
                                </table>    
                 
                 
                  <input type="hidden" value="" id="hiddenquestiontype5" name="hiddenquestiontype5"></input>
							
								</td>
			  </tr>
    </table>
    </td></tr>		  
            
			
			  
			  <tr>
				    <td>
					<table width="100%" border="0" cellspacing="2" cellpadding="2">
					 <tr>
					   <td align="left" colspan="2">&nbsp;</td>
					   </tr>
					 <tr>
					     <td class="label" nowrap="nowrap">Name:<span>*</span></td>
						 <td width="100%"><input type="text" name='name' id='name' value="" /></td>
					 </tr>
					 <tr>
				    <td class="label" nowrap="nowrap">E-Mail:<span>*</span></td><td><input type="text" name='email' id='email' value="" /></td>
				</tr>
				
				<tr>
				    <td class="label" nowrap="nowrap" >Phone No:<span>*</span></td><td><input type="text" name='phone' id='phone'  maxlength="15" value="" onKeyPress='return numbersonly(event);'/></td>
				</tr>
				<tr>
				    <td colspan="2" align="right"><input type="submit" name='Submit' id='Submit' value="Submit" onclick="return validate();" class="blueButton"/>
					<input type="button" name='Cancel' id='Cancel' value="Cancel" onclick="return Cancel();" class="grayButton"/>
					</td>
				</tr>
					</table>
					
					</td>
			</tr>
				
				

				
				
			</table>
				  </form>

				  </td>
             
    
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20">&nbsp;</td>
      </tr>
         <tr><td colspan="2"><h2>VLSI & Embedded companies
where our students are placed</h2></td></tr>
                  <tr><td colspan="2"><? include_once('customerlogos.php');?></td></tr>
      <tr>
        <td height="10" colspan="3" align="center" valign="middle"></td>
      </tr>
      <tr>
        <td height="37" colspan="3" align="center" valign="middle" background="images/footer_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20">&nbsp;</td>
            <td align="left" valign="middle" class="copyright">A unit of Rashtreeya Sikshana Samiti Trust.</td>
            <td align="right" valign="middle" class="copyright">All rights reserved, Copyright © RV-VLSI Design Center.</td>
            <td width="20">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>



<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-2112781-1";
urchinTracker();
</script>
<ul id="ddsubmenu1" class="ddsubmenustyle">
<li><a href="rsst.php" class="border_top">Rashtreeya Sikshana Samiti Trust</a></li>
<li><a href="ceo_message_about.php">CEO Message</a></li>
<li><a href="gov_council.php">Governing Council</a></li>
<li><a href="strategy.php">Strategic Advisory Board</a></li>
</ul>
</body>
</html>
