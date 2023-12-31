<?php

// Start session
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
  <meta name="keywords"
    content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="../assets/images/logo/favicon-icon.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/logo/favicon-icon.png" type="image/x-icon">
  <title>قالب مدیریتی زتا </title>
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
  <!-- Plugins css start-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/sweetalert2.css">
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
</head>

<body>
  <!-- Loader starts-->
  <div class="loader-wrapper">
    <div class="loader">
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-ball"></div>
    </div>
  </div>
  <!-- Loader ends-->
  <!-- page-wrapper Start-->
  <section>
  <?php if(isset($_SESSION['failed'])):?>
<div class="alert alert-danger">
    <?php echo $_SESSION['failed']; unset($_SESSION['failed']);?>

</div>
<?php endif;?>
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">
          <div class="login-card">
            <form class="theme-form login-form" action="../auth/register.php" method="post">
              <h4>ایجاد حساب کاربری</h4>
              <h6>برای ایجاد حساب کاربری جزئیات شخصی خود را وارد کنید</h6>
              <div class="form-group">
                <label>نام شما</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                    <input class="form-control" name="name" type="text" required="" placeholder="نام">
                  </div>
              </div>
              <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
              <div class="form-group">
                <label>شماره تلفن</label>
                <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                  <input class="form-control" type="text" name="phone_number" required="" placeholder="شماره تلفن">
                </div>
              </div>
              <div class="form-group">
                <label>رمز عبور</label>
                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                  <input class="form-control" type="password" name="password" required=""
                    placeholder="*********">
                  <div class="show-hide"><span class="show"> </span></div>
                </div>
              </div>
              <div class="form-group">
                <label>رمز عبور</label>
                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                  <input class="form-control" type="password" name="confirmation_password" required=""
                    placeholder="*********">
                  <div class="show-hide"><span class="show"> </span></div>
                </div>
              </div>
              <!-- <div class="form-group">
                <div class="checkbox">
                  <input id="checkbox1" type="checkbox">
                  <label class="text-muted" for="checkbox1">با <span>قوانین و مقررات </span>موافقم.</label>
                </div>
              </div> -->
              <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">ایجاد حساب کاربری</button>
              </div>
              <!-- <div class="login-social-title">
                <h5>ثبت نام با</h5>
              </div>
              <div class="form-group">
                <ul class="login-social">
                  <li><a href="https://www.linkedin.com/" target="_blank"><i data-feather="linkedin"></i></a></li>
                  <li><a href="https://twitter.com/" target="_blank"><i data-feather="twitter"></i></a></li>
                  <li><a href="https://www.facebook.com/" target="_blank"><i data-feather="facebook"></i></a></li>
                  <li><a href="https://www.instagram.com/" target="_blank"><i data-feather="instagram">
                      </i></a></li>
                </ul>
              </div> -->
              <p>حساب کاربری دارید؟<a class="ms-2" href="login.php">وارد شوید</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- page-wrapper end-->
  <!-- latest jquery-->
  <script src="../assets/js/jquery-3.5.1.min.js"></script>
  <!-- Bootstrap js-->
  <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <!-- feather icon js-->
  <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
  <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
  <!-- scrollbar js-->
  <!-- Sidebar jquery-->
  <script src="../assets/js/config.js"></script>
  <!-- Plugins JS start-->
  <script src="../assets/js/sweet-alert/sweetalert.min.js"></script>
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="../assets/js/script.js"></script>
  <!-- login js-->
  <!-- Plugin used-->
</body>

</html>