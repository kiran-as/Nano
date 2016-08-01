<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_name();
session_start();
include_once('db/dbconfig.php');
include_once('admin_login_check.php');



 $questiontype = $_SESSION['questiontype'];
 $programtype = $_SESSION['programtype'];
 $programlanguage = $_SESSION['programlanguage'];
 
		  $_SESSION['appeared']=1;
////////////////////////////////////////////logical rvvlsi courses////////////////////		
if($programtype==1)
{
	$select = "select * from tbl_programs where ProgramName <= $questiontype and Programtype=1 and  Active=1 and Q4<=$programtype ORDER BY Title ASC";
}
else if($programtype==4)
{
	$select = "select * from tbl_programs where ProgramName <= $questiontype and Programtype=1 and   Active=1 and Q4<=$programtype ORDER BY Title ASC";
}	
else 
{
	$select = "select * from tbl_programs where ProgramName <= $questiontype and Programtype=1 and   Active=1 and Q4<=$programtype and Q4>1 ORDER BY Title ASC";
}		  


$resultprograms = mysql_query($select);
	$s=0;
	$results='';
	$values=0;
	while ($row = mysql_fetch_assoc($resultprograms)) {
		  $arrprograms[$s]["Title"]	= $row["Title"];
		  $arrprograms[$s]["idprograms"]	= $row["idprograms"];
		  $values = $values.','.$row["idprograms"];
		  $results = $results.','.$row["Title"];
		
		  $s++;  
		}
		$values;
      $rvvlsi = $s;
      
        $result = mysql_query("UPDATE  tbl_studentdetailsinformation SET Result = '".$results."'
					        					    
				WHERE StudentEmail ='".$_SESSION['email']."' "); 
      
////////////////////////////////////////end of the logical rvvlsi couses//////////////////////

///////////////////////////////////////other courses///////////////////////
$selectothers = "select * from tbl_programs where idprograms not in($values) and  Active=1 and Programtype=1 and  Q4<=4";
$resultprogramsothers = mysql_query($selectothers);
	$o=0;
	$values=0;
	while ($rowothers = mysql_fetch_assoc($resultprogramsothers)) {
		  $arrprogramsothers[$o]["Title"]	= $rowothers["Title"];
		  $arrprogramsothers[$o]["idprograms"]	= $rowothers["idprograms"];
		  $o++;  
		}
///////////////////////////////////////end  of the other courses//////////////	 
	  
	  
	  
	  
	  

$select = "select * from tbl_programcalendar where idprograms in (select idprograms from tbl_programs where Programtype=1) and active=1 ";
$resultprogramsdetails = mysql_query($select);
	
	$k=0;
	while ($row = mysql_fetch_assoc($resultprogramsdetails)) {
		  $arrprogramdetails[$k]["idprograms"]	= $row["idprograms"];
		  	  $arrprogramdetails[$k]["idprogramcalendar"]	= $row["idprogramcalendar"];
		  $arrprogramdetails[$k]["startmonth"]	= $row["startmonth"].''.$row["startweek"].','.$row["Startyear"].'-'.$row["endmonth"].''.$row["endweek"].','.$row["Endyear"];
		  // $arrprogramdetails[$k]["startmonth"]	= $row["startmonth"].''.$row["startweek"];
		  $k++;  
		}

///////////////////////////////////altera 0////////////////////

$select = "select * from tbl_programs where Programtype=0 and  Active=1 and AlteraCategory=1 order by Orderforaltera";
//die();
$resultaltera = mysql_query($select);
	$s=0;
	while ($row = mysql_fetch_assoc($resultaltera)) {
		  $arrprogramsaltera[$s]["Title"]	= $row["Title"];
		  $arrprogramsaltera[$s]["idprograms"]	= $row["idprograms"];
		  $s++;  
		}
	 $altera1 = $s;	
		
$select1 = "select * from tbl_programs where Programtype=0 and  Active=1 and AlteraCategory=2 order by Orderforaltera";
$resultaltera1 = mysql_query($select1);
	$a=0;
	while ($row1 = mysql_fetch_assoc($resultaltera1)) {
		  $arrprogramsaltera1[$a]["Title"]	= $row1["Title"];
		  $arrprogramsaltera1[$a]["idprograms"]	= $row1["idprograms"];
		  $a++;  
		}
	$altera2 = $a;	

$select2 = "select * from tbl_programs where Programtype=0 and  Active=1 and AlteraCategory=3 order by Orderforaltera";
//die();
$resultaltera2 = mysql_query($select2);
	$b=0;
	while ($row2 = mysql_fetch_assoc($resultaltera2)) {
		  $arrprogramsaltera2[$b]["Title"]	= $row2["Title"];
		  $arrprogramsaltera2[$b]["idprograms"]	= $row2["idprograms"];
		  $b++;  
		}					
$altera3 = $b;

$select = "select idprograms,idprogramcalendar,noofdays,startmonth,endmonth,DATE_FORMAT(startdate,'%D %M %Y') as stdate,DATE_FORMAT(enddate,'%D %M %Y') as eddate from tbl_programcalendar where noofdays!=0 and active=1 order by startdate";
$resultalteraprogramsdetails = mysql_query($select);
	
	$k=0;
	while ($row = mysql_fetch_assoc($resultalteraprogramsdetails)) {
		  $arralteraprogramdetails[$k]["idprograms"]	= $row["idprograms"];
		   $arralteraprogramdetails[$k]["idprogramcalendar"]	= $row["idprogramcalendar"];
		  if($row["noofdays"]==1)
		  { 
		      $arralteraprogramdetails[$k]["startmonth"]	= $row["stdate"];
		  }
		  else
		  {
		  	 $arralteraprogramdetails[$k]["startmonth"]	= $row["stdate"].'-'.$row["eddate"];
		  	  //$arralteraprogramdetails[$k]["startmonth"]	= $row["startdate"];
		  }

		  $k++;  
		}



?>
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
<script type="text/javascript">
function fnclose()
{
parent.location = 'http://www.rv-vlsi.com/program_planner_rvnew.php';	 
}

function onealtera(aaa)
{
if(document.getElementById('1altera').checked==true)
	{
	  var cntss = <?php echo $altera1;?>;
	  
	  for(var i=0;i<cntss;i++)
	  {
	      var alteraone ='1altera'+i;
		  document.getElementById(alteraone).checked=true;
		  document.getElementById('Register').style.display='none';
		  document.getElementById('showregister').style.display='';
	  }
	}
	
	if(document.getElementById('1altera').checked==false)
	{
		  document.getElementById('Register').style.display='';
		  document.getElementById('showregister').style.display='none';
	  var cntss = <?php echo $altera1;?>;
	  for(var i=0;i<cntss;i++)
	  {
	      var alteraone ='1altera'+i;
		  document.getElementById(alteraone).checked=false;
		  // document.getElementById('regaltera').value=0;
	  }
	}
	 var totalaltera1 = <?php echo $altera1;?>;
	   for(var i=0;i<totalaltera1;i++)
	   {
		    idvalue = '1altera'+i;
		    if(document.getElementById(idvalue).checked==true)
			{
			 document.getElementById('Register').style.display='none';
			  document.getElementById('showregister').style.display='';
			}
	   }

	   var totalaltera2 = <?php echo $altera2;?>;
	   for(var i=0;i<totalaltera2;i++)
	   {
		    idvalue = '2altera'+i;
		    if(document.getElementById(idvalue).checked==true)
			{
			 document.getElementById('Register').style.display='none';
			  document.getElementById('showregister').style.display='';
			}
	   }


	   var totalaltera3 = <?php echo $altera3;?>;
	   for(var i=0;i<totalaltera3;i++)
	   {
		    idvalue = '3altera'+i;
		    if(document.getElementById(idvalue).checked==true)
			{
			 document.getElementById('Register').style.display='none';
			  document.getElementById('showregister').style.display='';
			}
	   }
	   
}


function twoaltera()
{
	if(document.getElementById('2altera').checked==true)
	{
	  var cntss = <?php echo $altera2;?>;
	  
	  for(var i=0;i<cntss;i++)
	  {
	      var alteratwo ='2altera'+i;
		  document.getElementById(alteratwo).checked=true;
		  document.getElementById('Register').style.display='none';
		  document.getElementById('showregister').style.display='';
	  }
	}
	if(document.getElementById('2altera').checked==false)
	{
		  document.getElementById('Register').style.display='';
		  document.getElementById('showregister').style.display='none';
	  var cntss = <?php echo $altera2;?>;
	  
	  for(var i=0;i<cntss;i++)
	  {
	      var alteratwo ='2altera'+i;
		  document.getElementById(alteratwo).checked=false;
		
	  }
	}


	 var totalaltera1 = <?php echo $altera1;?>;
	   for(var i=0;i<totalaltera1;i++)
	   {
		    idvalue = '1altera'+i;
		    if(document.getElementById(idvalue).checked==true)
			{
			 document.getElementById('Register').style.display='none';
			  document.getElementById('showregister').style.display='';
			}
	   }

	   var totalaltera2 = <?php echo $altera2;?>;
	   for(var i=0;i<totalaltera2;i++)
	   {
		    idvalue = '2altera'+i;
		    if(document.getElementById(idvalue).checked==true)
			{
			 document.getElementById('Register').style.display='none';
			  document.getElementById('showregister').style.display='';
			}
	   }


	   var totalaltera3 = <?php echo $altera3;?>;
	   for(var i=0;i<totalaltera3;i++)
	   {
		    idvalue = '3altera'+i;
		    if(document.getElementById(idvalue).checked==true)
			{
			 document.getElementById('Register').style.display='none';
			  document.getElementById('showregister').style.display='';
			}
	   }

	   
}


function threealtera(aaa)
{
	if(document.getElementById('3altera').checked==true)
	{
	  var cntss = <?php echo $altera3;?>;
	  
	  for(var i=0;i<cntss;i++)
	  {
	      var alterathree ='3altera'+i;
		  document.getElementById(alterathree).checked=true;
		  document.getElementById('Register').style.display='none';
		  document.getElementById('showregister').style.display='';
	  }
	}
	if(document.getElementById('3altera').checked==false)
	{
		  document.getElementById('Register').style.display='';
		  document.getElementById('showregister').style.display='none';
	  var cntss = <?php echo $altera3;?>;
	  
	  for(var i=0;i<cntss;i++)
	  {
	      var alterathree ='3altera'+i;
		  document.getElementById(alterathree).checked=false;

	  }
	}


	 var totalaltera1 = <?php echo $altera1;?>;
	   for(var i=0;i<totalaltera1;i++)
	   {
		    idvalue = '1altera'+i;
		    if(document.getElementById(idvalue).checked==true)
			{
			 document.getElementById('Register').style.display='none';
			  document.getElementById('showregister').style.display='';
			}
	   }

	   var totalaltera2 = <?php echo $altera2;?>;
	   for(var i=0;i<totalaltera2;i++)
	   {
		    idvalue = '2altera'+i;
		    if(document.getElementById(idvalue).checked==true)
			{
			 document.getElementById('Register').style.display='none';
			  document.getElementById('showregister').style.display='';
			}
	   }


	   var totalaltera3 = <?php echo $altera3;?>;
	   for(var i=0;i<totalaltera3;i++)
	   {
		    idvalue = '3altera'+i;
		    if(document.getElementById(idvalue).checked==true)
			{
			 document.getElementById('Register').style.display='none';
			  document.getElementById('showregister').style.display='';
			}
	   }
	   
}


function fnshowothercourses()
{
   
   document.getElementById('othercourses').style.display='';
   document.getElementById('textothercourses').style.display='';
   document.getElementById('imageofothercourses').style.display='none';
}

function showassignregister(alteracourse,prgid)
{
 
	if(alteracourse==0)
	{
	   document.getElementById('showlinkregister'+prgid).style.display='none';
	   document.getElementById('unlinkregister'+prgid).style.display='';
	}
	else
	{
		   document.getElementById('showlinkregister'+prgid).style.display='';
		   document.getElementById('unlinkregister'+prgid).style.display='none'; 
	}
}


function assignfastfillingaltera(alteracourse,prgids)
{
	 if(alteracourse==0)
	   {
		   document.getElementById(prgids).style.display='none'; 
	   }
	  if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		    var stringsss = (xmlhttp.responseText);
			var proghide =stringsss.split('----');
			 
		    if(proghide[1]=='Hide')
		    {
			 prgid =proghide[0];
			     document.getElementById(prgid).style.display='';
		    }
			if(proghide[1]=='Unhide')
		    {
			
			 prgid =proghide[0];
			     document.getElementById(prgid).style.display='none';
		    }
	    }
	  }
	xmlhttp.open("GET","fastfilling.php?idprogramcalendar="+alteracourse,true);
	xmlhttp.send(); 
  
		
}

