<?  include_once('../db/dbconfig.php');
include_once('admin_login_check.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	   
	   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 



      if(isset($_POST[add]))
   		{
		$result=$db->insertRecord("insert into $topics_table set 
					tp_title='".$ch->checkFields(addslashes($_POST[TxtTitle]))."',
					tp_description='".$ch->checkFields($_POST[Description])."',tp_status='".$ch->checkFields($_POST['selStatus'])."'");
			 
		header("Location:admin_forum_topics.php?msg=1");
		}
		
		
	     if(isset($_POST[Update]))
   		{
		
	$ch=new checkInputFields();
	$update_query="update $topics_table set 
					tp_title='".$ch->checkFields(addslashes($_POST[TxtTitle]))."',tp_description='".$ch->checkFields(addslashes($_POST[Description]))."',tp_status='".$ch->checkFields($_POST['selStatus'])."' where tp_id='".$ch->checkFields($_REQUEST[tp_id])."' ";
					

	
	$result=$db->insertRecord($update_query);
	//echo $update_query;die;
			 
		header("Location:admin_forum_topics.php?msg=1");
		}
   if($_REQUEST['action']=='delete' && is_numeric($_REQUEST[tp_id]))
   		{
					
		mysql_query("delete from $topics_table where tp_id =$_REQUEST[tp_id] ") or die("culnot deleted:".mysql_error());
		
			header("Location:admin_forum_topics.php?msg=3");
		}
   
  
   $events_query="select * from $topics_table  	 order by tp_id desc";
   //echo $events_query;die;
   
 

	
	
	$events_result=$db->getResults($events_query);
   $num_rows=count($events_result);
 

        	  include_once('config/header.php');?> 
			  
			  
			  <script>
			  
			  function Validation()
			{

var txtForm=document.infoForm;	
var j=0;
 
                           for(var i=0;i<document.getElementsByName("txtGender").length;i++)
                             {
	                           if(txtForm.txtGender[i].checked)
	                             {

                             j++;		
	                         }

	
                                }
 
 
 

				var emailExp = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
			//	var phoneExp  =/^([0-9]{10})/;
				var officephoneExp =/^([0-9])/;
				var state = /[^a-zA-Z' ']/g
			
	          
			if(txtForm.TxtTitle.value=='')
					{
					alert(" Please enter title");
					txtForm.TxtTitle.focus();
					return false;
					}
					 else if(txtForm.Description.value=='')
					{
					alert(" Please enter description");
					txtForm.Description.focus();
					return false;
					}
					
		}			
			  </script>
               <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".comment_button").click(function(){

var element = $(this);
var I = element.attr("id");

$("#slidepanel"+I).slideToggle(300);
$(this).toggleClass("active"); 

return false;});});
</script>
<style>
a
	{
	text-decoration:none;
	color:#d02b55;
	}
	a:hover
	{
	text-decoration:underline;
	color:#d02b55;
	}
	.panel
	{
	margin-left:10px; margin-right:0px; margin-bottom:15px; background-color:#D3E7F5;  padding:6px; 
	display:none;
	}
