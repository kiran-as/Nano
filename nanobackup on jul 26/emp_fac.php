<? include_once('db/dbconfig.php');
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

echo date('Y');
 $rv_marks='';
   

// number of years
     $works_experince_employee=$db->getResults("SELECT * FROM rv_work_experience where m_id='".$_SESSION[m_id]."'"); 
   $works_employee_count=count($works_experince_employee);
   if($works_employee_count!=0){
   $i=0;
foreach($works_experince_employee as $works_experince){
   $from=explode('-',$works_experince->we_from_date);
    $to=explode('-',$works_experince->we_to_date);
	if($to[0]=='13')
	{ $to0=date('m');
	}else{
	$to0=$to[0];
	}
	if($to[1]=='13')
	{ $to1=date('Y');
	}else{
	$to1=$to[1];
	}
	
	
$start=mktime(0,0,0,$from[0],0,$from[1]);
$end=mktime(0,0,0,$to0,0,$to1);

$years.$i=($end-$start)/(12*30*24*60*60);
$years1+=$years.$i;

 $i++;
}
echo ceil($years1)."<br/>";

}

	
	?>
	
	