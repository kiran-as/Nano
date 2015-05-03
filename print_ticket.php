<?php
ini_set('display_errors', '0');     # don't show any errors...
error_reporting(E_ALL | E_STRICT); 
include('../application/conn.php');
$sessionid = session_id();
$idbusdetails = $_SESSION['idbusdetails'];

$daydetails = mysql_query("Select * from tbl_daysdetails where idbusdetails=$idbusdetails");
$d=0;
while($row = mysql_fetch_assoc($daydetails))
{
    $daydetailsarray[$d]['daysequence'] = $row['daysequence'];
  $daydetailsarray[$d]['daydescription'] = $row['daydescription'];
  $d++;
}


$idagent = $_SESSION['idagent'];
$idbusdetailsboardingplace = $_SESSION['idboardingpoint'];
$larresult = mysql_query("Select a.*,b.*,c.*,d.*,e.*,f.*
              from tbl_busdetails as a,
                 tbl_package as b,
                 tbl_operator as c,
                 tbl_boardingpoint as d,
                 tbl_seatlayout as e,
                 tbl_bustype as f
                 
              where a.idbusdetails=$idbusdetails 
              and a.idpackage=b.idpackage 
            and a.idoperator=c.idoperator
            and a.idboardingpoint=d.idboardingpoint
            and a.bustype=f.idbustype 
            and a.idseatlayout=e.idseatlayout");
                 
                  $s=0;
     while($row = mysql_fetch_assoc($larresult))
     {
        
       $idbusdetails = $row['idbusdetails'];
       $journeydate = date('d-m-Y',strtotime($row['journeydate']));
       $busid = $row['busid'];
       $packagename = $row['packagename'];
       $fare = $row['fare'];
       $duration = $row['days'].' Days'.'-'.$row['nights'].' Nights';
       $operatorname = $row['operatorname'];
       $idoperator = $row['idoperator'];
       $boardingpointname = $row['boardingpointname'];
       $seatlayoutname = $row['seatlayoutname'];
       $bustime = $row['bustime'];
       $bustypelabel = $row['bustypelabel'];
     }
     
     $boardingsql = mysql_query("Select * from tbl_busdetailsboardingplace where idbusdetailsboardingplace=$idbusdetailsboardingplace");
     while($row = mysql_fetch_assoc($boardingsql))
     {
     $idbusdetailsboardingplace = $row['idbusdetailsboardingplace'];
        $boardingtime = $row['boardingtime'];
       $boardingpoint = $row['boardingpoint'];
       $boardingaddress = $row['boardingaddress'];
        $Phoneno = $row['Phoneno'];
     }
     
     $boardingpointtimesql = mysql_query("Select * from tbl_boardingtime where boardingtimestamp='$boardingtime'");
     while($row = mysql_fetch_assoc($boardingpointtimesql))
     {
     $boardingearly = $row['boardingearly'];
     }
     
$agentquery = mysql_query("Select * from tbl_agent where idagent=$idagent");
while($row = mysql_fetch_assoc($agentquery))
  {
    $agentamount = $row['amount'];

    }
   
$ticketnumbermade =  'BI'.time();
$travel_date = $journeydate;
$selectedseat = $_SESSION['seatno'];
$idboardingpoint = $_SESSION['idboardingpoint'];
$bookingdate = date('Y-m-d');
$booking_status='Booked';
$paymentstatus = 'Not paid';
$customername = $_SESSION['customername'];
$email = $_SESSION['email'];
$customerphone = $_SESSION['customerphone'];
$amount = $_SESSION['amount'];
$balanceamount = ($agentamount-$amount);  
$resultss = mysql_query("Select SUBTIME('$bustime', '00:15:00') as deptime");
while($row = mysql_fetch_assoc($resultss))
{
  $boardingtimestamp = substr($row['deptime'],0,5);
}


/*

$Insert = mysql_query("INSERT INTO tbl_bookinginfo(ticketnumber,busoperator,idboardingpoint,
package,journeydate,upddate,
bookingstatus,paymentstatus,
email,mobile,passangername,seatnos,amount,idbusdetails,idagent)
VALUES ('".$ticketnumbermade."','".$operatorname."','".$idboardingpoint."',
'".$packagename."','".$travel_date."','".$bookingdate."',
'".$booking_status."','".$paymentstatus."',
'".$email."','".$customerphone."','".$customername."',
'".$selectedseat."','".$amount."','".$idbusdetails."','".$idagent."')")or die(mysql_error()); 

$updateagentamount = mysql_query("Update tbl_agent set amount=$balanceamount where idagent=$idagent");

$resultarray =mysql_query("Select * from tbl_tempseatsaved where idbusdetails='$idbusdetails'
                         and sessionid='$sessionid' and seatno in ($selectedseat)");
              
while($row = mysql_fetch_assoc($resultarray))
{

}
*/


  $ticketdate = date('d-m-Y',strtotime($journeydate));
 $table="
 <style>
        .container{ max-width: 1180px;padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;}
        .row { margin-right: -15px; margin-left: -15px; box-sizing: border-box;}
        .col-sm-10, .col-sm-6{position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left;}
        .col-sm-6{ width: 45%;}
        .pull-left { float: left!important;}
        .clearfix:before,
        .clearfix:after, .row:before, .row:after { content: ''; display: table;} 
        .clearfix:after, .row:after { clear: both;}
        .clearfix {zoom: 1;}
        .pull-right {float: right!important;}
        .btn{display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height: 1.42857143;text-align: center;
white-space: nowrap;vertical-align: middle;cursor: pointer;background-image: none;
border: 1px solid transparent;border-radius: 4px;}
<style>

@font-face {
    font-family: 'Opensansregular';
    src: url('../fonts/opensans-regular-webfont.eot');
    src: url('../fonts/opensans-regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('../fonts/opensans-regular-webfont.woff2') format('woff2'),
         url('../fonts/opensans-regular-webfont.woff') format('woff'),
         url('../fonts/opensans-regular-webfont.ttf') format('truetype'),
         url('../fonts/opensans-regular-webfont.svg#Opensansregular') format('svg');
    font-weight: normal;
    font-style: normal;

}
@font-face {
    font-family: 'Opensanssemibold';
    src: url('../fonts/opensans-semibold-webfont.eot');
    src: url('../fonts/opensans-semibold-webfont.eot?#iefix') format('embedded-opentype'),
         url('../fonts/opensans-semibold-webfont.woff2') format('woff2'),
         url('../fonts/opensans-semibold-webfont.woff') format('woff'),
         url('../fonts/opensans-semibold-webfont.ttf') format('truetype'),
         url('../fonts/opensans-semibold-webfont.svg#Opensanssemibold') format('svg');
    font-weight: normal;
    font-style: normal;

}



body{font-family: 'Opensansregular'; font-size: 14px; color: #444444;}
ul{ list-style: none; margin: 0px; padding: 0px;}

.container{max-width: 1180px;}
.navbar-inverse{ border-radius: 0px; border: 0px none; margin-bottom: 0px;}
.txtr{ text-align: right;}
.txtc{ text-align: center;}

/*-->
Margin & Padding
<--*/
.mar-t10{ margin-top: 10px;}
.mar-t20{ margin-top: 20px;}
.mar-t30{ margin-top: 30px;}
.mar-b0{ margin-bottom: 0px;}
.mar-b5{ margin-bottom: 5px;}
.mar-b10{ margin-bottom: 10px;}
.mar-b15{ margin-bottom: 15px;}
.mar-b20{ margin-bottom: 20px;}
.mar-b30{ margin-bottom: 30px;}
.mar-r30{ margin-right: 30px;}
.mar-l10{ margin-left: 10px;}
.mar-l20{ margin-left: 20px;}
.mar-l30{ margin-left: 30px;}

.mar0.mar0{ margin: 0px;}
.hmar10{ margin-right: -10px; margin-left: -10px;}

.pad-t5{ padding-top: 5px;}
.pad-t10{ padding-top: 10px;}
.pad-t15{ padding-top: 15px;}
.pad-t20{ padding-top: 20px;}
.pad-t40{ padding-top: 40px;}
.pad-b5{ padding-bottom:5px;}
.pad-b10{ padding-bottom:10px;}
.pad-b15{ padding-bottom:15px;}
.pad-l20{ padding-left: 20px;}
.pad-l40{ padding-left: 40px;}

.pad0.pad0{ padding: 0px;}
.pad20{ padding: 20px;}
.hpad10{ padding-right: 10px; padding-left: 10px;}

/*-->
WIDTHS & HEIGHTS
<--*/
.w150.w150.w150{ width: 150px;}
.w200.w200.w200{ width: 200px;}
.w250.w250.w250{ width: 250px;}
.w800.w800.w800{ width: 800px;}
.mh400{ min-height: 400px;}
.mh500{ min-height: 500px;}
/*-->
LOGIN
<--*/
.login-wrapper{ background: url('../img/login_bg.jpg') no-repeat center center; min-height: 700px; padding-top: 150px; background-size: cover;}
.login-container{ background: rgba(255,255,255,0.95); width: 400px; margin: 0px auto; box-shadow: 0px 0px 50px rgba(0,0,0,0.3); box-sizing: border-box; padding: 50px; text-align: center;}
.logo{ display: inline-block; text-indent: -9999px;}
.logo--large{ background: url('../img/logo_large.png') no-repeat center center; width: 235px; height: 115px;}
.logo--small.logo--small.logo--small{ background: url('../img/logo_small.png') no-repeat center center; width: 153px; height: 18px; margin-left: 0px;}
.clear--top{margin-bottom: -1px;}
.form-login .form-control{ height: 45px;}
.btn-inverse.btn-inverse{ background-color: #fff; color: #00a651; border-color: #00a651;}
.btn-primary.btn-primary, .btn-inverse.btn-inverse:hover, .v-align-mid tr:hover .btn-inverse{ background-color: #00a651; border-color: #00a651;  color: #fff;}
.btn-primary:hover{ background-color:#05BE5F; border-color: #05BE5F;}
.clr-brdradius.clr-brdradius{border-radius:0px ;}

/*-->
HEADER & FOOTER
<--*/
.top--header{ background: #f2f2f2;}
.header-nav{border-right: 1px solid #d9d9d9;}
.header-nav li{ border-left: 1px solid #d9d9d9;}
.header-nav.header-nav li a{ color: #333; font-size: 16px;  padding-left: 50px}
.header-nav.header-nav li.active a, .header-nav.header-nav.header-nav li a:hover, .header-nav.header-nav.header-nav li a:focus{ color: #00a651; background-color: transparent;}
.db-icon{ background: url('../img/sprite.png') no-repeat 20px -27px;}
.active.db-icon, .db-icon:hover, .db-icon:focus{ background: url('../img/sprite.png') no-repeat 20px 13px;}
.reports-icon{ background: url('../img/sprite.png') no-repeat 20px -134px;}
.active.reports-icon, .reports-icon:hover, .reports-icon:focus{ background: url('../img/sprite.png') no-repeat 20px -81px;}
.header-right.header-right.header-right a{ color: #00a651}
.header-right.header-right.header-right a:hover{color:#004b1b}
.header-right li + li{ padding-left: 15px;}
.header-right li + li:before{ position:absolute;content: ''; width: 1px; height: 10px; background: #a9a9a9; top: 20px;}

footer{ background-color: #f2f2f2; margin-top: 30px; padding: 15px 0px 5px 0px; text-align: center; color: #797979;}

/*-->
DASHBOARD
<--*/
.brd-btm{ border-bottom: 1px solid #e5e5e5;}
.font16-sm{ color: #000; font-size: 16px; font-family: 'Opensanssemibold';}
.font14-sm{ color: #000; font-family: 'Opensanssemibold';}
.inline-label.inline-label.inline-label{ font-weight: normal; float: left; padding-top: 7px; padding-right: 5px;}
.date{background: url('../img/sprite.png') no-repeat 0px -202px;width: 18px;height: 18px;display: block;position: absolute;top: 8px;right: 8px;cursor: pointer;}
.pos-rel{ position: relative;}
.oprt-name{font-family: 'Opensanssemibold'; font-size: 20px; margin-top: 10px;}
.v-align-mid.v-align-mid td{ vertical-align: middle}
.seats-block{ float: left; text-align: center;}
.seats-block span{ display: inline-block; padding: 3px 7px; font-family: 'Opensanssemibold'; margin-top: 5px;}
.seats-block--total{ background-color: #ffcb08; border: 1px solid #ad8900; color: #000;}
.seats-block--available{ background-color: #00a651; border: 1px solid #006431; color: #fff;}
.primary-link{ color: #00a651;}
.primary-box{ background-color: #f4f4f4;}
.secondary-box{ border:1px solid #e5e5e5; box-shadow: 0px 0px 10px rgba(0,0,0,0.15);}
.bookseats, .font12{ font-size: 12px;}
.bookseats li{ padding-left: 35px; padding-bottom: 10px; line-height: 20px;}
.bookseats li:nth-child(1){background: url('../img/sprite.png') no-repeat 5px -240px;}
.bookseats li:nth-child(2){background: url('../img/sprite.png') no-repeat 5px -269px;}
.bookseats li:nth-child(3){background: url('../img/sprite.png') no-repeat 5px -297px;}
.control-label{ font-weight: normal;}
.error-text{ color: red;}


</style>
 <div class='container mar-t30 mh500'>
       <div class='row'>
           <div class='col-sm-10 col-sm-offset-1'> 
                <div class='secondary-box'>
                <div class='pad-l20 pad-t15 pad-b15 brd-btm clearfix txtc'>
                  <span>* WISH YOU HAPPY AND COMFORTABLE JOURNEY *</span>                   
                  <a href='#' class='logo logo--small pull-left'></a>           
                </div>
                <div class='brd-btm pad20 clearfix'>
                   <div class='row hmar10'>
                        <div class='col-sm-6 hpad10'>
                            <p class='mar-b20'>Starts From<br><span class='font16-sm'>$boardingpointname</span></p>
                            <p class='mar-b20'>Package Name<br><span class='font16-sm'>$packagename</span></p>
                            <p class='mar-b20'>Reporting Time<br><span class='font16-sm'>$boardingearly</span></p>
                            <p class='mar0'>Operator Name<br><span class='font16-sm'>$operatorname</span></p>
                        </div>
                        <div class='col-sm-6 hpad10'>
                            <p class='mar-b20'>Ticket Number<br><span class='font16-sm'>$ticketnumbermade</span></p>
                            <p class='mar-b20'>Passenger Name<br><span class='font16-sm'>$customername</span></p>
                            <p class='mar-b20'>Departure Time<br><span class='font16-sm'>$boardingtime</span></p>
                            <p class='mar0'>Bus Type<br><span class='font16-sm'>$seatlayoutname $bustypelabel</span></p>
                        </div>
                        <div class='col-sm-6 hpad10'>
                            <p class='mar-b20'>Journey Date<br><span class='font16-sm'>$ticketdate</span></p>
                            <p class='mar-b20'>Package Days<br><span class='font16-sm'>$duration</span></p>
                            <p class='mar-b20'>Total Ticket Fare<br><span class='font16-sm'>Rs $amount</span></p>
                            <p class='mar0'>Seat Number<br><span class='font16-sm'>$selectedseat</span></p>                            
                        </div>
                        <div class='col-sm-6 hpad10 pad-t40'>
                            <div class='primary-box'>
                                <p class='pad-l20 pad-t15 pad-b15 mar0 brd-btm primary-link'>Boarding Point Details</p>
                                <p class='pad20 mar0 font12'>$boardingpoint, $boardingaddress</p>
                            </div>
                            <p class='mar0 pad-t40'>Contact Number<br><span class='font16-sm'>+91 $Phoneno</span></p>
                        </div>                                                 
                    </div>
                </div>
            <div class='pad-l20 brd-btm pad-t10 pad-b10'>
            <h4 class='primary-link'>Package Itinerary</h4>
            </div>
            <div class='pad20 brd-btm clearfix'><ul>";
            for($i=0;$i<count($daydetailsarray);$i++){
      $j = $i+1;
      $description = $daydetailsarray[$i]['daydescription'];
  $table.=" <li class='pad-t20'><span class='font14-sm'>Day $j:</span>
 <br/>$description</li>";
      
       }
            $table.="</ul>
         
            </div>                
                </div>
                <button type='button' class='btn btn-primary mar-t20 pull-right mar-l10'>Print Ticket</button>                
           </div>          
       </div>
    </div>";
 


include("library/mpdf.php");

$mpdf=new mPDF(); 

$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($table);

$mpdf->Output();
/*

$mpdf->WriteHTML($table);

$mpdf->Output();
$stylesheet = file_get_contents('css/bootstrap.css');
// We'll be outputting a PDF
header("Content-type: application/pdf;charset=utf-8;encoding=utf-8");

// It will be called downloaded.pdf
header("Content-Disposition: attachment; filename=kiran_ticket.pdf");*/
exit;
  ?>
