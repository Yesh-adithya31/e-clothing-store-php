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
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="index.php">Home</a>
                            <a href="shop.php">Shop</a>
                            <span>Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="cartContainer">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span id="total">LKR 00.00</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <?php include('template/footer.php'); ?>

    <?php include('template/jslinks.php'); ?>
    <script>
        var user = <?php if (isset($_SESSION["user"])) {
                        echo $_SESSION["user"];
                    } else {
                        echo "00";
                    } ?>;

        $(document).ready(function() {
            var id = getUrlParameter('id');

            if (user) {
                loadCartCountAndTotalSum(user.user_id);
                getHistoryItems(id);
            }

        });

        function getHistoryItems(masterID) {
            console.log(masterID);
            $.ajax({
                url: "includes/customerCartGetOne.php", // Replace with your API endpoint URL
                data: {
                    masterid: masterID,
                },
                method: "POST",
                dataType: "json",
                success: function(data) {
                    // Get the container where products will be displayed
                    var cartContainer = $("#cartContainer");
                    cartContainer.empty();
                    console.log(data);
                    var totalSum = 0;
                    // Loop through the retrieved data and populate the HTML structure
                    $.each(data, function(index, product) {
                        totalSum = totalSum + product.price * product.qty;
                        // Create a div for each product and set its class and content dynamically
                        var productContent = `
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic" style="width:70px; height: 70px;" onclick="goToProduct(${product.product_master_id})">
                                        <img src="uploads/${product.product_image}" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>${product.product_name}</h6>
                                        <h5>LKR ${product.price}.00</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2" >
                                            <input type="number" id="product-quantity" class="form-control border-dark" value="${product.qty}" data-product-id="${product.product_master_id}">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">LKR ${product.price}.00</td>
                            </tr>
                        `;
                        cartContainer.append(productContent);
                    });

                    $('#total').text(`LKR ${totalSum}.00`);

                },
                error: function(xhr, status, error) {
                    console.log("Error fetching data:", error);
                },
            });
        }

    </script>
</body>

</html>