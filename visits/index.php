<?php
include __DIR__ . '/../bootstrap.php';
//  try {
//     $sql = 'SELECT * FROM `visits`';
//     $stmt = $conn->prepare($sql);
//     $visits = $stmt->execute()->fetchAllAssociative();;
// } catch (\Exception $e) {
//     echo 'Error: ' . $e->getMessage();
//     die();
// }

// var_dump($visits);
// die();
include __DIR__.'/../views/visits/index.php';