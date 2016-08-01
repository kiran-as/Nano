<? include_once('db/dbconfig.php');
error_reporting(E_ALL ^ E_NOTICE); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="RV-VLSI,VLSI,Electronic,Design,FPGA, ASIC, Embedded Systems,Admission, Analog mixed signal domains, bangalore ,Karnataka , India,BE Projects for Electronic Engineers, University provided BE Projects, VLSI Training in Bangalore, VLSI Training in Bangalore with BE project, VLSI & Embedded system BE Projects, VTU proved BE projects, BE Projects for Electronic Engineers">
<title>RV-VLSI Design Center</title>
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

<link href="rv_main.css" rel="stylesheet" type="text/css" />

<link href="SpryAssets/SpryAccordion4.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/prototype1.js"></script>
<script language="JavaScript" type="text/javascript" src="js/SpryCollapsiblePanel.js"></script>
<script language="JavaScript" type="text/javascript" src="js/SpryData.js"></script>
<link href="js/samples.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script language="javascript">
//rdElec,1,2,raPrg,1,0,rdQual,BE,ME,BS,MS,DP,OH,rdInt,GH,3D,rdExp,1,3,5,6,rdSp,1,2,4,8,24,N,raPl,1,0,raBe,Y,BE
//1 -- any,  2 -- any  3 -- BE or ME only  4 -- Any  5 -- < 5 years (> 5 call RV-VLSI)    6 -- 24   7 -- any  8 -- must be BE complete

