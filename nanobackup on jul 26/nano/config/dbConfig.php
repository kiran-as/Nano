<? session_start();
ini_set('display_errors','Off');
ini_set('log_errors','0');



global $username;
global $password;
global $hostname;
global $database;

//localhost
$username="root";
$password="";
$hostname="localhost";
$database="rvvlsi";

//server
/*$username="kaivalya_RD";
$password="#@~=y*Uyg8^l";
$hostname="localhost";
$database="kaivalya_RD";*/

/*$GLOBAL['admin']['includes']="../includes/";
$GLOBAL['admin']['includes']="../classes/";*/
$error_BUG=0;
$reqs_array=$_REQUEST;

if(count($reqs_array)>0)
{
	foreach($reqs_array as $keys=>$values)
	{
		
		if(stristr($values,"union all") || stristr($values,"union") || stristr($values," OR ") || stristr($values,"select *"))
		{
			
		 $error_BUG++;
		}
	}
}
if($error_BUG>0)
 header("Location: index.php");

$server_url="http://192.168.1.11/rd/";
//$server_url="http://www.sksversion.com/RD/";

//table names
$ratings_table='zn_ratings';
$admin_table='zn_admin';
$admin_member="zn_members";
$member_contact_person='zn_contact_person';
$membership_table="zn_memberships";
$image_table="zn_images";
$events_table="zn_events";
$reports_table="zn_reports";
$sub_report_table="zn_sub_reports";
$payment_table="zn_members_payments";
$modules_table="zn_modules";
$history_table="zn_reports_history";
$events_cat_table="zn_event_categories";
$newsletters_table="zn_newsletter";
$forum_topics_table='zn_forum_topics';
$forum_members_table='zn_forum_member';
$material_category_table='zn_material_categories';
$event_status_table='zn_event_status';
$event_comments_table='zn_event_comments';
$footer_table='zn_footer_links';
$videos_table='zn_videos';
$participants_table='zn_event_participants';
$additional_members_table='zn_aditional_members';
$ms_tables='zn_members_subscriptions';
$chapters_table='zn_chapters';
$reports_comments='zn_reports_comments';
$reports_download='zn_reports_download';
$modules_history='zn_module_history';
$media_table='zn_media';
$content_table='zn_home_content';
$videos_comments='zn_videos_comments';
$help_pages_table='zn_help_pages';
$help_mails_table='zn_help_mails';

// options
$status_array['options'][0]='In-Active';
$status_array['options'][1]='Active';
$status_array['values'][0]='0';
$status_array['values'][1]='1';

function replace($string)
			{
			$operators=array(" ","!","#","$","%","^","&","*","(",")","=","+","|","/","[","~","]",";",",","'");
			
			
			for($i=0;$i<count($operators);$i++)
					{
					$string=str_replace($operators[$i],"_",$string);
					}
					
			return $string;
			}	
			
	function replace1($string)
			{
			$operators=array("."," ","!","#","$","%","^","&","*","(",")","=","+","|","/","[","~","]",";",",","'");
			
			
			for($i=0;$i<count($operators);$i++)
					{
					$string=str_replace($operators[$i],"_",$string);
					}
					
			return $string;
			}					



function smart_resize_image( $file, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = false, $use_linux_commands = false )
    {
        if ( $height <= 0 && $width <= 0 ) {
            return false;
        }


        $info = getimagesize($file);
        $image = '';

        $final_width = 0;
        $final_height = 0;
        list($width_old, $height_old) = $info;

        if ($proportional) {
            if ($width == 0) $factor = $height/$height_old;
            elseif ($height == 0) $factor = $width/$width_old;
            else $factor = min ( $width / $width_old, $height / $height_old);   

            $final_width = round ($width_old * $factor);
            $final_height = round ($height_old * $factor);

        }
        else {
            $final_width = ( $width <= 0 ) ? $width_old : $width;
            $final_height = ( $height <= 0 ) ? $height_old : $height;
        }

        switch ( $info[2] ) {
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($file);
            break;
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($file);
            break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($file);
            break;
            default:
                return false;
        }
        
        $image_resized = imagecreatetruecolor( $final_width, $final_height );
                
        if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
            $trnprt_indx = imagecolortransparent($image);
   
            // If we have a specific transparent color
            if ($trnprt_indx >= 0) {
   
                // Get the original image's transparent color's RGB values
                $trnprt_color    = imagecolorsforindex($image, $trnprt_indx);

   
                // Allocate the same color in the new image resource
                $trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
   
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $trnprt_indx);
   
                // Set the background color for new image to transparent
                imagecolortransparent($image_resized, $trnprt_indx);
   
            
            } 
            // Always make a transparent background color for PNGs that don't have one allocated already
            elseif ($info[2] == IMAGETYPE_PNG) {
   
                // Turn off transparency blending (temporarily)
                imagealphablending($image_resized, false);
   
                // Create a new transparent color for image
                $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
   
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $color);
   
                // Restore transparency blending
                imagesavealpha($image_resized, true);
            }
        }

        imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
    
        if ( $delete_original ) {
            if ( $use_linux_commands )
                exec('rm '.$file);
            else
                @unlink($file);
        }
        
        switch ( strtolower($output) ) {
            case 'browser':
                $mime = image_type_to_mime_type($info[2]);
                header("Content-type: $mime");
                $output = NULL;
            break;
            case 'file':
                $output = $file;
            break;
            case 'return':
                return $image_resized;
            break;
            default:
            break;
        }

        switch ( $info[2] ) {
            case IMAGETYPE_GIF:
                imagegif($image_resized, $output);
            break;
            case IMAGETYPE_JPEG:
                imagejpeg($image_resized, $output);
            break;
            case IMAGETYPE_PNG:
                imagepng($image_resized, $output);
            break;
            default:
                return false;
        }

        return true;
    }	
	

/* calculate total ratings on a post start */
function totalrating($column,$column_val){

	$total_rating=mysql_query("select sum(rat_total_value) as rate_sum,count(".$column.") as rate_count,".$column." from zn_ratings where ".$column."='".$column_val."' and rat_option='0' group by ".$column."") or die("Could not fetch from  zn_ratings :".mysql_error());
	
	$total_avg=0;
	$total_users=0;
	if(mysql_num_rows($total_rating) > 0){
		$total_rate_res=mysql_fetch_array($total_rating);
		$total_avg=$total_rate_res[rate_sum]/$total_rate_res[rate_count];
		$total_users=$total_rate_res[rate_count];
	}
		for($j=1;$j<=5;$j++){
		
			if($j <= $total_avg){
				$image='star-ps.gif';
				
			} else {
				$image='star-empty.gif';
				if(gettype($total_avg) == "double"){
					
					if($total_avg > 0 && $total_avg < 1 && $j == 1){
						$image='star-ps-half.gif';
					}
					if(ceil($total_avg) == $j){
						$image='star-ps-half.gif'; }
				}
				
			}
			$output.='<img src="images/'.$image.'" align="absmiddle">';
		}	//echo "sriharichava";die;
			
		return $output."^".$total_users;
	
}
/* calculate total ratings on a post end */


?>