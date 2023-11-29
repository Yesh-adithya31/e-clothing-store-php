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
                        <h4>Requesting a custom Order</h4>
                        <div class="breadcrumb__links">
                            <a href="index.php">Home</a>
                            <span>Custom Order</span>
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
                        <div class="col-lg-2 col-md-6"></div>
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Requesting Details</h6>
                            <div class="checkout__input">
                                <p>Custom Order<span>*</span></p>
                                <!-- <input type="text" required> -->
                                <textarea placeholder="Message" rows="4" class="form-control" id="customOrder" name="customOrder" required> </textarea>
                            </div>
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
                            <div class="checkout__input">
                                <p>Create an account by entering the information below. If you are a returning customer
                                    please login at the top of the page</p>
                                <p>Account Password<span>*</span></p>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <button type="submit" name="login_action" class="site-btn">REQUEST ORDER</button>
                        </div>
                        <div class="col-lg-2 col-md-6"></div>
                    </div>
                </form>
                <form id="existingUserForm" method="post">
                    <div class="row">
                        <div class="col-lg-2 col-md-6"></div>
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Requesting Details</h6>
                            <div class="checkout__input">
                                <p>Custom Order<span>*</span></p>
                                <!-- <input type="text" required> -->
                                <textarea placeholder="Message" rows="4" class="form-control" id="customOrder" name="customOrder" required> </textarea>
                                <input type="hidden" id="userID" name="userID">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Number" class="checkout__input__add" id="streetNumber" name="streetNumber" required>
                                <input type="text" placeholder="Address Line 1" id="addLine1" name="addLine1" required>
                                <input type="text" placeholder="Address Line 2" id="addLine2" name="addLine2" required>
                            </div>
                            <div class="checkout__input">
                                <p>District<span>*</span></p>
                                <input type="text" id="district" name="district" required>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" id="postCode" name="postCode" required>
                            </div>
                            <button type="submit" name="login_action" class="site-btn">REQUEST ORDER</button>
                        </div>
                        <div class="col-lg-2 col-md-6"></div>
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

            $('#userID').val(user.user_id);
            if (user) {
                loadCartCountAndTotalSum(user.user_id);
                $('#existingUserForm').show();
                $('#newUserForm').hide();
            } else {
                $('#existingUserForm').hide();
                $('#newUserForm').show();
            }

        });


        $('#newUserForm').on('submit', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            // Call the createCategory function
            createCustomOrderNewUser();
        });

        function createCustomOrderNewUser() {
            $.ajax({
                url: 'includes/customReqNewUser.php',
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
            createCustomOrderExistingUser();
        });

        function createCustomOrderExistingUser() {
            $.ajax({
                url: 'includes/customReqExistingUser.php',
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