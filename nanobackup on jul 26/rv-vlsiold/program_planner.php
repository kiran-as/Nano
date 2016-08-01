<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="RV-VLSI,VLSI,Electronic,Design,FPGA, ASIC, Embedded Systems,Admission, Analog mixed signal domains, bangalore ,Karnataka , India,BE Projects for Electronic Engineers, University provided BE Projects, VLSI Training in Bangalore, VLSI Training in Bangalore with BE project, VLSI & Embedded system BE Projects, VTU proved BE projects, BE Projects for Electronic Engineers">
<title>RV-VLSI Design Center - Course Planner</title>
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
<script language="javascript">
//rdElec,1,2,raPrg,1,0,rdQual,BE,ME,BS,MS,DP,OH,rdInt,GH,3D,rdExp,1,3,5,6,rdSp,1,2,4,8,24,N,raPl,1,0,raBe,Y,BE
//1 -- any,  2 -- any  3 -- BE or ME only  4 -- Any  5 -- < 5 years (> 5 call RV-VLSI)    6 -- 24   7 -- any  8 -- must be BE complete

function calculate_course()
			{
			var frm=document.frmCal;
			var content='';
			var content1='';
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
				  else 	{
							addr++;
							msgadd+='Please Contact RV-VLSI'
							}
				 
				 if(sp==24)	
				  addr++;
				  
				  if(be=='BE')
				  addr++;
				
				  if(addr==8)
				  	{
					content="<a href='program_offerings.php?id=7' class='text9red'> ADAD</a>.  "+msgadd;
					content1="ADAD "+msgadd;
					}
					
					

				var icml=3;
				var icmlMsg='';	
				
				if(plg==0)
				icml++;
				
				if(int!='NS')
				icml++;
				
				 if(ep==6) 
				  icml++;
				  else
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
					content1=" ICML. "+icmlMsg;
					}
					
			var short=6;
			
			
					
					
			
				//rdElec,1,2,raPrg,1,0,rdQual,BE,ME,BS,MS,DP,OH,rdInt,GH,3D,rdExp,1,3,5,6,rdSp,1,2,4,8,24,N,raPl,1,0,raBe,Y,BE
				
				if(sp!='N')	
				short++;
				
				 if(be=='Y')
				  short++;
				  
				  
				  
				  if(short==8)
				  	{
					content="<a href='program_offerings.php' class='text9red'>Key for any of the short Modules</a>";
					content1="Key for any of the short Modules ";
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
				content1="VLSI Bootcamp ";
					}
				  
				  if(content=='')
				  	{
					content="<a href='program_offerings.php' class='text9red'> Our Short Module Programs</a>";
	  			    document.getElementById("cont").innerHTML="Your suitable course is :  "+content;
					content1="Your suitable course is :  Our Short Module Programs. ";

					}
					else
						{
				 document.getElementById("cont").innerHTML="Your suitable course is :  "+content; 
				 content1="Your suitable course is :  "+content1;
				 		}
				 
				 
				// alert(addr+" "+vlsi+" "+short+" "+icml+" "+content1);
				 
				 	data="elc="+elc+"&plg="+plg+"&qul="+qul+"&intt="+int+"&ep="+ep+"&sp="+sp+"&ra="+ra+"&be="+be+"&name="+frm.txtName.value+"&phone="+frm.txtPhone.value+"&email="+frm.txtEmail.value+"&result="+content1;		

			var ajaxcalls=new Ajax.Request("mail_content.php",{method: 'get', parameters: data, onComplete:send_mail});
				  
			}
			
	function send_mail(originalResponse)
				{
				var result=originalResponse.responseText;
				document.getElementById("cont_rs").innerHTML=result;
				}		
