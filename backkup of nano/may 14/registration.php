<?php
include('application/conn.php');
if($_POST)
{
    $idstudent = 0;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $studentSql = mysql_query("Select * from tbl_student where email='$email' and  password='$password'");
    while($row = mysql_fetch_assoc($studentSql))
    {
        $idstudent = $row['idstudent'];
        $studentName = $row['firstname'].' - '.$row['lastname'];
    }
   
    if($idstudent!='0')
    {
       
        echo "<script>alert('This email address is already registerd, Please try different');</script>";
        echo "<script>parent.location='registration.php'</script>";
        exit;
        
    }
    else
    {
         $date = date('Y-m-d H:i:s');
         mysql_query("Insert into tbl_student (email,password,created_date)
             values('$email','$password','$date')");
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
    <title>Nanochip Solutions</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
  <script src="js/jquery-1.11.0.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    function validateNewUser()
    {
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
        <div class="login-container">
            <a href="#" class="logo logo--small mar-b30"></a>
            <form class="form-login" role="form" action="" method="POST">                
                <label for="inputEmail" class="sr-only">Login ID</label>
                <input type="text" name="email" id="email" value="" class="form-control clear--top clr-brdradius" placeholder="Email Address" required="" autofocus=""> <br/>
                <label for="inputPassword" class="sr-only" >Password</label>
                <input type="password" name="password" id="password" value="" placeholder="Password" required="" class="form-control clear--top clr-brdradius"><br/>
                <input type="password" name="cnfpassword" id="cnfpassword" placeholder="Confirm Password" value="" required="" class="form-control clear--top clr-brdradius"><br/>

                <button class="btn btn-lg btn-primary btn-block clr-brdradius" type="submit" onclick="return validateNewUser()">LOGIN</button>
                <input type="checkbox" id="termsandconditions" checked="checked">Terms and Conditions
                <div class="mar-t30">

                <a href="#">Forgot Password?</a> &nbsp;&nbsp;&nbsp;
                <a href="index.php">Sign In?</a></div>
              </form>            
        </div>
    </section>

  </body>
</html>
