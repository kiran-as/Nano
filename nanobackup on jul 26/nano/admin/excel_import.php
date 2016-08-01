<?
include('../db/dbconfig.php');
include_once('admin_login_check.php');


$sql = "Select * from $prg_planner_table order by p_id  desc";
	$result = @mysql_query($sql)	or die("Couldn't execute query:<br>".mysql_error().'<br>'.mysql_errno());

	header('Content-Type: application/vnd.ms-excel');	//define header info for browser
	header('Content-Disposition: attachment; filename='.$dbTable.'-'.date('Ymd').'.xls');
	header('Pragma: no-cache');
	header('Expires: 0');
	
	
	    echo "Name"."\t".
			 "Phone"."\t".
			 "Email"."\t".
			 "How do you rate yourself on basic electronics on a scale of 0 to 10 (10 being the best)"."\t".
			 "Do you like programming in C"."\t".
			 "What is your highest qualification"."\t".
			 "Are you interested in"."\t".
			 "Do you have ANY industry experience select below"."\t".
			 "How many weeks can you spare fulltime Monday to Friday"."\t".
			 "Are you planning on going abroad in the next 12 months for higher studies"."\t".
			 "Are you a student in BE 5th sem and above "."\t".
			 "Date & Time"."\t".
			 "Result"."\t".
			 "IP Address"."\t";
			 
			print("\n");
			
		while($imp=mysql_fetch_array($result))
				{
	
$date=date("d",$imp[p_time])." ".date('M, Y',$imp[p_time])."  ".date('g:i:s',$imp[p_time]);
	
				
	$output=str_replace("\t", "t",trim(stripslashes($imp[p_name])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_phone])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_email])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_electronics])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_c_programming])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_higher])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_interested])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_industry])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_weeks])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_planning])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_completed])))."\t".
	str_replace("\t", "t",trim(stripslashes($date)))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_result])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[p_ip_address])))."\t".
	$output = preg_replace("/\r\n|\n\r|\n|\r/", ' ', $output);
		print(trim($output))."\t\n";
				}		 
	
?>