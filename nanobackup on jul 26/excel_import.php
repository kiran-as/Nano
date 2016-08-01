<?php include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
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


$sql = "select * from rv_job_posting";
//$sql = "Select * from $projects_table order by p_id  desc";
	$result = @mysql_query($sql)	or die("Couldn't execute query:<br>".mysql_error().'<br>'.mysql_errno());
$ourFileName = realpath('.')."/data";
		$ourFileHandle = fopen($ourFileName, 'w')or die("can't open file"); 
		ini_set('max_execution_time', -1);
		header("Content-Type: application/vnd.ms-excel2007");
			header("Content-Disposition: attachment; filename=student_information_details.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
	
	
	    echo "Title"."\t".
			 "Company"."\t".
			 "Designation"."\t";
			 
			print("\n");
			
		while($imp=mysql_fetch_array($result))
				{
				
	
/*$date=date("d",$imp[p_time])." ".date('M, Y',$imp[p_time])."  ".date('g:i:s',$imp[p_time]);*/
	
				
	$output=str_replace("\t", "t",trim(stripslashes($imp[jp_job_title])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[jp_company])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[jp_designation])))."\t";	
	$output = preg_replace("/\r\n|\n\r|\n|\r/", ' ', $output);
		print(trim($output))."\t\n";
				}		 
	
?>