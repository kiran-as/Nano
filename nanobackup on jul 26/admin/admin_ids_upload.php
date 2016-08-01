<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('reader.php'); // include the class
   $data = new Spreadsheet_Excel_Reader(); // instantiate the object
   $data->setOutputEncoding('CP1251'); // select output encoding
   
		$db=new dataBase();
   $db->connectDB();    
   $input=new inputFields();	
    $ch=new checkInputFields();	


 
	   
	   
  
?>
<?php
		
if(isset($_POST[Add]))
   		{
		$total_ids=explode(',',$_POST[txtIds]);


  for ($r =0;$r<count($total_ids);$r++) 
  {
$insert_query="INSERT INTO rv_members_ids set rm_mem_id = '".strtoupper($total_ids[$r])."',rm_status='0',rm_title = '".strtoupper($_POST[txtTitle])."'";
mysql_query($insert_query) or die("insert error".mysql_error());
  }

header("Location: admin_ids_upload.php?msg=1");		
		}

if(isset($_POST[Update]))
   		{
		$total_ids=explode(',',$_POST[txtIds]);
//mysql_query("delete from rv_members_ids where rm_title = '".strtoupper($_POST[txtTitle])."'") or die("deleting error".mysql_error());

  for ($r =0;$r<count($total_ids);$r++) 
  {
$insert_query="INSERT INTO rv_members_ids set rm_mem_id = '".strtoupper($total_ids[$r])."',rm_status='0',rm_title = '".strtoupper($_REQUEST[rm_title])."'";
mysql_query($insert_query) or die("insert error".mysql_error());
  }

header("Location: admin_ids_upload.php?msg=1");		
		}		
		
if($_REQUEST[action]=='delete' & $_REQUEST[rm_title]!=''){

mysql_query("delete from rv_members_ids where rm_title='".$_REQUEST[rm_title]."'") or die("deleting  error".mysql_error());


}		

if($_REQUEST[action]=='sendmail' && is_numeric($_REQUEST[id])!=''){
	 $students=$db->getResults("select m_id,m_fname,m_lname,m_emailid from rv_registration where m_id ='".$_REQUEST[id]."' ");
$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
						$headers.=    "From: \"Nanochip Solutions - Unassined Member ID\" <inf@$nanochipsolutions..com>\r\n" ;
		        $to=$students[0]->m_emailid;
				$subject='Unassigned Member ID';	
				
				$message='<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td><a href="http://nanochipsolutions.com/"><img src="http://nanochipsolutions.com/images/Nanologo.jpg" border="0"></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Hi &nbsp;'.$students[0]->m_fname.'&nbsp;'.$students[0]->m_lname.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>You have misused member ID provided by RVVLSI, so we have unasigned your member ID to your profile. For more details contact Nanochip Solution Admin.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Thanks,</td>
  </tr>
  <tr>
    <td width="36%">Nanochip Solution Team</td>
  </tr>
 
  
    
</table>';

	mail($to, $subject, $message, $headers);
	//die("update $members_table set m_student ='' where m_id='".$students[0]->m_id."'");
	$db->insertRecord("update $members_table set m_student ='' where m_id='".$students[0]->m_id."'");	
	$db->insertRecord("update rv_members_ids set rm_status='0',m_id='0' where rm_mem_id='".$_REQUEST[UID]."'"); 
	header("Location: admin_ids_upload.php");
	}
	
if($_REQUEST[action]=='DeletesubID' && $_REQUEST[UID]!=''){

	$db->insertRecord("delete from rv_members_ids  where rm_mem_id='".$_REQUEST[UID]."'"); 
	header("Location: admin_ids_upload.php");
	}
	
	
	
	
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RV-VLSI Design Center</title>
<style type="text/css">

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.balu
{
color:#FF0000;
}

</style>

