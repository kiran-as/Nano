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
  
    <title>Courses-RV-VLSI & Embedded Systems Training institute, students placed in 127 companies- Bangalore, India</title>

	   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	  	  
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


	   <!-- End scripts links -->
	   <link rel="stylesheet" type="text/css" href="css/style.css">
	   
</head>


  

  <body>
  <header>
  <?php include('header.php');?> 
  </header>
  
  
  
  <article>
  <div class="clear"></div>
	<div class=""><br/>
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
							<h2 class="bold-title-vlsi">RV-VLSI PROGRAMS</h2>
							<p class="light-small-para-main">
				Weather you are looking to add value to your engineering degree or preparing for higher studies abroad or want to be job ready we a course that suites your goals and aspirations in VLSI and Embedded Systems
                			</p>
							
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
								  <td><input class="coursesregistercursor" type="submit" name="join-now" value="Join Now" /></td>
									
									
								</tr>
								<?php }?>
								
								<tr>
								<td>&nbsp;</td>
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
									<td width='20%'><input class="coursesregistercursor" type="submit" name="join-now" value="REGISTER" /></td>
									
									
								</tr>
								<?php }?>
								<?php for($i=0;$i<count($alteratwocourses);$i++){?>
								
								<tr>
									<td class="reglr-curs frst-pading"><a href="#" class="big-link" data-reveal-id="myModal<?php echo $alteratwocourses[$i]['idprograms'];?>">
									<?php echo $alteratwocourses[$i]['Title'];?></a></td>
									<td width='20%'><input class="coursesregistercursor" type="submit" name="join-now" value="REGISTER" /></td>
									
								</tr>
								<?php }?>
								<?php for($i=0;$i<count($alterathreecourses);$i++){?>
								
								<tr>
									<td class="reglr-curs frst-pading"><a href="#" class="big-link" data-reveal-id="myModal<?php echo $alterathreecourses[$i]['idprograms'];?>">
									<?php echo $alterathreecourses[$i]['Title'];?></a></td>
									<td width='20%'><input class="coursesregistercursor" type="submit" name="join-now" value="REGISTER" /></td>
									
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