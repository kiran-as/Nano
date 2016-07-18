<?php
class NYOS_ExcelWriter_Simple{

	public function CreatFile($array)
	{
	$file = $this->xlsBOF(); 
	$tr1 = 0;

		foreach($array as $k => $v )
		{
		$nn1 = 0;
			foreach($v as $k1 => $v1 )
			{
			$file .= $this->xlsWriteLabel( $tr1, $nn1, $v1 );
			$nn1++;
			}
		$tr1++;
		}

	$file .= $this->xlsEOF(); 
	return $file;
	}

	public function LoadFile($array,$filename)
	{
	header('Content-Type: application/force-download');
	header('Content-Type: application/octet-stream');
	header('Content-Type: application/download');
	header('Content-Disposition: attachment;filename='.$filename); 
	header('Content-Transfer-Encoding: binary ');
	echo $this->CreatFile($array);
	}

	private function xlsBOF()
	{
	return pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
	}

	function xlsEOF()
	{
	return pack("ss", 0x0A, 0x00);
	}

	private function xlsWriteNumber($Row, $Col, $Value)
	{
	return pack("sssss", 0x203, 14, $Row, $Col, 0x0).
		pack("d", $Value);
	}

	function xlsWriteLabel($Row, $Col, $Value )
	{
	$L = strlen($Value);
	return pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L).
		$Value;
	}
}

$NY_excel_simple = new NYOS_ExcelWriter_Simple();
?>