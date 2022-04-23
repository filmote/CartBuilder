<?php

    session_start();

    $hexFileName            = $_FILES["hexName"]["name"]; 
    $hexFileTmpLoc          = $_FILES["hexName"]["tmp_name"]; 
    $hexFileType            = $_FILES["hexName"]["type"]; 
    $hexFileSize            = $_FILES["hexName"]["size"]; 
    $hexFileErrorMsg        = $_FILES["hexName"]["error"]; 

    $graphicFileName        = $_FILES["graphicName"]["name"];
    $graphicFileTmpLoc      = $_FILES["graphicName"]["tmp_name"];
    $graphicFileType        = $_FILES["graphicName"]["type"];
    $graphicFileSize        = $_FILES["graphicName"]["size"];
    $graphicFileErrorMsg    = $_FILES["graphicName"]["error"];


    // Check to see if the files are of the right type ..

    if ($hexFileType != "application/octet-stream" || $hexFileSize > 85000 || !str_ends_with(strtolower($hexFileName), ".hex")) {
        echo "ERR: Invalid HEX file.";
        exit(0);
    }

    if ($graphicFileType != "image/png" || $graphicFileSize > 10000 || !str_ends_with(strtolower($graphicFileName), ".png")) {
        echo "ERR: Invalid PNG file.";
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


    // Move the files to the 'trmp' directory ..

    if (!move_uploaded_file($hexFileTmpLoc, "temp/".$newHexName)) { 
        echo "ERR: Upload of HEX file failed.";
        exit(0);
    }
    if (!move_uploaded_file($graphicFileTmpLoc, "temp/".$newGraphicName)) {
        echo "ERR: Upload of PNG icon failed.";
        exit(0);
    }

    echo "Complete ".session_id()."_".$_SESSION['fileCount'];

?>