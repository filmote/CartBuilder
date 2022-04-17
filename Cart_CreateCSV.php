<?php
 //$temp = tmpfile();
 $temp = fopen("newfile.csv", "w") or die("Unable to open file!");
fwrite($temp, str_replace("<br/>", PHP_EOL, $_POST["output"]));
fclose($temp); // this removes the file


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

    $command = escapeshellcmd('python3 flashcart-builder.py newfile.csv');
    $output = shell_exec($command);

    echo $output;

}

?>
