<?php include_once('db/dbconfig.php');
  $db=new dataBase();
   $db->connectDB(); 
echo "asdf";
die();
$sql = "select * from rv_job_posting";
//$sql = "Select * from $projects_table order by p_id  desc";
	$result = @mysql_query($sql)	or die("Couldn't execute query:<br>".mysql_error().'<br>'.mysql_errno());

	header('Content-Type: application/vnd.ms-excel');	//define header info for browser
	header('Content-Disposition: attachment; filename='.$dbTable.'-'.date('Ymd').'.xls');
	header('Pragma: no-cache');
	header('Expires: 0');
	
	
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