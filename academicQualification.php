<?php
include('application/conn.php');
include('include/year.php');
include('include/department.php');
include('include/pgcourses.php');
include('include/traininginstitute.php');
$idstudent = $_SESSION['idstudent'];

$profileInformationSql = mysql_query("Select * from tbl_student where idstudent=$idstudent");
while($row = mysql_fetch_assoc($profileInformationSql))
{
      $sslcpassoutyear = $row['sslc_passoutyear'];
    $sslcpercentagetype = $row['sslc_percentagetype'];
    $sslcpercentage = $row['sslc_percentage'];
    $sslcschoolname = $row['sslc_schoolname'];
    
    $pucpassoutyear = $row['puc_passoutyear'];
    $pucpercentagetype = $row['puc_percentagetype'];
    $pucpercentage = $row['puc_percentage'];
    $pucschoolname = $row['puc_schoolname'];
    
    $degpassoutyear = $row['deg_passoutyear'];
    $degpercentagetype = $row['deg_percentagetype'];
    $degpercentage = $row['deg_percentage'];
    $degschoolname = $row['deg_schoolname'];
     $degboard = $row['deg_university'];
     $degdepartment = $row['deg_department'];
     
    $pgpassoutyear = $row['pg_passoutyear'];
    $pgpercentagetype = $row['pg_percentagetype'];
    $pgpercentage = $row['pg_percentage'];
    $pgschoolname = $row['pg_schoolname'];
   
    $pgboard = $row['pg_university'];
     $pgdepartment = $row['pg_department'];
     
     
    $pgdippassoutyear = $row['pgdip_passoutyear'];
    $pgdippercentagetype = $row['pgdip_percentagetype'];
    $pgdippercentage = $row['pgdip_percentage'];
    $pgdipschoolname = $row['pgdip_schoolname'];
    
    $pgdipboard = $row['pgdip_university'];
    $pgDipCoursename = $row['pgdip_coursename'];
    $rvvlsiid = $row['rvvlsiid'];

     $phdpassoutyear = $row['phd_passoutyear'];
    $phdpercentagetype = $row['phd_percentagetype'];
    $phdpercentage = $row['phd_percentage'];
    $phdschoolname = $row['phd_schoolname'];
     $phdboard = $row['phd_university'];
     $phddepartment = $row['phd_department'];
}
if($_POST)
{
    $sslcpassoutyear = $_POST['sslc-passoutyear'];
    $sslcpercentagetype = $_POST['sslc-percentagetype'];
    $sslcpercentage = $_POST['sslc-percentage'];
    $sslcschoolname = $_POST['sslc-schoolname'];
    
    $pucpassoutyear = $_POST['puc-passoutyear'];
    $pucpercentagetype = $_POST['puc-percentagetype'];
    $pucpercentage = $_POST['puc-percentage'];
    $pucschoolname = $_POST['puc-schoolname'];
    
    $degpassoutyear = $_POST['deg-passoutyear'];
    $degpercentagetype = $_POST['deg-percentagetype'];
    $degpercentage = $_POST['deg-percentage'];
    $degschoolname = $_POST['deg-schoolname'];
     $degboard = $_POST['deg-board'];
     $degdepartment = $_POST['deg-department'];
     
    $pgpassoutyear = $_POST['pg-passoutyear'];
    $pgpercentagetype = $_POST['pg-percentagetype'];
    $pgpercentage = $_POST['pg-percentage'];
    $pgschoolname = $_POST['pg-schoolname'];
    $pgboard = $_POST['pg-board'];
     $pgdepartment = $_POST['pg-department'];
     
     
    $pgdippassoutyear = $_POST['pgdip-passoutyear'];
    $pgdippercentagetype = $_POST['pgdip-percentagetype'];
    $pgdippercentage = $_POST['pgdip-percentage'];
    $pgdipschoolname = $_POST['pgdip-schoolname'];
    $pgdipboard = $_POST['pgdip-board'];
    $pgdipcoursename = $_POST['pgdip-coursename'];
    $rvvlsiid = $_POST['rvvlsiid'];

    $phdpassoutyear = $_POST['phd-passoutyear'];
    $phdpercentagetype = $_POST['phd-percentagetype'];
    $phdpercentage = $_POST['phd-percentage'];
    $phdschoolname = $_POST['phd-schoolname'];
    $phdboard = $_POST['phd-board'];
     $phddepartment = $_POST['phd-department'];    
/*echo "Update tbl_student set sslc_passoutyear = '$sslcpassoutyear', 
                             sslc_percentagetype = '$sslcpercentagetype',
                             sslc_percentage = '$sslcpercentage',
                             sslc_schoolname = '$sslcschoolname',
                             puc_passoutyear = '$pucpassoutyear', 
                             puc_percentagetype = '$sslcpercentagetype',
                             puc_percentage = '$pucpercentagetype',
                             puc_schoolname = '$pucschoolname',
                             deg_passoutyear = '$degpassoutyear', 
                             deg_percentagetype = '$degpercentagetype',
                             deg_percentage = '$degpercentage',
                             deg_schoolname = '$degschoolname',
                             deg_university = '$degboard',
                             deg_department = '$degdepartment',
                             pg_passoutyear = '$pgpassoutyear', 
                             pg_percentagetype = '$pgpercentagetype',
                             pg_percentage = '$pgpercentage',
                             pg_schoolname = '$pgschoolname',
                             pg_university = '$degboard', 
                             pg_department = '$pgdepartment',
                             pgdip_passoutyear = '$pgdippassoutyear', 
                             pgdip_percentagetype = '$pgdippercentagetype',
                             pgdip_percentage = '$pgdippercentage',
                             pgdip_schoolname = '$pgdipschoolname',
                             pgdip_university = '$pgdipboard',
                             pgdip_coursename = '$pgdipcoursename',
                             rvvlsiid = '$rvvlsiid',
                             phd_passoutyear = '$phdpassoutyear', 
                             phd_percentagetype = '$phdpercentagetype',
                             phd_percentage = '$phdpercentage',
                             phd_schoolname = '$phdschoolname',
                             phd_university = '$phdboard',
                             phd_department = '$phddepartment'
                        where idstudent = '$idstudent'";
   exit;
*/mysql_query("Update tbl_student set sslc_passoutyear = '$sslcpassoutyear', 
                             sslc_percentagetype = '$sslcpercentagetype',
                             sslc_percentage = '$sslcpercentage',
                             sslc_schoolname = '$sslcschoolname',
                             puc_passoutyear = '$pucpassoutyear', 
                             puc_percentagetype = '$sslcpercentagetype',
                             puc_percentage = '$pucpercentagetype',
                             puc_schoolname = '$pucschoolname',
                             deg_passoutyear = '$degpassoutyear', 
                             deg_percentagetype = '$degpercentagetype',
                             deg_percentage = '$degpercentage',
                             deg_schoolname = '$degschoolname',
                             deg_university = '$degboard',
                             deg_department = '$degdepartment',
                             pg_passoutyear = '$pgpassoutyear', 
                             pg_percentagetype = '$pgpercentagetype',
                             pg_percentage = '$pgpercentage',
                             pg_schoolname = '$pgschoolname',
                             pg_university = '$pgboard', 
                             pg_department = '$pgdepartment',
                             pgdip_passoutyear = '$pgdippassoutyear', 
                             pgdip_percentagetype = '$pgdippercentagetype',
                             pgdip_percentage = '$pgdippercentage',
                             pgdip_schoolname = '$pgdipschoolname',
                             pgdip_university = '$pgdipboard',
                             pgdip_coursename = '$pgdipcoursename',
                             rvvlsiid = '$rvvlsiid',
                             phd_passoutyear = '$phdpassoutyear', 
                             phd_percentagetype = '$phdpercentagetype',
                             phd_percentage = '$phdpercentage',
                             phd_schoolname = '$phdschoolname',
                             phd_university = '$phdboard',
                             phd_department = '$phddepartment'
                        where idstudent = '$idstudent'");
  
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

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

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
    <div class="container mar-t10">
        
          <div class="row">
           <div class="col-sm-6">
           <h3 class="brd-btm mar-b20">10th (S.S.L.C Details)</h3>
            <div class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <select class="form-control" id="sslc-passoutyear" name="sslc-passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($sslcpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
              <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="sslc-percentagetype" id="sslc-percentagetype" value="Percentage" <?php if($sslcpercentagetype=='Percentage'){ echo "checked=checked";};?>> Percentage
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sslc-percentagetype" id="sslc-percentagetype" value="CGPA" <?php if($sslcpercentagetype=='CGPA'){ echo "checked=checked";};?>> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="sslc-percentage" name="sslc-percentage" value="<?php echo $sslcpercentage;?>">                                                      
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label">School / College <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="sslc-schoolname" name="sslc-schoolname" value="<?php echo $sslcschoolname;?>">
                </div>               
              </div> 
                                              
            </div>
            </div>
           <div class="clearfix col-sm-6">
           <h3 class="brd-btm mar-b20">Higher Secondary (Pre-University)</h3>
            <div class="form-horizontal">
             <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <select class="form-control" id="puc-passoutyear" name="puc-passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($pucpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
              <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="puc-percentagetype" id="puc-percentagetype" value="Percentage" <?php if($pucpercentagetype=='Percentage'){ echo "checked=checked";};?>> Percentage
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="puc-percentagetype" id="puc-percentagetype" value="CGPA" <?php if($pucpercentagetype=='CGPA'){ echo "checked=checked";};?>> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="puc-percentage" name="puc-percentage" value="<?php echo $pucpercentage;?>">                                                      
                </div>
              </div>
                <div class="form-group">
                <label class="col-sm-5 control-label">School / College <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="puc-schoolname" name="puc-schoolname" value="<?php echo $pucschoolname;?>">
                </div>               
              </div> 
                                                                    
            </div>
            </div> 
           <div class="col-sm-6">
           <h3 class="brd-btm mar-b20">Graduation (BE / BTech)</h3>
            <div class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                 <select class="form-control" id="deg-passoutyear" name="deg-passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($degpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
                 <div class="form-group">
            <label class="col-sm-5 control-label">Branch<span class="error-text">*</span></label>
            <div class="col-sm-7">
                <select class="form-control" id="deg-department" name="deg-department">
                  <?php for($i=0;$i<count($departmentarray);$i++){?>
                  <option value="<?php echo $departmentarray[$i]['iddepartment'];?>"
                          <?php if($degdepartment==$departmentarray[$i]['iddepartment']){ echo "selected=selected";};?>><?php echo $departmentarray[$i]['department'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
               <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="deg-percentagetype" id="deg-percentagetype" value="Percentage" <?php if($degpercentagetype=='Percentage'){ echo "checked=checked";};?>> Percentage
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="deg-percentagetype" id="deg-percentagetype" value="CGPA" <?php if($degpercentagetype=='CGPA'){ echo "checked=checked";};?>> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="deg-percentage" name="deg-percentage" value="<?php echo $degpercentage;?>">                                                      
                </div>
              </div>
                <div class="form-group">
                <label class="col-sm-5 control-label">College <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="deg-schoolname" name="deg-schoolname" value="<?php echo $degschoolname;?>">
                </div>               
              </div> 
              <div class="form-group">
                <label class="col-sm-5 control-label">University <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="deg-board" name="deg-board" value="<?php echo $degboard;?>">
                </div>        
              </div>                                           
            </div>
            </div>
           <div class="clearfix col-sm-6">
           <h3 class="brd-btm mar-b20">Post Graduation (ME / MTech)</h3>
            <div class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <select class="form-control" id="pg-passoutyear" name="pg-passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                    <label class="radio-inline">
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($pgpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
            <div class="form-group">
            <label class="col-sm-5 control-label">Branch<span class="error-text">*</span></label>
            <div class="col-sm-7">
              <select class="form-control" id="pg-department" name="pg-department">
                  <?php for($i=0;$i<count($departmentarray);$i++){?>
                  <option value="<?php echo $departmentarray[$i]['iddepartment'];?>"><?php echo $departmentarray[$i]['department'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
              <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="pg-percentagetype" id="pg-percentagetype" value="Percentage" <?php if($pgpercentagetype=='Percentage'){ echo "checked=checked";};?>> Percentage
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="pg-percentagetype" id="pg-percentagetype" value="CGPA" <?php if($pgpercentagetype=='CGPA'){ echo "checked=checked";};?>> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="pg-percentage" name="pg-percentage" value="<?php echo $pgpercentage;?>">                                                      
                </div>
              </div>
                <div class="form-group">
                <label class="col-sm-5 control-label">College <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="pg-schoolname" name="pg-schoolname" value="<?php echo $pgschoolname;?>">
                </div>               
              </div> 
              <div class="form-group">
                <label class="col-sm-5 control-label">University <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="pg-board" name="pg-board" value="<?php echo $pgboard;?>">
                </div>        
              </div>         
              </div>                                           
            </div>
        <div class="clearfix col-sm-6">
           <h3 class="brd-btm mar-b20">PG Diploma / Certificate Courses</h3>
                <div class="form-horizontal">
               <div class="form-group">
                <label class="col-sm-5 control-label">Institute Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                 <select class="form-control" id="pgdip-schoolname" name="pgdip-schoolname">
                      <?php for($i=0;$i<count($trainingInstituteArray);$i++){?>
                      <option value="<?php echo $trainingInstituteArray[$i]['idtraininginstitute'];?>" <?php if($pgdipschoolname==$trainingInstituteArray[$i]['idtraininginstitute']){ echo "selected=selected";}?>><?php echo $trainingInstituteArray[$i]['traininginstitute'];?></option>
                      <?php }?>
                      
                  </select>
                </div>               
              </div> 
                 <div class="form-group">
                <label class="col-sm-5 control-label">Course Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                   <select class="form-control" id="pgdip-coursename" name="pgdip-coursename">
                      
                        <?php for($i=0;$i<count($pgCoursesArray);$i++){?>
                      <option value="<?php echo $pgCoursesArray[$i]['idpgdipcourses'];?>" <?php if($pgDipCoursename==$pgCoursesArray[$i]['idpgdipcourses']){ echo "selected=selected";}?>><?php echo $pgCoursesArray[$i]['pgdip_coursename'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div>     
              <div class="form-group">
                <label class="col-sm-5 control-label">Course Duration <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="pgdip-board" name="pgdip-board" value="<?php echo $pgdipboard;?>">
                </div>        
              </div>  
             <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="pgdip-percentagetype" id="pgdip-percentagetype" value="Percentage" <?php if($pgdippercentagetype=='Percentage'){ echo "checked=checked";};?>> Percentage
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="pgdip-percentagetype" id="pgdip-percentagetype" value="CGPA" <?php if($pgdippercentagetype=='CGPA'){ echo "checked=checked";};?>> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="pgdip-percentage" name="pgdip-percentage" value="<?php echo $pgdippercentage;?>">                                                      
                </div>
              </div>
               
              
                    
                     <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                   <select class="form-control" id="pgdip-passoutyear" name="pgdip-passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($pgdippassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
             
              <div class="form-group">
                <label class="col-sm-5 control-label">RV-VLSI ID<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="rvvlsiid" name="rvvlsiid" value="<?php echo $rvvlsiid;?>">
                </div>        
              </div> 
            </form>
            </div>                        
            </div> 
             <div class="clearfix col-sm-6">
           <h3 class="brd-btm mar-b20">Ph.D</h3>
            <div class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <select class="form-control" id="phd-passoutyear" name="phd-passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                    <label class="radio-inline">
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($phdpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
            <div class="form-group">
            <label class="col-sm-5 control-label">Branch<span class="error-text">*</span></label>
            <div class="col-sm-7">
              <select class="form-control" id="phd-department" name="phd-department">
                  <?php for($i=0;$i<count($departmentarray);$i++){?>
                  <option value="<?php echo $departmentarray[$i]['iddepartment'];?>"
                          <?php if($phddepartment==$departmentarray[$i]['iddepartment']){ echo "selected=selected";};?>><?php echo $departmentarray[$i]['department'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
              <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="phd-percentagetype" id="phd-percentagetype" value="Percentage" <?php if($phdpercentagetype=='Percentage'){ echo "checked=checked";};?>> Percentage
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="phd-percentagetype" id="phd-percentagetype" value="CGPA" <?php if($phdpercentagetype=='CGPA'){ echo "checked=checked";};?>> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="phd-percentage" name="phd-percentage" value="<?php echo $phdpercentage;?>">                                                      
                </div>
              </div>
                <div class="form-group">
                <label class="col-sm-5 control-label">College <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="phd-schoolname" name="phd-schoolname" value="<?php echo $phdschoolname;?>">
                </div>               
              </div> 
              <div class="form-group">
                <label class="col-sm-5 control-label">University <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="phd-board" name="phd-board" value="<?php echo $phdboard;?>">
                </div>        
              </div>         
              </div>                                           
            </div>
                     
            <div class="clearfix brd-top pad-t20">
                <button type="submit" class="btn btn-primary pull-right">Save & Continue</button>       
                <button type="submit" class="btn btn-default pull-right mar-r20">RESET</button>        
            </div>                   
     

    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
      </form>
  </body>
</html>
