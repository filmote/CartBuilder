<?php

session_start();

$fileName = $_FILES["fileName"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileName"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileName"]["type"]; // The type of file it is
$fileSize = $_FILES["fileName"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileName"]["error"]; // 0 for false... and 1 for true

$newName = session_id().".csv";

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