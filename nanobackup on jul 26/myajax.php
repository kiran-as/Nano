<?
include_once('db/dbconfig.php');
include_once('classes/dataBase.php');
$db=new dataBase();
$db->connectDB();
$output='';
$output.='<select name="selCourse"  style="width:120px;" id="corid" onchange="course(this.value)">
            
               <option value="0">Course</option>';
			   

					$query_corid=mysql_query("select * from `rv_course` where `qua_id`='".$_GET['id']."'");
					   while($corid=mysql_fetch_assoc($query_corid))
					   {
						   
$output.='<option value="'.$corid['cor_id'].'">'.$corid['cor_name'].'</option>';                        
                         
                          
					   }
					   
					                       
 $output.='</select>';
echo  $output;
?>