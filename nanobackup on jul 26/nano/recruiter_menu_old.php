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

$result=mysql_query($sql) or die(mysql_error());			
$nume=mysql_num_rows($result);
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
</script>


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

<div class="main_container">
<div class="container_left">

<form name="form1" method="post" action="#">
<?

$m_city=$_POST['m_city'];
switch ($m_city)
{
case "Bangalore":
$Bang="selected";break;
case "Mysore":
$Mys="selected";break;
case "Hyderabad":
$Hyd="selected";break;
case "chennai":
$che="selected";break;
case "Pune":
$Pune="selected";break;
case "Mumbai":
$Mum="selected";break;
}

$qua_id=$_POST['qua_id'];
switch ($qua_id)
{
case "Rv-Vlsi":
$rv="selected";break;
case "10th":
$tenth="selected";break;
case "12th":
$tnth="selected";break;
case "Diploma":
$diploma="selected";break;
case "Bsc":
$bsc="selected";break;
case "Msc":
$msc="selected";break;
case "BE/BTech":
$be="selected";break;
case "ME/MTech":
$me="selected";break;
case "Phd":
$phd="selected";break;
}
?>
<div class="rightimg_top" >
              <p class="h3class"> SEARCH </p>
                 
                 
              <p>
                   <select name="m_city" style=" width:120px; font-style:normal; font-family:Arial, Helvetica, sans-serif;" id="m_city">
                     <option value="">Select City</option>

                      <option value="Bangalore" <?=$Bang?>>Bangalore</option>
                     <option value="Mysore"<?=$Mys?>>Mysore</option>
                     <option value="Hyderabad"<?=$Hyd?>>Hyderabad</option>
                     <option value="chennai"<?=$che?>>Chennai</option>
                     <option value="Pune"<?=$Pune?>>Pune</option>
                     <option value="Mumbai"<?=$Mum?>>Mumbai</option>
                   </select>
                 </p>
              
           <p>
             <select name="qua_id"  style=" width:120px; font-style:normal; font-family:Arial, Helvetica, sans-serif;" id="qua_id">
               <option value="">Qualification </option>
               <option value="Rv-Vlsi"<?=$rv?>>Rv-Vlsi</option>
               <option value="10th"<?=$tenth?>>10th</option>
               <option value="12th"<?=$tnth?>>12th</option>
               <option value="Diploma"<?=$diploma?>>Diploma</option>
               <option value="Bsc"<?=$bsc?>>Bsc</option>
               <option value="Msc"<?=$msc?>>Msc</option>
               <option value="BE/BTech"<?=$be?>>BE/BTech</option>
               <option value="ME/MTech"<?=$me?>>MTech</option>
               <option value="Phd"<?=$phd?>>Phd</option>
             </select>
           </p>
          

                 <p>                   
                   <select name="branch_name" id="branch_name" style=" width:120px; font-style:normal; font-family:Arial, Helvetica, sans-serif;" onchange="addOption(this)">
                     <option value=""> Branch Name </option>
                     <option value="ADAD">ADAD</option>
                     <option value="DABD">DABD</option>
                     <option value="CSC">CSC </option>
                     <option value="E&C">E&C </option>
                     <option value>Other</option>
                   </select>
              </p>
              
                 
                 <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="Submit" type="submit" value="GO" />
                 </p>
      </form>
      </div>
