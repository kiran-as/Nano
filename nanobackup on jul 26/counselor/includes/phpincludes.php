<?  include_once('../db/dbconfig.php');
    include_once('../classes/dataBase.php');
	include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	   
	   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

if(isset($_POST[login]))
	{
$check_login=mysql_query("select * from rv_counsellor where ad_username='".$_POST[txtEmailId]."'") or die("culnot do it:".mysql_error());
$check=mysql_fetch_array($check_login);
	if($check[ad_password]==$_POST[txtPassword])
		{
		$_SESSION['rv_vlsi_id']=$check[ad_id]; ?>
		<SCRIPT language="JavaScript">

document.location.href='1_admin_manage_students.php';

</SCRIPT>
		<? //header("Location:admin_home.php");
		}
		else
		?>
        <SCRIPT language="JavaScript">

document.location.href='index.php?msg=4';

</SCRIPT>
		<? //header("Location:index.php?msg=4");	
	}

?>