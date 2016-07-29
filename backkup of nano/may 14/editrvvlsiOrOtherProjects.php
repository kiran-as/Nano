<?php

include("application/conn.php");
$idstudent = $_SESSION['idstudent'];

$idacademicproject=$_GET['idacademicproject'];
$projectDetailsSql = mysql_query("Select * from tbl_academicproject where idacademicproject='$idacademicproject'");
while($row = mysql_fetch_assoc($projectDetailsSql))
{
       $projecttitle = $row['project_title'];
    $college = $row['college_name'];
    $months = $row['time_duration'];
    $role = $row['role'];
    $teamsize = $row['team_size'];
    $projectdescription = $row['project_description'];
    $tools = $row['tools_used'];
    $challenges = $row['challenges'];
}
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
    mysql_query("Update tbl_academicproject set project_title='$projecttitle',"
            . "college_name='$college',time_duration='$months',"
            . "team_size='$teamsize',project_description='$projectdescription',"
            . "tools_used='$tools',role='$role',challenges='$challenges' "
            . "where idacademicproject='$idacademicproject'");

    echo "<script>parent.location='rvvlsiOrOtherProjects.php'</script>";
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
 <script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.validation.js"></script>
<script src="js/customised_validation.js"></script>
 <script>
 $(document).ready(function() {

                
                
            $("#rvvlsiorotherprojects").validate({

                rules: {
                    projecttitle: "required",
                    months: "required",
                    college: "required",
                    role: "required", 
                },
                // Specify the validation error messages
                messages: {
                    projecttitle: "Please enter Project Name",
                    months: "Please enter no of Months",
                    college: "Please enter the place",
                    role: "Please enter your Deliverables",
                   
                }
            });
 });
  </script>  
  </head>

  <body>
      <form action="" method="POST" id="rvvlsiorotherprojects"> 
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    <div class="row">
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <div class="form-group">
            <label class="col-sm-4 control-label">Project Title <span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="" id="projecttitle" name="projecttitle" value="<?php echo $projecttitle;?>">
            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-4 control-label">Duration(in months) <span class="error-text">*</span></label>
            <div class="col-sm-3">
              <input type="name" class="form-control" placeholder="" id="months" name="months" value="<?php echo $months;?>">
            </div>        
          </div>                                           
    </div>    
    </div> 

    <div class="form-horizontal col-sm-6">
          <div class="form-group">
            <label class="col-sm-4 control-label">Done At<span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="" id="college" name="college" value="<?php echo $college;?>">
            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-4 control-label">Team Size <span class="error-text">*</span></label>
            <div class="col-sm-3">
              <select class="form-control" id="teamsize" name="teamsize">
                  <option value="1" <?php if($teamsize=='1'){echo "selected=selected";}?>>1</option>
                  <option value="2" <?php if($teamsize=='2'){echo "selected=selected";}?>>2</option>
                  <option value="3" <?php if($teamsize=='3'){echo "selected=selected";}?>>3</option>
                  <option value="4" <?php if($teamsize=='4'){echo "selected=selected";}?>>4</option>
                  <option value="5" <?php if($teamsize=='5'){echo "selected=selected";}?>>5</option>
                  <option value="6" <?php if($teamsize=='6'){echo "selected=selected";}?>>6</option>
              </select> 
            </div>                                 
          </div>                                                                     
    </div>          
    </div> 
    <div class="row">
      <div class="col-xs-12">
      <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label">Your Deliverables <span class="error-text">*</span></label>
            <div class="col-sm-10">
              <input type="name" class="form-control" placeholder="" id="role" name="role" value="<?php echo $role;?>" onkeyup="countCharbannertext(this,'role_countlabel','150')";>
                           <span class='info-text' id='role_countlabel'>Maximum 150 Chars (with spaces)

            </div>        
          </div> 
                  
          <div class="form-group">
            <label class="col-sm-2 control-label">Project Deliverables</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" id="projectdescription" name="projectdescription" onkeyup="countCharbannertext(this,'projectdescription_countlabel','250')";><?php echo $projectdescription;?></textarea>
                           <span class='info-text' id='projectdescription_countlabel'>Maximum 250 Chars (with spaces)            

            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-2 control-label">Tools Used</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" id="tools" name="tools" onkeyup="countCharbannertext(this,'tools_countlabel','250')";><?php echo $tools;?></textarea>
               <span class='info-text' id='tools_countlabel'>Maximum 250 Chars (with spaces)            
           
            </div>        
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Challenges Faced</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" id="challenges" name="challenges" onkeyup="countCharbannertext(this,'challenges_countlabel','250')"  ;><?php echo $challenges;?></textarea>
               <span class='info-text' id='challenges_countlabel'>Maximum 250 Chars (with spaces)            
           
            </div>        
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
    

  </body>
</html>
