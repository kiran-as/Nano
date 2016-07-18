<?php
include('../../application/conn.php');
error_reporting(-1);

$idrecruitement = $_POST['idpaymentdetails'];
//cho "Delete from tbl_paymentdetails where idpaymentdetails=$idrecruitement";
mysql_query("Delete from tbl_paymentdetails where idpaymentdetails=$idrecruitement");

?>
	