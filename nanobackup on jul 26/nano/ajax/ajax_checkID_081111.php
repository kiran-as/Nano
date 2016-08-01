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
 
//echo "select * from rv_members_ids where rm_mem_id='".$_REQUEST[id]."'";
					   
					    $result=$db->getResults("select * from rv_members_ids where rm_mem_id='".$_REQUEST[id]."'");
					   if(count($result)==0){
					   $res=0;// invalid ID
					   }  if(count($result)!=0 && $result[0]->rm_status=='1' && $result[0]->m-id!=$_SESSION[m_id]){
					   $res=1; // alloted to someone else
					   }
					   
					   
					   echo $res;
					  
   ?>