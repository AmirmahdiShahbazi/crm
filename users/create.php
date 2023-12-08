<?php
include __DIR__ . '/../bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include __DIR__ . '/../views/users/create.php';
    die();
}
if (
    empty($_POST['name']) || empty($_POST['password']) ||
    empty($_POST['phone_number']) || empty($_POST['confirmation_password']) || empty($_POST['active'])
) {
    $_SESSION['failed'] = 'لطفا اطلاعات را به درستی وارد کنید';
    header('Location: /users/create.php');
    die();
}

// Select count of records matching phone number
$queryBuilder->select('count(e.id)')
    ->from('users', 'e')
    ->where('e.phone_number = :phone_number')
    ->setParameter('phone_number', $_POST['phone_number']);

$stmt = $queryBuilder->execute();
$result = $stmt->fetch();

if ($result['count(e.id)'] > 0) {
    // Record exists
    $_SESSION['failed'] = 'شماره تلفن قبلا وارد شده است';
    header('Location: /users/create.php');
    die();
}


if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8}$/", $_POST['password'])) {
    $_SESSION['failed'] = 'رمز عبور باید حدافل هشت رقم و شامل ارقام و حروف باشد';
    header('Location: /users/create.php');
    die();
}

if ($_POST['password'] != $_POST['confirmation_password']) {
    $_SESSION['failed'] = 'رمز عبور و تکرار رمز عبور باید یکی باشد';
    header('Location: /users/create.php');
    die();
}
$queryBuilder
    ->insert('users')
    ->values(
        [
            'name' => '?',
            'phone_number' => '?',
            'password' => '?',
            'type' => '?',
            'active'=>'?'
        ]
    )->setParameter('0', $_POST['name'])
    ->setParameter('1', $_POST['phone_number'])
    ->setParameter('2', password_hash($_POST['password'], PASSWORD_BCRYPT))
    ->setParameter('3', json_encode($_POST['groups']))
    ->setParameter('4', $_POST['active']);

$queryBuilder->execute();

sendSms($user['phone_number'], "یک حساب کاربری برای شما ساخته شد "."\n رمز عبور: " . $_POST['password'], $user['name']);
$_SESSION['success'] = 'کاربر با موفقیت ساخته شد';
header('Location: /users');
die();
