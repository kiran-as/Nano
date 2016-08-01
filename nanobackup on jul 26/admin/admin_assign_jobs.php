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
  //header("location:".$_SERVER['PHP_SELF']."?msg=3");
  header('Location: admin_manage_job_app.php');

  

 }//echo "testing".$_POST[txtCourse];die;
 if(isset($_POST['searchSubmit']))
				{
	  $ch=new checkInputFields();				
				
$search_query="select mem.m_id from $education_table edu,$members_table mem where mem.m_id=edu.m_id";

if($_POST[chkRv]=='1'){
$search_query.=" and mem.m_student !='NULL'  and mem.m_student !='Student ID' ";		
				}	

if($_POST[selQualification]!='0'){
$search_query.=" and edu.qua_id = '".$ch->checkFields($_POST['selQualification'])."' ";			
				}
if($_POST[selCourse]!='0' && $_POST[selCourse]!=''){
$search_query.=" and edu.e_course = '".$ch->checkFields($_POST['selCourse'])."' ";			
				}				
				
if($_POST[selBranchGrad]!='0' && $_POST[selBranchGrad]!=''){
$search_query.=" and edu.e_branch = '".$ch->checkFields($_POST['selBranchGrad'])."'";			
				}			
if($_POST[selCountry]!='0'){
$search_query.=" and  edu.e_country = '".$ch->checkFields($_POST['selCountry'])."'";			
				}		
				
/*if($_POST[selsylbus]!='0'){
$search_query.=" and edu.e_sylbus = '".$ch->checkFields($_POST['selsylbus'])."'";			
				}	*/		
/*	if($_POST[selInst]!='0'){
$search_query.=" and  edu.e_institute = '".$ch->checkFields($_POST['selInst'])."'";			
				}		
if($_POST[chkRv]=='1'){
$search_query.=" and  edu.e_institute = '670'";			
				}		
				
if($_POST[selInst]=='-1'){
$search_query.=" and edu.e_other_institute = '%".$ch->checkFields($_POST['txtotherInst'])."%'";			
				}	*/				
					
if($_POST[selUniversity]!='0'){
$search_query.=" and edu.e_university ='".$ch->checkFields($_POST['selUniversity'])."'";			
				}	
if($_POST[selUniversity]=='-1'){
$search_query.=" and edu.e_other_university ='%".$ch->checkFields($_POST['txtotherUniv'])."%'";			
				}					
					
if($_POST[selYearOther]!='0'){
$search_query.=" and edu.e_passout_year = '".$ch->checkFields($_POST['selYearOther'])."'";			
				}						
 					
if($_POST[selMonthOther]!='0'){
$search_query.=" and edu.e_passout_month = '".$ch->checkFields($_POST['selMonthOther'])."'";			
				}						
if($_POST[txtCity]!=''){/*
$search_query.=" and edu.e_city = '".$ch->checkFields($_POST['txtCity'])."'";			
				*/}	
if($_POST[radPerOther1]=='1'){
$search_query.=" and e_percentage_type=1 and edu.e_percentage >= '".$ch->checkFields($_POST['txtPerOther1'])."'";			
				}	
				
if($_POST[radPerOther2]=='2'){
$search_query.=" and e_percentage_type=2 and edu.e_percentage >= '".$ch->checkFields($_POST['txtPerOther2'])."'";			
				}									
if($_POST[selState]!='0' && $_POST[selState]!=''){
$search_query.=" and  edu.e_state = '".$ch->checkFields($_POST['selState'])."'";			
				}		
				
//echo $search_query;											
//die($search_query);
$member_result1=$db->getResults($search_query);	
foreach($member_result1 as $membs1){
$arra2[]=$membs1->m_id;
}	



$arr2=array_unique($arra2);
$array_ids=implode(",",$arr2);
if(count($arr2)!=0){
$member_result=$db->getResults("select m_id, m_fname, m_lname,m_resume_id from $members_table where m_id IN ($array_ids)");
}
//print_r($member_result);	die;		
		//print_r($member_result);		die;	
/*echo '	<SCRIPT language="JavaScript">document.location.href="admin_assign_jobs.php?j_id='.$_REQUEST[j_id].'";</SCRIPT> ';*/ 							
					}
 
 
 $states_query=$db->getResults("select * FROM $states where country_id ='99'");