function assigndoctor(alteracourse)
{
	
	  if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		    var stringsss = (xmlhttp.responseText);
			var proghide =stringsss.split('----');
			 
		    if(proghide[1]=='Hide')
		    {
			 prgid =proghide[0];
			     document.getElementById(prgid).style.display='';
		    }
			if(proghide[1]=='Unhide')
		    {
			
			 prgid =proghide[0];
			     document.getElementById(prgid).style.display='none';
		    }
	    }
	  }
	xmlhttp.open("GET","fastfilling.php?idprogramcalendar="+alteracourse,true);
	xmlhttp.send(); 

		
}


function alterathreehideshow(images)
{

  
  if(images==2)
  {
     document.getElementById('threealteradownimage').style.display='';
	  document.getElementById('threealterasideimage').style.display='none';
	 document.getElementById('thirdaltera').style.display='';
  }
    if(images==1)
  {
  document.getElementById('threealteradownimage').style.display='none';
     document.getElementById('threealterasideimage').style.display='';
	 document.getElementById('thirdaltera').style.display='none';
  }
  
  
}



function alteratwohideshow(images)
{

  
  if(images==2)
  {
     document.getElementById('twoalteradownimage').style.display='';
	  document.getElementById('twoalterasideimage').style.display='none';
	 document.getElementById('secondaltera').style.display='';
  }
    if(images==1)
  {
  document.getElementById('twoalteradownimage').style.display='none';
     document.getElementById('twoalterasideimage').style.display='';
	 document.getElementById('secondaltera').style.display='none';
  }
}


