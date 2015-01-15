<?php
include('application/conn.php');


$idstudent = $_SESSION['idstudent'];
$profileInformationSql = mysql_query("Select * from tbl_student where idstudent=$idstudent");
while($row = mysql_fetch_assoc($profileInformationSql))
{
    $firstName = $row['firstname'];
    $lastName = $row['lastname'];
    $mobileNumber = $row['mobile'];
    $city = $row['city'];
    $country = $row['country'];
    $pincode = $row['pincode'];
    $fatherName = $row['fathername'];
    $datepicker = $row['dob'];
    $gender = $row['gender'];
    $nationality = $row['nationality'];
    $languages = $row['languages'];
    $address = $row['address']; 
    $email = $row['email'];
    
}
if($_POST)
{
  
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $country = $_POST['country'];
    $languages = $_POST['languages'];
    $mobileNumber = $_POST['mobileNumber'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $nationality = $_POST['nationality'];
    $datepicker = $_POST['datepicker'];
    $gender = $_POST['gender'];
    $fatherName = $_POST['fatherName'];

    mysql_query("Update tbl_student set firstname='$firstName', lastname='$lastName',gender='$gender',
        mobile='$mobileNumber',city='$city',pincode='$pincode',country='$country',fathername='$fatherName',
            state='$state',dob='$datepicker', address='$address', languages='$languages',
            nationality='$nationality' where idstudent='$idstudent'");
    
    
   echo "<script>parent.location='profileInformation.php'</script>";
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
 
   <script>
  $(function() {
    $( "#datepicker" ).datepicker();
    $( "#format" ).change(function() {
      $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
    });
  });
  </script>
  </head>

  <body>
      <form action="" method="POST"> 
    <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <p class="alert alert-success txtc font16-sm-reg">Welcome to the Resume Builder, please fill all the sections for your resume to be submitted to the database 
successfully.</p>
    <div class="row">
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <label class="col-sm-5 control-label">First Name <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="" id="firstName" name="firstName" value="<?php echo $firstName;?>">
        </div>        
      </div> 
      <div class="form-group">
        <label class="col-sm-5 control-label">Email <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <p class="form-control-static"><?php echo $email;?></p>
        </div>
      </div>
     
      <div class="form-group">
        <label class="col-sm-5 control-label">City <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="" id="city" name="city" value="<?php echo $city;?>">
        </div>        
      </div>  
      <div class="form-group">
        <label class="col-sm-5 control-label">Pincode <span class="error-text">*</span></label>
        <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="" id="pincode" name="pincode" value="<?php echo $pincode;?>">
        </div>        
      </div> 
      <div class="form-group">
        <label class="col-sm-5 control-label">Country <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <select class="form-control" id="country" name="country">
              <option value="India">India</option>
          </select>
        </div>        
      </div> 
      <div class="form-group">
        <label class="col-sm-5 control-label">Date Of Birth <span class="error-text">*</span></label>
        <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="" id="datepicker" name="datepicker" value="<?php echo $datepicker;?>">
        </div>        
                      
      </div>                                                   
      <div class="form-group">
        <label class="col-sm-5 control-label">Father Name</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="" id="fatherName" name="fatherName" value="<?php echo $fatherName;?>">
        </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Languages Known</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="" id="languages" name="languages" value="<?php echo $languages;?>">
          <p class="help-block">eg. English, Kannada, Hindi, etc...</p>
        </div>        
      </div>            
    </div>
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <label class="col-sm-5 control-label">Last Name <span class="error-text">*</span></label>
        <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="" id="lastName" name="lastName" value="<?php echo $lastName;?>">
        </div>        
      </div> 
      <div class="form-group">
        <label class="col-sm-5 control-label">Mobile Number <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="" id="mobileNumber" name="mobileNumber" value="<?php echo $mobileNumber;?>">
        </div>        
      </div>  
      <div class="form-group">
        <label class="col-sm-5 control-label">Address for Communication <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <textarea class="form-control" rows="9" id="address" name="address"><?php echo $address;?></textarea>
        </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">State <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <select class="form-control" id="state" name="state">
              <option value="Karnataka">Karnataka</option>
          </select>
        </div>        
      </div> 
      <div class="form-group">
        <label class="col-sm-5 control-label">Gender <span class="error-text">*</span></label>
        <div class="col-sm-7">
            <label class="radio-inline">
              <input type="radio" name="gender" id="male" value="Male" <?php if($gender=='Male') {echo "checked=checked";};?>> Male
            </label>
            <label class="radio-inline">
              <input type="radio" name="gender" id="female" value="Female" <?php if($gender=='Femail') {echo "selected=selected";};?>> Female
            </label>
        </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Nationality</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="" id="nationality" name="nationality" value="<?php echo $nationality;?>">
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
