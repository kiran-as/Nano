<?php
include("../application/conn.php");
include('../include/department.php');
include('../include/domainlist.php');
include('../include/documentlist.php');
include('../include/year.php');
include('../include/domain_type.php');
$idrecruiter = $_GET['idrecruiter'];
$requiterSql = mysql_query("Select * from tbl_recruiter where idrecruiter=$idrecruiter");
while($row = mysql_fetch_assoc($requiterSql))
{
  $requiterName = $row['usename'];
  $email = $row['email'];
  $company = $row['company'];
  $mobile = $row['mobile'];
  $designation = $row['designation'];

}
$idrecruitement = $_GET['idrecruitement'];
$requiterSql = mysql_query("Select * from tbl_recruitement where idrecruitement=$idrecruitement");
while($row = mysql_fetch_assoc($requiterSql))
{
  $experience_type = $row['experience_type'];
    $job_description = $row['job_description'];
    $job_title = $row['job_title'];
    $minqualification = $row['min_qualification'];
     $noofopenings = $row['noofopenings'];


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

    $carryforward = $row['carryforward'];
    $lossofoneyear = $row['lossofoneyear'];
    $suggestedreading = $row['suggestedreading'];
    $venue = $row['venue'];
    $writtentest = $row['writtentest'];
    $internshipposition = $row['internshipposition'];
    $internshipduration = $row['internshipduration'];
    $regularposition = $row['regularposition'];
    $agreementbond = $row['agreementbond'];
    $writtentestaptitude = $row['writtentestaptitude'];
    $writtentesttechnical = $row['writtentesttechnical'];
    $technicalinterview  = $row['technicalinterview'];            
    $generalhrinterview = $row['generalhrinterview'];
    $specificskill = $row['specificskill'];
    $documentsrequired = $row['documentsrequired'];
    $duringinternship = $row['duringinternship']; 
    $domain_type = $row['domain_type'];
    $rvranking = $row['rvranking'];

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
     <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ minDate: -00, maxDate: "+1M +10D" });
    $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' });
  });

  function showInternshipDisplay(id)
  {
    if(id=='Yes')
    {
       $('#internshipIdOptions').show();
    }
    else
    {
       $('#internshipIdOptions').hide();
    }
  }
  function agreementbonds(id)
  {
    
    if(id=='Yes')
    {
       $('#agreementId').show();
    }
    else
    {
       $('#agreementId').hide();
    }
  }

  function fnshowfreshertab(id)
  {

    $('#experiencetab').hide();
       $('#freshertab').show();
       $('#fresherResumeTab').hide();
     if(id=='1')
    {
       $('#experiencetab').show();
       $('#freshertab').hide();
       $('#fresherResumeTab').hide();
    }
    
 if(id=='0')
    {
       $('#experiencetab').hide();
       $('#freshertab').hide();
       $('#fresherResumeTab').show();
    }
    

    if(id==2)
    {
       //$("#job_title").attr('readonly', false);
       $("#job_title").attr('disabled','disabled');
    }
    else
    {
    	    $('#job_title').attr('readonly', true);
  	
    }
  }

