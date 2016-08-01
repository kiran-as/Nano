<?  include_once('../db/dbconfig.php');
   include_once('admin_login_check.php');
   include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
   include_once('../classes/messages.php');  
   include("../FCKeditor/fckeditor.php") ;  
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 






 if(isset($_POST['programInsert']))
 {
 
 
 	$info_query="insert into $programers_table  set pr_title='".$ch->checkFields($_POST['txtTitle'])."',
	 pr_description='".$ch->checkFields($_POST['programDescription'])."',
	pr_short_desc='".$ch->checkFields($_POST['shortDescription'])."'";
									
									
 $result=$db->insertRecord($info_query);
  echo "<script>document.location.href='admin_manage_programsbalu?msg=1'</script>";
// header("Location: admin_manage_programsbalu.php?msg=1");
	 				
				}					
if(isset($_POST['programUpdate']))
 {
 

 	$info_query="update $programers_table  set pr_title	='".$ch->checkFields($_POST['txtTitle'])."', pr_description='".$ch->checkFields($_POST['programDescription'])."',pr_short_desc='".$ch->checkFields($_POST['shortDescription'])."' where pr_id='".$_REQUEST[pr_id]."'";
									 
									
									
									
 $result=$db->insertRecord($info_query);
  echo "<script>document.location.href='admin_manage_programsbalu.php?msg=2'</script>";
// header("Location: admin_manage_programsbalu.php?msg=2");
	 				
				}	
				
				if($_REQUEST[action]=='delete' && is_numeric($_REQUEST[pr_id])!='')
 {
// echo "i am here";die;
 	$delete_query="delete from $programers_table where pr_id='".$_REQUEST[pr_id]."'";
									
 $result=$db->deleteRecord($delete_query);
  echo "<script>document.location.href='admin_manage_programsbalu.php?msg=3'</script>";
// header("Location: admin_manage_programsbalu.php?msg=3");
	 				
				}			
   
 ?>  <?  include_once('config/header.php');?> 
 <script type="text/javascript" src="<?=$server_url?>/admin/ckeditor/ckeditor.js"></script>
 <tr><td><table width="100%" height="165" >
 <tr><td height="21">&nbsp;</td>
 </tr>
   <tr>
      <td width="238" height="20" valign="top"  ><? include("admin_navigation.php");?></td>
	  

      <td>
	  <table width="702">
	    <tr>
	  <td colspan="2">
	<? if($_REQUEST[action]=='addprogram' || $_REQUEST[action]=='editprogram') { 
	  $edit_program = "SELECT * FROM $programers_table where pr_id ='".$_REQUEST[pr_id]."'";  


      $program_edit= $db->getResults($edit_program);
  foreach($program_edit as $edit){}
 

	?>
	  <?=$input->formStart('programForm','','onSubmit="return job_details_validation();"');?>
  <tables> 
  
  <span class="heading1" >Add/Edit Job Details </span>
  <? //=messaging($_REQUEST[msg])?>
 
<tr>
     <td height="10">&nbsp;</td>
     <td ><div align="center"><span class="error">* Indicates Required field</span></div></td>
</tr>
    <tr>
    <td width="76" height="1"  class="text" align="left">Title :</td>
    <td  height="" width="637">
	<?=$input->textBox('txtTitle',$edit->j_title
,'text','style=width:200px;','');?> <span class="error">*</span></td>  
    </tr>
  
<tr>
<td width="76" height="1"  class="text" align="left" valign="top">Description: </td>
<td  height="" width="637">

<textarea id="programDescription" name="programDescription"><?=stripslashes($edit->pr_description)?></textarea></td>  
</tr>


  
<tr>  
<td width="76" height="1"  class="text" align="left" valign="top"> Skills : </td>
<td  height="" width="637">
<textarea id="shortDescription" name="shortDescription"><?=stripslashes($edit->pr_short_desc)?></textarea>

</td>  
</tr>


<tr>
    
    <td  height="21" width="76">&nbsp;</td>
    
    <td  height="21" width="637">
   <? if($_REQUEST[action]=='addprogram') { echo $input->submitButton('programInsert','Add','button');
}
else
{
   echo $input->submitButton('programUpdate','update','button','style=background-color:#424843;color:#ffffff');

   }?>
      <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>--></td>
   </tr>
</table>
</td>
</tr>
</table> 
</td>
  <?=$input->formEnd?>
  <? }else{
   $query_edu = "SELECT * FROM $programers_table where r_id='".$_SESSION[r_id]."'order by pr_id desc"; 
   
   $job_result=$db->getResults($query_edu);
 ?>   

 
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td height="28" colspan="3"><span class="heading1" >Job Postings</span> <? //=messaging($_REQUEST[msg])?> </td>
    </tr>

  <tr>
   
    <td height="19"  class="error"><?=messaging($_REQUEST[msg])?></td>
    <td  class="error">&nbsp;</td>
    <td colspan="4" align="right"><a href="../admin_manage_programsbalu.php?action=addprogram" class="morelinkbtm">Add New</a></td>
    </tr>
	
    
    <td width="18%" height="19" class="slider">Title</td>
    <td width="28%" class="slider">Description</td>
    <td width="17%" class="slider">Skills</td>
    <td width="9%" class="slider" align="center">View</td>
	<td width="10%" class="slider" align="center">Edit</td>
    <td width="10%" class="slider" align="center">Delete</td>
  </tr>
  <tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>
  <?   
  foreach($job_result as $job){?>
 
  <tr>
    
    <td><?=stripslashes($job->j_title)?></td>
    <td ><?=stripslashes($job->pr_description)?></td>
    <td ><?=stripslashes($job->pr_short_desc)?> </td>
   <!-- <td > <?=$job->e_period?></td>-->
    <td><div align="center"><a href="../rec_assigned_students.php?ja_id=<?=$job->pr_id;?>"  style="text-decoration:none; color:#000;">view</a></div></td>
    
    <td><div align="center"><a href="../admin_manage_programsbalu.php?action=editprogram&amp;pr_id=<?=stripslashes($job->pr_id)?>"><img src="../images/edit.png" title="Edit" onclick="return toedit();"/></a></div></td>
	
    <td><div align="center"><a href="../admin_manage_programsbalu.php?action=delete&amp;pr_id=<?=stripslashes($job->pr_id)?>"><img src="../images/error.png" title="Delete" onclick="return  toDelete()"/></a></div></td>
  </tr>
 <tr><td style="height:1px; background:#666600;" colspan="6"></td></tr>
  <? }?>
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="4%">&nbsp;</td>
  </tr>
</table>
<? }?>

   </td>
	
	
</table>
    </Td></tr>
    <script type="text/javascript">
				CKEDITOR.replace( 'programDescription' );
				CKEDITOR.replace( 'shortDescription' );
			</script>
 
<? include_once('config/footer.php') ?>