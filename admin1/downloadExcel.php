<?php
require_once('php_excel_creator/excel.class.php');


// data array
$array = array();

// 1 string
$tr = array();
// 1 colum
$tr[] = 'row 1 column 1';
// 2 colum
$tr[] = 'row 1 column 2';

$array[] = $tr;
// 2 string
$tr = array();
// 1 colum
$tr[] = 'row 2 column 1';
// 2 colum
$tr[] = 'row 2 column 2';

$array[] = $tr;	
	

// load file
$NY_excel_simple->LoadFile($array,'namefile.xls');

// OR file data
$DataFile = $NY_excel_simple->CreatFile($array);
?>