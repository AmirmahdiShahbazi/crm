<?php
include __DIR__ . '/../bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include __DIR__ . '/../views/properties/create.php';
    die();
}
$requiredFields = [
    'property_type',
    'transaction_type',
    'file_id',
    'owner',
    'phone_number',
    'landline_phone',
    'share_amount',

];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        $_SESSION['failed'] = 'لطفا همه فیلد ها را پر کنید';
        header('Location: /properties/create.php');
        die();
    }
}
$queryBuilder
    ->insert('properties')
    ->values(
        [
            'property_type' => '?',
            'transaction_type' => '?',
            'file_id' => '?',
            'owner' => '?',
            'phone_number' => '?',
            'landline_phone' => '?',
            'land_size' => '?',
            'building_size' => '?',
            'share_amount' => '?',
            'room_number' => '?',
            'floor' => '?',
            'balcony' => '?',
            'store' => '?',
            'lifetime' => '?',
            'meter_price' => '?',
            'total_price' => '?',
            'neighborhood' => '?',
            'address' => '?',
            'position' => '?',
            'direction' => '?',
            'characteristic' => '?',
            'building_facade' => '?',
            'joints' => '?',
            'facilities' => '?',
            'floor_covering' => '?',
            'kitchen' => '?',
            'bathroom' => '?',
            'wall' => '?',
            'land_type' => '?',
            'shop_size' => '?',
            'files' => '?',


        ]

    )->setParameter(0, $_POST['property_type'] ?? 'none')
    ->setParameter(1, $_POST['transaction_type'] ?? 'none')
    ->setParameter(2, $_POST['file_id'] ?? 'none')
    ->setParameter(3, $_POST['owner'] ?? 'none')
    ->setParameter(4, $_POST['phone_number'] ?? 'none')
    ->setParameter(5, $_POST['landline_phone'] ?? 'none')
    ->setParameter(6, $_POST['land_size'] ?? 'none')
    ->setParameter(7, $_POST['building_size'] ?? 'none')
    ->setParameter(8, $_POST['share_amount'] ?? 'none')
    ->setParameter(9, $_POST['room_number'] ?? 'none')
    ->setParameter(10, $_POST['floor'] ?? 'none')
    ->setParameter(11, $_POST['balcony'] ?? 'none')
    ->setParameter(12, $_POST['store'] ?? 'none')
    ->setParameter(13, $_POST['lifetime'] ?? 'none')
    ->setParameter(14, $_POST['meter_price'] ?? 'none')
    ->setParameter(15, $_POST['total_price'] ?? 'none')
    ->setParameter(16, $_POST['neighborhood'] ?? 'none')
    ->setParameter(17, $_POST['address'] ?? 'none')
    ->setParameter(18, $_POST['position'] ?? 'none')
    ->setParameter(19, $_POST['direction'] ?? 'none')
    ->setParameter(20, json_encode($_POST['characteristic'] ?? 'none'))
    ->setParameter(21, $_POST['building_facade'] ?? 'none')
    ->setParameter(22, json_encode($_POST['joints'] ?? 'none'))
    ->setParameter(23, $_POST['facilities'] ?? 'none')
    ->setParameter(24, $_POST['floor_covering'] ?? 'none')
    ->setParameter(25, $_POST['kitchen'] ?? 'none')
    ->setParameter(26, $_POST['bathroom'] ?? 'none')
    ->setParameter(27, $_POST['land_type'] ?? 'none')
    ->setParameter(28, $_POST['shop_size'] ?? 'none')
    ->setParameter(29, $_POST['wall'] ?? 'none');

    if (!empty($_FILES['files'])) {
        $files = $_FILES['files'];
        $fileCount = count($files['name']);
        $destinationDir = 'properties/' . 4 . '/';
    
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
    $queryBuilder->setParameter(30, json_encode($uploadedFiles));
} else {
    $queryBuilder->setParameter(30, null);
}
$queryBuilder->execute();
$_SESSION['success'] = 'ملک با موفقیت ساخته شد';
header('Location: /properties');
die();
