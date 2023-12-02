<?php

include __DIR__.'/../bootstrap.php';
$sql = 'SELECT * FROM `requirements` WHERE user_id =' . $_GET['id'];
$stmt = $conn->prepare($sql);
$requirements = $stmt->execute()->fetchAllAssociative();
include __DIR__.'/../views/users/show.php';