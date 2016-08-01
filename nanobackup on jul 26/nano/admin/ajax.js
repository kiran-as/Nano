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

function SelectState(str)
{
	
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="ajax_states.php";
	url=url+"?country_id="+str;
	//alert(url);
	xmlhttp.onreadystatechange=SelectStateResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}


function SelectStateResult()
{
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
		
	//alert(xmlhttp.responseText);
		document.getElementById('SatesData').innerHTML=xmlhttp.responseText;
	
	}
}
function Selectcourse(str)
{
	
	xmlhttp=getxmlhttpobject();
	if(xmlhttp==null)
	{
		alert("browser doesn't support HTTP request");
	    return;
	}
	var url="../ajax_course.php";
	url=url+"?t_id="+str;
	//alert(url);
	xmlhttp.onreadystatechange=SelectcourseResult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function SelectcourseResult()
{
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
		
	//alert(xmlhttp.responseText);
		document.getElementById('CourseData').innerHTML=xmlhttp.responseText;
	
	}
}

