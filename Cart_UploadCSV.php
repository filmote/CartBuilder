<?php

/* -------------------------------------------------------------------------------

BSD 3-Clause License

Copyright (c) 2019, Filmote and Mr.Blinky
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this
   list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice,
   this list of conditions and the following disclaimer in the documentation
   and/or other materials provided with the distribution.

3. Neither the name of the copyright holder nor the names of its
   contributors may be used to endorse or promote products derived from
   this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

------------------------------------------------------------------------------- */

// V1.08

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

if (($fileType != "text/csv" && $fileType != "application/vnd.ms-excel") || $fileSize > 131072) echo "Invalid File Wrong file format";
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
                echo "Invalid File Check filenames at line " . ((int)key($csv) + 1);
                die();
            }
    }
        if(move_uploaded_file($fileTmpLoc, "temp/".$newName)){ // assuming the directory name 'test_uploads'
        echo "$fileName upload is complete";
    } 
    else {
        echo "Invalid file Upload failed";
    }

}
?>