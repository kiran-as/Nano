<?php
include("../application/conn.php");
include('../include/department.php');

$idrecruiter = $_SESSION['idrecruiter'];
if($_POST)
{
  
    $job_description = $_POST['jobDescription'];
    $job_title = $_POST['jobTitle'];
    $minqualification = $_POST['minqualification'];
    for($i=0;$i<count($_POST['discipline']);$i++)
    {
       $discipline.= ','.$_POST['discipline'][$i];
    }
     $recruitementdate = date('Y-m-d');
     $interviewdate = date('Y-m-d',strtotime($_POST['datepicker']));
     $noofopenings = $_POST['noofopenings'];


    $sslccutoff = $_POST['sslccutoff'];
    $sslcpassoutyear = $_POST['sslcpassoutyear'];
    $puccutoff = $_POST['puccutoff'];
    $pucpassoutyear = $_POST['pucpassoutyear'];
    $degcutoff = $_POST['degcutoff'];
    $degpassoutyear = $_POST['degpassoutyear'];
    $pgcutoff = $_POST['pgcutoff'];
    $pgpassoutyear = $_POST['pgpassoutyear'];
    $carryforward = $_POST['carryforward'];
    $lossofoneyear = $_POST['lossofoneyear'];
    $suggestedreading = $_POST['suggestedreading'];
    $venue = $_POST['venue'];
    $writtentest = $_POST['writtentest'];
    $internshipposition = $_POST['internshipposition'];
    $internshipduration = $_POST['internshipduration'];
    $regularposition = $_POST['regularposition'];
    $agreementbond = $_POST['agreementbond'];
    $writtentestaptitude = $_POST['writtentestaptitude'];
    $writtentesttechnical = $_POST['writtentesttechnical'];
    $technicalinterview  = $_POST['technicalinterview'];            
    $generalhrinterview = $_POST['generalhrinterview'];
    $specificskill = $_POST['specificskill'];
    $documentsrequired = $_POST['documentsrequired'];
    $duringinternship = $_POST['duringinternship']; 
                                      
    mysql_query("Insert into tbl_recruitement(recruitementposition,job_description ,"
            . "job_title,min_qualification,discipline,idrecruiter,recruitementdate,
                noofopening,interviewdate,
                sslccutoff,sslcpassoutyear,puccutoff,pucpassoutyear,degcutoff,degpassoutyear,
                pgcutoff,pgpassoutyear,carryforward,lossofoneyear,
                suggestedreading,venue,writtentest,internshipposition,
                internshipduration,regularposition,agreementbond,
                writtentestaptitude,writtentesttechnical,technicalinterview,
                generalhrinterview,specificskill,documentsrequired,
                duringinternship,regularemployment)

             Values ('$job_title','$job_description',"
            . "'$job_title','$minqualification','$discipline','$idrecruiter','$recruitementdate'
            ,'$noofopenings','$interviewdate',
            '$sslccutoff','$sslcpassoutyear','$puccutoff','$pucpassoutyear','$degcutoff','$degpassoutyear',
            '$pgcutoff','$pgpassoutyear','$carryforward','$lossofoneyear',
            '$suggestedreading','$venue','$writtentest','$internshipposition',
            '$internshipduration','$regularposition','$agreementbond',
            '$writtentestaptitude','$writtentesttechnical','$technicalinterview',
            '$generalhrinterview','$specificskill','$documentsrequired',
            '$duringinternship','$regularemployment')");

    header('Location:recruitementList.php');
     print_r($_POST);
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
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ minDate: -00, maxDate: "+1M +10D" });
    $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' });
  });
  </script>
  </head>

  <body>
      <form action="" method="POST"> 
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    <div class="row">
        <div class="form-horizontal">
             
            <div class="form-group">
              <label class="col-sm-2 control-label">Job Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="2" id="jobDescription" name="jobDescription"></textarea>
              </div>        
            </div>  
            <div class="form-group">
              <label class="col-sm-2 control-label">Job Title</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="2" id="jobTitle" name="jobTitle"></textarea>
              </div>        
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Min Qualification</label>
              <div class="col-sm-10">
                      <label class="radio-inline">
                        <input type="radio" name="minqualification" id="minqualification" value="BE" checked=checked> BE
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="minqualification" id="minqualification" value="ME" >ME
                      </label>        
              </div>          
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Select Discipline</label>
              <div class="col-sm-10">
              <?php for($i=0;$i<count($departmentarray);$i++){?>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="discipline[]" value="discipline[<?php echo $departmentarray[$i]['iddepartment'];?>]"> <?php echo $departmentarray[$i]['department'];?>
                      </label>
                    <?php }?>
                    
              </div>          
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Interview Date</label>
              <div class="col-sm-3">
                         <input  class="form-control" type="text" name='datepicker' id="datepicker"> 
              </div>      
           
              <label class="col-sm-2 control-label">No of Openings</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="noofopenings" name="noofopenings" 
                        value="">
              </div>          
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">SSLC CUT OFF</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="sslccutoff" name="sslccutoff" 
                        value="">
              </div>  
              <label class="col-sm-2 control-label">SSLC Passout Year</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="sslcpassoutyear" name="sslcpassoutyear" 
                        value="">
              </div>          
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">PUC CUT OFF</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="puccutoff" name="puccutoff" 
                        value="">
              </div>  
              <label class="col-sm-2 control-label">PUC Passout Year</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="pucpassoutyear" name="pucpassoutyear" 
                        value="">
              </div>          
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">DEG CUT OFF</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="degcutoff" name="degcutoff" 
                        value="">
              </div>  
              <label class="col-sm-2 control-label">DEG Passout Year</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="degpassoutyear" name="degpassoutyear" 
                        value="">
              </div>          
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">PG CUT OFF</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="pgcutoff" name="pgcutoff" 
                        value="">
              </div>  
              <label class="col-sm-2 control-label">PG Passout Year</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="pgpassoutyear" name="pgpassoutyear" 
                        value="">
              </div>          
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">IS SUBJECT CARRY FORWARD ALLOWED?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="carryforward" id="carryforward" value="Yes" checked=checked> Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="carryforward" id="carryforward" value="No" >No
                      </label>        
              </div> 
            </div>
            <div class="form-group"> 
              <label class="col-sm-4 control-label">IS LOSS OF 1 YEAR/ SEMESTER ALLOWED?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="lossofoneyear" id="lossofoneyear" value="Yes" checked=checked> Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="lossofoneyear" id="lossofoneyear" value="No" >No
                      </label>        
              </div>          
            </div>  
            <div class="form-group">
              <label class="col-sm-2 control-label">Suggested Reading(If any Specify)</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="2" id="suggestedreading" name="suggestedreading"></textarea>
              </div>        
            </div> 

            <div class="form-group">
              <label class="col-sm-2 control-label">VENUE/LOCATION FOR TEST(SPECIFY) </label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="2" id="venue" name="venue"></textarea>
              </div>        
            </div> 

            <div class="form-group">
              <label class="col-sm-4 control-label">CAN HOLD WRITTEN TEST/INTERVIEWS AT OUR CAMPUS?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="writtentest" id="writtentest" value="Yes"> Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="writtentest" id="writtentest" value="No" >No
                      </label>        
              </div> 
               </div>
            <div class="form-group"> 
               <label class="col-sm-4 control-label">IS THE HIRING FOR INTERNSHIP POSITIONS?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="internshipposition" id="internshipposition" value="Yes"> Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="internshipposition" id="internshipposition" value="No" >No
                      </label>        
              </div>

            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label">WHAT IS THE DURATION OF INTERNSHIP?</label>
              <div class="col-sm-3">
                      <label class="radio-inline">
                        <input type="radio" name="internshipduration" id="internshipduration" value="3_Months"> 3 Months
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="internshipduration" id="internshipduration" value="6_Months" >6 Months
                      </label>  
                      <label class="radio-inline">
                          <input type="radio" name="internshipduration" id="internshipduration" value="1_Year" >1 Year
                      </label>       
              </div>          
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label">ARE PLACEMENTS ASSURED AFTER INTERNSHIP?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="placementassured" id="placementassured" value="Yes"> Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="placementassured" id="placementassured" value="No" >No
                      </label>        
              </div> 
              </div>
            <div class="form-group">  
               <label class="col-sm-4 control-label">IS THE HIRING FOR REGULAR POSITIONS?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="regularposition" id="regularposition" value="Yes" checked=checked> Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="regularposition" id="regularposition" value="No" >No
                      </label>        
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-4 control-label">IS THERE ANY SERVICE AGREEMENT/BOND?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="agreementbond" id="agreementbond" value="Yes"> Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="agreementbond" id="agreementbond" value="No" >No
                      </label>        
              </div> 
              <label class="col-sm-2 control-label">No of Years</label>
   
               <div class="col-sm-2">
                    <input type='text' class="form-control" id="degpassoutyear" name="degpassoutyear" 
                        value="">
              </div>         
            </div>             





            <div class="form-group">
                        <h3 class="brd-btm mar-b20" style="font-size:16px;font-style:bold;">PLEASE  SPECIFY  SELECTION PROCEDURE</h3>

              <label class="col-sm-2 control-label">WRITTEN TEST (APTITUDE):</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="writtentestaptitude" name="writtentestaptitude" 
                        value="">
              </div>  
           
              <label class="col-sm-2 control-label">WRITTEN TEST (TECHNICAL)</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="writtentesttechnical" name="writtentesttechnical" 
                        value="">
              </div>          
          </div> 

            <div class="form-group">
              <label class="col-sm-2 control-label">TECHNICAL INTERVIEW</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="technicalinterview" name="technicalinterview" 
                        value="">
              </div>          
           
              <label class="col-sm-2 control-label">GENERAL HR INTERVIEW:</label>
              <div class="col-sm-3">
                    <input type='text' class="form-control" id="generalhrinterview" name="generalhrinterview" 
                        value="">
              </div>          
            </div>
 <div class="form-group">
                <label class="col-sm-2 control-label">ANY SPECIFIC SKILL AREA OF TEST (SPECIFY)</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="2" id="specificskill" name="specificskill"></textarea>
                </div>        
              </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">DOCUMENTS REQUIRED TO BE SUBMITTED</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="2" id="documentsrequired" name="documentsrequired"></textarea>
              </div>        
            </div> 
            </div>
            <div class="form-group">
            <h3 class="brd-btm mar-b20" style="font-size:16px;font-style:bold;">COMPENSATION/COST TO COMPANY (CTC)(INFORMATION WILL BE TREATED AS CONFIDENTIAL)</h3>
             <label class="col-sm-2 control-label">DURING INTERNSHIP</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="duringinternship" name="duringinternship" 
                        value="">
              </div>

              <label class="col-sm-2 control-label">ON REGULAR EMPLOYMENT</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="regularexmployment" name="regularemployment" 
                        value="">
              </div>          
            </div>
           

    </div>

    <div class="clearfix brd-top pad-t20">
        <button type="submit" class="btn btn-primary pull-right">SAVE & CONTINUE</button>       
        <button type="submit" class="btn btn-default pull-right mar-r20">RESET</button>        
    </div>     
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
