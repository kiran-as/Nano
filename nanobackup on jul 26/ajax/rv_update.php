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
 
 
					   $info_query="update $members_table set m_student='' where m_id='".$_SESSION[m_id]."'";
					   //echo $info_query;die;
					   $result=$db->insertRecord($info_query);
					  
   ?>