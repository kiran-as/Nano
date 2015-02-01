<?php
include('../application/conn.php');
error_reporting(-1);

$studentSql = mysql_query("Select * from tbl_pgdipcourses");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $pgDipCoursesArray[$i]['idpgdipcourses'] = $row['idpgdipcourses'];
    $pgDipCoursesArray[$i]['pgdip_coursename'] = $row['pgdip_coursename'];
    $i++;
}

$resumeTypesSql = mysql_query("Select * from tbl_resumetypes order by idresumetype asc");
$resume=0;
while($row = mysql_fetch_assoc($resumeTypesSql))
{
    $resumeTypesArray[$resume]['idresumetype'] = $row['idresumetype'];
    $resumeTypesArray[$resume]['resumetypename'] = $row['resumetypename'];
    $resume++;
}

$recruitementSql = mysql_query("Select * from tbl_recruitement");
$resume=0;
while($row = mysql_fetch_assoc($recruitementSql))
{
    $recruitmentPositionArray[$resume]['idrecruitement'] = $row['idrecruitement'];
    $recruitmentPositionArray[$resume]['recruitementposition'] = $row['recruitementposition'];
    $resume++;
}


if($_POST)
{
   // print_r($_POST);
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
	$idpgdipcourses = $_POST['idpgdipcourses'];
	$degreePercentage = $_POST['degPercentage'];
	$pucPercentage = $_POST['pucPercentage'];
	$degreePassOutYear = $_POST['degPassoutyear'];
	$studentType = $_POST['studentType'];
	$idStudent = '0';
	/*$pgDiplomaCoursesSql = mysql_query("Select idresumetypes from tbl_pgdipcoursesresumetypes where idpgdipcourses='$idpgdipcourses'");
	 while($row = mysql_fetch_assoc($pgDiplomaCoursesSql))
	 	{

	 	}*/

    $studentSql = mysql_query("Select idstudent from tbl_student where
    	                       deg_passoutyear>='$degreePassOutYear' and 
    	                       puc_percentage>='$pucPercentage' and 
    	                       deg_percentage>='$degreePercentage' and deg_percentagetype='Percentage'");
	while($row = mysql_fetch_assoc($studentSql))
	{
         $idStudent = $idStudent.','.$row['idstudent'];
	}

    $degCgpa = $degreePercentage/10;
	$studentSql = mysql_query("Select idstudent from tbl_student where
    	                       deg_passoutyear>='$degreePassOutYear' and 
    	                       puc_percentage>='$pucPercentage' and 
    	                       deg_percentage>='$degCgpa' and deg_percentagetype='CGPA'");
	while($row = mysql_fetch_assoc($studentSql))
	{
         $idStudent = $idStudent.','.$row['idstudent'];
	}
	
	$studentDetailsSql = mysql_query("Select * from tbl_student where idstudent in ($idStudent)");
	$i=0;
	while($row = mysql_fetch_assoc($studentDetailsSql))
	{
		$studentArray[$i]['idstudent'] = $row['idstudent'];
    	$studentArray[$i]['studentname'] = $row['firstname'].' - '.$row['lastname'];
        $studentArray[$i]['idstudent'] = $row['idstudent'];
	    $studentArray[$i]['email'] = $row['email'];
	    $studentArray[$i]['mobile'] = $row['mobile'];
	    $studentArray[$i]['resumeid'] = $row['resumeid'];
	    $i++;	
	}

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
        <form name='' method="POST" action="">
        <select id='idpgdipcourses' name='idpgdipcourses' value=''>
        <?php for($i=0;$i<count($pgDipCoursesArray);$i++){ 
        	$idpgdipcourses = $pgDipCoursesArray[$i]['idpgdipcourses'];?>
    		<option value='<?php echo $idpgdipcourses;?>'>
    		<?php echo $pgDipCoursesArray[$i]['pgdip_coursename'];?></option>
		<?php }?>
        </select>                    
   
        <table>
             <tr>
                 <td>PUC</td>
                 <td><input type='text' name='pucPercentage' id='pucPercentage' value=''></td>
             </tr>
             <tr>
                 <td>Deg</td>
                 <td><input type='text' name='degPercentage' id='degPercentage' value=''></td>
             </tr>
			 <tr>
                 <td>Deg Passout</td>
                 <td><select id='degPassoutyear' name='degPassoutyear'>
                 		<?php for($i=2005;$i<=date('Y');$i++){ ?>
    						<option value='<?php echo $i;?>'><?php echo $i;?></option>
						<?php }?>
					</select>
				</td>
             </tr>
              <tr>
                 <td>Student Type</td>
                 <td>Rv-VLSI<input type='radio' name='studentType' id='studentType' value='1'>
                 All<input type='radio' name='studentType' id='studentType' value='0'></td>
             </tr>
             <tr>
                 <input type='submit' name='Search' id='Search' value='Search'>
             </tr>
        </table>
       
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
						<th>Edit</th>
					</tr>
				</thead>

				<tbody>
				<?php for($i=0;$i<count($studentArray);$i++){
					 $idstudent = $studentArray[$i]['idstudent'];?>
					<tr>
						<td><input type='checkbox' name='studentName[]' value='<?php echo $idstudent;?>'><?php echo $studentArray[$i]['studentname'];?></td>
						<td><?php echo $studentArray[$i]['email'];?></td>
						<td><?php echo $studentArray[$i]['mobile'];?></td>
						<td><?php echo $studentArray[$i]['resumeid'];?></td>
                         <?php
                         $resumeKeyWordsSql = mysql_query("Select * from tbl_studentresumekeywords where idstudent='$idstudent' order by idresumetype asc");
                         while($row = mysql_fetch_assoc($resumeKeyWordsSql))
                         { ?>

                         <td><?php echo $row['noofkeywords'];?></td>
                         <?php } ?>
						<td><a href='editResume.php?idstudent=<?php echo $idstudent;?>'>Edit</a></td>
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
             </tr>
            </table>
</div>
 </form>
</body>

			