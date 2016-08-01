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

$query ="SELECT distinct 
mem.m_id,mem.m_fname,mem.m_lname
FROM $members_table mem,$education_table1 edu where  mem.m_id=edu.m_id";
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
<table width="960px" cellpadding="0" cellspacing="" >
<tr>
<td width="141"><h3 class="h3class">Dash Board</h3></td>
<td width="108"><a href="#" class="dash_boardmenu" ><strong>Edit Profile</strong></a></td>
<td width="166"><a href="#" class="dash_boardmenu" ><strong>Manage Job Posting</strong></a></td>
<td width="95"><a href="statistics.php" class="dash_boardmenu" ><strong>Statistics</strong></a></td>
<td width="80"><a href="recruiter_menu.php" class="dash_boardmenu" ><strong>Search</strong></a></td>
<td width="157"><a href="#" class="dash_boardmenu" ><strong>Change Password</strong></a></td>
<td width="72" ><a href="recruiter_logout.php" class="dash_boardmenu" ><strong>Logout</strong></a></td>
<td width="139"><h3 class="h3class" style="float:right; text-align:right">Welcome &nbsp;&nbsp;<?=ucfirst($_SESSION['username']);?></h3></td>
</tr>
</table>
</div>
<div class="rightimg_right"></div>
</div>
<div class="main_container" style="width:980px; padding:10px 0px;">
<table  width="100%"   cellspacing="0" cellpadding="3" style="border:1px solid #cccccc;">
<tr style="background-color:#dddce2;">
<td width="7%" align="center"   style="font-weight:bold;"><input type="checkbox" name="candidate" value="" onclick="checkAll(this)" ></td>
<td width="10%" align="center"   style="font-weight:bold;">Student Id</td>
<td width="15%" align="center" style="font-weight:bold;">Student Name</td>
<td width="7%" align="center" style="font-weight:bold;">Employability Factor</td>
<td width="7%" align="center" style="font-weight:bold;">MTech %</td>
<td width="7%" align="center"   style="font-weight:bold;">BTech %</td>
<td width="7%" align="center" style="font-weight:bold;">12th %</td>
<td width="7%" align="center" style="font-weight:bold;">10th %</td>
<td width="15%" align="center" style="font-weight:bold;">Other Qualification</td>
<td width="15%" align="center" style="font-weight:bold;">Year Of Passing</td>
<td width="15%" align="center" style="font-weight:bold;">Details</td>
            
</tr>
<?  
$bgcolor="#eee";
while($row=mysql_fetch_assoc($result))
{	
 if($bgcolor=='#eee')
              {
                  $bgcolor='#ffffff';
              }
              
                else
                {
                    $bgcolor='#eee';
                }
?>
<tr style="background-color:#dddce2;">
<td width="7%" align="center" bgcolor="<?=$bgcolor?>" ><input type="checkbox" name="candidate"  value="<?=$row['m_id']?>" ></td>
<td width="7%" align="center" bgcolor="<?=$bgcolor?>" ><?=$row['m_id']?></td>
<td width="15%" align="left" bgcolor="<?=$bgcolor?>" ><?=strtoupper($row['m_fname'])." ".strtoupper($row['m_lname'])?></td>
<td width="10%" align="center" bgcolor="<?=$bgcolor?>"><?=employabilityFactor($row['m_id']);?></td>
<td width="10%" align="center" bgcolor="<?=$bgcolor?>"><?=get_column_value($row['m_id'],'ME/MTech');?></td>
<td width="10%" align="center" bgcolor="<?=$bgcolor?>"><?=get_column_value($row['m_id'],'BE/BTech');?></td>
<td width="7%" align="center" bgcolor="<?=$bgcolor?>"><?=get_column_value($row['m_id'],'12th');?></td>
<td width="7%" align="center" bgcolor="<?=$bgcolor?>"><?=get_column_value($row['m_id'],'10th');?></td>
<td width="10%" align="center" bgcolor="<?=$bgcolor?>"><?=get_other_qualification($row['m_id'],'Msc');?></td>
<td width="15%" align="center" bgcolor="<?=$bgcolor?>"><?=get_year_passing($row['m_id']);?></td>
<td  width="15%" align="center" bgcolor="<?=$bgcolor?>">
<a href="#" onclick="GB_showCenter('Summary of <?=strtoupper($row['m_fname'])." ".strtoupper($row['m_lname'])?>','<?=$server_url?>candidate_summary.php?m_id=<?=$row['m_id']?>',400,750);"><img src="images/views.jpg" border="0"></img></a></td>
</tr>
<?
}
?>
<tr>
<td colspan="10" align="right">
<div align="right" style="font-size:14px;">
<? 
if($totalrow>$limit)
			{
		$page="candidate_details.php?s=1";
		searchPagenation($totalrow,$limit,$png,$page);
			}
            ?>
</div>
</td>
</tr>
</table>
  </div>



</div><!--end of right_maincontent-->
<?php //include "left_con.php" ?>


</div><!--end of main_content-->

    
   
<? include "includes/footer.php" ?>

</div> <!--end of main_div-->
</body>
</html>