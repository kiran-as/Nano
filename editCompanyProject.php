<?php
$idcompanyproject=$_GET['idcompanyproject'];
include("application/conn.php");
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
    $designation = $row['designation'];
        $client = $row['client'];
    $challenges1 = $row['challenges1'];
    $challenges2 = $row['challenges2'];
    $challenges3 = $row['challenges3'];
    $challenges4 = $row['challenges4'];

}
if($_POST)
{
    $projecttitle = str_replace("'","&#39;",$_POST['projecttitle']);
    $designation = str_replace("'","&#39;",$_POST['designation']);
    $company = str_replace("'","&#39;",$_POST['company']);
    $months = str_replace("'","&#39;",$_POST['months']);
    $role = str_replace("'","&#39;",$_POST['role']);
    $teamsize = str_replace("'","&#39;",$_POST['teamsize']);
    $projectdescription = str_replace("'","&#39;",$_POST['projectdescription']);
    $tools = str_replace("'","&#39;",$_POST['tools']);
    $challenges = str_replace("'","&#39;",$_POST['challenges']);
    $challenges1 = str_replace("'","&#39;",$_POST['challenges1']);
    $challenges2 = str_replace("'","&#39;",$_POST['challenges2']);
    $challenges3 = str_replace("'","&#39;",$_POST['challenges3']);
    $challenges4 = str_replace("'","&#39;",$_POST['challenges4']);
    $challenges5 = str_replace("'","&#39;",$_POST['challenges5']);

    $designation = str_replace("'","&#39;",$_POST['designation']);
    $start_date = date('Y-m-d',  strtotime($_POST['start_date']));
    $end_date = date('Y-m-d',  strtotime($_POST['end_date']));
    $client = str_replace("'","&#39;",$_POST['client']);
  
    mysql_query("Update tbl_companyproject set project_title='$projecttitle',"
            . "company_name='$company',time_duration='$months',client='$client',"
            . "team_size='$teamsize',project_description='$projectdescription',"
            . "tools_used='$tools',designation='$designation', role='$role',challenges='$challenges',challenges1='$challenges1',challenges2='$challenges2',challenges3='$challenges3',challenges4='$challenges4',start_date='$start_date',end_date='$end_date' "
            . "where idcompanyproject='$idcompanyproject'");
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
    <script src="js/customised_validation.js"></script>
 
   <script>
  $(function() {
    $( "#start_date" ).datepicker();
    $( "#end_date" ).datepicker();
  });
  </script>
<script>
 
$(function () {
            $("#academicProject").validate({
                // Specify the validation rules
                rules: {
                    start_date: "required",
                    company:"required",
                    projecttitle: "required",
                    role:"required",
                    end_date: "required",
                    designation:"required", 
                    client:"required",
                    projectdescription:{required:true,
                           minlength:100,
                           maxlength:250},
                    tools:{required:true,
                           minlength:10,
                           maxlength:180},
                    challenges:{required:true,
                           minlength:10,
                           maxlength:180},
                    challenges1:{required:true,
                           minlength:10,
                           maxlength:180},
                    challenges2:{required:true,
                           minlength:10,
                           maxlength:180},
                                                                
                },
                // Specify the validation error messages
                 // Specify the validation error messages
                messages: {
                    start_date: "Please enter start Date",
                    projecttitle: "Please enter Project Title",
                    role: "Please enter Role",
                    end_date: "Please enter End Date",
                    company: "Please enter Company Name",
                    designation: "Please enter Designation",
                    client :"Please enter Client Name",
                    tools:{required:"Please enter Tools Used",
                           minlength:"Minimum is 10 Character",
                           maxlength:"PMaximum is 180 Character"},
                    challenges:{required:"Please enter Challenge",
                           minlength:"Minimum is 10 Character",
                           maxlength:"PMaximum is 180 Character"},
                    challenges1:{required:"Please enter Challenge",
                           minlength:"Minimum is 10 Character",
                           maxlength:"PMaximum is 180 Character"},
                    challenges2:{required:"Please enter Challenge",
                           minlength:"Minimum is 10 Character",
                           maxlength:"PMaximum is 180 Character"},
                    projectdescription:{required:"Please enter Project Contribution",
                           minlength:"Minimum is 120 Character",
                           maxlength:"PMaximum is 255 Character"},                           
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
              <input type="text" class="form-control" placeholder="" id="company" name="company" value="<?php echo $company;?>">
            </div>        
          </div> 
          <div class="form-group">
            <label class="col-sm-4 control-label">Project Title<span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="" id="projecttitle" name="projecttitle" value="<?php echo $projecttitle;?>">
            </div>        
          </div> 
                                                   
      </div>    
    </div> 

    <div class="form-horizontal col-sm-6">
             <div class="form-group">
            <label class="col-sm-4 control-label">Designation <span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="" id="designation" name="designation" value="<?php echo $designation;?>">
            </div>        
          </div> 
             <div class="form-group">
            <label class="col-sm-4 control-label">Client Name<span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="Enter Client Name" id="client" name="client" value="<?php echo $client;?>">
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
              <input type="text" class="form-control" placeholder="" id="start_date" name="start_date" value="<?php echo $start_date;?>">
            </div>        
          </div>                                           
      </div>    
    </div> 

    <div class="form-horizontal col-sm-6">
          <div class="form-group">
            <label class="col-sm-4 control-label">End Date<span class="error-text">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="" id="end_date" name="end_date" value="<?php echo $end_date;?>">
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
            <label class="col-sm-2 control-label">Your Contribution to the project<span class="error-text">*</span></label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" id="projectdescription" name="projectdescription" onkeyup="countCharbannertext(this,'projectdescription_countlabel','250')" ><?php echo $projectdescription;?></textarea>
              <span class='info-text' id='projectdescription_countlabel'>Maximum 250 Chars (with spaces)
            
            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-2 control-label">Tools Used<span class="error-text">*</span></label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="2" Placeholder="Specify the software and hardware boards used" id="tools" name="tools"  onkeyup="countCharbannertext(this,'tools_countlabel','180')" ><?php echo $tools;?></textarea>
              <span class='info-text' id='tools_countlabel'>Maximum 180 Chars (with spaces)

            </div>        
          </div>
                    <div class="form-group">
            <label class="col-sm-2 control-label">Roles and Responsibilities<span class="error-text">*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Challenges" id="challenges" name="challenges" onkeyup="countCharbannertext(this,'challenges0_countlabel','120')" value="<?php echo $challenges;?>">            
              <span class='info-text' id='challenges0_countlabel'>Maximum 180 Chars (with spaces)

            </div>        
          </div>  
          <div class="form-group">
            <label class="col-sm-2 control-label">Roles and Responsibilities<span class="error-text">*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Challenges" id="challenges1" name="challenges1" onkeyup="countCharbannertext(this,'challenges1_countlabel','120')" value="<?php echo $challenges1;?>">            
               <span class='info-text' id='challenges1_countlabel'>Maximum 180 Chars (with spaces)

              </div>        
            </div>   
<div class="form-group">
            <label class="col-sm-2 control-label">Roles and Responsibilities<span class="error-text">*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Challenges" id="challenges2" name="challenges2" onkeyup="countCharbannertext(this,'challenges2_countlabel','120')" value="<?php echo $challenges2;?>">            
               <span class='info-text' id='challenges2_countlabel'>Maximum 180 Chars (with spaces)

              </div>        
            </div> 
<div class="form-group">
            <label class="col-sm-2 control-label">Roles and Responsibilities</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Challenges" id="challenges3" name="challenges3" onkeyup="countCharbannertext(this,'challenges3_countlabel','120')" value="<?php echo $challenges3;?>">            
               <span class='info-text' id='challenges3_countlabel'>Maximum 180 Chars (with spaces)

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
