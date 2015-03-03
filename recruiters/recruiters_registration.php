<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
 //include_once('config/header.php');
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
  


 if(isset($_POST['regSubmit']))
 {
 $activ_code = rand(1000,9999);
		 $ch=new checkInputFields();
		 $result=$db->getResults("select * from $rec_table where r_email='".$ch->checkFields($_REQUEST[txtEmail])."'");


if(count($result)!=0)
{
echo  "<script>document.location.href='recruiters_registration.php?success=6'</script>";
//header("Location: recruiters_registration.php?msg=6");

}
else
{
	if($_POST['Otherindustry']=='')
	{
		$_POST['Otherindustry']=0;
	}
     $date= date('d-m-Y');
 	$insert_query="INSERT INTO $rec_table  set r_user_name	='".$ch->checkFields($_POST['txtUserName'])."',
	                                                  r_email ='".$ch->checkFields($_POST['txtEmail'])."',
	                                                  r_password ='".$ch->checkFields(md5($_POST['txtPassword']))."',
													  r_company ='".$ch->checkFields($_POST['txtCompany'])."',
									                r_address ='".$ch->checkFields($_POST['txtAddress'])."',
													    r_pin  ='".$ch->checkFields($_POST['txtPinCode'])."',
														   r_city  ='".$ch->checkFields($_POST['txtCity'])."',
														      r_state  ='".$ch->checkFields($_POST['txtState'])."',
															     r_country  ='".$ch->checkFields($_POST['txtCountry'])."',
														r_web_url ='".$ch->checkFields($_POST['txtWebUrl'])."',
														r_actcode='".$ch->checkFields($activ_code)."',
													  r_std ='000',
														   r_contact ='".$ch->checkFields($_POST['txtContactNo'])."',
														   r_designation ='".$ch->checkFields($_POST['txtDesignation'])."',
														    r_mobile ='".$ch->checkFields($_POST['txtPhoneNumber'])."',
															 r_comp_desc ='".$ch->checkFields($_POST['txtComDescriptn'])."',
															  r_industry ='".$ch->checkFields($_POST['txtIndustry'])."',
															  Otherindustry ='".$ch->checkFields($_POST['Otherindustry'])."',
															  registereddate ='".$date."',
														r_no_employes	='".$ch->checkFields($_POST['selNofEmployes'])."'"; 
									
									
									
									
				 $result=$db->insertRecord($insert_query);
				 
				 /*srihar added code*/	
	$pwd=$_REQUEST[txtPassword];
	$usr_email=$_REQUEST[txtEmail];	
	$user_name=$_REQUEST[txtUserName];
	$user_id = mysql_insert_id();  
	$md5_id = md5($user_id);
	

//echo $user_id;die;
//echo "update$rec_table set md5_id='$md5_id' where r_id='$user_id'";die;
$info_query="update $rec_table set md5_id='$md5_id' where r_id='$user_id'";
$result=$db->insertRecord($info_query);
				/*srihar added code*/	
				
									
	$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Nanochipsolution <info@nanochipsolutions.com>';
				
		        $to='info@nanochipsolutions.com';
				$subject='Nanochip Solutions :New Registration by Recruiter and Activation code';
				 
 $message='<table width="100%" border="0" cellspacing="3" cellpadding="3">
 
  <tr>
    <td>Recruiter Name :'.$_REQUEST[txtUserName].'</td>
  </tr>
 
  <tr>
    <td>Designatiion :'.$_REQUEST[txtDesignation].'</td>

  </tr>
  <tr>
    <td>Company :'.$_REQUEST[txtCompany].'</td>
  </tr>
  <tr>
    <td>Email Id :'.$_REQUEST[txtEmail].'</td>
  </tr>
  <tr>
    <td>Phone :'.$_REQUEST[txtPhoneNumber].'</td>
  </tr>
  <tr>
  <td>Has been registerd now.Please Activate the recruiter by entering the below given activation code and his email addres provide in the below link</td>
  </tr>
   <tr>
<td>'.$server_url."activate_recruiter.php".'</td>
</tr> 

<tr>
<td>Email :'.$usr_email .'</td>
</tr>
<tr>
<td>Activation Code :'.$activ_code.'</td>
</tr>
</table>';

	mail('info@nanochipsolutions.com', $subject, $message, $headers);
	
$saved=1;
							

		 }									
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
function validationsjobposting()
		 {
			 if(document.getElementById('txtUserName').value=='')
			 {
				  alert('Enter the Name');
				  document.getElementById('txtUserName').focus();
				  return false;
			 }

			
			 if(document.getElementById('txtDesignation').value=='')
			 {
				  alert('Enter the Designation');
				  document.getElementById('txtDesignation').focus();
				  return false;
			 }

		 }
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
function numbersonly(e){
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
	if (unicode<48||unicode>57) //if not a number
	return false //disable key press
	}
}
 function changeState(typeID)
{

	if(typeID!=99)
   {
	
	
	
	document.getElementById("selDiv").style.display='none';
	 
	document.getElementById("textDiv").style.display='block';
	
	} else 
	 {
		
	document.getElementById("selDiv").style.display='block';
	 
	document.getElementById("textDiv").style.display='none';
	
	 
	 }
	
	
}
</script>
<script type="text/javascript">
$().ready(function() {
	$("#suggest0").autocomplete(cities);

	$("#suggest1").autocomplete(states);
	
	$("#suggest2").autocomplete(countries);	

	$("#clear").click(function() {
		$(":input").unautocomplete();
	});
});

	function fnclose()
{
  window.location="recruiter_login.php";
}	
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
</head>

