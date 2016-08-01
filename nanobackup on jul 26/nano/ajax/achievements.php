<? include_once('../db/dbconfig.php');
   include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
   include_once('../classes/messages.php');  
   $check=new checkingAuth();
   $check->loginCheck();   
   $input=new inputFields();	
   $ch=new checkInputFields();	
   $db=new dataBase();
   $db->connectDB(); 
   
      $query_achv = "SELECT * FROM $achievements_table where m_id='".$_SESSION[m_id]."' order by ac_id desc"; 
      $achv_result=$db->getResults($query_achv);
	  $achv_count=count($achv_result);
 ?>
  

 
  
    
	<script>
	
	function Achievements_Validation(id)
	
			{
			
			if($("#txtTitle"+id).val()=='')
			{
					alert("Please enter title");
					$("#txtTitle"+id).focus();
					return false;
			}
			}		
	</script>
	   <script type="text/javascript">
   
   	function toDelete(){
		//alert("dsfgfsd");
							var ok;
							ok = window.confirm('Do you really want to Delete ?');
							if(ok){
								return true;
							}
							else{
								return false;
							}
							
							
							}
	  	
			function CarrerValidation(id)
			{
			
			
			
			if($("#Career"+id).val()=='')
			{
					alert("Please enter Career");
					$("#Career"+id).focus();
					return false;
			}		
			
								
				
			}
    </script>
		<script type="text/javascript">
function performdelete(DestURL) {
var ok = confirm("Are you sure you want to delete?");
if (ok) {location.href = deletefile.php;}
return ok;
} 
</script>
	
     <script type="text/javascript">
  

	  	
			function core_Validation(id)
			{
			
			if($("#txtTitle"+id).val()=='')
			{
					alert("Please enter Title");
					$("#txtTitle"+id).focus();
					return false;
			}		
			
		
			}
    </script>
	

  

	  	   <script type="text/javascript">
			function Achievements_Validation(id)
			{
			
			if($("#txtAchiveTitle"+id).val()=='')
			{
					alert("Please enter Title");
					$("#txtAchiveTitle"+id).focus();
					return false;
			}	
			
			}	
			
			function checkingRoll(){


			if(document.getElementById('chkRoll').checked==true){
			document.getElementById('addSubscriptionHidden').style.display='block';
			}else{
			document.getElementById('addSubscriptionHidden').style.display='none';
			rvupdate();
			
		//	alert("d,ljghkj");
			 <? 						
//$db->insertRecord("update  $members_table set m_student ='' where m_id='".$_SESSION[m_id]."'");
			?>
			
			}
			
			
			
			}
			
			function carCheckBox(){
			if(document.getElementById('chkCareer').checked==true)
{

document.getElementById('carDiv').style.display='Block';
}else{
document.getElementById('carDiv').style.display='none';
}			
			
			}
			
			
			</script>	
			<link rel="stylesheet" href="jquery-tooltip/jquery.tooltip.css" />
<link rel="stylesheet" href="../screen.css" />
<script src="../lib/jquery.js" type="text/javascript"></script>
<script src="../lib/jquery.bgiframe.js" type="text/javascript"></script>
<script src="../lib/jquery.dimensions.js" type="text/javascript"></script>
<script src="jquery-tooltip/jquery.tooltip.js" type="text/javascript"></script>

<script src="jquery-tooltip/chili-1.7.pack.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=$server_url?>ajax/ajax_data.js"></script>
 
	 
 <table width="100%" class="recruit_table" style="margin-top:10px;"  > 
   <tr><td>
   <table><tr><td height="1"  style="font-size:16px; font-weight:bold; text-decoration:none;" colspan="3"><b>Resume Bulider:Steps - 4/5</b></td></tr></table>
   </td>
</tr> 

<tr>
<td width="100%"><table width="100%"><tr>
<td  colspan="2" style="font-size:16px; font-weight:bold; text-decoration:none; margin-top:-10px">Achievements Details<? //=messaging($_REQUEST[msg])?></td>
  <td align="right"><span class="error">* Indicates Required field</span></td>  
</tr></table></td>
     </tr>
     