<link href="../rv_main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" >
function qualifications_validation()
			{
				//alert("sdgdsf");
			var frm=document.txtForm;
			
				if(frm.txtQualification.value=='')
					 {
					alert("Please enter Course");
					frm.txtQualification.focus();
					return false;
					 }
					 
					  else if (frm.selQual.value=='0')
					 {
				alert("Please select Qulification ");
					frm.selQual.focus();
					return false;
					 }
					 else if (frm.txtSelect.value=='0')
					 {
				alert("Please select status ");
					frm.txtSelect.focus();
					return false;
					 }
			}
			
			
			   function toedit(){
							var ok;
							ok = window.confirm('Do you really want to Edit ?');
							if(ok){
								return true;
							}else{
								return false;
							}
							}
</script>
               <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".comment_button").click(function(){

var element = $(this);
var I = element.attr("id");

$("#slidepanel"+I).slideToggle(300);
$(this).toggleClass("active"); 

return false;});});


   function toAssign(){
							var ok;
							ok = window.confirm('Do you really want unassigned this member ID ?');
							if(ok){
								return true;
							}else{
								return false;
							}
							}
							
								function toDelete(){
							var ok;
							ok = window.confirm('Do you really want to Delete ?');
							if(ok){
								return true;
							}
							else{
								return false;
							}
							
							
							}
</script>
<style>
a
	{
	text-decoration:none;
	color:#d02b55;
	}
	a:hover
	{
	text-decoration:underline;
	color:#d02b55;
	}
	.panel
	{
	margin-left:10px; margin-right:0px; margin-bottom:15px; background-color:#D3E7F5;  padding:6px; 
	display:none;
	}
</style>
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
			<table width="98%" height="167" border="0" cellpadding="0" cellspacing="0">
			<tr>
            <td>&nbsp;  </td>
          </tr>
            <tr><td width="29%" height="167" valign="top">
				<? include("admin_navigation.php");?>
			</td>	  
               
				

