<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include("fckeditor/fckeditor.php") ;
include_once('image.class.php');
    include_once('thumb.php');

	if($_GET['action'] == 'IMGdel' && $_GET['id'] != '')
	{
		
		$Delete = "update $news_events_table set nw_image".$_GET['imgNum']."='' WHERE nw_id = ".$_GET['id'];
		$result = mysql_query($Delete);
		header("location: admin_edit_news.php?msg=3&n_id=".$_GET['id']);
	}

if(isset($_POST[update])&& is_numeric($_REQUEST[n_id]))
	 {
	 $startdate=explode("/",$_POST[txtDate]);
	 
	 		$img_field=''; 
		$img_field_val='';
			$subtittle='';
		$image_name='';
	 for($i=1;$i<=15;$i++)
	{
		if(basename($_FILES['fileImage'.$i]['name'])!='' && $_FILES['fileImage'.$i]['size']>0)
			{
				$filename=$_FILES['fileImage'.$i]['name'];
				$images[$i]=$filename;
				$image='../news_images/'.$filename;
				$mg_title[$i]=$_POST['txtsubTitle'.$i];			
				move_uploaded_file($_FILES['fileImage'.$i]['tmp_name'], $image); 
				
				chmod($image,0777);
				$subtittle.=$mg_title[$i].',';
				$image_name.=$images[$i].',';
				 
				$stitle_filed.='nw_sub_title'.$i.',';
				$stitle_filed_val.="'".$mg_title[$i]."',";
				$img_field.='nw_image'.$i.',';
				$img_field_val.="'".$images[$i]."',";

		$imzname.=",nw_image".$i."='".$images[$i]."'";
			}
			
			
			
			
	}
	
	
	
	
	
	
	
	
	
		 for($i=1;$i<=15;$i++)
	{
		
		
				
				$field[$i]=$_POST['txtsubTitle'.$i];
				
					
			$subtitl.=",nw_sub_title".$i."='".addslashes($field[$i])."'";
			
			
			
			
			
	}
		
	 
	 
	 $stime=mktime($st,$_REQUEST[s_half],0,$startdate[1],$startdate[2],$startdate[0]);
	 $image_array=array('lw_image1','lw_image2','lw_image3');
	 
	$query="Update $news_events_table set
	 nw_title='".addslashes($_POST[txtTitle])."',nw_date='".$stime."' ";
	
	for($i=1;$i<=3;$i++)
					{
		 if($_FILES['logoImage'.$i]['name']!='' && $_FILES['logoImage'.$i]['size']>0)
					 		{
							$image='image$i';
				$filename=mktime().replace_name(basename($_FILES['logoImage'.$i]['name']));
				$image='../logos/'.$filename;

							move_uploaded_file($_FILES['logoImage'.$i]['tmp_name'], $image); 
							resize(162,102,"../logos/","../logos/thumbs/",$filename);
							chmod($image,0777);
							@unlink('../logos/'.$_POST['hd_image'.$i]);
							@unlink('../logos/thumbs/'.$_POST['hd_image'.$i]);
							$j=$i-1;
							$query.= " ,$image_array[$j]='$filename'";
							
							}
		
					}
	 $query.=",nw_description='".addslashes($_POST[areaNews])."' ".$subtitl."".$imzname."
	 where nw_id='".$_REQUEST[n_id]."'";
	//echo  $query;die;
	 
	 mysql_query( $query) or die("culdnot:".mysql_error());
	 header("location:admin_manage_news.php?msg=2");
	 }	
	 
