<!-- Code for reuse-->
		
 <?=$input->formStart('infoForm','','onSubmit="return edu_Validation('.$alleducation->e_id.');"');?>
<?php if ($total_query > 0) { ?>
<table width="100%" align="left" class="recruit_table" style="margin-top:5px;">
<tr>
<td>
<table  width="100%" border="1" cellpadding="0" cellspacing="0">
<tr>
<td width="10%" class="padding_td" ><b>Qualification</b></td>
<td width="13%" align="center" class="padding_td"><b>Discipline</b> </td>
<td width="41%" class="padding_td"><b>Year of start - End</b></td>
<td width="22%" class="padding_td"><b>Name of the institute <br />& university & Location</b></td>
<td width="14%" class="padding_td"><b>Percentage</b></td>
</tr>
<? } ?>
<? 
$i =0;
    //display the details
foreach($total_query as $alleducation){ 
	$i++;
?>
  
 <tr>
<input type="hidden" name="hdnID<?php echo $i;?>" size="5" value="<?php echo $alleducation->e_id;?>">

<td class="padding_td"><?php //echo $alleducation->e_id;?>
<? //print_r ($e_id);?>
<input type="text" name="txtQua<?php echo $i;?>" style="width:40px;"  value="<?=stripslashes($alleducation->qua_id)?>" maxlength="5" disabled /></td>
<td class="padding_td">
			<div id="schoolDiv" ><select name="selBranch<?php echo $i;?>"  style="width:100px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from $branch_table");
						   foreach($brances_result as $branchs)
						   {
						   if($branchs->branch_id==$alleducation->branch_id)
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
   <? } ?></select></div>
   <div id="rvShow" style="display:none;"><select name="selBranch<?php echo $i;?>"  style="width:100px;">
			 <option value="0">select</option>
			<?  $brances_result=$db->getResults("select * from rv_discipline");
						   foreach($brances_result as $branchs1)
						   {
						   if($branchs1->id==$alleducation->id)
						   {
						   $sel="selected";
						   }
						   else
						   {
						   $sel="";
						   }
						   ?>
   <option value="<?=$branchs1->id;?>" <?=$sel?> >
   <?=$branchs1->Discipline_name;?>
   </option>
   <? } ?></select></div></td>
<td class="padding_td"><select name="selMonth<?php echo $i;?>" id="selMonth">
	<? for($m=0;$m<count($month_array);$m++){?>
	<option value="<?=$m?>" <?=$alleducation->e_start==$m?'selected':''?>><?=$month_array[$m]?></option>
	<? }?>
	
	 </select><select name="selPassedyear<?php echo $i;?>" id="selPassedyear">
	   <option value="0">Select</option>
	<? for($y1=date(Y);$y1>1970;$y1--){?>
	 
	<option value="<?=$y1?>" <?=$alleducation->e_end==$y1?'selected':''?>><?=$y1?></option>
	<? }?>
	
	 </select>
	 <select name="selMonth1<?php echo $i;?>" id="selMonth1">
	<? for($m=0;$m<count($month_array);$m++){?>
	<option value="<?=$m?>" <?=$alleducation->e_start1==$m?'selected':''?>><?=$month_array[$m]?></option>
	<? }?>
	
	 </select><select name="selPassedyear1<?php echo $i;?>" id="selPassedyear1">
	   <option value="0">Select</option>
	<? for($y1=date(Y);$y1>1970;$y1--){?>
	 
	<option value="<?=$y1?>" <?=$alleducation->e_end1==$y1?'selected':''?>><?=$y1?></option>
	<? }?>
	
	 </select></td>
<td class="padding_td"><input type="text" name="selInst[]"  id="selInst[]"  value="<?=stripslashes($alleducation->insti_name)?>" maxlength="20" style="width:145px;" />
<input type="text" name="selUniv[]" id="selUniv[]"   maxlength="20" value="<?=stripslashes($alleducation->e_university)?>" style="width:145px;" />
 <input type="text" name="txtCity<?php echo $i;?>"  id="txtCity"  maxlength="20" value="<?=stripslashes($alleducation->e_city)?>"  style="width:150px;"/></td>
<td class="padding_td"><input type="text" name="percentage<?php echo $i;?>" style="width:40px;" id="percentage" value="<?=stripslashes($alleducation->e_percentage)?>" maxlength="5" /></td>
</tr>
<? }?>

</table>

</td>
</tr>

</table>
<?php if ($total_query > 0) {?>
   <tr>
   <td  height="19" width="144">&nbsp;</td>
   <td  height="19" width="212">
  <!--  <input  type="submit" class="button" value="Save" name="eduSave" />-->
    <input type="hidden" name="hdnLine" value="<?php echo $i;?>">
	<input type="image" name="eduSave" value="Save" src="images/save.png" border="0" />&nbsp;&nbsp;
<!--<input type="image" name="eduSave" value="Save" src="images/save.png" border="0" />&nbsp;&nbsp;-->
	    <a href="job_seeker_menu.php?menu=eduDel&e_id=<?=$alleducation->e_id;?>" onclick="performdelete('job_seeker_menu.php?confirmed=true'); return false;">
		<img src="images/delete.png" alt="cancel" border="0" title="Delete File"/></a>
    <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>--></td>
    <td>&nbsp;</td>
  </tr>
  <tr><td colspan="3" align="right"></td></tr>
   <tr><td align="right"><a href="job_seeker_menu.php?tab=2" ><img src="images/continue.png" border="0" /></a></td></tr>
  
     
  <?=$input->formEnd()?>
  <?  } ?>
