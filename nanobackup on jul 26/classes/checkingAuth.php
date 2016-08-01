<?
class checkingAuth
		{
		
		function loginCheck()
					{
			
					if(empty($_SESSION['m_id'])){
						//header("Location:job_seeker_login.php");
							echo "<script>document.location.href='job_seeker_login.php'</script>";		
					}
					}
					function loginCheckrec()
					{
			
					if(empty($_SESSION['r_id'])){
						//header("Location:job_seeker_login.php");
							echo "<script>document.location.href='recruiter_login.php'</script>";		
					}
					}
		
		}
?>