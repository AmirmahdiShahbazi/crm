<?php
include __DIR__ . '/../bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    include __DIR__ . '/../views/tickets/show-sent.php';
    die();
}
// var_dump($_FILES);die();
if (empty($_POST['message']) && empty($_FILES['files']['name'][0])) {
    $_SESSION['failed'] = 'لطفا اطلاعات را به درستی وارد کنید';
    header('Location: /tickets/show-sent.php?id=' . $_GET['id']);
    die();
}
if (!empty($_POST['message'])) {
    $queryBuilder
        ->insert('messages')
        ->values([
            'message' => ':message',
            'type' => ':type',
            'ticket_id' => ':ticket_id',
            'receiver_id' => ':receiver_id',
            'sender_id' => ':sender_id'
        ])
        ->setParameter('message', $_POST['message'])
        ->setParameter('type', 'text')
        ->setParameter('ticket_id', $_GET['id'])
        ->setParameter('receiver_id', $_POST['receiver'])
        ->setParameter('sender_id', $_SESSION['user']['id']);
    $queryBuilder->execute();
}


if (!empty($_FILES['files']['name'][0])) {


    $files = $_FILES['files'];
    $fileCount = count($files['name']);
    $destinationDir = 'tickets/' . $_SESSION['user']['id'] . '/';

    if (!is_dir($destinationDir)) {
        mkdir('../files/' . $destinationDir, 0777, true);
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
        move_uploaded_file($fileTmp, __DIR__ . '/../files/' . $destination);
        // Move the uploaded file to the destination directory
    }

    $queryBuilder
        ->insert('messages')
        ->values([
            'message' => ':message',
            'type' => ':type',
            'ticket_id' => ':ticket_id',
            'receiver_id' => ':receiver_id',
            'sender_id' => ':sender_id'
        ])
        ->setParameter('message', json_encode($uploadedFiles))
        ->setParameter('type', 'file')
        ->setParameter('ticket_id', $_GET['id'])
        ->setParameter('receiver_id', $_POST['receiver'])
        ->setParameter('sender_id', $_SESSION['user']['id']);;
    $queryBuilder->execute();
} else {
    // $queryBuilder->setParameter('files', null);
}
$_SESSION['success'] = 'تیکت با موفقیت ارسال شد';
header('Location: /tickets/show-sent.php?id=' . $_GET['id']);
die();
