<?php
include("application/conn.php");
include('include/sessioncheck.php');
include('include/settingmessage.php');

$idstudent=$_SESSION['idstudent'];
$profileInformationSql = mysql_query("SELECT * 
FROM  `tbl_companyproject` 
WHERE idstudent ='$idstudent' order by idcompanyproject asc");
$i=0;
while($row = mysql_fetch_assoc($profileInformationSql))
{
    $companyArrays[$i]['project_title'] = $row['project_title'];
    $companyArrays[$i]['company_name'] = $row['company_name'];
    $companyArrays[$i]['role'] = $row['role'];
    $companyArrays[$i]['tools_used'] = $row['tools_used'];
    $companyArrays[$i]['idcompanyproject'] = $row['idcompanyproject'];
    $companyArrays[$i]['start_date'] = $row['start_date'];
    $companyArrays[$i]['end_date'] = $row['end_date'];
    $companyArrays[$i]['designation'] = $row['designation'];

    $i++;
}

$profileInformationSql = mysql_query("Select * from tbl_student where idstudent=$idstudent");
while($rows = mysql_fetch_assoc($profileInformationSql))
{
    $current_company = $rows['current_company'];
}
$j=0;
for($i=count($companyArrays)-1;$i>=0;$i--) {
     $companyArray[$j]['project_title'] = $companyArrays[$i]['project_title'];
    $companyArray[$j]['company_name'] = $companyArrays[$i]['company_name'];

    if($current_company==$companyArrays[$i]['company_name']) {
    $companyArray[$j]['end_date'] = 'Till Present';

    } else {
    $companyArray[$j]['end_date'] = $companyArrays[$i]['end_date'];
  }
    $companyArray[$j]['role'] = $companyArrays[$i]['role'];
    $companyArray[$j]['tools_used'] = $companyArrays[$i]['tools_used'];
    $companyArray[$j]['idcompanyproject'] = $companyArrays[$i]['idcompanyproject'];
    $companyArray[$j]['start_date'] = $companyArrays[$i]['start_date'];
    $companyArray[$j]['designation'] = $companyArrays[$i]['designation'];
$j++;
}

/*echo "<pre/>";
print_R($companyArray);*/
//exit;
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
   
    <script>
    function nextButtonClick()
    {
      parent.location='careerDetails.php';
    }

    function fndeleteProject(id)
    {
      var cnf = confirm('Do you really want to Delete');
      if(cnf==true)
      {
        formData='idacademicproject='+id;   
        $.ajax({
        url : "delete_companyproject.php",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
         
          parent.location='companyProjects.php';
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        
        }
      });
      }
    }

    </script>
  </head>

  <body>
  <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
    <p class="alert alert-success txtc font16-sm-reg  label-info">Summary of yours Resume goes below</p>
   
       
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Company Name</th>
          <th>Designation</th>
          <th>Start Date</th>
          <th>End Date</th>
        </tr>
      </thead>
      <tbody>
          <?php $companyArrayss = array();
                for($i=0;$i<count($companyArray);$i++){
               $idcompanyproject = $companyArray[$i]['idcompanyproject'];
               $companyName = $companyArray[$i]['company_name'];
               //$companyArray[$i]['company_name'];
              
if (!array_key_exists($companyName,$companyArrayss)) {
                $companyArrayss[$companyName] = 1;
            ?>
              <tr>
          <td><?php echo $companyName;?></td>
          <td><?php echo $companyArray[$i]['designation'];?></td>
          <td><?php echo date('M-Y',strtotime($companyArray[$i]['start_date']));?></td>

          <?php if($companyArray[$i]['end_date']=='Till Present') {?>
          <td>Till Present</td>

          <?php } else {?>
          <td><?php echo date('M-Y',strtotime($companyArray[$i]['end_date']));?></td>


          <?php } ?>
        </tr> 
              
          <?php  }  }  ?>
                                                             
      </tbody>
    </table>                
                      
    </div> 

    <footer class="home-footer">
          <div class="container">            
            <p class="pad-t5 pad-xs-t20">Copyrights &copy; 2015 Nanochipsolutions</p>               
          </div>          
    </footer>  
 
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
