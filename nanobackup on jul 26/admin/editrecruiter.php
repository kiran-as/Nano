<?php  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php');  
	//include_once('../classes/recruiter.class.php');  
	   
	$input=new inputFields();	
	$ch=new checkInputFields();	
	$db=new dataBase();
	$rec = new recruiter();
	$db->connectDB(); 

$idrecruiter = $_GET['idrecruiter'];
$resultsss = "SELECT * FROM rv_recruiters where r_id=".$_GET['idrecruiter'];

	$resultc = mysql_query($resultsss);
	while ($row = mysql_fetch_assoc($resultc)) {
		  $originalname = $arraStudent["r_user_name"]	= $row["r_user_name"];
		 $originalcompanyname = $arraStudent["r_company"]	= $row["r_company"];
		 $originalmobile = $arraStudent["r_mobile"]	= $row["r_mobile"];
		 $originalemail = $arraStudent["r_email"]	= $row["r_email"];
		 $originaldesignation = $arraStudent["r_designation"]	= $row["r_designation"];
		 $arraStudent["r_active"]	= $row["r_active"];
		$arraStudent["r_address"]	= $row["r_address"];
		$arraStudent["r_id"]	= $row["r_id"];
		$arraStudent["r_web_url"]	= $row["r_web_url"];
		$arraStudent["r_std"]	= $row["r_std"];
		
		 $arraStudent["r_state"]	= $row["r_state"];
		 $arraStudent["r_country"]	= $row["r_country"];
		 $arraStudent["r_comp_desc"]	= $row["r_comp_desc"];
		$arraStudent["r_industry"]	= $row["r_industry"];
		$arraStudent["r_no_employes"]	= $row["r_no_employes"];
		$arraStudent["r_city"]	= $row["r_city"];
		
		
		
		}
		$saved=0;
		
		IF($_POST)
		{
			$name = $_POST['name'];
$designation = $_POST['designation'];
$companyname = $_POST['companyname'];
$mobile= $_POST['mobile'];
$email= $_POST['email'];
$active= $_POST['active'];
$idrecruiter= $_POST['idrecruiter'];
$url= $_POST['url'];
$compaddress= $_POST['compaddress'];
/*echo "UPDATE rv_recruiters SET r_user_name = '".$name."', 
					        					     r_company=  '".$companyname."', 
													 r_mobile=  '".$mobile."',
													  r_email=  '".$email."',
													    r_designation=  '".$designation."',
													  r_active=  '".$active."' 
											
				WHERE r_id ='".$idrecruiter."'";
die();*/

$result = mysql_query("UPDATE rv_recruiters SET r_user_name = '".$name."', 
					        					     r_company=  '".$companyname."', 
													 r_mobile=  '".$mobile."',
													  r_email=  '".$email."',
													    r_designation=  '".$designation."',
														  r_address=  '".$compaddress."',
													    r_web_url=  '".$designation."',
													  r_active=  '".$active."' 
											
				WHERE r_id ='".$idrecruiter."' "); 
$flag=0;
				if($name!=$originalname)
				{
				   $flag=1;
				}
				if($designation!=$originaldesignation)
				{
				   $flag=1;
				}
				if($companyname!=$originalcompanyname)
				{
				   $flag=1;
				}
				if($mobile!=$originalmobile)
				{
				   $flag=1;
				}
				if($email!=$originalemail)
				{
					$flag=1;
				}
				
				if($flag==1)
				{
			$html='<table width="100%" cellpadding="3" cellspacing="3" border="0">
			        <tr>
						<td>Dear '.$name.'</td>
					</tr>
					<tr>
						<td>Your Name:'.$name.'</td>
					</tr>
					<tr>
						<td>Company Name:'.$companyname.'</td>
					</tr>
					<tr>
						<td>Mobile:'.$mobile.'</td>
					</tr>
					<tr>
						<td>Email:'.$email.'</td>
					</tr>
					<tr>
						<td>Designation:'.$designation.'</td>
					</tr>
					<tr>
						<td>on your Nanochip Solutions account has been edited by the admin. If the details entered are incorrect, kindly email the admin at info@nanochipsolutions.com.</td>
					</tr>
					<tr>
						<td>Thanks and Regards,</td>
					</tr>
					<tr>
						<td>Nanochip Solutions Team</td>
					</tr></table>
					';
   
					$from='info@nanochipsolutions.com';
					$to      = $email;
					$subject = 'Nanochip Solutions:Your Accout as Recruiter is edited' ;
					$message = $html;
					$headers = "Content-type: text/html\r\n"; 
						'Reply-To: info@nanochipsolutions.com' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
					$headers.= "From:" . $from;
					mail($to, $subject, $message, $headers);  
					$saved=1;
				}
				else
				{
				  echo "<script>parent.location = 'admin_mangae_recruiters.php';</script>";	 
  
				}

 
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../css/styleupdated1.css" type="text/css" media="screen" />
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RV-VLSI Design Center</title>

<script type="text/javascript" src="../js/admin_validation.js"></script>

<script type="text/javascript">

function fnclose()
{
    parent.location="http://nanochipsolutions.com/admin/admin_mangae_recruiters.php";
}

function numbersonly(e){
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
	if (unicode<48||unicode>57) //if not a number
	return false //disable key press
	}
}

function validaterecruiter()
{
	if(document.getElementById('name').value == '')
	{
		alert('Enter the Name');
		return false;
	}

	if(document.getElementById('designation').value == '')
	{
		alert('Enter the Designation');
		return false;
	}

	if(document.getElementById('companyname').value == '')
	{
		alert('Enter the Company Name');
		return false;
	}

	if(document.getElementById('mobile').value == '')
	{
		alert('Enter the Mobile');
		return false;
	}

	if(document.getElementById('email').value == '')
	{
		alert('Enter the E-Mail');
		return false;
	}
	
	if(document.getElementById('url').value == '')
	{
		alert('Enter the URL');
		return false;
	}

		
}

function fnvalidateemail(email,idrecruiter)
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
         var datas = xmlhttp.responseText;
		
		 if(datas==1)
		 {
		   alert('The email has been already used please enter the valid email id');
		   document.getElementById('email').value='';
		 }
		 else
		 {
		 }
    }
  }
