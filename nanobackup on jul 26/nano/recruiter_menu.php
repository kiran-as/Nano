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
	
	/*get rv score*/
	function get_column_value($id,$column_name)
	{
		$result=mysql_query("SELECT * FROM `rv_educational_details1`  WHERE `m_id`='".$id."' AND `qua_id`='".$column_name."'");
		$fetch=mysql_fetch_array($result);
	    $num_rows=mysql_num_rows($result);
		if($num_rows==0){
		echo '-';
		}else{
		if($fetch['e_percentage']=='')
		echo '-';
		else
		echo $fetch['e_percentage'];
		}
	}
function get_other_qualification($id,$column_name)
  {
	  $result=mysql_query("SELECT * FROM `rv_educational_details1`  WHERE `m_id`='".$id."' AND `qua_id`='".$column_name."'");
		$fetch=mysql_fetch_array($result);
	     $num_rows=mysql_num_rows($result);
		if($num_rows==0)
		{
		echo '-';
		}
		else
		{ 
		if($fetch['e_percentage']=='')
		echo '-';
		else
		echo $fetch['qua_id'];
		}
  }

   /*get yera of passing*/
  function get_year_passing($id)
  {
	  $result=mysql_query("SELECT  MAX(e_end) AS passyear  FROM rv_educational_details1  WHERE m_id=".$id." ORDER BY m_id DESC");
	   $fetch=mysql_fetch_assoc($result); 
	   $num_rows=mysql_num_rows($result);
		if($num_rows==0){
		echo '-';
		}else{
		if($fetch['passyear']==' ')
		echo '-';
		else
		echo $fetch['passyear'];
		}
  }


$query ="SELECT distinct edu.m_id,mem.m_id,mem.m_fname,mem.m_lname,mem.m_city FROM $members_table mem,$education_table1 edu where  mem.m_id=edu.m_id ";

 
if($_REQUEST[m_city]!='0'){
$query.=" and  mem.m_city='".$_REQUEST[m_city]."' ";
}

if($_REQUEST[qua_id]!='0'){
$query.=" and  edu.qua_id='".$_REQUEST[qua_id]."' ";

}

if($_REQUEST[branch_name]!='0'){
$query.="  and  edu.branch_name like '%".$_REQUEST[branch_name]."%'";

}

//die($query);
$result=mysql_query($query) or die(mysql_error());			
$totalrow=mysql_num_rows($result);

$limit=10;

			$png=$_REQUEST['png'];
			
			if(empty($png)){
			
      			  $png = 1;
    			} 
				
	        $limitvalue = ($png * $limit )- ($limit);  
			
			$query.=" order by mem.m_id desc  LIMIT $limitvalue, $limit ";	 
		
$result=mysql_query($query);




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

<script src="ddlevelsmenu.js" type="text/javascript"></script>
<script type="text/javascript">var GB_ROOT_DIR = "<?=$server_url?>greybox/";</script>
<script type="text/javascript" src="<?=$server_url?>greybox/AJS.js"></script>
<script type="text/javascript" src="<?=$server_url?>greybox/AJS_fx.js"></script>
<script type="text/javascript" src="<?=$server_url?>greybox/gb_scripts.js"></script>
<link href="<?=$server_url?>greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
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

