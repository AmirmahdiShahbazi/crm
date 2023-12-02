<?php


include __DIR__ . '../bootstrap.php';


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include __DIR__ . '/../views/requirements/index.php';
    die();
}
if (
    empty($_POST['description']) ||
    empty($_POST['date']) || empty($_POST['title'])

) {
    $_SESSION['failed'] = 'همه فیلد ها الزامی هستند';
    header('Location: /requirements/index.php');
    die();
}
// Shamsvai date

// Convert Shamsi date to AD date



$queryBuilder
    ->insert('tasks')
    ->values(
        [
            'description' => '?',
            'expert_id' => '?',
            'date' => '?',
            'title' => '?'
        ]
    )
    ->setParameter(0, $_POST['description'])
    ->setParameter(1, $_SESSION['user']['id'])
    ->setParameter(2, $_POST['date'])
    ->setParameter(3, $_POST['title']);

$queryBuilder->execute();
$_SESSION['success'] = 'نیازمندی با موفقیت ساخته شد';
header('Location: /tasks');
die();
