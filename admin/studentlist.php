<?php
include('../application/conn.php');
include('include/resumeType.php');
error_reporting(-1);

$studentSql = mysql_query("Select idstudent,firstname,lastname,email,mobile,resumeid,profilepic,updated_date from tbl_student");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['idstudent'] = $row['idstudent'];
    $studentArray[$i]['studentname'] = $row['firstname'].' - '.$row['lastname'];
        $studentArray[$i]['idstudent'] = $row['idstudent'];

    $studentArray[$i]['email'] = $row['email'];

    $studentArray[$i]['mobile'] = $row['mobile'];

    $studentArray[$i]['resumeid'] = $row['resumeid'];
  $studentArray[$i]['profilepic'] = $row['profilepic'];
    $studentArray[$i]['updated_date'] = $row['updated_date'];
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
    <link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

    <script type="text/javascript" language="javascript" src="tablegrid/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="tablegrid/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {


    $('#example').dataTable({
       "order": [[ 3, "desc" ]],
                "fnDrawCallback": function() {
                    $('[data-toggle="tooltip"]').tooltip()

  $('.simple-ajax-popup-align-top').magnificPopup({
          type: 'ajax',
          alignTop: true,
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });

        $('.simple-ajax-popup').magnificPopup({
          type: 'ajax'
        });

$('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
    
  });

  $('.image-popup-fit-width').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    image: {
      verticalFit: false
    }
  });

  $('.image-popup-no-margins').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });
            },
      "oLanguage": { "sSearch": "<p class='help-block'>Search for one pattern in the database (only one keyword)</p>" } 
    } );

$('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
    
  });

  $('.image-popup-fit-width').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    image: {
      verticalFit: false
    }
  });

  $('.image-popup-no-margins').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });


} );

    </script>

<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">
<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="../css/magnific-popup.css"> 

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->

<!-- Magnific Popup core JS file -->
<script src="../js/jquery.magnific-popup.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body >
  <form action='' method="POST">
  <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <div class="clearfix brd-btm pad-b20" style="display:none">
        <a href="addCompanyProject.php" class="btn btn-primary pull-right" >+ ADD PROJECT</a>                     
    </div>    
  
            <table id="example" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>ResumeId</th>
                        <th>Placement</th>
                         <?php for($resumetype=0;$resumetype<count($resumeTypesArray);$resumetype++){                          ?>

                        <th><?php echo $resumeTypesArray[$resumetype]['resumetypename'];?></br>
                        <?php echo $resumeTypesArray[$resumetype]['resumeKeyCount'];?></th>
 <?php }?>
            <th>View Resume</th>
            <th>Download Resume</th>
            <th>Change Email/Password</th>
            <th>Updated On</th>
                    </tr>
                </thead>

                <tbody>
                <?php for($i=0;$i<count($studentArray);$i++){
                    $idstudent = $studentArray[$i]['idstudent'];
                    $profilepic = $studentArray[$i]['profilepic'];?>
                    <tr>
            <td><input type='checkbox' name='studentName[]' value='<?php echo $idstudent;?>'>
                        <a class="image-popup-vertical-fit" href='../img/profilepic/<?php echo $profilepic;?>'>
<?php echo $studentArray[$i]['studentname'];?></a></td>
                        <td><?php echo $studentArray[$i]['mobile'];?></td>
                        <td><?php echo $studentArray[$i]['resumeid'];?></td>
                            <td><a class="simple-ajax-popup-align-top" href='placementiframe.php?idStudent=<?php echo $idstudent;?>'>
Placement Details</a></td>
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
            <td><a href='profileInformation.php?idstudent=<?php echo $idstudent;?>' >Change Password/Email</a></td>
            <td><?php echo $studentArray[$i]['updated_date'];?></td>

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
</form>
</body>

            