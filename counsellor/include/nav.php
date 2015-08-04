<?php
$urlname = explode('/councellor/',$_SERVER['REQUEST_URI']);
$studentDetails = '';
$admission = '';

if($urlname[1]=='studentDetails.php' || $urlname[1]=='editStudent.php' || $urlname[1]=='addNewStudent.php')
{
   $studentDetails = 'active';
}
if($urlname[1]=='admission.php')
{
   $admission = 'active';
}
?>
<div class="main-nav-wrapper">
       <nav class="container">
           <ul class="main-nav clearfix">
               <li class="<?php echo $studentDetails;?>"><a href="studentDetails.php">Enquiries</a></li>
                <li class="<?php echo $admission;?>"><a href="admission.php">Admission</a></li>
           </ul>
       </nav>
    </div>
  <nav class="main-nav">
                <div class="container p-relative">
                   <div class="clearfix">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
</div>                                           
                        <div id="navbar" class="navbar-collapse collapse clearfix">
                            <ul class="nav navbar-nav header-nav">
                                <li><a href="courses.php" class="pad-sm-t13 pad-sm-b12">Courses</a>
                                </li>
                                <li><a href="our_differentiators.php" class="pad-sm-t13 pad-sm-b12">About Us</a>
                                </li>
                               
                                <li><a href="placements.php" class="pad-sm-t13 pad-sm-b12">Placements</a>
                                </li>
                                <li><a href="testimonial.php" class="pad-sm-t13 pad-sm-b12 pad-r0">Testimonials</a>
                                </li>
                                <li><a href="faq.php" class="pad-sm-t13 pad-sm-b12 pad-r0">FAQ</a>
                                </li>
                                <li><a href="gallery.php" class="pad-sm-t13 pad-sm-b12 pad-r0">Gallery</a>
                                </li>
                                <li><a href="contact_us.php" class="pad-sm-t13 pad-sm-b12 pad-r0">Contact Us</a>
                                </li>
                                <li style='display:none'><a href="#" class="pad-sm-t13 pad-sm-b12 pad-r0">B.E Projects</a>
                                </li>                                
                            </ul>                           
                        </div>
                                                                                              
                </div>
            </nav>
    <!--/Main Nav Ends-->