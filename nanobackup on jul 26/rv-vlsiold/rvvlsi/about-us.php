<?php
include('detect.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
<meta name="description" content=" Best VLSI & Embedded Systems Training institutes of India, located in Bangalore with students placed in 127 companies & top universities globally">
  
    <title>Our-Differentiators-RV-VLSI & Embedded Systems Training institute, students placed in 127 companies- Bangalore, India</title>

	   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	   <link rel="shortcut icon" href="images/favicon.png" />
	  
	   <!-- scripts links -->
	   
	   	<script type="text/javascript" src="js/jquery.openCarousel.js"></script>
		<script type="text/javascript" src="js/classie.js"></script>
	    <script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	    
		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<!--http://dean.edwards.name/packer/-->
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


	   <!-- End scripts links -->
	   <link rel="stylesheet" type="text/css" href="css/style.css">
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
  <div class="clear"></div>
	<div class="">
			<h2 class="heading-title">Our Differentiators</h2>
	</div>
    <div class="contnr">
  
		<section id="slide1" class="main style1 right dark fullscreen" style="padding-bottom:0px !important;">
				<div class="content box style2 slide8">
			<div class="wh-we-r whwer-lftfor-abut">	
				<div class="inner-whwer-lft">
						
						<div class="frst-lft-wwa left-div">
							<a href="http://rv-vlsi.com/program_offerings.php" target="_blank"><p class="cntnt-aatp">Altera Authorized<br />
												  Training Partner
							</p>
							<p class="sub-cntnt-aatp">Offer short duration instructor lead certificate programs in FPGADesign
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
						<p class="contnt-innr-rgt">
							Ninety Three percent of VLSI jobs openings are in the following domains FPGA, ASIC and Embedded Systems. RV-VLSI’s programs prepare for these job openings.

						</p>
						<p class="contnt-innr-rgt-btm">
							Course material and labs are designed by our experts with decades of industry experience to their credit. Fulltime faculties are industry veterans from USA with many working Silicon parts to their credit. 
						</p>
						<a href="#" target="_blank" class="dowld-proscts topopup" ><img alt=""Embedded Systems Training" "Embedded Training in Bangalore" "VLSI Training institutes" "   class="dowld-img" src="images/download-1.png" />Request for Prospectus</a>
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
  
  
  


	
	<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
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
	
	</script>
	
  </body>
</html>