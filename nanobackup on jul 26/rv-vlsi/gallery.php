<?php
include('detect.php');

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

<script src="js/jquery.colorbox.js"></script>
		<link rel="stylesheet" href="css/colorbox.css" />
<script src="js/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade", width:"auto", height:"auto"});
				$(".group2-320").colorbox({rel:'group2-320', transition:"fade", width:"50%", height:"auto"});
				
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

	   <!-- End scripts links -->
	   <link rel="stylesheet" type="text/css" href="css/style.css">
	   <link rel="stylesheet" href="css/colorbox.css" />
  <link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">

<style>
.imgs-sub {
height: 370px ;
}

.sel-crnses {
padding: 9px;
text-align:left;
font-size:11px;
}

@media only screen and (max-width: 600px) 
{
.imgs-sub {
height: 430px !important;
}
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
			<h2 class="heading-title">Photo Gallery</h2>
	</div>
    <div class="contnr">
  
		<section id="slide1" class="main style1 right dark fullscreen" style="">
				<div class="content box style2 slide8">
			
						
						
		<div id="horizontalTab" class="horiz-tabs hzgal" style="">
            <ul class="resp-tabs-list">
              <!--  <li class="studnts-itms">Events</li>
                <li>Infrastructure</li>-->
            </ul>
            <div class="resp-tabs-container">
                <div>
                    <p class="content-tabs">
						<div class="main-cntr-vedo">
							<div class="main-vdeo-cntnr">
								<div class="images-tetmals">
									<div class="imgs-sub">
										<a class='group2' href="images/gal-img-1.png" ><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/gal-img-1.png" /></a>
										<a class='group2-320' href="images/gal-img-1.png" ><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/gal-img-1.png" /></a>
										  <p class="sel-crnses">Venkatesh Prasad, CEO, RV-VLSI, addressing press meet in Hyderabad</p>
									</div>
								</div>
								<div class="images-tetmals">
										<div class="imgs-sub sncd-lstdeo">
											<a class='group2' href="images/gal-img-2.png" ><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/gal-img-2.png" /></a>
											<a class='group2-320' href="images/gal-img-2.png" ><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/gal-img-2.png" /></a>
											<p class="sel-crnses">Dr. BG Sangameshwar, Principal, Sri Jayachamarajendra College of Engineering, Mysore, Mr.Deepak Kallat, Engineer, Nanochip Solutions, Venkatesh Prasad, CEO, RV-VLSI, Dr. M. K. Panduranga Setty, President, RSST, Prof. K. Subramanian, Director ACIIL-IGNOU, New Delhi, for launch of new course at RV-VLSI.</p>
                                            </div>
								</div>
							<div class="images-tetmals">
										<div class="imgs-sub lst-sidetst">
											<a class='group2' href="images/gal-img-6.png" ><img alt=""Embedded Systems Training" "Embedded Training in Bangalore" "VLSI Training institutes""   src="images/gal-img-6.png" /></a>
											<a class='group2-320' href="images/gal-img-6.png" ><img alt=""Embedded Systems Training" "Embedded Training in Bangalore" "VLSI Training institutes""    src="images/gal-img-6.png" /></a>
											<p class="sel-crnses">Launch of Product Innovation Lab' inauguration at RV-VLSI Design Center, in Bangalore. Seen are Dr. M.K. Panduranga Setty, President, Rashtriya Shikshana Samithi Trust, A.V.S. Murthy, Secretary, RSST, Paul Evans, Mid-range Product Manager, Marketing, Altera Corp., Venkatesh Prasad, CEO, RV-VLSI and Gangatharan Gopal, Country </p>
										</div>
							  </div>
								<div class="images-tetmals">
										<div class="imgs-sub sncd-lstdeo">
											<a class='group2' href="images/gal-img-4.png" ><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/gal-img-4.png" /></a>
											<a class='group2-320' href="images/gal-img-4.png" ><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/gal-img-4.png" /></a>
											<p class="sel-crnses">Design contest Felicitation Ceremony of Dr. Walden C. Rhines, CEO and chairman, Mentor Graphics, graced the occassion along with Hanns Windele, VP Mentor Graphics (Europe &amp; India), Ian Burgess, Higher Education Program, Mentor Graphics,  AVS Murthy, honarary secretary, Rashtreeya Sikshana Samiti Trust, and Dr. MK Panduranga Setty, president, Rashtreeya Sikshana Samiti Trust (RSST).</p>
                                            </div>
								</div>
								<div class="images-tetmals">
										<div class="imgs-sub">
											<a class='group2' href="images/gal-img-5.png" ><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/gal-img-5.png" /></a>
											<a class='group2-320' href="images/gal-img-5.png" ><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/gal-img-5.png" /></a>
											<p class="sel-crnses">The 'ALTERA DE2-115 Develop Kit' being released on the occasion of 'Product Innovation Lab' inauguration at RV-VLSI Design Center, in Bangalore. Seen are Dr. M.K. Panduranga Setty, President, Rashtriya Shikshana Samithi Trust, A.V.S. Murthy, Secretary, RSST, Paul Evans, Mid-range Product Manager, Marketing, Altera Corp., Venkatesh Prasad, CEO, RV-VLSI and Gangatharan Gopal, Country Manager, Altera Corp.</p>
										</div>
								</div>
							
							</div>
						</div>
						
					</p>
					
                </div>
				
                <div>
                    <p class="content-tabs">
						<div class="main-cntr">
							<div class="images-tetmals">
								<div class="imgs-sub">
									<a class='group2' href="images/gal-img-6.png" ><img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="images/gal-img-6.png" /></a>
										<p class="sel-crnses">Launch of Product Innovation Lab' inauguration at RV-VLSI Design Center, in Bangalore. Seen are Dr. M.K. Panduranga Setty, President, Rashtriya Shikshana Samithi Trust, A.V.S. Murthy, Secretary, RSST, Paul Evans, Mid-range Product Manager, Marketing, Altera Corp., Venkatesh Prasad, CEO, RV-VLSI and Gangatharan Gopal, Country  ipsum dolor sit amet</p>		
								</div>
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