function alteraonehideshow(images)
{

  
  if(images==2)
  {
     document.getElementById('onealteradownimage').style.display='';
	  document.getElementById('onealterasideimage').style.display='none';
	 document.getElementById('firstaltera').style.display='';
  }
    if(images==1)
  {
  document.getElementById('onealteradownimage').style.display='none';
     document.getElementById('onealterasideimage').style.display='';
	 document.getElementById('firstaltera').style.display='none';
  }
}

function initialdisplayofalteracourses()
{
alterathreehideshow(1);
alteratwohideshow(1);
alteraonehideshow(2);
  
}

function regaltera(ids,no)
{
  altid = ids+no;

  if(document.getElementById(altid).checked==true)
	{
	   //document.getElementById('regaltera').value=1;
	}
}

function assigndoctorsss(alteracourse,progid)
{
	 if(alteracourse==0)
	   {
		   document.getElementById(progid).style.display='none'; 
	   }
	assigndoctor(alteracourse);
	
	showassignregister(alteracourse,progid);
}
$(function(){
	$(':checkbox').click(function(){
	// if the wrapped set has any elements in it...
	if ($('input:checkbox:checked').length > 0){
	// do some work...
	alert("head-script: There is a Checked checkbox.");
	}
	});
	});
function selectchekbx(ids,prgids)
{
	//alert(prgids);
	if(document.getElementById(ids).checked==true)
	{

		//document.getElementById(ids)
	 document.getElementById('Register').style.display='none';
	  document.getElementById('showregister').style.display='';
	}
	else
	{
		 document.getElementById('Register').style.display='';
		  document.getElementById('showregister').style.display='none';
	}

   var totalaltera1 = <?php echo $altera1;?>;
   for(var i=0;i<totalaltera1;i++)
   {
	    idvalue = '1altera'+i;
	    if(document.getElementById(idvalue).checked==true)
		{
		 document.getElementById('Register').style.display='none';
		  document.getElementById('showregister').style.display='';
		}
   }

   var totalaltera2 = <?php echo $altera2;?>;
   for(var i=0;i<totalaltera2;i++)
   {
	    idvalue = '2altera'+i;
	    if(document.getElementById(idvalue).checked==true)
		{
		 document.getElementById('Register').style.display='none';
		  document.getElementById('showregister').style.display='';
		}
   }


   var totalaltera3 = <?php echo $altera3;?>;
   for(var i=0;i<totalaltera3;i++)
   {
	    idvalue = '3altera'+i;
	    if(document.getElementById(idvalue).checked==true)
		{
		 document.getElementById('Register').style.display='none';
		  document.getElementById('showregister').style.display='';
		}
   }
   
	
}
</script>
</head>

