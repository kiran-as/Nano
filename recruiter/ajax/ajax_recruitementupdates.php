<?php
include('../../application/conn.php');
error_reporting(-1);

$idrecruitement = $_POST['idrecruitement'];
if($_POST['type']=='Approve')
{
  if($_POST['Status']=='UnApprove')
  {
    mysql_query("Update tbl_recruitement set approved='No' where idrecruitement='$idrecruitement'");
  }
  if($_POST['Status']=='Approve')
  {
    mysql_query("Update tbl_recruitement set approved='Yes' where idrecruitement='$idrecruitement'");
  }
}
?>
	