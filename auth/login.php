<?php
// login.php
require '../bootstrap.php';

// Function to generate CSRF token
function generateCsrfToken()
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

// Function to validate CSRF token
function validateCsrfToken($token)
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Start session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Validate CSRF token
  $csrfToken = $_POST['csrf_token'] ?? '';
  if (!validateCsrfToken($csrfToken)) {
      // CSRF token is invalid, handle accordingly (e.g., show an error message)
      $_SESSION['failed'] = 'CSRF token validation failed. Please try again.';
      header('Location: register_form.php');
      exit;
  }
  
    $phoneNumber = $_POST['phone_number'];
    $password = $_POST['password'];

    // Fetch user data including hashed password
    $userData = $conn->fetchAssociative("SELECT * FROM experts WHERE phone_number = ?", [$phoneNumber]);

    if ($userData && password_verify($password, $userData['password'])) {
        // Authentication successful
        session_start();
        $_SESSION['user'] = $userData;
        header('Location: ../index.php');
        exit;
    } else {
        // Authentication failed
        $_SESSION['failed'] = 'مشخصات نامعتبر. لطفا مجددا تلاش کنید';
        header('Location: ../views/auth/login.php');
        die();
    }
}
?>

