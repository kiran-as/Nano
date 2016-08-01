<?php  include_once('db/dbconfig.php');
error_reporting(E_ALL ^ E_NOTICE); 
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
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="js/SpryEffects.js"></script>
<link href="js/samples.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/glide-scroll-h.css" type="text/css"/>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/dw_scrollObj.js" type="text/javascript"></script>
<script src="Scripts/dw_glidescroll.js" type="text/javascript"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
/*************************************************************************
  This code is from Dynamic Web Coding at www.dyn-web.com
  Copyright 2001-4 by Sharon Paine 
  See Terms of Use at www.dyn-web.com/bus/terms.html
  regarding conditions under which you may use this code.
  This notice must be retained in the code as is!
*************************************************************************/

function initScrollLayer() {
  // arguments: id of layer containing scrolling layers (clipped layer), id of layer to scroll, 
  // if horizontal scrolling, id of element containing scrolling content (table?)
  var wndo = new dw_scrollObj('wn', 'lyr1', 't1');
  
  // pass id('s) of scroll area(s) if inside table(s)
  dw_scrollObj.GeckoTableBugFix('wn'); 
}
</script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="script.js"></script>
<!-- <link rel="stylesheet" type="text/css" media="screen" href="cycle.css" />--->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="http://malsup.github.com/chili-1.7.pack.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>

<script type="text/javascript" src="http://malsup.github.com/jquery.easing.1.3.js"></script>
<script type="text/javascript">
$.fn.cycle.defaults.timeout = 6000;
$(function() {
    // run the code in the markup!
    $('table pre code').not('#skip,#skip2').each(function() {
        eval($(this).text());
    });
    
    $('#s4').before('<div id="nav" class="nav">').cycle({
        fx:     'turnDown',
        speed:  'fast',
        timeout: 0,
        pager:  '#nav'
    });
});

function onBefore() {
    $('#output').html("Scrolling image:<br>" + this.src);
    //window.console.log(  $(this).parent().children().index(this) );
}
function onAfter() {
    $('#output').html("Scroll complete for:<br>" + this.src)
        .append('<h3>' + this.alt + '</h3>');
}
</script>
<link rel="stylesheet" type="text/css" href="style.css" />

        <style type="text/css">
        a {
			color:#000;
			text-decoration:none;
			cursor:default;
			}
        </style></head>

