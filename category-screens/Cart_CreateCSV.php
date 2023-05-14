<?php

function createHeaderImage($string, $fileName, $fontSize = 20) {

    $img_width = 128;
    $img_height = 64;
    $angle = 0;
    $passion_one = 'Fonts/PassionOne-Regular.ttf';
     
    $img = imagecreatetruecolor($img_width, $img_height);
    $black = imagecolorallocate($img, 0, 0, 0);
    $white = imagecolorallocate($img, 255, 255, 255);
     
    imagefill($img, 0, 0, $black);
 
    $tb = imagettfbbox($fontSize, $angle, $passion_one, $string);
    $x = ceil(($img_width - $tb[2]) / 2);
    $y = ceil(($img_height / 2) - ($tb[5] / 2));

//    imagettftext($img, $fontSize, $angle, $x, $y, -$white, $passion_one, $string);
    imagettftext($img, $fontSize, $angle, $x, $y, -$white, $passion_one, $tb[5]);

    $save = strtolower($fileName) .".png";
    imagepng($img, $save);

    return $img;

}


if ($_POST["mode"] == "csv") {

    $path = "newfile.csv";

    // the file name of the download, change this if needed
    //$public_name = basename($path);
    $public_name = 'flashcart-index.csv';

    // get the file's mime type to send the correct content type header
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $path);

    // send the headers
    header("Content-Disposition: attachment; filename=$public_name;");
    header("Content-Type: $mime_type");
    header('Content-Length: ' . filesize($path));

    // stream the file
    $fp = fopen($path, 'rb');
    fpassthru($fp);

}
else {

    // $command = escapeshellcmd('python3 flashcart-builder.py newfile.csv');
    // $output = shell_exec($command);

    // echo $output;
   header( "Content-type: image/png" );
//     $img_width = 128;
//     $img_height = 64;
     
//     $img = imagecreatetruecolor($img_width, $img_height);
     
//     $black = imagecolorallocate($img, 0, 0, 0);
//     $white = imagecolorallocate($img, 255, 255, 255);
     
//     imagefill($img, 0, 0, $black);
// //    imagestring($img, 5, 2, 2, 'Hello!', $white);


//     //    $passion_one = dirname(__FILE__) . '/PassionOne-Regular.ttf';
//     $passion_one = 'Fonts/PassionOne-Regular.ttf';
//     // imagestringup($img, 5, $img_width*19/20, $img_height*19/20, 'Hello!', $white);

//     $string = 'Shooters';
//     $strlen = strlen($string);
//     $size = 20;
//     $angle = 0;
//     $width = 0;

//     for ($i = 0; $i < $strlen; $i++)
//      {
//         $dimensions = imagettfbbox($size, $angle, $passion_one, $string[$i]);
//         // echo "Width of ".$string[$i]." is ".$dimensions[2]."<br>";
//         $width = $width + $dimensions[2];
    
//      }


//     imagettftext($img, $size, 0, 64 - ($width / 2), 25, -$white, $passion_one, $string);

//     $name = 'fred';
//     $save = strtolower($name) .".png";
//     imagepng($img, $save);



// $img_width = 128;
// $img_height = 64;

// $img = imagecreatetruecolor($img_width, $img_height);
// $black = imagecolorallocate($img, 0, 0, 0);
// $white = imagecolorallocate($img, 255, 255, 255);
 
// imagefill($img, 0, 0, $black);

// //    $passion_one = dirname(__FILE__) . '/PassionOne-Regular.ttf';
// $passion_one = 'Fonts/PassionOne-Regular.ttf';


// // Calculate string width ..

// $string = 'Shooters';
// $strlen = strlen($string);
// $angle = 0;
// $width = 0;
// $fontSize = 20;
// $fileName = "ddd";

// for ($i = 0; $i < $strlen; $i++) {

//     $dimensions = imagettfbbox($fontSize, $angle, $passion_one, $string[$i]);
//     $width = $width + $dimensions[2];

//  }
// //  echo "width: ".$width;

// //imagettftext($img, $fontSize, $angle, 64 - ($width / 2), 25, -$white, $passion_one, $string);
// imagettftext($img, $fontSize, $angle, 5, 25, $white, $passion_one, $string);

// $save = strtolower($fileName) .".png";
// imagepng($img, $save);

// //return $img;


    $img = createHeaderImage("Dffdsder", "fred");
    imagepng($img);

}



?>
