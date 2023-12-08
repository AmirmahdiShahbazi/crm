<?php
include __DIR__ . '/../bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include __DIR__ . '/../views/groups/index.php';
    die();
}
if (
    empty($_POST['title']) 

) {
    $_SESSION['failed'] = 'همه فیلد ها الزامی هستند';
    header('Location: /groups/index.php');
    die();
}



$queryBuilder
    ->insert('groups')
    ->values(
        [
            'title' => '?',

        ]
    )
    ->setParameter(0, $_POST['title']);

$queryBuilder->execute();
$_SESSION['success'] = 'گروه با موفقیت ساخته شد';
header('Location: /groups');
die();
