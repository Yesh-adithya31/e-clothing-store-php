<?php include('includes/session.php'); ?>
<?php $selectedItem = 'productList'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('template/head.php'); ?>
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">
        <?php include('template/header.php'); ?>

        <?php include('template/sidebar.php'); ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Product Details</h4>
                        <h6>Full details of a product</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="productdetails">
                                    <ul class="product-bar">
                                        <li>
                                            <h4>Product</h4>
                                            <h6 id="productName"></h6>
                                        </li>
                                        <li>
                                            <h4>Category</h4>
                                            <h6 id="categoryName"></h6>
                                        </li>
                                        <li>
                                            <h4>Variant Name</h4>
                                            <h6 id="variantName"></h6>
                                        </li>
                                        <li>
                                            <h4>Variant Options</h4>
                                            <h6 id="variantOptName"></h6>
                                        </li>
                                        <li>
                                            <h4>SKU</h4>
                                            <h6 id="SKU"></h6>
                                        </li>
                                        <li>
                                            <h4>Quantity</h4>
                                            <h6 id="qty"></h6>
                                        </li>
                                        <li>
                                            <h4>Price</h4>
                                            <h6 id="price"></h6>
                                        </li>
                                        <li>
                                            <h4>Status</h4>
                                            <h6>Active</h6>
                                        </li>
                                        <li>
                                            <h4>Description</h4>
                                            <h6 id="description"></h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="slider-product-details">
                                    <div class="slider-product">
                                        <img id="imageURL" src="assets/img/product/product69.jpg" alt="img">
                                        <h4 id="productName"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php include('template/footer.php'); ?>
    <script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>
    <script>
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        $(document).ready(function() {
            var id = getUrlParameter('id');
            $.ajax({
                url: 'includes/productGetOne.php', // Replace with your delete API endpoint
                type: 'POST',
                data: {
                    product_master_id: id
                },
                success: function(data) {
                    // Parse the JSON response
                    var response = JSON.parse(data);
                    console.log(response);
                    $('#productName').text(response[0].product_name);
                    $('#categoryName').text(response[0].category_name);
                    $('#variantName').text(response[0].name);
                    $('#variantOptName').text(response[0].value);
                    $('#SKU').text(response[0].SKU);
                    $('#qty').text(response[0].qty_in_stock);
                    $('#price').text(response[0].price);
                    $('#description').text(response[0].description);
                    $('#imageURL').attr('src', '../uploads/'+response[0].product_image);
                },
                error: function(error) {
                    // Handle error
                    Swal.fire({
                        title: 'Error!',
                        text: error.message,
                        icon: 'error',
                    });
                }
            });
        });
    </script>
</body>

</html>