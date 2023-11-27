<?php

include __DIR__ . '/../bootstrap.php';

    $sql = 'UPDATE tickets
    SET seen = 1
    WHERE id = '.intval($_GET['id']).';';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    unset($_SESSION['new_ticket']);

include __DIR__ . '/../views/tickets/show-received.php';
