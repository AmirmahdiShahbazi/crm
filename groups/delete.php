<?php

include __DIR__.'/../bootstrap.php';
$queryBuilder->delete('groups') 
->where('id = ?'); 
$queryBuilder->setParameter(0, $_GET['id']); 
$queryBuilder->execute();
$_SESSION['success'] = 'گروه با موفقیت حذف شد';
header('Location: /groups');
die();