<body onload="initialdisplayofalteracourses()">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="143" rowspan="2"><img alt="RV-VLSI Design Center" src="images/RV-Institute_logo.jpg" width="143" height="110" border="0" usemap="#Map" style="padding:10px 0px;" />
                  <map name="MapMap" id="MapMap">
                    <area shape="rect" coords="0,2,107,97" href="index.php" />
                  </map></td>
                <td width="18" rowspan="2">&nbsp;</td>
                <td width="27" rowspan="2" align="left" valign="middle"><!--<img src="images/ATT_stamp_medium.jpg" width="107" height="69" border="0" style="margin:0px 0px 5px 0px;" />--></td>
                <td width="452" rowspan="2" align="left" valign="middle"><table width="88%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left" valign="middle"><br /><Br /><br /><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','405','height','35','src','caption_1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','caption_1' ); //end AC code
            </script>
                          <noscript>
                          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="405" height="35">
                            <param name="movie" value="caption_1.swf" />
                            <param name="quality" value="high" />
                            <embed src="caption_1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="405" height="35"></embed>
                          </object>
                        </noscript></td>
                    </tr>
                    <tr>
                      <td height="31">&nbsp;</td>
                    </tr>
                </table></td><td width="126" rowspan="2"><img src="images/logo_new.jpg" /></td>
                <td width="194" align="right" valign="bottom" class="link_green"><img src="images/contact_button.jpg" width="193" height="46" /></td>
              </tr>
              <tr><td align="right" valign="bottom" class="text10red" style="padding-bottom:5px;"><a href="index.php" class="text10red">Home</a> | <a href="contact_us.php" class="text10red">Contact Us</a> | <a href="sitemap.html" class="text10red">Sitemap</a></td>
              </tr>
            </table>
              <map name="Map" id="Map22">
                <area shape="rect" coords="0,2,141,110" href="index.php" />
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
                <td align="left" valign="bottom"><img src="images/jgainsmallban.png" /></td>
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
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
		
              <tr>
                <td align="left" valign="top">
                             <table width="100%">
        
             <tr>
			 <td valign="top">
             <table>
                  <tr><td><img src="images/header_courseplanner.png" width="454" height="32" /></td></tr>
                   <tr> 
			     <td class="infomation"><br /><br />Dear <span class="personname"><?php echo $_SESSION['name']?></span>,<br /><br />
