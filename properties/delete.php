<?php

include __DIR__.'/../bootstrap.php';
$queryBuilder->delete('properties') 
->where('id = ?'); 
$queryBuilder->setParameter(0, $_GET['id']); 
$queryBuilder->execute();
$_SESSION['success'] = 'ملک با موفقیت حذف شد';
header('Location: /properties');
die();