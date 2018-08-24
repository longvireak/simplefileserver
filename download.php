<?php
$configs       = include('config.php');
$file_location = $configs['FILE_LOCATION'];
$file          = basename($_GET['file']);
$file_name     = $file;
$file          = $file_location.$file;

if(!file_exists($file)){ // file does not exist
    die('file not found'.$file);
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);
}
?>