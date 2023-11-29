<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();

    $userID =  $_POST['userID'];

    $orderNote =  $_POST['orderNote'];
    $totalPrice =  $_POST['totalPrice2'];

    $streetNumber = $_POST['streetNumber'];
    $addLine1 = $_POST['addLine1'];
    $addLine2 = $_POST['addLine2'];
    $postCode = $_POST['postCode'];
    $district = $_POST['district'];

    try {
        $stmt = $conn->prepare("INSERT INTO shipping_address(street_number, address_line1,address_line2,postal_code,district) VALUES(:strNo,:add1, :add2, :postCode, :district)");
        $stmt->execute(['strNo' => $streetNumber, 'add1' => $addLine1, 'add2' => $addLine2, 'postCode' => $postCode, 'district' => $district]);
        $shippingAddID = $conn->lastInsertId();

        if ($shippingAddID) {
            $stmt = $conn->prepare("INSERT INTO order_details(user_id, shipping_address_id,order_status_id,order_total,delivery_note) VALUES(:userid,:shipAdd,1,:o_tot, :delNote)");
            $stmt->execute(['userid' => $userID, 'shipAdd' => $shippingAddID, 'o_tot' => $totalPrice, 'delNote' => $orderNote]);
            $orderID = $conn->lastInsertId();
            if ($orderID) {
                $stmt = $conn->prepare("SELECT shopping_cart.qty, product_master.price, product_master.product_master_id, user_has_shopping_cart.shopping_cart_id FROM user_has_shopping_cart LEFT JOIN shopping_cart ON user_has_shopping_cart.shopping_cart_id = shopping_cart.shopping_cart_id LEFT JOIN product_master ON shopping_cart.product_master_id = product_master.product_master_id LEFT JOIN product_details ON product_master.product_detail_id = product_details.product_details_id WHERE user_has_shopping_cart.user_id = :user_id");
                $stmt->execute(['user_id'=>$userID]);
                $shopping_cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($shopping_cart_items as $item) {
                    // Insert shopping cart data into bills table
                    $stmt = $conn->prepare("INSERT INTO bills (qty, price, product_master_id, order_details_id) 
                                                VALUES (:qty, :price, :product_master_id, :order_details_id)");
                    $stmt->execute(['qty' => $item['qty'], 'price' => $item['price'], 'product_master_id' => $item['product_master_id'], 'order_details_id' => $orderID]);

                    // Delete user's association with the shopping cart
                    $stmt = $conn->prepare("DELETE FROM user_has_shopping_cart WHERE shopping_cart_id = :cart_id");
                    $stmt->execute(['cart_id' => $item['shopping_cart_id']]);

                    // Delete the shopping cart item
                    $stmt = $conn->prepare("DELETE FROM shopping_cart WHERE shopping_cart_id = :cart_id");
                    $stmt->execute(['cart_id' => $item['shopping_cart_id']]);

                    $response = [
                        'message' => 'Shopping cart items added to bills table successfully!!',
                    ];
                }
            } else {
                $response = [
                    'message' => 'Error occured!!',
                ];
            }
        } else {
            $response = [
                'message' => 'Error occured!!',
            ];
        }
        echo json_encode($response);
    } catch (PDOException $e) {
        // echo "There is some problem in connection: " . $e->getMessage();
        $response = [
            'message' => 'There is some problem in connection: ' . $e->getMessage(),
        ];
        echo json_encode($response);
    }

    $pdo->close();
}