<td width="71%" valign="top" ><? if($_REQUEST[action]=='add' || $_REQUEST[action]=='edit'){

 echo $input->formStart('txtForm','','onSubmit="return qualifications_validation();"');?>
<table width="537">
  <tr>
    <td colspan="3" class="heading_new">Add IDs  </td>
  </tr>
 <tr>
 <td>&nbsp;</td>
 <td colspan="2"><div align="right" class="balu">* Indicates required field</div></td>
 </tr>
<!--<tr>
<td width="103" class = text10>Excel File  : </td>
<td width="233"><input type="file" name="excelFile" /></td> 
<td width="185" class="balu"> *</td>
</tr>-->
<tr>
  <td class="text10" valign="top">Floder Name: </td>
  <td valign="top"><input type="text" name="txtTitle" id="txtTitle" value="<?=$_REQUEST[rm_title]?>" <?=$_REQUEST[rm_title]!=''?'disabled':''?>/></td>
  <td class="balu" valign="top">&nbsp;</td>
</tr>
<tr>
<td width="81" class="text10" valign="top"> ID's  : </td>
<td width="365" valign="top"><textarea name="txtIds" id="txtIds" cols="50" rows="10"><? /*$ids_edit_query=mysql_query("select * from rv_members_ids where rm_title='".$_REQUEST[rm_title]."' order by rm_mem_id asc ") or die("edit fetching eror".mysql_error());
while($ids_edit=mysql_fetch_array($ids_edit_query)){
echo $ids_edit[rm_mem_id].",";
}*/?></textarea></td> 
<td width="75" class="balu" valign="top"> *</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td class="sub_link">Enter ID's by comma( , ) separate.</td>
</tr>
<tr>
  <td>&nbsp;</td>
<td><?
if($_REQUEST[action]=='add'){
$str='Add';
}else{
$str='Update';
}
echo $input->submitButton($str,$str,'text', 'style=background-color:#424843;color:#ffffff;margin-left:50px');?></td>
</tr>
</table>
<? echo $input->formEnd();
}else{
?> 
<table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="41%" class="heading_new"><strong>Members ID's </strong></td>
    <td width="21%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
    <td width="9%">&nbsp;</td>
    <td width="12%"><div align="right"><a href="admin_ids_upload.php?action=add" class="link_green">New ID's</a></div></td>
  </tr>
	 <tr>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   <td><div align="center"></div></td>
	   </tr>
	 <tr>
      <td class="sub_link"><strong>Member ID </strong></td>
      <td class="sub_link">&nbsp;</td>
      <td class="sub_link">&nbsp;</td>
      <td class="sub_link"><div align="center"><strong>Edit</strong></div></td>
      <td class="sub_link"><div align="center"><strong>Delete</strong></div></td>
    </tr><tr>
    <td colspan="5" style=" background-color:#ccc; height:1px;"></td>
    </tr><? 
	$ids_query=" select * from rv_members_ids group by  rm_title ";

$result=mysql_query($ids_query);

$totalrow=mysql_num_rows($result);



$limit=20;



			$png=$_REQUEST['png'];

			

			if(empty($png)){

			

      			  $png = 1;

    			} 

				

	        $limitvalue = ($png * $limit )- ($limit);  

			 $ids_query.= " order  by rm_id desc  LIMIT $limitvalue, $limit  ";
	$ids_results=mysql_query($ids_query) or die("culnot select:".mysql_error());

   $num_rows=mysql_num_rows($ids_results);
	
				  while($ids_row=mysql_fetch_array($ids_results))
				  		{?>
   
    <tr>
    <td class="text10"><a href="#" class="comment_button" id="<?=$ids_row[rm_title]?>"><?=$ids_row[rm_title]?></a></td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="admin_ids_upload.php?action=edit&rm_title=<?=$ids_row[rm_title]?>">
	      <img src="<?=$server_url?>images/edit.png" border="0" onClick="return toedit();" align=""></a></td>
         
    <td><div align="center"><a href="admin_ids_upload.php?action=delete&rm_title=<?=$ids_row[rm_title]?>"><img src="../images/error.png" border="0" onclick="return toDelete();" /></a>&nbsp;</div></td>
  </tr>
  <tr>
    <td colspan="5" style=" background-color:#ccc; height:1px;"></td>
    </tr>

  
    <tr>
      <td colspan="5"><div class='panel' id="slidepanel<?=$ids_row[rm_title]?>"><table width="99%" border="0" cellspacing="0" cellpadding="0">
		<tr><td colspan="4" style=" background-color:#ccc; height:1px;"></td></tr><tr>
	  <td class="text10" height="25">ID</td>
	  <td align="center">Assigned to</td>
	  <td align="center">Unassigned</td>
	  <td align="center">Delete</td>
  </tr>	<tr><td colspan="4" style=" background-color:#ccc; height:1px;"></td></tr><? $div_roll_query=mysql_query("select * from rv_members_ids where rm_title='".$ids_row[rm_title]."' order by rm_mem_id asc") or die("culnot select:".mysql_error());
	  while($div_roll=mysql_fetch_array($div_roll_query)){?>
	<tr> <td class="text10" width="39%" height="25"><?=$div_roll[rm_mem_id]?></a></td>
    <td width="22%"><div align="center"><? 
    $result_students=$db->getResults("select m_id,m_fname,m_lname from rv_registration where m_student ='".$div_roll[rm_mem_id]."' ");?>
	<a href="resume_temp.php?m_id=<?=$result_students[0]->m_id?>" target="_blank" class="link_green"><?=stripslashes($result_students[0]->m_fname).' '.stripslashes($result_students[0]->m_lname); ?></a></div></td>
    <td width="20%" align="center"><a href="admin_ids_upload.php?action=sendmail&id=<?=$result_students[0]->m_id?>&UID=<?=$div_roll[rm_mem_id]?>"><img src="../images/assign.png" border="0"  onClick="return toAssign();" alt="Unassign" title="Unassign" /></a></td>   
    <td width="19%" align="center"><a href="admin_ids_upload.php?action=DeletesubID&UID=<?=$div_roll[rm_mem_id]?>"><img src="../images/error.png" border="0" onclick="return toDelete();" /></a></td></tr>
	<tr><td colspan="4" style=" background-color:#ccc; height:1px;"></td></tr>
	
	<? }?></table></div></td>
    </tr>	<? }?>
    <tr>
    <td colspan="5">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" align="right"><? 
				if($totalrow>$limit)
					{
					$page="admin_ids_upload.php";

					pagenation($totalrow,$limit,$png,$page);
					}
				?> </td>
    </tr>
</table>


<? }
?></td>	                     
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
