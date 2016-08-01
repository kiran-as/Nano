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

$companyid = $_GET['wpid'];
$result	=	mysql_query("SELECT * FROM rv_work_experience WHERE we_id=".$_GET['wpid']);

 while ($row = mysql_fetch_assoc($result)) {
   $company = $row['we_company'];
}

if($_POST['title'])
{
$companyid=$_POST['companyid'];
$title=str_replace("'","&rsquo;",$_POST['title']);
$description=str_replace("'","&rsquo;",$_POST['description']);
$role=str_replace("'","&rsquo;",$_POST['role']);
$selSize=$_POST['selSize'];
$tools=str_replace("'","&rsquo;",$_POST['tools']);
$challenges=str_replace("'","&rsquo;",$_POST['challenges']);
$period=$_POST['period'];
$mid = $_SESSION[m_id];
$wp_date = 0;
$wp_project_type = 0;
$wp_vlsitype = 0;
$wp_other_tech = 0;
$wp_from_date = 0;
$wp_to_date = 0;

$Insert	=	mysql_query("INSERT INTO rv_work_projects (we_id, m_id, wp_title, wp_company, wp_description, wp_date,wp_role,wp_team_size,wp_project_type,wp_tools, wp_vlsitype,wp_other_tech, wp_challenges, wp_duration,wp_from_date,wp_to_date)
VALUES ('".$companyid."','".$mid."','".$title."', '".$companyid."', '".$description."','".$wp_date."','".$role."','".$selSize."','".$wp_project_type."','".$tools."','".$wp_vlsitype."','".$wp_other_tech."','".$challenges."','".$period."','".$wp_from_date."','".$wp_to_date."')")or die(mysql_error());  
echo "<script>parent.location = 'work_info.php';</script>";	
}
 ?>
  
  <html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




<title></title>
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
		    alert('Enter the title');
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
function numbersonly(e){
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
	if (unicode<48||unicode>57) //if not a number
	return false //disable key press
	}
}

function fnClose()
{
   //alert('asdf');
   parent.location="work_info.php";
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


 <form action="" method="POST"  id="myForm" name= "myform" onSubmit="return academicinfovalidation_pop();">
                       <table width="100%" border="0" cellspacing="1" cellpadding="1">
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
						
                            <td nowrap="nowrap" class="label">Company Name<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="company" id="company" readonly="readonly" size="40" value="<?php echo $company;?>" /></td>
							<td><input type="hidden" name="companyid" id="companyid"  size="40" value="<?php echo $companyid;?>" /></td>
							<td></td>
							
						</tr>
						<tr>
                            <td nowrap="nowrap" class="label">Project Title:<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="title" id="title"  size="40" value="" /></td>
							<td></td>
							<td></td>
                        </tr>
						
						<tr>
                            <td nowrap="nowrap" class="label">Duration(Months)<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="period" id="period"  size="40" value="" onKeyPress='return numbersonly(event);'/></td>.
							<td></td>
							<td></td>
					    </tr>
						
					    <tr>
                            <td nowrap="nowrap" class="label">Role<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="role" id="role" size="40"  value=""/></td>
                            <td nowrap="nowrap" class="label">Team Size<span style="color:#FF0000">*</span></td>
                            <td  height="" colspan="2"><select name="selSize" id="selSize" value=""style="width:50px;"> 
																		<option value="1">1</option><option value="2" >2</option>
																		<option value="3">3</option><option value="4" >4</option>
																		<option value="5">5</option><option value="6" >6</option>
																		<option value="7">7</option><option value="8" >8</option>
																		<option value="9">9</option><option value="10" >10</option>
																		<option value="10+" >10+</option></select></td>
                        </tr>
						<tr>
                            <td nowrap="nowrap" class="label">Project discription</td>
							<td colspan="3"> <textarea name="description" id="description" rows="3" cols="30" value=""></textarea>
							 
							</td>

                            
                        </tr>
						<tr>
                            <td nowrap="nowrap" class="label">Tools Used</td>
							<td colspan="3"> <textarea name="tools" id="tools"rows="3" cols="30"  value=""></textarea></td>
                        </tr>
						
						<tr>
						    <td nowrap="nowrap" class="label">challenges</td>
							<td colspan="3"> <textarea name="challenges" id="challenges"rows="3" cols="30" value=""></textarea></td>
                                               
						</tr>
    </table>
</td>
  </tr>
  <tr>
    <td class="popupfooter" align="right"><table width="0" border="0" cellspacing="0" cellpadding="0" align="right">
  <tr>
    <td><a href="#" onClick="submitdata();" class="blueButton"><span>Save</span></a>&nbsp;&nbsp;<a href="#" class="grayButton" onClick="fnClose();"><span>Close</span></a>
 
    
    
    </td>
  </tr>
</table>
</td>
  </tr>
</table>
						</form>
						</html>