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

 $query ="SELECT distinct edu.m_id,
							mem.m_id,mem.m_fname,mem.m_lname,mem.m_city,mem.m_resume_id
							FROM $members_table mem,$education_table edu where  mem.m_id=edu.m_id ";

 
if($_REQUEST[m_city]!='0'){
$query.=" and  mem.m_city='".$_REQUEST[m_city]."' ";
}

if($_REQUEST[selCourse]!='0'){
$query.=" and  edu.e_course='".$_REQUEST[selCourse]."' ";

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
<script type="text/javascript">
function loadXMLDoc(str)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","myajax.php?id="+str,true);
xmlhttp.send();
}
</script>

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
<style type="text/css">

a.active
{
	color: #114981;
	font-size:14px;
	text-decoration:none;
}
</style>

<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="ddlevelsmenu-base.css" type="text/css" />
<link href="css/job_portal.css" rel="stylesheet" type="text/css" />
<link href="rv_main.css" rel="stylesheet" type="text/css" />
<div style="float:left; width:980px; margin:0px; padding:0px;">

<div class="main_content">
    <div class="candidate_inner">
    <ul>
    <a href="statistics.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Dash Board</div>
    <div class="nanohdrightdefault"></div></li></a>
    <a href="jobposting_form.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Manage Job Posting</div>
    <div class="nanohdrightdefault"></div></li></a>
    <a href="recruiter_menu.php" style="text-decoration:none;"><li style="border-bottom:1px solid #333; margin-bottom:-1px;">
    <div class="candidate_nanohdleft">
    </div><div class="candidate_nanohdmid">Search</div>
    <div class="candidate_nanohdright"></div> </li></a>
    <a href="recuirter_editprofile.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Edit Profile</div>
    <div class="nanohdrightdefault"></div> </li></a>
    <a href="recruiter_logout.php" style="text-decoration:none;"><li>
    <div class="nanohdleftdefault"></div>
    <div class="nanohdmiddefault">Logout</div>
    <div class="nanohdrightdefault"></div> </li></a>
    </ul>
    
    </div>

</div>


<div style="width:980px; padding:5px 0px; float:left;">
<div class="search_maincontent">
<div class="searchcontainer_left">

<form name="searchForm" method="post" action="#" onsubmit="return searchValidation();">

<div style="float:left;">
              <p class="h3class"> SEARCH </p>

             <p>
                   <select name="m_city" style=" width:120px; font-style:normal; font-family:Arial, Helvetica, sans-serif;" id="m_city">
                     <option value="0">Select City</option>

                     <?
					  $query=mysql_query("SELECT distinct mem.m_city FROM $members_table mem,$education_table edu where  mem.m_id=edu.m_id");
					   while($value=mysql_fetch_assoc($query))
					   {
						   ?>
                           <option value="<?=$value['m_city']?>" <?=$_REQUEST['m_city']==$value['m_city']?'selected':''?>><?=ucfirst(strtolower($value['m_city']))?></option>
                           <?
					   }
					 ?>
                   </select>
                 </p>
              
           <p>
            <select name="qua_id"  style="width:120px; font-style:normal; font-family:Arial, Helvetica, sans-serif;" id="qua_id" onchange="loadXMLDoc(this.value)">
               <!--<select name="qua_id" onchange="window.location.href='myajax.php this.form.qua_id.options[this.form.qua_id.selectedIndex].value">-->
               <option value="0">Qualification </option>
                <?
					  $query=mysql_query("SELECT distinct * from rv_qualifications");
					   while($qualifications=mysql_fetch_assoc($query))
					   {
						   ?>
                           <option value="<?=$qualifications['qua_id']?>"><?=$qualifications['qua_title']?></option>                            
                         
                           <?
					   }
					   
					 ?>
                      
             </select>
          
             <div id="myDiv"><select name="selCourse"  style="width:120px; " id="corid" >
            
               <option value="0">select Qualification</option>
      
                      
             </select></div>
             
           </p>
           
                         
                 
                 <p>
                    <input name="searchResults" type="submit" value="" style="background-image:url(images/gobg.png); background-repeat:no-repeat; width:53px; height:23px; border:none; margin:0px 0px -5px 30px;"/>
                 </p>
      </form>
      </div>
      </div>
      <div class="searchcontainer_right"> 