function checkAll(master){
var checked = master.checked;
var col = document.getElementsByTagName("INPUT");
for (var i=0;i<col.length;i++) {
col[i].checked= checked;
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

<div class="main_container" style="width:960px;">
<div class="container_left">

<form name="searchForm" method="post" action="#" onsubmit="return searchValidation();">

<div class="rightimg_top" >
              <p class="h3class"> SEARCH </p>
                 
             <p>
                   <select name="m_city" style=" width:120px; font-style:normal; font-family:Arial, Helvetica, sans-serif;" id="m_city">
                     <option value="0">Select City</option>

                      <option value="Bangalore" <?=$_REQUEST['m_city']=='Bangalore'?'selected':''?> >Bangalore</option>
                     <option value="Mysore"<?=$_REQUEST['m_city']=='Mysore'?'selected':''?> >Mysore</option>
                     <option value="Hyderabad"<?=$_REQUEST['m_city']=='Hyderabad'?'selected':''?> >Hyderabad</option>
                     <option value="chennai"<?=$_REQUEST['m_city']=='chennai'?'selected':''?> >Chennai</option>
                     <option value="Pune"<?=$_REQUEST['m_city']=='Pune'?'selected':''?> >Pune</option>
                     <option value="Mumbai"<?=$_REQUEST['m_city']=='Mumbai'?'selected':''?> >Mumbai</option>
                   </select>
                 </p>
              
           <p>
             <select name="qua_id"  style=" width:120px; font-style:normal; font-family:Arial, Helvetica, sans-serif;" id="qua_id">
               <option value="0">Qualification </option>
               <option value="Rv-Vlsi" <?=$_REQUEST['qua_id']=='Rv-Vlsi'?'selected':''?>>Rv-Vlsi</option>
               <option value="10th"<?=$_REQUEST['qua_id']=='10th'?'selected':''?>>10th</option>
               <option value="12th"<?=$_REQUEST['qua_id']=='12th'?'selected':''?>>12th</option>
               <option value="Diploma"<?=$_REQUEST['qua_id']=='Diploma'?'selected':''?>>Diploma</option>
               <option value="Bsc"<?=$_REQUEST['qua_id']=='Bsc'?'selected':''?>>Bsc</option>
               <option value="Msc"<?=$_REQUEST['qua_id']=='Msc'?'selected':''?>>Msc</option>
               <option value="BE/BTech"<?=$_REQUEST['qua_id']=='BE/BTech'?'selected':''?>>BE/BTech</option>
               <option value="ME/MTech"<?=$_REQUEST['qua_id']=='ME/MTech'?'selected':''?>>MTech</option>
               <option value="Phd"<?=$_REQUEST['qua_id']=='Phd'?'selected':''?>>Phd</option>
             </select>
           </p>
           
                <p>                   
                   <select name="branch_name" id="branch_name" style=" width:120px; font-style:normal; font-family:Arial, Helvetica, sans-serif;" onchange="addOption(this)">
                     <option value="0"> Branch Name </option>
                     <option value="ADAD" <?=$_REQUEST[branch_name]=='ADAD'?'selected':'';?>>ADAD</option>
                     <option value="DABD" <?=$_REQUEST[branch_name]=='DABD'?'selected':'';?>>DABD</option>
                     <option value="CSC" <?=$_REQUEST[branch_name]=='CSC'?'selected':'';?>>CSC </option>
                     <option value="E&C" <?=$_REQUEST[branch_name]=='E&C'?'selected':'';?>>E&C </option>
                     <option value="Other"  <?=$_REQUEST[branch_name]=='Other'?'selected':'';?>>Other</option>
                   </select>
              </p>
              
              
                 
                 <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="searchResults" type="submit" value="GO" />
                 </p>
      </form>
      </div>
</div> 
<div class="container_right"> 
		<? 
      
              
   if(mysql_num_rows($result)!="0")
   {
           ?><table  width='100%' height='67' align='left' class='recruit_table' border='0' bordercolor='#eee' style='margin-bottom:10px;'>
        
        <tr></tr><tr></tr><tr></tr><tr>
        
        </tr><tr> <td width="100%" align="left" style="font-size:14px; border:1px solid #cccccc;">
				<table width="100%" align="center"  border="0" cellspacing="0" cellpadding="3" ><tr>
              <td width="15%" align="left"  colspan="10">Total Results Found  -  <?=$totalrow?></td>
            </tr>
            <tr  style="background-color:#dddce2;">
            <td width="10%" align="left"   style="font-weight:bold;"><input type="checkbox" name="candidate" onclick="checkAll(this)"  value="" ></td>
              <td width="20%" align="left"   style="font-weight:bold;">Full Name</td>
            
            <td width="5%" align="center" style="font-weight:bold;">Employability Factor</td>
            <td width="10%" align="center" style="font-weight:bold;">MTech %</td>
             <td width="10%" align="center"   style="font-weight:bold;">BTech %</td>
            <td width="10%" align="center" style="font-weight:bold;">12th %</td>
            <td width="10%" align="center" style="font-weight:bold;">10th %</td>
           <td width="15%" align="center" style="font-weight:bold;">Other Qualification</td>
            <td width="15%" align="center" style="font-weight:bold;">Year Of Passing</td>

              <td width="5%" align="center" style="font-weight:bold;">City</td>
              <td width="5%" align="center" style="font-weight:bold;">Details</td>
            </tr><?

         	/*$query="select $members_table.* from $members_table $search order by m_id asc limit $eu, $limit ";
       		$result=mysql_query($query);
        	echo mysql_error();*/
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
              
              ?><tr>
              <td  align="left" bgcolor="<?=$bgcolor?>"><input type="checkbox" name="candidate"  value="" ></td>
              <td  align="left" bgcolor="<?=$bgcolor?>"><?=ucfirst($row['m_fname'])." ".$row['m_lname']?></td>
           
                <td  align="center" bgcolor="<?=$bgcolor?>"><?=employabilityFactor($row['m_id']);?></td>
                <td  align="center" bgcolor="<?=$bgcolor?>"><?=get_column_value($row['m_id'],'ME/MTech');?></td>
                <td  align="center" bgcolor="<?=$bgcolor?>"><?=get_column_value($row['m_id'],'BE/BTech');?></td>
                <td align="center" bgcolor="<?=$bgcolor?>"><?=get_column_value($row['m_id'],'12th');?></td>
                <td  align="center" bgcolor="<?=$bgcolor?>"><?=get_column_value($row['m_id'],'10th');?></td>
                <td  align="center" bgcolor="<?=$bgcolor?>"><?=get_other_qualification($row['m_id'],'Msc');?></td>
                <td  align="center" bgcolor="<?=$bgcolor?>"><?=get_year_passing($row['m_id']);?></td>
                     	
              <td  align="center" bgcolor="<?=$bgcolor?>"><?=ucfirst($row['m_city'])?></td>			
          <td  align="center" bgcolor="<?=$bgcolor?>">
		  <a href="#" onclick="GB_showCenter('Summary of <?=strtoupper($row['m_fname'])." ".strtoupper($row['m_lname'])?>','<?=$server_url?>candidate_summary.php?m_id=<?=$row['m_id']?>',400,750);"><img src="images/views.jpg" border="0"></img></a>
		  </td>
              </tr>
           

          	<? }
		
	 		echo "</table>";
		?>
        
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="right"><? if($totalrow>$limit)
			{
		$page="recruiter_menu.php?m_city=".$_REQUEST[m_city]."&qua_id=".$_REQUEST[qua_id]."&branch_name=".$_REQUEST[branch_name];
		searchPagenation($totalrow,$limit,$png,$page);
			}?></div></td>
 
  </tr>
</table>

		<?
  } else
	 {
	   echo "<h4>Records Not Found....</h4>";
	 }
	 	echo "</td></tr></table>";
				
?>
 			

	</div>
  </div>

</div><!--end of right_maincontent-->
<?php //include "left_con.php" ?>


</div><!--end of main_content-->

    
   
<? include "includes/footer.php" ?>

</div> <!--end of main_div-->
</body>
</html>