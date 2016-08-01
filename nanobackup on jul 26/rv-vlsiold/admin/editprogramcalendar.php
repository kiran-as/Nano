<?php include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
error_reporting(E_ALL ^ E_NOTICE);


$resultccc = "SELECT b.*,a.*  FROM tbl_programs as a,tbl_programcalendar as b  where a.idprograms=b.idprograms and  b.idprogramcalendar=".$_GET['idprogramcalendar'];
$result = mysql_query($resultccc);
while ($row = mysql_fetch_assoc($result)) {
   $idprogramcalendar = $row['idprogramcalendar'];
   $idprograms = $row['idprograms'];
   $startweek = $row['startweek'];
   $endweek = $row['endweek'];
   $startdate = $row['startdate'];
    $enddate = $row['enddate'];
	   $active = $row['active'];
   $startmonth = $row['startmonth'];
   $endmonth = $row['endmonth'];
   $noofdays = $row['noofdays'];
   $idprograms = $row['idprograms'];
    $Title = $row['Title'];
	$programtype = $row['Programtype'];
	$Startyear = $row['Startyear'];
	$Endyear = $row['Endyear'];
	$Fastfilling = $row['Fastfilling'];  
  }
	if($noofdays=='')
	{
	  $noofdays=0;
	}

$arr = explode('-', $startdate);
$newstartdate = $arr[2].'-'.$arr[1].'-'.$arr[0];


