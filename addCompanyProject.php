<?php

include("application/conn.php");
$idstudent = $_SESSION['idstudent'];
if($_POST)
{
   
  
    $projecttitle = $_POST['projecttitle'];
    $designation = $_POST['designation'];
    $company = $_POST['company'];
    $months = $_POST['months'];
    $role = $_POST['role'];
    $teamsize = $_POST['teamsize'];
    $projectdescription = $_POST['projectdescription'];
    $tools = $_POST['tools'];
    $challenges = $_POST['challenges'];
     $designation = $_POST['designation'];
    $start_date = date('Y-m-d',  strtotime($_POST['start_date']));
    $end_date = date('Y-m-d',  strtotime($_POST['end_date']));

    mysql_query("Insert into tbl_companyproject(designation,project_title,company_name ,"
            . "time_duration,role,team_size,tools_used,"
            . "challenges,idstudent,start_date,end_date,project_description) Values ('$designation','$projecttitle','$company',"
            . "'$months','$role','$teamsize','$tools','$challenges','$idstudent','$start_date','$end_date','$projectdescription')");
    echo "<script>parent.location='companyProjects.php'</script>" ;
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
   
   <script>
  $(function() {
    $( "#start_date" ).datepicker();
    $( "#end_date" ).datepicker();
  });
  </script>
<script>
 
 $(document).ready(function() {
   $('#saveAndContinue').click(function() {
                
                $('#academicProject').submit();
            });
            $("#academicProject").validate({
                // Specify the validation rules
                rules: {
                    start_date: "required",
                    company:"required",
                    projecttitle: "required",
                    role:"required",
                    end_date: "required",
                    designation:"required",                                        
                },
                // Specify the validation error messages
                 // Specify the validation error messages
                messages: {
                    start_date: "<p class='error-class'>Please enter start Date</p>",
                    projecttitle: "<p class='error-class'>Please enter Project Title </p>",
                    role: "<p class='error-class'>Please enter Role</p>",
                    end_date: "<p class='error-class'>Please enter End Date</p>",
                    company: "<p class='error-class'>Please enter Company Name</p>",
                    designation: "<p class='error-class'>Please enter Designation</p>"
                }
            });
 });
  </script>
  </head>

  <body>
      <form action="" method="POST" id="academicProject" name="academicProject"> 
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <div class="row">
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <div class="form-group">
            <label class="col-sm-4 control-label">Company Name <span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="Enter Company Name" id="company" name="company">
            </div>        
          </div> 
          <div class="form-group">
            <label class="col-sm-4 control-label">Project Title<span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="Enter Project Title" id="projecttitle" name="projecttitle">
            </div>        
          </div> 
                                                   
      </div>    
    </div> 

    <div class="form-horizontal col-sm-6">
             <div class="form-group">
            <label class="col-sm-4 control-label">Designation <span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="Enter Designation" id="designation" name="designation">
            </div>        
          </div> 
          <div class="form-group">
            <label class="col-sm-4 control-label">Team Size <span class="error-text">*</span></label>
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
     </div>      
    </div> 
    <div class="row">
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <div class="form-group">
            <label class="col-sm-4 control-label">Start Date <span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="Start date of project" id="start_date" name="start_date">
            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-4 control-label">Role<span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="Enter your role on the project" id="role" name="role">            </div>        
          </div>                                           
      </div>    
    </div> 

    <div class="form-horizontal col-sm-6">
          <div class="form-group">
            <label class="col-sm-4 control-label">End Date<span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="End date of the project" id="end_date" name="end_date">
            </div>        
          </div>  
                                                                             
     </div>      
    </div> 
    <div class="row">
      <div class="col-xs-12">
      <div class="form-horizontal">
         
          <div class="form-group">
            <label class="col-sm-2 control-label">Project Description</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" Placeholder="Describe the unique feature of project" id="projectdescription" name="projectdescription"></textarea>
            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-2 control-label">Tools Used</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" Placeholder="Specify the software and hardware boards used" id="tools" name="tools"></textarea>
            </div>        
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Challenges Faced</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" id="challenges" Placeholder="List the challenges you faced while executing the project" name="challenges"></textarea>
            </div>        
          </div>          
      </div>
        
      </div>
    </div>

    <div class="clearfix brd-top pad-t20">
        <button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">SAVE & CONTINUE</button>       
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
    
    
  </body>
</html>
