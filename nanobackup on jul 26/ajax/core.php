<?
   include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
   include_once('../classes/messages.php');  
   include_once('../db/dbconfig.php');
	
 //include_once('config/header.php');
  $check=new checkingAuth();
   $check->loginCheck();   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
  
 ?>

 
 <?php
$query="select * from $career_objective_table where m_id='".$_SESSION[m_id]."'";
$career_obj=$db->getResults($query);
  foreach($career_obj as $career){}
 $query_edu = "SELECT * FROM $core_competecny_table where m_id='".$_SESSION[m_id]."' order by cc_id desc"; 
      $core_obj_result=$db->getResults($query_edu); 
	  $core_obj_count=count($core_obj_result);
  
   $query_achv = "SELECT * FROM $achievements_table where m_id='".$_SESSION[m_id]."' order by ac_id desc"; 
      $achv_result=$db->getResults($query_achv);
	  $achv_count=count($achv_result);
	  
	  
	  			

  $members_result=$db->getResults("SELECT * FROM $members_table where m_id='".$_SESSION[m_id]."'");
 
 ?>	
   <script type="text/javascript">
   
   	function toDelete(){
		alert("dsfgfsd");
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
			
			}
			
			
			}
			
			</script>	
			<script type="text/javascript" src="wz_tooltip/wz_tooltip.js"></script>

	<table width="100%" class="recruit_table" >
	   <tr>
   <td colspan="3"><input type="checkbox" name="chkRoll" id="chkRoll" onClick="checkingRoll();" <? if($members_result[0]->m_student!='' &&$members_result[0]->m_student!='NULL') echo 'checked="checked"'; ?> > <strong>Are you RV-VLSI Student </strong></td>
   </tr>
  <tr>
   <td><div id="addSubscriptionHidden" <? if($members_result[0]->m_student!='' &&$members_result[0]->m_student!='NULL') echo 'style="display:block"'; else echo 'style="display:none"'; ?>>
<form name="rollForm" id="rollForm" action="" method="post">
 <table >
 <tr><td><INPUT TYPE="text"   BORDER="0" onclick="if(this.value=='Roll number'){this.value='';}" value="<? if($members_result[0]->m_student!='' && $members_result[0]->m_student!='NULL') echo stripcslashes($members_result[0]->m_student); else echo 'Roll number'?>" name="Rvstudent"></td></tr>
 
<tr><td> <input type="image" src="images/update.png" name="insert" value="button"></td></tr>
</table>
 </form>
</div>
</td></tr>
		</table>		
    <?=$input->formStart('txtForm1','','onsubmit="return CarrerValidation(\'\');"');?>

    <input type="hidden" name="objectiveUpdate" value="objectiveUpdate" />
	<table width="100%" class="recruit_table" >

   <tr>
     <td  class="" onMouseOver="Tip('To work in a core industry relevant to my academics and done my skills in a advanced field such as VLSI and Embedded Systems')"
				 onmouseout="UnTip()"
><b style=" color: #424843;
    font-family: Tahoma,Verdana,Arial;
    font-size: 18px;
    font-style: normal;
    font-weight: normal;
    text-align: left;
    text-decoration: none;">Career Objective </b>
	<a HREF="javascript:self.close()" onclick="window.open('ex.php','welcome','width=400,height=300')">Click here for example</a>
 </td>

     <td height="25"    align="right"><a href="job_seeker_menu.php?tab=2" ><img src="images/skip.png" border="0" /></a></td>
   </tr>

   <tr>
     <td height="25" colspan="2"  > <span class="error" style="float:right"> * Indicates required field  </span> </td>
	
   </tr>
   <tr>
     
	 
   </tr>
  
 
  

<tr>
<td  height="23" colspan="2"><textarea  onMouseOver="Tip('To work in a core industry relevant to my academics and done my skills in a advanced field such as VLSI and Embedded Systems')"
				 onmouseout="UnTip()" rows="1" cols="80"  name="Career" id="Career"><?=stripslashes($career->co_objective);?></textarea>
  <span class="error" style="float:center">*</span></td>
</tr> 
				

  <tr>
    

    
    <td  height="19" colspan="2"> 
    
     <INPUT TYPE="image" SRC="images/submit.png"  BORDER="0"   value="Submit" name="Submit">
	  
      <input type="image" name="Reset"  value="Reset" SRC="images/reset.png"  onclick="javascript:document.getElementById('Career').value='';" />
           <?php /*?> <?=$input->ResetButton('Reset','Reset','text','style=background-color:#424843;color:#ffffff');?><?php */?>
    
   </tr>
</table>
  <?=$input->formEnd()?>