<body onload="initScrollLayer()">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="148" rowspan="2" style="cursor:pointer;"><img alt="RV-VLSI Design Center" src="images/RV-Institute_logo.jpg" width="148" height="110" border="0" usemap="#Map" />
                  <map name="MapMap" id="MapMap">
                    <area shape="rect" coords="0,2,107,97" href="index.php" />
                  </map></td>
                <td width="35" rowspan="2">&nbsp;</td>
                <td width="52" rowspan="2" align="left" valign="middle" style="color:#cc0000; font-size:12px; font-weight:bold; text-align:center;"><!--<img src="images/ATT_stamp_medium.jpg" width="107" height="69" border="0" style="margin:0px 0px 5px 0px;" />--></td>
                <td width="480" rowspan="2" align="left" valign="middle"><table width="82%" border="0" cellspacing="0" cellpadding="0">
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
                <td width="502" height="85" align="right" valign="bottom" class="link_green" style="padding-bottom:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr><td width="59%"><img src="images/logo_new.jpg" /></td>
                    <td width="41%" align="right" valign="middle" class="text10"><!--<a href="rv_radiocity.mp3" target="_blank" class="milestone">Audio Ad</a> <a href="rv_radiocity.mp3"><img src="images/audio_icon.jpg" width="30" height="22" /></a>--> </td>
                    </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td align="right" valign="bottom" class="link_green" style="padding-bottom:5px; cursor:pointer;" ><!--<a href="rv_radiocity.mp3" target="_blank" class="milestone" style="cursor:pointer;">Audio Ad</a> <a href="rv_radiocity.mp3" style="cursor:pointer;"><img src="images/audio_icon.jpg" width="30" height="22" /></a> |--> <a href="index.php" class="text10red" style="cursor:pointer;">Home</a> | <a href="contact_us.php" class="text10red" style="cursor:pointer;">Contact Us</a> | <a href="sitemap.html" class="text10red" style="cursor:pointer;">Sitemap</a></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="960" height="233" id="FlashID" title="rvvlsinewbanner">
                  <param name="movie" value="rvvlsi_newbanner.swf" />
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="7.0.70.0" />
                  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                  <param name="expressinstall" value="Scripts/expressInstall.swf" />
                  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                  <!--[if !IE]>-->
                  <object type="application/x-shockwave-flash" data="rvvlsi_newbanner.swf" width="960" height="233">
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
                    <td height="20"></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<!--  <td width="304" align="left" style="padding-right:10px;"><a href="#"><font color="#FF0000" ><marquee bgcolor="#ECECFF" scrolldelay="180" target="_blank" style="font-family: Verdana; font-size: 12pt;"><img src="images/launched_coursesnew.jpg" width="267" height="24" border="0" /></marquee></font></a></td>-->
                 <td width="220" align="left" style="padding-left:10px;"><!--<img  alt="BE_Projects" src="images/BE-Projectsnew.png" width="220" height="24" border="0" usemap="#Map6" />--> </td>
                    <td width="204" align="left" style="padding-left:50px;"><img  alt="CEO Message" src="images/free_resume_builder.gif" width="167" height="24" border="0" usemap="#Map5" /> </td>
                    <td width="175" align="left"><img  alt="Course Planner" src="images/course_planner.jpg"  border="0" usemap="#Map2" /></td></tr>
                      <tr>
                        <td colspan="3" align="left" valign="top"><img  alt="Welcome to RV-VLSI Design Center" src="images/welcome.jpg"  height="42" /></td>
                        <td width="4">&nbsp;</td>
                        <td width="3" align="right" valign="top"></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="15"></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="text10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="top" class="text10">
						<?php //echo stripslashes($contet[cn_description]);?>
                        <div class="gain_style">GAIN</div>
                        <div class="gain_parts"><p style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:16px; margin:0px; padding:4px 0px 8px 10px; font-weight:bold; "><span class="hotspot" onmouseover="tooltip.show('Taught by expert with easy to understand live demos.');" onmouseout="tooltip.hide();">Interest </span></p>

<p style="font-family:Verdana,Arial,Helvetica,sans-serif;  padding:8px 0px 8px 10px; margin:0px;"><span class="hotspot" onmouseover="tooltip.show('Practice solving real industry problems');" onmouseout="tooltip.hide();">Confidence</span></p>

<p style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:16px; padding:8px 0px 8px 10px; margin:0px; font-weight:bold; "><span class="hotspot" onmouseover="tooltip.show('Taught by great teachers with real world experience');" onmouseout="tooltip.hide();">Knowledge</span></p>

<p style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:16px; padding:8px 0px 4px 10px; margin:0px; font-weight:bold; "><span class="hotspot" onmouseover="tooltip.show('Learn how to use industry standards software tools.');" onmouseout="tooltip.hide();">Experience</span	></p></div><div style="float:right"><a href="RV_VLSI_Application_Form_PDF.pdf"><img src="images/download.icon_2new1.jpg" alt="RV-VLSI Application Form" border="0" style="padding-bottom:15px; cursor:pointer;" /></a></div>
                        <!--<p style=" color:#425843; font-weight:bold;padding:0px;margin:0px; cursor:default; "><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:30px;">GAIN</span></p>
<p style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:12px; color:#000; padding-left:68px; font-weight:bold; "><a href="javascript:;" id="Easy to learn" class="tooltip2">Interest </a></p>

<p style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:12px; padding-left:68px; font-weight:bold;"><a href="javascript:;" id="Practice solving real industry problems" class="tooltip2">Confidence</a></p>

<p style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:12px;padding-left:68px; font-weight:bold; "><a href="javascript:;" id="Taught by great teachers with real world experience" class="tooltip2">Knowledge</a></p>

