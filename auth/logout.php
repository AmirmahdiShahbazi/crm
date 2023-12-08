<?php
// logout.php
require __DIR__.'/../bootstrap.php';
require __DIR__.'/../csrf.php';

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
