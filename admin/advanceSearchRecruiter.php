<?php
include("../application/conn.php");
include('../include/department.php');
include('../include/domainlist.php');
include('../include/documentlist.php');
include('../include/year.php');
include('../include/domain_type.php');

$idrecruitement = $_GET['idrecruitement'];
if($idrecruitement>0)
{
  $requiterSql = mysql_query("Select * from tbl_recruitement where idrecruitement=$idrecruitement");
  while($row = mysql_fetch_assoc($requiterSql))
  {
    $sslccutoff = $row['sslccutoff'];
    $sslcpassoutyear = $row['sslcpassoutyear'];
    $puccutoff = $row['puccutoff'];
    $pucpassoutyear = $row['pucpassoutyear'];
    $degcutoff = $row['degcutoff'];
    $degpassoutyearFrom = $row['degpassoutyearFrom'];
    $degpassoutyearTo = $row['degpassoutyearTo'];
    $pgcutoff = $row['pgcutoff'];
    $pgpassoutyearFrom = $row['pgpassoutyearFrom'];
    $pgpassoutyearTo = $row['pgpassoutyearTo'];
    $resume_type = $row['resume_type'];
     $discipline = $row['discipline'];
  }
}
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
    $recruitmentPositionArray[$resume]['recruitementposition'] = $row['company'].'-'.$row['usename'].'-'.$row['recruitementposition'];
    $resume++;
}

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
        echo "<script>alert('Candidates has been assigned to this job');</script>";
         echo "<script>parent.location='advancedSearch.php'</script>";
   exit;
        
    }
