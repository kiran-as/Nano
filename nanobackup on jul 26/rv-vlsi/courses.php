<?php
include("application/conn.php");
include('detect.php');
$resultsss = "SELECT * FROM tbl_programs where Programtype=1 and Active=1 order by Orderforaltera";

	$resultc = mysql_query($resultsss);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $rvvlsicourses[$s]["idprograms"]	= $row["idprograms"];
		  $rvvlsicourses[$s]["Description"]	= $row["Description"];
		   $rvvlsicourses[$s]["Title"]	= $row["Title"];
		   		   $rvvlsicourses[$s]["Description"]	= $row["Description"];
		   
		  $s++;  
		}
		
		
$resultsss = "SELECT * FROM tbl_programs where Programtype=0 and Active=1 and AlteraCategory=1";

	$resultc = mysql_query($resultsss);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $alteraonecourses[$s]["idprograms"]	= $row["idprograms"];
		  $alteraonecourses[$s]["Description"]	= $row["Description"];
		   $alteraonecourses[$s]["Title"]	= $row["Title"];

		  $s++;  
		}
	
		
$resultsss = "SELECT * FROM tbl_programs where Programtype=0 and Active=1 and AlteraCategory=2";

	$resultc = mysql_query($resultsss);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $alteratwocourses[$s]["idprograms"]	= $row["idprograms"];
		  $alteratwocourses[$s]["Description"]	= $row["Description"];
		   $alteratwocourses[$s]["Title"]	= $row["Title"];
		  $s++;  
		}
	
$resultsss = "SELECT * FROM tbl_programs where Programtype=0 and Active=1 and AlteraCategory=3";

	$resultc = mysql_query($resultsss);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $alterathreecourses[$s]["idprograms"]	= $row["idprograms"];
		  $alterathreecourses[$s]["Description"]	= $row["Description"];
		   $alterathreecourses[$s]["Title"]	= $row["Title"];
		  $s++;  
		}
		

 
 

//$select = "select * from tbl_programcalendar where idprograms in (select idprograms from tbl_programs where Programtype=1) and active=1";
$select ="SELECT * , DATE_FORMAT( startdate, '%D %M %Y' ) AS stdate
FROM tbl_programcalendar
WHERE idprograms
IN (

SELECT idprograms
FROM tbl_programs
WHERE Programtype =1
)
AND active =1 order by Startyear,stdate";
$resultprogramsdetails = mysql_query($select);
	
	$k=0;
	while ($row = mysql_fetch_assoc($resultprogramsdetails)) {
		  $arrprogramdetails[$k]["idprograms"]	= $row["idprograms"];
		  	  $arrprogramdetails[$k]["idprogramcalendar"]	= $row["idprogramcalendar"];
		  $arrprogramdetails[$k]["startmonth"]	= $row["startmonth"].''.$row["startweek"].','.$row["Startyear"].'-'.$row["endmonth"].''.$row["endweek"].','.$row["Endyear"];
		  if($arrprogramdetails[$k]["startmonth"]=='Jan1st Week,2015-Jan2nd Week,2015')
		   $arrprogramdetails[$k]["startmonth"]="Register for next batch";
		  $k++;  
		}		
?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
<meta name="description" content=" Best VLSI & Embedded Systems Training institutes of India, located in Bangalore with students placed in 127 companies & top universities globally">
  
    <title>World class Embedded systems and VLSI Skill development center with Alumni in 250+ companies in India and Abroad.</title>
	   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	   <link rel="shortcut icon" href="images/favicon.png" />
	  
	  	  
	   <!-- scripts links -->
	   
	   
		
	    <script type="text/javascript" src="js/jquery.min.js"></script>
	   <script type="text/javascript" src="js/classie.js"></script>
	   <script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		
		<!-- Bottom TAb pannel (Video) -->
	
	
		<!-- bxSlider Javascript file -->
		<style>
		a:link  {color:#000000; background-color:transparent}
a:visited {color:#000000; background-color:transparent}
a:hover   {color:#f589aa; background-color:transparent}
a:active  {color:#f589aa; background-color:transparent}
		</style>
<script src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript">
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 300,
                header = document.querySelector(".nvgtn");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                }
            }
        });
    }
    window.onload = init();