function calculate_course()
			{
			var frm=document.frmCal;
			var content='';
			var cal;
			
				var j=0
	
				for (var i=0; i < document.frmCal.rdElec.length; i++)
				   {
				   if (document.frmCal.rdElec[i].checked)
					  {
					  var elc = document.frmCal.rdElec[i].value;
					 j++;
					  }
				   }
			
			if(j==0)
				{
				alert("Select How do you rate on basic electronics on a scale of 0 to 10  ");
				return false;
				}
				
				 j=0;
				for (var i=0; i < document.frmCal.raPrg.length; i++)
				   {
				   if (document.frmCal.raPrg[i].checked)
					  {
					  var plg = document.frmCal.raPrg[i].value;
					    j++;
					  }
				   }
				  
				if(j==0)
				{
				alert("Select Do you like programming in C");
				return false;
				}
				 j=0;
				for (var i=0; i < document.frmCal.rdQual.length; i++)
					   {
					   if (document.frmCal.rdQual[i].checked)
						  {
						  var qul = document.frmCal.rdQual[i].value;
						   j++;
						  }
					   }
		 
				if(j==0)
				{
				alert("Select What is your highest qualification");
				return false;
				}	
		
				j=0;
				for (var i=0; i < document.frmCal.rdInt.length; i++)
					   {
					   if (document.frmCal.rdInt[i].checked)
						  {
						  var int = document.frmCal.rdInt[i].value;
						   j++;
						  }
					   }
				
				
				if(j==0)
				{
				alert("Select Are you interested in ");
				return false;
				}
				
				j=0;	   
				for (var i=0; i < document.frmCal.rdExp.length; i++)
					   {
					   if (document.frmCal.rdExp[i].checked)
						  {
						  var ep = document.frmCal.rdExp[i].value;
						   j++;
						  }
					   }	   
				
				if(j==0)
				{
				alert("Select Do you have ANY industry experience click below");
				return false;
				}
				
				j=0;	   
				for (var i=0; i < document.frmCal.rdSp.length; i++)
					   {
					   if (document.frmCal.rdSp[i].checked)
						  {
						  var sp = document.frmCal.rdSp[i].value;
						   j++;
						  }
					   }
				
				if(j==0)
				{
				alert("Select How many weeks can you spare fulltime ");
				return false;
				}
				
				j=0;
				for (var i=0; i < document.frmCal.raPl.length; i++)
					   {
					   if (document.frmCal.raPl[i].checked)
						  {
						  var ra = document.frmCal.raPl[i].value;
						    j++;
						  }
					   }
				
				if(j==0)
				{
				alert("Select Are you planing on going abroad in the next 12 months for higher studies");
				return false;
				}
				j=0;	   
					for (var i=0; i < document.frmCal.raBe.length; i++)
					   {
					   if (document.frmCal.raBe[i].checked)
						  {
						  var be = document.frmCal.raBe[i].value;
						    j++;
						  }
					   }	   
					   	   
	
			if(j==0)
				{
				alert("Select Are you a student in BE 5th sem and above");
				return false;
				}
			
			if(frm.txtName.value=='')
					{
					alert("Please enter your name");
					frm.txtName.focus();
					return false;
					}else if(frm.txtPhone.value=='')
								{
								alert("Please enter your phone number");
								frm.txtPhone.focus();
								return false;
								}else if(frm.txtEmail.value=='')
										{
										alert("Please enter your Email Id");
										frm.txtEmail.focus();
										return false;
										}if(frm.txtEmail.value.search(/^\w+(\.\w+)*@\w+(\.\w+)*\.\w{2,3}$/) == -1) 
												{
												alert("Enter valid email");
												frm.txtEmail.value='';
												frm.txtEmail.focus();
												return false;
												}
									
								
								
								
			

	
	data="elc="+elc+"&plg="+plg+"&qul="+qul+"&intt="+int+"&ep="+ep+"&sp="+sp+"&ra="+ra+"&be="+be+"&name="+frm.txtName.value+"&phone="+frm.txtPhone.value+"&email="+frm.txtEmail.value;		
alert(data);
		/*	var ajaxcalls=new Ajax.Request("mail_content.php",{method: 'get', parameters: data, onComplete:send_mail});*/
			//var elc= document.getElementById("rdElec").value;
			//var plg=document.getElementById("raPrg").value;
			//var qul=document.getElementById("rdQual").value;
			//var int=document.getElementById("rdInt").value;
			//var ep=document.getElementById("rdExp").value;
			//var sp=document.getElementById("rdSp").value;
			//var ra=document.getElementById("raPl").value;
			//var be=document.getElementById("raBe").value;
			
				var addr=4;
				var msgadd='';
				
				
				
				if(qul=='BE' || qul =='ME')
				  addr++;
				
				 if(ep==6) 
				  addr++;
				  else if(ep==5)
				  			{
							addr++;
							msgadd+='Please Contact RV-VLSI'
							}
				 
				 if(sp==24)	
				  addr++;
				  
				  if(be=='BE')
				  addr++;
				alert(addr);
				  if(addr==8)
				  	{
					content="<a href='program_offerings.php?id=7' class='text9red'> ADAD</a>.  "+msgadd;
					
					}
					
					

				var icml=3;
				var icmlMsg='';	
				
				if(plg==0)
				icml++;
				
				if(int=='GH')
				icml++;
				
				 if(ep==6) 
				  icml++;
				  else if(ep==5)
				  			{
							icml++;
							icmlMsg+='Please Contact RV-VLSI';
							}
					
				 if(sp==8)	
				  icml++;
				  
				 if(be=='BE')
				  icml++; 
					
			  
			  
			    if(icml==8)
				  	{
					content=" ICML. "+icmlMsg;
					}
					
			var short=6;
			
			
					
					
			
				//rdElec,1,2,raPrg,1,0,rdQual,BE,ME,BS,MS,DP,OH,rdInt,GH,3D,rdExp,1,3,5,6,rdSp,1,2,4,8,24,N,raPl,1,0,raBe,Y,BE
				
				if(sp!='N')	
				short++;
				
				 if(be=='Y')
				  short++;
				  
				  
				  
				  if(short==8)
				  	{
					content="Key for any of the short Modules";
					
					}
			//1 --- any 2 -- any  3 -- any  4 -- any   5 -- any 6 -- one week   7 -- any    8 -- yes for students
				 
			var vlsi=6; 
			
			
				if(sp==1)	
				vlsi++; 
				
				if(be=='Y')
				  vlsi++;
				  
				  
				   
				  
				  if(vlsi==8)
				  	{
				content="<a href='program_offerings.php?id=20' class='text9red'> VLSI Bootcamp</a>";
					} 
				  
				  if(content=='')
				  	{
					content="Thank you for your query, RV-VLSI Representative will get back to you shortly.";
					document.getElementById("cont").innerHTML=content;
					}
					else
				 document.getElementById("cont").innerHTML="Your suitable course is :  "+content; 
				  
			}
			
	function send_mail()
				{
				
				}		
