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

// $img = createHeaderImage($_POST["categoryName"], $_POST["guid"]);
$img = createHeaderImage("AAA","AAAA");

error_log("---------------------------", 0);
foreach ($_POST as $key => $value) {
    error_log("Field ".htmlspecialchars($key)." is ".htmlspecialchars($value), 0);
}

//imagepng($img);



//    header( "Content-type: image/png" );
echo "<html><body>";
echo $_POST["categoryName"];
echo $_POST["guid"];
echo "</body></html>";

// if ($_POST["mode"] == "csv") {

//     $path = "newfile.csv";

//     // the file name of the download, change this if needed
//     //$public_name = basename($path);
//     $public_name = 'flashcart-index.csv';

//     // get the file's mime type to send the correct content type header
//     $finfo = finfo_open(FILEINFO_MIME_TYPE);
//     $mime_type = finfo_file($finfo, $path);

//     // send the headers
//     header("Content-Disposition: attachment; filename=$public_name;");
//     header("Content-Type: $mime_type");
//     header('Content-Length: ' . filesize($path));

//     // stream the file
//     $fp = fopen($path, 'rb');
//     fpassthru($fp);

// }

// if ($_POST["mode"] == "bin") {

//     // $command = escapeshellcmd('python3 flashcart-builder.py newfile.csv');
//     // $output = shell_exec($command);

//     // echo $output;
//     header( "Content-type: image/png" );

//     $img = createHeaderImage("Dffdsder", "fred");
//     imagepng($img);

// }

// if ($_POST["mode"] == "createCategory") {

//     // $command = escapeshellcmd('python3 flashcart-builder.py newfile.csv');
//     // $output = shell_exec($command);

//     // echo $output;
// //    header( "Content-type: image/png" );
// // echo "<html><body>";
// // echo $_POST["categoryName"];
// // echo $_POST["guid"];
// // echo "</body></html>";

//     $img = createHeaderImage($_POST["categoryName"], $_POST["guid"]);
//     imagepng($img);

// }



?>
