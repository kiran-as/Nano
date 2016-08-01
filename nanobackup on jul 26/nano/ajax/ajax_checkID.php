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
 
//die("select * from rv_members_ids where rm_mem_id='".$_REQUEST[id]."'");
					   
					 //   $result=$db->getResults("select * from rv_members_ids where rm_mem_id='".$_REQUEST[id]."'");
					$sql_qu=mysql_query( "select * from rv_members_ids where rm_mem_id='".$_REQUEST[id]."' ") or die("Fetching Error".mysql_error());
					
					while($row=mysql_fetch_array($sql_qu))
						{
						$result=$row['rm_status'];
						}
						
					
						//die(print_r($result));
					   if(mysql_num_rows($sql_qu)==0)
					   {
					   $res=0;// invalid ID
					   }  
					   else if(mysql_num_rows($sql_qu)!=0 && $result=='1'){
					   $res=1; // alloted to someone else
					   }
					   else if(mysql_num_rows($sql_qu)!=0 && $result=='0'){
					   $res=2; // newly alloted id 
					   }
					   
					   
				  echo $res;
					  
   ?>