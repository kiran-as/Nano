<?
include_once('db/dbconfig.php');
error_reporting(E_ALL ^ E_NOTICE); 
				 $html='
				 <table  width="100%" cellpadding="3" cellspacing="3" border="0">
				   <tr>
				     <td>Dear</td>
					</tr>
					<tr>
				     <td>Thanks for creating a new job on the Nanochip Solutions Job Portal. Your job description is being processed by the admin to shortlist the resumes as per your request. We will intimate you at the earliest, over an email once the resumes are tagged and made available on your login account.</td>
					</tr>
					<tr>
				     <td>Best Regards,<br>
					 Nanochip Solutions Team</td>
					</tr></table>';
     			 $from='RV-VLSI';
				 $to      ='askiran123@gmail.com';//$email;
				 $subject = 'Nanochip Solution:Created New Job';
				 $message = $html;
				
				 $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				 $headers.= "From:" . $from;
				 mail($to, $subject, $message, $headers); 
if(isset($_POST[sendmessage]))
	{

$strAdminEmail = "info@rv-vlsi.com";
$strFrom = "info@rv-vlsi.com";
$strMailSubject = "Contact Information";

$strTitle =$_REQUEST["Title"];
$strName =$_REQUEST["Name"];
$strPhone = $_REQUEST["Phone"];
$strOccupation=$_REQUEST["Occupation"];
$strOrg=$_REQUEST["Org"];
$strAddress=$_REQUEST["Address"];
$strComments=$_REQUEST["Comments"];



	$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: RV-Vlsi <info@rv-vlsi.com>';
	 $headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
	$body='<table cellpadding="3" cellspacing="3" border="0" style="font-family:tahoma; font-size:12px;">
<tr><Td colspan=2>This message was sent by '.$strTitle.' '.$strName.' on ' .date('d-m-Y').'</td ><td></td></tr>
<tr><Td width="100px">Name</td><td>'.$strTitle.' '.$strName.'</td></tr>
<tr><Td>Phone</td><td>'.$strPhone.'</td></tr>
<tr><Td>Email</td><td>'.$_POST[Email].'</td></tr>
<tr><Td>Occupation</td><td>'.$strOccupation.'</td></tr>
<tr><Td>Institute/Organization</td><td>'.$strOrg.'</td></tr>
<tr><Td>Address</td><td>'.$strAddress.'</td></tr>
<tr><Td>Comments /Questions</td><td>'.$strComments.'</td></tr>
<tr><Td></td><td></td></tr>
</table>';
//
$subject='Contact Information for :'.$strName;
mail('info@rv-vlsi.com',$subject,$body,$headers);
//mail('vikram@kaivalyasoftware.com',$subject,$body,$headers);
$msg="<br><br>We have recieved your <b>Comments/Questions.</b><br><br>Thank you for your interest in RV-VLSI.<br>Due to unusually high call volume and emails to RV-VLSI, our reply to your email might be delayed.<br> Kindly bear with us to help you better!";

						$time=mktime();
						$ip=$_SERVER['REMOTE_ADDR'];

mysql_query("insert into $contact_us_table(ce_name,ce_phone,ce_email,ce_occupation,ce_institution,ce_address,ce_comments,ce_date,ce_ip) values(
'".addslashes($strTitle.' '.$strName)."','".addslashes($strPhone)."','".addslashes($_POST[Email])."','".addslashes($strOccupation)."','".addslashes($strOrg)."','".addslashes($strAddress)."','".addslashes($strComments)."','".$time."','".$ip."')") or die(mysql_error());


}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="RV-VLSI,VLSI,Electronic,Design,FPGA, ASIC, Embedded Systems,Admission, Analog mixed signal domains, bangalore ,Karnataka , India,BE Projects for Electronic Engineers, University provided BE Projects, VLSI Training in Bangalore, VLSI Training in Bangalore with BE project, VLSI & Embedded system BE Projects, VTU proved BE projects, BE Projects for Electronic Engineers">
<title>RV-VLSI Design Center - Contact Us</title>
<SCRIPT language=javascript>
function check()
{
	if (document.myform.Name.value.length==0)
		{
			alert("Please enter your Name");
			document.myform.Name.focus();
			return false;
		}
			else if (document.myform.Phone.value.length==0 )
		{
			alert("Please enter your Phone Number");
			document.myform.Phone.focus();
			return false;
		}
			else if(document.myform.Email.value.length==0 || document.myform.Email.value.indexOf("@")==-1 || document.myform.Email.value.indexOf(".")==-1 || document.myform.Email.value.indexOf(" ")==0)
		{
			alert("You must enter a Valid Email ID")
			document.myform.Email.focus();
			return false;
		}
		
		//else if (document.myform.Title[document.myform.Title.selectedIndex].value.length==0)

}
</SCRIPT>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>






