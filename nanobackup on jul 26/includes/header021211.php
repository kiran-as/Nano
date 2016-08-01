<?  include_once('db/dbconfig.php');
?><div class="header">
<div class="header_top">
<div class="headertop_left">
</div>
<div class="headertop_middle">
</div>
<div class="headertop_right">
</div>
</div><!--end of header_top-->
<div class="header_body">
<div class="logo">
<a href="index.php"><img src="images/Nanologo.jpg" width="212" height="70" border="0"  /></a>
</div>
<div class="header_menu">
<div id="ddtopmenubar" class="mattblackmenu">

 <ul>

 <li><a href="contactus.php"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />Contact Us</a></li>

    <!--<li><a href="our_vision.php"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />Our Vision</a></li>-->

  <li><a href="careers.php"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />Careers</a></li>
 
 <? if(($_SESSION[m_id]!='') ||($_SESSION[r_id]!=''))

 {   
    if($_SESSION[m_id])
				  { 
				  ?> 
                  <li> <a href="logout.php" rel="ddsubmenu4" ><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />Logout</a></li>
				  <?
				  }
				  if($_SESSION[r_id])
				  { 
				  ?>
                   <li> <a href="recruiter_logout.php" rel="ddsubmenu4" ><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />Logout</a></li>
                  <? }
 }

   else {?>
    <li><a href="job_seeker_login.php" rel="ddsubmenu3"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />Login</a></li>
<? }?>

      <li><a href="semicon_services.php" rel="ddsubmenu2"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />Services</a></li>

      <li><a href="products.php" class="border_style"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />Products</a></li>

      <li><a href="overview.php" rel="ddsubmenu1"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />About Us</a></li>

<li ><a href="index.php"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0" />Home</a></li>

</ul>

</div>
<script type="text/javascript">

ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")

</script>
<ul id="ddsubmenu1" class="ddsubmenustyle">

<li><a href="overview.php" class="border_top">Overview</a></li>

<li><a href="leadership.php">Leadership Team</a></li>

<li><a href="our_values.php">Our Values</a></li>

<li><a href="our_differentiator.php">Our Differentiator</a></li>
<!--
<li><a href="#">Our Clients</a></li>

<li><a href="#">Locations</a></li>-->

</ul>



<ul id="ddsubmenu2" class="ddsubmenustyle">

<li><a href="semicon_services.php"  class="border_top">Semicon/VLSI Services</a></li>

<li><a href="embedded_system.php">Embedded Systems</a></li>

<li><a href="academic_institutions.php">Academic Institutions</a></li>

</ul>

 <ul id="ddsubmenu3" class="ddsubmenustyle">

<li><a href="job_seeker_login.php" class="border_top">Candidate Login </a></li>

<li><a href="recruiter_login.php">Recruiter Login</a></li>


</ul>
<ul id="ddsubmenu4" class="ddsubmenustyle">

</ul>
<!--
<ul id="ddsubmenu4" class="ddsubmenustyle">

<li><a href="#">news1</a></li>

<li><a href="#">news2</a></li>

<li><a href="#">news3</a></li>

</ul>

<ul id="ddsubmenu5" class="ddsubmenustyle">

<li><a href="#">testimonial1</a></li>

<li><a href="#">testimonial2</a></li>

<li><a href="#">testimonial3</a></li>

</ul>

-->


</div>
</div><!--end of header_body-->
</div><!--end of header-->

<script type="text/javascript">

	$(function() {
		$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				}
			}
		});
	});
	</script>
<script>
function example_ajax_request(dvid) 
{

  $('#ui-tabs-'+dvid).html('<div align="center"><img src="images/ajax-loader-2.gif" width="220" height="19" /></div>');
 // $('#example-placeholder').load("/examples/ajax-loaded.html");
}
</script>


