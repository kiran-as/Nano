<? include_once('db/dbconfig.php');
if($_POST){

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$Insert	=	mysql_query("INSERT INTO tbl_students (name, email,phone)
VALUES ('".$name."','".$email."','".$phone."')")or die(mysql_error()); 




  $_SESSION['questiontype'] = $_POST['questiontype'];
    $_SESSION['programtype'] = $_POST['programtype'];
	 $_SESSION['programlanguage'] = $_POST['programlanguage'];
	echo "<script>parent.location = 'checkingdisplaycourses.php';</script>";	  
	
	
/*	$to      = 'askiran123@gmail.com';
$subject = 'the subject';
$message = 'Thanks for registereing to the rvvlsi';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();*/

mail($to, $subject, $message, $headers);
	
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
</script>
</head>

<body class="whitebg">
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
                <td align="left" valign="bottom"><table width="100%" height="192" border="0" cellspacing="0" cellpadding="0">
				<? $video_result=mysql_query("select * from $video_table where vi_status=1 order by rand() limit 1 ") or die("video".mysql_error());
				
				$video=mysql_fetch_array($video_result);
				?>
                  <tr>
                    <td  width="249" height="31" align="left" style="background-image:url(images/video_headding.jpg);background-repeat:no-repeat; text-align:center; font-size:11px; font-weight:bold; padding:0px; margin:0px; border-right:1px solid #ccc;" valign="bottom"><?=stripslashes($video[vi_title])?><!--<img  alt="RV-VLSI Video Testimonial"src="images/video_headding.jpg" width="249" height="31" />--></td>
                  </tr>
                  <tr>
                    <td height="161" align="center" valign="top" background="images/right_box_bg.jpg" style="padding-top:7px; border-right:1px solid #ccc;"><div style="height:30px;">   <? 
					echo str_replace('210','178',stripslashes($video[vi_url]));
				
				  // ?></div></td>
                  </tr>
                </table></td>
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
            
             <table border="0" cellspacing="1" width="100%" style="padding:10px;" class="gridborder">
		   <tr>
		     <td><img src="images/header_courseplanner.png" width="454" height="32" /></td>
		     </tr>
		   <tr> 
			     <td>Please answer all the questions</td>
			  </tr>
              <tr><td>
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="notanswered">
  		   <tr> 
			     <td class="question">1.Your primary objective to take up a course</td>
			  </tr>
			  <tr>
			     <td><input type="radio" name="questiontype" id="questiontype"  value="Gain Knowledge & Experience">Gain Knowledge & Experience <br/>
								<input type="radio" name="questiontype"  id="questiontype" value="Pursue Higher Studies" >Pursue Higher Studies <br/>
								<input type="radio" name="questiontype"  id="questiontype" value="Gain Employment in Core Companies">Gain Employment in Core Companies <br/>
								<input type="radio" name="questiontype" id="questiontype" value="Change of domain from IT/BPO to Core companies" >Change of domain from IT/BPO to Core companies</td>
			  </tr>
</table>
</td></tr>
<tr><td></td></tr>
<tr><td><table width="100%" border="0" cellpadding="2" cellspacing="2" class="notanswered">
   <tr> 
			      <td class="question">2.Select the domain you're interest in</td>
			  </tr>
			  <tr>
			     <td><input type="radio" name="questiontype" id="questiontype"  value="ASIC VLSI Design">ASIC VLSI Design <br/>
								<input type="radio" name="questiontype"  id="questiontype" value="FPGA VLSI Design" >FPGA VLSI Design <br/>
								<input type="radio" name="questiontype"  id="questiontype" value="Embedded Systems Design">Embedded Systems Design <br/>
								<input type="radio" name="questiontype" id="questiontype" value="Not Sure, I need your help" >Not Sure, I need your help</td>
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
			     <td><input type="radio" name="questiontype" id="questiontype"  value="1">1
								<input type="radio" name="questiontype"  id="questiontype" value="2" >2
								<input type="radio" name="questiontype"  id="questiontype" value="4">4 
								<input type="radio" name="questiontype" id="questiontype" value="8" >8
								<input type="radio" name="questiontype" id="questiontype"  value="12">12
								<input type="radio" name="questiontype" id="questiontype" value="20">20</td>
			  </tr>
</table>

</td></tr>
			  
	<tr><td></td></tr>
    <tr><td>
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="notanswered">
   <tr> 
			     <td class="question">4.What is your highest qualification?</td>
			  </tr>
			  <tr>
			     <td><input type="radio" name="programtype"  id="programtype" value="3">BE in Electronics or related branch <br/>
								<input type="radio" name="programtype"   id="programtype" value="3" >ME/MS in Electronics or related branch<br/>
								<input type="radio" name="programtype"   id="programtype" value="2">BSc or M.Sc in Electronics<br/>
								<input type="radio" name="programtype"   id="programtype" value="2" >Diploma in Electronic<br/>
								<input type="radio" name="programtype"   id="programtype"  value="1">Pursuing BE <br/>
								<input type="radio" name="programtype"   id="programtype" value="3">Pursuing ME/MS or Ph.D<br/>
								<input type="radio" name="programtype"   id="programtype" value="4">Others</td>
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
			     <td><input type="radio" name="programlanguage"  value="No Experience">No Experience<br/>
								<input type="radio" name="programlanguage"  value="1 to 3" >1 to 3 <br/>
								<input type="radio" name="programlanguage"  value="3 to 5">3 to 5<br/>
								<input type="radio" name="programlanguage"  value="5 and above" >5 and above
								</td>
			  </tr>
    </table>
    </td></tr>		  
            
			
			  
			  <tr>
				    <td>
					<table width="100%">
					 <tr>
					   <td align="left">&nbsp;</td>
					   </tr>
					 <tr>
					     <td class="label" nowrap="nowrap">Name:<span>*</span></td>
						 <td><input type="text" name='name' id='name' value="" /></td>
					 </tr>
					 <tr>
				    <td class="label" nowrap="nowrap">E-Mail:</td><td><input type="text" name='email' id='email' value="" /></td>
				</tr>
				
				<tr>
				    <td class="label" nowrap="nowrap">Phone.No:</td><td><input type="text" name='phone' id='phone' value="" /></td>
				</tr>
				<tr>
				    <td colspan="2" align="right"><input type="submit" name='save' id='save' value="save" onclick="return validate();" class="blueButton"/></td>
				</tr>
					</table>
					
					</td>
			</tr>
				
				

				
				
			</table>
				  </form>

				  </td>
                <td width="15">&nbsp;</td>
                <td width="249" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" background="images/right_box_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="10"></td>
                      </tr>
                      <tr>
                        <td height="10"></td>
                      </tr>
                      <tr>
                        <td height="335" align="center" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','235','height','600','src','companies','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','companies' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="235" height="600">
                          <param name="movie" value="companies.swf" />
                          <param name="quality" value="high" />
                          <param name="wmode" value="transparent" />
                          <embed src="right_caption_placement.swf" width="235" height="500" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="transparent"></embed>
                        </object></noscript></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="2"><img src="images/right_box_bottom.jpg" width="249" height="2" /></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20">&nbsp;</td>
      </tr>
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
