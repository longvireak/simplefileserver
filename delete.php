<?php
$configs       = include('config.php');
$file_location = $configs['FILE_LOCATION'];
$file          = basename($_GET['file']);
$file_name     = $file;
$file          = $file_location.$file;

if(!file_exists($file)){ // file does not exist
    die('file not found'.$file);
} else {
    unlink($file);
    header("Location: http://simplefileserver.test/");
}
?>