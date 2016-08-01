<? include_once('db/dbconfig.php');
					
		
$news_result=mysql_query("select * from $news_events_table where nw_id =25 ") or die(mysql_error());
$j=1;
$no=mysql_num_rows($news_result);
		$news=mysql_fetch_array($news_result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="RV-VLSI,VLSI,Electronic,Design,FPGA, ASIC, Embedded Systems,Admission, Analog mixed signal domains, bangalore ,Karnataka , India,BE Projects for Electronic Engineers, University provided BE Projects, VLSI Training in Bangalore, VLSI Training in Bangalore with BE project, VLSI & Embedded system BE Projects, VTU proved BE projects, BE Projects for Electronic Engineers">
<title>RV-VLSI Design Center - Placements</title>
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
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
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
              <map name="MapMap" id="MapMap">
                <area shape="rect" coords="1,2,108,97" href="index.php" />
              </map>
              <map name="MapMap" id="MapMap">
                <area shape="rect" coords="1,2,108,97" href="index.php" />
              </map>
              <map name="MapMap" id="MapMap">
                <area shape="rect" coords="1,2,108,97" href="index.php" />
              </map></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="696"><img  alt="Design the future @ RV-VLSI"src="images/banner_testimonial.jpg" width="696" height="192" /></td>
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
                <!--<td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
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
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><img alt="BE Projects" src="images/title_news_events.jpg" width="253"  height="25" /></td>
                    <td align="right" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" valign="top">&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td colspan="2" align="left" valign="top" class="text10"></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" valign="top" class="text10">
					
					<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border:1px solid #ccc; padding:10px;">
    <tbody> 
        <?  if($news[lw_image1]!=''|| $news[lw_image2]!=''|| $news[lw_image3]!='' || $news[lw_image1]!=0|| $news[lw_image2]!=0|| $news[lw_image3]!=0)
		{?>
        
       <tr>
            <? 
				 		 				 
				 
					 // $image=stripslashes($news[lw_image.$i]);
					
					 if($news[lw_image1]!='' || $news[lw_image1]!=0)
					 {
					  ?> 
            <td valign="middle" align="left" height="80" width="180"><img src="<?="logos/".$news[lw_image1]?>"  border="0" /> </td>
            <? } if($news[lw_image2]!=''|| $news[lw_image2]!=0)
					 {
					  ?>
            <td valign="top" align="center" height="80" width="180" ><img src="<?="logos/".$news[lw_image2]?>" border="0" /></td>
            <? } if($news[lw_image3]!=''|| $news[lw_image3]!=0)
					 {
					  ?>
            <td valign="top" align="right" height="80" width="180"><img src="<?="logos/".$news[lw_image3]?>" border="0" /></td>
            <? }?>
        </tr>
         <tr>
            <td valign="top" align="left" width="180">&nbsp;</td>
            <td valign="top" align="left" width="180">&nbsp;</td>
            <td valign="top" align="left">&nbsp;</td>
        </tr> <? }?>
         <tr>
            <td colspan="3" align="center" valign="top" style="font-size:16px; font-weight:bold;"><?=stripslashes($news[nw_title]);?>            </td>
            </tr> <tr>
            <td valign="top" align="left" width="180">&nbsp;</td>
            <td valign="top" align="left" width="180">&nbsp;</td>
            <td valign="top" align="left">&nbsp;</td>
        </tr>
                 <? 
				 
				 for($i=1;$i<=15;$i++) {
					 
					  $sub_title=stripslashes($news[nw_sub_title.$i]);
					  $image=stripslashes($news[nw_image.$i]);
					
					 if($sub_title!='' && $image!='' && file_exists("news_images/".$image))
					 {
					  ?>
					  <tr>
            <td colspan="3" align="left" valign="middle" class="sub_button"><img height="8" width="6" src="images/arrow_2.jpg" alt="" /><a class="sub_link" href="news_images/<?=$image ?>" rel="lightbox[roadtrip]" title="<?=$sub_title?>"><?=$sub_title?></a> </td>
            </tr>  <tr>
            <td valign="top" align="left" width="180">&nbsp;</td>
            <td valign="top" align="left" width="180">&nbsp;</td>
            <td valign="top" align="left">&nbsp;</td>
        </tr> 
				   
               
      
       

				
                
                
                <? } } ?>
                 <tr>
            <td colspan="3" align="left" valign="middle"><?=stripslashes($news[nw_description]);?>  </td>
            </tr>	
                    </tbody>
</table>				</td>
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
                        <td height="340" align="center" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','235','height','170','src','right_caption_placement','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','right_caption_placement' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="235" height="170">
                          <param name="movie" value="right_caption_placement.swf" />
                          <param name="quality" value="high" />
                          <param name="wmode" value="transparent" />
                          <embed src="right_caption_placement.swf" width="235" height="170" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="transparent"></embed>
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


<map name="Map" id="Map">
<area shape="rect" coords="7,3,165,23" href="testimonial.php" />
</map>
</body>
</html>
