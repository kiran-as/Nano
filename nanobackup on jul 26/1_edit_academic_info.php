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
	    
if($_POST['pid'])
{
	/*
echo ("UPDATE rv_academic_projects SET p_title = '".$_POST['title']."', 
					        					     p_company=  '".$_POST['company']."', 
													 p_duration=  '".$_POST['period']."', 
													 p_role=  '".$_POST['role']."', 
													 p_teamsize=  '".$_POST['selSize']."', 
					        						 p_end=  '".$_POST['selEnd']."', 
													 p_description=  '".$_POST['description']."', 
													 p_other_tech=  '".$_POST['txtOtherproject']."', 
													 p_tools=  '".$_POST['tools']."', 
													 p_challenges=  '".$_POST['challenges']."', 
													 p_period=  '0', 
					        						 p_from_date=  '0', 
													 p_to_date=  '0', 
													 p_vlsitype=  '".$_POST['selVLSIType']."' 
				WHERE p_id ='".$_POST['pid']."' ");die();*/
$_POST['title'] = str_replace("'","&rsquo;",$_POST['title']);
$_POST['company'] = str_replace("'","&rsquo;",$_POST['company']);
$_POST['role'] = str_replace("'","&rsquo;",$_POST['role']);
$_POST['description'] = str_replace("'","&rsquo;",$_POST['description']);
$_POST['txtOtherproject'] = str_replace("'","&rsquo;",$_POST['txtOtherproject']);
$_POST['challenges'] = str_replace("'","&rsquo;",$_POST['challenges']);
$_POST['tools'] = str_replace("'","&rsquo;",$_POST['tools']);

	 $result = mysql_query ("UPDATE rv_academic_projects SET p_title = '".$_POST['title']."', 
					        					     p_company=  '".$_POST['company']."', 
													 p_duration=  '".$_POST['period']."', 
													 p_role=  '".$_POST['role']."', 
													 p_teamsize=  '".$_POST['selSize']."', 
					        						 p_end=  '".$_POST['selEnd']."', 
													 p_description=  '".$_POST['description']."', 
													 p_other_tech=  '".$_POST['txtOtherproject']."', 
													 p_tools=  '".$_POST['tools']."', 
													 p_challenges=  '".$_POST['challenges']."', 
													 p_period=  '0', 
					        						 p_from_date=  '0', 
													 p_to_date=  '0', 
													 p_vlsitype=  '".$_POST['selVLSIType']."' 
				WHERE p_id ='".$_POST['pid']."' ");

echo "<script>parent.location = 'academic_info.php';</script>";	

	
}

$resultccc	="SELECT * FROM rv_academic_projects WHERE p_id=".$_GET['idStud'];
$result = mysql_query($resultccc);
 while ($row = mysql_fetch_assoc($result)) {
   $ptitile = $row['p_title'];
   $company = $row['p_company'];
   $pid = $row['p_id'];
   $period = $row['p_duration'];
   $end = $row['p_end'];
   $teamsize = $row['p_teamsize'];
   $role = $row['p_role'];
   $description = $row['p_description'];
   $tools = $row['p_tools'];     
   $challenges = $row['p_challenges'];  
   $othertools = $row['p_other_tech'];
   $vlsitype = $row['p_vlsitype'];
  
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
		if(document.getElementById('period').value == '')
		{
		    alert('Enter Duration in Months');
			flag = false;
			return flag;
		}
		
		if(document.getElementById('role').value == '')
		{
		    alert('Enter Role');
			flag = false;
			return flag;
		}
		
		
	return flag;
}

function showCelebType2(typeID)
{

	if(typeID == -1)
   {
	
	document.getElementById("OtherCelebTypes2").style.display='block';
	document.getElementById("OtherVLSITypes2").style.display='none';	
	}
	 else if(typeID =='VLSI')
	 {
	  
	 document.getElementById("OtherVLSITypes2").style.display='block';
	 document.getElementById("OtherCelebTypes2").style.display='none';
		
	 }
	  else 
	 {
	  document.getElementById("OtherVLSITypes2").style.display='none';
	 document.getElementById("OtherCelebTypes2").style.display='none';
		
	 }
	
	
}

function fnClose()
{
   parent.location="academic_info.php";
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


 <form action="" method="POST" id="myForm" name="myform" onSubmit="return academicinfovalidation_pop();">
                   
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  
  <tr>
    <td class="popupheader"><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td nowrap="nowrap">Edit Projects</td>
    <td width="100%" align="right"><img src="images/close.gif" align="absmiddle" onClick="fnClose();" style="cursor:pointer"></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td class="popupcontent" valign="top">
    <table width="100%" border="0" cellspacing="2" cellpadding="2">
	
  <tr>
  
  
    <td nowrap="nowrap" class="label">Project Title&nbsp;<span>*</span></td>
	<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
    <td colspan="2" width="100%">
     <input type="text" name="title" id="title" size="40" value="<?php echo $ptitile;?>"/></td>
  </tr>
  <tr>
    <td nowrap="nowrap">College/Institute/Company</td>
    <td colspan="2"><input type="text" name="company" id="company" size="40" value="<?php echo $company;?>" /></td>
  </tr>
  <tr>
    <td nowrap="nowrap" class="label">Duration&nbsp; (in Months)<span>*</span></td>
    <td colspan="2"><input type="text" name="period" id="period" value="<?php echo $period;?>" onKeyPress='return numbersonly(event);'/></td>
  </tr>
  <tr>
    <td nowrap="nowrap" class="label">Worked On&nbsp;<span>*</span></td>
     <td width="50%"><select id="selEnd" name="selEnd"  value="<?php echo $end;?>"onChange="showCelebType2(this.value)">
														  <option  value="VLSI" <?php if($end == 'VLSI') echo "selected";?>>VLSI Project</option>
														  <option value="EMBEDED" <?php if($end == 'EMBEDED') echo "selected";?>>Embeded Project</option>
														  <option value="-1" <?php if($end == '-1') echo "selected";?>>Other</option>
    										 </select>
							</td>
    				<td width="50%"><div id="OtherCelebTypes2" style="width:40px;" style="display:none;" ><input type="text" name="txtOtherproject" id="txtOtherproject" value="<?php echo $othertools;?>" maxlength="200" /></div> 
	<div style="width:40px;" id="OtherVLSITypes2"><select name="selVLSIType" id="selVLSIType" style="width:100px;"><option value="1" <?php if($vlsitype == 1) echo "selected";?>>Front End</option>
																													<option value="2" <?php if($vlsitype == 2) echo "selected";?>>Back End</option></select>
	</div>	</td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="label">Role&nbsp;<span>*</span></td>
    <td colspan="2"><input type="text" name="role" id="role" size="50"  value="<?php echo $role;?>"/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="label">Team Size&nbsp;<span>*</span></td>
    <td colspan="2"><select name="selSize" id="selSize" value="<?php echo $teamsize;?>"style="width:50px;"> 
																		<option value="1" <?php if($teamsize == 1) echo "selected";?>>1</option><option value="2"<?php if($teamsize == 2) echo "selected";?> >2</option>
																		<option value="3" <?php if($teamsize == 3) echo "selected";?>>3</option><option value="4" <?php if($teamsize == 4) echo "selected";?>>4</option>
																		<option value="5" <?php if($teamsize == 5) echo "selected";?>>5</option><option value="6" <?php if($teamsize == 6) echo "selected";?>>6</option>
																		<option value="7" <?php if($teamsize == 7) echo "selected";?>>7</option><option value="8" <?php if($teamsize == 8) echo "selected";?>>8</option>
																		<option value="9" <?php if($teamsize == 9) echo "selected";?>>9</option><option value="10" <?php if($teamsize == 10) echo "selected";?>>10</option>
																		<option value="10+" <?php if($teamsize == '10+') echo "selected";?> >10+</option></select></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="label">Project Description</td>
    <td colspan="2">
      <textarea name="description" id="description" rows="3" cols="40"><?php echo $description;?></textarea></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="label">Tools used</td>
    <td colspan="2"><textarea name="tools" id="tools" rows="3" cols="40" ><?php echo $tools;?></textarea></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="label">Challenges</td>
    <td colspan="2"><textarea name="challenges" id="challenges" rows="3" cols="40" ><?php echo $challenges;?></textarea></td>
  </tr>
    </table>
</td>
  </tr>
  <tr>
    <td class="popupfooter" align="right"><table width="0" border="0" cellspacing="0" cellpadding="0" align="right">
  <tr>
    <td><a href="#" onClick="submitdata();"class="blueButton"><span>Update</span></a>&nbsp;&nbsp;<a href="#" class="grayButton" onClick="fnClose();"><span>Close</span></a>
 
    
    
    </td>
  </tr>
</table>
</td>
  </tr>
</table>

						</form>
						</body>
						</html>