$inst_query=$db->getResults("select * FROM $institutes order by insti_name asc");
$uni_query=$db->getResults("select * FROM $universities_table order by uni_name asc"); 
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



function loadBranch(id)
{
//alert(id);
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
//	alert(xmlhttp.responseText);
    document.getElementById("divBranch").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","../ajax_branch.php?id="+id,true);
xmlhttp.send();
}



function loadCourses(id)
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
    document.getElementById("divCourse").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","../ajax_course.php?qua_id="+id,true);
xmlhttp.send();
}



function instOther(di){
if(di=='-1'){
document.getElementById('divOthertext').style.display='block';
}else{
document.getElementById('divOthertext').style.display='none';
}

}

function univOther(di){
if(di=='-1'){
document.getElementById('divOtherUnivtext').style.display='block';
}else{
document.getElementById('divOtherUnivtext').style.display='none';
}

}

function instGrad(id){
if(id=='99'){
document.getElementById('selState').disabled=false;
}else {
document.getElementById('selState').disabled = true;
}
}
</script>
 <!--<script type="text/javascript" src="../js/ajax.js"></script>-->
 <script>

/* function selectQulification(val)
 {

 if(val=='4' || val=='5')
 { 
// alert("df,h gjfjf");
 document.getElementById('divCourse').style.display='none';
 document.getElementById('divSylabus').style.display='block';
  document.getElementById('divBranch').style.display='none';
 document.getElementById('divInst').style.display='none'; 
 document.getElementById('divOtherInst').style.display='block';	 
   document.getElementById('divUniveristy').style.display='none'; 
 document.getElementById('divOtherUniveristy').style.display='none';	
 Selectcourse(val);
 }
 else
 {
 document.getElementById('divCourse').style.display='block';
 document.getElementById('divSylabus').style.display='none';
 document.getElementById('divOtherInst').style.display='block'; 
 document.getElementById('divOtherInst').style.display='none';	
   document.getElementById('divOtherUniveristy').style.display='none'; 
 document.getElementById('divUniveristy').style.display='block';	
 document.getElementById('divBranch').style.display='block';
  document.getElementById('divInst').style.display='block';
  Selectcourse(val);
 }

 }*/
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
               
				
				

