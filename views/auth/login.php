<?php

// Start session

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
  <!-- login page start-->
  <section>
  <?php if(isset($_SESSION['failed'])):?>
<div class="alert alert-danger">
    <?php echo $_SESSION['failed']; unset($_SESSION['failed']);?>

</div>
<?php endif;?>    
</section>
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-12">
        <div class="login-card">
          <form class="theme-form login-form" action="./../../auth/login.php" method="POST">
            <h4>ورود</h4>
            <h6>خوش آمدید! به حساب کاربری خود وارد شوید.</h6>
            <div class="form-group">
              <label>شماره همراه</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                <input class="form-control" type="text" name="phone_number" required="" placeholder="شماره تلفن">
              </div>
            </div>
            <div class="form-group">
              <label>رمز عبور</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input class="form-control" type="password" name="password" required="" placeholder="*********">
                <div class="show-hide"><span class="show"> </span></div>
              </div>
            </div>
            <!-- <div class="form-group">
              <div class="checkbox">
                <input id="checkbox1" type="checkbox">
                <label for="checkbox1">مرا به خاطر بسپار</label>
              </div><a class="link" href="forget-password.html">فراموشی رمز عبور؟</a>
            </div> -->
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit">وارد شوید</button>
            </div>
            <!-- <div class="login-social-title">
              <h5>ورود با</h5>
            </div>
            <div class="form-group">
              <ul class="login-social">
                <li><a href="https://www.linkedin.com/" target="_blank"><i
                      data-feather="linkedin"></i></a></li>
                <li><a href="https://twitter.com/" target="_blank"><i data-feather="twitter"></i></a>
                </li>
                <li><a href="https://www.facebook.com/" target="_blank"><i
                      data-feather="facebook"></i></a></li>
                <li><a href="https://www.instagram.com/" target="_blank"><i data-feather="instagram">
                    </i></a></li>
              </ul>
            </div> -->
          </form>
        </div>
      </div>
    </div>
  </div>
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
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="../assets/js/script.js"></script>
  <!-- login js-->
  <!-- Plugin used-->
</body>

</html>