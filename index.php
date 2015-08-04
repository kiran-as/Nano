<?php
include('application/conn.php');
if($_POST['loginEmail'])
{

    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    $idstudent = '0';
    $studentSql = mysql_query("Select * from tbl_student where email='$email' and  password='$password'");
    while($row = mysql_fetch_assoc($studentSql))
    {
        $idstudent = $row['idstudent'];
        $studentName = $row['firstname'].' - '.$row['lastname'];
    }
    $_SESSION['idstudent'] = $idstudent;
    $_SESSION['studentName'] = $studentName;
    if($idstudent=='0')
    {
        echo "<script>alert('Please enter valid username and password')</script>";
        echo "<script>parent.location='index.php'</script>";
        exit;
    }
    else
    {

        $updated_date = date('Y-m-d');
        mysql_query("Update tbl_student set updated_date = '$updated_date'
         where idstudent = '$idstudent'"); 

        echo "<script>parent.location='profileInformation.php'</script>";
        exit;
    }
}
$thankyouMessage = 0;
if($_POST['firstName'])
{
    $idstudent = 0;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $mobileNumber = $_POST['mobile'];
    $studentSql = mysql_query("Select * from tbl_student where email='$email' and  password='$password'");
    while($row = mysql_fetch_assoc($studentSql))
    {
        $idstudent = $row['idstudent'];
        $studentName = $row['firstname'].' - '.$row['lastname'];
    }
   
    if($idstudent!='0')
    {
       
        echo "<script>alert('This email address is already registerd, Please try different');</script>";
        echo "<script>parent.location='index.php'</script>";
        exit;
        
    }
    else
    {
         $date = date('Y-m-d H:i:s');
         mysql_query("Insert into tbl_student (firstname,lastname,mobile,email,password,created_date)
             values('$firstName','$lastName','$mobileNumber','$email','$password','$date')");
          $_SESSION['idstudent'] = mysql_insert_id();
         $_SESSION['studentName'] = '';
        echo "<script>parent.location='profileInformation.php'</script>";
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="recruiter/recruitment/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="recruiter/recruitment/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  
    <script type="text/javascript">
     $(document).ready(function() {

            $("#registrationForm").validate({
                // Specify the validation rules
                rules: {
                    firstName: "required",
                    lastName : "required",
                    email : "required",
                    mobile : {
                      required: true,
                        number: true,
                         maxlength: 10
                    },
                    password:{ required:true,
                        maxlength:16,
                         minlength:8,
                       },
           cnfpassword:{ required:true,
                        maxlength:16,
                         minlength:8,
                     }
                },
                // Specify the validation error messages
                messages: {
                    firstName: "<p class='error'>Please enter First name</p>",
                    lastName: "<p class='error'>Please enter Last name</p>",
                    email: "<p class='error'>Please enter Email</p>",
                     mobile : {
                      required: "<p class='error'>Please enter Mobile number</p>",
                        number: "<p class='error'>Enter only number</p>",
                    },
                    password:{ required:"<p class='error'> Please Enter Password</p>",
                       minlength:"<p class='error'>Should be Min 8 digit</p>",
                       maxlength:"<p class='error'>Should be Max 16 digit</p>", 
                     },
            cnfpassword:{ required:"<p class='error'> Please Enter Confirm Password</p>",
                       minlength:"<p class='error'>Should be Min 8 digit</p>",
                       maxlength:"<p class='error'>Should be Max 16 digit</p>",
                     },

                }
            });

            $("#loginForm").validate({
                // Specify the validation rules
                rules: {
                    loginEmail: "required",
                    loginPassword : "required",
                },
                // Specify the validation error messages
                messages: {
                    loginEmail: "<p class='error'>Please enter login email</p>",
                    loginPassword: "<p class='error'>Please enter login password</p>",
                }
            });

 });

  function fnvalidatepassword(cnfpassword)
  {
     var password = $('#password').val();
     if(password!=cnfpassword)
     {
        alert('Password and Confirm Password does not match');
        $('#cnfpassword').val('');
     }
  }

    </script>
</head>

<body>
    <section class="top-block">
        <div class="container">
            <p class="text-center pad-t30"><a href="#"><img src="img/logo.png" /></a></p>
            <div class="row pad-t30">
                <div class="col-sm-6 white-text">
                    <h1 class="large-title l-font">Welcome to our Nanochip Solutions !</h1>
                    <ul class="ft-list l-font pad-t30">
                        <li>Nation’s first Domain specified job portal</li>
                        <li>Exclusive to VLSI and Embedded industry</li>
                        <li>Get best matched jobs on your email.</li>
                        <li>The database has been flushed on Aug 2015, Please update new one</li>
                        <li>Let the top employers of your industry reach you.</li>
                        <li>Enter your person email Id to get your jobs update</li>
                    </ul>
                </div>
                <div class="col-sm-6 pad-t20">
                    <div class="r-block">
                     <!-- Nav tabs -->
                      <ul class="nav nav-tabs row custom-tabs hmar-0" role="tablist">
                        <li role="presentation" class="active col-sm-6 hpad-0"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">REGISTER</a></li>
                        <li role="presentation" class="col-sm-6 hpad-0"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">LOGIN</a></li>
                      </ul>
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane fade in active" id="register">
                          <div class="row pad-full hmar-10">
                          <?php if($thankyouMessage==1){?>
                         <p class="col-sm-12 pad-b20">Thanks for registering with Nanochip Solutions. Your request is in process it takes about 24 hours to activate your account, Please check your email to activate your account.</p>                                 
                           <?php } else { ?>
                           <form action="" method="POST" name="registrationForm" id="registrationForm">
                              <div class="clearfix">
                              <div class="form-group col-sm-6 hpad-10">
                                  <span class="m-field">*</span>
                                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" />                                  
                              </div>
                              <div class="form-group col-sm-6 hpad-10">
                                 <span class="m-field">*</span>
                                  <input type="text" class="form-control" placeholder="Last Name" id="lastName" name="lastName" />
                              </div>  
                              </div>
                              <div class="form-group col-sm-6 hpad-10">
                                 <span class="m-field">*</span>
                                  <input type="text" class="form-control" placeholder="Email Address" id="email" name="email"/>
                              </div>
                              <div class="form-group col-sm-6 hpad-10">
                                 <span class="m-field">*</span>
                                  <input type="text" class="form-control" placeholder="Mobile" id="mobile" name="mobile" />
                              </div>  
                              <div class="form-group col-sm-6 hpad-10">
                              <span class="m-field">*</span>
                                  <input type="text" class="form-control" placeholder="Password" id="password" name="password" />
                              </div>
                              <div class="form-group col-sm-6 hpad-10">
                              <span class="m-field">*</span>
                                  <input type="text" class="form-control" placeholder="Confirm Password" id="cnfpassword" name="cnfpassword" onblur="fnvalidatepassword(this.value)"/>
                              </div>                               
                              <div class="form-group col-sm-6 hpad-10 pad-t10">
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox" id="termsandconditions" checked="checked"> I agree to the <a href="#">Terms &amp; Conditions</a>
                                    </label>
                                  </div>                                                                
                              </div>
                              <div class="form-group col-sm-6 hpad-10 pad-t10">
                                  <button type="submit" class="btn btn-primary btn-block" id="registerBtn">REGISTER</button>
                              </div>
                              </form>   
                              <?php }?>                                                                                      
                          </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="login">
                          <div class="row pad-full hmar-10">
                         <p class="col-sm-12 pad-b20">Welcome to Nanochip Solution recruitement portal.</p>                                 
                                                    <form action="" method="POST" name="loginForm" id="loginForm">

                              <div class="form-group col-sm-6 hpad-10">
                                  <span class="m-field">*</span>
                                  <input type="text" class="form-control" placeholder="Email Address" id="loginEmail" name="loginEmail"/>                                  
                              </div>
                              <div class="form-group col-sm-6 hpad-10">
                                 <span class="m-field">*</span>
                                  <input type="password" class="form-control" placeholder="Password" id="loginPassword" name="loginPassword"/>
                              </div> 
                              <div class="form-group col-sm-6 hpad-10 pad-t10">
                                  <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                              </div>  
                                                    </form>
                                                            
                              <div class="form-group col-sm-6 hpad-10 pad-t10 mar-t7">
                                <a href="#" class="">Forgot Password?</a>                                                                
                              </div>                                                                                       
                          </div>                          
                      </div>
                    </div> 
                    </div>                                  
                </div>
            </div>
        </div>
    </section>  
    <div class="container">
        <div class="row text-center pad-t20">
            <div class="col-sm-4 pad-t30">
                <img src="img/ft_icon1.png" />
                <p class="blue-title18 pad-t20">Save your precious time</p>
                <p>Just publish your jobs, Let us  search the database</p>
            </div>
            <div class="col-sm-4 pad-t30">
                <img src="img/ft_icon2.png" />
                <p class="blue-title18 pad-t20">Provides you most relevant resumes</p>
                <p>We search for best talents on our database</p>
            </div> 
            <div class="col-sm-4 pad-t30">
                <img src="img/ft_icon3.png" />
                <p class="blue-title18 pad-t20">Simplifies your recruitment process</p>
                <p>Review, download and organize intrested resumes</p>
            </div>                        
        </div>
    </div> 
    <hr/>  
    <p class="text-center pad-b5">&copy; 2015 Nanochipsolutions</p>           
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="recruiter/recruitment/js/bootstrap.min.js"></script>
</body>

</html>
