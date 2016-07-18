<?php
include('../application/conn.php');
error_reporting(-1);

$idstudent = $_GET['idStudent'];
$studentSql = mysql_query("Select career_objective from tbl_student where idstudent='$idstudent'");
while($rows = mysql_fetch_assoc($studentSql)) {

    $career_objective = $rows['career_objective'];
}


$companysql = mysql_query("Select * from tbl_companyproject where idstudent='$idstudent' order by idcompanyproject desc");
$i=0;
while($row = mysql_fetch_assoc($companysql))
{
    $companyArray[$i]['project_title'] = $row['project_title'];
    $companyArray[$i]['company_name'] = $row['company_name'];
    $companyArray[$i]['role'] = $row['role'];
    $companyArray[$i]['tools_used'] = $row['tools_used'];
    $companyArray[$i]['idcompanyproject'] = $row['idcompanyproject'];
    $companyArray[$i]['client'] = $row['client'];
    $companyArray[$i]['start_date'] = $row['start_date'];
    $companyArray[$i]['end_date'] = $row['end_date'];
    $i++;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nanochip Solutions - Domain Keyword</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

  <body>
            
   <section>      
       <div class="container-fluid pad-t20">
        <h3 class="nrb-primary-title mar-t5">Career Objective</h3>
        <?php echo $career_objective;?>

                <h3 class="nrb-primary-title  mar-t5"><br/>Experience Summary</h3>

			 <table class='table table-bordered'>
      <thead>
          <tr>
              <th>Company Name</th>
              <th>Client Name</th>
              <th>Project Title</th>
              <th>Project Time frame</th>
          </tr>
      </thead>
      <tbody>
         <tr>    
      <?php for($i=0;$i<count($companyArray);$i++) {?>
            <tr>
              <td><?php echo $companyArray[$i]['company_name'];?></td>
                            <td><?php echo $companyArray[$i]['client'];?></td>
              <td><?php echo $companyArray[$i]['project_title'];?></td>
              <td><?php echo $companyArray[$i]['start_date'];?>  -  <?php echo $companyArray[$i]['end_date'];?></td>
              
                            
            </tr>
            <?php }?>
     </tbody>
       
   </table>  
   </div>
</section>
</body>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
           $('#example').dataTable( {
                "bSort": false
              });
        } );
    </script> 

			