<p style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:12px;padding-left:68px; font-weight:bold; "><a href="javascript:;" id="We teach many ways of how not to design a chip  " class="tooltip2">Experience</a></p>-->
						
						</td>
                      </tr>
                     
                    </table></td>
                  </tr>
                  <tr>
                    <td height="15" align="left" valign="top"></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="208" rowspan="2" align="left" valign="top"><table width="208" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="208"><img alt="Program Offering" src="images/program_offerings_box_top.jpg" width="208" height="71" /></td>
                          </tr>
                          <tr>
                            <td height="126" align="left" valign="top" background="images/box_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							<?php
$prog_result=mysql_query("select * from $programers_table where pr_description!='' order by pr_id asc limit 0,4 ") or die("culd not:".mysql_error());
while($prg=mysql_fetch_array($prog_result))
		{
	?>
							
		<tr>
                                <td width="20" align="left" valign="top">&nbsp;</td>
                                <td width="10" align="left" valign="top"><img src="images/arrow_1.jpg" width="8" height="9" style="padding:3px 0px 0px 0px;" /></td>
                                <td width="5" align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top" class="text10greenprog"><a href="program_offerings.php" class="text10greenprog"><?php echo stripslashes($prg[pr_title]);?></a></td>
                              </tr>
                              <tr>
                                <td height="3" colspan="4" align="left" valign="top"></td>
                              </tr>					
							
	<?php } 
	
	$CourseArray= array('Short Module Programs','Corporate Training Programs');
	if(mysql_num_rows($prog_result)<4)
			{
	
			
			for($j=0;$j<count($CourseArray);$j++)
				{
			
			?>						
			
		<tr>
                                <td width="20" align="left" valign="top">&nbsp;</td>
                                <td width="10" align="left" valign="top"><img src="images/arrow_1.jpg" width="8" height="9" /></td>
                                <td width="5" align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top" class="text10green"><a href="program_offerings.php" class="text10green"><?php echo stripslashes($CourseArray[$j]);?></a></td>
                              </tr>
                              <tr>
                                <td height="3" colspan="4" align="left" valign="top"></td>
                              </tr>	
		<?php
		}
			}
	 ?>						
                            
                              <tr>
                                <td colspan="4" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="right" valign="middle"><a href="program_offerings.php"><img src="images/read_more_2.jpg" width="63" height="11" border="0" style="padding-right:10px; cursor:pointer;" /></a></td>
                                  
                                    <tr>
                                    <td width="20">&nbsp;</td>
                                    </tr>
                                 
                                </table></td>
                                </tr>

                            </table></td>
                          </tr>
                              <tr>
                            <td><img src="images/view_callender.jpg" width="208" height="34" border="0" style="cursor:pointer;" /></td>
                          </tr>
                        </table></td>
                        <td rowspan="2" align="left" valign="top">&nbsp;</td>
                        <td width="208" rowspan="2" align="left" valign="top"><table width="208" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="208"><img alt="News & Events" src="images/news_events_box_top.jpg" width="208" height="71" /></td>
                          </tr>
                          <tr>
                            <td height="126" align="left" valign="top" background="images/box_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							
							<?php
