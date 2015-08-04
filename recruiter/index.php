<?php
include('../application/conn.php');
if($_POST['loginEmail'])
{
  
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    $idrecruiter = '0';
    $studentSql = mysql_query("Select * from tbl_recruiter where email='$email' and  password='$password'");
    while($row = mysql_fetch_assoc($studentSql))
    {
        $idrecruiter = $row['idrecruiter'];
        $username = $row['usename'];
        $company = $row['company'];
        $status = $row['status'];
    }
    if($status=='Inactive')
    {
      echo "<script> alert('Your Profile is still in  Inactive status, Please check your mail or call for more information');</script>";
      echo "<script>parent.location='index.php'</script>";
        exit;
    }
    $_SESSION['idrecruiter'] = $idrecruiter;
    $_SESSION['username'] = $username;

    if($idrecruiter=='0')
    {
        echo "<script> alert('Please enter valid username and password');</script>";
        echo "<script>parent.location='index.php'</script>";
        exit;
    }
    else
    {

        header('location: recruitementList.php');
    }
}
$thankyouMessage = 0;
if($_POST['companyName'])
{

    $thankyouMessage=0;
    $idrecruiter = 0;
    $email = $_POST['email'];
    $studentSql = mysql_query("Select * from tbl_recruiter where email='$email'");
    while($row = mysql_fetch_assoc($studentSql))
    {
        $idrecruiter = $row['idrecruiter'];
        $studentName = $row['firstname'].' - '.$row['lastname'];
    }
  
    if($idrecruiter!='0')
    {
       
        echo "<script>alert('This email address is already registerd, Please try different');</script>";
        echo "<script>parent.location='index.php'</script>";
        exit;
        
    }


    else
    {

        $companyName = $_POST['companyName'];
        $designation = $_POST['designation'];
        $userName = $_POST['userName'];
        $mobile = $_POST['mobile'];
        $url = $_POST['url'];
        $password = rand(11111111,99999999);
         $date = date('Y-m-d H:i:s');
         
         mysql_query("Insert into tbl_recruiter (designation,password,company,usename,email,mobile,web_url,registereddate)
             values('$designation','$password','$companyName','$userName','$email','$mobile','$url','$date')");
         
   $thankyouMessage=1;   

   $to = "$email";
$subject = "Thanks for registering to Nanochip Solutions";

$message = "
<html>
<body>
<table>
<tr>
<td>Dear $userName,</td>
</tr>
<tr>
<td>Thanks for registering with Nanochip Solutions. Your request is in process it takes about 24 hours to activate your account, Please check your email to activate your account. Please contact us at info@nanochipsolutions.com or call us at +91-80-4078 8574</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Admin <info@nanochipsolutions.com>' . "\r\n";
$headers .= 'Cc: askiran123@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
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
    <link href="recruitment/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="recruitment/css/main.css" rel="stylesheet">

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
                    companyName: "required",
                    userName : "required",
                    email : "required",
                    mobile : {
                      required: true,
                        number: true,
                         maxlength: 10
                    }
                },
                // Specify the validation error messages
                messages: {
                    companyName: "<p class='error'>Please enter Company name</p>",
                    userName: "<p class='error'>Please enter User name</p>",
                    email: "<p class='error'>Please enter Email</p>",
                     mobile : {
                      required: "<p class='error'>Please enter Mobile number</p>",
                        number: "<p class='error'>Enter only number</p>",
                    }

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

    </script>
</head>

<body>
    <section class="top-block">
        <div class="container">
            <p class="text-center pad-t30"><a href="#"><img src="img/logo.png" /></a></p>
            <div class="row pad-t30">
                <div class="col-sm-6 white-text">
                    <h1 class="large-title l-font">Welcome to our Recuritment Solutions !</h1>
                    <ul class="ft-list l-font pad-t30">
                        <li>Nation’s first Domain specified job portal</li>
                        <li>Exclusive to VLSI and Embedded industry</li>
                        <li>Find resumes with low TTP (time to be productive)</li>
                        <li>Recruit best talent through focused search</li>
                        <li>Find resumes with low TTB (time to bill)</li>
                        <li>Find resumes with good presentation</li>
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
                         <p class="col-sm-12 pad-b20">Thanks for registering with Nanochip Solutions. Your request is in process it takes about 24 hours to activate your account, Please check your email to activate your account. Please contact us at info@nanochipsolutions.com or call us at +91-80-4078 8574</p>                                 
                           <?php } else { ?>
                           <form action="" method="POST" name="registrationForm" id="registrationForm">
                              <div class="clearfix">
                              <div class="form-group col-sm-6 hpad-10">
                                  <span class="m-field">*</span>
                                  <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name" />                                  
                              </div>
                              <div class="form-group col-sm-6 hpad-10">
                                 <span class="m-field">*</span>
                                  <input type="text" class="form-control" placeholder="User Name" id="userName" name="userName" />
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
                                  <input type="text" class="form-control" placeholder="Designation" id="designation" name="designation" />
                              </div>
                              <div class="form-group col-sm-6 hpad-10">
                                  <input type="text" class="form-control" placeholder="Company URL" id="url" name="url" />
                              </div>                               
                              <div class="form-group col-sm-6 hpad-10 pad-t10">
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox"> I agree to the <a href="#">Terms &amp; Conditions</a>
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
    <script src="recruitment/js/bootstrap.min.js"></script>
</body>

</html>