$arr = explode('-', $enddate);
$newenddate = $arr[2].'-'.$arr[1].'-'.$arr[0];

	

				$resultdoctor = "SELECT * FROM tbl_programs where Programtype=1 and Active=1";
	//print_r($resultdoctor);die();
	$resultdoctorss = mysql_query($resultdoctor);
	
	$s=0;
	while ($row = mysql_fetch_assoc($resultdoctorss)) {
		  $arradoctor[$s]["idprograms"]	= $row["idprograms"];
		  $arradoctor[$s]["Title"]	= $row["Title"];
		  $s++;  
		}
		
		
		$resultaltera = "SELECT * FROM tbl_programs where Programtype=0 and Active=1";
	//print_r($resultdoctor);die();
	$resultalterass = mysql_query($resultaltera);
	
	$s=0;
	while ($row = mysql_fetch_assoc($resultalterass)) {
		  $arraltera[$s]["idprograms"]	= $row["idprograms"];
		  $arraltera[$s]["Title"]	= $row["Title"];
		  $s++;  
		}
		
	
	if($_POST)		
	{
	
	
	   $programtype = $_POST['programtype'];
	   if($programtype==0)
	   {
					$idprogram = $_POST['arraltera'];
					$startmonth= 0;
				$startweek= 0;
				 $endmonth= 0;
				  $endweek= 0;
				  $startyear= 0;
				  $endyear= 0;
				  $noofdays = $_POST['days'];
				  if($noofdays==1)
				  {
					$fromymd = $_POST['from1'];
					$arr = explode('-', $fromymd);
			        $from = $arr[2].'-'.$arr[1].'-'.$arr[0];
				  }
				  else
				  {
					$fromymd = $_POST['from'];
					$arr = explode('-', $fromymd);
           			$from = $arr[2].'-'.$arr[1].'-'.$arr[0];
			
			
			        $toexd=$_POST['to'];
					$arr = explode('-', $toexd);
			        $to = $arr[2].'-'.$arr[1].'-'.$arr[0];
				  }
				  
			
			  $fast = $_POST['altfast'];
			  if($fast=='')
			  {
				$fast=0;
			  }
			  $active = $_POST['active'];
	   }
	   else
	   {
	     $idprogram = $_POST['rvlsi'];
   $startmonth= $_POST['startmonth'];
    $startweek= $_POST['startweek'];
	 $endmonth= $_POST['endmonth'];
	  $endweek= $_POST['endweek'];
	  	 $startyear= $_POST['startyear'];
	  $endyear= $_POST['endyear'];
	 
	  
	  $noofdays = 0;
	  $from=0;
	  $to=0;
	   $fast = $_POST['rvfast'];
	    if($fast=='')
  {
    $fast=0;
  }
	   $active = $_POST['active1'];
	   }
	   




 $result = mysql_query("UPDATE tbl_programcalendar set  idprograms=  '".$idprogram."', 
													 startweek=  '".$startweek."',
													  endweek=  '".$endweek."',
													 startdate=  '".$from."',
													  enddate=  '".$to."',
													   Startyear=  '".$startyear."',
													  Endyear=  '".$endyear."', 
													  active=  '".$active."',
													  Fastfilling=  '".$fast."', 
													  startmonth=  '".$startmonth."',
													  endmonth=  '".$endmonth."',
													  noofdays=  '".$noofdays ."' 
											
				WHERE idprogramcalendar ='".$_POST['idprogramcalendar']."' "); 
				echo "<script>parent.location = 'admin_programe_calendar.php';</script>";	
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<link rel="stylesheet" type="text/css" media="all" href="../css/Theme.css" title="summer" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css"  href="../css/jquery.datepick.css" />
<script type="text/javascript" src="../javascript/jquery.datepick.js"></script>
<script type="text/javascript" src="../javascript/calendar.js"></script>

<!-- import the language module -->
<script type="text/javascript" src="../javascript/calendar-en.js"></script>
<link rel="stylesheet" href="../css/styleupdated.css" type="text/css" media="screen" />

	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<script type="text/javascript" src="../js/admin_validation.js"></script>
<link href="../rv_main.css" rel="stylesheet" type="text/css" />
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="../css/theme.css" rel="stylesheet" type="text/css" />
<head>
<script type="text/javascript">
function userselected()
{

     document.getElementById('txtsstwo').style.display='none';
	     document.getElementById('txttwo').style.display='none';
 	document.getElementById('programtype1').checked = true;
	document.getElementById('one').checked = true;
fromdatejquery();
hidealtera();
}


function fromdatejquery()
{
	$('#from').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#to').datepick({dateFormat: 'yyyy-mm-dd'});		
}

function nodays(noofdays)
{

  if(noofdays==2)
  {
    document.getElementById('singlecalendar').style.display='none';
	     document.getElementById('multiplecalendar').style.display='';
		 document.getElementById('single').value=2;
  }
  else
  {
   document.getElementById('singlecalendar').style.display='';
	     document.getElementById('multiplecalendar').style.display='none';
		 document.getElementById('single').value=1;
  }
}





function rvvlsi(ptype)
{
  if(ptype==0)
  {
    
	 document.getElementById('rvvlsitable').style.display='none';
	  document.getElementById('alteratable').style.display='';
	  nodays(<?php echo $noofdays?>);
	 }
   else
   {
       document.getElementById('rvvlsitable').style.display='';
	  document.getElementById('alteratable').style.display='none';
	  }
 
}

 function fnclose()
 {
     parent.location="admin_programe_calendar.php";
 }
 
 var oldLink = null;
// code to change the active stylesheet
function setActiveStyleSheet(link, title) {
  var i, a, main;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
      a.disabled = true;
      if(a.getAttribute("title") == title) a.disabled = false;
    }
  }
  if (oldLink) oldLink.style.fontWeight = 'normal';
  oldLink = link;
  link.style.fontWeight = 'bold';
  return false;
}

// This function gets called when the end-user clicks on some date.
function selected(cal, date) {
  cal.sel.value = date; // just update the date in the input field.
  if (cal.dateClicked && (cal.sel.id == "sel1" || cal.sel.id == "sel3"))
    // if we add this call we close the calendar on single-click.
    // just to exemplify both cases, we are using this only for the 1st
    // and the 3rd field, while 2nd and 4th will still require double-click.
    cal.callCloseHandler();
}

// And this gets called when the end-user clicks on the _selected_ date,
// or clicks on the "Close" button.  It just hides the calendar without
// destroying it.
function closeHandler(cal) {
  cal.hide();                        // hide the calendar
//  cal.destroy();
  _dynarch_popupCalendar = null;
}

