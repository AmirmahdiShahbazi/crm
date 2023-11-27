<?php
include __DIR__ . '/../bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include __DIR__ . '/../views/visits/create.php';
    die();
}
if (
    empty($_POST['property']) || empty($_POST['expert']) ||
    empty($_POST['client']) || empty($_POST['description']) ||
    empty($_POST['result']) || empty($_POST['reason'])||
    empty($_POST['category'])

) {
    $_SESSION['failed'] = 'همه فیلد ها الزامی هستند';
    header('Location: /visits/create.php');
    die();
}






$queryBuilder
    ->insert('visits')
    ->values(
        [
            'category' => '?',
            'visitor_id' => '?',
            'property_id' => '?',
            'expert_id' => '?',
            'description' => '?',
            'attachment_file' => '?',
            'visit_time' => '?',
            'result' => '?',
            'reason' => '?'
        ]
    )->setParameter('0', $_POST['category'])
    ->setParameter('1', $_POST['client'])
    ->setParameter('2', $_POST['property'])
    ->setParameter('3', $_POST['expert'])
    ->setParameter('4', $_POST['description'])
    ->setParameter('5', 'none')
    ->setParameter('6', $_POST['visit_time'])
    ->setParameter('7', $_POST['result'])
    ->setParameter('8', $_POST['reason']);
if (!empty($_FILES['files'])) {
    $files = $_FILES['files'];
    $fileCount = count($files['name']);
    $destinationDir = 'visits/' . 4 . '/';

    // Create the destination directory if it doesn't exist
    if (!is_dir($destinationDir)) {
        mkdir('./../files/'.$destinationDir, 0777, true);
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
        move_uploaded_file($fileTmp, __DIR__ . '/../files/'.$destination);
        // Move the uploaded file to the destination directory
    }
    $queryBuilder->setParameter(5, json_encode($uploadedFiles));
}
$queryBuilder->execute();

$_SESSION['success'] = 'پرونده با موفقیت ساخته شد';
header('Location: /visits');
die();
