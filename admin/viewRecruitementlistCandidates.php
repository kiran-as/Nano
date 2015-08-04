<?php
include('../application/conn.php');
include('include/resumeType.php');
error_reporting(-1);
$idRecruitment = $_GET['idrecruitement'];

$studentSql = mysql_query("Select a.*,b.*,c.idrecruiter
                          from tbl_student as a,
                          tbl_recruitementresumes as b,
                          tbl_recruitement as c
                          where a.idstudent = b.idstudent and
                          b.idrecruitement=c.idrecruitement and 
                          b.idrecruitement='$idRecruitment'");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
 
    $studentArray[$i]['idstudent'] = $row['idstudent'];
    $studentArray[$i]['studentname'] = $row['firstname'].' - '.$row['lastname'];
        $studentArray[$i]['idstudent'] = $row['idstudent'];

    $studentArray[$i]['email'] = $row['email'];

    $studentArray[$i]['mobile'] = $row['mobile'];

    $studentArray[$i]['resumeid'] = $row['resumeid'];
    $idrecruiter = $row['idrecruiter'];

    $i++;
}
$studentSql = mysql_query("Select a.* from tbl_recruiter as a where  a.idrecruiter=$idrecruiter");
while($row = mysql_fetch_assoc($studentSql))
{

    $userName = $row['usename'];
    $company = $row['company'];
    $email = $row['email'];
$mobile = $row['mobile'];
    $designation = $row['designation'];
}

?>
	<link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#example').dataTable( {
		"order": [[ 3, "desc" ]]
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
  <?php include('../include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
      <table class="table table-striped" cellspacing="0" width="80%">
        <thead>
          <tr>
            <th>Company Name :<?php echo $company;?></th>
            <th>User Name : <?php echo $userName;?></th>
           </tr>
           <tr>
           <th>Mobile :<?php echo $mobile;?></th>
            <th>Email : <?php echo $email;?></th>
          </tr>
        </thead>
        </table>
    </div>    
  
			<table id="example" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>ResumeId</th>
						 <?php for($resumetype=0;$resumetype<count($resumeTypesArray);$resumetype++){?>
                        <th><?php echo $resumeTypesArray[$resumetype]['resumetypename'];?></th>
 <?php }?>
            <th>View Resume</th>
            <th>Download Resume</th>
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
					 <?php
                         $resumeKeyWordsSql = mysql_query("Select * from tbl_studentresumekeywords where idstudent='$idstudent' order by idresumetype asc");
                         while($row = mysql_fetch_assoc($resumeKeyWordsSql))
                         { ?>

                         <td><?php echo $row['noofkeywords'];?></td>
                         <?php } ?>
            <td><a href='../viewResumeById.php?idstudent=<?php echo $idstudent;?>' target='_blank'>View Resume</a></td>
            <td><a href='../downloadResumeById.php?idstudent=<?php echo $idstudent;?>' target='_blank'>Download Resume</a></td>

					</tr>
					<?php }?>
					
				</tbody>
			</table>
</div>
</body>

			