<?php  include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
	    include_once('classes/checkingAuth.php');
	    $check=new checkingAuth();
   $check->loginCheck();   

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
	    
if($_POST['cid'])
{
	$fromdateyear = $_POST['FromMonth'].'-'.$_POST['From'];
	$todateyear = $_POST['ToMonth'].'-'.$_POST['To'];
	 $result = mysql_query("UPDATE rv_work_experience SET we_designation = '".str_replace("'","&rsquo;",$_POST['designation'])."', 
					        					     we_company=  '".str_replace("'","&rsquo;",$_POST['company'])."', 
													 we_from_date=  '".$fromdateyear."', 
													 we_to_date=  '".$todateyear."'
				WHERE we_id ='".$_POST['cid']."' ");

echo "<script>parent.location = 'work_info.php';</script>";	

	
}

$resultccc	="SELECT * FROM rv_work_experience WHERE we_id=".$_GET['idStud'];
$result = mysql_query($resultccc);
 while ($row = mysql_fetch_assoc($result)) {
   $id = $row['we_id'];
   $designation = $row['we_designation'];
   //$pid = $row['we_from_date'];
   //$period = $row['we_to_date'];
   $end = $row['m_id'];
   $company = $row['we_company'];
 $fromdateandmonth=  explode("-",$row ['we_from_date']);
 $frommonth = $fromdateandmonth[0];
 $fromyear =$fromdateandmonth[1];
 
  $todateandmonth=  explode("-",$row ['we_to_date']);
 $tomonth = $todateandmonth[0];
 $toyear =$todateandmonth[1];
   

}

 ?>
  
  <html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />





<link href="../styles/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="date/jsDatePick_ltr.min.css" />
<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />
</head>
<body onLoad="load();">
<script type="text/javascript">

function load()
{
	var id = '<?php echo $end;?>';
	showCelebType2(id);
}
function academicinfovalidation_pop()
{

   var flag=true;
		if(document.getElementById('company').value == '')
		{
		    alert('Enter the company Name');
			flag = false;
			return flag;
		}
		if(document.getElementById('designation').value == '')
		{
		    alert('Enter the Designation');
			flag = false;
			return flag;
		}
				
	return flag;
}

function fnClose()
{
	 parent.location="work_info.php";
}
function numbersonly(e){
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
	if (unicode<48||unicode>57) //if not a number
	return false //disable key press
	}
}
function submitdata()
{
	var flag = academicinfovalidation_pop();
	if(flag == false)
	{
	}
	else
	{
	document.forms["myForm"].submit();
	}
}
</script>


 <form action="" method="POST" id="myForm" name= "myform" onSubmit="return academicinfovalidation_pop();">
                      <table width="100%" border="0" cellspacing="1" cellpadding="1">
   <tr>
    <td class="popupheader"><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td nowrap="nowrap">Edit Company Details</td>
    <td width="100%" align="right"><img src="images/close.gif" align="absmiddle" onClick="fnClose();" style="cursor:pointer"></td>
  </tr>
</table>
</td>
</tr>
  <tr>
    <td class="popupcontent" valign="top">
    <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
						 <input type="hidden" id="cid" name="cid" value="<?php echo $id?>";>
                            <td nowrap="nowrap" class="label">Company Name<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="company" id="company" size="40"  value="<?php echo $company;?>"/></td>
							<td></td>
							<td></td>
							
						</tr>
						<tr>
                            <td nowrap="nowrap" class="label">Designation:<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="designation" id="designation"  size="40" value="<?php echo $designation;?>" /></td>
							<td></td>
							<td></td>
                        </tr>
						
						<tr>
						<td nowrap="nowrap" class="label">From Period</td>
                            <td><?php
											// Years range setup
											$year_built_min = 1970;
											$year_built_max = date("Y");
										?>
										<select id="From" name="From" >
											<?php // Generate minimum years
												foreach (range($year_built_min, $year_built_max) as $year) { ?>
												<option value="<?php echo($year);?>"  <?php if($fromyear == $year) echo "selected";?>><?php echo($year); ?></option>
												<?php } ?>
										</select>&nbsp;&nbsp;
							<select name="FromMonth" id="FromMonth" value=""style="width:150px;"> 
																		<option value="1" <?php if($frommonth == 1) echo "selected";?>>January</option><option value="2" <?php if($frommonth == 2) echo "selected";?>>February</option>
																		<option value="3" <?php if($frommonth == 3) echo "selected";?>>March</option><option value="4" <?php if($frommonth == 4) echo "selected";?>>April</option>
																		<option value="5" <?php if($frommonth == 5) echo "selected";?>>May</option><option value="6" <?php if($frommonth == 6) echo "selected";?>>June</option>
																		<option value="7" <?php if($frommonth == 7) echo "selected";?>>July</option><option value="8" <?php if($frommonth == 8) echo "selected";?>>August</option>
																		<option value="9" <?php if($frommonth == 9) echo "selected";?>>September</option><option value="10" <?php if($frommonth == 10) echo "selected";?>>October</option>
																		<option value="11" <?php if($frommonth == 11) echo "selected";?>>November</option><option value="12"<?php if($frommonth == 12) echo "selected";?> >December</option>
																		<option value="13" <?php if($frommonth == 13) echo "selected";?>>Till Date</option></select></td>
							<td></td>
							</tr>
							<tr>
							<td nowrap="nowrap" class="label">To Period</td>
                             <td><?php
											// Years range setup
											$year_built_min = 1970;
											$year_built_max = date("Y");
										?>
										<select id="To" name="To" >
											<?php // Generate minimum years
												foreach (range($year_built_min, $year_built_max) as $year) { ?>
												<option value="<?php echo($year); ?>" <?php if($toyear == $year) echo "selected";?>><?php echo($year); ?></option>
												<?php } ?>
										</select>&nbsp;&nbsp;
							<select name="ToMonth" id="ToMonth" value=""style="width:150px;"> 
																		<option value="1" <?php if($tomonth == 1) echo "selected";?>>January</option><option value="2" <?php if($tomonth == 2) echo "selected";?>>February</option>
																		<option value="3" <?php if($tomonth == 3) echo "selected";?>>March</option><option value="4" <?php if($tomonth == 4) echo "selected";?>>April</option>
																		<option value="5" <?php if($tomonth == 5) echo "selected";?>>May</option><option value="6" <?php if($tomonth == 6) echo "selected";?>>June</option>
																		<option value="7" <?php if($tomonth == 7) echo "selected";?>>July</option><option value="8" <?php if($tomonth == 8) echo "selected";?>>August</option>
																		<option value="9" <?php if($tomonth == 9) echo "selected";?>>September</option><option value="10" <?php if($tomonth == 10) echo "selected";?>>October</option>
																		<option value="11" <?php if($tomonth == 11) echo "selected";?>>November</option><option value="12"<?php if($tomonth == 12) echo "selected";?> >December</option>
																		<option value="13" <?php if($tomonth == 13) echo "selected";?>>Till Date</option></select></td>
							<td></td>
						</tr>
    </table>
</td>
  </tr>
  <tr>
    <td class="popupfooter" align="right"><table width="0" border="0" cellspacing="0" cellpadding="0" align="right">
  <tr>
    <td><a href="#" onClick="submitdata();"  class="blueButton"><span>Update</span></a>&nbsp;&nbsp;<a href="#" class="grayButton" onClick="fnClose();"><span>Close</span></a>
 
    
    
    </td>
  </tr>
</table>
</td>
  </tr>
</table>
					
						</form>
						</body>
						</html>