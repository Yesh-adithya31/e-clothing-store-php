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
                        <h4>Order History</h4>
                        <div class="breadcrumb__links">
                            <a href="index.php">Home</a>
                            <span>History</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Order History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab">Custom Order History</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-5" role="tabpanel">
                            <div class="product__details__tab__content">
                                <div class="product__details__tab__content__item">
                                    <h5>Order Infomation</h5>
                                    <p id="description2"></p>
                                </div>
                                <div class="shopping__cart__table">
                                    <table id="orderHistoryTB" class="table table-bordered">
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__content">
                                <div class="product__details__tab__content__item">
                                    <h5>Custome Order Infomation</h5>
                                    <p id="description2"></p>
                                </div>
                                <div class="shopping__cart__table">
                                    <table id="customOrderHistoryTB" class="table table-bordered">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shopping Cart Section End -->

    <?php include('template/footer.php'); ?>

    <?php include('template/jslinks.php'); ?>
    <script>
        var user = <?php if (isset($_SESSION["user"])) {
                        echo $_SESSION["user"];
                    } else {
                        echo "00";
                    } ?>;

        let db;
        $(document).ready(function() {
            if (user) {
                loadCartCountAndTotalSum(user.user_id);
            }
            dt = $('#orderHistoryTB').DataTable({
                columns: [{
                        title: 'Order ID',
                        data: 'order_id'
                    },
                    {
                        title: 'Order Prices',
                        data: 'order_total'
                    },
                    {
                        title: 'Order Note',
                        data: 'delivery_note'
                    },
                    {
                        title: 'Order status',
                        data: 'status'
                    },
                    {
                        title: 'Order Date',
                        data: 'order_date'
                    },
                    {
                        title: 'Action'
                    }
                ],
                // data: data,
                language: {
                    emptyTable: "No files to show..."
                },
                columnDefs: [{
                    // # action controller (edit,delete)
                    targets: [5],
                    orderable: false,
                    // # column rendering
                    // https://datatables.net/reference/option/columns.render
                    render: function(data, type, row, meta) {
                        var view = '<a href="history-detail?id=' + row.order_id + '" class="border-0 bg-light me-3" data-id="' + row.order_id + '" > View</a>';

                        return view;
                    }
                }],
                ajax: {
                    type: "POST",
                    url: 'includes/historyOrder.php',
                    data: {
                        userid: user.user_id
                    },
                    // contentType: 'application/json; charset=utf-8',
                    datatype: 'json',
                    dataSrc: ""
                }
            });


            $('#customOrderHistoryTB').DataTable({
                columns: [{
                        title: 'Custom Order ID',
                        data: 'custom_req_id'
                    },
                    {
                        title: 'Customer Request Note',
                        data: 'request_note'
                    },
                    {
                        title: 'Order status',
                        data: 'order_status'
                    },
                    {
                        title: 'Street',
                        data: 'street_number',
                    },
                    {
                        title: 'Street Line 1',
                        data: 'address_line1'
                    },
                    {
                        title: 'Street Line 2',
                        data: 'address_line2'
                    },
                    {
                        title: 'District',
                        data: 'district'
                    }
                ],
                // data: data,
                language: {
                    emptyTable: "No files to show..."
                },
                ajax: {
                    type: "POST",
                    url: 'includes/historyCustomOrder.php',
                    data: {
                        userid: user.user_id
                    },
                    // contentType: 'application/json; charset=utf-8',
                    datatype: 'json',
                    dataSrc: ""
                }
            });

        });

        function removeCartItem(userID, shoppingCartID) {
            $.ajax({
                url: "includes/cartItemsDelete.php",
                data: {
                    userid: userID,
                    shoppingCartID: shoppingCartID,
                },
                dataType: "json",
                method: "POST",
                processData: true,
                error: function(error) {
                    Swal.fire({
                        title: "Error!",
                        text: error.message,
                        icon: "error",
                    });
                },
                success: function(r) {
                    Swal.fire({
                        title: "Success!",
                        text: r.message,
                        icon: "success",
                    });
                    loadCartCountAndTotalSum(user.user_id);
                    getCartItems(user.user_id);
                },
            });
        }
    </script>
</body>

</html>