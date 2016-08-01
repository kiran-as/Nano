<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

 

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   $check=new checkingAuth();
   $check->loginCheckrec(); 
  // echo $_SESSION['r_id'];
/* $date_query=$db->getResults("SELECT * FROM rv_work_experience");
	$y2=0;
	$y2_5=0;
	$y5=0;
	foreach($date_query as $date_row)
	{
	$months_from=explode('-',$date_row->From_date);
	$months_to=explode('-',$date_row->To_date);
	$noofmonths=ceil((mktime(0,0,0,$months_to[0],0,$months_to[1])- mktime(0,0,0,$months_from[0],0,$months_from[1]))/(24*60*60*30));
	//echo "Time---".$noofmonths;
	if($noofmonths<=24){
	$y2++;
	}
	if($noofmonths>24 && $noofmonths<60){
	$y2_5++;
	}
	if($noofmonths>60){
	$y5++;
	}
	}*/

/*$query ="SELECT distinct mem.m_id FROM $members_table mem,$education_table1 edu where  mem.m_id=edu.m_id";*/
$query ="SELECT m_id, sum( e_percentage * ( 1 - abs( sign( e_id -1 ) ) ) ) AS RV, sum( e_percentage * ( 1 - abs( sign( e_id -2 ) ) ) ) AS Phd, sum( e_percentage * ( 1 - abs( sign( e_id -4 ) ) ) ) AS BE, sum( e_percentage * ( 1 - abs( sign( e_id -8 ) ) ) ) AS 12th, sum( e_percentage * ( 1 - abs( sign( e_id -9 ) ) ) ) AS 10th
FROM $education_table1 ORDER BY m_id DESC";
$result=mysql_query($query) or die(mysql_error());			
$totalrow=mysql_num_rows($result);

$limit=10;

			$png=$_REQUEST['png'];
			
			if(empty($png)){
			
      			  $png = 1;
    			} 
				
	        $limitvalue = ($png * $limit )- ($limit);  
			
			$query.=" order by $education_table1.m_id desc  LIMIT $limitvalue, $limit ";	 
		
$result=mysql_query($query);
$fetch=mysql_fetch_assoc($result);
echo $fetch;
?>
	 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<meta name="keywords" content="ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company" /> 
<title>ASIC, FPGA, Full custom, Standard Cell, Memory Design Services Company</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="style_new.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>


</head>

<body>



<div class="main_div">	
<? include "includes/header.php" ?>

<div class="main_banner">
<img src="images/bannernanochip.jpg" width="980" height="200" border="0" />
</div><!--end of main_banner-->
<div class="main_content">

<link rel="stylesheet" href="nanochip/ddlevelsmenu-base.css" type="text/css" />
<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>


<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<script>
function addOption(theSel){
 oc = theSel.options.length;
 if(theSel.selectedIndex==oc-1){
   newOpt = window.prompt("Please Enter..","");
   if(newOpt+"">""){
     theSel.options[oc] = new Option(theSel.options[oc-1].text);
     theSel.options[oc-1] = new Option(newOpt, newOpt, true, true);
   }
 }
}


function searchValidation(){

if(document.searchForm.m_city.value=='0' && document.searchForm.qua_id.value=='0' && document.searchForm.branch_name.value=='0')
{
alert("Please select atleast one Search Option");
document.searchForm.m_city.focus();
return false;

}


}
</script>


<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<div class="stmenuright_maincontent">


<div style="float:left; width:980px; margin:0px; padding:0px;">
<div class="rightimg_left">
</div>
<div style="background-image:url(images/rightcontent_mid.jpg); width:960px; background-repeat:repeat-x; height:25px; line-height:20px; float:left;">
<table width="960px" cellpadding="0" cellspacing="">
<tr>
<td width="141"><h3 class="h3class">Dash Board</h3></td>
<td width="108"><a href="#" class="dash_boardmenu" >Edit Profile</a></td>
<td width="166"><a href="#" class="dash_boardmenu" >Manage Job Posting</a></td>
<td width="95"><a href="statistics.php" class="dash_boardmenu" >Statistics</a></td>
<td width="80"><a href="recruiter_menu.php" class="dash_boardmenu" >Search</a></td>
<td width="157"><a href="#" class="dash_boardmenu" >Change Password</a></td>
<td width="72" ><a href="recruiter_logout.php" class="dash_boardmenu" >Logout</a></td>
<td width="139"><h3 class="h3class" style="float:right; text-align:right">Welcome &nbsp;&nbsp;<?=ucfirst($_SESSION['username']);?></h3></td>
</tr>
</table>
</div>
<div class="rightimg_right"></div>
</div>


<div class="main_container" style="width:800px;">
  <table style="float:left; width:auto;" border="1" cellspacing="0" cellpadding="3">
<tr  style="background-color:#dddce2;">
<td width="7%" align="center"   style="font-weight:bold;">SNO</td>
<td width="10%" align="center" style="font-weight:bold;">RV-Score</td>
<td width="10%" align="center" style="font-weight:bold;">M Tech %</td>
<td width="10%" align="center"   style="font-weight:bold;">B Tech %</td>
<td width="7%" align="center" style="font-weight:bold;">12th %</td>
<td width="7%" align="center" style="font-weight:bold;">10th %</td>
<td width="15%" align="center" style="font-weight:bold;">Other Qualification</td>
<td width="15%" align="center" style="font-weight:bold;">Year Of Passing</td>
<td width="15%" align="center" style="font-weight:bold;">View Details</td>
            
</tr>
<?
while($row=mysql_fetch_assoc($result))
{
?>
<tr style="background-color:#dddce2;">
<td width="7%" align="center" ><?=$row['m_id']?></td>
<td width="10%" align="center"></td>
<td width="10%" align="center"></td>
<td width="10%" align="center" ></td>
<td width="7%" align="center"></td>
<td width="7%" align="center"></td>
<td width="15%" align="center"></td>
<td width="15%" align="center"></td>
<td  width="15%" align="center"><a href="resume_display.php?m_id=<?=$row['m_id']?>" style="text-decoration:none;" target="_blank"><img src="images/views.jpg" border="0"></img></a></td>
</tr>
<?
}
?>
</table> 
<div align="right" style="font-size:14px;">
<? 
if($totalrow>$limit)
			{
		$page="candidate_details.php?m_city=".$_REQUEST[m_city]."&qua_id=".$_REQUEST[qua_id]."&branch_name=".$_REQUEST[branch_name];
		searchPagenation($totalrow,$limit,$png,$page);
			}
            ?>
</div>
  </div>


</div>
<?php //include "left_con.php" ?>


</div><!--end of main_content-->

    
   
<? include "includes/footer.php" ?>

</div> <!--end of main_div-->
</body>
</html>