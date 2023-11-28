<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();
    $conn2 = $pdo->open();

    $productMasterID =  $_POST['productMasterID'];
    $userID =  $_POST['userID'];

    try {
        $stmt = $conn->prepare("SELECT * FROM user_has_shopping_cart WHERE user_id = :userid AND shopping_cart_id IN (SELECT shopping_cart_id FROM shopping_cart WHERE product_master_id = :masterid)");
        $stmt->execute(['userid' => $userID, 'masterid' => $productMasterID]);
        $count = $stmt->rowCount();

        if ($count > 0) {
            $response = [
                'message' => 'Product already exists in the cart!',
            ];
        } else {
            $stmt = $conn->prepare("INSERT INTO shopping_cart(qty, product_master_id) VALUES(1,:master_id)");
            $stmt->execute(['master_id' => $productMasterID]);
            $cartID = $conn->lastInsertId();
    
            if ($cartID) {
                $stmt2 = $conn2->prepare("INSERT INTO user_has_shopping_cart(user_id, shopping_cart_id) VALUES(:userid,:cartid)");
                $stmt2->execute(['userid' => $userID, 'cartid' => $cartID]);
                $response = [
                    'message' => 'Added to cart!!!',
                ];
            } else {
                $response = [
                    'message' => 'Error occured!!',
                ];
            }
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
