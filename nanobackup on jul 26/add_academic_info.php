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

   print_R($_GET);
   die();
if($_POST['title'])
{
$title=$_POST['title'];
$company=$_POST['company'];
$period=$_POST['period'];
$selEnd=$_POST['selEnd'];
$selVLSIType=$_POST['selVLSIType'];
$role=$_POST['role'];
$selSize=$_POST['selSize'];
$description=$_POST['description'];
$challenges=$_POST['challenges'];
$OtherCelebTypes2 = $_POST['OtherCelebTypes2'];
$tools = $_POST['tools'];
$mid = $_SESSION[m_id];
$p_other_tech = 0;
$p_duration = 0;
$p_from_date = 0;
$p_to_date = 0;
exit;
$Insert	=	mysql_query("INSERT INTO rv_academic_projects (m_id, p_title, p_company, p_duration, p_role, p_teamsize, 	p_end, p_description , p_other_tech, 	p_tools, p_challenges,p_period, p_from_date, p_to_date,p_vlsitype)
VALUES ('".$mid."','".$title."','".$company."', '".$period."', '".$role."','".$selSize."','".$selEnd."','".$description."','".$p_other_tech."','".$tools."','".$challenges."','".$p_duration."','".$p_from_date."','".$p_to_date."','".$selVLSIType."')")or die(mysql_error());  

header('Location:1_academic_info.php');

}
 ?>
  
  <html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




<title>Welcome to NKHPS - Old Students Association</title>
<link href="../styles/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="date/jsDatePick_ltr.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="date/styleupdated.css" />
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
	  parent.location="http://nanochipsolutions.com/1_academic_info.php";
}
function numbersonly(e){
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
	if (unicode<48||unicode>57) //if not a number
	return false //disable key press
	}
}
</script>


 <form action="" method="POST"  name= "myform" onSubmit="academicinfovalidation_pop();">
                    <table>
                        <tr>
                            <th colspan="4">Academic Details</th>
                        </tr>
						<tr>
                            <td style="font-family:Arial">Project Title<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="title" id="title" size="40"  value=""/></td>
							<td></td>
							<td></td>
							
						</tr>
						<tr>
                            <td>College/Institute/Company:<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="company" id="company"  size="40" value="" /></td>
							<td></td>
							<td></td>
                        </tr>
						<tr>
                            <td>Duration(Months)<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="period" id="period"  size="40" value="" onKeyPress='return numbersonly(event);'/></td>.
							<td></td>
							<td></td>
					    </tr>
						<tr>
                            <td>Worked on<span style="color:#FF0000">*</span></td>
                             <td><select id="selEnd" name="selEnd" value=""onChange="showCelebType2(this.value)">
														  <option  value="VLSI" >VLSI Project</option>
														  <option value="EMBEDED" >Embeded Project</option>
														  <option value="-1" >Other</option>
    										 </select>
							</td>
    				<td><div id="OtherCelebTypes2" style="display:none;" ><input type="text" name="txtOtherproject" id="txtOtherproject" value="" maxlength="200" /></div> 
	<div id="OtherVLSITypes2"><select name="selVLSIType" id="selVLSIType" style="width:100px;"><option value="1">Front End</option><option value="2" >Back End</option></select>
	</div>	</td>
                     </tr>	
					    <tr>
                            <td>Role<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="role" id="role" size="40"  value=""/></td>
                            <td>Team Size<span style="color:#FF0000">*</span></td>
                            <td  height="" colspan="2"><select name="selSize" id="selSize" value=""style="width:50px;"> 
																		<option value="1">1</option><option value="2" >2</option>
																		<option value="3">3</option><option value="4" >4</option>
																		<option value="5">5</option><option value="6" >6</option>
																		<option value="7">7</option><option value="8" >8</option>
																		<option value="9">9</option><option value="10" >10</option>
																		<option value="10+" >10+</option></select></td>
                        </tr>
						<tr>
                            <td>Project discription</td>
							<td colspan="3"> <textarea name="description" id="description" rows="3" cols="30" value=""></textarea>
							 
							</td>

                            
                        </tr>
						<tr>
                            <td>Tools Used</td>
							<td colspan="3"> <textarea name="tools" id="tools"rows="3" cols="30"  value=""></textarea></td>
                        </tr>
						
						<tr>
						    <td>challenges</td>
							<td colspan="3"> <textarea name="challenges" id="challenges"rows="3" cols="30" value=""></textarea></td>
                                                    </tr>
						<tr>
						   <td></td>
						   <td></td>

                            <td><input type="button" name="Close" id="Close" value="Close" onClick="fnClose();"/></td>
                            <td><input type="submit" name="save" id="save" value="save"/></td>
                        </tr>                        
                       
						</table>
						</form>
						</html>