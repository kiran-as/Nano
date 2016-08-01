<?php error_reporting (E_ALL ^ E_NOTICE); /* 1st line (recommended) */
 include("application/conn.php");
	session_start();
	if($_SESSION['roles']=='')
	{
	   header('location:index.php');
		exit();
	}

		
		if($_POST)
		{
		  $from = $_POST['from'];
		  $to = $_POST['to'];
		  $Select = "SELECT a.*,b.*,c.*
		             FROM `tbl_patientdetails` as a,tbl_patient as b,tbl_doctor as c	 
					 WHERE  a.idpatient=b.idpatient and a.iddoctor=c.iddoctor and a.date<='$to' and a.date>='$from'";

		  $resultprojects = mysql_query($Select);
	$k=0;$totalamt=0;
	      while ($row = mysql_fetch_assoc($resultprojects)) {
	      
		  $arraStudent[$k]["Testname"]	= $row["Testname"];
		  $arraStudent[$k]["date"]	= $row["date"];
		  $arraStudent[$k]["Doctorname"]	= $row["Doctorname"];
		  $arraStudent[$k]["PatientName"]	= $row["PatientName"];
		  $idpatientdetails = $row['idpatientdetails'];
		  
		    $lselect = "SELECT sum(Amount) from tbl_testgroupdetails where idtestgroupdetails in 
						(Select idtestgroupdetails from tbl_patientsubdetails where idpatientdetails=$idpatientdetails)";
			 $subquery = mysql_query($lselect);

	      while ($row = mysql_fetch_assoc($subquery)) {
		  $arraStudent[$k]["amount"]	= $row["sum(Amount)"];
		  $amt = $row["sum(Amount)"];
		  }

         $totalamt = $totalamt+$amt;
		  $k++;  
		   }
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<script language="javascript" type="text/javascript" src="javascript/lytebox.js"></script>
	<link rel="stylesheet" href="css/lytebox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/Theme.css" type="text/css" media="screen" />

<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css"  href="css/jquery.datepick.css" />
<script type="text/javascript" src="javascript/jquery.datepick.js"></script>

<script type="text/javascript" src="javascript/calendar.js"></script>

<!-- import the language module -->
<script type="text/javascript" src="javascript/calendar-en.js"></script>

<style type="text/css">
.ex { font-weight: bold; background: #fed; color: #080 }
.help { color: #080; font-style: italic; }
body {  font: 10pt tahoma,verdana,sans-serif; }
table { font: 13px verdana,tahoma,sans-serif; }
a { color: #00f; }
a:visited { color: #00f; }
a:hover { color: #f00; background: #fefaf0; }
a:active { color: #08f; }
.key { border: 1px solid #000; background: #fff; color: #008;
padding: 0px 5px; cursor: default; font-size: 80%; }
</style>


<script type="text/javascript">


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

</script>
	
</head>

<body>
<div class="wrapper">
<table width="100%" cellpadding="0" border="0" cellspacing="0" >
	<tr>
		<td class="topbanner">
			<table width="100%" cellpadding="0" border="0" cellspacing="0">
				<tr>
					<td width="100%"><img src="images/balajilogo.png"></td>
					<td><img src="images/labmanager.png"></td>
				</tr>
				<tr>
					<td></td>
					<td valign="top" align="right" class="welcomeuser">Welcome <?php echo $_SESSION['user']?>,&nbsp;&nbsp;&nbsp; <a href="logout.php">Logout</a></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <?php if($_SESSION['roles']=='Administrator') {?>
		<td class="menuContainer">
				<ul id="menu">
				
			  		 <li><a href="reportindex.php">Reports</a></li>
			  		 <li><a href="doctorindex.php"  class="selected">Doctors</a></li>
			   		<li><a href="testgroup.php">Tests</a></li>
			   		<li><a href="patinet.php">Patients</a></li>
			   		<li><a href="userindex.php">Users</a></li>
				</ul>
		</td>
		<?php } else {?>
		<td class="menuContainer">
				<ul id="menu">

			  		 <li><a href="doctorindex.php"  class="selected">Doctors</a></li>
			   		<li><a href="patinet.php">Patients</a></li>
					<li><a href="userreportindex.php">Edit Reports</a></li>
				</ul>
		</td>
		<?php }?>
		<?php //include("include/header.php");?>
	</tr>
	</table>

       <table cellpadding="0" cellspacing="0" border="0" width="100%" class="padding10px">
                <tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<form action="" method="post" name="myform">

<tr>
   <td >From Date:</td>
   <td ><input tpe='text' id='from' name='from' value =""/><img src="images/icon_calendar.gif" alt="Calendar" onclick="return showCalendar('from', '%Y-%m-%d', '24', true);"  align="absmiddle"/></td>
   <td>To Date</td>
   <td><input type='text'  id='to' name='to' value=""/><img src="images/icon_calendar.gif" alt="Calendar" onclick="return showCalendar('to', '%Y-%m-%d', '24', true);"  align="absmiddle"/></td>
   <td></td>
	<td><input type='submit' name='search' value = 'search' id='search'  class="blueButton" /></td>
	</tr>
	</form>
	</table></td></tr>
				<tr>
				<td>
                <table border="0" cellspacing="1" cellpadding="4" width="100%"  class="gridborder">
				   <tr class="gridheader">
					   <td>Test Name</td>
					   <td>Patient Name</td>
					   <td>Amount</td>
					   
				  </tr>
				  <?php 
for($s=0;$s<count($arraStudent);$s++){
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
?>

<tr class="<?php echo $row_color?>">

<td><?php echo $arraStudent[$s]['Testname']?></td>
<td><?php echo $arraStudent[$s]['PatientName']?></td>
<td><?php echo $arraStudent[$s]['amount']?></td>

</tr>
<?php
}
?>	
		
			</table>
			
			</td>
			</tr>
			<tr>
			<table>
			  <tr>
			      <td align="right">Total = <?php echo $totalamt;?></td>
			  </tr>
			</table>
			</tr>
				
				
				
				 <?php include("include/footer.php");?> 
				</table>          

 </div> 
                
</body>

</html>