<?php

include __DIR__.'/../bootstrap.php';
$queryBuilder->delete('experts') 
->where('id = ?'); 
$queryBuilder->setParameter(0, $_GET['id']); 
$queryBuilder->execute();
$_SESSION['success'] = 'کارشناس با موفقیت حذف شد';
header('Location: /experts');
die();