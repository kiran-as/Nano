
<?php
include('../application/conn.php');

$idStudent = $_GET['idStudent'];

$studentSql = mysql_query("Select firstname,lastname,email,mobile,resumeid from tbl_student where idstudent='$idStudent'");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $idstudent = $row['idstudent'];
    $studentname = $row['firstname'].' - '.$row['lastname'];
        $idstudent = $row['idstudent'];

    $email = $row['email'];

    $mobile = $row['mobile'];

    $resumeid = $row['resumeid'];
   
}
$offCampusSql = mysql_query("Select * from tbl_recruiter");
$i=0;
while($row = mysql_fetch_assoc($offCampusSql))
{
    $offCampusarray[$i]['idrecruiter'] = $row['idrecruiter'];
    $offCampusarray[$i]['company'] = $row['company'];    
    $i++;
}



$studentSql = mysql_query("Select a.idrecruitementresumes,b.recruitementposition,b.recruitementdate,c.company,a.*
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

    $recruitementDetails[$i]['written_test'] = $row['written_test'];
    $recruitementDetails[$i]['first_round'] = $row['first_round'];
    $recruitementDetails[$i]['second_round'] = $row['second_round'];
    $recruitementDetails[$i]['third_round'] = $row['third_round'];
    $recruitementDetails[$i]['resume_shortlisted'] = $row['resume_shortlisted'];

     $i++;
}

