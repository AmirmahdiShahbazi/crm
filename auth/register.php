<?php
// register.php
require __DIR__.'/../bootstrap.php';




if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Validate CSRF token
  $csrfToken = $_POST['csrf_token'] ?? '';
  if (!validateCsrfToken($csrfToken)) {
      // CSRF token is invalid, handle accordingly (e.g., show an error message)
      $_SESSION['failed'] = 'CSRF token validation failed. Please try again.';
      header('Location: ../views/auth/sign-up.php');
      exit;
  }

    $name = $_POST['name'];
    $phoneNumber = $_POST['phone_number'];
    $password = $_POST['password'];

//     if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8}$/", $_POST['password'])) {
//       $_SESSION['failed'] = 'رمز عبور باید حدافل هشت رقم و شامل ارقام و حروف باشد';
//       header('Location: ../views/auth/sign-up.php');
//       die();
//   }
  
  if ($_POST['password'] != $_POST['confirmation_password']) {
      $_SESSION['failed'] = 'رمز عبور و تکرار رمز عبور باید یکی باشد';
      header('Location: ../views/auth/sign-up.php');
      die();
  }
  
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Check if the phone number is already registered
    $existingUser = $conn->fetchAssociative("SELECT id FROM experts WHERE phone_number = ?", [$phoneNumber]);

    if (!$existingUser) {
        // Insert the new user into the database
        $conn->insert('experts', [
            'name' => $name,
            'phone_number' => $phoneNumber,
            'password' => $hashedPassword,
        ]);

        header('Location: ../auth/login.php');
        exit;
    } else {
        // Phone number is already registered
        $_SESSION['failed'] = 'شماره تلفن تکراری است. یک شماره تلفن دیگر انتخاب کنید';
        header('Location: /auth/register.php');
        die();
    }
}else{
    include __DIR__.'/../views/auth/sign-up.php';
}
?>

