<?php
include('../application/conn.php');
include('include/resumeType.php');
error_reporting(-1);

$studentSql = mysql_query("Select * from tbl_student where admission=1");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['idstudent'] = $row['idstudent'];
    $studentArray[$i]['studentname'] = $row['firstname'].' - '.$row['lastname'];
    $studentArray[$i]['idstudent'] = $row['idstudent'];
    $studentArray[$i]['email'] = $row['email'];
    $studentArray[$i]['mobile'] = $row['mobile'];
    $studentArray[$i]['resumeid'] = $row['resumeid'];
    $i++;
}

$recruitementSql = mysql_query("Select a.*,b.* 
                              from tbl_recruitement as a, tbl_recruiter as b
                              where a.idrecruiter=b.idrecruiter and a.status='Open'");
$resume=0;
while($row = mysql_fetch_assoc($recruitementSql))
{
    $recruitmentPositionArray[$resume]['idrecruitement'] = $row['idrecruitement'];
    $recruitmentPositionArray[$resume]['recruitementposition'] = $row['company'].'-'.$row['usename'];
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

            mysql_query("Insert into tbl_recruitementresumes (idstudent,idrecruitement) Values 
                ('$idStudent','$idrecruitement')");
        }
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
            }
    } );

} );

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
  <form action='' method="POST">
  <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
     <div class="container mar-t30">
        <div class="clearfix brd-btm pad-b20">
        <a href="addAdmission.php" class="btn btn-primary pull-right" >+ ADD Student</a>                     
    </div>     
  
            <table id="example" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>ResumeId</th>
                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody>
                <?php for($i=0;$i<count($studentArray);$i++){
                    $idstudent = $studentArray[$i]['idstudent'];?>
                    <tr>
                        <td><?php echo $studentArray[$i]['studentname'];?></td>
                        <td><?php echo $studentArray[$i]['email'];?></td>
                        <td><?php echo $studentArray[$i]['mobile'];?></td>
                        <td><?php echo $studentArray[$i]['resumeid'];?></td>
                        
            <td><a href='addAdmission.php?idstudent=<?php echo $idstudent;?>'>View</a></td>

                    </tr>
                    <?php }?>
                    
                </tbody>
            </table>
</div>
</form>
</body>

            