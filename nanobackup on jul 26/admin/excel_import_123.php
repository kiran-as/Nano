<?php
include('../db/dbconfig.php');
$db=new dataBase();
$db->connectDB(); 
$sql = "Select a.e_percentage as tenth,
       b.e_percentage as puc,
       c.e_percentage as degree,c.e_passout_year as degpassout,c.e_institute as collegename,
       d.m_fname as firstname , d.m_lname as lastname, d.m_emailid as email, d.m_phone as phonenumber

from rv_educational_details as a,
     rv_educational_details  as b,
     rv_educational_details as c,
     rv_registration as d

where a.m_id=b.m_id and a.m_id=c.m_id and b.m_id=c.m_id and a.m_id=d.m_id and b.m_id=d.m_id and c.m_id=d.m_id and  a.qua_id=5 and b.qua_id=4 and c.qua_id=2 and a.m_id not in (Select m_id from rv_work_experience)
";
echo($sql);
	$result = @mysql_query($sql)	or die("Couldn't execute query:<br>".mysql_error().'<br>'.mysql_errno());

	header('Content-Type: application/vnd.ms-excel');	//define header info for browser
	header('Content-Disposition: attachment; filename='.$dbTable.'-'.date('Ymd').'.xls');
	header('Pragma: no-cache');
	header('Expires: 0');
	
	
	    echo "Tenth"."\t".
			 "PUC"."\t".
			 "Degree"."\t".
			 "Degree Pass Out"."\t".
			 "College NAme"."\t".
			 "First NAme"."\t".
			  "Last Name"."\t".
			 "Email"."\t".
			 "Phone Number"."\t";
			 
			print("\n");
			
		while($imp=mysql_fetch_array($result))
				{

	$output=str_replace("\t", "t",trim(stripslashes($imp[tenth])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[puc])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[degree])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[degpassout])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[collegename])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[firstname])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[lastname])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[email])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[phonenumber])))."\t".
	$output = preg_replace("/\r\n|\n\r|\n|\r/", ' ', $output);
		print(trim($output))."\t\n";
				}		 
	
?>