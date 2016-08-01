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
 if(isset($_POST['assignSearch']))
				{
	  $ch=new checkInputFields();				
				
$search_query="select edu.*,mem.* from $education_table edu,$members_table mem where mem.m_id=edu.m_id";
if($_POST[selQulification]!='0'){
$search_query.=" and edu.qua_id = '".$ch->checkFields($_POST['selQulification'])."'";			
				}
if($_POST[selCourse]!='0' && $_POST[selCourse]!=''){
$search_query.=" and edu.cor_id = '".$ch->checkFields($_POST['selCourse'])."'";			
				}				
				
if($_POST[selBranch]!='0'){
$search_query.=" and edu.branch_id = '".$ch->checkFields($_POST['selBranch'])."'";			
				}			
		
				
if($_POST[selsylbus]!='0'){
$search_query.=" and edu.e_sylbus = '".$ch->checkFields($_POST['selsylbus'])."'";			
				}			
if($_POST[selInst]!='0'){
$search_query.=" and  edu.insti_id = '".$ch->checkFields($_POST['selInst'])."'";			
				}		
					
if($_POST[txtotherinst]!=''){
$search_query.=" and edu.e_other_institute = '".$ch->checkFields($_POST['txtotherinst'])."',";			
				}					
					
if($_POST[selUniv]!='0'){
$search_query.=" and edu.uni_id ='".$ch->checkFields($_POST['selUniv'])."'";			
				}					
					
if($_POST[selPassedyear]!='0'){
$search_query.=" and edu.e_year = '".$ch->checkFields($_POST['selPassedyear'])."'";			
				}						
					
if($_POST[selMonth]!='0'){
$search_query.=" and edu.e_month = '".$ch->checkFields($_POST['selMonth'])."'";			
				}						
if($_POST[txtCity]!=''){
$search_query.=" and edu.e_city = '".$ch->checkFields($_POST['txtCity'])."'";			
				}	
if($_POST[txtPercentage]!=''){
$search_query.=" and e_percentage = '".$ch->checkFields($_POST['txtPercentage'])."'";			
				}					
if($_POST[selState]!='0' && $_POST[selState]!=''){
$search_query.=" and  state_id = '".$ch->checkFields($_POST['selState'])."'";			
				}									
//echo $search_query	;die;			
$member_result=$db->getResults($search_query);					
		//print_r($member_result);		die;	
/*echo '	<SCRIPT language="JavaScript">document.location.href="admin_assign_jobs.php?j_id='.$_REQUEST[j_id].'";</SCRIPT> ';*/ 							
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
 <script type="text/javascript" src="../js/ajax.js"></script>
 <script>

 function selectQulification(val)
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
               
				
				

<td width="80%" valign="top">
<table width="100%" height="167" border="0" cellpadding="0" cellspacing="0">  
 <tr height="25">
				  <td colspan="6" class="heading_new"><table width="540">
<tr>
  <td width="399" height="1"  class="text">
<div style="padding-left:50px;">
 <?=$input->formStart('jobassign','','onSubmit="return job_details_validation();"');?>

				<table width="100%" height="167" border="0" cellpadding="0" cellspacing="0">  
 <tr height="25">
				  <td colspan="6" class="heading_new">Assign Resumes</td>
				</tr>
				<? if(count($member_result)!=0){ ?>
                <Tr><td>Total Results found: <?=count($member_result);?></td></Tr>
				<? }else{ ?>
				
				<Tr><td align="center"><strong>No results found</strong></td></Tr>
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
    <td width="150"  class="text10"><?=$students->m_fname?></td>
    
  
 <? 
 $i++;
 if($i%3==0)
 	echo '</tr><tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>';
 
 }?>
 
 <tr><td colspan="6" align="center"><?=$input->submitButton('assign','Assign','text', 'style=background-color:#424843;color:#ffffff');?></td></tr>
</table> 

                
</td>	                     
</tr>                       
</table>
   <form name="searchForm" id="searchForm" action="admin_assign_jobs.php?j_id=<?=$_REQUEST[j_id]?>" method="post" enctype="multipart/form-data">


	<!--<div style="width:100%; float:left; padding:5px;">fdshgsdfhg : ldhfgfgad</div>-->
	<div  style="width:100%; float:left; padding:5px;"><span class="text" style="padding-right:47px;">Qualification</span>: 
	  <?=fetchtitle($edit->qua_id)?>
	</div>
	<div  style="width:100%; float:left; padding:5px;" id="divCourse"><span style="padding-right:6px;"  class="text">Select Your Course</span> : <? if($edit->cor_id=='0' || $edit->cor_id=='') {?> <span id="CourseData"><select name="selCourse" id="selCourse" style="width:150px;" >
			 <option value="0">select Qualification</option></select> </span><? }else{ echo Selectedcourse($edit->cor_id); }?> </div>

	<div  style="width:100%;  float:left; padding:5px;" id="divBranch"><span style="padding-right:76px;"  class="text" >Branch</span>: <select name="selBranch" id="selBranch" style="width:150px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from $branch_table");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->branch_id==$_REQUEST[branch_id])
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs->branch_id;?>" <?=$sel?> >
   <?=$branchs->branch_name;?>
   </option>
   <? }?></select></div>
				 
				 <div  style="width:100%;  float:left; padding:5px; display:none;" id="divSylabus"><span style="padding-right:73px;"  class="text" >Sylabus</span>: <select 
				 name="selsylbus" id="selsylbus" style="width:150px;">
			 <option value="0">select</option>
			 <option value="state" <?=$_REQUEST[e_sylbus]=='state'?'selected':''?>>State Sylabus</option>
			 <option value="cbsc" <?=$_REQUEST[e_sylbus]=='cbsc'?'selected':''?>>CBSC</option>
			  <option value="icsc" <?=$_REQUEST[e_sylbus]=='icsc'?'selected':''?>>ICSC</option>
			 </select></div>
	
	<div  style="width:100%;  float:left; padding:5px;" id="divInst"><span style="padding-right:69px;"  class="text">Institute </span>: <select name="selInst" style="width:150px;">
   <option value="0">Select Institute</option>
   <?  $insttions=$db->getResults("select * from $institutes");
						   foreach($insttions as $inst)
						   {
						   if($inst->insti_id==$_REQUEST[insti_id])
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$inst->insti_id;?>" <?=$sel?> >
   <?=$inst->insti_name;?>
   </option>
   <? }?>
 </select></div>
 
 <div  style="width:100%;  float:left; padding:5px; display:none" id="divOtherInst"><span style="padding-right:69px;"  class="text" >Institute </span>: <input type="text" name="txtotherinst" style="width:146px;" id="txtotherinst" value="<?=stripslashes($_REQUEST[e_other_institute])?>" /></div>

		<div  style="width:100%;  float:left; padding:5px;" id="divUniveristy"><span style="padding-right:60px;"   class="text">University </span>: <select name="selUniv" style="width:150px;">
   <option value="0">Select University</option>
   <?  $insttions=$db->getResults("select * from $universities_table");
						   foreach($insttions as $inst){
						   if($inst->uni_id==$_REQUEST[uni_id]){
						   $sel="selected";
						   }else{
						   $sel="";
						   }?>
   <option value="<?=$inst->uni_id;?>" <?=$sel?>>
   <?=$inst->uni_name;?>
   </option>
   <? }?>
 </select></div>
	 <div  style="width:100%;  float:left; padding:5px; display:none;" id="divOtherUniveristy"><span style="padding-right:55px;" class="text" >University </span>: <input type="text" name="txtOtherInst" style="width:146px;" id="txtOtherInst" value="<?=stripslashes($_REQUEST[e_poly_institute])?>" /></div>
	<div  style="width:100%;  float:left; padding:5px;"><span style="padding-right:65px;"  class="text">Pass Out</span>: <select name="selMonth" id="selMonth">
	<option value="0">select</option>
	<? for($m=0;$m<count($month_array);$m++){?>
	<option value="<?=$m?>" <?=$_REQUEST[selMonth]==$m?>><?=$month_array[$m]?></option>
	<? }?>
	
	 </select>&nbsp;&nbsp;<select name="selPassedyear" id="selPassedyear">
	 <option value="0">select</option>
	<? for($y=date(Y);$y>=1970;$y--){?>
	<option value="<?=$y?>" <?=$_REQUEST[selPassedyear]==$y?>><?=$y?></option>
	<? }?>
	
	 </select></div>	
	<div  style="width:100%;  float:left; padding:5px;"><span style="padding-right:51px;"  class="text"> Percentage </span>: 
	  <input type="text"  class="text" name="txtPercentage"  id="txtPercentage" value="" style="width:50px;"  maxlength="5"/>&nbsp;%</div>
	
	<div  style="width:100%;  float:left; padding:5px;"><span style="padding-right:56px;"  class="text">Experience</span>: <input type="text" name="TxtExp" maxlength="5"  style="width:50px;"/></div>
	<div  style="width:100%;  float:left; padding:5px;"><span style="padding-right:31px;"  class="text">RV-Vlsi Student</span>: <input type="checkbox" name="RvStu" width="20" /></div>
	<input type="hidden" name="j_id" value="<?=$_REQUEST[j_id]?>" />
	<div style="padding:10px 0px 0px 140px;"><? 
   echo $input->submitButton('assignSearch','Search','button','style=background-color:#424843;color:#ffffff');

   ?></div>
	
	
	</div></td>
  </tr>
</table></td>
</form>
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
