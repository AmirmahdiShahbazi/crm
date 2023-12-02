<?php
include __DIR__ . '/../bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include __DIR__ . '/../views/requirements/index.php';
    die();
}
if (
    empty($_POST['user']) || empty($_POST['title']) ||
    empty($_POST['date'])

) {
    $_SESSION['failed'] = 'همه فیلد ها الزامی هستند';
    header('Location: /requirements/index.php');
    die();
}



$queryBuilder
    ->insert('requirements')
    ->values(
        [
            'title' => '?',
            'user_id' => '?',
            'date' => '?'
        ]
    )
    ->setParameter(0, $_POST['title'])
    ->setParameter(1, $_POST['user'])
    ->setParameter(2, $_POST['date']);

$queryBuilder->execute();
$_SESSION['success'] = 'نیازمندی با موفقیت ساخته شد';
header('Location: /requirements');
die();
