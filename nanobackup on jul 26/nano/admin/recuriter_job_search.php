<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php');  
	//include_once('../classes/recruiter.class.php');  
	   
	$input=new inputFields();	
	$ch=new checkInputFields();	
	$db=new dataBase();
	$rec = new recruiter();
	$db->connectDB(); 
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
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                </tr>
				<tr><td width="20%" valign="top">
				<? include("admin_navigation.php");?>
				
				
				</td>
				<td width="80%" valign="top" >
				
			
		
				<table width="100%"  border="0" cellpadding="0" cellspacing="0">
                  <tr>
                  </tr>
                  <tr>
				  <tr>
                  <td colspan="5" class="heading_new">&nbsp; </td>
                   </tr> 
                    <td colspan="5" class="text11red"><div align="center">
                     
                    </div></td>
                  </tr>
				  
<form name="mainform" id="mainform"  method="post" action="#" style="padding:25px 0px;">
<!-- first name table -->
<tr>
<td colspan="6" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<label for="search" style="position:relative;text-align: center;">Search for&nbsp;:</label>
<input type="text" name="search" id="search" value="" >
<input type="submit" name="submit" value="Find" style="position:relative;width:70px;" />
<!--<label>(Search by Name,City)</label>-->

</td>
</tr>
</form>
                                  
                                
    </table>
           
 
<!-- form ends here -->


<?php



if($_POST["submit"]=="Find" )
{

//$query="SELECT * FROM rv_recruiters ORDER BY r_id DESC";

if($_POST["search"]!='')
	{
$query="select * from rv_job_posting where jp_description like '".$_POST["search"]."%' OR  jp_job_title like '".$_POST["search"]."%'
 ORDER BY r_id DESC";
	}



$res=mysql_query($query);
$num=mysql_num_rows($res);
$orgid=array();
$orgname=array();
$orgdoe=array();
$orgemail=array();

$i=0;
$j=0;
if($num>0)
{
$k=ceil($num/10);

while($rows=mysql_fetch_assoc($res))
{
	$commonid[$i]=$rows['jp_id'];
	$commonusername[$i]=$rows['jp_description'];
	$commoncname[$i]=$rows['jp_job_title'];
	$i++;
}
$commonid1=array_chunk($commonid,10);
$commonusername1=array_chunk($commonusername,10);
$commoncname1=array_chunk($commoncname,10);
}
else
{
echo "<br /><br /><b style='color:#ff0000;'>Record not found</b>";
}
}
?>
	<?php
for($j=0;$j<$k;$j++)
{
?>
<!-- second table starts here -->
<table width="95%" align="center">
<tr>
                <td align="left" valign="top">&nbsp;</td>
                </tr>
 <tr height="25">
	<td  width="8%" class="sub_link" align="left"> Title</td>
	<td  width="10%" class="sub_link" align="left">	Job description</td>

			<!--	<td width="7%"  align="left" class="sub_link">Delete</td>-->
	
	</tr>
	<tr>
                    <td style="height:1px; background:#666600;" colspan="6"></td>
                  </tr>

<?php
	for($i=0;$commonid1[$j][$i]!="";$i++)
	{
?>
 <tr height="25">
 <td class="text10" ><?php echo $commoncname1[$j][$i];?></td>
	<td class="text10"><?php echo $commonusername1[$j][$i];?></td>
	<!--
	<td><div align="left"><a href="<?php echo $_SERVER['PHP_SELF'];?>?j_id=<?=$jobapp->jp_id;?>&mode=3" onclick="return toDelete();"><img src="../images/error.png" border="0" /></a></div></td>-->
	
	
	<tr>
                    <td style="height:1px; background:#666600;" colspan="6"></td>
                  </tr>

	

</tr>
<?php
}
?>
</table>
<!-- second table ends here -->

<?php
}
?>
	  </table></td>
  </tr>
	      
			
                               
               
		
      <tr>
        <td height="37" colspan="3" align="center" valign="middle" background="../images/footer_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20">&nbsp;</td>
            <td align="left" valign="middle" class="copyright">A unit of Rashtreeya Sikshana Samiti Trust.</td>
            <td align="right" valign="middle" class="copyright">All rights reserved, Copyright  RV-VLSI Design Center.</td>
            <td width="20">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
	   </table>
	  </body>
</html>