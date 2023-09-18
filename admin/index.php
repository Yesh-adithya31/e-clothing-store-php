<?php include('includes/login.php'); ?>
<?php 
if (isset($_SESSION["email"])) {
  header("location: home.php"); // Redirect to the login page if not logged in
  exit;
}
?>
<?php include('template/header.php'); ?>

<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('./assets/img/bg.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">The KNOT Web-Panel</h4>
                </div>
              </div>
              <div class="card-body">
                <?php
                if (isset($_SESSION['error'])) {
                  echo "
                      <div class='alert alert-danger text-white text-bold'>
                          " . $_SESSION['error'] . "
                      </div>
                  ";
                  unset($_SESSION['error']);
                }
                ?>
                <form role="form" class="text-start" action="index.php" method="post">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>
                  <div class="text-center">
                    <button name="login_action" type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made by
                <a class="font-weight-bold text-white">WUSL WEB-TEAM</a>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a class="nav-link text-white" target="_blank">WUSL WEB-TEAM</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pe-0 text-white" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <?php include('template/footer.php'); ?>