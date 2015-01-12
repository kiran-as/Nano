<?php
include("application/conn.php");
$idstudent=$_SESSION['idstudent'];
$academicsql = mysql_query("Select * from tbl_academicproject where idstudent='$idstudent'");
$i=0;
while($row = mysql_fetch_assoc($academicsql))
{
    $academicArray[$i]['project_title'] = $row['project_title'];
    $academicArray[$i]['college_name'] = $row['college_name'];
    $academicArray[$i]['role'] = $row['role'];
    $academicArray[$i]['tools_used'] = $row['tools_used'];
    $academicArray[$i]['idacademicproject'] = $row['idacademicproject'];
    $i++;
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
  </head>

  <body>
   <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    <div class="clearfix brd-btm pad-b20">
        <a href="addrvvlsiOrOtherProjects.php" class="btn btn-primary pull-right">+ ADD PROJECT</a>                     
    </div>    
    <table class="table table-striped">
      <thead>
        <tr>
          <th>College / Institute / College</th>
          <th>Title</th>
          <th>Role</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
          <?php for($i=0;$i<count($academicArray);$i++){?>
              <tr>
          <td><?php echo $academicArray[$i]['college_name'];?></td>
          <td><?php echo $academicArray[$i]['project_title'];?></td>
          <td><?php echo $academicArray[$i]['role'];?></td>
          <td><?php echo $academicArray[$i]['tools_used'];?></td>
          <td><a href="editrvvlsiOrOtherProjects.php?idacademicproject=<?php echo $academicArray[$i]['idacademicproject'];?>" class="icon icon--edit" >Edit</a></td>
        </tr> 
              
          <?php } ?>
                                                         
      </tbody>
    </table>                
    <div class="clearfix brd-top pad-t20">
        <button type="submit" class="btn btn-primary pull-right">NEXT</button>                      
    </div>                   
    </div> 
    
    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
 
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
