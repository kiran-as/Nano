<?  include_once('db/dbconfig.php');


$page_content=mysql_query("select * from $pages_table where cn_id=1 ") or die("culdnot:".mysql_error());
$contet=mysql_fetch_array($page_content);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="RV-VLSI,VLSI,Electronic,Design,FPGA, ASIC, Embedded Systems,Admission, Analog mixed signal domains, bangalore ,Karnataka , India,BE Projects for Electronic Engineers, University provided BE Projects, VLSI Training in Bangalore, VLSI Training in Bangalore with BE project, VLSI & Embedded system BE Projects, VTU proved BE projects, BE Projects for Electronic Engineers">

<title>RV-VLSI: ASIC VLSI Training Institute offering courses using Mentor, Synopsys, Cadence and Industry Standard Tools</title>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.button_white
{
color:#FFFFFF;
}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="jquery/development-bundle/themes/base/jquery.ui.all.css">
	<script src="jquery/js/jquery-1.4.4.min.js"></script>
	<script src="jquery/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="jquery/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="jquery/development-bundle/ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="jquery/development-bundle/demos/demos.css">
	<script>
	$(function() {
		$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				}
			}
		});
	});
	</script>

 <script>function example_ajax_request(dvid) {
  $('#ui-tabs-'+dvid).html('<div align="center"><img src="images/ajax-loader-2.gif" width="220" height="19" /></div>');
 // $('#example-placeholder').load("/examples/ajax-loaded.html");
}</script>

<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>

<style type="text/css">
<!--
.style1 {font-size: 12px; font-style: normal; color: #000000; text-decoration: none; font-family: Tahoma, Verdana, Arial;}
-->
</style>
</head>

<body >

<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="143" rowspan="2"><img alt="RV-VLSI Design Center" src="images/logo.jpg" width="143" height="110" border="0" usemap="#Map" />
                  <map name="MapMap" id="MapMap">
                    <area shape="rect" coords="0,2,107,97" href="index.php" />
                  </map></td>
                <td width="18" rowspan="2">&nbsp;</td>
                <td width="91" rowspan="2" align="left" valign="middle"><img alt="RV-VLSI" src="images/rv_vlsi.jpg" width="88" height="20" /></td>
                <td width="430" rowspan="2" align="left" valign="middle"><table width="88%" border="0" cellspacing="0" cellpadding="0">
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
                <td width="296" height="85" align="right" valign="bottom" class="link_green" style="padding-bottom:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr><td width="59%"><img src="images/logo_new.jpg" /></td>
                    <td width="41%" align="right" valign="middle" class="text10"><a href="rv_radiocity.mp3" target="_blank" class="milestone">Audio Ad</a> <a href="rv_radiocity.mp3"><img src="images/audio_icon.jpg" width="30" height="22" /></a></td>
                    </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td align="right" valign="bottom" class="link_green" style="padding-bottom:5px;"><a href="index.php" class="text10red">Home</a> | <a href="contact_us.php" class="text10red">Contact Us</a>|<a href="<?=$server_url?>/recruiter_login.php" class="text10red">Recruiter Login</a> | <? if($_SESSION[m_id]!='') {?><a href="logout.php" class="text10red">Logout</a><? }else {?><a href="login.php" class="text10red">Student Login</a><? }?> | <a href="sitemap.html" class="text10red">Sitemap</a></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','960','height','233','src','home_2_slide_new','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','home_2_slide_new' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="960" height="233">
                  <param name="movie" value="home_2_slide_new.swf" />
                  <param name="quality" value="high" />
                  <embed src="home_2_slide_new.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="960" height="233"></embed>
                </object></noscript></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="38" align="left" valign="middle" background="images/menu_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="86" align="center" valign="middle" class="button_white"><a href="institute.php" class="button_white">Institute</a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="131" align="center" valign="middle" class="button_white"><a href="program_offerings.php" class="button_white">Program Offerings</a><a href="#" class="button_white"></a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="93" align="center" valign="middle" class="button_white"><a href="admission.php" class="button_white">Admissions</a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="107" align="center" valign="middle" class="button_white"><a href="infrastructure.php" class="button_white">Infrastructure</a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="79" align="center" valign="middle" class="button_white"><a href="faculty.php" class="button_white">Faculty</a><a href="#" class="button_white"></a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="97" align="center" valign="middle" class="button_white"><a href="placements.php" class="button_white">Placements</a></td>
                <td align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="104" align="center" valign="middle" class="button_white"><a href="testimonial.php" class="button_white">Testimonials</a></td>
                <td align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="71" align="center" valign="middle" class="button_white"><a href="career.php" class="button_white">Careers</a></td>
                <td align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="115" align="center" valign="middle" class="button_white"><a href="news_events.php" class="button_white">News  &amp; Events</a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td align="center" valign="middle" class="button_white"><a href="faq.php" class="button_white">FAQ</a></td>
              </tr>
            </table></td>
          </tr>