<tr>
<td width="1127">
<?=$input->formStart('achForm','','onSubmit="return Achievements_Validation(\'\');"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />


<div id="addDiv_ach"  <?=($_REQUEST[action]=='new' || $achv_count==0)?'style="display:block;"':'style="display:none;"'?>>

  <table width="100%" class="recruit_table" style="margin-top:10px;"  > 
 <tr><td width="491"  colspan="2"></td></tr>  
    

<tr>
  <td width="176" height="1" align="left" valign="top"  class="text">Title :</td>
  
</tr>
<tr>
    <td height="1" colspan="2" align="left" valign="top"  class="text"><textarea rows="1" cols="60" maxlength="250" name="txtAchiveTitle" id="txtAchiveTitle"></textarea>      <span class="error">*</span></td>
    </tr>  <tr>
    <td height="1" colspan="2" align="left" valign="top"  class="text"><textarea rows="1" cols="60" maxlength="250" name="txtAchiveTitle1" id="txtAchiveTitle"></textarea>      <span class="error">*</span></td>
    </tr>  <tr>
    <td height="1" colspan="2" align="left" valign="top"  class="text"><textarea rows="1" cols="60" maxlength="250" name="txtAchiveTitle2" id="txtAchiveTitle"></textarea>      <span class="error">*</span></td>
    </tr>     
   
 <tr><td>&nbsp; </td> </tr>
 <!--
 <td><input type="checkbox" name="chkCareer" id="chkCareer" value="achieve" onclick="carCheckBox()">Others </td>
 <tr>
    <td ><div id="carDiv" <? if($achv_result->ac_description!='' && $$achv_result->ac_description!='NULL') echo 'style="display:block"'; else echo 'style="display:none"'; ?> ><textarea name="txtAchiveother" id="txtAchiveother" cols="60" rows="2" maxlength="250"></textarea></div>
	
	
	</td>  
	</tr> 
 -->
  <tr><td>&nbsp; </td> </tr>

<tr>
    
    <td  height="19" colspan="2"> 
    <INPUT TYPE="image" SRC="images/save.png"  BORDER="0"  id="achInsert" value="save"  name="achInsert">
	
             <?//=$input->submitButton('achInsert','save','','style=background-color:#424843;color:#ffffff');?>
	<!-- <input type="image" name="achInsert" value="Save and Add Next" src = "images/save_n_next.png" border="0" onclick="document.getElementById('hdNext').value=1;"    />
	 <input type="image" name="close" value="Close" src="images/close.png" border="0"  onclick="document.getElementById('addDiv_ach').style.display='none';return false;" /></td>-->
	 
  <tr> <td align="right" colspan="4">
<a HREF="javascript:self.close()" onclick="window.open('emp.php','welcome','width=400,height=500')">To know your Employability Factor Click here</a>
</td></tr>
    </tr>
</table>
 </div>
<?=$input->formEnd()?> 
 </td></tr>

   <tr> 
   <td > <div id="id_display_ach"  <?=$achv_count==0?'style="display:none"':'style="display:block"';?> >
    <div align="right">
	<a href="#" onclick="document.getElementById('addDiv_ach').style.display='block';document.getElementById('id_display_ach').style.display='none'; return false;"  ><img src="images/add_more.png" border="0" /> </a>
	</div>
	</div>
	
 

 <?php
          	 if($achv_count > 0 || $achv_count != '0'  ){
    foreach($achv_result as $achivments){ ?> 
	<form name="achForm" id="achForm" action="#" method="post" onsubmit="return Achievements_Validation(<?=$achivments->ac_id?>);">
    <input type="hidden" name="ac_id" value="<?=$achivments->ac_id;?>" />
   <table width="100%" class="recruit_table" style="margin-top:10px;">
	 <tr><td colspan="5" class="error" align="center" style="padding-left:100px;"><?=messaging($_REQUEST[msg]);?></td>
	</tr>
   
 <tr>
    <td width="159" height="1"  class="text" align="left" valign="top">Title:</td>
    <td  height="23" colspan="2"></td> 
</tr>
 <tr>
    
    <td  height="23" colspan="3">
<textarea rows="1" cols="60" name="txtAchiveTitle" id="txtAchiveTitle<?=$achivments->ac_id;?>"><?=stripslashes($achivments->ac_title);?></textarea><span class="error">*</span></td> 

</tr> <tr>
    
    <td  height="23" colspan="3">
<textarea rows="1" cols="60" name="txtAchiveTitle1" id="txtAchiveTitle1<?=$achivments->ac_id;?>"><?=stripslashes($achivments->ac_title1);?></textarea><span class="error">*</span></td> 

</tr> <tr>
    
    <td  height="23" colspan="3">
<textarea rows="1" cols="60" name="txtAchiveTitle2" id="txtAchiveTitle2<?=$achivments->ac_id;?>"><?=stripslashes($achivments->ac_title2);?></textarea><span class="error">*</span></td> 

</tr>


<tr><td>&nbsp; </td> </tr>
<!--
 <td><input type="checkbox" name="chkCareer" id="chkCareer" value="achieve" onclick="carCheckBox()">Others </td>
 <tr>
    <td ><div id="carDiv" <? if($achivments->ac_description!='' && $achivments->ac_description!='NULL') echo 'style="display:block"'; else echo 'style="display:none"'; ?> ><textarea rows="1" cols="60" name="txtAchiveother" id="txtAchiveother<?=$achivments->ac_id;?>"   >
	<? if($achivments->ac_description!='' && $achivments->ac_description!='NULL') echo stripcslashes($achivments->ac_description); else echo ''?></textarea></div>
	
	
	</td>  
	</tr> -->


<tr>
    

    
    <td  height="19" width="472" align="left" colspan="4">
	  <input type="image" name="accAchiv" value="Save" src ="images/save.png">

   <!-- <a href="job_seeker_menu.php?menu=achDel&ac_id=<?=$achivments->ac_id;?>" onclick="performdelete('job_seeker_menu.php?confirmed=true'); return false;">
		<img src="images/delete.png" alt="cancel" title="Delete File" border="0"/></a> -->  
  
   </td>
  </tr>  
  <tr> <td align="right" colspan="4">
<a HREF="javascript:self.close()" onclick="window.open('emp.php','welcome','width=400,height=300')">To know your Employability Factor Click here</a>
</td></tr>
   <tr><td align="right" colspan="4"><a href="job_seeker_menu.php?tab=4" ><img src="images/continue.png" border="0" /></a></td></tr>
 
  </table></form>   <? }}?>  
   
</div> </td></tr></table>

 

