<?
include_once('db/dbconfig.php');
  include_once('classes/dataBase.php');
  $dblink=mysql_connect($hostname,$username,$password);
					mysql_select_db($database,$dblink);

$q=$_GET['q'];


$sql="SELECT * FROM rv_registration WHERE m_emailid = '".$q."'";
$result = mysql_query($sql) or die(mysql_error());

$output='';
	$num = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
//echo $num = mysql_num_rows($result);
if($num>0)
{
$output.="<font color='red'><strong>Sorry this Email id already exists</strong></font>";
}else{
$output.="<font color='green'><strong>Congrats this Email id is available</strong></font>";
}
echo $output;
?> 

