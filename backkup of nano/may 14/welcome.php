<?php
include('application/conn.php');
include('include/settingmessage.php');

$idstudent = $_SESSION['idstudent'];
 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nanochip Solutions</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->  
    <script>
     function fnNext()
     {
          parent.location='profileInformation.php';
     }
    </script> 
  </head>

  <body>
      <form action="" method="POST" id="academicProject">
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t10">
        
          <div class="row">
           <div class="col-sm-12">
            <div class="form-horizontal">
             
              <div class="form-group">
                <div class="col-sm-12">
                  <?php echo $welcomepage;?>
                </div>               
              </div> 
                                              
                                 
            </div>
            </div>
            </div>
                     
            <div class="clearfix brd-top pad-t20">
                <button type="button" id="saveAndContinue" class="btn btn-primary pull-right" onclick="fnNext();">Continue</button>       
            </div> 
            </div>                   
     

    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      </form>
  </body>
</html>
