<? session_start();
$dblink=mysql_connect("localhost","vprasad","vp6200h");
mysql_select_db("y2rvvlsi",$dblink);

$error_BUG=0;
$reqs_array=$_REQUEST;

if(count($reqs_array)>0)
{
	foreach($reqs_array as $keys=>$values)
	{
		
		if(stristr($values,"union all") || stristr($values,"union") /*|| stristr($values," OR ")*/)
		{
			
		 $error_BUG++;
		}
	}
}

// header("Location: index.php");

function messaging($msgId)
			{
			switch($msgId)
				{
				case 1:
					$msg="Inserted.";
				break;
				
				case 2:
					$msg="Updated.";
				break;
				
				case 3:
				$msg="Deleted.";
				break;	
				
				case 4:
				$msg="Invalid EmailId or password.";
				break;
				case 5:
				$msg="Wrong old password.";
				break;
				case 6:
				$msg="Email Id already exists.";
				break;
				}	
			
			return $msg;
			}
			
			
			
//tables
	
	$admin_table="rv_admin";
	$news_events_table="rv_news_events";
	$page_content_table="rv_page_content";
	$programers_table="rv_programes";
	$video_table="rv_vidoes";
	$pages_table="rv_page_content";
	$sub_program_table="rv_prg_sub";
	$prg_calendar_table="rv_prg_calendar";
	$prg_planner_table='rv_course_planner';
	$contact_us_table='rv_contact_enq';
	$sub_page_content='rv_page_subcontent';
	
	global $admin_table;
	global $news_events_table;
	global $page_content_table;
	global $pages_table;
	global $programers_table;
	global $video_table;
	global $sub_program_table;
	global $prg_calendar_table;
	global $prg_planner_table;
	global $contact_us_table;
	global $sub_page_content;
	
	function pagenation($totalrows,$limit,$pn,$page)
					{
							if($pn != 1){ 
								$pageprev = $pn-1;
								
								echo("<a href=\"$page?png=$pageprev\" class='link_green' >Prev</a> "); 
							}
						
							$numofpages = $totalrows / $limit; 
							
							for($i = 1; $i <= $numofpages; $i++){
								if($i == $pn){
									echo($i." ");
								}else{
									echo("<a href=\"$page?png=$i\" class='link_green'>$i</a> ");
								}
							}
						
						
							if(($totalrows % $limit) != 0){
								if($i == $pn){
									echo($i." ");
								}else{
									echo("<a href=\"$page?png=$i\" class='link_green'>$i</a> ");
								}
							}
						
							if(($totalrows - ($limit * $pn)) > 0){
								$pagenext = $pn+1;
								 
								echo("<a href=\"$page?png=$pagenext\" class='link_green'>Next</a>"); 
							}

					}	
	
	
	
	

?>
