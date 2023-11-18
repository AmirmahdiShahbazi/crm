<?php
include __DIR__ . '/../bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include __DIR__ . '/../views/experts/edit.php';
    die();
}

$queryBuilder->update('experts')
    ->set('name', '?')
    ->set('phone_number', '?')
    ->set('is_admin', '?')
    ->where('id = ?');
$queryBuilder->setParameter(0, $_POST['name'])
    ->setParameter(1, $_POST['phone_number'])
    ->setParameter(2, $_POST['is_admin'])
    ->setParameter(3, $_GET['id']);

if (!isset($_POST['name'])  || !isset($_POST['phone_number'])) {
    $_SESSION['failed'] = 'لطفا اطلاعات را به درستی وارد کنید';
    header('Location: /experts/create.php');
    die();
}


if (!empty($_POST['password'])) {

    if (empty($_POST['confirmation_password'])) {
        $_SESSION['failed'] = 'لطفا اطلاعات را به درستی وارد کنید';
        header('Location: /experts/update.php?id='.$_GET['id']);
        die();
    }

    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8}$/", $_POST['password'])) {
        $_SESSION['failed'] = 'رمز عبور باید حدافل هشت رقم و شامل ارقام و حروف باشد';
        header('Location: /experts/update.php?id='.$_GET['id']);
        die();
    }

    if ($_POST['password'] != $_POST['confirmation_password']) {
        $_SESSION['failed'] = 'رمز عبور و تکرار رمز عبور باید یکی باشد';
        header('Location: /experts/update.php?id='.$_GET['id']);
        die();
    }
    $queryBuilder->set('password', '?');
    $queryBuilder->setParameter(4, $_POST['password']);
}

$queryBuilder->execute();
$_SESSION['success'] = 'کارشناس با موفقیت بروزرسانی شد';
header('Location: /experts');
die();
