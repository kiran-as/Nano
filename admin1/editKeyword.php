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

$domainKeywordSql = mysql_query("Select * 
                                 from tbl_resumekeywords 
                                 where idresumekeywords=$idresumetypekeyword");
while($row = mysql_fetch_assoc($domainKeywordSql))
{
   $idresumetypeselected = $row['idresumetype'];
   $keyWord = $row['keywords'];
}
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $pgDipCoursesArray[$i]['idresumetype'] = $row['idresumetype'];
    $pgDipCoursesArray[$i]['resumetypename'] = $row['resumetypename'];
    $i++;
}


if($_POST)
{
   
  $idresumetype = $_POST['idresumetype'];
  $keyWord = $_POST['keyWord'];

  mysql_query("update tbl_resumekeywords set idresumetype='$idresumetype',
                                              keywords = '$keyWord'
                where idresumekeywords='$idresumetypekeyword'");
  echo "<script>parent.location='domainKeyword.php'</script>";
  exit;
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
            <label class="col-sm-4 control-label">Domain Name</label>
            <div class="col-sm-8">
              <select class="form-control" id='idresumetype' name='idresumetype' value=''>
                  <?php for($i=0;$i<count($pgDipCoursesArray);$i++){ 
                    $idresumetype = $pgDipCoursesArray[$i]['idresumetype'];?>
                  <option value='<?php echo $idresumetype;?>' <?php if($idresumetypeselected==$idresumetype){ echo "selected=selected";}?>>
                  <?php echo $pgDipCoursesArray[$i]['resumetypename'];?></option>
              <?php }?>
                  </select> 
            </div>        
          </div>
           <div class="form-group">
            <label class="col-sm-4 control-label">Domain Keyword</label>
            <div class="col-sm-8">
                <input type="name" class="form-control" placeholder="" name='keyWord' id='keyWord' value="<?php echo $keyWord;?>">
            </div>        
          </div>
           <div class="form-group">
            <label class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>        
          </div>    
        </div>   
   
            
      </div>
     
  </div>
  </form>

  </body>
</html>
