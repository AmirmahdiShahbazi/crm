<?php

include __DIR__ . '/../bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('not allowed');
}

if (
    empty($_POST['expert']) || empty($_POST['date']) ||
    empty($_POST['user']) )
 {
    $_SESSION['failed'] = 'لطفا اطلاعات را به درستی وارد کنید';
    header('Location: /users/index.php');
    die();
}


$queryBuilder
    ->insert('expert_user')
    ->values(
        [
            'expert_id' => '?',
            'user_id' => '?',
            'date' => '?',
        ]
    )->setParameter('0', $_POST['expert'])
    ->setParameter('1', $_POST['user'])
    ->setParameter('2', $_POST['date']);
$queryBuilder->execute();

$sql = 'SELECT * FROM `users` WHERE id = '.$_POST['user'];
$stmt = $conn->prepare($sql);
$user = $stmt->execute()->fetchAssociative();

$sql = 'SELECT * FROM `experts` WHERE id = '.$_POST['expert'];
$stmt = $conn->prepare($sql);
$expert = $stmt->execute()->fetchAssociative();

$_SESSION['success'] = 'کارشناس به کاربر اختصاص داده شد';
sendSms($user['phone_number'],  "اختصاص داده شدید {$expert['name']} شما به کارشناس  ", $user['name']);

header('Location: /users');
die();