if($_POST)
{
    $idStudent=0;
    $idStudentSelected = 0;
    $sslcPercentage = $_POST['sslcPercentage'];
    $pucPercentage = $_POST['pucPercentage'];
    $degPercentage = $_POST['degPercentage'];
    $pgPercentage = $_POST['pgPercentage'];
    $sslc_passoutyear = $_POST['sslc_passoutyear'];
    $puc_passoutyear = $_POST['puc_passoutyear'];
    $deg_passoutyear = $_POST['degpassoutyearFrom'];
    $deg_passoutyearTo = $_POST['degpassoutyearTo'];
    $pg_passoutyear = $_POST['pgpassoutyearFrom'];
        $pg_passoutyearTo = $_POST['pgpassoutyearTo'];
    $flexiblefield = $_POST['flexiblefield'];
    $searchBox = $_POST['searchBox'];
    $degUniversity = $_POST['degUniversity'];
    $daterange = $_POST['daterange'];
    if($deg_passoutyearTo=='')
    {
      $deg_passoutyearTo = date('Y');
    }
    if($pg_passoutyearTo=='')
    {
      $pg_passoutyearTo = date('Y');
    }

$dateSql = mysql_query("SELECT DATE_SUB( NOW( ) , INTERVAL $daterange 
DAY ) as updateddate");
while($row = mysql_fetch_assoc($dateSql))
{

  $updated_date = $row['updateddate'];
}
$updatedSql = " and date(updated_date)>='$updated_date'";

    $degCgpa = $degPercentage/10;


    $pgCgpa = $degreePercentage/10;


    for($i=0;$i<count($_POST['domainNames']);$i++)
    {
      if($i==0)
      {
        $domainnames = $_POST['domainNames'][$i];
      }
      else
      {
        $domainnames = $domainnames.','.$_POST['domainNames'][$i];
      }
    }

    for($i=0;$i<count($_POST['departments']);$i++)
    {
      if($i==0)
      {
        $departments = $_POST['departments'][$i];
      }
      else
      {
        $departments = $departments.','.$_POST['departments'][$i];
      }
    }
    
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
                                      sslc_passoutyear='$sslc_passoutyear'   and
                                      puc_passoutyear='$puc_passoutyear'    and
                                      deg_passoutyear>='$deg_passoutyear'   and
                                      deg_passoutyear <= '$deg_passoutyearTo' and
                                      pg_passoutyear>='$pg_passoutyear'  and 
                                      pg_passoutyear<= '$pg_passoutyearTo' and  idstudent in ($idStudentdeg) $departmentssql
                                       $updatedSql");
}
else
{
  $studentSql = mysql_query("Select idstudent 
                                from tbl_student 
                                where sslc_percentage>='$sslcPercentage' and
                                      puc_percentage>='$pucPercentage' and 
                                      sslc_passoutyear='$sslc_passoutyear'   and
                                      puc_passoutyear='$puc_passoutyear'    and
                                      deg_passoutyear >='$deg_passoutyear'   and
                                      deg_passoutyear <= '$deg_passoutyearTo' and
                                      pg_passoutyear>='$pg_passoutyear'  and 
                                      pg_passoutyear<= '$pg_passoutyearTo'  $departmentssql
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>

  <body>
      <form action="" method="POST"> 
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    <div class="row">
        <div class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">SSLC Cut-off (%)</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="sslcPercentage" name="sslcPercentage" 
                        value="<?php echo $sslccutoff;?>">
              </div>  
              <label class="col-sm-2 control-label">SSLC Passout Year</label>
              
              <div class="col-sm-2">
                 <select class="form-control" id="sslc_passoutyear" name="sslc_passoutyear">
<option value='0'>Select</option>
                      <?php for($i=0;$i<count($yeararray);$i++){
                           $years = $yeararray[$i]['years'];?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($sslcpassoutyear==$years) { echo "selected=selected";}?> >
                      <?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>   
                <label class="col-sm-2 control-label">Candidates type</label>
               
                <div class="col-sm-2">
                 <select class="form-control" name="rvvlsi" id="rvvlsi">
                 <option value="only">Only RV-VLSI</option>
                 <option value="all">All</option>
                 </select>
                </div>         
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">PUC Cut-off (%)</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="pucPercentage" name="pucPercentage" 
                        value="<?php echo $puccutoff;?>">
              </div> 

              <label class="col-sm-2 control-label">PUC Passout Year</label>
                <div class="col-sm-2">
                 <select class="form-control" id="puc_passoutyear" name="puc_passoutyear">
                 <option value=''>Select</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" 
                       <?php if($pucpassoutyear==$yeararray[$i]['years']) { echo "Selected=selected";}?>
                      ><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>  
 <label class="col-sm-2 control-label">Resumes which are updated in the last</label>
               
                <div class="col-sm-2">
                 <select class="form-control" name="daterange" id="daterange">
                 <option value="30">30 Days</option>
                 <option value="60">60 Days</option>
                  <option value="90">90 Days</option>
                 <option value="100">Above 90 Days</option>
                 </select>
                </div> 
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">BE Cut-off (%)</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="degPercentage" name="degPercentage" 
                        value="<?php echo $degcutoff;?>">
              </div>  
              <label class="col-sm-2 control-label">BE Passout Year From</label>
               
                <div class="col-sm-2">
                 <select class="form-control" id="degpassoutyearFrom" name="degpassoutyearFrom">
                 <option value=''>Not Applicable</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>"<?php if($degpassoutyearFrom==$yeararray[$i]['years']) { echo "Selected=selected";}?>
                      ><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>  
                <label class="col-sm-2 control-label">BE Passout Year To</label>
               
                <div class="col-sm-2">
                 <select class="form-control" id="degpassoutyearTo" name="degpassoutyearTo">
                 <option value=''>Not Applicable</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>"<?php if($degpassoutyearTo==$yeararray[$i]['years']) { echo "Selected=selected";}?>
                      ><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>  

            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">ME Cut-off (%)</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="pgPercentage" name="pgPercentage" 
                        value="<?php echo $pgcutoff;?>">
              </div>  
              <label class="col-sm-2 control-label">ME From Year</label>  
               <div class="col-sm-2">
                 <select class="form-control" id="pgpassoutyearFrom" name="pgpassoutyearFrom">
                 <option value=''>Not Applicable</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>"<?php if($pgpassoutyearFrom==$yeararray[$i]['years']) { echo "Selected=selected";}?>
                      ><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>  
                <label class="col-sm-2 control-label">ME To Year</label>  
               <div class="col-sm-2">
                 <select class="form-control" id="pgpassoutyearTo" name="pgpassoutyearTo">
                 <option value=''>Not Applicable</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>"<?php if($pgpassoutyearTo==$yeararray[$i]['years']) { echo "Selected=selected";}?>
                      ><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
            </div>
  
            <div class="form-group">
              <label class="col-sm-2 control-label">Select Domain</label>
              <div class="col-sm-10">
              <?php for($i=0;$i<count($resumetypearray);$i++){
                 $findme   = $resumetypearray[$i]['idresumetype'];
                 $resume_type;
                $pos =  strpos($resume_type, $findme);
                 if($pos==false)
                 {
                   $checked="";
                 }
                 else
                 {
                   $checked = "checked=checked";
                 }
               //exit;
               ?>
                    <label class="checkbox-inline">
                        <input type="checkbox" id='domainNames[]' name="domainNames[]" 
                        value="domainNames[<?php echo $resumetypearray[$i]['idresumetype'];?>]"
                        <?php echo $checked;?>
                       > <?php echo $resumetypearray[$i]['resumetypename'];?>
                      </label>
                    <?php }?>
                    
              </div>          
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Select Discipline</label>
              <div class="col-sm-10">
              <?php for($i=0;$i<count($departmentarray);$i++){
                $findme   = $departmentarray[$i]['iddepartment'];
                                $pos =  strpos($discipline, $findme);
                 if($pos==false)
                 {
                   $checked="";
                 }
                 else
                 {
                   $checked = "checked=checked";
                 }
                if($departmentarray[$i]['iddepartment']!='999'){?>
                    <label class="checkbox-inline">
                        <input type="checkbox" id='departments[]' name="departments[]" value="<?php echo $departmentarray[$i]['iddepartment'];?>"  <?php echo $checked;?>> <?php echo $departmentarray[$i]['department'];?>
                      </label>
                    <?php }}?>
                    
              </div>          
            </div>

           

    </div>

    <div class="clearfix brd-top pad-t20">
        <button type="submit" class="btn btn-primary pull-right">Search</button>       
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
      </form>   
    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>
