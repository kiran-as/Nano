<?php 
 include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

		  $rid = $_SESSION['r_id'];
		  $companyname = $_SESSION["r_company"];
		  if($_SESSION['r_id']=='')
		  {
		  	echo "<script>parent.location = 'recruiter_index1.php';</script>";	
		  }
		 $jpid=$_GET['jpid'];
		 	$queryrecruiteredit = "SELECT * FROM rv_recruiters where r_id=".$rid;
		 	//echo $queryjobposting;

	$resultrecruiteredit = mysql_query($queryrecruiteredit);
	while ($rows = mysql_fetch_assoc($resultrecruiteredit)) {
		$r_user_name	= $rows["r_user_name"];
		$r_email= $rows["r_email"];
 		$r_company	= $rows["r_company"];
		$r_address= $rows["r_address"];
		$r_pin	= $rows["r_pin"];
		$r_city= $rows["r_city"];
		$r_state	= $rows["r_state"];	
		$r_country	= $rows["r_country"];	
		$r_designation	= $rows["r_designation"];	
		$r_std	= $rows["r_std"];		
		$r_contact	= $rows["r_contact"];	
		$r_mobile	= $rows["r_mobile"];	
		$r_web_url	= $rows["r_web_url"];
		$r_comp_desc	= $rows["r_comp_desc"];	
		$r_industry	= $rows["r_industry"];			
		$r_no_employes	= $rows["r_no_employes"];
		$Otherindustry	= $rows["Otherindustry"];	
		}	 

		 
		 if($_POST)
		 {
		    
			$username = $_POST['textfield'];
			$email = $_POST['textfield2'];
			$companyname = $_POST['textfield3'];
			$companyaddress = $_POST['textfield4'];
			$Country = $_POST['textfield5'];
			$State = $_POST['textfield6'];
			$City = $_POST['textfield7'];
			
			
			$Pincode = $_POST['textfield8'];
			$Designation = $_POST['textfield9'];
			
			$Contactcode = $_POST['textfieldcode'];
			$Contact = $_POST['textfield10'];
			$Mobile = $_POST['textfield11'];
			$url = $_POST['textfield12'];
			$companydescription = $_POST['textfield13'];
			$typeofindustry = $_POST['txtIndustry'];
			$capacity = $_POST['select1'];
$Otherindustry = $_POST['Otherindustry'];
			
			
 $result = mysql_query("UPDATE rv_recruiters SET            r_user_name = '".$username."', 
					        					       r_email=  '".$email."', 
													   r_company=  '".$companyname."',
													   r_address = '".$companyaddress."', 
					        					       r_pin=  '".$Pincode."', 
													   r_city=  '".$City."', 
													   r_state = '".$State."', 
					        					       r_country=  '".$Country."', 
													   r_designation=  '".$Designation."', 
													   r_std = '".$Contactcode."', 
					        					       r_contact=  '".$Contact."', 
													   r_mobile=  '".$Mobile."', 
													   r_web_url = '".$url."', 
					        					       r_comp_desc=  '".$companydescription."', 
													   r_industry=  '".$typeofindustry."',
													    Otherindustry=  '".$Otherindustry."',   
													    r_no_employes=  '".$capacity."'
													 
				WHERE r_id ='".$_SESSION['r_id']."' "); 
				$flag=0;
				if($r_user_name!=$username)
				{
				   $flag=1;
				}
				if($r_company!=$companyname)
				{
				   $flag=1;
				}
				if($r_mobile!=$Mobile)
				{
				   $flag=1;
				}
				if($r_email!=$email)
				{
				   $flag=1;
				}
				
				if($flag==1)
				{
			$html='<table width="100%" cellpadding="3" cellspacing="3" border="0">
			        <tr>
						<td>Dear Admin</td>
					</tr>
					<tr>
						<td>The recruiter with the below profile details has made changes to his Nanochip Solutions account</td>
					</tr>
					<tr>
						<td>Recruiter Name:'.$username.'</td>
					</tr>
					<tr>
						<td>Company Name:'.$companyname.'</td>
					</tr>
					<tr>
						<td>Mobile:'.$Mobile.'</td>
					</tr>
					<tr>
						<td>Email:'.$email.'</td>
					</tr>
					
					<tr>
						<td>Etc. (all details as applicable)</td>
					</tr>
					<tr>
						<td>Kindly review the changes</td>
					</tr>
					</table>
					';
   
					$from='info@nanochipsolutions.com';
					$to      = 'askiran123@gmail.com';
					$subject = 'Nanochip Solutions:Recruiter has edited profile' ;
					$message = $html;
					$headers = "Content-type: text/html\r\n"; 
						'Reply-To: info@nanochipsolutions.com' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
					$headers.= "From:" . $from;
					mail($to, $subject, $message, $headers);  
					$saved=1;
				
				}
				
				
				
				
		 	header("Location:dashboard.php");exit;
		 }


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<meta name="keywords" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<link rel="stylesheet" href="css/styleupdated1.css" type="text/css" media="screen" />
<link rel="stylesheet" href="lib/jquery.autocomplete.css" type="text/css" />
<link href="css/recruiter-styles.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<title>ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company</title>

<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
 <script type="text/javascript" src="lib/jquery.js"></script>
<script type='text/javascript' src='lib/jquery.autocomplete.js'></script>
<script type='text/javascript' src='lib/localdata.js'></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>

<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
<script type="text/javascript">
$().ready(function() {
	$("#textfield7").autocomplete(cities);

	$("#textfield6").autocomplete(states);
	
	$("#textfield5").autocomplete(countries);	

	$("#clear").click(function() {
		$(":input").unautocomplete();
	});
});
function fnhideshowlabelother(id)
{
	if(id=='Other')
	{
	document.getElementById("Otherlabel").style.display='';
	document.getElementById("Otherlabel1").style.display='';
	}
	else

	{
		document.getElementById("Otherlabel").style.display='none';
		document.getElementById("Otherlabel1").style.display='none';
	}
}

function fnotherindus()
{
	var othertype = '<?php echo $r_industry;?>';
	if(othertype=='Other')
	{
		document.getElementById("Otherlabel").style.display='';
		document.getElementById("Otherlabel1").style.display='';
	}
}
		function numbersonly(e){
			var unicode=e.charCode? e.charCode : e.keyCode
			if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
			if (unicode<48||unicode>57) //if not a number
			return false //disable key press
			}
		}
		
		 function validationsjobposting()
		 {
			 if(document.getElementById('textfield').value=='')
			 {
				  alert('Enter the Name');
				  document.getElementById('textfield').focus();
				  return false;
			 }

			 if(document.getElementById('textfield2').value=='')
			 {
				  alert('Enter the E-Mail');
				  document.getElementById('textfield2').focus();
				  return false;
			 }

			 if(document.getElementById('textfield3').value=='')
			 {
				  alert('Enter the Company Name');
				  document.getElementById('textfield3').focus();
				  return false;
			 }

			

			 if(document.getElementById('textfield5').value=='')
			 {
				  alert('Enter the Country');
				  document.getElementById('textfield5').focus();
				  return false;
			 }

			 if(document.getElementById('textfield6').value=='')
			 {
				  alert('Enter the State');
				  document.getElementById('textfield6').focus();
				  return false;
			 }

			 if(document.getElementById('textfield7').value=='')
			 {
				  alert('Enter the City');
				  document.getElementById('textfield7').focus();
				  return false;
			 }

			 if(document.getElementById('textfield8').value=='')
			 {
				  alert('Enter the Pincode');
				  document.getElementById('textfield8').focus();
				  return false;
			 }

			 if(document.getElementById('textfield9').value=='')
			 {
				  alert('Enter the Designation');
				  document.getElementById('textfield9').focus();
				  return false;
			 }
			 if(document.getElementById('textfield11').value=='')
			 {
				  alert('Enter the Mobile No.');
				  document.getElementById('textfield11').focus();
				  return false;
			 }
			 if(document.getElementById('textfield12').value=='')
			 {
				  alert('Enter the URL');
				  document.getElementById('textfield12').focus();
				  return false;
			 }

		 }
	function fnclose()
{
  window.location="dashboard.php";
}	 
		 
		 
	</script>
	