// This function shows the calendar under the element having the given id.
// It takes care of catching "mousedown" signals on document and hiding the
// calendar if the click was outside.
function showCalendar(id, format, showsTime, showsOtherMonths) {
  var el = document.getElementById(id);
  if (_dynarch_popupCalendar != null) {
    // we already have some calendar created
    _dynarch_popupCalendar.hide();                 // so we hide it first.
  } else {
    // first-time call, create the calendar.
    var cal = new Calendar(1, null, selected, closeHandler);
    // uncomment the following line to hide the week numbers
    // cal.weekNumbers = false;
    if (typeof showsTime == "string") {
      cal.showsTime = false;
      cal.time24 = (showsTime == "24");
    }
    if (showsOtherMonths) {
      cal.showsOtherMonths = true;
    }
    _dynarch_popupCalendar = cal;                  // remember it in the global var
    cal.setRange(1900, 2070);        // min/max year allowed.
    cal.create();
  }
  _dynarch_popupCalendar.setDateFormat(format);    // set the specified date format
  _dynarch_popupCalendar.parseDate(el.value);      // try to parse the text in field
  _dynarch_popupCalendar.sel = el;                 // inform it what input field we use

  // the reference element that we pass to showAtElement is the button that
  // triggers the calendar.  In this example we align the calendar bottom-right
  // to the button.
  _dynarch_popupCalendar.showAtElement(el.nextSibling, "Br");        // show the calendar

  return false;
}

var MINUTE = 60 * 1000;
var HOUR = 60 * MINUTE;
var DAY = 24 * HOUR;
var WEEK = 7 * DAY;

// If this handler returns true then the "date" given as
// parameter will be disabled.  In this example we enable
// only days within a range of 10 days from the current
// date.
// You can use the functions date.getFullYear() -- returns the year
// as 4 digit number, date.getMonth() -- returns the month as 0..11,
// and date.getDate() -- returns the date of the month as 1..31, to
// make heavy calculations here.  However, beware that this function
// should be very fast, as it is called for each day in a month when
// the calendar is (re)constructed.
function isDisabled(date) {
  var today = new Date();
  return (Math.abs(date.getTime() - today.getTime()) / DAY) > 10;
}

function flatSelected(cal, date) {
  var el = document.getElementById("preview");
  el.innerHTML = date;
}

function showFlatCalendar() {
  var parent = document.getElementById("display");

  // construct a calendar giving only the "selected" handler.
  var cal = new Calendar(0, null, flatSelected);

  // hide week numbers
  cal.weekNumbers = false;

  // We want some dates to be disabled; see function isDisabled above
  cal.setDisabledHandler(isDisabled);
  cal.setDateFormat("%A, %B %e");

  // this call must be the last as it might use data initialized above; if
  // we specify a parent, as opposite to the "showCalendar" function above,
  // then we create a flat calendar -- not popup.  Hidden, though, but...
  cal.create(parent);

  // ... we can show it here.
  cal.show();
}

function onloadforedit()
{
   
   rvvlsi(<?php echo $programtype?>);
   var noofd = <?php echo $noofdays?>;
  // alert(noofd);
   if(noofd==0)
   {
     noofdys = 1;
   }
   var fstfilling = <?php echo $Fastfilling?>;

   
  // alert(fstfilling);
   if(fstfilling==1)
   {
      document.getElementById('altfast').checked=true;
	   document.getElementById('rvfast').checked=true;
   }
   
   //nodays(noofdys);
}

function altfastss()
{

if(document.getElementById('altfast').checked==true)
	{  
		 document.getElementById('altfast').value=1;
	}
if(document.getElementById('altfast').checked==false)
	{  
		 document.getElementById('altfast').value=0;
	}		 
}


function rvfastss()
{
	if(document.getElementById('rvfast').checked==true)
	{  
		 document.getElementById('rvfast').value=1;
	}
    if(document.getElementById('rvfast').checked==false)
	{  
		 document.getElementById('rvfast').value=0;
	}
}

