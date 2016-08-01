<?php
include('application/conn.php');
include('include/sessioncheck.php');
include('include/settingmessage.php');
include('include/year.php');

$idstudent = $_SESSION['idstudent'];
if($_POST)
{


  $working_currently = $_POST['working_currently'];
     $currentcompanyfromyear = $_POST['currentcompanyfromyear'];
     $currentcompanyfrommonth = $_POST['currentcompanyfrommonth'];
     $currentdesignation = str_replace("'","&#39;",$_POST['currentdesignation']);
     $currentcompany = str_replace("'","&#39;",$_POST['currentcompany']);
     $currentsalary = str_replace("'","&#39;",$_POST['currentsalary']);
     $currentlocation = str_replace("'","&#39;",$_POST['currentlocation']);
     $expecteddesignation = str_replace("'","&#39;",$_POST['expecteddesignation']);
     $expectedsalary = str_replace("'","&#39;",$_POST['expectedsalary']);
     $expectedlocation = str_replace("'","&#39;",$_POST['expectedlocation']);
     $previousCmpExp = $_POST['previousCmpExp'];


     mysql_query("Update tbl_student set 
      current_salary='$currentsalary', 
      working_currently='$working_currently',
      current_designation='$currentdesignation',
      current_company='$currentcompany',
      current_location='$currentlocation',
      expected_salary='$expectedsalary',
      expected_designation='$expecteddesignation',
      expected_location='$expectedlocation',
      previousexp='$previousCmpExp',
       updated_date = '$updated_date',
       currentcompanyfrommonth = '$currentcompanyfrommonth',
       currentcompanyfromyear = '$currentcompanyfromyear'

      where idstudent='$idstudent'");

    mysql_query("Delete from tbl_achievements where idstudent='$idstudent'");
    mysql_query("Delete from tbl_corecompetancy where idstudent='$idstudent'");
        mysql_query("Delete from tbl_companies where idstudent='$idstudent'");

    $career_objective = str_replace("'","&#39;",$_POST['career_objective']);
    mysql_query("Update tbl_student set career_objective='$career_objective' where idstudent='$idstudent'");

    for($i=0;$i<3;$i++)
    {
        $achievements = $_POST['achievments'][$i];
        if($achievements!='')
        {
            mysql_query("Insert into tbl_achievements(achievements,idstudent)"
                    . "value('$achievements','$idstudent')");
        }
    }

    for($i=0;$i<10;$i++)
    {
        $corecompetancy = $_POST['corecompetancy'][$i];
        if($corecompetancy!='')
        {
            mysql_query("Insert into tbl_corecompetancy(corecompetancy,idstudent)"
                    . "value('$corecompetancy','$idstudent')");
        }
    }
   
    for($i=0;$i<count($_POST['oldCompanyName']);$i++)
    {

      $oldCompanyName = $_POST['oldCompanyName'][$i];
      $oldDesignation = $_POST['oldDesignation'][$i];
      $oldToYear = $_POST['oldToYear'][$i];
      $oldFromYear = $_POST['oldFromYear'][$i];
      $oldFromMonth = $_POST['oldFromMonth'][$i];
      $oldToMonth = $_POST['oldToMonth'][$i];
      if(!empty($oldCompanyName))
      {
      mysql_query("Insert into tbl_companies (companyname,designation,
          frommonth,tomonth,fromyear,
          toyear,idstudent) values ('$oldCompanyName','$oldDesignation',
          '$oldFromMonth','$oldToMonth','$oldFromYear',
          '$oldToYear','$idstudent')");
      }
    }


      $oldCompanyName = $_POST['oldCompanyName0'];
      $oldDesignation = $_POST['oldDesignation0'];
      $oldToYear = $_POST['oldToYear0'];
      $oldFromYear = $_POST['oldFromYear0'];
      $oldFromMonth = $_POST['oldFromMonth0'];
      $oldToMonth = $_POST['oldToMonth0'];
      if(!empty($oldCompanyName) && (!empty($oldDesignation))  && (!empty($oldCompanyName))  && (!empty($oldCompanyName)) && (!empty($oldCompanyName))  && (!empty($oldCompanyName)))
      {
      mysql_query("Insert into tbl_companies (companyname,designation,
          frommonth,tomonth,fromyear,
          toyear,idstudent) values ('$oldCompanyName','$oldDesignation',
          '$oldFromMonth','$oldToMonth','$oldFromYear',
          '$oldToYear','$idstudent')");
      }

    echo "<script>parent.location='viewResume.php'</script>";
    exit;
}

$profileInformationSql = mysql_query("Select * from tbl_student where idstudent=$idstudent");
while($row = mysql_fetch_assoc($profileInformationSql))
{
    if(empty($row['working_currently'])) {
      $row['working_currently'] = 'No';
    }
    $working_currently = $row['working_currently'];
    $career_objective = $row['career_objective'];
    $currentsalary = $row['current_salary'];
    $currentdesignation = $row['current_designation'];
    $currentcompany = $row['current_company'];
    $currentlocation = $row['current_location'];
    $expectedsalary = $row['expected_salary'];
    $expectedlocation = $row['expected_location'];
    $expecteddesignation = $row['expected_designation'];   
    $experience = $row['experience'];     
    $previousexp = $row['previousexp']; 
     $currentcompanyfromyear = $row['currentcompanyfromyear'];
     $currentcompanyfrommonth = $row['currentcompanyfrommonth'];                         
}
if($previousexp!='Yes')
{
  $previousexp = 'No';
}
$achievementSql = mysql_query("Select * from tbl_achievements where idstudent=$idstudent");
$achievementsArray = array();
$i=0;
while($row = mysql_fetch_assoc($achievementSql))
{
    $achievementsArray[$i]['achievements'] = $row['achievements'];
    $i++;
}

$coreCompetancySql = mysql_query("Select * from tbl_corecompetancy where idstudent=$idstudent");
$corecompetancyArray = array();
$i=0;
while($row = mysql_fetch_assoc($coreCompetancySql))
{
    $corecompetancyArray[$i]['corecompetancy'] = $row['corecompetancy'];
    $i++;
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
 <script src="js/jquery-1.11.0.min.js"></script>
<script src="js/customised_validation.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script type='text/JavaScript'>
 
 $(document).ready(function() {

  var working_currently = "<?php echo $working_currently;?>";
   if(working_currently=='No'){
     $('#currentCompanyDivId').hide();
  } else {
     $('#currentCompanyDivId').show();
  }
   var experience = "<?php echo $experience;?>";
   if(experience=='Fresher')
   {
      $('#experienceform').hide();
   }
   var previousCmpExp = "<?php echo $previousexp;?>";
   if(previousCmpExp=='Yes')
   {
      $('#previousCompanyDetailsId').show();
   }
   else
   {
      $('#previousCompanyDetailsId').hide();
   }
      $('#saveAndContinue').click(function() {
                
                $('#careerdetails').submit();
            });
            $("#careerdetails").validate({
                // Specify the validation rules
                rules: {
                     currentcompany: "required",
                     currentsalary: "required",
                    currentdesignation: "required",
                    currentlocation: "required",
                    expecteddesignation: "required",
                    expectedsalary: "required",
                    expectedlocation: "required",       
                                                  
                },
                // Specify the validation error messages
                messages: {
                     currentcompany: "Please enter Current Company Name",                  
                     currentsalary: "Please enter Current Salary",
                    currentdesignation: "Please enter Current Designation",
                    currentlocation: "Please enter Current Location",
                    expecteddesignation: "Please enter Expected Designation",
                    expectedsalary: "Please enter Expected Salary",
                    expectedlocation: "Please enter Expected Location",
                   
                }
            });
 });


</script>

<script type="text/JavaScript">
function fnDeleteCompanyDetails(id)
{
  var cnf = confirm("Do you really want to delete?");
  if(cnf==true)
    {
    formData +='&idcompanies='+id; 
    $.ajax({
        url : "ajax/ajax_addToCompany.php",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
          
          document.getElementById('ajaxDataOfCompanies').innerHTML = data;
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        
        }
      });
  }
}

function fnAddCompanyDetails()
{
   var oldCompanyName = $('#oldCompanyName').val();
   flag = 0;
   if(oldCompanyName=='')
   {
      alert('Enter Company Name');
      flag =1;
   }

   var oldDesignation = $('#oldDesignation').val();
   if(oldDesignation=='')
   {
      alert('Enter Designation Name');
      flag =1;
   }

   var oldFromYear = $('#oldFromYear').val();
   if(oldFromYear=='')
   {
      alert('Enter From Month , Year');
      flag =1;
   }

   var oldToYear = $('#oldToYear').val();
   if(oldToYear=='')
   {
      alert('Enter To Month , Name');
      flag =1;
   }
var oldFromMonth = $('#oldFromMonth').val();
var oldToMonth = $('#oldToMonth').val();

   if(flag==0)
   {
      
        formData='oldCompanyName='+oldCompanyName;
        formData +='&oldDesignation='+oldDesignation;  
        formData +='&oldToYear='+oldToYear; 
        formData +='&oldFromYear='+oldFromYear; 
        formData +='&oldFromMonth='+oldFromMonth; 
        formData +='&oldToMonth='+oldToMonth;  
        $.ajax({
        url : "ajax/ajax_addToCompany.php",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
         
          document.getElementById('ajaxDataOfCompanies').innerHTML = data;
          $('#oldCompanyName').val(' ');
          $('#oldDesignation').val(' ');
          $('#oldFromMonth').val(' ');
          $('#oldFromYear').val(' ');
          $('#oldToMonth').val(' ');
          $('#oldToYear').val(' ');

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        
        }
      });
   }
}

