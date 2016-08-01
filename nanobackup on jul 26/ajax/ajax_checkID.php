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
$res='';
   $result=$db->getResults("select * from rv_members_ids where rm_mem_id='".$_REQUEST[id]."'");
					   if(count($result)==0){
					   $res.=0;// invalid ID
					   }else  {
						   if(count($result)!=0 && $result[0]->rm_status=='1' && $result[0]->m_id!=$_SESSION[m_id]){
					   $res.=1; // alloted to someone else
					   }else{
						$db->insertRecord("update $members_table set m_student='".$_REQUEST[id]."' where m_id='".$_SESSION[m_id]."'");
						//echo "update rv_members_ids set rm_status='1' where rm_mem_id='".$_REQUEST[id]."'";die;
						$db->insertRecord("update rv_members_ids set rm_status='1',m_id='$_SESSION[m_id]' where rm_mem_id='".$_REQUEST[id]."'"); 
						$res.=2; 
						   }}
					   					   
				  echo $res;
					  
   ?>