<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="javascript/lytebox.js"></script>
<link rel="stylesheet" href="css/lytebox.css" type="text/css" media="screen" />
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryAccordion4.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/prototype1.js"></script>
<script language="JavaScript" type="text/javascript" src="js/SpryCollapsiblePanel.js"></script>
<script language="JavaScript" type="text/javascript" src="js/SpryData.js"></script>
<link href="js/samples.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript" src="js/SpryCollapsiblePanel.js"></script>
<script language="JavaScript" type="text/javascript" src="js/SpryData.js"></script>
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryAccordion3.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="js/SpryEffects.js"></script>
<link href="js/samples.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />


<link href="rv_main.css" rel="stylesheet" type="text/css" />
<SCRIPT language=javascript>
function check()
{
	if (document.myform.Name.value.length==0)
		{
			alert("Please enter your Name");
			document.myform.Name.focus();
		}
			else if (document.myform.Phone.value.length==0 )
		{
			alert("Please enter your Phone Number");
			document.myform.Phone.focus();
		}
			else if(document.myform.Email.value.length==0 || document.myform.Email.value.indexOf("@")==-1 || document.myform.Email.value.indexOf(".")==-1 || document.myform.Email.value.indexOf(" ")==0)
		{
			alert("You must enter a Valid Email ID")
			document.myform.Email.focus();
		}
		
		//else if (document.myform.Title[document.myform.Title.selectedIndex].value.length==0)

	else
		{
		document.myform.submit()
		}
}
</SCRIPT>

