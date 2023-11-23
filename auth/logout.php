<?php
// logout.php
require '../bootstrap.php';
require '../csrf.php';

// Start session
session_start();

// Validate CSRF token
$csrfToken = $_POST['csrf_token'] ?? '';
if (!validateCsrfToken($csrfToken)) {
    // CSRF token is invalid, handle accordingly (e.g., show an error message)
    $_SESSION['failed'] = 'CSRF token validation failed. Please try again.';
    header('Location: ../index.php');
    exit;
}

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to the login page
header('Location: ../views/auth/login.php');
exit;
?>
