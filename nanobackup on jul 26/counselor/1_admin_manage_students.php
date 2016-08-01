<?php include("includes/phpincludes.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nanochipsolutions - Counselor Section</title>
<link rel="stylesheet" href="../css/styleupdated.css" type="text/css" media="screen" />
</head>

<body>

<table width="990" border="0" align="center" cellpadding="0" cellspacing="0" id="counselor">
<tr><td align="left"><?php include("includes/counselorheader.php"); ?></td></tr>
<tr><td><form name="mainform" id="mainform"  method="post" action="1_admin_manage_students.php">
<!-- first name table -->
<table width="400" align="right" cellpadding="0" cellspacing="0" border="0">
<tr>
<td align="center">Search for&nbsp;:
<input name="txtSearch" type="text"  style="width:200px;" value="<? if($_REQUEST['txtSearch']!='') echo $_REQUEST['txtSearch']; else echo "Enter Search word"; ?>" onClick="this.value=''" >
<input type="submit" name="submit" value="Search" style="background-color:#424843;color:#ffffff;" />
<!--<label>(Search by Name,City)</label>-->

</td>
</tr></table>
</form></td></tr>
<tr><td valign="top">

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="gridborder">
<tr class="gridheader"> 
  <td nowrap="nowrap">Resume Id</td>
    <td width="40%"  >Name</td>
    <td width="40%" >Email Id</td>
	<td nowrap="nowrap">Employability Factor</td>
	<td nowrap="nowrap">Telephone</td>
  </tr>
  
  <? 
 
  //$query ="select m_fname, m_emailid, m_phone, m_id from rv_registration";
  //$query ="select m_fname, m_emailid, m_phone, m_id from rv_registration";
  $query="select a.*,b.empfactor from rv_registration as a,rv_empfactor as b where a.m_id=b.mid";
 
   
   if($_REQUEST['txtSearch']!='')
   			{
			
			
			$searchKey=urldecode($_REQUEST['txtSearch']);
			$query=" select a.*,b.empfactor from rv_registration as a,rv_empfactor as b where a.m_id=b.mid and a.m_fname like '%$searchKey%' or a.m_lname like '%$searchKey%' or a.m_city like '%$searchKey%' or a.m_emailid like '%$searchKey%' or a.m_student like '%$searchKey%' group by(a.m_id)
	UNION
	select a.*,b.empfactor from rv_registration as a,rv_empfactor as b where a.m_id=b.mid and b.empfactor like '%$searchKey%'";
			}
		//echo($query);	
  $result_students=$db->getResults($query);
  $totalrow=count($result_students);	
$limit=20;
		$png=$_REQUEST['png'];
			if(empty($png)){
      			  $png = 1;
    			} 
	        $limitvalue = ($png * $limit )- ($limit);  
		$query.=" order  by m_id desc  LIMIT $limitvalue, $limit ";
    $result_students=$db->getResults($query);
	 $num_rows=count($result_students);
	 if($num_rows==0){
	 echo '<tr  class="text10"><td colspan="5" align="center"><strong>No Results Found</strong></td></tr>';
	 
	 }
//for($s=0;$s<count($num_rows);$s++){
foreach($result_students as $students) {
$row_color = ($s % 2) ? 'alternaterowcolor1' : 'alternaterowcolor';
  ?> 
 
<tr class="<?php echo $row_color?>">
	<td> <a href="admin_view_resume.php?m_id=<?=$students->m_id?>" target="_blank" ><?=$students->m_resume_id?></a></td>
    <td><?=$students->m_fname?></td>
    <td><?=$students->m_emailid?></td>
 	<td><?=$students->empfactor?></td>
	<td><?=$students->m_phone?></td>

</tr>
 <? }?> 


</table>
</td></tr>
<tr><td> 
				<?if($totalrow>$limit)
					{
					$page="1_admin_manage_students.php";

					pagenation($totalrow,$limit,$png,$page);
					}
				?> </td></tr>
<tr><td><?php include("includes/counselorfooter.php"); ?></td></tr>
</table>


</body>
</html>
