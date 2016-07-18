<?php
include('../application/conn.php');
mysql_query('truncate table temp_collegewise');
$CollegeSql = mysql_query("Select deg_schoolname as deg_schoolname,
                                  deg_university,
                                  deg_state
                            from tbl_student where deg_schoolname!='' group by deg_schoolname");

$i=0;
$collegeArray = array();
while($row = mysql_fetch_assoc($CollegeSql))
{
    $degSchoolName = $row['deg_schoolname'];
    $studentSql = mysql_query("Select firstname, lastname,
                                mobile, email
                                from tbl_student
                                where deg_schoolname='$degSchoolName'");

      $studentName = '';
      $mobile = '';
      $email ='';
      $cnt = 0;
      while($rows = mysql_fetch_assoc($studentSql))
      {
           $cnt++;
          $studentName = $studentName.':'.$rows['firstname'].' '.$rows['lastname'];
          $mobile = $mobile.':'.$rows['mobile'];
          $email = $email.':'.$rows['email'];
      }     
      $studentName = str_replace("&#39;","'",$studentName);
      $mobile = str_replace("&#39;","'",$mobile);
      $email = str_replace("&#39;","'",$email);
    $deg_schoolname = str_replace("&#39;","'",$row['deg_schoolname']);
    $deg_university = str_replace("&#39;","'",$row['deg_university']);
    $deg_state = str_replace("&#39;","'",$row['deg_state']);
    $studentSqls = "Insert into temp_collegewise
    (college_name,college_state,college_university,
      student_name, student_email, student_mobile,counts) VALUES 
    ('$deg_schoolname','$deg_state','$deg_university',
      '$studentName','$email','$mobile','$cnt')";

      mysql_query($studentSqls);
}

$collegewiseSql = "Select * from temp_collegewise";
   
  $result = mysql_query($collegewiseSql);
  header('Content-Type: application/vnd.ms-excel'); //define header info for browser
  header('Content-Disposition: attachment; filename=College_wise '.date('Ymd').'.xls');
  header('Pragma: no-cache');
  header('Expires: 0');
  
  
      echo "COLLEGE NAME"."\t".
      "COLLEGE UNIVERSITY"."\t".
       "COLLEGE STATE"."\t".
       "TOTAL COUNT"."\t".
       "STUDENT NAME (seperated by :)"."\t".
       "STUDENT MOBILE (seperated by :)"."\t".
      "STUDENT EMAIL (seperated by :)"."\t";
      
      print("\n");
      
    while($imp=mysql_fetch_array($result))
        {
          $college_nameArray = explode (',',$imp['college_name']);
                      $imp[college_name] = $college_nameArray[0];

                      $college_universityArray = explode (',',$imp['college_university']);
                      $imp[college_university] = $college_universityArray[0];
  $output=str_replace("\t", "t",trim(stripslashes($imp[college_name])))."\t".
  str_replace("\t", "t",trim(stripslashes($imp[college_university])))."\t".
  str_replace("\t", "t",trim(stripslashes($imp[college_state])))."\t".
    str_replace("\t", "t",trim(stripslashes($imp[counts])))."\t".
  str_replace("\t", "t",trim(stripslashes($imp[student_name])))."\t".
  str_replace("\t", "t",trim(stripslashes($imp[student_mobile])))."\t".
  str_replace("\t", "t",trim(stripslashes($imp[student_email])))."\t";

  $output = preg_replace("/\r\n|\n\r|\n|\r/", ' ', $output);
    print(trim($output))."\t\n";
        } 
  exit;

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

  <body onload="document.academicProject.submit()">
   <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
      <form action="" method="POST" id="academicProject" name="academicProject">
 
    
    <div class="container mar-t10">

          <div class="row">
           <div class="col-sm-12">
           <h3 class="brd-btm mar-b20">The summary of the Resumes has been downloaded.</h3>
            <div class="form-horizontal">
             
              <div class="col-sm-12" style="display:none;">

                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="dob" checked="checked" > Dob
                    </label> 
                    <label class="radio-inline">
                      <input type="checkbox" name="rvvlsi" id="rvvlsi" value="only" checked="checked" > Only RV-VLSI
                    </label> 
         
                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="sslc_passoutyear" checked="checked" > sslc_passoutyear
                    </label> 

                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="sslc_percentage" checked="checked" > sslc_percentage
                    </label> 

                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="sslc_schoolname" checked="checked" > sslc_schoolname
                    </label> 

                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="puc_passoutyear" checked="checked" > puc_passoutyear
                    </label> 

                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="puc_percentage" checked="checked" > puc_percentage
                    </label> 

                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="puc_schoolname" checked="checked" > puc_schoolname
                    </label> 

                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="deg_passoutyear" checked="checked" > deg_passoutyear
                    </label> 

                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="deg_percentage" checked="checked" > deg_percentage
                    </label> 

                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="deg_schoolname" checked="checked" > deg_schoolname
                    </label> 

                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="deg_university" checked="checked" > deg_university
                    </label> 

                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="deg_state" checked="checked" > deg_state
                    </label> 


                    <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="deg_department" checked="checked" > deg_department
                    </label> 
 <label class="radio-inline">
                      <input type="checkbox" name="student[]" id="student[]" value="placed" checked="checked" > Placement
                    </label> 
  <label class="radio-inline">
                      RV_VLSIID<input type="text" name="rvpattern" id="rvpattern" value="" > 
                    </label> 
                </div> 
                                              
            
            
                </div>
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
