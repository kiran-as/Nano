<?php
include('../application/conn.php');
include('../include/sessioncheck.php');
include('../include/settingmessage.php');
include('../include/year.php');
$idstudent = $_SESSION['idstudent'];

$idcompanies = $_POST['idcompanies'];
if(empty($idcompanies))
{
$oldCompanyName = $_POST['oldCompanyName'];
$oldDesignation = $_POST['oldDesignation'];
$oldToYear = $_POST['oldToYear'];
$oldFromYear = $_POST['oldFromYear'];
$oldFromMonth = $_POST['oldFromMonth'];
$oldToMonth = $_POST['oldToMonth'];
if(!empty($oldCompanyName))
{
mysql_query("Insert into tbl_companies (companyname,designation,
    frommonth,tomonth,fromyear,
    toyear,idstudent) values ('$oldCompanyName','$oldDesignation',
    '$oldFromMonth','$oldToMonth','$oldFromYear',
    '$oldToYear','$idstudent')");
}
/*echo "Insert into tbl_companies (companyname,designation,
    frommonth,tomonth,fromyear,
    toyear,idstudent) values ('$oldCompanyName','$oldDesignation',
    '$oldFromMonth','$oldToMonth','$oldFromYear',
    '$oldToYear','$idstudent')";*/
}
else
{
    mysql_query("Delete from tbl_companies where idcompanies='$idcompanies'");
}

$retriveSql = mysql_query("Select * from tbl_companies where idstudent='$idstudent'");
$i=0;
while($row = mysql_fetch_assoc($retriveSql))
{
    $companyArray[$i]['companyname'] = $row['companyname'];
    $companyArray[$i]['designation'] = $row['designation'];
    $companyArray[$i]['frommonth'] = $row['frommonth'];
    $companyArray[$i]['tomonth'] = $row['tomonth'];
    $companyArray[$i]['fromyear'] = $row['fromyear'];
    $companyArray[$i]['toyear'] = $row['toyear'];
    $companyArray[$i]['idcompanies'] = $row['idcompanies'];
    $i++;
}

$table="";
for($i=0;$i<count($companyArray);$i++)
{
     $companyname = $companyArray[$i]['companyname'];
    $designation = $companyArray[$i]['designation'];
    $frommonth = $companyArray[$i]['frommonth'];
    $tomonth = $companyArray[$i]['tomonth'];
    $fromyear = $companyArray[$i]['fromyear'];
    $toyear = $companyArray[$i]['toyear'];
    $idcompanies = $companyArray[$i]['idcompanies'];
    $table.="
    <div class='form-group col-sm-3'>
       <input type='text' class='form-control' placeholder='Company Name'  name='oldCompanyName[]' value='$companyname'>
    </div>
    <div class='form-group col-sm-3'>
       <input type='text' class='form-control' placeholder='Designation'  name='oldDesignation[]' value='$designation'>
    </div>
    <div class='form-group col-sm-1'>
<select class='form-control' placeholder='From Year' style='width:84px;' name='oldFromMonth[]'>
                  <option value=' '>Select</option>
                  <option value='1'"; if($frommonth=='1'){ $table.=" Selected=Selected";} $table.=" $selected>Jan</option>
                  <option value='2'"; if($frommonth=='2'){ $table.=" Selected=Selected";} $table.=" $selected>Feb</option>
                  <option value='3'"; if($frommonth=='3'){ $table.=" Selected=Selected";} $table.=" $selected>March</option>
                  <option value='4'"; if($frommonth=='4'){ $table.=" Selected=Selected";} $table.=" $selected>April</option>
                  <option value='5'"; if($frommonth=='5'){ $table.=" Selected=Selected";} $table.=" $selected>May</option>
                  <option value='6'"; if($frommonth=='6'){ $table.=" Selected=Selected";} $table.=" $selected>June</option>
                  <option value='7'"; if($frommonth=='7'){ $table.=" Selected=Selected";} $table.=" $selected>July</option>
                  <option value='8'"; if($frommonth=='8'){ $table.=" Selected=Selected";} $table.=" $selected>Aug</option>
                  <option value='9'"; if($frommonth=='9'){ $table.=" Selected=Selected";} $table.=" $selected>Sep</option>
                  <option value='10'"; if($frommonth=='10'){ $table.=" Selected=Selected";} $table.=" $selected>Oct</option>
                  <option value='11'"; if($frommonth=='11'){ $table.=" Selected=Selected";} $table.=" $selected>Nov</option>
                  <option value='12'"; if($frommonth=='12'){ $table.=" Selected=Selected";} $table.=" $selected>Dec</option>
               </select>
    </div>
    <div class='form-group col-sm-1'>
<select class='form-control'  style='width:84px;' name='oldFromYear[$i]'>
                      <option value=''>Select</option>";
                     for($j=0;$j<count($yeararray);$j++){
                        $valueYear = $yeararray[$j]['years']; 
                      $table.="<option value='$valueYear'"; if($fromyear==$valueYear){ $table.="Selected=Selected";} $table.=">
                      $valueYear 
                      </option>";
                       }                       
                  $table.="</select>
    </div>

        <div class='form-group col-sm-1'>
<select class='form-control' placeholder='From Year' style='width:84px;' name='oldToMonth[]'>
                  <option value=' '>Select</option>
                  <option value='1'"; if($tomonth=='1'){ $table.=" Selected=Selected";} $table.=" $selected>Jan</option>
                  <option value='2'"; if($tomonth=='2'){ $table.=" Selected=Selected";} $table.=" $selected>Feb</option>
                  <option value='3'"; if($tomonth=='3'){ $table.=" Selected=Selected";} $table.=" $selected>March</option>
                  <option value='4'"; if($tomonth=='4'){ $table.=" Selected=Selected";} $table.=" $selected>April</option>
                  <option value='5'"; if($tomonth=='5'){ $table.=" Selected=Selected";} $table.=" $selected>May</option>
                  <option value='6'"; if($tomonth=='6'){ $table.=" Selected=Selected";} $table.=" $selected>June</option>
                  <option value='7'"; if($tomonth=='7'){ $table.=" Selected=Selected";} $table.=" $selected>July</option>
                  <option value='8'"; if($tomonth=='8'){ $table.=" Selected=Selected";} $table.=" $selected>Aug</option>
                  <option value='9'"; if($tomonth=='9'){ $table.=" Selected=Selected";} $table.=" $selected>Sep</option>
                  <option value='10'"; if($tomonth=='10'){ $table.=" Selected=Selected";} $table.=" $selected>Oct</option>
                  <option value='11'"; if($tomonth=='11'){ $table.=" Selected=Selected";} $table.=" $selected>Nov</option>
                  <option value='12'"; if($tomonth=='12'){ $table.=" Selected=Selected";} $table.=" $selected>Dec</option>
               </select>
    </div>
        <div class='form-group col-sm-1'>
        <select class='form-control' id='oldToYear[]' style='width:84px;' name='oldToYear[]'>
                      <option value=''>Select</option>";
                     for($j=0;$j<count($yeararray);$j++){
                        $valueYear = $yeararray[$j]['years']; 
                      $table.="<option value='$valueYear'"; if($toyear==$valueYear){ $table.="Selected=Selected";} $table.=">
                      $valueYear 
                      </option>";
                       }                       
                  $table.="</select>
    </div>
    <div class='form-group col-sm-1'>
              <button type='button' id='addButton' class='btn btn-primary pull-right' onclick='fnDeleteCompanyDetails($idcompanies);'>Remove</button>                      
    </div>
    <div class='clearfix row'>
";
}
echo $table;
exit;
?>
