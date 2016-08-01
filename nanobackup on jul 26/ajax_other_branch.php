<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   $db=new dataBase();
   $db->connectDB();

		//dbconnect :: dbc();
		global $course_table;
		  $states_qry = "select * from $branch_table where cor_id='".$_REQUEST['id']."' order by branch_name asc";
		$states_qry = mysql_query($states_qry) or die('error at countries'.mysql_error());
			
		$states=  '<select name="selBranchOther" id="selBranchOther"  style="width:150px;">';
		$states.=   '<option value="0">Select Branch</option>';
		$i=1;
		while($states_result=mysql_fetch_array($states_qry))
		 {
	
		$states.=  "<option  value=".$states_result[branch_id].">".$states_result[branch_name]."</option>";
        
		$i++;
		}
       	$states.=  '</select>';
		
		echo  $states;



?>
