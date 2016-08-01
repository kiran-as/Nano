<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   $db=new dataBase();
   $db->connectDB();

		//dbconnect :: dbc();
		global $rec_table;
		  $email_qry = "select * from $rec_table where r_email='".$_REQUEST['qua_id']."'";
		$email_Results = mysql_query($email_qry) or die('error at countries'.mysql_error());
			
		if(mysql_num_rows($email_Results)!=0)
		{$state=1;
		echo "Sorry this Email id already exists";
	}else{
	
	echo "";
	}	
	
	/*else
		$states=0;
		echo  $states;*/



?>
