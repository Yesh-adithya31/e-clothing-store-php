<?php include('includes/login.php'); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The-Knot</title>
    <!-- Css Styles -->
    <?php include('template/links.php'); ?>
</head>

<body>
    <?php include('template/header.php'); ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Sign In</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Sign In</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="signin.php" method="post">
                    <div class="row">
                        <div class="col-lg-3 col-md-6"></div>
                        <div class="col-lg-6 col-md-6">
                            <h6 class="checkout__title">Sign In</h6>
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
                            <div class="checkout__input">
                                <p>E-mail</p>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <button type="submit" name="login_action"  class="site-btn">LOGIN IN</button>
                        </div>
                        <div class="col-lg-3 col-md-6"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <?php include('template/footer.php'); ?>

    <?php include('template/jslinks.php'); ?>
    <script>

    </script>
</body>

</html>