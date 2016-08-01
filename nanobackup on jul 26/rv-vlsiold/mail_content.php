<?
include_once('db/dbconfig.php');

switch($_REQUEST[elc])
	{
	case 1:
	$ele='< 5';
	break;
	
	case 2:
	$ele='5 to 7';
	break;
	
	case 3:
	$ele='7 to 10';
	break;
	
	}

switch($_REQUEST[plg])
	{
	case 1:
	$plg='Yes';
	break;
	
	case 0:
	$plg='No';
	break;
	}

switch($_REQUEST[qul])
	{
	case 'BE':
	$qul='BE in Elens or related branch';
	break;
	
	case 'ME':
	$qul='ME in Elens or related branch';
	break;
	
	case 'BS':
	$qul='Bsc in Elens';
	break;
	
	case 'MS':
	$qul='MSc in Elens';
	break;
	
	case 'DP':
	$qul='Dip in Elens';
	break;
	
	case 'OH':
	$qul='Others';
	break;
	
	}
	
switch($_REQUEST[intt])
	{
	case 'FE':
	$int='Front end';
	break;
	
	case 'BC':
	$int='Back end';
	break;
	
	case 'AD':
	$int='Anlog Design ';
	break;
	
	case 'DD':
	$int='Digital Design ';
	break;
	
	case 'NS':
	$int='Not Sure ';
	break;
	
	
	
	}
switch($_REQUEST[ep])
	{
	case '1':
	$ep='No Experience';
	break;
	
	case '3':
	$ep='1 to 3';
	break;
	
	
	case '5':
	$ep='3 to 5';
	break;
	
	case '6':
	$ep='5 and above';
	break;
	
	
	}
	
	
	
switch($_REQUEST[sp])
	{
	case '1':
	$sp='1';
	break;
	
	case '2':
	$sp='2';
	break;
	
	case '4':
	$sp='4';
	break;
	
	case '8':
	$sp='8';
	break;
	
	case '24':
	$sp='24';
	break;
	
	case 'N':
	$sp='None';
	break;
	

	}	
	
				
switch($_REQUEST[ra])
	{
	case '1':
	$ra='Yes';
	break;
	
	case '0':
	$ra='No';
	break;
	
	}
	
switch($_REQUEST[be])
	{
	case 'Y' :
	$be='Yes';
	break;
	
	case 'BE' :
	$be='Completed BE';
	break;
	
	}		
	
	
$check_email=mysql_query("select * from $prg_planner_table where p_email='$_REQUEST[email]'") or die("culdnot do it:".mysql_error());	
	if(mysql_num_rows($check_email)==0)
			{
	
						$subject='Course Planner - '.$_REQUEST[name] ;
							$headers  ='MIME-Version: 1.0' . "\r\n";
							$headers.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$headers.='From: Course Planner<info@rv-vlsi.com>';
							$message='<table width=80% cellpadding="1" cellspacing="1" border=0 bgcolor="#000000" style="font-size:12px;	font-family:tahoma;">
<tr><td class="heading" bgcolor="#FFFFFF" width="70%"><b>How do you rate on basic electronics on a scale of 0 to 10 </b></td><td bgcolor="#FFFFFF">'.$ele.'</td></tr>
<tr><td class="heading" bgcolor="#FFFFFF"><b>Do you like programming in C</b></td><td bgcolor="#FFFFFF">'.$plg.'</td></tr>
<tr><td class="heading" bgcolor="#FFFFFF"><b>What is your highest qualification</b></td><td bgcolor="#FFFFFF">'.$qul.'</td></tr>
<tr><td class="heading" bgcolor="#FFFFFF"><b>Are you interested in</b></td><td bgcolor="#FFFFFF">'.$int.'</td></tr>
<tr><td class="heading" bgcolor="#FFFFFF"><b>Do you have ANY industry experience click below </b> </td ><td bgcolor="#FFFFFF">'.$ep.'</td></tr>
<tr><td class="heading" bgcolor="#FFFFFF"><b>How many weeks can you spare fulltime </b> </td ><td bgcolor="#FFFFFF">'.$sp.'</td></tr>
<tr><td class="heading" bgcolor="#FFFFFF"><b>Are you planing on going abroad in the next 12 months for higher studies</b> </td ><td bgcolor="#FFFFFF">'.$ra.'</td></tr>
<tr><td class="heading" bgcolor="#FFFFFF"><b>Are you a student in BE 5th sem and above </b> </td ><td bgcolor="#FFFFFF">'.$be.'</td></tr>
<tr><td class="heading" bgcolor="#FFFFFF" width=100><b>Name</b></td><td bgcolor="#FFFFFF">'.$_REQUEST[name].'</td></tr>
<tr><td class="heading" bgcolor="#FFFFFF"><b>Phone</b></td><td bgcolor="#FFFFFF">'.$_REQUEST[phone].'</td></tr>
<tr><td class="heading" bgcolor="#FFFFFF"><b>Email Id</b></td><td bgcolor="#FFFFFF">'.$_REQUEST[email].'</td></tr>
<tr><td class="heading" bgcolor="#FFFFFF"><b>Result</b></td><td bgcolor="#FFFFFF">'.$_REQUEST[result].'</td></tr></table>';
							
						//if(@mail('info@rv-vlsi.com',$subject,$message,$headers))
						
						mail('info@rv-vlsi.com',$subject,$message,$headers);	

					//	mail('mallikarjuna@kaivalyasoftware.com',$subject,$message,$headers);	
						$time=mktime();
						$ip=$_SERVER['REMOTE_ADDR'];
						
				
						
	mysql_query("insert into $prg_planner_table(p_name,p_phone,p_email,p_result,p_electronics,p_c_programming,p_higher,p_interested,p_industry,p_weeks,p_planning,p_completed,p_time,p_ip_address ) values('".addslashes($_REQUEST[name])."','".addslashes($_REQUEST[phone])."','".addslashes($_REQUEST[email])."','".addslashes($_REQUEST[result])."','".addslashes($ele)."','".addslashes($plg)."','".addslashes($qul)."','".addslashes($int)."','".addslashes($ep)."','".addslashes($sp)."','".addslashes($ra)."','".addslashes($be)."','".$time."','".$ip."')")				or die("culnot:".mysql_error());
						
		}else
			{
			
			echo "Your Information is already collected.";
			}
?>