<body  onload="fnotherindus();">
<div class="container">
<div class="dashboard">

<? include_once('recruiterheader.php');  ?>

<div id="row">
<form action="" method="post" name="">
<table width="900" border="0" cellspacing="4" cellpadding="2">
  <tr><td colspan="2"><h2>Recruiter Information</h2></td></tr>

  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Name*</td>
    <td width="100%"><input name="textfield" type="text" id="textfield" size="50" value="<?php echo $r_user_name;?>"/></td>
  </tr>
  <input type="hidden" name="rid" value="<?php echo $rid;?>" id="rid"></input>
  
    <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Designation*</td>
    <td><input name="textfield9" type="text" id="textfield9" size="50"  value="<?php echo $r_designation;?>"/></td>
  </tr>
    <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Contact No</td>
    <td><input name="textfield10" type="text" id="textfield10" size="10"  width="254 px" value="<?php echo $r_contact;?>" onKeyPress='return numbersonly(event);'/></td>
  </tr>

  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Official Email ID*</td>
    <td><input name="textfield2" type="text" id="textfield2" size="50"  value="<?php echo $r_email;?>"/></td>
  </tr>
    <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Mobile*</td>
    <td><input name="textfield11" type="text" id="textfield11" size="50" onKeyPress='return numbersonly(event);'  value="<?php echo $r_mobile;?>"/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Company Name*</td>
    <td><input name="textfield3" type="text" id="textfield3" size="50"   value="<?php echo $r_company;?>"/></td>
  </tr>
    <tr>
    <td valign="top" nowrap="nowrap" class="alignright">URL*</td>
    <td><input name="textfield12" type="text" id="textfield12" size="50"  value="<?php echo $r_web_url;?>"/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Company Address</td>
    <td><input name="textfield4" type="text" id="textfield4" size="50"  value="<?php echo $r_address;?>"/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Country*</td>
    <td><input name="textfield5" type="text" id="textfield5" size="50"  value="<?php echo $r_country;?>"/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">State*</td>
    <td><input name="textfield6" type="text" id="textfield6" size="50"  value="<?php echo $r_state;?>"/></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">City*</td>
    <td><input name="textfield7" type="text" id="textfield7" size="50"  value="<?php echo $r_city;?>"/></td>
  </tr>
   <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Pincode*</td>
    <td width="100%"><input name="textfield8" type="text" id="textfield8" size="50" value="<?php echo $r_pin;?>" onKeyPress='return numbersonly(event);'/></td>
  </tr>



  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Company Description</td>
 <td><textarea name="textfield13" cols="44" rows="5" id="textfield13"><?php echo $r_comp_desc;?></textarea></td>
  </tr>
  <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Type of Industry</td>
   
    <td><select name="txtIndustry"  id="txtIndustry" style="width:220px;" onChange="fnhideshowlabelother(this.value)">
      <option value="Product" <?php if($r_industry =='Product'){echo "Selected";}?>>Product</option>
      <option value="Services" <?php if($r_industry =='Services'){echo "Selected";}?>>Services</option>
      <option value="EDA" <?php if($r_industry =='EDA'){echo "Selected";}?>>EDA</option>
     <option value="Fab" <?php if($r_industry =='Fab'){echo "Selected";}?>>Fab</option>
      <option value="Other" <?php if($r_industry =='Other'){echo "Selected";}?>>Others</option>
    </select></td>
  </tr>
  
 <tr>
