<?php
include __DIR__ . '/../bootstrap.php';
if ($_SESSION['user']['is_admin'])
    include __DIR__ . '/../views/experts/index.php';
else
    include __DIR__ . '/../views/experts/index-list.php';
