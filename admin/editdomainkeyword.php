<?php
include('../application/conn.php');
error_reporting(-1);

$studentSql = mysql_query("Select * from tbl_resumetypes");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $pgDipCoursesArray[$i]['idresumetype'] = $row['idresumetype'];
    $pgDipCoursesArray[$i]['resumetypename'] = $row['resumetypename'];
    $i++;
}

$idresumetypekeyword = $_GET['idresumekeywords'];

if($_POST)
{
   

}
?>
	<link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#example').dataTable( {
		"order": [[ 3, "desc" ]]
	} );
} );

	</script>
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
  <?php include('../include/header.php');?>
    <?php include('include/nav.php');?>
        <form name='' method="POST" action="">
    <div class="container mar-t30">
       <div class="row">
        <div class="form-horizontal col-sm-6">
          <div class="form-group">
            <label class="col-sm-4 control-label">Course Name</label>
            <div class="col-sm-8">
              <select class="form-control" id='idpgdipcourses' name='idpgdipcourses' value=''>
                  <?php for($i=0;$i<count($pgDipCoursesArray);$i++){ 
                    $idresumetype = $pgDipCoursesArray[$i]['idresumetype'];?>
                  <option value='<?php echo $idresumetype;?>' >
                  <?php echo $pgDipCoursesArray[$i]['resumetypename'];?></option>
              <?php }?>
                  </select> 
            </div>        
          </div>
           <div class="form-group">
            <label class="col-sm-4 control-label">PUC % Cut off</label>
            <div class="col-sm-8">
                <input type="name" class="form-control" placeholder="" name='pucPercentage' id='pucPercentage'>
            </div>        
          </div>
          
           <div class="form-group">
            <label class="col-sm-4 control-label">Domain Name</label>
            <div class="col-sm-8">
              <select class="form-control" id='resumeTypes' name='resumeTypes' value=''>
                  <?php for($i=0;$i<count($resumeTypesArray);$i++){ 
                    $idresumetype = $resumeTypesArray[$i]['idresumetype'];?>
                  <option value='<?php echo $idresumetype;?>'>
                  <?php echo $resumeTypesArray[$i]['resumetypename'];?></option>
              <?php }?>
                  </select>                              
            </div>        
          </div>   
          <div class="form-group">
            <label class="col-sm-4 control-label">Student Type</label>
            <div class="col-sm-8">
                <label class="radio-inline">
                  <input type="radio" name='studentType' id='studentType' value='1'> RV - VLSI
                </label>
                <label class="radio-inline">
                  <input type="radio" name='studentType' id='studentType' value='0'> ALL
                </label>                
            </div>        
          </div>                                                                                                                                    
        </div>  
        <div class="form-horizontal col-sm-6">
         <div class="form-group">
            <label class="col-sm-4 control-label">SSLC cut off</label>
            <div class="col-sm-8">
                <input type="name" class="form-control" placeholder="" name='sslcPercentage' id='sslcPercentage'>
            </div>        
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Degree % Cut off</label>
            <div class="col-sm-8">
                <input type="name" class="form-control" placeholder="" name='degPercentage' id='degPercentage'>
            </div>        
          </div>  
         <div class="form-group">
            <label class="col-sm-4 control-label">Degree Passedout</label>
            <div class="col-sm-8">
              <select class="form-control" id="puc-passoutyear" name="puc-passoutyear">
                      <?php for($i=0;$i<count($yeararray);$i++){?>
                      <option value="<?php echo $yeararray[$i]['years'];?>" <?php if($pucpassoutyear==$yeararray[$i]['years']){ echo "selected=selected";}?>><?php echo $yeararray[$i]['years'];?></option>
                      <?php }?>
                      
                  </select>                              
            </div>        
          </div>   
          <div class="form-group">
            <label class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>        
          </div>                                                                                                                                    
        </div>           
        </div>   
    
           
      </div>
     
  </div>
  </form>

  </body>
</html>
