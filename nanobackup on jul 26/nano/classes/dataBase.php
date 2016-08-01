<?
class dataBase
		{
		
		function  connectDB()
					{
					global $username;
					global $password;
					global $hostname;
					global $database;
					
					 
	
	
					$dblink=mysql_connect($hostname,$username,$password);
					mysql_select_db($database,$dblink);
					}   
		 
		function  getResults($query)
					{
					$result=mysql_query($query)or die(mysql_error());

					while($row=mysql_fetch_object($result))
						{
						$result_set[]=$row;	
						}
					return $result_set;
					}
		
		function deleteRecord($query)
					{
					mysql_query($query)or die(mysql_error());
					}
					
					
		function lastinsertid($query)
		{
		
		$this->insertRecord($query);
		return mysql_insert_id();
		}	
					
		function numRows($result_set)
					{
					return count($result_set);
					}
					
		function getResultsPage($query,$limit,$page)			
					{
					
					}
					
		function insertRecord($query)
					{
					mysql_query($query) or die(mysql_error());
					}
					
		function updateRecord($query)
					{
					mysql_query($query) or die(mysql_error());
					}		
					
	function  getSingleResults($query)
					{
					$result=mysql_query($query)or die(mysql_error());
					return $result;
					}	
					
		
	
		
		
		}
		
		

?>