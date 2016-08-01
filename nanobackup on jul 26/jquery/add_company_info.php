<?php include_once('db/dbconfig.php');
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

if($_POST['company'])
{
$company=$_POST['company'];
$designation=$_POST['designation'];
$FromMonth=$_POST['FromMonth'].'-'.$_POST['From'];
$ToMonth=$_POST['ToMonth'].'-'.$_POST['To'];
$mid = $_SESSION[m_id];

$Insert	=	mysql_query("INSERT INTO rv_work_experience (we_designation, we_from_date, we_to_date,we_company,m_id)
VALUES ('".$designation."','".$FromMonth."','".$ToMonth."', '".$company."', '".$mid."')")or die(mysql_error());  
header("Location:1_work_info.php");exit;
}
 ?>
  
  <html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




<title>Welcome to NKHPS - Old Students Association</title>
<link href="../styles/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="date/jsDatePick_ltr.min.css" />
<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />
</head>
<script type="text/javascript">
function academicinfovalidation_pop()
{
   var flag=true;
		if(document.getElementById('title').value == '')
		{
		    alert('Enter the title of the project');
			flag = false;
			return flag;
		}
		if(document.getElementById('company').value == '')
		{
		    alert('Enter College/Institute/Company');
			flag = false;
			return flag;
		}
				
	return flag;
}



function fnClose()
{
	parent.location="http://nanochipsolutions.com/1_work_info.php";
}
</script>


 <form action="" method="POST"  name= "myform" onSubmit="return academicinfovalidation_pop();">
                   <table width="725" border="0" cellspacing="1" cellpadding="1" class="popupborder">
  <tr>
    <td class="popupheader">Add Projects</td>
  </tr>
  <tr>
    <td class="popupcontent" valign="top">
    <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
						
                            <td nowrap="nowrap" class="label">Company Name<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="company" id="company" size="40"  value=""/></td>
							<td></td>
							<td></td>
							
						</tr>
						<tr>
                            <td nowrap="nowrap" class="label">Designation:<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="designation" id="designation"  size="40" value="" /></td>
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
												<option value="<?php echo($year); ?>"><?php echo($year); ?></option>
												<?php } ?>
										</select>&nbsp;&nbsp;
							<select name="FromMonth" id="FromMonth" value=""style="width:150px;"> 
																		<option value="1">January</option><option value="2" >February</option>
																		<option value="3">March</option><option value="4" >April</option>
																		<option value="5">May</option><option value="6" >June</option>
																		<option value="7">July</option><option value="8" >August</option>
																		<option value="9">September</option><option value="10" >October</option>
																		<option value="11" >November</option><option value="12" >December</option></select></td>
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
												<option value="<?php echo($year); ?>"><?php echo($year); ?></option>
												<?php } ?>
										</select>&nbsp;&nbsp;
							<select name="ToMonth" id="ToMonth" value=""style="width:150px;"> 
																		<option value="1">January</option><option value="2" >February</option>
																		<option value="3">March</option><option value="4" >April</option>
																		<option value="5">May</option><option value="6" >June</option>
																		<option value="7">July</option><option value="8" >August</option>
																		<option value="9">September</option><option value="10" >October</option>
																		<option value="11" >November</option><option value="12" >December</option></select></td>
							<td></td>
							</tr>
							<tr>
							 <td></td>
							  <td><input type="button" name="Close" id="Close" value="Close" onClick="fnClose();"/></td>
							 <td><input type="submit" name="save" id="save" value="save"/></td>
							 
							</tr>
    				
                       
						</table>
						</form>
						</html>