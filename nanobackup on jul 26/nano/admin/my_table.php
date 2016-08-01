
<? include_once('../db/dbconfig.php');
   include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	   
	   
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 






 			
   
 ?>  <?  include_once('config/header.php');?> 
 <tr><td><table width="100%" height="248" >   
    <tr>
      <td width="18%" rowspan="2" ><?  include_once('admin_navigation.php');?></td>
      <td width="26%" height="18" ><span class="heading" style="font-weight: bold">Manage Students </span></td>
      <td width="56%" height="18" class="error" >&nbsp;</td>
    </tr>
    <tr>
      <td  colspan="2" valign="top"><?=$input->formEnd?>
        <? 
  
  
  
  ?>
<table width="100%" height="146" border="0" cellpadding="3" cellspacing="3">
  
  <tr>
    
    <td width="10%"><div align="left"><span style="font-weight: bold">Name</span></div></td>
    <td width="13%"><div align="left"><span style="font-weight: bold">Email_Id</span></div></td>
    <td width="11%"><div align="center"><span style="font-weight: bold">Phone</span></div></td>
	<td width="13%"><div align="center"><span style="font-weight: bold">Resumeview</span></div></td>
	<td width="9%"><div align="center"><span style="font-weight: bold">Status</span></div></td>
	<td width="15%"><div align="center"><span style="font-weight: bold">Rv-Vlsi Student</span></div></td>
	<td width="10%"><div align="center"><span style="font-weight: bold">Edit</span></div></td>
    <td width="14%"><div align="center"><span style="font-weight: bold">delete</span></div></td>
  </tr>
  <? 
 
  $query1 =mysql_query("select m_fname, m_emailid, m_phone from rv_registration");
    $db->getResults($query);
	 
  ?>
  <tr>
    <td><div align="center"><?=$result_set[m_fname]?></div></td>
    <td><div align="center"><?=$result_set[m_emailid]?></div></td> 
    <td><div align="center"><?=$result_set[m_phone]?></div></td>
    
	
    
  </tr>
 
  
  
</table>

 
  </td>
	</tr>
</table>
    </Td></tr>
 
<? include_once('config/footer.php') ?>