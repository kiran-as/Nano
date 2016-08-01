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
	 $result = mysql_query("UPDATE rv_academic_projects SET p_title = '".$_POST['title']."', 
					        					     p_company=  '".$_POST['company']."', 
													 p_duration=  '".$_POST['period']."', 
													 p_role=  '".$_POST['role']."', 
													 p_teamsize=  '".$_POST['selSize']."', 
					        						 p_end=  '".$_POST['selEnd']."', 
													 p_description=  '".$_POST['description']."', 
													 p_other_tech=  '0', 
													 p_tools=  '".$_POST['tools']."', 
													 p_challenges=  '".$_POST['challenges']."', 
													 p_period=  '0', 
					        						 p_from_date=  '0', 
													 p_to_date=  '0', 
													 p_vlsitype=  '".$_POST['selVLSIType']."' 
				WHERE p_id ='".$_POST['pid']."' ");

header("Location:1_academic_info.php");exit;

	
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

}

 ?>
  
  <html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




<title>Welcome to NKHPS - Old Students Association</title>
<link href="../styles/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="date/jsDatePick_ltr.min.css" />
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


 <form action="" method="POST"  name= "myform" onSubmit="return academicinfovalidation_pop();">
                    <table>
                        <tr>
                            <th colspan="4">Academic Details</th>
                         
							 <td><input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/></td>
                        </tr>
						<tr>
                            <td>Project Title<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="title" id="title" size="40" value="<?php echo $ptitile;?>"/></td>
                            <td></td>
							<td></td>
							</tr>
							<tr>
                            <td>College/Institute/Company:<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="company" id="company" size="40" value="<?php echo $company;?>" /></td>
                            <td></td>
							<td></td>
                        </tr>
						<tr>
                            <td>Duration(Months)<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="period" id="period" value="<?php echo $period;?>" onKeyPress='return numbersonly(event);'/></td>
                            <td></td>
							<td></td>
                        </tr>
                        <tr>
                            <td>Worked on<span style="color:#FF0000">*</span></td>
                             <td width="135"><select id="selEnd" name="selEnd"  value="<?php echo $end;?>"onChange="showCelebType2(this.value)">
														  <option  value="VLSI" <?php if($end == 'VLSI') echo "selected";?>>VLSI Project</option>
														  <option value="EMBEDED" <?php if($end == 'EMBEDED') echo "selected";?>>Embeded Project</option>
														  <option value="-1" <?php if($end == '-1') echo "selected";?>>Other</option>
    										 </select>
							</td>
    				<td width="100"><div id="OtherCelebTypes2" style="display:none;" ><input type="text" name="txtOtherproject" id="txtOtherproject" value="" maxlength="200" /></div> 
	<div id="OtherVLSITypes2"><select name="selVLSIType" id="selVLSIType" style="width:100px;"><option value="1">Front End</option><option value="2" >Back End</option></select>
	</div>	</td>
                     </tr>	
					    <tr>
                            <td>Role<span style="color:#FF0000">*</span></td>
                            <td><input type="text" name="role" id="role" value="<?php echo $role;?>"/></td>
                            <td>Team Size<span style="color:#FF0000">*</span></td>
                            <td  height="" colspan="2"><select name="selSize" id="selSize" value="<?php echo $teamsize;?>"style="width:50px;"> 
																		<option value="1" <?php if($teamsize == 1) echo "selected";?>>1</option><option value="2"<?php if($teamsize == 2) echo "selected";?> >2</option>
																		<option value="3" <?php if($teamsize == 3) echo "selected";?>>3</option><option value="4" <?php if($teamsize == 4) echo "selected";?>>4</option>
																		<option value="5" <?php if($teamsize == 5) echo "selected";?>>5</option><option value="6" <?php if($teamsize == 6) echo "selected";?>>6</option>
																		<option value="7" <?php if($teamsize == 7) echo "selected";?>>7</option><option value="8" <?php if($teamsize == 8) echo "selected";?>>8</option>
																		<option value="9" <?php if($teamsize == 9) echo "selected";?>>9</option><option value="10" <?php if($teamsize == 10) echo "selected";?>>10</option>
																		<option value="10+" <?php if($teamsize == '10+') echo "selected";?> >10+</option></select></td>
                        </tr>
						<tr>
                            <td>Project discription</td>
							<td colspan="3"> <textarea name="description" id="description" rows="3" cols="40"><?php echo $description;?></textarea>
							 
							</td>

                            
                        </tr>
						<tr>
                            <td>Tools Used</td>
							<td colspan="3"> <textarea name="tools" id="tools" rows="3" cols="40" ><?php echo $tools;?></textarea></td>
                        </tr>
						
						<tr>
						    <td>challenges</td>
							<td colspan="3"> <textarea name="challenges" id="challenges" rows="3" cols="40" ><?php echo $challenges;?></textarea></td>
                                                    </tr>
						<tr>
						   <td></td>
						   <td></td>

                            <td><input type="button" name="Close" id="Close" value="Close" onClick="fnClose();"/></td>
                            <td><input type="submit" name="save" id="save" value="save"/></td>
                        </tr>                       
                       
						</table>
						
						</form>
						</body>
						</html>