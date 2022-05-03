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


    session_start();

    $hexFileName            = $_FILES["hexName"]["name"]; 
    $hexFileTmpLoc          = $_FILES["hexName"]["tmp_name"]; 
    $hexFileType            = $_FILES["hexName"]["type"]; 
    $hexFileSize            = $_FILES["hexName"]["size"]; 

    $graphicFileName        = $_FILES["graphicName"]["name"];
    $graphicFileTmpLoc      = $_FILES["graphicName"]["tmp_name"];
    $graphicFileType        = $_FILES["graphicName"]["type"];
    $graphicFileSize        = $_FILES["graphicName"]["size"];

    $dataFileName           = $_FILES["dataName"]["name"];
    $dataFileTmpLoc         = $_FILES["dataName"]["tmp_name"];
    $dataFileType           = $_FILES["dataName"]["type"];
    $dataFileSize           = $_FILES["dataName"]["size"];

    $saveFileName           = $_FILES["saveName"]["name"];
    $saveFileTmpLoc         = $_FILES["saveName"]["tmp_name"];
    $saveFileType           = $_FILES["saveName"]["type"];
    $saveFileSize           = $_FILES["saveName"]["size"];


    // Check to see if the files are of the right type ..

    if ($hexFileType != "application/octet-stream" || $hexFileSize > 85000 || strtolower(substr($hexFileName, -4)) != ".hex") {
        echo "ERR: Invalid HEX file.";
        exit(0);
    }

    if ($graphicFileType != "image/png" || $graphicFileSize > 10000 || strtolower(substr($graphicFileName, -4)) != ".png") {
        echo "ERR: Invalid PNG file.";
        exit(0);
    }

    if ($dataFileName != "" && ($dataFileSize > 100000 || strtolower(substr($dataFileName, -4)) != ".bin")) {
        echo "ERR: Invalid data file.";
        exit(0);
    }

    if ($saveFileName != "" && ($saveFileSize > 100000 || strtolower(substr($saveFileName, -4)) != ".bin")) {
        echo "ERR: Invalid save file.";
        exit(0);
    }

    $img = @imageCreateFromPng($graphicFileTmpLoc);
    $width  = @imagesx($img);
    $height = @imagesy($img);

    if ($width != 128 || $height != 64) {

        echo "ERR: The graphics file must be a monochrome PNG with dimensions of 128x64.";
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
    $newDataName = session_id()."_".$_SESSION['fileCount']."_1.bin";
    $newSaveName = session_id()."_".$_SESSION['fileCount']."_2.bin";


    // Move the files to the 'temp' directory ..

    if (!move_uploaded_file($hexFileTmpLoc, "temp/".$newHexName)) { 
        echo "ERR: Upload of HEX file failed.";
        exit(0);
    }

    if (!move_uploaded_file($graphicFileTmpLoc, "temp/".$newGraphicName)) {
        echo "ERR: Upload of PNG icon failed.";
        exit(0);
    }

    if ($dataFileName !== '') {

        if (!move_uploaded_file($dataFileTmpLoc, "temp/".$newDataName)) {
            echo "ERR: Upload of data file failed.";
            exit(0);
        }

    }

    if ($saveFileName !== '') {

        if (!move_uploaded_file($saveFileTmpLoc, "temp/".$newSaveName)) {
            echo "ERR: Upload of save file failed.";
            exit(0);
        }

    }

    echo "Complete ".session_id()."_".$_SESSION['fileCount'];

?>