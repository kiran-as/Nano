<?php
include('../application/conn.php');
error_reporting(-1);
$idstudent = $_GET['idstudent'];
$studentSql = mysql_query("Select * from tbl_student where idstudent=$idstudent");


$idresumetypekeyword = $_GET['idresumekeywords'];
if($_POST)
{
   
  $password = str_replace("'","&#39;",$_POST['password']);

 
     mysql_query("Update tbl_student set password='$password'
                  where idstudent='$idstudent'");
  
 
  echo "<script>parent.location='studentlist.php'</script>";
  exit;
}
?>
	<link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

	<script src="../js/jquery-1.11.0.min.js"></script>

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
        
    }
    </script>
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
  <?php include('../include/header.php');?>
    <?php include('include/nav.php');?>
        <form name='' method="POST" action="">
    <div class="container mar-t30">
       <div class="row">
        <div class="form-horizontal col-sm-6">
          
           <div class="form-group">
            <label class="col-sm-4 control-label">Password</label>
            <div class="col-sm-8">
 <input type="password" name="password" id="password" value="" placeholder="Password" required="" class="form-control clear--top clr-brdradius"><br/>
            </div> 
            <label class="col-sm-4 control-label">Retype Password</label>
            <div class="col-sm-8">
                <input type="password" name="cnfpassword" id="cnfpassword" placeholder="Confirm Password" value="" required="" class="form-control clear--top clr-brdradius"><br/>
            </div>        
          </div>
           <div class="form-group">
            <label class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary" onclick="return validateNewUser()">Save</button>
            </div>        
          </div>    
        </div>   
   
            
      </div>
     
  </div>
  </form>

  </body>
</html>
