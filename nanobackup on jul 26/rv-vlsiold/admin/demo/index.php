<?php
include('detect.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
<meta name="description" content=" Best VLSI & Embedded Systems Training institutes of India, located in Bangalore with students placed in 127 companies & top universities globally">
  
	    <meta name="keywords" content=" “training in vlsi” “embedded systems Bangalore” “Embedded system courses” ">
    <title>RV-VLSI & Embedded Systems Training institute, students placed in 127 companies- Bangalore, India</title>



	   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	   <link rel="shortcut icon" href="images/favicon.png" />
	  
	   <!-- scripts links -->
	   
	     <script type="text/javascript" src="js/jquery.min.js"></script>
		 <script type="text/javascript" src="js/classie.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	    
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/new-comp.js"></script>
	
	<!--menu-slide-click-->
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

		<!-- Bottom TAb pannel (Video) -->
	
	
		<!-- bxSlider testimonial-conetnt-slider -->

	  <script>
  $(document).ready(function(){
        $('.bxslider-tm').bxSlider({
       auto: true,
	  
        });
      });	
  </script>
	
	<!--header-scroll-->
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

<!--youtube-video-->
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

<!-- Testimonials Slider script link-->
		
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group2-1").colorbox({rel:'group2', transition:"fade"});
				$(".group2-12").colorbox({rel:'group2-12', transition:"fade",width:"300", height:"auto"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
		<!-- Testimonials Slider script link-->
		 <!-- use jssor.slider.mini.js (39KB) or jssor.sliderc.mini.js (31KB, with caption, no slideshow) or jssor.sliders.mini.js (26KB, no caption, no slideshow) instead for release -->
    <!-- jssor.slider.mini.js = jssor.sliderc.mini.js = jssor.sliders.mini.js = (jssor.core.js + jssor.utils.js + jssor.slider.js) -->
   
 
<link rel="stylesheet" href="css/colorbox.css" />

		

	   <!-- End scripts links -->
	   <link rel="stylesheet" type="text/css" href="css/style.css">
	  
	   
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
	
    function validation()
	{
		 
		 var name=document.getElementById('cont_name');
         var email=document.getElementById('cont_email');
         var phone=document.getElementById('cont_mobile');
        // var msg=document.getElementById('cont_msg');
		//var carmdl = $('#car_mdl').find(":selected").text();
		
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
	
	
	    function formvalidation()
	{
		 
		 var name=document.getElementById('scont_name');
         var email=document.getElementById('scont_email');
         var phone=document.getElementById('scont_mobile');
         var city=document.getElementById('scont_city');
		 var state=document.getElementById('scont_state');
		 var country=document.getElementById('scont_country');
		 var msg=document.getElementById('scont_msg');
		var study=$("input[name='radioName']:checked").val()
		

		
		
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
					
					
					 if(state.value.trim()== '')   
                        {
                        alert("Please enter your state.");
                        state.focus();
                        return false;
                        }
				                  else  if(state.value.trim()!= '')
                    {
                        var statenal=state.value.trim();
                        var stateregexpnss=/^[a-zA-Z ]*$/i;
                        if(!stateregexpnss.test(statenal))
                        {
                            alert("This is not a valid state ! Only alphabets are accepted");
                            state.focus();
                            return false
                        }
                    }
					
					
					                      
  if(country.value.trim()== '')   
                        {
                        alert("Please enter your country.");
                        country.focus();
                        return false;
                        }
				                  else  if(country.value.trim()!= '')
                    {
                        var countrynal=country.value.trim();
                        var countryregexpnss=/^[a-zA-Z ]*$/i;
                        if(!countryregexpnss.test(countrynal))
                        {
                            alert("This is not a valid country ! Only alphabets are accepted");
                            country.focus();
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

						 if(study.value.trim()== '') {
						alert("Please select the status of engineering");
						study.focus();
						return false;
						}
					  else
					  {
					  return true;
					  }

			
    
		
	}  
	
	
	    function mobformvalidation()
	{
		 
		 var name=document.getElementById('mscont_name');
         var email=document.getElementById('mscont_email');
         var phone=document.getElementById('mscont_mobile');
         var city=document.getElementById('mscont_city');
		 var state=document.getElementById('mscont_state');
		 var country=document.getElementById('mscont_country');
		 var msg=document.getElementById('mscont_msg');
		
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
					
					
					 if(state.value.trim()== '')   
                        {
                        alert("Please enter your state.");
                        state.focus();
                        return false;
                        }
				                  else  if(state.value.trim()!= '')
                    {
                        var statenal=state.value.trim();
                        var stateregexpnss=/^[a-zA-Z ]*$/i;
                        if(!stateregexpnss.test(statenal))
                        {
                            alert("This is not a valid state ! Only alphabets are accepted");
                            state.focus();
                            return false
                        }
                    }
					
					
					                      
  if(country.value.trim()== '')   
                        {
                        alert("Please enter your country.");
                        country.focus();
                        return false;
                        }
				                  else  if(country.value.trim()!= '')
                    {
                        var countrynal=country.value.trim();
                        var countryregexpnss=/^[a-zA-Z ]*$/i;
                        if(!countryregexpnss.test(countrynal))
                        {
                            alert("This is not a valid country ! Only alphabets are accepted");
                            country.focus();
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

						  
						  

			
    
		
	}  
	
	
	</script>
	
	
</head>

  <body>

   <div id="toPopup"> 
    	
        <div class="close"></div>
       	<span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		<div id="popup_content"> <!--your content start-->
        
 <form action="mailer.php"  name="cont_form" id="cont_form" method="POST" onsubmit="return validation();">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="207"><input type="text"  class="input-txt" name="cont_name" id="cont_name" placeholder="Contact Name *"/></td>
  </tr>
  
  <tr>
    <td><input type="text"  class="input-txt" name="cont_mobile" id="cont_mobile" placeholder="Mobile  *"/></td> </tr>
  
   <tr>
      <td class="eml-disp" id="txtAge"><input type="text"  name="cont_email" id="cont_email" class="input-txt" placeholder="Email"/></td>
  </tr>
 
  <tr>
   <td><input type="submit"  name="formsubmit" class="send-button" value="Submit"/></td>
  </tr>
  
</table>
</form>
        </div> <!--your content end-->
    
    </div> <!--toPopup end-->
    	<div id="backgroundPopup"></div>
	
  <header>
  <?php include('header.php');?>
  
  
  
  </header>
  
  
  
  
  <article>
  
	<!--<div class='lftsde-mnuslider' data-menu-style = "sapphire">
            <ul>
                <li><a href='#slide1'>1</a></li>
                <li><a href='#slide2'>2</a></li>
                <li><a href='#slide3'>3</a></li>
                <li><a href='#slide4'>4</a></li>
                <li><a href='#slide5'>5</a></li>
                <li><a href='#slide6'>6</a></li> 
                <li><a href='#slide7'>7</a></li> 
                <li><a href='#slide8'>8</a></li> 
            </ul>
	</div>-->
  <div class="contnr">
		<section id="slide1" class="main style2 right dark fullscreen" style="padding-top: 96px !important; padding-bottom: 100px;">
				<div class="content box style2 slide1">
				<div class="wh-we-r">
					<p class="rgt-cntn-hme">
						<span class="nme-light">Jayanth Bharathi Srinivas</span><br />
						<span class="desgntn">Design Engineer</span>
						<span class="cmpny"> - Cypress</span><br /><br />
						<span class="positin">Student of RV-VLSI</span><br />
						<span class="yrs">Advanced Diploma in ASIC Design, Batch-4-2008</span><br />
						<a class="mre-lnk" href="achivers.html">more...</a>
					</p>
					<div class="clear"></div>
					<p class="rgt-cntn-scndhme">
						<span class="nme-medium">VLSI & EMBEDDED SYSTEMS TRAINING</span><br />
						
						<p class="centry-yrs"><span style="color:#f86592;">1500</span><span style="color:#01cba9;"> + </span> <span style="color:#014593;"> Students </span></p><br />
						<div class="clear"></div>
						<p class="cmpny-ps">Trained.</p>
						<p class="cmpny-pssmal">Placed in127 Companies Globally</p>
						<div class="clear"></div>
						<p class="clnt-imgs">
					    <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/logos/broadcom.png" > 
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/logos/ibm.png" >
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/logos/infosys.png" >
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/logos/intel.png" > 
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/logos/lsi.png" > 
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   style="margin-right:0px;" src="images/logos/mentor-graphics.png" >
                        
                         </p>
<div class="clear"></div>
						<div class="new-btch">
						<span>New batch starts in <span class="july-mnth">SEPTEMBER</span> </span> <br />
						<a class="chfe" href="#slide6" >click here ON INFORMATION ON UPCOMING BATCHES</a><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/li.png" style="vertical-align: middle;margin: 0 0 0 5px;" />
						</div>
						<div class="clear"></div>
						<p class="crs-offring"><span class="co-tile">Programs Offered :</span><br />
							<span class="bld-co">ADAD</span> (Advanced Diploma in ASIC Design)<br />
							<span class="bld-co">DEMS</span> (Diploma in Embedded Systems Software)<br />
							<span class="bld-co">VLSI FRONT END</span> (Diploma in VLSI Design and Verification)<br />
						<span class="bld-co">VLSI BACK END</span> (Diploma in VLSI Design Implementation)
						
                        </p>
					  <div class="clear"></div>
					</p>
					<div class="clear"></div>
				</div>
				</div>
				
		</section>
		<section id="slide2" class="main style1 right dark fullscreen" >
				<div class="content box style2 slide2">
					<div class="wh-we-r">
					<h2 class="rbt-lght-title" style="padding-top:0px !important;">Our Differentiators </h2>
					<div class="inner-whwer-lft">
						
						<div class="frst-lft-wwa left-div">
							<a href="http://rv-vlsi.com/program_offerings.php" target="_blank"><p class="cntnt-aatp">Altera Authorized<br />
												  Training Partner
							</p>
							<p class="sub-cntnt-aatp">We offer short duration instructor lead certificate programs in FPGADesign
							</p></a>
						</div>
						<div class="secd-rgt-wwa left-div">
						<p class="cntnt-aatp">Our Value added <br/> partners 
							</p>
							<p class="sub-cntnt-aatp" >All our courses are developed and delivered by industry experts from Nanochip Solutions Pvt. Ltd. We have access to the latest EDA tools and process technology from our EDA and foundry relationships.</p>
						</div>
						<div class="third-lft-wwa left-div">
						<p class="cntnt-aatp" style="line-height:28px;">Programs<br />
												  Offered
							</p>
							<p class="sub-cntnt-aatp">         A wide range of programs to choose from leading to a specialization in Design and Verification, Full Custom Design, ASIC Physical Design , VLSI CAD and and many <a href="courses.html" style=" text-decoration:none;">  more..</a>
							</p>
						</div>
						<div class="frth-rgt-wwa left-div">
                       <p class="cntnt-aatp">
                        At RV-VLSI You Will
                        </p>
						<div class="cntnt-aatp-lft"> GAIN</div>
						<div class="cntnt-aatp-rgt">
						Interest<br />
						Confidence<br />
						Knowledge<br />
						Experience
						</div>
							<p class="sub-cntnt-aatp">
                     In VLSI Design or Embedded Systems.
							</p>
						</div>
					</div>
					<div class="inner-whwer-rgt">
						<p class="contnt-innr-rgt" style="text-align: justify;">Our programs prepare  you for jobs in the VLSI and Embedded Systems domains in product and service  companies across the globe. The course material is developed and delivered by  industry experts from Nanochip Solutions using industry standard software tools  and deep submicron process technologies.</p>
						<p class="contnt-innr-rgt-btm" style="text-align:justify;" >
							Our programs are learner centric and provide every student the opportunity to learn at their own pace and acquire the necessary skills to become employable.
                      </p>
						<a href="#" class="topopup dowld-proscts" ><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="dowld-img" src="images/download-1.png" />Request for a  Prospectus</a>
					</div>
					
					</div>	
				</div>
		</section>
		<section id="slide3" class="main style1 right dark fullscreen" style="">
				<div class="content box style2 slide3">
				<div class="wh-we-r">
						<h2 class="rbt-lght-title" style="text-align:left;border-bottom:1px solid #e8f4f4;">Program Offered</h2>
					<div class="lft-po">
				
					<p class="wosp-tle">RV-VLSI course details</p>
					<div class="clear"></div>
					<ul class="elgblty dels">
						<li><a href="courses.html" >ADAD (Advanced Diploma in ASIC Design)</a></li>
						<li><a href="courses.html" >DEMS (Diploma in Embedded Systems Software)</a></li>
						<li><a href="courses.html" >Diploma in VLSI Design and Verification (VLSI Front End)</a></li>
						<li><a href="courses.html" >Diploma in VLSI Design Implementation (VLSI Back End)</a></li>
						
					</ul>
					<p class="wosp-tle">You are eligible to take our courses if you are:</p>	
					<ul class="elgblty curse">
						
							<li>An engineer with BE/ME in ECE. Or related branch looking to gain  job oriented skills</li>
							<li>An IT Professional looking for a career change to core industry</li>
							<li>Planning to go abroad for pursuing higher studies in US,Europe, Australia</li>
                            </ul><br /><br />
					<a  href="#slide6" class="chk-elgblty"  target="_blank">Register Now</a>
					<br /><br /><br />
					<div class="clear"></div>
						
					</div>
					<div class="rgt-po">	
						<p class="wosp-tle">Students Placed Successfully</p>	
						<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="cmpny-lgo" src="images/broadcom.png" />
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="cmpny-lgo" src="images/cypress.png" />
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="cmpny-lgo" src="images/ibm.png" />
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="cmpny-lgo" src="images/infosys.png" />
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="cmpny-lgo" src="images/intel.png" />
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="cmpny-lgo" src="images/lsi.png" />
						<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="cmpny-lgo" src="images/magma.png" />
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="cmpny-lgo" src="images/mentor-graphics.png" />
					
                     <a class="view-all-btn" href="http://rv-vlsi.com/program_offerings.php" target="_blank">View All</a><br />
					<p class="wosp-tle">Students Pursuing Higher Studies at</p>	
						
						<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="uni-lgo" src="images/cincinnati.png" />
						<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="uni-lgo" src="images/illinois.png" />
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="uni-lgo" src="images/client-14.png" />
						<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="uni-lgo uni-sml" src="images/syracuse.png" />
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="uni-lgo" src="images/client-15.png" />
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="uni-lgo" src="images/university-of-california.png" />
						<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="uni-lgo" src="images/university-of-colorado.png" />
					

					</div>
						
				</div>
				
					
				</div>
				
		</section>
		<section id="slide4" class="main style1 right dark fullscreen" style="">
				<div class="content box style2 slide4">
				<div class="wh-we-r">
				<h2 class="rbt-lght-title"> Workshop on  Careers in VLSI and Embedded Systems</h2>
				<div class="lft-fw">
				<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/workshop1.png" />
				<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/workshop2.png" />
				<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/workshop3.png" />
				<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/workshop4.png" />
				<!--<iframe class="wrkshp-carer-iframe" width="475" height="300" src="https://www.youtube.com/v/lMD8Ire58jY"></iframe>-->
				<p class="name-cndtd">Alumni Networking Workshop by Mr. Venkatesh S Prasad</p>
				<p class="design-desm">Founder CEO, RV-VLSI</p>
				<p class="design-cntnt">CEO addressing the alumni and students of RV-VLSI regarding plans to start a alumni support group thereby providing a platform for all RV-VLSI alumni to network and exchange ideas.</p>
				<a href="gallery.html" class="design-vwp">View Workshop Pictures</a>
				
				</div>
				
				<div class="rgt-fw">
				<p class="wosp-tle upcming-wrsop">Upcoming Workshops</p>
				<p class="design-cntnt-vwp">
               Every month we conduct workshops on topics of interest to the student community such as Resume writing,  Analyzing job interview performance, career planning etc. These workshops are FREE and seats are limited <a href="workshop.html" style="color: #f6799f;text-decoration:none;" >click here to register</a>.
                </p>
				<p class="design-date">Date    : <span class="dte-clr">September 26<sup>th</sup> 2014</span></p>
				<p class="design-venue">Venue : <span class="dte-clr">RV-VLSI Campus, Jayanagar 4th T Block</span></p>
				<table class="elgblty" width="100%" border="0" cellpadding="0" cellspacing="0">
					
					<tr>
						<td><a href="workshop.html" class="join-fw" >Click here to register for the workshop</a></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><a href="#" class="like-stsgu" >Like us to stay get updated </a></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					
				</table>
				</div>
				</div>
				</div>
				
		</section>
		<section id="slide5" class="main style1 right dark fullscreen" style="">
				<div class="content box style2 slide5">
				<div class="wh-we-r for-testimonials-main">
				<h2 class="rbt-lght-title" style="text-align:left;border-bottom:1px solid #fdf4f7;">Students Testimonials</h2>
			<div class="lft-tm">
            <!--Testimonials Start-->
 <ul class="bxslider-tm">
  <li>
  <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/o-qt.png" style="float:left;" />
  As a student I did not know what attributes to look for in a training institute before joining. After I joined RV- VLSI, I understood the importance of good infrastructure, access to EDA tools and expert faculty in VLSI training,and also how crucial these parameter are for transforming an engineer into a productive professional". 
  <p class="athr-name-tm">Sandesh Sanbhag </p>
<p class="cmpny-name-tm">(Placed at Apple Bay Area USA, Course ADAD)</p>
  </li>
  <li>
  <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/o-qt.png" style="float:left;" />
  The industry-like setting, with expert faculty has been a truly enriching experience. The training lays greater emphasis on concepts and practical skills. Its been a great learning experience on the whole. I think RV has provided me a firm foundation for a successful career in VLSI.
   <p class="athr-name-tm">Sarvotham Shetty</p>
<p class="cmpny-name-tm">(Placed at Netlogic, Course ADAD)</p>
  </li>
  <li>
  <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/o-qt.png" style="float:left;" />
  When I first did my BE project at RV-VLSI, I was motivated and convinced to take up a course at RV-VLSI to make a career in the VLSI industry. I'm fortunate to have been guided by a team of experts with vast experience in companies abroad. I've learned to learn and I'm excited to start my career with a lot of confidence and understanding of this filed
    <p class="athr-name-tm">Gautham </p>
<p class="cmpny-name-tm">(Placed at ARM India, Course ICML)</p>
  </li>
  <li>
  <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/o-qt.png" style="float:left;" />
  I'm glad I joined RV-VLSI. The courseware and the training methodology gave me the required confidence to face the technical interviews.
    <p class="athr-name-tm">Christina Antony </p>
<p class="cmpny-name-tm">(Placed at Broadcom Newport Beach, Course ADAD)</p>
  </li>
  
   <li>
  <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/o-qt.png" style="float:left;" />
  I'm proud to be trained in RV-VLSI. I got ample exposure to VLSI technology under guidance of Mr. Venkatesh Prasad, though I have industry experience of 7 years. The content of the ADAD program is exciting and helped to fill the black boxes I had about the ASIC flow.  Learning VLSI was fun with the knowledgeable and friendly staff and helped me to got a job in INTEL
     <p class="athr-name-tm">Hema Mehra</p>
<p class="cmpny-name-tm">(Placed as Physical Design Engineer – INTEL, Course ADAD)</p>
  </li>
  
</ul>
<!--Testimonials End-->
            
            
		</div>
		<div class="rgt-tm">
		<!-- Vedio tab pannel -->
			<div id="tabs-container">
    
    <div class="tab">
       
        <div id="tab-1" class="tab-content">
               <iframe width="99%" height="315" src="//www.youtube.com/embed/a6A1FZM6y5E" frameborder="0" allowfullscreen></iframe>
     	
                </div>
        
         <div id="tab-2" class="tab-content">
            <iframe width="99%" height="315" src="//www.youtube.com/embed/VzOIoSkRLJE" frameborder="0" allowfullscreen></iframe>
 
         </div>
         
         <div id="tab-3" class="tab-content">
           <img src="images/videoPlaceholder.jpg" width="454" height="255">
           </div>
        <div id="tab-4" class="tab-content">
           <img src="images/videoPlaceholder.jpg" width="454" height="255">
		 </div>
       
        <ul class="tabs-menu">
          <li class="current"><a href="#tab-1"><img alt=" "Embedded Systems Training" "Embedded Training in Bangalore" "VLSI Training institutes" "   class="ved-imgs" src="images/thumb4.jpg" style="width:110px;" /></a></li>
             <li><a href="#tab-2"><img alt=" "Embedded Systems Training" "Embedded Training in Bangalore" "VLSI Training institutes" "   class="ved-imgs" src="images/thumb2.jpg" style="width:110px;margin:0 2px 0 0;" /></a></li>
          <li><a href="#tab-3"><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="ved-imgs" src="images/videoPlaceholderthumb.jpg" style="width:110px;margin:0 2px 0 0;" /></a></li>
         <li><a href="#tab-4"><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="ved-imgs" src="images/videoPlaceholderthumb.jpg" style="width:110px;margin:0 2px 0 0;" /></a></li>
            </ul>
    </div>
</div>
		<!--End Vedio tab pannel -->
        		 <a href="testimonials-video.html" class="design-vwp" style="text-align:right;">View more videos</a>
</div>		

			
				</div>
				</div>
				
		</section>
		<section id="slide6" class="main style1 right dark fullscreen" style="">
				<div class="content box style2 slide6">
				<div class="wh-we-r">
				<h2 class="rbt-lght-title">  Register Here <a href="#" style="float: right;" class="topopup dowld-form" ><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="dwnld-imf-frm" src="images/dwld-2.png" />Request for a  Prospectus</a>For More Information</h2>

   <form action="formmailer.php"  name="scont_form" id="scont_form" method="POST" onsubmit="return formvalidation();">
   <table class="enq-regstrn-frm" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left"><input class="enq-reg-inpt" type="text" id="scont_name" name="scont_name" value="" placeholder="Name" /></td>
    <td align="right"><input class="enq-reg-inpt rgt-reg-inpt" id="scont_email" type="text" name="scont_email" value="" placeholder="Email"/></td>
  </tr>
  <tr>
    <td align="left"><input class="enq-reg-inpt" type="text" id="scont_mobile" name="scont_mobile" value="" placeholder="Mobile"/></td>
    <td align="right"><input class="enq-reg-inpt rgt-reg-inpt" id="scont_city" type="text" name="scont_city" value="" placeholder="City"/></td>
  </tr>
  <tr>
    <td align="left"><input class="enq-reg-inpt" type="text" id="scont_state" name="scont_state" value="" placeholder="State"/></td>
    <td align="right"><input class="enq-reg-inpt rgt-reg-inpt" id="scont_country" type="text" name="scont_country" value="" placeholder="Country"/></td>
  </tr>
  <tr>
    <td align="left" class="vert-top"><span class="engineering-spn" style="font-family:'robotoregular';font-size:16px;">Engineering :</span> 
    <span class="engineering-spn" style="font-family:'robotolight';font-size:16px;">
    <input type="radio" name="radioName" value="Pursuing" style=" outline: 0; " /> Pursuing
     <input type="radio" name="radioName" value="Completed" style=" outline: 0; " /> Completed
     </span></td>
    <td align="right"><textarea id="scont_msg" name="scont_msg" class="enq-reg-inpt rgt-reg-inpt"  value="" placeholder="Message"></textarea></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><input type="submit" class="enq-nw" name="submit" value="Submit" /></td>
    
  </tr>
</table>
</form>

	<form action="formmailer.php"  name="scont_form" id="mscont_form" method="POST" onsubmit="return mobformvalidation();">
     <table class="enq-regstrn-frm-320" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left"><input class="enq-reg-inpt" type="text" id="mscont_name" name="scont_name" value="" placeholder="name" /></td>
    
	</tr>
  <tr>
  <td align="left"><input class="enq-reg-inpt" id="mscont_email" type="text" name="scont_email" value="" placeholder="email"/></td>
  </tr>
  <tr>
    <td align="left"><input class="enq-reg-inpt" type="text" id="mscont_mobile" name="scont_mobile" value="" placeholder="mobile"/></td>
    </tr>
  <tr>
	<td align="left"><input class="enq-reg-inpt" id="mscont_city" type="text" name="scont_city" value="" placeholder="city"/></td>
  </tr>
  <tr>
    <td align="left"><input class="enq-reg-inpt" type="text" id="mscont_state" name="scont_state"  value="" placeholder="state"/></td>
    </tr>
  <tr><td align="left"><input class="enq-reg-inpt"  id="mscont_country" type="text" name="scont_country" value="" placeholder="country"/></td>
  </tr>
  <tr>
    <td align="left" class="vert-top">
    <span class="engineering-spn" style="font-family:'robotoregular';font-size:16px;">
    Engineering :</span> 
    <span class="engineering-spn" style="font-family:'robotolight';font-size:16px;">
    <input type="radio" name="radioName" value="" style=" outline: 0; " /> Pursuing
     <input type="radio" name="radioName" value="" style=" outline: 0; " /> Completed
     </span></td>
    </tr>
  <tr><td align="left"><textarea  id="mscont_msg" name="scont_msg" class="enq-reg-inpt"  value="" placeholder="message"></textarea></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" class="enq-nw" name="submit" value="Enquire Now" /></td>
    
  </tr>
</table>
</form>

<div class="dmmy-div1"></div>
<div class="dmmy"></div>
				</div>	
				</div>
				
		</section>
		<section id="slide7" class="main style1 right dark fullscreen" style="">
				<div class="content box style2 slide7">
				<div class="wh-we-r for-photogallery-main" >
				<h2 class="rbt-lght-title" style="text-align:left;border-bottom:1px solid #e8f4f4;">Photo Gallery</h2>

                
                <div class="cntnt-fr-gallry">
				<div id="TabbedPanels1" class="TabbedPanels">
              <ul class="">
                <li class="" tabindex="0"></li>
                <li class="" tabindex="1"></li>
              </ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent" style="display:table;">
					   <a class='group2-1' href="images/g1.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb.jpg" />
					   </a>
					   <a class='group2-12' href="images/g1.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb.jpg" />
					   </a>
					   
					   <a class='group2-1' href="images/g2.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb1.jpg" />
					   </a>
					   <a class='group2-12' href="images/g2.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb1.jpg" />
					   </a>
					   
					  <!--   <a class='group2-1' href="images/g3.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb2.jpg" />
					   </a>
					   <a class='group2-12' href="images/g3.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb2.jpg" />
					   </a>
					   
					 <a class='group2-1' href="images/g4.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs lst-img" src="images/g-thumb3.jpg" />
					   </a>
					   <a class='group2-12' href="images/g4.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs lst-img" src="images/g-thumb3.jpg" />
					   </a>
					   
					   <a class='group2-1' href="images/g5.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb4.jpg" />
					   </a>
					   <a class='group2-12' href="images/g5.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb4.jpg" />
					   </a>
					   
					   <a class='group2-1' href="images/g6.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb5.jpg" />
					   </a>
					   <a class='group2-12' href="images/g6.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb5.jpg" />
					   </a>-->
					   
					   <a class='group2-1' href="images/g7.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb6.jpg" />
					   </a>
					   <a class='group2-12' href="images/g7.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs" src="images/g-thumb6.jpg" />
					   </a>
					   
					   <a class='group2-1' href="images/g8.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs lst-img" src="images/g-thumb7.jpg" />
					   </a>
					   <a class='group2-12' href="images/g8.jpg" >
					   <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   class="gal-imgs lst-img" src="images/g-thumb7.jpg" />
					   </a>
					   
  
				
                </div>
                
              </div>
            </div>
				</div>
				
				
				
                	  <a href="gallery.html" class="design-vwp" style="text-align:right;">View Gallery Pictures</a>
	
                            
				</div>
					
				</div>
				
		</section>
		<section id="slide8" class="main style1 right dark fullscreen" style="">
				<div class="content box style2 slide8">
				<div class="wh-we-r wh-we-cntct">
					<h2 class="rbt-lght-title rbt-tile-ctctus" style="">Contact Us</h2>
                    <div class="lft-cu">
                    <table class="adress-cu" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                        <td class="adress-cu"><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/address.png" class="address-img" /></td>
                        <td class="cntnt-adrscu" style="color:#555555;">36th cross, 26th main<br />
                        Jayanagar 4th T Block<br />
                        Bangalore - 560041.
                        </td>
                        </tr>
                        
                    <tr class="top-padingcu">
                        <td class="adress-cu"><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/phone.png" class="address-img" /></td>
                        <td class="cntnt-adrscu">+91-80-40788574 (G0-RV-VLSI)</td>
                        </tr>
                    <tr class="top-padingcu-l">
                        <td class="adress-cu">
                        <img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/mobile.png" class="address-img" /></td>
                        <td class="cntnt-adrscu" style="color:#555555;">+91-80-26654920</td>
                        </tr>
                    <tr class="top-padingcu-l">
                        <td class="adress-cu"><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/email.png" class="address-img" /></td>
                        <td class="cntnt-adrscu"><a href="mailto:info@rv-vlsi.com" class="mailto-lnlk">info@rv-vlsi.com</a></td>
                        </tr>
						<tr class="top-padingcu-l">
                        <td class="adress-cu">&nbsp;</td>
                        <td class="cntnt-adrscu">&nbsp;</a></td>
                        </tr>
                        </table>
                    </div>
                    <div class="rgt-cu">
                    <iframe class="cntct-us" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.7648904814364!2d77.59288599999996!3d12.922826999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae15a771b08f65%3A0x36131b509aa218c7!2sRV-VLSI+Design+Center!5e0!3m2!1sen!2s!4v1402641328936" width="600" height="320" frameborder="0" style="border:0"></iframe>
                    </div>
					
					<div class="dmmy-div"></div>
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
            jssor_slider2_starter('slider2_container');
        </script>
		
	  
	  <script>
 $(document).ready(function(){
        $('.bxslider').bxSlider({
       auto: true,
	   mode: 'horizontal',
        autoControls: true,
        });
      });	
	  var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
	 </script>
  </body>
</html>