<?php
include('detect.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
<meta name="description" content=" Best VLSI & Embedded Systems Training institutes of India, located in Bangalore with students placed in 257 companies & top universities globally">
  
    <title>Contacts-RV-VLSI & Embedded Systems Training institute, students placed in 127 companies- Bangalore, India</title>

	   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	   <link rel="shortcut icon" href="images/favicon.png" />
	  
	   <!-- scripts links -->
	   
	   	
		<script type="text/javascript" src="js/classie.js"></script>
	    <script type="text/javascript" src="js/jquery.min.js"></script>
		
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
			<h2 class="heading-title">Contact Us</h2>
	</div>
    <div class="contnr">
  
		<section id="slide1" class="main style1 right dark fullscreen" style="">
				<div class="content box style2 slide8">
			<div class="wh-we-r whwer-lftfor-abut wh-wefor-contact">	
				<div class="lft-cu lft-cu-for-cnct-us">
				
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
						
                    </table>
             

			 </div>
					
					<div class="rgt-cu last-mapgogle">
					
			<form action="contactformmailer.php"  name="scont_form" id="scont_form" method="POST" onsubmit="return formvalidation();">
              		
		<table class="" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left"><input class="enq-reg-inpt-cu" type="text" id="scont_name" name="scont_name" value="" placeholder="name" /></td>
    
	</tr>
  <tr>
  <td align="left"><input class="enq-reg-inpt-cu" id="scont_email" type="text" name="scont_email" value="" placeholder="email"/></td>
  </tr>
  <tr>
    <td align="left"><input class="enq-reg-inpt-cu" type="text" id="scont_mobile" name="scont_mobile" value="" placeholder="mobile"/></td>
    </tr>
  <tr><td align="left"><textarea id="scont_msg" name="scont_msg" class="enq-reg-inpt-cu message-box-fld"  value="" placeholder="message"></textarea></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" class="enq-nw-cu" name="submit" value="Send" /></td>
    
  </tr>
</table>
           
</form>
		   </div>
					<div class="clear"></div>
			      <div class="iframe-contact-us">
				  	
			<iframe class="cntct-us" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.7648904814364!2d77.59288599999996!3d12.922826999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae15a771b08f65%3A0x36131b509aa218c7!2sRV-VLSI+Design+Center!5e0!3m2!1sen!2s!4v1402641328936" width="100%" height="220" frameborder="0" style="border:0"></iframe>
              
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
  </body>
</html>