function fnDisplay()
{
  formData ="";  
        $.ajax({
        url : "ajax/ajax_addToCompany.php",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {

          document.getElementById('ajaxDataOfCompanies').innerHTML = data;
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        
        }
      });
}
function fnShowOldCompanyDetails(id)
{
   if(id=='No')
   {
     $('#previousCompanyDetailsId').hide();
   }
   else
   {
    $('#previousCompanyDetailsId').show();
   }
}

function fnHideCurrentCompany(value){
  if(value=='No'){
     $('#currentCompanyDivId').hide();
  } else {
     $('#currentCompanyDivId').show();
  }
}
</script>
  </head>

  <body onload="fnDisplay();">
   <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    
<form name="" method="POST" id='careerdetails'>
<div class="container mar-t30">
     <p class="alert alert-success txtc font16-sm-reg  label-info"><?php echo $otherdetailpage;?></p>

      <div class="row" id='experienceform'>
        <div class="form-horizontal col-sm-6">
                   <h3 class="brd-btm mar-b20">Current Company Details</h3>
          <div class="form-group">
                <label class="col-sm-5 control-label">Are you Currently working?<span class="error-text">*</span></label>
                <div class="col-sm-7">
                    <label class="radio-inline">
                      <input type="radio" name="working_currently" id="working_currently" value="Yes" <?php if($working_currently=='Yes'){ echo "checked=checked";};?> onclick="fnHideCurrentCompany(this.value)";> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="working_currently" id="working_currently" value="No" <?php if($working_currently=='No'){ echo "checked=checked";};?> onclick="fnHideCurrentCompany(this.value)";> No
                    </label>        
                </div>
              </div>
              <div id="currentCompanyDivId" style="display:">
          <div class="form-group">
          <label class="col-sm-5 control-label">Current Company Name<span class="error-text">*</span></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" placeholder="Current Company" id="currentcompany" name="currentcompany" value="<?php echo $currentcompany;?>">
            </div>        
          </div>
          <div class="form-group">
          <label class="col-sm-5 control-label">Current Designation <span class="error-text">*</span></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" placeholder="Current Designation" id="currentdesignation" name="currentdesignation" value="<?php echo $currentdesignation;?>">
            </div>        
          </div>
          <div class="form-group">
          <label class="col-sm-5 control-label">Current CTC(Lacks/Annum) <span class="error-text">*</span></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" placeholder="Current Package" id="currentsalary" name="currentsalary" value="<?php echo $currentsalary;?>">
            </div>        
          </div>
          <div class="form-group">
          <label class="col-sm-5 control-label">Current Location <span class="error-text">*</span></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" placeholder="Current Location" id="currentlocation" name="currentlocation" value="<?php echo $currentlocation;?>">
            </div>        
          </div>
          <div class="form-group">
                    <label class="col-sm-5 control-label">Joining Month and Year<span class="error-text">*</span></label>

          <div class="col-sm-2">
               <select class="form-control" placeholder="From Year" style="width:84px;"id="currentcompanyfrommonth" name="currentcompanyfrommonth">
                  <option value=" ">Select</option>
                  <option value="1" <?php if($currentcompanyfrommonth=='1'){ echo "selected=selected";}?>>Jan</option>
                  <option value="2" <?php if($currentcompanyfrommonth=='2'){ echo "selected=selected";}?>>Feb</option>
                  <option value="3" <?php if($currentcompanyfrommonth=='3'){ echo "selected=selected";}?>>March</option>
                  <option value="4" <?php if($currentcompanyfrommonth=='4'){ echo "selected=selected";}?>>April</option>
                  <option value="5" <?php if($currentcompanyfrommonth=='5'){ echo "selected=selected";}?>>May</option>
                  <option value="6" <?php if($currentcompanyfrommonth=='6'){ echo "selected=selected";}?>>June</option>
                  <option value="7" <?php if($currentcompanyfrommonth=='7'){ echo "selected=selected";}?>>July</option>
                  <option value="8" <?php if($currentcompanyfrommonth=='8'){ echo "selected=selected";}?>>Aug</option>
                  <option value="9" <?php if($currentcompanyfrommonth=='9'){ echo "selected=selected";}?>>Sep</option>
                  <option value="10" <?php if($currentcompanyfrommonth=='10'){ echo "selected=selected";}?>>Oct</option>
                  <option value="11" <?php if($currentcompanyfrommonth=='11'){ echo "selected=selected";}?>>Nov</option>
                  <option value="12" <?php if($currentcompanyfrommonth=='12'){ echo "selected=selected";}?>>Dec</option>
               </select>
             </div>
             <div class="col-sm-2">
                <select class="form-control" id="currentcompanyfromyear" style="width:84px;" name="currentcompanyfromyear">
                      <option value="">Select</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($currentcompanyfromyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
             </div>
          </div>
          </div>
        </div>
       <div class="form-horizontal col-sm-6">
                  <h3 class="brd-btm mar-b20">Expected Compensation / Job Location</h3>
<div class="form-group">

          <label class="col-sm-5 control-label">Prefered work Location<span class="error-text">*</span></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" placeholder="Expected Location" id="expectedlocation" name="expectedlocation" value="<?php echo $expectedlocation;?>">
            </div>        
          </div>
          <div class="form-group">
          <label class="col-sm-5 control-label">Prefered Designation<span class="error-text">*</span></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" placeholder="Expected Desigantion" id="expecteddesignation" name="expecteddesignation" value="<?php echo $expecteddesignation;?>">
            </div>        
          </div>
          <div class="form-group">
          <label class="col-sm-5 control-label">Expected CTC(Lacks/Annum)<span class="error-text">*</span></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" placeholder="Expected Salary" id="expectedsalary" name="expectedsalary" value="<?php echo $expectedsalary;?>">
            </div>        
          </div>
          
        </div>
      </div>
<!--
      <h3 class="brd-btm mar-b20">Summary of work experience</h3>
      <div class="form-group">
    <label class="radio-inline pad-l0">
      List the company names and other details below, if applicable?
    </label>      
        <label class="radio-inline">
              <input type="radio" name="previousCmpExp" id="previousCmpExp" value="Yes" onclick="fnShowOldCompanyDetails(this.value)" <?php if($previousexp=='Yes'){ echo "checked=checked";};?>> Yes
    </label>      
    <label class="radio-inline">
              <input type="radio" name="previousCmpExp" id="previousCmpExp" value="No" onclick="fnShowOldCompanyDetails(this.value);"  <?php if($previousexp=='No'){ echo "checked=checked";};?>> No
    </label>
  </div>
  <div class="clearfix row">
   <div id='previousCompanyDetailsId'>
<div class="form-group col-sm-3">
 <label >
     Company Name
    </label>             </div>
             <div class="form-group col-sm-3">
<label >
     Designation as on last day
    </label>              </div>
             <div class="form-group col-sm-2">
<label >
     From - Month &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Year
    </label>             </div>
            
            <div class="form-group col-sm-2">
<label >
     To - Month &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Year
    </label>             </div>
            
              <div class='clearfix row'>
                          <div id="ajaxDataOfCompanies"></div>
             <div class="form-group col-sm-3">
               <input type="text" class="form-control" placeholder="Company Name" id="oldCompanyName" name="oldCompanyName0" value="">
             </div>
             <div class="form-group col-sm-3">
               <input type="text" class="form-control" placeholder="Designation" id="oldDesignation" name="oldDesignation0" value="">
             </div>
             <div class="form-group col-sm-1">
               <select class="form-control" placeholder="From Year" style="width:84px;"id="oldFromMonth" name="oldFromMonth0">
                  <option value=" ">Select</option>
                  <option value="1">Jan</option>
                  <option value="2">Feb</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">Aug</option>
                  <option value="9">Sep</option>
                  <option value="10">Oct</option>
                  <option value="11">Nov</option>
                  <option value="12">Dec</option>
               </select>
             </div>
             <div class="form-group col-sm-1">
                <select class="form-control" id="oldFromYear" style="width:84px;" name="oldFromYear0">
                      <option value="">Select</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($degpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
             </div>
             <div class="form-group col-sm-1">
                <select class="form-control" placeholder="From Year" style="width:84px;"id="oldToMonth" name="oldToMonth0">
                  <option value=" ">Select</option>
                  <option value="1">Jan</option>
                  <option value="2">Feb</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">Aug</option>
                  <option value="9">Sep</option>
                  <option value="10">Oct</option>
                  <option value="11">Nov</option>
                  <option value="12">Dec</option>
               </select>
             </div>
             <div class="form-group col-sm-1">
              <select class="form-control" id="oldToYear" style="width:84px;" name="oldToYear0">
                      <option value="">Select</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($degpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
             </div>
             <div>
              <button type="button" id="addButton" class="btn btn-primary" onclick="fnAddCompanyDetails();">Add</button>                      

             </div>
   </div>
   </div>

 -->
  <div class="form-group">
                    <h3 class="brd-btm mar-b20">Core Competancy / Summary of Skills</h3>
 <!--    <input type="text" class="form-control mar-b15" rows="1"  Placeholder="List your core competancy in a single line within 150 Characters" maxlength="150" name="corecompetancy[]" onkeyup="countCharbannertext(this,'corecompetancy0_countlabel','250')" value="<?php echo $corecompetancyArray[0]['corecompetancy'];?>" />
    <textarea  class="form-control mar-b15" rows="1"  Placeholder="List your core competancy in a single line within 120 Characters" maxlength="120" name="corecompetancy[]" ><?php echo $corecompetancyArray[1]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="1"  Placeholder="List your core competancy in a single line within 120 Characters" maxlength="120" name="corecompetancy[]" ><?php echo $corecompetancyArray[2]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="1"  Placeholder="List your core competancy in a single line within 120 Characters" maxlength="120" name="corecompetancy[]" ><?php echo $corecompetancyArray[3]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="1"  Placeholder="List your core competancy in a single line within 120 Characters" maxlength="120" name="corecompetancy[]" ><?php echo $corecompetancyArray[4]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="1"  Placeholder="List your core competancy in a single line within 120 Characters" maxlength="120" name="corecompetancy[]" ><?php echo $corecompetancyArray[5]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="1"  Placeholder="List your core competancy in a single line within 120 Characters" maxlength="120" name="corecompetancy[]" ><?php echo $corecompetancyArray[6]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="1"  Placeholder="List your core competancy in a single line within 120 Characters" maxlength="120" name="corecompetancy[]" ><?php echo $corecompetancyArray[7]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="1"  Placeholder="List your core competancy in a single line within 120 Characters" maxlength="120" name="corecompetancy[]" ><?php echo $corecompetancyArray[8]['corecompetancy'];?></textarea>
    <textarea  class="form-control mar-b15" rows="1"  Placeholder="List your core competancy in a single line within 120 Characters" maxlength="120" name="corecompetancy[]" ><?php echo $corecompetancyArray[9]['corecompetancy'];?></textarea>
   -->
  </div>  
 
 <div class="form-group">
  <div class="col-sm-12">
    <textarea  class="form-control" rows="1"  Placeholder="Eg Proficiency in AutoCAD Electrical, Solid Edge Package" maxlength="170" name="corecompetancy[]"  onkeyup="countCharbannertext(this,'corecompetancy0_countlabel','170')" ><?php echo $corecompetancyArray[0]['corecompetancy'];?></textarea>
      <span class='info-text' id='corecompetancy0_countlabel'>Maximum 170 Chars (with spaces)

    </div>        
  </div>
 <div class="form-group">
  <div class="col-sm-12">
    <textarea  class="form-control" rows="1"  Placeholder="List your core competancy in a single line within 170 Characters" maxlength="170" name="corecompetancy[]"  onkeyup="countCharbannertext(this,'corecompetancy1_countlabel','170')" ><?php echo $corecompetancyArray[1]['corecompetancy'];?></textarea>
      <span class='info-text' id='corecompetancy1_countlabel'>Maximum 170 Chars (with spaces)

    </div>        
  </div>
     <div class="form-group">
  <div class="col-sm-12">
    <textarea  class="form-control" rows="1"  Placeholder="List your core competancy in a single line within 170 Characters" maxlength="170" name="corecompetancy[]"  onkeyup="countCharbannertext(this,'corecompetancy2_countlabel','170')" ><?php echo $corecompetancyArray[2]['corecompetancy'];?></textarea>
      <span class='info-text' id='corecompetancy2_countlabel'>Maximum 170 Chars (with spaces)

    </div>        
  </div>
     <div class="form-group">
  <div class="col-sm-12">
    <textarea  class="form-control" rows="1"  Placeholder="List your core competancy in a single line within 170 Characters" maxlength="170" name="corecompetancy[]"  onkeyup="countCharbannertext(this,'corecompetancy3_countlabel','170')" ><?php echo $corecompetancyArray[3]['corecompetancy'];?></textarea>
      <span class='info-text' id='corecompetancy3_countlabel'>Maximum 170 Chars (with spaces)

    </div>        
  </div>
       <div class="form-group">
  <div class="col-sm-12">
    <textarea  class="form-control" rows="1"  Placeholder="List your core competancy in a single line within 170 Characters" maxlength="170" name="corecompetancy[]"  onkeyup="countCharbannertext(this,'corecompetancy4_countlabel','170')" ><?php echo $corecompetancyArray[4]['corecompetancy'];?></textarea>
      <span class='info-text' id='corecompetancy4_countlabel'>Maximum 170 Chars (with spaces)

    </div>        
  </div>
       <div class="form-group">
  <div class="col-sm-12">
    <textarea  class="form-control" rows="1"  Placeholder="List your core competancy in a single line within 170 Characters" maxlength="170" name="corecompetancy[]"  onkeyup="countCharbannertext(this,'corecompetancy5_countlabel','170')" ><?php echo $corecompetancyArray[5]['corecompetancy'];?></textarea>
      <span class='info-text' id='corecompetancy5_countlabel'>Maximum 170 Chars (with spaces)

    </div>        
  </div>
       <div class="form-group">
  <div class="col-sm-12">
    <textarea  class="form-control" rows="1"  Placeholder="List your core competancy in a single line within 170 Characters" maxlength="170" name="corecompetancy[]"  onkeyup="countCharbannertext(this,'corecompetancy6_countlabel','170')" ><?php echo $corecompetancyArray[6]['corecompetancy'];?></textarea>
      <span class='info-text' id='corecompetancy6_countlabel'>Maximum 170 Chars (with spaces)

    </div>        
  </div>
       <div class="form-group">
  <div class="col-sm-12">
    <textarea  class="form-control" rows="1"  Placeholder="List your core competancy in a single line within 170 Characters" maxlength="170" name="corecompetancy[]"  onkeyup="countCharbannertext(this,'corecompetancy7_countlabel','170')" ><?php echo $corecompetancyArray[7]['corecompetancy'];?></textarea>
      <span class='info-text' id='corecompetancy7_countlabel'>Maximum 170 Chars (with spaces)

    </div>        
  </div>
       <div class="form-group">
  <div class="col-sm-12">
    <textarea  class="form-control" rows="1"  Placeholder="List your core competancy in a single line within 170 Characters" maxlength="170" name="corecompetancy[]"  onkeyup="countCharbannertext(this,'corecompetancy8_countlabel','170')" ><?php echo $corecompetancyArray[8]['corecompetancy'];?></textarea>
      <span class='info-text' id='corecompetancy8_countlabel'>Maximum 170 Chars (with spaces)

    </div>        
  </div>
    <div class="form-group">
  <div class="col-sm-12">
    <textarea  class="form-control" rows="1"  Placeholder="List your core competancy in a single line within 170 Characters" maxlength="170" name="corecompetancy[]"  onkeyup="countCharbannertext(this,'corecompetancy9_countlabel','170')" ><?php echo $corecompetancyArray[9]['corecompetancy'];?></textarea>
      <span class='info-text' id='corecompetancy9_countlabel'>Maximum 170 Chars (with spaces)

    </div>        
  </div>

   
  <div class="form-group">
    <label><br/>Career Objective</label>
    <textarea  class="form-control" rows="3" id="career_objective" name="career_objective" Placeholder="Describe the career objective" onkeyup="countCharbannertext(this,'career_objective_countlabel','250')"  ;><?php echo $career_objective;?></textarea>
                     <span class='info-text' id='career_objective_countlabel'>Maximum 250 Chars (with spaces)
  </div>  
  <div class="form-group">
    <label>Significant Achievements</label>
    (120 characters per line)
    <textarea  class="form-control mar-b15" rows="1"  name="achievments[]" Placeholder="List IEEE publication or paper publications"  Maxlength="120"><?php echo $achievementsArray[0]['achievements'];?></textarea>
    <textarea  class="form-control mar-b15" rows="1"  name="achievments[]" Placeholder="Any patents in your name"  Maxlength="120"><?php echo $achievementsArray[1]['achievements'];?></textarea>
    <textarea  class="form-control mar-b15" rows="1"  name="achievments[]" Placeholder="LIst Additional skill development courses taken by you" Maxlength="120"><?php echo $achievementsArray[2]['achievements'];?></textarea>
  </div>    
                        
    <div class="clearfix brd-top pad-t20">
        <button type="submit" id="saveAndContinue" class="btn btn-primary pull-right">SUBMIT</button>                      
    </div>                   
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
  
  </body>
</html>
