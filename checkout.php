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
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="index.php">Home</a>
                            <a href="shop.php">Shop</a>
                            <a href="cart.php">Cart</a>
                            <span>Check Out</span>
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
                <form id="newUserForm" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" id="firstName" name="firstName" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" id="lastName" name="lastName" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Number" class="checkout__input__add" id="streetNumber" name="streetNumber" required>
                                <input type="text" placeholder="Address Line 1" id="addLine1" name="addLine1" required>
                                <input type="text" placeholder="Address Line 2" id="addLine2" name="addLine2">
                            </div>
                            <div class="checkout__input">
                                <p>District<span>*</span></p>
                                <input type="text" id="district" name="district" required>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" id="postCode" name="postCode" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" id="phoneNumber" name="phoneNumber" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" id="email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <p>Create an account by entering the information below. If you are a returning customer
                                    please login at the top of the page</p>
                            </div>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span>( Note about your order, e.g, special noe for delivery)</p>
                                <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." id="orderNote" name="orderNote" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul id="cartListContainer" class="checkout__total__products">
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span id="subTotal">LKR 0.00</span></li>
                                    <li>Total <span id="totalSum">LKR 0.00</span></li>
                                    <input type="hidden" id="totalPrice" name="totalPrice"/>
                                </ul>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Cash on Delivery
                                        <input type="checkbox" id="payment" checked disabled>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form id="existingUserForm" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="hidden" id="userID" name="userID"/>
                                <input type="text" placeholder="Street Number" class="checkout__input__add" id="streetNumber" name="streetNumber" required>
                                <input type="text" placeholder="Address Line 1" id="addLine1" name="addLine1" required>
                                <input type="text" placeholder="Address Line 2" id="addLine2" name="addLine2">
                            </div>
                            <div class="checkout__input">
                                <p>District<span>*</span></p>
                                <input type="text" id="district" name="district" required>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" id="postCode" name="postCode" required>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span>( Note about your order, e.g, special noe for delivery)</p>
                                <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." id="orderNote" name="orderNote" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul id="cartListContainer2" class="checkout__total__products">
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span id="subTotal2">LKR 0.00</span></li>
                                    <li>Total <span id="totalSum2">LKR 0.00</span></li>
                                    <input type="hidden" id="totalPrice2" name="totalPrice2"/>
                                </ul>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Cash on Delivery
                                        <input type="checkbox" id="payment" checked disabled>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->


    <?php include('template/footer.php'); ?>

    <?php include('template/jslinks.php'); ?>
    <script>
        var user = <?php if (isset($_SESSION["user"])) {
                        echo $_SESSION["user"];
                    } else {
                        echo "00";
                    } ?>;

        $(document).ready(function() {
            if (user) {
                loadCartCountAndTotalSum(user.user_id);
                data = getCartItems(user.user_id);
                $('#existingUserForm').show();
                $('#newUserForm').hide();
                $('#userID').val(user.user_id);
            } else {
                $('#existingUserForm').hide();
                $('#newUserForm').show();
            }
        });

        function getCartItems(userID) {
            $.ajax({
                url: "includes/customerCartGetAll.php", // Replace with your API endpoint URL
                data: {
                    userid: userID,
                },
                method: "POST",
                dataType: "json",
                success: function(data) {
                    // Get the container where products will be displayed
                    var cartListContainer = $("#cartListContainer");
                    cartListContainer.empty();

                    var cartListContainer2 = $("#cartListContainer2");
                    cartListContainer2.empty();

                    var totalSum = 0;
                    var c=0;
                    // Loop through the retrieved data and populate the HTML structure
                    $.each(data, function(index, product) {
                        totalSum = totalSum + product.price * product.qty;
                        c = c+1;
                        // Create a div for each product and set its class and content dynamically
                        var productContent = `
                        <li>0${c}. ${product.product_name} <span>LKR ${product.price}.00</span></li>
                        `;
                        cartListContainer.append(productContent);
                        cartListContainer2.append(productContent);
                    });

                    $('#subTotal').text(`LKR ${totalSum}.00`);
                    $('#subTotal2').text(`LKR ${totalSum}.00`);
                    $('#totalSum').text(`LKR ${totalSum}.00`);
                    $('#totalSum2').text(`LKR ${totalSum}.00`);
                    $('#totalPrice').val(totalSum);
                    $('#totalPrice2').val(totalSum);

                },
                error: function(xhr, status, error) {
                    console.log("Error fetching data:", error);
                },
            });
        }

        $('#newUserForm').on('submit', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            // Call the createCategory function
            createCheckoutNewUser();
        });

        function createCheckoutNewUser() {
            $.ajax({
                url: 'includes/checkoutNewUser.php',
                data: $('#newUserForm').serializeArray(),
                dataType: 'json',
                method: 'POST',
                processData: true,
                error: function(error) {
                    Swal.fire({
                        title: 'Error!',
                        text: error.message,
                        icon: 'error',
                    });
                },
                success: function(r) {
                    Swal.fire({
                        title: 'Success!',
                        text: r.message,
                        icon: 'success',
                    });
                    $('#newUserForm')[0].reset();

                }
            });
        }

        $('#existingUserForm').on('submit', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            // Call the createCategory function
            createCheckoutExistingUser();
        });

        function createCheckoutExistingUser() {
            $.ajax({
                url: 'includes/checkoutExistingUser.php',
                data: $('#existingUserForm').serializeArray(),
                dataType: 'json',
                method: 'POST',
                processData: true,
                error: function(error) {
                    Swal.fire({
                        title: 'Error!',
                        text: error.message,
                        icon: 'error',
                    });
                },
                success: function(r) {
                    Swal.fire({
                        title: 'Success!',
                        text: r.message,
                        icon: 'success',
                    });
                    $('#existingUserForm')[0].reset();

                }
            });
        }
    </script>
</body>

</html>