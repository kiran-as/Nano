<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
	   
	   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 



 if(isset($_POST['EduInsert']))
   {
 
 $period=$_POST[selFrom]."-".$_POST[selFrom];
 
 	$info_query="insert into $projects_table  set p_title='".$ch->checkFields($_POST['txtTitle'])."',p_company='".$ch->checkFields($_POST['txtCompany'])."',p_period='".$ch->checkFields($period)."',m_id='".$_SESSION[m_id]."'";
	 $result=$db->insertRecord($info_query);
 header("Location: projects_completed.php?msg=1");
	 }	
	 				
if(isset($_POST['EduUpdate']))
   {
  $period=$_POST[selFrom]."-".$_POST[selTo];
 	$info_query="update $projects_table  set p_title='".$ch->checkFields($_POST['txtTitle'])."',p_company='".$ch->checkFields($_POST['txtCompany'])."',p_period='".$ch->checkFields($period)."',m_id='".$_SESSION[m_id]."' where p_id='".$_REQUEST[p_id]."'";
								
 $result=$db->insertRecord($info_query);
 header("Location: projects_completed.php?msg=2");
	}	
				
	if($_REQUEST[action]=='delete' && is_numeric($_REQUEST[p_id])!='')
	 {
 	$delete_query="delete from $projects_table where p_id='".$_REQUEST[p_id]."'";
	$result=$db->deleteRecord($delete_query);
	 header("Location: projects_completed.php?msg=3");
	}			
   
 ?>  <?  include_once('config/header.php');?> 
 <tr><td><table width="100%" height="248" > 
 <tr><td>&nbsp;</td></tr> 
    <tr> 
      <td width="15%" valign="top"  ><?  include_once('includes/side_menu.php');?></td>
      <td width="85%" height="18" valign="top" >
	<? if($_REQUEST[action]=='addEduinfo' || $_REQUEST[action]=='editEduinfo') { 
	  $edit_edu = "SELECT * FROM $projects_table where p_id='".$_REQUEST[p_id]."'"; 
 
  $projects_edit=$db->getResults($edit_edu);
  foreach($projects_edit as $edit){}

	?>
	  <?=$input->formStart('infoForm','','onSubmit="return Projects_Validation();"');?>
  <table width="544"> 
  <tr>
     <td colspan="2"><span class="heading1" >Add/Edit Projects </span></td>

</tr>
  <tr>
     <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>
  

    <tr>
    <td width="158" height="1"  class="text" align="right">Title :</td>
    <td  height="" width="391">
	<?=$input->textBox('txtTitle',$edit->p_title,'button','style=width:200px;','');?> <span class="error">*</span></td>  
    </tr>
  
<tr>
 <td width="158" height="1"  class="text" align="right">Company : </td>
 <td  height="" width="391">
<?=$input->textBox('txtCompany',$edit->p_company,'button','style=width:200px;','');?> <span class="error">*</span></td>
</tr>
 

<tr>
<td width="158" height="25"  class="text" align="right">Period :</td>
<td  height="23" width="391" valign="bottom">
<? $prd=explode("-",$edit->p_period);?>
<select name="selFrom"><option value="0">From</option>
<? for($f=date(Y);$f>=1940;$f--){?>
<option value="<?=$f?>" <?=$prd[0]==$f?'selected':''?>><?=$f?></option>
<? }?></select> <span class="error">*</span>&nbsp;&nbsp;<select name="selTo"><option value="0">To</option>
<? for($t=date(Y);$t>=1940;$t--){?>
<option value="<?=$t?>" <?=$prd[1]==$t?'selected':''?>><?=$t?></option>
<? }?></select>
<span class="error">*</span></td>
</tr>
<tr>
    
    <td  height="19" width="158">&nbsp;</td>
    
    <td  height="19" width="391">
   <? if($_REQUEST[action]=='addEduinfo') { echo $input->submitButton('EduInsert','Update','text');}else{
   echo $input->submitButton('EduUpdate','Update','text');
   }?>
      <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>--></td>
   </tr>
</table>
  <?=$input->formEnd?>
  <? }else{
   $query_edu = "SELECT * FROM $projects_table where m_id='".$_SESSION[m_id]."'"; 
 
  $projects_result=$db->getResults($query_edu);

  
  
  ?>
  <table width="794" border="0" cellspacing="0" cellpadding="0">
  <tr height="25">
     <td colspan="2"><span class="heading1" >Projects  List</span></td>
</tr>
<tr><Td colspan="5" class="error"><?=messaging($_REQUEST[msg])?></Td></tr>
  <tr >
     <td colspan="5" align="right"><a href="projects_completed.php?action=addEduinfo" class="morelinkbtm">Add New</a></td>
    </tr>
	
  <tr height="25">
    
    <td width="40%" height="34" class="slider">Title</td>
    <td width="26%" class="slider">Company</td>
    <td width="12%" class="slider">Period</td>
    <td width="11%" class="slider" align="center">Edit</td>
    <td width="11%" class="slider" align="center">Delete</td>
  </tr>
   <tr><td style="height:1px; background:#666600;" colspan="5"></td></tr>
  <?   
  foreach($projects_result as $projects){?>
  <tr height="25">
    
    <td ><?=stripslashes($projects->p_title)?></td>
    <td ><?=stripslashes($projects->p_company)?></td>
    <td ><?=stripslashes($projects->p_period)?></td>

    <td><div align="center"><a href="projects_completed.php?action=editEduinfo&p_id=<?=stripslashes($projects->p_id)?>"><img src="images/edit.png" title="Edit" onclick="return toedit();" /></a></div></td>
    <td><div align="center"><a href="projects_completed.php?action=delete&p_id=<?=stripslashes($projects->p_id)?>"><img src="images/error.png" title="Delete" onclick="return toDelete();" /></a></div></td>
  </tr>
 <tr><td style="height:1px; background:#666600;" colspan="5"></td></tr>
  <? }?>
  
</table>

  <? }?>
  </td>
	</tr>
</table>
    </Td></tr>
 
<? include_once('config/footer.php') ?>