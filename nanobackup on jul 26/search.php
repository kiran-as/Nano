<? include_once('db/dbconfig.php');
	$q=$_GET["val"];
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



	/*
    echo "<br>TOTAL NUMBER OF RESUME $q--------".count($db->getResults("SELECT m_id FROM $members_table where m_city='".$q."'"));
	
    
     echo "<br>BE/BTech------".count($db->getResults("SELECT m.m_id,ed.qua_id FROM $members_table m ,$education_table1 ed where m.m_id=ed.m_id and ed.qua_id='BE/BTech' and m.m_city='".$q."'"));
    
	echo "<br>BE and MTech---------".count($db->getResults("SELECT m.m_id,ed.qua_id FROM $members_table m ,$education_table1 ed where m.m_id=ed.m_id and ed.qua_id='BE/BTech' and ed.qua_id='ME/MTech' and m.m_city='".$q."'"));

echo "<br>Phd---------".count($db->getResults("SELECT m.m_id,ed.qua_id FROM $members_table m ,$education_table1 ed where m.m_id=ed.m_id and ed.qua_id='Phd' and m.m_city='".$q."'"));
?>*/




?>
<table width="100%" height="67"  class="recruit_table" >   
    <tr>
   <?  //include_once('includes/recruiters_side_menu.php');?>
      <!--<td width="1%" height="15" >&nbsp;</td>
      <td width="83%" height="15" >&nbsp;</td>-->
    </tr>
    <tr>
     <!-- <td width="1%" >&nbsp;</td>-->
	  
	  <td width="80%" align="center" style="font-size:14px"><table align="left"  width="38%" border="0" cellspacing="0" cellpadding="3">
  <!--<tr>
    <td colspan="3"><strong>Welcome &nbsp;&nbsp;<?=$_SESSION['username'];?></strong></td>
    </tr>-->
  <tr style="background-color:#ccc;">
    <td width="78%" align="center">Name</td>
    <td width="22%" align="center">Details</td>
    </tr>
<?  while($row = mysql_fetch_array($result)){?>
  <tr>
    <td align="left"><? echo $row['m_fname']." ".$row['m_lname'];?></td>
    <td align="center"><a href="resume_display.php?m_id=<? echo $row['m_id'];?>">VIEW</a></td>
    </tr>
  <? }
?>
</table>

     </td>
	</tr>
</table>