if($_POST['company']){

   $idrecruiter = $_POST['company'];
   $date = $_POST['datepicker'];
   $jobposition = $_POST['jobposition'];
   $comments = "OffCampus ".$_POST['comments'];
   $datepicker = date('Y-m-d',strtotime($_POST['datepicker']));
   $sql = mysql_query("Insert into tbl_recruitement 
    (recruitementposition,idrecruiter,recruitementdate) values 
           ('$jobposition','$idrecruiter','$datepicker')");
   $lastId = mysql_insert_id();
   
   $recrutimetresumes = "Insert into tbl_recruitementresumes
   (review,idrecruitement,idstudent,third_round,interviewdate) values 
   ('$comments','$lastId','$idStudent','Yes','$datepicker')";

  mysql_query($recrutimetresumes);
   $placed = 'Yes';
       $updateSql = "Update tbl_student set placed='$placed' 
        where idstudent='$idStudent'";
        mysql_query($updateSql);
  
echo "<script>parent.location='studentlist.php'</script>";
exit;
}
if($_POST['idrecruitementresumes'])
{
  for($i=0;$i<count($_POST['idrecruitementresumes']);$i++)
  {
    $idrecruitementresumes = $_POST['idrecruitementresumes'][$i];
    $review = $_POST['review'][$idrecruitementresumes];
    $resume_shortlisted = $_POST['resume_shortlisted'][$i];
    $written_test = $_POST['written_test'][$i];
    $first_round = $_POST['first_round'][$i];
    $second_round = $_POST['second_round'][$i];
    $third_round = $_POST['third_round'][$i];
    if($third_round=='Yes')
    {
       $placed = 'Yes';
       $updateSql = "Update tbl_student set placed='$placed' 
        where idstudent='$idStudent'";
        mysql_query($updateSql);
    }
    $updateSql = "Update tbl_recruitementresumes set review='$review',
    written_test='$written_test',
    first_round='$first_round',
    second_round='$second_round',
    third_round='$third_round',
    resume_shortlisted='$resume_shortlisted' 
    where idrecruitementresumes='$idrecruitementresumes'";
    mysql_query($updateSql);

  }

 
  
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
       <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

  </head>
   <script>

    $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "2015:2020"
    });
  });

    function fnshowData(id) {
      if(id=='Process') {
         $('#academicProject').show();
         $('#newRecruiter').hide();
      } else {
        $('#academicProject').hide();
        $('#newRecruiter').show();
      }
    }
    </script>
  <body >
  <table>
        <tr>
          <td><input type='radio' name="campus" id="campus" value="Process" onclick="fnshowData(this.value)" checked="checked">Process
              <input type='radio' name="campus" id="campus" value="OffCampus" onclick="fnshowData(this.value)">OffCampus
          </td>
        </tr>
     </table>
      <form action="" method="POST" id="academicProject">
 <div class="container mar-t30">
    <div class="row">
        <div class="form-horizontal">

         <div class="form-group">
              <label class="col-sm-2 control-label"> Name</label>
              <div class="col-sm-3">
                         <input  class="form-control" type="text"  readonly="readonly" value='<?php echo $studentname;?>'> 
              </div>      
           
              <label class="col-sm-2 control-label"> Email</label>
              <div class="col-sm-3">
                  <input type='text' class="form-control" readonly="readonly" value="<?php echo $email;?>">
                </div>          
            </div>
         <div class="form-group">
              <label class="col-sm-2 control-label"> Mobile</label>
              <div class="col-sm-3">
                         <input  class="form-control" type="text"  readonly="readonly" value='<?php echo $mobile;?>'> 
              </div>      
           
              <label class="col-sm-2 control-label"> Resume Id</label>
              <div class="col-sm-3">
                  <input type='text' class="form-control" readonly="readonly" value="<?php echo $resumeid;?>">
                </div>          
            </div>
            
            </div>
            </div>
            </div>
          
    
    <div class="container mar-t10" style='background-color:white';>
    
    <table width='100%' border="1">
      <tr>
         <th>Company Name</th>
         <th>Job Position</th>
         <th>Interview date</th>
         <th>Resume shortlisted</th>
          <th>Written test cleared</th>
           <th>First round cleared</th>
            <th>Interview second round</th>
             <th>Placed</th>
              <th>Comments</th>
      </tr>
  <?php for($i=0;$i<count($recruitementDetails);$i++)
  { $idrecruitementresumes = $recruitementDetails[$i]['idrecruitementresumes'];
  $resume_shortlisted = $recruitementDetails[$i]['resume_shortlisted'];
  $written_test = $recruitementDetails[$i]['written_test'];
  $first_round = $recruitementDetails[$i]['first_round'];
  $second_round = $recruitementDetails[$i]['second_round'];
  $third_round = $recruitementDetails[$i]['third_round'];
  ?>
          <tr>

             <td><input type='hidden' name='idrecruitementresumes[]' value='<?php echo $idrecruitementresumes;?>'/><?php echo $recruitementDetails[$i]['company'];?>
             </td>
             <td><?php echo $recruitementDetails[$i]['recruitementposition'];?>
             </td>
             <td><?php echo $recruitementDetails[$i]['recruitementdate'];?>
             </td>
             <td>
             <input type='radio' name='resume_shortlisted[]' value='Yes' <?php if($resume_shortlisted=='Yes'){ echo "checked=checked";} ?> >Yes<input type='radio' name='resume_shortlisted[]' value='No' <?php if($resume_shortlisted=='No'){ echo "checked=checked";} ;?>>No</td>
             <td>
             <input type='radio' name='written_test[]' value='Yes'  <?php if($written_test=='Yes'){ echo "checked=checked";} ?>>Yes<input type='radio' name='written_test[]' value='No'  <?php if($written_test=='No'){ echo "checked=checked";} ;?>>No</td>
            <td>
             <input type='radio' name='first_round[]' value='Yes'  <?php if($first_round=='Yes'){ echo "checked=checked";} ?>>Yes<input type='radio' name='first_round[]' value='No'  <?php if($first_round=='No'){ echo "checked=checked";} ;?>>No</td>
            <td>
             <input type='radio' name='second_round[]' value='Yes'  <?php if($second_round=='Yes'){ echo "checked=checked";} ?>>Yes<input type='radio' name='second_round[]' value='No'  <?php if($second_round=='No'){ echo "checked=checked";} ;?>>No</td>
            <td>
             <input type='radio' name='third_round[]' value='Yes'  <?php if($third_round=='Yes'){ echo "checked=checked";} ?>>Yes<input type='radio' name='third_round[]' value='No'  <?php if($third_round=='No'){ echo "checked=checked";} ;?>>No</td>
            
             <td><textarea name='review[<?php echo $idrecruitementresumes;?>]' ><?php echo $recruitementDetails[$i]['review'];?></textarea>
             </td>
          </tr>
          
   <?php }?>  
   
   </table>                
            <div class="clearfix brd-top pad-t20">

                <button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">Save & Continue</button>       
            </div> 
            </div>                   
     </div>
 </form>

 <form name="newRecruiter" id="newRecruiter" method="POST" style="display:none;">
   <table border="1" width="100%">
       <tr>
           <td width="50%">Company</td>
           <td> 
                <select class="form-control" id="company" name="company">
                  <option value="">Select</option>
                  <?php for($i=0;$i<count($offCampusarray);$i++){?>
                  <option value="<?php echo $offCampusarray[$i]['idrecruiter'];?>"><?php echo $offCampusarray[$i]['company'];?></option>
                  <?php }?>

              </select>
            </td>
            </tr>
          <tr>
            <td> Interview or Joining Date </td>
            <td>        <input type="text" class="form-control" placeholder="Interview Date" id="datepicker" name="datepicker" value=""></td>
          </tr>
          <tr>
             <td>Job Position</td>
             <td><input type="text" class="form-control" placeholder="Job Position" id="jobposition" name="jobposition" value=""></td>
          </tr>
          <tr>
             <td>Comments</td>
             <td><input type="text" class="form-control" placeholder="Comments" id="comments" name="comments" value=""></td>
          </tr>
          <tr>
             <td colspan="2"><input type="submit" name="save" id="save" class="btn btn-primary pull-right"></td>
          </tr>
      </table>
     </form>
  </body>
</html>