</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="143" rowspan="2"><img alt="RV-VLSI Design Center" src="images/RV-Institute_logo.jpg" width="143" height="110" border="0" usemap="#Map" />
                  <map name="MapMap" id="MapMap">
                    <area shape="rect" coords="0,2,107,97" href="index.php" />
                  </map></td>
                <td width="28" rowspan="2">&nbsp;</td>
                <td width="93" rowspan="2" align="left" valign="middle"><img alt="RV-VLSI" src="images/rv_vlsi.jpg" width="88" height="20" /></td>
                <td width="441" rowspan="2" align="left" valign="middle"><table width="88%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="middle"><br /><Br /><br /><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','430','height','35','src','caption_1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','caption_1' ); //end AC code
                </script>
                        <noscript>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="430" height="35">
                          <param name="movie" value="caption_1.swf" />
                          <param name="quality" value="high" />
                          <embed src="caption_1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="430" height="35"></embed>
                        </object>
                      </noscript></td>
                  </tr>
                  <tr>
                    <td height="31">&nbsp;</td>
                  </tr>
                </table></td>
                <td width="255" height="85" align="right" valign="bottom" class="link_green" style="padding-bottom:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr><td width="59%"><img src="images/logo_new.jpg" /></td>
                    <td width="41%" align="right" valign="middle" class="text10"><!--<a href="rv_radiocity.mp3" target="_blank" class="milestone">Audio Ad</a> <a href="rv_radiocity.mp3"><img src="images/audio_icon.jpg" width="30" height="22" border="0" /></a>--></td>
                    </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td align="right" valign="bottom" class="link_green" style="padding-bottom:5px;"><!--<a href="rv_radiocity.mp3" target="_blank" class="milestone">Audio Ad</a> <a href="rv_radiocity.mp3"><img src="images/audio_icon.jpg" width="30" height="22" border="0" /></a> |--> <a href="index.php" class="text10red">Home</a> | <a href="contact_us.php" class="text10red">Contact Us</a> | <a href="sitemap.html" class="text10red">Sitemap</a></td>
                </tr>
            </table>
              <map name="Map" id="Map22">
                <area shape="rect" coords="1,2,145,109" href="index.php" />
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
                <td width="696"><img alt="Design theb future" src="images/banner_testimonial.jpg" width="696" height="192" /></td>
                <td width="15">&nbsp;</td>
                <td align="left" valign="bottom"><table width="100%" height="192" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="30" align="left" valign="top"><img src="images/view_map.jpg" width="249" height="30" /></td>
                  </tr>
                  <tr>
                    <td height="162" align="center" valign="top" background="images/right_box_bg.jpg" style="padding-top:10px;"><a href="http://maps.google.co.in/maps/ms?hl=en&ie=UTF8&msa=0&msid=118243442162814431884.00048ea392ef0175d85e2&ll=12.924208,77.592788&spn=0.005354,0.006899&z=17" title="Click here to see RV-VLSI on Google Map" target="_blank"><img alt="Map" src="images/map_thumb.jpg" width="180" height="140" border="0" /></a></td>
                    <!--http://maps.google.co.in/maps/ms?hl=en&ie=UTF8&msa=0&ll=12.924407,77.593474&spn=0.011607,0.013797&z=16&msid=118243442162814431884.00048ea392ef0175d85e2-->
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="38" align="left" valign="middle" background="images/menu_bg.jpg">
			
						
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
            </table>
			
			
			</td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><img alt="Contact Us" src="images/title_contact_us.jpg" width="253" height="25" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="300" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="300" align="left" valign="top" class="sub_button"><table cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td>36th cross, 26th main<br />
                                        Jayanagar 4th T Block<br />
                                        Bangalore - 560041. </td>
                                      <td><!--Course Information: <br>                        <a href="mailto:course.info@rv-vlsi.com">courses@rv-vlsi.com </a> --></td>
                                    </tr>
                                    <tr>
                                      <td>Phone: +91-80-40788574 (G0-RV-VLSI) <br />
                                        Fax:     +91-80-26654920 </td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="10" align="left" valign="top" class="sub_button"></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="sub_button">Enquiries : <a href="mailto:info@rv-vlsi.com" class="link_green">info@rv-vlsi.com</a></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="55">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center" valign="middle"><img alt="Contact Us" src="images/contact_phone.jpg" width="213" height="152" /></td>
                          </tr>
                        </table></td>
                        <td width="10" align="left">&nbsp;</td>
                        <td align="left" valign="top">
						<? if($msg==''){
					
					?>
						<form action="" method="post" name="myform" onSubmit="return check();">
                	<table border="0" cellpadding="1" cellspacing="1">
                		<tr>

								<td colspan="3" class="text10">For questions regarding the Center or Courses, please fill in the form below. And we'll get back to you at the earliest.</td>
       				  </tr>
                		
                		<tr>
								<td colspan="3"><span class="error"></span>&nbsp;</td>
       				  </tr>

                		<tr>
								<td colspan="3">&nbsp;</td>
       				  </tr>
                    <tr>
                      <td width="172" class="boldText"><strong class="text11"> Title:</strong></td>
                      <td colspan="2" class="body">
                       <select name="Title" class="box">
						<option value="Mr." selected>Mr.</option>

						<option value="Ms.">Ms.</option>
						</select>                      </td>
                    </tr>
                    <tr>
                      <td class="boldText"><strong class="text11"> Name:</strong></td>
                      <td colspan="2" class="body">
                        <input name="Name" value="<?=$_REQUEST["Name"]?>" class="box"  size="34" maxLength="25">

                        <span class="text11">*</span> </td>
                    </tr>
                    <tr>
							<td class="boldText"><strong class="text11"> Phone:</strong></td>
                    		<td colspan="2" class="nortex"><input name="Phone" value="<?=$_REQUEST[Phone];?>" class="box"  size="34" maxLength="25">
											<span class="text11">*</span></td>
               		  </tr>
                    <tr>
							<td class="boldText"><strong class="text11"> Email:</strong></td>
                    		<td colspan="2" class="nortex"><input name="Email" class="box" value="<?=$_REQUEST[Email];?>" size="34" maxLength="50">
											<span class="text11">*</span></td>
               		  </tr>
                    <tr>

                      <td class="boldText"><strong class="text11">Occupation:</strong></td>
                      <td colspan="2" class="body">
                        <input name="Occupation" type="radio" value="Employed">
						<label for="Employed"><span class="text11">Employed</span></label>
						<span class="text11">&nbsp;&nbsp;&nbsp;
						<input name="Occupation" type="radio" value="Student">
						<label for="Student">Student</label>
						</span>
						<label for="Student"></label></td>
                    </tr>
                    <tr>
                      <td class="boldText"><strong class="text11"> Institute/Organization:</strong></td>
                      <td colspan="2" class="body">
                        <input name="Org" class="box" value="<?=$_REQUEST["Org"];?>" size="34" maxLength="25">                      </td>
                    </tr>
                    <tr>

                      <td valign="top" class="boldText"><strong class="text11">Address:</strong></td>
                      <td colspan="2" class="body">
                        <textarea name="Address" rows="3" cols="25" wrap="soft" style="width:225px;" ><?=$_REQUEST["Address"];?></textarea> </td>
                    </tr>
                    <tr>
                      <td valign="top" class="boldText"><strong class="text11">Comments /Questions:</strong></td>
                      <td colspan="2" valign="top" class="body">

                        <textarea name="Comments" rows="4" cols="25" wrap="soft" style="width:225px;" ><?=$_REQUEST["Comments"];?></textarea>                      </td>
                    </tr>
                    <tr>
                      <td class="body">&nbsp;</td>
                      <td colspan="2" class="body">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="body" align="right"><input name="reset" type="reset" class="button" id="reset" value="Reset" /></td>

                      <td width="334"  class="body"> <input name="sendmessage" type="submit" class="button"  value="Submit"> </td>
                      <td width="119" align="right" class="body"><div align="center">
                       
                      </div></td>
                    </tr>
                </table>
			</form>
			
			<? } else { ?>
				<table cellSpacing="1" border="0" id="table2" width="100%">
						<tr>
						<td class="sub_button">Thank you!</td>
						</tr>
						<tr>
						<td class="text10"><?=$msg?></td>
						</tr>
						<tr>
						<td></td>
						</tr>
				</table>
		<? } ?>
			</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="15">&nbsp;</td>
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
<li><a href="rsst.php" class="border_top" style="cursor:pointer;">Rashtreeya Sikshana Samiti Trust</a></li>
<li><a href="ceo_message_about.php" style="cursor:pointer;">CEO Message</a></li>
<li><a href="gov_council.php" style="cursor:pointer;">Governing Council</a></li>
<li><a href="strategy.php" style="cursor:pointer;">Strategic Advisory Board</a></li>
</ul>
</body>
</html>
