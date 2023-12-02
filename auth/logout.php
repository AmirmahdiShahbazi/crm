<?php
// logout.php
require __DIR__.'/../bootstrap.php';

// Start session

// Validate CSRF token
// $csrfToken = $_POST['csrf_token'] ?? '';
// if (!validateCsrfToken($csrfToken)) {
//     // CSRF token is invalid, handle accordingly (e.g., show an error message)
//     $_SESSION['failed'] = 'CSRF token validation failed. Please try again.';
//     header('Location: /');
//     exit;
// }

// Unset all session variables
unset($_SESSION['user']);


// Redirect to the login page
header('Location: /auth/login.php');
exit;
?>
