<?php
include("application/conn.php");
$idstudent = $_SESSION['idstudent'];
if($_POST)
{
   
    $projecttitle = $_POST['projecttitle'];
    $college = $_POST['college'];
    $months = $_POST['months'];
    $role = $_POST['role'];
    $teamsize = $_POST['teamsize'];
    $projectdescription = $_POST['projectdescription'];
    $tools = $_POST['tools'];
    $challenges = $_POST['challenges'];
    mysql_query("Insert into tbl_academicproject(project_title,college_name ,"
            . "time_duration,role,team_size,tools_used,"
            . "challenges,idstudent) Values ('$projecttitle','$college',"
            . "'$months','$role','$teamsize','$tools','$challenges','$idstudent')");
     
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
      <form action="" method="POST"> 
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    <div class="row">
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <div class="form-group">
            <label class="col-sm-5 control-label">Project Title <span class="error-text">*</span></label>
            <div class="col-sm-6">
              <input type="name" class="form-control" placeholder="" id="projecttitle" name="projecttitle">
            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-5 control-label">College / Institute / College <span class="error-text">*</span></label>
            <div class="col-sm-6">
              <input type="name" class="form-control" placeholder="" id="college" name="college">
            </div>        
          </div>
          <div class="form-group">
            <label class="col-sm-5 control-label">Duration(in months) <span class="error-text">*</span></label>
            <div class="col-sm-3">
              <input type="name" class="form-control" placeholder="" id="months" name="months">
            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-5 control-label">Role <span class="error-text">*</span></label>
            <div class="col-sm-6">
              <input type="name" class="form-control" placeholder="" id="role" name="role">
            </div>        
          </div> 
          <div class="form-group">
            <label class="col-sm-5 control-label">Team Size <span class="error-text">*</span></label>
            <div class="col-sm-3">
              <select class="form-control" id="teamsize" name="teamsize">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
              </select>
            </div>                                 
          </div>                   
          <div class="form-group">
            <label class="col-sm-5 control-label">Project Description</label>
            <div class="col-sm-6">
              <textarea class="form-control" rows="2" id="projectdescription" name="projectdescription"></textarea>
            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-5 control-label">Tools Used</label>
            <div class="col-sm-6">
              <textarea class="form-control" rows="2" id="tools" name="tools"></textarea>
            </div>        
          </div>
          <div class="form-group">
            <label class="col-sm-5 control-label">Challenges</label>
            <div class="col-sm-6">
              <textarea class="form-control" rows="2" id="challenges" name="challenges"></textarea>
            </div>        
          </div>                                           
    </div>    
    </div> 
    <div class="clearfix brd-top pad-t20">
        <button type="submit" class="btn btn-primary pull-right">SAVE & CONTINUE</button>       
        <button type="submit" class="btn btn-default pull-right mar-r20">RESET</button>        
    </div>       
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
