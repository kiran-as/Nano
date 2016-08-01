<? include_once('db/dbconfig.php');
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
   
 $query = "SELECT * FROM $members_table where m_id='".$_SESSION[m_id]."'"; 
  $edu_toal_count=count($query);
 
  $members_result=$db->getResults($query);
  foreach($members_result as $members){}	
  
  if(isset($_POST['careerSubmit'])){
  
 $db->getResults("delete FROM $career_objective_table where m_id='".$_SESSION[m_id]."'"); 
  
//  $careers=implode("#",$_POST['txtCareer']);
   $careers=$_POST['txtCareer'];
 // die($careers);
  	$db->insertRecord("insert into  $career_objective_table  set co_objective = '".$ch->checkFields($careers)."',m_id='".$_SESSION[m_id]."'");
  
  header("Location:career_info.php");
  }
  
  
  if(isset($_POST['achivSubmit'])){
  
 $db->getResults("delete FROM $achievements_table where m_id='".$_SESSION[m_id]."'"); 
  
  $archi=implode("#",$_POST['txtAchiv']);
 //die("insert into  $achievements_table  set ac_description = '".$ch->checkFields($archi)."',m_id='".$_SESSION[m_id]."'");
  	$db->insertRecord("insert into  $achievements_table  set ac_description = '".$ch->checkFields($archi)."',m_id='".$_SESSION[m_id]."'");
  
  header("Location:career_info.php");
  }


  
 

	
if(isset($_POST[CoreSubmit])){	
 $query_career=$db->getResults("SELECT * FROM $core_competecny_table where m_id='".$_SESSION[m_id]."'"); 
 $core_array = implode(',',$_POST['chkCareer']);

 $cc_more=implode("#",$_POST[txtCore]);
		if(count($query_career)==0){
		$query_car = "INSERT INTO $core_competecny_table set m_id='".$_SESSION[m_id]."',cc_array='".$core_array."',cc_other='".$cc_more."'";
		}else{
		$query_car = "update $core_competecny_table set cc_array='".$core_array."',cc_other='".$cc_more."' where  m_id='".$_SESSION[m_id]."'";
		}
	//	die($query_car);
		$result=$db->insertRecord($query_car);	
		header("Location:career_info.php?msg=1#tabs-5");
	  }

$states_query=$db->getResults("select * FROM $states where country_id ='99'");
$inst_query=$db->getResults("select * FROM $institutes order by insti_name asc");
$uni_query=$db->getResults("select * FROM $universities_table order by uni_name asc"); 



 
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<meta name="keywords" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<title>ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
 <script type="text/javascript" src="lib/jquery.js"></script>
<script type='text/javascript' src='lib/jquery.autocomplete.js'></script>
<script type='text/javascript' src='lib/localdata.js'></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
--><link href="rv_main.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />

  <link type="text/css" rel="stylesheet" href="calender/dhtmlgoodies_calendar.css" media="screen"/></link>
<script src="calender/dhtmlgoodies_calendar.js" type="text/javascript"></script>

<script src="js/student_validation.js" type="text/javascript"></script>
<script src="js/recruiter_validation.js" type="text/javascript"></script>
<!--<script src="js/ajax.js" type="text/javascript"></script>-->
	 
	<link type="text/css" href="jquery_tabs/css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" />	
			<script type="text/javascript" src="jquery_tabs/js/jquery-1.5.1.min.js"></script>
	<script type="text/javascript" src="jquery_tabs/js/jquery-ui-1.8.11.custom.min.js"></script>
 <script type="text/javascript">
		function checkingRoll(){


			if(document.getElementById('chkRoll').checked==true){
			document.getElementById('addSubscriptionHidden').style.display='block';
			}else{
			document.getElementById('addSubscriptionHidden').style.display='none';
			rvupdate();
			
			}
			
			
			
			}
 var t=0;
