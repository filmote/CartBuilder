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

    imagettftext($img, $fontSize, $angle, $x, $y, -$white, $passion_one, $string);
 
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

    $img = createHeaderImage("Dffdsder", "fred");
    imagepng($img);

}



?>
