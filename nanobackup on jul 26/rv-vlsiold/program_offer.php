<? include_once('db/dbconfig.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="RV-VLSI,VLSI,Electronic,Design,FPGA, ASIC, Embedded Systems,Admission, Analog mixed signal domains, bangalore ,Karnataka , India,BE Projects for Electronic Engineers, University provided BE Projects, VLSI Training in Bangalore, VLSI Training in Bangalore with BE project, VLSI & Embedded system BE Projects, VTU proved BE projects, BE Projects for Electronic Engineers">
<title>RV-VLSI Design Center - Program Offering</title>
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
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryAccordion3.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="js/SpryEffects.js"></script>
<link href="js/samples.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
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
                <td width="143" rowspan="2"><img alt="RV-VLSI Design Center" src="images/logo.jpg" width="143" height="110" border="0" usemap="#Map" /></td>
                <td width="8" rowspan="2">&nbsp;</td>
                <td width="91" rowspan="2" align="left" valign="middle"><img alt="RV-VLSI" src="images/rv_vlsi.jpg" width="88" height="20" /></td>
                <td width="441" rowspan="2" align="left" valign="middle"><table width="91%" border="0" cellspacing="0" cellpadding="0">
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
                </table></td><td width="84" rowspan="2"><img src="images/logo_new.jpg" /></td>
                <td width="193" align="right" valign="bottom" class="link_green"><img src="images/contact_button.jpg" width="193" height="46" /></td>
              </tr>
              <tr><td align="right" valign="bottom" class="text10red" style="padding-bottom:5px;"><a href="index.php" class="text10red">Home</a> | <a href="contact_us.php" class="text10red">Contact Us</a> | <a href="sitemap.html" class="text10red">Sitemap</a></td>
              </tr>
            </table>
              <map name="Map" id="Map2">
                <area shape="rect" coords="1,2,141,108" href="index.php" />
              </map>
              <map name="Map" id="Map">
                <area shape="rect" coords="1,2,108,97" href="index.php" />
              </map>
              </td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="696"><img  alt="Nation wide Testing Center"src="images/banner_program_offerings.jpg" width="696" height="192" /></td>
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
                <td width="86" align="center" valign="middle" class="button_white"><a href="institute.php" class="button_white">Institute</a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="131" align="center" valign="middle" class="button_white"><a href="program_offerings.php" class="button_white">Program Offerings</a><a href="#" class="button_white"></a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="93" align="center" valign="middle" class="button_white"><a href="admission.php" class="button_white">Admissions</a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="107" align="center" valign="middle" class="button_white"><a href="infrastructure.php" class="button_white">Infrastructure</a></td>
               <!-- <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="79" align="center" valign="middle" class="button_white"><a href="faculty.php" class="button_white">Faculty</a><a href="#" class="button_white"></a></td>-->
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
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="41%" align="left" valign="top"><img  alt="Program Offering"src="images/title_program_offerings.jpg" width="253" height="25" /></td>
                    <td width="36%" align="right" valign="top"><!--<a href="be_projects.php"><img src="images/be_projects_blink2.gif" border="0" /></a>-->
				<a href="program_planner.php"><img  alt="cource planner"src="images/course_planner2.gif" border="0" /></a>	&nbsp;&nbsp;</td>
                    <td width="23%" align="right" valign="middle"><a href="program_calendar.php"><img alt="Program Offering" src="images/view_program_callender.jpg" border="0" /></a></td>
                  </tr>
                  <tr>
                    <td height="25" colspan="3" align="left" valign="top"><div align="right"><a href="program_calendar.php"></a></div></td>
                  </tr>
                  <tr>
                    <td colspan="3" align="left" valign="top" class="text10"><p align="justify">Ninety Three percent of VLSI jobs openings are in the following domains FPGA, ASIC and Embedded Systems. RV-VLSIs programs prepare for these job openings.</p>
                      <p align="justify">					
Course material and labs are designed by our experts with decades of industry experience to their credit. Fulltime faculties are industry veterans from USA with many working Silicon parts to their credit. Twenty five percent of the time is spent in theory sessions and seventh five percent in working closely with our experts on industry relevant projects using software tools from Synopsys, Cadence and Mentor Graphics.</p>
<p align="justify">We recognize the need for todays engineers to have the necessary soft-skills like communication and presentation skills, goal setting and time management, email etiquette and team building. These are embedded into the program structure. Regular interactions with our industry faculty will help you transform from an engineer to a professional with a low time to be productive to the industry.</p>
</td>
                  </tr>
                  <tr>
                    <td colspan="3" align="left" valign="top" ></td>
                  </tr>
                  <tr>
                    <td colspan="3" align="left" valign="top"><div id="programs" class="Accordion">
					<?
$programe_result=mysql_query("select * from $programers_table  where  pr_description!='' and pr_order!=0 order by pr_order asc ") or die(mysql_error());
$j=1;

$no=mysql_num_rows($programe_result);
		while($prg=mysql_fetch_array($programe_result))
				{
				?>
				<tr><td style="font-size:13px;" colspan="2"><a href="test.php?test_id=<?php echo $prg['pr_id'];?>"> <?=$prg['pr_title'];
		} ?>  </a>
		<input type="hidden" value="<?php echo $prg['pr_id'];?>" name="test"/>
		</td></tr>
				
						                   </td>
                  </tr>

                      </table></td>
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
                        <td height="10"></td>
                      </tr>
                      <tr>
                        <td height="425" align="center" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','235','height','330','src','right_caption_program_offerings','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','right_caption_program_offerings' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="235" height="220">
                          <param name="movie" value="right_caption_program_offerings.swf" />
                          <param name="quality" value="high" />
                          <param name="wmode" value="transparent" />
                          <embed src="right_caption_program_offerings.swf" width="235" height="220" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="transparent"></embed>
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
            <td align="right" valign="middle" class="copyright">All rights reserved, Copyright  RV-VLSI Design Center.</td>
            <td width="20">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">

	 <?
			 for($i=1;$i<=$no;$i++)
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
</body>
</html>
