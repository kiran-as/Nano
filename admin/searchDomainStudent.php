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
    /*print_r($_POST);
    exit;*/
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
	
	$studentDetailsSql = mysql_query("Select * from tbl_student where idstudent in ($idStudent)
                        and pgdip_coursename='$idpgdipcourses'");
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
    <div class="container mar-t30">
       <div class="row">
        <div class="form-horizontal col-sm-6">
          <div class="form-group">
            <label class="col-sm-4 control-label">Course Name</label>
            <div class="col-sm-8">
              <select class="form-control" id='idpgdipcourses' name='idpgdipcourses' value=''>
                  <?php for($i=0;$i<count($pgDipCoursesArray);$i++){ 
                    $idpgdipcourses = $pgDipCoursesArray[$i]['idpgdipcourses'];?>
                  <option value='<?php echo $idpgdipcourses;?>'>
                  <?php echo $pgDipCoursesArray[$i]['pgdip_coursename'];?></option>
              <?php }?>
                  </select> 
            </div>        
          </div>
           <div class="form-group">
            <label class="col-sm-4 control-label">PUC % Cut off</label>
            <div class="col-sm-8">
                <input type="name" class="form-control" placeholder="" name='pucPercentage' id='pucPercentage'>
            </div>        
          </div>
          
           <div class="form-group">
            <label class="col-sm-4 control-label">Domain Name</label>
            <div class="col-sm-8">
              <select class="form-control" id='resumeTypes' name='resumeTypes' value=''>
                  <?php for($i=0;$i<count($resumeTypesArray);$i++){ 
                    $idresumetype = $resumeTypesArray[$i]['idresumetype'];?>
                  <option value='<?php echo $idresumetype;?>'>
                  <?php echo $resumeTypesArray[$i]['resumetypename'];?></option>
              <?php }?>
                  </select>                              
            </div>        
          </div>   
          <div class="form-group">
            <label class="col-sm-4 control-label">Student Type</label>
            <div class="col-sm-8">
                <label class="radio-inline">
                  <input type="radio" name='studentType' id='studentType' value='1'> RV - VLSI
                </label>
                <label class="radio-inline">
                  <input type="radio" name='studentType' id='studentType' value='0'> ALL
                </label>                
            </div>        
          </div>                                                                                                                                    
        </div>  
        <div class="form-horizontal col-sm-6">
         <div class="form-group">
            <label class="col-sm-4 control-label">SSLC cut off</label>
            <div class="col-sm-8">
                <input type="name" class="form-control" placeholder="" name='sslcPercentage' id='sslcPercentage'>
            </div>        
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Degree % Cut off</label>
            <div class="col-sm-8">
                <input type="name" class="form-control" placeholder="" name='degPercentage' id='degPercentage'>
            </div>        
          </div>  
         <div class="form-group">
            <label class="col-sm-4 control-label">Degree Passedout</label>
            <div class="col-sm-8">
              <select class="form-control" id='resumeTypes' name='resumeTypes'>
              <?php for($resumetype=0;$resumetype<count($resumeTypesArray);$resumetype++){?>
                        <option value='<?php echo $i;?>'>
                        <?php echo $resumeTypesArray[$resumetype]['resumetypename'];?>
                        </option>
             
            <?php }?>
              </select>                               
            </div>        
          </div>   
          <div class="form-group">
            <label class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>        
          </div>                                                                                                                                    
        </div>           
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
            <td><a href='viewResume.php?idstudent=<?php echo $idstudent;?>' target='_blank'>View Resume</a></td>
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
     
  </div>
  </form>

  </body>
</html>
