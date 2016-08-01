<?php 
 include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 

		  
		  $idjobposting=$_GET['idjobposting'];
		
		 $selectjobposings = "Select a.*,b.*,c.empfactor from rv_jobpostedstudent as a,rv_registration as b  LEFT JOIN rv_empfactor AS c ON b.m_id = c.mid where a.m_id=b.m_id and a.jp_id='$idjobposting' group by a.m_id order by idjobpostedstudent desc";


	$resultc = mysql_query($selectjobposings);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		    $arrajobpostings[$s]["m_resume_id"]	= $row["m_resume_id"];
 			$arrajobpostings[$s]["m_id"]	= $row["m_id"];
 			$arrajobpostings[$s]["Showcontact"]	= $row["Showcontact"];
			$arrajobpostings[$s]["m_fname"]	= $row["m_fname"].' '.$row["m_lname"];
			$arrajobpostings[$s]["replaytous"]	= $row["replaytous"];
			$arrajobpostings[$s]["empfactor"]	= $row["empfactor"];
			
			if($row['replaytous']==1)
			{
			  $sendus=1;
			}
		     $s++;
		}	  
		  


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard</title>
<script type="text/javascript">
function getdataelements(jobid)
{

	  if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","jobpostingdetails.php?idjobposting="+jobid,true);
	xmlhttp.send();
	
}

</script>
<link href="css/recruiter-styles.css" rel="stylesheet">

<body>

<table id="changedtable" width="100%" border="0"  cellpadding="3" cellspacing="1"  class="gridbackground">
    <tr  class="gridheader">
	<td></td>
	
	<td width="33.33%">Resume Id</td>
	<td width="33.33%">Student Name</td>
	<td width="33.33%">Employability Factor</td>
	  </tr>
        <?php if(count($arrajobpostings)==0){?>
    <tr class="alternaterowcolor1" >
    <td colspan="4">
Still Candidates has not been assigned to this job posting
    </td>
    </tr>
  <?php } ?> 
    <?php for($s=0;$s<count($arrajobpostings);$s++){
  $row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor'; $no = $s+1;
?>

<tr class="<?php echo $row_color?>">
        <?php  $idreplytous = $arrajobpostings[$s]["replaytous"];?>
		<?php if($idreplytous==1){?>
       <td><input type="checkbox"  name="IDApplication[]" value="<?php  echo $arrajobpostings[$s]['m_id']?>" id="m_id<?php echo $s;?>"</td>
	   <?php } else {?>
	   <td></td>
	   <?php }?>
     
	  <?php if($arrajobpostings[$s]['Showcontact']=='1'){?>
     <td><a href="admin/admin_view_resume.php?m_id=<?php echo $arrajobpostings[$s]['m_id']?>" target="_blank" > <?php echo $arrajobpostings[$s]['m_resume_id'];?></a></td>
<?php } else {?>

 <td><a href="admin/admin_view_resumewithoutcontact.php?m_id=<?php echo $arrajobpostings[$s]['m_id']?>" target="_blank" > <?php echo $arrajobpostings[$s]['m_resume_id'];?></a></td>
<?php }?>
<td><?php echo $arrajobpostings[$s]['m_fname']?></td>
<td><?php echo $arrajobpostings[$s]['empfactor']?></td>


      </tr>

    
    <?php }?>
	
	
		<tr class="alternaterowcolor1"><?php if ($sendus==1){?>
	  <td colspan="3" align="left"><span class="smalltext">To request the Nanochip Solutions Admin to assist in setting up an interview for your shortlisted students, please select the students in the above list and click on "Send Us". The admin will call you back to set up the interview</span>
</td>
	  <td colspan="1" align="right">
<div class="floatright">

<input type="submit" class="blueButton" name="Assign" id="Assign" value="Send Us" /></div>   

   
</div>
<?php  } else {?><td colspan="4"></td><?php }?>
	</tr>
	
</table>

