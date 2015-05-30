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
                    <input type='text' class="form-control" id="sslccutoff" name="sslccutoff" 
                        value="<?php echo $sslccutoff;?>">
              </div>  
              <label class="col-sm-2 control-label">SSLC Passout Year</label>
              
              <div class="col-sm-2">
                 <select class="form-control" id="sslcpassoutyear" name="sslcpassoutyear">
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
                    <input type='text' class="form-control" id="puccutoff" name="puccutoff" 
                        value="<?php echo $puccutoff;?>">
              </div> 

              <label class="col-sm-2 control-label">PUC Passout Year</label>
                <div class="col-sm-2">
                 <select class="form-control" id="pucpassoutyear" name="pucpassoutyear">
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
                    <input type='text' class="form-control" id="degcutoff" name="degcutoff" 
                        value="<?php echo $degcutoff;?>">
              </div>  
              <label class="col-sm-2 control-label">BE Year From</label>
               
                <div class="col-sm-2">
                 <select class="form-control" id="degpassoutyearFrom" name="degpassoutyearFrom">
                 <option value=''>Not Applicable</option>
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>"<?php if($degpassoutyearFrom==$yeararray[$i]['years']) { echo "Selected=selected";}?>
                      ><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>
                </div>  
                <label class="col-sm-2 control-label">BE Year To</label>
               
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
                    <input type='text' class="form-control" id="pgcutoff" name="pgcutoff" 
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
              <label class="col-sm-2 control-label">Select Discipline</label>
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
                        <input type="checkbox" name="resumetype[]" 
                        value="resumetyp[<?php echo $resumetypearray[$i]['idresumetype'];?>]"
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
                        <input type="checkbox" name="discipline[]" value="<?php echo $departmentarray[$i]['iddepartment'];?>"  <?php echo $checked;?>> <?php echo $departmentarray[$i]['department'];?>
                      </label>
                    <?php }}?>
                    
              </div>          
            </div>

           

    </div>

    <div class="clearfix brd-top pad-t20">
        <button type="submit" class="btn btn-primary pull-right">SAVE</button>       
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
