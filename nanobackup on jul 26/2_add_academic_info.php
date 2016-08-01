<?php include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
	  //  include_once('classes/checkingAuth.php');
	  //  $check=new checkingAuth();
  // $check->loginCheck();   

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

if($_POST['title'])
{
$title=str_replace("'","&rsquo;",$_POST['title']);
$company=str_replace("'","&rsquo;",$_POST['company']);
$period=str_replace("'","&rsquo;",$_POST['period']);
$selEnd=str_replace("'","&rsquo;",$_POST['selEnd']);
$selVLSIType=str_replace("'","&rsquo;",$_POST['selVLSIType']);
$role=str_replace("'","&rsquo;",$_POST['role']);
$selSize=str_replace("'","&rsquo;",$_POST['selSize']);
$description=str_replace("'","&rsquo;",$_POST['description']);
$challenges=str_replace("'","&rsquo;",$_POST['challenges']);
$OtherCelebTypes2 = str_replace("'","&rsquo;",$_POST['txtOtherproject']);
$tools = str_replace("'","&rsquo;",$_POST['tools']);
$mid = $_SESSION[m_id];
$p_other_tech = 0;
$p_duration = 0;
$p_from_date = 0;
$p_to_date = 0;

$_SESSION['check'] = 1;

$Insert	=	mysql_query("INSERT INTO rv_academic_projects (m_id, p_title, p_company, p_duration, p_role, p_teamsize, 	p_end, p_description , p_other_tech, 	p_tools, p_challenges,p_period, p_from_date, p_to_date,p_vlsitype)
VALUES ('".$mid."','".$title."','".$company."', '".$period."', '".$role."','".$selSize."','".$selEnd."','".$description."','".$OtherCelebTypes2."','".$tools."','".$challenges."','".$p_duration."','".$p_from_date."','".$p_to_date."','".$selVLSIType."')")or die(mysql_error());
//header("Location:1_academic_info.php?flag=1");exit; 
echo "<script>parent.location = 'academic_info.php';</script>";	 
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

function hidedetails()
{
	 document.getElementById("OtherVLSITypes2").style.display='block';
	 document.getElementById("OtherCelebTypes2").style.display='none';
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

<body onLoad="hidedetails();">
 <form action="" method="POST" id="myForm" name= "myform" onSubmit="return academicinfovalidation_pop();">
 
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="popupheader"><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td nowrap="nowrap">Add Projects</td>
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
    <td colspan="2">
      <input type="text" name="title" id="title" size="50"  value=""/></td>
  </tr>
  <tr>
    <td nowrap="nowrap">College/Institute/Company</td>
    <td colspan="2"><input type="text" name="company" id="company"  size="50" value="" /></td>
  </tr>
  <tr>
    <td nowrap="nowrap" class="label">Duration(in Months)<span>*</span></td>
    <td colspan="2"><input type="text" name="period" id="period"  size="10"  maxlength="15" value="" onKeyPress='return numbersonly(event);'/></td>
  </tr>
  <tr>
    <td nowrap="nowrap" class="label">Worked On&nbsp;<span>*</span></td>
    <td><select id="selEnd" name="selEnd"  value="<?php echo $end;?>"onChange="showCelebType2(this.value)">
														  <option  value="VLSI" <?php if($end == 'VLSI') echo "selected";?>>VLSI Project</option>
														  <option value="EMBEDED" <?php if($end == 'EMBEDED') echo "selected";?>>Embeded Project</option>
														  <option value="-1" <?php if($end == '-1') echo "selected";?>>Other</option>
    										 </select>
							</td>
    				<td width="100%"><div id="OtherCelebTypes2" style="width:40px;" style="display:none;" ><input type="text" name="txtOtherproject" id="txtOtherproject" value="" maxlength="200" /></div> 
	<div style="width:40px;" id="OtherVLSITypes2"><select name="selVLSIType" id="selVLSIType" style="width:100px;"><option value="1">Front End</option><option value="2" >Back End</option></select>
	</div>	</td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="label">Role&nbsp;<span>*</span></td>
    <td colspan="2"><input type="text" name="role" id="role" size="50"  value=""/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="label">Team Size&nbsp;<span>*</span></td>
    <td colspan="2"><select name="selSize" id="selSize" value=""style="width:50px;"> 
																		<option value="1">1</option><option value="2" >2</option>
																		<option value="3">3</option><option value="4" >4</option>
																		<option value="5">5</option><option value="6" >6</option>
																		<option value="7">7</option><option value="8" >8</option>
																		<option value="9">9</option><option value="10" >10</option>
																		<option value="10+" >10+</option></select></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="label">Project Description</td>
    <td colspan="2">
      <textarea name="description" id="description" cols="40" rows="3"></textarea></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="label">Tools used</td>
    <td colspan="2"><textarea name="tools" id="tools" cols="40" rows="3"></textarea></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="label">Challenges</td>
    <td colspan="2"><textarea name="challenges" id="challenges" cols="40" rows="3"></textarea></td>
  </tr>
    </table>
</td>
  </tr>
  <tr>
    <td class="popupfooter" align="right"><table width="0" border="0" cellspacing="0" cellpadding="0" align="right">
  <tr>
    <td><a href="#" onClick="submitdata();" class="blueButton">Save</a>&nbsp;&nbsp;<a href="#" class="grayButton" onClick="fnClose();"><span>Close</span></a>
  
    
    
    </td>
  </tr>
</table>
</td>
  </tr>
</table>

 
						</form>
						</body>
						</html>