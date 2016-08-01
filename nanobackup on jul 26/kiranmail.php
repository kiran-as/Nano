<?php 
include_once('Zend/Mail.php');
include_once('Zend/Mail/Transport/Smtp.php');
?>

<?php 
if(isset($_POST) && $_POST!=null){
	
	/*Data*/

	$username = $_POST['username'];
	$password = $_POST['password'];
	$smtp = $_POST['smtp'];
	$port = $_POST['port'];
	$auth = $_POST['auth'];
	$sender = $_POST['sender_name'];
	$sender_email = $_POST['sender_email'];
	$receiver = $_POST['receiver_name'];
	$receiver_email = $_POST['receiver_email'];
	$message = $_POST['message'];
	
include_once('Zend/Mail.php');
include_once('Zend/Mail/Transport/Smtp.php');
                 
	
	$type="html";
	$config = array('ssl' => $auth, 'port' => $port, 'auth' => 'login', 'username' => $username, 'password' => $password);
	$transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
	
	$mail = new Zend_Mail();
	
	if (strtolower($type) == 'html'){
		$mail->setBodyHtml($message);
	}else {
		$mail->setBodyText($message);
	}
	
	$mail->setFrom($sender_email, $sender)
		->addTo($receiver_email, $receiver)
		->setSubject("Test mail from ibfim");
	
	try {
		$result = $mail->send($transport);
			
	} catch (Exception $e) {
		
		echo "<h2>Error sending email</h2>";
		echo "<hr />";
		echo "Error Msg:";
		
		echo "<pre>";
		print_r($e);
		echo "<pre>";
		exit;
	}
	
	echo "Message sended";
	
	
	
	
}else{
?>
<form name="mail-form" method="post">
	<table>
		<tr>
			<th colspan="3">SMTP Details</th>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username" /></td>
		</tr>
		<tr>
			<td>password</td>
			<td>:</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td>SMTP</td>
			<td>:</td>
			<td><input type="text" name="smtp" value="smtp.gmail.com" /></td>
		</tr>
		<tr>
			<td>Port</td>
			<td>:</td>
			<td><input type="text" name="port" value="465" /></td>
		</tr>
		<tr>
			<td>Authentication</td>
			<td>:</td>
			<td>
				<input type="radio" name="auth" value="ssl" checked="checked"/> SSL
				<input type="radio" name="auth" value="tls"/> TLS
				<input type="radio" name="auth" value="null"/> No 
			</td>
		</tr>
		<tr>
			<td colspan="3"><hr /></td>
		</tr>
		<tr>
			<th colspan="3">Sender Details</th>
		</tr>
		<tr>
			<td>Sender name</td>
			<td>:</td>
			<td><input type="text" name="sender" /></td>
		</tr>
		<tr>
			<td>Sender Email</td>
			<td>:</td>
			<td><input type="text" name="sender_email" /></td>
		</tr>
		<tr>
			<td colspan="3"><hr /></td>
		</tr>
		<tr>
			<th colspan="3">Receiver Details</th>
		</tr>
		<tr>
			<td>Receiver name</td>
			<td>:</td>
			<td><input type="text" name="receiver_name" /></td>
		</tr>
		<tr>
			<td>Receiver Email</td>
			<td>:</td>
			<td><input type="text" name="receiver_email" /></td>
		</tr>
		<tr>
			<td colspan="3"><hr /></td>
		</tr>
		<tr>
			<td>Message</td>
			<td>:</td>
			<td>
				<textarea name="message" rows="5" cols="20"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="3"><hr /></td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" value="Send Email" />
			</td>
		</tr>
	</table>
</form>
<?php }?>