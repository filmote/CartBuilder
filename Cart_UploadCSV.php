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

$fileName = $_FILES["fileName"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileName"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileName"]["type"]; // The type of file it is
$fileSize = $_FILES["fileName"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileName"]["error"]; // 0 for false... and 1 for true

// $newName = random_string(50).".csv";
$newName = session_id().".csv";


error_log("fileName", 0);
error_log($fileName, 0);
error_log("fileTmpLoc", 0);
error_log($fileTmpLoc, 0);
error_log("newName", 0);
error_log($newName, 0);
error_log("fileType", 0);
error_log($fileType, 0);

if ($fileType == "text/csv") {
    if(move_uploaded_file($fileTmpLoc, "temp/".$newName)){ // assuming the directory name 'test_uploads'
        echo "$fileName upload is complete";
    } 
    else {
        echo "move_uploaded_file function failed";
    }
}
else {
    echo "Invalid File";
}

?>