</script>
<script type="text/javascript">
	$(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
	</script>
<script type="text/javascript">


function validation()
	{
		 
		 var name=document.getElementById('cont_name');
         var email=document.getElementById('cont_email');
         var phone=document.getElementById('cont_mobile');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		alert('alertone');
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}  

function validation2()
	{
		 
		 var name=document.getElementById('cont_name2');
         var email=document.getElementById('cont_email2');
         var phone=document.getElementById('cont_mobile2');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		alert('altera2');
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}  

function validation1(id)
	{
		 
		 var name=document.getElementById('cont_name'+id);
         var email=document.getElementById('cont_email'+id);
         var phone=document.getElementById('cont_mobile'+id);
		 var course=document.getElementById('cont_course'+id);
		 
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		var flag=0;
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
						flag=1;
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
							flag=1;
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
						flag=1;
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
						 flag=1;
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
						flag=1;
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
							flag=1;
                            return false;
                        }
                    }
		if(flag==0)
{		
        formData = "cont_name1="+name+"&cont_email1="+email+"&cont_mobile1="+phone+"&cont_email1="+email+"&course_name1="+course;
				$.ajax({
				url : "courseformmailer1.php",
				type: "POST",
				data : formData,
				success: function(data, textStatus, jqXHR)
				{
					
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
			 
				}
			});
		}
	}  


