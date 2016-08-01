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


	if($_REQUEST[action]=='delete' && is_numeric($_REQUEST[uni_id])!='')
 {

 	$delete_query="delete from $universities_table where uni_id='".$_REQUEST[uni_id]."'";
									
 $result=$db->deleteRecord($delete_query);
 header("Location: admin_manage_universities.php?msg=3");
	 				
				}	
				
				if(isset($_POST['ParUpdate']))
				{
					$search_query="select m_id from rv_educational_details where e_course=$_POST[txtCourse] and e_institute=$_POST[selInst] and e_university =$_POST[selUniv]";
					//echo $search_query;die;
					$search_result=$db->getResults($search_query);
  foreach($search_result as $result){
	  $member_query="select m_fname  from rv_registration where  m_id='".$result->m_id."'";
	  
	  $member_result=$db->getResults($member_query);
	 // print_r($member_result);die;
	 foreach($member_result as $mresult){
	// echo $mresult[0]->m_fname;
	 }
	  }
					//echo $_POST;die;
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
<script type="text/javascript" src="ajax.js"></script>


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
				<?
				$query=" select * from $universities_table  order by uni_id desc";

               $result = $db->getResults($query);
				?>
				<td width="80%" valign="top" >
                <form name="searchForm" id="searchForm" action="admin_search.php" method="post" enctype="multipart/form-data">
				<table width="100%">
				<tr>
				  <td colspan="6" class="heading_new">Search</td>
				  </tr>
                  <tr>
				  <td><table width="540">
                  <tr>
    <td width="147" height="1"  class="text" align="right">Qulification :</td>
    <td  height="" width="234"><?=fetchtitle(0)?><span class="error">*</span></td>
</tr> 
                  <tr>
   <td width="147" height="1"  class="text" align="right">Select Your Course : </td>
   <td  height="" width="234"><div id="CourseData">
   <select  class="drop_box" name="txtCourse"><option> Select Your  Course   </option></select> <span class="error">*</span></div>
   </td> 
</tr>
<tr>
 <td width="147" height="1"  class="text" align="right">Institute: </td>
 <td  height="" width="234">
<select name="selInst" style="width:150px;">
                                <option value="0">Select Institute</option>
                            <?  $insttions=$db->getResults("select * from $institutes");
						   foreach($insttions as $inst)
						   {
						   /*if($inst->insti_id==$edit->e_institute)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }*/
						   ?>
                                <option value="<?=$inst->insti_id;?>" <? //$sel?>>
                                  <?=$inst->insti_name;?>
                  </option>
                                <? }?>
                </select>
                
<span class="error">*</span> </td>
</tr>
<tr>
 <td width="147" height="1"  class="text" align="right">University : </td>
 <td  height="" width="234">
<select name="selUniv" style="width:150px;">
                                <option value="0">Select University</option>
                                <?  $insttions=$db->getResults("select * from $universities_table");
						   foreach($insttions as $inst){
						  /* if($inst->uni_id==$edit->e_university){
						   $sel="selected";
						   }else{
						   $sel="";
						   }*/?>
                                <option value="<?=$inst->uni_id;?>" <?//$sel?>>
                                  <?=$inst->uni_name;?>
                  </option>
                                <? }?>
                </select>  <span class="error">*</span></td>
</tr>
<tr><td width="147" height="1"  class="text" align="right">Percentage</td>
<td><input type="text" name="TxtPer" width="20" /></td></tr>
<tr><td width="147" height="1"  class="text" align="right">Experience</td>
<td><input type="text" name="TxtExp" width="20" /></td></tr>
<tr><td width="147" height="1"  class="text" align="right">RV-Vlsi Student or Not</td>
<td><input type="checkbox" name="RvStu" width="20" /></td></tr>
<tr><td>&nbsp;</td>
<td><input type="submit" name="ParUpdate" id="ParUpdate" value="Update" /></td></tr>
</table>
</form></td>
				  </tr>
				<tr>
				  <td colspan="5" class="text11red">
				    <div align="center"><?=messaging($_REQUEST[msg]);?></div></td>
				  </tr>
				<tr>
				  <td colspan="5" class="slider"><div align="right"><a href="admin_add_universities.php" class="link_green">New University</a></div></td>
				  </tr>
				  
				<tr height="25">
				<td width="52%" class="slider">Student  Name </td>
				
				<td width="5%" class="slider"><div align="center">Status</div></td>
				<td width="20%" class="slider"><div align="center">Edit</div></td>
				<td width="23%" class="slider"><div align="center">Delete</div></td>
				</tr>
				<tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>	
				
				<? 
				  foreach($result as $name)
				  {
				  ?>
				
			<tr height="25">
			<td class="text10"><?=stripslashes($name->uni_name);?></td>	
			<td class="text10" align="center"><? if($name->uni_status==1)
			  echo "<img src='../images/green.png'>";
			  else
			echo "<img src='../images/red.png'>";				  
			  
			  ?></td>
			<td class="text10" align="center"><a href="admin_edit_universities.php?id=<?=$name->uni_id;?>"><img src="../images/edit.png" border="0" /></a></td>
			
			<td><div align="center"><a href="admin_manage_universities.php?action=delete&uni_id=<?=$name->uni_id;?>" onclick="return toDelete();"><img src="../images/error.png" border="0" /></a></div></td>
			
			</tr>
			
				<tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>
				<? } ?>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan="5" align="right" >&nbsp;</td>
				</tr>
				</table>
				</td>
				</tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td height="20" colspan="3" align="center" valign="middle"></td>
      </tr>
      <tr>
        <td height="37" colspan="3" align="center" valign="middle" background="../images/footer_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20">&nbsp;</td>
            <td align="left" valign="middle" class="copyright">A unit of Rashtreeya Sikshana Samiti Trust.</td>
            <td align="right" valign="middle" class="copyright">All rights reserved, Copyright © RV-VLSI Design Center.</td>
            <td width="20">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
