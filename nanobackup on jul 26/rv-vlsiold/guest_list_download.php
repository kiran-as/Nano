<?

include("../includes/dbConfig.php");
$other_perm=event_permission($_REQUEST[e_id]);

	header('Content-Type: application/vnd.ms-excel');	//define header info for browser
	header('Content-Disposition: attachment; filename='.$dbTable.'-'.date('Ymd').'.xls');
	header('Pragma: no-cache');
	header('Expires: 0');
if($other_perm>0 || $_SESSION[member_type]==5) 
		{
guest_result=mysql_query("select mt.m_firstname,mt.m_lastname,gt.gl_no from $guest_list_table gt,$members_table mt where mt.m_id=gt.m_id and gt.e_id=$_REQUEST[e_id]") or die(mysql_error());
$count=0;
echo "First Name"."\t".
			 "Last Name"."\t".
			 "Additional"."\t".
			 "Total";
			 print("\n");

$count=0;
while($guest=mysql_fetch_array($guest_result))
		{
		
		$output=$row[m_firstname]."\t".$row[m_lastname]."\t".$guest[gl_no]."\t".$guest[gl_no]+1."\t"
		
		$count=1+$guest[gl_no];
		$output = preg_replace("/\r\n|\n\r|\n|\r/", ' ', $output);
		print(trim($output))."\t\n";
		 } 
		
		echo ""."\t".
			 ""."\t".
			 ""."\t".
			 "<b>Total</b>";
			 print("\n");
			 echo ""."\t".
			 ""."\t".
			 ""."\t".
			 "<b>$count</b>";
		 print("\n");
		}

