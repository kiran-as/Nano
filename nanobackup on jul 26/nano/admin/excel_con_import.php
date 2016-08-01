<?
include('../db/dbconfig.php');
include_once('admin_login_check.php');


$sql = "Select * from $contact_us_table order by ce_id   desc";
	$result = @mysql_query($sql)	or die("Couldn't execute query:<br>".mysql_error().'<br>'.mysql_errno());

	header('Content-Type: application/vnd.ms-excel');	//define header info for browser
	header('Content-Disposition: attachment; filename='.$dbTable.'-'.date('Ymd').'.xls');
	header('Pragma: no-cache');
	header('Expires: 0');
	
	
	    echo "Name"."\t".
			 "Phone"."\t".
			 "Email"."\t".
			 "Occupation"."\t".
			 "Institute/Organization"."\t".
			 "Address"."\t".
			 "Comments /Questions"."\t".
			 "Date & Time"."\t".
			 "IP Address"."\t";
			 
			print("\n");
			
		while($imp=mysql_fetch_array($result))
				{
	
$date=date("d",$imp[ce_date])." ".date('M, Y',$imp[ce_date])."  ".date('g:i:s',$imp[ce_date]);
	
				
	$output=str_replace("\t", "t",trim(stripslashes($imp[ce_name])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[ce_phone])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[ce_email])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[ce_occupation])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[ce_institution])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[ce_address])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[ce_comments])))."\t".
	str_replace("\t", "t",trim(stripslashes($date)))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[ce_ip])))."\t";

	$output = preg_replace("/\r\n|\n\r|\n|\r/", ' ', $output);
		print(trim($output))."\t\n";
				}		 
	
?>