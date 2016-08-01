<?
include('../db/dbconfig.php');
include_once('admin_login_check.php');


$sql = "Select * from tbl_studentdetailsinformation order by idstudentdetailsinformation  desc";
	$result = @mysql_query($sql)	or die("Couldn't execute query:<br>".mysql_error().'<br>'.mysql_errno());
	$dbTable="studentslist";

	header('Content-Type: application/vnd.ms-excel');	//define header info for browser
	header('Content-Disposition: attachment; filename='.$dbTable.'-'.date('Ymd').'.xls');
	header('Pragma: no-cache');
	header('Expires: 0');
	
	
	    echo "Name"."\t".
			 "Phone"."\t".
			 "Email"."\t".
			 "Your primary objective to take up a course"."\t".
			 "Select the domain youre interest in"."\t".
			 "How many weeks can you spare fulltime, Monday to Friday?"."\t".
			 "What is your highest qualification?"."\t".
			 "Do you have ANY industry experience"."\t".
	    	 "Ip Address"."\t".
			 "Date"."\t".
			 "Result"."\t";		 
			print("\n");
			
		while($imp=mysql_fetch_array($result))
				{
	
//$date=date("d",$imp[p_time])." ".date('M, Y',$imp[p_time])."  ".date('g:i:s',$imp[p_time]);
	
				
	$output=str_replace("\t", "t",trim(stripslashes($imp[StudentName])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[StudentPhone])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[StudentEmail])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[Answer1])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[Answer2])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[Answer3])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[Answer4])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[Answer5])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[Ip])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[Date])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[Result])))."\t";
	$output = preg_replace("/\r\n|\n\r|\n|\r/", ' ', $output);
		print(trim($output))."\t\n";
				}		 
	
?>