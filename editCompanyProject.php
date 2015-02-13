<?php

include("application/conn.php");
$idstudent = $_SESSION['idstudent'];

$idcompanyproject=$_GET['idcompanyproject'];
$projectDetailsSql = mysql_query("Select * from tbl_companyproject where idcompanyproject='$idcompanyproject'");
while($row = mysql_fetch_assoc($projectDetailsSql))
{
    
       $projecttitle = $row['project_title'];
    $company = $row['company_name'];
    $months = $row['time_duration'];
    $role = $row['role'];
    $teamsize = $row['team_size'];
    $projectdescription = $row['project_description'];
    $tools = $row['tools_used'];
    $challenges = $row['challenges'];
       $start_date = $row['start_date'];
    $end_date = $row['end_date'];
}
if($_POST)
{
 
    $projecttitle = $_POST['projecttitle'];
    $company = $_POST['company'];
    $months = $_POST['months'];
    $role = $_POST['role'];
    $teamsize = $_POST['teamsize'];
    $projectdescription = $_POST['projectdescription'];
    $tools = $_POST['tools'];
    $challenges = $_POST['challenges'];
       $start_date = date('Y-m-d',  strtotime($_POST['start_date']));
    $end_date = date('Y-m-d',  strtotime($_POST['end_date']));
    mysql_query("Update tbl_companyproject set project_title='$projecttitle',"
            . "company_name='$company',time_duration='$months',"
            . "team_size='$teamsize',project_description='$projectdescription',"
            . "tools_used='$tools',role='$role',challenges='$challenges',start_date='$start_date',end_date='$end_date', "
            . "where idcompanyproject='$idcompanyproject'");
     
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
 
   <script>
  $(function() {
    $( "#start_date" ).datepicker();
    $( "#end_date" ).datepicker();
  });
  </script>
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
            <label class="col-sm-4 control-label">Company Name <span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="" id="company" name="company" value="<?php echo $company;?>">
            </div>        
          </div> 
          <div class="form-group">
            <label class="col-sm-4 control-label">Project Title<span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="" id="projecttitle" name="projecttitle" value="<?php echo $projecttitle;?>">
            </div>        
          </div> 
                                                   
      </div>    
    </div> 

    <div class="form-horizontal col-sm-6">
             <div class="form-group">
            <label class="col-sm-4 control-label">Designation <span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="" id="projecttitle" name="projecttitle">
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
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <div class="form-group">
            <label class="col-sm-4 control-label">Start Date <span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="" id="start_date" name="start_date" value="<?php echo $start_date;?>">
            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-4 control-label">Role<span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="" id="role" name="role" value="<?php echo $role;?>"></div>        
          </div>                                           
      </div>    
    </div> 

    <div class="form-horizontal col-sm-6">
          <div class="form-group">
            <label class="col-sm-4 control-label">End Date<span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" placeholder="" id="end_date" name="end_date" value="<?php echo $end_date;?>">
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
              <textarea class="form-control" rows="2" id="projectdescription" name="projectdescription"><?php echo $projectdescription;?></textarea>
            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-2 control-label">Tools Used</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" id="tools" name="tools"><?php echo $tools;?></textarea>
            </div>        
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Challenges Faced</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" id="challenges" name="challenges"><?php echo $challenges;?></textarea>
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
    
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>