</style>

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
                <td width="111"><a href="admin_home.php"><img src="../images/Nanologo.jpg"   border="0" /></a></td>
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
				<tr><td width="20%" valign="top">
				<? include("admin_navigation.php");?>
				
				
				</td>
				<td width="80%" valign="top" >
				<?  if($_REQUEST[action]=='add' || $_REQUEST[action]=='edit'){
		
				  // $input=new inputFields();
			 if(is_numeric($_REQUEST[tp_id]))
   		{
			$ch=new checkInputFields();
	 $edit_details=$db->getResults("select * from $topics_table where tp_id='".$ch->checkFields($_REQUEST[tp_id])."'");
			foreach($edit_details as $details){	}}	  
				  ?>
       <?=$input->formStart('infoForm','','onSubmit="return Validation();"');?>
  <table width="62%" cellspacing="0" cellpadding="3" align="center" > 


<tr>
  <td  height="18"  colspan="2" class="heading" style="padding-right:0px;"><?  if($_REQUEST[action]=='add') echo "Add";else  if($_REQUEST[action]=='edit') echo "Edit";?> Forum Topics</td></tr>
    <tr><td  height="18" class="error" colspan="2" ><?=messaging($_REQUEST[msg])?></td></tr>

    <tr>
      <td height="1"  class="text" ></td>
      <td  height=""><div align="right"><span class="error">&nbsp;&nbsp;&nbsp;&nbsp; *Indicates required field</span></div></td>   
	  
    </tr>   
    <tr>
    <td width="76" height="1"  class="text" align="left">Title : </td>
    <td  height="" width="386">
	<input type="text" name="TxtTitle" id="TxtTitle" value="<?=$details->tp_title;?>" style="width:330px;" ><span class="error"> *</span>
    </tr>
  
    <tr>
      <td height="1"  class="text" align="left">Description : </td>
      <td  height=""><textarea rows="4" cols="40" name="Description" id="Description"><?=$details->tp_description;?></textarea> <span class="error">*</span>
    </tr>
   <tr>
				  <td height="25" class="text10" >Status : </td>
				  <td >
				   <select name="selStatus" class="text10">
				    <option value="0">select</option>
				  <option value="1" <? if($details->tp_status=='1') echo "selected"; ?>>Active</option>
				  <option value="2" <? if($details->tp_status=='0') echo "selected"; ?>>De-Active</option>
				  </select></td>
				  </tr>
   <tr>
    
    <td  height="19" width="76">&nbsp;</td>
    
    <td  height="19" width="386">
    <?  if($_REQUEST[action]=='add') { echo $input->submitButton('add','ADD','btn');} if($_REQUEST[action]=='edit'){ echo $input->submitButton('Update','Update','btn');};?>
      <? //$input->submitButton('infoUpdate','Update','text','style=background-color:#424843;color:#ffffff;margin-left:70px');?></td>
   </tr> <?=$input->formEnd?>
</table>
<? } else{?>
                        
                        <Table align="center"   cellspacing="0" cellpadding="0" >
                        <tr>
                          <td colspan="4" class="heading_new">Forum Topics List</td>
	    </tr>
                        
                        
                        <tr><td colspan="3" class="error"><? $msg=new messages();
		  echo $msg->success($_REQUEST[success]); ?></td></tr>
                        <tr><td colspan="5" ><div align="right"><a href="admin_forum_topics.php?action=add" class="link_green" style="text-decoration:none;">New Forum Topic</a></div></td></tr>  
                            <tr>
	          <td width="373" class="general-bodyBold">&nbsp;</td>
	          <td width="92" class="general-bodyBold">&nbsp;</td>
	          <td width="45" class="general-bodyBold">&nbsp;</td>
	      </tr>
              <tr>
                <td height="26" class="sub_link">Title</td>
                <td class="sub_link"><div align="center">Created By </div></td>
                 <td class="sub_link"><div align="center">Status </div></td>
	           <td width="39" class="sub_link"><div align="center">Edit </div></td>
              <td width="45" class="sub_link"><div align="center">Delete</div></td>
	    </tr>
             <tr><td style="height:1px; background:#666600;" colspan="5"></td></tr>
              
              
              <? if($num_rows==0) echo "<tr><td colspan=5 class='error'><div align='center'>No Records</div></td>"; ?>
              
              
              <?
		

		//$k=0;
		foreach($events_result as $page) { ?>
             
              <tr>
              <td height="25"><a href="#" class="comment_button" id="<?php echo $page->tp_id; ?>"><?=stripslashes($page->tp_title);?></a></td>
              <td><div align="center"><? if($page->m_id=='0') echo "Admin"; else {
				   $mem_details=$db->getResults("select * from $members_table where m_id='".$page->m_id."'");
				   foreach($mem_details as $res) { 
				   echo $res->m_fname.$res->m_lname;
				   }
				  }?> </div></td>
              <td><div align="center">
			  <? if($page->tp_status==1)
			  echo "<img src='../images/green.png'>";
			  else
			echo "<img src='../images/red.png'>";				  
			  
			  ?>
			  </div></td>
	               
	  <td><div align="center">
	    <a href="admin_forum_topics.php?action=edit&tp_id=<?=$page->tp_id;?>">
	      <img src="<?=$server_url?>images/edit.png" border="0" onClick="return toedit();"></a></div></td><td><div align="center"><a href="admin_forum_topics.php?action=delete&tp_id=<?=$page->tp_id;?>"><img src="<?=$server_url?>images/error.png" border="0" onClick="return toDelete();"></a></div></td></tr>
		  
            <tr><td style="border-bottom:1px solid #ccc;" colspan="5" ></td></tr>   
          <tr>
              <td>
			  <div class='panel' id="slidepanel<?php echo $page->tp_id; ?>"><?=stripslashes($page->tp_description);?></div></td>
              </tr>
              <tr><td style="height:1px; background:#666600;" colspan="5"></td></tr>
              
              <?  } ?>
              <tr><td colspan="7"><div align="center"><? //$input->submitButton('OrderUpdate','Update','btn');?></div></td></tr>
                 <!--</form>-->
              <tr>
                <td colspan="2" class="general-bodyBold">&nbsp;</td>
	  	      <td class="general-bodyBold">&nbsp;</td>
	  	    </tr>
              
              <tr><td colspan="5" align="right">
                <div align="right">
                 
<? }?>
                  </div></td><td width="37" ></td>
     </tr>	
              </Table> 
 
				</td>
				</tr>
				<tr><td></td></tr>
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
