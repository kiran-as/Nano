<?php
include('application/conn.php');
include('include/year.php');
include('include/department.php');
include('include/pgcourses.php');
include('include/sessioncheck.php');
include('include/settingmessage.php');

$idstudent = $_SESSION['idstudent'];

$profileInformationSql = mysql_query("Select * from tbl_student where idstudent=$idstudent");
while($row = mysql_fetch_assoc($profileInformationSql))
{
    $deg_projectname = $row['deg_projectname'];
    $deg_projectdescription = $row['deg_projectdescription'];
    $deg_projecttools = $row['deg_projecttools'];
    $deg_projectchallenges = $row['deg_projectchallenges'];
    
    $pg_projectname = $row['pg_projectname'];
    $pg_projectdescription = $row['pg_projectdescription'];
    $pg_projecttools = $row['pg_projecttools'];
    $pg_projectchallenges = $row['pg_projectchallenges'];
}
if($_POST)
{
     $deg_projectname = $_POST['deg_projectname'];
    $deg_projectdescription = $_POST['deg_projectdescription'];
    $deg_projecttools = $_POST['deg_projecttools'];
    $deg_projectchallenges = $_POST['deg_projectchallenges'];
    
    $pg_projectname = $_POST['pg_projectname'];
    $pg_projectdescription = $_POST['pg_projectdescription'];
    $pg_projecttools = $_POST['pg_projecttools'];
    $pg_projectchallenges = $_POST['pg_projectchallenges'];
/*echo "Update tbl_student set deg_projectname = $deg_projectname,
						     deg_projectdescription = $deg_projectdescription,
						     deg_projecttools = $deg_projecttools,
						     deg_projectchallenges = $deg_projectchallenges,
                             pg_projectname = $pg_projectname,
						     pg_projectdescription = $pg_projectdescription,
						     pg_projecttools = $pg_projecttools,
						     pg_projectchallenges = $pg_projectchallenges,
                        where idstudent = '$idstudent'";
   exit;*/
mysql_query("Update tbl_student set deg_projectname = '$deg_projectname',
						     deg_projectdescription = '$deg_projectdescription',
						     deg_projecttools = '$deg_projecttools',
						     deg_projectchallenges = '$deg_projectchallenges',
                             pg_projectname = '$pg_projectname',
						     pg_projectdescription = '$pg_projectdescription',
						     pg_projecttools = '$pg_projecttools',
						     pg_projectchallenges = '$pg_projectchallenges'
                        where idstudent = '$idstudent'");

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

                
                
            $("#academicProject").validate({

                rules: {
                    deg_projectname: "required",
                    deg_projectdescription: "required",
                    deg_projecttools: "required",
                    deg_projectchallenges: "required", 
                },
                // Specify the validation error messages
                messages: {
                    deg_projectname: "Please enter Project Name",
                    deg_projectdescription: "Please enter Project Description",
                    deg_projecttools: "Please enter tools used in Project",
                    deg_projectchallenges: "Please enter Challenges faced in Project",
                   
                }
            });
 });
  </script>    
  </head>

  <body>
      <form action="" method="POST" id="academicProject">
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
                    <p class="alert alert-success txtc font16-sm-reg"><?php echo $beprojectspage;?></p>

    
    <div class="container mar-t10">

          <div class="row">
           <div class="col-sm-12">
           <h3 class="brd-btm mar-b20">B.E Project Details</h3>
            <div class="form-horizontal">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Project Name<span class="error-text">*</span></label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" placeholder="Project Name" id="deg_projectname" name="deg_projectname" value="<?php echo $deg_projectname;?>">
                </div>               
              </div> 
                                              
            
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Project Description<span class="error-text">*</span></label>
                <div class="col-sm-10">
                 <textarea class="form-control" rows="3"  placeholder="Describe the unique features of your project" id="deg_projectdescription" name="deg_projectdescription" onkeyup="countCharbannertext(this,'deg_projectdescription_countlabel','250')";><?php echo $deg_projectdescription;?></textarea>
                 <span class='info-text' id='deg_projectdescription_countlabel'>Maximum 250 Chars (with spaces)

                </div>               
              </div> 

              <div class="form-group">
                <label class="col-sm-2 control-label">Software / Hardware Used<span class="error-text">*</span></label>
                <div class="col-sm-10">
                 <textarea class="form-control" rows="3"  placeholder="Specify the software names and Hardware boards used" id="deg_projecttools" name="deg_projecttools" onkeyup="countCharbannertext(this,'deg_projecttools_countlabel','250')";><?php echo $deg_projecttools;?></textarea>
                  <span class='info-text' id='deg_projecttools_countlabel'>Maximum 250 Chars (with spaces)

                </div>               
              </div>                           
           
             
               
              <div class="form-group">
                <label class="col-sm-2 control-label">Project Challenges<span class="error-text">*</span></label>
                <div class="col-sm-10">
                 <textarea class="form-control" rows="3"  placeholder="List the challenges you faced while executing the project" id="deg_projectchallenges" name="deg_projectchallenges" onkeyup="countCharbannertext(this,'deg_projectchallenges_countlabel','250')"  ;><?php echo $deg_projectchallenges;?></textarea>
                 <span class='info-text' id='deg_projectchallenges_countlabel'>Maximum 250 Chars (with spaces)
                </div>               
              </div>                
                                              
            </div>
            </div>
            </div> 
          <div class="row">
           <div class="col-sm-12">
           <h3 class="brd-btm mar-b20">ME Project Details</h3>
            <div class="form-horizontal">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Project Name<span class="error-text"></span></label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" placeholder="Project Name" id="pg_projectname" name="pg_projectname" value="<?php echo $pg_projectname;?>">
                </div>               
              </div> 
                                              
            
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Project Description<span class="error-text"></span></label>
                <div class="col-sm-10">
                 <textarea class="form-control" rows="3"  placeholder="Describe the unique features of your project" id="pg_projectdescription" name="pg_projectdescription" onkeyup="countCharbannertext(this,'pg_projectdescription_countlabel','250')";><?php echo $pg_projectdescription;?></textarea>
                                 <span class='info-text' id='pg_projectdescription_countlabel'>Maximum 250 Chars (with spaces)
                </div>               
              </div> 

              <div class="form-group">
                <label class="col-sm-2 control-label">Software / Hardware Used<span class="error-text"></span></label>
                <div class="col-sm-10">
                 <textarea class="form-control" rows="3"  placeholder="Specify the software names and Hardware boards used" id="pg_projecttools" name="pg_projecttools" onkeyup="countCharbannertext(this,'pg_projecttools_countlabel','250')";><?php echo $pg_projecttools;?></textarea>
                  <span class='info-text' id='pg_projecttools_countlabel'>Maximum 250 Chars (with spaces)
               
                </div>               
              </div>                           
           
             
               
              <div class="form-group">
                <label class="col-sm-2 control-label">Project Challenges<span class="error-text"></span></label>
                <div class="col-sm-10">
                 <textarea class="form-control" rows="3"  placeholder="List the challenges you faced while executing the project" id="pg_projectchallenges" name="pg_projectchallenges" onkeyup="countCharbannertext(this,'pg_projectchallenges_countlabel','250')";><?php echo $pg_projectchallenges;?></textarea>
                 <span class='info-text' id='pg_projectchallenges_countlabel'>Maximum 250 Chars (with spaces)
                
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