function validateprogramss()
{
var noofdayss = document.getElementById('single').value;
if(noofdayss==1)
{
var frmdate =  document.getElementById('from1').value;
if(frmdate=='')
{
  alert("Enter the From Date");
   return false;
}
}

if(noofdayss==2)
{
var frmdate =  document.getElementById('from').value;
if(frmdate=='')
{
  alert("Enter the From Date");
  return false;
}
var todate =  document.getElementById('to').value;
if(todate=='')
{
  alert("Enter the To Date");
   return false;
}

}

if(noofdayss==2)
{
arrfrmdates = frmdate.split("-");



arrtodate = todate.split("-");


if(eval(arrfrmdates[2])>eval(arrtodate[2]))
{
  alert("Please enter the proper dates");
  	  return false;
}

if(eval(arrfrmdates[2])<=eval(arrtodate[2]))
{
  if(eval(arrfrmdates[1])>eval(arrtodate[1]))
  {
     alert("Please enter the proper dates");
	  return false;
  }
  else if(eval(arrfrmdates[1])<eval(arrtodate[1]))
  {
     
  }
  
  else if(eval(arrfrmdates[1])==eval(arrtodate[1]))
  {
     
      if(eval(arrfrmdates[0])>eval(arrtodate[0]))
	   {
	   	      alert("Please enter the proper dates");
		  	  return false;
	   }
  }
  
}


}

return true;
}
</script>
<body onLoad="onloadforedit();">
<div class="wrapper">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="111"><a href="../index.php"><img src="../images/logo.jpg" width="111" height="98" border="0" /></a></td>
                <td width="55">&nbsp;</td>
                <td width="88" align="left" valign="middle">&nbsp;</td>
                <td align="left" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="bottom"></td>
                  </tr>
				  <tr><td width="20%"></td><td width="1px" style="background-color:#999999"></td><td width="78%"></td></tr>
                </table></td>
                <td width="332" align="right" valign="bottom" class="link_green" style="padding-bottom:5px;">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          
          <tr>
            <td align="left" valign="top" style="background:#CCCCCC; height:2px;" ></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td width="20%" valign="top" style="border-right: 2px solid #CCCCCC;">
				<? include("admin_navigation.php");?>
				
				
				</td>
				<td width="80%" valign="top" >
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr><td colspan="4" class="heading_new">Edit Program Calendar</td></tr>
				<tr>
				<td>
				

 <form action="" method="POST" id="myForm" name="myform">
<table border="0" cellspacing="1" cellpadding="10" width="100%" style="padding:10px;">
<tr id="hidealteratype" style="display:none">

   <input type="hidden" name='idprogramcalendar' value=<?php echo $idprogramcalendar?> id='idprogramcalendar' />
   
	  <td  class="label" nowrap="nowrap">Program Type&nbsp;&nbsp;&nbsp;<input type="radio" name="programtype" id="programtype1" value="1" <?php if($programtype==1){ ?>checked="checked"<?php }?>onclick="rvvlsi(this.value)"  >RV-VLSI
								<input type="radio" name="programtype"  value="0" <?php if($programtype==0){ ?>checked="checked"<?php }?> onClick="rvvlsi(this.value)">ALTERA</td>
								
								
</tr>
</table>
<table id="rvvlsitable">
<tr>
     <td   class="label" nowrap="nowrap" id='rvvlsi9'>Title</td>
	 <td > <select name="rvlsi" id="rvlsi"  name="rvlsi" class="label"  style="width:300px;" onchange="assignrvlsi();">
							  
							  <?php for($i=0;$i<count($arradoctor);$i++){?>
							  <option value="<?php echo $arradoctor[$i]['idprograms'];?>" <?php if($idprograms ==  $arradoctor[$i]['idprograms']) echo "selected";?>>
								<?php echo $arradoctor[$i]['Title'];?>
								</option>
							  <?php }?>
						</select></td>
	 
</tr>


