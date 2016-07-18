<?php
include('../application/conn.php');
include('../include/year.php');
include('../include/department.php');
include('../include/pgcourses.php');
include('../include/reviewstatus.php');
include('../include/councellor.php');

$studentId = $student_id = $studentId = $_GET['idstudent'];
$councellorId = $_SESSION['idcouncellor'];

$studentdetails = mysql_query(("Select a.*, b.reviewname from tbl_rvstudent as a, tbl_reviewstatus as b 
                  where a.idrvstudent=$studentId and a.enquiry_from=b.idreviewstatus"));
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
  $twelth_details = $row['twelth_details'];

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
  $be_seatquota = $row['be_seatquota'];
$be_attempt = $row['be_attempt'];
$be_subject = $row['be_subject'];
$me_seatquota = $row['me_seatquota'];
$me_attempt = $row['me_attempt'];
$me_subject = $row['me_subject'];
      $interested_in = $row['interested_in'];
      $vlsi_logic_design = $row['vlsi_logic_design'];
      $vlsi_transistor_theory = $row['vlsi_transistor_theory'];
      $vlsi_network_analysis= $row['vlsi_network_analysis'];
      
      $vlsi_hdl = $row['vlsi_hdl'];
      $embedded_C = $row['embedded_C'];
      $embedded_Linux = $row['embedded_Linux'];
      $embedded_RTOS= $row['embedded_RTOS'];
      
      $embedded_Microcontroller = $row['embedded_Microcontroller'];
      $education_gap = $row['education_gap'];
      $education_gap_reason= $row['education_gap_reason'];
      
      $joboffer_company_name = $row['joboffer_company_name'];
      $joboffer_joining_date = $row['joboffer_joining_date'];
      $joboffer_ctc= $row['joboffer_ctc'];
      
      $expectingjob = $row['expectingjob'];
      $expecting_joboffer_company_name = $row['expecting_joboffer_company_name'];
      $me_college_name = $row['me_college_name'];
      $me_university_name= $row['me_university_name'];
      
      $be_college_name = $row['be_college_name'];
      $be_university_name = $row['be_university_name'];   

      $professor_name = $row['professor_name'];
      $friendsname = $row['friendsname'];   
      $keywords = $row['keywords'];   

      $weeks_spare = $row['weeks_spare']; 
        $studenttype  = $row['studenttype'];
        $enquiry_from = $row['enquiry_from'];
 $reviewname = $row['reviewname'];        
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

$name = $_POST['name'];
$twelth_details = $_POST['twelth_details'];
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
  $be_seatquota = $_POST['be_seatquota'];
  $be_attempt = $_POST['be_attempt'];
  $be_subject = $_POST['be_subject'];
  $me_seatquota = $_POST['me_seatquota'];
  $me_attempt = $_POST['me_attempt'];
  $me_subject = $_POST['me_subject'];
      $interested_in = $_POST['interested_in'];
      $vlsi_logic_design = $_POST['vlsi_logic_design'];
      $vlsi_transistor_theory = $_POST['vlsi_transistor_theory'];
      $vlsi_network_analysis= $_POST['vlsi_network_analysis'];
      
      $vlsi_hdl = $_POST['vlsi_hdl'];
      $embedded_C = $_POST['embedded_C'];
      $embedded_Linux = $_POST['embedded_Linux'];
      $embedded_RTOS= $_POST['embedded_RTOS'];
      
      $embedded_Microcontroller = $_POST['embedded_Microcontroller'];
      $education_gap = $_POST['education_gap'];
      $education_gap_reason= $_POST['education_gap_reason'];
      
      $joboffer_company_name = $_POST['joboffer_company_name'];
      $joboffer_joining_date = $_POST['joboffer_joining_date'];
      $joboffer_ctc= $_POST['joboffer_ctc'];
      
      $expectingjob = $_POST['expectingjob'];
      $expecting_joboffer_company_name = $_POST['expecting_joboffer_company_name'];
      $me_college_name = $_POST['me_college_name'];
      $me_university_name= $_POST['me_university_name'];
      
      $be_college_name = $_POST['be_college_name'];
      $be_university_name = $_POST['be_university_name'];

 $friendsname = $_POST['friendsname'];
  $professor_name = $_POST['professor_name'];
  $keywords = $_POST['keywords'];
    $studenttype  = $_POST['studenttype'];
  $weeks_spare = $_POST['weeks_spare'];
  $enquiry_from = $_POST['enquiry_from'];

mysql_query("Delete from tbl_rvstudent where idrvstudent='$studentId'");

  mysql_query("Insert into tbl_rvstudent 
    (weeks_spare,studenttype,idrvstudent, friendsname, professor_name, keywords,name,phone,came_through,sslc_passoutyear,tenth_percentage,
      deg_passoutyear,deg_department,deg_othercoursename,
      email,hometown,pgdip_coursename,
      puc_passoutyear,puc_percentage,pg_passoutyear,
      pg_department,pg_othercoursename,othercourses,
      other_coursename,other_institutename,other_courseduration,
      primary_reason,vlsi_rate,joboffer,
      timeduration,embedded_rate,income,created_date,idcouncellor,
      deg_percentage,pg_percentage,deg_percentagetype,pg_percentagetype,
      be_seatquota,be_attempt,be_subject,me_seatquota,me_attempt,
      me_subject,interested_in,vlsi_logic_design,vlsi_transistor_theory,
      vlsi_network_analysis,vlsi_hdl,embedded_C,embedded_Linux,
      embedded_RTOS,embedded_Microcontroller,education_gap,
      education_gap_reason,joboffer_company_name,joboffer_joining_date,
      joboffer_ctc,expectingjob,expecting_joboffer_company_name,me_college_name,
      me_university_name,be_college_name,be_university_name,twelth_details,enquiry_from)

    Values ('$weeks_spare','$studenttype','$studentId','$friendsname', '$professor_name', '$keywords','$name','$phone','$came_through','$sslc_passoutyear','$tenth_percentage',
      '$deg_passoutyear','$deg_department','$deg_othercoursename',
      '$email','$hometown','$pgdip_coursename',
      '$puc_passoutyear','$puc_percentage','$pg_passoutyear',
      '$pg_department','$pg_othercoursename','$othercourses',
      '$other_coursename','$other_institutename','$other_courseduration',
      '$primary_reason','$vlsi_rate','$joboffer',
      '$timeduration','$embedded_rate','$income','$created_date','$assignCouncellor',
      '$deg_percentage','$pg_percentage','$deg_percentagetype','$pg_percentagetype',
          '$be_seatquota','$be_attempt','$be_subject','$me_seatquota','$me_attempt',
      '$me_subject','$interested_in','$vlsi_logic_design','$vlsi_transistor_theory',
      '$vlsi_network_analysis','$vlsi_hdl','$embedded_C','$embedded_Linux',
      '$embedded_RTOS','$embedded_Microcontroller','$education_gap',
      '$education_gap_reason','$joboffer_company_name','$joboffer_joining_date',
      '$joboffer_ctc','$expectingjob','$expecting_joboffer_company_name','$me_college_name',
      '$me_university_name','$be_college_name','$be_university_name','$twelth_details','$enquiry_from')");


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
     fnothercourses('<?php echo $othercourses;?>');
   //  onReviewStatus('<?php echo $review_status;?>');
     beAttempt('<?php echo $be_attempt;?>');
     meAttempt('<?php echo $me_attempt;?>');
     rvdropdown();
     rvdropdown('<?php echo $came_through;?>');
     fnJobOffer('<?php echo $joboffer;?>');
     fnExpectingJobOffer('<?php echo $expectingjob;?>');
     fnEducationGap('<?php echo $education_gap;?>');
     courses('<?php echo $interested_in;?>');
   }


function fnothercourses(id)
{
  alert(id);
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


 function beAttempt(attempt)
 {

  if(attempt=='Single')
  {
$('#backlogAttempDiv').hide();
  }
  else if(attempt=='Backlog')
  {
     $('#backlogAttempDiv').show();
  }
  else
  {
    $('#backlogAttempDiv').hide();

  }
 }

  function meAttempt(attempt)
 {
  if(attempt=='Single')
  {
$('#backlogAttempDivME').hide();
  }
  else
  {
     $('#backlogAttempDivME').show();
  }
 }

 function rvdropdown(names)
 {
  $('#ProfessorNameDiv').hide();
  $('#keywordsDiv').hide();
  $('#friendDiv').hide();
  if(names=='Professor')
  {
    $('#ProfessorNameDiv').show();
  } else if (names=='Website')
  {
    $('#keywordsDiv').show();
  } else if (names=='Friends')
  {
    $('#friendDiv').show();
  }

 }

 function fnJobOffer(value)
 {
 
  if(value=='Yes')
  {
    $('#jobofferDivYES').show();
    $('#jobofferDivNO').hide();
  }
  else
  {
    $('#jobofferDivYES').hide();
    $('#jobofferDivNO').show();
  }
 }

 function fnExpectingJobOffer(value)
 {
   if(value=='Yes')
   {
 $('#expectingJobOfferDivYes').show();
   }
   else
   {
 $('#expectingJobOfferDivYes').hide();

   }
}

function fnEducationGap(id)
{
  if(id=='Yes')
  {
    $('#educationGapDiv').show();
  }
  else
  {
    $('#educationGapDiv').hide();
  }
}
function courses(course)
{
  if(course=='vlsi' || course=='VLSI')
  {
    $('#vlsidiv').show();
    $('#embeddeddiv').hide();
  } else if (course=='embedded' || course=='EMBEDDED')
  {
    $('#vlsidiv').hide();
    $('#embeddeddiv').show();
  } else
  {
    $('#vlsidiv').show();
    $('#embeddeddiv').show();
  }
}
  </script>    
  </head>

  <body onload='hidedepartment();'>

     <form action="" method="POST" id="academicProject">
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    <input type="hidden" name="enquiry_from" id="enquiry_from" value="<?php echo $enquiry_from;?>" />
    <div class="container mar-t10">
     <h3 class="brd-btm mar-b20">Student Details</h3>
<div class="row">
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <label class="col-sm-5 control-label">First Name <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control"  placeholder="First Name" id="name" name="name" value="<?php echo $name;?>">
        </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Mobile<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control"  placeholder="First Name" id="phone" name="phone" value="<?php echo $phone;?>">
        </div>        
      </div>
      <div class="form-group">
                <label class="col-sm-5 control-label">how did you come to know about RV-VLSI<span class="error-text">*</span></label>
                <div class="col-sm-7">
                 <select class="form-control"  id="came_through" name="came_through" onchange="rvdropdown(this.value)">
                      <option value="Friends" <?php if($came_through=='Friends'){ echo "Selected=selelcted";}?>>Friends</option>
                      <option value="Website" <?php if($came_through=='Website'){ echo "Selected=selelcted";}?>>Website</option>
 <option value="Professor" <?php if($came_through=='Professor'){ echo "Selected=selelcted";}?>>Professor</option>
                      <option value="RV-VLSI-Alumini" <?php if($came_through=='RV-VLSI-Alumini'){ echo "Selected=selelcted";}?>>RV-VLSI Alumini</option>
 <option value="Friend of Friend" <?php if($came_through=='Friend of Friend'){ echo "Selected=selelcted";}?>>Friend of Friend</option>
                      <option value="Industry Reference" <?php if($came_through=='Industry Reference'){ echo "Selected=selelcted";}?>>Industry Reference</option>
                       <option value="Govt Reference" <?php if($came_through=='Govt Reference'){ echo "Selected=selelcted";}?>>Govt Refernce</option>

                  </select>
                </div>        
              </div> 
              <div class="clearfix"></div>
          <div class="form-group" id="friendDiv" style="display:none">
        <label class="col-sm-5 control-label">Friends Name<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Friends Name" id="friendsname" name="friendsname" value='<?php echo $friendsname;?>
          '>
        </div>        
      </div>
           <div class="form-group" id="keywordsDiv" style="display:none">
        <label class="col-sm-5 control-label">Key Words used to search<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="keywords" value='<?php echo $keywords;?>'>
        </div>        
      </div>
       <div class="form-group" id="ProfessorNameDiv" style='display:none'>
        <label class="col-sm-5 control-label">Professor Name<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control" placeholder="Professor Name" id="professor_name" name="professor_name" value='<?php echo $professor_name;?>'>
        </div>        
      </div>
       <h3 class="brd-btm mar-b20">10th Details</h3>
     <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <select class="form-control"  id="sslc_passoutyear" name="sslc_passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($sslc_passoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 

      <div class="form-group">
        <label class="col-sm-5 control-label">Percentage<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control"  placeholder="Percentage" id="tenth_percentage" name="tenth_percentage" value="<?php echo $tenth_percentage;?>">
        </div>        
      </div>

       <h3 class="brd-btm mar-b20">B.E / Degree Details</h3>
      <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                 <select class="form-control"  id="deg_passoutyear" name="deg_passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($deg_passoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
                 <div class="form-group">
            <label class="col-sm-5 control-label">Branch<span class="error-text">*</span></label>
            <div class="col-sm-7">
                <select class="form-control"  id="deg_department" name="deg_department" onchange="otherdegcoureseshideshow(this.value)">
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
                  <input type="name" class="form-control"  placeholder="Course Name" id="deg_othercoursename" name="deg_othercoursename" value="<?php echo $deg_othercoursename;?>">
                </div>               
              </div> 
  <div class="form-group">
                <label class="col-sm-5 control-label">College Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="Course Name" id="be_college_name" name="be_college_name" value="<?php echo $be_college_name;?>">
                </div>               
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label">University Name <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="Course Name" id="be_university_name" name="be_university_name" value="<?php echo $be_university_name;?>">
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
              <div class="form-group">
                <label class="col-sm-5 control-label">Seat Type<span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="be_seatquota" id="be_seatquota" value="Merit" <?php if($be_seatquota == 'Merit'){ echo "checked=checked";}?>> Merit
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="be_seatquota" id="be_seatquota" <?php if($be_seatquota == 'Payment'){ echo "checked=checked";}?> value="Payment" > Payment/Management
                    </label>        
                                    </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label">Attempts in BE<span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="be_attempt" id="be_attempt" value="Single" <?php if($be_attempt == 'Single'){ echo "checked=checked";}?>checked="checked" onclick="beAttempt('Single')"> Single Attempt
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="be_attempt" id="be_attempt" value="Backlog" <?php if($be_attempt == 'Backlog'){ echo "checked=checked";}?>onclick="beAttempt('Backlog')"> Backlog
                    </label>        
                                    </div>
              </div>
              <div class="form-group" id="backlogAttempDiv" style='display:none'>
                <label class="col-sm-5 control-label">Subjects<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="Subject1, Subject2..." id="be_subject" name="be_subject" value="<?php echo $be_subject;?>">
                </div>               
              </div>
     

    </div>
    <div class="form-horizontal col-sm-6">
      <div class="form-group">
        <label class="col-sm-5 control-label">Email<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control"  placeholder="First Name" id="email" name="email" value="<?php echo $email;?>">
        </div>        
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Home Town <span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control"  placeholder="First Name" id="hometown" name="hometown" value="<?php echo $hometown;?>">
        </div>        
      </div>
       <div class="form-group">
                <label class="col-sm-5 control-label">Select Course Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                   <select class="form-control"  id="pgdip_coursename" name="pgdip_coursename" onchange="othercoureseshideshow(this.value)">
                        <?php for($i=0;$i<count($pgCoursesArray);$i++){?>
                      <option value="<?php echo $pgCoursesArray[$i]['idpgdipcourses'];?>" <?php if($pgdip_coursename==$pgCoursesArray[$i]['idpgdipcourses']){ echo "selected=selected";}?>><?php echo $pgCoursesArray[$i]['pgdip_coursename'];?></option>
                      <?php }?>
             
                  </select>
                </div>        
              </div>  
  <div class="form-group">
        <label class="col-sm-4 control-label">Student Type?</label>
        <div class="col-sm-5">
                  <input type="radio" name="studenttype" id="studenttype" value='Fresher' <?php if($studenttype=='Fresher'){ echo "checked=checked";}?>>Fresher
                  <input type="radio" name="studenttype" id="studenttype" value='Experience' <?php if($studenttype=='Experience'){ echo "checked=checked";}?>>Experience
              </div>        
      </div>  
                   <h3 class="brd-btm mar-b20">
<input type="radio" name="twelth_details" id="twelth_details" value="PUC"  <?php if($twelth_details=='PUC'){ echo "checked=checked";}?>> PUC  Details       
<input type="radio" name="twelth_details" id="twelth_details" value="12th" <?php if($twelth_details=='12th'){ echo "checked=checked";}?>> 12th
<input type="radio" name="twelth_details" id="twelth_details" value="Diploma" <?php if($twelth_details=='Diploma'){ echo "checked=checked";}?> > Diploma
        </h3>

      <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <select class="form-control"  id="puc_passoutyear" name="puc_passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($puc_passoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
              </div> 
      <div class="form-group">
        <label class="col-sm-5 control-label">Percentage<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="text" class="form-control"  placeholder="First Name" id="puc_percentage" name="puc_percentage" value="<?php echo $puc_percentage;?>">
        </div>        
      </div> 
     
     
                   <h3 class="brd-btm mar-b20">M.Tech / M.E  Details</h3>

       <div class="form-group">
                <label class="col-sm-5 control-label">Passed Out <span class="error-text"></span></label>
                <div class="col-sm-7">
                  <select class="form-control"  id="pg_passoutyear" name="pg_passoutyear">
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
              <select class="form-control"  id="pg_department" name="pg_department" onchange="otherpgcoureseshideshow(this.value)">
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
                  <input type="name" class="form-control"  placeholder="Course Name" id="pg_othercoursename" name="pg_othercoursename" value="<?php echo $pg_othercoursename;?>">
                </div>               
              </div> 
 <div class="form-group">
                <label class="col-sm-5 control-label">College Name<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="College Name" id="me_college_name" name="me_college_name" value="<?php echo $me_college_name;?>">
                </div>               
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label">University Name <span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="University Name" id="me_university_name" name="me_university_name" value="<?php echo $me_university_name;?>">
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
              <div class="form-group">
                <label class="col-sm-5 control-label">Seat Type<span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="me_seatquota" id="me_seatquota" <?php if($me_seatquota == 'Merit'){ echo "checked=checked";}?> value="Merit" checked="checked"> Merit
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="me_seatquota" id="me_seatquota" <?php if($me_seatquota == 'Payment'){ echo "checked=checked";}?> value="Payment" > Payment/Management
                    </label>        
                                    </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label">Attempts in ME<span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="me_attempt" id="me_attempt" value="Single" <?php if($me_attempt == 'Single'){ echo "checked=checked";}?> onclick="meAttempt('Single')"> Single Attempt
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="me_attempt" id="me_attempt" value="Backlog" <?php if($me_attempt == 'Backlog'){ echo "checked=checked";}?> onclick="meAttempt('Backlog')"> Backlog
                    </label>        
                                    </div>
              </div>
              <div class="form-group" id="backlogAttempDivME" style='display:none'>
                <label class="col-sm-5 control-label">Subjects<span class="error-text">*</span></label>
                <div class="col-sm-7">
                  <input type="name" class="form-control" placeholder="Subject1, Subject2..." id="me_subject" name="me_subject" value="<?php echo $me_subject;?>">
                </div>               
              </div>

    </div>
     
<div class="row">
           <div class="col-sm-12">
                              <h3 class="brd-btm mar-b20">Councellor Questions</h3>

            <div class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-4 control-label">Have you taken any other skill development courses?<span class="error-text">*</span></label>
                <div class="col-sm-7">
          <input type="radio" name="othercourses" id="othercourses" value="Yes" <?php if($othercourses=='Yes'){ echo "checked=checked";}?> onclick="fnothercourses(this.value)">Yes
          <input type="radio" name="othercourses" id="othercourses" value="No" <?php if($othercourses=='No'){ echo "checked=checked";}?> onclick="fnothercourses(this.value)">No
                </div>               
              </div> 
              <div id="othercoursesoptions" style="display:none">
       <div class="form-group">
        <label class="col-sm-4 control-label">Course Name<span class="error-text">*</span></label>
        <div class="col-sm-3">
          <input type="text" class="form-control" placeholder="Course Name" id="other_coursename" name="other_coursename" value="<?php echo $other_coursename;?>">
        </div>        
      </div>
       <div class="form-group">
        <label class="col-sm-4 control-label">Institute Name<span class="error-text">*</span></label>
        <div class="col-sm-3">
          <input type="text" class="form-control" placeholder="Institute Name" id="other_institutename" name="other_institutename" value="<?php echo $other_institutename;?>">
        </div>        
      </div>
        <div class="form-group">
        <label class="col-sm-4 control-label">Duration<span class="error-text">*</span></label>
        <div class="col-sm-3">
          <input type="text" class="form-control" placeholder="Duration" id="other_courseduration" name="other_courseduration" value="<?php echo $other_courseduration;?>">
        </div>        
      </div>
 </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Primary reason for taking the course?<span class="error-text">*</span></label>
        <div class="col-sm-8">
                  <input type="radio" name="primary_reason" id="primary_reason" <?php if($primary_reason=='Job in core industry') { echo  "checked=checked";}?>value="Job in core industry" >Job in core industry 
          <input type="radio" name="primary_reason" <?php if($primary_reason=='Highter studies India') { echo  "checked=checked";}?> id="primary_reason" value="Highter studies India" >Highter studies in India
          <input type="radio" name="primary_reason" <?php if($primary_reason=='Higher studies Abroad') { echo  "checked=checked";}?> id="primary_reason" value="Higher studies Abroad" >Preparing for heigher studies Abroad
          <input type="radio" name="primary_reason" <?php if($primary_reason=='other Technical services exams') { echo  "checked=checked";}?> id="primary_reason" value="other Technical services exams" >Preparing for other Technical exams
             
        </div>       
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Do you know the domain you are interested in?<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="radio" name="interested_in" <?php if($interested_in=='VLSI') { echo  "checked=checked";}?> id="interested_in" value="VLSI" onclick="courses('vlsi')">VLSI
          <input type="radio" name="interested_in" <?php if($interested_in=='EMBEDDED') { echo  "checked=checked";}?>  id="interested_in" value="EMBEDDED" onclick="courses('embedded')">EMBEDDED
          <input type="radio" name="interested_in" <?php if($interested_in=='Both') { echo  "checked=checked";}?> id="interested_in" value="Both" onclick="courses('both')">Not Sure/ Both

        </div>        
      </div>
       <div id='vlsidiv' style="display:none;">
     <div class="form-group">
        <label class="col-sm-4 control-label">How do you rate yourself in Logic Design?<span class="error-text">*</span></label>
        <div class="col-sm-5">
                  <input type="radio" name="vlsi_logic_design" id="vlsi_logic_design" <?php if($vlsi_logic_design=='Excellent') { echo  "checked=checked";}?> value='Excellent'>Excellent
                  <input type="radio" name="vlsi_logic_design" id="vlsi_logic_design" <?php if($vlsi_logic_design=='Good') { echo  "checked=checked";}?> value='Good'>Good
                  <input type="radio" name="vlsi_logic_design" id="vlsi_logic_design" <?php if($vlsi_logic_design=='Good but need help') { echo  "checked=checked";}?> value='Good but need help'>Good but need help
                  <input type="radio" name="vlsi_logic_design" id="vlsi_logic_design" <?php if($vlsi_logic_design=='Average') { echo  "checked=checked";}?> value='Average'>Average
              </div>        
      </div>

<div class="form-group">
        <label class="col-sm-4 control-label">How do you rate yourself in Transistor theory?<span class="error-text">*</span></label>
        <div class="col-sm-5">
                  <input type="radio" name="vlsi_transistor_theory" id="vlsi_transistor_theory" <?php if($vlsi_transistor_theory=='Excellent') { echo  "checked=checked";}?>value='Excellent'>Excellent
                  <input type="radio" name="vlsi_transistor_theory" id="vlsi_transistor_theory" <?php if($vlsi_transistor_theory=='Good') { echo  "checked=checked";}?>value='Good'>Good
                  <input type="radio" name="vlsi_transistor_theory" id="vlsi_transistor_theory" <?php if($vlsi_transistor_theory=='Good but need help') { echo  "checked=checked";}?>value='Good but need help'>Good but need help
                  <input type="radio" name="vlsi_transistor_theory" id="vlsi_transistor_theory" <?php if($vlsi_transistor_theory=='Average') { echo  "checked=checked";}?>value='Average'>Average
              </div>        
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">How do you rate yourself in network analysis?<span class="error-text">*</span></label>
        <div class="col-sm-5">
                  <input type="radio" name="vlsi_network_analysis" id="vlsi_network_analysis" <?php if($vlsi_network_analysis=='Excellent') { echo  "checked=checked";}?>value='Excellent'>Excellent
                  <input type="radio" name="vlsi_network_analysis" id="vlsi_network_analysis" <?php if($vlsi_network_analysis=='Good') { echo  "checked=checked";}?>value='Good'>Good
                  <input type="radio" name="vlsi_network_analysis" id="vlsi_network_analysis" <?php if($vlsi_network_analysis=='Good but need help') { echo  "checked=checked";}?>value='Good but need help'>Good but need help
                  <input type="radio" name="vlsi_network_analysis" id="vlsi_network_analysis" <?php if($vlsi_network_analysis=='Average') { echo  "checked=checked";}?>value='Average'>Average
              </div>        
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">How do you rate yourself in HDL Progrmming using verilog?<span class="error-text">*</span></label>
        <div class="col-sm-5">
                  <input type="radio" name="vlsi_hdl" id="vlsi_hdl" <?php if($vlsi_hdl=='Excellent') { echo  "checked=checked";}?>value='Excellent'>Excellent
                  <input type="radio" name="vlsi_hdl" id="vlsi_hdl" <?php if($vlsi_hdl=='Good') { echo  "checked=checked";}?>value='Good'>Good
                  <input type="radio" name="vlsi_hdl" id="vlsi_hdl" <?php if($vlsi_hdl=='Good but need help') { echo  "checked=checked";}?>value='Good but need help'>Good but need help
                  <input type="radio" name="vlsi_hdl" id="vlsi_hdl" <?php if($vlsi_hdl=='Average') { echo  "checked=checked";}?>value='Average'>Average
              </div>        
      </div>
      </div>
      <div id='embeddeddiv' style='display:none'>
        <div class="form-group">
        <label class="col-sm-4 control-label">Microcontroller / Microprocess Basics?<span class="error-text">*</span></label>
        <div class="col-sm-5">
                  <input type="radio" name="embedded_Microcontroller" id="embedded_Microcontroller" <?php if($embedded_Microcontroller=='Excellent') { echo  "checked=checked";}?>value='Excellent'>Excellent
                  <input type="radio" name="embedded_Microcontroller" id="embedded_Microcontroller" <?php if($embedded_Microcontroller=='Good') { echo  "checked=checked";}?>value='Good'>Good
                  <input type="radio" name="embedded_Microcontroller" id="embedded_Microcontroller" <?php if($embedded_Microcontroller=='Good but need help') { echo  "checked=checked";}?>value='Good but need help'>Good but need help
                  <input type="radio" name="embedded_Microcontroller" id="embedded_Microcontroller" <?php if($embedded_Microcontroller=='Average') { echo  "checked=checked";}?>value='Average'>Average
              </div>        
      </div>
<div class="form-group">
        <label class="col-sm-4 control-label">How do you rate yourself in C?<span class="error-text">*</span></label>
        <div class="col-sm-5">
                  <input type="radio" name="embedded_C" id="embedded_C" <?php if($embedded_C=='Excellent') { echo  "checked=checked";}?>value='Excellent'>Excellent
                  <input type="radio" name="embedded_C" id="embedded_C" <?php if($embedded_C=='Good') { echo  "checked=checked";}?>value='Good'>Good
                  <input type="radio" name="embedded_C" id="embedded_C" <?php if($embedded_C=='Good but need help') { echo  "checked=checked";}?>value='Good but need help'>Good but need help
                  <input type="radio" name="embedded_C" id="embedded_C" <?php if($embedded_C=='Average') { echo  "checked=checked";}?>value='Average'>Average
              </div>        
      </div>

<div class="form-group">
        <label class="col-sm-4 control-label">How do you rate yourself in Linux?<span class="error-text">*</span></label>
        <div class="col-sm-5">
                  <input type="radio" name="embedded_Linux" id="embedded_Linux" <?php if($embedded_Linux=='Excellent') { echo  "checked=checked";}?>value='Excellent'>Excellent
                  <input type="radio" name="embedded_Linux" id="embedded_Linux" <?php if($embedded_Linux=='Good') { echo  "checked=checked";}?>value='Good'>Good
                  <input type="radio" name="embedded_Linux" id="embedded_Linux" <?php if($embedded_Linux=='Good but need help') { echo  "checked=checked";}?>value='Good but need help'>Good but need help
                  <input type="radio" name="embedded_Linux" id="embedded_Linux" <?php if($embedded_Linux=='Average') { echo  "checked=checked";}?>value='Average'>Average
              </div>        
      </div>
<div class="form-group">
        <label class="col-sm-4 control-label">How do you rate yourself in RTOS?<span class="error-text">*</span></label>
        <div class="col-sm-5">
                  <input type="radio" name="embedded_RTOS" id="embedded_RTOS" <?php if($embedded_RTOS=='Excellent') { echo  "checked=checked";}?>value='Excellent'>Excellent
                  <input type="radio" name="embedded_RTOS" id="embedded_RTOS" <?php if($embedded_RTOS=='Good') { echo  "checked=checked";}?>value='Good'>Good
                  <input type="radio" name="embedded_RTOS" id="embedded_RTOS" <?php if($embedded_RTOS=='Good but need help') { echo  "checked=checked";}?>value='Good but need help'>Good but need help
                  <input type="radio" name="embedded_RTOS" id="embedded_RTOS" <?php if($embedded_RTOS=='Average') { echo  "checked=checked";}?>value='Average'>Average
              </div>        
      </div>
    </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">How many weeks can you spare?<span class="error-text">*</span></label>
        <div class="col-sm-7">
                  <input type="radio" name="weeks_spare" id="weeks_spare"  <?php if($weeks_spare=='4') { echo  "checked=checked";}?> value='4'>4 Weeks
                  <input type="radio" name="weeks_spare" id="weeks_spare"  <?php if($weeks_spare=='12') { echo  "checked=checked";}?> value='12'>12 Weeks
                  <input type="radio" name="weeks_spare" id="weeks_spare"  <?php if($weeks_spare=='16') { echo  "checked=checked";}?> value='16'>16 Weeks
                  <input type="radio" name="weeks_spare" id="weeks_spare"  <?php if($weeks_spare=='24') { echo  "checked=checked";}?> value='24'>24 Weeks
              </div>        
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Are you looking Weekday or Weekend Courses?<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="radio" name="timeduration" id="timeduration" <?php if($timeduration=='Monday to Friday') { echo  "checked=checked";}?>  value="Monday to Friday">Monday to Friday
          <input type="radio" name="timeduration" id="timeduration" <?php if($timeduration=='Weekend Part Time') { echo  "checked=checked";}?>  value="Weekend Part Time">Weekend Part Time
        </div>        
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Approximate income of Family?<span class="error-text">*</span></label>
        <div class="col-sm-7">
                  <input type="radio" name="income" id="income"   <?php if($income=='less than 3 Lack') { echo  "checked=checked";}?>  value='less than 3 Lack'>Less than 3 Lack
                  <input type="radio" name="income" id="income"   <?php if($income=='3 to 5 Lack') { echo  "checked=checked";}?>  value='3 to 5 Lack'>3 to 5 Lack
                  <input type="radio" name="income" id="income"   <?php if($income=='greater than 5 Lack') { echo  "checked=checked";}?>  value='greater than 5 Lack'>Greater than 5 Lack
              </div>        
      </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Any gap in education<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="radio" name="education_gap" id="education_gap" value="Yes" <?php if($education_gap=='Yes') { echo  "checked=checked";}?>  onclick="fnEducationGap('Yes');">Yes
          <input type="radio" name="education_gap" id="education_gap" value="No" <?php if($education_gap=='No') { echo  "checked=checked";}?>  checked="checked" onclick="fnEducationGap('No');">No
        </div>        
      </div>
      <div id='educationGapDiv' style="display:none">
      <div class="form-group">
                <label class="col-sm-4 control-label">Reason<span class="error-text">*</span></label>
                <div class="col-sm-4">
                  <input type="name" class="form-control" placeholder="Reason" id="education_gap_reason" name="education_gap_reason" value="<?php echo $education_gap_reason;?>">
                </div>               
      </div>
    </div>
          <div class="form-group">
        <label class="col-sm-4 control-label">Do you have a job offer in hand from campus?<span class="error-text">*</span></label>
        <div class="col-sm-7">
          <input type="radio" name="joboffer" id="joboffer" value="Yes" <?php if($joboffer=='Yes') { echo  "checked=checked";}?>  onclick="fnJobOffer('Yes');">Yes
          <input type="radio" name="joboffer" id="joboffer" value="No" <?php if($joboffer=='No') { echo  "checked=checked";}?> onclick="fnJobOffer('No');">No
        </div>        
      </div>

      <div id="jobofferDivYES" style="display:none">
      <div class="form-group">
                <label class="col-sm-4 control-label">Company Name<span class="error-text">*</span></label>
                <div class="col-sm-5">
                  <input type="name" class="form-control" placeholder="Company NAme" id="joboffer_company_name" name="joboffer_company_name" value="<?php echo $joboffer_company_name;?>">
                </div>               
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Joining Date<span class="error-text">*</span></label>
                <div class="col-sm-5">
                  <input type="name" class="form-control" placeholder="" id="joboffer_joining_date" name="joboffer_joining_date" value="<?php echo $joboffer_joining_date;?>">
                </div>               
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">CTC<span class="error-text">*</span></label>
                <div class="col-sm-5">
                  <input type="name" class="form-control" placeholder="" id="joboffer_ctc" name="joboffer_ctc" value="<?php echo $joboffer_ctc;?>">
                </div>               
              </div>
      </div>
      <div id="jobofferDivNO" style="display:none">

       <div class="form-group">
        <label class="col-sm-4 control-label">Are you expecting a job ?<span class="error-text">*</span></label>
        <div class="col-sm-4">
          <input type="radio" name="expectingjob" id="expectingjob" value="Yes" onclick="fnExpectingJobOffer('Yes');">Yes
          <input type="radio" name="expectingjob" id="expectingjob" value="No" checked="checked" onclick="fnExpectingJobOffer('No');">No
        </div>        
      </div>
      </div>
<div id="expectingJobOfferDivYes" style="display:none">
<div class="form-group">
                <label class="col-sm-4 control-label">Company Name<span class="error-text">*</span></label>
                <div class="col-sm-4">
                  <input type="name" class="form-control" placeholder="Company NAme" id="expecting_joboffer_company_name" name="expecting_joboffer_company_name" value="">
                </div>               
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Joining Date<span class="error-text">*</span></label>
                <div class="col-sm-4">
                  <input type="name" class="form-control" placeholder="" id="expecting_joboffer_joining_date" name="expecting_joboffer_joining_date" value="">
                </div>               
              </div>
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
                 <textarea class="form-control" rows="3"  readonly="readonly"  placeholder="" id="councellor" name="councellor">
                   <?php echo $councellorArray[$i]['review'];?>

                 </textarea>
                </div>               
              </div> 
              <div class="form-group">
                  <label class="col-sm-2 control-label"><?php echo $councellorArray[$i]['name'].' Review';?> Status<span class="error-text">*</span></label>
                  <div class="col-sm-4">
                      <input type="name" class="form-control"  value="<?php echo $councellorArray[$i]['reviewname'];?>">

                  </div> At <?php echo date('d-M-Y H:i:s',strtotime($councellorArray[$i]['created_date']));?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enquiry From : <?php echo $reviewname;?>
      
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
            <div class="col-sm-4">
                <select class="form-control"  id="review_status" name="review_status"  onchange="onReviewStatus(this.value)">
                  <?php for($i=0;$i<count($reviewStatusArray);$i++){
                     if($reviewStatusArray[$i]['idreviewstatus']<'1000'){?>
                  <option value="<?php echo $reviewStatusArray[$i]['idreviewstatus'];?>"
                          <?php if($reviewStatusArray==$reviewStatusArray[$i]['idreviewstatus']){ echo "selected=selected";};?>><?php echo $reviewStatusArray[$i]['reviewname'];?></option>
                  <?php }}?>

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
