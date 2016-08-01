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
 $date_query=$db->getResults("SELECT * FROM rv_work_experience");
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
	}
	$query = "SELECT m_id,m_fname,m_lname FROM $members_table where m_city='".$q."' order by m_fname asc"; 
	 
	$result = mysql_query($query) or die(mysql_error());
	
	$branch_name=$_POST["branch_name"];
	$qua_id=$_POST["qua_id"];
	$city=$_POST["m_city"];
 				 $rest="";
				 $text=" Search Keywords : ";
				 
				  if($qua_id!="")
					 {
					 	if($rest=="")
							{
							$rest.="   join $education_table1 on $members_table.m_id=$education_table1.m_id where qua_id='".$qua_id."'";
							$text.=" Qualification = $qua_id";
							}
							else
							{
							$rest.=" or  join $education_table1 on $members_table.m_id=$education_table1.m_id where qua_id='".$qua_id."'";
							$text.=", Qualification = $qua_id";
							}
					 }
					  if($branch_name!="")
					 {
					 	if($rest=="")
						{
							$rest.="  left join $education_table1 on $members_table.m_id=$education_table1.m_id where branch_name like '%$branch_name%'";
							$text.="Branch name like $branch_name";
							}
							else
							{
							$rest.=" or left join $education_table1 on $members_table.m_id=$education_table1.m_id where branch_name like '%$branch_name%'";
							$text.=", Branch name like  $branch_name";
							}
					 }
					 	if($city!="")
					 {
					 	if($rest=="")
							{
								$rest.=" where m_city ='".$city."'";
								 $text.="  City = $city ";
							}
							else
							{
							$rest.=" and  m_city = '".$city."'";
							$text.=" , City  = $city ";
							
							}
					 }
			
$sql="select $members_table.* from $members_table $rest order by m_id asc"; 	

//$sql="select * from $members_table $rest"; 
$result=mysql_query($sql) or die(mysql_error());			
$num=mysql_num_rows($result);
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


<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<div class="stmenuright_maincontent">

<div class="rightimg_top">
<div class="rightimg_left">
</div>
<div class="rightimg_mid">
<h3 class="h3class">Dash Board<span class="h3class" style="float:right; text-align:right">Welcome &nbsp;&nbsp;<?=ucfirst($_SESSION['username']);?></span></h3>
</div>
<div class="rightimg_right">
</div>
</div><!--end of rightimg_top-->

<h3 align="right"><? echo $text;?></h3>
<? 
 if(mysql_num_rows($result)!="0")
 {
	echo "<table width='100%' height='67' align='left' class='recruit_table' style='margin-bottom:10px;' >";

 	echo "<tr></tr><tr></tr><tr></tr><tr>";

	echo "</tr><tr> 
  			<td width='80%' align='left' style='font-size:14px'><table align='center' style='float:left; border:1px solid #000;' width='80%' border='0' cellspacing='0' 		cellpadding='3'>";

	echo "<tr  style='background-color:#dddce2;'>
      <td width='24%' align='left'>Customer Id</td>
      <td width='40%' align='left'>Full Name</td>
      <td width='17%' align='left'>City</td>
      <td width='9%' align='left'>Details</td>
    </tr>";
	$color="1";
		
  while($row = mysql_fetch_array($result))
  {

	  
	  if($color==1)
	  {
    	echo "<tr>
      <td align='left'>".$row['m_id']."</td>
      <td  align='left'>".$row['m_fname']." ".$row['m_lname']."</td>
      <td  align='left'>".$row['m_city']."</td>
      <td  align='center'><a href='resume_display.php?m_id=".$row['m_id']." style='text-decoration:none;'><img src='images/views.jpg'></img></a></td>
      </tr>";
	  $color="2";
	 }
	else 
	{
	  echo "<tr align='left' style='background-color:#eee;'>
      <td align='left'>".$row['m_id']."</td>
      <td  align='left'>".$row['m_fname']." ".$row['m_lname']."</td>
      <td  align='left'>".$row['m_city']."</td>
      <td  align='center'><a href='resume_display.php?m_id=".$row['m_id']." style='text-decoration:none;'><img src='images/views.jpg'></a></td>
      </tr>";
	  $color="1";
	}
	
		
  }
		
	 echo "</table>";
	  }
		 else
		 {
		 echo "<h3>Records Not Found....</h3>";
		 }
echo  "<p align='right'><a href='recruiter_menu.php'  style='margin:0px; padding:0px 0px 0px 10px;'><img src='images/search.jpg' /></a></p>
 		 </td></tr>
		 	</table>";
 			
?>
</div><!--end of right_maincontent-->
<?php include "left_con.php" ?>


</div><!--end of main_content-->



   
<? include "includes/footer.php" ?>

</div><!--end of main_div-->
</body>
</html>