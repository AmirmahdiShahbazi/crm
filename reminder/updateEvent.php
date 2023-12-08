<?php
// updateEvent.php

function convertPersianToLatinDigits($str)
{
    $persianDigits = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    $latinDigits = range(0, 9);

    return str_replace($persianDigits, $latinDigits, $str);
}


// Include your database connection code here
require_once __DIR__."/../bootstrap.php";

try {
  // Get data from the AJAX request

$eventId = $_POST['eventId'];
$newStartDate = new DateTime(convertPersianToLatinDigits($_POST['newStartDate']), new DateTimeZone('Asia/Tehran')); // Set the timezone as needed
$newEndDate = new DateTime(convertPersianToLatinDigits($_POST['newEndDate']), new DateTimeZone('Asia/Tehran'));     // Set the timezone as needed

// Format dates as 'Y-m-d H:i:s'
$newStartDate = $newStartDate->format('Y-m-d H:i:s');
$newEndDate = $newEndDate->format('Y-m-d H:i:s');


// Prepare the SQL statement with placeholders
$query = "UPDATE reminder SET start_date = :newStartDate, end_date = :newEndDate WHERE id = :eventId";
$stmt = $conn->prepare($query);

// Bind parameters
$stmt->bindParam(':newStartDate', $newStartDate);
$stmt->bindParam(':newEndDate', $newEndDate);
$stmt->bindParam(':eventId', $eventId);

// Execute the statement
$stmt->execute();
  // Return a success response
  echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
  // Log the error
  error_log('Error updating event in the database: ' . $e->getMessage());
  // Return an error response
  echo json_encode(['status' => 'error', 'message' => 'Error updating event in the database']);
}
?>
