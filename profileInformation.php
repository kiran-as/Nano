<?php
include('application/conn.php');
include('include/sessioncheck.php');
include('include/settingmessage.php');

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
    $placeofbirth = $row['placeofbirth'];
    $eligibleIndianNationality = $row['eligibleIndianNationality']; 
    $addressdoorno = $row['addressdoorno'];   
    $addresslineone = $row['addresslineone'];   
    $addresslinetwo = $row['addresslinetwo'];   
}
if($eligibleIndianNationality=='')
{
  $eligibleIndianNationality = 'Yes';
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
    $eligibleIndianNationality = str_replace("'","&#39;",$_POST['eligibleIndianNationality']);

    mysql_query("Update tbl_student set 
      firstname='$firstName', 
      lastname='$lastName',
      gender='$gender',
      mobile='$mobileNumber',
      city='$city',
      pincode='$pincode',
      country='$country',
      fathername='$fatherName',
      state='$state',
      dob='$datepicker', 
      address='$address', 
      languages='$languages',
      nationality='$nationality', 
      addressdoorno='$addressdoorno', 
      addresslineone='$addresslineone', 
      addresslinetwo='$addresslinetwo',
      eligibleIndianNationality='$eligibleIndianNationality',
      placeofbirth='$placeofbirth' 

      where idstudent='$idstudent'");
    
    
   echo "<script>parent.location='academicQualification.php'</script>";
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
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1950:2015"
    });


    $( "#format" ).change(function() {
      $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
    });
  });

 function fnSelectNationality(id)
 {
      if(id=='Others')
      {
          $('#radioButtonForNationality').show();
      }
      else
      {
          $('#radioButtonForNationality').hide();
      }
 }  
 $(document).ready(function() {
   $('#saveAndContinue').click(function() {
                
                $('#profileinformation').submit();
            });
            $("#profileinformation").validate({
                // Specify the validation rules
                rules: {
                    firstName: "required",
                    lastName: "required",
                    fatherName:"required",
                       city: "required",
                    address: "required",
                    placeofbirth:"required",
                    mobileNumber: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10

                    },
                    datepicker: "required",
                      pincode: {
                        required: true,
                        number: true,
                        minlength: 6,
                        maxlength: 6

                    },
                    addresslineone:"required",
                    
                },
                // Specify the validation error messages
                messages: {
                    firstName: "Please enter a First Name",
                    lastName :"Please enter Last Name",
                    fatherName:"Please enter Father Name",
                    city: "Please enter a City",
                    mobileNumber: {
                        required: "Please provide valid Phone no",
                        minlength: "Please provide 10 digit Mobile Number",
                        maxlength: "Only 10 digit Mobile Number is allowed",
                        number: "Please enter only numbers"
                    },                   
                    address: "Please enter Address",
                    datepicker: "Please enter a Date of Birth",
                     pincode: {
                        required: "Please provide valid Pincode",
                        minlength: "Please provide 6 digit Pincode",
                        maxlength: "Only 6 digit Pincode is allowed",
                        number: "Please enter only numbers"
                    },
                    addresslineone:"Please enter address one",
                    placeofbirth:"Please enter place of Birth",
                   
                }
            });
 });
  </script>
  </head>

  <body onload="fnSelectNationality('<?php echo $nationality;?>')">
      <form action="" method="POST" id="profileinformation"> 
    <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <p class="alert alert-success txtc font16-sm-reg"><?php echo $profileinformationpage;?></p>
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
          <p class="form-control-static"><?php echo $email;?></p>
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
        <label class="col-sm-5 control-label">Place of Birth <span class="error-text">*</span></label>
        <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Place of Birth" id="placeofbirth" name="placeofbirth" value="<?php echo $placeofbirth;?>">
        </div>        
                      
      </div>        
      <div class="form-group">
        <label class="col-sm-5 control-label">Gender <span class="error-text">*</span></label>
        <div class="col-sm-7">
            <label class="radio-inline">
              <input type="radio" name="gender" id="male" value="Male" <?php if($gender=='Male') {echo "checked=checked";};?>> Male
            </label>
            <label class="radio-inline">
              <input type="radio" name="gender" id="female" value="Female" <?php if($gender=='Female') {echo "checked=checked";};?>> Female
            </label>
        </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Nationality <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <select class="form-control" id="nationality" name="nationality" onchange='fnSelectNationality(this.value)'>
              <option value="Indian" <?php if($nationality=='Indian'){ echo "Selected=Selected";}?> >Indian</option>
              <option value="Others" <?php if($nationality=='Others'){ echo "Selected=Selected";}?> >Others</option>
          </select>
        </div>        
      </div>
       <div class="form-group" id="radioButtonForNationality" style='display:none'>
        <label class="col-sm-5 control-label">Have Eligibility to work in India <span class="error-text"></span></label>
        <div class="col-sm-7">
            <label class="radio-inline">
              <input type="radio" name="eligibleIndianNationality" id="eligibleIndianNationalityes" value="Yes" <?php if($eligibleIndianNationality=='Yes') {echo "checked=checked";};?>> Yes
            </label>
            <label class="radio-inline">
              <input type="radio" name="eligibleIndianNationality" id="eligibleIndianNationalityNo" value="No" <?php if($eligibleIndianNationality=='No') {echo "checked=checked";};?>> No
            </label>
        </div>        
      </div>                                                 
      <div class="form-group">
        <label class="col-sm-5 control-label">Father Name<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Father Name" id="fatherName" name="fatherName" value="<?php echo $fatherName;?>">
        </div>        
      </div>
              
    </div>
    <div class="form-horizontal col-sm-6">
    
      <div class="form-group">
        <label class="col-sm-5 control-label"> <span class="error-text"></span></label>
        <div class="col-sm-7">
          <p class="form-control-static"><b>Address for Communication</b></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Address - Door No</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Door No" id="addressdoorno" name="addressdoorno" value="<?php echo $addressdoorno;?>">
        </div>        
      </div> 
       <div class="form-group">
        <label class="col-sm-5 control-label">Address - Line 1<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Address Line One" id="addresslineone" name="addresslineone" value="<?php echo $addresslineone;?>">
        </div>        
      </div> 
       <div class="form-group">
        <label class="col-sm-5 control-label">Address - Line 2</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Address Line Two" id="addresslinetwo" name="addresslinetwo" value="<?php echo $addresslinetwo;?>">
        </div>        
      </div> 
       <div class="form-group">
        <label class="col-sm-5 control-label">City<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="City" id="city" name="city" value="<?php echo $city;?>">
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
        <label class="col-sm-5 control-label">Pincode <span class="error-text">*</span></label>
        <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Pincode" id="pincode" name="pincode" value="<?php echo $pincode;?>">
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
        <label class="col-sm-5 control-label">Languages Known</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="English, Kannada, Hindi" id="languages" name="languages" value="<?php echo $languages;?>">
          <p class="help-block" style='display:none'>eg. English, Kannada, Hindi, etc...</p>
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
