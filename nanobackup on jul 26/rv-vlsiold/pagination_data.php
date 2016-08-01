<?php  include_once('db/dbconfig.php');

$per_page = 1; 

if($_GET)
{
$page=$_GET['page'];
}



//get table contents
$start = ($page-1)*$per_page;
$sql = "select * from $video_table where vi_status=1 order by vi_order asc limit $start,$per_page";
$rsd = mysql_query($sql);
?>


	<table width="200px">
		
		<?php
		//Print the contents
		
		while($video = mysql_fetch_array($rsd))
		{
			
			$id=$video['vi_id'];
//$msg=$row['message'];

		?>
		<tr><td colspan="2"><?php echo stripslashes($video[vi_url]); ?></td></tr>
		<?php
		} //while
		?>
	</table>

