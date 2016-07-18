<?php
include('../application/conn.php');
error_reporting(-1);

//print_r($_POST);
$id = $_POST['id'];
$approved = $_POST['status'];
//cho "Delete from tbl_paymentdetails where idpaymentdetails=$idrecruitement";

mysql_query("update tbl_people set approved='$approved' where id='$id'");

?>
	