</div> 
<div class="container_right"> 
		<? 
        $page_name="recruiter_menu.php"; 
        
        $start=$_GET['start'];								
        if(!($start > 0)) {                        
        $start = 0;
        }
        
        $eu = ($start -0);                
        $limit = 10;                                 
        $this1 = $eu + $limit; 
        $back = $eu - $limit; 
        $next = $eu + $limit; 
        
   if(mysql_num_rows($result)!="0")
   {
            echo "<table  width='100%' height='67' align='left' class='recruit_table' border='0' bordercolor='#eee' style='margin-bottom:10px;' >";
        
            echo "<tr></tr><tr></tr><tr></tr><tr>";
        
            echo "</tr><tr> <td width='100%' align='left' style='font-size:14px; border:1px solid #cccccc;'>
				<table align='center' style='float:left; '  width='100%' border='0' cellspacing='0' cellpadding='3'>";
        
            echo "<tr  style='background-color:#dddce2;'>
              <td width='15%' align='center' style='font-weight:bold;'>Full Name</td>
              <td width='5%' align='center' style='font-weight:bold;'>City</td>
              <td width='5%' align='center' style='font-weight:bold;'>Details</td>
            </tr>";

         	$query="select $members_table.* from $members_table $search order by m_id asc limit $eu, $limit ";
       		$result=mysql_query($query);
        	echo mysql_error();
        	$bgcolor="#eee";
          	while($row = mysql_fetch_array($result))
          	{
              if($bgcolor=='#eee')
              {
                  $bgcolor='#ffffff';
              }
              
                else
                {
                    $bgcolor='#eee';
                }
              
                echo "<tr>
              <td  align='left' bgcolor=".$bgcolor.">".ucfirst($row['m_fname'])." ".$row['m_lname']."</td>
              <td  align='left' bgcolor=".$bgcolor.">".ucfirst($row['m_city'])."</td>
              <td  align='center' bgcolor=".$bgcolor."><a href='resume_display.php?m_id=".$row['m_id']."' style='text-decoration:none;'>
			  <img src='images/views.jpg'></img></a></td>
              </tr>";
        
          	}
		
	 		echo "</table>";
			 $p_limit=10;
		
			$p_f=$_GET['p_f'];								
			if(!($p_f > 0))
			{                        
			$p_f = 0;
		    }


		
		$p_fwd=$p_f+$p_limit;
		$p_back=$p_f-$p_limit;
		
		echo "<table align = 'center' width='50%'><tr><td  align='left'  >";
		if($p_f<>0)
			{	
			print "<a href='$page_name?start=$p_back&p_f=$p_back'><font face='Verdana' size='2'>PREV $p_limit</font></a>";
		 
			}
		echo "</td><td  align='left'>";
		
		if($back >=0 and ($back >=$p_f)) 
		{ 
			print "<a href='$page_name?start=$back&p_f=$p_f'><font face='Verdana' size='2'>PREV</font></a>"; 
			 
		} 
		
		echo "</td><td align=center width='30%'>";
		for($i=$p_f;$i < $nume and $i<($p_f+$p_limit);$i=$i+$limit)
		{
			if($i <> $eu)
			{
			$i2=$i+$p_f;
			echo " <a href='$page_name?start=$i&p_f=$p_f'><font face='Verdana' size='2'>$i</font></a> ";
			
			}
			else
			{
			echo "<font face='Verdana' size='3' color='blue'>$i</font>";}       
		
			}
		
		
			echo "</td><td  align='right' width='10%'>";
	
			if($this1 < $nume and $this1 <($p_f+$p_limit))
			{ 
				print "<a href='$page_name?start=$next&p_f=$p_f'><font face='Verdana' size='2'>NEXT</font></a>";
				 
			} 
			echo "</td><td  align='right' >";
			if($p_fwd < $nume)
			{
			print "<a href='$page_name?start=$p_fwd&p_f=$p_fwd'><font face='Verdana' size='2'>NEXT $p_limit</font></a>"; 
			 
			}
			echo "</td></tr></table>";
	  	}
   else
	 {
	   echo "<h4>Records Not Found....</h4>";
	 }
	 	echo "</td></tr></table>";
				
?>
 			

	</div>
  </div>


 </div><!--end of rightimg_top-->

</div><!--end of right_maincontent-->
<?php include "left_con.php" ?>


</div><!--end of main_content-->

    
   
<? include "includes/footer.php" ?>

</div> <!--end of main_div-->
</body>
</html>