<?php
include('application/conn.php');
$idstudent = $_SESSION['idstudent'];
if($_POST)
{
    mysql_query("Delete from tbl_achievements where idstudent='$idstudent'");
    mysql_query("Delete from tbl_corecompetancy where idstudent='$idstudent'");
    $career_objective = $_POST['career_objective'];
    mysql_query("Update tbl_student set career_objective='$career_objective' where idstudent='$idstudent'");

    for($i=0;$i<3;$i++)
    {
        $achievements = $_POST['achievments'][$i];
        if($achievements!='')
        {
            mysql_query("Insert into tbl_achievements(achievements,idstudent)"
                    . "value('$achievements','$idstudent')");
        }
    }

    for($i=0;$i<5;$i++)
    {
        $corecompetancy = $_POST['corecompetancy'][$i];
        if($corecompetancy!='')
        {
            mysql_query("Insert into tbl_corecompetancy(corecompetancy,idstudent)"
                    . "value('$corecompetancy','$idstudent')");
        }
    }
}

$profileInformationSql = mysql_query("Select * from tbl_student where idstudent=$idstudent");
while($row = mysql_fetch_assoc($profileInformationSql))
{
    $career_objective = $row['career_objective'];
}
$achievementSql = mysql_query("Select * from tbl_achievements where idstudent=$idstudent");
$achievementsArray = array();
$i=0;
while($row = mysql_fetch_assoc($achievementSql))
{
    $achievementsArray[$i]['achievements'] = $row['achievements'];
    $i++;
}

$coreCompetancySql = mysql_query("Select * from tbl_corecompetancy where idstudent=$idstudent");
$corecompetancyArray = array();
$i=0;
while($row = mysql_fetch_assoc($coreCompetancySql))
{
    $corecompetancyArray[$i]['corecompetancy'] = $row['corecompetancy'];
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
<form name="" method="POST">
  <div class="form-group">
    <label>Core Competancy</label>
    <textarea  class="form-control mar-b15" rows="2"  name="corecompetancy[]" ><?php echo $corecompetancyArray[0]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="2"  name="corecompetancy[]" ><?php echo $corecompetancyArray[1]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="2"  name="corecompetancy[]" ><?php echo $corecompetancyArray[2]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="2"  name="corecompetancy[]" ><?php echo $corecompetancyArray[3]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="2"  name="corecompetancy[]" ><?php echo $corecompetancyArray[4]['corecompetancy'];?></textarea>
  </div>    
  <div class="form-group brd-btm pad-b20">
    <label>Career Objective</label>
    <textarea  class="form-control" rows="3" id="career_objective" name="career_objective"><?php echo $career_objective;?></textarea>
  </div>  
  <div class="form-group">
    <label>Achivevement Details</label>
    <textarea  class="form-control mar-b15" rows="2"  name="achievments[]" ><?php echo $achievementsArray[0]['achievements'];?></textarea>
    <textarea  class="form-control mar-b15" rows="2"  name="achievments[]" ><?php echo $achievementsArray[1]['achievements'];?></textarea>
    <textarea  class="form-control mar-b15" rows="2"  name="achievments[]" ><?php echo $achievementsArray[2]['achievements'];?></textarea>
  </div>    
                        
    <div class="clearfix brd-top pad-t20">
        <button type="submit" class="btn btn-primary pull-right">SUBMIT</button>                      
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
