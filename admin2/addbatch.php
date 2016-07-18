<?php
include('../application/conn.php');
error_reporting(-1);
if($_POST)
{
   

  $keyWordsArray = explode(",", $_POST['keyWord']);
  for($i=0;$i<count($keyWordsArray);$i++)
  {
      $keyWord = trim($keyWordsArray[$i]);
      if($keyWord=='')
      {

      }
      else
      {
     mysql_query("Insert into tbl_batch (batchname)
          values ('$keyWord')");
   }
  }
 
  echo "<script>parent.location='batchlist.php'</script>";
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
    <link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
  <body>
    <?php include('include/nav.php');?>
        <form name='' method="POST" action="">
    <section class="nrb-rhs-container">      
       <div class="container-fluid pad-t20">
        <h3 class="nrb-primary-title pad-b10 mar-t5">Add Batch</h3>
        
   
       <div class="row">
        <div class="form-horizontal col-sm-6">
           <div class="form-group">
            <label class="col-sm-4 control-label">Batch Name</label>
            <div class="col-sm-8">
                <input type="name" class="form-control" placeholder="" name='keyWord' id='keyWord'> <p class="help-block">Enter comma(",") seperated for multiple batches, Eg: 1ADADB25, 1ADADB26, 1ADADB27</p>
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

  </div>
  </section>
  </form>

  </body>
</html>
