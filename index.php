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

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                    commitment to exceptional quality.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                    commitment to exceptional quality.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="img/banner/banner-1.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Clothing Collections 2030</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="img/banner/banner-2.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Accessories</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="img/banner/banner-3.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Shoes Spring 2030</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul id="filter_id" class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        <!-- CAETGORY NAMES RELATED PRODUCTS DISPLAYS HERE FROM DATABASE -->
                    </ul>
                </div>
            </div>
            <div id="productsContainer" class="row product__filter">
                <!-- DATA LOAD FROM DATABASE INTO HERE USING AJAX -->
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="img/product-sale.png" alt="">
                        <div class="hot__deal__sticker">
                            <span>Sale Of</span>
                            <h5>LKR999.99</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2>Multi-pocket Chest Bag Black</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-1.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-2.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-3.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-4.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-5.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-6.jpg"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <h3>#Male_Fashion</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <?php include('template/footer.php'); ?>

    <?php include('template/jslinks.php'); ?>
    <script>
        var user = <?php if (isset($_SESSION["user"])) {
                        echo $_SESSION["user"];
                    } else {
                        echo "00";
                    } ?>;
        // console.log(user.user_id);
        $(document).ready(function() {
            // Make an AJAX request to fetch product data from the API
            $.ajax({
                url: 'includes/productGetAll.php', // Replace with your API endpoint URL
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    // Get the container where products will be displayed
                    var productsContainer = $('#productsContainer');
                    var filterControls = $('#filter_id');

                    // Loop through the retrieved data and populate the HTML structure
                    $.each(data, function(index, product) {
                        // Create a div for each product and set its class and content dynamically
                        var productItem = $(`<div>`).addClass(`col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix ${product.category_name}`);
                        var productContent = `
                    <div class="product__item">
                        <div class="product__item__pic set-bg">
                        <img class="product__item__pic set-bg" src="uploads/${product.product_image}"/>
                            <ul class="product__hover">
                                <li><a onclick="goToProduct(${product.product_master_id})"><img src="img/icon/compare.png" alt=""> <span>View</span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>${product.product_name}</h6>
                            <a style="cursor: pointer;" onClick="addToCart(${product.product_master_id})" class="add-cart">+ Add To Cart</a>
                            <h5>LKR ${product.price}</h5>
                        </div>
                    </div>
                `;

                        // Append the product content to the products container
                        productItem.append(productContent);
                        productsContainer.append(productItem);

                        if (!filterControls.find(`[data-filter=".${product.category_name}"]`).length) {
                            // If not, create a new filter control for this category
                            var filterItem = $('<li>').attr('data-filter', `.${product.category_name}`).text(product.category_name);
                            filterControls.append(filterItem);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error fetching data:', error);
                }
            });
        });

        function addToCart(id) {
            // console.log((user.user_id));
            if(user){
                $.ajax({
                    url: 'includes/cartAdd.php',
                    data: {
                        productMasterID: id,
                        userID: user.user_id
                    },
                    dataType: 'json',
                    method: 'POST',
                    processData: true,
                    error: function(error) {
                        Swal.fire({
                            title: 'Error!',
                            text: error,
                            icon: 'error',
                        });
                        dt.ajax.reload();
                    },
                    success: function(r) {
                        Swal.fire({
                            title: 'Success!',
                            text: r.message,
                            icon: 'success',
                        });
                    }
                });

            }else{
                window.location.href = "signin.php";
            }
        }

        function goToProduct(id) {
            window.location.href = `product-details.php?id=${id}`;
        }
    </script>
</body>

</html>