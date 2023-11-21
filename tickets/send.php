<?php

include __DIR__ . '/../bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include __DIR__ . '/../views/tickets/send.php';
    die();
}
if (empty($_POST['receiver']) || empty($_POST['title']) || empty($_POST['message'])) {
    $_SESSION['failed'] = 'لطفا اطلاعات را به درستی وارد کنید';
    header('Location: /tickets/send.php');
    die();
}
$queryBuilder
    ->insert('tickets')
    ->values(
        [
            'title' => ':title',
            'message' => ':message',
            'receiver_id' => ':receiver_id',
            'sender_id' => ':sender_id',
            'files' => ':files'
        ]
    )
    ->setParameter('title', $_POST['title'])
    ->setParameter('message', $_POST['message'])
    ->setParameter('receiver_id', $_POST['receiver'])
    ->setParameter('sender_id', 4);

if (!empty($_FILES['files']) && isset($_POST['files'])) {
    $files = $_FILES['files'];
    $fileCount = count($files['name']);
    $destinationDir = __DIR__ . '/../files/tickets/' . $_POST['receiver'] . '/';
    
    // Create the destination directory if it doesn't exist
    if (!is_dir($destinationDir)) {
        mkdir($destinationDir, 0777, true);
    }
    
    $uploadedFiles = [];
    for ($i = 0; $i < $fileCount; $i++) {
        $fileName = $files['name'][$i];
        $fileTmp = $files['tmp_name'][$i];
        $fileSize = $files['size'][$i];
        $fileError = $files['error'][$i];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $destination = $destinationDir . md5($fileName) . '.' . $extension;
        $uploadedFiles[] = $destination;
        move_uploaded_file($fileTmp, $destination);
        // Move the uploaded file to the destination directory
    }
    
    $queryBuilder->setParameter('files', json_encode($uploadedFiles));
} else {
    $queryBuilder->setParameter('files', null);
}

$queryBuilder->execute();
$_SESSION['success'] = 'تیکت با موفقیت ارسال شد';
header('Location: /tickets/send.php');
die();