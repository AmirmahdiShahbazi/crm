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

$_SESSION['success'] = 'کارشناس به کاربر اختصاص داده شد';
header('Location: /users');
die();
