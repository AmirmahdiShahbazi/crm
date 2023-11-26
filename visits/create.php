<?php
include __DIR__ . '/../bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include __DIR__ . '/../views/visits/create.php';
    die();
}

if (
    empty($_POST['name']) || empty($_POST['password']) ||
    empty($_POST['phone_number']) || empty($_POST['confirmation_password'])
) {
    $_SESSION['failed'] = 'لطفا اطلاعات را به درستی وارد کنید';
    header('Location: /experts/create.php');
    die();
}






$queryBuilder
    ->insert('visits')
    ->values(
        [
            'category' => '?',
            'visitor_id' => '?',
            'property_id' => '?',
            'owner_id' => '?',
            'description' => '?',
            'attachment_file' => '?',
            'visit_time' => '?',
            'result' => '?',
            'reason' => '?'
        ]
    )->setParameter('0', $_POST['category'])
    ->setParameter('1', $_POST['visitor_id'])
    ->setParameter('2', $_POST['property_id'])
    ->setParameter('3', $_POST['owner_id'])
    ->setParameter('4', $_POST['description'])
    ->setParameter('5', $_POST['attachment_file'])
    ->setParameter('6', $_POST['visit_time'])
    ->setParameter('7', $_POST['result'])
    ->setParameter('8', $_POST['visit_time'])
    ->setParameter('9', $_POST['reason']);
$queryBuilder->execute();

$_SESSION['success'] = 'پرونده با موفقیت ساخته شد';
header('Location: /experts');
die();
