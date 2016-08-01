<?php
include("application/conn.php");
include('include/sessioncheck.php');
include('include/settingmessage.php');


$idstudent=$_SESSION['idstudent'];

$profileInformationSql = mysql_query("Select * from tbl_student where idstudent=$idstudent");
while($row = mysql_fetch_assoc($profileInformationSql))
{
    $pgdip_schoolname = $row['pgdip_schoolname'];
}

$academicsql = mysql_query("Select * from tbl_academicproject where idstudent='$idstudent'");
$i=0;
while($row = mysql_fetch_assoc($academicsql))
{
    $academicArray[$i]['idacademicproject'] = $row['idacademicproject'];
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

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
    function nextClickButton()
    {
         parent.location='companyProjects.php';
    }
    function fndeleteProject(id)
    {
      var cnf = confirm('Do you really want to Delete');
      if(cnf==true)
      {
        formData='idacademicproject='+id;   
        $.ajax({
        url : "delete_academicproject.php",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
         
          parent.location='rvvlsiOrOtherProjects.php';
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        
        }
      });
      }
    }
    </script>
  </head>

  <body>
   <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">

<?php if($pgdip_schoolname=='0'){?>
     <p class="alert alert-success txtc font16-sm-reg  label-info">
<br/>

This section does not apply to you.<br/>

     <strong>Tip:</strong> The quality of your resume
     will significantly improve if you can add any skill development courses which involve
     using industry standard tools and exposure to technology. These skills are
     highly desirable for prospective employers. Contact RV-VLSI to add industry relevant skills
     to your resume.
<br/> 
</p>
<?php } else {?>
     <p class="alert alert-success txtc font16-sm-reg  label-info"><?php echo $traininginstitutepage;?>

    <div class="clearfix brd-btm pad-b20">
        <a href="addrvvlsiOrOtherProjects.php" class="btn btn-primary pull-right">+ ADD PROJECT</a>                     
    </div>    
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Institue Name & Place</th>
          <th>Title</th>
          <th>Role</th>
          <th>Tool</th>
          <th>Actions</th>
           <th>Delete</th>
        </tr>
      </thead>
      <tbody>
          <?php for($i=0;$i<count($academicArray);$i++){
              $idacademicproject = $academicArray[$i]['idacademicproject'];?>
              <tr>
          <td><?php echo $academicArray[$i]['college_name'];?></td>
          <td><?php echo $academicArray[$i]['project_title'];?></td>
          <td><?php echo $academicArray[$i]['role'];?></td>
          <td><?php echo $academicArray[$i]['tools_used'];?></td>
          <td><a href="editrvvlsiOrOtherProjects.php?idacademicproject=<?php echo $academicArray[$i]['idacademicproject'];?>" class="icon icon--edit" >Edit</a></td>
           <td onclick="fndeleteProject(<?php echo $idacademicproject;?>)">Delete</td>
        </tr> 
              
          <?php } ?>
                                                         
      </tbody>
    </table>   
<?php }?>             
    <div class="clearfix brd-top pad-t20">
        <button type="button" class="btn btn-primary pull-right" onclick='nextClickButton()'>NEXT</button>                      
    </div>                   
    </div> 
    
    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
 
  </body>
</html>
