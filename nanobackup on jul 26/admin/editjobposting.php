<?php  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php');  
	//include_once('../classes/recruiter.class.php');  
	$_SESSION['idrecruiter']='';   
	$input=new inputFields();	
	$ch=new checkInputFields();	
	$db=new dataBase();
	$rec = new recruiter();
	$db->connectDB(); 


$resultsss = "SELECT * FROM rv_job_posting where jp_id=".$_GET['idjobposting'];
$idrecruiter=$_SESSION['idrecruiter'] =$_GET['idrecruiter'];
	$resultc = mysql_query($resultsss);
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent["jp_job_title"]	= $row["jp_job_title"];
		 $arraStudent["jp_description"]	= $row["jp_description"];
		 $arraStudent["jp_id"]	= $row["jp_id"];
		 $arraStudent["jp_expdate"]	= $row["jp_expdate"];
		  $arraStudent["jp_created_date"]	= $row["jp_created_date"];
		 $arraStudent["jp_skills"]	= $row["jp_skills"];
		}
		
 $changeddateformat = date(" d-m-Y ",$arraStudent["jp_expdate"]);

 
 
		IF($_POST)
		{
			$title = $_POST['title'];
$description = $_POST['description'];
$expdatesss = $_POST['from1'];
$datearray = explode('-',$expdatesss);
$dates = $datearray[0];
$months = $datearray[1];
$years = $datearray[2];
$idjobposting= $_POST['idjobposting'];
$idrecruiter = $_SESSION['idrecruiter'];
$expdates = mktime(0,0,0,$months,$dates,$years);


/*echo "UPDATE rv_recruiters SET r_user_name = '".$name."', 
					        					     r_company=  '".$companyname."', 
													 r_mobile=  '".$mobile."',
													  r_email=  '".$email."',
													    r_designation=  '".$designation."',
													  r_active=  '".$active."' 
											
				WHERE r_id ='".$idrecruiter."'";
die();*/
$dates = date('Y-m-d');
$result = mysql_query("UPDATE rv_job_posting SET jp_job_title = '".$title."', 
													  jp_expdate=  '".$expdates."',
														 upddate=  '".$dates."'
											
				WHERE jp_id ='".$idjobposting."' "); 
echo "<script>parent.location = 'admin_manage_jobposting.php?idrecruiter=$idrecruiter';</script>";	 
 
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../css/styleupdated1.css" type="text/css" media="screen" />
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RV-VLSI Design Center</title>

<script type="text/javascript" src="../js/admin_validation.js"></script>

<script type="text/javascript" src="../javascript/calendar.js"></script>

<!-- import the language module -->
<script type="text/javascript" src="../javascript/calendar-en.js"></script>
<link href="../css/theme.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function fnclose()
{
    parent.location="http://nanochipsolutions.com/admin/admin_manage_jobposting.php?idrecruiter="+<?php echo $idrecruiter;?>;
}


function validatejobposting()
{
	if(document.getElementById('title').value == '')
	{
		alert('Enter the Job Title');
		document.getElementById("title").focus();
		return false;
	}

	if(document.getElementById('description').value == '')
	{
		alert('Enter the Job Description');
		document.getElementById("description").focus();
		return false;
	}

	if(document.getElementById('from1').value == '')
	{
		alert('Enter the Expiry Date');
		document.getElementById("from1").focus();
		return false;
	}

}


//////////////////////calendar//////////////////////

var oldLink = null;
//code to change the active stylesheet
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

//This function gets called when the end-user clicks on some date.
function selected(cal, date) {
cal.sel.value = date; // just update the date in the input field.
if (cal.dateClicked && (cal.sel.id == "sel1" || cal.sel.id == "sel3"))
// if we add this call we close the calendar on single-click.
// just to exemplify both cases, we are using this only for the 1st
// and the 3rd field, while 2nd and 4th will still require double-click.
cal.callCloseHandler();
}

//And this gets called when the end-user clicks on the _selected_ date,
//or clicks on the "Close" button.  It just hides the calendar without
//destroying it.
function closeHandler(cal) {
cal.hide();                        // hide the calendar
//cal.destroy();
_dynarch_popupCalendar = null;
}

//This function shows the calendar under the element having the given id.
//It takes care of catching "mousedown" signals on document and hiding the
//calendar if the click was outside.
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

//If this handler returns true then the "date" given as
//parameter will be disabled.  In this example we enable
//only days within a range of 10 days from the current
//date.
//You can use the functions date.getFullYear() -- returns the year
//as 4 digit number, date.getMonth() -- returns the month as 0..11,
//and date.getDate() -- returns the date of the month as 1..31, to
//make heavy calculations here.  However, beware that this function
//should be very fast, as it is called for each day in a month when
//the calendar is (re)constructed.
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
<form action="" method="post" name="">
 <table width="50%"  cellpadding="4" cellspacing="5" border="0">
   <tr>
   			<td colspan="2" align="left" class="heading_new">Edit Job<img src="../images/close.gif" align="right" onClick="fnclose();"><hr></td>
   </tr>
<input type="hidden" name='idjobposting' id='idjobposting' value='<?php echo $arraStudent['jp_id'];?>'/>
	 
	 <tr>
	  <td class="label"  nowrap="nowrap" align="right">Job Title<span><font color="#FF0000">*</font></span></td>
    <td><input type="text"  readonly="readonly" name="title" id="title"   style="width:250px;"   value='<?php echo $arraStudent["jp_job_title"];?>'/>
                  </td>
	 </tr>
	 
		<tr>
			 <td class="label" nowrap="nowrap" align="right" valign="top"> Job Description<font color="#FF0000">*</font></span></td>
			 <td><?php echo $arraStudent['jp_description'];?></td>
			 
		</tr>

		<tr  id="singlecalendar">
<td  class="label" nowrap="nowrap" align="right">Expiry Date<font color="#FF0000">*</font></span></td>
  <td><input type="text" name="from1" id="from1" size="30" value="<?php echo $changeddateformat;?>"
><img src="../images/icon_calendar.gif" alt="Calendar" onclick="return showCalendar('from1', '%d-%m-%Y', '24', true);"  align="absmiddle"  /></td>
</tr>
		
	
		
		
		<tr>
			   <td colspan="2" align="right"><input type="submit" name="save" id="save" value="save" class="blueButton" onClick="return validatejobposting();"/>
											<input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td>
			
			</tr>





</table>
</form>
</body>
</html>
