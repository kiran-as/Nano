<?php
function resize($width,$height,$folder,$thumb_folder,$filename)
	{
###############################################################
# Thumbnail Image Generator 1.3
###############################################################
# Visit http://www.zubrag.com/scripts/ for updates
############################################################### 

// REQUIREMENTS:
// PHP 4.0.6 and GD 2.0.1 or later
// May not work with GIFs if GD2 library installed on your server 
// does not support GIF functions in full

// Parameters:
// src - path to source image
// dest - path to thumb (where to save it)
// x - max width
// y - max height
// q - quality (applicable only to JPG, 1 to 100, 100 - best)
// t - thumb type. "-1" - same as source, 1 = GIF, 2 = JPG, 3 = PNG
// f - save to file (1) or output to browser (0).

// Sample usage: 
// 1. save thumb on server
// http://www.zubrag.com/thumb.php?src=test.jpg&dest=thumb.jpg&x=100&y=50
// 2. output thumb to browser
// http://www.zubrag.com/thumb.php?src=test.jpg&x=50&y=50&f=0


// Below are default values (if parameter is not passed)

// save to file (true) or output to browser (false)
$save_to_file = true;

// Quality for JPEG and PNG.
// 0 (worst quality, smaller file) to 100 (best quality, bigger file)
// Note: PNG quality is only supported starting PHP 5.1.2
$image_quality = 100;

// resulting image type (1 = GIF, 2 = JPG, 3 = PNG)
// enter code of the image type if you want override it
// or set it to -1 to determine automatically
$image_type = -1;

// maximum thumb side size
$max_x = $width;
$max_y = $height;

// cut image before resizing. Set to 0 to skip this.
$cut_x = 0;
$cut_y = 0;

// Folder where source images are stored (thumbnails will be generated from these images).
// MUST end with slash.
$images_folder =$folder;

// Folder to save thumbnails, full path from the root folder, MUST end with slash.
// Only needed if you save generated thumbnails on the server.
// Sample for windows:     c:/wwwroot/thumbs/
// Sample for unix/linux:  /home/site.com/htdocs/thumbs/
$thumbs_folder = $thumb_folder;

$_REQUEST[src]=$filename;
$_REQUEST[dest]=$filename;
$_REQUEST[x]=$width;
//$_REQUEST[y]=50;
///////////////////////////////////////////////////
/////////////// DO NOT EDIT BELOW
///////////////////////////////////////////////////

$to_name = '';

if (isset($_REQUEST['f'])) {
  $save_to_file = intval($_REQUEST['f']) == 1;
}

if (isset($_REQUEST['src'])) {
  $from_name = urldecode($_REQUEST['src']);
}
else {
  die("Source file name must be specified.");
}

if (isset($_REQUEST['dest'])) {
  $to_name = urldecode($_REQUEST['dest']);
}
else if ($save_to_file) {
  die("Thumbnail file name must be specified.");
}

if (isset($_REQUEST['q'])) {
  $image_quality = intval($_REQUEST['q']);
}

if (isset($_REQUEST['t'])) {
  $image_type = intval($_REQUEST['t']);
}

if (isset($_REQUEST['x'])) {
  $max_x = intval($_REQUEST['x']);
}

if (isset($_REQUEST['y'])) {
  $max_y = intval($_REQUEST['y']);
}

if (!file_exists($images_folder)) die('Images folder does not exist (update $images_folder in the script)');
if ($save_to_file && !file_exists($thumbs_folder)) die('Thumbnails folder does not exist (update $thumbs_folder in the script)');

// Allocate all necessary memory for the image.
// Special thanks to Alecos for providing the code.
ini_set('memory_limit', '-1');

// include image processing code


$img = new Zubrag_image;

// initialize
$img->max_x        = $max_x;
$img->max_y        = $max_y;
$img->cut_x        = $cut_x;
$img->cut_y        = $cut_y;
$img->quality      = $image_quality;
$img->save_to_file = $save_to_file;
$img->image_type   = $image_type;

// generate thumbnail
$img->GenerateThumbFile($images_folder . $from_name, $thumbs_folder . $to_name);
}