<div class="searchtopcurve">
 <div class="recruitleftbg"></div>
 <div class="searchmidbg"></div>
 <div class="recruitrightbg"></div>
 </div>
		<? 
      
              
   if(mysql_num_rows($result)!="0")
   {
           ?>
         <table border='0' cellpadding="0" cellspacing="0" bordercolor='#eee' style="background-color:#f3e1e1; width:832px; border-left:1px solid #736f6f; border-right:1px solid #736f6f; float:left;">
        
        <tr>
         <td width="100%" style="font-size:14px;">
				<table width="100%" cellspacing="0" cellpadding="0" >
                <tr>
              <td width="15%" colspan="11" style="color:#114981; font-weight:bold; padding-left:10px; background-color:#f3e1e1;">Total Results Found  -  <?=$totalrow?></td>
            </tr>
            <tr  style="background-color:#f3e1e1;">
            <td width="9%" align="left"   style="font-weight:bold;"> Resume Id</td>
              <td width="16%" align="left"   style="font-weight:bold; font-size:13px; font-family:calibri;">Full Name</td>
            
            <td width="15%" align="center" style="font-weight:bold; font-size:13px; font-family:calibri;">Employability Factor</td>
            <td width="7%" align="center" style="font-weight:bold; font-size:13px; font-family:calibri;">MTech %</td>
             <td width="7%" align="center"   style="font-weight:bold; font-size:13px; font-family:calibri;">BTech %</td>
            <td width="7%" align="center" style="font-weight:bold; font-size:13px; font-family:calibri;">12th %</td>
            <td width="9%" align="center" style="font-weight:bold; font-size:13px; font-family:calibri;">10th %</td>
           <td width="15%" align="center" style="font-weight:bold; font-size:13px; font-family:calibri;">Other Qualification</td>
            <td width="18%" align="center" style="font-weight:bold; font-size:13px; font-family:calibri;">Year Of Passing</td>

              <td width="7%" align="center" style="font-weight:bold; font-size:13px; font-family:calibri;">City</td>
            </tr><?

         	/*$query="select $members_table.* from $members_table $search order by m_id asc limit $eu, $limit ";
       		$result=mysql_query($query);
        	echo mysql_error();*/
        	$bgcolor="#fcf2f2";
          	while($row = mysql_fetch_array($result))
          	{
              if($bgcolor=='#fcf2f2')
              {
                  $bgcolor='#ffffff';
              }
              
                else
                {
                    $bgcolor='#fcf2f2';
                }
              
				   $query=mysql_query("SELECT qua_id FROM `rv_educational_details` WHERE `m_id`='".$row['m_id']."'");
				   while($quaId=mysql_fetch_array($query))
				   {
					$quallist[]=$quaId['qua_id'];				 			    
				  }
						
				  ?>
				 <tr>
              <td  align="center" bgcolor="<?=$bgcolor?>"><?=$row['m_resume_id']?></td>
              <td  align="left" bgcolor="<?=$bgcolor?>" style="font-size:12px; font-family:calibri; font-weight:normal;"><?=ucfirst($row['m_fname'])." ".$row['m_lname']?></td>
           
                <td  align="center" bgcolor="<?=$bgcolor?>" style="font-size:12px; font-family:calibri; font-weight:normal;"><?=employabilityFactor($row['m_id']);?></td>
                <td  align="center" bgcolor="<?=$bgcolor?>" style="font-size:12px; font-family:calibri; font-weight:normal;"><?
                
				$keytenth=in_array('1',$quallist);
					    if($keytenth=='1')
						{
							$query=mysql_query("SELECT e_percentage FROM `rv_educational_details` WHERE `m_id`='".$row['m_id']."' AND `qua_id`='1'");
							$fetch=mysql_fetch_assoc($query);
							echo $pecentage=$fetch['e_percentage'];
						}else {echo "-";			}
				
				?>
              </td>
                <td  align="center" bgcolor="<?=$bgcolor?>" style="font-size:12px; font-family:calibri; font-weight:normal;"><?
                $keytenth=in_array('2',$quallist);
					    if($keytenth=='1')
						{
							$query=mysql_query("SELECT e_percentage FROM `rv_educational_details` WHERE `m_id`='".$row['m_id']."' AND `qua_id`='2'");
							$fetch=mysql_fetch_assoc($query);
							echo $pecentage=$fetch['e_percentage'];
						}else {echo "-";			}
				
				?></td>
                <td align="center" bgcolor="<?=$bgcolor?>" style="font-size:12px; font-family:calibri; font-weight:normal;"><?
                
				$keytenth=in_array('4',$quallist);
					    if($keytenth=='1')
						{
							$query=mysql_query("SELECT e_percentage FROM `rv_educational_details` WHERE `m_id`='".$row['m_id']."' AND `qua_id`='4'");
							$fetch=mysql_fetch_assoc($query);
							echo $pecentage=$fetch['e_percentage'];
						}else {echo "-";			}
				
				?></td>
                <td  align="center" bgcolor="<?=$bgcolor?>" style="font-size:12px; font-family:calibri; font-weight:normal;"><?
                
				$keytenth=in_array('5',$quallist);
					    if($keytenth=='1')
						{
							$query=mysql_query("SELECT e_percentage FROM `rv_educational_details` WHERE `m_id`='".$row['m_id']."' AND `qua_id`='5'");
							$fetch=mysql_fetch_assoc($query);
							echo $pecentage=$fetch['e_percentage'];
						}else {echo "-";			}
						?></td>
                <td  align="center" bgcolor="<?=$bgcolor?>" style="font-size:12px; font-family:calibri; font-weight:normal;"><?=get_other_qualification($row['m_id'],'Msc');?></td>
                <td  align="center" bgcolor="<?=$bgcolor?>" style="font-size:12px; font-family:calibri; font-weight:normal;"><?=get_year_passing($row['m_id']);?></td>
                     	
              <td  align="center" bgcolor="<?=$bgcolor?>" style="font-size:12px; font-family:calibri; font-weight:normal;"><?=ucfirst($row['m_city'])?></td>			
         <!-- <td  align="center" bgcolor="<?=$bgcolor?>" style="font-size:12px; font-family:calibri; font-weight:normal;">
		  <a href="#" onclick="GB_showCenter('Summary of <?=strtoupper($row['m_fname'])." ".strtoupper($row['m_lname'])?>','<?=$server_url?>candidate_summary.php?m_id=<?=$row['m_id']?>',400,750);"><img src="images/views.jpg" border="0"></img></a>
		  </td>-->
              </tr>
           

          	<? }
		
	 		echo "</table>";
		?>
        
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-right:8px; background-color:#ffffff;">
    <div align="right">
	<?	if($totalrow>$limit)
			{
		 $page="recruiter_menu.php?m_city=".$_REQUEST[m_city]."&qua_id=".$_REQUEST[qua_id]."&branch_name=".$_REQUEST[branch_name]."&png=";
		 $input->searchPagenations($totalrow,$limit,$png,$page);
			}?>
          </div>
     </td>
 
  </tr>
</table>
</table>
<?
  } else
	 { ?>
     <table border='0' cellpadding="0" cellspacing="0" bordercolor='#eee' style="background-color:#f3e1e1; width:832px; border-left:1px solid #736f6f; border-right:1px solid #736f6f; ">
     <tr>
     <td align="center" height="168px" style="color:#114981; font-size:25px;"><h4>Records Not Found...</h4></td>
     </tr>
     </table>
	   
	<? }
	 ?>
    
	 </td></tr></table>
		
 			
<div class="searchtopcurve">
 <div class="recruitleftbtbg"></div>
 <div class="searchmidbtbg"></div>
 <div class="recruitrightbtbg"></div>
 </div>
	</div>
</div>


</div>



 

  </div>

</div><!--end of right_maincontent-->
<?php //include "left_con.php" ?>

<? include "includes/footer.php" ?>
</div><!--end of main_content-->




</div> <!--end of main_div-->
</body>
</html>