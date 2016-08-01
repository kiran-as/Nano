// JavaScript Document
//JavaScript Document for ajax function call in mihirafamily.com********************************************

//***************This javascript functions are build and devoloped by kaivalyasoftware Pvt Ltd.*********
//****************Banglore**************************kaivalyasoftware.com********************************
//****************India********************************************************************************
//****************All Rights reserved.*****************************************************************

function getxmlhttpobject()
{
	var xmlhttp=null;
	try
	{
		// for opera, safari, firefox
		xmlhttp=new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlhttp;
}

var xmlhttp;

function nextQuestion(id,order)
{

//alert(order);
xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="./ajax_questions.php";
	url=url+"?id="+id+"&order="+order;
	//alert(url);
	xmlhttp.onreadystatechange=nextQuestionResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function nextQuestionResult()
{
	
	
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
	//alert(xmlhttp.responseText);
	//display(start, document.getElementById("countdown"));
	displayTime();
		document.getElementById('Question').innerHTML=xmlhttp.responseText;
		//document.getElementById("imagePreview").src="../uploaded/articleImages/thumbs/"+xmlhttp.responseText;
	}
}
function insertAnswers(q_id,ans,cans)
{

//alert(cans);
xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="./ajax_update_answers.php";
	url=url+"?q_id="+q_id+"&ans="+ans+"&cans="+cans;
//	alert(url);
	xmlhttp.onreadystatechange=insertAnswersResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}
function insertAnswersResult()
{
	
	
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
	//alert(xmlhttp.responseText);
		document.getElementById('Question').innerHTML=xmlhttp.responseText;
		//document.getElementById("imagePreview").src="../uploaded/articleImages/thumbs/"+xmlhttp.responseText;
	}
}


function prevQuestion(id,order)
{

	//alert(order);
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="./ajax_questions.php";
	url=url+"?id="+id+"&order="+order;
	//alert(url);
	xmlhttp.onreadystatechange=prevQuestionResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function prevQuestionResult()
{
	
	
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
	//alert(xmlhttp.responseText);
		document.getElementById('Question').innerHTML=xmlhttp.responseText;
		//document.getElementById("imagePreview").src="../uploaded/articleImages/thumbs/"+xmlhttp.responseText;
	}
}


function malliQualification(id)
{

	alert("dfjlhkb");
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="ajax_pages.php";
	url=url+"?id="+id;
	//alert(url);
	xmlhttp.onreadystatechange=malliQualificationResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function malliQualificationResult()
{
	
	
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
	//alert(xmlhttp.responseText);
		document.getElementById('malli_div').innerHTML=xmlhttp.responseText;
		//document.getElementById("imagePreview").src="../uploaded/articleImages/thumbs/"+xmlhttp.responseText;
	}
}
/*srihari added for work Exp Project*/
function workexp(id)
{

	//alert("dfjlhkb");
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="ajax_project.php";
	url=url+"?id="+id;
	//alert(url);
	xmlhttp.onreadystatechange=wordExpResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function wordExpResult()
{
	
	
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
	//alert(xmlhttp.responseText);
		document.getElementById('wep_div').innerHTML=xmlhttp.responseText;
		//document.getElementById("imagePreview").src="../uploaded/articleImages/thumbs/"+xmlhttp.responseText;
	}
}


function workExpInsert(we_id,title,desc,role,team,tool,chal)
{

	//alert("dfjlhkb");
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="projects_insert.php";
	url=url+"we_id="+we_id+"&title="+title+"&desc="+desc+"&role="+role+"team="+team+"&tool="+tool+"&chal="+chal;
	alert(url);
	xmlhttp.onreadystatechange=workExpInsertResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function workExpInsertResult()
{
	
		if(xmlhttp.readyState==0 || xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3 )
	{
	document.getElementById("imagePreview").src="../images/loading.gif";	
		}
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
		
		document.getElementById('work_exp_update').innerHTML=xmlhttp.responseText;
		
	}
}
//added By Srihari For rv vlsi student update
function rvupdate()
{

	//alert("dfjlhkb");
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="ajax/rv_update.php";
	//url=url+"?id="+id;
	//alert(url);
	xmlhttp.onreadystatechange=rvupdateResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function rvupdateResult()
{
	
		if(xmlhttp.readyState==0 || xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3 )
	{
	//document.getElementById("imagePreview").src="../images/loading.gif";	
		}
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
	//	alert(xmlhttp.responseText);
	//	document.getElementById('work_exp_update').innerHTML=xmlhttp.responseText;
		
	}
}




function checkID(id)
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
alert("This UID Allotted for Someone. Kindly check your UID again, or get in touch with RV-VLSI Admin for any assistance.");
			document.getElementById("Rvstudent").innerHTML="Student ID";	
				}
    }
  }

xmlhttp.open("GET","ajax/ajax_checkID.php?id="+id,true);
xmlhttp.send();
}