$news_result=mysql_query("select * from 	$news_events_table  order by nw_id asc limit 0,4 ") or die(mysql_error());
while($news=mysql_fetch_array($news_result))
		{
			?>
							
		 <tr>
                                <td width="20" align="left" valign="top">&nbsp;</td>
                                <td width="10" align="left" valign="top"><img src="images/arrow_1.jpg" width="8" height="9" style="padding:3px 0px 0px 0px;" /></td>
                                <td width="5" align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top" class="text10green"><a href="news_events.php" title="Press Release - The Hindu" class="text10green"  ><?php echo stripslashes($news[nw_title]);?> </a></td>
                              </tr>
                              <tr>
                                <td height="15" colspan="4" align="left" valign="top"></td>
                              </tr>					
		<?php
		}?>					
							
                              
                              
                              
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="images/news_events_box_bottom.jpg" width="208" height="34" border="0" usemap="#Map" /></td>
                          </tr>
                        </table></td>
                        <td rowspan="2" align="left" valign="top">&nbsp;</td>
                        <td width="239" height="24" align="left" valign="top" class="slider"><span style="color:#516a53; padding-top:15px;">Videos</span></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">
						<!--<img src="images/video.jpg" width="178" height="143" />-->
                        <?
				//$video_result=mysql_query("select * from $video_table where vi_status=1 order by rand() limit 0,1 ") or die("video".mysql_error());
				//$video=mysql_fetch_array($video_result);
				//echo stripslashes($video[vi_url])
				
						?>
                        <div id="s2" class="pics">
                          <? $video_result	=mysql_query("select * from $video_table where vi_status=1 ") or die("video".mysql_error());
				while($video=mysql_fetch_array($video_result))
				{ 
					echo stripslashes($video[vi_url]);
					}
				  // ?>
				 
                         <!-- <img src="http://cloud.github.com/downloads/malsup/cycle/beach1.jpg" width="200" height="200" />
            <img src="http://cloud.github.com/downloads/malsup/cycle/beach2.jpg" width="200" height="200" />
            <img src="http://cloud.github.com/downloads/malsup/cycle/beach3.jpg" width="200" height="200" />-->
            <!--<div class="clear"></div>
                       <p style="margin:200px 0 0 0">nsvdsvd</p>   -->
                    </div>
				   
				   
				   
                        <div class="nav" style="padding-left:50px; padding-top:5px;"><a style="cursor:pointer; " id="prev2" href="#"><img src="images/back.jpg" /></a> <a style="cursor:pointer;" id="next2" href="#"><img src="images/next.jpg" /></a></div>
                          <div style="display:none;"><pre><code class="mix">$('#s2').cycle({
    fx:     'fade',
    speed:  'fast',
    timeout: 0,
    next:   '#next2',
    prev:   '#prev2'
});</code></pre></div>
                        </td>
                      </tr>
                    </table></td>
                  </tr>
                  
                </table></td>
                <td width="20">&nbsp;</td>
                <td width="250" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
				  <tr> <td width="220" height="50" align="left" style="padding-left:10px;"><img  alt="be_projects" src="images/be_animate.gif" width="220" height="24" border="0" usemap="#Map7" /><!--<img  alt="be_projects" src="images/BE-Projectsnew.png" width="220" height="24" border="0" usemap="#Map7" /> --> </td> </tr>
                  <tr>
                  <td height="2"></td>
                  </tr>
                  <tr>
                  <td height="25" width="248" align="center" valign="top"><span><img src="images/tech_partnernew.jpg" width="240" height="25" border="0" /></span></td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">
                    <a href="http://nanochipsolutions.com/job_seeker_login.php" target="_blank"><img src="images/Nanologo.jpg" width="212" height="70" border="0" style="margin:10px 0px 5px 0px; cursor:pointer;" /></a>&nbsp;
                    <!--<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','159','height','159','src','circle_4','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','circle' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="159" height="159">
                      <param name="movie" value="circle.swf" />
                      <param name="quality" value="high" />
                      <embed src="circle.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="159" height="159"></embed>
                    </object></noscript>--></td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>
                  <td height="25" width="248" align="center" valign="top"><span><img src="images/authrized_techincal.jpg" width="240" height="25" border="0" /></span></td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">
                    <a href="program_offerings.php" style="cursor:pointer;"><img src="images/ATT_stamp_medium.jpg" width="180" height="117" border="0" style="margin:0px 0px 5px 0px;" /></a></td>
                    </tr>
                  
                  <tr>
                    <td height="10" align="center" valign="middle"></td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle"><table style="border:solid 1px #cdd3ce" width="100%" height="120" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="top" background="images/facility_tour_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="sub_link"><div align="center">Photo Gallery </div></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="3" cellspacing="0">
                              
                              <tr>
                                <td align="right" valign="middle"><a href="javascript:;" onclick="dw_scrollObj.scrollBy('wn',145,0); return false" title="Click to scroll"><img src="images/left_1.jpg" width="17" height="14" alt="" /></a>
                                    <!-- scrolling layers -->
                                  <!-- end hold div -->
                                  <a href="javascript:;" onclick="dw_scrollObj.scrollBy('wn',-145,0); return false" title="Click to scroll"></a> </td>
                                <td align="center" valign="middle"><div id="hold">
                                    <div id="wn">
                                       
                                     <div id="lyr1" class="content">
                                     
                                        <table id="t1" cellpadding="0" cellspacing="0" border="0">
                                          <tr>
                                            <td width="145"><a href="images/1_big.jpg"  rel="lightbox[roadtrip]" title="View of Abhyas"><img src="images/1_1.jpg" alt="" /></a></td>
                                            <td width="145"><a href="images/2_big.jpg"  rel="lightbox[roadtrip]" title="Learn to Learn @ RV-VLSI"><img src="images/2_1.jpg" alt="" /></a></td>
                                            <td width="145"><a href="images/3_big.jpg"  rel="lightbox[roadtrip]" title="Infrastructure"><img src="images/3_1.jpg" alt="" /></a></td>
                                            <td width="145"><a href="images/4_big.jpg"  rel="lightbox[roadtrip]" title="Shrama"><img src="images/4_1.jpg" alt="" /></a></td>
                                            <td width="145"><a href="images/5_big.jpg"  rel="lightbox[roadtrip]" title="Shrama"><img src="images/5_1.jpg" alt="" /></a></td>
                                            <td width="145"><a href="images/6_big.jpg"  rel="lightbox[roadtrip]" title="Team Work @ RV-VLSI"><img src="images/6_1.jpg" alt="" /></a></td>
                                          </tr>
                                        </table>
                                      </div>
                                    </div>
                                  <!-- end wn div -->
                                </div></td>
                                <td align="left" valign="middle"><a href="javascript:;" onclick="dw_scrollObj.scrollBy('wn',-145,0); return false" title="Click to scroll"><img src="images/right_1.jpg" width="17" height="14" alt="" /></a><a href="javascript:;" onclick="dw_scrollObj.scrollBy('wn',145,0); return false" title="Click to scroll"></a></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="5"></td>
                  </tr>
                  <tr>
                    <td><a href="contact_us.php"><img  alt="RV-VLSI Design Center , 36th cross , 26th main , jayanagar 4th block."  src="images/contact_home.jpg" width="249" height="147" border="0" /></a></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td height="20" colspan="3" align="center" valign="middle"></td>
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

