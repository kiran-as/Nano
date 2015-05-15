
<?php
include('../application/conn.php');

include('include/sessioncheck.php');
$idStudent = $_GET['idStudent'];

$studentSql = mysql_query("Select a.idrecruitementresumes,b.recruitementposition,b.recruitementdate,c.company,a.review
        from tbl_recruitementresumes as a, tbl_recruitement as b, tbl_recruiter as c
        where a.idrecruitement=b.idrecruitement 
        and b.idrecruiter=c.idrecruiter and a.idstudent=$idStudent");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $recruitementDetails[$i]['recruitementposition'] = $row['recruitementposition'];
    $recruitementDetails[$i]['recruitementdate'] = $row['recruitementdate'];
    $recruitementDetails[$i]['company'] = $row['company'];
    $recruitementDetails[$i]['idrecruitementresumes'] = $row['idrecruitementresumes'];
         $recruitementDetails[$i]['review'] = $row['review'];

     $i++;
}


if($_POST)
{
  
  for($i=0;$i<count($_POST['idrecruitementresumes']);$i++)
  {
    $idrecruitementresumes = $_POST['idrecruitementresumes'][$i];
    $review = $_POST['review'][$idrecruitementresumes];
    $updateSql = "Update tbl_recruitementresumes set review='$review' 
    where idrecruitementresumes='$idrecruitementresumes'";
    mysql_query($updateSql);

  }

  $placed = $_POST['placed'];
   $updateSql = "Update tbl_student set placed='$placed' 
    where idstudent='$idStudent'";
    mysql_query($updateSql);
  
echo "<script>parent.location='studentlist.php'</script>";
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">
  
  </head>

  <body >
 
      <form action="" method="POST" id="academicProject">
 
    
    <div class="container mar-t10" style='background-color:white';>
    <table width='100%'>
      <tr>
         <th>Company Name</th>
         <th>Job Position</th>
         <th>Date</th>
         <th>Review</th>
      </tr>
  <?php for($i=0;$i<count($recruitementDetails);$i++)
  { $idrecruitementresumes = $recruitementDetails[$i]['idrecruitementresumes']?>
          <tr>

             <td><input type='hidden' name='idrecruitementresumes[]' value='<?php echo $idrecruitementresumes;?>'/><?php echo $recruitementDetails[$i]['company'];?>
             </td>
             <td><?php echo $recruitementDetails[$i]['recruitementposition'];?>
             </td>
             <td><?php echo $recruitementDetails[$i]['recruitementdate'];?>
             </td>
             <td><textarea name='review[<?php echo $idrecruitementresumes;?>]' ><?php echo $recruitementDetails[$i]['review'];?></textarea>
             </td>
          </tr>
          
   <?php }?>  
   <tr>
      <td colspan="4">Placed?<input type='radio' name='placed' value='Yes'>Yes
      <input type='radio' name='placed' value='No'>No</td>
   </tr>
   </table>                
            <div class="clearfix brd-top pad-t20">
                <button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">Save & Continue</button>       
            </div> 
            </div>                   
     </div>

   
      </form>
  </body>
</html>