</script>

        
        <style type="text/css">
        a {
			color:#000;
			text-decoration:none;
			cursor:default;
			}
        </style>
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
                <td width="148" rowspan="2"><img alt="RV-VLSI Design Center" src="images/RV-Institute_logo.jpg" width="148" height="110" border="0" usemap="#Map" style="padding:10px 0px 0px 0px;" />
                  <map name="MapMap" id="MapMap">
                    <area shape="rect" coords="0,2,107,97" href="index.php" />
                  </map></td>
                <td width="97" rowspan="2" align="left" valign="middle" style="color:#cc0000; font-size:12px; font-weight:bold; text-align:center;"><!--<img src="images/ATT_stamp_medium.jpg" width="107" height="69" border="0" style="margin:0px 0px 5px 0px;" />--></td>
                <td width="483" rowspan="2" align="left" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left" valign="top"><script type="text/javascript">
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
                <td width="208" align="right" valign="bottom" class="link_green"><a href="contact_us.php"><img alt="Call : 080 40788574 & Call : 080 40RVVLSI" src="images/contact_button.jpg" width="193" height="46" border="0" /></a></td>
              </tr>
              <tr>
                <td align="right" valign="bottom" class="text10red" style="padding-bottom:5px;"><a href="index.php" class="text10red">Home</a> | <a href="contact_us.php" class="text10red">Contact Us</a> | <a href="sitemap.html" class="text10red">Sitemap</a></td>
              </tr>
            </table>
              <map name="Map" id="Map22">
                <area shape="rect" coords="1,2,142,107" href="index.php" />
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
<script type="text/javascript">
function divOpen(){
			document.getElementById('divDwnld').style.display="block";
		}	
			
			function divClose(){
			document.getElementById('divDwnld').style.display="none";
			}
</script>
</div>
                               
                </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top">
				<form method="post" action="" name="frmCal">
 				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="28">&nbsp;</td>
                  </tr>
                  <tr>
                    <td><!--<img src="images/Ceo_message.jpg" width="166" height="24" border="0"/>--></td>
                  </tr>
               
                <tr>
                <td width="100%" style="margin:0px; padding:0px;">
                <table width="100%">
                <tr>
                <td width="31%">
                <table width="700" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td ><img src="images/clip_image001.jpg" onmouseover="divOpen();" onmouseout="divClose();" /></td>
    
    <td width="591" colspan="2"><div id="divDwnld" style="display:none;"><img src="images/main1.jpg" />  </div></td>
  
  </tr>
    
</table>
                
                <!--<a href="javascript:;" id="tooltip_6" class="tooltip6"><span style="color:#A05C15;"><img src="images/clip_image001.jpg" width="95" height="118" border="0" style="margin:0px; padding:0px;" /></a>



<div id="data_tooltip_6" style="display:none;">
Domain Expertise : VLSI/CAD, Full Custom Design, Physical Verification, Parasitic Extraction, ASIC Physical Design.
<br />Technology : Bipolar/CMOS.
<br>Process : high voltage bipolar, .35um, .25um, .18um, .15um, .13um. .11um, 90nm, 65nm.
<br />Foundries : UMC, CSM, SMIC, CSMC, TSMC, IBM, Hynix
</div>-->
                
                </td>
           
                </tr>
                <tr>
                <td colspan="2">
               <b><!--<a HREF="javascript:self.close()" onclick="window.open('ceo.html','welcome','width=400,height=300')" style="text-decoration:none;">-->
               <a><span style="color:#A05C15;" onmouseover="divOpen();" onmouseout="divClose();"> Venkatesh S Prasad </span><br /><span onmouseover="divOpen();" onmouseout="divClose();">Founder CEO, RV-VLSI</span></a></b></a>



<!--<div id="data_tooltip_6" style="display:none;">
Domain Expertise : VLSI/CAD, Full Custom Design, Physical Verification, Parasitic Extraction, ASIC Physical Design.
<br />Technology : Bipolar/CMOS.
<br>Process : high voltage bipolar, .35um, .25um, .18um, .15um, .13um. .11um, 90nm, 65nm.
<br />Foundries : UMC, CSM, SMIC, CSMC, TSMC, IBM, Hynix
</div>-->
               
              <!-- <a href="javascript:;" id="Domain Expertise : VLSI/CAD, Full Custom Design, Physical Verification, Parasitic Extraction, ASIC Physical Design. Technology : Bipolar/CMOS. Process : high voltage bipolar, .35um, .25um, .18um, .15um, .13um. .11um, 90nm, 65nm.  Foundries : UMC, CSM, SMIC, CSMC, TSMC, IBM, Hynix  ", class="tooltip2" style="color:#A05C15;"> Venkatesh S Prasad <br />Founder CEO, RV-VLSI</a></b>         <p style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:14px; color:#000; margin:0px; padding:6px 0px 8px 10px; font-weight:bold; "><a href="javascript:;" id="Made Easy to learn" class="tooltip2">Interest </a></p>--> 
                </td>
                </tr>
                
                <tr>
                <td colspan="2">
               
                <!--<table  width="100%">
                <tr>
                <td width="18%" valign="top"  class="text10">Domain Expertise</td>
                <td width="2%" valign="top"  class="text10">:</td>
                <td width="80%" valign="top"  class="text10">VLSI/CAD, Full Custom Design, Physical Verification, Parasitic Extraction, ASIC Physical Design.</td>
                </tr>
                <tr>
                <td width="18%" valign="top"  class="text10">Technology</td>
                <td width="2%" valign="top" >:</td>
                <td width="80%" valign="top"  class="text10">Bipolar/CMOS</td>
                </tr>
                <tr>
                <td width="18%" valign="top"  class="text10">Process</td>
                <td width="2%" valign="top">:</td>
                <td width="80%" valign="top"  class="text10">high voltage bipolar, .35um, .25um, .18um, .15um, .13um. .11um, 90nm, 65nm.
