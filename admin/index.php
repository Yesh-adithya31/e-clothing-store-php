<?php  $selectedItem = 'home'; ?>
<?php include('includes/login.php'); ?>
<?php 
if (isset($_SESSION["email"])) {
  header("location: productlist.php"); // Redirect to the login page if not logged in
  exit;
}
?>
<?php include('template/head.php'); ?>

<body class="account-page">
    <div class="main-wrapper">
      <div class="account-content">
        <div class="login-wrapper">
          <div class="login-content p-5">
            <form action="index.php" method="post" class="login-userset">
              <div class="login-logo">
                <img src="assets/img/logo-lg.png" style="transform: scale(3);" alt="img" />
              </div>

              <div class="login-userheading">
                <h3>Sign In</h3>
                <h4>Please login to your account</h4>
                <?php
                if (isset($_SESSION['error'])) {
                  echo "
                      <div class='alert bg-danger text-white text-bold'>
                          " . $_SESSION['error'] . "
                      </div>
                  ";
                  unset($_SESSION['error']);
                }
                ?>
              </div>
              <div class="form-login">
                <label>Email</label>
                <div class="form-addons">
                  <input type="text" placeholder="Enter your email address" name="email" required />
                  <img src="assets/img/icons/mail.svg" alt="img" />
                </div>
              </div>
              <div class="form-login">
                <label>Password</label>
                <div class="pass-group">
                  <input
                    type="password"
                    class="pass-input"
                    placeholder="Enter your password"
                    name="password"
                    required
                  />
                  <span class="fas toggle-password fa-eye-slash" ></span>
                </div>
              </div>
              <div class="form-login">
                <button  name="login_action" type="submit" class="btn btn-login">Sign In</button>
              </div>
            </form>
          </div>
          <div class="login-img">
            <img src="assets/img/login.jpg" alt="img" />
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>


  <?php include('template/footer.php'); ?>
  </body>
</html>