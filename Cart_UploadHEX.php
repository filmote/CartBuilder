<?php

session_start();


// function random_string($length) {
//     $key = '';
//     $keys = array_merge(range(0, 9), range('a', 'z'));

//     for ($i = 0; $i < $length; $i++) {
//         $key .= $keys[array_rand($keys)];
//     }

//     return $key;
// }

$hexFileName = $_FILES["fileName"]["name"]; // The file name
$hexFileTmpLoc = $_FILES["fileName"]["tmp_name"]; // File in the PHP tmp folder
$hexFileType = $_FILES["fileName"]["type"]; // The type of file it is
$hexFileSize = $_FILES["fileName"]["size"]; // File size in bytes
$hexFileErrorMsg = $_FILES["fileName"]["error"]; // 0 for false... and 1 for true

$graphicFileName = $_FILES["graphicName"]["name"]; // The file name
$graphicFileTmpLoc = $_FILES["graphicName"]["tmp_name"]; // File in the PHP tmp folder
$graphicFileType = $_FILES["graphicName"]["type"]; // The type of file it is
$graphicFileSize = $_FILES["graphicName"]["size"]; // File size in bytes
$graphicFileErrorMsg = $_FILES["graphicName"]["error"]; // 0 for false... and 1 for true

// $newName = random_string(50).".csv";


error_log("fileName", 0);
error_log($hexFileName, 0);
error_log("fileTmpLoc", 0);
error_log($hexFileTmpLoc, 0);
error_log("fileType", 0);
error_log($hexFileType, 0);
error_log("fileType", 0);
error_log($hexFileType, 0);
error_log("hexFileSize", 0);
error_log($hexFileSize, 0);
error_log("fileTmpLoc", 0);
error_log($graphicFileTmpLoc, 0);
error_log("fileTmpLoc", 0);
error_log($graphicFileType, 0);

if ($hexFileType != "application/octet-stream" || $hexFileSize > 85000 || !str_ends_with(strtolower($hexFileName), ".hex")) {
    echo "Invalid HEX File";
    exit(0);
}
if ($graphicFileType != "image/png" || $graphicFileSize > 10000 || !str_ends_with(strtolower($graphicFileName), ".png")) {
    echo "Invalid PNG File";
    exit(0);
}


// Generate a new ID and store it in the session ..

if (isset($_SESSION['fileCount'])) {
    $_SESSION['fileCount'] = $_SESSION['fileCount'] + 1;
}
else {
    $_SESSION['fileCount'] = 1;
}

$newHexName = session_id()."_".$_SESSION['fileCount'].".hex";
$newGraphicName = session_id()."_".$_SESSION['fileCount'].".png";

if (!move_uploaded_file($hexFileTmpLoc, "temp/".$newHexName)) { 
    echo "Upload of HEX Failed";
    exit(0);
}
if (!move_uploaded_file($graphicFileTmpLoc, "temp/".$newGraphicName)) {
    echo "Upload of Graphic Failed";
    exit(0);
}

echo "Complete ".session_id()."_".$_SESSION['fileCount'];

?>