<td width="80%" valign="top">
<table width="100%" height="167" border="0" cellpadding="0" cellspacing="0">  
 <tr height="25">
				  <td colspan="6" >
			
                    <p><strong>Other Course Details</strong></p>
				
                    <form name="searchForm" id="searchForm" action="#" method="post" enctype="multipart/form-data">
                      <table width="100%" cellpadding="3" cellspacing="0" border="0">
                        <tr>
                          <td valign="top">&nbsp;</td>
                          <td width="73%" class="error"><?=messaging($_REQUEST[msg])?></td>
                          </tr>
						  <tr>
						    <td valign="top">RV-VLSI Students </td>
						    <td valign="top"><input type="checkbox" name="chkRv" id="chRv" value="1" <?=$_REQUEST[chkRv]==1?'checked':''?> /></td>
						    </tr>
						  <tr>
                          <td valign="top">Select Your Qualification </td>
                          <td valign="top"><select name="selQualification" id="selQualification"  style="width:150px;" onchange="loadCourses(this.value);return false;">
                              <option value="0">Select Course</option>
                              <? $qua_query=$db->getResults("select * FROM $qualifications_table order by qua_id asc LIMIT 5");
			   foreach($qua_query as $qualification){
			   ?>
                              <option value="<?=$qualification->qua_id?>" <?=$_REQUEST[selQualification]==$qualification->qua_id?'selected':''?>>
                              <?=$qualification->qua_title;?>
                              </option>
                              <? }?>
                            </select>                          </td>
                          </tr>
                        <tr>
                          <td valign="top">Select Your Degree </td>
                          <td valign="top"><div id="divCourse"><select name="selCourse" id="selCourse"  style="width:150px;" onchange="loadBranch(this.value);return false;">
                              <option value="0">Select Course</option>
                              <? $course_query=$db->getResults("select * FROM $course_table where qua_id='".$_REQUEST[selQualification]."' and cor_status=1 order by cor_name asc");
			   foreach($course_query as $courseOther){
			   ?>
                              <option value="<?=$courseOther->cor_id?>" <?=$_REQUEST[selCourse]==$courseOther->cor_id?'selected':''?>>
                              <?=$courseOther->cor_name;?>
                              </option>
                              <? }?>
                            </select>   </div>                       </td>
                          </tr>
                        <tr>
                          <td valign="top">Branch of Study </td>
                          <td valign="top"><div id="divBranch">
                            <select name="selBranchGrad" id="selBranchGrad"  style="width:150px;">
                              <option value="0">Select Branch</option>
                                <? 
				  $branch_other_query=$db->getResults("select * from $branch_table where cor_id='".$_REQUEST[selCourse]."' and branch_status=1 order by branch_name asc");
			   foreach($branch_other_query as $branchOther){
			   ?>
                                <option value="<?=$branchOther->branch_id?>" <?=$_REQUEST[selBranchGrad]==$branchOther->branch_id?'selected':''?>>
                                  <?=$branchOther->branch_name;?>
                                  </option>
                                <? }?>
                              </select>
                          </div></td>
                          </tr>
                        <tr>
                          <td valign="top">Country </td>
                          <td valign="top"><select name="selCountry" id="selCountry"  style="width:150px;" onChange="return instGrad(this.value);" >
                           <option value="99" <?php if ($_REQUEST[selCountry] == 99) { echo ' selected="selected"'; } ?> selected="selected" >INDIA</option>
              <option value="100" <?php if ($_REQUEST[selCountry] == 100) { echo ' selected="selected"'; } ?>>USA</option>
              <option value="101"<?php if ($_REQUEST[selCountry] == 101) { echo ' selected="selected"'; } ?>>UK</option>
              <option value="102"<?php if ($_REQUEST[selCountry] == 102) { echo ' selected="selected"'; } ?>>Australia</option>
              <option value="103"<?php if ($_REQUEST[selCountry] == 103) { echo ' selected="selected"'; } ?>>Singapore</option>
                            </select>                          </td>
                          </tr>
                        <tr>
                          <td valign="top">State </td>
                          <td valign="top"><select name="selState" id="selState"  style="width:150px;">
                              <option value="0">Select State</option>
                              <? 
			foreach($states_query as $states_Other){
			?>
                              <option value="<?=stripslashes($states_Other->state_id)?>" <?=$_REQUEST[selState]==$states_Other->state_id?'selected':''?>>
                              <?=stripslashes($states_Other->name);?>
                              </option>
                              <? }?>
                            </select>                          </td>
                          </tr>
                        <?php /*?><tr>
                          <td valign="top">Institute </td>
                          <td valign="top"><select name="selInst" id="selInst"  style="width:150px;" onchange="return instOther(this.value)">
                              <option value="0">Select Institute</option>
                              <? 
			foreach($inst_query as $inst_Other){
			?>
                              <option value="<?=stripslashes($inst_Other->insti_id)?>" <?=$_REQUEST[selInst]==$inst_Other->insti_id?'selected':''?>>
                              <?=stripslashes($inst_Other->insti_name);?>
                              </option>
                              <? }?>
                              <option value="-1" <?=$resultsOther->e_institute=='-1'?'selected':''?>>Other</option>
                            </select>
                              <input type="text" name="txtotherInst" maxlength="250"  value="<?=$_REQUEST[txtotherInst]?>" id="divOthertext"  style="height:15px; margin-top:5px; width:147px;display:<?=$_REQUEST[selInst]=='-1'?'block':'none'?>;"/></td>
                          </tr><?php */?>
                        <tr>
                          <td valign="top">University </td>
                          <td valign="top"><select name="selUniversity" id="selUniversity" style="width:150px;" onchange="return univOther(this.value)">
                              <option value="0">Select University</option>
                              <? 
			foreach($uni_query as $uni_Other){
			?>
                              <option value="<?=stripslashes($uni_Other->uni_id)?>" <?=$_REQUEST[selUniversity]==$uni_Other->uni_id?'selected':''?>>
                              <?=stripslashes($uni_Other->uni_name);?>
                              </option>
                              <? }?>
                              <option value="-1" <?=$resultsOther->e_university=='-1'?'selected':''?>>Other</option>
                            </select>
                              <input type="text" name="txtotherUniv" maxlength="250"  value="<?=$_REQUEST[txtotherUniv]?>" id="divOtherUnivtext"  style="height:15px; margin-top:5px; width:147px;display:<?=$_REQUEST[selUniversity]=='-1'?'block':'none'?>;"/>                          </td>
                          </tr>
                        <tr>
                          <td width="27%">Passed Out:</td>
                          <td valign="top"><select name="selMonthOther" id="selMonthOther" style="width:80px;">
                              <? for($m=0;$m<count($month_array);$m++){?>
                              <option value="<?=$m?>" <?=$_REQUEST[selMonthOther]==$m?'selected':''?>>
                              <?=$month_array[$m]?>
                              </option>
                              <? }?>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <select name="selYearOther" id="selYearOther" style="width:80px;">
                              <option value="0">Year</option>
                              <? for($y=1990;$y<=date(Y);$y++){?>
                              <option value="<?=$y?>" <?=$_REQUEST[selYearOther]==$y?'selected':''?>>
                                <?=$y?>
                                </option>
                              <? }?>
                            </select></td>
                          </tr>
                        <tr>
                          <td valign="top">Aggregate Marks</td>
                          <td valign="top"><input type="checkbox" name="radPerOther1" id="radPerOther" value="1"   <?=$_REQUEST[radPerOther1]==1?'checked':''?> />
                            Percentage&nbsp;&nbsp;
                            <input type="checkbox" name="radPerOther2" id="radPerOther2" value="2"  <?=$_REQUEST[radPerOther2]==2?'checked':''?> />
                            CGPA(out of 10)</td>
                          </tr>
                      
                        <tr>
                          <td valign="top">&nbsp;</td>
                          <td valign="top"><input type="text" name="txtPerOther1" maxlength="5" style="height:15px; width:100px;" value="<?=$_REQUEST[txtPerOther1]?>" /> &nbsp; <input type="text" name="txtPerOther2" maxlength="5" style="height:15px; width:100px;" value="<?=$_REQUEST[txtPerOther2]?>" /></td>
                          </tr>
                        <tr>
                          <td valign="top">&nbsp;</td>
                          <td valign="top">
                              <input type="submit" name="searchSubmit" value="Search"  class="button_new" />
                            &nbsp;&nbsp;&nbsp;
                            <input type="reset" name="reset" value="Reset"  class="resetbutton" />
                      </td>
                          </tr>
                      </table>
                    </form>
			<table width="100%" height="167" border="0" cellpadding="0" cellspacing="0">  
 <tr height="25">
				  <td colspan="6" class="heading_new"><table width="100%">
