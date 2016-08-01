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
 if($_SESSION['r_id']=='')
		  {
		  	echo "<script>parent.location = 'recruiter_index1.php';</script>";	
		  }
		  
		  $idjobposting=$_GET['idjobposting'];
		  ////////////////////////////////////////////////////////////////functuion////////////////////////
		   $rid = $_SESSION['r_id'];
		   $curdatess = mktime();
		  
		  	$selectjobposings = "Select * from rv_job_posting where r_id='$rid' and jp_expdate >'$curdatess'";
		  	//echo $selectjobposings;

	$resultc = mysql_query($selectjobposings);
	$a=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arrajobpostingsdropdown[$a]["jp_job_title"]	= $row["jp_job_title"];
		    $arrajobpostingsdropdown[$a]["jp_id"]	= $row["jp_id"];
		  $a++;
		}	  
		  
		
		  
		  
		  
		  
		  /////////////////////////////////////////////////////////////////////////////////////////
		  
		  	$jobpostings = "Select * from rv_job_posting where jp_id='$idjobposting'";

	$resultcjobposing = mysql_query($jobpostings);
	while ($row = mysql_fetch_assoc($resultcjobposing)) {
		  $title	= $row["jp_job_title"];
		  $description	= $row["jp_description"];
		   
		}	  
		
		
			$selectjobposings = "Select a.*,b.*,c.empfactor from rv_jobpostedstudent as a,rv_registration as b  LEFT JOIN rv_empfactor AS c ON b.m_id = c.mid where a.m_id=b.m_id and a.jp_id='$idjobposting' group by a.m_id order by idjobpostedstudent desc";


	$resultc = mysql_query($selectjobposings);
	$s=0;
	$sendus = 0;
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
		  
		 $curdate = mktime();
		/* print_R($curdate);rec_assigned_students.php
		 die(); */
if($_POST['Assign'])
		{
		  
			$countnss = count($_POST['IDApplication']);
			$resumeids = '';
			for($i=0;$i<$countnss;$i++)
			{
				$mid=$_POST['IDApplication'][$i];
				$searchresultss = "Select a.*
						       from rv_registration as a where
						      a.m_id =$mid";
			$resultcemail = mysql_query($searchresultss);
			
			while ($row = mysql_fetch_assoc($resultcemail)) {
				  $emailid	= $row["m_emailid"];
				  $name	= $row["m_fname"]; 
				  $resumeids = $resumeids.','.$row['m_resume_id'];
				 
				}
				
				
			}
			
				
				
				 $html='Dear Admin <br/>Please send the below Resumeids'.$resumeids;
				   
				 $from='RV-VLSI';
				 $to      = 'askiran123@gmail.com';//$email;
				 $subject = 'Selected Resume Ids' ;
				 $message = $html;
				 $headers = "Content-type: text/html\r\n"; 
				    'Reply-To: webmaster@example.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				 $headers.= "From:" . $from;
				 mail($to, $subject, $message, $headers);  
				 
echo "<script>parent.location = 'dashboard.php';</script>";	 
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
    showhidesendus(jobid);
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
	    document.getElementById("changedtable").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","jobpostingdetails.php?idjobposting="+jobid,true);
	xmlhttp.send();
	
}

function showhidesendus(jobid)
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
	    data = xmlhttp.responseText;
		if(data=='1')
		{
		   document.getElementById('Assign').style.display='';
		}
		else
		{
		   document.getElementById('Assign').style.display='none';
		}
	    }
	  }
	xmlhttp.open("GET","hideshowsendsusdeails.php?idjobposting="+jobid,true);
	xmlhttp.send();
	
}
function fnhidesendusbutton()
{
  var hidesendus = <?php echo $sendus;?>;
  if(hidesendus==1)
  {
    document.getElementById('Assign').style.display='';
  }
  else
  {
    document.getElementById('Assign').style.display='none';
  }
}

</script>
<link href="css/recruiter-styles.css" rel="stylesheet">

<body >
<div class="container">
<div class="dashboard">
<? include_once('recruiterheader.php');  ?>


<div id="row">

	
		
	</div>

	</div>
<div id="row" class="dashboard">
<span class="pageheaders">Students Assigned to " <?php echo $title;?> "</span><br>

<?php if(count($arrajobpostingsdropdown)>1){?>
<div class="floatright">Select other job posting
 
	 <select name="jobposting[]"  id="jobposting" style="width:250px;" onchange="getdataelements(this.value);">						  
 <?php for($k=0;$k<count($arrajobpostingsdropdown);$k++){?>

							  <option value="<?php echo $arrajobpostingsdropdown[$k]['jp_id'];?>" <?php if($arrajobpostingsdropdown[$k]['jp_id']==$idjobposting){echo "Selected";}?>>
								<?php echo $arrajobpostingsdropdown[$k]['jp_job_title'];?>
								</option>
							  <?php }?>
							  </select></div>
<?php } ?>							  
<form action="" method="POST">
<div>
<table height="20">
<tr>
<td>
</td>
</tr>
</table>
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
     <td><a href="admin1/admin_view_resume.php?m_id=<?php echo $arrajobpostings[$s]['m_id']?>" target="_blank" > <?php echo $arrajobpostings[$s]['m_resume_id'];?></a></td>
<?php } else {?>

 <td><a href="admin1/admin_view_resumewithoutcontact.php?m_id=<?php echo $arrajobpostings[$s]['m_id']?>" target="_blank" > <?php echo $arrajobpostings[$s]['m_resume_id'];?></a></td>
<?php }?>
<td><?php echo $arrajobpostings[$s]['m_fname']?></td>
<td><?php echo $arrajobpostings[$s]['empfactor']?></td>


      </tr>

    
    <?php }?>
	
		<tr class="alternaterowcolor1">
		 <td colspan="4">
		       <table border="0" width="100%">
			       <Tr>
				       
				   <?php if ($sendus==1){?>
	  <td><span align="left" class="smalltext">Please select the students in the below list and click on the "Send Us"</span>
</td>
	  <td>
<div class="floatright">

<input type="submit" class="blueButton" name="Assign" id="Assign" value="Send Us" /></div>   

   
</div>
<?php  } else {?><td colspan="4"></td><?php }?>
	</tr>
			   </table>
			   
		 </td>
		</tr>
		
</table>


</form>
</div>
<div class="footer">Copyrights © 2012 Nanochipsolutions</div>
</div>
</body>
</html>