<tr>
     <td  class="label" nowrap="nowrap" >Start Month</td>
 <td>
 <select name="startyear" id="startyear" value=""style="width:100px;"> 
																		<option value="2012"<?php if($Startyear == '2012') echo "selected";?>>2012</option>
																		<option value="2013"<?php if($Startyear == '2013') echo "selected";?>>2013</option>
																		<option value="2014"<?php if($Startyear == '2014') echo "selected";?>>2014</option>
																		<option value="2015"<?php if($Startyear == '2015') echo "selected";?>>2015</option>
																	</select>
 
 <select name="startmonth" id="startmonth" value=""style="width:150px;"> 
																		<option value="Jan" <?php if($startmonth == 'Jan') echo "selected";?>>Jan</option><option value="Feb" <?php if($startmonth == 'Feb') echo "selected";?>>Feb</option>
																		<option value="Mar" <?php if($startmonth == 'Mar') echo "selected";?>>Mar</option><option value="Apr" <?php if($startmonth == 'Apr') echo "selected";?>>Apr</option>
																		<option value="May" <?php if($startmonth == 'May') echo "selected";?>>May</option><option value="June" <?php if($startmonth == 'June') echo "selected";?>>June</option>
																		<option value="Jul" <?php if($startmonth == 'Jul') echo "selected";?>>Jul</option><option value="Aug" <?php if($startmonth == 'Aug') echo "selected";?>>Aug</option>
																		<option value="Sep" <?php if($startmonth == 'Sep') echo "selected";?>>Sep</option><option value="Oct" <?php if($startmonth == 'Oct') echo "selected";?>>Oct</option>
																		<option value="Nov" <?php if($startmonth == 'Nov') echo "selected";?> >Nov</option><option value="Dec" <?php if($startmonth == 'Dec') echo "selected";?>>Dec</option></select>
<select name="startweek" id="startweek" value=""style="width:150px;"> 
																		<option value="1st Week" <?php if($startweek == '1st Week') echo "selected";?>>1st Week</option><option value="2nd Week" <?php if($startweek == '2nd Week') echo "selected";?>>2nd Week</option>
																		<option value="3rd Week" <?php if($startweek == '3rd Week') echo "selected";?>>3rd Week</option><option value="4th Week" <?php if($startweek == '4th Week') echo "selected";?>>4th Week</option>
																		</select></td>
	 
</tr>
<tr>
     <td  class="label" nowrap="nowrap">End Month</td>
 <td>
 
  <select name="endyear" id="endyear" value=""style="width:100px;"> 
																		<option value="2012"<?php if($Endyear == '2012') echo "selected";?>>2012</option>
																		<option value="2013"<?php if($Endyear == '2013') echo "selected";?>>2013</option>
																		<option value="2014"<?php if($Endyear == '2014') echo "selected";?>>2014</option>
																		<option value="2015"<?php if($Endyear == '2015') echo "selected";?>>2015</option>
																	</select>
 <select name="endmonth" id="endmonth" value=""style="width:150px;"> 
																		<option value="Jan" <?php if($endmonth == 'Jan') echo "selected";?>>Jan</option><option value="Feb" <?php if($endmonth == 'Feb') echo "selected";?>>Feb</option>
																		<option value="Mar" <?php if($endmonth == 'Mar') echo "selected";?>>Mar</option><option value="Apr" <?php if($endmonth == 'Apr') echo "selected";?>>Apr</option>
																		<option value="May" <?php if($endmonth == 'May') echo "selected";?>>May</option><option value="June" <?php if($endmonth == 'June') echo "selected";?>>June</option>
																		<option value="Jul" <?php if($endmonth == 'Jul') echo "selected";?>>Jul</option><option value="Aug" <?php if($endmonth == 'Aug') echo "selected";?>>Aug</option>
																		<option value="Sep" <?php if($endmonth == 'Sep') echo "selected";?>>Sep</option><option value="Oct" <?php if($endmonth == 'Oct') echo "selected";?>>Oct</option>
																		<option value="Nov" <?php if($endmonth == 'Nov') echo "selected";?> >Nov</option><option value="Dec" <?php if($endmonth == 'Dec') echo "selected";?>>Dec</option></select>
	 

<select name="endweek" id="endweek" value=""style="width:150px;"> 
																		<option value="1st Week"  <?php if($endweek == '1st Week') echo "selected";?>>1st Week</option><option value="2nd Week" <?php if($endweek == '2nd Week') echo "selected";?>>2nd Week</option>
																		<option value="3rd Week" <?php if($endweek == '3rd Week') echo "selected";?>>3rd Week</option><option value="4th Week" <?php if($endweek == '4th Week') echo "selected";?>>4th Week</option>
																		</select></td>
	 
