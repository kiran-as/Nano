<?php
include('../application/conn.php');
include('include/resumeType.php');
error_reporting(-1);

$studentSql = mysql_query("Select idstudent,rvvlsiid,firstname,lastname,email,mobile,resumeid,profilepic,updated_date,placed from tbl_student where rvvlsiid!='' and rvvlsiid!='0'");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['idstudent'] = $row['idstudent'];
    $studentArray[$i]['studentname'] = $row['firstname'].' - '.$row['lastname'];
        $studentArray[$i]['idstudent'] = $row['idstudent'];

    $studentArray[$i]['email'] = $row['email'];

    $studentArray[$i]['mobile'] = $row['mobile'];

    $studentArray[$i]['resumeid'] = $row['rvvlsiid'];
  $studentArray[$i]['profilepic'] = $row['profilepic'];
    $studentArray[$i]['updated_date'] = $row['updated_date'];
   $studentArray[$i]['placed'] = $row['placed'];
    $i++;
}

$recruitementSql = mysql_query("Select a.*,b.* 
                              from tbl_recruitement as a, tbl_recruiter as b
                              where a.idrecruiter=b.idrecruiter and a.status='Open'");
$resume=0;
while($row = mysql_fetch_assoc($recruitementSql))
{
    $recruitmentPositionArray[$resume]['idrecruitement'] = $row['idrecruitement'];
    $recruitmentPositionArray[$resume]['recruitementposition'] = $row['company'].'-'.$row['usename'].'-'.$row['recruitementposition'];
    $resume++;
}

if($_POST)
{
  //print_R($_POST);
  //exit;
   if($_POST['recruitmentPosition']!='')
    {
        for($i=0;$i<count($_POST['studentName']);$i++)
        {
            $idStudent = $_POST['studentName'][$i];
            $idrecruitement = $_POST['recruitmentPosition'];
             mysql_query("Delete from tbl_recruitementresumes where idstudent='$idStudent'
                and idrecruitement='$idrecruitement'");

            mysql_query("Insert into tbl_recruitementresumes (idstudent,idrecruitement,resume_shortlisted) Values 
                ('$idStudent','$idrecruitement','Yes')");
        }
           echo "<script>alert('Candidates has been assigned to this job');</script>";
         echo "<script>parent.location='studentlist.php'</script>";
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
    <link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

   <?php include('include/nav.php');?>
    <section class="nrb-rhs-container">      
       <div class="container-fluid pad-t20">
        <h3 class="nrb-primary-title pad-b10 mar-t5">Assign Resumes</h3>
        <table id="example" class="table nrb-table" cellspacing="0" width="100%">
            <thead>
               <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>ResumeId</th>
                        <th>Placement</th>
                         <?php for($resumetype=0;$resumetype<count($resumeTypesArray);$resumetype++){                          ?>

                        <th><?php echo substr($resumeTypesArray[$resumetype]['resumetypename'],0,3);?></br>
                        <?php echo $resumeTypesArray[$resumetype]['resumeKeyCount'];?></th>
 <?php }?>
            <th>View Resume</th>
            <th>Download Resume</th>
                    </tr>
            </thead>
            <tbody>
                <?php for($i=0;$i<count($studentArray);$i++){
                    $idstudent = $studentArray[$i]['idstudent'];
                    $profilepic = $studentArray[$i]['profilepic'];
 $placed =$studentArray[$i]['placed'];?>
                    <tr>
            <td><input type='checkbox' name='studentName[]' value='<?php echo $idstudent;?>'>
                        <a class="image-popup-vertical-fit" href='../img/profilepic/<?php echo $profilepic;?>'>
<?php echo $studentArray[$i]['studentname'];?></a></td>
                        <td><?php echo $studentArray[$i]['mobile'];?></td>
                        <td><?php echo $studentArray[$i]['resumeid'];?></td>
                            <td><a class="simple-ajax-popup-align-top" href='placementiframe.php?idStudent=<?php echo $idstudent;?>'>
<?php if($placed=='Yes') {?>
Placed
<?php } else { ?>
Placement Details
<?php }?>

</a></td>
                         <?php
                         $resumeKeyWordsSql = mysql_query("Select * from tbl_studentresumekeywords where idstudent='$idstudent' order by idresumetype asc");
                         while($row = mysql_fetch_assoc($resumeKeyWordsSql))
                         { ?>

                         <td>
                           <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $row['keywords'];?>">
                         <?php echo $row['noofkeywords'];?>
                         </div>
                         </td>
                         <?php } ?>
            <td><a href='viewResume.php?idstudent=<?php echo $idstudent;?>' target='_blank'>View</a></td>
            <td><a href='downloadResume.php?idstudent=<?php echo $idstudent;?>' target='_blank'>Download</a></td>

                    </tr>
                    <?php }?>
                    
                </tbody>
        </table>
        <table>
             <tr>
                <td>
                <select id='recruitmentPosition' name='recruitmentPosition'>
                <option value=''>Select</option>
                        <?php for($i=0;$i<count($recruitmentPositionArray);$i++){ 
                            $idrecruitementPosition = $recruitmentPositionArray[$i]['idrecruitement'];?>

                            <option value='<?php echo $idrecruitementPosition;?>'>
                            <?php echo $recruitmentPositionArray[$i]['recruitementposition'];?></option>
                        <?php }?>
                    </select>
                    
                </td>
                <td>
                <div class="form-group">
            <label class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary">Assign</button>
            </div>        
          </div>  
                </td>
             </tr>
            </table>
       </div>        
    </section>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
    
    <script>    
        $(document).ready(function() {
            $('#example').dataTable({
        
                "fnDrawCallback": function() {
                },
                "oLanguage": { "sSearch": "<p class='help-block'>Search for one pattern in the database (only one keyword)</p>" } 
    } );
        } );
          
    </script>    
</body>

</html>
