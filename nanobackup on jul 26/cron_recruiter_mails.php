<? include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');

	$db=new dataBase();
   $db->connectDB(); 

$now=mktime(0,0,0,date('m'),date('d'),date('y'));
echo 'first date'.date('d-m-y',$now);
$days3=(3*24*60*60)+$now;
echo '<br/>3days date'.date('d-m-y',$days3);

//$cron_mail_query=$db->getResults("select * from rv_job_posting ");


?>
