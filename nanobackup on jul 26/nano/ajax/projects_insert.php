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
 $insert="insert into $work_projects_table set  we_id			='".$ch->checkFields($_REQUEST['we_id'])."',
												wp_title		='".$ch->checkFields($_REQUEST['title'])."',
												wp_description	='".$ch->checkFields($_REQUEST['desc'])."',
												wp_date			='".$ch->checkFields(mktime())."',
												wp_role			='".$ch->checkFields($_REQUEST['role'])."',
												wp_from_date	='".$ch->checkFields($_REQUEST['fmon'].'-'.$_REQUEST['fyear'])."',
												wp_to_date	='".$ch->checkFields($_REQUEST['tmon'].'-'.$_REQUEST['tyear'])."',
												wp_team_size 	='".$ch->checkFields($_REQUEST['size'])."',
												wp_tools		='".$ch->checkFields($_REQUEST['tool'])."',
												wp_challenges	='".$ch->checkFields($_REQUEST['chal'])."'";
 
$db->insertRecord($insert);
 
 
 $work_exp=$db->getResults("select * from $work_projects_table where we_id='".$_REQUEST['we_id']."'"); 
 foreach($work_exp as $workExp){
 
  $output.='<table width="100%" border="0" cellspacing="3" cellpadding="3">
       <tr>
         <td width="47%">Title : </td><td width="53%"><span class="text">Role : </span></td>
       </tr>
       <tr>
         <td width="47%"><input type="text" name="txtTitle" id="txtTitle"  class="text" style="width:250px;" value="'.stripslashes($workExp->wp_title).'" /></td>
         <td><input type="text" name="txtRole" id="txtRole" style="width:250px;"  value="'.stripslashes($workExp->wp_role).'" /></td>
         
       </tr>
       
       <tr>
         <td class="text">Duration : </td>
         <td class="text">Team SIze : </td>
       
       </tr>
       <tr>
         <td> <select name="selProjMonthU1" id="selProjMonthU1">
             ';
		 $from_date=explode('-',$workExp->wp_from_date);
		 for($dp=0;$dp<count($month_array);$dp++){ 
		  if($dp==$from_date[0]){
		 $sel1='selected';
		 }else{
		  $sel1='';
		 }
		 $output.='
             <option value="'.$dp.'" '.$sel1.'>'.$month_array[$dp].'</option>
             ';}
		 $output.='
           </select>&nbsp;<select name="selProjYearU1" id="selProjYearU1">
           <option value="0">Year</option>
           ';
		 for($yp=date(Y);$yp>1970;$yp--){ 
		 if($yp==$from_date[1]){
		 $sel2='selected';
		 }else{
		  $sel2='';
		 }
		 
		 $output.='
           <option value="'.$yp.'" '.$sel2.'>'.$yp.'</option>
           ';}
		 $output.=' 
         </select>&nbsp;&nbsp;<select name="selProjMonthU" id="selProjMonthU">
             ';
		  $to_date=explode('-',$workExp->wp_to_date);
		 for($dm=0;$dm<count($month_array);$dm++){ 
		  if($dm==$to_date[0]){
		 $sel3='selected';
		 }else{
		  $sel3='';
		 }
		 $output.='
             <option value="'.$dm.'" '.$sel3.'>'.$month_array[$dm].'</option>
              ';
		 }
		    $output.='
           </select>
           &nbsp;
           <select name="selProjYearU123" id="selProjYearU123">
             <option value="0">Year</option>
             ';
			for($yy=date(Y);$yy>1970;$yy--){ 
			  if($yy==$to_date[1]){
		 $sel4='selected';
		 }else{
		  $sel4='';
		 }
			$output.='
             <option value="'.$yy.'" '.$sel4.'>'.$yy.'</option>
             '; 
			} 
			$output.='
           </select></td>
         <td><input type="text"  name="txtSize" id="txtSize" style="width:250px;" value="'.stripslashes($workExp->wp_team_size).'"  /></td>
        
       </tr>
       <tr>
         <td valign="top" class="text">Project Description : </td>
         <td class="text">Tools Used : </td>
       
       </tr>
       <tr>
         <td valign="top"><textarea name="areaDescription" rows="2" id="areaDescription" style="width:250px;">'.stripslashes($workExp->wp_description).'</textarea></td>
         <td><textarea name="areaUsed" id="areaUsed" rows="2" style="width:250px; ">'.stripslashes($workExp->wp_tools).'</textarea></td>
        
       </tr>
       <tr>
         <td valign="top">Challenges : </td> <td>&nbsp;</td></tr>
         <tr>
         <td colspan="2"><textarea name="areaChallenges" rows="2" id="areaChallenges" style="width:250px;">'.stripslashes($workExp->wp_challenges).'</textarea>                </tr>
       <tr>
         <td>&nbsp;</td>
         <td>  <input type="image" name="saveAjax" value="Update" src="images/update.png" border="0" onclick="ajax_update_Validation(0);workExpUpdate(\''.$workExp->wp_id.'\',\''.$workExp->we_id.'\',document.getElementById(\'txtTitle\').value,
document.getElementById(\'selProjMonthU1\').value,document.getElementById(\'selProjYearU1\').value,document.getElementById(\'selProjMonthU\').value,document.getElementById(\'selProjYearU123\').value,document.getElementById(\'txtRole\').value,
document.getElementById(\'txtSize\').value,document.getElementById(\'areaDescription\').value,document.getElementById(\'areaUsed\').value,
document.getElementById(\'areaChallenges\').value);" />&nbsp;&nbsp;<input type="image" onclick="toDelete();workProjectDelete(\''.$workExp->wp_id.'\',\''.$workExp->we_id.'\');return false;" value="Delete" src="images/delete.png" border="0"  />         </td>
       
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
        
       </tr>
          </table>';
 
 }
 
 echo $output;
 
 
 
 
 
 
 
 
 ?>
 
 
 