function addTextarea(type) {

	//Create an input type dynamically.
	var element = document.createElement("input");

	//Assign different attributes to the element.
	element.setAttribute("type", type);
element.setAttribute("id", "txtCareer"+t);
	element.setAttribute("name", "txtCareer[]");
	element.setAttribute("class", "textareaBox");

	var newTexts = document.getElementById("newTexts");

	//Append the element in page (in span).
	newTexts.appendChild(element);
	
	
t++;
}
function addsecondTextarea(type) {

	//Create an input type dynamically.
	var element = document.createElement("input");

	//Assign different attributes to the element.
	element.setAttribute("type", type);
element.setAttribute("id", "txtAchiv"+t);
	element.setAttribute("name", "txtAchiv[]");
	element.setAttribute("class", "textareaBox");

	var newTexts = document.getElementById("newsecTexts");

	//Append the element in page (in span).
	newTexts.appendChild(element);
	
	
t++;
}

var c='';
function addcoreTextarea(type) {

	//Create an input type dynamically.
	var element = document.createElement("input");

	//Assign different attributes to the element.
	element.setAttribute("type", type);
element.setAttribute("id", "txtCore"+c);
	element.setAttribute("name", "txtCore[]");
	element.setAttribute("class", "textareaBox");

	var newTexts = document.getElementById("newCoreTexts");

	//Append the element in page (in span).
	newTexts.appendChild(element);
	
	
c++;
}
function checkID(id)
{
	
	if(id!=''){
	//alert(id);
var xmlhttp;
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
//alert(xmlhttp.responseText);
    //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
	if(xmlhttp.responseText==0){
alert("The UID you have entered is not matching RV-VLSI Database. Kindly check your UID again, or get in touch with RV-VLSI Admin for any assistance");
	//	document.getElementById("Rvstudent").innerHTML=xmlhttp.responseText;	
				}
				
if(xmlhttp.responseText==2){
alert("Updated Sucessfully");
	//	document.getElementById("Rvstudent").innerHTML=xmlhttp.responseText;	
				}
		if(xmlhttp.responseText==1){
alert("This UID is already assigned to another candidate. Kindly verify your UID again, or get in touch with RV-VLSI Admin for assistance.");
			document.getElementById("Rvstudent").innerHTML="Enter RV-VLSI UID";	
				}
    }
  }

xmlhttp.open("GET","ajax/ajax_checkID.php?id="+id,true);
xmlhttp.send();
}
}


function rvupdate()
{
	//alert(id);
var xmlhttp;
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
//alert("Updated sucessfully");
    }
  }

xmlhttp.open("GET","ajax/rv_update.php",true);
xmlhttp.send();
}
 </script>
<style>
.textareaBox{

width:550px;
 height:20px;
 margin:5px;
}


#fade { /*--Transparent background layer--*/
	display: none; /*--hidden by default--*/
	background: #000;
	position: fixed; left: 0; top: 0;
	width: 100%; height: 100%;
	opacity: .80;
	z-index: 9999;
}
.popup_block{
	display: none; /*--hidden by default--*/
	background: #fff;
	padding: 20px;
	border: 20px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	/*--CSS3 Box Shadows--*/
	-webkit-box-shadow: 0px 0px 20px #000;
	-moz-box-shadow: 0px 0px 20px #000;
	box-shadow: 0px 0px 20px #000;
	/*--CSS3 Rounded Corners--*/
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}
img.btn_close {
	float: right;
	margin: -55px -55px 0 0;
}
/*--Making IE6 Understand Fixed Positioning--*/
*html #fade {
	position: absolute;
}
*html .popup_block {
	position: absolute;
}
</style>
  

	
<script type="text/javascript">
function loadGradBranch(id)
{

var xmlhttp;
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
    document.getElementById("divGradBranch").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","ajax_branch.php?id="+id,true);
xmlhttp.send();
}

function loadPGBranch(id)
{

var xmlhttp;
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
    document.getElementById("divPGBranch").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","ajax_pg_branch.php?id="+id,true);
xmlhttp.send();
}
function loadOtherBranch(id,divid)
{

var xmlhttp;
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
    document.getElementById("divOtherBranch"+divid).innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","ajax_branch.php?id="+id,true);
xmlhttp.send();
}

function loadOthermoreBranch(id)
{

var xmlhttp;
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
    document.getElementById("divOthermoreBranch").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","ajax_branch.php?id="+id,true);
xmlhttp.send();
}


