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

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="index.php">Home</a>
                            <a href="shop.php">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img id="imageURL" src="uploads/best-seller-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4 id="productName"></h4>
                            <h3 id="price"></h3>
                            <p id="description"></p>
                            <div class="product__details__option">

                                <div class="product__details__option__size">
                                    <span id="variantName"></span>
                                    <div class="btn-group" data-toggle="buttons" id="sizeContainer">
                                        <!-- Your generated radio buttons will be appended here -->
                                    </div>
                                </div>
                            </div>
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" id="qty" min="1" value="1">
                                    </div>
                                </div>
                                <a id="addtocartID" class="primary-btn text-light" style="cursor:pointer;">add to cart</a>
                                <input type="hidden" id="product_master_id" name="product_master_id" />
                            </div>
                            <div class="product__details__last__option">
                                <ul>
                                    <li id="SKU"><span>SKU:</span></li>
                                    <li id="categoryName"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p id="description2"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div id="productsContainer" class="row">
            </div>
        </div>
    </section>
    <!-- Related Section End -->


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
            $('#addtocartID').click(function() {
                addToCart(id,$('#qty').val());
            });
            $.ajax({
                url: 'includes/productGetOne.php', // Replace with your delete API endpoint
                type: 'POST',
                data: {
                    product_master_id: id
                },
                success: function(data) {
                    // Parse the JSON response
                    var response = JSON.parse(data);

                    $('#imageURL').attr('src', 'uploads/' + response[0].product_image);
                    $('#productName').text(response[0].product_name);
                    $('#price').text(`LKR ${response[0].price}.00`);
                    $('#description').text(response[0].description);
                    $('#description2').text(response[0].description);
                    $('#SKU').text(`SKU: ${response[0].SKU}`);
                    $('#categoryName').text(`Category: ${response[0].category_name}`);
                    $('#variantName').text(`${response[0].name}: `);

                    // Calling Products related details
                    getCategoryRelatedProducts(response[0].category_id);

                    var sizes = [];
                    sizes = response[0].value.split(',');
                    // Target the container where the radio buttons will be added
                    var sizeContainer = $('#sizeContainer');

                    // Loop through the sizes array to create radio buttons
                    sizes.forEach(function(size, index) {
                        // Create the label and input elements for each size
                        var label = $('<label>').addClass('btn btn-light').text(size);
                        var input = $('<input>').attr({
                            type: 'radio',
                            name: 'size',
                            id: 'size' + index,
                            autocomplete: 'off'
                        }).val(size);

                        // Check the first radio button
                        if (index === 0) {
                            label.addClass('active');
                            input.prop('checked', true);
                        }

                        // Append the input inside the label
                        label.append(input);

                        // Append the label to the size container
                        sizeContainer.append(label);
                    });
                    $('#qty').attr('max', response[0].qty_in_stock);
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

            // // Event listener for click on radio buttons
            // $('#getValueBtn').on('click', function() {
            //     // Get the value of the selected radio button
            //     var selectedSize = $('input[name="size"]:checked').val();

            //     // Check if a size is selected
            //     if (selectedSize) {
            //         // Output the selected value (you can replace this with your desired logic)
            //         console.log('Selected Size:', selectedSize);
            //     } else {
            //         console.log('Please select a size.');
            //     }
            // });
        });

        function selectedOptions(size) {
            var selectedID = size.id;
            console.log(selectedID)
            $('#selectedID').addClass('active');
        }
    </script>
</body>

</html>