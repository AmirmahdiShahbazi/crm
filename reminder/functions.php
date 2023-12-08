<?php

// functions.php

global $conn;

function getRemindersForExpert($expertId)
{
    global $conn;

    $expertId = (int) $expertId;

    $query = "SELECT * FROM reminder WHERE user_id = $expertId";
    $stmt = $conn->query($query);

    return $stmt->fetchAll();
}

function addReminder($title, $type, $start, $end, $currentUserId)
{
    global $conn;

    $title = $conn->quote($title);
    $start = $conn->quote($start);
    $end = $conn->quote($end);
    $type = $conn->quote($type);
    $currentUserId = (int) $currentUserId;

    $query = "INSERT INTO reminder (title, type, start_date, end_date, user_id) VALUES ($title, $type , $start, $end, $currentUserId)";
    $conn->exec($query);
}
