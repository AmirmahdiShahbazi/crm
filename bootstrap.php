<?php




// $curl = curl_init();

// curl_setopt_array($curl, array(
//     CURLOPT_URL => 'http://ippanel.com:8080/?apikey=SBWelxIG7vt8P4CGsMAj11GyJo_oRGZNI0rIuuMx0a8%3D&pid=z1wan0tp8rhskz4&fnum=%2B985000125475&tnum='.$tnum.'&p1=user&p2=message&v1='.$user.'&v2='.$user,
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => '',
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => 'GET',
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;


// die();
session_start();


include __DIR__ . '/vendor/autoload.php';

use Doctrine\DBAL\DriverManager;


$connectionParams = [
    'dbname' => 'crm',
    'user' => 'amir',
    'password' => '1234',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);
$queryBuilder = $conn->createQueryBuilder();
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header("Location: /auth/login.php");
    die();
}
$result = $queryBuilder->select('*')
    ->from('tickets')
    ->where('`seen` = 0')->andWhere('`receiver_id` = ' . $_SESSION['user']['id'])->fetchAllAssociative();
// var_dump($queryBuilder->getSql());die();


if (sizeof($result)) {
    $_SESSION['new_ticket'] = true;
} else {
    unset($_SESSION['new_ticket']);
}

include __DIR__ . '/functions.php';
