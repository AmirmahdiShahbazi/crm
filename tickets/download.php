<?php

$fileNames = explode(',', $_GET['files']); // Name of the file as it will be downloaded
foreach ($fileNames as $filename) {
    $file = __DIR__.'/../../files/tickets/4/'.$fileName;
    header('Content-type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($file);
}

