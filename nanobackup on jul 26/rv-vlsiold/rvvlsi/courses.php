<?php
include("application/conn.php");
include('detect.php');
$resultsss = "SELECT * FROM tbl_programs where Programtype=1 and Active=1";

	$resultc = mysql_query($resultsss);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $rvvlsicourses[$s]["idprograms"]	= $row["idprograms"];
		  $rvvlsicourses[$s]["Description"]	= $row["Description"];
		   $rvvlsicourses[$s]["Title"]	= $row["Title"];
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
		
		
?><!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
<meta name="description" content=" Best VLSI & Embedded Systems Training institutes of India, located in Bangalore with students placed in 127 companies & top universities globally">
  
    <title>Courses-RV-VLSI & Embedded Systems Training institute, students placed in 127 companies- Bangalore, India</title>

	   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	   <link rel="shortcut icon" href="images/favicon.png" />
	  
	   <!-- scripts links -->
	   
	   	<script type="text/javascript" src="js/jquery.openCarousel.js"></script>
		<script type="text/javascript" src="js/classie.js"></script>
	    <script type="text/javascript" src="js/jquery.min.js"></script>
	   
	    
	   
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
       
       <!--pop-up scripts-->
       <link rel="stylesheet" href="css/reveal.css">	
	  	
		<!-- Attach necessary scripts -->
		<!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="js/jquery.reveal.js"></script>
		
		
	   <!--end-->
</head>

  

  <body>
  <header>
  <?php include('header.php');?> 
  </header>
  
  
  
  <article>
  <div class="clear"></div>
	<div class="">
			<h2 class="heading-title">Programs Offering</h2>
	</div>
	<br/>
	<br/>
    <div class="contnr">
  
		<section id="slide1" class="main style1 right dark fullscreen" style="">
				<div class="content box style2 slide8">
					<div class="wh-we-r wh-we-course">
						<div class="lft-cntnr">
							<p class="light-para">
							
							RV-VLSI's programs prepare you for jobs in the FPGA, ASIC and Full-custom and Embedded Systems domains in product and service companies across the globe. The course material is thoroughly reviewed and certified by Nanochip Solutions and is delivered by industry experts using industry standard software tools and process technologies.
                            </p>
						
                        	<p class="light-small-para" style="padding-bottom:20px;">
							Our programs are learner centric and provide every student the opportunity to learn at their own pace and acquire the necessary skills to become employable.
                            </p>
                            
                            <h2 class="bold-title-vlsi" style="font-family: 'robotomedium';font-size: 20px;padding-bottom: 15px;text-align: left;">Benefits and Differentiators :</h2>
                            
							<p class="light-small-para">
							We recognize the need for today's engineers to have the necessary soft-skills like communication and presentation skills, goal setting and time management, email etiquette and team building. These are embedded into the program structure. Regular interactions with our industry faculty will help you transform from an engineer to a professional with a low time to be productive to the industry.
							</p>
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
							<h2 class="bold-title-vlsi">RV-VLSI COURSES</h2>
							<p class="light-small-para-main">
				Weather you are looking to add value to your engineering degree or preparing for higher studies abroad or want to be job ready we a course that suites your goals and aspirations in VLSI and Embedded Systems
                			</p>
							
							<table width="100%" class="tble-for-corse" border="0" cellpadding="0" cellspacing="0">
								<tr style="background:#eef0f2;">
									<th class="med-curs frst-pading">Courses</th>
									
								</tr>
								<?php for($i=0;$i<count($rvvlsicourses);$i++){?>
								
								<tr>
									<td class="reglr-curs frst-pading"><a href="#" class="big-link" data-reveal-id="myModal">
									<?php echo $rvvlsicourses[$i]['Title'];?></a></td>
									
									
								</tr>
								<?php }?>
								
								<tr>
								<td>&nbsp;</td>
								</tr>
								
								<tr style="background:#eef0f2;">
									<th class="med-curs frst-pading">Altera Courses<br/>
									1) Digital System Design & Implementation: made easy</th>
									
								</tr>
								<?php for($i=0;$i<count($alteraonecourses);$i++){?>
								
								<tr>
									<td class="reglr-curs frst-pading">
									
									<a href="#" class="big-link" data-reveal-id="myModal">
									<?php echo $alteraonecourses[$i]['Title'];?></a></td>
									
									
								</tr>
								<?php }?>
								
								<tr>
								
								
								<tr style="background:#eef0f2;">
									<th class="med-curs frst-pading">
									2) High Performance Digital System Design Techniques</th>
									
								</tr>
								<?php for($i=0;$i<count($alteratwocourses);$i++){?>
								
								<tr>
									<td class="reglr-curs frst-pading"><a href="#" class="big-link" data-reveal-id="myModal">
									<?php echo $alteratwocourses[$i]['Title'];?></a></td>
									
									
								</tr>
								<?php }?>
								
								<tr>
								
								
								<tr style="background:#eef0f2;">
									<th class="med-curs frst-pading">3) Advanced Embedded Systems Design using NIOS II Soft Processor</th>
									
								</tr>
								<?php for($i=0;$i<count($alterathreecourses);$i++){?>
								
								<tr>
									<td class="reglr-curs frst-pading"><a href="#" class="big-link" data-reveal-id="myModal">
									<?php echo $alterathreecourses[$i]['Title'];?></a></td>
									
									
								</tr>
								<?php }?>
								
								<tr>
								<td class="buttons-ev" style="text-align:center;">
								
								<a href="index.html#slide6" class="enqry-nw">Enquire Now</a>
								</td>
								</tr>
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
  
  
  <div id="myModal" class="reveal-modal">
			<h1 style="color:red; font-size:26px;"> Advanced Diploma in ASIC Design (ADAD) <br></h1>

 <h3 style="color:red; font-size:20px;">Course Description</h3>
            <br>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

<br><br><br>

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

            </p>
			<a class="close-reveal-modal">&#215;</a>
		</div>


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