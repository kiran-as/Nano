<?php
include('../application/conn.php');

$idstudent = $_GET['idstudent'];
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
$state = $row['state'];
$passwords = $row['password'];
    $placeofbirth = $row['placeofbirth'];
    $eligibleIndianNationality = $row['eligibleIndianNationality']; 
    $addressdoorno = $row['addressdoorno'];   
    $addresslineone = $row['addresslineone'];   
    $addresslinetwo = $row['addresslinetwo']; 


}


if($_POST)
{ 
     
 
    $firstName = str_replace("'","&#39;",$_POST['firstName']);
    $lastName = str_replace("'","&#39;",$_POST['lastName']);
    $city = str_replace("'","&#39;",$_POST['city']);
    $pincode = str_replace("'","&#39;",$_POST['pincode']);
    $country = str_replace("'","&#39;",$_POST['country']);
    $languages = str_replace("'","&#39;",$_POST['languages']);
    $mobileNumber = str_replace("'","&#39;",$_POST['mobileNumber']);
    $address = str_replace("'","&#39;",$_POST['address']);
    $state = str_replace("'","&#39;",$_POST['state']);
    $nationality = str_replace("'","&#39;",$_POST['nationality']);
    $datepicker = date('Y-m-d',strtotime($_POST['datepicker']));
    $gender = str_replace("'","&#39;",$_POST['gender']);
    $fatherName = str_replace("'","&#39;",$_POST['fatherName']);
    $addressdoorno = str_replace("'","&#39;",$_POST['addressdoorno']);
    $addresslineone = str_replace("'","&#39;",$_POST['addresslineone']);
    $addresslinetwo = str_replace("'","&#39;",$_POST['addresslinetwo']);
    $placeofbirth = str_replace("'","&#39;",$_POST['placeofbirth']);
    $email = str_replace("'","&#39;",$_POST['email']);

    $eligibleIndianNationality = str_replace("'","&#39;",$_POST['eligibleIndianNationality']);
    $profilepic = $file_name;

    $experience = str_replace("'","&#39;",$_POST['experience']);
    $experience_years = str_replace("'","&#39;",$_POST['experience_years']);
    mysql_query("Update tbl_student set 
      firstname='$firstName', 
      lastname='$lastName',
      mobile='$mobileNumber',
      email='$email',

      dob='$datepicker'
      where idstudent='$idstudent'");
    
   $password = str_replace("'","&#39;",$_POST['password']);

 
     mysql_query("Update tbl_student set password='$password'
                  where idstudent='$idstudent'");

   echo "<script>parent.location='studentlist.php'</script>";
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
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
   <script>

    $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1940:2015"
    });


    $( "#format" ).change(function() {
      $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
    });
  });

 
  </script>
  </head>

  <body onload="fnSelectNationality('<?php echo $nationality;?>')">
      <form action="" method="POST" id="profileinformation" enctype="multipart/form-data"> 
    <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <p class="alert alert-success txtc font16-sm-reg  label-info"><?php echo $profileinformationpage;?></p>
    <div class="row">
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <label class="col-sm-5 control-label">First Name <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="First Name" id="firstName" name="firstName" value="<?php echo $firstName;?>">
        </div>        
      </div>
        <div class="form-group">
        <label class="col-sm-5 control-label">Last Name <span class="error-text">*</span></label>
        <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Last Name" id="lastName" name="lastName" value="<?php echo $lastName;?>">
        </div>        
      </div>  
      <div class="form-group">
        <label class="col-sm-5 control-label">Email <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <p class="form-control-static"><input type="text" class="form-control" placeholder="Last Name" id="email" name="email" value="<?php echo $email;?>"></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Mobile Number <span class="error-text">*</span>(+91)</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Mobile Number" id="mobileNumber" name="mobileNumber" value="<?php echo $mobileNumber;?>">
        </div>        
      </div>  
     
      <div class="form-group">
        <label class="col-sm-5 control-label">Date Of Birth <span class="error-text">*</span></label>
        <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Date of Birth" id="datepicker" name="datepicker" value="<?php echo $datepicker;?>">
        </div>        
                      
      </div>  
      <div class="form-group">
        <label class="col-sm-5 control-label">Password <span class="error-text">*</span></label>
        <div class="col-sm-7">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="<?php echo $passwords;?>">
        </div>        
                      
      </div>        
                                       
    </div>    
    </div> 
    <div class="clearfix brd-top pad-t20">
        <button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">SAVE & CONTINUE</button>       
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
    
    
  </body>
</html>