Thank you for visiting RV-VLSI.
Based on your answers, the courses listed below
best suit your career objective. Register now for one of our courses for a career in
VLSI/Embedded or <a href="http://www.rv-vlsi.com/contact_us.php" target="_blank"> Contact us </a>for further details.</td>
			  </tr>
            <?php if($rvvlsi>0){?>
              <tr><td><img src="images/pixeltransparent.png" width="1" height="10" /></td></tr>
             <tr><td  align="left"><h2>RV-VLSI COURSES</h2></td>
			 <input type="hidden" name="regaltera" value="" id="regaltera" />
</table>
             	<table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground">
				
               </tr>
			   <tr class="gridheader">
			      <td width="100%" >Courses</td>
				  <td nowrap="nowrap">Start Date - End Date</td>
				  <td nowrap="nowrap" class="label"></td>
			   </tr>
                <?php
				for($s=0;$s<count($arrprograms);$s++){
				$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
				?>
                 <tr class="<?php echo $row_color?>">
                      <td width="40%"><a href="coursedetails.php?idprograms=<?php echo $arrprograms[$s]['idprograms']?>" rel="lyteframe" 
   				rev="width:980px; height:650px; scrolling:auto"><?php echo $arrprograms[$s]["Title"];?></a>
   					<img id="<?php echo $arrprograms[$s]['idprograms']?>" src="images/fastfiling.png" width="64" height="12" border="0" align="absmiddle" hspace="4"  style="display:none"/>
   				</td>
					  <td width="30%"> 
                      <select name="doctor" id="doctor"  style="width:250px;"  class="label"   onchange="assigndoctorsss(this.value,<?php echo $arrprograms[$s]['idprograms']?>);">
							  
							  <option value="0">Select Date</option>
							  	  <?php 
				  for($k=0;$k<count($arrprogramdetails);$k++){
			      if($arrprogramdetails[$k]['idprograms'] == $arrprograms[$s]['idprograms'])
				  {	
				 
				  ?>
							  <option value="<?php echo $arrprogramdetails[$k]['idprogramcalendar'];?>">
								<?php echo $arrprogramdetails[$k]['startmonth'];?>
								
					 
					 
					 <?php 
					 }
					 }
					  ?> </option>
							 
						</select>
					
					  </td>
					   
   				 <td nowrap="nowrap" class="requestapplication"><a id="showlinkregister<?php echo $arrprograms[$s]['idprograms']?>" href="thanksinformation.php?idprograms=<?php echo $arrprograms[$s]['idprograms']?>" rel="lyteframe" 
   				rev="width:600px; height:300px; scrolling:no" style="display:none"><img src="images/enable_rvvlsiregister.png" /></a>
   				<a id="unlinkregister<?php echo $arrprograms[$s]['idprograms']?>" ><img src="images/disable_rvvlsiregister.png" /></a>
   				</td>
					</tr>
					
<?php }?>


			</table>
			

			<table  width="100%">
 <tr><td><img src="images/pixeltransparent.png" width="1" height="10" /></td></tr>

 </table>
 
 	<?php }?>
    			<table border="0" cellspacing="1" width="100%">
			
			
			<hr />
			
            <tr>
          
            <td width="100%">
           
			
			
<h2>ALTERA Courses</h2>
<span class="infomation">Expand each of the below categories to view the assocaited courses, you can select (single/multiple) courses & click on the 
"Register for Altera Courses" below</span><br /><br />
			<table cellpadding="2" cellspacing="1" border="0" class="gridborder" width="100%" id="tableexpanded" style="display:" >
