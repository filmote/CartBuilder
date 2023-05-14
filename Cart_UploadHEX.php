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

// V1.27


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

    if ($hexFileType != "application/octet-stream" || $hexFileSize > 90000 || strtolower(substr($hexFileName, -4)) != ".hex") {
        echo "ERR: Invalid HEX file.";
        exit(0);
    }

    if (($graphicFileType != "" && $graphicFileType != "image/png" && $graphicFileType != "application/octet-stream") || $graphicFileSize > 10000 || strtolower(substr($graphicFileName, -4)) != ".png") {
        echo "ERR: Invalid PNG file.";
        exit(0);
    }

    if ($dataFileName != "" && ($dataFileSize > 3000000 || strtolower(substr($dataFileName, -4)) != ".bin")) {
        echo "ERR: Invalid data file.";
        exit(0);
    }

    if ($saveFileName != "" && ($saveFileSize > 1000000 || strtolower(substr($saveFileName, -4)) != ".bin")) {
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



    // Where should we save it?
    // echo "ERR: " . $pathToSave . " isset " .isset($_POST['addToRepo']) ." ". $_POST['addToRepo']  ;
    // exit(0);

    $pathToSave = "temp/";
    if (isset($_POST['addToRepo']) && $_POST['addToRepo'] == "on") {
        $pathToSave = "upload/";

        $myfile = fopen("upload/".session_id()."_".$_SESSION['fileCount'].".txt", "w") or die("ERR: Unable to open file!");
        fwrite($myfile, "Title: ");
        fwrite($myfile, $_POST['gameTitle']);
        fwrite($myfile, "\nVersion: ");
        fwrite($myfile, $_POST['versionNumber']);
        fwrite($myfile, "\nDeveloper: ");
        fwrite($myfile, $_POST['developerName']);
        fwrite($myfile, "\nDescription: ");
        fwrite($myfile, $_POST['description']);
        fwrite($myfile, "\nReplace Existing: ");

        if (is_null($_POST['replaceExistingGame'])) {
          fwrite($myfile, 'off');
        }
        else {
            fwrite($myfile, $_POST['replaceExistingGame']);
        }

        fwrite($myfile, "\nPlatform: ");
        fwrite($myfile, $_POST['platform']);
        fwrite($myfile, "\nWebsite URL: ");
        fwrite($myfile, $_POST['websiteURL']);
        fwrite($myfile, "\nSource URL: ");
        fwrite($myfile, $_POST['sourceURL']);

        fwrite($myfile, "\nStart: ");
        if (is_null($_POST['start'])) {
            fwrite($myfile, 'na');
        }
        else {
            fwrite($myfile, $_POST['start']);
        }
  

        fwrite($myfile, "\nEnd: ");
        if (is_null($_POST['end'])) {
            fwrite($myfile, 'na');
        }
        else {
            fwrite($myfile, $_POST['end']);
        }

        fwrite($myfile, "\nHash: ");
        if (is_null($_POST['hash'])) {
            fwrite($myfile, 'na');
        }
        else {
            fwrite($myfile, $_POST['hash']);
        }
        fclose($myfile);

    }


    // Move the files to the 'temp' or 'upload' directory ..

    if (!move_uploaded_file($hexFileTmpLoc, $pathToSave.$newHexName)) { 
        echo "ERR: Upload of HEX file failed.";
        exit(0);
    }

    if (!move_uploaded_file($graphicFileTmpLoc, $pathToSave.$newGraphicName)) {
        echo "ERR: Upload of PNG icon failed.";
        exit(0);
    }

    if ($dataFileName !== '') {

        if (!move_uploaded_file($dataFileTmpLoc, $pathToSave.$newDataName)) {
            echo "ERR: Upload of data file failed.";
            exit(0);
        }

    }

    if ($saveFileName !== '') {

        if (!move_uploaded_file($saveFileTmpLoc, $pathToSave.$newSaveName)) {
            echo "ERR: Upload of save file failed.";
            exit(0);
        }

    }

    echo "Complete ".session_id()."_".$_SESSION['fileCount'];

?>