<?php
include('application/conn.php');

@mysql_query("SET NAMES 'utf8'"); /// Its very inportant to display or insert unicode characters in db 
$cresult = @mysql_query("SELECT unicodeText FROM doc_test"); 
while ($crow = @mysql_fetch_array($cresult,MYSQL_ASSOC)) 
{ 
$abc = rawurldecode($crow['unicodeText']); 
} 


if($_POST)
{
	
  $txt= rawurlencode($_POST['ta']); // get the unicode text from a submit action. 
$unicodeText = $txt; 
@mysql_query("SET NAMES 'utf8'"); /// Its very inportant to display or insert unicode characters in db 
$sql = "insert into doc_test (unicodeText) values ('".$unicodeText."')" ; 
mysql_query($sql);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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
  </head>

  <body>
  <form name="Resume" method="POST" action=''>
   <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    <p class="font16-sm brd-btm">Personal Information</p>
    <div class="row">
      <div class="col-sm-3">
        <label class="control-label"><span class="font-gray">
<textarea name="ta" rows="10" cols="80"> <?php echo $abc;?></textarea>                    
    </div> 
   
   <!--  <p class="font16-sm brd-btm pad-t10">Technical Skills</p>
<ul class="content-list">
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
</ul>      -->
    </div> 
    <div class="clearfix brd-top pad-t20">
    <input type="submit" name="Save" id="Save" class="btn btn-primary pull-right">
    </div>
    </form>

    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
