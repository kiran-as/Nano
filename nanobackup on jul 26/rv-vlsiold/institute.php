<? include_once('db/dbconfig.php');

$page_details=mysql_query("select * from $pages_table where cn_id=2") or die(mysql_error());
$p_details=mysql_fetch_array($page_details);
$page_subcontent=mysql_query("select * from  $sub_page_content where cn_id=2") or die(mysql_error());

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
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="148" rowspan="2"><img alt="RV-VLSI Design Center" style="cursor:pointer;" src="images/RV-Institute_logo.jpg" width="148" height="110" border="0" usemap="#Map" />
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
              <map name="Map" id="Map2">
                <area shape="rect" coords="1,2,143,117" href="index.php" />
              </map></td>
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
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><img alt="Institute" src="images/title_institute.jpg" width="253" height="25" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="25" align="left" valign="top" scope="col">&nbsp;</td>
                      </tr>
                     
                      <tr>
                        <td width="97%" align="left" valign="top" scope="col">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" scope="col">
						<div id="Acc2" class="Accordion">
						<?
						$total_rows=mysql_num_rows($page_subcontent);
						
						$j=1;
						while($sub_content=mysql_fetch_array($page_subcontent))
								{
								?>
						<div class="PaAccordionPanelne<?=$j;?>" id="cp<?=$j;?>">
			 <div class="AccordionPanelTab" onclick="
			 <?
			 for($i=1;$i<=$total_rows;$i++)
			 		{
					if($i!=$j)
						echo "cp$i.close();";
					}
			 ?>
			 " ><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td><?=stripslashes($sub_content[ps_title]);?></td>
				<td width="20" align="left" valign="middle">&nbsp;</td>
			  </tr>
			</table>
			</div>	
				<div class="AccordionPanelContent"><br/>
			<div class="AccordionPanel">
                       
			<?=stripslashes($sub_content[ps_description]);?>
			</div>
			</div>
			</div>
						
						
								<?  $j++;}?>
								
								
								
						</div>		
								
								
						
						</td>
                      </tr>

                            </table></td>
                  </tr>
                </table>
				</td>
                <td width="15">&nbsp;</td>
                <!--<td width="249" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                </table>
			</td>-->
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

</body>
</html>