<tr  class="gridheader">

<td><img src="images/downarrow.png" width="16" id="onealteradownimage" align="absmiddle" height="13" hspace="4" onclick="alteraonehideshow(1)" style="cursor:pointer"/><img src="images/sidearrow.png" id="onealterasideimage" align="absmiddle" width="16" height="13" hspace="4" onclick="alteraonehideshow(2)" style="cursor:pointer"/>
<a href="alteradetailsheading.php?idprograms=1" rel="lyteframe" 
   				rev="width:980px; height:550px; scrolling:auto">Digital System Design & Implementation: made easy</a>
				</td>
</tr>
<tr  id="firstaltera">
<td style="padding:5px;">

<table border="0" cellspacing="1" cellpadding="3" width="100%"  class="gridbackground">
		 <tr class="gridheader">
			      <td nowrap="nowrap"><input type="checkbox" name="1altera" id="1altera" onclick="onealtera(value);"/></td><td width="100%" >Courses</td>
				  <td nowrap="nowrap">Start Date - End Date</td>
		          
			   </tr>
                <?php $cnt=0;
				for($s=0;$s<count($arrprogramsaltera);$s++){
				$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
				?>
                 <tr class="<?php echo $row_color?>">
                      <td><input type="checkbox" name="1altera" id="1altera<?php echo $cnt;?>" onclick="selectchekbx('1altera<?php echo $cnt;?>',<?php echo $arrprogramsaltera[$s]['idprograms']?>);"/></td>
					  <td>
					  <a href="alteracoursedetails.php?idprograms=<?php echo $arrprogramsaltera[$s]['idprograms']?>" rel="lyteframe" 
   				rev="width:980px; height:600px; scrolling:auto"><?php echo $arrprogramsaltera[$s]["Title"];?></a>
				<img id="<?php echo $arrprogramsaltera[$s]['idprograms']?>" src="images/fastfiling.png" width="64" height="12" border="0" align="absmiddle" hspace="4"  style="display:none"/>                </td>
					  <td>
					  
					    <select name="altera1" id="altera1" style="width:250px;"  class="label"   onchange="assignfastfillingaltera(this.value,<?php echo $arrprogramsaltera[$s]['idprograms']?>);">
					     <option value="0">Select Date</option>
						 <?php 
						  for($k=0;$k<count($arralteraprogramdetails);$k++){
						  if($arralteraprogramdetails[$k]['idprograms'] == $arrprogramsaltera[$s]['idprograms'])
						  {	
						 
						  ?>
							  <option value="<?php echo $arralteraprogramdetails[$k]['idprogramcalendar'];?>">
								<?php echo $arralteraprogramdetails[$k]['startmonth'];?>
								
					 
					 
						 <?php 
						 }
						 }$cnt++;
						  ?> </option>
							 
						</select>
					  </td>
					</tr>
               <?php }?>
		
			</table>

</td>
</tr>




</table><br />
			
			</td>
			  
			  
			  
			              <tr>
						
            <td width="100%">
						<table cellpadding="2" cellspacing="1" border="0" class="gridborder" width="100%">
<tr  class="gridheader">

<td><img src="images/downarrow.png" width="16" id="twoalteradownimage" height="13" hspace="4" onclick="alteratwohideshow(1)" style="cursor:pointer"/><img src="images/sidearrow.png" id="twoalterasideimage" width="16" height="13" hspace="4" onclick="alteratwohideshow(2)" style="cursor:pointer"/>
<a href="alteradetailsheading.php?idprograms=2" rel="lyteframe" 
   				rev="width:980px; height:550px; scrolling:auto">High Performance Digital System Design Techniques </a>
				</td>
