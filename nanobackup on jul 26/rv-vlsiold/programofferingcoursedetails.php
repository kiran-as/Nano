<?php include_once('db/dbconfig.php');
include_once('admin_login_check.php');
session_start();
 $_SESSION['name'];
 $idprograms = $_GET['idprograms'];
$resultccc	="SELECT * FROM tbl_programs WHERE idprograms=".$_GET['idprograms'];
$result = mysql_query($resultccc);
while ($row = mysql_fetch_assoc($result)) {
   $Description = $row['Description'];
      $Title = $row['Title'];
  }
  
  $select = "select * from tbl_programcalendar where active=1  and  idprograms=".$_GET['idprograms'];
$resultprogramsdetails = mysql_query($select);
	
	$k=0;
	while ($row = mysql_fetch_assoc($resultprogramsdetails)) {
		  $arrprogramdetails[$k]["idprograms"]	= $row["idprograms"];
		  	  $arrprogramdetails[$k]["idprogramcalendar"]	= $row["idprogramcalendar"];
		  $arrprogramdetails[$k]["startmonth"]	= $row["startmonth"].''.$row["startweek"].','.$row["Startyear"].'-'.$row["endmonth"].''.$row["endweek"].','.$row["Endyear"];
		  // $arrprogramdetails[$k]["startmonth"]	= $row["startmonth"].''.$row["startweek"];
		  $k++;  
		}
		
		
		

?>


<html>
<head>

	<link rel="stylesheet" href="../css/lytebox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/styleupdated.css" type="text/css" media="screen" />
<link href="../css/style.css" rel="stylesheet" type="text/css">
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
li{
list-style-image: none;
    list-style-position: outside;
    list-style-type:disc !important;
    margin-bottom: 0;
    margin-left: 0;
    margin-right: 0;
    margin-top: 0;
    padding-bottom: 0;
    padding-left: 10px;
    padding-right: 0;
    padding-top: 0;
}
-->
</style>
<script type="text/javascript" src="../js/admin_validation.js"></script>
<link href="../rv_main.css" rel="stylesheet" type="text/css" />

</head>

<script type="text/javascript">
function validatedoctors()
{
  var flag = true;
  if(document.getElementById('doctorname').value=='')
  {
     alert("Enter the Doctor Name");
    flag = false;
  }
  if(document.getElementById('designation').value=='')
  {
     alert("Enter the Specialisation");
    flag = false;
  } 
  if(document.getElementById('phone').value=='')
  {
     alert("Enter the Contact Number");
    flag = false;
  }
  return flag;
}

function fnclose()
{
	  parent.location="program_offerings.php";
}

function applied()
{
	
	document.getElementById('divLogin').style.display = '';
	sendmailsforrvvlsi(<?php $Title;?>);

}

function showdatesforcourse(alteracourse,progid)
{
	 if(alteracourse==0)
	   {
		   document.getElementById(progid).style.display='none'; 
	   }
	assigndoctor(alteracourse);
	
	showassignregister(alteracourse,progid);
	
//	assignhiddendates(progid);
}

function showassignregister(alteracourse,prgid)
{
 
	if(alteracourse==0)
	{
	   document.getElementById('showlinkregister').style.display='none';
	   document.getElementById('unlinkregister').style.display='';
	}
	else
	{
		   document.getElementById('showlinkregister').style.display='';
		   document.getElementById('unlinkregister').style.display='none'; 
	}
}

function sendmailsforrvvlsi(alteracourse)
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
			
	    }
	  }
	xmlhttp.open("GET","sendmailsforrvvlsi.php?idprograms="+alteracourse,true);
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
			   document.getElementById('hiddendate').value=proghide[2];
		    }
			if(proghide[1]=='Unhide')
		    {
			
			 prgid =proghide[0];
			     document.getElementById(prgid).style.display='none';
				 document.getElementById('hiddendate').value=proghide[2];
		    }
	    }
	  }
	xmlhttp.open("GET","fastfilling.php?idprogramcalendar="+alteracourse,true);
	xmlhttp.send(); 

		
}
</script>