<map name="Map" id="Map"><area shape="rect" coords="128,5,201,21" href="news_events.php" />
</map>
<map name="Map2" id="Map2">
<area shape="rect" coords="-4,1,168,22" href="program_planner_rvnew.php" />
</map><map name="Map5" id="Map5">
<area shape="rect" coords="-5,1,167,22" href="http://nanochipsolutions.com/job_seeker_login.php" target="_blank" />
</map>
<map name="Map6" id="Map6">
<area shape="rect" coords="-6,1,228,22" href="be_projects_8th.php" />
</map>
<map name="Map7" id="Map7">
<area shape="rect" coords="-6,1,228,22" href="be_projects.php" />
</map>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-2112781-1";
urchinTracker();
</script>

<map name="Map3" id="Map3"><area shape="rect" coords="-3,3,173,23" href="program_offerings.php?id=28" />
</map>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID");
//-->
</script>

<ul id="ddsubmenu1" class="ddsubmenustyle">
<li><a href="rsst.php" class="border_top" style="cursor:pointer;">Rashtreeya Sikshana Samiti Trust</a></li>
<li><a href="ceo_message_about.php" style="cursor:pointer;">CEO Message</a></li>
<li><a href="gov_council.php" style="cursor:pointer;">Governing Council</a></li>
<li><a href="strategy.php" style="cursor:pointer;">Strategic Advisory Board</a></li>
</ul>
</body>
</html>
