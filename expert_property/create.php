<?php

include __DIR__ . '/../bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('not allowed');
}

if (
    empty($_POST['expert']) || empty($_POST['date']) ||
    empty($_POST['property']) )
 {
    $_SESSION['failed'] = 'لطفا اطلاعات را به درستی وارد کنید';
    header('Location: /properties/index.php');
    die();
}


$queryBuilder
    ->insert('expert_property')
    ->values(
        [
            'expert_id' => '?',
            'property_id' => '?',
            'date' => '?',
        ]
    )->setParameter('0', $_POST['expert'])
    ->setParameter('1', $_POST['property'])
    ->setParameter('2', $_POST['date']);
$queryBuilder->execute();

$_SESSION['success'] = 'کارشناس به ملک اختصاص داده شد';
header('Location: /properties');
die();
