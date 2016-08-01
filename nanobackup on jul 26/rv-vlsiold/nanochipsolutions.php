<?php
include('detect.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
<meta name="description" content=" Best VLSI & Embedded Systems Training institutes of India, located in Bangalore with students placed in 127 companies & top universities globally">
  
    <title>Rashtreeya Sikshana Samiti Trust</title>

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
	   
  <link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
  <style>
  .rgt-testmlns
  {
    font-style:none !important;
  }
  </style>
</head>

  

  <body>
  <header>
 <?php include('header.php');?>
  </header>
  
  
  
  <article>
  <div class="clear"></div>
	<div class="">
			<h2 class="heading-title">Nanochipsolution</h2>
	</div>
    <div class="contnr">
  
		<section id="slide1" class="" 
		style="padding-top: 222px !important; padding-bottom: 0px;">
										
						
		<div id="horizontalTab" class="">
		
           
            <div class="resp-tabs-container tst-mnl">
			
                <div>
				
                    <p class="content-tabs">
					<div class="main-cntr">
					
						<div class="rgt-testmlns">
							Nanochipsolution is your one stop shop for highly skilled professionals with expertise on Analog, Digital ASIC , AMS Design & and Embedded design methodologies.
Our engineers are thorough professionals with good work ethics and a deep rooted desire to help you with your technology needs.<br/><br/>

Nanochip Solutions Pvt. Ltd. Is a technology service provider in the area of VLSI and Embedded Systems. Our thrust areas are Telecommunications, Renewable Energy, DSP, Consumer Electronics, Multimedia and gaming, Medical Electronics and other emerging technologies.<br/><br/>

We offer solutions to implementation challenges related to advanced process / technology nodes. We offer solutions for the complete development of Analog, Digital and Mixed Signal VLSI design solutions.<br/><br/>

As part of its corporate social responsibility Nanochip Solutions donates a portion of its revenue to professional institutions who are working to help bridge the industry academia gap.<br/><br/>
						</div>
					</div>
						</p>
                </div>
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