function validation3()
	{
		 
		 var name=document.getElementById('cont_name3');
         var email=document.getElementById('cont_email3');
         var phone=document.getElementById('cont_mobile3');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		////alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}  	

function validation991()
	{
		 
		 var name=document.getElementById('cont_name991');
         var email=document.getElementById('cont_email991');
         var phone=document.getElementById('cont_mobile991');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}  	

function validation992()
	{
		 
		 var name=document.getElementById('cont_name992');
         var email=document.getElementById('cont_email992');
         var phone=document.getElementById('cont_mobile992');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}  	

function validation993()
	{
		 
		 var name=document.getElementById('cont_name993');
         var email=document.getElementById('cont_email993');
         var phone=document.getElementById('cont_mobile993');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}  	

function validation994()
	{
		 
		 var name=document.getElementById('cont_name994');
         var email=document.getElementById('cont_email994');
         var phone=document.getElementById('cont_mobile994');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		////alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}  	

function validation995()
	{
		 
		 var name=document.getElementById('cont_name995');
         var email=document.getElementById('cont_email995');
         var phone=document.getElementById('cont_mobile995');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}  	

function validation996()
	{
		 
		 var name=document.getElementById('cont_name996');
         var email=document.getElementById('cont_email996');
         var phone=document.getElementById('cont_mobile996');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		////////alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}  	

function validation999()
	{
		 
		 var name=document.getElementById('cont_name999');
         var email=document.getElementById('cont_email999');
         var phone=document.getElementById('cont_mobile999');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}  	




function validation42()
	{
		 
		 var name=document.getElementById('cont_name42');
         var email=document.getElementById('cont_email42');
         var phone=document.getElementById('cont_mobile42');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}



function validation43()
	{
		 
		 var name=document.getElementById('cont_name43');
         var email=document.getElementById('cont_email43');
         var phone=document.getElementById('cont_mobile43');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}



function validation29()
	{
		 
		 var name=document.getElementById('cont_name29');
         var email=document.getElementById('cont_email29');
         var phone=document.getElementById('cont_mobile29');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}



function validation28()
	{
		 
		 var name=document.getElementById('cont_name28');
         var email=document.getElementById('cont_email28');
         var phone=document.getElementById('cont_mobile28');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}



function validation41()
	{
		 
		 var name=document.getElementById('cont_name41');
         var email=document.getElementById('cont_email41');
         var phone=document.getElementById('cont_mobile41');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}



function validation31()
	{
		 
		 var name=document.getElementById('cont_name31');
         var email=document.getElementById('cont_email31');
         var phone=document.getElementById('cont_mobile31');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}



function validation32()
	{
		 
		 var name=document.getElementById('cont_name32');
         var email=document.getElementById('cont_email32');
         var phone=document.getElementById('cont_mobile32');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}



function validation33()
	{
		 
		 var name=document.getElementById('cont_name33');
         var email=document.getElementById('cont_email33');
         var phone=document.getElementById('cont_mobile33');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}



function validation34()
	{
		 
		 var name=document.getElementById('cont_name34');
         var email=document.getElementById('cont_email34');
         var phone=document.getElementById('cont_mobile34');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}



function validation35()
	{
		 
		 var name=document.getElementById('cont_name35');
         var email=document.getElementById('cont_email35');
         var phone=document.getElementById('cont_mobile35');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}


function validation36()
	{
		 
		 var name=document.getElementById('cont_name36');
         var email=document.getElementById('cont_email36');
         var phone=document.getElementById('cont_mobile36');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}


function validation37()
	{
		 
		 var name=document.getElementById('cont_name37');
         var email=document.getElementById('cont_email37');
         var phone=document.getElementById('cont_mobile37');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}


function validation38()
	{
		 
		 var name=document.getElementById('cont_name38');
         var email=document.getElementById('cont_email38');
         var phone=document.getElementById('cont_mobile38');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}


function validation991()
	{
		 
		 var name=document.getElementById('cont_name991');
         var email=document.getElementById('cont_email991');
         var phone=document.getElementById('cont_mobile991');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}



function validation8()
	{
		 
		 var name=document.getElementById('cont_name8');
         var email=document.getElementById('cont_email8');
         var phone=document.getElementById('cont_mobile8');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}

	


function validation10()
	{
		 
		 var name=document.getElementById('cont_name10');
         var email=document.getElementById('cont_email10');
         var phone=document.getElementById('cont_mobile10');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}

	


function validation11()
	{
		 
		 var name=document.getElementById('cont_name11');
         var email=document.getElementById('cont_email11');
         var phone=document.getElementById('cont_mobile11');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		//alert(name);
		 if(name.value.trim()== '')   
                        {
							 
							
                        alert("Please enter your name.");
                        name.focus();
                        return false;
                        }
						else  if(name.value.trim()!= '')
                    {
                        var namenal=name.value.trim();
                        var nameregexp=/^[a-zA-Z ]*$/i;
                        if(!nameregexp.test(namenal))
                        {
                            alert("This is not a valid Name! Only alphabets are accepted");
                            name.focus();
                            return false
                        }
                    }


	if(phone.value.trim()== '')
                    {
                        alert("Please enter your Mobile Number.");
                        phone.focus();
                        return false;
                    }
					if(!isValidPhone(phone.value.trim()))
                    {
                         alert("Please enter valid Mobile Number.");
                         phone.focus();
                         return false;
                    }
                	
                          
						  
						  

       if(email.value.trim()== '')
                    {
                        alert("Please enter your Email-id.");
                        email.focus();
                        return false;
                    }
                  else if(email.value.trim()!= '')
                    {
                        str2=email.value.trim();
                        var a=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(!a.test(str2))
                        {
                            alert("Please input a valid email id!");
                            email.focus();
                            return false;
                        }
                    }
					
        
		
	}

	
	
	</script>


	   <!-- End scripts links -->
	   <link rel="stylesheet" type="text/css" href="css/style.css">
	     <!--pop-up scripts-->
       <link rel="stylesheet" href="css/reveal.css">	
	  	
		<!-- Attach necessary scripts -->
		<!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="js/jquery.reveal.js"></script>
		
</head>


  

  <body>
  <header>
  <?php include('header.php');?> 
  </header>
  
  
  
  <article>
  <div class="clear"></div>
	<div class=""><br/>
			<h2 class="heading-title">Program Offerings</h2>
	</div>
	<br/>
	<br/>
    <div class="contnr">
  
		<section id="slide1" class="main style1 right dark fullscreen" style="">
				<div class="content box style2 slide8">
					<div class="wh-we-r wh-we-course">
						<div class="lft-cntnr">
							<p class="light-para">
							
							Our programs will help you gain the skills required for 93% of all fresher Job openings in the core industry. When taught by veterans with rich industry experience, it is not difficult to acquire the skills needed to get a job in the core industry. We train you on the many different approaches used in the industry to solve design problems.
                            </p>
						
                        	<p class="light-small-para" style="padding-bottom:20px;">
							We specialize in learning-through-experience method of teaching; inculcate the habit of out-of-box thinking and applied learning by using our proprietary course material and concept labs.
                            </p>
                          
							<p class="light-small-para">
							At RV-VLSI you get to interact with experts who share with you numerous tips and shortcuts to deal with challenging design problems based on their work experience (something which is not possible from text books or video lectures). This will help you understand concepts and gain experience in problem solving; you must master these skills to clear written tests and crack a job interview. 
							</p>
							<p class="light-small-para">
The following programs are offered to students, Industry Professionals, Corporates and Colleges. Click on each program for more details.								</p>
						</div>
						<div class="rgt-cntnr rgt-cntnr-crses">
							<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="imgs-frst-crsr" src="images/course-1.png" style="float:left;margin:0 0 10px 0px;" />
							<div class="rgt-cntnt-imsges" style=" padding:0px !important; background:#fff !important;">
								<p class="cntnt-paragrph">
								<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="imgs-frth-crsr" src="images/course-4.png" style="float:left;margin:0 0 10px 0px;" />
                                </p>
							</div>
							<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="imgs-secn-crsr" style="float:left;" src="images/course-2.png" />
							<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="imgs-thrd-crsr" style="float:right;" src="images/course-3.png" />
						</div>
						
						<div class="vlsi-courses-details">
							<h2 class="bold-title-vlsi">RV-VLSI PROGRAMS</h2>
							<p class="light-small-para-main">


Add value to your academic degree by acquiring the skills to be industry ready or to prepare for higher studies abroad. We have a course that's right for you.                			</p>
							
							<table width="100%" class="tble-for-corse" border="0" cellpadding="0" cellspacing="0">
								<tr style="background:#eef0f2;">
									<th class="med-curs frst-pading" colspan="3">Advanced Diploma and Diploma Programs</th>
									
								</tr>
								<?php for($i=0;$i<count($rvvlsicourses);$i++){?>
								
								<tr>
									<td class="reglr-curs frst-pading"><a href="#"  data-reveal-id="myModal<?php echo $rvvlsicourses[$i]['idprograms'];?>" >
									<?php echo $rvvlsicourses[$i]['Title'];?></a></td>
									<td width="30%"> 
									  <select name="doctor" id="doctor"  style="width:250px;"  class="label"   onchange="assigndoctorsss(this.value,<?php echo $rvvlsicourses[$s]['idprograms']?>);">
											  
											 
												  <?php 
								  for($k=0;$k<count($arrprogramdetails);$k++){
								  if($arrprogramdetails[$k]['idprograms'] == $rvvlsicourses[$i]['idprograms'])
								  {	
								 
								  ?>
											  <option value="<?php echo $arrprogramdetails[$k]['idprogramcalendar'];?>">
												<?php echo $arrprogramdetails[$k]['startmonth'];?>
										    
									 
									 
									 <?php 
									 }
									 
									 }
									  ?> </option>
											 
										</select>
					
					              </td>
								  <td><a data-reveal-id="myModal-btn<?php echo $rvvlsicourses[$i]['idprograms'];?>" class="big-link" href="#"><input class="coursesregistercursor" type="submit" name="join-now" value="Join Now" /></a></td>
									
									
								</tr>
								<?php }?>
								
								<tr>
								<td>&nbsp;</td>
								</tr>
								
								<tr style="background:#eef0f2;">
									<th colspan="3" class="med-curs frst-pading">Corporate Training <br/>
									</th>
									
								</tr>
								<tr>
									<td class="reglr-curs frst-pading">
									<a data-reveal-id="myModal999" class="big-link" href="#">Corporate Training</a></td>
									<td width='20%'>
									
									<a data-reveal-id="myModal-btn999" class="big-link" href="#"><input class="coursesregistercursor" type="submit" name="join-now" value="Join Now" /></a></td>
								</tr>
								
								<tr style="background:#eef0f2;">
									<th colspan="3" class="med-curs frst-pading">Weekend Courses for working professionals  <br/>
									</th>
									
								</tr>
								<tr>
									<td class="reglr-curs frst-pading">
									<a data-reveal-id="myModal991" class="big-link" href="#">RTL Verification using System Verilog and UVM</a></td>
									<td width='20%'>
									<a data-reveal-id="myModal-btn991" class="big-link" href="#"><input class="coursesregistercursor" type="submit" name="join-now" value="Join Now" /></a></td>
								</tr>
								<tr>
									<td class="reglr-curs frst-pading">
									<a data-reveal-id="myModal992" class="big-link" href="#">Static Timing Analysis for ASIC and FPGA methodologies</a></td>
									<td width='20%'>
									<a data-reveal-id="myModal-btn992" class="big-link" href="#"><input class="coursesregistercursor" type="submit" name="join-now" value="Join Now" /></a></td>
								</tr>
								<tr>
									<td class="reglr-curs frst-pading">
									<a data-reveal-id="myModal993" class="big-link" href="#">Block Level and Chip level Physical Implementation</a></td>
									<td width='20%'>
									<a data-reveal-id="myModal-btn993" class="big-link" href="#"><input class="coursesregistercursor" type="submit" name="join-now" value="Join Now" /></a></td>
								</tr>
								<tr>
									<td class="reglr-curs frst-pading">
									<a data-reveal-id="myModal994" class="big-link" href="#">Full Custom Mask (Analog) Layout </a></td>
									<td width='20%'>
									<a data-reveal-id="myModal-btn994" class="big-link" href="#"><input class="coursesregistercursor" type="submit" name="join-now" value="Join Now" /></a></td>
								</tr>
								<tr>
									<td class="reglr-curs frst-pading">
									<a data-reveal-id="myModal995" class="big-link" href="#">Fundamentals of Design for Test</a></td>
									<td width='20%'>
									<a data-reveal-id="myModal-btn995" class="big-link" href="#"><input class="coursesregistercursor" type="submit" name="join-now" value="Join Now" /></a></td>
								</tr>
								
								<tr style="background:#eef0f2;">
									<th colspan="3" class="med-curs frst-pading">Altera Programs<br/>
									</th>
									
								</tr>
								<?php for($i=0;$i<count($alteraonecourses);$i++){?>
								
								<tr>
									<td class="reglr-curs frst-pading">
									
									<a href="#" class="big-link" data-reveal-id="myModal<?php echo $alteraonecourses[$i]['idprograms'];?>">
									<?php echo $alteraonecourses[$i]['Title'];?></a></td>
									<td width='20%'>
									
									<a data-reveal-id="myModal-btn<?php echo $alteraonecourses[$i]['idprograms'];?>" class="big-link" href="#"><input class="coursesregistercursor" type="submit" name="join-now" value="Join Now" /></a></td>
								</tr>
								<?php }?>
								<?php for($i=0;$i<count($alteratwocourses);$i++){?>
								
								<tr>
									<td class="reglr-curs frst-pading"><a href="#" class="big-link" data-reveal-id="myModal<?php echo $alteratwocourses[$i]['idprograms'];?>">
									<?php echo $alteratwocourses[$i]['Title'];?></a></td>
									<td width='20%'>
									
									<a data-reveal-id="myModal-btn<?php echo $alteratwocourses[$i]['idprograms'];?>" class="big-link" href="#"><input class="coursesregistercursor" type="submit" name="join-now" value="Join Now" /></a></td>
									
								</tr>
								<?php }?>
								<?php for($i=0;$i<count($alterathreecourses);$i++){?>
								
								<tr>
									<td class="reglr-curs frst-pading"><a href="#" class="big-link" data-reveal-id="myModal<?php echo $alterathreecourses[$i]['idprograms'];?>">
									<?php echo $alterathreecourses[$i]['Title'];?></a></td>
									<td width='20%'>
									
									<a data-reveal-id="myModal-btn<?php echo $alterathreecourses[$i]['idprograms'];?>" class="big-link" href="#"><input class="coursesregistercursor" type="submit" name="join-now" value="Join Now" /></a></td>
									
								</tr>
								<?php }?>
								
								
								
								
								<tr>
								<td>&nbsp;</td>
								</tr>
								
							</table>
						</div>
						
						
					</div>
				</div>
		</section>
  
    </div>
  </article>
  <footer>
  <div class="footer-main">
  	<div class="footer-inner">
    	&#169; RV-VLSI Design Center.
    </div>
  </div>
  </footer>
  
<?php for($i=0;$i<count($rvvlsicourses);$i++){?>
 <div id="myModal<?php echo $rvvlsicourses[$i]['idprograms'];?>" class="reveal-modal">
			<h1 style="color:red; font-size:26px;"><?php echo $rvvlsicourses[$i]['Title'];?><br></h1>


            <br>
			<p><?php echo $rvvlsicourses[$i]['Description'];?>
<br><br>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>
<?php }?>  
  <?php for($i=0;$i<count($alteraonecourses);$i++){?>
 <div id="myModal<?php echo $alteraonecourses[$i]['idprograms'];?>" class="reveal-modal">
			<h1 style="color:red; font-size:26px;"><?php echo $alteraonecourses[$i]['Title'];?><br></h1>


            <br>
			<p><?php echo $alteraonecourses[$i]['Description'];?>
<br><br>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>
<?php }?>
 <?php for($i=0;$i<count($alteratwocourses);$i++){?>
 <div id="myModal<?php echo $alteratwocourses[$i]['idprograms'];?>" class="reveal-modal">
			<h1 style="color:red; font-size:26px;"><?php echo $alteratwocourses[$i]['Title'];?><br></h1>


            <br>
			<p><?php echo $alteratwocourses[$i]['Description'];?>
<br><br>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>
<?php }?>
<?php for($i=0;$i<count($alterathreecourses);$i++){?>
 <div id="myModal<?php echo $alterathreecourses[$i]['idprograms'];?>" class="reveal-modal">
			<h1 style="color:red; font-size:26px;"><?php echo $alterathreecourses[$i]['Title'];?><br></h1>


            <br>
			<p><?php echo $alterathreecourses[$i]['Description'];?>
<br><br>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>
<?php }?>
		
		
  <div id="myModal999" class="reveal-modal">
			<h1 style="color:red; font-size:26px;">Corporate Training<br></h1>


            <br>
			<p>We design and deliver on-site or off-site corporate training programs in VLSI and Embedded Systems to new recruits and working professionals.</br></br>
Our training material is designed for multiple EDA vendor tool flows, we have access to design kits for deep sub-micron process nodes to meet the needs of our corporate clients.</br></br>
We are one of the authorized training partners for Altera, USA, in India. We offer a variety of instructor lead training courses. Enquire at the center for details.

<br><br>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>


<!-- --> 
<div id="myModal-btn991" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">RTL Verification using System Verilog and UVM<br></h1>

  <form action="courseformmailer991.php"  name="cont_form991" id="cont_form991" method="POST" onsubmit="return validation991();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name991" id="cont_name991" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile991" id="cont_mobile991" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email991" id="cont_email991" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name991" id="course_name991" value='RTL Verification using System Verilog and UVM'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>	
<!-- --> 
<div id="myModal-btn992" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Static Timing Analysis for ASIC and FPGA methodologies<br></h1>

  <form action="courseformmailer992.php"  name="cont_form" id="cont_form" method="POST" onsubmit="return validation992();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name992" id="cont_name992" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile992" id="cont_mobile992" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email992" id="cont_email992" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name992" id="course_name992" value='Static Timing Analysis for ASIC and FPGA methodologies'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>	
<!-- --> 
<div id="myModal-btn993" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Block Level and Chip level Physical Implementation<br></h1>

  <form action="courseformmailer993.php"  name="cont_form" id="cont_form" method="POST" onsubmit="return validation993();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name993" id="cont_name993" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile993" id="cont_mobile993" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email993" id="cont_email993" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name993" id="course_name993" value='Block Level and Chip level Physical Implementation'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>	
<!-- --> 
<div id="myModal-btn994" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Full Custom Mask (Analog) Layout<br></h1>

  <form action="courseformmailer994.php"  name="cont_form" id="cont_form" method="POST" onsubmit="return validation994();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name994" id="cont_name994" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile994" id="cont_mobile994" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email994" id="cont_email994" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name994" id="course_name994" value='Full Custom Mask (Analog) Layout'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>	
<!-- --> 
<div id="myModal-btn995" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Fundamentals of Design for Test<br></h1>

  <form action="courseformmailer995.php"  name="cont_form" id="cont_form" method="POST" onsubmit="return validation995();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name995" id="cont_name995" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile995" id="cont_mobile995" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email995" id="cont_email995" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name995" id="course_name995" value='Fundamentals of Design for Test'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>	
<!-- --> 
<div id="myModal-btn999" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Corporate Training<br></h1>

  <form action="courseformmailer999.php"  name="cont_form" id="cont_form" method="POST" onsubmit="return validation999();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name999" id="cont_name999" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile999" id="cont_mobile999" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email999" id="cont_email999" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name999" id="course_name999" value='Corporate Training'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>	
<!-- --> 
<div id="myModal-btn42" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Introduction to VHDL (IHDL110)<br></h1>

  <form action="courseformmailer42.php"  name="cont_form991" id="cont_form991" method="POST" onsubmit="return validation42();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name42" id="cont_name42" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile42" id="cont_mobile42" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email42" id="cont_email42" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name42" id="course_name42" value='Introduction to VHDL (IHDL110)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>

<!--- sdf -->
<div id="myModal-btn43" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Introduction to Verilog (IHDL120)<br></h1>

  <form action="courseformmailer43.php"  name="cont_form43" id="cont_form43" method="POST" onsubmit="return validation43();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name43" id="cont_name43" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile43" id="cont_mobile43" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email43" id="cont_email43" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name43" id="course_name43" value='Introduction to Verilog (IHDL120)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>

<div id="myModal-btn29" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">The Quartus II Software Design Series: Timing Analysis  (IDSW120) <br></h1>

  <form action="courseformmailer29.php"  name="cont_form29" id="cont_form29" method="POST" onsubmit="return validation29();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name29" id="cont_name29" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile29" id="cont_mobile29" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email29" id="cont_email29" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name29" id="course_name29" value='The Quartus II Software Design Series: Timing Analysis  (IDSW120)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>

<div id="myModal-btn28" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">The Quartus II Software Design Series: Foundation (2 Day Course) (IDSW110) <br></h1>

  <form action="courseformmailer28.php"  name="cont_form28" id="cont_form28" method="POST" onsubmit="return validation28();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name28" id="cont_name28" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile28" id="cont_mobile28" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email28" id="cont_email28" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name28" id="course_name28" value='The Quartus II Software Design Series: Foundation (2 Day Course) (IDSW110)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>


<div id="myModal-btn31" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Advanced Verilog HDL Design Techniques (IHDL230)<br></h1>

  <form action="courseformmailer31.php"  name="cont_form31" id="cont_form31" method="POST" onsubmit="return validation31();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name31" id="cont_name31" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile31" id="cont_mobile31" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email31" id="cont_email31" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name31" id="course_name31" value='Advanced Verilog HDL Design Techniques (IHDL230)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>

<div id="myModal-btn32" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Advanced VHDL Design Techniques  (IHDL240)<br></h1>

  <form action="courseformmailer32.php"  name="cont_form32" id="cont_form32" method="POST" onsubmit="return validation32();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name32" id="cont_name32" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile32" id="cont_mobile32" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email32" id="cont_email32" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name32" id="course_name32" value='Advanced VHDL Design Techniques  (IHDL240)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>

<div id="myModal-btn33" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Advanced Timing Analysis with TimeQuest (IDSW125)<br></h1>

  <form action="courseformmailer33.php"  name="cont_form33" id="cont_form33" method="POST" onsubmit="return validation33();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name33" id="cont_name33" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile33" id="cont_mobile33" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email33" id="cont_email33" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name33" id="course_name33" value='Advanced Timing Analysis with TimeQuest (IDSW125)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>

<div id="myModal-btn34" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Best Practices for Maximizing FPGA Design Productivity (2 Day Course) (IPRO200)<br></h1>

  <form action="courseformmailer34.php"  name="cont_form34" id="cont_form34" method="POST" onsubmit="return validation34();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name34" id="cont_name34" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile34" id="cont_mobile34" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email34" id="cont_email34" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name34" id="course_name34" value='Best Practices for Maximizing FPGA Design Productivity (2 Day Course) (IPRO200)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>

<div id="myModal-btn35" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">The Quartus II Software Design Series: Optimization (IDSW140)<br></h1>

  <form action="courseformmailer35.php"  name="cont_form35" id="cont_form35" method="POST" onsubmit="return validation35();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name35" id="cont_name35" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile35" id="cont_mobile35" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email35" id="cont_email35" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name35" id="course_name35" value='The Quartus II Software Design Series: Optimization (IDSW140)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>

<div id="myModal-btn36" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;"> Designing with the Nios II Processor and Qsys (2 Day Course)  (IHDL115) <br></h1>

  <form action="courseformmailer36.php"  name="cont_form36" id="cont_form36" method="POST" onsubmit="return validation36();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name36" id="cont_name36" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile36" id="cont_mobile36" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email36" id="cont_email36" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name36" id="course_name36" value=' Designing with the Nios II Processor and Qsys (2 Day Course)  (IHDL115)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>

<div id="myModal-btn37" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;"> Developing Software for the Nios II Processor (2 Day Course) (IEMB230) <br></h1>

  <form action="courseformmailer37.php"  name="cont_form37" id="cont_form37" method="POST" onsubmit="return validation37();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name37" id="cont_name37" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile37" id="cont_mobile37" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email37" id="cont_email37" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name37" id="course_name37" value=' Developing Software for the Nios II Processor (2 Day Course) (IEMB230) '/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>


<div id="myModal-btn38" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">System Integration with Qsys (2 Day Course) (IQSYS100) <br></h1>

  <form action="courseformmailer38.php"  name="cont_form38" id="cont_form38" method="POST" onsubmit="return validation38();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name38" id="cont_name38" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile38" id="cont_mobile38" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email38" id="cont_email38" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name38" id="course_name38" value='System Integration with Qsys (2 Day Course) (IQSYS100) '/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>


<div id="myModal-btn41" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">The Quartus II Software Design Series: Debug and Analysis Tools (IDSW135)<br></h1>

  <form action="courseformmailer41.php"  name="cont_form38" id="cont_form38" method="POST" onsubmit="return validation41();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name41" id="cont_name41" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile41" id="cont_mobile41" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email41" id="cont_email41" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name41" id="course_name41" value='The Quartus II Software Design Series: Debug and Analysis Tools (IDSW135)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>



<div id="myModal-btn8" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Diploma in RTL Design and Verification (VLSI Front End)<br></h1>

  <form action="courseformmailer8.php"  name="cont_form38" id="cont_form38" method="POST" onsubmit="return validation8();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name8" id="cont_name8" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile8" id="cont_mobile8" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email41" id="cont_email8" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name8" id="course_name8" value='Diploma in RTL Design and Verification (VLSI Front End)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>
		


<div id="myModal-btn10" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Advanced Diploma in Embedded Systems Software (ADEMS) <br></h1>

  <form action="courseformmailer10.php"  name="cont_form10" id="cont_form10" method="POST" onsubmit="return validation10();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name10" id="cont_name10" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile10" id="cont_mobile10" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email10" id="cont_email10" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name10" id="course_name10" value='Advanced Diploma in Embedded Systems Software (ADEMS) '/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>
		


<div id="myModal-btn11" class="reveal-modal">
			<h1 style="color:#f589aa; font-size:26px;">Advanced Diploma in ASIC Design (ADAD)<br></h1>

  <form action="courseformmailer11.php"  name="cont_form38" id="cont_form38" method="POST" onsubmit="return validation11();">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name11" id="cont_name11" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile11" id="cont_mobile11" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email11" id="cont_email11" class="input-txt" placeholder="Email"/></td>
  </tr>
<tr style='display:none'>
   <td width="207"><input type="text"  class="input-txt" name="course_name11" id="course_name11" value='Advanced Diploma in ASIC Design (ADAD)'/></td>
  </tr>
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>
				
	  <script>
$(document).ready( function(){

    $('.has-sub').click( function(event){
        event.stopPropagation();
        $('.sub-nav').toggle();
    });

    $(document).click( function(){
        $('.sub-nav').hide();
    });

});

function loaddatacourses(id)
{
  alert(id);
}
  </script>
	  
  </body>
</html>
