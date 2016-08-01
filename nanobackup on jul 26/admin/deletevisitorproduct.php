<?php
include("../../tradeshow/application/conn.php");
$parames =$_GET['visitorproductdtls'];
$visitorarray = explode('@',$parames);
$idvisitor = $visitorarray[0];
$idproduct = $visitorarray[1];
$idtradeshow = $visitorarray[2];
$idvisitorproductdetails=0;


  $mysqlcheckdata = mysql_query("Delete from tbl_visitorproductdetails where
	                  idvisitor=$idvisitor and idtradeshowproductdetails=$idtradeshowproductdetails and idtradeshow=$idtradeshow");
		
  echo 'done:'.$idvisitor.'@'.$idproduct;

?>