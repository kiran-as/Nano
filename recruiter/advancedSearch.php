  <?php
include('../application/conn.php');
include('../include/year.php');
include('../include/department.php');
error_reporting(-1);
$idrecruitement = $_GET['idrecruitement'];
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

$recruitmentSql = mysql_query("Select * from tbl_recruitement where idrecruitement='$idrecruitement'");
$row=0;
while($row = mysql_fetch_assoc($recruitmentSql))
{
    $sslccutoff = $row['sslccutoff'];
    $puccutoff = $row['puccutoff'];
    $pucpassoutyear = $row['pucpassoutyear'];
    $degcutoff = $row['degcutoff'];
    $degpassoutyear = $row['degpassoutyear'];
    $pgcutoff = $row['pgcutoff'];
    $pgpassoutyear = $row['pgpassoutyear'];
    $departments = '0'.$row['discipline'];
    $sslcpassoutyear = $row['sslcpassoutyear'];
}

if($pgpassoutyear=='0')
{
   $pgpassoutyear = '';
}
 $_POST['domainNames'] = '';

    $idStudent=0;
    $idStudentSelected = 0;
    $sslcPercentage = $sslccutoff;
    $pucPercentage = $puccutoff;
    $degPercentage = $degcutoff;
    $pgPercentage = $pgcutoff;
    $sslc_passoutyear = $sslcpassoutyear;
    $puc_passoutyear = $pucpassoutyear;
    $deg_passoutyear = $degpassoutyear;
    $pg_passoutyear = $pgpassoutyear;
    $flexiblefield = '';
    $searchBox = '';
    $degUniversity = '';
    $daterange = '360';


$dateSql = mysql_query("SELECT DATE_SUB( NOW( ) , INTERVAL $daterange 
DAY ) as updateddate");
while($row = mysql_fetch_assoc($dateSql))
{

  $updated_date = $row['updateddate'];
}
$updatedSql = " and date(updated_date)>='$updated_date'";

    $degCgpa = $degPercentage/10;


    $pgCgpa = $degreePercentage/10;


   
    if(empty($departments))
    {
      $departmentssql = ' ';
    }
    else
    {
        $departmentssql = "and deg_department in ($departments)";
    }
/*echo "Select idstudent 
                                from tbl_student 
                                where sslc_percentage>='$sslcPercentage' and
                                      puc_percentage>='$pucPercentage' and 
                                      deg_percentage>='$degCgpa' and 
                                      deg_percentagetype!='Percentage' and
                                      pg_percentage>='$pgCgpa' and
                                      pg_percentagetype!='Percentage' and
                                      sslc_passoutyear>='$sslc_passoutyear'   and
                                      puc_passoutyear>='$puc_passoutyear'    and
                                      deg_passoutyear>='$deg_passoutyear'   and
                                      pg_passoutyear>='$pg_passoutyear' $departmentssql
                                      ";*/
