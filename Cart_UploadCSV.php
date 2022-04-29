<?php

#CSV indices
const ID_LIST = 0;
const ID_TITLE = 1;
const ID_TITLESCREEN = 2;
const ID_HEXFILE = 3;
const ID_DATAFILE = 4;
const ID_SAVEFILE = 5;
const ID_VERSION = 6;
const ID_DEVELOPER = 7;
const ID_INFO = 8;
const ID_LIKES = 9;
const ID_MAX = 10;

$fileName = $_FILES["fileName"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileName"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileName"]["type"]; // The type of file it is
$fileSize = $_FILES["fileName"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileName"]["error"]; // 0 for false... and 1 for true

session_id(basename($fileTmpLoc));
session_start();

$newName = session_id().".csv";

function badFile($filename, $ext)
{
  if ($filename == "") return  $ext == ".png"; # images are mandatory
  $path = realpath(dirname(__FILE__));
  $pathlen = strlen($path);
  $filename = str_replace("\\", "/", $filename);
  $filepath = substr(realpath($filename), 0, $pathlen);
  $result = $filepath != $path || strtolower(substr($filename,-4)) != $ext || !is_file($filename);
  return $result;
}

if (($fileType != "text/csv" && $fileType != "application/vnd.ms-excel") || $fileSize > 131072) echo "Invalid File";
else {
    $csv = explode("\n", file_get_contents($fileTmpLoc));
    $head = current($csv);
    $sep = ';';
    if (substr_count($head, ',') > substr_count($head, ';')) $sep = ',';
    while (next($csv) !== false)
    {
        $row = str_getcsv(current($csv), $sep);
        if (count($row) == 1 && $row[ID_LIST] == "") continue; #ignore blank lines
        while (count($row) < ID_MAX) $row[] = "";
        if (badfile($row[ID_TITLESCREEN], ".png") ||
           (badFile($row[ID_HEXFILE] , ".hex" ))  ||
           (badFile($row[ID_DATAFILE], ".bin" ))  ||
           (badFile($row[ID_SAVEFILE], ".bin" ))  ) {
                error_log(current($csv) . " " . realpath($fileTmpLoc),4,0);
                echo "Invalid File";
                die();
            }
    }
        if(move_uploaded_file($fileTmpLoc, "temp/".$newName)){ // assuming the directory name 'test_uploads'
        echo "$fileName upload is complete";
    } 
    else {
        echo "move_uploaded_file function failed";
    }

}
?>