<tr>
  <td height="1"  class="text">

 <?=$input->formStart('jobassign','','onSubmit="return job_details_validation();"');?>

				<table width="100%" height="167" border="0" cellpadding="0" cellspacing="0">  
 <tr height="25">
				  <td colspan="6" class="heading_new">Assign Resumes</td>
				</tr>
				<? if(count($member_result)!=0){ ?>
                <Tr><td colspan="2">Total Results found: <?=count($member_result);?></td></Tr>
				<? }else{ ?>
				
				<Tr><td align="center" colspan="2"><strong>No results found</strong></td></Tr>
				<? } ?>
               
  <? 
 
 // $query ="select  m_id, m_fname, m_emailid, m_phone from rv_registration";
   // $result_students=$db->getResults($query);
	$i=0;
	foreach($member_result as $students) {
  
	if($i%3==0)
	echo "<tr height='25'>";
  ?>

   <td width="20"><input type="checkbox" name="sub_check[]" class="text10"  id="sub_check<?php echo $i; ?>" value="<?=$students->m_id?>"/></td> 
    <td width="150"  class="text10"><?=$students->m_fname?> - <?=$students->m_resume_id?> - <a href="admin_view_resume.php?m_id=<?=$students->m_id?>" class="link_green" target="_blank">View Resume</a></td>
    
  
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
</table>	   
                    
				 </td>
  </tr>
</table></td>

				</tr>
                <Tr><td>&nbsp;</td></Tr>
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