<table width="100%" class="recruit_table" style="margin-top:10px;" > 

<tr><td   align="left" class="heading1">Core Competency Details</td></tr>
<tr><td>
  <input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="addDiv" <?=($_REQUEST[action]=='new' || $core_obj_count==0)?'style="display:block;"':'style="display:none;"'?>>

<table  width="100%">

   <tr>
      
       <td width="472" align="left"  class="error1"><?=messaging($_REQUEST[msg])?> </td>
	    <td>&nbsp; </td>
   </tr>  
    

<tr>
    <td width="472"   class="text" align="left">Title :</td>
	 <td width="176" ><div align="right"><span class="error">&nbsp;&nbsp;&nbsp;* Indicates Required field</span></div></td>
</tr>
    <tr>
    <td  height="" colspan="2"> <input type="checkbox" name="chkTransitor" value="1" <?='select:selected'?>/> <span>Good understanding of fundamentals of Transistors and circuit theory</span> </td>
	</tr>   
	
	<tr>
    <td  height="" colspan="2"> <input type="checkbox" name="chkVerilog" value="2"/> <span>Good knowledge of Verilog RTL coding</span> </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkDigitial_Design" value="3"/> <span>Good knowledge of Digitial Design Concepts</span>  </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkVlsi" value="4"/> <span>Good exposure to technology by undergoing additional training in VLSI and/or Embedded</span>  </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkEmbeded" value="5"/> <span>Implemented a VLSI and/or embedded project during my undergrad/post grad</span>  </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkIndustry" value="6"/> <span>Attended technology intensive courses conducted by industry experts on VLSI and Embedded domains</span>  </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkIc" value="7"/> <span>Excellent knowledge of IC Fabrication process</span>  </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkLinux" value="8"/> <span>Good working knowledge of Linux, and C programming</span>  </td>  
	</tr>   
    <tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkOthers" value="9"/> <span>Others</span>  </td>  
	</tr>   

  
     <tr>  
    <td  height="19" colspan="4" > 
	<INPUT TYPE="image" SRC="images/save.png"  BORDER="0"  id="coreInsert" value="save" name="coreInsert">&nbsp;&nbsp;&nbsp;
	<input type="image" name="coreInsert" value="Save and Add Next"  onclick="document.getElementById('hdNext').value=1;" src= "images/save_n_next.png" border="0" />
	<input type="image" name="close" value="Close"  src ="images/close.png" onclick="document.getElementById('addDiv').style.display='none';return false;" /></td></tr>
</table>
 </div>

 </td></tr>
 <?php /*?><tr><td align="right"><div  id="id_display" <?=$core_obj_count==0?'style="display:none;"':'style="display:block;"';?>><a href="#" onclick="document.getElementById('addDiv').style.display='block';document.getElementById('id_display').style.display='none';return false;"><img src="images/add_more.png" border="0" /></a></div></td></tr>
 <tr><td><?php */?>
 <?=$input->formStart('infoForm','','onSubmit="return core_Validation('.$projects->cc_id.');"');?> <?   
      
      
    foreach($core_obj_result as $projects){}?> 
   
    <input type="hidden" name="cc_id" value="<?=$projects->cc_id;?>" />
	
   <table width="100%" class="recruit_table" style="margin-top:10px;">

   
 

    <tr>
    <td  height="" colspan="2"> <input type="checkbox" name="chkTransitor"  <?=$projects->cc_transistor=='1'?'checked':''?>  value="1"/> <span>Good understanding of fundamentals of Transistors and circuit theory</span> </td>
	</tr>   
	
	<tr>
    <td  height="" colspan="2"> <input type="checkbox" name="chkVerilog" <?=$projects->cc_verilog=='1'?'checked':''?> value="1"/> <span>Good knowledge of Verilog RTL coding</span> </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkDigitial_Design" <?=$projects->cc_digital=='1'?'checked':''?> value="1"/> <span>Good knowledge of Digitial Design Concepts</span>  </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkVlsi" <?=$projects->cc_vlsi=='1'?'checked':''?> value="1"/> <span>Good exposure to technology by undergoing additional training in VLSI and/or Embedded</span>  </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkEmbeded" <?=$projects->cc_embeded=='1'?'checked':''?> value="1"/> <span>Implemented a VLSI and/or embedded project during my undergrad/post grad</span>  </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkIndustry" <?=$projects->cc_industry=='1'?'checked':''?> value="1"/> <span>Attended technology intensive courses conducted by industry experts on VLSI and Embedded domains</span>  </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkIc" <?=$projects->cc_ic=='1'?'checked':''?> value="1"/> <span>Excellent knowledge of IC Fabrication process</span>  </td>  
	</tr>   
	<tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkLinux" <?=$projects->cc_linux=='1'?'checked':''?> value="1"/> <span>Good working knowledge of Linux, and C programming</span>  </td>  
	</tr>   
    <tr>
    <td  height="" colspan="2"><input type="checkbox" name="chkOthers" <?=$projects->cc_others=='1'?'checked':''?> value="1"/> <span>Others</span>  </td>  
	</tr>   

         


