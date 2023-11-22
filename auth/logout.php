<?php
// logout.php
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

// Validate CSRF token
$csrfToken = $_POST['csrf_token'] ?? '';
if (!validateCsrfToken($csrfToken)) {
    // CSRF token is invalid, handle accordingly (e.g., show an error message)
    $_SESSION['failed'] = 'CSRF token validation failed. Please try again.';
    header('Location: register_form.php');
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
