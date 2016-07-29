<?php 
     include_once('db/dbconfig.php');
   /*include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
	    include_once('classes/checkingAuth.php');
   $check=new checkingAuth();
   $check->loginCheck();   

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
   */
 $sqlaa = "SELECT * FROM rv_academic_projects where m_id='".$_SESSION[m_id]."'";
        //echo ($sql);die();
	$resultss = mysql_query($sqlaa);
	$s=0;	
	while($row = mysql_fetch_assoc($resultss))
		{	   echo "asdf";
		      $arraStudent[$s]['p_challenges']	= $row["p_challenges"];
			  $s++;
	     }
		print_r(count($arraStudent));
		die();
		
	?>