<?php
include('../application/conn.php');
if($_POST)
{
  
    $email = $_POST['email'];
    $password = $_POST['password'];
    $idrecruiter = '0';
    $studentSql = mysql_query("Select * from tbl_recruiter where email='$email' and  password='$password'");
    while($row = mysql_fetch_assoc($studentSql))
    {
       
        $idrecruiter = $row['idrecruiter'];
        $username = $row['usename'];
        $company = $row['company'];
    }
    $_SESSION['idrecruiter'] = $idrecruiter = 2;
    $_SESSION['username'] = $username;

    if($idrecruiter=='0')
    {
        echo "<script> alert('Please enter valid username and password');</script>";
        exit;
    }
    else
    {

        header('location: recruitementList.php');
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
       <section class="login-wrapper">
        <div class="login-container">
            <a href="#" class="logo logo--small mar-b30">Book Your Ground</a>
            <form class="form-login" role="form" action="" method="POST">                
                <label for="inputEmail" class="sr-only">Login ID</label>
                <input type="text" name="email" id="email" value="" class="form-control clear--top clr-brdradius" placeholder="Email Address" required="" autofocus="">
                <label for="inputPassword" class="sr-only" >Password</label>
                <input type="text" name="password" id="password" value="" required="" class="form-control clear--top clr-brdradius">
                <button class="btn btn-lg btn-primary btn-block clr-brdradius" type="submit">LOGIN</button>
                <div class="mar-t30"><a href="#">Forgot Password?</a></div>
              </form>            
        </div>
    </section>
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
</body>
</html>