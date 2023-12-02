<?php
// login.php

if (isset($_SESSION['user'])) {
    header('Location: /');
    die();
}
require_once __DIR__ . '/../bootstrap.php';

// Start session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Validate CSRF token
    // $csrfToken = $_POST['csrf_token'] ?? '';
    // if (!validateCsrfToken($csrfToken)) {
    //     // CSRF token is invalid, handle accordingly (e.g., show an error message)
    //     $_SESSION['failed'] = 'CSRF token validation failed. Please try again.';
    //     header('Location: /auth/login.php');
    //     exit;
    // }

    $phoneNumber = $_POST['phone_number'];
    $password = $_POST['password'];

    // Fetch user data including hashed password
    $userData = $conn->fetchAssociative("SELECT * FROM experts WHERE phone_number = ?", [$phoneNumber]);
    if ($userData && password_verify($password, $userData['password'])) {

        // Authentication successful
        $_SESSION['user'] = $userData;

        header('Location: /');
        die();
    } else {
        // Authentication failed
        $_SESSION['failed'] = 'مشخصات نامعتبر. لطفا مجددا تلاش کنید';
        header('Location: /auth/login.php');
        die();
    }
} else {
    include __DIR__ . '/../views/auth/login.php';
    
}
