<?php
include('../application/conn.php');

include('include/sessioncheck.php');

$studentSql = mysql_query("Select * from tbl_settings");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $profileinformationpage = $row['profileinformationpage'];
    $academicqualificationpage = $row['academicqualificationpage'];
    $beprojectspage = $row['beprojectspage'];
    $traininginstitutepage = $row['traininginstitutepage'];
    $companypage = $row['companypage'];
    $otherdetailpage = $row['otherdetailpage'];
}


if($_POST)
{
    $profileinformationpage = $_POST['profileinformationpage'];
    $academicqualificationpage = $_POST['academicqualificationpage'];
    $beprojectspage = $_POST['beprojectspage'];
    $traininginstitutepage = $_POST['traininginstitutepage'];
    $companypage = $_POST['companypage'];
    $otherdetailpage = $_POST['otherdetailpage'];

mysql_query("Update tbl_settings set 
                 profileinformationpage = '$profileinformationpage',
						     academicqualificationpage = '$academicqualificationpage',
						     beprojectspage = '$beprojectspage',
						     traininginstitutepage = '$traininginstitutepage',
                  companypage = '$companypage',
						     otherdetailpage = '$otherdetailpage'

                        where idsettings = '1'");

echo "<script>parent.location='settings.php'</script>";
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
 <script src="../js/jquery-1.11.0.min.js"></script>
<script src="../js/jquery.validation.js"></script>
<script src="../js/customised_validation.js"></script>
 <script>
 $(document).ready(function() {

                
                
            $("#academicProject").validate({

                rules: {
                    profileinformationpage: "required",
                    academicqualificationpage: "required",
                    beprojectspage: "required",
                    traininginstitutepage: "required", 
                    companypage: "required",
                    otherdetailpage: "required", 
                },
                // Specify the validation error messages
                messages: {
                    profileinformationpage: "Please enter",
                    academicqualificationpage: "Please enter",
                    beprojectspage: "Please enter",
                    traininginstitutepage: "Please enter",
                    companypage: "Please enter",
                    otherdetailpage: "Please enter",
                   
                }
            });
 });
  </script>    
  </head>

  <body>
   <?php include('../include/header.php');?>
    <?php include('include/nav.php');?>
      <form action="" method="POST" id="academicProject">
 
    
    <div class="container mar-t10">

          <div class="row">
           <div class="col-sm-12">
           <h3 class="brd-btm mar-b20">Message Settings</h3>
            <div class="form-horizontal">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Profile Information<span class="error-text">*</span></label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" placeholder="Profile Information Content" id="profileinformationpage" name="profileinformationpage" value="<?php echo $profileinformationpage;?>">
                </div>               
              </div> 
                                              
            
              <div class="form-group">
                <label class="col-sm-2 control-label">Academic Qualification<span class="error-text">*</span></label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" placeholder="Academic Qualification Content" id="academicqualificationpage" name="academicqualificationpage" value="<?php echo $academicqualificationpage;?>">
                </div>               
              </div> 

              <div class="form-group">
                <label class="col-sm-2 control-label">BE Projects<span class="error-text">*</span></label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" placeholder="BE Projects Content" id="beprojectspage" name="beprojectspage" value="<?php echo $beprojectspage;?>">
                </div>               
              </div>                       
           
             
             <div class="form-group">
                <label class="col-sm-2 control-label">Training Institute<span class="error-text">*</span></label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" placeholder="Training Institute Content" id="traininginstitutepage" name="traininginstitutepage" value="<?php echo $traininginstitutepage;?>">
                </div>               
              </div>                
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Company Page<span class="error-text">*</span></label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" placeholder="Company Page Content" id="companypage" name="companypage" value="<?php echo $companypage;?>">
                </div>               
              </div>   
              <div class="form-group">
                <label class="col-sm-2 control-label">Other Detail Page<span class="error-text">*</span></label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" placeholder="Other Details Page Content" id="otherdetailpage" name="otherdetailpage" value="<?php echo $otherdetailpage;?>">
                </div>               
              </div> 

                </div>
            </div>
            </div> 
          
                     
            <div class="clearfix brd-top pad-t20">
                <button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">Save & Continue</button>       
            </div> 
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
