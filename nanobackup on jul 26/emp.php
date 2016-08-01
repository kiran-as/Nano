<?php
include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
 //include_once('config/header.php');
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   
  ?>

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Employability Factor</title>
<script>
var howLong = 60000;

t = null;
function closeMe(){
t = setTimeout("self.close()",howLong);
}

</script>
</head>

<!--
<body onload="closeMe();self.focus()">-->
<body>
<tr><td>
<div  style="float:left; color:#880011; "><BLINK><strong>Employability Factor&nbsp;:&nbsp;<?=employabilityFactor($_SESSION[m_id])?></strong></BLINK></div></td></tr><br />
<table height="100px">
<p>

<font color="blue">Employability Factor: </font><br  />
1) B.Sc/Diploma/Certified courses: 25 pts <br />
2) BE (only the 5 branches) and > 60%: 45 pts<br />
3) BE (only the 5 branches) and < 60%: 40pts<br />
4) BE (all other branches): 30pts<br />
5) B.Tech (from IIT, IISc, NIT) and > 60%: 50 pts else 45pts<br />
6) M.Sc/ M.E/ M.Tech/ MS: +15 pts<br />
7) PG diploma in RV-VSLI: +35 pts (< 70%)<br />
			      +40 pts (>70%) <br />
8) All other VLSI PG diplomas: 50 pts<br />
9) BE proj in VLSI: + 5 pts<br />
10) Every year of Work Ex.: + 2 pts per year<br />
11) 10th and 12th > 60% = + 5 pts<br /><br />

Employability factor is the percentage of chance a candidate <br />
has to get into his desired industry or company with his <br />
present qualification, work experience and academic credentials<br />

</p>
</table>
</body>
</html>