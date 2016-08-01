<?php
include('detect.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
<meta name="description" content=" Best VLSI & Embedded Systems Training institutes of India, located in Bangalore with students placed in 127 companies & top universities globally">
  
    <title>Workshop-RV-VLSI & Embedded Systems Training institute, students placed in 127 companies- Bangalore, India</title>

	   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	   <link rel="shortcut icon" href="images/favicon.png" />
	  
	   <!-- scripts links -->
	   
	   	<script type="text/javascript" src="js/jquery.openCarousel.js"></script>
		<script type="text/javascript" src="js/classie.js"></script>
	    <script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.bxslider.js"></script> <!--http://dean.edwards.name/packer/-->

<script>
$(document).ready(function(){
  $('.slider1').bxSlider({
    slideWidth: 500,
	slideHeight: 500,
    minSlides: 1,
    maxSlides: 18,
	pager:false,
    slideMargin: 10,
  });
});
</script>

	   
	    
	   
	   <script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		
		<!-- Bottom TAb pannel (Video) -->
	
	
		<!-- bxSlider Javascript file -->
	<script src="js/jquery.bxslider.min.js"></script>
	<script>
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
<script>
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
	
	
	<script>
	function isValidPhone(ph)
                        {
                    var RegExp12 = /^\d{3}([ -]\d\d|\d[ -]\d|\d\d[ -])\d{6}$/;
                     if(RegExp12.test(ph))
                     {
                        return true;
                     }
                     else
                     {
                        var RegExp123 = /^\d{10}$/;
                        if(RegExp123.test(ph))
                        {
                            return true
                        }
                        else
                        {
                            return false;
                        }
                     }
                }
	
  
	    function formvalidation()
	{
		 
		 var name=document.getElementById('scont_name');
         var email=document.getElementById('scont_email');
         var phone=document.getElementById('scont_mobile');
         var city=document.getElementById('scont_city');
		 var state = $('#scont_state').find(":selected").text();
		 var country=document.getElementById('scont_country');
		 var msg=document.getElementById('scont_msg');
		
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
                	
                       
  if(city.value.trim()== '')   
                        {
                        alert("Please enter your city.");
                        city.focus();
                        return false;
                        }
				                  else  if(city.value.trim()!= '')
                    {
                        var citynal=city.value.trim();
                        var cityregexpnss=/^[a-zA-Z ]*$/i;
                        if(!cityregexpnss.test(citynal))
                        {
                            alert("This is not a valid city !Only alphabets are accepted");
                            city.focus();
                            return false
                        }
                    }
					
								               
                     if(msg.value.trim()== '')   
                        {
                        alert("Please enter your Message.");
                        msg.focus();
                        return false;
                        }
				                  else  if(msg.value.trim()!= '')
                    {
                        var msgnal=msg.value.trim();
                        var msgregexpnss=/^[a-z0-9\d\n ,._]*$/i;
                        if(!msgregexpnss.test(msgnal))
                        {
                            alert("This is not a valid message ! Only alphabets are accepted");
                            msg.focus();
                            return false
                        }
                    }

						  
							
			 if(state == 'Select State')   
                        {
						alert("Please select your state.");
                       return false;
                        }
						 else  if(state != 'Select State')
                    {
                       
					   return true;
                    }	  

			
    
		
	}  
	

	
	</script>


	   <!-- End scripts links -->
	   <link rel="stylesheet" type="text/css" href="css/style.css">
	   
</head>

  

  <body>
  <header>
  <?php include('header.php');?>
  </header>
  
  
  
  <article>
  <div class="clear"></div>
	<div class="">
			<h2 class="heading-title">Join Free Workshop</h2>
	</div>
    <div class="contnr">
  
		<section id="slide1" class="main style1 right dark fullscreen" style="">
				<div class="content box style2 slide8">
					<div class="wh-we-r wh-we-course">
						<div class="lft-cntnr">
							<div class="upcoming-wrshp">
								<h2 class="title-wrshp">Upcoming Workshop</h2>
								<p class="light-cntnt">On the last Friday of every month we conduct workshops on topics of interest to the student community such as Resume writing, Handling stress during interviews, Industry orientation etc. Please register to secure your seat. These workshops are FREE and seats are limited</p>
					      <p class="date-fled">Date    : <span class="dte-spn">September 26th 2014</span></p>
								<p class="date-fled">Venue : <span class="dte-spn">RV-VLSI Campus, Jayanagar 4th T Block</span></p>
							</div>
							<div class="slidr-mn-cntnr">
							<h2 class="regu-title">Past Workshop</h2>
							<div class="lft-fw">
				<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/workshop1.png">
				<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/workshop2.png">
				<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/workshop3.png">
				<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/workshop4.png">
				<!--<iframe class="wrkshp-carer-iframe" width="475" height="300" src="https://www.youtube.com/v/lMD8Ire58jY"></iframe>-->
				<p class="name-cndtd">Alumni Networking Workshop by Mr. Venkatesh S Prasad</p>
				<p class="design-desm">Founder CEO, RV-VLSI</p>
				<p class="design-cntnt">CEO addressing the alumni and students of RV-VLSI regarding plans to start a alumni support group thereby providing a platform for all RV-VLSI alumni to network and exchange ideas.</p>
				<a href="#" class="design-vwp">View Workshop Pictures</a>
				
				</div><br/><br/><br/>
							</div>
						</div>
						<div class="rgt-cntnr">
						
						<h2 class="form-title">Register for upcoming workshop</h2>
							<form action="workformmailer.php"  name="scont_form" id="scont_form" method="POST" onsubmit="return formvalidation();">
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td><input class="input-fulsize" type="text" id="scont_name" name="scont_name" value="" placeholder="Name" /><td>
								</tr>
								<tr>
									<td><input class="input-fulsize" id="scont_email" type="text" name="scont_email"  value="" placeholder="Email" /><td>
								</tr>
								<tr>
									<td><input class="input-fulsize" type="text" id="scont_mobile" name="scont_mobile" value="" placeholder="Mobile" /><td>
								</tr>
								<tr>
									<td><input class="input-fulsize" id="scont_city" type="text" name="scont_city"  value="" placeholder="City" /><td>
								</tr>
							

								<tr>
									<td>
										<select id="scont_state" name="scont_state" class="input-fulsize">
											<option selected="selected" value="Select State">Select State</option>
											<option value="Karnataka">Karnataka</option>
											<option value="Tamilnadu">Tamilnadu</option>
										</select>
									<td>
								</tr>
								<tr>
									<td><textarea class="input-fulsize hgt-textarea" id="scont_msg" name="scont_msg" value="" placeholder="Message"></textarea><td>
								</tr>
								<tr>
									<td><input class="join-now-btn" type="submit" name="join-now" value="Join Now" /><td>
								</tr>
								
							</table>
							</form>
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

  </script>
	  
  </body>
</html>