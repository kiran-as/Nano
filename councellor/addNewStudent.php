<?php
include('../application/conn.php');
include('../include/year.php');
include('../include/department.php');
include('../include/pgcourses.php');
include('../include/reviewstatus.php');
include('../include/councellor.php');
$councellorId = $_SESSION['idcouncellor'];
if($_POST)
{
 
  
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $came_through = $_POST['came_through'];
  $sslc_passoutyear = $_POST['sslc_passoutyear'];
  $tenth_percentage = $_POST['tenth_percentage'];
  $deg_passoutyear = $_POST['deg_passoutyear'];
  $deg_department = $_POST['deg_department'];
  $deg_othercoursename = $_POST['deg_othercoursename'];
  $email = $_POST['email'];
  $hometown = $_POST['hometown'];
  $pgdip_coursename = $_POST['pgdip_coursename'];
  $puc_passoutyear = $_POST['puc_passoutyear'];
  $puc_percentage = $_POST['puc_percentage'];
  $pg_passoutyear = $_POST['pg_passoutyear'];
  $pg_department = $_POST['pg_department'];
  $pg_othercoursename = $_POST['pg_othercoursename'];
  $councellor = $_POST['councellor'];
  $review_status = $_POST['review_status'];
  $review_reason = $_POST['reason'];

  $othercourses = $_POST['othercourses'];
  $other_coursename = $_POST['other_coursename'];
  $other_institutename = $_POST['other_institutename'];
  $other_courseduration = $_POST['other_courseduration'];
  $primary_reason = $_POST['primary_reason'];
  $vlsi_rate = $_POST['vlsi_rate'];
  $joboffer = $_POST['joboffer'];
  $timeduration = $_POST['timeduration'];
  $embedded_rate = $_POST['embedded_rate'];
  $income = $_POST['income'];
  $assignCouncellor = $_POST['idcouncellor'];
  $created_date = date('Y-m-d H:i:s');

  $deg_percentagetype = $_POST['deg_percentagetype'];
  $deg_percentage = $_POST['deg_percentage'];
  $pg_percentagetype = $_POST['pg_percentagetype'];
  $pg_percentage = $_POST['pg_percentage'];
                      
  mysql_query("Insert into tbl_rvstudent 
    (name,phone,came_through,sslc_passoutyear,tenth_percentage,
      deg_passoutyear,deg_department,deg_othercoursename,
      email,hometown,pgdip_coursename,
      puc_passoutyear,puc_percentage,pg_passoutyear,
      pg_department,pg_othercoursename,othercourses,
      other_coursename,other_institutename,other_courseduration,
      primary_reason,vlsi_rate,joboffer,
      timeduration,embedded_rate,income,created_date,idcouncellor,
      deg_percentage,pg_percentage,deg_percentagetype,pg_percentagetype)

    Values ('$name','$phone','$came_through','$sslc_passoutyear','$tenth_percentage',
      '$deg_passoutyear','$deg_department','$deg_othercoursename',
      '$email','$hometown','$pgdip_coursename',
      '$puc_passoutyear','$puc_percentage','$pg_passoutyear',
      '$pg_department','$pg_othercoursename','$othercourses',
      '$other_coursename','$other_institutename','$other_courseduration',
      '$primary_reason','$vlsi_rate','$joboffer',
      '$timeduration','$embedded_rate','$income','$created_date','$assignCouncellor',
      '$deg_percentage','$pg_percentage','$deg_percentagetype','$pg_percentagetype')");

  $student_id = mysql_insert_id();
  
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

function otherdegcoureseshideshow(id)
{
	if(id=='999')
	{
		$('#degotherschoolcoursename').show();
	}
	else
	{
$('#degotherschoolcoursename').hide();
	}
}

function otherpgcoureseshideshow(id)
{
	if(id=='999')
	{
		$('#pgotherschoolcoursename').show();
	}
	else
	{
		$('#pgotherschoolcoursename').hide();
	}
}

function fnothercourses(id)
{
	if(id=='Yes')
	{
		$('#othercoursesoptions').show();
	}
	else
	{
		$('#othercoursesoptions').hide();
	}
}

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
  </script>    
  </head>

  <body>
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
          <input type="text" class="form-control" placeholder="First Name" id="name" name="name" value="<?php echo $firstName;?>">
        </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Mobile<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="First Name" id="phone" name="phone" value="<?php echo $firstName;?>">
        </div>        
      </div>
      <div class="form-group">
                <label class="col-sm-5 control-label">how did you come to know about RV-VLSI<span class="error-text">*</span></label>
                <div class="col-sm-7">
                 <select class="form-control" id="came_through" name="came_through">
                       <option value="select">Please select</option>
                      <option value="Friends">Friends</option>
                      <option value="Website">Website</option>
                      <option value="RV-VLSI-Alumini">RV-VLSI-Alumini</option>
                      <option value="College Professor">College Professor</option>
                      <option value="Friend of Friend">Friend of Friend</option>
                      <option value="Industry Reference">Industry Reference</option>
                      <option value="Govt Reference">Govt Reference</option>


                  </select>
                </div>        
              </div> 
       <h3 class="brd-btm mar-b20">10th Details</h3>
     <div class="form-group">
        <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <select class="form-control" id="sslc_passoutyear" name="sslc_passoutyear">
              <?php for($i=0;$i<count($yeararray);$i++){?>
              <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($sslcpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
              <?php }?>
              
          </select>
        </div>        
      </div> 

      <div class="form-group">
        <label class="col-sm-5 control-label">Percentage<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="First Name" id="tenth_percentage" name="tenth_percentage" value="<?php echo $firstName;?>">
        </div>        
      </div>

       <h3 class="brd-btm mar-b20">B.E / Degree Details</h3>
      <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                 <select class="form-control" id="deg_passoutyear" name="deg_passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($degpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
                 <div class="form-group">
            <label class="col-sm-5 control-label">Branch<span class="error-text">*</span></label>
            <div class="col-sm-7">
                <select class="form-control" id="deg_department" name="deg_department" onchange="otherdegcoureseshideshow(this.value)">
                  <?php for($i=0;$i<count($departmentarray);$i++){?>
                  <option value="<?php echo $departmentarray[$i]['iddepartment'];?>"
                          <?php if($degdepartment==$departmentarray[$i]['iddepartment']){ echo "selected=selected";};?>><?php echo $departmentarray[$i]['department'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
 <div class="form-group" id="degotherschoolcoursename" style='display:none'>
                <label class="col-sm-5 control-label">Course Name <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="Course Name" id="deg_othercoursename" name="deg_othercoursename" value="<?php echo $deg_othercoursename;?>">
                </div>               
              </div>
              
                            <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="deg_percentagetype" id="deg_percentagetype" value="Percentage" checked="checked"> Percentage
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="deg_percentagetype" id="deg_percentagetype" value="CGPA" checked="checked"> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="deg_percentage" name="deg_percentage" value="<?php echo $degpercentage;?>">                                                      
                </div>
              </div>
              <h3 class="brd-btm mar-b20">Basic Details</h3>
      <div class="form-group">
        <label class="col-sm-5 control-label">Have you taken any other course?<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="radio" name="othercourses" id="othercourses" value="Yes" onclick="fnothercourses(this.value)">Yes
          <input type="radio" name="othercourses" id="othercourses" value="No" onclick="fnothercourses(this.value)">No
        </div>        
      </div>
      <div id="othercoursesoptions" style="display:none">
       <div class="form-group">
        <label class="col-sm-5 control-label">Course Name<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Course Name" id="other_coursename" name="other_coursename">
        </div>        
      </div>
       <div class="form-group">
        <label class="col-sm-5 control-label">Institute Name<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Institute Name" id="other_institutename" name="other_institutename">
        </div>        
      </div>
        <div class="form-group">
        <label class="col-sm-5 control-label">Duration<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Duration" id="other_courseduration" name="other_courseduration">
        </div>        
      </div>
      </div>
          <div class="form-group">
        <label class="col-sm-5 control-label">Primary reason for taking the course?<span class="error-text">*</span></label>
        <div class="col-sm-7">
<select class="form-control" id="primary_reason" name="primary_reason">
                  <option value=''>Select</option>
                  <option value='Highter studies India'>Highter studies India</option>
                  <option value='Higher studies Abroad'>Higher studies Abroad</option>
                  <option value='other Technical services exams'>other Technical services exams</option>
                  <option value='Job in core industry.'>Job in core industry.</option>

              </select>        
              </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">How do you rate yourself on basic concepts of VLSI?<span class="error-text">*</span></label>
        <div class="col-sm-7">
<select class="form-control" id="vlsi_rate" name="vlsi_rate">
                  <option value=''>Select</option>
                  <option value='Excellent'>Excellent</option>
                  <option value='Good'>Good</option>
                  <option value='Good but need help'>Good but need help</option>
                  <option value='Average'>Average</option>

              </select>        
              </div>        
      </div>
    </div>
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <label class="col-sm-5 control-label">Email<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="First Name" id="email" name="email" value="<?php echo $firstName;?>">
        </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Home Town <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="First Name" id="hometown" name="hometown" value="<?php echo $firstName;?>">
        </div>        
      </div>
       <div class="form-group">
                <label class="col-sm-5 control-label">Select Course Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                   <select class="form-control" id="pgdip_coursename" name="pgdip_coursename" onchange="othercoureseshideshow(this.value)">
                        <?php for($i=0;$i<count($pgCoursesArray);$i++){?>
                      <option value="<?php echo $pgCoursesArray[$i]['idpgdipcourses'];?>" <?php if($pgDipCoursename==$pgCoursesArray[$i]['idpgdipcourses']){ echo "selected=selected";}?>><?php echo $pgCoursesArray[$i]['pgdip_coursename'];?></option>
                      <?php }?>
             
                  </select>
                </div>        
              </div>  

                   <h3 class="brd-btm mar-b20">12th / PUC  Details / Diploma</h3>

      <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <select class="form-control" id="puc_passoutyear" name="puc_passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($pucpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 


      <div class="form-group">
        <label class="col-sm-5 control-label">Percentage<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="First Name" id="puc_percentage" name="puc_percentage" value="<?php echo $firstName;?>">
        </div>        
      </div>
                   <h3 class="brd-btm mar-b20">M.Tech / M.E  Details</h3>

       <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <select class="form-control" id="pg_passoutyear" name="pg_passoutyear">
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
              <select class="form-control" id="pg_department" name="pg_department" onchange="otherpgcoureseshideshow(this.value)">
                  <option value=''>Select</option>
                  <?php for($i=0;$i<count($departmentarray);$i++){?>
                  <option value="<?php echo $departmentarray[$i]['iddepartment'];?>" <?php if($pgdepartment==$departmentarray[$i]['iddepartment']){ echo "selected=selected";}?>><?php echo $departmentarray[$i]['department'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
               <div class="form-group" id="pgotherschoolcoursename" style='display:none'>
                <label class="col-sm-5 control-label">Course Name <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="Course Name" id="pg_othercoursename" name="pg_othercoursename" value="<?php echo $pg_othercoursename;?>">
                </div>               
              </div> 
                            <div class="form-group">
                <label class="col-sm-5 control-label">Aggregate Marks <span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="pg_percentagetype" id="pg_percentagetype" value="Percentage" checked="checked"> Percentage
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="pg_percentagetype" id="pg_percentagetype" value="CGPA" checked="checked"> CGPA(out of 10 points)
                    </label>        
                    <input type="text" class="form-control mar-t10" placeholder="" id="pg_percentage" name="pg_percentage" value="<?php echo $pgpercentage;?>">                                                      
                </div>
              </div>
              <h3 class="brd-btm mar-b20">Basic Details</h3>

       <div class="form-group">
        <label class="col-sm-5 control-label">Are you expecting any job offer shortly?<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="radio" name="joboffer" id="joboffer" value="Yes (Core Job)">Yes (Core Job)
          <input type="radio" name="joboffer" id="joboffer" value="Yes (Non Core Job)">Yes (Non Core Job)
          <input type="radio" name="joboffer" id="joboffer" value="No">No
        </div>        
      </div>
       <div class="form-group">
        <label class="col-sm-5 control-label">Are you looking for Monday to Friday full time or Weekend parttime course?<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="radio" name="timeduration" id="timeduration" value="Monday to Friday">Monday to Friday
          <input type="radio" name="timeduration" id="timeduration" value="Weekend Part Time">Weekend Part Time
        </div>        
      </div>
          <div class="form-group">
        <label class="col-sm-5 control-label">How do you rate yourself on basic concepts of Embedded?<span class="error-text">*</span></label>
        <div class="col-sm-7">
<select class="form-control" id="embedded_rate" name="embedded_rate">
                  <option value=''>Select</option>
                  <option value='Excellent'>Excellent</option>
                  <option value='Good'>Good</option>
                  <option value='Good but need help'>Good but need help</option>
                  <option value='Average'>Average</option>

              </select>        
              </div>        
      </div>
       <div class="form-group">
        <label class="col-sm-5 control-label">Approximately income of Family?<span class="error-text">*</span></label>
        <div class="col-sm-7">
<select class="form-control" id="income" name="income">
                  <option value=''>Select</option>
                  <option value='less than 3 Lack'>Less than 3 Lack</option>
                  <option value='3 to 5 Lack'>3 to 5 Lack</option>
                  <option value='greater than 5 Lack'>Greater than 5 Lack</option>

              </select>        
              </div>        
      </div>
    </div>

     
</div>
      


          <div class="row">
           <div class="col-sm-12">
                              <h3 class="brd-btm mar-b20">Councellor Comments</h3>

            <div class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-2 control-label">Councellor Comments<span class="error-text">*</span></label>
                <div class="col-sm-10">
                 <textarea class="form-control" rows="3"  placeholder="" id="councellor" name="councellor"></textarea>
                </div>               
              </div> 
 <div class="form-group">
            <label class="col-sm-2 control-label">Follow up action<span class="error-text">*</span></label>
            <div class="col-sm-5">
                <select class="form-control" id="review_status" name="review_status" onchange="onReviewStatus(this.value)">
                  <?php for($i=0;$i<count($reviewStatusArray);$i++){?>
                  <option value="<?php echo $reviewStatusArray[$i]['idreviewstatus'];?>"
                          <?php if($reviewStatusArray==$reviewStatusArray[$i]['idreviewstatus']){ echo "selected=selected";};?>><?php echo $reviewStatusArray[$i]['reviewname'];?></option>
                  <?php }?>

              </select>
            </div>        
              </div> 
<div class="form-group" id='reviewreason' style='display:none'>
                <label class="col-sm-2 collor
ntrol-label">Reason<span class="error-text">*</span></label>
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
