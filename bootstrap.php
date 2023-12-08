<?php


session_start();
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
include __DIR__ . '/functions.php';
