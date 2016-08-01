<? 
	 //include_once('download_zip.php');


function create_zip($files = array(),$destination = '',$overwrite = true) {
	//if the zip file already exists and overwrite is false, return false

	if(file_exists($destination) && !$overwrite) { return true; }
	//vars
//print_r($files);die;

	$valid_files = array();
	//if files were passed in...
	if(is_array($files)) {
	
		//cycle through each file
		foreach($files as $file) {
			//make sure the file exists
			
			if(file_exists($file)) {
			
				$valid_files[] = $file;
				
			}
		}
	}
	
	//if we have good files...
	if(count($valid_files)) {
	
	
		//create the archive
		$zip = new ZipArchive();
		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
			return false;
		}
		//add the files
		foreach($valid_files as $file) {
			$zip->addFile($file,$file);
		}
		//debug
		//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
		
		//close the zip — done!
		$zip->close();
		 //$dwnld=new getdownload();
		
		//	downloadzip($destination);
		//check to make sure the file exists
		
		$filename =$destination;
// required for IE, otherwise Content-disposition is ignored

if(ini_get('zlib.output_compression'))

  ini_set('zlib.output_compression', 'Off');



// addition by Jorg Weske





if( $filename == "" ) 

{

  echo "<html><title>eLouai's Download Script</title><body>ERROR: download file NOT SPECIFIED. USE force-download.php?file=filepath</body></html>";

  exit;

} elseif ( ! file_exists( $filename ) ) 

{

  echo "<html><title>eLouai's Download Script</title><body>ERROR: File not found. USE force-download.php?file=filepath</body></html>";

  exit;

};

switch( $file_extension )

{

  case "pdf": $ctype="application/pdf"; break;

  case "exe": $ctype="application/octet-stream"; break;

  case "zip": $ctype="application/zip"; break;

  case "doc": $ctype="application/msword"; break;

  case "xls": $ctype="application/vnd.ms-excel"; break;

  case "ppt": $ctype="application/vnd.ms-powerpoint"; break;

  case "gif": $ctype="image/gif"; break;

  case "png": $ctype="image/png"; break;

  case "jpeg":

  case "jpg": $ctype="image/jpg"; break;

  default: $ctype="application/force-download";

}

header("Pragma: public"); // required

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("Cache-Control: private",false); // required for certain browsers 

header("Content-Type: $ctype");

// change, added quotes to allow spaces in filenames, by Rajkumar Singh

header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );

header("Content-Transfer-Encoding: binary");

header("Content-Length: ".filesize($filename));

readfile("$filename");

exit();

		return file_exists($destination);
	
		
	}
	else
	{
		return false;
	}
}

?>