if(is_numeric($_REQUEST[n_id]))
	{
$event_details=mysql_query("select * from $news_events_table where nw_id=$_REQUEST[n_id] ") or die("culdnot:".mysql_error());
$details=mysql_fetch_array($event_details);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RV-VLSI Design Center</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script type="text/javascript" src="../js/admin_validation.js"></script>
<link href="../rv_main.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>


<link type="text/css" rel="stylesheet" href="../css/dhtmlgoodies_calendar.css" media="screen"></LINK>
<SCRIPT type="text/javascript" src="../js/dhtmlgoodies_calendar.js"></script>


</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="111"><a href="../index.php"><img src="../images/logo.jpg" width="111" height="98" border="0" /></a></td>
                <td width="55">&nbsp;</td>
                <td width="88" align="left" valign="middle">&nbsp;</td>
                <td align="left" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="bottom"></td>
                  </tr>
				  <tr><td width="20%"></td><td width="1px" style="background-color:#999999"></td><td width="78%"></td></tr>
                </table></td>
                <td width="332" align="right" valign="bottom" class="link_green" style="padding-bottom:5px;">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          
          <tr>
            <td align="left" valign="top" style="background:#CCCCCC; height:2px;" ></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                </tr>
				<tr><td width="20%" valign="top"><? include("admin_navigation.php");?></td>
				<td width="80%" valign="top" >
				<form action="" method="post" enctype="multipart/form-data" name="newsForm" onsubmit="return validateNews()">
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr>
				  <td height="25" colspan="2" class="heading_new">Edit News </td>
				</tr>
				<tr>
				  <td height="25" class="text10" >&nbsp;</td>
				  <td class="text11red"><?=messaging($_REQUEST[msg]);?></td>
				  </tr>
				<tr>
				  <td width="26%" height="25" class="text10" >Title : </td><td width="76%" class="sub_link"><input name="txtTitle" type="text" class="text10" style="width:450px"  value="<?=stripslashes($details[nw_title]);?>"  /></td>
				</tr>
				<tr>
				  <td width="26%" class="text10" >Date : </td>
				  <td width="76%"><input name="txtDate"  value="<? if($details[nw_date]!='0') echo date('Y/m/d',$details[nw_date]);?>" type="text" class="general-body" readonly>&nbsp;&nbsp;<input value="Calendar" onClick="displayCalendar(document.newsForm.txtDate,'yyyy/mm/dd',this)" class="button" type="button"></td>
				</tr>
                
                <tr>
	   <td valign="top">Image 1 : </td>
	  <td width="23%" valign="top"><input name="logoImage1" id="logoImage1" type="file" class="general-body" size="20"><? if($details[lw_image1]!='') { echo "<img src='../logos/thumbs/$details[lw_image1]' height='60' width='60'>";
	  } ?>
	  <input type="hidden" name="hd_image1" value="<?=$details[lw_image];?>" /></td><td>
	  </td></tr>
	<tr>
	   <td valign="top">Image 2 : </td>
	  <td valign="top"><input name="logoImage2" id="logoImage2" type="file" class="general-body" size="20"><? if($details[lw_image2]!='') { echo "<img src='../logos/thumbs/$details[lw_image2]' height='60' width='60'>";
 	   }?>  <input type="hidden" name="hd_image2" value="<?=$details[lw_image2];?>" /></td><td>
	   </td></tr>
	<tr>
	  <td valign="top">Image 3 : </td>
	  <td valign="top"><input name="logoImage3" id="logoImage3" type="file" class="general-body" size="20"><? if($details[lw_image3]!='') { echo "<img src='../logos/thumbs/$details[lw_image3]' height='60' width='60'>"; 
  
	  }?>
	    <input type="hidden" name="hd_image3"  value="<?=$details[lw_image3];?>" /></td><td>
	  </td></tr>
				<tr>
				  <td  height="25" class="text10" >Description : </td>
				<td width="76%" class="sub_link">&nbsp;</td>
				</tr>
				<tr>
				  <td  height="25" colspan="2" class="text10" >
				   <?
				
					$oFCKeditor = new FCKeditor('areaNews') ;
					$oFCKeditor->BasePath = '/admin/fckeditor/' ;
						$oFCKeditor->Height=500;
						$oFCKeditor->Value=stripslashes($details[nw_description]);
						
						$oFCKeditor->Create() ;
						?>
				  
</td>
				  </tr>
				
                	<tr>
				  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  
                  <? 
				 
				
			
				  $image=explode(',',stripslashes($details[nw_image]));
				  
				  ?>
				    <? for($i=1;$i<=15;$i++) {?>
				    <tr>
				      <td width="10%" height="25" class="text10" >News Title : </td>
				      <td width="33%" class="sub_link"><input name="txtsubTitle<?=$i?>" type="text" class="text10" style="width:200px" value="<?=stripslashes($details[nw_sub_title.$i])?>" /></td>
				      <td width="8%"><span class="text10">image :</span></td>
				      <td width="49%"><input name="fileImage<?=$i?>" id="fileImage<?=$i?>" type="file" class="textfield_admin-body" /><img src="../news_images/<?=stripslashes($details[nw_image.$i]) ?>" width="20" height="20" align="absmiddle" />
				      <? if(stripslashes($details[nw_image.$i])!='') {
								
					?><a class="sub_link" href="admin_edit_news.php?action=IMGdel&id=<?=$details[nw_id]?>&imgNum=<?=$i?>">Delete image</a><? }?>
                                
                                
                            </td>
				      </tr>
				    <? }?>
				    </table></td>
				  </tr>
				<tr>
				  <td colspan="2">&nbsp;</td>
				  </tr>
				<tR>
				  <td colspan="2">&nbsp;</td>
				  </tR>
				<tR>
				  <td colspan="2">&nbsp;</td>
				  </tR>
				<tR><td colspan="2"><div align="center">
				  <input name="update" type="submit" class="button" value="Update" />
				  </div></td></tR>
				  
				</Table>
                
                
                
				</form>				</td>
				</tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td height="20" colspan="3" align="center" valign="middle"></td>
      </tr>
      <tr>
        <td height="37" colspan="3" align="center" valign="middle" background="../images/footer_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20">&nbsp;</td>
            <td align="left" valign="middle" class="copyright">A unit of Rashtreeya Sikshana Samiti Trust.</td>
            <td align="right" valign="middle" class="copyright">All rights reserved, Copyright © RV-VLSI Design Center.</td>
            <td width="20">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