xmlhttp.open("GET","ajaxcheckemail.php?email="+email+"&idrecruiter="+idrecruiter,true);
xmlhttp.send();
}

function fnshowotherdetails()
{
	var checkboxhide = document.getElementById('other').checked;
	
	if(checkboxhide==true)
	{
	document.getElementById('showotherdetailscontents').style.display='';
	
	
	}
	else
	{
		document.getElementById('showotherdetailscontents').style.display='none';
		
		
	}
}
</script>
</head>

<body onload="fnshowotherdetails();">
<div>
<form action="" method="post" name="">
<?php if($saved==0){?>
 <table  cellpadding="4" cellspacing="5" border="0">
   <tr>
   			<td colspan="2" class="heading_new">Edit Recruiter<img src="../images/close.gif" align="right" onClick="fnclose();"><hr></td>
   </tr>
<input type="hidden" name='idrecruiter' id='idrecruiter' value='<?php echo $arraStudent['r_id'];?>'/>
	 
	 <tr>
	  <td class="label" nowrap="nowrap" align="right">Name<span><font color="#FF0000">*</font></span></td>
    <td><input type="text"  name="name" id="name"   style="width:250px;"   value='<?php echo $arraStudent["r_user_name"];?>'/>
                  </td>
	 </tr>
	 
		<tr>
			 <td  class="label" nowrap="nowrap" align="right">Designation<span><font color="#FF0000">*</font></span></td>
			 <td><input type="text" name="designation" id="designation"   style="width:250px;" value='<?php echo $arraStudent['r_designation'];?>'></td>
			 
		</tr>
	 
		<tr>
			 <td  class="label" nowrap="nowrap" align="right">Company Name<span><font color="#FF0000">*</font></span></td>
			 <td><input type="text" name="companyname" id="companyname"  style="width:250px;" value='<?php echo $arraStudent['r_company'];?>'></td>
			 
		</tr>

	 
		<tr>
			 <td  class="label" nowrap="nowrap" align="right">Mobile<span><font color="#FF0000">*</font></span></td>
			 <td><input type="text" name="mobile" id="mobile"  style="width:250px;" value='<?php echo $arraStudent['r_mobile'];?>' onKeyPress='return numbersonly(event);'></td>
			 
		</tr>
		
					 
		<tr>
			 <td  class="label" nowrap="nowrap" align="right">E-Mail<span><font color="#FF0000">*</font></span></td>
			 <td><input type="text" name="email" id="email"  style="width:250px;" value='<?php echo $arraStudent['r_email'];?>' onblur="fnvalidateemail(this.value,'<?php echo $arraStudent['r_id'];?>')"></td>
			 
		</tr>
		<tr>
			 <td  class="label" nowrap="nowrap" align="right">Url<span><font color="#FF0000">*</font></span></td>
			 <td><input type="text" name="url" id="url"  style="width:250px;" value='<?php echo $arraStudent['r_web_url'];?>'></td>
			 
		</tr>
		
						 
		<tr>
			 <td  class="label" nowrap="nowrap" align="right">Company Address</td>
			 <td><input type="text" name="compaddress" id="compaddress"  style="width:250px;" value='<?php echo $arraStudent['r_address'];?>'></td>
			 
		</tr>
		<tr>
		 <td class="label" nowrap="nowrap" align="right">
	Status</td><td>
	 <select name="active" id="active" value=""> 
																		<option value="1" <?php if($arraStudent["r_active"] == '1') echo "selected";?>>Active</option>
																		<option value="0"  <?php if($arraStudent["r_active"] == '0') echo "selected";?>>In-Active</option>
																		
																		</select></td>
		</tr>
		
		
		<tr>
		<td><a href="#kiran"onclick="fnshowotherdetails();">Show Other Details</a></td>
			   <td colspan="1" align="right"><!--<input type="button" name="other" id="other" value="other" class="grayButton" onClick="fnshowotherdetails();"/>
			   <input style="display:none" type="button" name="hide" id="hide" value="hide" class="hide" onClick="fnhideotherdetails();"/>
			   
			   --><input type="submit" name="save" id="save" value="save" class="blueButton" onClick="return validaterecruiter();"/>
											<input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td>
			
			</tr>





</table>
<table id="showotherdetailscontents" cellpadding="4" cellspacing="5" border="0">
<tr>
			 <td class="label" nowrap="nowrap" align="right">City<span><font color="#FF0000"></font></span></td>
			 <td><?php echo $arraStudent['r_city'];?></td>
			 
		</tr>
<tr>
			 <td  class="label" nowrap="nowrap" align="right">State<span><font color="#FF0000"></font></span></td>
			 <td><?php echo $arraStudent['r_state'];?></td>
			 
		</tr>
		<tr>
			 <td  class="label" nowrap="nowrap" align="right">Country<span><font color="#FF0000"></font></span></td>
			 <td><?php echo $arraStudent['r_country'];?></td>
			 
		</tr>
		
					 
		<tr>
			 <td  class="label" nowrap="nowrap" align="right">Company Description<span><font color="#FF0000"></font></span></td>
			 <td><?php echo $arraStudent['r_comp_desc'];?></td>
			 
		</tr>
		<tr>
			 <td  class="label" nowrap="nowrap" align="right">Industry type<span><font color="#FF0000"></font></span></td>
			 <td><?php echo $arraStudent['r_industry'];?></td>
			 
		</tr>
		<tr>
			 <td  class="label" nowrap="nowrap" align="right">No of Employees<span><font color="#FF0000"></font></span></td>
			 <td><?php echo $arraStudent['r_no_employes'];?><a name="kiran"></a></td>
			 
		</tr>
		
					 
		
</table>
<?php } else {?>

 <table width="50%"  cellpadding="4" cellspacing="10" border="0" class="resuemviewtableborder">
 
 <tr>
        <td colspan="2" class="popupheader">
		 <table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
         <tr>
          <td nowrap="nowrap" class="heading_new">Edit Recruiter</td>
         <td width="100%" align="right"><img src="../images/close.gif" align="absmiddle" onClick="fnclose();" style="cursor:pointer"></td>
      </tr>
  </table>
  </td>
  </tr>
  
		<tr><td align="center">
		<table cellpadding="0" cellspacing="0" border="0" class="resumeviewinfo" align="center"><tr>
			<td><img src="../images/iocn_information.png"></td>
			<td align="center">An Email has been sent to the recruiter</td>
			
		</tr></table>
		
		
		</td></tr>
      <tr> <td align="right">
	  <input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td></tr>
					
  </table>
<?php }?>

</form>
</body>
</html>
