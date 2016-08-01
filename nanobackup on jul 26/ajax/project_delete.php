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
 


 $output='';
 $delete="delete from $work_projects_table where wp_id	='".$ch->checkFields($_REQUEST['wp_id'])."' and we_id='".$_REQUEST['we_id']."'";
 
$db->insertRecord($delete);
 
 
 $work_exp=$db->getResults("select * from $work_projects_table where we_id='".$_REQUEST['we_id']."'"); 
 foreach($work_exp as $workExp){
 
  $output.='<table width="100%" border="0" cellspacing="3" cellpadding="3">
       <tr>
         <td width="27%">Title : </td>
         <td width="57%"><input type="text" name="txtTitle" id="txtTitle"  style="width:200px;" value="'.stripslashes($workExp->wp_title).'" /></td>
         <td width="16%">&nbsp;</td>
       </tr>
       <tr>
         <td>Duration : </td>
         <td><input type="text" name="txtDuration" id="txtDuration" style="width:200px;" value="'.stripslashes($workExp->wp_duration).'" /></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>Role : </td>
         <td><input type="text" name="txtRole" id="txtRole" style="width:200px;"  value="'.stripslashes($workExp->wp_role).'" /></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>Team SIze : </td>
         <td><input type="text"  name="txtSize" id="txtSize" style="width:200px;" value="'.stripslashes($workExp->wp_team_size).'"  /></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td valign="top">Project Description : </td>
         <td><textarea name="areaDescription" id="areaDescription" style="width:250px; height:80px;">'.stripslashes($workExp->wp_description).'</textarea></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td valign="top">Tools Used : </td>
         <td><textarea name="areaUsed" id="areaUsed" style="width:250px; height:80px;">'.stripslashes($workExp->wp_tools).'</textarea></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td valign="top">Challenges : </td>
         <td><textarea  name="areaChallenges" id="areaChallenges" style="width:250px; height:80px;">'.stripslashes($workExp->wp_challenges).'</textarea></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>  <input type="button" name="saveAjax" value="Update" class="button"  onclick="workExpUpdate(\''.$workExp->wp_id.'\',\''.$workExp->we_id.'\',document.getElementById(\'txtTitle\').value,
document.getElementById(\'txtDuration\').value,document.getElementById(\'txtRole\').value,
document.getElementById(\'txtSize\').value,document.getElementById(\'areaDescription\').value,document.getElementById(\'areaUsed\').value,
document.getElementById(\'areaChallenges\').value);" />&nbsp;&nbsp;<input type="button" onclick="return toDelete();workProjectDelete(\''.$workExp->wp_id.'\',\''.$workExp->we_id.'\');return false;" value="Delete" class="button" />
          
         </td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
     </table>';
 
 }
 
 echo $output;
 
 
 
 
 
 
 
 
 ?>
 
 
 