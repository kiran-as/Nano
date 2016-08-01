<?
class messages
		{
		
		function success($msg)
					{
					switch($msg)
						{
							case 1:
							$messages="Successfully Insert";		
							break;
							case 2:
							$messages="Successfully Update";		
							break;
							case 3:
							$messages="Successfully Delete";		
							break;
							case 6:
							$messages="Sorry, You Already Registered with this Email Id";		
							break;
							case 7:
							$messages="Sorry no such account exists or activation code invalid.";
							break;
						}
					
					return $messages;
					}
		
		function errors($msg)			
					{
						switch($msg)
							{
							case 1:
							$messages="Invalid Login ID or Password";
							break;
							
							case 2:
							$messages="Invalid Input";
							break;
							case 3:
							$messages="Your Account is De-Activated";
							break;
							
							}
							
					return $messages;		
					
					}
					
	
		}

?>
