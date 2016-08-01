<?php
include('detect.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
<meta name="description" content=" Best VLSI & Embedded Systems Training institutes of India, located in Bangalore with students placed in 127 companies & top universities globally">
  
    <title>Rashtreeya Sikshana Samiti Trust - Placed in 127 companies globally” – “Working in 250+ companies in India and Abroad.</title>

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
			<h2 class="heading-title">Rashtreeya Vidyalaya (RV) Group of Educational Institutions</h2>
	</div>
    <div class="contnr">
  
		<section id="slide1" class="" style="padding-top: 45px !important; padding-bottom: 0px;">
				<div class="content box style2 slide8">
			
						
						
		<div id="horizontalTab" class="hzgal horiz-tabs">
		
            
            <div class="resp-tabs-container tst-mnl">
                <div>
                    <p class="content-tabs">
					<div class="main-cntr">
					
						<div class="rgt-testmlns">
							
							Rashtreeya Vidyalaya (RV) Group of Educational Institutions is a conglomerate of 24 educational institutions run by the Rashtreeya Sikshana Samiti Trust (RSST) consists of philanthropists, businessmen, professionals and academicians. The institutions range from schools to professional colleges offering management, dental, engineering, nursing and teacher education.  <br/><br/>


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