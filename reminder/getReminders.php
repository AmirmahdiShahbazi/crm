<?php

// getReminders.php

require_once __DIR__."/../bootstrap.php";
require_once __DIR__."/functions.php";

// Assuming you have access to the current user's ID in your application
$currentUserId = $_SESSION['user_id']; // Update this line based on your authentication mechanism

$reminders = getRemindersForExpert($currentUserId);

$events = [];
foreach ($reminders as $reminder) {
    $events[] = [
        'id' => $reminder['id'],
        'title' => $reminder['title'],
        'start' => $reminder['start_date'],
        'end'   => $reminder['end_date'],
        'type' => $reminder['type']
    ];
}

header('Content-Type: application/json');
echo json_encode($events);
