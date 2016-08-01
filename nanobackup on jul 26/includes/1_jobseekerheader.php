<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

 $check=new checkingAuth();
   $check->loginCheck();   

	
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   ?>
   <div class="header">
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
<a href="index.php"><img src="images/Nanologo.jpg" width="212" height="80" border="0"  /></a>
</div>
<div align="right">
	<strong>Welcome &nbsp;<?=ucfirst($_SESSION['username']);?></strong>
</div>
<div class="header_menu">
<div id="ddtopmenubar" class="mattblackmenu">
<ul>
   



 <li ><a href="logout.php"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0" />Logout</a></li>


           <li><a href="change_password.php" class="border_style"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />Change Password</a></li>


 <li><a href="resume.php" class="border_style"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />View Resume</a></li>
 
 <li><a href="1_personal_info.php" class="border_style"><img class="menu_arrow" src="images/content_arrow.jpg" width="9" height="9" border="0"  />Edit Resume</a></li>

</ul>

</div>


<script type="text/javascript">

ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")

</script>

<!--

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


