<?php

include __DIR__.'/../bootstrap.php';
$queryBuilder->delete('properties') 
->where('id = ?'); 
$queryBuilder->setParameter(0, $_GET['id']); 
$queryBuilder->execute();
header('Location: /properties');
die();