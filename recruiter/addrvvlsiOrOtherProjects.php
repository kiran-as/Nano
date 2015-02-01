<?php
include("../application/conn.php");
$idrecruiter = $_SESSION['idrecruiter'];
if($_POST)
{
       $job_description = $_POST['jobDescription'];
    $job_title = $_POST['jobTitle'];
    $minqualification = $_POST['minqualification'];
    for($i=0;$i<count($_POST['discipline']);$i++)
    {
       $discipline.= $_POST['discipline'][$i];
    }

    mysql_query("Insert into tbl_recruitement(recruitementposition,job_description ,"
            . "job_title,min_qualification,discipline,idrecruiter)
             Values ('$job_title','$job_description',"
            . "'$job_title','$minqualification','$discipline','$idrecruiter')");
    header('Location:recruitementList.php');
    exit;
     
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nanochip Solutions</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      <form action="" method="POST"> 
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    <div class="row">
      <div class="form-horizontal">
           
          <div class="form-group">
            <label class="col-sm-2 control-label">Job Description</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" id="jobDescription" name="jobDescription"></textarea>
            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-2 control-label">Job Title</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" id="jobTitle" name="jobTitle"></textarea>
            </div>        
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Min Qualification</label>
            <div class="col-sm-10">
                    <label class="radio-inline">
                      <input type="radio" name="minqualification" id="minqualification" value="BE"> BE
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="minqualification" id="minqualification" value="ME" >ME
                    </label>        
            </div>          
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Select Discipline</label>
            <div class="col-sm-10">
                    <label class="checkbox-inline">
                      <input type="checkbox" name="discipline[]" value="EE"> E&E
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="discipline[]"  value="EC" > E&C
                    </label>        
            </div>          
          </div>
      </div>
    </div>

    <div class="clearfix brd-top pad-t20">
        <button type="submit" class="btn btn-primary pull-right">SAVE & CONTINUE</button>       
        <button type="submit" class="btn btn-default pull-right mar-r20">RESET</button>        
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
    
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>
