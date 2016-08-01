<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   $db=new dataBase();
   $db->connectDB();

		//dbconnect :: dbc();
		global $course_table;
		  $states_qry = "select * from $course_table where qua_id='".$_REQUEST['qua_id']."' order by cor_name asc";
		$states_qry = mysql_query($states_qry) or die('error at countries'.mysql_error());
			
		$states=  '<select name="selCourse" id="selCourse" style="width:150px;" class="drop_box">';
		$states.=   '<option value="0">Select Course</option>';
		$i=1;
		while($states_result=mysql_fetch_array($states_qry))
		 {
		 if($states_result[t_id]==$selected)
		 $sel='selected="selected"';
		 else
		 $sel='';
/*".$sel."*/
		$states.=  "<option  value=".$states_result[cor_id].">".$states_result[cor_name]."</option>";
        
		$i++;
		}
       	$states.=  '</select>';
		
		echo  $states;



?>
