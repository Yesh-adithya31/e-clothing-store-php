    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="signin.php">Sign in</a>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="cart.php"><img src="img/icon/cart.png" alt=""> <span id="mobileCartCount">0</span></a>
            <div class="price" id="mobilePrice">LKR0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu End -->
    <!-- if (isset($_SESSION["user"])) {
    header("location: index.php"); // Redirect to the login page if not logged in
    exit;
} -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <!-- <?php session_start();  ?> -->
                                <a href="signin.php"><?php
                                                        if (isset($_SESSION['useremail'])) {
                                                            echo $_SESSION['useremail'];
                                                            echo '<a href="history.php">History</a>';
                                                            echo '<a href="includes/logout.php">Log out</a>';
                                                        } else {
                                                            echo 'Sign in';
                                                        } ?></a>
  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="custom-order.php">Request Custom Order</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="cart.php"><img src="img/icon/cart.png" alt=""> <span id="webCartCount">0</span></a>
                        <div class="price" id="webPrice">LKR0.00</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->