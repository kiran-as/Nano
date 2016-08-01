<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include("fckeditor/fckeditor.php") ;
include_once('image.class.php');
    include_once('thumb.php');
if(isset($_POST[add]))
	 {
	 $startdate=explode("/",$_POST[txtDate]);
	 
	 	$img_field=''; 
		$img_field_val='';
			$subtittle='';
		$image_name='';
	 for($i=1;$i<=10;$i++)
	{
		if(basename($_FILES['fileImage'.$i]['name'])!='' && $_FILES['fileImage'.$i]['size']>0)
			{
				$filename=$_FILES['fileImage'.$i]['name'];
				$images[$i]=$filename;
				$image='../news_images/'.$filename;
				$img_title[$i]=$_POST['txtsubTitle'.$i];			
				move_uploaded_file($_FILES['fileImage'.$i]['tmp_name'], $image); 
				
				chmod($image,0777);
				$subtittle.=$img_title[$i].',';
				$image_name.=$images[$i].',';
				 
				$stitle_filed.=',nw_sub_title'.$i.',';
				$stitle_filed_val.=",'".$img_title[$i]."',";
				$img_field.=',nw_image'.$i.',';
				$img_field_val.=",'".$images[$i]."',";

			}
	}
		$stitle_filed=substr($stitle_filed,0,-1);
		$stitle_filed_val=substr($stitle_filed_val,0,-1);	



		$img_field=substr($img_field,0,-1);	
		$img_field_val=substr($img_field_val,0,-1);	
	 


/*	$subtittle=substr($subtittle,0,-1);		 
	$image_name=substr($image_name,0,-1);	*/	 
	for($i=1;$i<=3;$i++)
					{
						
					 if($_FILES['logoImage'.$i]['name']!='' && $_FILES['logoImage'.$i]['size']>0)
					 		{//echo "sri";die;
				$filename=mktime().replace_name(basename($_FILES['logoImage'.$i]['name']));
				$images[$i]=$filename;
 					$image='../logos/'.$filename;
 						
							move_uploaded_file($_FILES['logoImage'.$i]['tmp_name'], $image); 
							resize(162,102,"../logos/","../logos/thumbs/",$filename);
							//resize(800,600,"../events/","../events/",$filename);
							chmod($image,0777);
							
					
							}
					}
	 
	// echo "insert into $news_events_table(nw_title,nw_date,lw_image1,lw_image2,lw_image3,nw_description".$stitle_filed."".$img_field.") values('".addslashes($_POST[txtTitle])."',$stime,'$images[1]','$images[2]','$images[3]','".addslashes($_POST[areaNews])."'".$stitle_filed_val."".$img_field_val.") ";die;
	 $stime=mktime($st,$_REQUEST[s_half],0,$startdate[1],$startdate[2],$startdate[0]);
  $sql= "insert into $news_events_table(nw_title,nw_date,lw_image1,lw_image2,lw_image3,nw_description".$stitle_filed."".$img_field.") values('".addslashes($_POST[txtTitle])."',$stime,'$images[1]','$images[2]','$images[3]','".addslashes($_POST[areaNews])."'".$stitle_filed_val."".$img_field_val.") ";

	
	 mysql_query($sql) or die("culdnot:".mysql_error());
	 header("location:admin_manage_news.php?msg=1");
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
				<form method="post" action="" onsubmit="return validateNews()" name="newsForm" enctype="multipart/form-data">
				<Table width="100%" cellpadding="0" cellspacing="0" >
				<tr>
				  <td height="25" colspan="2" class="heading_new">New News </td>
				</tr>
				<tr>
				  <td height="25" class="text10" >&nbsp;</td>
				  <td class="sub_link">&nbsp;</td>
				  </tr>
				<tr>
				  <td width="26%" height="25" class="text10" >Title : </td><td width="76%" class="sub_link"><input name="txtTitle" type="text" class="text10" style="width:450px"    /></td>
				</tr>
				<tr>
				  <td width="26%" class="text10" >Date : </td> 
				  <td width="76%"><input name="txtDate" type="text" class="general-body" readonly>&nbsp;&nbsp;<input value="Calendar" onClick="displayCalendar(document.newsForm.txtDate,'yyyy/mm/dd',this)" class="button" type="button"></td>
				</tr>
                <tr>
	 
	  <td>Image 1 : </td>
	  <td><input name="logoImage1" id="logoImage1" type="file" class="general-body" size="30"></td></tr>
	<tr>
	   <td>Image 2 : </td>
	  <td><input name="logoImage2"id="logoImage2" type="file" class="general-body" size="30"></td></tr>
	<tr>
	   <td>Image 3 : </td>
	  <td><input name="logoImage3" id="logoImage3"type="file" class="general-body" size="30"></td></tr>
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
						$oFCKeditor->Value=stripslashes($details[ps_description]) ;
						
						$oFCKeditor->Create() ;
						?>
				 </td>
				  </tr>
				<tr>
				  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				    <? for($i=1;$i<=15;$i++) {?>
				    <tr>
				      <td width="10%" height="25" class="text10" >News Title : </td>
				      <td width="33%" class="sub_link"><input name="txtsubTitle<?=$i?>" type="text" class="text10" style="width:200px" /></td>
				      <td width="8%"><span class="text10">image :</span></td>
				      <td width="49%"><input name="fileImage<?=$i?>" id="fileImage<?=$i?>" type="file" class="textfield_admin-body" />
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
				  <input name="add" type="submit" class="button" value="Add" />
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