<td id="Otherlabel" style="display:none" valign="top" nowrap="nowrap" class="alignright">Specify here</td>
<td id="Otherlabel1" style="display:none"><input name="Otherindustry" type="text" id="Otherindustry" size="50"  value="<?php echo $Otherindustry;?>"/></td>

</tr>  
  
   <tr>
    <td valign="top" nowrap="nowrap" class="alignright">Number of People*</td>
    <td><select name="select1"  id="select1" style="width:220px;">
      <option value="< 10" <?php if($r_no_employes =='< 10'){echo "Selected";}?>>< 10</option>
      <option value="10-50" <?php if($r_no_employes =='10-50'){echo "Selected";}?>>10-50</option>
      <option value="50-100" <?php if($r_no_employes =='50-100'){echo "Selected";}?>>50-100</option>
            <option value="> 100" <?php if($r_no_employes =='> 100'){echo "Selected";}?>>> 100</option>
    </select></td>
  </tr>
    <tr>
    <td colspan="2" align="right"> <input type="button" name="close" id="close" name="close" class="grayButton" value="Close" onclick="fnclose();"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit"  value="Save" name="Save" id="Save" class="blueButton" onclick="return validationsjobposting();"></input></td>
  </tr>
  
</table>
</form>
</div>
</div>
<div class="footer">Copyrights © 2012 Nanochipsolutions</div>
</div>
</body>
</html>
