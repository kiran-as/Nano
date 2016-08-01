/********************start of prototype***********************************************/

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

function input(cid)
	{

	var url="ajax_course.php";
	url=url+"?arg1="+cid;
	xmlhttp=getxmlhttpobject();
	xmlhttp.onreadystatechange=output;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);	
	}
	
function output()
{
		
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
	{
	document.getElementById('course_div').innerHTML=xmlhttp.responseText;

	}
}