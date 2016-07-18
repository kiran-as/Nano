<?php
include('application/conn.php');
include('include/year.php');
include('include/department.php');
include('include/pgcourses.php');
include('include/traininginstitute.php');
include('include/sessioncheck.php');
include('include/settingmessage.php');


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
    $phdschoolname = $row['phd-schoolname'];
     $phdboard = $row['phd_university'];
     $phddepartment = $row['phd_department'];

     $pgdip_otherschools = $row['pgdip_otherschools'];
 $pgdip_otherschoolscity = $row['pgdip_otherschoolscity']; 

  $phdstate = $row['phd_state']; 
  $pgstate = $row['pg_state']; 
  $degstate = $row['deg_state']; 
$pgdip_othercoursename = $row['pgdip_othercoursename'];  
$deg_othercoursename = $row['deg_othercoursename'];   
$pg_othercoursename = $row['pg_othercoursename']; 
 $ttp = $row['ttp'];
 if($row['is_post_graduation']=='') {
    $row['is_post_graduation']=='No';
 }
 $is_post_graduation = $row['is_post_graduation'];
 if($row['is_phd']=='') {
    $row['is_phd']=='No';
 }
 $is_phd = $row['is_phd'];
}
if($_POST)
{
    $is_post_graduation = $_POST['is_post_graduation'];
    $is_phd = $_POST['is_phd'];
    $sslcpassoutyear = $_POST['sslc-passoutyear'];
    $sslcpercentagetype = $_POST['sslc-percentagetype'];
    $sslcpercentage = str_replace("'","&#39;",$_POST['sslc_percentage']);
    $sslcschoolname = str_replace("'","&#39;",$_POST['sslc_schoolname']);
    
    $pucpassoutyear = $_POST['puc-passoutyear'];
    $pucpercentagetype = $_POST['puc-percentagetype'];
    $pucpercentage = str_replace("'","&#39;",$_POST['puc_percentage']);
    $pucschoolname = str_replace("'","&#39;",$_POST['puc_schoolname']);
    
    $degpassoutyear = $_POST['deg-passoutyear'];
    $degpercentagetype = $_POST['deg-percentagetype'];
    $degpercentage = $_POST['deg_percentage'];
    $degschoolname = str_replace("'","&#39;",$_POST['deg_schoolname']);
     $degboard = str_replace("'","&#39;",$_POST['deg_board']);
     $degdepartment = $_POST['deg-department'];
     
    $pgpassoutyear = $_POST['pg-passoutyear'];
    $pgpercentagetype = $_POST['pg-percentagetype'];
    $pgpercentage = $_POST['pg-percentage'];
    $pgschoolname = str_replace("'","&#39;",$_POST['pg-schoolname']);
    $pgboard = str_replace("'","&#39;",$_POST['pg-board']);
     $pgdepartment = $_POST['pg-department'];
     
     
    $pgdippassoutyear = $_POST['pgdip-passoutyear'];
    $pgdippercentagetype = $_POST['pgdip-percentagetype'];
    $pgdippercentage = $_POST['pgdip_percentage'];
    $pgdipschoolname = str_replace("'","&#39;",$_POST['pgdip-schoolname']);
    $pgdipboard = str_replace("'","&#39;",$_POST['pgdip_board']);
    $pgdipcoursename = $_POST['pgdip-coursename'];
    $rvvlsiid = $_POST['rvvlsiid'];

    $phdpassoutyear = $_POST['phd-passoutyear'];
    $phdpercentagetype = $_POST['phd-percentagetype'];
    $phdpercentage = $_POST['phd-percentage'];
    $phdschoolname = str_replace("'","&#39;",$_POST['phd-schoolname']);
    $phdboard = str_replace("'","&#39;",$_POST['phd-board']);
     $phddepartment = $_POST['phd-department'];    
     $pgdip_otherschools = str_replace("'","&#39;",$_POST['pgdip_otherschools']);
     $pgdip_otherschoolscity = str_replace("'","&#39;",$_POST['pgdip_otherschoolscity']);

$phd_state = str_replace("'","&#39;",$_POST['phd_state']); 
  $pg_state = str_replace("'","&#39;",$_POST['pg_state']); 
  $deg_state = str_replace("'","&#39;",$_POST['deg_state']); 
  $pgdip_othercoursename = str_replace("'","&#39;",$_POST['pgdip_othercoursename']);   
  $deg_othercoursename = str_replace("'","&#39;",$_POST['deg_othercoursename']);   
  $pg_othercoursename = str_replace("'","&#39;",$_POST['pg_othercoursename']);   
   $ttp = $_POST['ttp'];
   $updated_date = date('Y-m-d');
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
*/mysql_query("Update tbl_student set is_phd='$is_phd',is_post_graduation='$is_post_graduation',
                             sslc_passoutyear = '$sslcpassoutyear', 
                             sslc_percentagetype = '$sslcpercentagetype',
                             sslc_percentage = '$sslcpercentage',
                             sslc_schoolname = '$sslcschoolname',
                             puc_passoutyear = '$pucpassoutyear', 
                             puc_percentagetype = '$sslcpercentagetype',
                             puc_percentage = '$pucpercentage',
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
                             phd_department = '$phddepartment',
                             pgdip_otherschools = '$pgdip_otherschools',
                             phd_state = '$phd_state',
                             pg_state = '$pg_state',
                             pgdip_otherschoolscity = '$pgdip_otherschoolscity',
                             deg_state = '$deg_state',
                             pgdip_othercoursename = '$pgdip_othercoursename',
                             deg_othercoursename = '$deg_othercoursename',
                             pg_othercoursename = '$pg_othercoursename',
                              updated_date = '$updated_date',
                              ttp='$ttp'

                        where idstudent = '$idstudent'");
if($rvvlsiid!='')
{
	mysql_query("Update tbl_student set resumeid = '$rvvlsiid'
		 where idstudent = '$idstudent'"); 
}
   echo "<script>parent.location='academicProjects.php'</script>";
   exit;
  
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script type='text/JavaScript'>
 
 $(document).ready(function() {
   $('#saveAndContinue').click(function() {
                
                $('#academicQualification').submit();
            });
            $("#academicQualification").validate({
                // Specify the validation rules
                rules: {
                    sslc_percentage: "required",
                    sslc_schoolname: "required",
                    puc_percentage: "required",
                    puc_schoolname: "required",
                    deg_percentage: "required",
                    deg_schoolname: "required",
                    deg_board: "required",       
                    pgdip_otherschools: "required",
                    pgdip_otherschoolscity: "required",
                    pgdip_board: "required",                                   
                    pgdip_percentage: "required", 
                    deg_othercoursename: "required", 
                    pgdip_othercoursename : "required", 
                    rvvlsiid : "required",                                  
                },
                // Specify the validation error messages
                messages: {
                    sslc_percentage: "Please enter a Percentage",                  
                    sslc_schoolname: "Please enter School Name",
                    puc_percentage: "Please enter a Puc Percentage",
                    puc_schoolname: "Please enter PUC College Name",
                    deg_percentage: "Please enter Percentage",
                    deg_schoolname: "Please enter College Name",
                    deg_board: "Please enter University",
                    pgdip_otherschools: "Please enter Institute Name",
                    pgdip_otherschoolscity: "Please enter College Name",
                    pgdip_board: "Please enter University",                   
                    pgdip_percentage: "Please enter University",                   
                    deg_othercoursename: "Please enter Course Name",                   
                    pgdip_othercoursename: "Please enter Course Name",                   
                    rvvlsiid : "Enter RV-VLSI Id",
                }
            });
 });

function fnPgdipSchool(id)
{

   if(id=='0')
   {
      $('#institudedetails').hide();
   }
   else
   {
      $('#institudedetails').show();
   }
  if(id==1)
  {
      $('#divrvvlsiid').show();
      $('#otherschoolnamelabelid').hide();
      $('#otherschoolcitynamelabelid').hide();
      $('#percentagelabel').html('TTP');
      $('#ttdDiv').show();
      $('#pgOtherPercentageDiv').hide();
  }
  else
  {
      $('#divrvvlsiid').hide();
      $('#otherschoolnamelabelid').show();
      $('#otherschoolcitynamelabelid').show();
      $('#rvvlsiid').val('');
      
      $('#percentagelabel').html('Aggregate Marks');
           $('#ttdDiv').hide();
           $('#pgOtherPercentageDiv').show();
  }

 othercoureseshideshow("<?php echo $pgDipCoursename;?>");
 otherdegcoureseshideshow("<?php echo $degdepartment;?>");
 otherpgcoureseshideshow("<?php echo $pgdepartment;?>");

 showPG("<?php echo $is_post_graduation;?>");
 showPHD("<?php echo $is_phd;?>");
}

function othercoureseshideshow(othercoursename)
{
  if(othercoursename=='999')
  {
    $('#otherschoolcoursename').show();
  }
  else
  {
    $('#otherschoolcoursename').hide();
  }
}

function otherdegcoureseshideshow(degothercoursename)
{
  if(degothercoursename=='999')
  {
    $('#degotherschoolcoursename').show();
  }
  else
  {
    $('#deg_othercoursename').val(' ');
    $('#degotherschoolcoursename').hide();
  }
}
function otherpgcoureseshideshow(pgothercoursename)
{
  if(pgothercoursename=='999')
  {
    $('#pgotherschoolcoursename').show();
  }
  else
  {
    $('#pg_othercoursename').val(' ');
    $('#pgotherschoolcoursename').hide();
  }
}

function showPG(id) {
  if(id=='Yes') {
    $('#pgdiv').show();
  } else {
    $('#pgdiv').hide();
  }
}

function showPHD(id) {
  if(id=='Yes') {
    $('#phddiv').show();
  } else {
    $('#phddiv').hide();
  }
}

</script>    
  </head>

  <body onload='fnPgdipSchool(<?php echo $pgdipschoolname;?>)'>
      <form action="" method="POST" id="academicQualification">
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
        <div class="container mar-t30">
                    <p class="alert alert-success txtc font16-sm-reg  label-info"><?php echo $academicqualificationpage;?></p>

    </div>
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
                <label class="col-sm-5 control-label">Percentage<span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline" style='display:none'>
                      <input type="radio" name="sslc-percentagetype" id="sslc-percentagetype" value="Percentage" checked > Percentage
                    </label>
                    <label class="radio-inline" style='display:none'>
                        <input type="radio" name="sslc-percentagetype" id="sslc-percentagetype" value="CGPA"> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="sslc_percentage" name="sslc_percentage" value="<?php echo $sslcpercentage;?>">                                                      
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label">School / College Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="College Name" id="sslc_schoolname" name="sslc_schoolname" value="<?php echo $sslcschoolname;?>">
                </div>               
              </div> 
                                              
            </div>
            </div>
           <div class="clearfix col-sm-6">
           <h3 class="brd-btm mar-b20">Higher Secondary (Pre-University) / Diploma</h3>
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
                <label class="col-sm-5 control-label">Percentage<span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline" style='display:none'>
                      <input type="radio" name="puc-percentagetype" id="puc-percentagetype" value="Percentage" checked="checked"> Percentage
                    </label>
                    <label class="radio-inline" style='display:none'>
                        <input type="radio" name="puc-percentagetype" id="puc-percentagetype" value="CGPA" > CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="puc_percentage" name="puc_percentage" value="<?php echo $pucpercentage;?>">                                                      
                </div>
              </div>
                <div class="form-group">
                <label class="col-sm-5 control-label">School / College Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="College Name" id="puc_schoolname" name="puc_schoolname" value="<?php echo $pucschoolname;?>">
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
                <select class="form-control" id="deg-department" name="deg-department" onchange="otherdegcoureseshideshow(this.value)">
                  <?php for($i=0;$i<count($departmentarray);$i++){?>
                  <option value="<?php echo $departmentarray[$i]['iddepartment'];?>"
                          <?php if($degdepartment==$departmentarray[$i]['iddepartment']){ echo "selected=selected";};?>><?php echo $departmentarray[$i]['department'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
 <div class="form-group" id="degotherschoolcoursename">
                <label class="col-sm-5 control-label">Course Name <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="Course Name" id="deg_othercoursename" name="deg_othercoursename" value="<?php echo $deg_othercoursename;?>">
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
                    <input type="text" class="form-control mar-t10" placeholder="" id="deg_percentage" name="deg_percentage" value="<?php echo $degpercentage;?>">                                                      
                </div>
              </div>
               
              <div class="form-group">
                <label class="col-sm-5 control-label">College <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="College Name" id="deg_schoolname" name="deg_schoolname" value="<?php echo $degschoolname;?>">
                </div>               
              </div> 
              <div class="form-group">
                <label class="col-sm-5 control-label">University <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="University" id="deg_board" name="deg_board" value="<?php echo $degboard;?>">
                </div>  

              </div>  
              <div class="form-group">
                <label class="col-sm-5 control-label">State <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="State Name" id="deg_state" name="deg_state" value="<?php echo $degstate;?>">
                </div>        
              </div>                                           
            </div>
            </div>

           <div class="clearfix col-sm-6">
           <h3 class="brd-btm mar-b20">Post Graduation (ME / MTech) <label class="radio-inline">
                      <input type="radio" name="is_post_graduation" id="is_post_graduation" value="Yes" onclick="showPG('Yes')" <?php if($is_post_graduation=='Yes'){ echo "checked=checked";};?>> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_post_graduation" id="is_post_graduation" value="No" onclick="showPG('No')" <?php if($is_post_graduation=='No'){ echo "checked=checked";};?>> No
                    </label></h3>
            <div class="form-horizontal" id="pgdiv">
              <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <select class="form-control" id="pg-passoutyear" name="pg-passoutyear">
                      <option value=''>Select</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                    <label class="radio-inline">
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($pgpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
            <div class="form-group">
            <label class="col-sm-5 control-label">Branch<span class="error-text"></span></label>
            <div class="col-sm-7">
              <select class="form-control" id="pg-department" name="pg-department" onchange="otherpgcoureseshideshow(this.value)">
                  <option value=''>Select</option>
                  <?php for($i=0;$i<count($departmentarray);$i++){?>
                  <option value="<?php echo $departmentarray[$i]['iddepartment'];?>" <?php if($pgdepartment==$departmentarray[$i]['iddepartment']){ echo "selected=selected";}?>><?php echo $departmentarray[$i]['department'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
               <div class="form-group" id="pgotherschoolcoursename">
                <label class="col-sm-5 control-label">Course Name <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="Course Name" id="pg_othercoursename" name="pg_othercoursename" value="<?php echo $pg_othercoursename;?>">
                </div>               
              </div> 
              <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text"></span></label>
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
                <label class="col-sm-5 control-label">College <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="College Name" id="pg-schoolname" name="pg-schoolname" value="<?php echo $pgschoolname;?>">
                </div>               
              </div>
              <div class="form-group" style="display:none">
                <label class="col-sm-5 control-label">College <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="College Name" id="pg_schoolname" name="pg_schoolname" value="<?php echo $pgschoolname;?>">
                </div>               
              </div>  
              <div class="form-group">
                <label class="col-sm-5 control-label">University <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="University Name" id="pg-board" name="pg-board" value="<?php echo $pgboard;?>">
                </div>        
              </div> 
               <div class="form-group">
                <label class="col-sm-5 control-label">State <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="State Name" id="pg_state" name="pg_state" value="<?php echo $pgstate;?>"><br/>
                </div>        
              </div>         
              </div>                                           
            </div>
        
             <div class="clearfix col-sm-6">
           <h3 class="brd-btm mar-b20">Ph.D <label class="radio-inline">
                      <input type="radio" name="is_phd" id="is_phd" value="Yes" onclick="showPHD('Yes')" <?php if($is_phd=='Yes'){ echo "checked=checked";};?>> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_phd" id="is_phd" value="No" onclick="showPHD('No')" <?php if($is_phd=='No'){ echo "checked=checked";};?>> No
                    </label></h3>
            <div class="form-horizontal" id='phddiv'>
              <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <select class="form-control" id="phd-passoutyear" name="phd-passoutyear">
                      <option value=''>Select</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                    <label class="radio-inline">
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($phdpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
            <div class="form-group">
            <label class="col-sm-5 control-label">Branch<span class="error-text"></span></label>
            <div class="col-sm-7">
              <select class="form-control" id="phd-department" name="phd-department">
                  <option value=''>Select</option>
                  <?php for($i=0;$i<count($departmentarray);$i++){?>
                  <option value="<?php echo $departmentarray[$i]['iddepartment'];?>"
                          <?php if($phddepartment==$departmentarray[$i]['iddepartment']){ echo "selected=selected";};?>><?php echo $departmentarray[$i]['department'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
              <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text"></span></label>
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
                <label class="col-sm-5 control-label">College <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="College Name" id="phd-schoolname" name="phd-schoolname" value="<?php echo $phdschoolname;?>">
                </div>               
              </div> 
              <div class="form-group">
                <label class="col-sm-5 control-label">University <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="University Name" id="phd-board" name="phd-board" value="<?php echo $phdboard;?>">
                </div>        
              </div> 
               <div class="form-group">
                <label class="col-sm-5 control-label">State <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="State Name" id="phd_state" name="phd_state" value="<?php echo $phdstate;?>">
                </div>        
              </div>  
                              
              </div>                                           
            </div>
               <div class="clearfix col-sm-6">
           <h3 class="brd-btm mar-b20">Certification / Vocational Training</h3>
                <div class="form-horizontal">
               <div class="form-group">
                <label class="col-sm-5 control-label">Select Institute<span class="error-text"></span></label>
                <div class="col-sm-7">

                 <select class="form-control" id="pgdip-schoolname" name="pgdip-schoolname" onchange='fnPgdipSchool(this.value);'>
                   <option value='0'>Select</option> 
                      <?php for($i=0;$i<count($trainingInstituteArray);$i++){?>
                      <option value="<?php echo $trainingInstituteArray[$i]['idtraininginstitute'];?>" <?php if($pgdipschoolname==$trainingInstituteArray[$i]['idtraininginstitute']){ echo "selected=selected";}?>><?php echo $trainingInstituteArray[$i]['traininginstitute'];?></option>
                      <?php }?>
                      
                  </select>
                </div>               
              </div> 
              <div id="institudedetails" style='display:none'>
               <div class="form-group" id='otherschoolnamelabelid' >
                <label class="col-sm-5 control-label">Institute Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="pgdip_otherschools" name="pgdip_otherschools" value="<?php echo $pgdip_otherschools;?>">
                </div>        
              </div> 

              <div class="form-group" id='otherschoolcitynamelabelid'>
                <label class="col-sm-5 control-label">City<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="pgdip_otherschoolscity" name="pgdip_otherschoolscity" value="<?php echo $pgdip_otherschoolscity;?>">
                </div>        
              </div> 
                 <div class="form-group">
                <label class="col-sm-5 control-label">Select Course Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                   <select class="form-control" id="pgdip-coursename" name="pgdip-coursename" onchange="othercoureseshideshow(this.value)">
                        <?php for($i=0;$i<count($pgCoursesArray);$i++){?>
                      <option value="<?php echo $pgCoursesArray[$i]['idpgdipcourses'];?>" <?php if($pgDipCoursename==$pgCoursesArray[$i]['idpgdipcourses']){ echo "selected=selected";}?>><?php echo $pgCoursesArray[$i]['pgdip_coursename'];?></option>
                      <?php }?>
             
                  </select>
                </div>        
              </div>  
                <div class="form-group" id='otherschoolcoursename'>
                <label class="col-sm-5 control-label">Specify Course Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="pgdip_othercoursename" name="pgdip_othercoursename" value="<?php echo $pgdip_othercoursename;?>">
                </div>        
              </div>    
              <div class="form-group">
                <label class="col-sm-5 control-label">Course Duration (In Months)<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="pgdip_board" name="pgdip_board" value="<?php echo $pgdipboard;?>">
                </div>        
              </div>  
              <div id="pgOtherPercentageDiv">
             <div class="form-group">
                <label class="col-sm-5 control-label">Percentage</label>
                <div class="col-sm-7">
                    <label class="radio-inline" style='display:none'>
                      <input type="radio" name="pgdip-percentagetype" id="pgdip-percentagetype" value="Percentage" <?php if($pgdippercentagetype=='Percentage'){ echo "checked=checked";};?>> Percentage
                    </label>
                    <label class="radio-inline" style='display:none'>
                        <input type="radio" name="pgdip-percentagetype" id="pgdip-percentagetype" value="CGPA" <?php if($pgdippercentagetype=='CGPA'){ echo "checked=checked";};?>> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="pgdip_percentage" name="pgdip_percentage" value="<?php echo $pgdippercentage;?>">                                                      
                </div>
              </div>
              </div>
              <div id="ttdDiv" style="display:none;">
                <div class="form-group">
                <label class="col-sm-5 control-label">TTP<span class="error-text">*</span></label>
                <div class="col-sm-7">
                   <select class="form-control" id="ttp" name="ttp" >
                   <option value='0'>Results Awaited</option>
                        <?php for($i=1;$i<=10;$i++){?>
                      <option value="<?php echo $i?>" <?php if($i==$ttp){ echo "selected=selected";}?>><?php echo $i;?></option>
                      <?php }?>
             
                  </select>
                </div>        
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
             
              <div class="form-group" id='divrvvlsiid' style='display:none'>
                <label class="col-sm-5 control-label">RV-VLSI ID<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="" id="rvvlsiid" name="rvvlsiid" value="<?php echo $rvvlsiid;?>">
                </div>        
              </div> 
              </div>
            </form>
            </div>                        
            </div>       
            <div class="clearfix brd-top pad-t20">
                <button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">Save & Continue</button>       
            </div>          

             </div>   
             </div>             
     

    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    </form>
  </body>
</html>
