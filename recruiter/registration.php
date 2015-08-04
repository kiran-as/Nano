<?php
include('../application/conn.php');
$thankyouMessage = 0;
if($_POST)
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
        echo "<script>parent.location='registration.php'</script>";
        exit;
        
    }


    else
    {

        $companyName = $_POST['companyName'];
        $userName = $_POST['userName'];
        $mobile = $_POST['mobile'];
        $url = $_POST['url'];
         $date = date('Y-m-d H:i:s');
         try
         {
         mysql_query("Insert into tbl_recruiter (company,usename,email,mobile,web_url,registereddate)
             values('$companyName','$userName','$email','$mobile','$url','$date')");
         }
         catch (Exception $ex)
         {
            throw new Exception($ex->getMessage());
         }
        $thankyouMessage = 1;
    }
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
  <script src="../js/jquery-1.11.0.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    function validateNewUser()
    {
        return true;

        pwd = $('#password').val();
        cnfpwd = $('#cnfpassword').val();
        if(pwd!=cnfpwd)
        {
            alert('There is an mismatch in the password, Please try again');
            $('#password').val('');
            $('#cnfpassword').val('');
            return false;
        }
        else
        {
            var termsandconditionss = $('#termsandconditions').is(':checked');;
            if(termsandconditionss==false)
            {
                alert('Please Accept the Terms and Condition by clicking on the checkbox');
                return false;
            }
            else
            {
                return true;
            }
        }
    }
    </script>
  </head>

  <body>
       <section class="login-wrapper">
       <?php if($thankyouMessage==0){?>
        <div class="login-container">
            <a href="#" class="logo logo--small mar-b30"></a>
            <form class="form-login" role="form" action="" method="POST">                
                <label for="inputEmail" class="sr-only">Company Name</label>
                <input type="text" name="companyName" id="companyName" value="" class="form-control clear--top clr-brdradius" placeholder="Company Name" required="" autofocus=""> <br/>
                <label for="inputEmail" class="sr-only">User Name</label>
                <input type="text" name="userName" id="userName" value="" class="form-control clear--top clr-brdradius" placeholder="Name" required="" autofocus=""> <br/>
                 <label for="inputEmail" class="sr-only">Email</label>
                <input type="text" name="email" id="email" value="" class="form-control clear--top clr-brdradius" placeholder="Email Address" required="" autofocus=""> <br/>
                 <label for="inputEmail" class="sr-only">Mobile</label>
                <input type="text" name="mobile" id="mobile" value="" class="form-control clear--top clr-brdradius" placeholder="Mobile" required="" autofocus=""> <br/>
                 <label for="inputEmail" class="sr-only">Company Web URL</label>
                <input type="text" name="url" id="url" value="" class="form-control clear--top clr-brdradius" placeholder="URL" required="" autofocus=""> <br/>
                
                <button class="btn btn-lg btn-primary btn-block clr-brdradius" type="submit" onclick="return validateNewUser()">Register</button>
                <input type="checkbox" id="termsandconditions" checked="checked">Terms and Conditions
                <div class="mar-t30">

                <a href="#">Forgot Password?</a> &nbsp;&nbsp;&nbsp;
                <a href="index.php">Sign In?</a></div>
              </form>            
        </div>
        <?php } else {?>
<div class="login-container">
            Thank you for registering into the NanochipSolutions, We will activate your account within
            24 hours and you can access the portal for further use.<br/><br/><br/>
            Thanking you<br/>
            Nanochip Solutions <br/>
            <a href="http://nanochipsolutions.com">Home Page</a>        
        </div>
        <?php } ?>
    </section>

  </body>
</html>
