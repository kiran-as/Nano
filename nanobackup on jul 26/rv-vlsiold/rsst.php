<? include_once('db/dbconfig.php');
error_reporting(E_ALL ^ E_NOTICE); 
$page_details=mysql_query("select * from $pages_table where cn_id=2") or die(mysql_error());
$p_details=mysql_fetch_array($page_details);
$page_subcontent=mysql_query("select * from  $sub_page_content where cn_id=2 order by ps_order asc") or die(mysql_error());

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="RV-VLSI,VLSI,Electronic,Design,FPGA, ASIC, Embedded Systems,Admission, Analog mixed signal domains, bangalore ,Karnataka , India,BE Projects for Electronic Engineers, University provided BE Projects, VLSI Training in Bangalore, VLSI Training in Bangalore with BE project, VLSI & Embedded system BE Projects, VTU proved BE projects, BE Projects for Electronic Engineers">
<title>RV-VLSI Design Center-Institute</title>
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
<script language="JavaScript" type="text/javascript" src="js/SpryCollapsiblePanel.js"></script>
<script language="JavaScript" type="text/javascript" src="js/SpryData.js"></script>

<link href="js/samples.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>

<style type="text/css">
<!--
.style1 {font-size: 12px; font-style: normal; color: #000000; text-decoration: none; font-family: Tahoma, Verdana, Arial;}
-->
</style>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="148" rowspan="2"><img alt="RV-VLSI Design Center" src="images/RV-Institute_logo.jpg" width="148" height="110" border="0" usemap="#Map" />
                  <map name="MapMap" id="MapMap">
                    <area shape="rect" coords="0,2,107,97" href="index.php" />
                  </map></td>
                <td width="28" rowspan="2">&nbsp;</td>
                <td width="35" rowspan="2" align="left" valign="middle"><!--<img src="images/ATT_stamp_medium.jpg" width="107" height="69" border="0" style="margin:0px 0px 5px 0px;" />--></td>
                <td width="489" rowspan="2" align="left" valign="middle"><table width="88%" border="0" cellspacing="0" cellpadding="0">
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
                <td width="265" height="85" align="right" valign="bottom" class="link_green" style="padding-bottom:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr><td width="59%"><img src="images/logo_new.jpg" /></td>
                    <td width="41%" align="right" valign="middle" class="text10"><!--<a href="rv_radiocity.mp3" target="_blank" class="milestone">Audio Ad</a> <a href="rv_radiocity.mp3"><img src="images/audio_icon.jpg" width="30" height="22" border="0" /></a>--></td>
                    </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td align="right" valign="bottom" class="link_green" style="padding-bottom:5px; padding-right:10px;"><!--<a href="rv_radiocity.mp3" target="_blank" class="milestone">Audio Ad</a> <a href="rv_radiocity.mp3"><img src="images/audio_icon.jpg" width="30" height="22" border="0" /></a> |--> <a href="index.php" class="text10red">Home</a> | <a href="contact_us.php" class="text10red">Contact Us</a> | <a href="sitemap.html" class="text10red">Sitemap</a></td>
                </tr>
            </table>
              <map name="Map" id="Map2">
                <area shape="rect" coords="1,2,143,117" href="index.php" />
              </map></td>
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
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><h1 style="font-size:18px;"><img src="images/rsst_img.png" width="362" height="25" border="0"/></h1></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="25" align="left" valign="top" scope="col" style="font-size:12px;"><img src="images/mkp_setty.jpg" style="float:left;"/>
                          <p>Rashtreeya Vidyalaya (RV) Group of Educational Institutions, a   conglomerate of   24 educational institutions run by the Rashtreeya   Sikshana Samiti Trust (RSST)   consists of philanthropists, businessmen,   professionals and academicians. The   institutions range from schools   to professional colleges offering management,   dental, engineering,   nursing and teacher education.</p>
                          <p><br />
                            RSST has been in the forefront of providing excellence in   education for   over 6 decades and operates all the institutions with   the main objective of   offering education with excellence to its   students without any bias. There are   over 16000 students and 1500   personnel in all its campuses situated at   Bangalore, the Silicon   Valley of India. The trust consists of the Board headed   by its   President, Mr. M K Panduranga Setty, a well known industrialist and past     director of Rotary International. <br />
  <br />
                            Today institutions of Rashtreeya   Sikshana Samiti Trust   (RSST) institutions are household names in the industrial   and   corporate circles. The last six decades has seen this Trust grow through     multiple institutions - each with its own integrated structure,   catering to the   growing needs of society.</p>
                          <p>The name spells it all. It is unique in its approach to   imparting education.   One of the fastest growing educational   institutions in the State of Karnataka,   it has presence in virtually   every field of academics right from Kindergarten to   Post-Graduate and   Research institutions. Humanities, Basic Sciences, teacher's   Training,   Dentistry, Engineering... the institutions cover almost all academic     streams. Its reach spans all sections of society - the privileged and   the under   privileged, the able and the disabled, cutting through   gender and age barriers. <br />
                            <br />
                            Late Sri Sivananda Sarma, a farsighted visionary, founded the first   institution of the trust in 1940.</p></td>
                      </tr>
                      <!--<tr>
                        <td align="left" valign="top" class="text10" scope="col">
						<?=stripslashes($p_details[cn_description]);?>
						
						</td>
                      </tr>-->
                      <tr>
                        <td width="97%" align="left" valign="top" scope="col"><h3 style="text-align:center; font-size:15px; background:#dddddd; padding:6px 0; margin:0; border-left:1px solid #999; border-top:1px solid #999; border-right:1px solid #999;">RV Instritution</h3></td>
                        
                      </tr>
                      <tr>
                        <td align="left" valign="top" scope="col"><table width="100%" border="0" style="border:1px solid #999; font-size:12px;"   bordercolor="#999999" cellspacing="3" cellpadding="6" >
                          <tr>
                            <td width="2%"bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td width="44%"bgcolor="#f5faf6">RV-VLSI Design Center</td>
                            <td width="2%"bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td width="52%"bgcolor="#f5faf6">R V Integrated School for the Disabled</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">	R V College of Engineering</td>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">R V Higher Primary School</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">RV Dental College &amp; Hospital</td>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">	R V Boys High School</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">RV Institute of Management</td>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">R V Shishu Vihar</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">RV College of Nursing</td>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">R V Teachers College including PG Center</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">RV College of Physiotherapy</td>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">		R V Teachers Training Institute</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">Foundation for Clean Energy & Environment</td>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">R V Girls High School</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">	SSMRV Degree College</td>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">RV Public School</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">	SSMRV PU College</td>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">RV Educational Consortium</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">NMKRV PU College for Women</td>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">RV Institute of Sanskrit and Gandhian Studies</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">	NMKRV College for Women & PG Center</td>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">RV Institute for Social Service and Skill Promotion</td>
                          </tr>
                          <tr>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">Shashwati (A museum)</td>
                            <td bgcolor="#f5faf6"><img src="images/arrow_1.jpg" style="float:left;"/></td>
                            <td bgcolor="#f5faf6">	RV Center for Mfg. Research &Technology Utilization</td>
                          </tr>
                        </table></td>
                        </tr>
                      <tr>
                        <td align="left" valign="top" scope="col"></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" scope="col"></td>
                      </tr>
                      

                            </table></td>
                  </tr>
                </table></td>
                <td width="15">&nbsp;</td>
                <td width="249" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="1">
                  <tr>
                    <td align="left" valign="top" background="images/right_box_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="10"></td>
                      </tr>
                      <tr>
                        <td height="510" align="center" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','235','height','330','src','partners_1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','partners_1' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="235" height="330">
                          <param name="movie" value="partners_1.swf" />
                          <param name="quality" value="high" />
                          <param name="wmode" value="transparent" />
                          <embed src="partners_1.swf" width="235" height="330" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="transparent"></embed>
                        </object>
</noscript></td>
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


<map name="Map" id="Map"><area shape="rect" coords="1,2,108,97" href="index.php" />
</map><script type="text/javascript">

 <?
			 for($i=1;$i<=$total_rows;$i++)
			 		{
					?>
					var cp<?=$i;?> = new Spry.Widget.CollapsiblePanel("cp<?=$i;?>");
				<?
					if($i==1)
						{ ?>
					cp<?=$i;?>.open(); <? 
						}else {  ?>
						cp<?=$i;?>.close();
					<? 
					} }?>



</script>
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