<tr>
      <td  class="label" nowrap="nowrap">Active</td>
 <td><select name="active1" id="active1" value=""style="width:150px;"> 
																		<option value="1" <?php if($active == '1') echo "selected";?>>Active</option><option value="0" <?php if($active == '0') echo "selected";?>>In-Active</option>
																		</select></td>
</tr>

<tr>
     <td  class="label" nowrap="nowrap"></td>
<td><input type="checkbox" name="rvfast" id="rvfast" value=""  onclick="rvfastss();"/>Set as Fast Filling Course</td>
</tr>
<tr>
			   <td colspan="2" align="right"><input type="submit" name="save" id="save" value="save" class="blueButton" onClick="return validateprograms();"/>
											<input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td>
				
			</tr>	 
</tr>
</table>
<table id='alteratable'> 
<tr>
<input type="hidden" name="single" id="single" value="" />
     <td  class="label" nowrap="nowrap" id='alt1'>Title</td>
	 <td > <select name="arraltera" id="arraltera"  name="arraltera" class="label"  style="width:300px;" onchange="assignarraltera();">
							  
							  <?php for($i=0;$i<count($arraltera);$i++){?>
							  <option value="<?php echo $arraltera[$i]['idprograms'];?>"  <?php if($idprograms ==  $arraltera[$i]['idprograms']) echo "selected";?>>
								<?php echo $arraltera[$i]['Title'];?>
								</option>
							  <?php }?>
						</select></td>
	 
</tr>

<tr>
	  <td  class="label" nowrap="nowrap">No of Days</td>
	 <td><input type="radio" name="days"  id='one' value="1" <?php if($noofdays==1){ ?>checked="checked"<?php }?> onclick="nodays(this.value)"  checked="checked">One
								<input type="radio" name="days"  value="2" <?php if($noofdays==2){ ?>checked="checked"<?php }?> onClick="nodays(this.value)">Two</td>
</tr>
<tr  id="singlecalendar">
<td>Date</td>
  <td><input type="text" name="from1" id="from1" size="30" value="<?php echo $newstartdate;?>"
><img src="../images/icon_calendar.gif" alt="Calendar" onclick="return showCalendar('from1', '%d-%m-%Y', '24', true);"  align="absmiddle"/></td>
</tr>

<tr  id="multiplecalendar">
<td>Date Range</td>
<td>From<input type="text" name="from" id="from" size="30" value="<?php echo $newstartdate;?>"
><img src="../images/icon_calendar.gif" alt="Calendar" onclick="return showCalendar('from', '%d-%m-%Y', '24', true);"  align="absmiddle"/>
To<input type="text" name="to" id="to" size="30" value="<?php echo $newenddate;?>"
><img src="../images/icon_calendar.gif" alt="Calendar" onclick="return showCalendar('to', '%d-%m-%Y', '24', true);"  align="absmiddle"/> </td>
</tr>

<tr>
      <td  class="label" nowrap="nowrap">Active</td>
 <td><select name="active" id="active" value=""style="width:150px;"> 
																		<option value="1" <?php if($active == '1') echo "selected";?>>Active</option><option value="0" <?php if($active == '0') echo "selected";?>>In-Active</option>
																		</select></td>
</tr>
<tr>
     <td  class="label" nowrap="nowrap"></td>
 <td><input type="checkbox" name="altfast" value="0" id="altfast" onclick="altfastss();"/> Set as Fast Filling Course</td>
</tr>

<tr>
			   <td colspan="2" align="right"><input type="submit" name="save" id="save" value="save" class="blueButton" onClick="return validateprogramss();"/>
											<input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td>
				
			</tr>

</table>
</form>

				</td>
				</tr>
				</Table>
				</td>
				</tr>
				<tr><td></td></tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td height="20" colspan="3" align="center" valign="middle"></td>
      </tr>
      <tr>
        <td height="37" colspan="3" align="center" valign="middle" background="../images/footer_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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




			
 </div>                  
</body>
</html>
