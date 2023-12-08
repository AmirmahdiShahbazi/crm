<?php
session_start();

// login.php
if (!empty($_SESSION['user']) || isset($_SESSION['user'])) {
    header('Location: /');
    die();
}




require __DIR__.'/../csrf.php';


include __DIR__.'/../vendor/autoload.php';
use Doctrine\DBAL\DriverManager;


$connectionParams = [
    'dbname' => 'crm',
    'user' => 'amir',
    'password' => '1234',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql',
];

$conn = DriverManager::getConnection($connectionParams);
$queryBuilder = $conn->createQueryBuilder();


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
