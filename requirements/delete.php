<?php

include __DIR__.'/../bootstrap.php';
$queryBuilder->delete('requirements') 
->where('id = ?'); 
$queryBuilder->setParameter(0, $_GET['id']); 
$queryBuilder->execute();
$_SESSION['success'] = 'نیازمندی با موفقیت حذف شد';
header('Location: /requirements');
die();