function smart_resize_image( $file, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = false, $use_linux_commands = false )
    {
        if ( $height <= 0 && $width <= 0 ) {
            return false;
        }


        $info = getimagesize($file);
        $image = '';

        $final_width = 0;
        $final_height = 0;
        list($width_old, $height_old) = $info;

        if ($proportional) {
            if ($width == 0) $factor = $height/$height_old;
            elseif ($height == 0) $factor = $width/$width_old;
            else $factor = min ( $width / $width_old, $height / $height_old);   

            $final_width = round ($width_old * $factor);
            $final_height = round ($height_old * $factor);

        }
        else {
            $final_width = ( $width <= 0 ) ? $width_old : $width;
            $final_height = ( $height <= 0 ) ? $height_old : $height;
        }

        switch ( $info[2] ) {
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($file);
            break;
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($file);
            break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($file);
            break;
            default:
                return false;
        }
        
        $image_resized = imagecreatetruecolor( $final_width, $final_height );
                
        if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
            $trnprt_indx = imagecolortransparent($image);
   
            // If we have a specific transparent color
            if ($trnprt_indx >= 0) {
   
                // Get the original image's transparent color's RGB values
                $trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
   
                // Allocate the same color in the new image resource
                $trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
   
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $trnprt_indx);
   
                // Set the background color for new image to transparent
                imagecolortransparent($image_resized, $trnprt_indx);
   
            
            } 
            // Always make a transparent background color for PNGs that don't have one allocated already
            elseif ($info[2] == IMAGETYPE_PNG) {
   
                // Turn off transparency blending (temporarily)
                imagealphablending($image_resized, false);
   
                // Create a new transparent color for image
                $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
   
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $color);
   
                // Restore transparency blending
                imagesavealpha($image_resized, true);
            }
        }

        imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
    
        if ( $delete_original ) {
            if ( $use_linux_commands )
                exec('rm '.$file);
            else
                @unlink($file);
        }
        
        switch ( strtolower($output) ) {
            case 'browser':
                $mime = image_type_to_mime_type($info[2]);
                header("Content-type: $mime");
                $output = NULL;
            break;
            case 'file':
                $output = $file;
            break;
            case 'return':
                return $image_resized;
            break;
            default:
            break;
        }

        switch ( $info[2] ) {
            case IMAGETYPE_GIF:
                imagegif($image_resized, $output);
            break;
            case IMAGETYPE_JPEG:
                imagejpeg($image_resized, $output);
            break;
            case IMAGETYPE_PNG:
                imagepng($image_resized, $output);
            break;
            default:
                return false;
        }

        return true;
    }
	
	
	
function indi_resize($i_path,$t_path,$nw_width,$nw_height) 
{
/*

Smart Image Thumbnail Creator
By AJ Quick
AJ@AJQuick.com

Version 1.2W

There will be some minor alterations that you will need to do with this to make it work to your liking. This is ment to be used in addition to some type of image upload script. You will need to do some changes to the variable to make it stick, and make thumbnails to your liking. This is not exact and it will not work every time, but it is very successful. It will resize your image, and crop it at the same time so you don't have stretching, or black areas in the thumbnail. Included in this is the function of good resizing, by John Jensen.

*/

//VARIABLES

$nw=$nw_width; //The Width Of The Thumbnails
$nh=$nw_height; //The Height Of The Thumbnails

$ipath = $i_path; //Path To Place Where Images Are Uploaded. No Trailing Slash
$tpath = $t_path;//Path To Place Where Thumbnails Are Uploaded. No Trailing Slash

/*
You will need to go down in the code below, and change the image names. Currently it is set as "$img".
The outputted thumbnail's name is: "$thumb".
*/

//$img=$ipath.'42949_l.jpg';
$img=$i_path;
//$img_name='42949_ls.jpg';
$dimensions = GetImageSize($img);

//$thname = "$tpath/$img_name";
$thname = $tpath;

$w=$dimensions[0];
$h=$dimensions[1];

$img2 = ImageCreateFromJpeg($img);
$thumb=ImageCreateTrueColor($nw,$nh);
	
$wm = $w/$nw;
$hm = $h/$nh;
	
$h_height = $nh/2;
$w_height = $nw/2;
	
if($w > $h){
	
	$adjusted_width = $w / $hm;
	$half_width = $adjusted_width / 2;
	$int_width = $half_width - $w_height;
	
	ImageCopyResampled($thumb,$img2,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h); 
	ImageJPEG($thumb,$thname,70); 
	
}elseif(($w < $h) || ($w == $h)){
	
	$adjusted_height = $h / $wm;
	$half_height = $adjusted_height / 2;
	$int_height = $half_height - $h_height;
	
	ImageCopyResampled($thumb,$img2,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h); 
	ImageJPEG($thumb,$thname,70); 
	
}else{
	ImageCopyResampled($thumb,$img2,0,0,0,0,$nw,$nh,$w,$h); 	
	ImageJPEG($thumb,$thname,70); 
}

imagedestroy($img2);
}	
	

?>
