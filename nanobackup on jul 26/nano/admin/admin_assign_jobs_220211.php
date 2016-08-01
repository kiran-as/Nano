<? include_once('../db/dbconfig.php');
	include_once('admin_login_check.php');
	include_once('../classes/dataBase.php');
	include_once('../classes/checkInputFields.php');
	include_once('../classes/checkingAuth.php');
	include_once('../classes/inputFields.php');
	include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php'); 
	
	
	$input=new inputFields();	
	$ch=new checkInputFields();	
	$db=new dataBase();
	$rec = new recruiter();
	$db->connectDB(); 

 if(isset($_POST['assign']))
 {
		// echo $_REQUEST['ja_id'];die;
  $rec -> updateJobapp($_REQUEST['j_id'],$_POST);    

 }//echo "testing".$_POST[txtCourse];die;
 if(isset($_POST['ParUpdate']))
				{
					//echo "testing".$_POST[txtCourse];die;
					$search_query="select m_id from rv_educational_details where  e_institute=$_POST[selInst] and e_university =$_POST[selUniv]";
					
				
					//echo $search_query;die;
					$search_result=$db->getResults($search_query);
  foreach($search_result as $result){
	  $member_query="select m_fname and m_lname from rv_registration where  m_id='".$result->m_id."'";
	  $member_result=$db->getResults($member_query);
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

<link href="../rv_main.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">

function checkAll(flag)
{

var flag2=flag;
	if( flag2 == true)
	{
	for(var i=0;i<=document.getElementsByName("sub_check[]").length;i++)
	{
	document.getElementById("sub_check"+i).checked=true;
	}
	}
	
	else(flag2 == false)
	{
	for(var i=0;i<=document.getElementsByName("sub_check[]").length;i++)
	{
	document.getElementById("sub_check"+i).checked=false;
	}
	}

}

</script>
 <script type="text/javascript" src="ajax.js"></script>
 <script>
 function selectQulification(val)
 {
	
 if(val=='4' || val=='5')
 { 
 document.getElementById('coursetxt').style.display='none';
  document.getElementById('CourseData').style.display='none';
  document.getElementById('backlogs').style.display='none';
   document.getElementById('backlogstxt').style.display='none';
   document.getElementById('university').style.display='none';
      document.getElementById('universitytxt').style.display='none';
	  document.getElementById('universityBox').style.display='none';
	  //document.getElementById('institutetxt').style.display='none';
	  document.getElementById('institute').style.display='none';
	    document.getElementById('instituteBox').style.display='block';
 }
 else
 {

 document.getElementById('coursetxt').style.display='block';
  document.getElementById('CourseData').style.display='block';

   
    document.getElementById('university').style.display='block';
   document.getElementById('universitytxt').style.display='block';
	 // document.getElementById('institutetxt').style.display='block';
	  document.getElementById('institute').style.display='block';
	    document.getElementById('instituteBox').style.display='none';
		
 Selectcourse(val);
 
 }
 if(val=='3')
 { 
  document.getElementById('institute').style.display='none';
	    document.getElementById('instituteBox').style.display='block';
		
 document.getElementById('university').style.display='none';
	    document.getElementById('universityBox').style.display='block';
 
 }
 }
 </script>


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
               
				
				

<td width="80%" valign="top"><table width="100%" height="167" border="0" cellpadding="0" cellspacing="0">  
 <tr height="25">
 <form name="searchForm" id="searchForm" action="admin_assign_jobs.php" method="post" enctype="multipart/form-data">
				  <td colspan="6" class="heading_new"><table width="540">
                  <tr>
    <td width="147" height="1"  class="text" align="right">Qulification :</td>
    <td  height="" width="234"><?=fetchtitle(0)?> <span class="error">*</span></td>
</tr> 
                  <tr>
   <td width="165" height="1"   class="text" align="right"><div  id="coursetxt">Select Your Course : </div></td> 
   <td  height="" width="234"><div id="CourseData">
   <select  class="drop_box" name="txtCourse"><option value="0"> Select Your  Course   </option></select> <span class="error">*</span></div>
   </td> 
</tr>
<tr>
 <td width="147" height="1"  class="text" align="right"><div id="institutetxt">Institute:</div> </td>
 <td  height="" width="234"><div id="institute">
<select name="selInst" style="width:150px;">
                                <option value="0">Select Institute</option>
                            <?  $insttions=$db->getResults("select * from $institutes");
						   foreach($insttions as $inst)
						   {
						  
						   ?>
                                <option value="<?=$inst->insti_id;?>" <? //$sel?>>
                                  <?=$inst->insti_name;?>
                  </option>
                                <? }?>
                </select>
                
<span class="error">*</span> </div><div id="instituteBox" style="display:none;">
				<input type="text" name="txtPolyinsti" id="txtPolyinsti" value="<?=stripslashes($edit->e_poly_institute)?>" />
				<span class=error>*</span></div></td>
</tr>
<tr>
 <td width="147" height="1"  class="text" align="right"><div id="universitytxt">University :</div> </td>
 <td  height="" width="234"><div id="university">
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
                </select>  <span class="error">*</span></div>
                <div id="universityBox" style="display:none;"><input type="text" name="" id="" value="" /><span class=error>*</span></td>
</tr>
<tr><td width="147" height="1"  class="text" align="right">Percentage</td>
<td><input type="text" name="TxtPer" width="20" /></td></tr>
<tr><td width="147" height="1"  class="text" align="right">Experience</td>
<td><input type="text" name="TxtExp" width="20" /></td></tr>
<tr><td width="147" height="1"  class="text" align="right">RV-Vlsi Student or Not</td>
<td><input type="checkbox" name="RvStu" width="20" /></td></tr>
<tr><td>&nbsp;</td>
<td><input type="submit" name="ParUpdate" id="ParUpdate" value="Submit" /></td></tr>
</table></td>
</form>
				</tr>
                <Tr><td>&nbsp;</td></Tr>
                </table>
                
<?=$input->formStart('jobassign','','onSubmit="return job_details_validation();"');?>
<table width="100%" height="167" border="0" cellpadding="0" cellspacing="0">  
 <tr height="25">
				  <td colspan="6" class="heading_new">Assign Resumes</td>
				</tr>
                <Tr><td>&nbsp;</td></Tr>
               
  <? 
 
  $query ="select  m_id, m_fname, m_emailid, m_phone from rv_registration";
    $result_students=$db->getResults($query);
	$i=0;
	foreach($result_students as $students) {
  
	if($i%3==0)
	echo "<tr height='25'>";
  ?>

   <td width="20"><input type="checkbox" name="sub_check[]" class="text10"  id="sub_check<?php echo $i; ?>" value="<?=$students->m_id?>"/></td> 
    <td width="150"  class="text10"><?=$students->m_fname?></td>
    
  
 <? 
 $i++;
 if($i%3==0)
 	echo '</tr><tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>';
 
 }?>
 
 <tr><td colspan="6" align="center"><?=$input->submitButton('assign','Assign','text', 'style=background-color:#424843;color:#ffffff');?></td></tr>
</table> 



  </form>           
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
