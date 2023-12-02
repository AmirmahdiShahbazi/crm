<?php
session_start();




require __DIR__.'/csrf.php';


include __DIR__.'/vendor/autoload.php';
use Doctrine\DBAL\DriverManager;


$connectionParams = [
    'dbname' => 'crm',
    'user' => 'amir',
    'password' => '1234',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);
$queryBuilder = $conn->createQueryBuilder();

$result = $queryBuilder->select('*')
    ->from('tickets')
    ->where('`seen` = 0')->andWhere('`receiver_id` = 4')->fetchAllAssociative();
// var_dump($queryBuilder->getSql());die();


if(sizeof($result))
{
    $_SESSION['new_ticket'] = true;
}else{
    unset($_SESSION['new_ticket']);
}

include __DIR__ . '/functions.php';