</tr>
<tr id="secondaltera">
<td style="padding:5px;">
            <table border="0" cellspacing="1" cellpadding="3" width="100%"  class="gridbackground">
			
		 <tr class="gridheader">
			      <td nowrap="nowrap" ><input type="checkbox" name="2altera" id="2altera" onclick="twoaltera();"/></td><td width="100%">Courses</td>
				  <td nowrap="nowrap">Start Date - End Date</td>
		
			   </tr>
                <?php $cnt=0;
				for($s=0;$s<count($arrprogramsaltera1);$s++){
				$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
				?>
                 <tr class="<?php echo $row_color?>">
                      <td ><input type="checkbox" name="2altera" id="2altera<?php echo $cnt;?>" onclick="selectchekbx('2altera<?php echo $cnt;?>',<?php echo $arrprogramsaltera1[$s]['idprograms']?>);"/></td>
					  <td>
					  <a href="alteracoursedetails.php?idprograms=<?php echo $arrprogramsaltera1[$s]['idprograms']?>" rel="lyteframe" 
   				rev="width:980px; height:600px; scrolling:auto"><?php echo $arrprogramsaltera1[$s]["Title"];?></a>
				<img id="<?php echo $arrprogramsaltera1[$s]['idprograms']?>" src="images/fastfiling.png" width="64" height="12" border="0" align="absmiddle" hspace="4"  style="display:none"/> 
                </td>
					  <td>
					  
					   <select name="altera1" id="altera1" style="width:250px;"  class="label"   onchange="assignfastfillingaltera(this.value,<?php echo $arrprogramsaltera1[$s]['idprograms']?>);">
					     <option value="0">Select Date</option>
						 <?php 
						  for($k=0;$k<count($arralteraprogramdetails);$k++){
						  if($arralteraprogramdetails[$k]['idprograms'] == $arrprogramsaltera1[$s]['idprograms'])
						  {	
						 
						  ?>
							  <option value="<?php echo $arralteraprogramdetails[$k]['idprogramcalendar'];?>">
								<?php echo $arralteraprogramdetails[$k]['startmonth'];?>
								
					 
					 
						 <?php 
						 }
						 }$cnt++;
						  ?> </option>
							 
						</select>
					  </td>
					</tr>
               <?php }?>
			
			</table>

</td>
</tr>




</table><br />
			
			</td>
			  
			  
			  
			              <tr>
						
		<!--for category 3--> 
		 <tr>
            <td width="100%">
				<table cellpadding="2" cellspacing="1" border="0" class="gridborder" width="100%">
<tr  class="gridheader">
<td><img src="images/downarrow.png" width="16" id="threealteradownimage" height="13" hspace="4" onclick="alterathreehideshow(1)" style="cursor:pointer"/><img src="images/sidearrow.png" id="threealterasideimage" width="16" height="13" hspace="4" onclick="alterathreehideshow(2)" style="cursor:pointer"/>
<a href="alteradetailsheading.php?idprograms=3" rel="lyteframe" 
   				rev="width:980px; height:550px; scrolling:auto">Advanced Embedded Systems Design using NIOS II Soft Processor</a>
</td>
</tr>
<tr   id="thirdaltera">
<td style="padding:5px;">
            <table border="0" cellspacing="1" cellpadding="3" width="100%"  class="gridbackground">
		 <tr class="gridheader">
			      <td nowrap="nowrap"><input type="checkbox" name="3altera" id="3altera" onclick="threealtera();"/></td><td width="100%">Courses</td>
				  <td nowrap="nowrap">Start Date - End Date</td>
		
			   </tr>
                <?php $cnt=0;
				for($s=0;$s<count($arrprogramsaltera2);$s++){
				$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
				?>
                 <tr class="<?php echo $row_color?>">
                      <td><input type="checkbox" name="3altera" id="3altera<?php echo $cnt;?>" onclick="selectchekbx('3altera<?php echo $cnt;?>',<?php echo $arrprogramsaltera2[$s]['idprograms']?>);"/></td>
					  <td>
					  <a href="alteracoursedetails.php?idprograms=<?php echo $arrprogramsaltera2[$s]['idprograms']?>" rel="lyteframe" 
   				rev="width:980px; height:600px; scrolling:auto"><?php echo $arrprogramsaltera2[$s]["Title"];?></a>
					<img id="<?php echo $arrprogramsaltera2[$s]['idprograms']?>" src="images/fastfiling.png" width="64" height="12" border="0" align="absmiddle" hspace="4"  style="display:none"/> 
                </td>
					  <td>
					  
					      <select name="altera1" id="altera1" style="width:250px;"  class="label"   onchange="assignfastfillingaltera(this.value,<?php echo $arrprogramsaltera2[$s]['idprograms']?>);">
					     <option value="0">Select Date</option>
						 <?php 
						  for($k=0;$k<count($arralteraprogramdetails);$k++){
						  if($arralteraprogramdetails[$k]['idprograms'] == $arrprogramsaltera2[$s]['idprograms'])
						  {	
						 
						  ?>
							  <option value="<?php echo $arralteraprogramdetails[$k]['idprogramcalendar'];?>">
								<?php echo $arralteraprogramdetails[$k]['startmonth'];?>
								
					 
					 
						 <?php 
						 }
						 }$cnt++;
						  ?> </option>
							 
						</select>
					  </td>
					</tr>
               <?php }?>
						</table>

</td>
</tr>




</table>

			</td>
