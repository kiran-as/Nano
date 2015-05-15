<?php
include('../application/conn.php');
include('../include/year.php');
include('../include/department.php');
include('../include/pgcourses.php');
include('../include/reviewstatus.php');
include('../include/councellor.php');

$studentId = $_GET['idstudent'];
$councellorId = $_SESSION['idcouncellor'];

$studentdetails = mysql_query(("Select * from tbl_rvstudent
                  where idrvstudent=$studentId"));
while($row = mysql_fetch_assoc($studentdetails))
{
  $name = $row['name'];
  $phone = $row['phone'];
  $came_through = $row['came_through'];
  $sslc_passoutyear = $row['sslc_passoutyear'];
  $tenth_percentage = $row['tenth_percentage'];
  $deg_passoutyear = $row['deg_passoutyear'];
  $deg_department = $row['deg_department'];
  $deg_othercoursename = $row['deg_othercoursename'];
  $email = $row['email'];
  $hometown = $row['hometown'];
  $pgdip_coursename = $row['pgdip_coursename'];
  $puc_passoutyear = $row['puc_passoutyear'];
  $puc_percentage = $row['puc_percentage'];
  $pg_passoutyear = $row['pg_passoutyear'];
  $pg_department = $row['pg_department'];
  $pg_othercoursename = $row['pg_othercoursename'];
  $councellor = $row['councellor'];
  $review_status = $row['review_status'];

  $othercourses = $row['othercourses'];
  $other_coursename = $row['other_coursename'];
  $other_institutename = $row['other_institutename'];
  $other_courseduration = $row['other_courseduration'];
  $primary_reason = $row['primary_reason'];
  $vlsi_rate = $row['vlsi_rate'];
  $joboffer = $row['joboffer'];
  $timeduration = $row['timeduration'];
  $embedded_rate = $row['embedded_rate'];
  $income = $row['income'];  

  $deg_percentagetype = $row['deg_percentagetype'];
  $deg_percentage = $row['deg_percentage'];
  $pg_percentagetype = $row['pg_percentagetype'];
  $pg_percentage = $row['pg_percentage'];        
}

$councellorSql = mysql_query("Select a.* , b.*, c.*
                              from tbl_rvstudentcouncellor as a, tbl_councellor as b, tbl_reviewstatus as c
                              where a.councellor_id = b.idcouncellor 
                              and a.review_status = c.idreviewstatus
                              and a.idstudent=$studentId");
$i=0;
while($row = mysql_fetch_assoc($councellorSql))
{
   $councellorArray[$i]['reviewname'] = $row['reviewname'];  
   $councellorArray[$i]['name'] = $row['firstname'].' '.$row['lastname'];
   $councellorArray[$i]['review'] = $row['councellor_review'];
   $councellorArray[$i]['created_date'] = $row['created_date'];
  $councellorArray[$i]['review_status'] = $row['review_status'];
   $i++;
}
$councellorId = $_SESSION['idcouncellor'];
if($_POST)
{
   $assignCouncellor = $_POST['idcouncellor'];
   mysql_query("Update tbl_rvstudent set idcouncellor='$assignCouncellor' where
    idrvstudent='$studentId'");
   $review_status = $_POST['review_status'];
  $review_reason = $_POST['reason'];
   $created_date = date('Y-m-d H:i:s');
     $councellor = $_POST['councellor'];
     if($_POST['datepicker']=='')
     {
      $_POST['datepicker'] = date('Y-m-d');
     }
     
     $councelling_date = date('Y-m-d',strtotime($_POST['datepicker']));
  mysql_query("Insert into tbl_rvstudentcouncellor (idstudent,
    councellor_review,councellor_id,created_date,review_status,review_reason,councelling_date) values 
    ('$student_id','$councellor','$councellorId','$created_date','$review_status','$review_reason','$councelling_date')");

echo "<script>parent.location='studentDetails.php'</script>";
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 <script src="../js/jquery-1.11.0.min.js"></script>
<script src="../js/jquery.validation.js"></script>
<script src="../js/customised_validation.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ minDate: -00, maxDate: "+1M +10D" });
    $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' });



  });




 function onReviewStatus(id)
 {
  if(id==3)
  {
    $('#reviewreason').show();
  }
  else
  {
$('#reviewreason').hide();
  }
 }

   function hidedepartment()
   {
     otherdegcoureseshideshow();
     otherpgcoureseshideshow();
     fnothercourses();
   }


function fnothercourses()
{
   var id = '<?php echo $othercourses;?>';
  if(id=='Yes')
  {
    $('#othercoursesoptions').show();
  }
  else
  {
    $('#othercoursesoptions').hide();
  }
}


    function otherdegcoureseshideshow()
    {
      
       var id ='<?php echo $deg_department;?>';
      if(id=='999')
      {
        $('#degotherschoolcoursename').show();
      }
      else
      {
    $('#degotherschoolcoursename').hide();
      }
    }

    function otherpgcoureseshideshow()
    {
      var id ='<?php echo $pg_department;?>';
      if(id=='999')
      {
        $('#pgotherschoolcoursename').show();
      }
      else
      {
        $('#pgotherschoolcoursename').hide();
      }
    }
  </script>    
  </head>

  <body onload='hidedepartment();'>

     <form action="" method="POST" id="academicProject">
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    
    <div class="container mar-t10">
     <h3 class="brd-btm mar-b20">Student Details</h3>
<div class="row">
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <label class="col-sm-5 control-label">First Name <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" readonly=readonly placeholder="First Name" id="name" name="name" value="<?php echo $name;?>">
        </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Mobile<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" readonly=readonly placeholder="First Name" id="phone" name="phone" value="<?php echo $phone;?>">
        </div>        
      </div>
      <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                 <select class="form-control" readonly=readonly id="came_through" name="came_through">
                      <option value="Friends" <?php if($came_through=='Friends'){ echo "Selected=selelcted";}?>>Friends</option>
                      <option value="Website" <?php if($came_through=='Website'){ echo "Selected=selelcted";}?>>Website</option>
                  </select>
                </div>        
              </div> 
       <h3 class="brd-btm mar-b20">10th Details</h3>
     <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <select class="form-control" readonly=readonly id="sslc_passoutyear" name="sslc_passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($sslc_passoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 

      <div class="form-group">
        <label class="col-sm-5 control-label">Percentage<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" readonly=readonly placeholder="Percentage" id="tenth_percentage" name="tenth_percentage" value="<?php echo $tenth_percentage;?>">
        </div>        
      </div>

       <h3 class="brd-btm mar-b20">B.E / Degree Details</h3>
      <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                 <select class="form-control" readonly=readonly id="deg_passoutyear" name="deg_passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($deg_passoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
                 <div class="form-group">
            <label class="col-sm-5 control-label">Branch<span class="error-text">*</span></label>
            <div class="col-sm-7">
                <select class="form-control" readonly=readonly id="deg_department" name="deg_department" onchange="otherdegcoureseshideshow(this.value)">
                  <?php for($i=0;$i<count($departmentarray);$i++){?>
                  <option value="<?php echo $departmentarray[$i]['iddepartment'];?>"
                          <?php if($deg_department==$departmentarray[$i]['iddepartment']){ echo "selected=selected";};?>><?php echo $departmentarray[$i]['department'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
 <div class="form-group" id="degotherschoolcoursename">
                <label class="col-sm-5 control-label">Course Name <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" readonly=readonly placeholder="Course Name" id="deg_othercoursename" name="deg_othercoursename" value="<?php echo $deg_othercoursename;?>">
                </div>               
              </div> 

 <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="deg-percentagetype" id="deg-percentagetype" value="Percentage" <?php if($deg_percentagetype=='Percentage'){ echo "checked=checked";};?>> Percentage
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="deg-percentagetype" id="deg-percentagetype" value="CGPA" <?php if($deg_percentagetype=='CGPA'){ echo "checked=checked";};?>> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="deg_percentage" name="deg_percentage" value="<?php echo $deg_percentage;?>">                                                      
                </div>
              </div>
               <h3 class="brd-btm mar-b20">Basic Details</h3>
      <div class="form-group">
        <label class="col-sm-5 control-label">Have you taken any other course?<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="radio" name="othercourses" id="othercourses" value="Yes" <?php if($othercourses=='Yes'){ echo "checked=checked";}?>>Yes
          <input type="radio" name="othercourses" id="othercourses" value="No"  <?php if($othercourses=='No'){ echo "checked=checked";}?>>No
        </div>        
      </div>
       <div id="othercoursesoptions">
        <div class="form-group">
        <label class="col-sm-5 control-label">Course Name<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Course Name" id="other_coursename" name="other_coursename" value="<?php echo $other_coursename;?>">
        </div>        
      </div>
       <div class="form-group">
        <label class="col-sm-5 control-label">Institute Name<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Institute Name" id="other_institutename" name="other_institutename" value="<?php echo $other_institutename;?>">
        </div>        
      </div>
        <div class="form-group">
        <label class="col-sm-5 control-label">Duration<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Duration" id="other_courseduration" name="other_courseduration" value="<?php echo $other_courseduration;?>">
        </div>        
      </div>
      </div>
          <div class="form-group">
        <label class="col-sm-5 control-label">Primary reason for taking the course?<span class="error-text">*</span></label>
        <div class="col-sm-7">
<select class="form-control" id="primary_reason" name="primary_reason">
                  <option value=''>Select</option>
                  <option value='Highter studies India' <?php if($primary_reason=='Highter studies India'){ echo "selected=selected";}?>>Highter studies India</option>
                  <option value='Higher studies Abroad' <?php if($primary_reason=='Higher studies Abroad'){ echo "selected=selected";}?>>Higher studies Abroad</option>
                  <option value='other Technical services exams' <?php if($primary_reason=='other Technical services exams'){ echo "selected=selected";}?>>other Technical services exams</option>
                  <option value='Job in core industry.'  <?php if($primary_reason=='Job in core industry.'){ echo "selected=selected";}?>>Job in core industry.</option>

              </select>        
              </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">How do you rate yourself on basic concepts of VLSI?<span class="error-text">*</span></label>
        <div class="col-sm-7">
<select class="form-control" id="vlsi_rate" name="vlsi_rate">
                  <option value=''>Select</option>
                  <option value='Excellent' <?php if($vlsi_rate=='Excellent'){echo "selected=selected";}?>>Excellent</option>
                  <option value='Good' <?php if($vlsi_rate=='Good'){echo "selected=selected";}?>>Good</option>
                  <option value='Good but need help' <?php if($vlsi_rate=='Good but need help'){echo "selected=selected";}?>>Good but need help</option>
                  <option value='Average' <?php if($vlsi_rate=='Average'){echo "selected=selected";}?>>Average</option>

              </select>        
              </div>        
      </div>

    </div>
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <label class="col-sm-5 control-label">Email<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" readonly=readonly placeholder="First Name" id="email" name="email" value="<?php echo $email;?>">
        </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Home Town <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" readonly=readonly placeholder="First Name" id="hometown" name="hometown" value="<?php echo $hometown;?>">
        </div>        
      </div>
       <div class="form-group">
                <label class="col-sm-5 control-label">Select Course Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                   <select class="form-control" readonly=readonly id="pgdip_coursename" name="pgdip_coursename" onchange="othercoureseshideshow(this.value)">
                        <?php for($i=0;$i<count($pgCoursesArray);$i++){?>
                      <option value="<?php echo $pgCoursesArray[$i]['idpgdipcourses'];?>" <?php if($pgdip_coursename==$pgCoursesArray[$i]['idpgdipcourses']){ echo "selected=selected";}?>><?php echo $pgCoursesArray[$i]['pgdip_coursename'];?></option>
                      <?php }?>
             
                  </select>
                </div>        
              </div>  

                   <h3 class="brd-btm mar-b20">12th / PUC  Details</h3>

      <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <select class="form-control" readonly=readonly id="puc_passoutyear" name="puc_passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($puc_passoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
      <div class="form-group">
        <label class="col-sm-5 control-label">Percentage<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" readonly=readonly placeholder="First Name" id="puc_percentage" name="puc_percentage" value="<?php echo $puc_percentage;?>">
        </div>        
      </div>
                   <h3 class="brd-btm mar-b20">M.Tech / M.E  Details</h3>

       <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <select class="form-control" readonly=readonly id="pg_passoutyear" name="pg_passoutyear">
                      <option value=''>Select</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                    <label class="radio-inline">
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($pg_passoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
            <div class="form-group">
            <label class="col-sm-5 control-label">Branch<span class="error-text"></span></label>
            <div class="col-sm-7">
              <select class="form-control" readonly=readonly id="pg_department" name="pg_department" onchange="otherpgcoureseshideshow(this.value)">
                  <option value=''>Select</option>
                  <?php for($i=0;$i<count($departmentarray);$i++){?>
                  <option value="<?php echo $departmentarray[$i]['iddepartment'];?>" <?php if($pg_department==$departmentarray[$i]['iddepartment']){ echo "selected=selected";}?>><?php echo $departmentarray[$i]['department'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
               <div class="form-group" id="pgotherschoolcoursename">
                <label class="col-sm-5 control-label">Course Name <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" readonly=readonly placeholder="Course Name" id="pg_othercoursename" name="pg_othercoursename" value="<?php echo $pg_othercoursename;?>">
                </div>               
              </div> 

               <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text"></span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="pg-percentagetype" id="pg-percentagetype" value="Percentage" <?php if($pg_percentagetype=='Percentage'){ echo "checked=checked";};?>> Percentage
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="pg-percentagetype" id="pg-percentagetype" value="CGPA" <?php if($pg_percentagetype=='CGPA'){ echo "checked=checked";};?>> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="pg-percentage" name="pg-percentage" value="<?php echo $pg_percentage;?>">                                                      
                </div>
              </div>

               <h3 class="brd-btm mar-b20">Basic Details</h3>
      <div class="form-group">
        <label class="col-sm-5 control-label">Primary reason for taking the course?<span class="error-text">*</span></label>
        <div class="col-sm-7">
<select class="form-control" id="primary_reason" name="primary_reason">
                  <option value=''>Select</option>
                  <option value='Highter studies India' <?php if($primary_reason=='Highter studies India'){ echo "Selected=selected";}?>>Highter studies India</option>
                  <option value='Higher studies Abroad' <?php if($primary_reason=='Higher studies Abroad'){ echo "Selected=selected";}?>>Higher studies Abroad</option>
                  <option value='other Technical services exams' <?php if($primary_reason=='other Technical services exams'){ echo "Selected=selected";}?>>other Technical services exams</option>
                  <option value='Job in core industry.' <?php if($primary_reason=='Job in core industry.'){ echo "Selected=selected";}?>>Job in core industry.</option>

              </select>        
              </div>        
      </div>
       <div class="form-group">
        <label class="col-sm-5 control-label">Are you expecting any job offer shortly?<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="radio" name="joboffer" id="joboffer" value="Yes (Core Job)" <?php if($joboffer=='Yes (Core Job)'){ echo "checked=checked";}?>>Yes (Core Job)
          <input type="radio" name="joboffer" id="joboffer" value="Yes (Non Core Job)" <?php if($joboffer=='Yes (Non Core Job)'){ echo "checked=checked";}?>>Yes (Non Core Job)
          <input type="radio" name="joboffer" id="joboffer" value="No" <?php if($joboffer=='No'){ echo "checked=checked";}?>>No
        </div>        
      </div>
       <div class="form-group">
        <label class="col-sm-5 control-label">Are you looking for Monday to Friday full time or Weekend parttime course?<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="radio" name="timeduration" id="timeduration" value="Monday to Friday" <?php if($timeduration=='Monday to Friday') { echo "Checked=checked";}?>>Monday to Friday
          <input type="radio" name="timeduration" id="timeduration" value="Weekend Part Time" <?php if($timeduration=='Weekend Part Time') { echo "Checked=checked";}?>>Weekend Part Time
        </div>        
      </div>
          <div class="form-group">
        <label class="col-sm-5 control-label">How do you rate yourself on basic concepts of Embedded?<span class="error-text">*</span></label>
        <div class="col-sm-7">
<select class="form-control" id="embedded_rate" name="embedded_rate">
                  <option value=''>Select</option>
                        <option value=''>Select</option>
                  <option value='Excellent' <?php if($embedded_rate=='Excellent'){echo "selected=selected";}?>>Excellent</option>
                  <option value='Good' <?php if($embedded_rate=='Good'){echo "selected=selected";}?>>Good</option>
                  <option value='Good but need help' <?php if($embedded_rate=='Good but need help'){echo "selected=selected";}?>>Good but need help</option>
                  <option value='Average' <?php if($embedded_rate=='Average'){echo "selected=selected";}?>>Average</option>

              </select>        
              </div>        
      </div>
       <div class="form-group">
        <label class="col-sm-5 control-label">Approximately income of Family?<span class="error-text">*</span></label>
        <div class="col-sm-7">
<select class="form-control" id="income" name="income">
                  <option value=''>Select</option>
                  <option value='less than 3 Lack' <?php if($income=='less than 3 Lack'){ echo "selected=selected";}?>>Less than 3 Lack</option>
                  <option value='3 to 5 Lack' <?php if($income=='3 to 5 Lack'){ echo "selected=selected";}?>>3 to 5 Lack</option>
                  <option value='greater than 5 Lack' <?php if($income=='greater than 5 Lack'){ echo "selected=selected";}?>>Greater than 5 Lack</option>

              </select>        
              </div>        
      </div>
    </div>

           <div class="form-horizontal">
           <div class="col-sm-12">
            <h3 class="brd-btm mar-b20">Councellor Review</h3>

           
             <?php for($i=0;$i<count($councellorArray);$i++)
             {
               $reviewid = $councellorArray[$i]['review_status'];
               ?>

              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo $councellorArray[$i]['name'].' Review';?><span class="error-text"></span></label>
                <div class="col-sm-10">
                 <textarea class="form-control" rows="3"  readonly="readonly" readonly=readonly placeholder="" id="councellor" name="councellor">
                   <?php echo $councellorArray[$i]['review'];?>

                 </textarea>
                </div>               
              </div> 
              <div class="form-group">
                  <label class="col-sm-2 control-label"><?php echo $councellorArray[$i]['name'].' Review';?> Status<span class="error-text">*</span></label>
                  <div class="col-sm-6">
                      <input type="name" class="form-control" readonly=readonly value="<?php echo $councellorArray[$i]['reviewname'];?>">

                  </div>                        At <?php echo date('d-M-Y H:i:s',strtotime($councellorArray[$i]['created_date']));?>
      
              </div>
             
             <?php } ?>
              </div>
                              <h3 class="brd-btm mar-b20">&nbsp;</h3>

              <div class="row">
                <label class="col-sm-2 control-label">Councellor Review<span class="error-text">*</span></label>
                <div class="col-sm-10">
                 <textarea class="form-control" rows="3"  placeholder="" id="councellor" name="councellor"></textarea>
                </div>               
              </div> 
 <div class="form-group">
            <label class="col-sm-2 control-label">Review Status<span class="error-text">*</span></label>
            <div class="col-sm-5">
                <select class="form-control"  id="review_status" name="review_status"  onchange="onReviewStatus(this.value)">
                  <?php for($i=0;$i<count($reviewStatusArray);$i++){?>
                  <option value="<?php echo $reviewStatusArray[$i]['idreviewstatus'];?>"
                          <?php if($reviewStatusArray==$reviewStatusArray[$i]['idreviewstatus']){ echo "selected=selected";};?>><?php echo $reviewStatusArray[$i]['reviewname'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
<div class="form-group" id='reviewreason' style='display:none'>
                <label class="col-sm-2 control-label">Reason<span class="error-text">*</span></label>
                <div class="col-sm-10">
                 <input type="text" class="form-control" rows="3"  placeholder="" id="reason" name="reason"/>
                </div>               
              </div> 
              <div class="form-group">
            <label class="col-sm-2 control-label">Assign To<span class="error-text">*</span></label>
            <div class="col-sm-5">
                <select class="form-control" id="idcouncellor" name="idcouncellor">
                  <?php for($i=0;$i<count($councellorarray);$i++){?>
                  <option value="<?php echo $councellorarray[$i]['idcouncellor'];?>"
                          ><?php echo $councellorarray[$i]['name'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 

              <div class="form-group">
              <label class="col-sm-2 control-label">Next Councelling Date</label>
              <div class="col-sm-5">
                         <input  class="form-control" type="text" name='datepicker' id="datepicker"> 
              </div> 
            </div>

            </div>
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
