<?php
include __DIR__ . '/../bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: /groups/index.php');
    die();
}
if (empty($_POST['title'])) {
    $_SESSION['failed'] = 'لطفا اطلاعات را به درستی وارد کنید';
    header('Location: /groups/index.php');
    die();
}

$queryBuilder->update('groups')
    ->set('title', '?')
    ->where('id = ?');
$queryBuilder->setParameter(0, $_POST['title']);
$queryBuilder->setParameter(1, $_POST['id']);




$queryBuilder->execute();
$_SESSION['success'] = 'گروه با موفقیت بروزرسانی شد';
header('Location: /groups');
die();