if(!empty($degPercentage))
{
    $idStudentdeg = 0;
    $studentSql = mysql_query("Select idstudent from tbl_student where deg_percentage>$degPercentage
       and deg_percentagetype=='Percentage'");
      while($row = mysql_fetch_assoc($studentSql))
      {
             $idStudentdeg = $idStudentdeg.','.$row['idstudent'];
      }

     $studentSql = mysql_query("Select idstudent from tbl_student where deg_percentage>$degCgpa
       and deg_percentagetype!='Percentage'");
      while($row = mysql_fetch_assoc($studentSql))
      {
             $idStudentdeg = $idStudentdeg.','.$row['idstudent'];
      }

  $studentSql = mysql_query("Select idstudent 
                                from tbl_student 
                                where sslc_percentage>='$sslcPercentage' and
                                      puc_percentage>='$pucPercentage' and 
                                      sslc_passoutyear>='$sslc_passoutyear'   and
                                      puc_passoutyear>='$puc_passoutyear'    and
                                      deg_passoutyear>='$deg_passoutyear'   and
                                      pg_passoutyear>='$pg_passoutyear' and idstudent in ($idStudentdeg) $departmentssql
                                       $updatedSql");
}
else
{
  $studentSql = mysql_query("Select idstudent 
                                from tbl_student 
                                where sslc_percentage>='$sslcPercentage' and
                                      puc_percentage>='$pucPercentage' and 
                                      sslc_passoutyear>='$sslc_passoutyear'   and
                                      puc_passoutyear>='$puc_passoutyear'    and
                                      deg_passoutyear>='$deg_passoutyear'   and
                                      pg_passoutyear>='$pg_passoutyear'  $departmentssql
                                      $updatedSql");
}

  while($row = mysql_fetch_assoc($studentSql))
  {
         $idStudent = $idStudent.','.$row['idstudent'];
  }

  if(empty($domainnames))
    {
      $domainNamesSql = ' ';
    }
  else
    {
      $domainNamesSql = "and idresumetype in ($domainnames)";
    }
                     $idStudentSelected = 0;
  $studentSql = mysql_query("Select idstudent from tbl_studentresumekeywords
                     where idstudent in ($idStudent) and 
                     noofkeywords>0  $domainNamesSql group by idstudent");
while($row = mysql_fetch_assoc($studentSql))
  {
         $idStudentSelected = $idStudentSelected.','.$row['idstudent'];
  } 

  if(!empty($degUniversity))
  {
      
    $studentDetailsSql = mysql_query("Select idstudent from 
      tbl_student where idstudent in ($idStudentSelected) and deg_university like '%$degUniversity%'");
    $i=0;
    $idStudentSelected=0;
    while($row = mysql_fetch_assoc($studentDetailsSql))
    {
        $idStudentSelected = $idStudentSelected.','.$row['idstudent'];
        $i++; 
    }
  }
   
  if(!empty($searchBox))
  {

      if($flexiblefield=='With')
      {
          $sql = "rvvlsiid like'%$searchBox%' OR placeofbirth like'%$searchBox%'
           OR fathername like '%$searchBox%' OR mobile like '%$searchBox%' OR email like '%$searchBox%'";
      }
      else
      {
          $sql = "rvvlsiid not like '%$searchBox%' OR placeofbirth not like'%$searchBox%'
           OR fathername not like '%$searchBox%' OR mobile not like '%$searchBox%' OR email not like '%$searchBox%'";

      }

      if($_POST['rvvlsi']=='only')
        {
              $andSql =  "and rvvlsiid!=''" ;
        }
        else
        {
              $andSql =  "";
        }
/*        echo "Select * from 
      tbl_student where ($sql) and idstudent in ($idStudentSelected) $andSql";
*/
      $studentSql = mysql_query("Select * from 
      tbl_student where ($sql) and idstudent in ($idStudentSelected) $andSql");

    $i=0;
    while($row = mysql_fetch_assoc($studentSql))
    {
        $studentArray[$i]['idstudent'] = $row['idstudent'];
        $studentArray[$i]['studentname'] = $row['firstname'].' - '.$row['lastname'];
        $studentArray[$i]['email'] = $row['email'];
        $studentArray[$i]['mobile'] = $row['mobile'];
        $studentArray[$i]['resumeid'] = $row['resumeid'];

        $i++;
    }

     
  }
  else
  {
       
        if($_POST['rvvlsi']=='only')
        {
              $studentSql = mysql_query("Select * from 
      tbl_student where idstudent in ($idStudentSelected) and rvvlsiid!=''");
        }
        else
        {
              $studentSql = mysql_query("Select * from 
      tbl_student where idstudent in ($idStudentSelected)");
        }

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
  <style>
  .searchbox{
height: 34px;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
color: #555;
background-color: #fff;
background-image: none;
border: 1px solid #ccc;
border-radius: 4px;
-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

  </style>
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
        The shortlisted resumes are based on the Parameter which you have entered while creatng the job position,
        They are as follows,
         <div class="container mar-t30">
    <div class="row">
        <div class="form-horizontal">
        <div class="form-group">
              <label class="col-sm-2 control-label">SSLC Cut Off - <?php echo $sslccutoff;?></label>
              <label class="col-sm-2 control-label">PUC Cut Off - <?php echo $puccutoff;?></label>
              <label class="col-sm-2 control-label">Deg Cut Off - <?php echo $degcutoff;?></label>
              <label class="col-sm-2 control-label">PG Cut Off - <?php echo $pgcutoff;?></label>

        </div>
        <div class="form-group">
              <label class="col-sm-2 control-label">SSLC Cut Off - <?php echo $sslcpassoutyear;?></label>
              <label class="col-sm-2 control-label">PUC Cut Off - <?php echo $pucpassoutyear;?></label>
              <label class="col-sm-2 control-label">Deg Cut Off - <?php echo $degpassoutyear;?></label>
              <label class="col-sm-2 control-label">PG Cut Off - <?php echo $pgpassoutyear;?></label>

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
   <th>Download Resume</th>
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
     
  </div>
  </form>

  </body>
</html>
