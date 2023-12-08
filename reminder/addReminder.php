<?php

// addReminder.php

// Function to convert Persian digits to Latin digits
function convertPersianToLatinDigits($str)
{
    $persianDigits = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    $latinDigits = range(0, 9);

    return str_replace($persianDigits, $latinDigits, $str);
}

require_once __DIR__."/../bootstrap.php";
require_once __DIR__."/functions.php";

// Assuming you have access to the current user's ID in your application
$currentUserId = $_SESSION['user_id']; // Update this line based on your authentication mechanism

$title = $_POST['title'];
$type = $_POST['type']; 
// Assuming $_POST['start'] and $_POST['end'] are in the format '۲۰۲۱-۰۴-۲۶T۰۷:۳۰:۰۰'
$start = new DateTime(convertPersianToLatinDigits($_POST['start']), new DateTimeZone('Asia/Tehran')); // Set the timezone as needed
$end = new DateTime(convertPersianToLatinDigits($_POST['end']), new DateTimeZone('Asia/Tehran'));     // Set the timezone as needed

// Format dates as 'Y-m-d H:i:s'
$start = $start->format('Y-m-d H:i:s');
$end = $end->format('Y-m-d H:i:s');

addReminder($title, $type, $start, $end, $currentUserId);

// Return success response
header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
