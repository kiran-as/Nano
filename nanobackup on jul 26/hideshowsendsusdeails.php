<?php 
 include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

		  
		  $idjobposting=$_GET['idjobposting'];
		
		  	$selectjobposings = "Select a.*,b.* from rv_jobpostedstudent as a,rv_registration as b where a.m_id=b.m_id and a.jp_id='$idjobposting' group by a.m_id ";


	$resultc = mysql_query($selectjobposings);
	$s=0;$sendus = 0;
	while ($row = mysql_fetch_assoc($resultc)) {
		    $arrajobpostings[$s]["m_resume_id"]	= $row["m_resume_id"];
 			$arrajobpostings[$s]["m_id"]	= $row["m_id"];
 			$arrajobpostings[$s]["Showcontact"]	= $row["Showcontact"];
			$arrajobpostings[$s]["m_fname"]	= $row["m_fname"];
			$arrajobpostings[$s]["replaytous"]	= $row["replaytous"];
			if($row['replaytous']==1)
			{
			  $sendus=1;
			}
		     $s++;
		 
		}	  
		  
echo $sendus;

?>
