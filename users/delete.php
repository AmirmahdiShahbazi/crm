<?php

include __DIR__.'/../bootstrap.php';
$queryBuilder->delete('users') 
->where('id = ?'); 
$queryBuilder->setParameter(0, $_GET['id']); 
$queryBuilder->execute();
$_SESSION['success'] = 'کاربر با موفقیت حذف شد';
header('Location: /users');
die();