<body>
 <form action="" method="POST" id="myForm" name="myform" onSubmit="return validatedoctors();">
 <table width="100%"  cellpadding="4" cellspacing="10" border="0">
   <tr><td align="right"><img src="images/close.gif" align="absmiddle" onClick="fnclose();" style="cursor:pointer"></td></tr>
   <tr><td>
   
   <table width="100%" style="border-bottom:2px solid #425843;"><tr><td><img src="/images/RV-Institute_logo.jpg" align="absmiddle"></td>
     <td width="100%" align="center"><img src="/images/jgain.png" width="450" height="132"></td>
     <td><img src="/images/logo_new.jpg" align="absmiddle"></td></tr>
  </table>
   
   </td></tr>
    <tr>
<input type="hidden" id="hiddendate" name="hiddendate" value="">
			<td id='description'><?php echo $Description;?></td>
			
			</tr>
			<tr>
			<td></td>
			</tr>
			<tr>
			<td>
			
			<div runat="server" id="divLogin" style="display:none; z-index:250;width: 650px;margin:auto;padding:auto;top:50%;">
					                <asp:Panel runat="server" ID="popupLogin">
					                    <asp:Panel runat="server" ID="popupContent1">
					                        <table style="height:200px; width: 100%; background-color: #FFFFFF;" border="0"   frame="box">
					                      

					                          <tr>
					                          <td>
					                          <table cellpadding="0" cellspacing="0" border="0" class="resumeviewinfo">
					                           <tr>
          <td nowrap="nowrap">Information</td>
         <td width="100%" align="right"><img src="images/close.gif" align="absmiddle" onClick="fnclose();" style="cursor:pointer"></td>
      </tr>
					                          <tr>
			<td><img src="images/iocn_information.png"></td>
			<td>Dear "<?php echo $_SESSION['name']?>",<br/>
Congratulation for registering to "<?php echo $Title;?>"! <br/>
An RV-VLSI counselor will call you shortly to complete the admission process and
enroll you into your chosen batch. Check your email.</td>
</tr>
			
		<tr><td></td>

		<td align="right"><img src="images/disable_closebtn.png" onClick="fnclose();" style="cursor:pointer"/></td></tr>
		
		</table>
											  </td>
					                          </tr>
					                        </table>
					                    </asp:Panel>
					                </asp:Panel>
					            </div></td>
			</tr>
			   <tr>
<td align="right">
			<select  style="display:none" name="progdetails" id="progdetails"  style="width:250px;"  class="label"   onchange="showdatesforcourse(this.value,<?php echo $idprograms?>);">
							  
							  <option value="0">Select Date</option>
							  	  <?php 
				  for($k=0;$k<count($arrprogramdetails);$k++){?>
			     
							  <option value="<?php echo $arrprogramdetails[$k]['idprogramcalendar'];?>">
								<?php echo $arrprogramdetails[$k]['startmonth'];?>
								
					 
					 
					 <?php 
					 
					 }
					  ?> </option>
			</select>
	<img id="unlinkregister" src="images/disable_rvvlsiregister.png"   style="display:none";/>
      <img id="showlinkregister" src="images/enable_rvvlsiregister.png" onClick="applied();" style="display:none"/>
	  <img src="images/disable_closebtn.png" onClick="fnclose();" style="cursor:pointer"/></td></tr>
	<tr><td>
    <table width="100%" cellpadding="2" cellspacing="2" border="0"  style="border-top:2px solid #425843; font-size:12px;"><tr><td wdith="50%" align="left">	A unit of Rashtreeya Sikshana Samiti Trust.</td><td align="right">	All rights reserved, Copyright © RV-VLSI Design Center.	  </td></tr></table> </td></tr>		
  </table>
  		
  </form>
</body>
</html>