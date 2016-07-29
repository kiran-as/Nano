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
  if(isset($_POST['txtCareer'])){
  
   
  
 $db->getResults("delete FROM $career_objective_table where m_id='".$_SESSION[m_id]."'"); 
  
//  $careers=implode("#",$_POST['txtCareer']);
   $careers=$_POST['txtCareer'];
 // die($careers);
  	$db->insertRecord("insert into  $career_objective_table  set co_objective = '".$ch->checkFields($careers)."',m_id='".$_SESSION[m_id]."'");
  
 header("Location:1_resume.php");
  }
  
  
  if(isset($_POST['txtAchiv'])){
  
 $db->getResults("delete FROM $achievements_table where m_id='".$_SESSION[m_id]."'"); 
  
  $archi=implode("#",$_POST['txtAchiv']);
 //die("insert into  $achievements_table  set ac_description = '".$ch->checkFields($archi)."',m_id='".$_SESSION[m_id]."'");
  	$db->insertRecord("insert into  $achievements_table  set ac_description = '".$ch->checkFields($archi)."',m_id='".$_SESSION[m_id]."'");
  
  header("Location:1_resume.php");
  }


  
 

	
if(isset($_POST['chkCareer'])){	
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
		  header("Location:1_resume.php");
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
<link href="css/style.css" rel="stylesheet" type="text/css" />
  



	 
	
	<link rel="stylesheet" href="css/styleupdated.css" type="text/css" media="screen" />
 <script type="text/javascript">
function redirecttopersonalinfo()
{
	window.location="http://nanochipsolutions.com/1_personal_info.php";
}
 function disclaimerfunction()
 {
	 if(document.getElementById('disclaimer').checked==true){
		 document.getElementById('achivSubmit').style.display='block';
		 document.getElementById('hiddenachiv').style.display='none';
	 }
	 if(document.getElementById('disclaimer').checked==false){
		 document.getElementById('achivSubmit').style.display='none';
		 document.getElementById('hiddenachiv').style.display='block';
	 }
 }
		function checkingRoll(){


			if(document.getElementById('chkRoll').checked==true){
			document.getElementById('addSubscriptionHidden').style.display='block';
			 for(i=1;i<9;i++)
			 {
			 	document.getElementById('chkCareer'+i).checked=true;
			    
			 }  
			}
			else
			{
			document.getElementById('addSubscriptionHidden').style.display='none';
			 for(i=1;i<9;i++)
			 {
			 	document.getElementById('chkCareer'+i).checked=false;
			    
			 } 
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


function fnvalidatess()
{
	//alert('aaaaaaaa');
	flag = true;
	if(document.getElementById('chkRoll').checked == true)
	{
		//alert('asdf');
		//alert(document.getElementById('Rvstudent').value);
		if(document.getElementById('Rvstudent').value == 'Enter RV-VLSI UID')
		{
			alert('Please Enter RV-VLSI UID'); 
			flag = false;
		}
		else
		{
			var id = document.getElementById('Rvstudent').value;
			 checkID(id)
		}
	}
   return flag;
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
<script language="javascript">
function approvedisclaimer()
{
alert("Approve the terms and conditions");
//document.forms["careerinfo"].submit();
//var txtCareer=document.forms['careerForm']['txtCareer'].value;

}
</script>
</head>

<body onload='disclaimerfunction();'>
<div class="main_div">
<?php include("includes/2_jobseekerheader.php"); ?>
<form action="1_career_info.php" method="POST" name="careerinfo" id="careerinfo" onsubmit="return fnvalidatess();">
<div class="main_banner">
<!--<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />-->
</div><!--end of main_banner-->
<div class="main_content">
<ul id="menu">
   <li><a href="1_personal_info.php" title="Personal Information">Personal Information</a></li>
   <li><a href="1_educations_info.php" title="Academic Qualification">Academic Qualification</a></li>

      <li><a href="1_academic_info.php" title="Academic Projects">Academic Projects</a></li>
	     <li><a href="2_work_info.php" title="Work Experience">Work Experience</a></li>
		    <li><a href="1_career_info.php" title="Career Details"       class="current">Career Details</a></li>
   
</ul>
<div class="ContentDiv">
<div class="navContainer"></div>

<div class="workexperiencecontainer">
<span style=" line-height:20px;"><input type="checkbox" name="chkRoll" id="chkRoll" onClick="checkingRoll();" value="1"  <? if($members_result[0]->m_student!='' &&$members_result[0]->m_student!='NULL') echo 'checked="checked"'; ?> ></span>
<span style="color:#114981; font-weight:bold; font-size:14px;"> Click if you are a student of RV-VLSI</span>
<span id="addSubscriptionHidden" <? if($members_result[0]->m_student!='' &&$members_result[0]->m_student!='NULL') echo 'style="display:block"'; else echo 'style="display:none"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT TYPE="text"   BORDER="0" onblur="return checkID(this.value); " value="<? if($members_result[0]->m_student!='' && $members_result[0]->m_student!='NULL') echo stripcslashes($members_result[0]->m_student); else echo 'Enter RV-VLSI UID'?>" name="Rvstudent" id="Rvstudent" style="width:200px; height:20px; border:1px solid #999; background-image:url(images/innertab_text.png); background-repeat:repeat-x; margin-top:8px;" onclick="return clearCont(this.value);" ></span>

</div>


<div class="workexperiencecontainer">
<!--kiran <form name="foreCore" id="foreCore" method="post" action="">-->
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  
  <tr><td colspan="2" class="subheadersinworkexperience">Core Competency Details</td></tr>
        <?  
      $core_obj_result=$db->getResults("SELECT * FROM $core_competecny_table where m_id='".$_SESSION[m_id]."' order by cc_id desc"); 
	  $core_array=explode(",",$core_obj_result[0]->cc_array);
?>
  
  <tr>
      <td align="left" colspan="3"  class="error1">&nbsp;</td>
	  <td width="1" align="left"  class="heading1">&nbsp; </td>
   </tr>
   	
   <tr>
      <td width="27" ><input type="checkbox" id="chkCareer1" name="chkCareer[]" value="1" <?=in_array('1',$core_array)?'checked':'';?> /></td>
    <td  height="" width="1091"><span>Good understanding of fundamentals of Transistors and circuit theory</span> </td>
	</tr>   
	
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" id="chkCareer2"  value="2" <?=in_array('2',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Good knowledge of Verilog RTL coding</span> </td>  
	</tr>   
	<tr>
	  <td><input type="checkbox" name="chkCareer[]" id="chkCareer3" value="3" <?=in_array('3',$core_array)?'checked':'';?> /></td>
    <td  height=""><span>Good knowledge of Digital Design Concepts</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" id="chkCareer4" value="4" <?=in_array('4',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Good exposure to technology by undergoing additional training in VLSI and/or Embedded</span>  </td>  
	</tr>   
	<tr>  <td><input type="checkbox" name="chkCareer[]" id="chkCareer5" value="5" <?=in_array('5',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Implemented a VLSI and/or embedded project during my undergrad/post grad</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" id="chkCareer6"  value="6" <?=in_array('6',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Attended technology intensive courses conducted by industry experts on VLSI and Embedded domains</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" id="chkCareer7" value="7" <?=in_array('7',$core_array)?'checked':'';?> /></td>
    <td  height="" ><span>Excellent knowledge of IC Fabrication process</span>  </td>  
	</tr>   
	<tr>
	  <td ><input type="checkbox" name="chkCareer[]" id="chkCareer8" value="8" <?=in_array('8',$core_array)?'checked':'';?> /></td>
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
     
      <td  height=""  colspan="2"><img src="images/pixel_transparent.gif" width="550" height="1"><span ><a href="#" onclick="addcoreTextarea('text'); return false;"><img src="images/addmorebtn.png" width="110" height="33" border="0"/></a></span></td>  
	</tr>   
 <tr>
      
    <td colspan="2" ><div id="newCoreTexts"> </div></td>  
	</tr> <tr>
      
    <td colspan="2" ><span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;"> </span></td>  
	</tr>
</table>
<!--kiran</form>-->
</div>


<div class="workexperiencecontainer">
<table><tr><td colspan="2" class="subheadersinworkexperience">Career Objective</td></tr></table></br>
<!--<span style="float:right;"  class="addnewbg"><a href="#" onclick="addTextarea('text'); return false;"><img src="images/addnewbg.png" width="83" height="22" border="0" /></a></span>-->
<? $career_results_query=$db->getResults("select * FROM $career_objective_table where m_id='".$_SESSION[m_id]."'"); ?>
<!-- kiran <form name="careerForm" id="careerForm" method="post" action="" onsubmit="return careerobjvalidation();">-->
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
<span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000; padding-left:30px;"> </span>
</div>
<!-- kiran </form>-->
</div>





<div class="workexperiencecontainer">
<table><tr><td colspan="2" class="subheadersinworkexperience">Achievements Details</td></tr></table></br>
<img src="images/pixel_transparent.gif" width="550" height="1"><span  class="addnewbg"><a href="#" onclick="addsecondTextarea('text'); return false;"><img src="images/addmorebtn.png" width="110" height="33" border="0"/></a></span>
<? $achiv_results_query=$db->getResults("select * FROM $achievements_table where m_id='".$_SESSION[m_id]."'"); ?>
<!--kiran<form name="archForm" id="archForm" method="post" action=""   onsubmit="return achievementvalidation();">-->
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
<div id="newsecTexts" align='left'> 
 <span style="font-size:11px; font-family:Trebuchet MS; color:#FF0000;"> </span>
</div>
</div>
<!--kiran</form>-->


<!--<table width="100%" cellpadding="3" cellspacing="3" border="0"><tr><td align="right"><a href="1_resume.php"><img src="images/submitnviewbg.png" border="0" /></a></td></tr></table>-->

</div>
 <table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td class="disclaimerinfo"><input type="checkbox" name='disclaimer' id='disclaimer' onclick='disclaimerfunction()'>Information provided by me while building this resume is correct and complete to the best of my knowledge. I understand that RV-VLSI is not responsible for any &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;incorrect information provided by me and the recruiter has the right to reject my resume if it is found to contain false information. </td><td nowrap="nowrap">
 <table><tr><td><input type="submit" id='achivSubmit' name="achivSubmit" value="Preview" class="blueButton"/></td><td><input type="button" name="hiddenachiv" value="Preview" id='hiddenachiv' label="Preview" class="grayButton" onclick="approvedisclaimer();"></td><td> <input type="button" id='cancelinfo' name="cancelinfo" value="Cancel" class="grayButton" onclick='redirecttopersonalinfo();'/></td></tr></table>
</td></tr></table>
</div>




	

  
  
  </div>
 
<? include "includes/footer.php" ?>
</div>




</div><!--end of right_maincontent-->

</div>
</div><!--end of main_content-->




</div><!--end of main_div-->

</form>
</body>
</html>