function academicinfovalidation()
{
	var title=document.forms['formAcademic']['txtTitle'].value;
	var company=document.forms['formAcademic']['txtCompany'].value;
	var role=document.forms['formAcademic']['txtRole'].value;
	var selFrom=document.forms['formAcademic']['selFrom'].value;
	var selFromYear=document.forms['formAcademic']['selFromYear'].value;
	var selMonth1=document.forms['formAcademic']['selMonth1'].value;
	var selYear1=document.forms['formAcademic']['selYear1'].value;
	
	if(title=null || title=="")
	{
		alert("Please enter title");
		return false;
	}
	else if(company=null || company=="")
	{
		alert("Please enter company");
		return false;
	}
	
	else if(selFrom=='0')
			{
					alert("Please select month in 'From Date'");
					
					return false;
			}		
			else
			if(selFromYear=='0')
			{
					alert("Please select year in 'From Date'");
					
					return false;	
			}
			
			else
				if(selMonth1=='0')
			{
					alert("Please select month in 'To Date''");
					
					return false;
			}	
			else
			
			if(selYear1=='0')
			{
					alert("Please select year in 'To Date'");
					
					return false;	
			}
			else
		   if(selFromYear!='0' && selYear1!='0')
			{
			
			 if(selFromYear>selYear1){
					alert("From Year should less than To Year");
					
					return false;	
			}     } 
			if(role=null || role=="")
	{
		alert("Please enter role");
		return false;
	}
}
function careerobjvalidation()
{
	var txtCareer=document.forms['careerForm']['txtCareer'].value;
	
	
	if(txtCareer=null || txtCareer=="")
	{
		alert("Please Enter Career Objective");
		return false;
	}
	
}
function achievementvalidation()
{
	var txtAchiv=document.forms['archForm']['txtAchiv[]'].value;
	
	
	if(txtAchiv=null || txtAchiv=="")
	{
		alert("Please Enter Achievement Details");
		return false;
	}
	
}
function class10thvalidation()
{
	
	
	var selMonth10=document.forms['form10']['selMonth10'].value;
	var selYear10=document.forms['form10']['selYear10'].value;
	var txtSchool10=document.forms['form10']['txtSchool10'].value;
	var txtBoard10=document.forms['form10']['txtBoard10'].value;
	var txtPer10=document.forms['form10']['txtPer10'].value;
	var frm=document.form10;
	
	 
 



	
var x = parseFloat(txtPer10);
	
	 if(selMonth10=='0')
			{
					alert("Please Select month ");
					
					return false;
			}
			else
		
			if(selYear10=='0')
			{
					alert("Please select year ");
					
					return false;	
			}
			
			if ( ( frm.radPer10[0].checked == false ) && ( frm.radPer10[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
			
				 if(isNaN(txtPer10))
					 {
						alert("Enter numeric value");
						
						return false;
					 }
		if(document.getElementById('radPer10').checked==true){
			 if(txtPer10=null || txtPer10=="")
	{
		alert("Please Enter Marks");
		return false;
	}
		
if (isNaN(x) || x < 0 || x > 100) 
	{
		alert("Please Enter Marks below 100");
		frm.txtPer10.focus();
		return false;
	}
			
			}
				if(document.getElementById('radPer102').checked==true){
			 if(txtPer10=null || txtPer10=="")
	{
		alert("Please Enter Marks");
		return false;
	}
		if (isNaN(x) || x < 0 || x > 10) 
	{
		alert("Please Enter Marks below 10");
		frm.txtPer10.focus();
		return false;
	}
			
			}
/*		 if(txtPer10=null || txtPer10=="")
	{
		alert("Please Enter Marks");
		return false;
	}	
	var maxvalue = 100;	
		 if(txtPer10==maxvalue)
	{
		alert("Please Enter Marks");
		return false;
	}*/
	
	if(txtSchool10=null || txtSchool10=="")
	{
		alert("Please Enter School Name");
		return false;
	}
	 if(txtBoard10=null || txtBoard10=="")
	{
		alert("Please Enter Board Name");
		return false;
	}
	
			
	
}
function class12thvalidation()
{
	
	var selMonth12=document.forms['form12']['selMonth12'].value;
	var selYear12=document.forms['form12']['selYear12'].value;
	var txtSchool12=document.forms['form12']['txtSchool12'].value;
	var txtBoard12=document.forms['form12']['txtBoard12'].value;
	var txtPer12=document.forms['form12']['txtPer12'].value;
		var frm=document.form12;
	var x = parseFloat(txtPer12);
	 if(selMonth12=='0')
			{
					alert("Please select month ");
					
					return false;
			}
			else
		
			if(selYear12=='0')
			{
					alert("Please select year ");
					
					return false;	
			}
				if ( ( frm.radPer12[0].checked == false ) && ( frm.radPer12[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
	 if(isNaN(txtPer12))
					 {
						alert("Enter numeric value");
						
						return false;
					 }	
				
						
						if(document.getElementById('radPer12').checked==true){
			 if(txtPer12=null || txtPer12=="")
	{
		alert("Please Enter Marks");
		return false;
	}
		
if (isNaN(x) || x < 0 || x > 100) 
	{
		alert("Please Enter Marks below 100");
		frm.txtPer12.focus();
		return false;
	}
			
			}
				if(document.getElementById('radPer122').checked==true){
			 if(txtPer12=null || txtPer12=="")
	{
		alert("Please Enter Marks");
		return false;
	}
		if (isNaN(x) || x < 0 || x > 10) 
	{
		alert("Please Enter Marks below 10");
		frm.txtPer12.focus();
		return false;
	}
			
			}
					 
		
	
	if(txtSchool12=null || txtSchool12=="")
	{
		alert("Please Enter School Name");
		return false;
	}
	 if(txtBoard12=null || txtBoard12=="")
	{
		alert("Please Enter Board Name");
		return false;
	}
	
			
	
}

function Graduationvalidation()
{
	
	var selCourseGrad=document.forms['formGrad']['selCourseGrad'].value;
	
	var selStateGrad=document.forms['formGrad']['selStateGrad'].value;
	var selInstGrad=document.forms['formGrad']['selInstGrad'].value;
	var selUniversityGrad=document.forms['formGrad']['selUniversityGrad'].value;
	var selMonthGrad=document.forms['formGrad']['selMonthGrad'].value;
	var selYearGrad=document.forms['formGrad']['selYearGrad'].value;
	var txtPerGrad=document.forms['formGrad']['txtPerGrad'].value;	
	var frm=document.formGrad;
	
	 if(selCourseGrad=='0')
			{
					alert("Please select Course");
					
					return false;
			}
		
		
		
			if(selStateGrad=='0')
			{
					alert("Please select State ");
					
					return false;	
			}
		if(selInstGrad=='0')
			{
					alert("Please select Institute ");
					
					return false;	
			}
				if(selUniversityGrad=='0')
			{
					alert("Please select University");
					
					return false;	
			}
				if(selMonthGrad=='0')
			{
					alert("Please select Month");
					
					return false;	
			}
				if(selYearGrad=='0')
			{
					alert("Please select Year");
					
					return false;	
			}
				if ( ( frm.radPerGrad[0].checked == false ) && ( frm.radPerGrad[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
				 if(isNaN(txtPerGrad))
					 {
						alert("Enter numeric value");
						
						return false;
					 }
		
		
	
			
			
			
			
	var x = parseFloat(txtPerGrad);	 	
						
						if(document.getElementById('radPerGrad').checked==true){
		
			
		if(txtPerGrad=null ||txtPerGrad=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
if (isNaN(x) || x < 0 || x > 100) 
	{
		alert("Please Enter Marks below 100");
		frm.txtPerGrad.focus();
		return false;
	}
			
			}
				if(document.getElementById('radPerGrad2').checked==true){
						
		if(txtPerGrad=null ||txtPerGrad=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
		
		if (isNaN(x) || x < 0 || x > 10) 
	{
		alert("Please Enter Marks below 10");
		frm.txtPerGrad.focus();
		return false;
	}
			
			}
		
	
}
function PGvalidation()
{
	
	var selCoursePG=document.forms['formPG']['selCoursePG'].value;
	
	var selStatePG=document.forms['formPG']['selStatePG'].value;
	var selInstPG=document.forms['formPG']['selInstPG'].value;
	var selUniversityPG=document.forms['formPG']['selUniversityPG'].value;
	var selMonthPG=document.forms['formPG']['selMonthPG'].value;
	var selYearPG=document.forms['formPG']['selYearPG'].value;
	var txtPerPG=document.forms['formPG']['txtPerPG'].value;	
	
	 if(selCoursePG=='0')
			{
					alert("Please select Course");
					
					return false;
			}
		
		
			
			if(selStatePG=='0')
			{
					alert("Please select State ");
					
					return false;	
			}
		if(selInstPG=='0')
			{
					alert("Please select Institute ");
					
					return false;	
			}
				if(selUniversityPG=='0')
			{
					alert("Please select University");
					
					return false;	
			}
				if(selMonthPG=='0')
			{
					alert("Please select Month");
					
					return false;	
			}
				if(selYearPG=='0')
			{
					alert("Please select Year");
					
					return false;	
			}
			 if(isNaN(txtPerPG))
					 {
						alert("Enter numeric value");
						
						return false;
					 }
       		var frm=document.formPG;
	var x = parseFloat(txtPerPG);	 	
		if ( ( frm.radPerPG[0].checked == false ) && ( frm.radPerPG[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
						
						if(document.getElementById('radPerPG').checked==true){
		
			
		if(txtPerPG=null ||txtPerPG=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
if (isNaN(x) || x < 0 || x > 100) 
	{
		alert("Please Enter Marks below 100");
		frm.txtPerPG.focus();
		return false;
	}
			
			}
				if(document.getElementById('radPerPG2').checked==true){
						
		if(txtPerPG=null ||txtPerPG=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
		
		if (isNaN(x) || x < 0 || x > 10) 
	{
		alert("Please Enter Marks below 10");
		frm.txtPerPG.focus();
		return false;
	}
			
		
	
			
	
}
}
function Othermorevalidation()
{
	
	var selCourseOthermore=document.forms['formOthermore']['selCourseOthermore'].value;

	var selStateOthermore=document.forms['formOthermore']['selStateOthermore'].value;
	var selInstOthermore=document.forms['formOthermore']['selInstOthermore'].value;
	var selUniversityOthermore=document.forms['formOthermore']['selUniversityOthermore'].value;
	var selMonthOthermore=document.forms['formOthermore']['selMonthOthermore'].value;
	var selYearOthermore=document.forms['formOthermore']['selYearOthermore'].value;
	var txtPerOthermore=document.forms['formOthermore']['txtPerOthermore'].value;	
	
	 if(selCourseOthermore=='0')
			{
					alert("Please select Course");
					
					return false;
			}
		
		
		
			if(selStateOthermore=='0')
			{
					alert("Please select State ");
					
					return false;	
			}
		if(selInstOthermore=='0')
			{
					alert("Please select Institute ");
					
					return false;	
			}
				if(selUniversityOthermore=='0')
			{
					alert("Please select University");
					
					return false;	
			}
				if(selMonthOthermore=='0')
			{
					alert("Please select Month");
					
					return false;	
			}
				if(selYearOthermore=='0')
			{
					alert("Please select Year");
					
					return false;	
			}
			 if(isNaN(txtPerOthermore))
					 {
						alert("Enter numeric value");
						
						return false;
					 }
			var frm=document.formOthermore;
	var x = parseFloat(txtPerOthermore);	
		if ( ( frm.radPerOthermore[0].checked == false ) && ( frm.radPerOthermore[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
						
						if(document.getElementById('radPerOthermore').checked==true){
		
			
		if(txtPerOthermore=null ||txtPerOthermore=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
if (isNaN(x) || x < 0 || x > 100) 
	{
		alert("Please Enter Marks below 100");
		frm.txtPerOthermore.focus();
		return false;
	}
			
			}
				if(document.getElementById('radPerOthermore2').checked==true){
						
		if(txtPerOthermore=null ||txtPerOthermore=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
		
		if (isNaN(x) || x < 0 || x > 10) 
	{
		alert("Please Enter Marks below 10");
		frm.txtPerOthermore.focus();
		return false;
	}
			
		
	
			
	
}
	
			
	
}
function Othervalidation()
{
	
	
	var selCourseOther=document.forms['formOther']['selCourseOther'].value;
	
	var selStateOther=document.forms['formOther']['selStateOther'].value;
	var selInstOther=document.forms['formOther']['selInstOther'].value;
	var selUniversityOther=document.forms['formOther']['selUniversityOther'].value;
	var selMonthOther=document.forms['formOther']['selMonthOther'].value;
	var selYearOther=document.forms['formOther']['selYearOther'].value;
	var txtPerOther=document.forms['formOther']['txtPerOther'].value;	


	
	 if(selCourseOther=='0')
			{
					alert("Please Select Course");
					
					return false;
			}
		
		
			if(selStateOther=='0')
			{
					alert("Please Select State ");
					
					return false;	
			}
		if(selInstOther=='0')
			{
					alert("Please Select Institute ");
					
					return false;	
			}
				if(selUniversityOther=='0')
			{
					alert("Please select University");
					
					return false;	
			}
				if(selMonthOther=='0')
			{
					alert("Please select Month");
					
					return false;	
			}
				if(selYearOther=='0')
			{
					alert("Please select Year");
					
					return false;	
			}
			 if(isNaN(txtPerOther))
					 {
						alert("Please numeric value");
						
						return false;
					 }
			
	
	var frm=document.formOther;
	var x = parseFloat(txtPerOther);	
		if ( ( frm.radPerOther[0].checked == false ) && ( frm.radPerOther[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
						
	if(document.getElementById('radPerOther').checked==true)
	{
		
			
		if(txtPerOther=null ||txtPerOther=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
		if (isNaN(x) || x < 0 || x > 100) 
		{
		alert("Please Enter Marks below 100");
		frm.txtPerOther.focus();
		return false;
		}
			
	}
	if(document.getElementById('radPerOther2').checked==true)
	{
						
		if(txtPerOther=null ||txtPerOther=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
		
		if (isNaN(x) || x < 0 || x > 10) 
		{
		alert("Please Enter Marks below 10");
		frm.txtPerOther.focus();
		return false;
		}
			
		
	}
			
	
}


function instGrad(id){
if(id=='-1'){
document.getElementById('divGradtext').style.display='block';
}else{
document.getElementById('divGradtext').style.display='none';
}

}
function instPG(id){
if(id=='-1'){
document.getElementById('divPGtext').style.display='block';
}else{
document.getElementById('divPGtext').style.display='none';
}

}

function instOther(di,id){
if(di=='-1'){
document.getElementById('divOthertext'+id).style.display='block';
}else{
document.getElementById('divOthertext'+id).style.display='none';
}

}

function clearCont(cont){

if(cont=='Enter RV-VLSI UID'){
//alert(cont);
document.getElementById('Rvstudent').value='';
}
}
</script>
</head>

<body>
<div class="main_div">
<? include "includes/header.php" ?>
<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0"/>
</div><!--end of main_banner-->
<div class="main_content">

<div class="stmenuright_maincontent">

<!--<div class="rightimg_top">
<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Resume Builder</h3>
</div>
<div class="rightimg_right">
</div>
</div>--><!--end of rightimg_top-->

 <div class="rightinner_content_inner" >
<div class="step-main-Div">
<div class="recruit_inner">
       <ul>
       
      <a href="personal_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Personal Information</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
       
        <a href="educations_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Academic Qualification</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
	    <a href="academic_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Academic Projects </div>
       <div class="nanohdrightdefault"></div>
       </li></a>
	   
	    <a href="work_info.php" style="text-decoration:none;"><li>
       <div class="nanohdleftdefault"></div>
       <div class="nanohdmiddefault">Work Experience</div>
       <div class="nanohdrightdefault"></div>
       </li></a>
	   <li>
       <div class="nanohdleft"></div>
       <div class="nanohdmid"><img src="images/career_details.png" width="127" height="32" align="absmiddle" border="0" style=" margin-top:8px;" /></div>
       <div class="nanohdright"></div>
       </li>
	   
      
	 
       </ul>
      
     
       

</div>
<div style="float:left; ">
<div class="step-inner-Div" style=" float:left; width:723px; background-image:url(images/innertab_bg.png); background-position:bottom; background-repeat:repeat-x;" >

<div class="step-sub-tabs" style="margin-top:30px;" >
<div class="innertab1_mid" style="width:250px;">Career Information and Achievements</div>
<div class="innertab1_right"></div>
</div>

<div class="step-sub-tabs" style="float:right;margin-top:30px;">
<div class="innertab1_left"></div>
<div class="innertab1_mid">Resume Builder:Steps - 5/5</div>
</div>


<div class="step-sub2-Div">
<span style=" line-height:20px;"><input type="checkbox" name="chkRoll" id="chkRoll" onClick="checkingRoll();" value="1"  <? if($members_result[0]->m_student!='' &&$members_result[0]->m_student!='NULL') echo 'checked="checked"'; ?> ></span>
<span style="color:#114981; font-weight:bold; font-size:14px;"> Click if you are a student of RV-VLSI</span>
<span id="addSubscriptionHidden" <? if($members_result[0]->m_student!='' &&$members_result[0]->m_student!='NULL') echo 'style="display:block"'; else echo 'style="display:none"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT TYPE="text"   BORDER="0" onblur="return checkID(this.value); " value="<? if($members_result[0]->m_student!='' && $members_result[0]->m_student!='NULL') echo stripcslashes($members_result[0]->m_student); else echo 'Enter RV-VLSI UID'?>" name="Rvstudent" id="Rvstudent" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x; margin-top:8px;" onclick="return clearCont(this.value);" ></span>
</div>

<div class="step-sub-tabs" style="margin-top:20px;">
<div class="innertab1_mid">Career Objective</div>
<div class="innertab1_right"></div>
</div>
<div class="step-sub2-Div">
<!--<span style="float:right;"  class="addnewbg"><a href="#" onclick="addTextarea('text'); return false;"><img src="images/addnewbg.png" width="83" height="22" border="0" /></a></span>-->
<? $career_results_query=$db->getResults("select * FROM $career_objective_table where m_id='".$_SESSION[m_id]."'"); ?>
<form name="careerForm" id="careerForm" method="post" action="" onsubmit="return careerobjvalidation();">
<div>
<? 
/*
$career_results=explode("#",$career_results_query[0]->co_objective);
if(count($career_results_query)!=0){
for($c=0;$c<count($career_results);$c++){
if($career_results[$c]!=''){*/
  foreach($career_results_query as $member_s){}
?>
<textarea name="txtCareer" id="txtCareer" class="textareaBox" style="width:550px;height:40px; margin:5px;"><?=$member_s->co_objective?></textarea>
<!--<input type="text" class="textareaBox" name="txtCareer" id="txtCareer" value="<?=$member_s->co_objective?>" />--><span><font color="#FF0000" style=" margin-left:5px;">*</font></span>
<? // }}}else{?>
<!--<input type="text" class="textareaBox" name="txtCareer[]" id="txtCareer"  />-->
<? // }?>
<div id="newTexts"> </div>
<input type="submit" name="careerSubmit" value="" class="button_new"/><span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;">Save this section before filling up next.</span>
</div>
</form>
</div>
<div class="step-sub-tabs" style="margin-top:20px;">
<div class="innertab1_mid">Core Competency Details</div>
<div class="innertab1_right"></div>
</div>
<div class="step-sub2-Div">
<form name="foreCore" id="foreCore" method="post" action="">
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  
        <?  
      $core_obj_result=$db->getResults("SELECT * FROM $core_competecny_table where m_id='".$_SESSION[m_id]."' order by cc_id desc"); 
	  $core_array=explode(",",$core_obj_result[0]->cc_array);
?>
  
  <tr>
      <td align="left" colspan="3"  class="error1">&nbsp;</td>
	  <td width="1" align="left"  class="heading1">&nbsp; </td>
   </tr>
   	
   <tr>
      <td width="27" ><input type="checkbox"  name="chkCareer[]" value="1" <?=in_array('1',$core_array)?'checked':'';?> /></td>
    <td  height="" width="1091"><span>Good understanding of fundamentals of Transistors and circuit theory</span> </td>
	</tr>   
	
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" value="2" <?=in_array('2',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Good knowledge of Verilog RTL coding</span> </td>  
	</tr>   
	<tr>
	  <td><input type="checkbox" name="chkCareer[]" value="3" <?=in_array('3',$core_array)?'checked':'';?> /></td>
    <td  height=""><span>Good knowledge of Digital Design Concepts</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" value="4" <?=in_array('4',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Good exposure to technology by undergoing additional training in VLSI and/or Embedded</span>  </td>  
	</tr>   
	<tr>  <td><input type="checkbox" name="chkCareer[]" value="5" <?=in_array('5',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Implemented a VLSI and/or embedded project during my undergrad/post grad</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" value="6" <?=in_array('6',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Attended technology intensive courses conducted by industry experts on VLSI and Embedded domains</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" value="7" <?=in_array('7',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Excellent knowledge of IC Fabrication process</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" value="8" <?=in_array('8',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Good working knowledge of Linux, and C programming</span>  </td>  
	</tr>   
	<? $othcore=explode("#",$core_obj_result[0]->cc_other);
	
	if(count($othcore)!=0 && $core_obj_result[0]->cc_other!=''){
	for($c=0;$c<count($othcore);$c++){
	
	if($othcore[$c]!=''){?>
    <tr>
      <td height="" colspan="2"><input type="text" class="textareaBox" name="txtCore[]" id="txtCore" value="<?=stripslashes($othcore[$c])?>" /></td>
      </tr>
	<? }}}?>
    <tr>
      <td>&nbsp;</td>
      <td  height="" align="right"> <span style="float:right;"  class="addnewbg"><a href="#" onclick="addcoreTextarea('text'); return false;"><img src="images/addnewbg.png" width="83" height="22" border="0"/></a></span></td>  
	</tr>   
 <tr>
      
    <td colspan="2" ><div id="newCoreTexts"> </div></td>  
	</tr> <tr>
      
    <td colspan="2" ><input type="submit" name="CoreSubmit" value="" class="button_new"/> <span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;">Save this section before filling up next.</span></td>  
	</tr>
</table>
</form>
</div>

<div class="step-sub-tabs" style="margin-top:20px;">
<div class="innertab1_mid">Achievements Details</div>
<div class="innertab1_right"></div>
</div>
<div class="step-sub2-Div">
<span style="float:right;"  class="addnewbg"><a href="#" onclick="addsecondTextarea('text'); return false;"><img src="images/addnewbg.png" width="83" height="22" border="0"/></a></span>
<? $achiv_results_query=$db->getResults("select * FROM $achievements_table where m_id='".$_SESSION[m_id]."'"); ?>
<form name="archForm" id="archForm" method="post" action=""   onsubmit="return achievementvalidation();">
<div>
<? 
if(count($achiv_results_query)!=0){
$achiv_results=explode("#",$achiv_results_query[0]->ac_description);
for($a=0;$a<count($achiv_results);$a++){
if($achiv_results[$a]!=''){
?>
<input type="text" class="textareaBox" name="txtAchiv[]" id="txtCareer" value="<?=$achiv_results[$a]?>" /><span><font color="#FF0000" style=" margin-left:5px;">*</font></span>
<? }}}else{?>
<input type="text" class="textareaBox" name="txtAchiv[]" id="txtCareer" />
<? }?>
<div id="newsecTexts"> </div>
<input type="submit" name="achivSubmit" value="" class="button_new"/> <span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;">Save this section before filling up next.</span>
</div>
</form>

</div>
<table width="100%" cellpadding="3" cellspacing="3" border="0"><tr><td align="right"><a href="show_emp.php"><img src="images/submitnviewbg.png" border="0" /></a></td></tr></table>


</div>
</div>
</div>






</div><!--end of right_maincontent-->

</div><!--end of main_content-->
<?php include "stmenuleft_content.php"; ?>
<? include "includes/footer.php" ?>

</div><!--end of main_div-->

</body>
</html>