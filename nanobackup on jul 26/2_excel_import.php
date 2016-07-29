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

$fromdate=$_GET['fromdate'];
$todate=$_GET['todate'];
$sql= "select * from rv_registration where m_regdate >='$fromdate' and  m_regdate<='$todate'";
//"select * from rv_registration where m_regdate between $fromdate and $todate";
//die();
//$sql = "Select * from $projects_table order by p_id  desc";

$Insert	=	mysql_query("INSERT INTO rv_previousexport (fromdate, todate)
VALUES ('".$fromdate."','".$todate."')")or die(mysql_error());
//header("Lo
	$result = @mysql_query($sql)	or die("Couldn't execute query:<br>".mysql_error().'<br>'.mysql_errno());

	header('Content-Type: application/vnd.ms-excel');	//define header info for browser
	header('Content-Disposition: attachment; filename='.$dbTable.'-'.date('Ymd').'.xls');
	header('Pragma: no-cache');
	header('Expires: 0');
	
	
	    echo "Name"."\t".
			 "E-Mail"."\t".
			 "Phone"."\t";
			 
			print("\n");
			
		while($imp=mysql_fetch_array($result))
				{
				
	
/*$date=date("d",$imp[p_time])." ".date('M, Y',$imp[p_time])."  ".date('g:i:s',$imp[p_time]);*/
	
				
	$output=str_replace("\t", "t",trim(stripslashes($imp[m_fname])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[m_emailid])))."\t".
	str_replace("\t", "t",trim(stripslashes($imp[m_phone])))."\t";	
	$output = preg_replace("/\r\n|\n\r|\n|\r/", ' ', $output);
		print(trim($output))."\t\n";
				}		 
	
?>