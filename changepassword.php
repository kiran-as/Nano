<?php
include('application/conn.php');
$idstudent = $_SESSION['idstudent'];
if($_POST)
{
      $password = $_POST['password'];
   
         mysql_query("Update tbl_student set password='$password' where idstudent='$idstudent'");
        
        echo "<script>alert('Your password has been updated, Please login again to continue');</script>";
        echo "<script>parent.location='index.php'</script>";
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
                return true;
            }
    }
    </script>
  </head>

   <body>
   <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    
 <div class="login-container">
            <form class="form-login" role="form" action="" method="POST">                
                <label for="inputPassword" class="sr-only" >Password</label>
                <input type="text" name="password" id="password" value="" placeholder="Password" required="" class="form-control clear--top clr-brdradius"><br/>
                                <input type="text" name="cnfpassword" id="cnfpassword" placeholder="Confirm Password" value="" required="" class="form-control clear--top clr-brdradius"><br/>

                <button class="btn btn-lg btn-primary btn-block clr-brdradius" type="submit" onclick="return validateNewUser()">LOGIN</button>
               
              </form>            
        </div>
    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
 
  </body>
</html>