</script>
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
              <map name="Map" id="Map22">
                <area shape="rect" coords="1,2,142,110" href="index.php" />
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
                <td width="696"><img  alt="Expert Faculty"src="images/banner_faculty.jpg" width="696" height="192" /></td>
                <td width="15">&nbsp;</td>
                <td align="left" valign="bottom"><table width="100%" height="192" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="30" align="left" valign="top"><img  alt="RV-VLSI Video Testimonial"src="images/video_testimonial_headding.jpg" width="249" height="31" /></td>
                  </tr>
                  <tr>
                    <td align="center" valign="top" background="images/right_box_bg.jpg" style="padding-top:10px;"><img src="images/video.jpg" width="178" height="143" /></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="38" align="left" valign="middle" background="images/menu_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="86" align="center" valign="middle" class="button_white"><a href="institute.html" class="button_white">Institute</a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="131" align="center" valign="middle" class="button_white"><a href="program_offerings.php" class="button_white">Program Offerings</a><a href="#" class="button_white"></a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="93" align="center" valign="middle" class="button_white"><a href="admission.html" class="button_white">Admissions</a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="107" align="center" valign="middle" class="button_white"><a href="infrastructure.html" class="button_white">Infrastructure</a></td>
               <!-- <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="79" align="center" valign="middle" class="button_white"><a href="faculty.html" class="button_white">Faculty</a><a href="#" class="button_white"></a></td>-->
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="97" align="center" valign="middle" class="button_white"><a href="placements.php" class="button_white">Placements</a></td>
                <td align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="104" align="center" valign="middle" class="button_white"><a href="testimonial.html" class="button_white">Testimonials</a></td>
                <td align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="71" align="center" valign="middle" class="button_white"><a href="career.html" class="button_white">Careers</a></td>
                <td align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td width="115" align="center" valign="middle" class="button_white"><a href="news_events.php" class="button_white">News  &amp; Events</a></td>
                <td width="2" align="center" valign="middle" class="button_white"><img src="images/menu_seperator.jpg" width="2" height="38" /></td>
                <td align="center" valign="middle" class="button_white"><a href="faq.html" class="button_white">FAQ</a></td>
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
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="heading_new"><img  alt="course Planner" src="images/coursePlanner.jpg" /></td>
                  </tr>
                  <tr>
                    <td height="25" align="left" valign="top" class="text11red"><div align="right">* Required fields</div></td>
                  </tr>
				  <tR><tD>
				  <Table width="100%">
			
				  <td></td></tr>
				  <tr>
				    <td height="20" class="text11">1. How do you rate yourself on basic electronics on a scale of 0 to 10 (10 being the best) <span class="text11red">* </span></td>
				  </tr>
				  <Tr><td height="20" class="text11">
				  <Table width="99%" align="right">
				  <tr><td width="4%"><input type="radio" name="rdElec" id="rdElec" value="1" /></td><td width="5%"> < 5 </td>
						  <td width="4%"><input type="radio" name="rdElec" id="rdElec" value="2" /></td><td width="8%"> 5 to 7 </td>
				  <td width="5%"><input type="radio" name="rdElec" id="rdElec" value="3" /></td><td width="74%"> 7 to 10 </td>
				  </tr></Table>
				  </Table>
				    </td>
				  </Tr>
				  <Tr>
				    <td height="20" class="text11">2. Do you like programming in C <span class="text11red">* </span></td>
				  </Tr>
				  <Tr><td height="20" class="text11">
				  <Table width="99%" align="right">
				  <tr><td width="4%"><input type="radio" name="raPrg" id="raPrg" value="1"  /></td><td width="4%">Yes</td>
				  <td width="4%"><input type="radio" name="raPrg" id="raPrg" value="0" /></td><td width="88%">No</td>
				  </tr> </Table>
				  
				    </td>
				  </Tr>
				  <Tr>
				    <td height="20" class="text11">3. What is your highest qualification <span class="text11red">* </span></td>
				  </Tr>
				  <Tr><td height="20" class="text11">
				  <table width="99%" align="right">
				  
				  <tr><td width="4%"><input type="radio" name="rdQual" id="rdQual" value="BE" /></td><td width="27%"> BE in Elens or related branch</td>
				  <td width="5%"><input type="radio" name="rdQual" id="rdQual" value="ME" /></td><td width="34%">ME in Elens or related branch</td>
				  <td width="4%"><input type="radio" name="rdQual" id="rdQual" value="BS" /></td><td width="26%">Bsc in Elens</td>
				  </tr>
				  <tr><td><input type="radio" name="rdQual" id="rdQual" value="MS" /></td><td>MSc in Elens </td>
				  <td><input type="radio" name="rdQual" id="rdQual" value="DP" /></td><td>Dip in Elens</td>
				  <td><input type="radio" name="rdQual" id="rdQual" value="OH" /></td><td>Others </td></tr>
				  
				  </table>
				          
                                                    </td>
				  </Tr>
				  <Tr>
				    <td height="20" class="text11">4. Are you interested in <span class="text11red">* </span></td>
				  </Tr>
				  <tr><td>
				  <table width="99%" align="right">
				  <tR>
				  <td width="4%"><input type="radio" name="rdInt" id="rdInt" value="FE" /></td>
				  <td width="18%">Front end </td>
				  <td width="4%"><input type="radio" name="rdInt" id="rdInt" value="BC" /></td>
				  <td width="13%">Back end </td>
				  <td width="4%"><input type="radio" name="rdInt" id="rdInt" value="AD" /></td>
				  <td width="16%"> Anlog Design </td>
				  <td width="4%"><input type="radio" name="rdInt" id="rdInt" value="DD" /></td>
				  <td width="16%"> Digital Design </td>
				   <td width="4%"><input type="radio" name="rdInt" id="rdInt" value="NS" /></td>
				  <td width="17%"> Not Sure  </td>
				   
				  </tR>
				  
				  </table>
				  
				  
				  </td></tr>
				  <Tr>
				    <td height="20" class="text11">5. Do you have ANY industry experience select below <span class="text11red">* </span></td>
				  </Tr>
				  <Tr><td height="20" class="text11">
				  <Table width="99%" align="right">
				  <tr>
				  <td width="4%"><input type="radio" name="rdExp" id="rdExp" value="1" /></td>
				  <td width="18%">No Experience </td>
				  <td width="4%"><input type="radio" name="rdExp" id="rdExp" value="3" /></td>
				  <td width="18%">1 to 3</td>
				  <td width="4%"><input type="radio" name="rdExp" id="rdExp" value="5" /></td>
				  <td width="18%">3 to 5</td>
				  <td width="3%"><input type="radio" name="rdExp" id="rdExp" value="6" /></td>
				  <td width="31%">5 and above</td>
				  </tr>
				  </Table> </td></Tr>
				  
				  <Tr>
				    <td height="20" class="text11">6. How many weeks can you spare fulltime Monday to Friday  <span class="text11red">* </span></td>
				  </Tr>
				  <Tr><td height="20" class="text11">
				  <table width="99%" align="right">
				  <tr>
				  <td width="4%"><input type="radio" name="rdSp" id="rdSp" value="1" /></td>
				  <td width="9%">1</td>
				  <td width="4%"><input type="radio" name="rdSp" id="rdSp" value="2" /></td>
				  <td width="11%">2</td>
				  <td width="4%"><input type="radio" name="rdSp" id="rdSp" value="4" /></td>
				  <td width="11%">4</td>
				  <td width="4%"><input type="radio" name="rdSp" id="rdSp" value="8" /></td>
				  <td width="11%">8</td>
				  <td width="4%"><input type="radio" name="rdSp" id="rdSp" value="24" /></td>
				  <td width="13%">24</td>
				  <td width="4%"><input type="radio" name="rdSp" id="rdSp" value="N" /></td>
				  <td width="21%">None</td>
				  </tr>
				  </table> </td>
				  </Tr>
				  <Tr>
				    <td height="20" class="text11">7. Are you planning on going abroad in the next 12 months for higher studies<span class="text11red"> * </span></td>
				  </Tr>
				  <Tr><td>
		  
				   <Table width="99%" align="right">
				  <tr><td width="4%"><input type="radio" name="raPl" id="raPl" value="1"  /></td><td width="4%">Yes</td>
				  <td width="4%"><input type="radio" name="raPl" id="raPl" value="0" /></td><td width="88%">No</td>
				  </tr> </Table>
				  
				  </td></Tr>
				  <Tr>
				    <td height="20" class="text11">8. Are you a student in BE 5th sem and above <span class="text11red">* </span></td>
				  </Tr>
					  
				  <Tr><td>
				  <Table width="99%" align="right">
				  <tr><td width="4%"><input type="radio" name="raBe" id="raBe" value="Y"  /></td><td width="4%">Yes</td>
				  <td width="4%"><input type="radio" name="raBe" id="raBe" value="BE" /></td><td width="88%">Completed BE</td>
				  </tr> </Table>
				  
				  </td></Tr>
				  <Tr><td>&nbsp;</td></Tr>
				  <tr><td><table width="100%" >
				  <tr>
				  <td width="26%">Name : </td>
				  <Td width="74%"><input type="text" name="txtName" class="text10" style="width:200px;" /> 
				    <span class="text11red">*</span> </Td>
				  </tr>
				  <tr>
				    <td>Phone : </td>
				    <Td><input type="text" name="txtPhone" class="text10" style="width:200px;"/>
				      <span class="text11red">*</span></Td>
				  </tr>
				    <tr>
				    <td>Email : </td>
				    <Td><input type="text" name="txtEmail" class="text10" style="width:200px;"/>
				      <span class="text11red">*</span></Td>
				  </tr>
				  </table></td></tr>
				  <Tr><td>&nbsp;</td></Tr>
				  <tR><td ><div id="cont" class="test_title"></div></td>
				  <Tr><td><div id="cont_rs" class="test_title"></div></td></Tr>
				  
				  <Tr><td><div align="center">
				    <input name="submit" type="button" class="button" value="Submit" onclick="calculate_course()" />
				    </div></td></Tr>
				<Tr><td>&nbsp;</td></Tr>
				<Tr><td>&nbsp;</td></Tr>
				  
				  
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
</body>
</html>
