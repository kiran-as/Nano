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
	}
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
                <td width="143" rowspan="2"><img alt="RV-VLSI Design Center" src="images/RV-Institute_logo.jpg" width="143" height="110" border="0" usemap="#Map" />
                  <map name="MapMap" id="MapMap">
                    <area shape="rect" coords="0,2,107,97" href="index.php" />
                  </map></td>
                <td width="14" rowspan="2">&nbsp;</td>
                <td width="29" rowspan="2" align="left" valign="middle"><!--<img src="images/ATT_stamp_medium.jpg" width="107" height="69" border="0" style="margin:0px 0px 5px 0px;" />--></td>
                <td width="519" rowspan="2" align="left" valign="middle"><table width="88%" border="0" cellspacing="0" cellpadding="0">
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
                    <td align="left" valign="top"><h1 style="font-size:18px;"><img src="images/sab_img.png" width="280" height="25" border="0"/></h1></td>
                  </tr>
                  
                  <tr>
                    <td align="left" valign="top">
                    <div>
                    <table cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Tahoma,Verdana,Arial">
                      <tr>
                        <th scope="col" align="left" valign="top"> </th>
                        </tr>
                      <tr>
                        <td scope="row" align="left" valign="top">RV-VLSI   deems it an honor to have on its Strategic Advisory Board, eminent     professionals from the VLSI industry and Academia alike. These   professionals are   persons with proven and exceptional capabilities and   bring to the RV-VLSI Board,   the distilled wisdom gained through   decades of experience in their chosen areas   of expertise. <br />
                          <br />
                          These are people who share the same passion, vision and     exhibit the same energy levels as the management of RV-VLSI to address   the much   talked about and burning issue of the huge chasm that   currently exists between   academic learning and the practical   requirements and expectations of   Industry.<br />
                          <br />
                          Members advise the CEO on matters relating to the current     trends and advancements in the Semiconductor Industry, and provide   valuable   inputs on structuring our offerings and collaborations with   industries in   research and education.</td>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top" height="25"> </th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"><strong>Strategic Advisory Board Member Profiles</strong></th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top" height="10"> </th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top" height="10"> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <th scope="col" align="left" valign="top" width="110"><img alt="" src="http://www.rv-vlsi.com/userfiles/subhash_pic.jpg" width="107" height="90" /></th>
                              <th scope="col" align="left" valign="top" width="10"> </th>
                              <th scope="col" align="left" valign="middle"><strong>Subhash Bal</strong> <br />
                                Director India Sales<br />	
                                Synopsys (India)   EDA Software Pvt. Ltd.</th>
                              </tr>
                            </tbody>
                          </table></th>
                        </tr>
                      <tr>
                        <td scope="row" align="left" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top"> </td>
                              </tr>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top" width="117" height="10"> </td>
                              </tr>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top" >Subhash   has 30 years plus experience primarily in networking, semiconductor and     EDA Industries. He has held executive positions in general   management,   marketing, sales and product development with both   start-ups and   multibillion-dollar organizations. As a senior member of   an executive staff, he   has played a key role in fund raising, IPO,   acquisition, restarts, building and   developing organizations. He has   also been a spokesperson and speaker at   industry conferences and   events because of his communication strength and   knowledge of the   intricacies of prevailing business situations and subject   matter. He   offers professional skills in marketing, business initiatives and     development, sales and marcom strategy; evangelizing new technology;   definition,   positioning, launch and management of product families;   OEM, End user sales,   channel management. He is adept in dealing with   chips, software, and board and   box products in both domestic and   international markets.</td>
                              </tr>
                            <tr>
                              <th colspan="3" scope="row" align="left" valign="top"> </th>
                              </tr>
                            <tr>
                              <th colspan="3" scope="row" align="left" valign="top"><strong>Education:<br />
                                <br />
                                </strong>
                                <ul>
                                  <li>MBA, University of Santa Clara; Santa Clara, CA</li>
                                  <li>MSEE, Carnegie Mellon University; Pittsburgh, PA</li>
                                  <li>BSEE, IIT; Bombay, India</li>
                                  </ul></th>
                              </tr>
                            </tbody>
                          </table></th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"> </th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"><hr /></th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"> </th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top" height="10"> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <th scope="col" align="left" valign="top" width="110"><img alt="" src="http://www.rv-vlsi.com/userfiles/jeanluc_pic.jpg" width="107" height="90" /></th>
                              <th scope="col" align="left" valign="top" width="10"> </th>
                              <th scope="col" align="left" valign="middle"><strong>Jean-Luc Gaudiot</strong><br />
                                Professor &amp; Chair, Department of Electrical Engineering and Computer   Science, <br />
                                University of California – Irvine <br />
                                Fellow, IEEE, 1999 <br />
                                Fellow, AAAS, 2007</th>
                              </tr>
                            </tbody>
                          </table></th>
                        </tr>
                      <tr>
                        <td scope="row" align="left" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top"> </td>
                              </tr>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top" width="117" height="10"> </th>
                              </tr>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top">He   is currently a Professor in the Electrical Engineering and Computer   Science   Department at the University of California, Irvine. Prior to   joining UCI in   January 2002, he was a Professor of Electrical   Engineering at the University of   Southern California since 1982, where   he served as Director of the Computer   Engineering Division for three   years. He has also designed distributed   microprocessor systems at   Teledyne Controls, Santa Monica, California   (1979-1980) and performed   research in innovative architectures at the TRW   Technology Research   Center, El Segundo, California (1980-1982). He frequently   acts as   consultant to companies that design high-performance computer     architectures, and has served as an expert witness in patent   infringement and   product liability cases. His research interests   include multithreaded   architectures, fault-tolerant multiprocessors,   and implementation of   reconfigurable architectures. He has published   over 150 journal and conference   papers. His research has been   sponsored by NSF, DoE, and DARPA, as well as a   number of industrial   organizations.</td>
                              </tr>
                            <tr>
                              <th colspan="3" scope="row" align="left" valign="top"> </th>
                              </tr>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top"><strong>Education:<br />
                                <br />
                                </strong>Professor Jean-Luc Gaudiot received the   Diplôme d'Ingénieur from the École   Supérieure d'Ingénieurs en   Electronique et Electrotechnique, Paris, France in   1976 and the M.S.   and Ph.D. degrees in Computer Science from the University of     California, Los Angeles in 1977 and 1982, respectively.</td>
                              </tr>
                            </tbody>
                          </table></th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"> </th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"><hr /></th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"> </th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top" height="10"> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <th scope="col" align="left" valign="top" width="110"><img alt="Raghu Panicker" src="http://www.rv-vlsi.com/userfiles/raghu_pic.jpg" width="107" height="90" /></th>
                              <th scope="col" align="left" valign="top" width="10"> </th>
                              <th scope="col" align="left" valign="middle"><strong>Raghu Panicker</strong> <br />
                                Sales Director<br />
                                Mentor Graphics,   India</th>
                              </tr>
                            </tbody>
                          </table></th>
                        </tr>
                      <tr>
                        <td scope="row" align="left" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td olspan="3" scope="row" align="left" valign="top"> </td>
                              </tr>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top" width="117" height="10"> </td>
                              </tr>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top">Raghu   spearheads the company’s Sales organization and is fully responsible   for   Sales, Strategic operations and positioning the Company for   continued success in   India. Raghu brings to this position a wealth of   VLSI and Semiconductor Industry   business experience, stemming from his   early years of Research and Development   at Semiconductor Complex.   Raghu, has over 15 years of sales, business leadership   and channel   experience in the VLSI and Semiconductor industry.<br />
                                <br />
                                Raghu   joined Mentor Graphics from Telelogic   India where he was the Regional Sales   Manager for Enterprise   Architecture range of products for India and Srilanka. He   started his   career with Semiconductor Complex Limited, Chandigarh in 1991 and     during his tenure held a number of different roles in Research &amp;   Development   and Sales &amp; Marketing. From 2000 - 2005, Raghu was the   Channel Manager for   Mentor Graphics India responsible for Sales,   Customer Support and Business   Development for Mentor Graphics products   in India.</td>
                              </tr>
                            </tbody>
                          </table></th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"> </th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"><hr /></th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"> </th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top" height="10"> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <th scope="col" align="left" valign="top" width="110"><img alt="" src="http://www.rv-vlsi.com/userfiles/rajiv_pic.jpg" width="107" height="90" /></th>
                              <th scope="col" align="left" valign="top" width="10"> </th>
                              <th scope="col" align="left" valign="middle"><strong>Rajiv Gupta</strong> <br />
                                Director IP/DA Licensing <br />
                                Qualcomm, San Diegop</th>
                              </tr>
                            </tbody>
                          </table></th>
                        </tr>
                      <tr>
                        <td scope="row" align="left" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top"> </td>
                              </tr>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top" width="117" height="10"> </td>
                              </tr>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top">Mr.   Rajiv Gupta has been Director of IP &amp; Design Services at Jazz     Semiconductor since 2005. Prior to joining Jazz, he held position of   Director of   processor development at Mindspeed technologies, Conexant   Systems and Rockwell   Semiconductor Systems. <br />
                                <br />
                                He has over 25 years of experience in the     semiconductor industry. He has led development of several generations of   high   performance, Low Power VLSI processor cores for wire-line and   wireless products.   He has traveled extensively to Japan, China, Taiwan   and Europe to evaluate and   license critical embedded technologies for   Wireless products. He is well   connected with universities worldwide   having participated in several university   research programs at MIT,   UCLA, University of Arizona, UC San Diego, University   of Portugal,   Swiss federal Institute and UCI. <br />
                                <br />
                                He is holder of 13 US and   international   patents and has degrees in Solid State Physics and Electrical     engineering.</td>
                              </tr>
                            </tbody>
                          </table></th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"> </th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"><hr /></th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top"> </th>
                        </tr>
                      <tr>
                        <th scope="row" align="left" valign="top" height="10"> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <th scope="col" align="left" valign="top" width="110"><img alt="" src="http://www.rv-vlsi.com/userfiles/pawan_pic.jpg" width="107" height="90" /></th>
                              <th scope="col" align="left" valign="top" width="10"> </th>
                              <th scope="col" align="left" valign="middle"><strong>Pawan Wasant Borle</strong> <br />
                                Head-Human Resources <br />
                                flydubai, Dubai-UAE</th>
                              </tr>
                            </tbody>
                          </table></th>
                        </tr>
                        
                      <tr>
                        <td scope="row" align="left" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top"> </td>
                              </tr>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top" width="117" height="10"> </td>
                              </tr>
                            <tr>
                              <td colspan="3" scope="row" align="left" valign="top"> <p>Pawan Wasant Borle currently heads the Human   Resources Function at flydubai – the newest point to point budget   airline being set up by the Government of Dubai. Till recently he was   the Senior Vice President – Human Capital and a core member of the start   up team at Fullerton Financial Holdings – UAE office where he helped   set up a new financial services entity in Dubai</p>
                                <p>Until November 2006, Pawan was the Head of   Human Resources for Conexant Systems Inc. operations in India comprising   of 1300+ top of the line semiconductor experts across 4 design centers.   He was based out of Hyderabad, India. Pawan was also a Director and   part of Conexant’s executive management team in India.</p>
                                <p>Besides his personal interest and passion in   the area of semiconductors – Pawan is a high energy Human Resources   professional with a mature understanding of business across diverse   industries and an extensive background handling  Organizational life   cycles; Start-Ups ; Industry – Academia Partnerships &amp; University   Relations ; Strategic Human Resources Planning ; Change &amp;   Relationship Management ; High caliber recruitment and retention  along   with Leadership Development for Business Success.</p>
                                <p>Pawan has 16 years of rich and core HR   experience across various industries handling diverse communities of   employees. Having  served as a part of the senior management teams in   several international organizations, Pawan closely understands and   appreciates people related issues and works towards aligning the   aspirations of employees in line with the objectives of the   organization.</p>
                                <p>In 1996, Pawan managed the Human Resource   function of a new start up branch of Chinatrust Commercial Bank in   India. In 1998 he was again a part of the start up team at Citicorp   Maruti Finance Limited – a joint venture finance company, in India,   between Citigroup and Suzuki (Maruti)</p>
                                <p>In 2000, he was designated as the Director –   Human Resources  for Pramati Technologies – a developer of premium high   end software products  from India where he helped build and grow one of   the best software product teams in Java Technology in India.</p>
                                <p>From June 2004, Pawan has been working in the   high tech field of Semiconductor Research and Design as the Human   Resources Business Partner for the India region. He is also in the   Executive HR Committee of the Indian Semiconductor Association – the   premier body representing the dynamic semiconductor industry in India.</p>
                                <p>Pawan started his career in 1993 in with   Ogilvy &amp; Mather Advertising in India, after completing a Bachelor of   Sciences, from the Delhi University and his Masters in Human Resources   Management, from XLRI Jamshedpur – School of Business and Human   Resources</p></td>
                              </tr>
                            </tbody>
                          </table></th>
                        </tr>
                      </table>
                      </div>
                      </td>
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
