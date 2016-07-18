<?php
include('../application/conn.php');
include('include/resumeType.php');
error_reporting(-1);


if($_POST)
{
     $studentArray = array();
	$batchId = $_POST['search'];
	$studentSql = mysql_query("Select idstudent,rvvlsiid,firstname,lastname,email,mobile,resumeid,profilepic,updated_date,placed from tbl_student where rvvlsiid like '%$batchId%'");
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

 $searched = 1;
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
 <form action='' method="POST">
   <?php include('include/nav.php');?>
    <section class="nrb-rhs-container">      

       <div class="container-fluid pad-t20">
        <h3 class="nrb-primary-title pad-b10 mar-t5">Placement Details</h3>
        <div class="form-group">
            <div class="col-sm-4">
<input type="text" class="form-control input-sm" name="search" id="search" value=""/><p class='help-block'>Search for Batch( 1ADADB25 or 1ADADB26 etc)</p>
</div>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>            </form>

            <?php if($searched==1){ ?>
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
            <td><?php echo $studentArray[$i]['studentname'];?></td>
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
        <?php }?>
       
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
                 "bLengthChange": false,
                   "iDisplayLength": 50,
                   "bFilter": false,
                "fnDrawCallback": function() {
                },
                "oLanguage": { "sSearch": "<p class='help-block'>Search for one pattern in the database (only one keyword)</p>" } 
    } );
        } );
          
    </script>    
</body>

</html>
