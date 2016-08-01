<?php
$pagenamearray = explode('/Nano/',$_SERVER['REQUEST_URI']);
if($pagenamearray[1]=='index.php') {
   $activehomeclass = 'active';
}
if($pagenamearray[1]=='contact.php') {
   $activecontactclass = 'active';
}
if($pagenamearray[1]=='overview.php') {
   $activeaboutusclass = 'active';
}
if($pagenamearray[1]=='leadership.php') {
   $activeaboutusclass = 'active';
}
if($pagenamearray[1]=='our_values.php') {
   $activeaboutusclass = 'active';
}
if($pagenamearray[1]=='services.php') {
   $activeservicesclass = 'active';
}
if($pagenamearray[1]=='embedded_system.php') {
   $activeservicesclass = 'active';
}
if($pagenamearray[1]=='academic_institutions.php') {
   $activeservicesclass = 'active';
}

?>
    <header class="navbar navbar-static-top main-header" id="top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a href="#" class="navbar-brand">Nanochipsolutions</a></div>
            <nav id="bs-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?php echo $activehomeclass;?>"><a href="index.php">Home</a></li>
                    <li class="dropdown <?php echo $activeaboutusclass;?>" >
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="overview.php">Overview</a></li>
                        <li><a href="leadership.php">Leadership Team</a></li>
                        <li><a href="our_values.php">Our Values</a></li>
<!--                         <li><a href="#">Our Differentiator</a></li>
 -->                      </ul>
                    </li>
<!--                     <li><a href="#">Products</a></li>  
 -->                    <li class="dropdown <?php echo $activeservicesclass;?>">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="services.php">Semicon/VLSI Services</a></li>
                        <li><a href="embedded_system.php">Embedded Systems</a></li>
                        <li><a href="academic_institutions.php">Academic Institutions</a></li>
                      </ul>
                    </li>   
<!--                     <li><a href="#">Careers</a></li> 
 -->                    <li><a href="contact.php" class="<?php echo $activecontactclass;?>">Contact Us</a></li>       
                        <li><a href="college/index.php" class="<?php echo $activecontactclass;?>">Candidate Login</a></li>               
                        <li><a href="college/recruiter/index.php" class="<?php echo $activecontactclass;?>">Recruiter Login</a></li>                       
                    <li style='display:none'>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="college/index.php">Candidate Login</a><span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="college/index.php">Candidate Login</a></li>
                        <li><a href="college/recruiter/index.php">Recruiter Login</a></li>
                      </ul>
                    </div> 
                    </li>                                                                        
                </ul>
            </nav>
        </div>
    </header> 
    
