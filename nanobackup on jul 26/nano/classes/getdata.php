<? 
class getData
		{
function  getImage($id)
					{
			  $db=new dataBase();
   $db->connectDB();		
				
	
					$result=$db->getResults("select * from zn_images where im_id='".$id."'");
					$image=$result[0]->im_url;
					return $image;
					}	
					
	function  wordsCount($str,$count)
					{
					$result=explode(" ",$str);
					for($c=0;$c<count($result);$c++){
					
					$string.=$result." ";
					}
					$srting=substr($string,0,-1);
					return $srting;
					}	
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					}?>