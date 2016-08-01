<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	   
	   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

 if($_REQUEST[action]==delete)
	{
	//echo "delete from rv_registration where m_id ='$_REQUEST[m_id]'"; die;
	mysql_query("delete from rv_registration where m_id = '$_REQUEST[m_id]' ") or die("culdnot delete:".mysql_error());
	
	header("location:".$_SERVER['PHP_SELF']."?msg=3");
	}


	   
	   
  
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RV-VLSI Design Center</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script type="text/javascript" src="../js/admin_validation.js"></script>
<link href="../rv_main.css" rel="stylesheet" type="text/css" />


</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top">
<table width="100%" height="557" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="111"><a href="admin_home.php"><img src="../images/Nanologo.jpg"   border="0" /></a></td>
                <td width="55">&nbsp;</td>
                <td width="88" align="left" valign="middle">&nbsp;</td>
                <td align="left" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="bottom"></td>
                  </tr>
				  <tr><td width="20%"></td><td width="1px" style="background-color:#999999"></td><td width="78%"></td></tr>
 </table></td>
                <td width="332" align="right" valign="bottom" class="link_green" style="padding-bottom:5px;">&nbsp;</td>
              </tr>
 </table></td>
          </tr>
          
          <tr>
            <td align="left" valign="top" style="background:#CCCCCC; height:2px;" ></td>
          </tr>
		   
          <tr>
            <td align="left" valign="top">
			<table width="111%" height="167" border="0" cellpadding="0" cellspacing="0">
			<tr>
            <td>&nbsp;  </td>
          </tr>
            <tr><td width="20%" height="167" valign="top">
				<? include("admin_navigation.php");?>
			</td>	  
               
				
				

<td width="80%" valign="top" >
<table width="100%" height="76" border="0" cellpadding="0" cellspacing="0">
<form name="mainform" id="mainform"  method="post" action="admin_manage_students.php" style="padding:25px 0px;">
<!-- first name table -->
<tr>
<td colspan="6" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<label for="search" style="position:relative;text-align: center;">Search for&nbsp;:</label>
<input name="txtSearch" type="text"  style="width:200px;" value="<? if($_REQUEST['txtSearch']!='') echo $_REQUEST['txtSearch']; else echo "Search by Title"; ?>" onClick="this.value=''" >
<input type="submit" name="submit" value="Search" style="background-color:#424843;color:#ffffff;" />
<!--<label>(Search by Name,City)</label>-->

</td>
</tr>
</form>
<tr>
<td colspan="5" class="heading_new">Manage Candidates </td>
 </tr>   
 <tr>
<td colspan="5" class="heading_new">&nbsp;</td>
 </tr>               
  <tr height="25"> 
    <td width="26%" height="37"  class="slider" >Name</td>
    <td width="28%" class="slider">Email Id</td>
	<td width="24%" class="slider" align="center">Resume View</td>
	<td width="12%" class="slider"><div align="center">Rv-Vlsi Students</div></td>
	<td width="10%" class="slider" ><div align="center">Delete</div></td>
  </tr>
 <tr><td style="height:1px; background:#666600;" colspan="5"></td></tr>	
  <? 
 
  //$query ="select m_fname, m_emailid, m_phone, m_id from rv_registration";
  //$query ="select m_fname, m_emailid, m_phone, m_id from rv_registration";
  $query=" select * from rv_registration ";
 
   
   if($_REQUEST['txtSearch']!='')
   			{
			
			
			$searchKey=urldecode($_REQUEST['txtSearch']);
		$query.=" where m_fname like '%$searchKey%' or 	m_lname like '%$searchKey%' or m_city like '%$searchKey%' or m_emailid like '%$searchKey%'	or m_student like '%$searchKey%' ";
			}
			
  $result_students=$db->getResults($query);
  $totalrow=count($result_students);	
$limit=20;
		$png=$_REQUEST['png'];
			if(empty($png)){
      			  $png = 1;
    			} 
	        $limitvalue = ($png * $limit )- ($limit);  
		$query.=" order  by m_id desc  LIMIT $limitvalue, $limit ";
    $result_students=$db->getResults($query);
	 $num_rows=count($result_students);
	 if($num_rows==0){
	 echo '<tr  class="text10"><td colspan="5" align="center"><strong>No Results Found</strong></td></tr>';
	 
	 }
	foreach($result_students as $students) {
  ?>
<tr height="25">
    <td height="25" class="text10" ><?=$students->m_fname?></td>
    <td height="25" class="text10" ><?=$students->m_emailid?></td>
 	<td  class="text10"><div align="center"><a href="resume_temp.php?m_id=<?=$students->m_id?>" ><img src="../images/edit.png" border="0" /></a></div></td>
	<td  class="text10"><div align="center"><?=rvStudents($students->m_id);?></div></td>
	<td  class="text10"><div align="center"><a href="admin_manage_students.php?action=delete&m_id=<?=$students->m_id?>" onclick="return toDelete();"><img src="../images/error.png" border="0" /></a></div></td>
</tr>
<tr  class="text10"><td style="height:1px; background:#666600;" colspan="5"></td></tr>	
 <? }?><tr  class="text10"><td colspan="5" align="right"><? 
				if($totalrow>$limit)
					{
					$page="admin_manage_students.php";

					pagenation($totalrow,$limit,$png,$page);
					}
				?> </td></tr>	
</table>             
</td>	                     
</tr>                       
</table>
     
				</td>
			  </tr>
				<tr><td></td></tr>
            </table></td>
        </tr>
      </table></td>
        <td width="20">&nbsp;</td>
      </tr>
      
      <tr>
        <td height="37" colspan="3" align="center" valign="middle" background="../images/footer_bg.jpg">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20">&nbsp;</td>
            <td align="left" valign="middle" class="copyright">A unit of Rashtreeya Sikshana Samiti Trust.</td>
            <td align="right" valign="middle" class="copyright">All rights reserved, Copyright © RV-VLSI Design Center.</td>
            <td width="20">&nbsp;</td>
          </tr>
        </table>
		</td>
       </tr>
</table>

</body>
</html>