<tr><td align="right">
<img src="images/disable_alteraregister.png"  id="Register" />
<span  style="display:none" name="showregister" id="showregister">
<a href="thanksinformation.php?idprograms=500" rel="lyteframe" 
   				rev="width:400px; height:300px; scrolling:no"><img src="images/enable_alteraregister.png" /></a>
</span>
<hr />	
</td>

</tr>		
<br />
	

 
			 
			  <tr><td id="imageofothercourses"><img src="images/btn_viewothercourses.png" width="250" height="30" onClick="fnshowothercourses();" style="cursor:pointer"/></td></tr>
			  <tr><td><img src="images/pixeltransparent.png" width="1" height="15" /></td></tr>
             <tr><td  align="left" id="textothercourses" style="display:none"><h2>Others Courses</h2></td>

             	<table border="0" cellspacing="1" cellpadding="3" width="100%" class="gridbackground" id="othercourses" style="display:none">
				
               </tr>
			   <tr class="gridheader">
			      <td width="100%" >Courses</td>
				  <td nowrap="nowrap">Start Date - End Date</td>
				  <td nowrap="nowrap" class="label"></td>
			   </tr>
                <?php
				for($s=0;$s<count($arrprogramsothers);$s++){
				$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
				?>
                 <tr class="<?php echo $row_color?>">
                      <td width="40%"><a href="coursedetails.php?idprograms=<?php echo $arrprogramsothers[$s]['idprograms']?>" rel="lyteframe" 
   				rev="width:980px; height:600px; scrolling:auto"><?php echo $arrprogramsothers[$s]["Title"];?></a>
   					<img id="<?php echo $arrprogramsothers[$s]['idprograms']?>" src="images/fastfiling.png" width="64" height="12" border="0" align="absmiddle" hspace="4"  style="display:none"/>                
   					</td>
					  <td width="30%"> <select name="doctor" id="doctor" style="width:250px;"   class="label"  onchange="assigndoctorsss(this.value,<?php echo $arrprogramsothers[$s]['idprograms']?>);">
							  
							  <option value="0">Select Date</option>
								
							  	  <?php 
				  for($k=0;$k<count($arrprogramdetails);$k++){
			      if($arrprogramdetails[$k]['idprograms'] == $arrprogramsothers[$s]['idprograms'])
				  {	
				 
				  ?>
							  <option value="<?php echo $arrprogramdetails[$k]['idprogramcalendar'];?>">
								<?php echo $arrprogramdetails[$k]['startmonth'];?>
								
					 
					 
					 <?php 
					 }
					 }
					  ?> </option>
							 
						</select>
					
					  </td>
					      <td nowrap="nowrap" class="requestapplication"><a id="showlinkregister<?php echo $arrprogramsothers[$s]['idprograms']?>" href="thanksinformation.php?idprograms=<?php echo $arrprogramsothers[$s]['idprograms']?>" rel="lyteframe" 
   				rev="width:400px; height:300px; scrolling:no" style="display:none"><img src="images/enable_rvvlsiregister.png" /></a>
   				<a id="unlinkregister<?php echo $arrprogramsothers[$s]['idprograms']?>" ><img src="images/disable_rvvlsiregister.png" /></a>
   				</td>
					</tr>
					
<?php }?>


			</table>
			</td>
			</tr>
			
			<tr style="display:none;">
			<td nowrap="nowrap" style="border:1px solid #9ea3aa;border-left:0px;padding:3px;" class="requestapplication"><a id="alterahide" style="display:none" href="thanksinformation.php?idprograms=500" rel="lyteframe" 
   				rev="width:400px; height:300px; scrolling:no" onclick="selectaltera();">Request for Application</a></td>
          </tr>
			
			</table>
			
			
			
			</td>
			<tr><td align="right"><input type="button" name="Back" id="Back" value="Back" class="grayButton" onClick="fnclose();"/></td></tr>
			</table>


				  </td>
               
               
                  </tr>
                  <tr><td><h2>VLSI & Embedded companies
where our students are placed</h2></td></tr>
                  <tr><td><? include_once('customerlogos.php');?></td></tr>
              
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20">&nbsp;</td>
      </tr>	
   
      <tr>
        <td height="37" colspan="3" align="center" valign="middle" background="images/footer_bg.jpg">
        <table width="950" border="0" cellspacing="0" cellpadding="0" align="center">
        
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
<li><a href="rsst.php" class="border_top">Rashtreeya Sikshana Samiti Trust</a></li>
<li><a href="ceo_message_about.php">CEO Message</a></li>
<li><a href="gov_council.php">Governing Council</a></li>
<li><a href="strategy.php">Strategic Advisory Board</a></li>
</ul>
</body>
</html>