<tr>
    
    <td  height="19" width="159">&nbsp;</td>
    
    <td  height="19" width="472">
	<? if(count($core_obj_result)==0)
	{
	?> 
	<INPUT TYPE="image" SRC="images/save.png"  BORDER="0"  id="coreInsert" value="save" name="coreInsert" ><? 
	}
	else
	{
	?>
  <INPUT TYPE="image" SRC="images/save.png"  BORDER="0"  id="coreInsert" value="save" name="coreUpdate" >
  <? }?>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="job_seeker_menu.php?menu=coreDelete&cr_id=<?=$projects->cc_id;?>" onclick="performdelete('job_seeker_menu.php?confirmed=true'); return false;"><img src="images/delete.png" alt="cancel" title="Delete File" border="0"/></a>  <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>--></td>
  </tr>
  </table>
<?=$input->formEnd()?> 

      
 
 
 
 </td></tr>
</table>
      <table width="100%" class="recruit_table" style="margin-top:10px;"  > 
<tr>
  <td class="heading1">Achievements Details<? //=messaging($_REQUEST[msg])?></td>
</tr>
<tr><td>
<?=$input->formStart('achForm','','onSubmit="return Achievements_Validation(\'\');"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="addDiv_ach"  <?=($_REQUEST[action]=='new' || $achv_count==0)?'style="display:block;"':'style="display:none;"'?>>

<table width="100%">
<tr><td  colspan="2"></td></tr>

<tr>
      
       <td width="176" align="left"  class="error1">&nbsp;</td>
	    <td width="491">&nbsp; </td>
   </tr>  
    

<tr>
  <td height="1"  class="text" align="left" valign="top">Title :</td>
  <td  height="" align="right"><span class="error">* Indicates Required field</span></td>
</tr>
<tr>
    <td height="1" colspan="2" align="left" valign="top"  class="text"><textarea rows="1" cols="80" name="txtAchiveTitle" id="txtAchiveTitle"></textarea>      <span class="error">*</span></td>
    </tr>          
 
 
 
<tr>
    
    <td  height="19" colspan="2"> 
	 <INPUT TYPE="image" SRC="images/save.png"  BORDER="0"  id="achInsert" value="save"  name="achInsert">&nbsp;&nbsp;&nbsp;     
	 <input type="image" name="achInsert" value="Save and Add Next" src = "images/save_n_next.png" border="0" onclick="document.getElementById('hdNext').value=1;"    />
	 <input type="image" name="close" value="Close" src="images/close.png" border="0"  onclick="document.getElementById('addDiv_ach').style.display='none';return false;" /></td>
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
	
 
<form name="achForm" id="achForm" action="" method="post" onsubmit="return Achievements_Validation(<?=$achivments->ac_id?>);">
 <?php
      
    foreach($achv_result as $achivments){?> 

	
    <input type="hidden" name="ac_id" value="<?=$achivments->ac_id;?>" />
   <table width="100%" class="recruit_table" style="margin-top:10px;">
 <tr>
    <td width="159" height="1"  class="text" align="left" valign="top">Title:</td>
    <td  height="23" colspan="2"></td> 
</tr>
 <tr>
    
    <td  height="23" colspan="3">
<textarea rows="1" cols="80" name="txtAchiveTitle" id="txtAchiveTitle<?=$achivments->ac_id;?>"><?=stripslashes($achivments->ac_title);?></textarea><span class="error">*</span></td> 
</tr>

<tr>
    
    <td  height="19" width="159">&nbsp;</td>
    
    <td  height="19" width="472">
	
  <input type="image" name="accAchiv" value="Update" SRC="images/update.png"  BORDER="0" />&nbsp;&nbsp;
  <a href="job_seeker_menu.php?menu=achDel&ac_id=<?=$achivments->ac_id;?>" onclick="performdelete('job_seeker_menu.php?confirmed=true'); return false;">
		<img src="images/delete.png" alt="cancel" title="Delete File" border="0"/></a>
  
   
  </tr>     <tr><td colspan="4" align="right"></td></tr>
  

 
  </table><? }?> </form>   
    <tr><td align="right" colspan="4"><a href="job_seeker_menu.php?tab=2" ><img src="images/continue.png" border="0" /></a></td></tr>
</div> </td></tr></table>

 