function fnMinimumQualification(mecutoff)
{
  $('#MECutOffDiv').show();
  if(mecutoff=='BE')
  {
    $('#MECutOffDiv').hide();
  }
}
   function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }
  </script>
  </head>

  <body>
      <form action="" method="POST"> 
     <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    <?php if($thankyouMessage==1){ ?>

    <div class="row">
Thank you " <?php echo $requiterName;?> " your request has been submited to the further processing if you do not hear for us in 2 days contact </div>

    <?php } else { ?>
    <div class="row">
        <div class="form-horizontal">

         <div class="form-group">
              <label class="col-sm-2 control-label"> Name</label>
              <div class="col-sm-3">
                         <input  class="form-control" type="text"  readonly="readonly" value='<?php echo $requiterName;?>'> 
              </div>      
           
              <label class="col-sm-2 control-label"> Company</label>
              <div class="col-sm-3">
                  <input type='text' class="form-control" readonly="readonly" value="<?php echo $company;?>">
                </div>          
            </div>
         <div class="form-group">
              <label class="col-sm-2 control-label"> Email</label>
              <div class="col-sm-3">
                         <input  class="form-control" type="text"  readonly="readonly" value='<?php echo $email;?>'> 
              </div>      
           
              <label class="col-sm-2 control-label"> Mobile</label>
              <div class="col-sm-3">
                  <input type='text' class="form-control" readonly="readonly" value="<?php echo $mobile;?>">
                </div>          
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Designation</label>
              <div class="col-sm-3">
                         <input  class="form-control" type="text"  readonly="readonly" value='<?php echo $designation;?>'> 
              </div>              
            </div>

 <div class="form-group" >
              <label class="col-sm-4 control-label">Recruitement is for </label>
              <div class="col-sm-8">
                      <label class="radio-inline">
                        <input type="radio" name="experience_type" id="experience_type" value="Fresher" onclick="fnshowfreshertab(0)">Graduate Intern
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="experience_type" id="experience_type" value="Experience"  checked="checked" onclick="fnshowfreshertab(2)">Skilled Graduate intern
                      </label> 
                      <label class="radio-inline">
                          <input type="radio" name="experience_type" id="experience_type" value="Experience" onclick="fnshowfreshertab(1)">Experienced Professionals
                      </label>        
              </div> 
               </div>
               <div class="form-group">
              <label class="col-sm-2 control-label">Job Code</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="1" id="jodCode" placeholder="Job Code, if not applicable ignore" name="jobCode"><?php echo $jobCode;?></textarea>
              </div>        
            </div>


<div id="freshertab">
             <div class="form-group">
              <label class="col-sm-2 control-label">Job Title</label>
              <div class="col-sm-10">
                <textarea class="form-control"  rows="1" id="jobTitle" placeholder="RTL Verification Engg" name="jobTitle"><?php echo $job_title;?></textarea>
              </div>        
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Skills Required</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="2"  id="jobDescription" placeholder="Perl Scripting, SV Test Bench Creation....," name="jobDescription"><?php echo $job_description;?></textarea>
              </div>        
            </div>  
            
            <div class="form-group">
             <label class="col-sm-2 control-label">Domain Specialisation</label>
              
              <div class="col-sm-4">
                 <select class="form-control" id="domain_type" name="domain_type">
<option value='0'>Not Applicable</option>
                      <?php for($i=0;$i<count($domain_typeArray);$i++){?>
                      <option value="<?php echo $domain_typeArray[$i]['idresumetype'];?>" <?php if($domain_typeArray[$i]['idresumetype']==$domain_type) {echo "Selected=selected";}?>>
                      <?php echo $domain_typeArray[$i]['resumetypename'];?> 
                      
                      </option>
                      <?php }?>
                      
                  </select>
                </div>  
                       
            </div>
           
            <div class="form-group">
              <label class="col-sm-2 control-label">Written test/ Interview date</label>
              <div class="col-sm-2">
                         <input  class="form-control" type="text" name='datepicker' id="datepicker" value="<?php echo $datepicker;?>" > 
              </div>      
           
              <label class="col-sm-2 control-label">No of Openings</label>
              <div class="col-sm-2">
                  <input type='text' class="form-control" onkeypress="return IsNumeric(event);" maxlength="2" id="noofopenings" name="noofopenings" value="10"
                        value="<?php echo $noofopenings;?>">
                </div>          
            </div>
           <div class="form-group">
              <label class="col-sm-2 control-label">Rv-Cutoff (%)</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="rvranking" name="rvranking" 
                        value="<?php echo $rvranking;?>">
              </div>  
                    <label class="col-sm-2 control-label">Min Qualification</label>
              <div class="col-sm-4">
                      <label class="radio-inline">
                        <input type="radio" name="minqualification" id="minqualification" value="BE"  onclick="fnMinimumQualification('BE')" <?php if($minqualification=='BE'){ echo "checked=checked";}?>> BE
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="minqualification" id="minqualification" value="ME" onclick="fnMinimumQualification('ME')" <?php if($minqualification=='ME'){ echo "checked=checked";}?>>ME
                      </label> 
                       <label class="radio-inline">
                          <input type="radio" name="minqualification" id="minqualification" value="BE/ME" onclick="fnMinimumQualification('BE/ME')" <?php if($minqualification=='BE/ME'){ echo "checked=checked";}?>>BE or ME
                      </label>        
              </div>      
            </div>
           
           
             <div class="form-group" id="MECutOffDiv">
              <label class="col-sm-2 control-label">ME Cut-off (%)</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="pgcutoff" name="pgcutoff" 
                        value="<?php echo $pgcutoff;?>">
              </div>  
              <label class="col-sm-2 control-label">ME Year of passing Between -</label>  
               <div class="col-sm-2">
                 <select class="form-control" id="pgpassoutyearFrom" name="pgpassoutyearFrom">
                 <option value=''>Not Applicable</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($pgpassoutyearFrom==$yeararray[$i]['years']){ echo "Selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>  
                <label class="col-sm-2 control-label">ME To Year</label>  
               <div class="col-sm-2">
                 <select class="form-control" id="pgpassoutyearTo" name="pgpassoutyearTo">
                 <option value=''>Not Applicable</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>"  <?php if($pgpassoutyearTo==$yeararray[$i]['years']){ echo "Selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>        
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">BE Cut-off (%)</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="degcutoff" name="degcutoff" 
                        value="<?php echo $degcutoff;?>">
              </div>  
              <label class="col-sm-2 control-label">BE Year of passing Between -</label>
               
                <div class="col-sm-2">
                 <select class="form-control" id="degpassoutyearFrom" name="degpassoutyearFrom">
                 <option value=''>Not Applicable</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>"  <?php if($degpassoutyearFrom==$yeararray[$i]['years']){ echo "Selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>  
                <label class="col-sm-2 control-label">BE Year To</label>
               
                <div class="col-sm-2">
                 <select class="form-control" id="degpassoutyearTo" name="degpassoutyearTo">
                 <option value=''>Not Applicable</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>"  <?php if($degpassoutyearTo==$yeararray[$i]['years']){ echo "Selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>  

            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">PUC Cut-off (%)</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="puccutoff" name="puccutoff" 
                        value="<?php echo $puccutoff;?>">
              </div> 

              <label class="col-sm-2 control-label">PUC Passout Year</label>
                <div class="col-sm-2">
                 <select class="form-control" id="pucpassoutyear" name="pucpassoutyear">
                 <option value=''>Not Applicable</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>"  <?php if($pucpassoutyear==$yeararray[$i]['years']){ echo "Selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>  

            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">SSLC Cut-off (%)</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="sslccutoff" name="sslccutoff" 
                        value="<?php echo $sslccutoff;?>">
              </div>  
              <label class="col-sm-2 control-label">SSLC Passout Year</label>
              
              <div class="col-sm-2">
                 <select class="form-control" id="sslcpassoutyear" name="sslcpassoutyear">
<option value='0'>Not Applicable</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>"  <?php if($sslcpassoutyear==$yeararray[$i]['years']){ echo "Selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>           
            </div>
           
         
            <div class="form-group">
              <label class="col-sm-2 control-label">Suggested Reading(If any Specify)</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="2" id="suggestedreading" Placeholder="Name of Text books to refer,.." name="suggestedreading"><?php echo $suggestedreading;?></textarea>
              </div>        
            </div> 

            <div class="form-group">
              <label class="col-sm-2 control-label">Google link to test location</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="1" id="venue" name="venue" Placeholder="Google link to the test location / Address"><?php echo $venue;?></textarea>
              </div>        
            </div> 

            <div class="form-group" style='display:none'>
              <label class="col-sm-4 control-label">Can hold written test at our campus?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="writtentest" id="writtentest" value="Yes" <?php if($writtentest=='Yes') { echo "checked=checked";}?> > Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="writtentest" id="writtentest" value="No" <?php if($writtentest=='No') { echo "checked=checked";}?> >No
                      </label>        
              </div> 
               </div>
            <div class="form-group" style='display:none'> 
               <label class="col-sm-4 control-label">Is hiring for internship position?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="internshipposition" id="internshipposition" value="Yes" onclick='showInternshipDisplay(this.value);'  <?php if($internshipposition=='Yes') { echo "checked=checked";}?>> Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="internshipposition" id="internshipposition" value="No" onclick='showInternshipDisplay(this.value);'  <?php if($internshipposition=='No') { echo "checked=checked";}?>>No
                      </label>        
              </div>

            </div>
<div id='internshipIdOptions' style='display:none'>
            <div class="form-group">
              <label class="col-sm-4 control-label">what is the duration of internship?</label>
              <div class="col-sm-3">
              <input type='text' class="form-control" id="internshipduration" name="internshipduration" 
                        value="" Placeholder="[0-9 Months]">
                         
              </div>          
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label">Are placement assured after internship?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="placementassured" id="placementassured" value="Yes" checked="checked"> Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="placementassured" id="placementassured" value="No" >No
                      </label>        
              </div> 
              </div>
            </div>
            <div class="form-group">  
               <label class="col-sm-3 control-label">Is hiring for Permanent ?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="regularposition" id="regularposition" value="Yes" <?php if($regularposition=='Yes') { echo "checked=checked";}?> > Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="regularposition" id="regularposition" value="No" <?php if($regularposition=='No') { echo "checked=checked";}?> >No
                      </label>        
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Is there any service agreement bond?</label>
              <div class="col-sm-2">
                      <label class="radio-inline">
                        <input type="radio" name="agreementbond" id="agreementbond" value="Yes" onclick='agreementbonds(this.value);' <?php if($agreementbond=='Yes'){ echo "checked=checked";}?> > Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="agreementbond" id="agreementbond" value="No" checked="checked" onclick='agreementbonds(this.value);' <?php if($agreementbond=='No'){ echo "checked=checked";}?> >No
                      </label>        
              </div> 
              <div id='agreementId' style='display:none'>
              <label class="col-sm-1 control-label">No of Years</label>
   
               <div class="col-sm-2">
                    <input type='text' class="form-control" id="agreementbondyears" name="agreementbondyears" 
                        value="<?php echo $agreementbondyears;?>">
              </div>  
                 <label class="col-sm-2 control-label">Bond Breakage Amount</label>
   
               <div class="col-sm-2">
                    <input type='text' class="form-control" id="bondBreakageAmount" name="bondBreakageAmount" 
                        value="<?php echo $bondBreakageAmount;?>">
              </div> 
              </div>       
            </div>             




            <div class="form-group"> 
               <label class="col-sm-3 control-label">Written test (Apptitude):</label>
                  <div class="col-sm-2">
                  <input type='text' class="form-control" id="writtentestaptitude" name="writtentestaptitude" 
                        value="<?php echo $writtentestaptitude;?>">      
                  </div>
            </div>
            <div class="form-group"> 
               <label class="col-sm-3 control-label">Written test (Technical):</label>
                  <div class="col-sm-2">
                     <input type='text' class="form-control" id="writtentesttechnical" name="writtentesttechnical" 
                        value="<?php echo $writtentesttechnical;?>"> 
                           
                  </div>
            </div>
             <div class="form-group"> 
               <label class="col-sm-3 control-label">Technical interview</label>
                  <div class="col-sm-2">
                   <input type='text' class="form-control" id="technicalinterview" name="technicalinterview" 
                        value="<?php echo $technicalinterview;?>">       
                  </div>
            </div>
             <div class="form-group"> 
               <label class="col-sm-3 control-label">General HR interview:</label>
                  <div class="col-sm-2">
                   <input type='text' class="form-control" id="generalhrinterview" name="generalhrinterview" 
                        value="<?php echo $generalhrinterview;?>">        
                  </div>
            </div>
<div style='background-color:Gainsboro;' onmouseover="">
            <div class="form-group" style="display:none">
              <label class="col-sm-2 control-label">Select Discipline</label>
              <div class="col-sm-10">
              <?php for($i=0;$i<count($resumetypearray);$i++){
               ?>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="resumetype[]" value="<?php echo $resumetypearray[$i]['idresumetype'];?>"> <?php echo $resumetypearray[$i]['resumetypename'];?>
                      </label>
                    <?php }?>
                    
              </div>          
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Branch of Enggineering</label>
              <div class="col-sm-10">
              <?php for($i=0;$i<count($departmentarray);$i++){
                if($departmentarray[$i]['iddepartment']!='999'){?>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="discipline[]" checked="checked" value="<?php echo $departmentarray[$i]['iddepartment'];?>"> <?php echo $departmentarray[$i]['department'];?>
                      </label>
                    <?php }}?>
                    
              </div>          
            </div>
</div>
 <div class="form-group" style="display:none">
              <label class="col-sm-2 control-label">DOCUMENTS REQUIRED TO BE SUBMITTED</label>
              <div class="col-sm-10">
              <?php for($i=0;$i<count($documentarray);$i++){
               ?>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="documentsrequired[]" value="documentsrequired[<?php echo $documentarray[$i]['iddocuments'];?>]"> <?php echo $documentarray[$i]['documentname'];?>
                      </label>
                    <?php }?>
                    
              </div>          
            </div>

            
           
            <div class="form-group">
            <h3 class="brd-btm mar-b20" style="font-size:16px;font-style:bold;">COMPENSATION/COST TO COMPANY (CTC)(INFORMATION WILL BE TREATED AS CONFIDENTIAL)</h3>
             <label class="col-sm-2 control-label">Monthly stipened during probation /Internship</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="duringinternship" name="duringinternship" 
                        value="<?php echo $duringinternship;?>">
              </div>

              <label class="col-sm-2 control-label">Monthly salary after confirmation of service</label>
              <div class="col-sm-2">
                    <input type='text' class="form-control" id="regularexmployment" name="regularemployment" 
                        value="<?php echo $regularemployment;?>">
              </div>          
            </div>
           
</div>

    </div>
    </div>
    <div id="experiencetab" style="display:none">
Sorry you have not subscribed for this service, Contact -Archana for
details Email:archana@nanochipsolutions.com"
</div>

<div id="fresherResumeTab" style="display:none">
We have  " <?php echo $fresherResumeCount;?>"  Resume in our Database do you want to send us,  Contact -Archana for
details Email:archana@nanochipsolutions.com"
</div>

    <div class="clearfix brd-top pad-t20">
        <button type="submit" class="btn btn-primary pull-right">SAVE</button>       
        <button type="submit" class="btn btn-default pull-right mar-r20">RESET</button>        
    </div> 
    <?php }?>
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
