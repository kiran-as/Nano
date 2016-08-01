<?php error_reporting(E_ALL ^ E_NOTICE);
 include_once('db/dbconfig.php');
session_start();
$_SESSION['dates']='';
$idprogramcalendar = $_GET['idprogramcalendar'];
$resultccc = "Select * from tbl_programcalendar where idprogramcalendar=$idprogramcalendar";
$result = mysql_query($resultccc);
while ($row = mysql_fetch_assoc($result)) {
   $Fastfilling = $row['Fastfilling'];
    $idprogram = $row['idprograms'];
	$prgtype = $row['noofdays'];
	if($prgtype!=0)
	{
	  if($prgtype==2)
	  {
	  $dates = $row["startdate"].'-To-'.$row["enddate"];
	  }
	  else if($prgtype==1)
	  {
	     $dates = $row["startdate"];
	  }
	  
	}
	else 
	{
	
	$dates=$row["startmonth"].''.$row["startweek"].','.$row["Startyear"].'-'.$row["endmonth"].''.$row["endweek"].','.$row["Endyear"];
	}
  }
  $hide="Hide";
$unhide="Unhide";
$_SESSION['dates']=$dates;
if($Fastfilling==1)
{
	echo $idprogram.'----'.$hide.'----'.$dates;
}
else {
	echo $idprogram.'----'.$unhide.'----'.$dates;
}
?>