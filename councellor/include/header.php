<?php
include('../application/conn.php');
if($_SESSION['idcouncellor']=='')
{
  echo "<script>alert('Your Session has expired, Please login again');</script>";
  echo "<script>parent.location='index.php'</script>";
  exit;
}
?>
<header>
        <div class="navbar navbar-inverse top--header" role="navigation">
          <div class="container">
            <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>             
              <a href="#" class="navbar-brand logo logo--small mar-t10 mar-b10">Nanochip Solutions</a>              
            </div> 
            <div class="row">
            <div class="navbar-right">
            <div id="navbar" class="navbar-collapse collapse">  
               <div class="clearfix">
                <ul class="nav navbar-nav header-nav">
                 <li>Welcome <?php echo $_SESSION['councellorName'];?></li>
                  <li class=""><a href="index.php" class="pad-sm-t13 pad-sm-b12">Logout</a></li>                                  
                </ul>                   
               </div>                                            
            </div>    
            </div>                  
            </div>                           
          </div>
        </div>      
    </header> <!--/Header Ends-->