</td>
                </tr>
                <tr>
                <td width="18%" valign="top"  class="text10">Foundries</td>
                <td width="2%" valign="top">:</td>
                <td width="80%" valign="top"  class="text10">UMC, CSM, SMIC, CSMC, TSMC, IBM, Hynix</td>
                </tr>
                </table>-->
                <p align="center" style="text-decoration:underline;" class="text10"><strong>From the Office of the Chief Executive Officer</strong></p>
                <p  class="text10">My dear student, my fellow academician and my colleagues from the industry. Welcome to RV-VLSI. </p>
                <p  class="text10">I distinctly recall the challenges I faced in recruiting VLSI and Embedded Systems “industry ready” talent while setting up the teams, as the Director of Conexant Systems India Ltd.</p>
                <p  class="text10">I felt it would be of great help to Conexant if somebody with substantial industry experience and a passion to teach would have a institute catering to the specific needs of the VLSI industry. I set out looking for one, but in vain could not find any. I suppose the reasons for this are, to setup a good VLSI and Embedded training institute the investments needed run into millions of dollars. The next significant factor is the 
Handsome pay an engineer with substantial experience would be making, add the two and you do not see a compelling business case to start a training venture.
</p>
                <p  class="text10">As I was passionate about teaching I decided to call it quits from the industry and dedicate my time to build a state of the art design center, not to teach theory but to help promote experiential learning in an industry atmosphere to students, academicians and working professionals. </p>
                <p  class="text10">To keep the operating costs low I approached the management of RV with my idea and am indeed fortunate to have received the support of Dr. M. K. Panduranga Setty, President, RSST and the entire RV management team to setup a world class facility. </p>
                <p  class="text10">Today the center is well established and offers many fulltime and fast-track courses in VLSI, Embedded Systems, Microelectronics and works closely with VTU in faculty enrichment programs, BE projects and other areas. </p>
                <p  class="text10">Our alumni do us proud, working for the best product companies one can think of. </p>
                <p  class="text10">RV-VLSI can be characterized as an industry inside a campus with access to the latest industry standard design software and nanometer process technology. </p>
                <p  class="text10">I’m very happy to have a wonderful team of professionals from the industry with substantial international experience assisting me is execution our vision. Our uniqueness lies in what we teach, how we teach and who teaches.</p>
                <p  class="text10">I encourage you to visit the center, take a tour of the facility and interact with my team members to explore ways we can help you.</p>
                </td>
                </tr>
               
                </table>
                </td>
                </tr>
				  
				  
				  </Table>
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
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','235','height','215','src','right_caption_faculty1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','right_caption_faculty1' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="235" height="215">
                          <param name="movie" value="right_caption_faculty1.swf" />
                          <param name="quality" value="high" />
                          <param name="wmode" value="transparent" />
                          <embed src="right_caption_faculty1.swf" width="235" height="215" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="transparent"></embed>
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
            <td align="right" valign="middle" class="copyright">All rights reserved, Copyright  RV-VLSI Design Center.</td>
            <td width="20">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>



<script type="text/javascript">
var cp1 = new Spry.Widget.CollapsiblePanel("cp1");
cp1.open();
var cp2 = new Spry.Widget.CollapsiblePanel("cp2");
cp2.close();
var cp3 = new Spry.Widget.CollapsiblePanel("cp3");
cp3.close();
var cp4 = new Spry.Widget.CollapsiblePanel("cp4");
cp4.close();
var cp5 = new Spry.Widget.CollapsiblePanel("cp5");
cp5.close();
var cp6 = new Spry.Widget.CollapsiblePanel("cp6");
cp6.close();
var cp7 = new Spry.Widget.CollapsiblePanel("cp7");
cp7.close();
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