<body>
<div class="container">
<div class="dashboard">
<div id="table">
<div id="row" class="header">
<div id="globalfirstcell"><a href="index.php"><img src="images/logonanao.jpg"></a></div>
<div class="floatright">   

</div>
</div>
</div>
<div class="dashboard">

<div id="row">

	
		
	</div>
	</div>
	</div>
<div id="row" class="dashboard">
<div class="row">
 <?=$input->formStart('txtForm_rec','','onsubmit="return RecruitersValidation();"');?>
 
<?php if($saved==0){?>
<table width="100%" border="0" cellspacing="4" cellpadding="2">
  

  
    <tr>
    
     <td valign="top" nowrap="nowrap" class="alignright">Name*</td>
     <td width="100%"><?=$input->textBox('txtUserName',$_REQUEST[txtUserName]);?></td>

    </tr>
  

  <tr>
 <td valign="top" nowrap="nowrap" class="alignright">Designation*</td>
 <td><?=$input->textBox('txtDesignation',$_REQUEST[txtDesignation]);?></td>
  
</tr>
   <tr>
 <td valign="top" nowrap="nowrap" class="alignright">ContactNo</td>
 <td><?=$input->textBox('txtContactNo',$_REQUEST[txtContactNo]);?></td>
  
</tr>
 <tr>  
 
<td valign="top" nowrap="nowrap" class="alignright">Official Email ID*</td>
<td><input type="text" name="txtEmail" value="<?=$_REQUEST[txtEmail]?>" onBlur="return validEmail(this.value)"/>This will be your registered email id for all communications

<p class="left_para" style="margin:0px;padding:10px; color:#FF0000; font-weight:bold;"><span id="notice"></span>
 </p> 
<p class="dot_style"></p>

<p  class="left_para" style="margin:0px;padding:0px;"><?  if(!empty($_SESSION[m_id])){}?>
</p> 

</div></td>
</tr>




<tr>

 <td valign="top" nowrap="nowrap" class="alignright">Password*</td>
 <td><?=$input->password('txtPassword','','text');?></td>
  
  </tr>          

<tr>

    <td valign="top" nowrap="nowrap" class="alignright">Confirm Password*</td>
    <td><?=$input->password('txtConfirmPassword','','text');?></td>
    	
 </tr>

  <tr>
  
<td valign="top" nowrap="nowrap" class="alignright">Mobile*</td>
<td><?=$input->textBox('txtPhoneNumber',$_REQUEST[txtPhoneNumber]);?></td>

</tr>  
<tr>

 <td valign="top" nowrap="nowrap" class="alignright">Company Name*</td>
 <td><?=$input->textBox('txtCompany ',$_REQUEST[txtCompany]);?></td>
 
</tr>
  
       
 <tr>
 
<td valign="top" nowrap="nowrap" class="alignright">Url:*</td>
<td><?=$input->textBox('txtWebUrl',$_REQUEST[txtWebUrl]);?></td>

</tr>

<tr>

    <td valign="top" nowrap="nowrap" class="alignright">Company Address</td>
    <td><?=$input->textBox('txtAddress','','text');?></td>
	
</tr>  

<tr>

<td valign="top" nowrap="nowrap" class="alignright">Country*</td>
<td><input type="text" name="txtCountry"  id="suggest2" value="" /></td>

</tr>  

<tr>

<td valign="top" nowrap="nowrap" class="alignright">State*</td>
<td><input type="text" name="txtState"  id="suggest1" value="" /></td>

</tr>

<tr>

<td valign="top" nowrap="nowrap" class="alignright">City*</td>
<td><input type="text" name="txtCity"  id="suggest0" value=""/></td>

</tr>

<tr>

<td valign="top" nowrap="nowrap" class="alignright">Pin Code*</td>
<td><input type="text" name="txtPinCode" value="<?=$_REQUEST[txtPinCode]?>" onClick="return numbersonly(event);"/></td>
</tr>.


<tr>

<td valign="top" nowrap="nowrap" class="alignright">Company Description:</td>
    <td><?=$input->textArea('txtComDescriptn','','text');?></td>
    
</tr> 

<tr>  

<td valign="top" nowrap="nowrap" class="alignright">Type of Industry : </td>
<td><div id="selindustrytype"><select name="txtIndustry" id="txtIndustry"  style="width:220px;" onChange="fnhideshowlabelother(this.value)">
   <option value="Product" selected="selected">Product </option>
		<option value="Services">Services</option>
        
        <option value="EDA">EDA</option>
		
            <option value="IP">IP</option>
       
		<option value="Fab">Fab</option>
        
        <option value="Other">Others</option>
	
 </select> </div>
 </td>

</tr>

<tr>
<td id="Otherlabel" style="display:none" valign="top" nowrap="nowrap" class="alignright">Specify here</td>
<td id="Otherlabel1" style="display:none"><?=$input->textBox('Otherindustry');?></td>

</tr> 
<tr>  

<td valign="top" nowrap="nowrap" class="alignright">Number of Employees : </td>
<td><div id="selDiv"><select name="selNofEmployes" id="selNofEmployes"  style="width:220px;">
   <option value="< 10" selected="selected"> < 10 </option>
    
            <option value="10-50"  > 10-50</option>
       
		<option value="50-100" >50-100</option>
        
        <option value="> 100" > > 100</option>
		
	
 </select> </div>
</td>
</tr>
<tr>
<td></td>
<td align="left">
<a href="JavaScript:newPopup('http://nanochipsolutions.com/termsandconditions.php');">Terms and conditions</a> 
				
</div></td>
</tr>
     

  <tr>

    <td colspan="2"  align="right">
    <input  type="submit" value="Save" name="regSubmit" class="blueButton"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="close" id="close" name="close" class="grayButton" value="Close" onclick="fnclose();"></input>
       </tr>
</table>
<?php } else {?>
<table width="100%"  cellpadding="4" cellspacing="10" border="0" class="resuemviewtableborder">
 <tr>
			
			<td><img src="/images/iocn_information.png" align="absmiddle">Thanks for registering on Nanochip Solutions as a Recruiter. Your registration details have been sent to the Admin for processing. </br>Your login credentials to access the job portal will be activated soon and an intimation will be sent to your registered email id</td>
			
		</tr>
		
		
      <tr> <td align="right">
	  <input type="button" name="Close" id="Close" value="Close" class="grayButton" onClick="fnclose();"/></td></tr>
					
  </table>

<?php }?>






    </form>
</div>
</div>
<div class="footer">Copyrights @ 2012 Nanochipsolutions</div>
</div>
</body>
</html>
