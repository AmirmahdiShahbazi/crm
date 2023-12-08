<?php
session_start();
$fileNames = explode(',', $_GET['files']); // Name of the file as it will be downloaded
foreach ($fileNames as $filename) {
    $file = __DIR__.'/../files/tickets/'.$_SESSION['user']['id'].'/'.$filename;
    header('Content-type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($file);
}

